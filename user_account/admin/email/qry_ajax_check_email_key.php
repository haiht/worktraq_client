<?php
if(!isset($v_sval)) die();?>
<?php
$v_email_key = isset($_POST['txt_email_key'])?$_POST['txt_email_key']:'';
$v_email_id = isset($_POST['txt_email_id'])?$_POST['txt_email_id']:'0';
settype($v_email_id, 'int');
$arr_return = array('error'=>0, 'message'=>'OK');
if($v_email_key!=''){
    if($cls_tb_email_templates->count(array('email_key'=>$v_email_key, 'email_id'=>array('$ne'=>$v_email_id)))>0){
        $arr_return['error'] = 2;
        $arr_return['message'] = 'Duplicate Email Key!';
    }
}else{
    $arr_return['error'] = 1;
    $arr_return['message'] = 'Lost data!';
}
echo json_encode($arr_return);
?>