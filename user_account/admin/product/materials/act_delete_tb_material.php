<?php if(!isset($v_sval)) die();?>
<?php
$v_material_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_material_id, 'int');
if($v_material_id>0)
    $cls_tb_material->delete(array('material_id' => $v_material_id));
$_SESSION['ss_tb_material_redirect'] = 1;
redir(URL.$v_admin_key);
?>