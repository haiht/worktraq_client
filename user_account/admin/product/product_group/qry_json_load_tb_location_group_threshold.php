<?php
if(!isset($v_sval)) die();
?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
$v_product_group_id = isset($_POST['txt_product_group_id'])?$_POST['txt_product_group_id']:'0';
settype($v_company_id, 'int');
settype($v_product_group_id, 'int');
$arr_all_location_group_threshold = array();
$v_total_rows = 0;

$arr_location_group_threshold = $cls_tb_location_group_threshold->select(array('company_id'=>$v_company_id, 'group_id'=>$v_product_group_id));
$arr_location = array();
foreach($arr_location_group_threshold as $arr){
    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
    settype($v_location_id, 'int');
    $v_threshold_value = isset($arr['threshold_value'])?$arr['threshold_value']:'0';
    settype($v_threshold_value, 'int');
    $v_overflow = isset($arr['overflow'])?$arr['overflow']:'0';
    settype($v_overflow, 'int');
    if($v_overflow!=0) $v_overflow = 1;
    $v_threshold_note = isset($arr['threshold_note'])?$arr['threshold_note']:'';
    $v_lg_threshold_id = isset($arr['lg_threshold_id'])?$arr['lg_threshold_id']:'0';
    settype($v_lg_threshold_id, 'int');
    if($v_location_id>0){
        $v_location_name = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id));
        $v_location_number = $cls_tb_location->select_scalar('location_number', array('location_id'=>$v_location_id));
        $arr_location[] = $v_location_id;
        $v_total_rows++;
        $arr_all_location_group_threshold[] = array(
            'row_order'=>$v_total_rows
            ,'lg_threshold_id'=>$v_lg_threshold_id
            ,'location_id'=>$v_location_id
            ,'location_name'=>$v_location_name
            ,'location_number'=>$v_location_number.''
            ,'threshold_value'=>$v_threshold_value
            ,'threshold_note'=>$v_threshold_note
            ,'overflow'=>$v_overflow
            ,'enable'=>1
        );
    }
}
$arr_all_location = $cls_tb_location->select(array('company_id'=>$v_company_id,'status'=>0, 'location_id'=>array('$nin'=>$arr_location)), array('location_number'=>1));
foreach($arr_all_location as $arr){
    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
    $v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
    $v_location_number = isset($arr['location_number'])?$arr['location_number']:'';
    $v_total_rows++;
    $arr_all_location_group_threshold[] = array(
        'row_order'=>$v_total_rows
        ,'lg_threshold_id'=>0
        ,'location_id'=>$v_location_id
        ,'location_name'=>$v_location_name
        ,'location_number'=>$v_location_number.''
        ,'threshold_value'=>0
        ,'threshold_note'=>''
        ,'overflow'=>0
        ,'enable'=>0
    );
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_location_group_threshold'=>$arr_all_location_group_threshold);
echo json_encode($arr_return);
?>