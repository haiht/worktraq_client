<?php
if(!isset($v_sval)) die();
?>
<?php
$v_allocation_id = isset($_POST['txt_allocation_id'])?$_POST['txt_allocation_id']:'0';
settype($v_allocation_id, 'int');
$arr_return = array('error'=>0, 'message'=>'OK');
if($v_shipping_edit_right || $v_is_admin){
    if($v_allocation_id>0){
        $v_row = $cls_tb_allocation->select_one(array('allocation_id'=>$v_allocation_id));
        if($v_row==1){
            $v_order_item_id = $cls_tb_allocation->get_order_items_id();
            $v_location_id = $cls_tb_allocation->get_location_id();
            $v_parent_allocation = $cls_tb_allocation->get_parent_allocation();
            $v_shipping_id = $cls_tb_allocation->get_shipping_id();
            $v_reset_shipping = true;
            if($v_shipping_id>0){
                $v_row = $cls_tb_shipping->select_one(array('shipping_id'=>$v_shipping_id));
                if($v_row==1){
                    $arr_shipping_detail = $cls_tb_shipping->get_shipping_detail();
                    $arr_temp = array();
                    for($i=0; $i<count($arr_shipping_detail); $i++){
                        if($arr_shipping_detail[$i]['allocation_id']!=$v_allocation_id) $arr_temp[] = $arr_shipping_detail[$i];
                    }
                    $v_reset_shipping = $cls_tb_shipping->update_field('shipping_detail', $arr_temp, array('allocation_id'=>$v_shipping_id));
                }else{
                    $v_reset_shipping = false;
                }
            }
            if($v_reset_shipping){
                $arr_fields = array('shipper', 'tracking_number', 'tracking_url', 'date_shipping', 'shipping_id', 'shipped_quantity');
                $arr_values = array('', '', '', NULL, 0, 0);
                $cls_tb_allocation->update_fields($arr_fields, $arr_values, array('allocation_id'=>$v_allocation_id));
            }else{
                $arr_return['error'] = 4;
                $arr_return['message'] = 'Can not reset shipping!';
            }
        }else{
            $arr_return['error'] = 3;
            $arr_return['message'] = 'Not found!';
        }
    }else{
        $arr_return['error'] = 2;
        $arr_return['message'] = 'Lost data!';
    }
}else{
    $arr_return['error'] = 1;
    $arr_return['message'] = 'You have no permission!';
}

echo json_encode($arr_return);
?>