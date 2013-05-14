<?php
if(!isset($v_sval)) die();
?>
<?php
$v_user_id = isset($_POST['txt_user_id'])?$_POST['txt_user_id']:'0';
$v_save_info = isset($_POST['txt_save_info'])?$_POST['txt_save_info']:'';
$arr_return = array('error'=>0, 'message'=>'Update successfully!');
settype($v_user_id, 'int');
if($v_edit_right || $v_is_admin){
    if($v_user_id>0){
        $arr_fields = array();
        $arr_values = array();
        $v_error_message = 0;
        if($v_save_info=='password'){
            $v_new_password = isset($_POST['txt_new_password'])?$_POST['txt_new_password']:'';
            $v_repeat_password = isset($_POST['txt_repeat_password'])?$_POST['txt_repeat_password']:'';
            if($v_new_password=='')
                $v_error_message = 'New Password is Empty!';
            else if($v_new_password!=$v_repeat_password)
                $v_error_message = 'Repeat Password is invalid!';

            $arr_fields = array('user_password');
            $arr_values = array(md5($v_new_password));
        }else if($v_save_info=='user_info'){
            $v_user_type = isset($_POST['txt_user_type'])?$_POST['txt_user_type']:'0';
            $v_user_status = isset($_POST['txt_user_status'])?$_POST['txt_user_status']:'0';
            $v_user_lastlog = isset($_POST['txt_user_lastlog'])?$_POST['txt_user_lastlog']:'';
            $v_user_role = isset($_POST['txt_user_role'])?$_POST['txt_user_role']:array();
            if(!is_array($v_user_role))
                $arr_role = explode(',', $v_user_role);
            else
                $arr_role = $v_user_role;
            for($i=0; $i<count($arr_role); $i++)
                $arr_role[$i] = (int) $arr_role[$i];

            settype($v_user_type, 'int');
            settype($v_user_status, 'int');
            if($v_user_lastlog != ''){
                $arr_fields = array('user_type', 'user_status', 'user_lastlog', 'user_role');
                $v_user_lastlog = strtotime($v_user_lastlog);
                $v_user_lastlog = new MongoDate($v_user_lastlog);
                $arr_values = array($v_user_type, $v_user_status, $v_user_lastlog, $arr_role);
            }
        }else if($v_save_info=='permission'){
            $v_user_rule = isset($_POST['txt_user_rule'])?$_POST['txt_user_rule']:'';
            if(get_magic_quotes_gpc()) $v_user_rule = stripcslashes($v_user_rule);
            $arr_user_rule = array();
            if($v_user_rule!=''){
                $arr_tmp_user_rule = json_decode($v_user_rule, true);
                if(is_array($arr_tmp_user_rule)){
                    for($i=0; $i<count($arr_tmp_user_rule);$i++){
                        $v_menu = $arr_tmp_user_rule[$i][0];
                        $v_key = $arr_tmp_user_rule[$i][1];
                        $v_description = $arr_tmp_user_rule[$i][2];
                        $arr_user_rule[$v_menu][$v_key] = $v_description;
                    }
                }
            }
            $arr_fields = array('user_rule');
            $arr_values = array($arr_user_rule);
        }else if($v_save_info=='user_location'){
            $v_user_location_view = isset($_POST['txt_user_location_view'])?$_POST['txt_user_location_view']:'';
            $v_user_location_approve = isset($_POST['txt_user_location_approve'])?$_POST['txt_user_location_approve']:'';
            $v_user_location_allocate = isset($_POST['txt_user_location_allocate'])?$_POST['txt_user_location_allocate']:'';
            $arr_fields = array('user_location_view', 'user_location_approve', 'user_location_allocate');
            $arr_values = array($v_user_location_view, $v_user_location_approve, $v_user_location_allocate);
        }
        if($v_error_message==''){
            if(count($arr_fields)==count($arr_values) && count($arr_fields)>0){
                $v_result = $cls_tb_user->update_fields($arr_fields, $arr_values, array('user_id'=>$v_user_id));
                if(! $v_result){
                    $arr_return['error'] = 5;
                    $arr_return['message'] = 'Cannot up date info!';
                }
            }else{
                $arr_return['error'] = 4;
                $arr_return['message'] = 'Lost User Info: '.$v_save_info;
            }
        }else{
            $arr_return['error'] = 3;
            $arr_return['message'] = $v_error_message;
        }
    }else{
        $arr_return['error'] = 2;
        $arr_return['message'] = 'Lost UserID';
    }
}else{
    $arr_return['error'] = 1;
    $arr_return['message'] = 'You have not permission!';
}
echo json_encode($arr_return);
?>