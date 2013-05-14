<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_global_id = 0;
$v_global_key = '';
$v_global_name = '';
$v_global_description = '';
$v_global_value = '';
$v_setting_name = '';
$v_setting_key = '';
if(isset($_POST['btn_submit_tb_global'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_global->set_mongo_id($v_mongo_id);
	$v_global_id = isset($_POST['txt_global_id'])?$_POST['txt_global_id']:$v_global_id;
	if(is_null($v_mongo_id)){
		$v_global_id = $cls_tb_global->select_next('global_id');
	}
	$v_global_id = (int) $v_global_id;
	$cls_tb_global->set_global_id($v_global_id);
	$v_global_key = isset($_POST['txt_global_key'])?$_POST['txt_global_key']:$v_global_key;
	$v_global_key = trim($v_global_key);
	if($v_global_key=='') $v_error_message .= '[Global Key] is empty!<br />';
	$cls_tb_global->set_global_key($v_global_key);
	$v_global_name = isset($_POST['txt_global_name'])?$_POST['txt_global_name']:$v_global_name;
	$v_global_name = trim($v_global_name);
	if($v_global_name=='') $v_error_message .= '[Global Name] is empty!<br />';
	$cls_tb_global->set_global_name($v_global_name);
	$v_global_description = isset($_POST['txt_global_description'])?$_POST['txt_global_description']:$v_global_description;
	$v_global_description = trim($v_global_description);
	if($v_global_description=='') $v_error_message .= '[Global Description] is empty!<br />';
	$cls_tb_global->set_global_description($v_global_description);
	$v_global_value = isset($_POST['txt_global_value'])?$_POST['txt_global_value']:$v_global_value;
	$v_global_value = trim($v_global_value);
	if($v_global_value=='') $v_error_message .= '[Global Value] is empty!<br />';
	$cls_tb_global->set_global_value($v_global_value);
	$v_setting_name = isset($_POST['txt_setting_name'])?$_POST['txt_setting_name']:$v_setting_name;
	$v_setting_name = trim($v_setting_name);
	if($v_setting_name=='') $v_error_message .= '[Setting Name] is empty!<br />';
	$cls_tb_global->set_setting_name($v_setting_name);
	$v_setting_key = isset($_POST['txt_setting_key'])?$_POST['txt_setting_key']:$v_setting_key;
	$v_setting_key = trim($v_setting_key);
	if($v_setting_key=='') $v_error_message .= '[Setting Key] is empty!<br />';
	$cls_tb_global->set_setting_key($v_setting_key);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_global->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_global->update(array('_id' => $v_mongo_id));
		}
		if($v_result) redir(URL.$v_admin_key);
	}
}else{
	$v_global_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_global_id,'int');
	if($v_global_id>0){
		$v_row = $cls_tb_global->select_one(array('global_id' => $v_global_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_global->get_mongo_id();
			$v_global_id = $cls_tb_global->get_global_id();
			$v_global_key = $cls_tb_global->get_global_key();
			$v_global_name = $cls_tb_global->get_global_name();
			$v_global_description = $cls_tb_global->get_global_description();
			$v_global_value = $cls_tb_global->get_global_value();
			$v_setting_name = $cls_tb_global->get_setting_name();
			$v_setting_key = $cls_tb_global->get_setting_key();
		}
	}
}
?>