<?php if(!isset($v_sval)) die();?>
<?php
$v_notice_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_notice_id, 'int');
$cls_tb_notice->delete(array('notice_id' => $v_notice_id));
redir(URL.$v_admin_key);
?>