<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_tag_name = isset($_POST['txt_search_tag_name'])?trim($_POST['txt_search_tag_name']):'';
settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
if($v_search_tag_name!='') $arr_where_clause['tag_name'] = new MongoRegex('/'.$v_search_tag_name.'/i');
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
if(isset($_SESSION['ss_tb_tag_redirect']) && $_SESSION['ss_tb_tag_redirect']==1){
	if(isset($_SESSION['ss_tb_tag_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_tag_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_tag_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_tag_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_tag_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_tag->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_tag_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_tag_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_tag_page'] = $v_page;
$_SESSION['ss_tb_tag_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_tag = $cls_tb_tag->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;

$arr_company = array();
$arr_location = array();
foreach($arr_tb_tag as $arr){
	$v_tag_id = isset($arr['tag_id'])?$arr['tag_id']:0;
	$v_tag_name = isset($arr['tag_name'])?$arr['tag_name']:'';
	$v_tag_status = isset($arr['tag_status'])?$arr['tag_status']:0;
	$v_tag_order = isset($arr['tag_order'])?$arr['tag_order']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
	$v_date_created = isset($arr['date_created'])?$arr['date_created']:(new MongoDate(time()));
    $v_date_created = date('d-M-Y', $v_date_created->sec);
    if(!isset($arr_company[$v_company_id])) $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
    if(!isset($arr_location[$v_location_id])) $arr_location[$v_location_id] = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id));

	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'tag_id' => $v_tag_id,
		'tag_name' => $v_tag_name,
		'tag_status' => $v_tag_status,
		'tag_order' => $v_tag_order,
		'location_name' => $arr_location[$v_location_id],
		'company_name' => $arr_company[$v_company_id],
		'user_name' => $v_user_name,
		'date_created' => $v_date_created
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_tag'=>$arr_ret_data);
echo json_encode($arr_return);
?>