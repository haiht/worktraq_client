<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_province->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_province = $cls_tb_province->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_province = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_tb_province .= '<tr align="center" valign="middle">';
$v_dsp_tb_province .= '<th>Ord</th>';
$v_dsp_tb_province .= '<th>Province Name</th>';
$v_dsp_tb_province .= '<th>Province Key</th>';
$v_dsp_tb_province .= '<th>Province Order</th>';
$v_dsp_tb_province .= '<th>Country Id</th>';
$v_dsp_tb_province .= '<th>&nbsp;</th>';
$v_dsp_tb_province .= '</tr>';
$v_count = $v_offset+1;
$arr_temp_order = array();
foreach($arr_tb_province as $arr){
	$v_mongo_id = $cls_tb_province->get_mongo_id();
	$v_province_id = isset($arr['province_id'])?$arr['province_id']:0;
	$v_province_name = isset($arr['province_name'])?$arr['province_name']:'';
	$v_province_key = isset($arr['province_key'])?$arr['province_key']:'';
	$v_province_status = isset($arr['province_status'])?$arr['province_status']:0;
	$v_province_order = isset($arr['province_order'])?$arr['province_order']:0;
	$v_country_id = isset($arr['country_id'])?$arr['country_id']:15;

    if(!isset($arr_temp_order[$v_country_id]))$arr_temp_order[$v_country_id] =$cls_tb_country->get_country_name_by_id($v_country_id);

    $v_dsp_tb_province .= '<tr align="left" valign="middle">';
	$v_dsp_tb_province .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_province .= '<td>'.$v_province_name.'</td>';
	$v_dsp_tb_province .= '<td>'.$v_province_key.'</td>';

	$v_dsp_tb_province .= '<td>'.$v_province_order.'</td>';
	$v_dsp_tb_province .= '<td>'.$arr_temp_order[$v_country_id].'</td>';
	$v_dsp_tb_province .= '<td align="center"><a href="'.URL.$v_admin_key.'/'.$v_province_id.'/edit">Edit</a> | <a class="confirm" href="'.URL.$v_admin_key.'/'.$v_province_id.'/delete">Delete</a></td>';
	$v_dsp_tb_province .= '</tr>';
}
$v_dsp_tb_province .= '</table>';
?>