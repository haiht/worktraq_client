<?php if(!isset($v_sval)) die(); ?>
<?php
$v_company_product_url = RESOURCE_URL.$_SESSION['company_code'].'/products/';

$v_ship = isset($_GET['ship'])?$_GET['ship']:'';

switch($v_ship){
    case 'VIEW':
        include $v_head.'customer_header.php';
        include $v_head.'shipping/qry_view_shipping.php';
        include $v_head.'customer_footer.php';
        break;
    case 'TRACK':
        include $v_head.'customer_header.php';
        include $v_head.'shipping/qry_tracking_shipping.php';
        include $v_head.'customer_footer.php';
        break;
    default:
        include $v_head.'customer_header.php';
        include $v_head.'shipping/qry_shipping.php';
        include $v_head.'customer_footer.php';
}

?>