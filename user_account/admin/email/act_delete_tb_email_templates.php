<?php if(!isset($v_sval)) die();?>
<?php
$v_email_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_email_id, 'int');
$cls_tb_email_templates->delete(array('email_id' => $v_email_id));
redir(URL.$v_admin_key);
?>