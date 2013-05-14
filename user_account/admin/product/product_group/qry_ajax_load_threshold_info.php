<?php
if(!isset($v_sval)) die();
?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
settype($v_company_id, 'int');

$arr_return = array('error'=>0, 'mesaage'=>'', 'product'=>array(), 'group'=>array(), 'threshold'=>array());
$arr_all_product = array();
$arr_all_product_group = array();
$arr_all_product_group[] = array('product_group_id'=>0, 'product_group_name'=>'--------');
$arr_all_location_group_threshold = array();
$v_total_rows = 0;

if($v_company_id>0){
    $arr_product = $cls_tb_product->select(array('company_id'=>$v_company_id, 'product_status'=>3));
    foreach($arr_product as $arr){
        $v_product_id = isset($arr['product_id'])?$arr['product_id']:0;
        $v_product_sku = isset($arr['product_sku'])?$arr['product_sku']:'';
        $v_short_description = isset($arr['short_description'])?$arr['short_description']:'';
        $v_saved_dir = isset($arr['saved_dir'])?$arr['saved_dir']:'';
        $v_image_file = isset($arr['image_file'])?$arr['image_file']:'';
        if($v_product_id>0){
            $arr_all_product[] = array(
                'product_id'=>$v_product_id
            ,'product_sku'=>$v_product_sku
            ,'short_description'=>$v_short_description
            ,'product_image'=>file_exists($v_saved_dir.$v_image_file)?$v_saved_dir.$v_image_file:''
            );
        }
    }
    $arr_all_product_group = $cls_tb_product_group->get_tree_product_group($v_company_id, 0,'',$arr_all_product_group);
    $arr_all_location = $cls_tb_location->select(array('company_id'=>$v_company_id,'status'=>0), array('location_number'=>1));
    foreach($arr_all_location as $arr){
        $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
        $v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
        $v_location_number = isset($arr['location_number'])?$arr['location_number']:'';
        $v_total_rows++;
        $arr_all_location_group_threshold[] = array(
            'row_order'=>$v_total_rows
            ,'lg_threshold_id'=>0
            ,'location_id'=>$v_location_id
            ,'location_name'=>$v_location_name
            ,'location_number'=>$v_location_number.''
            ,'threshold_value'=>0
            ,'threshold_note'=>''
            ,'overflow'=>0
            ,'enable'=>0
        );
    }

}
$arr_return['product'] = $arr_all_product;
$arr_return['group'] = $arr_all_product_group;
$arr_return['threshold'] = $arr_all_location_group_threshold;

echo json_encode($arr_return);
?>