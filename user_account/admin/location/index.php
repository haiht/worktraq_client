<?php if(!isset($v_sval)) die();?>
<?php
if(!isset($_SESSION['duplicate_location'])) $_SESSION['duplicate_location'] = 0;
$v_test = isset($_GET['act'])?$_GET['act']:'';

add_class('cls_tb_location');
add_class('cls_tb_company');
add_class('cls_tb_country');
add_class('cls_tb_contact');

$cls_tb_location = new cls_tb_location($db,LOG_DIR);
$cls_tb_company = new cls_tb_company($db);
$cls_tb_contact  = new cls_tb_contact($db);
$cls_tb_country = new cls_tb_conutry($db);
switch($v_test){
    case 'CAJ':
        include 'qry_check_location.php';
        break;
    case 'AJ':
        include 'qry_load_location_ajax.php';
        break;
    case  'PVN';
        include 'act_get_address_province.php';
        break;
    case  'U';
        include 'act_update_location.php';
        break;
    case "SH";
        include 'qry_details_location.php';
        include 'user_account/admin/header.php';
        include 'dsp_details_location.php';
        include 'user_account/admin/footer.php';
        break;
    case 'AREA';
        include 'qry_single_area.php';
        include 'user_account/admin/header.php';
        include 'dsp_single_area.php';
        include 'user_account/admin/footer.php';
        break;
	case 'N':
	case 'E':
    case 'R':
		include 'qry_single_tb_location.php';
        include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_location.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_location.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_location.php';
        include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_location.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>