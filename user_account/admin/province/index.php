<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_province');
add_class('cls_tb_country');
$cls_tb_country = new cls_tb_conutry($db,LOG_DIR);
$cls_tb_province = new cls_tb_province($db);
switch($v_act){
	case 'N':
	case 'E':
		include 'qry_single_tb_province.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_province.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_province.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_province.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_province.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>