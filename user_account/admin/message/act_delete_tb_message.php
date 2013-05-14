<?php if(!isset($v_sval)) die();?>
<?php
$v_message_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_message_id, 'int');
$cls_tb_message->delete(array('message_id' => $v_message_id));
redir(URL.$v_admin_key);
?>