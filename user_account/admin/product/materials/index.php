<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_material');
add_class('cls_tb_color');
$cls_tb_material = new cls_tb_material($db, LOG_DIR);
$cls_tb_color = new cls_tb_color($db, LOG_DIR);
switch($v_act){
	case 'N':
	case 'E':
		include 'qry_single_tb_material.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_material.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_material.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_material.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_material.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>