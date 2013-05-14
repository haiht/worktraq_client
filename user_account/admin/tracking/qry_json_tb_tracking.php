<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_tracking_name = isset($_POST['txt_search_tracking_name'])?$_POST['txt_search_tracking_name']:'';
settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
if($v_search_tracking_name!='') $arr_where_clause['tracking_name'] = new MongoRegex('/'.$v_search_tracking_name.'/i');
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
if(isset($_SESSION['ss_tb_tracking_redirect']) && $_SESSION['ss_tb_tracking_redirect']==1){
	if(isset($_SESSION['ss_tb_tracking_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_tracking_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_tracking_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_tracking_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_tracking_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_tracking->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_tracking_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_tracking_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_tracking_page'] = $v_page;
$_SESSION['ss_tb_tracking_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_tracking = $cls_tb_tracking->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
foreach($arr_tb_tracking as $arr){
	$v_tracking_id = isset($arr['tracking_id'])?$arr['tracking_id']:0;
	$v_tracking_name = isset($arr['tracking_name'])?$arr['tracking_name']:'';
	$v_tracking_key = isset($arr['tracking_key'])?$arr['tracking_key']:'';
	$v_website = isset($arr['website'])?$arr['website']:'';
	$v_tracking_url = isset($arr['tracking_url'])?$arr['tracking_url']:'';
	$v_option_url = isset($arr['option_url'])?$arr['option_url']:'';
	$v_phone = isset($arr['phone'])?$arr['phone']:'';
	$v_email = isset($arr['email'])?$arr['email']:'';
	$v_contact_name = isset($arr['contact_name'])?$arr['contact_name']:'';
	$v_status = isset($arr['status'])?$arr['status']:'0';
	$v_description = isset($arr['description'])?$arr['description']:'';
	$v_country_id = isset($arr['country_id'])?$arr['country_id']:0;
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'tracking_id' => $v_tracking_id,
		'tracking_name' => $v_tracking_name,
		'tracking_key' => $v_tracking_key,
		'website' => is_valid_url($v_website)?'<a target="_blank" class="a-link" href="'.$v_website.'">'.$v_website.'</a>':'',
		'tracking_url' => $v_tracking_url,
		'option_url' => $v_option_url,
		'phone' => $v_phone,
		'email' => is_valid_email($v_email)?'<a class="a-link" href="mailto:'.$v_email.'">'.$v_email.'</a>':'',
		'contact_name' => $v_contact_name,
		'status' => $v_status,
		'description' => $v_description,
		'country_id' => $v_country_id
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_tracking'=>$arr_ret_data);
echo json_encode($arr_return);
?>