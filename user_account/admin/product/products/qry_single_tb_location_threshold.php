<?php
if(!isset($v_sval)) die();
?>
<?php
$v_product_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_product_id, 'int');
$v_dsp_location_threshold = '';
$v_company_id = 0;
if($v_product_id==0){
    $v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
    settype($v_company_id, 'int');
    if($v_company_id<0) $v_company_id = 0;
}else{
    $v_company_id = $cls_tb_product->select_scalar('company_id', array('product_id'=>$v_product_id));
    if(is_null($v_company_id)) $v_company_id = 0;
}
$arr_data = array();
if($v_company_id > 0){
    add_class('cls_tb_location_threshold');
    $cls_threshold = new cls_tb_location_threshold($db, LOG_DIR);


    $arr_threshold = $cls_threshold->select(array('company_id'=>$v_company_id, 'product_id'=>$v_product_id));
    $v_order = 1;

    $arr_exclude = array();
    foreach($arr_threshold as $arr){
        $v_tmp_location_id = $arr['location_id'];
        $v_tmp_product_id = $arr['product_id'];
        $v_tmp_product_threshold = $arr['product_threshold'];
        $v_tmp_is_overflow = $arr['is_overflow'];
        $v_tmp_status = $arr['status'];

        $v_location_name = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_tmp_location_id));
        $v_location_number = $cls_tb_location->select_scalar('location_number', array('location_id'=>$v_tmp_location_id));
        if(is_null($v_location_name)) $v_location_name = '';
        if($v_location_name!=''){
            $arr_exclude[] = $v_tmp_location_id;
            $arr_data[] = array('enable'=>1,'location_id'=>$v_tmp_location_id, 'location_name'=>$v_location_name, 'location_number'=>$v_location_number,'threshold'=>$v_tmp_product_threshold, 'overflow'=>$v_tmp_is_overflow);
        }
    }
    if(count($arr_exclude)>0)
        $arr_where = array('company_id'=>$v_company_id, 'location_id'=>array('$nin'=>$arr_exclude));
    else
        $arr_where = array('company_id'=>$v_company_id);
    $arr_location = $cls_tb_location->select($arr_where, array('location_name'=>1));
    foreach($arr_location as $arr){
        $v_location_name = $arr['location_name'];
        $v_location_number = $arr['location_number'];
        $v_tmp_location_id = $arr['location_id'];
        $arr_data[] = array('enable'=>0,'location_id'=>$v_tmp_location_id, 'location_name'=>$v_location_name, 'location_number'=>$v_location_number,'threshold'=>0, 'overflow'=>0);
    }
}
$v_dsp_company = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
?>