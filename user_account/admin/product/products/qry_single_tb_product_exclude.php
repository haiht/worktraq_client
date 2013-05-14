<?php
if(!isset($v_sval)) die();
?>
<?php

$v_product_id = isset($_REQUEST['id'])?$_REQUEST['id']:'0';
settype($v_product_id, 'int');
$v_company_id = 0;
$v_hidden_search = 0;
add_class('cls_tb_product');
$cls_product = new cls_tb_product($db, LOG_DIR);
$arr_excluded = array();
$arr_exist_location = array();
$v_excluded_location = '';
$arr_where_location = array();
if($v_product_id>0){
    $v_row = $cls_product->select_one(array('product_id'=>$v_product_id));
    if($v_row==1){
        $v_excluded_location = $cls_product->get_excluded_location();
        $v_company_id = $cls_product->get_company_id();
        if($v_excluded_location!=''){
            $arr_excluded = explode(',', $v_excluded_location);
        }
    }
}else{
    $v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
    settype($v_company_id, 'int');
}

add_class('cls_tb_company');
$cls_company = new cls_tb_company($db, LOG_DIR);
$v_dsp_company = $cls_company->draw_option('company_id', 'company_name',$v_company_id);
$v_dsp_location = '';
$v_dsp_selected_location='';
$v_location_name = '';
$v_location_number = '';
$v_list_selected_location = '';
if($v_company_id>0){
    add_class('cls_tb_location');
    $cls_location = new cls_tb_location($db, LOG_DIR);
    $arr_where_clause = array();

    $arr_clause_first = array();
    $arr_clause_second = array();

    $arr_clause_first['company_id'] = $v_company_id;
    $arr_list_select = array();
    if(isset($_POST['btn_submit'])){
        $v_hidden_search = 1;
        $v_list_selected_location = isset($_POST['txt_hidden_selected_location'])?$_POST['txt_hidden_selected_location']:'';
        $arr_excluded = isset($_POST['txt_selected_location'])?$_POST['txt_selected_location']:array();

        if(is_array($arr_excluded)){
            for($i=0; $i<count($arr_excluded); $i++){
                $arr_excluded[$i] = (int) $arr_excluded[$i];
            }
        }
        if(count($arr_excluded)>0) $arr_clause_second['location_id'] = array('$in'=>$arr_excluded);
        $v_location_name = isset($_POST['txt_location_name'])?trim($_POST['txt_location_name']):'';
        $v_location_number = isset($_POST['txt_location_number'])?trim($_POST['txt_location_number']):'';
        if($v_location_name!='') $arr_clause_first['location_name'] = new MongoRegex("/".$v_location_name."/i");
        if($v_location_number!=''){ //$arr_clause_first['location_number'] = new MongoRegex("/".$v_location_number."/i");
            $arr_clause_first['$where'] = "(this.location_number+'').indexOf(".$v_location_number.''.")>=0";
        }
        if(count($arr_where_location)>0) $arr_clause_first['location_id'] = array('$in'=>$arr_where_location);
    }
    if(!isset($arr_clause_second['location_id']))
        $arr_where_clause = $arr_clause_first;
    else
        $arr_where_clause = array('$or'=>array($arr_clause_first, $arr_clause_second));

    $arr_location = $cls_location->select($arr_where_clause, array('location_number'=>1));
    $v_dsp_location = '';
    $v_dsp_selected_location = '';
    foreach($arr_location as $arr){
        $v_ex_location_id = $arr['location_id'];
        if(strpos($v_list_selected_location, $v_ex_location_id.',')!==false) continue;
        if(in_array($v_ex_location_id, $arr_excluded)) continue;
        $v_ex_location_number = $arr['location_number'];
        $v_ex_location_number = pad_left($v_ex_location_number, 10, '&nbsp;');
        $v_location_name_text = $v_ex_location_number.' | '.$arr['location_name'];
        $v_dsp_location.= '<option value="'.$v_ex_location_id.'">'.$v_location_name_text.'</option>';
    }
    if($v_list_selected_location!=''){
        //$v_list_selected_location = substr($v_list_selected_location,0, strlen($v_list_selected_location)-1);
        $arr_location = $cls_location->select(array('$where'=>'"'.$v_list_selected_location.'".indexOf(this.location_id+",")>=0'), array('location_number'=>1));
        foreach($arr_location as $arr){
            $v_ex_location_id = $arr['location_id'];
            $v_ex_location_number = $arr['location_number'];
            $v_ex_location_number = pad_left($v_ex_location_number, 10, '&nbsp;');
            $v_location_name_text = $v_ex_location_number.' | '.$arr['location_name'];
            $v_dsp_selected_location.= '<option value="'.$v_ex_location_id.'">'.$v_location_name_text.'</option>';
        }
    }
}
?>