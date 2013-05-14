<?php

if(!isset($v_sval)) redir(URL);
$v_acc = isset($_GET['key'])?$_GET['key']:'';
if($v_acc!=''){
	if(strrpos($v_acc,'/')==(strlen($v_acc)-1)) $v_acc = substr($v_acc,0, strlen($v_acc)-1);
}
$v_time_start = microtime(true);
$v_main_site_title =  'WorkTraq';
$v_sub_site_title = 'Admin Panel';
$v_website_testing = false;

add_class('cls_tb_module');
add_class('cls_settings');
add_class('cls_tb_message');
add_class('cls_tb_global');

$cls_tb_module = new cls_tb_module($db, LOG_DIR);
$cls_settings = new cls_settings($db, LOG_DIR);
$cls_tb_message = new cls_tb_message($db, LOG_DIR);
$cls_tb_global = new cls_tb_global($db, LOG_DIR);

$v_bread_crumb_menu = '';
$v_main_header_text = '';
$v_allow = false;

if($v_acc!=''){
	$v_row = $cls_tb_module->select_one(array('module_key'=>$v_acc, 'module_type'=>0));
	if($v_row==1){
		$v_module_root = $cls_tb_module->get_module_root();
		$v_module_dir = $cls_tb_module->get_module_dir();
		//$v_module_dir = $cls_tb_module->get_module_dir();
		$v_module_index = $cls_tb_module->get_module_index();
		$v_module_pid = $cls_tb_module->get_module_pid();
		$v_module_text = $cls_tb_module->get_module_text();
		$v_module_key = $cls_tb_module->get_module_key();
		$v_module_locked = $cls_tb_module->get_module_locked();
		$v_allow = $v_module_root!='' && $v_module_dir!='' && $v_module_index!='' && $v_module_locked!=1;
		if($v_allow){
           	$v_allow = file_exists(ROOT_DIR.DS.'user_account'.DS.$v_module_root.DS.$v_module_dir.DS.$v_module_index);
		}
		$v_url = URL.'admin';
		$v_bread_crumb_menu = '';
		$v_main_header_text = $v_module_text;
	}
}


switch($v_acc){
    case 'error':
        $v_admin_key = 'admin/error';
        include 'error/index.php';
        break;
	case 'module':
		$v_admin_key = 'admin/module';
		include 'module/index.php';
		break;
	default:
        $v_per_delete = 0;
        if(is_admin()) $v_per_delete = 1;
		if($v_allow){
			$v_admin_key = $v_module_root.'/'.$v_acc;
            include 'user_account/'.$v_module_root.'/'.$v_module_dir.'/'.$v_module_index;
		}else
			include 'user_account/admin/home/index.php';
		break;
}
$v_time_end = microtime(true);
?>