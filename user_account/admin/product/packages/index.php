<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';

add_class('cls_tb_product');
add_class('cls_tb_company');
add_class('cls_tb_location');
add_class('cls_tb_tag');
add_class('clsupload');

$cls_tb_tag = new cls_tb_tag($db, LOG_DIR);
$cls_tb_company = new cls_tb_company($db, LOG_DIR);
$cls_tb_location = new cls_tb_location($db, LOG_DIR);
$cls_tb_product = new cls_tb_product($db, LOG_DIR);
switch($v_act){
    case 'CH':
        include 'qry_product_packages_choose.php';
        include 'user_account/admin/header.php';
        include 'dsp_product_packages_choose.php';
        include 'user_account/admin/footer.php';
        break;
    case 'N':
	case 'E':
		include 'qry_single_tb_product_packages.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_product_packages.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_product_packages.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_product_packages.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_product_packages.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>