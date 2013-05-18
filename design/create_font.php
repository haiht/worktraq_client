<?php
include 'font.config.php';
$v_height = 30;
$v_width = 160;
$v_point_size = 13;
for($i=0; $i<count($arr_fonts);$i++){
    $im = imagecreatetruecolor($v_width, $v_height);
    $v_fill_color = imagecolorallocate($im, 255,255,255);
    //imagecolortransparent($im, $v_fill_color);
    imagefill($im,0,0, $v_fill_color);
    $v_text_color = imagecolorallocate($im, 0, 0, 0);

    $v_font = "fonts/".$arr_fonts[$i]['key'].'/regular.ttf';
    $v_body = $arr_fonts[$i]['name'];
//echo '<br>'.$v_font.'  --- '.file_exists($v_font).' ---- '.$v_body;

    imagettftext($im, $v_point_size, 0, 5, 24, $v_text_color, $v_font, $v_body);

    imagepng($im,'images/fonts/'.$arr_fonts[$i]['key'].'.png');
    imagedestroy($im);
}
?>