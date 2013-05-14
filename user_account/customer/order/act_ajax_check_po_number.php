<?php
if (!isset($v_sval)) die();
?>
<?php
$v_request_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:'0';
$v_request_po_number = isset($_POST['txt_po_number'])?$_POST['txt_po_number']:'';
settype($v_request_order_id, 'int');
$v_company_id = isset($_SESSION['company_id'])?$_SESSION['company_id']:0;
settype($v_company_id, 'int');
if($v_request_order_id>=0){
    $v_row = $cls_tb_order->select_one(array('po_number'=>$v_request_po_number, 'company_id'=>$v_company_id, 'order_id'=>array('$ne'=>$v_request_order_id)));
    if($v_row==1){
        die('{error=1}{message=Choose another po-number: '.$v_request_order_id.'}');
    }else{
        die('{error=0}{message=OK}');
    }
}else{
    die('{error=2}{message=Invalid Order ID}');
}
?>