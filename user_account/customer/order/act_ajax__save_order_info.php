<?php
if(!$v_sval) die();
?>
<?php
$v_order_key = isset($_POST['txt_order_key'])?$_POST['txt_order_key']:'';
$v_order_value = isset($_POST['txt_order_value'])?$_POST['txt_order_value']:'';
$v_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:'0';
settype($v_order_id, 'int');
if($v_order_id<0) $v_order_id = 0;
if($v_order_id==0){
    if(isset($_SESSION['ss_order_info']))
        $arr_order_info = unserialize($_SESSION['ss_order_info']);
    else
        $arr_order_info = array(
            'po_number'=>''
            ,'order_ref'=>''
            ,'date_required'=>''
            ,'description'=>''
        );
    $arr_order_info[$v_order_key] = $v_order_value;
    $_SESSION['ss_order_info'] = serialize($arr_order_info);
}else{
    $v_edit_user = $arr_user['user_name'];
    $v_edit_time = new MongoDate(time());
    if($v_order_key = 'date_required'){
        $arr_date = explode('-', $v_order_value);
        if(!is_array($arr_date) || count($arr_date)!=3){
            $v_date_required = NULL;
        }else{
            $v_date_required = $arr_date[2].'-'.$arr_date[1].'-'.$arr_date[0];
        }
        $v_date_required = ($v_date_required==NULL?NULL:strtotime($v_date_required));
        $v_date_required = ($v_date_required==NULL?NULL:new MongoDate($v_date_required));
        $cls_tb_order->update_fields(array('date_required', 'user_modified', 'date_modified'), array($v_date_required, $v_edit_user, $v_edit_time), array('order_id'=>$v_order_id));
    }else{
        $cls_tb_order->update_fields(array($v_order_key,'user_modified', 'date_modified'), array($v_order_value, $v_edit_user, $v_edit_time), array('order_id'=>$v_order_id));
    }

}
die('{error=0}{message=}');
?>