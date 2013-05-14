<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
$v_action = isset($_GET['action'])?$_GET['action']:'';
add_class('cls_tb_user');
$cls_tb_user = new cls_tb_user($db);
switch($v_act){
    case "SH";
        include 'qry_details_user.php';
        include 'user_account/admin/header.php';
        include 'dsp_details_user.php';
        include 'user_account/admin/footer.php';
        break;
    case "RP";
        include 'qry_view_report.php';
        include 'user_account/admin/header.php';
        include 'dsp_view_report.php';
        include 'user_account/admin/footer.php';
        break;
    case "R";//Rule News
        include 'qry_rules_user.php';
        include 'user_account/admin/header.php';
        include 'dsp_rules_user.php';
        include 'user_account/admin/footer.php';
        break;
    case "RO";//Rule News
        include 'qry_all_rules_user.php';
        include 'user_account/admin/header.php';
        include 'dsp_all_rules_user.php';
        include 'user_account/admin/footer.php';
        break;
    case 'AJ':
        include 'act_update_user_rule_ajax.php';
        break;
    case "RULE";
        include 'qry_rule_user.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_rule_user.php';
        include 'user_account/admin/admin_footer.php';
        break;
    case 'DE';
        include 'act_show_details_user.php';
        break;
    case 'SU';
        include 'act_check_user.php';
        break;
    case 'U';
        include 'act_update_user.php';
        break;
    case 'CP';
        include 'qry_change_password.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_change_password.php';
        include 'user_account/admin/admin_footer.php';
        break;
    case 'CU';
        include 'qry_create_user.php';
        include 'user_account/admin/header.php';
        include 'dsp_create_user.php';
        include 'user_account/admin/footer.php';
        break;
	case 'N':
	case 'E':
		include 'qry_single_tb_user.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_user.php';
        include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_user.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_user.php';
        include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_user.php';
        include 'user_account/admin/admin_footer.php';
		break;
}
?>