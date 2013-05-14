<?php if(!isset($v_sval)) die();?>
<?php
$v_test = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_country');
$cls_tb_conutry = new cls_tb_conutry($db);
switch($v_test){
    case 'U';
        include 'act_update_country.php';
        break;
	case 'N':
	case 'E':
		include 'qry_single_tb_conutry.php';
        include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_conutry.php';
        include 'user_account/admin/admin_footer.php';
        break;
	case 'D':
		include 'act_delete_tb_conutry.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_conutry.php';
        include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_conutry.php';
        include 'user_account/admin/admin_footer.php';
		break;
}
?>