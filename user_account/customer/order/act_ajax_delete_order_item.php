<?php  if (!isset($v_sval)) die(); ?>
<?php
$v_request_product_id = isset($_POST['txt_product_id'])?$_POST['txt_product_id']:'0';
$v_request_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:'0';
$v_request_order_item_id = isset($_POST['txt_order_item_id'])?$_POST['txt_order_item_id']:'0';
settype($v_request_order_id, 'int');
settype($v_request_product_id, 'int');
settype($v_request_order_item_id, 'int');
$arr_resp = array('error'=>1,'message'=>'Error in deleting item.....');
if($v_request_order_item_id>0 && $v_request_order_id>0){
    $v_row = $cls_tb_order->select_one(array('order_id'=>$v_request_order_id, 'company_id'=>$v_company_id));
    if($v_row==1){
        $v_order_total = $cls_tb_order->get_total_order_amount();
        $v_row = $cls_tb_order_items->select_one(array('order_item_id'=>$v_request_order_item_id, 'order_id'=>$v_request_order_id));
        if($v_row==1){
            $v_item_price = $cls_tb_order_items->get_current_price();
            $v_item_quantity =$cls_tb_order_items->get_quantity();
            $v_order_total -= $v_item_quantity*$v_item_price;
            if($v_order_total < 0) $v_order_total=0;
            $v_result = $cls_tb_order_items->delete(array('order_item_id'=>$v_request_order_item_id));
            if($v_result){
                $cls_tb_order->update_field('total_order_amount', $v_order_total, array('order_id'=>$v_request_order_id)) ;
                $arr_resp = array('error'=>0,'message'=>'Order Item removed success');
            }else
                $arr_resp = array('error'=>1,'message'=>'Order Item <b> not </b> removed success.');
        }else{
            $arr_resp = array('error'=>2,'message'=>'Not found current Order Item.');
        }
    }else{
        $arr_resp = array('error'=>2,'message'=>'Not found current Order');
    }
}else{
    if(isset($_SESSION['ss_current_order'])){
        $arr_order = unserialize($_SESSION['ss_current_order']);
        if(is_array($arr_order)){
            $arr_temp = array();
            $v_delete = false;
            for($i=0; $i<count($arr_order);$i++){
                if($arr_order[$i]['product_id']!=$v_request_product_id){
                    $arr_temp[] = $arr_order[$i];
                }else{
                    $v_delete = true;
                }
            }
            $_SESSION['ss_current_order'] = serialize($arr_temp);
            if($v_delete)
                $arr_resp = array('error'=>0,'message'=>'Order Item in session removed success');
            else
                $arr_resp = array('error'=>1,'message'=>'Not found order item');
        }else{
            $arr_resp = array('error'=>2,'message'=>'Invalid order in session');
        }
    }else{
        $arr_resp = array('error'=>3,'message'=>'No any order in session');
    }
}
$v_output= json_encode($arr_resp);
die($v_output);
?>