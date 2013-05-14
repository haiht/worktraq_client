<?php
if(!isset($v_sval)) die();

$v_global_id = isset($_POST['txt_global_id'])?$_POST['txt_global_id']:'0';
$v_status  = isset($_POST['txt_status'])?$_POST['txt_status']:'0';
settype($v_company_id, 'int');

$arr_return = array('error'=>0, 'message'=>'', 'data'=>'');
if($v_global_id>=0){
    $v_setting_key = $cls_settings->get_option_key_by_id('status',$v_status);

    $arr_fields = array('global_value','setting_key');
    $arr_values = array($v_status, $v_setting_key);
    $arr_where = array('global_id'=>(int) $v_global_id);

    $v_result = $cls_tb_global->update_fields($arr_fields,$arr_values,$arr_where);
    if($v_result==true){
        $arr_return['error'] = 1;
        $arr_return['message']= 'The wesbite has change to ' .$cls_settings->get_option_name_by_id('status',$v_status) .' in '. $cls_tb_global->select_scalar('global_name')  ;
        $arr_return['data'] = $cls_settings->get_option_name_by_id('status',$v_status). ' <img data="'.$v_global_id.'" rel="change_value" src="'.URL.'/images/icons/gtk-edit.png">';
    }
    else
    {
        $arr_return['message']= 'The wesbite can not change to ' .$cls_tb_global->select_scalar('global_name');
        $arr_return['data'] = "Can't update status!..";
    }
}
else
{
    $arr_return['message']= 'OK!';
    $arr_return['data'] = 'Can\'t update, Not found global id!..>';
}
die(json_encode($arr_return));

?>