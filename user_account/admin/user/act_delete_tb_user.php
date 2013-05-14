<?php if(!isset($v_sval)) die();?>
<?php
$v_user_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_user_id, 'int');
if($v_user_id>0)
	$cls_tb_user->delete(array('user_id' => $v_user_id));
$_SESSION['ss_tb_user_redirect'] = 1;
redir(URL.$v_admin_key);
?>