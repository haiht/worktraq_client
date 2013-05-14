<?php
ob_start();
session_start();
error_reporting(E_ALL);
$v_sval = 1;
include 'const.php';
include 'config.php';
include 'connect.php';
require 'functions/index.php';

date_default_timezone_set($v_server_timezone);

$arr_user = create_user();
$a = isset($_GET['a'])?$_GET['a']:'';

if(!isset($arr_user['user_login']) || ($arr_user['user_login']==0)){
	include 'user_login/index.php';
}else{
	switch($a){
		case 'LO':
			include 'user_logout/index.php';
			break;
		case 'ACC':
		default:
			include 'user_account/index.php';
			break;
	}
}
require 'disconnect.php';
?>