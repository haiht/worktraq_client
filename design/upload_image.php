<?php
include 'const.php';
$v_dir = DS_ROOT_DIR;
$v_upload_dir = USER_UPLOAD_DIR;

require 'classes/clsupload.php';
$up = new clsupload();
$up->set_allow_array_extension(array('jpg', 'png', 'gif'));
$up->set_field_name("Filedata");

$v_width = 0;
$v_height = 0;
$v_image_id = -1;
$v_ext = '';
$v_file_name = '';
$v_success = 0;
$v_error = 10;

    $up->set_destination_dir($v_upload_dir);
    $up->set_allow_overwrite(1);
    $up->upload_process();
    $v_ext = $up->get_file_extension();

    if($up->get_error_number()==0){
        $v_file_name = $up->get_filename();
        list($v_width, $v_height, $v_type) = getimagesize($v_upload_dir.DS_DS.$up->get_filename());
        $arr_info = array(
            'name'=>$up->get_filename()
            ,'height'=>$v_height
            ,'width'=>$v_width
            ,'extension'=>$v_ext
            ,'type'=>$v_type
            ,'delete'=>0
            ,'session'=>session_id()
            ,'size'=>filesize($v_upload_dir.DS_DS.$up->get_filename())
        );
        $v_image_id = save_image_info($arr_info, USER_UPLOAD_DIR);

    }
    $v_success = $up->get_error_number()==0?1:0;
    $v_error = $up->get_error_number();


$arr_result = array(
    "dpi"=>0
    ,"extension"=>$v_ext
    ,"fotolia_id"=>null
    ,"height"=>$v_height
    ,"width"=>$v_width
    ,"id"=>$v_image_id
    ,"sid"=>session_id()
    ,"is_public"=>0
    ,"is_vector"=>0
    ,"name"=>$v_file_name
    ,"success"=>$v_success
    ,"error"=>$v_error
    ,"svg_id"=>null
    ,"svg_original_colors"=>null
);

header("Content-type: application/json");
echo json_encode($arr_result);
?>