<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_po_number = isset($_POST['txt_search_po_number'])?$_POST['txt_search_po_number']:'';
$v_search_order_ref = isset($_POST['txt_search_order_ref'])?$_POST['txt_search_order_ref']:'';
settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
$arr_where = array();
if($v_search_po_number!='') $arr_where[] = array('po_number'=>new MongoRegex('/'.$v_search_po_number.'/i'));
if($v_search_order_ref!='') $arr_where[] = array('order_ref'=>new MongoRegex('/'.$v_search_order_ref.'/i'));
if(count($arr_where)>1){
    $arr_where_clause['$or'] = $arr_where;
}else if(count($arr_where)==1){
    $arr_where = $arr_where[0];
    foreach($arr_where as $key=>$val)
        $arr_where_clause[$key] = $val;
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
if(isset($_SESSION['ss_tb_order_redirect']) && $_SESSION['ss_tb_order_redirect']==1){
	if(isset($_SESSION['ss_tb_order_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_order_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_order_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_order_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_order_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_order->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_order_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_order_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_order_page'] = $v_page;
$_SESSION['ss_tb_order_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_order = $cls_tb_order->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
$arr_company = array();
$arr_delivery_method = array();
$arr_status = array();

$v_order_status_shipping = $cls_settings->get_option_id_by_key('order_status','partly_shipped');
$v_order_status_in_production = $cls_settings->get_option_id_by_key('order_status','in_production');

foreach($arr_tb_order as $arr){
	$v_order_id = isset($arr['order_id'])?$arr['order_id']:0;
	$v_raw_id = isset($arr['raw_id'])?$arr['raw_id']:'';
	$v_anvy_id = isset($arr['anvy_id'])?$arr['anvy_id']:'';
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_po_number = isset($arr['po_number'])?$arr['po_number']:'';
	$v_order_type = isset($arr['order_type'])?$arr['order_type']:0;
	$v_shipping_contact = isset($arr['shipping_contact'])?$arr['shipping_contact']:'';
	$v_total_order_amount = isset($arr['total_order_amount'])?$arr['total_order_amount']:0;
	$v_total_discount = isset($arr['total_discount'])?$arr['total_discount']:0;
	$v_billing_contact = isset($arr['billing_contact'])?$arr['billing_contact']:'';
	$v_net_order_amount = isset($arr['net_order_amount'])?$arr['net_order_amount']:0;
	$v_gross_order_amount = isset($arr['gross_order_amount'])?$arr['gross_order_amount']:0;
	$v_job_description = isset($arr['job_description'])?$arr['job_description']:'';
	$v_description = isset($arr['description'])?$arr['description']:'';
	$v_notes = isset($arr['notes'])?$arr['notes']:'';
	$v_order_ref = isset($arr['order_ref'])?$arr['order_ref']:'';
	$v_sale_rep = isset($arr['sale_rep'])?$arr['sale_rep']:'';
	$v_date_created = isset($arr['date_created'])?$arr['date_created']:(new MongoDate(time()));
	$v_date_required = isset($arr['date_required'])?$arr['date_required']:(new MongoDate(time()));
	$v_date_approved = isset($arr['date_approved'])?$arr['date_approved']:(new MongoDate(time()));
	$v_date_modified = isset($arr['date_modified'])?$arr['date_modified']:(new MongoDate(time()));
	$v_term = isset($arr['term'])?$arr['term']:0;
	$v_delivery_method = isset($arr['delivery_method'])?$arr['delivery_method']:0;
	$v_source = isset($arr['source'])?$arr['source']:0;
	$v_status = isset($arr['status'])?$arr['status']:0;
	$v_require_approved = isset($arr['require_approved'])?$arr['require_approved']:'0';
	$v_user_approved = isset($arr['user_approved'])?$arr['user_approved']:'';
	$v_user_modified = isset($arr['user_modified'])?$arr['user_modified']:'';
	$v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
	$v_dispatch = isset($arr['dispatch'])?$arr['dispatch']:0;
	$v_tax_1 = isset($arr['tax_1'])?$arr['tax_1']:0;
	$v_tax_2 = isset($arr['tax_2'])?$arr['tax_2']:0;
	$v_tax_3 = isset($arr['tax_3'])?$arr['tax_3']:0;

    if(!isset($arr_company[$v_company_id])) $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
    if(!isset($arr_delivery_method[$v_delivery_method])) $arr_delivery_method[$v_delivery_method] = $cls_settings->get_option_name_by_id('delivery_method',$v_delivery_method);
    if(!isset($arr_status[$v_status])) $arr_status[$v_status] = $cls_settings->get_option_name_by_id('order_status', $v_status);
    $v_date_created = date('d-M-Y', $v_date_created->sec);
    $v_date_required = is_null($v_date_required)?NO_PRICE:date('d-M-Y', $v_date_required->sec);
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'order_id' => $v_order_id,
		'location_id' => $v_location_id,
		'company_name' => $arr_company[$v_company_id],
		'po_number' => $v_po_number,
		'order_type' => $v_order_type,
		'total_order_amount' => $v_total_order_amount,
		'order_ref' => $v_order_ref,
		'date_created' => $v_date_created,
		'date_required' => $v_date_required,
		'delivery_method' => $arr_delivery_method[$v_delivery_method],
		'status' => $v_status,
		'status_name' => $v_status<0?'Delete':(in_array($v_status,array($v_order_status_shipping, $v_order_status_in_production))?'<a class="a-link" href="'.URL.$v_admin_key.'/'.$v_order_id.'/shipping">'.$arr_status[$v_status].'</a>':$arr_status[$v_status])
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_order'=>$arr_ret_data);
echo json_encode($arr_return);
?>