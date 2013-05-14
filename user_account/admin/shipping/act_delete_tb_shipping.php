<?php if(!isset($v_sval)) die();?>
<?php
$v_shipping_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_shipping_id, 'int');
if($v_shipping_id>0)
	$cls_tb_shipping->delete(array('shipping_id' => $v_shipping_id));
$_SESSION['ss_tb_shipping_redirect'] = 1;
redir(URL.$v_admin_key);
?>