<?php
if(!isset($v_sval)) die();?>
<?php
$v_tracking_key = isset($_POST['txt_tracking_key'])?$_POST['txt_tracking_key']:'';
$v_tracking_id = isset($_POST['txt_tracking_id'])?$_POST['txt_tracking_id']:'0';
settype($v_tracking_id, 'int');
$arr_return = array('error'=>0, 'message'=>'OK');

if($v_tracking_key!=''){
    if($cls_tb_tracking->count(array('tracking_key'=>$v_tracking_key, 'tracking_id'=>array('$ne'=>$v_tracking_key)))>0){
        $arr_return['error'] = 2;
        $arr_return['message'] = 'Duplicate Tracking Key';
    }
}else{
    $arr_return['error'] = 1;
    $arr_return['message'] = 'Lost data';
}

echo json_encode($arr_return);
?>