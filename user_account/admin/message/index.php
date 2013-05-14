<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])? $_GET['act']:'';

switch($v_act){
	case 'N':
	case 'E':
		include 'qry_single_tb_message.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_message.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_message.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_message.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_message.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>