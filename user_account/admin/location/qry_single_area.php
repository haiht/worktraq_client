<?php if (!isset($v_sval)) die(); ?>
<?php
add_class('cls_tb_area');
add_class('cls_tb_product_images');

$cls_tb_area = new cls_tb_area($db, LOG_DIR);
$cls_product_image = new cls_tb_product_images($db, LOG_DIR);
$v_error_message = '';
$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
$v_area_id = 0;
$v_location_id = 0;
$v_status = 0;
$v_area_name = '';
$v_area_description = '';
$v_area_image = '';
$v_error_message = "";
$v_location_id = (int) isset($_REQUEST['id'])?$_REQUEST['id']:0;
$v_area_name = isset($_POST['txt_area_name'])?$_POST['txt_area_name']:'';
$v_has_upload = true;
$v_company_id = $cls_tb_location->select_scalar('company_id',array('location_id'=>(int)$v_location_id));
$v_company_code = $cls_tb_company->select_scalar('company_code',array('company_id'=>(int) $v_company_id));

if(isset($_POST['btn_submit_tb_location_area'])){

    $v_location_id  = (int) isset($_POST['txt_location_id'])?$_POST['txt_location_id']:0;
    if($v_location_id==0)$v_error_message .= "+ Location is empty!....<br>";
    $cls_tb_area->set_location_id($v_location_id);
    $cls_tb_area->set_company_id($v_company_id);
    $v_area_name = isset($_POST['txt_area_name'])?$_POST['txt_area_name']:'';
    if($v_area_name=='')$v_error_message .= "+ Location Area name is empty!....<br>";
    $cls_tb_area->set_area_name($v_area_name);
    $v_are_description = isset($_POST['txt_area_description'])?$_POST['txt_area_description']:'';
    $cls_tb_area->set_area_description($v_are_description);
    $v_area_id = $cls_tb_area->select_next('area_id');
    if($v_area_id<=0) $v_error_message = '+ Cannot create Area ID!<br />';
    $cls_tb_area->set_area_id($v_area_id);
    $cls_tb_area->set_area_order($v_area_id);
    $v_status = isset($_POST['txt_status'])?0:1;
    $cls_tb_area->set_status($v_status);
    $v_area_code = '';
    $arr_area_name = explode(' ', $v_area_name);
    for($i=0; $i<count($arr_area_name); $i++){
        $v_one = trim($arr_area_name[$i]);
        if($v_one!='')
            $v_area_code .= substr($v_one,0,1);
    }
    $cls_tb_area->set_area_code($v_area_code);

    $v_area_mongo_id = $cls_tb_area->insert();
    if(is_object($v_area_mongo_id)){
        $v_error_message .= '+ Area "'.$v_area_name.'" is created success!<br>';
        $v_area_name = '';
        $v_area_description = '';
    }
    if(!is_null($v_area_mongo_id)){

        $arr_area_image = array();
        if(isset($_FILES['txt_area_image'])){
            //$v_upload_dir = PRODUCT_IMAGE_DIR.DS.$v_company_code.DS.'signage_layout'.DS.$v_area_id;
            $v_upload_dir = PRODUCT_IMAGE_DIR.DS.$v_company_code;
            $v_allow = file_exists($v_upload_dir) || mkdir($v_upload_dir);
            if($v_allow){
                $v_upload_dir .= DS.'signage_layout';
                $v_allow = file_exists($v_upload_dir) || mkdir($v_upload_dir);
                if($v_allow){
                    $v_upload_dir .= DS.$v_area_id;
                    $v_allow = file_exists($v_upload_dir) || mkdir($v_upload_dir);
                }
            }
            $v_saved_dir = 'resources/'.str_replace(PRODUCT_IMAGE_DIR.DS,'',$v_upload_dir);
            $v_saved_dir = str_replace(DS,'/', $v_saved_dir).'/';

            $v_image_count= 0;;
            $arr_errors= array();
            foreach($_FILES['txt_area_image']['tmp_name'] as $key => $tmp_name ){
                $v_file_name = $_FILES['txt_area_image']['name'][$key];
                $v_file_size =$_FILES['txt_area_image']['size'][$key];
                $v_file_tmp =$_FILES['txt_area_image']['tmp_name'][$key];
                $v_file_type=$_FILES['txt_area_image']['type'][$key];
                $arr_original_file_name = explode(".",$_FILES["txt_area_image"]["name"][$key]) ;
                $v_file_ext = strtolower($arr_original_file_name[sizeof($arr_original_file_name)-1]);
                if($v_file_name!=''){
                    if(in_array($v_file_ext,$arr_allow_file_type)){
                        //if(empty($errors)==true){
                        if($v_allow){
                            //if(is_dir($v_upload_dir)==false){
                            //    mkdir("$v_upload_dir", 0700);		// Create directory if it does not exist
                            //}
                            if(is_dir("$v_upload_dir/".$v_file_name)==false){
                                $v_image_count++;
                                //$v_tmp_file_name = str_replace(".".$v_file_ext,"",$v_area_name);
                                //$v_tmp_file_name = remove_invailid_char($v_file_name);
                                //$v_tmp_file_name = strtolower($v_tmp_file_name);
                                //$v_tmp_file_name = $v_tmp_file_name ."_".$v_image_count. ".". $v_file_ext;
                                $v_tmp_file_name = $v_file_name;
                                if(move_uploaded_file($v_file_tmp,$v_upload_dir.DS.$v_tmp_file_name))
                                {
                                    $v_image_file = $v_tmp_file_name;
                                    $v_low_res = '';
                                    list($width, $height) = @getimagesize($v_upload_dir.DS.$v_image_file);
                                    for($i=0; $i<count($arr_product_image_size); $i++){
                                        $v_width = $arr_product_image_size[$i];
                                        if($v_width < $width){
                                            images_resize_by_width($v_width, $v_upload_dir.DS.$v_image_file,$v_upload_dir.DS.$v_width.'_'.$v_image_file );
                                            if($v_width==PRODUCT_IMAGE_ICON) $v_low_res = PRODUCT_IMAGE_ICON.'_'.$v_image_file;
                                        }
                                    }

                                    //$arr_area_image[]= array('image_id'=>$v_image_count,'image_file'=> $v_tmp_file_name,'image_html'=>'');
                                    if($v_low_res=='') $v_low_res = $v_image_file;
                                    $v_product_images_id = $cls_product_image->select_next('product_images_id');
                                    $v_size = filesize($v_upload_dir.DS.$v_image_file);
                                    $v_tmp_width = isset($width)?$width:0;
                                    $cls_product_image->set_company_id($v_company_id);
                                    $cls_product_image->set_location_id($v_location_id);
                                    $cls_product_image->set_area_id($v_area_id);
                                    $cls_product_image->set_image_size($v_size);
                                    $cls_product_image->set_image_height(isset($height)?$height:0);
                                    $cls_product_image->set_image_width(isset($width)?$width:0);
                                    $cls_product_image->set_product_id(0);
                                    $cls_product_image->set_product_images_id($v_product_images_id);
                                    $cls_product_image->set_product_image($v_image_file);
                                    $cls_product_image->set_saved_dir($v_saved_dir);
                                    $cls_product_image->set_low_res_image($v_low_res);
                                    $cls_product_image->set_date_created(date('Y-m-d H:i:s', time()));
                                    $cls_product_image->set_user_name(isset($arr_user['user_name'])?$arr_user['user_name']:'');
                                    $cls_product_image->set_user_type(isset($arr_user['user_type'])?$arr_user['user_type']:0);
                                    $cls_product_image->set_map_content(array());
                                    $cls_product_image->set_status(0);
                                    $cls_product_image->set_image_type(2);

                                    $v_mongo_id = $cls_product_image->insert();
                                    if(is_null($v_mongo_id)){
                                        $v_error_message .= '+ Image "'.$v_image_file.'" upload, but not save to database<br>';
                                    }else{
                                        $v_error_message .= '+ Image "'.$v_image_file.'" upload success!<br>';
                                    }
                                }
                                else
                                    $v_error_message .=" Can't execute upload images  !...<br>";
                            }else{
                                $v_error_message .=" Can't not dir!... <br>";
                            }
                        }else{
                            $v_error_message .="Error in process!... <br>";
                        }
                    }else{
                        $v_error_message .="File type :".$v_file_ext. "-  Not allow in site.<br>";
                    }
                }
            }
        }else{
            $v_error_message .= '+ Not any image to upload<br />';
        }
        //$cls_location_area->set_area_image($arr_area_image);
    }else{
        $v_error_message .= '+ Can not create new location area<br />';
    }
    /*
    if($v_error_message=="" && $v_area_id==0)
    {
        $v_area_id = $cls_location_area->select_next('area_id');
        $cls_location_area->set_area_id((int)$v_area_id);
        $v_mongo_id = $cls_location_area->insert();
        $v_error_message = '<h3>Insert Successful </h3>';
    }
    */
}
?>