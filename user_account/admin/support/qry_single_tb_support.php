<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_support_id = 0;
$v_support_title = '';
$v_support_description = '';
$v_company_id = 0;
$v_location_id = 0;
$v_contact_id = 0;
$v_date_created = date('Y-m-d H:i:s', time());
$v_username = '';
$v_image_file = '';
if(isset($_POST['btn_submit_tb_support'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_support->set_mongo_id($v_mongo_id);
	$v_support_id = isset($_POST['txt_support_id'])?$_POST['txt_support_id']:$v_support_id;
	$v_support_id = (int) $v_support_id;
	if($v_support_id<0) $v_error_message .= '[support_id] is negative!<br />';
	$cls_tb_support->set_support_id($v_support_id);
	$v_support_title = isset($_POST['txt_support_title'])?$_POST['txt_support_title']:$v_support_title;
	$v_support_title = trim($v_support_title);
	if($v_support_title=='') $v_error_message .= '[support_title] is empty!<br />';
	$cls_tb_support->set_support_title($v_support_title);
	$v_support_description = isset($_POST['txt_support_description'])?$_POST['txt_support_description']:$v_support_description;
	$v_support_description = trim($v_support_description);
	if($v_support_description=='') $v_error_message .= '[support_description] is empty!<br />';
	$cls_tb_support->set_support_description($v_support_description);
	$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
	$v_company_id = (int) $v_company_id;
	if($v_company_id<0) $v_error_message .= '[company_id] is negative!<br />';
	$cls_tb_support->set_company_id($v_company_id);
	$v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:$v_location_id;
	$v_location_id = (int) $v_location_id;
	if($v_location_id<0) $v_error_message .= '[location_id] is negative!<br />';
	$cls_tb_support->set_location_id($v_location_id);
	$v_contact_id = isset($_POST['txt_contact_id'])?$_POST['txt_contact_id']:$v_contact_id;
	$v_contact_id = (int) $v_contact_id;
	if($v_contact_id<0) $v_error_message .= '[contact_id] is negative!<br />';
	$cls_tb_support->set_contact_id($v_contact_id);
	$v_date_created = isset($_POST['txt_date_created'])?$_POST['txt_date_created']:$v_date_created;
	if(!check_date($v_date_created)) $v_error_message .= '[date_created] is invalid date/time!<br />';
	$cls_tb_support->set_date_created($v_date_created);
	$v_username = isset($_POST['txt_username'])?$_POST['txt_username']:$v_username;
	$v_username = trim($v_username);
	if($v_username=='') $v_error_message .= '[username] is empty!<br />';
	$cls_tb_support->set_username($v_username);
	$v_image_file = isset($_POST['txt_image_file'])?$_POST['txt_image_file']:$v_image_file;
	$v_image_file = trim($v_image_file);
	if($v_image_file=='') $v_error_message .= '[image_file] is empty!<br />';
	$cls_tb_support->set_image_file($v_image_file);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_support->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_support->update(array('_id' => $v_mongo_id));
		}
		if($v_result) redir(URL.$v_admin_key);
	}
}else{
	$v_mongo_id = isset($_GET['txt_mongo_id'])?$_GET['txt_mongo_id']:NULL;
	if(!is_null($v_mongo_id)){
		$v_mongo_id = new MongoID($v_mongo_id);
		$v_row = $cls_tb_support->select_one(array('_id' => $v_mongo_id));
		if($v_row == 1){
			$v_support_id = $cls_tb_support->get_support_id();
			$v_support_title = $cls_tb_support->get_support_title();
			$v_support_description = $cls_tb_support->get_support_description();
			$v_company_id = $cls_tb_support->get_company_id();
			$v_location_id = $cls_tb_support->get_location_id();
			$v_contact_id = $cls_tb_support->get_contact_id();
			$v_date_created = date('Y-m-d H:i:s',$cls_tb_support->get_date_created());
			$v_username = $cls_tb_support->get_username();
			$v_image_file = $cls_tb_support->get_image_file();
		}
	}
}
?>