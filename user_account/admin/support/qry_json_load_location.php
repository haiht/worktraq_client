<?php
if(!isset($v_sval)) die();
?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
settype($v_company_id, 'int');
$arr_location = $cls_tb_location->select(array('company_id'=>$v_company_id));
$arr_all_location = array();
$arr_all_location[]= array(
    'location_id'=>0,
    'location_name'=>'--------'
);
foreach($arr_location as $arr){
    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
    $v_location_name = isset($arr['location_name'])?$arr['location_name']:'';

    $arr_all_location[] = array(
        'location_id'=>$v_location_id,
        'location_name'=>$v_location_name
    );
}
header("Content-type: application/json");
echo json_encode($arr_all_location);
?>