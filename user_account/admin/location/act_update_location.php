<?php if(!isset($v_sval)) die();?>
<?php
$_SESSION['error_location'] = "";

$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
if(!is_null($v_mongo_id)) $v_mongo_id = new MongoID($v_mongo_id);
$cls_tb_location->set_mongo_id($v_mongo_id);

$v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:0;
$v_location_id = (int) $v_location_id;
if($v_location_id<0) $_SESSION['error_location'] .= ' Location is negative!<br />';

if($v_location_id==0) $cls_tb_location->set_location_id($v_location_id);
else $cls_tb_location->set_location_id($v_location_id,false);

$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:0;
$v_company_id = (int) $v_company_id;
if($v_company_id<0) $_SESSION['error_location'] .= ' Company is negative!<br />';
$cls_tb_location->set_company_id($v_company_id);

$v_location_name = isset($_POST['txt_location_name'])?$_POST['txt_location_name']:'';
if($v_location_name=='') $_SESSION['error_location'] .= ' Location Name is not blank !<br />';
$cls_tb_location->set_location_name($v_location_name);

$v_location_phone = isset($_POST['txt_location_phone'])?$_POST['txt_location_phone']:'';
$cls_tb_location->set_location_phone($v_location_phone);

$v_location_type = isset($_POST['txt_location_type'])?$_POST['txt_location_type']:0;
$v_location_type = (int) $v_location_type;
if($v_location_type<0) $_SESSION['error_location'] .= ' Location type  is negative!<br />';
$cls_tb_location->set_location_type($v_location_type);

$v_location_region = isset($_POST['txt_location_region'])?$_POST['txt_location_region']:0;
$v_location_region = trim($v_location_region);
//if($v_location_area=='') $_SESSION['error_location'] .= 'Location Area is empty!<br />';
$cls_tb_location->set_location_region($v_location_region);

$v_location_banner = isset($_POST['txt_location_banner'])?$_POST['txt_location_banner']:'';
$v_location_banner = trim($v_location_banner);
//if($v_location_area=='') $_SESSION['error_location'] .= 'Location Area is empty!<br />';
$cls_tb_location->set_location_banner($v_location_banner);

$v_location_number = isset($_POST['txt_location_number'])?$_POST['txt_location_number']:0;
$v_check_location_number = isset($_POST['txt_check_location_number']) ?$_POST['txt_check_location_number']:0;
if($v_check_location_number==1){
    if($v_location_number=='') $_SESSION['error_location'] .= 'Location Number is empty!<br />';
    $v_count = $cls_tb_location->count(array('location_number'=>(int)$v_location_number, 'company_id'=>(int)$v_company_id ));
    if($v_count>1) $_SESSION['error_location'] .= 'Location Number is duplicate, please choise number!<br />';
}
$cls_tb_location->set_location_number($v_location_number);

$v_address_unit = isset($_POST['txt_address_unit'])?$_POST['txt_address_unit']:$v_address_unit;
$v_address_unit = trim($v_address_unit);
//if($v_address_unit=='') $_SESSION['error_location'] .= 'Address Unit is empty!<br />';
$cls_tb_location->set_address_unit($v_address_unit);

$v_address_line_1 = isset($_POST['txt_address_line_1'])?$_POST['txt_address_line_1']:$v_address_line_1;
$v_address_line_1 = trim($v_address_line_1);
if($v_address_line_1=='') $_SESSION['error_location'] .= 'Address Line 1 is empty!<br />';
$cls_tb_location->set_address_line_1($v_address_line_1);

$v_address_line_2 = isset($_POST['txt_address_line_2'])?$_POST['txt_address_line_2']:$v_address_line_2;
$v_address_line_2 = trim($v_address_line_2);
//if($v_address_line_2=='') $_SESSION['error_location'] .= 'Address Line 2 is empty!<br />';
$cls_tb_location->set_address_line_2($v_address_line_2);

$v_address_line_3 = isset($_POST['txt_address_line_3'])?$_POST['txt_address_line_3']:$v_address_line_3;
$v_address_line_3 = trim($v_address_line_3);
//if($v_address_line_3=='') $_SESSION['txt_error_location'] .= 'Address Line 3 is empty!<br />';
$cls_tb_location->set_address_line_3($v_address_line_3);

$v_address_city = isset($_POST['txt_address_city'])?$_POST['txt_address_city']:$v_address_city;
$v_address_city = trim($v_address_city);
if($v_address_city=='') $_SESSION['error_location'] .= 'Address City is empty!<br />';
$cls_tb_location->set_address_city($v_address_city);

$v_address_province = isset($_POST['txt_address_province'])?$_POST['txt_address_province']:$v_address_province;
$v_address_province = trim($v_address_province);
//if($v_address_province=='') $_SESSION['error_location'] .= 'Address Province  is empty!<br />';
$cls_tb_location->set_address_province($v_address_province);

$v_address_postal = isset($_POST['txt_address_postal'])?$_POST['txt_address_postal']:$v_address_postal;
$v_address_postal = trim($v_address_postal);
if($v_address_postal=='') $_SESSION['error_location'] .= 'Address Postal is empty!<br />';
$cls_tb_location->set_address_postal($v_address_postal);

$v_address_country = isset($_POST['txt_address_country'])?$_POST['txt_address_country']:$v_address_country;
$v_address_country = (int) $v_address_country;
if($v_address_country<0) $_SESSION['error_location'] .= 'Address Country  is negative!<br />';
$cls_tb_location->set_address_country($v_address_country);

$v_flag_shipped_address = isset($_POST['chk_shipped_address']) ?$_POST['chk_shipped_address']:0;
$cls_tb_location->set_flag_shipped_address($v_flag_shipped_address);

if($v_flag_shipped_address==0){
    $v_shipped_address_unit = isset($_POST['txt_shipped_address_unit'])?$_POST['txt_shipped_address_unit']:$v_shipped_address_unit;
    $v_shipped_address_line_1 = isset($_POST['txt_shipped_address_line_1'])?$_POST['txt_shipped_address_line_1']:$v_shipped_address_line_1;
    $v_shipped_address_line_2 = isset($_POST['txt_shipped_address_line_2'])?$_POST['txt_shipped_address_line_2']:$v_shipped_address_line_2;
    $v_shipped_address_line_3 = isset($_POST['txt_shipped_address_line_3'])?$_POST['txt_shipped_address_line_3']:$v_shipped_address_line_3;
    $v_shipped_address_city = isset($_POST['txt_shipped_address_city'])?$_POST['txt_shipped_address_city']:$v_shipped_address_city;
    $v_shipped_address_postal = isset($_POST['txt_shipped_address_postal'])?$_POST['txt_shipped_address_postal']:$v_shipped_address_postal;
    $v_shipped_address_province = isset($_POST['txt_shipped_address_province'])?$_POST['txt_shipped_address_province']:$v_shipped_address_province;
    echo $v_shipped_address_province;
    $v_shipped_address_country = isset($_POST['txt_shipped_address_country'])?$_POST['txt_shipped_address_country']:$v_shipped_address_country;
}else{
    $v_shipped_address_unit = $v_address_unit;
    $v_shipped_address_line_1 =  $v_address_line_1;
    $v_shipped_address_line_2 = $v_address_line_2;
    $v_shipped_address_line_3 = $v_address_line_3;
    $v_shipped_address_city =  $v_address_city;
    $v_shipped_address_postal = $v_address_postal;
    $v_shipped_address_province = $v_address_province;
    $v_shipped_address_country =$v_address_country;
}

$cls_tb_location->set_shipped_address_unit($v_shipped_address_unit);
$cls_tb_location->set_shipped_address_line_1($v_shipped_address_line_1);
$cls_tb_location->set_shipped_address_line_2($v_shipped_address_line_2);
$cls_tb_location->set_shipped_address_line_3($v_shipped_address_line_3);
$cls_tb_location->set_shipped_address_city($v_shipped_address_city);
$cls_tb_location->set_shipped_address_postal($v_shipped_address_postal);
$cls_tb_location->set_shipped_address_province($v_shipped_address_province);
$cls_tb_location->set_shipped_address_country($v_shipped_address_country);

$v_approved_contact = isset($_POST['txt_approved_contact'])?$_POST['txt_approved_contact']:'0';
settype($v_approved_contact, 'int');
$cls_tb_location->set_approved_contact($v_approved_contact);

$v_page = isset($_REQUEST['txt_page']) ? $_REQUEST['txt_page'] : 1;

$v_open_date = isset($_POST['txt_open_date'])?$_POST['txt_open_date'] : NULL;
//if(!check_date($v_open_date)) $_SESSION['error_location'] .= 'Open Date is invalid date/time!<br />';
$cls_tb_location->set_open_date($v_open_date);

$v_close_date = isset($_POST['txt_close_date'])?($_POST['txt_close_date']!=''?$_POST['txt_close_date']:NULL) :NULL;
$v_chk_close_date = isset($_POST['chk_closedate'])?$_POST['chk_closedate']:0;
if($v_chk_close_date==1) $cls_tb_location->set_close_date($v_close_date);
else $cls_tb_location->set_close_date(NULL);

$v_status = isset($_POST['txt_status'])?$_POST['txt_status']:$v_status;
$v_status = (int) $v_status;

$cls_tb_location->set_status($v_status);

if($_SESSION['error_location']==''){

    if($v_location_id==0){
        $v_location_id = $cls_tb_location->select_next('location_id');
        $cls_tb_location->set_location_id((int)$v_location_id);
        $cls_tb_location->insert();
    }
    else{
        $cls_tb_location->update(array('location_id' => (int)$v_location_id));
        /*Update Company_id for Contact_id */
        add_class('cls_tb_user');
        $cls_tb_user = new cls_tb_user($db);
        $cls_tb_user->update_field('company_id',$v_company_id,array('location_id'=>(int)$v_location_id));
    }
    redir(URL.$v_admin_key .($v_page==1?'':'/page'.$v_page));
}
else
{
    if($v_location_id==0) redir(URL.$v_admin_key.'/'.$v_location_id.'/error');
    else redir(URL.$v_admin_key.'/'.$v_location_id.'/edit/er');
}


?>