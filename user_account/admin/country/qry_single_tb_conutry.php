<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_country_id = 0;
$v_country_name = '';
$v_country_key = '';
$v_country_order = 0;
$v_country_status = 0;
if(isset($_POST['btn_submit_tb_conutry'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(!is_null($v_mongo_id)) $v_mongo_id = new MongoID($v_mongo_id);
	$cls_tb_conutry->set_mongo_id($v_mongo_id);
	$v_country_id = isset($_POST['txt_country_id'])?$_POST['txt_country_id']:$v_country_id;
	$v_country_id = (int) $v_country_id;
	if($v_country_id<0) $v_error_message .= '[country_id] is negative!<br />';
	$cls_tb_conutry->set_country_id($v_country_id);
	$v_country_name = isset($_POST['txt_country_name'])?$_POST['txt_country_name']:$v_country_name;
	$v_country_name = trim($v_country_name);
	if($v_country_name=='') $v_error_message .= '[country_name] is empty!<br />';
	$cls_tb_conutry->set_country_name($v_country_name);
	$v_country_key = isset($_POST['txt_country_key'])?$_POST['txt_country_key']:$v_country_key;
	$v_country_key = trim($v_country_key);
	if($v_country_key=='') $v_error_message .= '[country_key] is empty!<br />';
	$cls_tb_conutry->set_country_key($v_country_key);
	$v_country_order = isset($_POST['txt_country_order'])?$_POST['txt_country_order']:$v_country_order;
	$v_country_order = (int) $v_country_order;
	if($v_country_order<0) $v_error_message .= '[country_order] is negative!<br />';
	$cls_tb_conutry->set_country_order($v_country_order);
	$v_country_status = isset($_POST['txt_country_status'])?$_POST['txt_country_status']:$v_country_status;
	$v_country_status = (int) $v_country_status;
	if($v_country_status<0) $v_error_message .= '[country_status] is negative!<br />';
	$cls_tb_conutry->set_country_status($v_country_status);
	if($v_error_message==''){
		if(is_null($v_mongo_id))
			$cls_tb_conutry->insert();
		else
			$cls_tb_conutry->update(array('_id' => $v_mongo_id));

		redir(URL. $v_admin_key);
	}
}else{
	$v_country_id = isset($_GET['id'])?$_GET['id']:NULL;
	if($v_country_id!=0){
		$v_mongo_id = new MongoID($v_mongo_id);
		$v_row = $cls_tb_conutry->select_one(array('country_id' => (int)$v_country_id));
		if($v_row == 1){
			$v_country_id = $cls_tb_conutry->get_country_id();
			$v_country_name = $cls_tb_conutry->get_country_name();
			$v_country_key = $cls_tb_conutry->get_country_key();
			$v_country_order = $cls_tb_conutry->get_country_order();
			$v_country_status = $cls_tb_conutry->get_country_status();
		}
	}
}
?>