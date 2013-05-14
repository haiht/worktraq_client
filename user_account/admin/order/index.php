<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_order');
add_class('cls_tb_location');
add_class('cls_tb_order_items');
add_class('cls_tb_allocation');
add_class('cls_tb_shipping');
add_class('cls_tb_contact');
$cls_tb_shipping = new cls_tb_shipping($db,LOG_DIR);
$cls_tb_order = new cls_tb_order($db,LOG_DIR);
$cls_tb_location = new cls_tb_location($db,LOG_DIR);
$cls_tb_order_items = new cls_tb_order_items($db,LOG_DIR);
$cls_tb_allocation = new cls_tb_allocation($db,LOG_DIR);
$cls_tb_contact  = new cls_tb_contact($db);
switch($v_act){
    case 'SHP'; // Shipping Order
        include 'qry_shipping_order.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_shipping_order.php';
        include 'user_account/admin/admin_footer.php';
        break;
    case 'TNU'; // Tracking Number
        include 'qry_tracking_number.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_tracking_number.php';
        include 'user_account/admin/admin_footer.php';
        break;
    case 'PRI'; // Print
        include 'qry_print_order.php';
        include 'user_account/admin/header.php';
        include 'dsp_print_order.php';
        include 'user_account/admin/footer.php';
        break;
    case 'UCS';
        include 'act_update_status_order.php';
        break;
    case 'CS';
        include 'qry_change_status_order.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_change_status_order.php';
        include 'user_account/admin/admin_footer.php';
        break;
    case 'DO';
        include 'qry_details_order_items.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_details_order_items.php';
        include 'user_account/admin/admin_footer.php';
        break;
    case 'SH';
        include 'qry_details_order.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_details_order.php';
        include 'user_account/admin/admin_footer.php';
        break;
	case 'N':
	case 'E':
		include 'qry_single_tb_order.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_order.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_order.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_order.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_order.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>