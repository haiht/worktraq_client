<?php if(!isset($v_sval)) die();?>
<?php
$v_location_id = isset($_GET['id'])?$_GET['id']:NULL;
if($v_location_id!=10000)
$cls_tb_location->delete(array('location_id' => (int)$v_location_id));
redir($_SERVER['HTTP_REFERER']);
?>