<?php if(!isset($v_sval)) die();?>
<?php
$v_str = json_encode($_POST);
$fp = fopen('xem.txt', 'w');
fwrite($fp, $v_str, strlen($v_str));
fclose($fp);
?>
