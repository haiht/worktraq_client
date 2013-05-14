<?php if(!isset($v_sval)) die();?>
<?php
$v_support_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_support_id, 'int');
if($v_support_id>0)
	$cls_tb_support->delete(array('support_id' => $v_support_id));
$_SESSION['ss_tb_support_redirect'] = 1;
redir(URL.$v_admin_key);
?>