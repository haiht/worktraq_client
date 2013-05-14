<?php
if(!isset($v_sval)) die();
?>
<?php
$v_user_name = isset($_POST['txt_user_name'])?$_POST['txt_user_name']:'';
$v_user_name = trim($v_user_name);
$arr_return = array('error'=>0, 'message'=>'OK');
if($v_user_name!=''){
    $arr_where = array('$where'=>"this.user_name.toLowerCase()==='".strtolower($v_user_name)."'");
    if($cls_tb_user->count($arr_where)>0){
        $arr_return['error'] = 1;
        $arr_return['message'] = 'Existing user_name';
    }else{
        $arr_return['message'] = 'OK';
    }
}else{
    $arr_return['error'] = 2;
    $arr_return['message'] = 'Empty value!';
}
echo json_encode($arr_return);
?>