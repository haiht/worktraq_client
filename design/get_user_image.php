<?php
include 'const.php';
$v_sid = isset($_GET['sid'])?$_GET['sid']:'';

$arr_info = array();
if($v_sid!=''){
    $arr_info = list_user_image($v_sid, USER_UPLOAD_DIR);
}

$arr_return = array(
    'rows'=>$arr_info
    ,'success'=>1
);

header("Content-type: application/json");
echo json_encode($arr_return);
?>