<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_region_name = isset($_POST['txt_search_region_name'])?$_POST['txt_search_region_name']:'';
settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
if($v_search_region_name!='') $arr_where_clause['region_name'] = new MongoRegex('/'.$v_search_region_name.'/i');
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
if(isset($_SESSION['ss_tb_region_redirect']) && $_SESSION['ss_tb_region_redirect']==1){
	if(isset($_SESSION['ss_tb_region_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_region_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_region_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_region_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_region_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_region->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_region_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_region_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_region_page'] = $v_page;
$_SESSION['ss_tb_region_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_region = $cls_tb_region->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
$arr_company = array();
foreach($arr_tb_region as $arr){
	$v_region_id = isset($arr['region_id'])?$arr['region_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_region_name = isset($arr['region_name'])?$arr['region_name']:'';
	$v_region_type = isset($arr['region_type'])?$arr['region_type']:0;
	$v_region_contact = isset($arr['region_contact'])?$arr['region_contact']:0;
	$v_status = isset($arr['status'])?$arr['status']:'0';
    if(!isset($arr_company[$v_company_id])) $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'region_id' => $v_region_id,
		'company_name' => $arr_company[$v_company_id],
		'region_name' => $v_region_name,
		'region_type' => $v_region_type,
		'region_contact' => $cls_tb_contact->get_full_name_contact($v_region_contact),
		'status' => $v_status
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_region'=>$arr_ret_data);
echo json_encode($arr_return);
?>