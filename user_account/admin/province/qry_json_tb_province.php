<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_province_name = isset($_POST['txt_search_province_name'])?$_POST['txt_search_province_name']:'';
settype($v_company_id, 'int');
//if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
if($v_search_province_name!='') $arr_where_clause['province_name'] = new MongoRegex('/'.$v_search_province_name.'/i');
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
if(isset($_SESSION['ss_tb_province_redirect']) && $_SESSION['ss_tb_province_redirect']==1){
	if(isset($_SESSION['ss_tb_province_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_province_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_province_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_province_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_province_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_province->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_province_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_province_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_province_page'] = $v_page;
$_SESSION['ss_tb_province_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_province = $cls_tb_province->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
$arr_country = array();
foreach($arr_tb_province as $arr){
	$v_province_id = isset($arr['province_id'])?$arr['province_id']:0;
	$v_province_name = isset($arr['province_name'])?$arr['province_name']:'';
	$v_province_key = isset($arr['province_key'])?$arr['province_key']:'';
	$v_province_status = isset($arr['province_status'])?$arr['province_status']:0;
	$v_province_order = isset($arr['province_order'])?$arr['province_order']:0;
	$v_country_id = isset($arr['country_id'])?$arr['country_id']:15;
    if(!isset($arr_country[$v_country_id])) $arr_country[$v_country_id] = $cls_tb_country->select_scalar('country_name', array('country_id'=>$v_country_id));
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'province_id' => $v_province_id,
		'province_name' => $v_province_name,
		'province_key' => $v_province_key,
		'province_status' => $v_province_status,
		'province_order' => $v_province_order,
		'country_name' => $arr_country[$v_country_id]
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_province'=>$arr_ret_data);
echo json_encode($arr_return);
?>