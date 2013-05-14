<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
require 'classes/cls_tb_role.php';
$cls_tb_role = new cls_tb_role($db);
add_class('cls_tb_company');
add_class('cls_tb_location');
add_class('cls_tb_module');
add_class('cls_tb_color');
add_class('cls_settings');

$cls_tb_company = new cls_tb_company($db, LOG_DIR);
$cls_tb_location = new cls_tb_location($db, LOG_DIR);
$cls_tb_module = new cls_tb_module($db, LOG_DIR);
$cls_tb_color = new cls_tb_color($db, LOG_DIR);
$cls_settings = new cls_settings($db, LOG_DIR);
switch($v_act){
	case 'N':
	case 'E':
		include 'qry_single_tb_role.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_role.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_role.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_role.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_role.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>