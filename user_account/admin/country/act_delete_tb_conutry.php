<?php if(!isset($v_sval)) die();?>
<?php
$v_country_id = isset($_GET['txt_country_id'])?$_GET['txt_country_id']:0;
$cls_tb_conutry->delete(array('country_id' =>(int) $v_country_id));

redir('?a=ACC&acc=COU');
?>