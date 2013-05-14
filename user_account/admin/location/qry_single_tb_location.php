<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_location_id = 0;
$v_location_name = '';
$v_location_banner = '';
$v_location_region = '';
$v_location_phone = '';
$v_company_id = 0;
$v_location_type = 0;
$v_location_number = '';
$v_main_contact = 0;
$v_approved_contact = 0;
$v_address_unit = '';
$v_address_line_1 = '';
$v_address_line_2 = '';
$v_address_line_3 = '';
$v_address_city = '';
$v_address_province = 0;
$v_address_postal = '';
$v_address_country = 15;
$v_flag_shipped_address = 1;

$v_shipped_address_unit = '';
$v_shipped_address_line_1 = '';
$v_shipped_address_line_2 = '';
$v_shipped_address_line_3 = '';
$v_shipped_address_city = '';
$v_shipped_address_province = 0;
$v_shipped_address_postal = '';
$v_shipped_address_country = 15;
$v_enable_close_date = 0;

$v_open_date = date('Y-m-d H:i:s', time());
$v_close_date = date('Y-m-d H:i:s', time());
$v_status = '0';
$v_new_location = true;
if(isset($_POST['btn_submit_tb_location'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_location->set_mongo_id($v_mongo_id);
	$v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:$v_location_id;
	if(is_null($v_mongo_id)){
		$v_location_id = $cls_tb_location->select_next('location_id');
	}
	$v_location_id = (int) $v_location_id;
	$cls_tb_location->set_location_id($v_location_id);
	$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
	$v_company_id = (int) $v_company_id;
	if($v_company_id<0) $v_error_message .= '[Company Id] is negative!<br />';
	$cls_tb_location->set_company_id($v_company_id);
	$v_location_type = isset($_POST['txt_location_type'])?$_POST['txt_location_type']:$v_location_type;
	$v_location_type = (int) $v_location_type;
	if($v_location_type<=0) $v_error_message .= '[Location Type] is negative!<br />';
	$cls_tb_location->set_location_type($v_location_type);
	$v_location_number = isset($_POST['txt_location_number'])?$_POST['txt_location_number']:$v_location_number;
	$v_location_number = (int) $v_location_number;
	if($v_location_number<0) $v_error_message .= '[Location Number] is negative!<br />';

    if($v_error_message==''){
        if($cls_tb_location->count(array('location_id'=>array('$ne'=>$v_location_id),'company_id'=>$v_company_id, '$where'=>"(this.location_number+'').toLowerCase()=='".strtolower($v_location_number)."'"))>0) $v_error_message .= '[Location Number] must be unique!<br />';
    }
    $cls_tb_location->set_location_number($v_location_number);

    $v_location_phone = isset($_POST['txt_location_phone'])?$_POST['txt_location_phone']:$v_location_phone;
    $v_location_phone = trim( $v_location_phone);
    if($v_location_phone=='') $v_error_message .= '[Location Phone] is empty!<br />';
    $cls_tb_location->set_location_phone($v_location_phone);

    $v_location_name = isset($_POST['txt_location_name'])?trim($_POST['txt_location_name']):'';
    if($v_location_name=='') $v_error_message.='[Location Name] is empty!<br />';
    $cls_tb_location->set_location_name($v_location_name);

    $v_location_banner = isset($_POST['txt_location_banner'])?trim($_POST['txt_location_banner']):'';
    $cls_tb_location->set_location_banner($v_location_banner);

    $v_location_region = isset($_POST['txt_location_region'])?trim($_POST['txt_location_region']):'';
    $cls_tb_location->set_location_region($v_location_region);

    $v_main_contact = isset($_POST['txt_main_contact'])?$_POST['txt_main_contact']:$v_main_contact;
	$v_main_contact = (int) $v_main_contact;
	if($v_main_contact<0) $v_error_message .= '[Main Contact] is negative!<br />';
	$cls_tb_location->set_main_contact($v_main_contact);

    $v_approved_contact = isset($_POST['txt_approved_contact'])?$_POST['txt_approved_contact']:$v_approved_contact;
    $v_approved_contact = (int) $v_approved_contact;
    if($v_approved_contact<0) $v_error_message .= '[Approved Contact] is negative!<br />';
    $cls_tb_location->set_approved_contact($v_approved_contact);

    $v_open_date = isset($_POST['txt_open_date'])?$_POST['txt_open_date']:$v_open_date;
    if(!check_date($v_open_date)) $v_error_message .= '[Open Date] is invalid date/time!<br />';
    $cls_tb_location->set_open_date($v_open_date);

    $v_enable_close_date = isset($_POST['chk_enable_close_date']);
    if($v_enable_close_date){
        $v_close_date = isset($_POST['txt_close_date'])?$_POST['txt_close_date']:$v_close_date;
        if(!check_date($v_close_date)) $v_error_message .= '[Close Date] is invalid date/time!<br />';
    }else{
        $v_close_date = NULL;
    }
    $cls_tb_location->set_close_date($v_close_date);
    $v_status = isset($_POST['txt_status'])?$_POST['txt_status']:$v_status;
    $v_status = (int) $v_status;
    if($v_status<0) $v_error_message .= '[Status] is negative!<br />';
    $cls_tb_location->set_status($v_status);


	$v_address_unit = isset($_POST['txt_address_unit'])?$_POST['txt_address_unit']:$v_address_unit;
	$v_address_unit = trim($v_address_unit);
	$cls_tb_location->set_address_unit($v_address_unit);
	$v_address_line_1 = isset($_POST['txt_address_line_1'])?$_POST['txt_address_line_1']:$v_address_line_1;
	$v_address_line_1 = trim($v_address_line_1);
	if($v_address_line_1=='') $v_error_message .= '[Address Line 1] is empty!<br />';
	$cls_tb_location->set_address_line_1($v_address_line_1);
	$v_address_line_2 = isset($_POST['txt_address_line_2'])?$_POST['txt_address_line_2']:$v_address_line_2;
	$v_address_line_2 = trim($v_address_line_2);
	$cls_tb_location->set_address_line_2($v_address_line_2);
	$v_address_line_3 = isset($_POST['txt_address_line_3'])?$_POST['txt_address_line_3']:$v_address_line_3;
	$v_address_line_3 = trim($v_address_line_3);
	$cls_tb_location->set_address_line_3($v_address_line_3);
	$v_address_city = isset($_POST['txt_address_city'])?$_POST['txt_address_city']:$v_address_city;
	$v_address_city = trim($v_address_city);
	if($v_address_city=='') $v_error_message .= '[Address City] is empty!<br />';
	$cls_tb_location->set_address_city($v_address_city);
	$v_address_province = isset($_POST['txt_address_province'])?$_POST['txt_address_province']:$v_address_province;
	$v_address_province = (int) $v_address_province;
	if($v_address_province<0) $v_error_message .= '[Address Province] is negative!<br />';
	$cls_tb_location->set_address_province($v_address_province);
	$v_address_postal = isset($_POST['txt_address_postal'])?$_POST['txt_address_postal']:$v_address_postal;
	$v_address_postal = trim($v_address_postal);
	if($v_address_postal=='') $v_error_message .= '[Address Postal] is empty!<br />';
	$cls_tb_location->set_address_postal($v_address_postal);
	$v_address_country = isset($_POST['txt_address_country'])?$_POST['txt_address_country']:$v_address_country;
	$v_address_country = (int) $v_address_country;
	if($v_address_country<0) $v_error_message .= '[Address Country] is negative!<br />';
	$cls_tb_location->set_address_country($v_address_country);

    $v_flag_shipped_address = isset($_POST['txt_flag_shipped_address']);
    if($v_flag_shipped_address){
        $v_shipped_address_unit = $v_address_unit;
        $v_shipped_address_line_1 = $v_address_line_1;
        $v_shipped_address_line_2 = $v_address_line_2;
        $v_shipped_address_line_3 = $v_address_line_3;
        $v_shipped_address_city = $v_address_city;
        $v_shipped_address_province = $v_address_province;
        $v_shipped_address_postal = $v_address_postal;
        $v_shipped_address_country = $v_address_country;
    }else{
        $v_shipped_address_unit = isset($_POST['txt_shipped_address_unit'])?$_POST['txt_shipped_address_unit']:$v_shipped_address_unit;
        $v_shipped_address_unit = trim($v_shipped_address_unit);
        $v_shipped_address_line_1 = isset($_POST['txt_shipped_address_line_1'])?$_POST['txt_shipped_address_line_1']:$v_shipped_address_line_1;
        $v_shipped_address_line_1 = trim($v_shipped_address_line_1);
        $v_shipped_address_line_2 = isset($_POST['txt_shipped_address_line_2'])?$_POST['txt_shipped_address_line_2']:$v_shipped_address_line_2;
        $v_shipped_address_line_2 = trim($v_shipped_address_line_2);
        $v_shipped_address_line_3 = isset($_POST['txt_shipped_address_line_3'])?$_POST['txt_shipped_address_line_3']:$v_shipped_address_line_3;
        $v_shipped_address_line_3 = trim($v_shipped_address_line_3);
        $v_shipped_address_city = isset($_POST['txt_shipped_address_city'])?$_POST['txt_shipped_address_city']:$v_shipped_address_city;
        $v_shipped_address_city = trim($v_shipped_address_city);
        $v_shipped_address_province = isset($_POST['txt_shipped_address_province'])?$_POST['txt_shipped_address_province']:$v_shipped_address_province;
        $v_shipped_address_province = (int) $v_shipped_address_province;
        $v_shipped_address_postal = isset($_POST['txt_shipped_address_postal'])?$_POST['txt_shipped_address_postal']:$v_shipped_address_postal;
        $v_shipped_address_postal = trim($v_shipped_address_postal);
        $v_shipped_address_country = isset($_POST['txt_shipped_address_country'])?$_POST['txt_shipped_address_country']:$v_shipped_address_country;
        $v_shipped_address_country = (int) $v_shipped_address_country;
    }
    $cls_tb_location->set_shipped_address_unit($v_shipped_address_unit);
    $cls_tb_location->set_shipped_address_line_1($v_shipped_address_line_1);
    $cls_tb_location->set_shipped_address_line_2($v_shipped_address_line_2);
    $cls_tb_location->set_shipped_address_line_3($v_shipped_address_line_3);
    $cls_tb_location->set_shipped_address_city($v_shipped_address_city);
    $cls_tb_location->set_shipped_address_province($v_shipped_address_province);
    $cls_tb_location->set_shipped_address_postal($v_shipped_address_postal);
    $cls_tb_location->set_shipped_address_country($v_shipped_address_country);

	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_location->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_location->update(array('_id' => $v_mongo_id));
			$v_new_location = false;
		}
		if($v_result){
			$_SESSION['ss_tb_location_redirect'] = 1;
			redir(URL.$v_admin_key);
		}else{
			if($v_new_location) $v_location_id = 0;
		}
	}
}else{
	$v_location_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_location_id,'int');
	if($v_location_id>0){
		$v_row = $cls_tb_location->select_one(array('location_id' => $v_location_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_location->get_mongo_id();
			$v_location_id = $cls_tb_location->get_location_id();
			$v_location_name = $cls_tb_location->get_location_name();
			$v_location_banner = $cls_tb_location->get_location_banner();
			$v_location_region = $cls_tb_location->get_location_region();
			$v_location_phone = $cls_tb_location->get_location_phone();
			$v_company_id = $cls_tb_location->get_company_id();
			$v_location_type = $cls_tb_location->get_location_type();
			$v_location_number = $cls_tb_location->get_location_number();
			$v_main_contact = $cls_tb_location->get_main_contact();
			$v_approved_contact = $cls_tb_location->get_approved_contact();
			$v_address_unit = $cls_tb_location->get_address_unit();
			$v_address_line_1 = $cls_tb_location->get_address_line_1();
			$v_address_line_2 = $cls_tb_location->get_address_line_2();
			$v_address_line_3 = $cls_tb_location->get_address_line_3();
			$v_address_city = $cls_tb_location->get_address_city();
			$v_address_province = $cls_tb_location->get_address_province();
			$v_address_postal = $cls_tb_location->get_address_postal();
			$arr_address_country = $cls_tb_location->get_address_country();
            $v_address_country = isset($arr_address_country['address_id'])?$arr_address_country['address_id']:15;


            $v_shipped_address_unit = $cls_tb_location->get_address_unit();
            $v_shipped_address_line_1 = $cls_tb_location->get_address_line_1();
            $v_shipped_address_line_2 = $cls_tb_location->get_address_line_2();
            $v_shipped_address_line_3 = $cls_tb_location->get_address_line_3();
            $v_shipped_address_city = $cls_tb_location->get_address_city();
            $v_shipped_address_province = $cls_tb_location->get_address_province();
            $v_shipped_address_postal = $cls_tb_location->get_address_postal();
            $arr_shipped_address_country = $cls_tb_location->get_address_country();
            $v_shipped_address_country = isset($arr_shipped_address_country['address_id'])?$arr_shipped_address_country['address_id']:15;



			$v_open_date = date('Y-m-d H:i:s',$cls_tb_location->get_open_date());
			$v_close_date = date('Y-m-d H:i:s',$cls_tb_location->get_close_date());
			$v_status = $cls_tb_location->get_status();
            $v_flag_shipped_address = $cls_tb_location->get_flag_shipped_address();

		}
	}
}
if($v_location_phone!=''){
    if(strpos($v_location_phone,'.')===false){
        $v_p1 = substr($v_location_phone,0,3);
        $v_p2 = substr($v_location_phone,3,3);
        $v_p3 = substr($v_location_phone,6);
        $v_location_phone = $v_p1.($v_p1!=''?'.':'').$v_p2.(($v_p2!='' && $v_p3!='')?'.':'').$v_p3;
    }
}

$v_open_date = strtotime($v_open_date);
$v_close_date = strtotime($v_close_date);

$v_enable_close_date = $v_close_date > $v_open_date;
$v_open_date = date('d-M-Y', $v_open_date);
$v_close_date = date('d-M-Y', $v_close_date);


$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);

?>