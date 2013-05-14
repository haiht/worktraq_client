<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';

add_class('cls_tb_product');
add_class('cls_tb_material');
add_class('cls_tb_company');
add_class('cls_tb_location');
add_class('cls_tb_location_threshold');
add_class('cls_tb_tag');
add_class('cls_tb_color');
add_class('cls_tb_product_group');

$cls_tb_material = new cls_tb_material($db, LOG_DIR);
$cls_tb_company = new cls_tb_company($db, LOG_DIR);
$cls_tb_location = new cls_tb_location($db, LOG_DIR);
$cls_tb_tag = new cls_tb_tag($db, LOG_DIR);
$cls_tb_product = new cls_tb_product($db, LOG_DIR);
$cls_tb_color = new cls_tb_color($db, LOG_DIR);
$cls_tb_threshold = new cls_tb_location_threshold($db, LOG_DIR);
$cls_tb_product_group = new cls_tb_product_group($db,LOG_DIR );
switch($v_act){
    case 'TGL';
        include 'qry_threshold_location_group_product.php';
        include 'user_account/admin/header.php';
        include 'dsp_threshold_location_group_product.php';
        include 'user_account/admin/footer.php';
        break;
    case 'CAJ':
        include 'qry_check_products.php';
        break;
    case 'MAJ':
        include 'qry_load_material_option.php';
        break;
    case 'THR'://location threshold
        include 'qry_single_tb_location_threshold.php';
        include 'user_account/admin/header.php';
        include 'dsp_single_tb_location_threshold.php';
        include 'user_account/admin/footer.php';
        break;
    case 'EXL'://exclude location
        include 'qry_single_tb_product_exclude.php';
        include 'user_account/admin/header.php';
        include 'dsp_single_tb_product_exclude.php';
        include 'user_account/admin/footer.php';
        break;
    case 'UI':
        include 'qry_single_tb_product_images.php';
        include 'user_account/admin/header.php';
        include 'dsp_single_tb_product_images.php';
        include 'user_account/admin/footer.php';
        break;
    case 'UL':
        include 'qry_single_tb_product_images_upload.php';
        break;
    case 'CI':
        include 'qry_single_tb_product_change_images.php';
        break;
	case 'N':
	case 'E':
		include 'qry_single_tb_product.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_product.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_product.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_product.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_product.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>