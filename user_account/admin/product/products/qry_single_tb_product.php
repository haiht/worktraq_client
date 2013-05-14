<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_product_id = 0;
$v_product_sku = '0';
$v_product_group_id  = 0;
$v_short_description = '';
$v_long_description = '';
$v_product_detail = '';
$v_size_option = 0;
$arr_tag  = array();
$v_image_option = 0;
$v_image_choose = 0;
$v_print_type = 0;
$v_num_images = 1;
$v_package_type = 0;
$v_package_quantity = 1;
$arr_package_content = array();
$arr_map_content = array();
$v_allow_single = 1;
$v_image_file = '';
$v_image_desc='';
$v_saved_dir='';
$arr_material = array();
$v_text_option = 0;
$arr_text = array();
$v_sold_by = 0;
$v_default_price = 0;
$v_product_status = 0;
$v_company_id = 0;
$v_location_id = 0;
$v_user_name = '';
$v_user_type = 0;
$v_product_threshold_group_id = 0;
$v_product_threshold = -1;
$v_excluded_location = '';
$v_file_hd = '';
//$v_tmp_package_type = 0;
$v_page = isset($_REQUEST['txt_page']) ? $_REQUEST['txt_page'] : 1;
$v_date_created = date('Y-m-d H:i:s');
$v_edit = false;
$v_total_product_images  = 0;
add_class('clsupload');
$cls_upload = new clsupload;
if(isset($_POST['btn_submit_tb_product'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_product->set_mongo_id($v_mongo_id);
	$v_product_id = isset($_POST['txt_product_id'])?$_POST['txt_product_id']:$v_product_id;
	$v_product_id = (int) $v_product_id;
    $v_tmp_product_id = $v_product_id;

    if(is_null($v_mongo_id)){
        $v_product_id = $cls_tb_product->select_next('product_id');
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
            $v_tmp_package_type = $cls_tb_product->get_package_type();
            $v_date_created = $cls_tb_product->get_date_created();
        }
    }

	if($v_product_id<0) $v_error_message .= 'Product Id is negative!<br />';
	$cls_tb_product->set_product_id($v_product_id);
	$v_product_sku = isset($_POST['txt_product_sku'])?$_POST['txt_product_sku']:$v_product_sku;
	$v_product_sku = trim($v_product_sku);
	if($v_product_sku=='') $v_error_message .= 'Product Sku is empty!<br />';
	$cls_tb_product->set_product_sku($v_product_sku);
    $v_product_threshold_group_id = isset($_POST['txt_product_threshold_group_id'])?$_POST['txt_product_threshold_group_id']:$v_product_threshold_group_id;
    $v_product_threshold_group_id = (int) $v_product_threshold_group_id;
    $cls_tb_product->set_product_threshold_group_id($v_product_threshold_group_id);

	$v_short_description = isset($_POST['txt_short_description'])?$_POST['txt_short_description']:$v_short_description;
	$v_short_description = trim($v_short_description);
	//if($v_short_description=='') $v_error_message .= '[short_description] is empty!<br />';
	$cls_tb_product->set_short_description($v_short_description);
	$v_long_description = isset($_POST['txt_long_description'])?$_POST['txt_long_description']:$v_long_description;
	$v_long_description = trim($v_long_description);
	//if($v_long_description=='') $v_error_message .= '[long_description] is empty!<br />';
	$cls_tb_product->set_long_description($v_long_description);
	$v_product_detail = isset($_POST['txt_product_detail'])?$_POST['txt_product_detail']:$v_product_detail;
	$v_product_detail = trim($v_product_detail);
	//if($v_product_detail=='') $v_error_message .= '[product_detail] is empty!<br />';
	$cls_tb_product->set_product_detail($v_product_detail);

    $v_file_hd = isset($_POST['txt_file_hd'])?$_POST['txt_file_hd']:$v_file_hd;
    $cls_tb_product->set_file_hd($v_file_hd);

    $arr_product_tag = isset($_POST['txt_tag_id'])?$_POST['txt_tag_id']:$arr_tag;
    //$v_product_tag = trim($v_product_tag);
    if(!is_array($arr_product_tag)) $arr_product_tag = array();
    for($i=0; $i<count($arr_product_tag); $i++){
        $arr_product_tag[$i] = (int) $arr_product_tag[$i];
    }
    $cls_tb_product->set_tag($arr_product_tag);

	$v_size_option = isset($_POST['txt_size_option'])?1:0;
	$cls_tb_product->set_size_option($v_size_option);

    $v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
    $v_company_id = (int) $v_company_id;
    if($v_company_id<0) $v_error_message .= 'Please choose Company!<br />';
    $cls_tb_product->set_company_id($v_company_id);

    $v_print_type = isset($_POST['txt_print_type'])?$_POST['txt_print_type']:'0';
    settype($v_print_type, 'int');
    if($v_print_type<0 || $v_print_type>2) $v_print_type = 0;
    $cls_tb_product->set_print_type($v_print_type);

	$v_image_option = isset($_POST['txt_image_option'])?1:0;
	$cls_tb_product->set_image_option($v_image_option);
    $v_image_choose = isset($_POST['txt_image_choose'])?1:0;
    $cls_tb_product->set_image_choose($v_image_choose);

    $v_num_images = isset($_POST['txt_num_images'])?$_POST['txt_num_images']:1;
    settype($v_num_images, 'int');
    if($v_num_images<1 || $v_num_images>9) $v_num_images = 1;
    $cls_tb_product->set_num_images($v_num_images);

    $v_upload_dir = "";
    $cls_upload->set_allow_overwrite(1);
    $cls_tb_company = new cls_tb_company($db,LOG_DIR);
    $cls_tb_company->select_one(array("company_id"=>$v_company_id));
    $v_company_code = $cls_tb_company->get_company_code();

    if($v_company_code==''){
        $v_company_name = $cls_tb_company->get_company_name();
        $arr_company_name = explode(' ', $v_company_name);
        for($i=0; $i<count($arr_company_name); $i++){
            $v_tmp = trim($arr_company_name[$i]);
            if($v_tmp!='')
                $v_company_code.= substr($v_tmp,0,1);
        }
        $v_company_code = remove_invailid_char($v_company_code);
        $v_row = $cls_tb_company->select_one(array('company_code'=>$v_company_code));
        if($v_row==1) $v_company_code.='_'.$v_company_id;
        $cls_tb_company->update_field('company_code', $v_company_code, array('company_id'=>$v_company_id));
    }
    $v_upload_dir = PRODUCT_IMAGE_DIR.DS.$v_company_code;
    $v_allow_upload = file_exists($v_upload_dir) || @mkdir($v_upload_dir);
    if($v_allow_upload) $v_upload_dir.=DS.'products';
    $v_allow_upload = file_exists($v_upload_dir) || @mkdir($v_upload_dir);
    if($v_allow_upload) $v_upload_dir.=DS.$v_product_id;
    $v_allow_upload = file_exists($v_upload_dir) || @mkdir($v_upload_dir);

    $v_has_upload = false;

    if($v_allow_upload){
        $cls_upload->set_destination_dir($v_upload_dir);
        $cls_upload->set_field_name('txt_image_file');
        $cls_upload->set_allow_array_extension(array('jpg', 'png'));
        $cls_upload->set_max_size(PRODUCT_UPLOAD_SIZE);
        $cls_upload->upload_process();
        if($cls_upload->get_error_number()==0){
            $v_image_file = $cls_upload->get_filename();
            $v_image_desc = 'Image for current product';
            $v_width = 0;
            list($width, $height) = @getimagesize($v_upload_dir.DS.$v_image_file);
            for($i=0; $i<count($arr_product_image_size); $i++){
                $v_width = $arr_product_image_size[$i];
                if($v_width < $width){
                    images_resize_by_width($v_width, $v_upload_dir.DS.$v_image_file,$v_upload_dir.DS.$v_width.'_'.$v_image_file );
                }
            }
            $v_has_upload = true;
            $v_saved_dir = str_replace(ROOT_DIR.DS, '', $v_upload_dir);
            $v_saved_dir = str_replace(DS, '/', $v_saved_dir).'/';
        }
    }
    if(!$v_has_upload){
        $v_image_file = isset($_POST['txt_hidden_image_file'])?$_POST['txt_hidden_image_file']:'';
        $v_image_desc = isset($_POST['txt_hidden_image_desc'])?$_POST['txt_hidden_image_desc']:'';
        $v_saved_dir = isset($_POST['txt_hidden_saved_dir'])?$_POST['txt_hidden_saved_dir']:'';
    }
    if($v_saved_dir!='' && (strrpos($v_saved_dir,'/')!==strlen($v_saved_dir)-1)) $v_saved_dir.='/';
    $cls_tb_product->set_saved_dir($v_saved_dir);
    $cls_tb_product->set_image_desc($v_image_desc);
    $cls_tb_product->set_image_file($v_image_file);

    $v_material = isset($_POST['txt_product_material'])?$_POST['txt_product_material']:'';
    $arr_material = array();
    if($v_material!=''){
        $v_material = stripcslashes($v_material);
        $arr_material = json_decode($v_material, true);
    }

    $v_location_threshold = isset($_POST['txt_hidden_location_threshold'])?$_POST['txt_hidden_location_threshold']:'';
    if($v_location_threshold!=''){
        $v_location_threshold = stripcslashes($v_location_threshold);
        $arr_location_threshold = json_decode($v_location_threshold, true);
    }else{
        $arr_location_threshold = array();
    }

    $cls_tb_product->set_material($arr_material);
	$v_text_option = isset($_POST['txt_text_option'])?1:0;
	$cls_tb_product->set_text_option($v_text_option);
    $arr_text = array();
	$arr_temp = isset($_POST['txt_product_text'])?$_POST['txt_product_text']:array();

    for($i=0; $i<count($arr_temp); $i++){
        $arr_text[] = array('text'=>$arr_temp[$i], 'color'=>'#000000', 'font-name'=>'Verdana', 'font-size'=>'14pt', 'font-bold'=>1, 'font-italic'=>0, 'left'=>0, 'top'=>0);
    }
	$cls_tb_product->set_text($arr_text);
	$v_sold_by = isset($_POST['txt_sold_by'])?$_POST['txt_sold_by']:$v_sold_by;
	settype($v_sold_by, 'int');
    if($v_sold_by!=1) $v_sold_by=0;
	$cls_tb_product->set_sold_by($v_sold_by);
	$v_default_price = isset($_POST['txt_default_price'])?$_POST['txt_default_price']:$v_default_price;
	$v_default_price = (float) $v_default_price;
	if($v_default_price<0) $v_error_message .= 'Default Price is negative!<br />';
	$cls_tb_product->set_default_price($v_default_price);
	$v_product_status = isset($_POST['txt_product_status'])?$_POST['txt_product_status']:$v_product_status;
	$v_product_status = (int) $v_product_status;
	if($v_product_status<=0) $v_error_message .= 'Please choose Product Status!<br />';
	$cls_tb_product->set_product_status($v_product_status);

    if(isset($_POST['txt_is_threshold'])){
        $v_product_threshold = isset($_POST['txt_product_threshold'])?$_POST['txt_product_threshold']:-1;
        settype($v_product_threshold, 'int');
        if($v_product_threshold<-1) $v_product_threshold = -1;
    }
    $cls_tb_product->set_product_threshold($v_product_threshold);

	$v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:$v_location_id;
	$v_location_id = (int) $v_location_id;
	$cls_tb_product->set_location_id($v_location_id);

    $arr_excluded_location = isset($_POST['txt_excluded_location'])?$_POST['txt_excluded_location']:'';
    $v_excluded_location = is_array($arr_excluded_location)?implode(',',$arr_excluded_location):'';
    $cls_tb_product->set_excluded_location($v_excluded_location);

    $v_package_type = isset($_POST['txt_package_type'])?1:0;
    $cls_tb_product->set_package_type($v_package_type);
    $v_package_quantity = 1;
    $v_allow_single = 1;

    $v_threshold_product_id = $v_product_id;
    if($v_package_type==1){
        $v_package_quantity = isset($_POST['txt_package_quantity'])?$_POST['txt_package_quantity']:'1';
        settype($v_package_quantity, 'int');
        if($v_package_quantity<=1) $v_error_message.='+ Quantity of Multiple must be greater than 1.<br />';
        $v_allow_single = isset($_POST['txt_allow_single'])?1:0;
        if($v_tmp_product_id > 0 && $v_error_message=='' && isset($v_tmp_package_type) && $v_tmp_package_type==0){
            //$v_tmp_product_id = $v_product_id;
            $v_next_product_id = $cls_tb_product->select_next('product_id');

            $cls_product = new cls_tb_product($db, LOG_DIR);
            $v_row = $cls_product->select_one(array('product_id'=>$v_tmp_product_id));
            if($v_row==1){
                $v_threshold_product_id = $v_next_product_id;

                $cls_product->set_product_id($v_next_product_id);
                $cls_product->set_package_quantity(1);
                $cls_product->set_image_option(0);
                $cls_product->set_image_choose($v_image_choose);
                $cls_product->set_size_option(0);
                $cls_product->set_text_option(0);
                //$cls_product->set_material(array());
                $cls_product->set_map_content(array());
                $cls_product->set_sold_by(1);
                $cls_product->set_package_type(1);
                $cls_product->set_allow_single(1);
                $cls_product->set_product_threshold($v_product_threshold);
                $cls_product->set_excluded_location($v_excluded_location);
                $cls_product->set_product_threshold_group_id($v_product_threshold_group_id);
                $cls_product->set_product_status(3);
                $cls_product->set_user_name($v_user_name);
                $cls_product->set_user_type($v_user_type);
                $cls_product->set_date_created(date('Y-m-d H:i:s'));
                $cls_product->set_material(array());
                $cls_product->set_text(array());

                $arr_tmp_package_content = array();
                $arr_tmp_package_content[0] = array(
                    'package_name'=>$cls_tb_product->get_product_sku()
                    ,'package_type'=>0
                    ,'quantity'=>$v_package_quantity
                    ,'price'=>$cls_tb_product->get_default_price()
                    ,'refer_id'=>$v_tmp_product_id
                    ,'package_image'=>$cls_tb_product->get_image_file()
                    ,'saved_dir'=>$cls_tb_product->get_saved_dir()
                    ,'location_id'=>$cls_product->get_location_id()
                    ,'status'=>0
                );
                $cls_product->set_package_content($arr_tmp_package_content);
                $cls_product->set_date_created(date('Y-m-d H:i:s',time()));
                $cls_product->insert();
            }
        }


        if($v_allow_single==0){
            $cls_tb_product->set_image_option(0);
            $cls_tb_product->set_size_option(0);
            $cls_tb_product->set_text_option(0);
            $cls_tb_product->set_package_quantity(1);
			$cls_tb_product->set_allow_single(0);
        }
		$cls_tb_product->set_package_type(0);
    }
    $cls_tb_product->set_package_content($arr_package_content);
    $cls_tb_product->set_allow_single($v_allow_single);
    $cls_tb_product->set_package_quantity($v_package_quantity);
    $cls_tb_product->set_map_content($arr_map_content);
    $cls_tb_product->set_user_name($v_user_name);
    $cls_tb_product->set_user_type($v_user_type);
    $cls_tb_product->set_date_created(date('Y-m-d H:i:s',$v_date_created));



   if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_product->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_product->update(array('_id' => $v_mongo_id));
		}
        if($v_result){
            if(is_array($arr_location_threshold)){
                $v_result = $cls_tb_threshold->delete(array('company_id'=>$v_company_id, 'product_id'=>$v_threshold_product_id));
                if(count($arr_location_threshold)>0){
                    for($i=0; $i<count($arr_location_threshold);$i++){
                        $v_threshold_location_id = (int) $arr_location_threshold[$i]['location_id'];
                        $v_threshold = (int) $arr_location_threshold[$i]['threshold'];
                        $v_overflow = (int) $arr_location_threshold[$i]['overflow'];
                        if($v_overflow!=1) $v_overflow = 0;
                        /*
                        $v_row = $cls_tb_threshold->select_one(array('location_id'=>$v_threshold_location_id, 'product_id'=>$v_threshold_product_id));
                        if($v_row==1){
                            $cls_tb_threshold->set_product_threshold($v_threshold);
                            $cls_tb_threshold->set_is_overflow($v_overflow);
                            $cls_tb_threshold->update();
                        }else{
                        */
                            $v_location_threshold_id = $cls_tb_threshold->select_next('location_threshold_id');
                            if($v_location_threshold_id>0 && $v_threshold_location_id>0){
                                $cls_tb_threshold->set_is_overflow($v_overflow);
                                $cls_tb_threshold->set_location_threshold_id($v_location_threshold_id);
                                $cls_tb_threshold->set_company_id($v_company_id);
                                $cls_tb_threshold->set_product_threshold($v_threshold);
                                $cls_tb_threshold->set_status(0);
                                $cls_tb_threshold->set_location_id($v_threshold_location_id);
                                $cls_tb_threshold->set_product_id($v_threshold_product_id);
                                $cls_tb_threshold->insert();
                            }
                        //}
                    }
                }
            }
        }
		if($v_result) redir(URL.$v_admin_key .($v_page==1?'':'/page'.$v_page));
	}
}else{
	$v_product_id = isset($_GET['id'])?$_GET['id']:0;
    settype($v_product_id, 'int') ;
	if($v_product_id>0){
		$v_row = $cls_tb_product->select_one(array('product_id' => $v_product_id));
		if($v_row == 1){
            $v_mongo_id = $cls_tb_product->get_mongo_id();
			$v_product_id = $cls_tb_product->get_product_id();
			$v_product_sku = $cls_tb_product->get_product_sku();
            $v_product_threshold_group_id = $cls_tb_product->get_product_threshold_group_id();
			$v_short_description = $cls_tb_product->get_short_description();
			$v_long_description = $cls_tb_product->get_long_description();
			$v_product_detail = $cls_tb_product->get_product_detail();
			$v_image_option = $cls_tb_product->get_image_option();
			$v_size_option = $cls_tb_product->get_size_option();
			$v_image_choose = $cls_tb_product->get_image_choose();
			$v_num_images = $cls_tb_product->get_num_images();
			$v_image_file = $cls_tb_product->get_image_file();
            $v_image_desc = $cls_tb_product->get_image_desc();
            $v_saved_dir = $cls_tb_product->get_saved_dir();
            if($v_saved_dir!='' && strrpos($v_saved_dir,'/')!==strlen($v_saved_dir)-1) $v_saved_dir.='/';
			$arr_material = $cls_tb_product->get_material();
			$v_text_option = $cls_tb_product->get_text_option();
			$arr_text = $cls_tb_product->get_text();
			$v_sold_by = $cls_tb_product->get_sold_by();
            settype($v_sold_by,'int');
            if($v_sold_by!=1) $v_sold_by = 0;
			$v_default_price = $cls_tb_product->get_default_price();
			$v_product_status = $cls_tb_product->get_product_status();
			$v_product_threshold = $cls_tb_product->get_product_threshold();
			$v_excluded_location = $cls_tb_product->get_excluded_location();
			$v_company_id = $cls_tb_product->get_company_id();
			$v_location_id = $cls_tb_product->get_location_id();
            $arr_tag = $cls_tb_product->get_tag();
            $v_package_type = $cls_tb_product->get_package_type();
            $v_package_quantity = $cls_tb_product->get_package_quantity();
            $arr_package_content = $cls_tb_product->get_package_content();
            $v_allow_single = $cls_tb_product->get_allow_single();
            $v_edit = true;
            $cls_tb_company = new cls_tb_company($db,LOG_DIR);
            $cls_tb_company->select_one(array("company_id"=>(int)$v_company_id));
            $v_company_code = $cls_tb_company->get_company_code();
            $v_file_hd = $cls_tb_product->get_file_hd();
            $v_print_type = $cls_tb_product->get_print_type();

            /* Total images */
            add_class('cls_tb_product_images');
            $cls_product_images = new cls_tb_product_images($db, LOG_DIR);
            $v_total_product_images = $cls_product_images->count(array('product_id'=>(int)$v_product_id));
            if($v_image_file!='') $v_total_product_images++;
		}
	}
}
$v_dsp_company_draw = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
$v_dsp_material_draw = $cls_tb_material->draw_option('material_id', 'material_name', 0, array('status'=>0, '$where'=>'this.material_option.length>0'));
if($v_company_id>0)
    $v_dsp_location_draw = $cls_tb_location->draw_option('location_id', 'location_name', $v_location_id, array('company_id'=>$v_company_id, 'status'=>0));
else
    $v_dsp_location_draw = '';

$v_dsp_excluded_location = '';
$v_dsp_location_threshold = '';
$v_dsp_script_threshold = '';
if($v_excluded_location!=''){
    $arr_excluded_location = explode(',', $v_excluded_location);
    $arr_where = array();
    $j=0;
    for($i=0; $i<count($arr_excluded_location); $i++){
        $v_tmp_location_id = (int) $arr_excluded_location[$i];
        if($v_tmp_location_id>0){
            $arr_where[$j] = array('location_id'=>$v_tmp_location_id);
            $j++;
        }
    }
    if($j<=1)
        $arr_where_clause = $arr_where[0];
    else
        $arr_where_clause = array('$or'=>$arr_where);
    //print_r($arr_where_clause);
    $arr_location = $cls_tb_location->select($arr_where_clause, array('location_number'=>1));
    foreach($arr_location as $arr){
        $v_ex_location_id = $arr['location_id'];
        $v_ex_location_number = $arr['location_number'];
        $v_ex_location_name = $arr['location_name'];
        $v_ex_location_name = pad_left($v_ex_location_number, 10, '&nbsp;').'  |  '.$v_ex_location_name;
        $v_dsp_excluded_location .= '<option value="'.$v_ex_location_id.'" selected="selected">'.$v_ex_location_name.'</option>';
    }
}

$arr_threshold = $cls_tb_threshold->select(array('product_id'=>$v_product_id, 'company_id'=>$v_company_id));
$i=0;
foreach($arr_threshold as $arr){
    $v_threshold_location_id = $arr['location_id'];
    $v_threshold = $arr['product_threshold'];
    $v_overflow = $arr['is_overflow'];
    $v_threshold_location_name = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_threshold_location_id));

    $v_dsp_location_threshold .= '<option value="'.$v_threshold_location_id.'"'.($v_overflow==1?' selected="selected"':'').'>['.$v_threshold.'] '.$v_threshold_location_name.'</option>';
    $v_dsp_script_threshold .= 'list_threshold['.$i++.'] = new Threshold('.$v_threshold_location_id.',"'.$v_threshold_location_name.'",'.$v_threshold.','.$v_overflow.')'."\n";
}

$v_dsp_tag_draw_multi = $cls_tb_tag->draw_option_multi('tag_id', 'tag_name', $arr_tag,array('company_id'=>(int)$v_company_id));

//$v_dsp_color_draw = $cls_tb_color->draw_option('color_code', 'color_name', 'Black',array('color_status'=>0));
//$v_dsp_color_draw = $cls_tb_color->draw_option('color_code', 'color_name', 'None',array('color_status'=>0));

$v_dsp_product_status_draw = $cls_settings->draw_option_by_id('product_status', 0, $v_product_status);

$v_dsp_size_unit_draw = $cls_settings->draw_option_by_key('size_unit', 0, '');

$v_dsp_sold_by = $cls_settings->draw_option_by_id('sold_by',0,$v_sold_by);

$v_dsp_size_list = '';
$v_dsp_size_script = '';
$v_dsp_size_option = '';
$v_dsp_material_list = '';
$v_dsp_material_script = '';
$v_dsp_text_list = '';
$v_image_url = '';
$v_text_count = 0;

    for($i=0; $i<count($arr_material); $i++){
        $id = isset($arr_material[$i]['id'])?$arr_material[$i]['id']:0;
        $m = isset($arr_material[$i]['name'])?$arr_material[$i]['name']:'';
        $w = isset($arr_material[$i]['width'])?$arr_material[$i]['width']:0;
        $l = isset($arr_material[$i]['length'])?$arr_material[$i]['length']:0;
        $us = isset($arr_material[$i]['usize'])?$arr_material[$i]['usize']:'in';
        $t = isset($arr_material[$i]['thick'])?$arr_material[$i]['thick']:0;
        $c = isset($arr_material[$i]['color'])?$arr_material[$i]['color']:'';
        $ut = isset($arr_material[$i]['uthick'])?$arr_material[$i]['uthick']:'mm';
        $p = isset($arr_material[$i]['price'])?$arr_material[$i]['price']:0;
        $size = isset($arr_material[$i]['size'])?$arr_material[$i]['size']:0;
        settype($id, 'int');
        settype($w, 'float');
        settype($l, 'float');
        settype($t, 'float');
        settype($p, 'float');
        settype($size, 'int');
        //$v_dsp_material_script.="\r\nvar tmp_{$i} = new Array({$m},'{$t}','{$c}', '{$u}', {$p}, 0);";
        $v_dsp_material_script.="\r\nmaterial.push(new Material({$id},'{$m}','{$c}',{$w},{$l},'{$us}',{$t}, '{$ut}', {$p}, {$size}));";
        //$mm = $cls_tb_material->select_scalar('material_name',array('material_id'=>$m));
        //$v_dsp_material_list .= '<div class="node" style="color:'.$c.'" id="material_'.$id.'">'.$m.' ('.$w.' &times; '.$l.' '.$us.') '.$t. ' '.$ut.' &rArr; $'.$p;
        $v_dsp_material_list .= '<div class="node" style="color:black;margin-top: 10px;" id="material_'.$id.'">'.$m.' ('.$w.' &times; '.$l.' '.$us.') '.$t. ' '.$ut.' &rArr; $'.$p . ' - Color:'.$c;
        $v_dsp_material_list .= '<img class="img_action" id="img_material_'.$id.'" data-id="'.$id.'" data-name="'.$m.'" data-width="'.$w.'" data-length="'.$l.'" data-unit-size="'.$us.'" data-thick="'.$t.'" data-unit-thick="'.$ut.'" data-price="'.$p.'" data-color="'.$c.'" data-size="'.$size.'" data-flag="material" src="images/icons/delete.png" />';
        $v_dsp_material_list .= '</div>';
        
    }
    for($i=0; $i<count($arr_text);$i++){
        $v_dsp_text_list .= '<p text="'.$i.'" class="one_text">';
        $v_dsp_text_list .= '<input data-text="'.$i.'" class="text_css" size="50" type="text" id="txt_product_text" name="txt_product_text[]" value="'.$arr_text[$i]['text'].'" />';
        if($i>0){
            $v_dsp_text_list .= '<img class="img_action" data-flag="text" data-text="'.$i.'" style="cursor:pointer" src="images/icons/delete.png" />';
        }
        $v_dsp_text_list .= '</p>';
    }
    $v_text_count = $i;

if($v_edit){

    if($v_image_file!=''){
        if($v_saved_dir==''){
            $v_product_dir = PRODUCT_IMAGE_DIR.DS.$v_company_code.DS.'products'.DS.$v_product_id.DS;
            $v_product_file = PRODUCT_IMAGE_DIR.DS.$v_company_code.DS.'products'.DS.$v_product_id.DS.$v_image_file;
            if(file_exists($v_product_file)){
                $v_src_url =URL.'resources/'.$v_company_code.'/products/'.$v_image_file;
                $v_product_dir_thumb = PRODUCT_IMAGE_DIR.DS.$v_company_code.DS.'products'.DS. $v_product_id .'/'.$v_image_file;

                if(check_file($v_product_dir,$v_image_file,$v_product_id))
                    $v_image_url = '<img src="'.URL.'resources/'.$v_company_code.'/products/'.$v_image_file.'" title="'.$v_image_desc.'" />';
            }
        }else{
            $v_image_dir = $v_saved_dir.$v_product_id.'/'.$v_image_file;

            if(file_exists($v_image_dir))
                $v_image_url = '<img src="'.$v_image_dir.'" title="'.$v_image_desc.'" />';
            else{
                $v_image_dir = $v_saved_dir.$v_image_file;
                if(file_exists($v_image_dir))
                    $v_image_url = '<img src="'.$v_image_dir.'" title="'.$v_image_desc.'" />';
            }
        }
    }
}else{
    $v_dsp_text_list .= '<p text="0" class="one_text">';
    $v_dsp_text_list .= '<input text="0" class="text_css" size="50" type="text" id="txt_product_text" name="txt_product_text[]" value="" />';
    $v_dsp_text_list .= '</p>';
    $v_text_count=1;
}
?>