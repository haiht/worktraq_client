<?php
if(!isset($v_sval)) die();?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
$v_region_id = isset($_POST['txt_region_id'])?$_POST['txt_region_id']:'0';
$v_region_key = isset($_POST['txt_region_key'])?$_POST['txt_region_key']:'';
$v_region_key = trim($v_region_key);
settype($v_company_id, 'int');
settype($v_region_id, 'int');

$arr_return = array('error'=>0, 'message'=>'OK');
if($v_region_key!=''){
    $arr_where = array();
    if($v_company_id>0)
        $arr_where['company_id']=$v_company_id;
    $arr_where['region_id'] = array('$ne'=>$v_region_id);
    $arr_where['region_key'] = $v_region_key;
    if($cls_tb_region->count($arr_where)>0){
        $arr_return['error'] = 2;
        $arr_return['message']= 'Duplicate data.';
    }
}else{
    $arr_return['error'] = 1;
    $arr_return['message']= 'Lost data';
}
echo json_encode($arr_return);
?>