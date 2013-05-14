<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_settings_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_settings_sort'])){
	$v_sort = $_SESSION['ss_tb_settings_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_settings = $cls_settings->select($arr_where_clause, $arr_sort);
$v_dsp_tb_settings = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_settings .= '<tr align="center" valign="middle">';
$v_dsp_tb_settings .= '<th>Ord</th>';
$v_dsp_tb_settings .= '<th>Setting Id</th>';
$v_dsp_tb_settings .= '<th>Setting Name</th>';
$v_dsp_tb_settings .= '<th>Status</th>';
$v_dsp_tb_settings .= '<th>Setting Description</th>';
$v_dsp_tb_settings .= '<th>Setting Type</th>';
$v_dsp_tb_settings .= '</tr>';
$v_count = 1;
foreach($arr_tb_settings as $arr){
	$v_dsp_tb_settings .= '<tr align="left" valign="middle">';
	$v_dsp_tb_settings .= '<td align="right">'.($v_count++).'</td>';
	$v_setting_id = isset($arr['setting_id'])?$arr['setting_id']:0;
	$v_setting_name = isset($arr['setting_name'])?$arr['setting_name']:'';
	$v_status = isset($arr['status'])?$arr['status']:'0';
	$v_setting_description = isset($arr['setting_description'])?$arr['setting_description']:'';
	$v_setting_type = isset($arr['setting_type'])?$arr['setting_type']:0;
	$v_dsp_tb_settings .= '<td>'.$v_setting_id.'</td>';
	$v_dsp_tb_settings .= '<td>'.$v_setting_name.'</td>';
	$v_dsp_tb_settings .= '<td>'.$v_status.'</td>';
	$v_dsp_tb_settings .= '<td>'.$v_setting_description.'</td>';
	$v_dsp_tb_settings .= '<td>'.$v_setting_type.'</td>';
	$v_dsp_tb_settings .= '</tr>';
}
$v_dsp_tb_settings .= '</table>';
?>