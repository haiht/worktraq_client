<?php
/**
*	function create temporary or resume current function
*	@return array
*/
function create_user(){
	global $_SESSION;
	$v_result = isset($_SESSION['ss_user']);
	if($v_result){
		$arr_user = unserialize($_SESSION['ss_user']);
	}
	if(!isset($arr_user) || !is_array($arr_user)){
		$arr_user = array(
			'user_id' =>0
			,'user_name'=>''
			,'user_right'=>''
			,'user_sex'=>0
			,'user_email'=>''
			,'user_login'=>0
			,'user_type'=>0 //0: Admin 1: Head Office 2: Branch 3: Orther
			,'user_status'=>0
			,'mongo_id'=>''
            ,'contact_id'=>0
            ,'company_id'=>0
            ,'contact_name'=>''
            ,'company_name'=>''
            ,'location'=>array()
            ,'location_default'=>0
            ,'user_rule'=>array()
			,'user_ip'=>get_real_ip_address()
		);
	}
	$_SESSION['ss_user'] = serialize($arr_user);

	return $arr_user;
}
function get_unserialize_user($p_filter)
{
    $arr = unserialize($_SESSION['ss_user']);
    if(!isset($arr[$p_filter])) return "......";
    return $arr[$p_filter];
}
function is_admin_by_user($p_user_name){
    $arr_admin = array('admin');
    return in_array($p_user_name, $arr_admin);
}
?>