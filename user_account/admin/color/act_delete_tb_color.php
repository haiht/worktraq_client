<?php if(!isset($v_sval)) die();?>
<?php
$v_color_id = isset($_GET['id'])?$_GET['id']:NULL;
$cls_tb_color->delete(array('color_id' =>(int) $v_color_id));
redir($_SERVER['HTTP_REFERER']);
?>