<?php
if(!isset($v_sval)) die();
?>
<?php
$v_user_name = isset($_POST['txt_user_name'])?$_POST['txt_user_name']:'';
$v_user_password = isset($_POST['txt_user_password'])?$_POST['txt_user_password']:'';
$v_repeat_password = isset($_POST['txt_repeat_password'])?$_POST['txt_repeat_password']:'';
$v_user_type = isset($_POST['txt_user_type'])?$_POST['txt_user_type']:0;
$v_user_status = isset($_POST['txt_user_status'])?$_POST['txt_user_status']:0;
$v_contact_id = isset($_POST['txt_contact_id'])?$_POST['txt_contact_id']:0;
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:0;
$v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:0;
$v_user_name = trim($v_user_name);
$arr_return = array('error'=>0, 'message'=>'OK', 'user_id'=>0);
if($v_user_create_right || $v_is_admin){
    if($v_user_name!=''){
        $arr_where = array('$where'=>"this.user_name.toLowerCase()==='".strtolower($v_user_name)."'");
        if($cls_tb_user->count($arr_where)>0){
            $arr_return['error'] = 2;
            $arr_return['message'] = 'Existing user_name';
        }else{
            if($v_user_password!=''){
                if($v_user_password==$v_repeat_password){
                    settype($v_user_type, 'int');
                    settype($v_contact_id, 'int');
                    settype($v_company_id, 'int');
                    settype($v_location_id, 'int');
                    if($v_user_type<0) $v_user_type = 0;
                    if($v_contact_id<0) $v_contact_id = 0;
                    if($v_company_id<0) $v_company_id = 0;
                    if($v_location_id<0) $v_location_id = 0;
                    if(!in_array($v_user_status, array(0,1,2))) $v_user_status = 0;
                    $v_user_id = $cls_tb_user->select_next('user_id');
                    $cls_tb_user->set_user_name($v_user_name);
                    $cls_tb_user->set_user_id($v_user_id);
                    $cls_tb_user->set_user_type($v_user_type);
                    $cls_tb_user->set_user_status($v_user_status);
                    $cls_tb_user->set_user_lastlog(date('Y-m-d H:i:s'));
                    $cls_tb_user->set_user_password(md5($v_user_password));
                    $cls_tb_user->set_contact_id($v_contact_id);
                    $cls_tb_user->set_company_id($v_company_id);
                    $cls_tb_user->set_location_id($v_location_id);
                    $v_mongo_id = $cls_tb_user->insert();
                    if(is_object($v_mongo_id)){
                        $arr_return['user_id']=$v_user_id;
                    }else{
                        $arr_return['error'] = 5;
                        $arr_return['message'] = 'Error insert: cannot create user!';
                    }
                }else{
                    $arr_return['error'] = 4;
                    $arr_return['message'] = 'Invalid value: repeat_password!';
                }
            }else{
                $arr_return['error'] = 3;
                $arr_return['message'] = 'Empty value: user_password!';
            }
        }
    }else{
        $arr_return['error'] = 1;
        $arr_return['message'] = 'Empty value: user_name!';
    }
}else{
    $arr_return['error'] = 6;
    $arr_return['message'] = 'You have no permission!';
}
echo json_encode($arr_return);
?>