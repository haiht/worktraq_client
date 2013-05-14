<?php if(!isset($v_sval)) die();?>
<?php
$v_location_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_location_id, 'int');
if($v_location_id>0)
	$cls_tb_location->delete(array('location_id' => $v_location_id));
$_SESSION['ss_tb_location_redirect'] = 1;
redir(URL.$v_admin_key);
?>