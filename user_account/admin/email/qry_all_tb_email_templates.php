<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_email_templates->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_email_templates = $cls_tb_email_templates->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_email_templates = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_email_templates .= '<tr align="center" valign="middle">';
$v_dsp_tb_email_templates .= '<th>Ord</th>';
$v_dsp_tb_email_templates .= '<th>Email Key</th>';
$v_dsp_tb_email_templates .= '<th>Email File</th>';
$v_dsp_tb_email_templates .= '<th>Email Data</th>';
$v_dsp_tb_email_templates .= '<th>Email Type</th>';
$v_dsp_tb_email_templates .= '<th>Description</th>';
$v_dsp_tb_email_templates .= '<th>&nbsp;</th>';
$v_dsp_tb_email_templates .= '</tr>';
$v_count = 1;
$arr_email_type  = array();
foreach($arr_tb_email_templates as $arr){
	$v_mongo_id = $cls_tb_email_templates->get_mongo_id();
	$v_email_id = isset($arr['email_id'])?$arr['email_id']:0;
	$v_email_key = isset($arr['email_key'])?$arr['email_key']:'';
	$v_email_file = isset($arr['email_file'])?$arr['email_file']:'';
	$v_email_data = isset($arr['email_data'])?$arr['email_data']:'';
	$v_email_type = isset($arr['email_type'])?$arr['email_type']:0;
	$v_description = isset($arr['description'])?$arr['description']:'';

    $v_dps_email = '';
    if(!isset($arr_email_type[$v_email_type]))
        $arr_email_type[$v_email_type] = $cls_settings->get_option_name_by_id('email_type',$v_email_type);

	$v_dsp_tb_email_templates .= '<tr align="left" valign="middle">';
	$v_dsp_tb_email_templates .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_email_templates .= '<td>'.$v_email_key.'</td>';

    if($v_email_file!=''){
        $v_dps_email = '<a rel="showdetails" href="'.URL.$v_admin_key.'/'.$v_email_id.'/details">' .  $v_email_file .'</a>';
    }

	$v_dsp_tb_email_templates .= '<td>'.$v_dps_email.'</td>';
	$v_dsp_tb_email_templates .= '<td>'.$v_email_data.'</td>';
	$v_dsp_tb_email_templates .= '<td>'. $arr_email_type[$v_email_type].'</td>';
	$v_dsp_tb_email_templates .= '<td>'.$v_description.'</td>';
	$v_dsp_tb_email_templates .= '<td align="center"><a href="'.URL.$v_admin_key.'/'.$v_email_id.'/edit">Edit</a> | <a class="confirm" href="'.URL.$v_admin_key.'/'.$v_email_id.'/delete">Delete</a></td>';
	$v_dsp_tb_email_templates .= '</tr>';
}
$v_dsp_tb_email_templates .= '</table>';
?>