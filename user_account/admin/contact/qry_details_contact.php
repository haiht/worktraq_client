<?php  if (!isset($v_sval)) die(); ?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_contact_id = 0;
$v_location_id = isset($_GET['txt_location_id'])?$_GET['txt_location_id']:0;
$v_company_id = isset($_GET['txt_company_id'])?$_GET['txt_company_id']:0;
$v_contact_type = '';
$v_check_main_contact = 0;
$v_first_name = '';
$v_last_name = '';
$v_middle_name = '';
$v_birth_date = '';
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

add_class('cls_tb_country');
$cls_tb_country = new cls_tb_conutry($db);
if(isset($_POST['btn_submit_tb_contact'])){
}else{
    $v_contact_id = isset($_GET['id'])?$_GET['id']:0;
    if($v_contact_id!=0){
        $v_row = $cls_tb_contact->select_one(array('contact_id' =>(int)$v_contact_id));
        if($v_row == 1){
            $v_contact_id = $cls_tb_contact->get_contact_id();
            $v_location_id = $cls_tb_contact->get_location_id();
            $v_contact_type = $cls_tb_contact->get_contact_type();
            $v_first_name = $cls_tb_contact->get_first_name();
            $v_last_name = $cls_tb_contact->get_last_name();
            $v_middle_name = $cls_tb_contact->get_middle_name();
            $v_birth_date = date('d-M-Y',$cls_tb_contact->get_birth_date());
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

            /* Find Company _id */
            $v_company_id = $cls_tb_location->select_scalar('company_id',array('location_id'=>(int)$v_location_id ));
            $v_user_name  = $cls_tb_user->get_username_by_contact((int) $v_contact_id);

            $v_check_main_contact = 0;
            /*Check Main Contact */
            $v_check_main_contact = $cls_tb_location->select_scalar('main_contact',array('location_id'=>(int)$v_location_id));
        }
    }
}
?>