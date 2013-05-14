<?php
if(!isset($v_sval)) die();
?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
settype($v_company_id, 'int');
$arr_all_product = array();
$v_total_rows = 0;

$arr_product = $cls_tb_product->select(array('company_id'=>$v_company_id, 'product_status'=>3));
foreach($arr_product as $arr){
    $v_product_id = isset($arr['product_id'])?$arr['product_id']:0;
    $v_product_sku = isset($arr['product_sku'])?$arr['product_sku']:'';
    $v_short_description = isset($arr['short_description'])?$arr['short_description']:'';
    $v_saved_dir = isset($arr['saved_dir'])?$arr['saved_dir']:'';
    $v_image_file = isset($arr['image_file'])?$arr['image_file']:'';
    if($v_product_id>0){
        $v_total_rows++;
        $arr_all_product[] = array(
            'product_id'=>$v_product_id
        ,'product_sku'=>$v_product_sku
        ,'short_description'=>$v_short_description
        ,'product_image'=>file_exists($v_saved_dir.$v_image_file)?$v_saved_dir.$v_image_file:''
        );
    }
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_product'=>$arr_all_product);
echo json_encode($arr_return);
?>