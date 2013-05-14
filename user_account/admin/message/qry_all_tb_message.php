<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_message->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_message = $cls_tb_message->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_message = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_message .= '<tr align="center" valign="middle">';
$v_dsp_tb_message .= '<th></th>';
$v_dsp_tb_message .= '<th>Message Value</th>';
$v_dsp_tb_message .= '<th>Message Type</th>';
$v_dsp_tb_message .= '<th>Message Key</th>';
$v_dsp_tb_message .= '<th>&nbsp;</th>';
$v_dsp_tb_message .= '</tr>';
$v_count = 1;
$arr_message_type = array();

foreach($arr_tb_message as $arr){
	$v_mongo_id = $cls_tb_message->get_mongo_id();
	$v_message_id = isset($arr['message_id'])?$arr['message_id']:0;
	$v_message_type = isset($arr['message_type'])?$arr['message_type']:'';
	$v_message_key = isset($arr['message_key'])?$arr['message_key']:'';
	$v_message_value = isset($arr['message_value'])?$arr['message_value']:'';
	$v_message_order = isset($arr['message_order'])?$arr['message_order']:'';


    if(!isset($arr_message_type[$v_message_type]))
        $arr_message_type[$v_message_type] = $cls_settings->get_option_name_by_id('message_type',$v_message_type);

    $v_dsp_tb_message .= '<tr align="left" valign="middle">';
	$v_dsp_tb_message .= '<td align="right">'.($v_count++).'</td>';
    $v_dsp_tb_message .= '<td>'.$v_message_value.'</td>';
    $v_dsp_tb_message .= '<td>'.$arr_message_type[$v_message_type].'</td>';
	$v_dsp_tb_message .= '<td>'.$v_message_key.'</td>';
	$v_dsp_tb_message .= '<td align="center">
                                <a href="'.URL.$v_admin_key.'/'.$v_message_id.'/edit">Edit</a> |
                                <a class="confirm" href="'.URL.$v_admin_key.'/'.$v_message_id.'/delete">Delete</a>
                            </td>';
	$v_dsp_tb_message .= '</tr>';
}
$v_dsp_tb_message .= '</table>';
?>