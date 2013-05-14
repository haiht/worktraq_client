<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_email_templates_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_email_templates_sort'])){
	$v_sort = $_SESSION['ss_tb_email_templates_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_email_templates = $cls_tb_email_templates->select($arr_where_clause, $arr_sort);
$v_dsp_tb_email_templates = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_email_templates .= '<tr align="center" valign="middle">';
$v_dsp_tb_email_templates .= '<th>Ord</th>';
$v_dsp_tb_email_templates .= '<th>Email Id</th>';
$v_dsp_tb_email_templates .= '<th>Email Key</th>';
$v_dsp_tb_email_templates .= '<th>Email File</th>';
$v_dsp_tb_email_templates .= '<th>Email Data</th>';
$v_dsp_tb_email_templates .= '<th>Email Type</th>';
$v_dsp_tb_email_templates .= '<th>Description</th>';
$v_dsp_tb_email_templates .= '</tr>';
$v_count = 1;
foreach($arr_tb_email_templates as $arr){
	$v_dsp_tb_email_templates .= '<tr align="left" valign="middle">';
	$v_dsp_tb_email_templates .= '<td align="right">'.($v_count++).'</td>';
	$v_email_id = isset($arr['email_id'])?$arr['email_id']:0;
	$v_email_key = isset($arr['email_key'])?$arr['email_key']:'';
	$v_email_file = isset($arr['email_file'])?$arr['email_file']:'';
	$v_email_data = isset($arr['email_data'])?$arr['email_data']:'';
	$v_email_type = isset($arr['email_type'])?$arr['email_type']:0;
	$v_description = isset($arr['description'])?$arr['description']:'';
	$v_dsp_tb_email_templates .= '<td>'.$v_email_id.'</td>';
	$v_dsp_tb_email_templates .= '<td>'.$v_email_key.'</td>';
	$v_dsp_tb_email_templates .= '<td>'.$v_email_file.'</td>';
	$v_dsp_tb_email_templates .= '<td>'.$v_email_data.'</td>';
	$v_dsp_tb_email_templates .= '<td>'.$v_email_type.'</td>';
	$v_dsp_tb_email_templates .= '<td>'.$v_description.'</td>';
	$v_dsp_tb_email_templates .= '</tr>';
}
$v_dsp_tb_email_templates .= '</table>';
?>