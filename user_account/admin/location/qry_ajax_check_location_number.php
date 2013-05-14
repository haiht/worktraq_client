<?php
if(!isset($v_sval)) die();?>
<?php
$v_location_number = isset($_POST['txt_location_number'])?$_POST['txt_location_number']:'';
$v_location_number = trim($v_location_number);
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:0;
$v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:0;
settype($v_company_id, 'int');
settype($v_location_id, 'int');
$arr_return = array('error'=>0, 'message'=>'OK');
if($v_location_number!=''){
    $arr_where_clause = array();
    if($v_company_id>0) $arr_where_clause['company_id'] = $v_company_id;
    if($v_location_number!='') $arr_where_clause['$where'] = "(this.location_number+'').toLowerCase()=='".strtolower($v_location_number)."'";
    if($v_location_id>0) $arr_where_clause['location_id'] = array('$ne'=>$v_location_id);
    if($cls_tb_location->count($arr_where_clause)>0){
        $arr_return['error']=2;
        $arr_return['message']= 'Choose another Location Number!';
    }
}else{
    $arr_return['error']=1;
    $arr_return['message']= 'Lost data!';
}
echo json_encode($arr_return);
?>