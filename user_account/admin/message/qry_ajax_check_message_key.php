<?php
if(!isset($v_sval)) die();
?>
<?php
$v_message_id = isset($_POST['txt_message_id'])?$_POST['txt_message_id']:'0';
$v_message_key = isset($_POST['txt_message_key'])?$_POST['txt_message_key']:'';
settype($v_message_id, 'int');
$arr_return = array('error'=>0, 'message'=>'OK');
if($v_message_key!=''){
    $arr_where_clause = array();
    $arr_where_clause['message_key'] = $v_message_key;
    if($v_message_id>0) $arr_where_clause['message_id'] = array('$ne'=>$v_message_id);
    if($cls_tb_message->count($arr_where_clause)>0){
        $arr_return['error'] = 2;
        $arr_return['message'] = 'Existing!';
    }
}else{
    $arr_return['error'] = 1;
    $arr_return['message'] = 'Lost data!';
}
echo json_encode($arr_return);
?>