<?php
include 'const.php';
$v_sid = isset($_GET['sid'])?$_GET['sid']:'';
$v_image_id = isset($_GET['image_id'])?$_GET['image_id']:'0';
settype($v_image_id, 'int');
$arr_info = get_image_info($v_sid, $v_image_id, USER_UPLOAD_DIR);

$v_file = isset($arr_info['name'])?$arr_info['name']:'';
$v_success = 0;

$v_str = $v_sid."\r\n\r\n";
$v_str .= $v_file;
$fp = fopen('xem.txt', 'w');
fwrite($fp, $v_str, strlen($v_str));
fclose($fp);

if($v_file!='' && file_exists(USER_UPLOAD_DIR.DS_DS.$v_file)){
    $v_success = @unlink(USER_UPLOAD_DIR.DS_DS.$v_file)?1:0;
    if($v_success) $v_image_id = delete_image_info(session_id(),$v_image_id, USER_UPLOAD_DIR);
}

$arr_return = array(
    "dpi"=>0
    ,"extension"=>isset($arr_info['extension'])?$arr_info['extension']:'jpg'
    ,"fotolia_id"=>null
    ,"height"=>isset($arr_info['height'])?$arr_info['height']:0
    ,"width"=>isset($arr_info['width'])?$arr_info['width']:0
    ,"id"=>$v_image_id
    ,"is_public"=>0
    ,"is_vector"=>0
    ,"name"=>isset($arr_info['name'])?$arr_info['name']:""
    ,"success"=>$v_success?1:0
    ,"svg_id"=>null
    ,"svg_original_colors"=>null
);

header("Content-type: application/json");
echo json_encode($arr_return);

?>