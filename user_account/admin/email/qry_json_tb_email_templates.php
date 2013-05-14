<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_email_key = isset($_POST['txt_search_email_key'])?$_POST['txt_search_email_key']:'';
$v_search_email_data = isset($_POST['txt_search_email_data'])?$_POST['txt_search_email_data']:'';
settype($v_company_id, 'int');
//if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
$arr_where = array();
if($v_search_email_key!='') $arr_where['email_key'] = new MongoRegex('/'.$v_search_email_key.'/i');
if($v_search_email_data!='') $arr_where['email_data'] = new MongoRegex('/'.$v_search_email_data.'/i');
if(count($arr_where)>0)
    $arr_where_clause['$or'] = $arr_where;
else if(count($arr_where)==1){
    foreach($arr_where as $key=>$value)
        $arr_where_clause[$key] = $value;
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
if(isset($_SESSION['ss_tb_email_templates_redirect']) && $_SESSION['ss_tb_email_templates_redirect']==1){
	if(isset($_SESSION['ss_tb_email_templates_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_email_templates_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_email_templates_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_email_templates_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_email_templates_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_email_templates->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_email_templates_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_email_templates_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_email_templates_page'] = $v_page;
$_SESSION['ss_tb_email_templates_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_email_templates = $cls_tb_email_templates->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
$arr_email_type = array();
foreach($arr_tb_email_templates as $arr){
	$v_email_id = isset($arr['email_id'])?$arr['email_id']:0;
	$v_email_key = isset($arr['email_key'])?$arr['email_key']:'';
	$v_email_file = isset($arr['email_file'])?$arr['email_file']:'';
	$v_email_data = isset($arr['email_data'])?$arr['email_data']:'';
	$v_email_type = isset($arr['email_type'])?$arr['email_type']:0;
	$v_description = isset($arr['description'])?$arr['description']:'';
    if(!isset($arr_email_type[$v_email_type])) $arr_email_type[$v_email_type] = $cls_settings->get_option_name_by_id('email_type', $v_email_type);
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'email_id' => $v_email_id,
		'email_key' => $v_email_key,
		'email_file' => $v_email_file,
		'email_data' => $v_email_data,
		'email_type' => $arr_email_type[$v_email_type],
		'description' => $v_description
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_email_templates'=>$arr_ret_data);
echo json_encode($arr_return);
?>