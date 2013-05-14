<?php
if(!isset($v_sval)) die();?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
$v_role_id = isset($_POST['txt_role_id'])?$_POST['txt_role_id']:'0';
$v_role_key = isset($_POST['txt_role_key'])?$_POST['txt_role_key']:'';
$v_role_key = trim($v_role_key);
settype($v_company_id, 'int');
settype($v_role_id, 'int');

$arr_return = array('error'=>0, 'message'=>'OK');
if($v_role_key!=''){
    $arr_where = array();
    if($v_company_id>0)
        $arr_where['company_id']=$v_company_id;
    $arr_where['role_id'] = array('$ne'=>$v_role_id);
    $arr_where['role_key'] = $v_role_key;
    if($cls_tb_role->count($arr_where)>0){
        $arr_return['error'] = 2;
        $arr_return['message']= 'Duplicate data.';
    }
}else{
    $arr_return['error'] = 1;
    $arr_return['message']= 'Lost data';
}
echo json_encode($arr_return);
?>