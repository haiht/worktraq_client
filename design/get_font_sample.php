<?php
include 'const.php';
include 'font.config.php';
$v_height = 30;
$v_width = 160;
$v_point_size = 13;

$v_name = isset($_GET['name'])?$_GET['name']:'myriad';
$v_key = get_font_key($v_name);

$im = imagecreatetruecolor($v_width, $v_height);
$v_fill_color = imagecolorallocate($im, 255,255,255);
imagefill($im,0,0, $v_fill_color);
$v_text_color = imagecolorallocate($im, 0, 0, 0);
$v_font = DS_ROOT_DIR.DS_DS."fonts/".$v_key.'/regular.ttf';
imagettftext($im, $v_point_size, 0, 5, 24, $v_text_color, $v_font, $v_name);
header("Content-Type: image/png");
imagepng($im);
imagedestroy($im);
?>