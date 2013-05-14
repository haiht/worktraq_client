<?php if(!isset($v_sval)) die();?>
<?php
$v_product_group_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_product_group_id, 'int');
if($v_product_group_id>0)
	$cls_tb_product_group->delete(array('product_group_id' => $v_product_group_id));
$_SESSION['ss_tb_product_group_redirect'] = 1;
redir(URL.$v_admin_key);
?>