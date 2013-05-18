<?php
include 'const.php';
$v_image_id = isset($_GET['image_id'])?$_GET['image_id']:'0';
$v_rotation = isset($_GET['rotation'])?$_GET['rotation']:'0';
settype($v_image_id, 'int');
settype($v_rotation, 'int');

$arr_info = get_image_info(session_id(), $v_image_id, USER_UPLOAD_DIR);

$v_exist = false;

$v_type = 3;
if(isset($arr_info['name'])){
    $v_name = $arr_info['name'];
    $v_type = $arr_info['type'];
    $v_file = USER_UPLOAD_DIR.DS_DS.$v_name;
    if(!file_exists($v_file)) $v_file = DS_ROOT_DIR.DS_DS.'images'.DS_DS.'design'.DS_DS.'getMockup.png';
}else $v_file = DS_ROOT_DIR.DS_DS.'images'.DS_DS.'design'.DS_DS.'getMockup.png';
//die('TYPE: '.$v_type);

list($width, $height) = getimagesize($v_file);
switch($v_type){
    case 1;//Gif
        $im = @imagecreatefromgif($v_file);
        break;
    case 2;//Jpg
        $im = @imagecreatefromjpeg($v_file);
        break;
    case 3;//Png
        $im_source = @imagecreatefrompng($v_file);
        $o_w = imagesx($im_source);
        $o_h = imagesy($im_source);

        $im = imagecreatetruecolor($width, $height);
        imagealphablending($im, false);
        imagesavealpha($im,true);
        $transparent = imagecolorallocatealpha($im, 255, 255, 255, 127);
        imagefilledrectangle($im, 0, 0, $width, $height, $transparent);
        imagecopyresampled($im, $im_source, 0, 0, 0, 0, $width, $height, $o_w, $o_h);
        imagedestroy($im_source);
        break;
    default ;
        $im = @imagecreatefromjpeg($v_file);
        break;
}
if($v_rotation!=0) $im = imagerotate($im, $v_rotation,0);
switch($v_type){
    case 1;//Gif
        header("Content-Type: image/gif");
        imagegif($im);
        break;
    case 2;//Jpg
        header("Content-Type: image/jpeg");
        imagejpeg($im);
        break;
    case 3;//Png
        header("Content-Type: image/png");
        imagepng($im,null,9);
        break;
    default ;
        header("Content-Type: image/jpeg");
        imagejpeg($im);
        break;
}

imagedestroy($im);

?>