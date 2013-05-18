<?php
@session_start();
$v_time_zone = 'Asia/Saigon';
date_default_timezone_set($v_time_zone);

define('DS_URL', 'http://site.worktraq.net/design/');
define("DS_ROOT_DIR", getcwd());
define("DS_DS", DIRECTORY_SEPARATOR);
define("USER_UPLOAD_DIR", DS_ROOT_DIR.DS_DS.'user_upload');
define("FILEDATA", "user.image.txt");
include 'functions/index.php';
?>