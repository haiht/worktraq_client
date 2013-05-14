<?php if(!isset($v_sval)) die();?>
<?php

$arr_where_clause=array();
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:ADMIN_ROWS_ONE_PAGE;
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?ADMIN_ROWS_ONE_PAGE:$v_num_row;

$v_total_row  = $cls_all_settings->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;

$v_dsp_tb_location = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_tb_location .= '<tr align="center" valign="middle">';
$v_dsp_tb_location .= '<th></th>';
$v_dsp_tb_location .= '<th>Settings Name</th>';
$v_dsp_tb_location .= '<th>Descriptions</th>';
$v_dsp_tb_location .= '<th>Setting Type</th>';
$v_dsp_tb_location .= '<th>#</th>';
$v_dsp_tb_location .= '</tr>';
$v_count = $v_offset+1;

$arr_tb_setting = $cls_all_settings->select_data($arr_where_clause);

foreach($arr_tb_setting as $arr)
{
    $v_setting_id = isset($arr['setting_id']) ? $arr['setting_id'] : 0;
    $v_setting_name = isset($arr['setting_name']) ? $arr['setting_name'] : '';
    $v_setting_type = isset($arr['setting_type']) ? $arr['setting_type'] : 0;
    $v_setting_description = isset($arr['setting_description']) ? $arr['setting_description'] : '';

    $v_dsp_tb_location .='<tr>
                            <td width="30px">'.$v_count++.'</td>
                            <td>'.$arr['setting_name'].'</td>
                            <td>'.$v_setting_description.'</td>
                            <td>'.$arr_setting_type[$v_setting_type].'</td>
                            <td><a href="'.URL .$v_admin_key.'/'.$v_setting_id .'/edit'.'"> Edit </a> </td>
                        </tr>';
}
$v_dsp_tb_location .= '</table>';
?>