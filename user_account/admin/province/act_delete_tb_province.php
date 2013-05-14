<?php if(!isset($v_sval)) die();?>
<?php
$v_province_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_province_id, 'int');
if($v_province_id>0)
	$cls_tb_province->delete(array('province_id' => $v_province_id));
$_SESSION['ss_tb_province_redirect'] = 1;
redir(URL.$v_admin_key);
?>