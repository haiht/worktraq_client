<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_thickness');

$cls_tb_thickness = new cls_tb_thickness($db);
switch($v_act){
    case 'U':
        include 'act_update_thickness.php';
        break;
	case 'N':
	case 'E':
		include 'qry_single_tb_thickness.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_thickness.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_thickness.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_thickness.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_thickness.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>