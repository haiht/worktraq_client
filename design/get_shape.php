<?php
//get_shape.php?shape_type=rect&dpi=19&width=8&height=8&border_width=2&border_color=797979&fill_color=fdf6bb&border_stroke=solid
//get_shape.php?shape_type=circle&dpi=19&width=8&height=8&border_width=2&border_color=797979&fill_color=fdf6bb&border_stroke=solid
//get_shape.php?shape_type=hline&dpi=19&width=8&height=2&border_width=2&border_color=797979&fill_color=fdf6bb&border_stroke=solid
//get_shape.php?shape_type=vline&dpi=19&width=2&height=8&border_width=2&border_color=797979&fill_color=fdf6bb&border_stroke=solid

include 'const.php';
$v_shape_type = isset($_GET['shape_type'])?$_GET['shape_type']:'rect';
$v_dpi = isset($_GET['dpi'])?$_GET['dpi']:19;
settype($v_dpi, 'int');
$v_width = isset($_GET['width'])?$_GET['width']:8;
settype($v_width, 'int');
$v_height = isset($_GET['height'])?$_GET['height']:8;
settype($v_height, 'int');
$v_border_width = isset($_GET['border_width'])?$_GET['border_width']:2;
settype($v_border_width, 'int');
$v_border_color = isset($_GET['border_color'])?$_GET['border_color']:'000000';
$v_fill_color = isset($_GET['fill_color'])?$_GET['fill_color']:'FFFFFF';
$v_border_stroke = isset($_GET['border_stroke'])?$_GET['border_stroke']:'solid';
$v_border_width = isset($_GET['border_width'])?$_GET['border_width']:'1';
settype($v_border_width, 'int');
if($v_border_width<0) $v_border_width = 0;

if(strlen($v_border_color)!=6) $v_border_color = '000000';
if(strlen($v_fill_color)!=6) $v_fill_color = 'FFFFFF';
if($v_border_color=='000000') $v_border_color = '010101';

$v_width *= 19;
$v_height *= 19;

$v_red_border = hexdec(substr($v_border_color,0,2));
$v_green_border = hexdec(substr($v_border_color,2,2));
$v_blue_border = hexdec(substr($v_border_color,4,2));

$v_red_fill = hexdec(substr($v_fill_color,0,2));
$v_green_fill = hexdec(substr($v_fill_color,2,2));
$v_blue_fill = hexdec(substr($v_fill_color,4,2));


// create a pointer to a new true colour image
$im = imagecreatetruecolor($v_width, $v_height);
$v_bgcolor = imagecolorallocate($im, $v_red_fill, $v_green_fill, $v_blue_fill);
$v_border = imagecolorallocate($im, $v_red_border, $v_green_border, $v_blue_border);
$v_fill_color = imagecolorallocate($im, 0,0,0);
imagecolortransparent($im, $v_fill_color);

$arr_style = array();
$arr_circle = array();
if($v_border_stroke=='solid'){
    $arr_style = array($v_border);
    $arr_circle = array();
}else if($v_border_stroke=='round_dot'){
    $arr_style = array($v_border, IMG_COLOR_TRANSPARENT);
    $arr_circle = array('round'=>3, 'transparent'=>3);
}else if($v_border_stroke=='square_dot'){
    $arr_style = array($v_border, $v_border, IMG_COLOR_TRANSPARENT, IMG_COLOR_TRANSPARENT);
    $arr_circle = array('square'=>3, 'transparent'=>3);
}else if($v_border_stroke=='dash'){
    $arr_style = array($v_border, $v_border,$v_border, $v_border,$v_border, $v_border, IMG_COLOR_TRANSPARENT, IMG_COLOR_TRANSPARENT);
    $arr_circle = array('dash'=>6, 'transparent'=>3);
}else if($v_border_stroke=='dash_dot'){
    $arr_style = array($v_border, $v_border,$v_border, $v_border,$v_border, $v_border, IMG_COLOR_TRANSPARENT, IMG_COLOR_TRANSPARENT, $v_border, $v_border, IMG_COLOR_TRANSPARENT, IMG_COLOR_TRANSPARENT);
    $arr_circle = array('dash'=>6,'transparent'=>3, 'dot'=>3, 'transparent1'=>3);
}else if($v_border_stroke=='long_dash'){
    $arr_style = array($v_border, $v_border,$v_border, $v_border,$v_border, $v_border,$v_border, $v_border,$v_border, $v_border,$v_border, $v_border, IMG_COLOR_TRANSPARENT, IMG_COLOR_TRANSPARENT);
    $arr_circle = array('long'=>12, 'transparent'=>3);
}else if($v_border_stroke=='long_dash_dot'){
    $arr_style = array($v_border, $v_border,$v_border, $v_border,$v_border, $v_border,$v_border, $v_border,$v_border, $v_border,$v_border, $v_border, IMG_COLOR_TRANSPARENT, IMG_COLOR_TRANSPARENT, $v_border, $v_border, IMG_COLOR_TRANSPARENT, IMG_COLOR_TRANSPARENT);
    $arr_circle = array('long'=>12, 'transparent'=>3, 'dot'=>3, 'transparent1'=>3);
}

if($v_shape_type=='hline' || $v_shape_type=='vline'){

    //$arr_style = array($v_border, $v_border,$v_border,$v_border,$v_border,$v_border, $v_border,$v_border,$v_border,$v_border,IMG_COLOR_TRANSPARENT, IMG_COLOR_TRANSPARENT,IMG_COLOR_TRANSPARENT, IMG_COLOR_TRANSPARENT);

    @imageantialias($im, false);

// make a new line and add it to the image
    //imageline($im, $x1, $y1, $x2, $y2, $v_border);
    $v_start = ceil($v_border_width/2);



    for($i=1; $i<=$v_border_width;$i++){
        $x1 = $v_shape_type=='hline'?0:ceil($v_width/2)-$v_start+$i;
        $y1 = $v_shape_type=='hline'?(ceil($v_height/2)-$v_start+$i):0;
        $x2 = $v_shape_type=='hline'?$v_width:$x1;
        $y2 = $v_shape_type=='hline'?$y1:$v_height;
        imagesetstyle($im, $arr_style);
        imageline($im, $x1, $y1, $x2, $y2, IMG_COLOR_STYLED);
    }

}else if($v_shape_type=='circle'){
// switch on image antialising if it is available
    @imageantialias($im, false);

// sets background to white
    //imagefilltoborder($im, 0, 0, $v_border, $v_border);

// draw an empty circle
    //imagesetthickness($im, $v_border_width);
    if($v_border_width==1){
        imagesetstyle($im, $arr_style);
        imageellipse($im, ceil($v_width/2), ceil($v_height/2), $v_width, $v_height, IMG_COLOR_STYLED);
        imagefilledellipse($im, ceil($v_width/2), ceil($v_height/2), $v_width-2, $v_height-2, $v_bgcolor);
    }else if($v_border_width>1){
        $v_border_width *= 2;
        if(count($arr_circle)==0){
            imagefilledarc($im, ceil($v_width/2), ceil($v_height/2), $v_width, $v_height, 0, 360, $v_border,IMG_COLOR_STYLEDBRUSHED);
            imagefilledarc($im, ceil($v_width/2), ceil($v_height/2), $v_width - $v_border_width, $v_height - $v_border_width, 0, 360, $v_fill_color,IMG_COLOR_STYLEDBRUSHED);
        }else{
            for($i=0; $i<360; ){
                foreach($arr_circle as $key=>$value){
                    $v_start = $i;
                    $v_end = $i+$value;
                    if($key=='round' || $key=='square' || $key=='dash' || $key=='dot' || $key=='long'){
                        imagefilledarc($im, ceil($v_width/2), ceil($v_height/2), $v_width, $v_height, $v_start, $v_end, $v_border,IMG_COLOR_STYLEDBRUSHED);
                        imagefilledarc($im, ceil($v_width/2), ceil($v_height/2), $v_width - $v_border_width, $v_height - $v_border_width, $v_start, $v_end, $v_fill_color,IMG_COLOR_STYLEDBRUSHED);
                    }
                    $i+=$value;
                }
            }
        }


        //imagefilledarc($img, 70, 175, 300, 300, 0, -45, $red,IMG_COLOR_STYLEDBRUSHED);
        imagefilledarc($im, ceil($v_width/2), ceil($v_height/2), $v_width - $v_border_width, $v_height-$v_border_width, 0, 360, $v_bgcolor,IMG_COLOR_STYLEDBRUSHED);

    }

}else{


    //imagerectangle($im, 0, 0, $v_width-1, $v_height-1, $v_border);
    imagefilledrectangle($im, 1, 1, $v_width-3, $v_height-3, $v_bgcolor);

    @imageantialias($im, false);

    //imagesetstyle($im, $arr_style);
    //imagesetthickness($im, 5);
    //imagerectangle($im, 0, 0, $v_width-5, $v_height-5, IMG_COLOR_STYLED);

    //Draw w 1
    for($i=1; $i<=$v_border_width;$i++){
        $x1 = 0;
        $y1 = $i-1;
        $x2 = $v_width;
        $y2 = $i-1;
        imagesetstyle($im, $arr_style);
        imageline($im, $x1, $y1, $x2, $y2, IMG_COLOR_STYLED);
    }

    //Draw w 2

    for($i=1; $i<=$v_border_width;$i++){
        $x1 = 0;
        $y1 = $v_height - $i;
        $x2 = $v_width;
        $y2 = $v_height - $i;
        imagesetstyle($im, $arr_style);
        imageline($im, $x1, $y1, $x2, $y2, IMG_COLOR_STYLED);
    }

    //Draw h 1
    for($i=1; $i<=$v_border_width;$i++){
        $x1 = $i-1;
        $y1 = 0;
        $x2 = $i-1;
        $y2 = $v_height;
        imagesetstyle($im, $arr_style);
        imageline($im, $x1, $y1, $x2, $y2, IMG_COLOR_STYLED);
    }

    //Draw w 2
    for($i=1; $i<=$v_border_width;$i++){
        $x1 = $v_width - $i;
        $y1 = 0;
        $x2 = $v_width - $i;
        $y2 = $v_height;
        imagesetstyle($im, $arr_style);
        imageline($im, $x1, $y1, $x2, $y2, IMG_COLOR_STYLED);
    }


}


header("Content-Type: image/png");
imagepng($im);
imagedestroy($im);
?>
