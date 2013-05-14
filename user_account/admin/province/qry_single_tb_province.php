<?php if(!isset($v_sval)) die();?>
<?php
$cls_tb_country = new cls_tb_conutry($db,LOG_DIR);
$v_error_message = '';
$v_mongo_id = NULL;
$v_province_id = 0;
$v_province_name = '';
$v_province_key = '';
$v_province_status = 0;
$v_province_order = 0;
$v_country_id = 15;
if(isset($_POST['btn_submit_tb_province'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_province->set_mongo_id($v_mongo_id);
	$v_province_id = isset($_POST['txt_province_id'])?$_POST['txt_province_id']:$v_province_id;
	if(is_null($v_mongo_id)){
		$v_province_id = $cls_tb_province->select_next('province_id');
	}
	$v_province_id = (int) $v_province_id;
	$cls_tb_province->set_province_id($v_province_id);
	$v_province_name = isset($_POST['txt_province_name'])?$_POST['txt_province_name']:$v_province_name;
	$v_province_name = trim($v_province_name);
	if($v_province_name=='') $v_error_message .= '[province_name] is empty!<br />';
	$cls_tb_province->set_province_name($v_province_name);
	$v_province_key = isset($_POST['txt_province_key'])?$_POST['txt_province_key']:$v_province_key;
	$v_province_key = trim($v_province_key);
	if($v_province_key=='') $v_error_message .= '[province_key] is empty!<br />';
	$cls_tb_province->set_province_key($v_province_key);
	$v_province_status = isset($_POST['txt_province_status'])?$_POST['txt_province_status']:$v_province_status;
	$v_province_status = (int) $v_province_status;
	if($v_province_status<0) $v_error_message .= '[province_status] is negative!<br />';
	$cls_tb_province->set_province_status($v_province_status);
	$v_province_order = isset($_POST['txt_province_order'])?$_POST['txt_province_order']:$v_province_order;
	$v_province_order = (int) $v_province_order;
	if($v_province_order<0) $v_error_message .= '[province_order] is negative!<br />';
	$cls_tb_province->set_province_order($v_province_order);
	$v_country_id = isset($_POST['txt_country_id'])?$_POST['txt_country_id']:$v_country_id;
	$v_country_id = (int) $v_country_id;
	if($v_country_id<0) $v_error_message .= '[country_id] is negative!<br />';
	$cls_tb_province->set_country_id($v_country_id);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_province->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_province->update(array('_id' => $v_mongo_id));
		}
		if($v_result) redir(URL.$v_admin_key);
	}
}else{
	$v_province_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_province_id,'int');
	if($v_province_id>0){
		$v_row = $cls_tb_province->select_one(array('province_id' => $v_province_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_province->get_mongo_id();
			$v_province_id = $cls_tb_province->get_province_id();
			$v_province_name = $cls_tb_province->get_province_name();
			$v_province_key = $cls_tb_province->get_province_key();
			$v_province_status = $cls_tb_province->get_province_status();
			$v_province_order = $cls_tb_province->get_province_order();
			$v_country_id = $cls_tb_province->get_country_id();
		}
	}
}
?>