<?php if(!isset($v_sval)) die();?>
<?php
require 'classes/cls_tb_user.php';
$cls_tb_user = new cls_tb_user($db);
//require 'classes/cls_tb_contact.php';
//$cls_tb_contact = new cls_tb_contact($db);
//require 'classes/cls_tb_location.php';
//$cls_tb_contact = new cls_tb_contact($db);
//require 'classes/cls_tb_contact.php';
//$cls_tb_contact = new cls_tb_contact($db);

if(isset($_POST['txt_ajax'])){
	//die("{error=10}{message=H}");
	include 'act_ajax_login.php';
}else{
	include 'qry_login.php';
	include 'dsp_login.php';
}
?>