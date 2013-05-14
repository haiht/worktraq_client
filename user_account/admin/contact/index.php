<?php if(!isset($v_sval)) die();?>
<?php
$v_con = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_contact');
add_class('cls_tb_location');
add_class('cls_tb_user');
add_class('cls_tb_company');
$cls_tb_contact = new cls_tb_contact($db);
$cls_tb_location = new cls_tb_location($db);
$cls_tb_user = new cls_tb_user($db);
$cls_tb_company  = new cls_tb_company($db);

switch($v_con){
    case 'SH';
        include 'qry_details_contact.php';
        include 'user_account/admin/header.php';
        include 'dsp_details_contact.php';
        include 'user_account/admin/footer.php';
        break;
    case 'LOAD';
        include 'qry_loading_contact.php';
        break;
    case 'U';
        include 'act_update_contact.php';
        break;
	case 'N':
	case 'E':
		include 'qry_single_tb_contact.php';
        include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_contact.php';
        include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_contact.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_contact.php';
        include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_contact.php';
        include 'user_account/admin/admin_footer.php';
		break;
}
?>