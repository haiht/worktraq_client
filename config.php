<?php

if (!version_compare(PHP_VERSION, "5.0")) {
	exit("To make things right, you must install PHP5");
}
if (!class_exists("Mongo")) {
	exit("To make things right, you must install php_mongo module. <a href=\"http://www.php.net/manual/en/mongo.installation.php\" target=\"_blank\">Here for installation documents on PHP.net.</a>");
}

$v_host = '192.168.0.108';

$v_port = '27017';
$v_user_name = 'longtt';
$v_user_password = '1234';

$v_database = "worktraq";
$v_server_timezone = 'Canada/Mountain';
$v_mail_from = 'info@anvydigital.com';
$v_mail_production = 'nguyen@anvydigital.com';
?>
