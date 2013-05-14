<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_module_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_module_sort'])){
	$v_sort = $_SESSION['ss_tb_module_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_module = $cls_tb_module->select($arr_where_clause, $arr_sort);
$v_dsp_tb_module = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_module .= '<tr align="center" valign="middle">';
$v_dsp_tb_module .= '<th>Ord</th>';
$v_dsp_tb_module .= '<th>Module Id</th>';
$v_dsp_tb_module .= '<th>Module Pid</th>';
$v_dsp_tb_module .= '<th>Module Text</th>';
$v_dsp_tb_module .= '<th>Module Key</th>';
$v_dsp_tb_module .= '<th>Module Type</th>';
$v_dsp_tb_module .= '<th>Module Root</th>';
$v_dsp_tb_module .= '<th>Module Dir</th>';
$v_dsp_tb_module .= '<th>Module Icon</th>';
$v_dsp_tb_module .= '<th>Module Menu</th>';
$v_dsp_tb_module .= '<th>Module Role</th>';
$v_dsp_tb_module .= '<th>Module Order</th>';
$v_dsp_tb_module .= '<th>Module Index</th>';
$v_dsp_tb_module .= '<th>Module Locked</th>';
$v_dsp_tb_module .= '<th>Module Time</th>';
$v_dsp_tb_module .= '<th>Module Category</th>';
$v_dsp_tb_module .= '<th>Module Description</th>';
$v_dsp_tb_module .= '</tr>';
$v_count = 1;
foreach($arr_tb_module as $arr){
	$v_dsp_tb_module .= '<tr align="left" valign="middle">';
	$v_dsp_tb_module .= '<td align="right">'.($v_count++).'</td>';
	$v_module_id = isset($arr['module_id'])?$arr['module_id']:0;
	$v_module_pid = isset($arr['module_pid'])?$arr['module_pid']:0;
	$v_module_text = isset($arr['module_text'])?$arr['module_text']:'';
	$v_module_key = isset($arr['module_key'])?$arr['module_key']:'';
	$v_module_type = isset($arr['module_type'])?$arr['module_type']:0;
	$v_module_root = isset($arr['module_root'])?$arr['module_root']:'admin';
	$v_module_dir = isset($arr['module_dir'])?$arr['module_dir']:'';
	$v_module_icon = isset($arr['module_icon'])?$arr['module_icon']:'';
	$v_module_menu = isset($arr['module_menu'])?$arr['module_menu']:'';
	$v_module_role = isset($arr['module_role'])?$arr['module_role']:0;
	$v_module_order = isset($arr['module_order'])?$arr['module_order']:0;
	$v_module_index = isset($arr['module_index'])?$arr['module_index']:'index.php';
	$v_module_locked = isset($arr['module_locked'])?$arr['module_locked']:0;
	$v_module_time = isset($arr['module_time'])?$arr['module_time']:(new MongoDate(time()));
	$v_module_category = isset($arr['module_category'])?$arr['module_category']:0;
	$v_module_description = isset($arr['module_description'])?$arr['module_description']:'';
	$v_dsp_tb_module .= '<td>'.$v_module_id.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_pid.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_text.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_key.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_type.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_root.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_dir.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_icon.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_menu.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_role.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_order.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_index.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_locked.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_time.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_category.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_description.'</td>';
	$v_dsp_tb_module .= '</tr>';
}
$v_dsp_tb_module .= '</table>';
?>