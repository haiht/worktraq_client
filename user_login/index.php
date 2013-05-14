<?php if(!isset($v_sval)) die();?>
<?php
require 'classes/cls_tb_user.php';
$cls_tb_user = new cls_tb_user($db);
add_class('cls_settings');
$cls_settings = new cls_settings($db, LOG_DIR);
include 'qry_login.php';
include 'dsp_login.php';
?>