<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
//Start pagination
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:1;
$v_page_size = isset($_REQUEST['pageSize'])?$_REQUEST['pageSize']:10;
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_module->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$arr_temp = isset($_REQUEST['sort'])?$_REQUEST['sort']:array();
$arr_sort = array();
if(is_array($arr_temp) && count($arr_temp)>0){
	for($i=0; $i<count($arr_temp); $i++){
		$arr_sort[$arr_temp[$i]['field']] = $arr_temp[$i]['dir']=='asc'?1:-1;
	}
}
$_SESSION['ss_tb_module_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_module_sort'] = serialize($arr_sort);
//End pagination
$arr_tb_module = $cls_tb_module->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
foreach($arr_tb_module as $arr){
	$v_module_id = isset($arr['module_id'])?$arr['module_id']:0;
	$v_module_pid = isset($arr['module_pid'])?$arr['module_pid']:0;
	$v_module_text = isset($arr['module_text'])?$arr['module_text']:'';
	$v_module_key = isset($arr['module_key'])?$arr['module_key']:'';
	$v_module_type = isset($arr['module_type'])?$arr['module_type']:0;
	$v_module_root = isset($arr['module_root'])?$arr['module_root']:'admin';
	$v_module_dir = isset($arr['module_dir'])?$arr['module_dir']:'';
	$v_module_icon = isset($arr['module_icon'])?$arr['module_icon']:'';
	$v_module_menu = isset($arr['module_menu'])?$arr['module_menu']:'';
	$v_module_role = isset($arr['module_role'])?$arr['module_role']:0;
	$v_module_order = isset($arr['module_order'])?$arr['module_order']:0;
	$v_module_index = isset($arr['module_index'])?$arr['module_index']:'index.php';
	$v_module_locked = isset($arr['module_locked'])?$arr['module_locked']:0;
	$v_module_time = isset($arr['module_time'])?$arr['module_time']:(new MongoDate(time()));
	$v_module_category = isset($arr['module_category'])?$arr['module_category']:0;
	$v_module_description = isset($arr['module_description'])?$arr['module_description']:'';
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'module_id' => $v_module_id,
		'module_pid' => $cls_tb_module->select_scalar('module_text', array('module_id'=>$v_module_pid)),
		'module_text' => $v_module_text,
		'module_key' => $v_module_key,
		'module_type' => $v_module_type,
		'module_root' => $v_module_root,
		'module_dir' => $v_module_dir,
		'module_icon' => $v_module_icon,
		'module_menu' => $v_module_menu,
		'module_role' => $v_module_role==1?'Yes':'No',
		'module_order' => $v_module_order,
		'module_index' => $v_module_index,
		'module_locked' => $v_module_locked==1?'Yes':'No',
		'module_time' => $v_module_time,
		'module_category' => $v_module_category,
		'module_description' => $v_module_description
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_module'=>$arr_ret_data);
echo json_encode($arr_return);
?>