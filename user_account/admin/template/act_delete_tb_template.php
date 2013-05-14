<?php if(!isset($v_sval)) die();?>
<?php
$v_template_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_template_id, 'int');
$cls_tb_template->delete(array('template_id' => $v_template_id));
redir(URL.$v_admin_key);
?>