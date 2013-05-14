<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_support_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_support_sort'])){
	$v_sort = $_SESSION['ss_tb_support_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_support = $cls_tb_support->select($arr_where_clause, $arr_sort);
$v_dsp_tb_support = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_support .= '<tr align="center" valign="middle">';
$v_dsp_tb_support .= '<th>Ord</th>';
$v_dsp_tb_support .= '<th>Support Id</th>';
$v_dsp_tb_support .= '<th>Support Title</th>';
$v_dsp_tb_support .= '<th>Support Description</th>';
$v_dsp_tb_support .= '<th>Company Id</th>';
$v_dsp_tb_support .= '<th>Location Id</th>';
$v_dsp_tb_support .= '<th>Contact Id</th>';
$v_dsp_tb_support .= '<th>Date Created</th>';
$v_dsp_tb_support .= '<th>Username</th>';
$v_dsp_tb_support .= '<th>Image File</th>';
$v_dsp_tb_support .= '</tr>';
$v_count = 1;
foreach($arr_tb_support as $arr){
	$v_dsp_tb_support .= '<tr align="left" valign="middle">';
	$v_dsp_tb_support .= '<td align="right">'.($v_count++).'</td>';
	$v_support_id = isset($arr['support_id'])?$arr['support_id']:0;
	$v_support_title = isset($arr['support_title'])?$arr['support_title']:'';
	$v_support_description = isset($arr['support_description'])?$arr['support_description']:'';
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
	$v_date_created = isset($arr['date_created'])?$arr['date_created']:(new MongoDate(time()));
	$v_username = isset($arr['username'])?$arr['username']:'';
	$v_image_file = isset($arr['image_file'])?$arr['image_file']:'';
	$v_dsp_tb_support .= '<td>'.$v_support_id.'</td>';
	$v_dsp_tb_support .= '<td>'.$v_support_title.'</td>';
	$v_dsp_tb_support .= '<td>'.$v_support_description.'</td>';
	$v_dsp_tb_support .= '<td>'.$v_company_id.'</td>';
	$v_dsp_tb_support .= '<td>'.$v_location_id.'</td>';
	$v_dsp_tb_support .= '<td>'.$v_contact_id.'</td>';
	$v_dsp_tb_support .= '<td>'.$v_date_created.'</td>';
	$v_dsp_tb_support .= '<td>'.$v_username.'</td>';
	$v_dsp_tb_support .= '<td>'.$v_image_file.'</td>';
	$v_dsp_tb_support .= '</tr>';
}
$v_dsp_tb_support .= '</table>';
?>