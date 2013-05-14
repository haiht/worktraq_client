<?php if (!isset($v_sval)) die(); ?>
<?php
add_class('cls_tb_user');
$cls_tb_user = new cls_tb_user($db);

$v_user_id = isset($arr_user['user_id'])?$arr_user['user_id']:0;
$v_contact_id = (int) get_unserialize_user('contact_id');
$v_company_id = (int) get_unserialize_user('company_id');
$v_location_id = (int) get_unserialize_user('location_default');
$v_username = get_unserialize_user('user_name');
$v_company_name = get_unserialize_user('company_name');
$v_location_name = get_unserialize_user('company_name');
$v_new_password = '';
$v_message= '';
$v_sussces = '';
$tpl_info = new Template('dsp_setting.tpl', $v_dir_templates);
$tpl_info->set('ERROR',$v_message);
$tpl_info->set('SUCCESS',$v_sussces);

if(isset($_POST['btn_change_password']))
{
    $v_new_password = isset($_POST['txt_new_password']) ? trim($_POST['txt_new_password']) :'';
    $v_repeat_new_password = isset($_POST['txt_repeat_new_password']) ? trim($_POST['txt_repeat_new_password']) :'';

    if($v_new_password=='' || $v_repeat_new_password=='' )
        $v_message = "The new password is not blank!.";

    if(strlen($v_new_password)<5 || strlen($v_repeat_new_password) < 5)
        $v_message = "The new password must be at least 6 characters";

    if($v_new_password!=$v_repeat_new_password)
        $v_message = "The new password is not correct, please check new password and repeat new password";

    $tpl_info->set('ERROR',$v_message);

    if($v_new_password!='')
    {
        if($v_username!=''){
            $cls_tb_user->update_field('user_password',md5($v_new_password),array('user_name'=>$v_username));
            $v_sussces = 'User ' .$v_username. ' change password susscesfully';
            $tpl_info->set('SUCCESS',$v_sussces);
        }
    }
}
$tpl_info->set('ALERT_INVAILD_PASSWORD',$cls_tb_message->select_value('invalid_input_password'));
$tpl_info->set('ALERT_CORRECT_PASSWORD',$cls_tb_message->select_value('correct_the_password'));
$tpl_info->set('ALERT_CONFIRM_USER',$cls_tb_message->select_value('confirm_change_password'));

$tpl_info->set('USERNAME',$v_username);
$tpl_info->set('COMPANY_NAME',$v_company_name);
echo $tpl_info->output();
?>