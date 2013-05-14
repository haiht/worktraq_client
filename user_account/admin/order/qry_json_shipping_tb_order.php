<?php
if(!isset($v_sval)) die();
?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_location_name = isset($_POST['txt_search_location_name'])?trim($_POST['txt_search_location_name']):'';
settype($v_company_id, 'int');
settype($v_order_id, 'int');

if($v_search_location_name!='') $arr_where_clause['location_name'] = new MongoRegex('/'.$v_search_location_name.'/i');
if($v_order_id>0) $arr_where_clause['order_id'] = $v_order_id;
//$arr_where_clause['shipped_quantity'] = null;
//$arr_where_clause['$or'] = array(array('shipped_quantity'=>NULL), array('$where'=>'this.quantity>this.shipped_quantity')) ;
//Sort
$arr_temp = isset($_REQUEST['sort'])?$_REQUEST['sort']:array();
$arr_sort = array('product_id'=>1, 'location_id'=>1, 'ship_complete'=>-1);
if(is_array($arr_temp) && count($arr_temp)>0){
    for($i=0; $i<count($arr_temp); $i++){
        $arr_sort[$arr_temp[$i]['field']] = $arr_temp[$i]['dir']=='asc'?1:-1;
    }
}
if(!is_array($arr_sort)) $arr_sort = array();
//Start pagination
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:1;
$v_page_size = isset($_REQUEST['pageSize'])?$_REQUEST['pageSize']:10;
if(isset($_SESSION['ss_shipping_tb_order_redirect']) && $_SESSION['ss_shipping_tb_order_redirect']==1){
    if(isset($_SESSION['ss_shipping_tb_order_where_clause'])){
        $arr_where_clause = unserialize($_SESSION['ss_shipping_tb_order_where_clause']);
        if(!is_array($arr_where_clause)) $arr_where_clause = array();
    }
    if(isset($_SESSION['ss_shipping_tb_order_sort'])){
        $arr_sort = unserialize($_SESSION['ss_shipping_tb_order_sort']);
        if(!is_array($arr_sort)) $arr_sort = array();
    }
    unset($_SESSION['ss_shipping_tb_order_redirect']);
}
if(count($arr_sort)==0) $arr_sort = array('location_id'=>1);
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_allocation->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_shipping_tb_order_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_shipping_tb_order_sort'] = serialize($arr_sort);
$_SESSION['ss_shipping_tb_order_page'] = $v_page;
$_SESSION['ss_shipping_tb_order_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_allocations = $cls_tb_allocation->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
$arr_ship_status = array();
foreach($arr_tb_allocations as $arr){
    $v_allocation_id = isset($arr['allocation_id'])?$arr['allocation_id']:0;
    $v_order_items_id = isset($arr['order_items_id'])?$arr['order_items_id']:0;
    $v_order_id = isset($arr['order_id'])?$arr['order_id']:0;
    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
    $v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
    $v_product_name = isset($arr['product_name'])?$arr['product_name']:'';
    $v_location_address = isset($arr['location_address'])?$arr['location_address']:'';
    $v_quantity = isset($arr['quantity'])?$arr['quantity']:0;
    $v_shipped_quantity = isset($arr['shipped_quantity'])?$arr['shipped_quantity']:0;
    $v_shipper = isset($arr['shipper'])?$arr['shipper']:'';
    $v_tracking_number = isset($arr['tracking_number'])?$arr['tracking_number']:'';
    $v_tracking_url = isset($arr['tracking_url'])?$arr['tracking_url']:'';
    $v_date_shipping = isset($arr['date_shipping'])?$arr['date_shipping']:NULL;
    $v_ship_status = isset($arr['ship_status'])?$arr['ship_status']:0;
    $v_location_from = isset($arr['location_from'])?$arr['location_from']:0;
    $v_create_by = isset($arr['create_by'])?$arr['create_by']:'';
    $v_create_time = isset($arr['create_time'])?$arr['create_time']:(new MongoDate(time()));
    if(is_null($v_date_shipping))
        $v_date_shipping = '';
    else
        $v_date_shipping = date('d-M-Y',$v_date_shipping->sec);
    if(!isset($arr_ship_status[$v_ship_status])) $arr_ship_status[$v_ship_status] = $cls_settings->get_option_name_by_id('ship_status', $v_ship_status);
    $arr_ret_data[] = array(
        'check_row'=>0,
        'row_order'=>++$v_row,
        'allocation_id' => $v_allocation_id,
        'order_items_id' => $v_order_items_id,
        'order_id' => $v_order_id,
        'location_id' => $v_location_id,
        'location_name' => '<strong>'.$v_location_name.'</strong><br />'.$v_location_address,
        'product_name' => $v_product_name,
        'quantity' => $v_quantity,
        'shipper' => $v_shipper,
        'tracking_number' => $v_tracking_number,
        'tracking_url' => is_valid_url($v_tracking_url)?'<a class="a-link" href="'.$v_tracking_url.'" target="_blank">'.$v_tracking_url.'</a>':'',
        'date_shipping' => $v_date_shipping,
        'ship_status' => $arr_ship_status[$v_ship_status],
        'location_from' => $v_location_from,
        'create_by' => $v_create_by,
        'create_time' => $v_create_time
    );
}


header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_allocations'=>$arr_ret_data);
echo json_encode($arr_return);
?>