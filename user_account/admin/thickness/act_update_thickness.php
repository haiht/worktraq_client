<?php
if (!isset($v_sval)) die();
/**
 * User: longtt
 * Date: 11/24/12
 * Time: 3:47 PM
 */
?>
<?php

$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
if(!is_null($v_mongo_id)) $v_mongo_id = new MongoID($v_mongo_id);
$cls_tb_thickness->set_mongo_id($v_mongo_id);


$_SESSION['error_thickness'] = "";
$v_thickness_id = isset($_POST['txt_thickness_id'])?$_POST['txt_thickness_id']:0;
$v_thickness_id = (int) $v_thickness_id;


$v_thickness_name = isset($_POST['txt_thickness_name'])?$_POST['txt_thickness_name']:'';
$v_thickness_name = trim($v_thickness_name);
if($v_thickness_name=='') $_SESSION['error_thickness'] .= 'Thickness Name is empty!<br />';
$cls_tb_thickness->set_thickness_name($v_thickness_name);

$v_thickness_size = isset($_POST['txt_thickness_size'])?$_POST['txt_thickness_size']:'';
$v_thickness_size = trim($v_thickness_size);
if($v_thickness_size=='') $_SESSION['error_thickness'] .= 'Thickness Size is empty!<br />';
$cls_tb_thickness->set_thickness_size($v_thickness_size);

$v_thickness_type = isset($_POST['txt_thickness_type'])?$_POST['txt_thickness_type']:'';
$v_thickness_type = trim($v_thickness_type);
if($v_thickness_type=='') $_SESSION['error_thickness'] .= 'Thickness Type is empty!<br />';
$cls_tb_thickness->set_thickness_type($v_thickness_type);

if($v_error_message==''){
    if($v_thickness_id==0)
    {
        $v_thickness_id = $cls_tb_thickness->select_next('thickness_id');
        $cls_tb_thickness->set_thickness_id($v_thickness_id);
        $cls_tb_thickness->insert();
    }

    else
        $cls_tb_thickness->update(array('thickness_id' => $v_thickness_id));
}
redir($_SERVER['HTTP_REFERER']);
?>