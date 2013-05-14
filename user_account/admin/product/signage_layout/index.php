<?php if (!isset($v_sval)) die(); ?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_location');
add_class('cls_tb_company');
add_class('cls_tb_area');
add_class('cls_tb_product_images');
add_class('cls_tb_product');
$cls_tb_company = new cls_tb_company($db, LOG_DIR);
$cls_tb_location = new cls_tb_location($db, LOG_DIR);
$cls_tb_area = new cls_tb_area($db, LOG_DIR);
$cls_tb_product_images = new cls_tb_product_images($db, LOG_DIR);
$cls_tb_product = new cls_tb_product($db, LOG_DIR);
switch($v_act)
{
    case 'UI':
        include 'qry_signage_layout_image.php';
        include 'user_account/admin/header.php';
        include 'dsp_signage_layout_image.php';
        include 'user_account/admin/footer.php';
        break;
    case 'PD':
        include 'qry_signage_layout_product.php';
        include 'user_account/admin/header.php';
        include 'dsp_signage_layout_product.php';
        include 'user_account/admin/footer.php';
        break;
    case 'CI':
        include 'act_signage_layout_change_image.php';
        break;
    case 'UL':
        include 'act_signage_layout_upload_image.php';
        break;
    case 'CM':
        include 'act_signage_layout_create_map.php';
        break;
    case 'MV':
        include 'qry_signage_layout_view.php';
        include 'user_account/admin/header.php';
        include 'dsp_signage_layout_view.php';
        include 'user_account/admin/footer.php';
        break;
    case 'MP':
        include 'qry_signage_layout_image_map.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_signage_layout_image_map.php';
        include 'user_account/admin/admin_footer.php';
        break;
    case 'GL';
        include 'act_get_location.php';
        break;
    default:
        include 'qry_all_signage_layout.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_all_signage_layout.php';
        include 'user_account/admin/admin_footer.php';
}
?>
