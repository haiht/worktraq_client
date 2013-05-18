<?php
include 'const.php';
include 'font.config.php';

$v_json = isset($_POST['json'])?$_POST['json']:'';
$v_page = isset($_POST['page'])?$_POST['page']:'0';
$v_dpi = isset($_POST['dpi'])?$_POST['dpi']:'0';

settype($v_page, 'int');
settype($v_dpi, 'int');

$arr_json = json_decode($v_json, true);
$arr_canvas = isset($arr_json['canvases'])?$arr_json['canvases']:array();

$arr_design = isset($arr_canvas[$v_page])?$arr_canvas[$v_page]:array();


$v_width = isset($arr_design['width'])?$arr_design['width']:0;
$v_height = isset($arr_json['height'])?$arr_design['height']:0;
$v_bg_color = isset($arr_design['bg_color'])?$arr_design['bg_color']:'FFFFFF';
if(strlen($v_bg_color)!=6) $v_bg_color = 'FFFFFF';

$v_width = $v_width * $v_dpi;
$v_height = $v_height * $v_dpi;
if($v_width<=0) $v_width = 50;
if($v_height<=0) $v_height = 50;


$v_red = hexdec(substr($v_bg_color,0,2));
$v_green = hexdec(substr($v_bg_color,2,2));
$v_blue = hexdec(substr($v_bg_color,4,2));

$im = imagecreatetruecolor($v_width, $v_height);
$v_fill_color = imagecolorallocate($im, $v_red, $v_green, $v_blue);
imagefill($im,0,0, $v_fill_color);

$arr_texts = isset($arr_design['texts'])?$arr_design['texts']:array();

for($i=0; $i<count($arr_texts);$i++){

    $v_color = $arr_texts[$i]['color'];
    $v_red = hexdec(substr($v_color,0,2));
    $v_green = hexdec(substr($v_color,2,2));
    $v_blue = hexdec(substr($v_color,4,2));
    $v_top = (float) $arr_texts[$i]['top'];
    $v_left = (float) $arr_texts[$i]['left'];
    $v_width = (float) $arr_texts[$i]['width'];
    $v_height = (float) $arr_texts[$i]['height'];
    $v_body = $arr_texts[$i]['body'];
    $v_bold = $arr_texts[$i]['bold'];
    $v_italic = $arr_texts[$i]['italic'];
    $v_gravity = $arr_texts[$i]['gravity'];
    $v_rotation = $arr_texts[$i]['rotation'];
    $v_point_size = $arr_texts[$i]['pointsize'];
    $v_point = $v_point_size;
    $v_point_size = $v_point_size * $v_dpi/80;
    $v_font_name = $v_font_key = '';
    $v_font_name =  $arr_texts[$i]['font'];
    $v_font_key =  get_font_key($v_font_name);
    $v_body = html_entity_decode($v_body);
    $v_body = urldecode($v_body);
    if($v_bold && $v_italic)
        $v_font = DS_ROOT_DIR.DS_DS.'fonts'.DS_DS.$v_font_key.DS_DS.'bolditalic.ttf';
    else if($v_bold && !$v_italic)
        $v_font = DS_ROOT_DIR.DS_DS.'fonts'.DS_DS.$v_font_key.DS_DS.'bold.ttf';
    else if(!$v_bold && $v_italic)
        $v_font = DS_ROOT_DIR.DS_DS.'fonts'.DS_DS.$v_font_key.DS_DS.'italic.ttf';
    else
        $v_font = DS_ROOT_DIR.DS_DS.'fonts'.DS_DS.$v_font_key.DS_DS.'regular.ttf';

    $v_text_box_size = imagettfbbox($v_point_size, $v_rotation, $v_font, $v_body);
    $v_text_box_width = (int) abs($v_text_box_size[2] + $v_text_box_size[0]);
    $v_text_box_height = (int) abs($v_text_box_size[7] + $v_text_box_size[1]);

    $v_top *= $v_dpi;
    $v_left *= $v_dpi;
    $v_width *= $v_dpi;
    $v_height *= $v_dpi;

    if($v_rotation==0){
        if($v_gravity=='center')
            $v_pos_x = ($v_width - $v_text_box_width) / 2 + $v_left;
        else if($v_gravity=='east')
            $v_pos_x = $v_width - $v_text_box_width - 10 + $v_left;
        else
            $v_pos_x = 5 + $v_left;
        $v_pos_y = $v_top + $v_height*.8;
    }else if($v_rotation==90){
        if($v_gravity=='center')
            $v_pos_y = $v_height - $v_text_box_height / 2 + $v_top - 10;
        else if($v_gravity=='east')
            //$v_pos_x = $v_top + $v_height - 5;
            $v_pos_y = $v_top + $v_text_box_height + 5;
        else
            $v_pos_y = $v_top + $v_height - 5;
        $v_pos_x = $v_left + $v_width*.8;
    }else if($v_rotation==180){
        if($v_gravity=='center')
            $v_pos_x = ($v_width + $v_text_box_width) / 2 + $v_left;
        else if($v_gravity=='east')
            $v_pos_x = $v_left + $v_width - 5;
        else
            $v_pos_x = $v_text_box_width + 10 + $v_left;
        $v_pos_y = $v_top + $v_height*.2;
    }else{
        if($v_gravity=='center')
            $v_pos_y = ($v_height - $v_text_box_height) / 2 + $v_top;
        else if($v_gravity=='east')
            $v_pos_y = ($v_height - $v_text_box_height) - 10 + $v_top;
        else
            $v_pos_y = 5 + $v_top;
        $v_pos_x = 10 + $v_left;
    }

    $v_text_color = imagecolorallocate($im, $v_red, $v_green, $v_blue);
    imagettftext($im, $v_point_size, $v_rotation, $v_pos_x, $v_pos_y, -$v_text_color, $v_font, $v_body);

}


$v_file_name = 'tmp_'.session_id().'_'.date('YmdHis').'.png';
$v_dir = DS_ROOT_DIR.DS_DS.'temp';
imagepng($im, $v_dir.DS_DS.$v_file_name,9);
imagedestroy($im);


header("Content-type: application/json");
echo json_encode(array('file'=>DS_URL.'temp/'.$v_file_name));
?>