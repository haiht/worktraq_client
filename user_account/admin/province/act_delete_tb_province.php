<?php if(!isset($v_sval)) die();?>
<?php
$v_province_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_province_id, 'int');
$cls_tb_province->delete(array('province_id' => $v_province_id));
redir(URL.$v_admin_key);
?>