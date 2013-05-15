<?php
define('URL','http://worktraq-client.anvy.net/');

define('ROOT_DIR', getcwd());
define('DS', DIRECTORY_SEPARATOR);
define('LOG_DIR', ROOT_DIR.DS.'logs');

define('PRODUCT_IMAGE_DIR', ROOT_DIR.DS.'resources');
define('PRODUCT_IMAGE_LARGE', 2000);
define('PRODUCT_IMAGE_BIG', 1000);
define('PRODUCT_IMAGE_NORMAL', 800);
define('PRODUCT_IMAGE_SMALL', 600);
define('PRODUCT_IMAGE_MINIMAL', 400);
define('PRODUCT_IMAGE_THUMB', 200);
define('PRODUCT_IMAGE_ICON', 150);
define('LOGO_IMAGE_THUMB', 148);
define('PRODUCT_IMAGE_EXT', 'jpg,png');
define('PRODUCT_UPLOAD_SIZE',2097152);
define('ORDER_ROWS_ONE_PAGE', 20);
define('PRODUCT_ROWS_ONE_PAGE', 20);
define('SHIPPING_ROWS_ONE_PAGE', 40);
define('ADMIN_ROWS_ONE_PAGE', 20);
define('NO_PRICE', 'N/A');
define('THEMES_SAVED', 'user.themes.txt');
$arr_product_image_size = array(PRODUCT_IMAGE_LARGE, PRODUCT_IMAGE_BIG, PRODUCT_IMAGE_NORMAL, PRODUCT_IMAGE_MINIMAL, PRODUCT_IMAGE_SMALL, PRODUCT_IMAGE_THUMB, PRODUCT_IMAGE_ICON);


define('IMAGE_URL', URL.'images/');
define('RESOURCE_URL', URL.'resources/');
$arr_allow_file_type = array("jpg","jpeg","gif","wmv","swf","wma","rar","mid","mp3","png","tif","doc","rar","zip","pdf","rtf","txt","xls");
$v_tag_allow ="<p><a><b><br>";

$v_log_dir = "logs";

/* Set up variables */
$arr_setting_type=array();
$arr_setting_type[0]="-------";
$arr_setting_type[1]="Develop";
$arr_setting_type[2]="Template";

/*Money */
$v_sign_money = "$";
/** Order **/

?>
