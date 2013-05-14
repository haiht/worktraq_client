<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_material->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");


$arr_tb_material = $cls_tb_material->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_material = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_material .= '<tr align="center" valign="middle">';
$v_dsp_tb_material .= '<th>Ord</th>';
$v_dsp_tb_material .= '<th>Material Name</th>';
$v_dsp_tb_material .= '<th>Description</th>';
$v_dsp_tb_material .= '<th>Allow Two-sided print</th>';
$v_dsp_tb_material .= '<th>Status</th>';
$v_dsp_tb_material .= '<th>&nbsp;</th>';
$v_dsp_tb_material .= '</tr>';
$v_count = $v_offset+1;

foreach($arr_tb_material as $arr){
	$v_mongo_id = $cls_tb_material->get_mongo_id();
	$v_material_id = isset($arr['material_id'])?$arr['material_id']:0;
	$v_material_name = isset($arr['material_name'])?$arr['material_name']:'';
	$v_description = isset($arr['description'])?$arr['description']:'';
    $v_two_sided_print = isset($arr['two_sided_print'])?$arr['two_sided_print']:0;
    $v_status = isset($arr['status'])?$arr['status']:0;
	$v_dsp_tb_material .= '<tr align="left" valign="middle">';
	$v_dsp_tb_material .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_material .= '<td>'.$v_material_name.'</td>';
    $v_dsp_tb_material .= '<td>'.$v_description.'</td>';
    $v_dsp_tb_material .= '<td>'.($v_two_sided_print==1?'Yes':'No').'</td>';
	$v_dsp_tb_material .= '<td>'.($v_status==0?'Active':'Inactive').'</td>';
	$v_dsp_tb_material .= '<td align="center"><a href="'.URL.$v_admin_key.'/'.$v_material_id.'/edit">Edit</a> | <a href="'.URL.$v_admin_key.'/'.$v_material_id.'/'.'delete">Delete</a></td>';
	$v_dsp_tb_material .= '</tr>';
}
$v_dsp_tb_material .= '</table>';
?>