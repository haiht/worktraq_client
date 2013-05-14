<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_package_id = 0;
$v_package_sku = '';
$v_short_description = '';
$v_long_description = '';
$v_package_detail = '';
$v_package_image = '';
$v_saved_dir = '';
$v_package_status = 0;
$v_package_type = -1;
$v_package_price = 0;
$arr_package_content = array();
$arr_map_content = array();
$v_location_id = 0;
$v_company_id = 0;
$v_user_name = '';
$v_user_type = 5;
$v_dsp_package_content = '';
$v_date_created = time();
$arr_tag = array();
$arr_taxonomy = array();

if(isset($_SESSION['ss_package'])) unset($_SESSION['ss_package']);
if(isset($_POST['btn_submit_tb_product_packages'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:'';
    if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;

	$cls_tb_product->set_mongo_id($v_mongo_id);
	$v_package_id = isset($_POST['txt_package_id'])?$_POST['txt_package_id']:$v_package_id;
	$v_package_id = (int) $v_package_id;
    if(is_null($v_mongo_id)){
        $v_package_id = $cls_tb_product->select_next('product_id');
        $v_user_name = isset($arr_user['user_name'])?$arr_user['user_name']:'';
        $v_user_type = isset($arr_user['user_type'])?$arr_user['user_type']:0;
        settype($v_user_type, 'int');
        $v_date_created = time();
    }else{
        $v_row = $cls_tb_product->select_one(array('_id'=>$v_mongo_id));
        if($v_row==1){
            $arr_package_content = $cls_tb_product->get_package_content();
            $arr_map_content = $cls_tb_product->get_map_content();
            $v_product_id = $cls_tb_product->get_product_id();
            $v_user_name = $cls_tb_product->get_user_name();
            $v_user_type = $cls_tb_product->get_user_type();
            $v_date_created = $cls_tb_product->get_date_created();
        }
    }

	if($v_package_id<=0) $v_error_message .= 'Package id is negative!<br />';
	$cls_tb_product->set_product_id($v_package_id);
	$v_package_sku = isset($_POST['txt_package_sku'])?$_POST['txt_package_sku']:$v_package_name;
	$v_package_sku = trim($v_package_sku);
	if($v_package_sku=='') $v_error_message .= 'Package Sku is empty!<br />';
	$cls_tb_product->set_product_sku($v_package_sku);
	$v_short_description = isset($_POST['txt_short_description'])?$_POST['txt_short_description']:$v_short_description;
	$v_short_description = trim($v_short_description);
	$cls_tb_product->set_short_description($v_short_description);

    $v_long_description = isset($_POST['txt_long_description'])?$_POST['txt_long_description']:$v_long_description;
    $v_long_description = trim($v_long_description);
    $cls_tb_product->set_long_description($v_long_description);

    $v_package_detail = isset($_POST['txt_package_detail'])?$_POST['txt_package_detail']:$v_package_detail;
    $v_package_detail = trim($v_package_detail);
    $cls_tb_product->set_product_detail($v_package_detail);


    $v_package_status = isset($_POST['txt_package_status'])?0:1;
    $v_package_status = (int) $v_package_status;
    if($v_package_status<0) $v_error_message .= 'Status is negative!<br />';
    $cls_tb_product->set_product_status($v_package_status);
    $v_package_type = isset($_POST['txt_package_type'])?$_POST['txt_package_type']:$v_package_type;
    $v_package_type = (int) $v_package_type;
    if($v_package_type<0) $v_error_message .= 'Package Type is negative!<br />';
    $cls_tb_product->set_package_type($v_package_type);

    $v_package_content = isset($_POST['txt_hidden_package_content'])?$_POST['txt_hidden_package_content']:'';
    $v_package_content = stripcslashes($v_package_content);
    $arr_package_content = json_decode($v_package_content, true);
    if(!is_array($arr_package_content)) $arr_package_content = array();
    //print_r($arr_package_content);

    $v_package_price = isset($_POST['txt_package_price'])?$_POST['txt_package_price']:$v_package_price;
    $v_package_price = (float) $v_package_price;
    if($v_package_price<0) $v_error_message .= 'Package Price id is negative!<br />';
    $cls_tb_product->set_default_price($v_package_price);

    $v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:$v_location_id;
    $v_location_id = (int) $v_location_id;
    if($v_location_id<0) $v_error_message .= 'Location id is negative!<br />';
    $cls_tb_product->set_location_id($v_location_id);
    $v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
    $v_company_id = (int) $v_company_id;
    if($v_company_id<=0) $v_error_message .= 'Company id is negative!<br />';
    $cls_tb_product->set_company_id($v_company_id);
    //$v_user_name = $arr_user['user_name'];
    $cls_tb_product->set_user_name($v_user_name);
    $cls_tb_product->set_date_created(date('Y-m-d H:i:s'));


    $v_company_code = '';
    if($v_company_id>0){
        $v_row = $cls_tb_company->select_one(array('company_id'=>$v_company_id));
        if($v_row==1){
            $v_company_code = $cls_tb_company->get_company_code();
        }
    }

    //die('C: '.$v_company_code.' ID: '.$v_company_id);
    if($v_company_code!=''){
        if(!file_exists($v_upload_dir = PRODUCT_IMAGE_DIR.DS.$v_company_code)){
            mkdir($v_upload_dir = PRODUCT_IMAGE_DIR.DS.$v_company_code);
            $v_upload_dir .= DS.'products';
        }
    }
    $v_has_upload = false;
    //$v_package_image=isset($_POST['txt_hidden_package_image'])?$_POST['txt_hidden_package_image']:'';;
    //$v_saved_dir = isset($_POST['txt_hidden_saved_dir'])?$_POST['txt_hidden_saved_dir']:'';
    if($v_error_message=='' && $v_company_code!=''){
        if(!file_exists($v_upload_dir = PRODUCT_IMAGE_DIR.DS.$v_company_code)){
            if(@mkdir($v_upload_dir = PRODUCT_IMAGE_DIR.DS.$v_company_code))
                $v_upload_dir .= DS.'products';
        }else{
            $v_upload_dir = PRODUCT_IMAGE_DIR.DS.$v_company_code.DS.'products';
        }
        if(file_exists($v_upload_dir) || @mkdir($v_upload_dir) ){
            $v_upload_dir.=DS.$v_package_id;
            if(file_exists($v_upload_dir) || @mkdir($v_upload_dir) ){
                $cls_upload = new clsupload();
                $cls_upload->set_destination_dir($v_upload_dir);
                $cls_upload->set_field_name('txt_package_image');
                $cls_upload->set_allow_array_extension(array('jpg', 'png'));
                $cls_upload->set_max_size(PRODUCT_UPLOAD_SIZE);
                $cls_upload->upload_process();
                if($cls_upload->get_error_number()==0){
                    $v_package_image = $cls_upload->get_filename();
                    $v_saved_dir = $v_upload_dir;
                    $v_width = 0;
                    list($width, $height) = @getimagesize($v_upload_dir.DS.$v_package_image);
                    for($i=0; $i<count($arr_product_image_size); $i++){
                        $v_width = $arr_product_image_size[$i];
                        if($v_width < $width){
                            images_resize_by_width($v_width, $v_upload_dir.DS.$v_package_image,$v_upload_dir.DS.$v_width.'_'.$v_package_image);
                        }
                    }
                    $v_has_upload = true;
                    //if(DS=="\\"){
                        $v_saved_dir = str_replace(ROOT_DIR.DS,'', $v_upload_dir);
                        $v_saved_dir = str_replace(DS,'/', $v_saved_dir);
                    //}
                } else{
                    //die($cls_upload->get_error_message());
                }
            }
        }
        //if(!$v_has_upload){
        //    $v_package_image = isset($_POST['txt_hidden_package_image'])?$_POST['txt_hidden_package_image']:'';
        //    $v_saved_dir = isset($_POST['txt_hidden_saved_dir'])?$_POST['txt_hidden_saved_dir']:'';
        //}
    }
    if(!$v_has_upload){
        $v_package_image = isset($_POST['txt_hidden_image_file'])?$_POST['txt_hidden_image_file']:'';
        $v_image_desc = isset($_POST['txt_hidden_image_desc'])?$_POST['txt_hidden_image_desc']:'';
        $v_saved_dir = isset($_POST['txt_hidden_saved_dir'])?$_POST['txt_hidden_saved_dir']:'';
    }
    //$arr_taxonomy = isset($_POST['txt_taxonomy_id'])?$_POST['txt_taxonomy_id']:array();
    //if(!is_array($arr_taxonomy)) $arr_taxonomy = array();
    //$cls_tb_product->set_taxonomy($arr_taxonomy);

    $arr_tag = isset($_POST['txt_tag_id'])?$_POST['txt_tag_id']:array();
    if(!is_array($arr_tag)) $arr_tag = array();
    for($i=0; $i<count($arr_tag);$i++)
        $arr_tag[$i] = (int) $arr_tag[$i];
    $cls_tb_product->set_tag($arr_tag);

    $cls_tb_product->set_image_option(0);
    $cls_tb_product->set_text_option(0);
    $cls_tb_product->set_size_option(0);
    $cls_tb_product->set_material(array());

    $cls_tb_product->set_image_file($v_package_image);
    $cls_tb_product->set_saved_dir($v_saved_dir);

    $cls_tb_product->set_package_content($arr_package_content);
    $cls_tb_product->set_map_content($arr_map_content);
    $cls_tb_product->set_user_type($v_user_type);
    $cls_tb_product->set_user_name($v_user_name);
    $cls_tb_product->set_num_images(1);


	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_product->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_product->update(array('_id' => $v_mongo_id));
		}
		if($v_result) redir(URL.$v_admin_key);
	}
}else{
	$v_package_id = isset($_GET['id'])?$_GET['id']:0;
    settype($v_package_id, 'int');
	if($v_package_id>0){
		$v_row = $cls_tb_product->select_one(array('product_id' => $v_package_id));
		if($v_row == 1){
            $v_mongo_id = $cls_tb_product->get_mongo_id();
			$v_package_id = $cls_tb_product->get_product_id();
			$v_package_sku = $cls_tb_product->get_product_sku();
			$v_shot_description = $cls_tb_product->get_short_description();
			$v_long_description = $cls_tb_product->get_long_description();
			$v_package_detail = $cls_tb_product->get_product_detail();
			$v_package_image = $cls_tb_product->get_image_file();
			$v_image_desc = $cls_tb_product->get_image_file();
			$v_saved_dir = $cls_tb_product->get_saved_dir();
			$v_package_status = $cls_tb_product->get_product_status();
			$v_package_type = $cls_tb_product->get_package_type();
			$v_package_price = $cls_tb_product->get_default_price();
			$arr_package_content = $cls_tb_product->get_package_content();
			$v_location_id = $cls_tb_product->get_location_id();
			$v_company_id = $cls_tb_product->get_company_id();
			$v_user_name = $cls_tb_product->get_user_name();
			$v_date_created = date('Y-m-d H:i:s',$cls_tb_product->get_date_created());
            $arr_tag = $cls_tb_product->get_tag();
            //$arr_taxonomy = $cls_tb_product->get_taxonomy();
            if($v_saved_dir!='' && $v_package_image!=''){
                if(strrpos($v_saved_dir, '/')!==strlen($v_saved_dir)-1) $v_saved_dir.='/';
                if(file_exists($v_saved_dir.DS.$v_package_image)){
                    if(file_exists($v_saved_dir.DS.PRODUCT_IMAGE_THUMB.'_'.$v_package_image))
                        $v_image_tag = '<img src="'.$v_saved_dir. PRODUCT_IMAGE_NORMAL.'_'. $v_package_image.'" style="max-width: 500px;" />';
                    else
                        $v_image_tag = '<img src="'.$v_saved_dir. $v_package_image.'" style="max-width: 500px;" />';
                }
            }
            $_SESSION['ss_package'] = $v_package_id;
		}
	}
}

$v_dsp_script = "\n".'var arr_package = new Array();';

$arr_tmp_package = array(
    0 => array('type'=>'single', 'name'=>'Single', 'content'=>array())
    ,1=>array('type'=>'multiple','name'=>'Multiple', 'content'=>array())
    ,2=>array('type'=>'set','name'=>'Set', 'content'=>array())
    ,3=>array('type'=>'package','name'=>'Package', 'content'=>array())
    ,4=>array('type'=>'kit','name'=>'Kit', 'content'=>array())
);
$j=0;
//print_r($arr_package_content);
for($i=0; $i<count($arr_package_content); $i++){
    $v_tmp_package_type = isset($arr_package_content[$i]['package_type'])?$arr_package_content[$i]['package_type']:0;
    $v_tmp_package_type+=1;
    if(isset($arr_tmp_package[$v_tmp_package_type])){
        $v_index = count($arr_tmp_package[$v_tmp_package_type]['content']);
        $arr_tmp_package[$v_tmp_package_type]['content'][$v_index] = array(
            'package_name'=>$arr_package_content[$i]['package_name']
            ,'package_image'=>$arr_package_content[$i]['package_image']
            ,'package_type'=>$arr_package_content[$i]['package_type']
            ,'refer_id'=>$arr_package_content[$i]['refer_id']
            ,'quantity'=>$arr_package_content[$i]['quantity']
            ,'price'=>$arr_package_content[$i]['price']
            ,'saved_dir'=>$arr_package_content[$i]['saved_dir']
            ,'location_id'=>$arr_package_content[$i]['location_id']
        );
        $v_dsp_script .= "\n".'arr_package['.($j++).'] = new Package(\''.$arr_package_content[$i]['package_name'].'\','.($v_tmp_package_type-1).','.$arr_package_content[$i]['refer_id'].', '.$arr_package_content[$i]['quantity'].', '.$arr_package_content[$i]['price'].', \''.$arr_package_content[$i]['package_image'].'\', \''.$arr_package_content[$i]['saved_dir'].'\', '.$arr_package_content[$i]['location_id'].');';
    }
}

//print_r($arr_tmp_package);
for($i=0;$i<count($arr_tmp_package);$i++){
    $v_div_type = $arr_tmp_package[$i]['type'];
    $v_div_name = $arr_tmp_package[$i]['name'];

    $v_show_div = ' style="display:none"';
    //$v_show_div = ' ABCD';
    if($v_package_type>=$i) $v_show_div = '';
    $v_dsp_package_content.='<div id="div_wrapper_'.$v_div_type.'" class="div_wrapper"'.$v_show_div.'><div class="div_package" id="div_'.$v_div_type.'"><a rel="rel_package" href="'.URL.$v_admin_key.'/'.$i.'/choose">'.$v_div_name.'</a>: </div>';
    $arr = $arr_tmp_package[$i]['content'];
    //print_r($arr);
    //echo '<br>I: '.$i.'<br>';
    for($j=0; $j<count($arr); $j++){
        $v_image = $arr[$j]['package_image'];
        $v_type = $arr[$j]['package_type'];
        $v_dir = $arr[$j]['saved_dir'];
        $v_location = $arr[$j]['location_id'];
        $v_dsp_package_content.='<div class="node">'.$arr[$j]['package_name'].' ['.$arr[$j]['quantity'].'] <img class="img_action" data-id="'.$arr[$j]['refer_id'].'" data-type="'.$v_type.'" data-location="'.$v_location.'" data-image="'.$v_image.'" data-dir="'.$v_dir.'" src="images/icons/delete.png" /></div>';
    }
    $v_dsp_package_content.='</div>';
}

//$v_dsp_taxonomy_draw_multi = $cls_tb_taxonomy->draw_option_multi('taxonomy_id', 'taxonomy_name', $arr_taxonomy);

$v_dsp_tag_draw_multi = $cls_tb_tag->draw_option_multi('tag_id', 'tag_name', $arr_tag,array('company_id'=>(int) $v_company_id));

$v_dsp_company_draw = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
if($v_company_id>0)
    $v_dsp_location_draw = $cls_tb_location->draw_option('location_id', 'location_name', $v_location_id, array('company_id'=>$v_company_id, 'status'=>0));
else
    $v_dsp_location_draw = '';
    $v_dsp_settings_draw = $cls_settings->draw_option_by_id('package_type',1, $v_package_type, array(0,1));

if($v_company_id>0){
    $_SESSION['ss_package'] = serialize(array('company_id'=>$v_company_id));
    setcookie('ck_package_company', $v_company_id, time()+300);
    setcookie('ck_package_location', $v_location_id, time()+300);
}else{
    if(isset($_COOKIE['ck_package_company'])) unset($_COOKIE['ck_package_company']);
    if(isset($_COOKIE['ck_package_location'])) unset($_COOKIE['ck_package_location']);
}
?>