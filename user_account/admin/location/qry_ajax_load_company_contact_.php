<?php
if(!isset($v_sval)) die();?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:0;
settype($v_company_id, 'int');
$arr_return = array('error'=>0, 'message'=>'OK', 'contact'=>array());
$arr_where_clause = array();
if($v_company_id>0) $arr_where_clause['company_id'] = $v_company_id;
$arr_all_contact = array();
if($v_company_id>0){
    $arr_all_contact[] = array('contact_id'=>0,'contact_name'=>'--------');
    $arr_contact = $cls_tb_contact->select(array('company_id'=>$v_company_id));
    foreach($arr_contact as $arr){
        $v_first_name = isset($arr['first_name'])?$arr['first_name']:'';
        $v_middle_name = isset($arr['middle_name'])?$arr['middle_name']:'';
        $v_last_name = isset($arr['last_name'])?$arr['last_name']:'';
        $v_contact_name = $v_first_name.' '.$v_middle_name.' '.$v_last_name;
        $v_contact_name = trim($v_contact_name);
        do{
            $v_cont = strpos($v_contact_name,'  ')!==false;
            $v_contact_name = str_replace('  ',' ',$v_contact_name);
        }while($v_cont);
        $arr_all_contact[] = array('contact_id'=>$arr['contact_id'],'contact_name'=>$v_contact_name);
    }
}
if(count($arr_all_contact)==0) $arr_all_contact[] = array('contact_id'=>0, 'contact_name'=>'--------');
$arr_return['contact'] = $arr_all_contact;
echo json_encode($arr_return);
?>