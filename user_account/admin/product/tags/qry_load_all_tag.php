<?php
if(!isset($v_sval)) die();
$v_ajax_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
settype($v_ajax_company_id, 'int');
$arr_return = array('error'=>0, 'message'=>'', 'data'=>'');
$arr_all_tag = array();
if($v_ajax_company_id>=0){
    $arr_tag = $cls_tb_tag->select(array('company_id'=>(int) $v_ajax_company_id));
    foreach($arr_tag as $arr){
        $arr_all_tag[] = array('tag_id'=>$arr['tag_id'], 'tag_name'=>$arr['tag_name']);
    }
}else{
    $arr_return['message'] = 'Invalid Company ID';
    $arr_return['error'] = 1;
}
$arr_return['data'] = $arr_all_tag;
die(json_encode($arr_return));
?>