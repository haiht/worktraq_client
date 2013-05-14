<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_location_name = isset($_POST['txt_search_location_name'])?trim($_POST['txt_search_location_name']):'';

settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
if($v_search_location_name!='') $arr_where_clause['location_name'] = new MongoRegex('/'.$v_search_location_name.'/i');
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
if(isset($_SESSION['ss_tb_shipping_redirect']) && $_SESSION['ss_tb_shipping_redirect']==1){
	if(isset($_SESSION['ss_tb_shipping_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_shipping_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_shipping_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_shipping_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_shipping_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_shipping->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_shipping_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_shipping_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_shipping_page'] = $v_page;
$_SESSION['ss_tb_shipping_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_shipping = $cls_tb_shipping->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
$arr_ship_status = array();
foreach($arr_tb_shipping as $arr){
	$v_shipping_id = isset($arr['shipping_id'])?$arr['shipping_id']:0;
	$v_shipper = isset($arr['shipper'])?$arr['shipper']:'';
	$v_tracking_number = isset($arr['tracking_number'])?$arr['tracking_number']:'';
	$v_tracking_url = isset($arr['tracking_url'])?$arr['tracking_url']:'';
	$v_date_shipping = isset($arr['date_shipping'])?$arr['date_shipping']:(new MongoDate(time()));
	$v_ship_status = isset($arr['ship_status'])?$arr['ship_status']:0;
	$v_ship_create_by = isset($arr['ship_create_by'])?$arr['ship_create_by']:'';
	$v_ship_create_date = isset($arr['ship_create_date'])?$arr['ship_create_date']:(new MongoDate(time()));
	$v_location_from = isset($arr['location_from'])?$arr['location_from']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
	$v_location_address = isset($arr['location_address'])?$arr['location_address']:'';
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
    if(!isset($arr_ship_status[$v_ship_status])) $arr_ship_status[$v_ship_status] = $cls_settings->get_option_name_by_id('ship_status', $v_ship_status);
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'shipping_id' => $v_shipping_id,
		'shipper' => $v_shipper,
		'tracking_number' => $v_tracking_number,
		'tracking_url' => is_valid_url($v_tracking_url)?'<a class="a-link" href="'.$v_tracking_url.'" target="_blank">'.$v_tracking_url.'</a>':$v_tracking_url,
		'date_shipping' => date('d-M-Y',$v_date_shipping->sec),
		'ship_status' => $arr_ship_status[$v_ship_status],
		'ship_create_by' => $v_ship_create_by,
		'ship_create_date' => $v_ship_create_date,
		'location_from' => $v_location_from,
		'location_id' => $v_location_id,
		'location_name' => $v_location_name,
		'location_address' => $v_location_address,
		'company_id' => $v_company_id,
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_shipping'=>$arr_ret_data);
echo json_encode($arr_return);
?>