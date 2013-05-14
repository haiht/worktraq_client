<?php
if(!isset($v_sval)) die();
?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
settype($v_company_id, 'int');
$arr_return = array('error'=>0, 'message'=>'OK', 'location'=>array());
$arr_all_location = array();
$arr_all_location[] = array('location_id'=>0, 'location_name'=>'--------');
if($v_company_id>0){
    $arr_location = $cls_tb_location->select(array('company_id'=>$v_company_id));
    foreach($arr_location as $arr){
        $arr_all_location[] = array('location_id'=>$arr['location_id'], 'location_name'=>$arr['location_name']);
    }
}else{
    $arr_return['error'] = 1;
    $arr_return['message'] = 'Invalid Company ID';
}
$arr_return['location'] = $arr_all_location;
echo(json_encode($arr_return));
?>