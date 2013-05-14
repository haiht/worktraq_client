<?php if(!isset($v_sval)) die();?>
<?php
$v_module_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_module_id, 'int');
$cls_tb_module->delete(array('module_id' => $v_module_id));
$_SESSION['ss_tb_module_redirect'] = 1;
redir(URL.$v_admin_key);
?>