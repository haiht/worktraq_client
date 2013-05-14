<?php if(!isset($v_sval)) die();?>
<?php
$v_order_id = isset($_GET['id'])?$_GET['id']:NULL;

$v_old_status = $cls_tb_order->select_scalar('status',array('order_id'=>(int)$v_order_id));
$v_old_status = 0 - (int)$v_old_status;

$cls_tb_order->update_field('status',$v_old_status,array('order_id'=>(int)$v_order_id)); // Update cancel
//$cls_tb_order->delete(array('order_id' =>(int)$v_mongo_id));
redir($_SERVER['HTTP_REFERER']);
?>