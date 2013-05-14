<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_role_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_role_sort'])){
	$v_sort = $_SESSION['ss_tb_role_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_role = $cls_tb_role->select($arr_where_clause, $arr_sort);
$v_dsp_tb_role = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_role .= '<tr align="center" valign="middle">';
$v_dsp_tb_role .= '<th>Ord</th>';
$v_dsp_tb_role .= '<th>Role Id</th>';
$v_dsp_tb_role .= '<th>Role Title</th>';
$v_dsp_tb_role .= '<th>Role Type</th>';
$v_dsp_tb_role .= '<th>Role Key</th>';
$v_dsp_tb_role .= '<th>Status</th>';
$v_dsp_tb_role .= '<th>User Type</th>';
$v_dsp_tb_role .= '<th>Default Role</th>';
$v_dsp_tb_role .= '<th>Color</th>';
$v_dsp_tb_role .= '<th>Bold</th>';
$v_dsp_tb_role .= '<th>Italic</th>';
$v_dsp_tb_role .= '<th>Location Id</th>';
$v_dsp_tb_role .= '<th>Company Id</th>';
$v_dsp_tb_role .= '</tr>';
$v_count = 1;
foreach($arr_tb_role as $arr){
	$v_dsp_tb_role .= '<tr align="left" valign="middle">';
	$v_dsp_tb_role .= '<td align="right">'.($v_count++).'</td>';
	$v_role_id = isset($arr['role_id'])?$arr['role_id']:0;
	$v_role_title = isset($arr['role_title'])?$arr['role_title']:'';
	$v_role_type = isset($arr['role_type'])?$arr['role_type']:0;
	$v_role_key = isset($arr['role_key'])?$arr['role_key']:'';
	$v_status = isset($arr['status'])?$arr['status']:0;
	$v_user_type = isset($arr['user_type'])?$arr['user_type']:0;
	$v_default_role = isset($arr['default_role'])?$arr['default_role']:0;
	$v_color = isset($arr['color'])?$arr['color']:'';
	$v_bold = isset($arr['bold'])?$arr['bold']:0;
	$v_italic = isset($arr['italic'])?$arr['italic']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_dsp_tb_role .= '<td>'.$v_role_id.'</td>';
	$v_dsp_tb_role .= '<td>'.$v_role_title.'</td>';
	$v_dsp_tb_role .= '<td>'.$v_role_type.'</td>';
	$v_dsp_tb_role .= '<td>'.$v_role_key.'</td>';
	$v_dsp_tb_role .= '<td>'.$v_status.'</td>';
	$v_dsp_tb_role .= '<td>'.$v_user_type.'</td>';
	$v_dsp_tb_role .= '<td>'.$v_default_role.'</td>';
	$v_dsp_tb_role .= '<td>'.$v_color.'</td>';
	$v_dsp_tb_role .= '<td>'.$v_bold.'</td>';
	$v_dsp_tb_role .= '<td>'.$v_italic.'</td>';
	$v_dsp_tb_role .= '<td>'.$v_location_id.'</td>';
	$v_dsp_tb_role .= '<td>'.$v_company_id.'</td>';
	$v_dsp_tb_role .= '</tr>';
}
$v_dsp_tb_role .= '</table>';
?>