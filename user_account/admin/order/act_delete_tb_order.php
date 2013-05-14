<?php if(!isset($v_sval)) die();?>
<?php
$v_order_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_order_id, 'int');
if($v_order_id>0){
    $v_row = $cls_tb_order->select_one(array('order_id'=>$v_order_id));
    if($v_row==1){
        $v_current_status = $cls_tb_order->get_status();
        if($v_current_status>0){
            $v_current_status=-$v_current_status;
	        $cls_tb_order->update_field('status', $v_current_status,array('order_id' => $v_order_id));
        }
    }
}
$_SESSION['ss_tb_order_redirect'] = 1;
redir(URL.$v_admin_key);
?>