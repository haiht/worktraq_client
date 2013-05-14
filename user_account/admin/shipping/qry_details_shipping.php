<?php if(!isset($v_sval)) die();?>
<?php
add_class('cls_tb_order_items');
$cls_tb_order_items = new cls_tb_order_items($db);

$v_allocation_id = isset($_GET['id'])?$_GET['id']:0;
$arr_where_clause = array('allocation_id'=>(int)$v_allocation_id);
$arr_sort = array('tracking_number'=>'','date_shipping'=>-1,'location_id');

$v_count_allocation = $cls_tb_allocation->select_one($arr_where_clause);
$v_order_id = $cls_tb_allocation->get_order_id();
$v_temp_location_id = $cls_tb_allocation->get_location_id();
$v_dsp_allocation = '';
$v_total_product = 0;
$v_total_quantity =1;
$arr_items = $cls_tb_order_items->select(array('order_id'=>(int) $v_order_id));

foreach ($arr_items as $arr_temp) {
    $arr_allocation = isset($arr_temp['allocation']) ? $arr_temp['allocation'] : NULL;
    $v_product_description = isset($arr_temp['product_description']) ? $arr_temp['product_description'] : '';

    if(sizeof($arr_allocation) > 0 && is_array($arr_allocation))
    {
        foreach ($arr_allocation as $arr) {
            $v_location_id = isset($arr['location_id']) ? $arr['location_id'] : '';
            $v_product_name = isset($arr['product_name']) ? $arr['product_name'] : '';
            if($v_location_id==$v_temp_location_id)
            {
                $v_location_quantity =  isset($arr['location_quantity']) ? $arr['location_quantity'] : 0;
                $v_total_product +=$v_location_quantity;
                $v_dsp_allocation .='<tr>
                                        <td>Product name </td>
                                        <td>'.$v_total_quantity++ .'.  '. $v_product_name.' </td>
                                        <td> Quantity : </td>
                                        <td><b>'.  $v_location_quantity.'</b></td>
                                    </tr>';
            }
        }
    }
}
?>