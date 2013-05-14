<?php
if(!isset($v_sval)) die();
?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
settype($v_company_id, 'int');
if($v_company_id<0) $v_company_id = 0;

$arr_return = array('error'=>0, 'message'=>'', 'location'=>array(), 'contact'=>array(), 'role'=>array(), 'user_location'=>array());
$arr_all_location = array();
$arr_all_location[] = array('location_id'=>0, 'location_name'=>'--------');
$arr_all_contact = array();
$arr_all_contact[] = array('contact_id'=>0, 'contact_name'=>'--------');
$arr_all_role = array();
$arr_all_user_location = array();

if($v_company_id>=0){
    $arr_location = $cls_tb_location->select(array('company_id'=>$v_company_id));
    $v_idx=1;
    foreach($arr_location as $arr){

        $v_c_location_id = isset($arr['location_id'])?$arr['location_id']:0;
        $v_c_location_name = isset($arr['location_name'])?$arr['location_name']:'';
        $v_c_location_number = isset($arr['location_number'])?$arr['location_number']:'';
        $v_c_location_banner = isset($arr['location_banner'])?$arr['location_banner']:'';

        $v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
        $v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
        $v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
        $v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
        $v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
        $v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
        $v_address_unit =  isset($arr['address_unit'])?$arr['address_unit']:'';
        $v_main_contact =  isset($arr['main_contact'])?$arr['main_contact']:'0';
        settype($v_main_contact, 'int');
        $v_dsp_address = (trim($v_address_unit)!=''?trim($v_address_unit) .', ':'') . (trim($v_address_line_1)!=''?trim($v_address_line_1).', ' :'');
        $v_dsp_address .= (trim($v_address_line_2)!=''?trim($v_address_line_2). ', ' :'');
        $v_dsp_address .= (trim($v_address_line_3)!=''?trim($v_address_line_3).', ' :'');
        $v_dsp_address .= (trim($v_address_city)!=''?trim($v_address_city) .', ':'') . (trim($v_address_province)!=''?trim($v_address_province) .', ':'') .(trim($v_address_postal)!=''?trim($v_address_postal).', ':'');
        $v_dsp_address = trim($v_dsp_address);
        if($v_dsp_address!=''){
            if(substr($v_dsp_address, strlen($v_dsp_address)-1)==',') $v_dsp_address = substr($v_dsp_address,0,strlen($v_dsp_address)-1);
        }

        $v_main_contact_name = $cls_tb_contact->get_full_name_contact($v_main_contact);

        $arr_all_user_location[] = array(
            'row_order'=> $v_idx++
        ,'location_id'=>$v_c_location_id
        ,'location_name'=>$v_c_location_name
        ,'location_number'=>$v_c_location_number.""
        ,'location_banner'=>$v_c_location_banner
        ,'main_contact'=>$v_main_contact_name
        ,'location_address'=>$v_dsp_address
        ,'location_view'=> 0
        ,'location_approve'=> 0
        ,'location_allocate'=> 0
        );

        $arr_all_location[] = array('location_id'=>$arr['location_id'], 'location_name'=>$arr['location_name']);
    }

    $arr_contact = $cls_tb_contact->select(array('company_id'=>$v_company_id));
    foreach($arr_contact as $arr){
        $arr_all_contact[] = array('contact_id'=>$arr['contact_id'], 'contact_name'=>trim($arr['first_name'].' '.$arr['last_name']));
    }
    $arr_role = $cls_tb_role->select(array('company_id'=>$v_company_id));
    foreach($arr_role as $arr){
        $arr_all_role[] = array('role_id'=>$arr['role_id'], 'role_title'=>$arr['role_title']);
    }

    $arr_return['location'] = $arr_all_location;
    $arr_return['user_location'] = $arr_all_user_location;
    $arr_return['contact'] = $arr_all_contact;
    $arr_return['role'] = $arr_all_role;
}else{
    $arr_return['error'] = 1;
    $arr_return['message'] = 'Empty value!';
}
echo json_encode($arr_return);
?>