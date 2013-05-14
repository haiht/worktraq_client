<?php if(!isset($v_sval)) die();?>
<?php
$v_tag_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_tag_id, 'int');
if($v_tag_id>0)
	$cls_tb_tag->delete(array('tag_id' => $v_tag_id));
$_SESSION['ss_tb_tag_redirect'] = 1;
redir(URL.$v_admin_key);
?>