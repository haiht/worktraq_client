<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_user_id = 0;
$v_user_name = get_unserialize_user('user_name');
$v_user_password = '';
$v_user_type = 3;
$v_user_status = 0;
$v_user_lastlog = date('Y-m-d H:i:s', time());
$v_user_id = isset($_GET['id'])?$_GET['id']:0;
if(isset($_POST['btn_submit_tb_user'])){
    $v_new_password = isset($_POST['txt_new_password'])?$_POST['txt_new_password']:'';
    $v_repeat_new_password = isset($_POST['txt_repeat_new_password'])?$_POST['txt_repeat_new_password']:'';
    $v_user_id  = isset($_POST['txt_user_id'])?$_POST['txt_user_id']:0;

    if (strlen($v_new_password) < 6) {
        $v_error_message .= " Password must have at least 6 characters. ";
    }

    if (strcmp($v_new_password, $v_repeat_new_password) !=0) {
        $v_error_message .= ' Repeat New Password does not match with New Password. ';
    }

    if($v_error_message=='')
    {
        $v_act_update = $cls_tb_user->update_field('user_password',md5($v_new_password),array('user_id'=>(int)$v_user_id));
        if($v_act_update==true){
            $v_error_message = ' The password has been changed successful !<br />';
        }
    } else {
        $v_error_message .= " !<br />";
    }
}

if($v_user_id!=0){
    $v_row = $cls_tb_user->select_one(array('user_id' =>(int)$v_user_id));

    if($v_row == 1){
        $v_user_id = $cls_tb_user->get_user_id();
        $v_user_name = $cls_tb_user->get_user_name();
        $v_user_password = $cls_tb_user->get_user_password();
        $v_user_type = $cls_tb_user->get_user_type();
        $v_user_status = $cls_tb_user->get_user_status();
        $v_user_lastlog = date('Y-m-d H:i:s',$cls_tb_user->get_user_lastlog());
    }
}


?>