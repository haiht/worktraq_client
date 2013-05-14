<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_template->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_template = $cls_tb_template->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_template = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_template .= '<tr align="center" valign="middle">';
$v_dsp_tb_template .= '<th>Ord</th>';
$v_dsp_tb_template .= '<th>Template Id</th>';
$v_dsp_tb_template .= '<th>Template Name</th>';
$v_dsp_tb_template .= '<th>Template Default</th>';
$v_dsp_tb_template .= '<th>Date Created</th>';
$v_dsp_tb_template .= '<th>&nbsp;</th>';
$v_dsp_tb_template .= '</tr>';
$v_count = 1;

foreach($arr_tb_template as $arr){
	$v_mongo_id = $cls_tb_template->get_mongo_id();
	$v_template_id = isset($arr['template_id'])?$arr['template_id']:0;
	$v_template_name = isset($arr['template_name'])?$arr['template_name']:'';
	$v_template_default = isset($arr['template_default'])?$arr['template_default']:'';
	$v_date_created = isset($arr['date_created'])?date('Y-m-d H:i:s',$arr['date_created']->sec):date('Y-m-d H:i:s', time());
	$v_dsp_tb_template .= '<tr align="left" valign="middle">';
	$v_dsp_tb_template .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_template .= '<td>'.$v_template_id.'</td>';
	$v_dsp_tb_template .= '<td>'.$v_template_name.'</td>';
	$v_dsp_tb_template .= '<td>'.$v_template_default.'</td>';
	$v_dsp_tb_template .= '<td>'.$v_date_created.'</td>';
	$v_dsp_tb_template .= '<td align="center"><a href="'.URL.$v_admin_key.'/'.$v_template_id.'/edit">Edit</a> | <a class="confirm" href="'.URL.$v_admin_key.'/'.$v_template_id.'/delete">Delete</a></td>';
	$v_dsp_tb_template .= '</tr>';
}
$v_dsp_tb_template .= '</table>';
?>