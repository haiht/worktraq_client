<?php if (!isset($v_sval)) die(); ?>
<?php
require 'classes/cls_tb_area.php';
require 'classes/cls_tb_product_images.php';
require 'classes/cls_tb_product.php';
$cls_tb_area  = new cls_tb_area($db, LOG_DIR);
$cls_tb_product  = new cls_tb_product($db, LOG_DIR);
$cls_tb_product_images  = new cls_tb_product_images($db, LOG_DIR);
$v_sign = isset($_REQUEST['sign'])?$_REQUEST['sign']:'';
switch($v_sign)
{
    case "V":
        include $v_head.'signage_layout/qry_signage_layout_view.php';
        include $v_head.'signage_layout/dsp_signage_layout_view.php';
        break;
    default:
        include $v_head.'header.php';
        include $v_head.'signage_layout/qry_signage_layout.php';
        include $v_head.'footer.php';
}
?>
