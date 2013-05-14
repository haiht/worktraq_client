<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_role->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_role = $cls_tb_role->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_role = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_role .= '<tr align="center" valign="middle">';
$v_dsp_tb_role .= '<th>Ord</th>';
$v_dsp_tb_role .= '<th>Role Title</th>';
$v_dsp_tb_role .= '<th>Role Type</th>';
$v_dsp_tb_role .= '<th>Role Key</th>';
$v_dsp_tb_role .= '<th>Company</th>';
$v_dsp_tb_role .= '<th>Location</th>';
$v_dsp_tb_role .= '<th>Status</th>';
$v_dsp_tb_role .= '<th>User Type</th>';
$v_dsp_tb_role .= '<th>Default</th>';
$v_dsp_tb_role .= '<th>Color</th>';
$v_dsp_tb_role .= '<th>Bold</th>';
$v_dsp_tb_role .= '<th>Italic</th>';
$v_dsp_tb_role .= '<th>&nbsp;</th>';
$v_dsp_tb_role .= '</tr>';
$v_count = 1;

foreach($arr_tb_role as $arr){
	$v_mongo_id = $cls_tb_role->get_mongo_id();
	$v_role_id = isset($arr['role_id'])?$arr['role_id']:0;
	$v_role_title = isset($arr['role_title'])?$arr['role_title']:'';
	$v_role_type = isset($arr['role_type'])?$arr['role_type']:0;
	$v_role_key = isset($arr['role_key'])?$arr['role_key']:'';
	$arr_role_content = isset($arr['role_content'])?$arr['role_content']:array();
	$arr_role_child = isset($arr['role_child'])?$arr['role_child']:array();
	$v_status = isset($arr['status'])?$arr['status']:0;
	$v_user_type = isset($arr['user_type'])?$arr['user_type']:0;
	$v_default = isset($arr['default_role'])?$arr['default_role']:0;
	$v_color = isset($arr['color'])?$arr['color']:'';
	$v_bold = isset($arr['bold'])?$arr['bold']:0;
	$v_italic = isset($arr['italic'])?$arr['italic']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
    $v_user_type = $cls_settings->get_option_name_by_id('user_type', $v_user_type);

    $v_company = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
    $v_location = $cls_tb_company->select_scalar('location_name', array('location_id'=>$v_location_id));
	$v_dsp_tb_role .= '<tr align="left" valign="middle">';
	$v_dsp_tb_role .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_role .= '<td style="color:'.$v_color.'; font-weight:'.($v_bold?'bold':'normal').';font-style:'.($v_italic?'italic':'normal').'">'.$v_role_title.'</td>';
	$v_dsp_tb_role .= '<td>'.$v_role_type.'</td>';
	$v_dsp_tb_role .= '<td>'.$v_role_key.'</td>';
    $v_dsp_tb_role .= '<td>'.$v_company.'</td>';
    $v_dsp_tb_role .= '<td>'.$v_location.'</td>';
	$v_dsp_tb_role .= '<td>'.($v_status==0?'Active':'Inactive').'</td>';
	$v_dsp_tb_role .= '<td>'.$v_user_type.'</td>';
	$v_dsp_tb_role .= '<td>'.($v_default==1?'Yes':'No').'</td>';
	$v_dsp_tb_role .= '<td style="color:'.$v_color.'">'.$v_color.'</td>';
	$v_dsp_tb_role .= '<td>'.($v_bold?'Yes':'No').'</td>';
	$v_dsp_tb_role .= '<td>'.($v_italic?'Yes':'No').'</td>';
	$v_dsp_tb_role .= '<td align="center"><a href="'.URL.$v_admin_key.'/'.$v_role_id.'/edit">Edit</a> | <a class="confirm" href="'.URL.$v_admin_key.'/'.$v_role_id.'/delete">Delete</a></td>';
	$v_dsp_tb_role .= '</tr>';
}
$v_dsp_tb_role .= '</table>';
?>