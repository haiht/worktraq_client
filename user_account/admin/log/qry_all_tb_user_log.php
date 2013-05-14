<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_user_log->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_user_log = $cls_tb_user_log->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_user_log = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");

$v_dsp_tb_user_log .= '<tr align="center" valign="middle">';
$v_dsp_tb_user_log .= '<th>Ord</th>';
$v_dsp_tb_user_log .= '<th>User Name</th>';
$v_dsp_tb_user_log .= '<th>IP address</th>';
$v_dsp_tb_user_log .= '<th>URL</th>';
$v_dsp_tb_user_log .= '<th>Datetime</th>';
$v_dsp_tb_user_log .= '</tr>';
$v_count = 1;

foreach($arr_tb_user_log as $arr){
	$v_mongo_id = $cls_tb_user_log->get_mongo_id();
	$v_log_id = isset($arr['log_id'])?$arr['log_id']:0;
	$v_user_id = isset($arr['user_id'])?$arr['user_id']:0;
	$v_user_password = isset($arr['user_password'])?$arr['user_password']:'';
	$v_log_ipaddress = isset($arr['log_ipaddress'])?$arr['log_ipaddress']:'';
	$v_log_url = isset($arr['log_url'])?$arr['log_url']:'';
	$v_log_datetime = isset($arr['log_datetime'])?date('Y-m-d H:i:s',$arr['log_datetime']->sec):date('Y-m-d H:i:s', time());

	$v_dsp_tb_user_log .= '<tr align="left" valign="middle">';
	$v_dsp_tb_user_log .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_user_log .= '<td>'.$v_user_id.'</td>';
	$v_dsp_tb_user_log .= '<td>'.$v_log_ipaddress.'</td>';
	$v_dsp_tb_user_log .= '<td>'.$v_log_url.'</td>';
	$v_dsp_tb_user_log .= '<td>'.$v_log_datetime.'</td>';
	$v_dsp_tb_user_log .= '</tr>';
}
$v_dsp_tb_user_log .= '</table>';
?>