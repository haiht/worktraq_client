<?php
if(!isset($v_sval)) die();
?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
settype($v_company_id, 'int');
$arr_contact = $cls_tb_contact->select(array('company_id'=>$v_company_id));
$arr_all_contact = array();
$arr_all_contact[]= array(
    'contact_id'=>0,
    'contact_name'=>'--------',
    'contact_info'=>''
);
foreach($arr_contact as $arr){
    $v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
    $v_first_name = isset($arr['first_name'])?$arr['first_name']:'';
    $v_last_name = isset($arr['last_name'])?$arr['last_name']:'';
    $v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
    $v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
    $v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
    $v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
    $v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
    $v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
    $v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
    $v_direct_phone = isset($arr['direct_phone'])?$arr['direct_phone']:'';
    $v_email = isset($arr['email'])?$arr['email']:'';

    $v_full_name = $v_first_name.' ' .$v_last_name;
    $v_info = ($v_address_unit!=''?$v_address_unit.',':'') . ($v_address_line_1!=''?$v_address_line_1. '<br>':'');
    $v_info .= (trim($v_address_line_2)!="" ? "-". $v_address_line_2.'<br>': '');
    $v_info .= (trim($v_address_line_3)!="" ? "-". $v_address_line_3.'<br>': '');
    $v_info .=  $v_address_city.'&nbsp&nbsp' .$v_address_province .'&nbsp&nbsp'.   $v_address_postal.'<br>' ;
    $v_info .=  ($v_direct_phone!=''?$v_direct_phone .'<br>':'') ;
    $v_info .=  $v_email;

    $arr_all_contact[] = array(
        'contact_id'=>$v_contact_id,
        'contact_name'=>$v_full_name,
        'contact_info'=>$v_info
    );
}
header("Content-type: application/json");
echo json_encode($arr_all_contact);

?>