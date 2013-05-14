<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_product_group_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_product_group_sort'])){
	$v_sort = $_SESSION['ss_tb_product_group_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_product_group = $cls_tb_product_group->select($arr_where_clause, $arr_sort);
$v_dsp_tb_product_group = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_product_group .= '<tr align="center" valign="middle">';
$v_dsp_tb_product_group .= '<th>Ord</th>';
$v_dsp_tb_product_group .= '<th>Product Group Id</th>';
$v_dsp_tb_product_group .= '<th>Company Id</th>';
$v_dsp_tb_product_group .= '<th>Product Group Key</th>';
$v_dsp_tb_product_group .= '<th>Product Group Name</th>';
$v_dsp_tb_product_group .= '<th>Product Group Value</th>';
$v_dsp_tb_product_group .= '<th>Product Group Overflow</th>';
$v_dsp_tb_product_group .= '<th>Product Group Order</th>';
$v_dsp_tb_product_group .= '<th>Product Group Parent</th>';
$v_dsp_tb_product_group .= '</tr>';
$v_count = 1;
foreach($arr_tb_product_group as $arr){
	$v_dsp_tb_product_group .= '<tr align="left" valign="middle">';
	$v_dsp_tb_product_group .= '<td align="right">'.($v_count++).'</td>';
	$v_product_group_id = isset($arr['product_group_id'])?$arr['product_group_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_product_group_key = isset($arr['product_group_key'])?$arr['product_group_key']:'';
	$v_product_group_name = isset($arr['product_group_name'])?$arr['product_group_name']:'';
	$v_product_group_value = isset($arr['product_group_value'])?$arr['product_group_value']:0;
	$v_product_group_overflow = isset($arr['product_group_overflow'])?$arr['product_group_overflow']:0;
	$v_product_group_order = isset($arr['product_group_order'])?$arr['product_group_order']:0;
	$v_product_group_parent = isset($arr['product_group_parent'])?$arr['product_group_parent']:0;
	$v_dsp_tb_product_group .= '<td>'.$v_product_group_id.'</td>';
	$v_dsp_tb_product_group .= '<td>'.$v_company_id.'</td>';
	$v_dsp_tb_product_group .= '<td>'.$v_product_group_key.'</td>';
	$v_dsp_tb_product_group .= '<td>'.$v_product_group_name.'</td>';
	$v_dsp_tb_product_group .= '<td>'.$v_product_group_value.'</td>';
	$v_dsp_tb_product_group .= '<td>'.$v_product_group_overflow.'</td>';
	$v_dsp_tb_product_group .= '<td>'.$v_product_group_order.'</td>';
	$v_dsp_tb_product_group .= '<td>'.$v_product_group_parent.'</td>';
	$v_dsp_tb_product_group .= '</tr>';
}
$v_dsp_tb_product_group .= '</table>';
?>