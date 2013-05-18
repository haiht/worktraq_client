<?php
include 'const.php';
$v_sid = isset($_GET['sid'])?$_GET['sid']:'';
$v_image_id = isset($_GET['image_id'])?$_GET['image_id']:'0';
settype($v_image_id, 'int');
$arr_info = get_image_info($v_sid, $v_image_id, USER_UPLOAD_DIR);
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
    ,"success"=>count($arr_info)>0?1:0
    ,"svg_id"=>null
    ,"svg_original_colors"=>null
);

header("Content-type: application/json");
echo json_encode($arr_return);

?>