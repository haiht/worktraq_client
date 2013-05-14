<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_location_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_location_sort'])){
	$v_sort = $_SESSION['ss_tb_location_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_location = $cls_tb_location->select($arr_where_clause, $arr_sort);
$v_dsp_tb_location = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_location .= '<tr align="center" valign="middle">';
$v_dsp_tb_location .= '<th>Ord</th>';
$v_dsp_tb_location .= '<th>Location Id</th>';
$v_dsp_tb_location .= '<th>Company Id</th>';
$v_dsp_tb_location .= '<th>Location Type</th>';
$v_dsp_tb_location .= '<th>Location Number</th>';
$v_dsp_tb_location .= '<th>Main Contact</th>';
$v_dsp_tb_location .= '<th>Address Unit</th>';
$v_dsp_tb_location .= '<th>Address Line 1</th>';
$v_dsp_tb_location .= '<th>Address Line 2</th>';
$v_dsp_tb_location .= '<th>Address Line 3</th>';
$v_dsp_tb_location .= '<th>Address City</th>';
$v_dsp_tb_location .= '<th>Address Province</th>';
$v_dsp_tb_location .= '<th>Address Postal</th>';
$v_dsp_tb_location .= '<th>Address Country</th>';
$v_dsp_tb_location .= '<th>Open Date</th>';
$v_dsp_tb_location .= '<th>Close Date</th>';
$v_dsp_tb_location .= '<th>Status</th>';
$v_dsp_tb_location .= '</tr>';
$v_count = 1;
foreach($arr_tb_location as $arr){
	$v_dsp_tb_location .= '<tr align="left" valign="middle">';
	$v_dsp_tb_location .= '<td align="right">'.($v_count++).'</td>';
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_location_type = isset($arr['location_type'])?$arr['location_type']:0;
	$v_location_number = isset($arr['location_number'])?$arr['location_number']:0;
	$v_main_contact = isset($arr['main_contact'])?$arr['main_contact']:0;
	$v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
	$v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
	$v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
	$v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
	$v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
	$v_address_province = isset($arr['address_province'])?$arr['address_province']:0;
	$v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
	$v_address_country = isset($arr['address_country'])?$arr['address_country']:0;
	$v_open_date = isset($arr['open_date'])?$arr['open_date']:(new MongoDate(time()));
	$v_close_date = isset($arr['close_date'])?$arr['close_date']:(new MongoDate(time()));
	$v_status = isset($arr['status'])?$arr['status']:'0';
	$v_dsp_tb_location .= '<td>'.$v_location_id.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_company_id.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_location_type.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_location_number.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_main_contact.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_address_unit.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_address_line_1.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_address_line_2.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_address_line_3.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_address_city.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_address_province.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_address_postal.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_address_country.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_open_date.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_close_date.'</td>';
	$v_dsp_tb_location .= '<td>'.$v_status.'</td>';
	$v_dsp_tb_location .= '</tr>';
}
$v_dsp_tb_location .= '</table>';
?>