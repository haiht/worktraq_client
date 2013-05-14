<?php
if(!isset($v_sval)) die();
$v_str = json_encode($_REQUEST);
$fp = fopen('xem.txt', 'w');
fwrite($fp, $v_str, strlen($v_str));
fclose($fp);
?>