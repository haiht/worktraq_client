<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_log_id = 0;
$v_user_id = 0;
$v_user_password = '';
$v_log_ipaddress = '';
$v_log_url = '';
$v_log_datetime = date('Y-m-d H:i:s', time());
if(isset($_POST['btn_submit_tb_user_log'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(!is_null($v_mongo_id)) $v_mongo_id = new MongoID($v_mongo_id);
	$cls_tb_user_log->set_mongo_id($v_mongo_id);
	$v_log_id = isset($_POST['txt_log_id'])?$_POST['txt_log_id']:$v_log_id;
	$v_log_id = (int) $v_log_id;
	if($v_log_id<0) $v_error_message .= '[log_id] is negative!<br />';
	$cls_tb_user_log->set_log_id($v_log_id);
	$v_user_id = isset($_POST['txt_user_id'])?$_POST['txt_user_id']:$v_user_id;
	$v_user_id = (int) $v_user_id;
	if($v_user_id<0) $v_error_message .= '[user_id] is negative!<br />';
	$cls_tb_user_log->set_user_id($v_user_id);
	$v_user_password = isset($_POST['txt_user_password'])?$_POST['txt_user_password']:$v_user_password;
	$v_user_password = trim($v_user_password);
	if($v_user_password=='') $v_error_message .= '[user_password] is empty!<br />';
	$cls_tb_user_log->set_user_password($v_user_password);
	$v_log_ipaddress = isset($_POST['txt_log_ipaddress'])?$_POST['txt_log_ipaddress']:$v_log_ipaddress;
	$v_log_ipaddress = trim($v_log_ipaddress);
	if($v_log_ipaddress=='') $v_error_message .= '[log_ipaddress] is empty!<br />';
	$cls_tb_user_log->set_log_ipaddress($v_log_ipaddress);
	$v_log_url = isset($_POST['txt_log_url'])?$_POST['txt_log_url']:$v_log_url;
	$v_log_url = trim($v_log_url);
	if($v_log_url=='') $v_error_message .= '[log_url] is empty!<br />';
	$cls_tb_user_log->set_log_url($v_log_url);
	$v_log_datetime = isset($_POST['txt_log_datetime'])?$_POST['txt_log_datetime']:$v_log_datetime;
	if(!check_date($v_log_datetime)) $v_error_message .= '[log_datetime] is invalid date/time!<br />';
	$cls_tb_user_log->set_log_datetime($v_log_datetime);
	if($v_error_message==''){
		if(is_null($v_mongo_id))
			$cls_tb_user_log->insert();
		else
			$cls_tb_user_log->update(array('_id' => $v_mongo_id));
		redir('##');
	}
}else{
	$v_mongo_id = isset($_GET['txt_mongo_id'])?$_GET['txt_mongo_id']:NULL;
	if(!is_null($v_mongo_id)){
		$v_mongo_id = new MongoID($v_mongo_id);
		$v_row = $cls_tb_user_log->select_one(array('_id' => $v_mongo_id));
		if($v_row == 1){
			$v_log_id = $cls_tb_user_log->get_log_id();
			$v_user_id = $cls_tb_user_log->get_user_id();
			$v_user_password = $cls_tb_user_log->get_user_password();
			$v_log_ipaddress = $cls_tb_user_log->get_log_ipaddress();
			$v_log_url = $cls_tb_user_log->get_log_url();
			$v_log_datetime = date('Y-m-d H:i:s',$cls_tb_user_log->get_log_datetime());
		}
	}
}
?>