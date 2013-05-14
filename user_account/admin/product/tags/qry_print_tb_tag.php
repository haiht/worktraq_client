<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_tag_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_tag_sort'])){
	$v_sort = $_SESSION['ss_tb_tag_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_tag = $cls_tb_tag->select($arr_where_clause, $arr_sort);
$v_dsp_tb_tag = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_tag .= '<tr align="center" valign="middle">';
$v_dsp_tb_tag .= '<th>Ord</th>';
$v_dsp_tb_tag .= '<th>Tag Id</th>';
$v_dsp_tb_tag .= '<th>Tag Name</th>';
$v_dsp_tb_tag .= '<th>Tag Status</th>';
$v_dsp_tb_tag .= '<th>Tag Order</th>';
$v_dsp_tb_tag .= '<th>Location Id</th>';
$v_dsp_tb_tag .= '<th>Company Id</th>';
$v_dsp_tb_tag .= '<th>User Name</th>';
$v_dsp_tb_tag .= '<th>Date Created</th>';
$v_dsp_tb_tag .= '</tr>';
$v_count = 1;
foreach($arr_tb_tag as $arr){
	$v_dsp_tb_tag .= '<tr align="left" valign="middle">';
	$v_dsp_tb_tag .= '<td align="right">'.($v_count++).'</td>';
	$v_tag_id = isset($arr['tag_id'])?$arr['tag_id']:0;
	$v_tag_name = isset($arr['tag_name'])?$arr['tag_name']:'';
	$v_tag_status = isset($arr['tag_status'])?$arr['tag_status']:0;
	$v_tag_order = isset($arr['tag_order'])?$arr['tag_order']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
	$v_date_created = isset($arr['date_created'])?$arr['date_created']:(new MongoDate(time()));
	$v_dsp_tb_tag .= '<td>'.$v_tag_id.'</td>';
	$v_dsp_tb_tag .= '<td>'.$v_tag_name.'</td>';
	$v_dsp_tb_tag .= '<td>'.$v_tag_status.'</td>';
	$v_dsp_tb_tag .= '<td>'.$v_tag_order.'</td>';
	$v_dsp_tb_tag .= '<td>'.$v_location_id.'</td>';
	$v_dsp_tb_tag .= '<td>'.$v_company_id.'</td>';
	$v_dsp_tb_tag .= '<td>'.$v_user_name.'</td>';
	$v_dsp_tb_tag .= '<td>'.$v_date_created.'</td>';
	$v_dsp_tb_tag .= '</tr>';
}
$v_dsp_tb_tag .= '</table>';
?>