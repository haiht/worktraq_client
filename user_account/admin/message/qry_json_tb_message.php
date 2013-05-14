<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_message_value = isset($_POST['txt_search_message_value'])?$_POST['txt_search_message_value']:'';
$v_search_message_key = isset($_POST['txt_search_message_key'])?$_POST['txt_search_message_key']:'';
settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
$arr_where = array();
if($v_search_message_key!='') $arr_where[] = array('message_key'=>new MongoRegex('/'.$v_search_message_key.'/i'));
if($v_search_message_value!='') $arr_where[] = array('message_value'=>new MongoRegex('/'.$v_search_message_value.'/i'));
if(count($arr_where)>1)
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
if(isset($_SESSION['ss_tb_message_redirect']) && $_SESSION['ss_tb_message_redirect']==1){
	if(isset($_SESSION['ss_tb_message_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_message_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_message_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_message_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_message_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_message->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_message_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_message_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_message_page'] = $v_page;
$_SESSION['ss_tb_message_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_message = $cls_tb_message->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
foreach($arr_tb_message as $arr){
	$v_message_id = isset($arr['message_id'])?$arr['message_id']:0;
	$v_message_type = isset($arr['message_type'])?$arr['message_type']:0;
	$v_message_key = isset($arr['message_key'])?$arr['message_key']:'';
	$v_message_value = isset($arr['message_value'])?$arr['message_value']:'';
	$v_message_order = isset($arr['message_order'])?$arr['message_order']:'';
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'message_id' => $v_message_id,
		'message_type' => $v_message_type,
		'message_key' => $v_message_key,
		'message_value' => $v_message_value,
		'message_order' => $v_message_order
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_message'=>$arr_ret_data);
echo json_encode($arr_return);
?>