<?php
if(!isset($v_sval)) die();
?>
<?php
$v_session_id = isset($_POST['txt_session_id'])?$_POST['txt_session_id']:'';
$v_user_name = isset($_POST['txt_user_name'])?$_POST['txt_user_name']:'';
$v_user_pass = isset($_POST['txt_user_pass'])?$_POST['txt_user_pass']:'';
$v_error_message = '';
$v_error = 0;

if($v_error==0){
	if($arr_user['user_ip']!=get_real_ip_address()){
		$v_error = 2;
		$v_error_message = 'Your IP address has changed. Please log in again.';
	}
}
if($v_error==0){
	if($v_user_name==''){
		$v_error = 3;
		$v_error_message = 'You must specify a username to login.';
	}
}
if($v_error==0){
	$v_row = $cls_tb_user->select_one(array('user_name' => $v_user_name));
	if($v_row==1){
		$v_tmp_user_name = $cls_tb_user->get_user_name();
		$v_tmp_user_status = $cls_tb_user->get_user_status();
		$v_tmp_user_type = $cls_tb_user->get_user_type();
		$v_tmp_user_pass = $cls_tb_user->get_user_password();
		$v_tmp_user_id = $cls_tb_user->get_user_id();
		$v_tmp_mongo_id = $cls_tb_user->get_mongo_id();
        $v_tmp_contact_id = $cls_tb_user->get_contact_id();
        $v_tmp_company_id = $cls_tb_user->get_company_id();
        $v_tmp_location_id = $cls_tb_user->get_location_id();
        $v_tmp_user_rule = $cls_tb_user->get_user_rule();
        $v_tmp_location_approve = $cls_tb_user->get_user_location_approve();
        $v_tmp_location_allocate = $cls_tb_user->get_user_location_allocate();
		if($v_tmp_user_pass!=md5($v_user_pass)){
			$v_error = 4;
			$v_error_message = 'Your username or Your password is incorrect.';
		}else if($v_tmp_user_status==1){//lock
			$v_error = 100;
			$v_error_message = 'You account have been locked.';
		}
	}else{
		$v_error = 5;
		$v_error_message = 'The login is invalid.';
	}
}
$_SESSION['error_login'] = $v_error_message;

if($v_error_message!='') redir(URL.'login/error');

if($v_error==0 && $_SESSION['error_login']==''){
	$arr_user['user_id'] = $v_tmp_user_id;
	$arr_user['user_name'] = $v_tmp_user_name;
	$arr_user['user_status'] = $v_tmp_user_status;
	$arr_user['user_type'] = $v_tmp_user_type;
	$arr_user['mongo_id'] = $v_tmp_mongo_id;
	$arr_user['contact_id'] = $v_tmp_contact_id;
	$arr_user['company_id'] = $v_tmp_company_id;
	$arr_user['user_rule'] = $v_tmp_user_rule;
	$arr_user['user_login'] = 1;
    $arr_user['location_default']= $v_tmp_location_id;
    $arr_user['confirm_allocate']= 0;

    $arr_location = array();
    $arr_location[0] = $v_tmp_location_id;
    if($v_tmp_location_approve!=''){
        $j=1;
        $arr_tmp = explode(',', $v_tmp_location_approve);
        for($i=0; $i<count($arr_tmp); $i++){
            $v_one = (int) $arr_tmp[$i];
            if($v_one>0 && $v_one!=$v_tmp_location_id){
                $arr_location[$j++] = $v_one;
            }
        }
    }
    $arr_user['location_approve']= $arr_location;

    $arr_location = array();
    //$arr_location[0] = $v_tmp_location_id;
    if($v_tmp_location_allocate!=''){
        $j=0;

        if(strpos($v_tmp_location_allocate.',',$v_tmp_location_id.',')!==false){
            $arr_location[$j] = $v_tmp_location_id;
            $j++;
        }else{
            $arr_user['confirm_allocate'] = 1;
        }

        $arr_tmp = explode(',', $v_tmp_location_allocate);
        for($i=0; $i<count($arr_tmp); $i++){
            $v_one = (int) $arr_tmp[$i];
            if($v_one>0 && $v_one!=$v_tmp_location_id){
                $arr_location[$j++] = $v_one;
            }
        }

    }
    else{
        $arr_location[0] = $v_tmp_location_id;
    }

    $arr_user['location']= $arr_location;

    $arr_user['user_ip'] = get_real_ip_address();

	$_SESSION['ss_user'] = serialize($arr_user);
	$cls_tb_user->update_field('user_lastlog', new MongoDate(time()));
    redir(URL);
}
?>