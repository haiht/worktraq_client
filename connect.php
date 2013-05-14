<?php if(!isset($v_sval)) die();

$v_connect_string = "mongodb://{$v_host}:{$v_port}";
$m = new Mongo($v_connect_string);

if(!isset($m)) die('Not instance');
$db = $m->selectDB($v_database);

?>
