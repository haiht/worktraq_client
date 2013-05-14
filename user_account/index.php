<?php
if(!isset($v_sval)) die();
if(!isset($arr_user['user_login']) || $arr_user['user_login']==0) die();
$v_user_type = $arr_user['user_type'];
$v_user_status = $arr_user['user_status'];
if($v_user_status==1) die('Your account is locked! Click <a href="logout/">here</a> to continue!');

require 'classes/cls_tb_user_log.php';
$cls_tb_user_log = new cls_tb_user_log($db);
/*
$cls_tb_user_log = new cls_tb_user_log($db);
$v_user_log_id = $cls_tb_user_log->select_next('log_id');
$cls_tb_user_log->set_log_id($v_user_log_id);

$v_user_name = get_unserialize_user('user_name');
$v_ip_address = get_unserialize_user('user_ip');
$cls_tb_user_log->set_log_ipaddress($v_ip_address);
$cls_tb_user_log->set_user_id($v_user_name);
$cls_tb_user_log->set_log_datetime(date('Y-m-d h:i:s'));
$cls_tb_user_log->set_log_url("http:".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$cls_tb_user_log->insert();
*/


if($v_user_type<=2){
    $v_template = 'user_account/admin/';
    include 'user_account/admin/index.php';
}
else{
    $v_head  = 'user_account/customer/';
    include 'user_account/customer/index.php';
}
?>