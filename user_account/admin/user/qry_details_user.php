<?php if(!isset($v_sval)) die();?>
<?php
add_class('cls_tb_company');
add_class('cls_tb_location');
add_class('cls_tb_contact');
$cls_tb_company = new cls_tb_company($db);
$cls_tb_location = new cls_tb_location($db);
$cls_tb_contact = new cls_tb_contact($db);

$v_error_message = '';
$v_mongo_id = NULL;
$v_user_id = 0;
$v_user_name = '';
$v_user_password = '';
$v_user_type = 3;
$v_user_status = 0;
$v_user_lastlog = date('Y-m-d H:i:s', time());
$v_user_id = isset($_GET['id'])?$_GET['id']:0;
$v_user_location_approved  = '';
$v_main_contact_name = "";
$v_main_location_name = "";
$v_main_company_name = "";

$v_contact_id = isset($_GET['id'])?$_GET['id']:0;

$v_row = $cls_tb_user->select_one(array('contact_id' =>(int)$v_contact_id));
if($v_row == 1){
    $v_user_id = $cls_tb_user->get_user_id();
    $v_user_name = $cls_tb_user->get_user_name();
    $v_user_password = $cls_tb_user->get_user_password();
    $v_user_type = $cls_tb_user->get_user_type();
    $v_user_status = $cls_tb_user->get_user_status();
    $v_contact_id = $cls_tb_user->get_contact_id();
    $v_company_id = $cls_tb_user->get_company_id();
    $v_location_id = $cls_tb_user->get_location_id();
    $v_user_location_approved = $cls_tb_user->get_user_location_approve();
    $v_user_lastlog = date('Y-m-d H:i:s',$cls_tb_user->get_user_lastlog());

    $v_main_contact_name = $cls_tb_contact->get_full_name_contact($v_contact_id);
    $v_main_location_name = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id));
    $v_main_company_name = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));

}
?>