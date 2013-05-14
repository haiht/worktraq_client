<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_province_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_province_sort'])){
	$v_sort = $_SESSION['ss_tb_province_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_province = $cls_tb_province->select($arr_where_clause, $arr_sort);
$v_dsp_tb_province = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_province .= '<tr align="center" valign="middle">';
$v_dsp_tb_province .= '<th>Ord</th>';
$v_dsp_tb_province .= '<th>Province Id</th>';
$v_dsp_tb_province .= '<th>Province Name</th>';
$v_dsp_tb_province .= '<th>Province Key</th>';
$v_dsp_tb_province .= '<th>Province Status</th>';
$v_dsp_tb_province .= '<th>Province Order</th>';
$v_dsp_tb_province .= '<th>Country Id</th>';
$v_dsp_tb_province .= '</tr>';
$v_count = 1;
foreach($arr_tb_province as $arr){
	$v_dsp_tb_province .= '<tr align="left" valign="middle">';
	$v_dsp_tb_province .= '<td align="right">'.($v_count++).'</td>';
	$v_province_id = isset($arr['province_id'])?$arr['province_id']:0;
	$v_province_name = isset($arr['province_name'])?$arr['province_name']:'';
	$v_province_key = isset($arr['province_key'])?$arr['province_key']:'';
	$v_province_status = isset($arr['province_status'])?$arr['province_status']:0;
	$v_province_order = isset($arr['province_order'])?$arr['province_order']:0;
	$v_country_id = isset($arr['country_id'])?$arr['country_id']:15;
	$v_dsp_tb_province .= '<td>'.$v_province_id.'</td>';
	$v_dsp_tb_province .= '<td>'.$v_province_name.'</td>';
	$v_dsp_tb_province .= '<td>'.$v_province_key.'</td>';
	$v_dsp_tb_province .= '<td>'.$v_province_status.'</td>';
	$v_dsp_tb_province .= '<td>'.$v_province_order.'</td>';
	$v_dsp_tb_province .= '<td>'.$v_country_id.'</td>';
	$v_dsp_tb_province .= '</tr>';
}
$v_dsp_tb_province .= '</table>';
?>