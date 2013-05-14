<?php if(!isset($v_sval)) die();?>
<?php
$_SESSION['error_user'] = "";
$v_user_id = isset($_POST['txt_user_id'])?$_POST['txt_user_id']:0;
$v_user_id = (int) $v_user_id;
if($v_user_id<0) $_SESSION['error_user'] .= ' User id  is negative!<br />';
$cls_tb_user->set_user_id($v_user_id);

$v_user_name = isset($_POST['txt_user_name'])?$_POST['txt_user_name']:'';
$v_user_name = trim($v_user_name);
if($v_user_name=='') $_SESSION['error_user'] .= 'User Name is empty!<br />';
$cls_tb_user->set_user_name($v_user_name);

$v_user_password = isset($_POST['txt_paswd'])? ($_POST['txt_paswd']):'';
$v_user_password = trim($v_user_password);
if($v_user_password=='') $_SESSION['error_user'] .= ' User Password is empty!<br />';
if($v_user_password!="") $cls_tb_user->set_user_password(md5($v_user_password));

$v_user_type = isset($_POST['txt_user_type'])?$_POST['txt_user_type']:'';
$v_user_type = (int) $v_user_type;
if($v_user_type<0) $_SESSION['error_user'] .= 'User Type is Negative!<br />';
$cls_tb_user->set_user_type($v_user_type);

$v_user_status = isset($_POST['txt_user_status'])?$_POST['txt_user_status']:'';
$v_user_status = (int) $v_user_status;
if($v_user_status<0) $_SESSION['error_user'] .= 'User Status is negative!<br />';
$cls_tb_user->set_user_status($v_user_status);

$v_user_lastlog = isset($_POST['txt_user_lastlog'])?$_POST['txt_user_lastlog']:'';
$cls_tb_user->set_user_lastlog($v_user_lastlog);

$v_location_id = isset($_POST['txt_contact_id'])?$_POST['txt_contact_id']:0;
if($v_location_id==0 || $v_location_id=='') $_SESSION['error_user'] .= 'Location is blank!......!<br />';
$cls_tb_user->set_contact_id($v_location_id);

$v_company_id = isset($_POST['txt_company_id'])? $_POST['txt_company_id']:0;
if($v_company_id==0 || $v_company_id=='') $_SESSION['error_user'] .= 'Company  is blank!......!<br />';
$cls_tb_user->set_company_id($v_company_id);

$v_location_id = isset($_POST['txt_location_id'])? $_POST['txt_location_id']:0;
if($v_location_id==0 || $v_location_id=='') $_SESSION['error_user'] .= 'Location is blank!......!<br />';
$cls_tb_user->set_location_id($v_location_id);
$v_user_role = isset($_POST['txt_user_role'])?$_POST['txt_user_role']:'';
$arr_user_role = array();
$arr_temp = explode(',', $v_user_role);
for($i=0; $i<count($arr_temp);$i++){
    $v_role = (int) $arr_temp[$i];
    if($v_role>0) $arr_user_role[] = $v_role;
}


if($_SESSION['error_user']==''){
    if($v_user_id==0){ // Insert into database
        $v_next_user_id =  $cls_tb_user->select_next('user_id');
        $cls_tb_user->set_user_id($v_next_user_id);
        $v_mongo_id = $cls_tb_user->insert();
        $v_user_id = $v_next_user_id;

        $v_result = is_object($v_mongo_id);
    }
    else{
        $v_result = $cls_tb_user->update(array('user_id' => (int)$v_user_id));
    }
    if($v_result) $cls_tb_user->update_field('user_role', $arr_user_role, array('user_id'=>(int) $v_user_id));
    redir(URL.$v_admin_key.'/report/'.$v_user_id .'/');
}
else
{
}

?>