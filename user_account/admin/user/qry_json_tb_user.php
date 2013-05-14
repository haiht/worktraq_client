<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$arr_tmp_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_full_name = isset($_POST['txt_search_full_name'])?$_POST['txt_search_full_name']:'';
$v_search_user_name = isset($_POST['txt_search_user_name'])?$_POST['txt_search_user_name']:'';
$v_search_user_name = trim($v_search_user_name);
settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
if($v_search_user_name !='') $arr_tmp_where_clause[] = array('user_name' => new MongoRegex('/'.$v_search_user_name.'/i'));

$arr_contact = array();
$v_search_full_name = trim($v_search_full_name);
if($v_search_full_name!=''){
    $arr_where = array();
    $arr_where['$where'] = "(this.first_name+(this.middle_name!=''?' '+this.middle_name:'')+' '+this.last_name).toLowerCase().indexOf('".strtolower($v_search_full_name)."')>=0";
    $arr_all_contact = $cls_tb_contact->select($arr_where);
    foreach($arr_all_contact as $arr){
        $arr_contact[] = (int) $arr['contact_id'];
    }

    $arr_tmp_where_clause[] = array('contact_id'=>array('$in'=>$arr_contact));
}
if(count($arr_tmp_where_clause)>1){
    $arr_where_clause['$or'] = $arr_tmp_where_clause;
}else if(count($arr_tmp_where_clause)==1){
    $arr_tmp = $arr_tmp_where_clause[0];
    foreach($arr_tmp as $key=>$val)
        $arr_where_clause[$key] = $val;
}

//Sort
$arr_temp = isset($_REQUEST['sort'])?$_REQUEST['sort']:array();
$arr_sort = array();
if(is_array($arr_temp) && count($arr_temp)>0){
	for($i=0; $i<count($arr_temp); $i++){
		$arr_sort[$arr_temp[$i]['field']] = $arr_temp[$i]['dir']=='asc'?1:-1;
	}
}
if(!is_array($arr_sort)) $arr_sort = array();
//Start pagination
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:1;
$v_page_size = isset($_REQUEST['pageSize'])?$_REQUEST['pageSize']:10;
if(isset($_SESSION['ss_tb_user_redirect']) && $_SESSION['ss_tb_user_redirect']==1){
	if(isset($_SESSION['ss_tb_user_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_user_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_user_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_user_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_user_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_user->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_user_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_user_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_user_page'] = $v_page;
$_SESSION['ss_tb_user_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_user = $cls_tb_user->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
$arr_company = array();
$arr_location = array();
foreach($arr_tb_user as $arr){
	$v_user_id = isset($arr['user_id'])?$arr['user_id']:0;
	$v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
	$v_user_password = isset($arr['user_password'])?$arr['user_password']:'';
	$v_user_location_approve = isset($arr['user_location_approve'])?$arr['user_location_approve']:'';
	$v_user_location_allocate = isset($arr['user_location_allocate'])?$arr['user_location_allocate']:'';
	$v_user_location_view = isset($arr['user_location_view'])?$arr['user_location_view']:'';
	$v_user_type = isset($arr['user_type'])?$arr['user_type']:3;
	$v_user_status = isset($arr['user_status'])?$arr['user_status']:'0';
	$v_user_lastlog = isset($arr['user_lastlog'])?$arr['user_lastlog']:(new MongoDate(time()));

    $v_last_log = date('d-M-Y', $v_user_lastlog->sec);
    if(!isset($arr_company[$v_company_id])) $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
    if(!isset($arr_location[$v_location_id])) $arr_location[$v_location_id] = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id));
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'user_id' => $v_user_id,
		'user_name' => $v_user_name,
		'company_id' => $v_company_id,
		'company_name' => $arr_company[$v_company_id],
		'location_id' => $v_location_id,
		'location_name' => $arr_location[$v_location_id],
		'contact_id' => $v_contact_id,
		'contact_name' => $cls_tb_contact->get_full_name_contact($v_contact_id),
		'user_type' =>$cls_settings->get_option_name_by_id('user_type', $v_user_type),
		'user_status' => $v_user_status,
		'user_last_log' => $v_last_log
	);
}

header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_user'=>$arr_ret_data);
echo json_encode($arr_return);
?>