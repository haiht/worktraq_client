<?php if(!isset($v_sval)) die();?>
<?php
$v_tracking_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_tracking_id, 'int');
if($v_tracking_id>0)
	$cls_tb_tracking->delete(array('tracking_id' => $v_tracking_id));
$_SESSION['ss_tb_tracking_redirect'] = 1;
redir(URL.$v_admin_key);
?>