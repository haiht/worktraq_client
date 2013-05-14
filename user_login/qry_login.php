<?php
if(!isset($v_sval)) die();
?>
<?php
$v_message='';
add_class('cls_settings');
$cls_settings = new cls_settings($db, LOG_DIR);
$v_support_email = $cls_settings->get_option_name_by_key('email','support_email', 'nguyen@anvydigital.com');
if(isset($_POST['btn_login_submit'])){
	include 'act_check_login.php';
	if($v_error==0)
		redir(URL.'account/');
	else
		$v_message = $v_error_message;
}
?>