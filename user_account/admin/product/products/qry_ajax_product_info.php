<?php
if(!isset($v_sval)) die();
?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
settype($v_company_id, 'int');
$arr_return = array('error'=>0, 'message'=>'', 'location'=>array(), 'tag'=>array(), 'group'=>array());
$arr_all_location = array();
$arr_all_location[] = array('location_id'=>0, 'location_name'=>'--------');
$arr_all_tag = array();
$arr_all_group = array();
$arr_all_group[] = array('product_group_id'=>0, 'product_group_name'=>'--------');
if($v_company_id>0){
    $arr_location = $cls_tb_location->select(array('company_id'=>$v_company_id));
    foreach($arr_location as $arr){
        $arr_all_location[] = array('location_id'=>$arr['location_id'], 'location_name'=>$arr['location_name']);
    }
    $arr_tag = $cls_tb_tag->select(array('company_id'=>$v_company_id));
    foreach($arr_tag as $arr){
        $arr_all_tag[] = array('tag_id'=>$arr['tag_id'], 'tag_name'=>$arr['tag_name']);
    }
    $arr_group = $cls_tb_product_group->select(array('company_id'=>$v_company_id));
    foreach($arr_group as $arr){
        $arr_all_group[] = array('product_group_id'=>$arr['product_group_id'], 'product_group_name'=>$arr['product_group_name']);
    }

}else{
    $arr_return['error'] = 1;
    $arr_return['message'] = 'Invalid Company ID';
}
$arr_return['location'] = $arr_all_location;
$arr_return['tag'] = $arr_all_tag;
$arr_return['group'] = $arr_all_group;
echo(json_encode($arr_return));
?>
