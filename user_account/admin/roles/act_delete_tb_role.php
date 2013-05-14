<?php if(!isset($v_sval)) die();?>
<?php
$v_rule_id = isset($_REQUEST['id'])?$_REQUEST['id']:0;
$cls_tb_rule->delete(array('rule_id' =>(int)$v_rule_id));
redir($_SERVER['HTTP_REFERER']);

?>