<?php
if(!isset($v_sval)) die();
?>
<?php
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
$v_region_id = isset($_POST['txt_region_id'])?$_POST['txt_region_id']:'0';
settype($v_company_id, 'int');
settype($v_region_id, 'int');
if($v_company_id<0) $v_company_id = 0;
if($v_region_id<0) $v_region_id = 0;

$arr_return = array('error'=>0, 'message'=>'', 'location'=>array(), 'contact'=>array());
$arr_all_contact = array();
$arr_all_contact[]= array(
    'contact_id'=>0,
    'contact_name'=>'--------',
    'contact_info'=>''
);
$arr_all_region_location = array();

if($v_company_id>=0){
    $arr_location = array();
    $arr_all_location = $cls_tb_location->select(array('company_id'=>$v_company_id), array('location_number'=>1));
    foreach($arr_all_location as $arr){
        $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
        $v_location_region = isset($arr['location_region'])?$arr['location_region']:0;
        settype($v_location_id, 'int');
        settype($v_location_region, 'int');
        if($v_location_region==0) $arr_location[] = $arr;
    }
    //$arr_location = $cls_tb_location->select(array('company_id'=>$v_company_id, 'location_region'=>0));
    $v_idx=1;
    foreach($arr_location as $arr){

        $v_c_location_id = isset($arr['location_id'])?$arr['location_id']:0;
        $v_c_location_name = isset($arr['location_name'])?$arr['location_name']:'';
        $v_c_location_number = isset($arr['location_number'])?$arr['location_number']:'';
        $v_c_location_banner = isset($arr['location_banner'])?$arr['location_banner']:'';
        $v_c_location_region = isset($arr['location_region'])?$arr['location_region']:'0';
        $v_c_location_type = isset($arr['location_type'])?$arr['location_type']:'0';
        settype($v_c_location_region, 'int');
        //if($v_c_location_region>0 && $v_c_location_region!=$v_region_id) continue;

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

        $arr_all_region_location[] = array(
            'row_order'=> $v_idx++
            ,'location_id'=>$v_c_location_id
            ,'location_name'=>$v_c_location_name
            ,'location_type'=> $cls_settings->get_option_name_by_id('location_type', $v_c_location_type)
            ,'location_number'=>$v_c_location_number.""
            ,'location_banner'=>$v_c_location_banner
            ,'main_contact'=>$v_main_contact_name
            ,'location_address'=>$v_dsp_address
            ,'location_region'=> 0
        );

    }

    $arr_contact = $cls_tb_contact->select(array('company_id'=>$v_company_id));
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

    $arr_return['location'] = $arr_all_region_location;
    $arr_return['contact'] = $arr_all_contact;
}else{
    $arr_return['error'] = 1;
    $arr_return['message'] = 'Empty value!';
}
echo json_encode($arr_return);
?>