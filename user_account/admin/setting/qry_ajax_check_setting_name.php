<?php
if(!isset($v_sval)) die();
?>
<?php
$v_setting_id = isset($_POST['txt_setting_id'])?$_POST['txt_setting_id']:'0';
$v_setting_name = isset($_POST['txt_setting_name'])?$_POST['txt_setting_name']:'';
settype($v_setting_id, 'int');
$arr_return = array('error'=>0, 'message'=>'OK');
if($v_setting_name!=''){
    $arr_where_clause = array();
    $arr_where_clause['setting_name'] = $v_setting_name;
    if($v_setting_id>0) $arr_where_clause['setting_id'] = array('$ne'=>$v_setting_id);
    if($cls_settings->count($arr_where_clause)>0){
        $arr_return['error'] = 2;
        $arr_return['message'] = 'Existing!';
    }
}else{
    $arr_return['error'] = 1;
    $arr_return['message'] = 'Lost data!';
}
echo json_encode($arr_return);
?>