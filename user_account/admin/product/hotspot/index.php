<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';

add_class('cls_tb_product_images');
add_class('cls_tb_product');
add_class('cls_tb_company');
add_class('cls_tb_location');
add_class('cls_tb_image_area');

$cls_tb_product_images = new cls_tb_product_images($db, LOG_DIR);
$cls_tb_product = new cls_tb_product($db, LOG_DIR);
$cls_tb_company = new cls_tb_company($db, LOG_DIR);
$cls_tb_location = new cls_tb_location($db, LOG_DIR);
$cls_tb_image_area = new cls_tb_image_area($db, LOG_DIR);
switch($v_act){
    case 'AJL':
        break;
	case 'N':
	case 'E':
        include 'qry_single_hot_spot.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_single_hot_spot.php';
        include 'user_account/admin/admin_footer.php';
        break;
	case 'U':
		include 'act_hot_spot_update.php';
		break;
	case 'V':
        include 'qry_hot_spot_view.php';
        include 'user_account/admin/header.php';
        include 'dsp_hot_spot_view.php';
        include 'user_account/admin/footer.php';
        break;
    case 'L':
	default:
        include 'qry_all_hot_spot.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_all_hot_spot.php';
        include 'user_account/admin/admin_footer.php';
        break;
}
?>