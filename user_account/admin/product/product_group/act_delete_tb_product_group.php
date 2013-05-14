<?php if(!isset($v_sval)) die();?>
<?php
$v_product_group_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_product_group_id, 'int');
$cls_tb_product_group->delete(array('product_group_id' => $v_product_group_id));
redir(URL.$v_admin_key);
?>