<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_role_title = isset($_POST['txt_search_role_title'])?$_POST['txt_search_role_title']:'';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';

settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
if($v_role_title!='') $arr_where_clause['role_title'] = new MongoRegex('/'.$v_role_title.'/i');

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

if(isset($_SESSION['ss_tb_role_redirect']) && $_SESSION['ss_tb_role_redirect']==1){
    if(isset($_SESSION['ss_tb_role_where_clause'])){
        $arr_where_clause = unserialize($_SESSION['ss_tb_role_where_clause']);
        if(!is_array($arr_where_clause)) $arr_where_clause = array();
    }
    if(isset($_SESSION['ss_tb_role_sort'])){
        $arr_sort = unserialize($_SESSION['ss_tb_role_sort']);
        if(!is_array($arr_sort)) $arr_sort = array();
    }
    unset($_SESSION['ss_tb_role_redirect']);
}

settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_role->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;

$_SESSION['ss_tb_role_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_role_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_role_page'] = $v_page;
$_SESSION['ss_tb_role_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_role = $cls_tb_role->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
$arr_company = array();
$arr_location = array();
foreach($arr_tb_role as $arr){
	$v_role_id = isset($arr['role_id'])?$arr['role_id']:0;
	$v_role_title = isset($arr['role_title'])?$arr['role_title']:'';
	$v_role_type = isset($arr['role_type'])?$arr['role_type']:0;
	$v_role_key = isset($arr['role_key'])?$arr['role_key']:'';
	$v_status = isset($arr['status'])?$arr['status']:0;
	$v_user_type = isset($arr['user_type'])?$arr['user_type']:0;
	$v_default_role = isset($arr['default_role'])?$arr['default_role']:0;
	$v_color = isset($arr['color'])?$arr['color']:'';
	$v_bold = isset($arr['bold'])?$arr['bold']:0;
	$v_italic = isset($arr['italic'])?$arr['italic']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
    if(!isset($arr_company[$v_company_id])) $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
    if(!isset($arr_location[$v_location_id])) $arr_location[$v_location_id] = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id));
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'role_id' => $v_role_id,
		'role_title' => $v_role_title,
		'role_type' => $v_role_type,
		'role_key' => $v_role_key,
		'status' => $v_status,
		'user_type' => $cls_settings->get_option_name_by_id('user_type',$v_user_type),
		'default_role' => $v_default_role,
		'color' => $v_color,
		'bold' => $v_bold,
		'italic' => $v_italic,
		'location_name' => $arr_location[$v_location_id],
		'company_name' => $arr_company[$v_company_id]
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_role'=>$arr_ret_data);
echo json_encode($arr_return);
?>