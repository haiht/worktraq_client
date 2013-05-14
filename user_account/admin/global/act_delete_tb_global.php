<?php if(!isset($v_sval)) die();?>
<?php
$v_global_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_global_id, 'int');
$cls_tb_global->delete(array('global_id' => $v_global_id));
redir(URL.$v_admin_key);
?>