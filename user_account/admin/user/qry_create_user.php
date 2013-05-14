<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_user_id = 0;
$v_user_name = '';
$v_user_password = '';
$v_user_type = 2;
$v_user_status = 0;
$v_user_lastlog = date('Y-m-d H:i:s', time());
$v_contact_id = isset($_GET['id'])?$_GET['id']:0;
$v_company_id = isset($_GET['txt_company_id'])?$_GET['txt_company_id']:0;
$v_location_id = isset($_GET['txt_location_id'])?$_GET['txt_location_id']:0;
if($v_user_id!=0){
    $v_row = $cls_tb_user->select_one(array('user_id' =>(int)$v_user_id));

    if($v_row == 1){
        $v_user_id = $cls_tb_user->get_user_id();
        $v_user_name = $cls_tb_user->get_user_name();
        $v_user_password = $cls_tb_user->get_user_password();
        $v_user_type = $cls_tb_user->get_user_type();
        $v_user_status = $cls_tb_user->get_user_status();
        $v_contact_id = $cls_tb_user->get_contact_id();
        $v_company_id = $cls_tb_user->get_company_id();
        $v_location_id = $cls_tb_user->get_location_id();
        $v_user_lastlog = date('Y-m-d H:i:s',$cls_tb_user->get_user_lastlog());
    }
}
?>