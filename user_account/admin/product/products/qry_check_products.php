<?php if(!isset($v_sval)) die();?>
<?php
$v_product_id = isset($_REQUEST['txt_location_id']) ? $_REQUEST['txt_location_id'] : 0;
$v_type_check = isset($_REQUEST['txt_type']) ? strtolower($_REQUEST['txt_type']) : '';
$arr_return = array('error'=>0, 'message'=>'', 'data'=>'');

if($v_type_check=='sku')
{

    $v_product_sku = isset($_REQUEST['txt_product_sku']) ? $_REQUEST['txt_product_sku'] : '';
    $v_count_sku = $cls_tb_product->count(array('product_sku'=>$v_product_sku));

    if($v_count_sku>0)
    {
        $arr_return['error'] = 1;
        $arr_return['message']= 'Can not use product sky, The product sku is exist in database, please choice anthor product sku' ;
        $arr_return['data'] = $v_count_sku;
    }
    if($v_count_sku==0)
    {
        $arr_return['error'] = 0;
        $arr_return['message']= 'Checked, the product sky can use it!...' ;
        $arr_return['data'] = $v_count_sku;
    }
}
die(json_encode($arr_return));
?>