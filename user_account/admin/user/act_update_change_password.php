<?php if(!isset($v_sval)) die();?>
<?php
$_SESSION['error_user'] = "";
$v_user_id = isset($_POST['txt_user_id'])?$_POST['txt_user_id']:0;
$v_user_id = (int) $v_user_id;
if($v_user_id < 0) $_SESSION['error_user'] .= ' User id  is negative!<br />';

/* Channg Password */
$v_new_password = isset($_POST['txt_new_password'])?$_POST['txt_new_password']:'';
$v_repeat_new_password = isset($_POST['txt_repeat_new_password'])?$_POST['txt_repeat_new_password']:'';

if(($v_new_password!=$v_new_password) && (trim($v_new_password)!="")&& (trim($v_repeat_new_password)!=""))
    $_SESSION['error_user'] .= ' New Password is not correct and not blank!<br />';

if($_SESSION['error_user']!="") redir('?a=ACC&acc=USER&user=CP&txt_user_id='.$v_user_id.'&txt_error=1');

$v_tmp_user_id = get_unserialize_user('user_id');
$v_tmp_user_type = get_unserialize_user('user_type');
if($v_tmp_user_id==$v_user_id || $v_tmp_user_type==0 )
{
   $v_new_password = md5($v_new_password);
   $v_change_password = $cls_tb_user->change_password($v_tmp_user_id,$v_new_password,array('user_id'=>$v_tmp_user_id));
   if($v_change_password==true)
   {
       redir("?a=LO");
   }
   else
   {
       if($v_location_id==0) redir(URL.$v_admin_key.'/'.$v_location_id.'/error');
       else redir(URL.$v_admin_key.'/'.$v_location_id.'/edit/er');
   }
}
?>