<?php if(!isset($v_sval)) die();?>
<?php
$v_contact_id = isset($_GET['id'])?$_GET['id']:NULL;
//$v_mongo_id = new MongoID($v_mongo_id);
$cls_tb_contact->delete(array('contact_id' =>(int) $v_contact_id));
redir($_SERVER['HTTP_REFERER']);
?>