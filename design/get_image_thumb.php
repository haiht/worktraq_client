<?php
include 'const.php';

$v_image_id = isset($_GET['image_id'])?$_GET['image_id']:'0';
$v_sid = isset($_GET['sid'])?$_GET['sid']:'';
$v_size = isset($_GET['size'])?$_GET['size']:'100';

settype($v_image_id, 'int');
settype($v_size, 'int');

//$v_dir = ROOT_DIR;
//if(strrpos($v_dir, DS)!==strlen($v_dir)-1) $v_dir .= DS;
$v_upload_dir = USER_UPLOAD_DIR;

$arr_info = get_image_info(session_id(), $v_image_id, $v_upload_dir);
if(count($arr_info)>0){
    $v_name = isset($arr_info['name'])?$arr_info['name']:'';
    if($v_name!=''){
        $v_file = $v_upload_dir.DS.$v_name;
        if(file_exists($v_file)){
            list($width, $height, $type, $attr) = @getimagesize($v_file);
            $v_type = isset($arr_info['type'])?$arr_info['type']:'0';
            settype($v_type, 'int');

            switch($v_type){
                case 1;//Gif
                    $im = @imagecreatefromgif($v_file);
                    break;
                case 2;//Jpg
                    $im = @imagecreatefromjpeg($v_file);
                    break;
                case 3;//Png
                    $im = @imagecreatefrompng($v_file);
                    break;
                default ;
                    $im = @imagecreatefromjpeg($v_file);
                    break;
            }
            $v_ratio = $v_size / $width;
            $v_new_height = $height * $v_ratio;
            $im_return = @imagecreatetruecolor($v_size,$v_new_height);
            $v_background = @imagecolorallocate($im_return, 255, 255, 255);
            @imagefill($im_return,0,0,$v_background);
            imagecopyresized($im_return, $im,0,0,0,0, $v_size, $v_new_height, $width, $height);
            header("Content-Type: image/jpeg");
            imagejpeg($im_return);
            imagedestroy($im_return);
            imagedestroy($im);
        }die('3');
    }else die('2');
}else die('1');
?>