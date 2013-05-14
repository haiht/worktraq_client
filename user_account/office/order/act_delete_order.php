<?php
if (!isset($v_sval)) die();
?>
<?php
$v_request_order_id = isset($_GET['txt_order'])?$_GET['txt_order']:'0';
settype($v_request_order_id, 'int');
if($v_request_order_id>0){
    $v_row = $cls_tb_order->select_one(array('order_id'=>$v_request_order_id)) ;
    if($v_row==1){
        $v_current_status = $cls_tb_order->get_status();
        $v_current_status = - $v_current_status;
        if($v_current_status==0) $v_current_status = -100;
        $v_result = $cls_tb_order->update_field('status',$v_current_status,array('order_id'=>$v_request_order_id));

        if($v_result){
            //$v_result = $cls_tb_order_items->delete(array('order_id'=>$v_request_order_id));
            if(isset($_SESSION['order_id'])){
                $v_session_order = isset($_SESSION['order_id']);
                settype($v_session_order,'int');
                if($v_session_order>0 && $v_session_order==$v_request_order_id) unset($_SESSION['order_id']);
            }
        }
        $v_log = 'User delete order: #'.$v_request_order_id.' - PO: #'.$cls_tb_order->get_po_number() .' - Create: '.date('d-M-Y',$cls_tb_order->get_date_created()).' by: '.$cls_tb_order->get_user_name();
        $cls_tb_order_log->save_log($cls_tb_order, $arr_user['user_name'],'Delete Order', $v_result?0:1,$v_log, 0,0);
    }
}else{
    if(isset($_SESSION['ss_current_order'])) unset($_SESSION['ss_current_order']);
    if(isset($_SESSION['ss_new_order_info'])) unset($_SESSION['ss_new_order_info']);
}
redir(URL.'order/');
?>