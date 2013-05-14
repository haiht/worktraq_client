<?php if(!isset($v_sval)) die();?>
<?php
$v_ = isset($_GET['act'])?$_GET['act']:'';
require 'classes/cls_tb_notice.php';
$cls_tb_notice = new cls_tb_notice($db);
switch($v_){
	case 'N':
	case 'E':
		include 'qry_single_tb_notice.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_notice.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_notice.php';
		break;
	case 'A':
    case 'S':
        include 'qry_singer_tb_notice.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_singer_tb_notice.php';
        include 'user_account/admin/admin_footer.php';
	default:
		include 'qry_all_tb_notice.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_notice.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>