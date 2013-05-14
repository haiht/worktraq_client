<?php
if(!isset($v_sval)) die();
?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
$v_region_id = isset($_POST['txt_region_id'])?$_POST['txt_region_id']:'0';
settype($v_company_id, 'int');
settype($v_region_id, 'int');
$arr_all_location_log = array();

$arr_location_log = $cls_tb_location_log->select(array('region_id'=>$v_region_id));

$v_idx = 1;

foreach($arr_location_log as $arr){
    $v_location_id = $arr['location_id'];
    $v_log_id = $arr['log_id'];
    $v_region_contact = $arr['region_contact'];
    $v_region_contact = $arr['region_contact'];
    $v_open_date = $arr['open_date'];
    $v_close_date = $arr['close_date'];

    $v_is_closed = !is_null($v_close_date);

    $v_location_name = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id));
    $v_location_number = $cls_tb_location->select_scalar('location_number', array('location_id'=>$v_location_id));
    $v_contact_name = $cls_tb_contact->get_full_name_contact($v_region_contact);
    $v_open_date = date('d-M-Y H:i:s', $v_open_date->sec);
    $v_close_date = $v_is_closed?date('d-M-Y H:i:s', $v_close_date->sec):'';
    $arr_all_location_log[] = array(
        'row_order'=> $v_idx++
        ,'location_id'=>$v_location_id
        ,'log_id'=>$v_log_id
        ,'location_name'=>$v_location_name
        ,'region_contact'=> $v_contact_name
        ,'location_number'=> $v_location_number.""
        ,'open_date'=>$v_open_date
        ,'close_date'=>$v_close_date
        ,'complete'=> $v_is_closed?1:0
    );
}

$arr_return = array('total_rows'=>count($arr_all_location_log), 'location_log'=>$arr_all_location_log);
header("Content-type: application/json");
echo json_encode($arr_return);

?>