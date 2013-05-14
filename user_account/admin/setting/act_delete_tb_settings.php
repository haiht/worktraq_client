<?php if(!isset($v_sval)) die();?>
<?php
$v_setting_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_setting_id, 'int');
if($v_setting_id>0)
	$cls_settings->delete(array('setting_id' => $v_setting_id));
$_SESSION['ss_tb_settings_redirect'] = 1;
redir(URL.$v_admin_key);
?>