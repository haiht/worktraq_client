<?php if(!isset($v_sval)) die();?>
<?php
$v_tag_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_tag_id, 'int');
$cls_tb_tag->delete(array('tag_id' => $v_tag_id));
redir(URL.$v_admin_key);
?>