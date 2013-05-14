<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_rule');
$cls_tb_rule = new cls_tb_rule($db);
$cls_tb_setting = new cls_settings($db);
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