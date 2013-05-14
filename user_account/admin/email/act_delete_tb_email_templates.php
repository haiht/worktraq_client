<?php if(!isset($v_sval)) die();?>
<?php
$v_email_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_email_id, 'int');
if($v_email_id>0)
	$cls_tb_email_templates->delete(array('email_id' => $v_email_id));
$_SESSION['ss_tb_email_templates_redirect'] = 1;
redir(URL.$v_admin_key);
?>