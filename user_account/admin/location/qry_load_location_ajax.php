<?php
if(!isset($v_sval)) die();

$v_ajax_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
settype($v_ajax_company_id, 'int');
$arr_return = array('error'=>0, 'message'=>'', 'data'=>'');
if($v_ajax_company_id>=0){
    $arr_location = $cls_tb_location->select_limit_fields(0,1000,array('location_id', 'location_name'), array('company_id'=>$v_ajax_company_id, 'status'=>0), array('location_name'=>1));
    $v_dsp_location = '';
    foreach($arr_location as $arr){
        $v_dsp_location .= '<option value="'.$arr['location_id'].'">'.$arr['location_name'].'</option>';
    }
    $v_dsp_location = '<option value="0" selected="selected">------</option>'.$v_dsp_location;
    if($v_dsp_location!=''){
        $arr_return['error'] = 0;
        $arr_return['message']= 'OK!';
        $arr_return['data'] = $v_dsp_location;
    }else{
        $arr_return['error'] = 2;
        $arr_return['message']= 'Cannot load location!';
    }
}else{
    $arr_return['error'] = 1;
    $arr_return['message']= 'Product ID is negative!';
}
die(json_encode($arr_return));
?>