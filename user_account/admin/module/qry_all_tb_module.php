<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_module->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_module = $cls_tb_module->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_module = '<table class="grid_table" width="100%" cellpadding="3" cellspacing="0" border="1" align="center">';

$v_dsp_tb_module .= '<tr align="center" valign="middle">';
$v_dsp_tb_module .= '<th width="20">Ord</th>';
$v_dsp_tb_module .= '<th>ID</th>';
$v_dsp_tb_module .= '<th>Parent ID</th>';
$v_dsp_tb_module .= '<th>Name</th>';
$v_dsp_tb_module .= '<th>Key</th>';
$v_dsp_tb_module .= '<th>Type</th>';
$v_dsp_tb_module .= '<th>Root Dir</th>';
$v_dsp_tb_module .= '<th>Sub. Dir</th>';
$v_dsp_tb_module .= '<th>Menu</th>';
$v_dsp_tb_module .= '<th>Order</th>';
$v_dsp_tb_module .= '<th>Index File</th>';
$v_dsp_tb_module .= '<th>Locked</th>';
$v_dsp_tb_module .= '<th>Category</th>';
$v_dsp_tb_module .= '<th>Have Role</th>';
//$v_dsp_tb_module .= '<th>module_time</th>';
$v_dsp_tb_module .= '<th>Action</th>';
$v_dsp_tb_module .= '</tr>';
$v_count = 1;

foreach($arr_tb_module as $arr){
	$v_mongo_id = $cls_tb_module->get_mongo_id();
	$v_module_id = isset($arr['module_id'])?$arr['module_id']:0;
	$v_module_pid = isset($arr['module_pid'])?$arr['module_pid']:0;
	$v_module_text = isset($arr['module_text'])?$arr['module_text']:'';
	$v_module_key = isset($arr['module_key'])?$arr['module_key']:'';
	$v_module_type = isset($arr['module_type'])?$arr['module_type']:0;
	$v_module_root = isset($arr['module_root'])?$arr['module_root']:'admin';
	$v_module_dir = isset($arr['module_dir'])?$arr['module_dir']:0;
	$v_module_order = isset($arr['module_order'])?$arr['module_order']:0;
	$v_module_role = isset($arr['module_role'])?$arr['module_role']:0;
	$v_module_index = isset($arr['module_index'])?$arr['module_index']:'index.php';
	$v_module_locked = isset($arr['module_locked'])?$arr['module_locked']:0;
	$v_module_category = isset($arr['module_locked'])?$arr['module_category']:0;
    $v_module_menu = isset($arr['module_menu'])?$arr['module_menu']:'';
	$v_module_time = isset($arr['module_time'])?date('Y-m-d H:i:s',$arr['module_time']->sec):date('Y-m-d H:i:s', time());

	$v_dsp_tb_module .= '<tr align="left" valign="middle">';
	$v_dsp_tb_module .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_id.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_pid.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_text.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_key.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_type.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_root.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_dir.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_menu.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_order.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_index.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_locked.'</td>';
	$v_dsp_tb_module .= '<td>'.$v_module_category.'</td>';
	$v_dsp_tb_module .= '<td>'.($v_module_role==1?'Yes':'No').'</td>';
	//$v_dsp_tb_module .= '<td>'.$v_module_time.'</td>';
	$v_dsp_tb_module .= '<td align="center"><a href="'.URL.$v_admin_key.'/'.$v_module_id.'">Edit</a> | <a href="'.URL.$v_admin_key.'/'.$v_module_id.'/delete">Delete</a></td>';
	$v_dsp_tb_module .= '</tr>';
}
$v_dsp_tb_module .= '</table>';
?>