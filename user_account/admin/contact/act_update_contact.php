<?php if(!isset($v_sval)) die();?>
<?php
    $_SESSION['error_contact'] = "";
    $v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
    if(!is_null($v_mongo_id)) $v_mongo_id = new MongoID($v_mongo_id);
    $cls_tb_contact->set_mongo_id($v_mongo_id);

    $v_contact_id = isset($_POST['txt_contact_id'])?$_POST['txt_contact_id']:0;
    $v_contact_id = (int) $v_contact_id;
    if($v_contact_id<0)  $_SESSION['error_contact'] .= 'Contact id is negative!<br />';
    $cls_tb_contact->set_contact_id($v_contact_id);

    $v_company_id  = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:0;
    $v_company_id = (int) $v_company_id;
    $cls_tb_contact->set_company_id($v_company_id);

    $v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:0;
    $v_location_id = (int) $v_location_id;
    if($v_location_id<0)  $_SESSION['error_contact'] .= 'Location id is negative!<br />';
    $cls_tb_contact->set_location_id($v_location_id);

    $v_contact_type = isset($_POST['txt_contact_type'])?$_POST['txt_contact_type']:0;
    $v_contact_type = trim($v_contact_type);
    if($v_contact_type=='')  $_SESSION['error_contact'] .= 'Contact type is empty!<br />';
    $cls_tb_contact->set_contact_type($v_contact_type);

    $v_first_name = isset($_POST['txt_first_name'])?$_POST['txt_first_name']:'';
    $v_first_name = trim($v_first_name);
    if($v_first_name=='')  $_SESSION['error_contact'] .= 'First Name is empty!<br />';
    $cls_tb_contact->set_first_name($v_first_name);

    $v_last_name = isset($_POST['txt_last_name'])?$_POST['txt_last_name']:$v_last_name;
    $v_last_name = trim($v_last_name);
    if($v_last_name=='')  $_SESSION['error_contact'] .= 'Last name is empty!<br />';
    $cls_tb_contact->set_last_name($v_last_name);

    $v_middle_name = isset($_POST['txt_middle_name'])?$_POST['txt_middle_name']:'';
    $v_middle_name = trim($v_middle_name);
    $cls_tb_contact->set_middle_name($v_middle_name);

    $v_birth_date = isset($_POST['txt_birth_date'])?$_POST['txt_birth_date']:NULL;

    $cls_tb_contact->set_birth_date($v_birth_date);

    $v_address_type = isset($_POST['txt_address_type'])?$_POST['txt_address_type']:0;
    $v_address_type = (int) $v_address_type;
    if($v_address_type<0)  $_SESSION['error_contact'] .= 'Address Type] is negative!<br />';
    $cls_tb_contact->set_address_type($v_address_type);

    $v_address_unit = isset($_POST['txt_address_unit'])?$_POST['txt_address_unit']:'';
    $v_address_unit = trim($v_address_unit);
    $cls_tb_contact->set_address_unit($v_address_unit);

    $v_address_line_1 = isset($_POST['txt_address_line_1'])?$_POST['txt_address_line_1']:'';
    $v_address_line_1 = trim($v_address_line_1);
    $cls_tb_contact->set_address_line_1($v_address_line_1);

    $v_address_line_2 = isset($_POST['txt_address_line_2'])?$_POST['txt_address_line_2']:'';
    $v_address_line_2 = trim($v_address_line_2);
    $cls_tb_contact->set_address_line_2($v_address_line_2);

    $v_address_line_3 = isset($_POST['txt_address_line_3'])?$_POST['txt_address_line_3']:'';
    $v_address_line_3 = trim($v_address_line_3);
    $cls_tb_contact->set_address_line_3($v_address_line_3);

    $v_address_city = isset($_POST['txt_address_city'])?$_POST['txt_address_city']:'';
    $v_address_city = trim($v_address_city);
    $cls_tb_contact->set_address_city($v_address_city);

    $v_address_province = isset($_POST['txt_address_province'])?$_POST['txt_address_province']:'';
    $v_address_province = trim($v_address_province);
    $cls_tb_contact->set_address_province($v_address_province);

    $v_address_postal = isset($_POST['txt_address_postal'])?$_POST['txt_address_postal']:'';
    $v_address_postal = trim($v_address_postal);
    $cls_tb_contact->set_address_postal($v_address_postal);

    $v_address_country = isset($_POST['txt_address_country'])?$_POST['txt_address_country']:'15';
    $v_address_country = (int) $v_address_country;
    $cls_tb_contact->set_address_country($v_address_country);

    $v_direct_phone = isset($_POST['txt_direct_phone'])?$_POST['txt_direct_phone']:'';
    $v_direct_phone = trim($v_direct_phone);
    if($v_direct_phone=='')  $_SESSION['error_contact'] .= 'Direct Phone is empty!<br />';
    $cls_tb_contact->set_direct_phone($v_direct_phone);

    $v_mobile_phone = isset($_POST['txt_mobile_phone'])?$_POST['txt_mobile_phone']:'';
    $v_mobile_phone = trim($v_mobile_phone);
    //if($v_mobile_phone=='')  $_SESSION['error_contact'] .= 'Mobile Phone is empty!<br />';
    $cls_tb_contact->set_mobile_phone($v_mobile_phone);

    $v_fax_number = isset($_POST['txt_fax_number'])?$_POST['txt_fax_number']:'';
    $v_fax_number = trim($v_fax_number);
    //if($v_fax_number=='')  $_SESSION['error_contact'] .= 'Fax Number is empty!<br />';
    $cls_tb_contact->set_fax_number($v_fax_number);

    $v_home_phone = isset($_POST['txt_home_phone'])?$_POST['txt_home_phone']:'';
    $v_home_phone = trim($v_home_phone);
    //if($v_home_phone=='')  $_SESSION['error_contact'] .= 'Home Phone is empty!<br />';
    $cls_tb_contact->set_home_phone($v_home_phone);

    $v_email = isset($_POST['txt_email'])?$_POST['txt_email']:'';
    $v_email = trim($v_email);
    
    if($v_email=='')  $_SESSION['error_contact'] .= 'Email is empty!<br />';
    if(!filter_var($v_email,FILTER_VALIDATE_EMAIL))
        $_SESSION['error_contact'] .= 'Email is not vaild!<br />';

    $cls_tb_contact->set_email($v_email);

    $v_main_contact = isset($_POST['chk_main_contact'])?$_POST['chk_main_contact']:0;

    $v_user_id = isset($_POST['txt_user_id'])?$_POST['txt_user_id']:'';
    $v_user_id = (int) $v_user_id;
    if($v_user_id<0)  $_SESSION['error_contact'] .= '[user_id] is negative!<br />';
    $cls_tb_contact->set_user_id($v_user_id);

    $v_receive_email_flag = isset($_POST['chk_receive_email_notification'])?$_POST['chk_receive_email_notification']:0;
    $v_receive_email_flag = (int) $v_receive_email_flag;
    $cls_tb_contact->set_receive_email_flag($v_receive_email_flag);

    $v_page = isset($_REQUEST['txt_page']) ? $_REQUEST['txt_page'] : 1;

	if( $_SESSION['error_contact']=='')
    {
        if($v_address_type<2)
        {
            $v_count = $cls_tb_location->select_one(array("location_id"=>$v_location_id));
            if($v_count==1)
            {
                $cls_tb_contact->set_address_unit($cls_tb_location->get_address_unit());
                $cls_tb_contact->set_address_line_1($cls_tb_location->get_address_line_1());
                $cls_tb_contact->set_address_line_2($cls_tb_location->get_address_line_2());
                $cls_tb_contact->set_address_line_3($cls_tb_location->get_address_line_3());
                $cls_tb_contact->set_address_city($cls_tb_location->get_address_city());
                $cls_tb_contact->set_address_province($cls_tb_location->get_address_province());
                $arr_country = $cls_tb_location->get_address_postal();
                $v_country_id  = isset($arr_country['address_id']) ? $arr_country['address_id'] : 15;
                $cls_tb_contact->set_address_country($v_country_id);
                $cls_tb_contact->set_address_postal($cls_tb_location->get_address_postal());
            }
        }

        if($v_contact_id==0)
        {
            $v_contact_id =  $cls_tb_contact->select_next('contact_id');
            $cls_tb_contact->set_contact_id($v_contact_id);
            $cls_tb_contact->insert();
        }
        else
        {
            $cls_tb_contact->update(array('contact_id' => $v_contact_id));
        }

        $v_contact_id_location = $cls_tb_location->select_scalar('main_contact',array("location_id"=>$v_location_id));
        if($v_contact_id_location=="" && $v_main_contact!=0)
            $cls_tb_location->update_field('main_contact',$v_contact_id,array("location_id"=>$v_location_id));

        if($v_contact_id==$v_contact_id_location && $v_main_contact==0)
            $cls_tb_location->update_field('main_contact',"",array("location_id"=>$v_location_id));

        /* Update sales rep for company */
        if($v_contact_type==2) // Sales Rep
        {
            $v_company_id = $cls_tb_location->select_scalar('company_id',array('location_id'=>(int)$v_location_id));
            if($v_company_id>0)
                $cls_tb_company->update_field('email_sales_rep',$v_email,array('company_id'=>(int)$v_company_id));
        }
        redir(URL.$v_admin_key .($v_page==1?'':'/page'.$v_page ));
    }
    else
    {
        $_SESSION['error_session'] .= $_SESSION['error_contact'];
        redir(URL.'admin/error');
    }

?>