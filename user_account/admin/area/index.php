<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';

add_class('cls_tb_area');
add_class('cls_tb_company');
add_class('cls_tb_location');


$cls_tb_area = new cls_tb_area($db, LOG_DIR);
$cls_tb_company = new cls_tb_company($db, LOG_DIR);
$cls_tb_location = new cls_tb_location($db, LOG_DIR);

switch($v_act){
	case 'N':
	case 'E':
		include 'qry_single_tb_area.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_area.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_area.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_area.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_area.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>