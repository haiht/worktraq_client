<?php if(!isset($v_sval)) die();?>
<?php
$v_ajax_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
settype($v_ajax_company_id, 'int');

$arr_return = array('error'=>0, 'message'=>'', 'data'=>'');
if($v_ajax_company_id>=0){
    $v_dsp_product = $cls_tb_product_group->draw_all_product_option($v_ajax_company_id,0,0);

    $arr_return['error'] = 0;
    $arr_return['message']= 'OK!';
    $arr_return['data'] = '<option value="0" selected="selected">-- Select --</option>'.$v_dsp_product;

}else{
    $arr_return['error'] = 1;
    $arr_return['message']= 'Company ID is negative!';
}
die(json_encode($arr_return));
?>