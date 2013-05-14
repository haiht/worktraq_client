<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_shipping_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_shipping_sort'])){
	$v_sort = $_SESSION['ss_tb_shipping_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_shipping = $cls_tb_shipping->select($arr_where_clause, $arr_sort);
$v_dsp_tb_shipping = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_shipping .= '<tr align="center" valign="middle">';
$v_dsp_tb_shipping .= '<th>Ord</th>';
$v_dsp_tb_shipping .= '<th>Shipping Id</th>';
$v_dsp_tb_shipping .= '<th>Shipper</th>';
$v_dsp_tb_shipping .= '<th>Tracking Number</th>';
$v_dsp_tb_shipping .= '<th>Tracking Url</th>';
$v_dsp_tb_shipping .= '<th>Date Shipping</th>';
$v_dsp_tb_shipping .= '<th>Ship Status</th>';
$v_dsp_tb_shipping .= '<th>Ship Create By</th>';
$v_dsp_tb_shipping .= '<th>Ship Create Date</th>';
$v_dsp_tb_shipping .= '<th>Location From</th>';
$v_dsp_tb_shipping .= '<th>Location Id</th>';
$v_dsp_tb_shipping .= '<th>Location Name</th>';
$v_dsp_tb_shipping .= '<th>Location Address</th>';
$v_dsp_tb_shipping .= '<th>Company Id</th>';
$v_dsp_tb_shipping .= '<th>Shipping Detail</th>';
$v_dsp_tb_shipping .= '</tr>';
$v_count = 1;
foreach($arr_tb_shipping as $arr){
	$v_dsp_tb_shipping .= '<tr align="left" valign="middle">';
	$v_dsp_tb_shipping .= '<td align="right">'.($v_count++).'</td>';
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
	$v_shipping_detail = isset($arr['shipping_detail'])?$arr['shipping_detail']:'';
	$v_dsp_tb_shipping .= '<td>'.$v_shipping_id.'</td>';
	$v_dsp_tb_shipping .= '<td>'.$v_shipper.'</td>';
	$v_dsp_tb_shipping .= '<td>'.$v_tracking_number.'</td>';
	$v_dsp_tb_shipping .= '<td>'.$v_tracking_url.'</td>';
	$v_dsp_tb_shipping .= '<td>'.$v_date_shipping.'</td>';
	$v_dsp_tb_shipping .= '<td>'.$v_ship_status.'</td>';
	$v_dsp_tb_shipping .= '<td>'.$v_ship_create_by.'</td>';
	$v_dsp_tb_shipping .= '<td>'.$v_ship_create_date.'</td>';
	$v_dsp_tb_shipping .= '<td>'.$v_location_from.'</td>';
	$v_dsp_tb_shipping .= '<td>'.$v_location_id.'</td>';
	$v_dsp_tb_shipping .= '<td>'.$v_location_name.'</td>';
	$v_dsp_tb_shipping .= '<td>'.$v_location_address.'</td>';
	$v_dsp_tb_shipping .= '<td>'.$v_company_id.'</td>';
	$v_dsp_tb_shipping .= '<td>'.$v_shipping_detail.'</td>';
	$v_dsp_tb_shipping .= '</tr>';
}
$v_dsp_tb_shipping .= '</table>';
?>