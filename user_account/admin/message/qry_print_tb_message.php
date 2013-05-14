<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_message_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_message_sort'])){
	$v_sort = $_SESSION['ss_tb_message_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_message = $cls_tb_message->select($arr_where_clause, $arr_sort);
$v_dsp_tb_message = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_message .= '<tr align="center" valign="middle">';
$v_dsp_tb_message .= '<th>Ord</th>';
$v_dsp_tb_message .= '<th>Message Id</th>';
$v_dsp_tb_message .= '<th>Message Type</th>';
$v_dsp_tb_message .= '<th>Message Key</th>';
$v_dsp_tb_message .= '<th>Message Value</th>';
$v_dsp_tb_message .= '<th>Message Order</th>';
$v_dsp_tb_message .= '</tr>';
$v_count = 1;
foreach($arr_tb_message as $arr){
	$v_dsp_tb_message .= '<tr align="left" valign="middle">';
	$v_dsp_tb_message .= '<td align="right">'.($v_count++).'</td>';
	$v_message_id = isset($arr['message_id'])?$arr['message_id']:0;
	$v_message_type = isset($arr['message_type'])?$arr['message_type']:0;
	$v_message_key = isset($arr['message_key'])?$arr['message_key']:'';
	$v_message_value = isset($arr['message_value'])?$arr['message_value']:'';
	$v_message_order = isset($arr['message_order'])?$arr['message_order']:'';
	$v_dsp_tb_message .= '<td>'.$v_message_id.'</td>';
	$v_dsp_tb_message .= '<td>'.$v_message_type.'</td>';
	$v_dsp_tb_message .= '<td>'.$v_message_key.'</td>';
	$v_dsp_tb_message .= '<td>'.$v_message_value.'</td>';
	$v_dsp_tb_message .= '<td>'.$v_message_order.'</td>';
	$v_dsp_tb_message .= '</tr>';
}
$v_dsp_tb_message .= '</table>';
?>