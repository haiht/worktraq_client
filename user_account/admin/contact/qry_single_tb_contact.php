<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_contact_id = 0;
$v_location_id = 0;
$v_company_id = 0;
$v_contact_type = 0;
$v_first_name = '';
$v_last_name = '';
$v_middle_name = '';
$v_birth_date = date('Y-m-d H:i:s', time());
$v_address_type = 0;
$v_address_unit = '';
$v_address_line_1 = '';
$v_address_line_2 = '';
$v_address_line_3 = '';
$v_address_city = '';
$v_address_province = '';
$v_address_postal = '';
$v_address_country = 0;
$v_direct_phone = '';
$v_mobile_phone = '';
$v_fax_number = '';
$v_home_phone = '';
$v_email = '';
$v_user_id = 0;
$v_check_main_contact = 0;
$v_new_contact = true;
if(isset($_POST['btn_submit_tb_contact'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_contact->set_mongo_id($v_mongo_id);
	$v_contact_id = isset($_POST['txt_contact_id'])?$_POST['txt_contact_id']:$v_contact_id;
	if(is_null($v_mongo_id)){
		$v_contact_id = $cls_tb_contact->select_next('contact_id');
	}
	$v_contact_id = (int) $v_contact_id;
	$cls_tb_contact->set_contact_id($v_contact_id);
    $v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_location_id;
    $v_company_id = (int) $v_company_id;
    if($v_company_id<0) $v_error_message .= '[Company Id] is negative!<br />';
    $cls_tb_contact->set_company_id($v_company_id);
	$v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:$v_location_id;
	$v_location_id = (int) $v_location_id;
	if($v_location_id<0) $v_error_message .= '[Location Id] is negative!<br />';
	$cls_tb_contact->set_location_id($v_location_id);
	$v_contact_type = isset($_POST['txt_contact_type'])?$_POST['txt_contact_type']:$v_contact_type;
	$v_contact_type = settype($v_contact_type,'int');
	if($v_contact_type<=0) $v_error_message .= '[Contact Type] is negative!<br />';
	$cls_tb_contact->set_contact_type($v_contact_type);
	$v_first_name = isset($_POST['txt_first_name'])?$_POST['txt_first_name']:$v_first_name;
	$v_first_name = trim($v_first_name);
	if($v_first_name=='') $v_error_message .= '[First Name] is empty!<br />';
	$cls_tb_contact->set_first_name($v_first_name);
	$v_last_name = isset($_POST['txt_last_name'])?$_POST['txt_last_name']:$v_last_name;
	$v_last_name = trim($v_last_name);
	if($v_last_name=='') $v_error_message .= '[Last Name] is empty!<br />';
	$cls_tb_contact->set_last_name($v_last_name);
	$v_middle_name = isset($_POST['txt_middle_name'])?$_POST['txt_middle_name']:$v_middle_name;
	$v_middle_name = trim($v_middle_name);
	$cls_tb_contact->set_middle_name($v_middle_name);
	$v_birth_date = isset($_POST['txt_birth_date'])?$_POST['txt_birth_date']:$v_birth_date;
	if(!check_date($v_birth_date)) $v_error_message .= '[Birth Date] is invalid date/time!<br />';
	$cls_tb_contact->set_birth_date($v_birth_date);


    $v_direct_phone = isset($_POST['txt_direct_phone'])?$_POST['txt_direct_phone']:$v_direct_phone;
    $v_direct_phone = trim($v_direct_phone);
    $cls_tb_contact->set_direct_phone($v_direct_phone);
    $v_mobile_phone = isset($_POST['txt_mobile_phone'])?$_POST['txt_mobile_phone']:$v_mobile_phone;
    $v_mobile_phone = trim($v_mobile_phone);
    $cls_tb_contact->set_mobile_phone($v_mobile_phone);
    $v_fax_number = isset($_POST['txt_fax_number'])?$_POST['txt_fax_number']:$v_fax_number;
    $v_fax_number = trim($v_fax_number);
    $cls_tb_contact->set_fax_number($v_fax_number);
    $v_home_phone = isset($_POST['txt_home_phone'])?$_POST['txt_home_phone']:$v_home_phone;
    $v_home_phone = trim($v_home_phone);
    $cls_tb_contact->set_home_phone($v_home_phone);
    $v_email = isset($_POST['txt_email'])?$_POST['txt_email']:$v_email;
    $v_email = trim($v_email);
    if(!is_valid_email($v_email)) $v_error_message.='[Input Email is invalid!<br />';
    $cls_tb_contact->set_email($v_email);
    $v_user_id = isset($_POST['txt_user_id'])?$_POST['txt_user_id']:$v_user_id;
    $v_user_id = (int) $v_user_id;
    if($v_user_id<0) $v_error_message .= '[User Id] is negative!<br />';
    $cls_tb_contact->set_user_id($v_user_id);


    $v_address_type = isset($_POST['txt_address_type'])?$_POST['txt_address_type']:$v_address_type;
	$v_address_type = (int) $v_address_type;
	if($v_address_type<=0) $v_error_message .= '[Address Type] is negative!<br />';
    $cls_tb_contact->set_address_type($v_address_type);
    $v_row = 0;
    if($v_error_message==''){
        if($v_address_type == 1){
            if($v_location_id>0){
                $v_row = $cls_tb_location->select_one(array('location_id'=>$v_location_id));
                if($v_row){
                    $cls_tb_contact->set_address_unit($cls_tb_location->get_address_unit());
                    $cls_tb_contact->set_address_line_1($cls_tb_location->get_address_line_1());
                    $cls_tb_contact->set_address_line_2($cls_tb_location->get_address_line_2());
                    $cls_tb_contact->set_address_line_3($cls_tb_location->get_address_line_3());
                    $cls_tb_contact->set_address_city($cls_tb_location->get_address_city());
                    $cls_tb_contact->set_address_province($cls_tb_location->get_address_province());
                    $cls_tb_contact->set_address_postal($cls_tb_location->get_address_postal());
                    $arr_country = $cls_tb_location->get_address_country();
                    $v_country_id = isset($arr_country['address_id'])?$arr_country['address_id']:15;
                    settype($v_country_id, 'int');
                    $cls_tb_contact->set_address_country($v_country_id);
                }
            }
        }
    }
    if($v_row==0){
        $v_address_unit = isset($_POST['txt_address_unit'])?$_POST['txt_address_unit']:$v_address_unit;
        $v_address_unit = trim($v_address_unit);
        //if($v_address_unit=='') $v_error_message .= '[Address Unit] is empty!<br />';
        $cls_tb_contact->set_address_unit($v_address_unit);
        $v_address_line_1 = isset($_POST['txt_address_line_1'])?$_POST['txt_address_line_1']:$v_address_line_1;
        $v_address_line_1 = trim($v_address_line_1);
        //if($v_address_line_1=='') $v_error_message .= '[Address Line 1] is empty!<br />';
        $cls_tb_contact->set_address_line_1($v_address_line_1);
        $v_address_line_2 = isset($_POST['txt_address_line_2'])?$_POST['txt_address_line_2']:$v_address_line_2;
        $v_address_line_2 = trim($v_address_line_2);
        //if($v_address_line_2=='') $v_error_message .= '[Address Line 2] is empty!<br />';
        $cls_tb_contact->set_address_line_2($v_address_line_2);
        $v_address_line_3 = isset($_POST['txt_address_line_3'])?$_POST['txt_address_line_3']:$v_address_line_3;
        $v_address_line_3 = trim($v_address_line_3);
        //if($v_address_line_3=='') $v_error_message .= '[Address Line 3] is empty!<br />';
        $cls_tb_contact->set_address_line_3($v_address_line_3);
        $v_address_city = isset($_POST['txt_address_city'])?$_POST['txt_address_city']:$v_address_city;
        $v_address_city = trim($v_address_city);
        //if($v_address_city=='') $v_error_message .= '[Address City] is empty!<br />';
        $cls_tb_contact->set_address_city($v_address_city);
        $v_address_province = isset($_POST['txt_address_province'])?$_POST['txt_address_province']:$v_address_province;
        $v_address_province = trim($v_address_province);
        //if($v_address_province=='') $v_error_message .= '[Address Province] is empty!<br />';
        $cls_tb_contact->set_address_province($v_address_province);
        $v_address_postal = isset($_POST['txt_address_postal'])?$_POST['txt_address_postal']:$v_address_postal;
        $v_address_postal = trim($v_address_postal);
        //if($v_address_postal=='') $v_error_message .= '[Address Postal] is empty!<br />';
        $cls_tb_contact->set_address_postal($v_address_postal);
        $v_address_country = isset($_POST['txt_address_country'])?$_POST['txt_address_country']:$v_address_country;
        $v_address_country = (int) $v_address_country;
        //if($v_address_country<0) $v_error_message .= '[Address Country] is negative!<br />';
        $cls_tb_contact->set_address_country($v_address_country);
    }
    $v_main_contact = isset($_POST['txt_main_contact']);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_contact->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_contact->update(array('_id' => $v_mongo_id));
			$v_new_contact = false;
		}
		if($v_result){
            if($v_main_contact) $cls_tb_location->update_field('main_contact', $v_contact_id, array("location_id"=>$v_location_id));
            /* Update sales rep for company */
            if($v_contact_type==2) // Sales Rep
            {
                if($v_company_id<=0) $v_company_id = $cls_tb_location->select_scalar('company_id',array('location_id'=>(int)$v_location_id));
                if($v_company_id>0)
                    $cls_tb_company->update_field('email_sales_rep',$v_email,array('company_id'=>(int)$v_company_id));
            }
            if($v_user_id>0) $cls_tb_user->update_field('contact_id', $v_contact_id, array('user_id'=>$v_user_id));

			$_SESSION['ss_tb_contact_redirect'] = 1;
			redir(URL.$v_admin_key);
		}else{
			if($v_new_contact) $v_contact_id = 0;
		}
	}
}else{
	$v_contact_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_contact_id,'int');
	if($v_contact_id>0){
		$v_row = $cls_tb_contact->select_one(array('contact_id' => $v_contact_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_contact->get_mongo_id();
			$v_contact_id = $cls_tb_contact->get_contact_id();
			$v_location_id = $cls_tb_contact->get_location_id();
			$v_contact_type = $cls_tb_contact->get_contact_type();
			$v_first_name = $cls_tb_contact->get_first_name();
			$v_last_name = $cls_tb_contact->get_last_name();
			$v_middle_name = $cls_tb_contact->get_middle_name();
			$v_birth_date = date('Y-m-d H:i:s',$cls_tb_contact->get_birth_date());
			$v_address_type = $cls_tb_contact->get_address_type();
			$v_address_unit = $cls_tb_contact->get_address_unit();
			$v_address_line_1 = $cls_tb_contact->get_address_line_1();
			$v_address_line_2 = $cls_tb_contact->get_address_line_2();
			$v_address_line_3 = $cls_tb_contact->get_address_line_3();
			$v_address_city = $cls_tb_contact->get_address_city();
			$v_address_province = $cls_tb_contact->get_address_province();
			$v_address_postal = $cls_tb_contact->get_address_postal();
			$v_address_country = $cls_tb_contact->get_address_country();
			$v_direct_phone = $cls_tb_contact->get_direct_phone();
			$v_mobile_phone = $cls_tb_contact->get_mobile_phone();
			$v_fax_number = $cls_tb_contact->get_fax_number();
			$v_home_phone = $cls_tb_contact->get_home_phone();
			$v_email = $cls_tb_contact->get_email();
			$v_user_id = $cls_tb_contact->get_user_id();
			$v_company_id = $cls_tb_contact->get_company_id();

            /* Find Company _id */
            $v_company_id = $cls_tb_contact->get_company_id();
            if($v_company_id==0)
                $v_company_id = $cls_tb_location->select_scalar('company_id',array('location_id'=>(int)$v_location_id ));

            $v_user_name  = $cls_tb_user->get_username_by_contact((int) $v_contact_id);

            /*Check Main Contact */
            $v_check_main_contact = $cls_tb_location->select_scalar('main_contact',array('location_id'=>(int)$v_location_id));
		}
	}
}
$v_birth_date = date('d-M-Y', strtotime($v_birth_date));
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);

$v_tmp_location_id = $v_location_id;
$arr_all_location = get_array_data($cls_tb_location, 'location_id', 'location_name', $v_tmp_location_id, array(0,'--------'), array('company_id'=>$v_company_id));
$v_location_id=$v_tmp_location_id;
?>