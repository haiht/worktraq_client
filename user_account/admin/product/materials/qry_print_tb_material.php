<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_material_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_material_sort'])){
	$v_sort = $_SESSION['ss_tb_material_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_material = $cls_tb_material->select($arr_where_clause, $arr_sort);
$v_dsp_tb_material = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_material .= '<tr align="center" valign="middle">';
$v_dsp_tb_material .= '<th>Ord</th>';
$v_dsp_tb_material .= '<th>Material Id</th>';
$v_dsp_tb_material .= '<th>Material Name</th>';
$v_dsp_tb_material .= '<th>Material Option</th>';
$v_dsp_tb_material .= '<th>Description</th>';
$v_dsp_tb_material .= '<th>Size Option</th>';
$v_dsp_tb_material .= '<th>Two Sided Print</th>';
$v_dsp_tb_material .= '<th>Material Type</th>';
$v_dsp_tb_material .= '<th>Status</th>';
$v_dsp_tb_material .= '</tr>';
$v_count = 1;
foreach($arr_tb_material as $arr){
	$v_dsp_tb_material .= '<tr align="left" valign="middle">';
	$v_dsp_tb_material .= '<td align="right">'.($v_count++).'</td>';
	$v_material_id = isset($arr['material_id'])?$arr['material_id']:0;
	$v_material_name = isset($arr['material_name'])?$arr['material_name']:'';
	$v_material_option = isset($arr['material_option'])?$arr['material_option']:'array';
	$v_description = isset($arr['description'])?$arr['description']:'';
	$v_size_option = isset($arr['size_option'])?$arr['size_option']:'0';
	$v_two_sided_print = isset($arr['two_sided_print'])?$arr['two_sided_print']:'0';
	$v_material_type = isset($arr['material_type'])?$arr['material_type']:0;
	$v_status = isset($arr['status'])?$arr['status']:'0';
	$v_dsp_tb_material .= '<td>'.$v_material_id.'</td>';
	$v_dsp_tb_material .= '<td>'.$v_material_name.'</td>';
	$v_dsp_tb_material .= '<td>'.$v_material_option.'</td>';
	$v_dsp_tb_material .= '<td>'.$v_description.'</td>';
	$v_dsp_tb_material .= '<td>'.$v_size_option.'</td>';
	$v_dsp_tb_material .= '<td>'.$v_two_sided_print.'</td>';
	$v_dsp_tb_material .= '<td>'.$v_material_type.'</td>';
	$v_dsp_tb_material .= '<td>'.$v_status.'</td>';
	$v_dsp_tb_material .= '</tr>';
}
$v_dsp_tb_material .= '</table>';
?>