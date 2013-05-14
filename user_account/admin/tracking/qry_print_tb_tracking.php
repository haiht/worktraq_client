<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_tracking_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_tracking_sort'])){
	$v_sort = $_SESSION['ss_tb_tracking_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_tracking = $cls_tb_tracking->select($arr_where_clause, $arr_sort);
$v_dsp_tb_tracking = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_tracking .= '<tr align="center" valign="middle">';
$v_dsp_tb_tracking .= '<th>Ord</th>';
$v_dsp_tb_tracking .= '<th>Tracking Id</th>';
$v_dsp_tb_tracking .= '<th>Tracking Name</th>';
$v_dsp_tb_tracking .= '<th>Tracking Key</th>';
$v_dsp_tb_tracking .= '<th>Website</th>';
$v_dsp_tb_tracking .= '<th>Tracking Url</th>';
$v_dsp_tb_tracking .= '<th>Option Url</th>';
$v_dsp_tb_tracking .= '<th>Phone</th>';
$v_dsp_tb_tracking .= '<th>Email</th>';
$v_dsp_tb_tracking .= '<th>Contact Name</th>';
$v_dsp_tb_tracking .= '<th>Status</th>';
$v_dsp_tb_tracking .= '<th>Description</th>';
$v_dsp_tb_tracking .= '<th>Country Id</th>';
$v_dsp_tb_tracking .= '</tr>';
$v_count = 1;
foreach($arr_tb_tracking as $arr){
	$v_dsp_tb_tracking .= '<tr align="left" valign="middle">';
	$v_dsp_tb_tracking .= '<td align="right">'.($v_count++).'</td>';
	$v_tracking_id = isset($arr['tracking_id'])?$arr['tracking_id']:0;
	$v_tracking_name = isset($arr['tracking_name'])?$arr['tracking_name']:'';
	$v_tracking_key = isset($arr['tracking_key'])?$arr['tracking_key']:'';
	$v_website = isset($arr['website'])?$arr['website']:'';
	$v_tracking_url = isset($arr['tracking_url'])?$arr['tracking_url']:'';
	$v_option_url = isset($arr['option_url'])?$arr['option_url']:'';
	$v_phone = isset($arr['phone'])?$arr['phone']:'';
	$v_email = isset($arr['email'])?$arr['email']:'';
	$v_contact_name = isset($arr['contact_name'])?$arr['contact_name']:'';
	$v_status = isset($arr['status'])?$arr['status']:'0';
	$v_description = isset($arr['description'])?$arr['description']:'';
	$v_country_id = isset($arr['country_id'])?$arr['country_id']:0;
	$v_dsp_tb_tracking .= '<td>'.$v_tracking_id.'</td>';
	$v_dsp_tb_tracking .= '<td>'.$v_tracking_name.'</td>';
	$v_dsp_tb_tracking .= '<td>'.$v_tracking_key.'</td>';
	$v_dsp_tb_tracking .= '<td>'.$v_website.'</td>';
	$v_dsp_tb_tracking .= '<td>'.$v_tracking_url.'</td>';
	$v_dsp_tb_tracking .= '<td>'.$v_option_url.'</td>';
	$v_dsp_tb_tracking .= '<td>'.$v_phone.'</td>';
	$v_dsp_tb_tracking .= '<td>'.$v_email.'</td>';
	$v_dsp_tb_tracking .= '<td>'.$v_contact_name.'</td>';
	$v_dsp_tb_tracking .= '<td>'.$v_status.'</td>';
	$v_dsp_tb_tracking .= '<td>'.$v_description.'</td>';
	$v_dsp_tb_tracking .= '<td>'.$v_country_id.'</td>';
	$v_dsp_tb_tracking .= '</tr>';
}
$v_dsp_tb_tracking .= '</table>';
?>