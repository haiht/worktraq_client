<?php if (!isset($v_sval)) die(); ?>
<?php
$v_location_id = isset($_REQUEST['txt_location_id']) ? $_REQUEST['txt_location_id'] : 0;
$v_company_id = isset($_REQUEST['txt_company_id']) ? $_REQUEST['txt_company_id'] : 0;
$v_location_number = isset($_REQUEST['txt_location_number']) ? $_REQUEST['txt_location_number'] : 0;
$arr_return = array('error'=>0, 'message'=>'', 'data'=>'');
$v_num = 1;
if($v_company_id==0 || $v_location_number==0 || $v_location_number=='')
{
    $arr_return['error'] = 2;
    $arr_return['message']= 'Check company or  location number!...' ;
    $arr_return['data'] = 0;
}
$v_num = $cls_tb_location->count(array('location_number'=>(int)$v_location_number,'company_id'=>(int) $v_company_id ));

if($v_num==0)
{
    $arr_return['error'] = 0;
    $arr_return['message']= 'The number can use' ;
    $arr_return['data'] = 0;
}
else
{
    $arr_return['error'] = 2;
    $arr_return['message']= 'The location number is exists, choise another!';
    $arr_return['data'] = $v_num;
}
die(json_encode($arr_return));
?>