<?php if(!isset($v_sval)) die();?>
<?php
$v_user_id = isset($_GET['id'])?$_GET['id']:0;


$cls_tb_user->delete(array('user_id' =>(int)$v_user_id));
redir($_SERVER['HTTP_REFERER']);
?>