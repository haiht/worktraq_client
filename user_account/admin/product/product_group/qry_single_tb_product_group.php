<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_product_group_id = 0;
$v_company_id = 0;
$v_product_group_key = '';
$v_product_group_name = '';
$v_product_group_value = 0;
$v_product_group_overflow = 0;
$v_product_group_order = 0;
$v_product_group_parent = 0;
$v_new_product_group = true;
$arr_list_product = array();
if(isset($_POST['btn_submit_tb_product_group'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_product_group->set_mongo_id($v_mongo_id);
	$v_product_group_id = isset($_POST['txt_product_group_id'])?$_POST['txt_product_group_id']:$v_product_group_id;
	if(is_null($v_mongo_id)){
		$v_product_group_id = $cls_tb_product_group->select_next('product_group_id');
	}
	$v_product_group_id = (int) $v_product_group_id;
	$cls_tb_product_group->set_product_group_id($v_product_group_id);
	$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
	$v_company_id = (int) $v_company_id;
	if($v_company_id<0) $v_error_message .= '[Company Id] is negative!<br />';
	$cls_tb_product_group->set_company_id($v_company_id);
    $v_product_group_key = strtolower($v_product_group_name);
    $v_product_group_key = str_replace(" ","_",$v_product_group_key);
    $cls_tb_product_group->set_product_group_key($v_product_group_key);
	$v_product_group_name = isset($_POST['txt_product_group_name'])?$_POST['txt_product_group_name']:$v_product_group_name;
	$v_product_group_name = trim($v_product_group_name);
	if($v_product_group_name=='') $v_error_message .= '[Product Group Name] is empty!<br />';
	$cls_tb_product_group->set_product_group_name($v_product_group_name);
	$v_product_group_order = isset($_POST['txt_product_group_order'])?$_POST['txt_product_group_order']:$v_product_group_order;
	$v_product_group_order = (int) $v_product_group_order;
	$cls_tb_product_group->set_product_group_order($v_product_group_order);
	$v_product_group_parent = isset($_POST['txt_product_group_parent'])?$_POST['txt_product_group_parent']:$v_product_group_parent;
	$v_product_group_parent = (int) $v_product_group_parent;
	if($v_product_group_parent<0) $v_error_message .= '[Product Group Parent] is negative!<br />';
	$cls_tb_product_group->set_product_group_parent($v_product_group_parent);
    $v_result = false;

    $arr_list_product = isset($_POST['txt_products'])?$_POST['txt_products']:array();
    if(!is_array($arr_list_product)) $arr_list_product = array();
    for($i=0;$i<count($arr_list_product);$i++){
        $arr_list_product[$i] = (int) $arr_list_product[$i];
    }
    $v_data_threshold = isset($_POST['txt_data_threshold'])?$_POST['txt_data_threshold']:'';
    if(get_magic_quotes_gpc()) $v_data_threshold = stripcslashes($v_data_threshold);
    $arr_data_threshold = json_decode($v_data_threshold, true);
    if(!is_array($arr_data_threshold)) $arr_data_threshold = array();
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_product_group->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_product_group->update(array('_id' => $v_mongo_id));
			$v_new_product_group = false;
		}
		if($v_result){
			$_SESSION['ss_tb_product_group_redirect'] = 1;
            $v_result = $cls_tb_product->update_field('product_threshold_group_id', 0, array('company_id'=>$v_company_id, 'product_threshold_group_id'=>$v_product_group_id));
            if($v_result) $cls_tb_product->update_field('product_threshold_group_id', $v_product_group_id, array('company_id'=>$v_company_id, 'product_id'=>array('$in'=>$arr_list_product)));

            $v_result = $cls_tb_location_group_threshold->update_field('company_id',0, array('group_id'=>$v_product_group_id));
            if($v_result){
                for($i=0; $i<count($arr_data_threshold);$i++){
                    $v_location_id = (int) $arr_data_threshold[$i]['location_id'];
                    $v_threshold_value = (int) $arr_data_threshold[$i]['threshold_value'];
                    $v_threshold_note = $arr_data_threshold[$i]['threshold_note'];
                    $v_overflow = $arr_data_threshold[$i]['overflow']?1:0;
                    $v_row = $cls_tb_location_group_threshold->select_one(array('location_id'=>$v_location_id, 'group_id'=>$v_product_group_id));
                    if($v_row==1){
                        $v_lg_threshold_id = $cls_tb_location_group_threshold->get_lg_threshold_id();
                        $cls_tb_location_group_threshold->update_fields(array('company_id', 'threshold_value', 'threshold_note', 'overflow'), array($v_company_id, $v_threshold_value, $v_threshold_note, $v_overflow), array('lg_threshold_id'=>$v_lg_threshold_id));
                    }else{
                        $v_lg_threshold_id = $cls_tb_location_group_threshold->select_next('lg_threshold_id');
                        $cls_tb_location_group_threshold->set_lg_threshold_id($v_lg_threshold_id);
                        $cls_tb_location_group_threshold->set_company_id($v_company_id);
                        $cls_tb_location_group_threshold->set_location_id($v_location_id);
                        $cls_tb_location_group_threshold->set_threshold_value($v_threshold_value);
                        $cls_tb_location_group_threshold->set_threshold_note($v_threshold_note);
                        $cls_tb_location_group_threshold->set_overflow($v_overflow);
                        $cls_tb_location_group_threshold->insert();
                    }
                }
            }
			redir(URL.$v_admin_key);
		}else{
			if($v_new_product_group) $v_product_group_id = 0;
		}
	}
}else{
	$v_product_group_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_product_group_id,'int');
	if($v_product_group_id>0){
		$v_row = $cls_tb_product_group->select_one(array('product_group_id' => $v_product_group_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_product_group->get_mongo_id();
			$v_product_group_id = $cls_tb_product_group->get_product_group_id();
			$v_company_id = $cls_tb_product_group->get_company_id();
			$v_product_group_key = $cls_tb_product_group->get_product_group_key();
			$v_product_group_name = $cls_tb_product_group->get_product_group_name();
			$v_product_group_order = $cls_tb_product_group->get_product_group_order();
			$v_product_group_parent = $cls_tb_product_group->get_product_group_parent();
		}
	}
}
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);

$v_tmp_product_group_id = 0;
$arr_all_product_group = array();
$arr_all_product_group[] = array('product_group_id'=>0, 'product_group_name'=>'--------');

$arr_all_product_group = $cls_tb_product_group->get_tree_product_group($v_company_id, 0,'',$arr_all_product_group);

for($i=0;$i<count($arr_all_product_group);$i++){
    if($arr_all_product_group[$i]['product_group_id']==$v_product_group_id) $v_tmp_product_group_id = $v_product_group_id;
}
$v_product_group_id = $v_tmp_product_group_id;
if($v_company_id>0 && $v_product_group_id>0){
    $arr_product = $cls_tb_product->select(array('company_id'=>$v_company_id, 'product_threshold_group_id'=>$v_product_group_id, 'product_status'=>3));
    foreach($arr_product as $arr){
        $arr_list_product[] = (int) $arr['product_id'];
    }
}
/*
$arr_all_product = array();
$arr_product = $cls_tb_product->select(array('company_id'=>$v_company_id, 'product_status'=>3));
foreach($arr_product as $arr){
    $v_product_id = isset($arr['product_id'])?$arr['product_id']:0;
    $v_product_sku = isset($arr['product_sku'])?$arr['product_sku']:'';
    $v_short_description = isset($arr['short_description'])?$arr['short_description']:'';
    $v_saved_dir = isset($arr['saved_dir'])?$arr['saved_dir']:'';
    $v_image_file = isset($arr['image_file'])?$arr['image_file']:'';
    if($v_product_id>0){
        $arr_all_product[] = array(
            'product_id'=>$v_product_id
            ,'product_sku'=>$v_product_sku
            ,'short_description'=>$v_short_description
            ,'product_image'=>file_exists($v_saved_dir.$v_image_file)?$v_saved_dir.$v_image_file:''
        );
    }
}
*/
?>