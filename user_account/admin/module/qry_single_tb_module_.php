<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_module_id = 0;
$v_module_pid = 0;
$v_module_text = '';
$v_module_key = '';
$v_module_type = 0;
$v_module_root = 'admin';
$v_module_dir = '';
$v_module_icon = '';
$v_module_menu = '';
$v_module_role = 0;
$arr_module_role = 0;
$v_module_order = 0;
$v_module_index = 'index.php';
$v_module_locked = 0;
$v_module_time = date('Y-m-d H:i:s', time());
$v_module_category = 0;
$v_module_description = '';
if(isset($_POST['btn_submit_tb_module'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_module->set_mongo_id($v_mongo_id);
	$v_module_id = isset($_POST['txt_module_id'])?$_POST['txt_module_id']:$v_module_id;
	if(is_null($v_mongo_id)){
		$v_module_id = $cls_tb_module->select_next('module_id');
	}
	$v_module_id = (int) $v_module_id;
	$cls_tb_module->set_module_id($v_module_id);
	$v_module_pid = isset($_POST['txt_module_pid'])?$_POST['txt_module_pid']:$v_module_pid;
	$v_module_pid = (int) $v_module_pid;
	if($v_module_pid<0) $v_error_message .= '[Module Pid] is negative!<br />';
	$cls_tb_module->set_module_pid($v_module_pid);
	$v_module_text = isset($_POST['txt_module_text'])?$_POST['txt_module_text']:$v_module_text;
	$v_module_text = trim($v_module_text);
	if($v_module_text=='') $v_error_message .= '[Module Text] is empty!<br />';
	$cls_tb_module->set_module_text($v_module_text);
	$v_module_key = isset($_POST['txt_module_key'])?$_POST['txt_module_key']:$v_module_key;
	$v_module_key = trim($v_module_key);
	if($v_module_key=='') $v_error_message .= '[Module Key] is empty!<br />';
	$cls_tb_module->set_module_key($v_module_key);
	$v_module_type = isset($_POST['txt_module_type'])?$_POST['txt_module_type']:$v_module_type;
	$v_module_type = (int) $v_module_type;
	if($v_module_type<0) $v_error_message .= '[Module Type] is negative!<br />';
	$cls_tb_module->set_module_type($v_module_type);
	$v_module_root = isset($_POST['txt_module_root'])?$_POST['txt_module_root']:$v_module_root;
	$v_module_root = trim($v_module_root);
	if($v_module_root=='') $v_error_message .= '[Module Root] is empty!<br />';
	$cls_tb_module->set_module_root($v_module_root);
	$v_module_dir = isset($_POST['txt_module_dir'])?$_POST['txt_module_dir']:$v_module_dir;
	$v_module_dir = trim($v_module_dir);
	if($v_module_dir=='') $v_error_message .= '[Module Dir] is empty!<br />';
	$cls_tb_module->set_module_dir($v_module_dir);
	$v_module_icon = isset($_POST['txt_module_icon'])?$_POST['txt_module_icon']:$v_module_icon;
	$v_module_icon = trim($v_module_icon);
	if($v_module_icon=='') $v_error_message .= '[Module Icon] is empty!<br />';
	$cls_tb_module->set_module_icon($v_module_icon);
	$v_module_menu = isset($_POST['txt_module_menu'])?$_POST['txt_module_menu']:$v_module_menu;
	$v_module_menu = trim($v_module_menu);
	if($v_module_menu=='') $v_error_message .= '[Module Menu] is empty!<br />';
	$cls_tb_module->set_module_menu($v_module_menu);
	$v_module_role = isset($_POST['txt_module_role'])?$_POST['txt_module_role']:$v_module_role;
	$v_module_role = (int) $v_module_role;
	if($v_module_role<0) $v_error_message .= '[Module Role] is negative!<br />';
	$cls_tb_module->set_module_role($v_module_role);
	$arr_module_role = isset($_POST['txt_module_role'])?$_POST['txt_module_role']:$arr_module_role;
	$cls_tb_module->set_module_role($arr_module_role);
	$v_module_order = isset($_POST['txt_module_order'])?$_POST['txt_module_order']:$v_module_order;
	$v_module_order = (int) $v_module_order;
	if($v_module_order<0) $v_error_message .= '[Module Order] is negative!<br />';
	$cls_tb_module->set_module_order($v_module_order);
	$v_module_index = isset($_POST['txt_module_index'])?$_POST['txt_module_index']:$v_module_index;
	$v_module_index = trim($v_module_index);
	if($v_module_index=='') $v_error_message .= '[Module Index] is empty!<br />';
	$cls_tb_module->set_module_index($v_module_index);
	$v_module_locked = isset($_POST['txt_module_locked'])?$_POST['txt_module_locked']:$v_module_locked;
	$v_module_locked = (int) $v_module_locked;
	if($v_module_locked<0) $v_error_message .= '[Module Locked] is negative!<br />';
	$cls_tb_module->set_module_locked($v_module_locked);
	$v_module_time = isset($_POST['txt_module_time'])?$_POST['txt_module_time']:$v_module_time;
	if(!check_date($v_module_time)) $v_error_message .= '[Module Time] is invalid date/time!<br />';
	$cls_tb_module->set_module_time($v_module_time);
	$v_module_category = isset($_POST['txt_module_category'])?$_POST['txt_module_category']:$v_module_category;
	$v_module_category = (int) $v_module_category;
	if($v_module_category<0) $v_error_message .= '[Module Category] is negative!<br />';
	$cls_tb_module->set_module_category($v_module_category);
	$v_module_description = isset($_POST['txt_module_description'])?$_POST['txt_module_description']:$v_module_description;
	$v_module_description = trim($v_module_description);
	if($v_module_description=='') $v_error_message .= '[Module Description] is empty!<br />';
	$cls_tb_module->set_module_description($v_module_description);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_module->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_module->update(array('_id' => $v_mongo_id));
		}
		if($v_result) redir(URL.$v_admin_key);
	}
}else{
	$v_module_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_module_id,'int');
	if($v_module_id>0){
		$v_row = $cls_tb_module->select_one(array('module_id' => $v_module_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_module->get_mongo_id();
			$v_module_id = $cls_tb_module->get_module_id();
			$v_module_pid = $cls_tb_module->get_module_pid();
			$v_module_text = $cls_tb_module->get_module_text();
			$v_module_key = $cls_tb_module->get_module_key();
			$v_module_type = $cls_tb_module->get_module_type();
			$v_module_root = $cls_tb_module->get_module_root();
			$v_module_dir = $cls_tb_module->get_module_dir();
			$v_module_icon = $cls_tb_module->get_module_icon();
			$v_module_menu = $cls_tb_module->get_module_menu();
			$v_module_role = $cls_tb_module->get_module_role();
			$arr_module_role = $cls_tb_module->get_module_role();
			$v_module_order = $cls_tb_module->get_module_order();
			$v_module_index = $cls_tb_module->get_module_index();
			$v_module_locked = $cls_tb_module->get_module_locked();
			$v_module_time = date('Y-m-d H:i:s',$cls_tb_module->get_module_time());
			$v_module_category = $cls_tb_module->get_module_category();
			$v_module_description = $cls_tb_module->get_module_description();
		}
	}
}
?>