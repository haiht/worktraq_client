<?php if(!isset($v_sval)) die();?>
<?php
$v_shipping_id = isset($_POST['txt_shipping_id'])?$_POST['txt_shipping_id']:0;
$arr_where_clause = array('shipping_id'=>(int)$v_shipping_id);
$arr_shipping_detail = $cls_tb_shipping->select_scalar('shipping_detail', $arr_where_clause);
$arr_return = array();
$v_total_row =0;
for ($i=0; $i<count($arr_shipping_detail);$i++) {
    $v_product_code = $arr_shipping_detail[$i]['product_code'];
    $v_material_name = $arr_shipping_detail[$i]['material_name'];
    $v_material_color = $arr_shipping_detail[$i]['material_color'];
    $v_material_thickness_value = $arr_shipping_detail[$i]['material_thickness_value'];
    $v_material_thickness_unit = $arr_shipping_detail[$i]['material_thickness_unit'];
    $v_width = $arr_shipping_detail[$i]['width'];
    $v_height = $arr_shipping_detail[$i]['height'];
    $v_unit = $arr_shipping_detail[$i]['unit'];
    $v_graphic_file = $arr_shipping_detail[$i]['graphic_file'];
    $v_quantity = $arr_shipping_detail[$i]['quantity'];
    $v_price = $arr_shipping_detail[$i]['price'];
    $v_amount = $arr_shipping_detail[$i]['amount'];

    $v_product_name = $v_product_code.'<br />'.$v_material_name.' '.$v_material_color.' - '.$v_material_thickness_value.' '.$v_material_thickness_unit.'<br />'.$v_width.' &times; '.$v_height.' '.$v_unit;

    $arr_return[] = array('product_name'=>$v_product_name, 'quantity'=>$v_quantity, 'price'=>$v_price, 'graphic'=>$v_graphic_file, 'amount'=>$v_amount);
    $v_total_row++;
}
$arr_return = array('total_rows'=>$v_total_row, 'products'=>$arr_return);
header("Content-type: application/json");
echo json_encode($arr_return);
?>