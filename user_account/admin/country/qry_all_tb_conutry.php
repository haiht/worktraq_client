<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();

$v_total_row = $cls_tb_conutry->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);

if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;

$v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");

$arr_tb_conutry = $cls_tb_conutry->select_limit($v_offset,$v_num_row,$arr_where_clause);

$v_dsp_tb_conutry = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_tb_conutry .= '<tr align="center" valign="middle">';
$v_dsp_tb_conutry .= '<th>Ord</th>';
$v_dsp_tb_conutry .= '<th>Country Name</th>';
$v_dsp_tb_conutry .= '<th>Country Key</th>';
$v_dsp_tb_conutry .= '<th>Country Order</th>';
$v_dsp_tb_conutry .= '<th>Country status</th>';
$v_dsp_tb_conutry .= '<th>Action</th>';
$v_dsp_tb_conutry .= '</tr>';
$v_count = $v_offset+1;

foreach($arr_tb_conutry as $arr){

	$v_mongo_id = $cls_tb_conutry->get_mongo_id();
	$v_country_id = isset($arr['country_id'])?$arr['country_id']:0;
	$v_country_name = isset($arr['country_name'])?$arr['country_name']:'';
	$v_country_key = isset($arr['country_key'])?$arr['country_key']:'';
	$v_country_order = isset($arr['country_order'])?$arr['country_order']:0;
	$v_country_status = isset($arr['country_status'])?$arr['country_status']:0;

	$v_dsp_tb_conutry .= '<tr align="left" valign="middle">';
	$v_dsp_tb_conutry .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_conutry .= '<td>'.$v_country_name.'</td>';
	$v_dsp_tb_conutry .= '<td>'.$v_country_key.'</td>';
	$v_dsp_tb_conutry .= '<td>'.$v_country_order.'</td>';
	$v_dsp_tb_conutry .= '<td>'.$v_country_status.'</td>';
	$v_dsp_tb_conutry .= '<td align="center"><a href="'. URL.$v_admin_key.'/' .$v_country_id.'/edit">Edit</a> |
	                        <a onclick="{return confirm(\'Do you want to remove '.$v_country_name . '\')}" href="?a=ACC&acc=COU&cou=D&txt_country_id='.$v_country_id.'">Delete</a></td>';
	$v_dsp_tb_conutry .= '</tr>';

}
$v_dsp_tb_conutry .= '</table>';
?>