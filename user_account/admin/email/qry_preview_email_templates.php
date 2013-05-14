<?php if(!isset($v_sval)) die();?>
<?php
$v_mongo_id = "";
$v_email_id = "";
$v_email_key = "";
$v_email_file = "";
$v_email_data = "";
$v_email_type = "";
$v_description = "";
$v_dsp_email = '';
$v_email_id = isset($_REQUEST['id'])?$_REQUEST['id']:$v_email_id;
$v_row = $cls_tb_email_templates->select_one(array('email_id' =>(int)$v_email_id));
if($v_row == 1){
    $v_mongo_id = $cls_tb_email_templates->get_mongo_id();
    $v_email_id = $cls_tb_email_templates->get_email_id();
    $v_email_key = $cls_tb_email_templates->get_email_key();
    $v_email_file = $cls_tb_email_templates->get_email_file();
    $v_email_data = $cls_tb_email_templates->get_email_data();
    $v_email_type = $cls_tb_email_templates->get_email_type();
    $v_description = $cls_tb_email_templates->get_description();

    if($v_email_file!=''){
        if(file_exists('mail/'.$v_email_file)){
            $v_dsp_email = file_get_contents('mail/'.$v_email_file);
        }
    }
}
?>