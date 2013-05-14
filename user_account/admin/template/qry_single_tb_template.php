<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_template_id = 0;
$v_template_name = '';
$v_template_default = '';
$v_date_created = date('Y-m-d H:i:s', time());
if(isset($_POST['btn_submit_tb_template'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_template->set_mongo_id($v_mongo_id);
	$v_template_id = isset($_POST['txt_template_id'])?$_POST['txt_template_id']:$v_template_id;
	if(is_null($v_mongo_id)){
		$v_template_id = $cls_tb_template->select_next('template_id');
	}
	$v_template_id = (int) $v_template_id;
	$cls_tb_template->set_template_id($v_template_id);
	$v_template_name = isset($_POST['txt_template_name'])?$_POST['txt_template_name']:$v_template_name;
	$v_template_name = trim($v_template_name);
	if($v_template_name=='') $v_error_message .= '[Template Name] is empty!<br />';
	$cls_tb_template->set_template_name($v_template_name);
	$v_template_default = isset($_POST['txt_template_default'])?$_POST['txt_template_default']:$v_template_default;
	$v_template_default = trim($v_template_default);
	if($v_template_default=='') $v_error_message .= '[Template Default] is empty!<br />';
	$cls_tb_template->set_template_default($v_template_default);
	$v_date_created = isset($_POST['txt_date_created'])?$_POST['txt_date_created']:$v_date_created;
	if(!check_date($v_date_created)) $v_error_message .= '[Date Created] is invalid date/time!<br />';
	$cls_tb_template->set_date_created($v_date_created);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_template->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_template->update(array('_id' => $v_mongo_id));
		}
		if($v_result) redir(URL.$v_admin_key);
	}
}else{
	$v_template_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_template_id,'int');
	if($v_template_id>0){
		$v_row = $cls_tb_template->select_one(array('template_id' => $v_template_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_template->get_mongo_id();
			$v_template_id = $cls_tb_template->get_template_id();
			$v_template_name = $cls_tb_template->get_template_name();
			$v_template_default = $cls_tb_template->get_template_default();
			$v_date_created = date('Y-m-d H:i:s',$cls_tb_template->get_date_created());
		}
	}
}
?>