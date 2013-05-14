<?php if(!isset($v_sval)) die();?>
<?php
$v_role_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_role_id, 'int');
$cls_tb_role->delete(array('role_id' => $v_role_id));
redir(URL.$v_admin_key);
?>