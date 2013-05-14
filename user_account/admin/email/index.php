<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
require 'classes/cls_tb_email_templates.php';
$cls_tb_email_templates = new cls_tb_email_templates($db);

switch($v_act){
    case "SH";
        include 'qry_preview_email_templates.php';
        include 'user_account/admin/header.php';
        include 'dsp_preview_email_templates.php';
        include 'user_account/admin/footer.php';
        break;
    case 'S':
	case 'N':
	case 'E':
		include 'qry_single_tb_email_templates.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_email_templates.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_email_templates.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_email_templates.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_email_templates.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>