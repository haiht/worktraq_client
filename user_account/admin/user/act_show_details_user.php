<?php if(!isset($v_sval)) die();?>
<?php
$v_contact_id = isset($_REQUEST['txt_contact_id']) ? $_REQUEST['txt_contact_id'] : '';
$v_message = "";

if((int)$v_contact_id==0)
{
    $v_message = '<b><font color="#b22222">Not found user for location ( Location is blank )</font></b>';
}
else
{
    $v_total_records  = $cls_tb_user->get_all_user_by_contact($v_contact_id);

    if($v_total_records>0)
    {
        $v_user_id = $cls_tb_user->get_user_id();
        $v_user_name = $cls_tb_user->get_user_name();
        $v_user_password = $cls_tb_user->get_user_password();
        $v_user_type = $cls_tb_user->get_user_type();
        $v_user_status = $cls_tb_user->get_user_status();
        $v_user_lastlog = date('Y-m-d H:i:s',$cls_tb_user->get_user_lastlog());

        echo $v_message = '<b> User Name: '.$v_user_name .'</b>';
    }
}


?>