<?php if(!isset($v_sval)) die();?>
<?php
$v_support_id = isset($_GET['txt_mongo_id'])?$_GET['txt_mongo_id']:NULL;
$v_mongo_id = new MongoID($v_mongo_id);
$cls_tb_support->delete(array('_id' => $v_mongo_id));
redir('?a=ACC&acc=ACT');
?>