<?php if(!isset($v_sval)) die();?>
<?php
$v_message_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_message_id, 'int');
if($v_message_id>0)
	$cls_tb_message->delete(array('message_id' => $v_message_id));
$_SESSION['ss_tb_message_redirect'] = 1;
redir(URL.$v_admin_key);
?>