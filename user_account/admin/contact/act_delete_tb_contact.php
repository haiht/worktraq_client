<?php if(!isset($v_sval)) die();?>
<?php
$v_contact_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_contact_id, 'int');
if($v_contact_id>0)
	$cls_tb_contact->delete(array('contact_id' => $v_contact_id));
$_SESSION['ss_tb_contact_redirect'] = 1;
redir(URL.$v_admin_key);
?>