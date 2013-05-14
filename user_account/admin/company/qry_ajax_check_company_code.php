<?php
if(!isset($v_sval)) die();
?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
$v_company_code = isset($_POST['txt_company_code'])?$_POST['txt_company_code']:'';
settype($v_company_id, 'int');
$arr_return = array('error'=>0, 'message'=>'OK');
if($v_company_code!=''){
    if($cls_tb_company->count(array('$where'=>"this.company_code.toLowerCase()=='".strtolower($v_company_code)."'", 'company_id'=>array('$ne'=>$v_company_code)))>0){
        $arr_return['error'] = 2;
        $arr_return['message'] = 'Duplicate Company Code!';
    }

}else{
    $arr_return['error'] = 1;
    $arr_return['message'] = 'Lost data!';
}

echo json_encode($arr_return);
?>