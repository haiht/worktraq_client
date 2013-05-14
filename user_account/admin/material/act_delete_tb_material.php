<?php if(!isset($v_sval)) die();?>
<?php
$v_material_id = isset($_GET['id'])?$_GET['id']:NULL;

$cls_tb_metarial->delete(array('material_id' => (int)$v_material_id));
redir($_SERVER['HTTP_REFERER']);
?>