<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';



add_class('cls_tb_company');
add_class('cls_tb_location');
add_class('cls_tb_location_threshold');
add_class('cls_tb_product_group');


$cls_tb_company = new cls_tb_company($db, LOG_DIR);
$cls_tb_location = new cls_tb_location($db, LOG_DIR);
$cls_tb_threshold = new cls_tb_location_threshold($db, LOG_DIR);
$cls_tb_product_group = new cls_tb_product_group($db,LOG_DIR );

switch($v_act){
    default:
        include 'qry_threshold_location_group_product.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_threshold_location_group_product.php';
        include 'user_account/admin/admin_footer.php';
        break;
}
?>