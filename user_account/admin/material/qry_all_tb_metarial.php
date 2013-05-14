<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_metarial->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_metarial = $cls_tb_metarial->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_metarial = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_metarial .= '<tr align="center" valign="middle">';
$v_dsp_tb_metarial .= '<th>Ord</th>';;
$v_dsp_tb_metarial .= '<th>Material Name</th>';
$v_dsp_tb_metarial .= '<th>Material Description</th>';
$v_dsp_tb_metarial .= '<th>Action</th>';
$v_dsp_tb_metarial .= '</tr>';
$v_count = 1;

foreach($arr_tb_metarial as $arr){
	$v_mongo_id = $cls_tb_metarial->get_mongo_id();
	$v_material_id = isset($arr['material_id'])?$arr['material_id']:0;
	$v_material_name = isset($arr['material_name'])?$arr['material_name']:'0';
	$v_material_description = isset($arr['material_description'])?$arr['material_description']:'';
	$v_dsp_tb_metarial .= '<tr align="left" valign="middle">';
	$v_dsp_tb_metarial .= '<td align="right">'.($v_count++).'</td>';

	$v_dsp_tb_metarial .= '<td>'.$v_material_name.'</td>';
	$v_dsp_tb_metarial .= '<td>'.$v_material_description.'</td>';
	$v_dsp_tb_metarial .= '<td align="center">
	                                <a href="'.URL . $v_admin_key.'/'.$v_material_id.'/edit">Edit</a> |';
    if($v_per_delete==1)
	$v_dsp_tb_metarial .='<a href="'.URL . $v_admin_key.'/'.$v_material_id.'/delete">Delete</a>';

	$v_dsp_tb_metarial .= '</td></tr>';
}
$v_dsp_tb_metarial .= '</table>';
?>