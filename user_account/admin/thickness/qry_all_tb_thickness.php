<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_thickness->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_thickness = $cls_tb_thickness->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_thickness = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_thickness .= '<tr align="center" valign="middle">';
$v_dsp_tb_thickness .= '<th>Ord</th>';
$v_dsp_tb_thickness .= '<th>Thickness Name</th>';
$v_dsp_tb_thickness .= '<th>Thickness Size</th>';
$v_dsp_tb_thickness .= '<th>Thickness Type</th>';
$v_dsp_tb_thickness .= '<th>Action</th>';
$v_dsp_tb_thickness .= '</tr>';
$v_count = $v_offset+1;

foreach($arr_tb_thickness as $arr){
	$v_mongo_id = $cls_tb_thickness->get_mongo_id();
	$v_thickness_id = isset($arr['thickness_id'])?$arr['thickness_id']:0;
	$v_thickness_name = isset($arr['thickness_name'])?$arr['thickness_name']:'';
	$v_thickness_size = isset($arr['thickness_size'])?$arr['thickness_size']:'';
	$v_thickness_type = isset($arr['thickness_type'])?$arr['thickness_type']:'';
	$v_dsp_tb_thickness .= '<tr align="left" valign="middle">';
	$v_dsp_tb_thickness .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_thickness .= '<td>'.$v_thickness_name.'</td>';
	$v_dsp_tb_thickness .= '<td>'.$v_thickness_size.'</td>';
	$v_dsp_tb_thickness .= '<td>'.$v_thickness_type.'</td>';
	$v_dsp_tb_thickness .= '<td align="center">
                <a href="'. URL . $v_admin_key.'/'.$v_thickness_id.'/edit">Edit</a> |
                <a href="'. URL . $v_admin_key.'/'.$v_thickness_id.'/delete">Edit</a> |';
    $v_dsp_tb_thickness .= '</tr>';
}
$v_dsp_tb_thickness .= '</table>';
?>