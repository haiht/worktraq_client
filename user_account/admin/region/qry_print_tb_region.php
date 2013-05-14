<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_region_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_region_sort'])){
	$v_sort = $_SESSION['ss_tb_region_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_region = $cls_tb_region->select($arr_where_clause, $arr_sort);
$v_dsp_tb_region = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_region .= '<tr align="center" valign="middle">';
$v_dsp_tb_region .= '<th>Ord</th>';
$v_dsp_tb_region .= '<th>Region Id</th>';
$v_dsp_tb_region .= '<th>Company Id</th>';
$v_dsp_tb_region .= '<th>Region Name</th>';
$v_dsp_tb_region .= '<th>Region Type</th>';
$v_dsp_tb_region .= '<th>Region Contact</th>';
$v_dsp_tb_region .= '<th>Status</th>';
$v_dsp_tb_region .= '</tr>';
$v_count = 1;
foreach($arr_tb_region as $arr){
	$v_dsp_tb_region .= '<tr align="left" valign="middle">';
	$v_dsp_tb_region .= '<td align="right">'.($v_count++).'</td>';
	$v_region_id = isset($arr['region_id'])?$arr['region_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_region_name = isset($arr['region_name'])?$arr['region_name']:'';
	$v_region_type = isset($arr['region_type'])?$arr['region_type']:0;
	$v_region_contact = isset($arr['region_contact'])?$arr['region_contact']:0;
	$v_status = isset($arr['status'])?$arr['status']:'0';
	$v_dsp_tb_region .= '<td>'.$v_region_id.'</td>';
	$v_dsp_tb_region .= '<td>'.$v_company_id.'</td>';
	$v_dsp_tb_region .= '<td>'.$v_region_name.'</td>';
	$v_dsp_tb_region .= '<td>'.$v_region_type.'</td>';
	$v_dsp_tb_region .= '<td>'.$v_region_contact.'</td>';
	$v_dsp_tb_region .= '<td>'.$v_status.'</td>';
	$v_dsp_tb_region .= '</tr>';
}
$v_dsp_tb_region .= '</table>';
?>