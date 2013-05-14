<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_setting_name = isset($_POST['txt_search_setting_name'])?$_POST['txt_search_setting_name']:'';
$v_search_setting_description = isset($_POST['txt_search_setting_description'])?$_POST['txt_search_setting_description']:'';
settype($v_company_id, 'int');
//if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
$arr_where = array();
if($v_search_setting_name!='') $arr_where[] = array('setting_name'=>new MongoRegex('/'.$v_search_setting_name.'/i'));
if($v_search_setting_description!='') $arr_where[] = array('setting_description'=>new MongoRegex('/'.$v_search_setting_description.'/i'));
if(count($arr_where)>1)
    $arr_where_clause['$or'] = $arr_where;
else if(count($arr_where)==1){
    foreach($arr_where as $key=>$value){
        $arr_where_clause[$key] = $value;
    }
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
if(isset($_SESSION['ss_tb_settings_redirect']) && $_SESSION['ss_tb_settings_redirect']==1){
	if(isset($_SESSION['ss_tb_settings_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_settings_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_settings_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_settings_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_settings_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_settings->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_settings_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_settings_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_settings_page'] = $v_page;
$_SESSION['ss_tb_settings_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_settings = $cls_settings->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
foreach($arr_tb_settings as $arr){
	$v_setting_id = isset($arr['setting_id'])?$arr['setting_id']:0;
	$v_setting_name = isset($arr['setting_name'])?$arr['setting_name']:'';
	$v_status = isset($arr['status'])?$arr['status']:'0';
	$v_setting_description = isset($arr['setting_description'])?$arr['setting_description']:'';
	$v_setting_type = isset($arr['setting_type'])?$arr['setting_type']:0;
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'setting_id' => $v_setting_id,
		'setting_name' => $v_setting_name,
		'status' => $v_status,
		'setting_description' => $v_setting_description,
		'setting_type' => $arr_setting_type[$v_setting_type]
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_settings'=>$arr_ret_data);
echo json_encode($arr_return);
?>