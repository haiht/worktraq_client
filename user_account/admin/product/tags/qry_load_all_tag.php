<?php
if(!isset($v_sval)) die();

$v_ajax_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
settype($v_ajax_company_id, 'int');
$arr_return = array('error'=>0, 'message'=>'', 'data'=>'');
if($v_ajax_company_id>=0){
    $v_dsp_location = '<select id="txt_tag_id" name="txt_tag_id[]" multiple="multiple" style="width:250px">';
    $v_dsp_location .= $cls_tb_tag->draw_option('tag_id','tag_name','',array('company_id'=>(int) $v_ajax_company_id));
    $v_dsp_location .= '</select>';


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