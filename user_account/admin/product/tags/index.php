<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_tag');
add_class('cls_tb_location');
add_class('cls_tb_company');
$cls_tb_tag = new cls_tb_tag($db);
$cls_tb_company = new cls_tb_company($db, LOG_DIR);
$cls_tb_location = new cls_tb_location($db, LOG_DIR);

switch($v_act){
    case 'AJ':
        include 'qry_load_all_tag.php';
        break;
	case 'N':
	case 'E':
		include 'qry_single_tb_tag.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_tag.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_tag.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_tag.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_tag.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>