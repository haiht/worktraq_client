<?php
if(!isset($v_sval)) die();
?>
<?php
$v_product_id = isset($_POST['txt_product_id'])?$_POST['txt_product_id']:'0';
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
$v_product_sku = isset($_POST['txt_product_sku'])?$_POST['txt_product_sku']:'';

settype($v_company_id, 'int');
settype($v_product_id, 'int');
$v_product_sku = trim($v_product_sku);
if($v_product_id<0) $v_product_id = 0;
if($v_company_id<0) $v_company_id=0;
$arr_return = array('error'=>0, 'message'=>'', 'data'=>'');
if($v_product_sku!=''){
    $arr_where = array();
    $arr_where['product_sku'] = $v_product_sku;
    if($v_company_id>0){
        $arr_where['company_id'] = $v_company_id;
        $arr_where['product_sku'] = $v_product_sku;
        if($v_product_id>0) $arr_where['product_id'] = array('$ne'=>$v_product_id);
    }else{
        $arr_where['product_sku'] = $v_product_sku;
        if($v_product_id>0) $arr_where['product_id'] = array('$ne'=>$v_product_id);
    }
    if($cls_tb_product->count($arr_where)>0){
        $arr_return['error'] = 1;
        $arr_return['message'] = 'Duplicate product sku!';
    }else{

    }
    $arr_return['data'] = json_encode($arr_where);
}else{
    $arr_return['error'] = 100;
    $arr_where['message'] = 'Empty data!';
}
die(json_encode($arr_return));
?>