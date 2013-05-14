<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_support');
add_class('cls_tb_contact');
$cls_tb_contact = new cls_tb_contact($db);
$cls_tb_support = new cls_tb_support($db);
switch($v_act){
	case 'N':
	case 'E':
		include 'qry_single_tb_support.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_support.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_support.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_support.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_support.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>