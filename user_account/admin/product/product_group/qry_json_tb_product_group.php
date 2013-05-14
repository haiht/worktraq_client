<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_product_group_name = isset($_POST['txt_search_product_group_name'])?$_POST['txt_search_product_group_name']:'';
settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
if($v_search_product_group_name!='') $arr_where_clause['product_group_name'] = new MongoRegex('/'.$v_search_product_group_name.'/i');
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
if(isset($_SESSION['ss_tb_product_group_redirect']) && $_SESSION['ss_tb_product_group_redirect']==1){
	if(isset($_SESSION['ss_tb_product_group_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_product_group_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_product_group_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_product_group_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_product_group_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_product_group->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_product_group_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_product_group_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_product_group_page'] = $v_page;
$_SESSION['ss_tb_product_group_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_product_group = $cls_tb_product_group->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;

$arr_company = array();
foreach($arr_tb_product_group as $arr){
	$v_product_group_id = isset($arr['product_group_id'])?$arr['product_group_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_product_group_key = isset($arr['product_group_key'])?$arr['product_group_key']:'';
	$v_product_group_name = isset($arr['product_group_name'])?$arr['product_group_name']:'';
	$v_product_group_overflow = isset($arr['product_group_overflow'])?$arr['product_group_overflow']:0;
	$v_product_group_order = isset($arr['product_group_order'])?$arr['product_group_order']:0;
	$v_product_group_parent = isset($arr['product_group_parent'])?$arr['product_group_parent']:0;
    if(!isset($arr_company[$v_company_id])) $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'product_group_id' => $v_product_group_id,
		'company_name' => $arr_company[$v_company_id],
		'product_group_key' => $v_product_group_key,
		'product_group_name' => $v_product_group_name,
		'product_group_overflow' => $v_product_group_overflow,
		'product_group_order' => $v_product_group_order,
		'product_group_parent' => $v_product_group_parent>0?$cls_tb_product_group->select_scalar('product_group_name', array('product_group_id'=>$v_product_group_parent)):''
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_product_group'=>$arr_ret_data);
echo json_encode($arr_return);
?>