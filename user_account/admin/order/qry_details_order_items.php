<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_order_item_id = 0;
$v_order_id = '';
$v_product_id = '';
$v_product_code = '';
$v_quantity = 0;
$v_description = '';
$v_customization_information = '';
$v_width = 0;
$v_height = 0;
$v_graphic_file = '';
$v_original_price = 0;
$v_discount_price = 0;
$v_current_price = 0;
$v_unit_price = 0;
$v_status = 0;
$v_discount_type = 0;
$v_discount_per_unit = 0;
$v_net_price = 0;
$v_extended_amount = 0;

$v_order_item_id = isset($_GET['id'])?$_GET['id']:0;
if($v_order_item_id!=0){
    $v_row = $cls_tb_order_items->select_one(array('order_item_id' => (int)$v_order_item_id));
    if($v_row == 1){
        $v_order_item_id = $cls_tb_order_items->get_order_item_id();
        $v_order_id = $cls_tb_order_items->get_order_id();
        $v_product_id = $cls_tb_order_items->get_product_id();
        $v_product_code = $cls_tb_order_items->get_product_code();
        $v_quantity = $cls_tb_order_items->get_quantity();
        $v_description = $cls_tb_order_items->get_description();
        $v_customization_information = $cls_tb_order_items->get_customization_information();
        $v_width = $cls_tb_order_items->get_width();
        $v_height = $cls_tb_order_items->get_height();
        $v_graphic_file = $cls_tb_order_items->get_graphic_file();
        $v_original_price = $cls_tb_order_items->get_original_price();
        $v_discount_price = $cls_tb_order_items->get_discount_price();
        $v_current_price = $cls_tb_order_items->get_current_price();
        $v_unit_price = $cls_tb_order_items->get_unit_price();
        $v_status = $cls_tb_order_items->get_status();
        $v_discount_type = $cls_tb_order_items->get_discount_type();
        $v_discount_per_unit = $cls_tb_order_items->get_discount_per_unit();
        $v_net_price = $cls_tb_order_items->get_net_price();
        $v_extended_amount = $cls_tb_order_items->get_extended_amount();
    }
}

?>