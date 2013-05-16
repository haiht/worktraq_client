<?php if (!isset($v_sval)) die(); ?>
<?php
if(isset($cls_tb_user)==false){
    add_class('cls_tb_user');
    $cls_tb_user = new cls_tb_user($db);
}
if(isset($cls_tb_contact)==false){
    add_class('cls_tb_contact');
    $cls_tb_contact = new cls_tb_contact($db);
}
if(isset($cls_tb_location)==false){
    add_class('cls_tb_location');
    $cls_tb_location = new cls_tb_location($db);
}
$v_user_id = isset($arr_user['user_id'])?$arr_user['user_id']:0;
$v_contact_id = (int) get_unserialize_user('contact_id');
settype($v_contact_id,"int");
$cls_tb_contact->select_one(array("contact_id"=>$v_contact_id));
$v_company_id = (int) get_unserialize_user('company_id');
$v_location_id = (int) get_unserialize_user('location_default');
$v_username = get_unserialize_user('user_name');
$v_company_name = get_unserialize_user('company_name');
$v_location_name = $cls_tb_location->select_scalar('location_name',array("company_id"=>$v_company_id,"location_id"=>$v_location_id));
$v_new_password = '';
$v_message= '';
$v_sussces = '';
$tpl_info = new Template('dsp_setting.tpl', $v_dir_templates);
$tpl_info->set('ERROR',$v_message);
$tpl_info->set('SUCCESS',$v_sussces);
$tpl_info->set('URL',URL);
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
    $tpl_info->set('SUCCESS',$v_sussces);
}
$tpl_info->set('ALERT_INVAILD_PASSWORD',$cls_tb_message->select_value('invalid_input_password'));
$tpl_info->set('ALERT_CORRECT_PASSWORD',$cls_tb_message->select_value('correct_the_password'));
$tpl_info->set('ALERT_CONFIRM_USER',$cls_tb_message->select_value('confirm_change_password'));
$tpl_info->set('USERNAME',$v_username);
$tpl_info->set('FIRST_NAME',$cls_tb_contact->get_first_name());
$tpl_info->set('MIDDLE_NAME',$cls_tb_contact->get_middle_name());
$tpl_info->set('LAST_NAME',$cls_tb_contact->get_last_name());
$tpl_info->set('EMAIL',$cls_tb_contact->get_email());
$tpl_info->set('BIRTHDAY',fdate($cls_tb_contact->get_birth_date()));
$tpl_info->set('DIRECT_PHONE',$cls_tb_contact->get_direct_phone());
$tpl_info->set('MOBIE_PHONE',$cls_tb_contact->get_mobile_phone());
$tpl_info->set('FAX_NUMBER',$cls_tb_contact->get_fax_number());
$tpl_info->set('HOME_PHONE',$cls_tb_contact->get_home_phone());
$tpl_info->set('LOCATION_NAME',$v_location_name);
$tpl_info->set('USER_ID',$v_user_id);
$tpl_info->set('COMPANY_NAME',$v_company_name);
echo $tpl_info->output();
?>