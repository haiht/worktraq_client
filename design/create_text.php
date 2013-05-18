<?php
include 'font.config.php';
include 'const.php';
$v_body = isset($_GET['body'])?$_GET['body']:'';
$v_font = isset($_GET['font'])?$_GET['font']:'';
$v_fill = isset($_GET['fill'])?$_GET['fill']:'Arial';
$v_width = isset($_GET['width'])?$_GET['width']:'0';
$v_height = isset($_GET['height'])?$_GET['height']:'0';
$v_bold = isset($_GET['bold'])?$_GET['bold']:'false';
$v_italic = isset($_GET['italic'])?$_GET['italic']:'false';
$v_rotation = isset($_GET['rotation'])?$_GET['rotation']:'0';
$v_gravity = isset($_GET['gravity'])?$_GET['gravity']:'center';
$v_density = isset($_GET['density'])?$_GET['density']:'0';
$v_point_size = isset($_GET['pointsize'])?$_GET['pointsize']:'300';

settype($v_width, 'float');
settype($v_height, 'float');
settype($v_point_size, 'float');
settype($v_density, 'int');
settype($v_rotation, 'int');

$v_height_extra = 0;


if($v_point_size>0){
    $v_point_size = ($v_point_size * $v_density)/80;
}
if($v_height==0){
    $v_height = ceil($v_point_size * 1.3333333333333);
    $v_width =  ceil($v_width * $v_density);
}

if($v_width==0){
    $v_width = ceil($v_point_size * 1.3333333333333);
    $v_height = ceil($v_height * $v_density);
}

if($v_point_size==0){
    /*
    if(($v_rotation==90 || $v_rotation==270) && ($v_width < $v_height)){
        $v_tmp = $v_height;
        $v_height = $v_width;
        $v_width = $v_tmp;
    }
    */
    $v_height = ceil( $v_height * $v_density);
    $v_width = ceil( $v_width * $v_density);
    if($v_height>0){
        $v_point_size = ceil($v_height/1.3333333333333);
    }else
        $v_point_size = ceil($v_width/1.3333333333333);
    $v_point_size /= 3;
}






$v_point_size = ceil($v_point_size);
$v_bold = $v_bold=='true';
$v_italic = $v_italic=='true';

$v_font = get_font_key($v_font);
if($v_font=='') $v_font = 'myriad';
if(!file_exists('fonts/'.$v_font)) $v_font = 'myriad';
if($v_bold && $v_italic)
    $v_font = 'fonts/'.$v_font.'/bolditalic.ttf';
else if($v_bold && !$v_italic)
    $v_font = 'fonts/'.$v_font.'/bold.ttf';
else if(!$v_bold && $v_italic)
    $v_font = 'fonts/'.$v_font.'/italic.ttf';
else
    $v_font = 'fonts/'.$v_font.'/regular.ttf';


$arr_body = explode("\n", $v_body);

$v_idx = 0;
$v_len = 0;
for($i=0; $i<count($arr_body); $i++){
    if(strlen($arr_body[$i])>$v_len){
        $v_idx = $i;
        $v_len = strlen($arr_body[$i]);
    }
}


$v_text_box_size = imagettfbbox($v_point_size, 0, $v_font, $arr_body[$v_idx]);
$v_text_box_width = abs($v_text_box_size[2] + $v_text_box_size[0]);
$v_text_box_height = abs($v_text_box_size[7] + $v_text_box_size[1]);


$v_text_height = $v_point_size*1.4;
$v_posy = $v_text_height;
$v_text_height *= 1.2;

$v_height_extra = $v_text_height * count($arr_body);
//$v_height_extra *= 1.5;

if($v_width < $v_text_box_width)
    $v_width = $v_text_box_width + 20;
else if($v_width> 2*$v_text_box_width) $v_width = 2*$v_text_box_width;

$v_height = $v_height_extra;


//$v_str = "\r\n\r\nH: ".$v_height.' --- W: '.$v_width.' ---- R: '.$v_rotation.' --- T: '.$v_body . ' ---- C: '.count($arr_body);
//$fp = fopen('xem.txt', 'a+');
//fwrite($fp, $v_str, strlen($v_str));
//fclose($fp);

//echo '<br>F: '.$v_fill;

if(strlen($v_fill)!=6) $v_fill = '000000';
if($v_fill=='000000') $v_fill = '010101';

$v_red = hexdec(substr($v_fill,0,2));
$v_green = hexdec(substr($v_fill,2,2));
$v_blue = hexdec(substr($v_fill,4,2));

//echo '<br>W: '.$v_width;
//echo '<br>H: '.$v_height;
//echo '<br>S: '.$v_point_size;
//echo '<br>F: '.$v_font;
//echo '<br>R: '.$v_red;
//echo '<br>G: '.$v_green;
//echo '<br>B: '.$v_blue;
//echo '<br>BD: '.$v_body;
//die();

$im = imagecreatetruecolor($v_width, $v_height);
$v_text_color = imagecolorallocate($im, $v_red, $v_green, $v_blue);
$v_fill_color = imagecolorallocate($im, 0,0,0);
$v_grey = imagecolorallocate($im, 128, 128, 128);
imagecolortransparent($im, $v_fill_color);
//imagefill($im, 0, 0, $v_fill_color);


if($v_gravity=='center')
    $v_posx = ($v_width - $v_text_box_width) / 2;
else if($v_gravity=='east')
    $v_posx = $v_width - $v_text_box_width - 10;
else
    $v_posx = 5;
//$posy = ($image_height - $text_box_height * sizeof($text)) / 2 + $text_height;
//$v_posy = $v_text_height;
imageantialias($im, true);
imagealphablending($im, true);
//imagettftext($im, $v_point_size, 0, $v_posx+1, $v_posy+1, $v_text_color, $v_font, $v_body);
imagettftext($im, $v_point_size, 0, $v_posx, $v_posy, -$v_text_color, $v_font, $v_body);

if($v_rotation!=0){
    $im = imagerotate($im,$v_rotation,0);
    //$v_new_width = $v_height;
    //$v_new_height = $v_width;
    /*
    $rotated_width = imagesx($rt);
    $rotated_height = imagesy($rt);

    $dx = $rotated_width - $v_width;
    $dy = $rotated_height - $v_height;

    $crop_x = $dx/2 + $v_new_width;
    $crop_y = $dy/2 + $v_new_height;

    $im = imagecreatetruecolor($v_new_width, $v_new_height);


    imagealphablending($im, false);
    imagesavealpha($im,true);
    $transparent = imagecolorallocatealpha($im, 255, 255, 255, 127);
    imagefilledrectangle($im, 0, 0, $v_new_width, $v_new_height, $transparent);
    //imagecopyresampled($im, $im_source, 0, 0, 0, 0, $width, $height, $o_w, $o_h);


    //imagecopyresampled($im, $rt, 0, 0, 0,0, $v_new_width, $v_new_height, $rotated_width, $rotated_height);
    //$im = $rt;
    */
}

header("Content-Type: image/png");
imagepng($im);
imagedestroy($im);
?>