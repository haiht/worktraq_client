<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_material_name = isset($_POST['txt_search_material_name'])?$_POST['txt_search_material_name']:'';
settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
$v_search_material_name = htmlspecialchars_decode($v_search_material_name);
if($v_search_material_name!='') $arr_where_clause['material_name'] = new MongoRegex('/'.$v_search_material_name.'/i');

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
if(isset($_SESSION['ss_tb_material_redirect']) && $_SESSION['ss_tb_material_redirect']==1){
	if(isset($_SESSION['ss_tb_material_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_material_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_material_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_material_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_material_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_material->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_material_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_material_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_material_page'] = $v_page;
$_SESSION['ss_tb_material_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_material = $cls_tb_material->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
foreach($arr_tb_material as $arr){
	$v_material_id = isset($arr['material_id'])?$arr['material_id']:0;
	$v_material_name = isset($arr['material_name'])?$arr['material_name']:'';
	$v_material_option = isset($arr['material_option'])?$arr['material_option']:'array';
	$v_description = isset($arr['description'])?$arr['description']:'';
	$v_size_option = isset($arr['size_option'])?$arr['size_option']:'0';
	$v_two_sided_print = isset($arr['two_sided_print'])?$arr['two_sided_print']:'0';
	$v_material_type = isset($arr['material_type'])?$arr['material_type']:0;
	$v_status = isset($arr['status'])?$arr['status']:'0';
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'material_id' => $v_material_id,
		'material_name' => $v_material_name,
		'material_option' => $v_material_option,
		'description' => $v_description,
		'size_option' => $v_size_option,
		'two_sided_print' => $v_two_sided_print,
		'material_type' => $cls_settings->get_option_name_by_id('material_type',$v_material_type),
		'status' => $v_status
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_material'=>$arr_ret_data);
echo json_encode($arr_return);
?>