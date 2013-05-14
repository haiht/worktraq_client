<?php if (!isset($v_sval)) die(); ?>
<?php
add_class('cls_tb_user');
add_class('cls_tb_company');
add_class('cls_tb_location');
add_class('cls_tb_contact');
$cls_tb_user = new cls_tb_user($db);
$cls_tb_company = new cls_tb_company($db);
$cls_tb_location = new cls_tb_location($db);
$cls_tb_contact = new cls_tb_contact($db);
$v_user_id = isset($_REQUEST['txt_user_id']) ? $_REQUEST['txt_user_id'] : 0;
$v_count = $cls_tb_user->select_one(array('user_id'=>(int)$v_user_id));
$v_user_id = $cls_tb_user->get_user_id();
$v_user_name = $cls_tb_user->get_user_name();
$v_company_id =  $cls_tb_user->get_company_id();
$v_location_id =  $cls_tb_user->get_location_id();
$v_contact_id = $cls_tb_user->get_contact_id();
$v_company_name = $cls_tb_company->select_scalar('company_name',array('company_id'=>(int)$v_company_id));
$v_location_name = $cls_tb_location->select_scalar('location_name',array('location_id'=>(int)$v_location_id));
$v_contact_name = $cls_tb_contact->get_infomation_contact($v_contact_id);





?>