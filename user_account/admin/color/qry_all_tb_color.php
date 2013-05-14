<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:ADMIN_ROWS_ONE_PAGE;
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?ADMIN_ROWS_ONE_PAGE:$v_num_row;


$arr_where_clause = array();
$v_total_row = $cls_tb_color->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");

$arr_tb_color = $cls_tb_color->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_color = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_color .= '<tr align="center" valign="middle">';
$v_dsp_tb_color .= '<th>Ord</th>';
$v_dsp_tb_color .= '<th>Color Name</th>';
$v_dsp_tb_color .= '<th>Color Code Hex</th>';
$v_dsp_tb_color .= '<th>Color Code</th>';
$v_dsp_tb_color .= '<th>Color</th>';
$v_dsp_tb_color .= '<th>Status</th>';
$v_dsp_tb_color .= '<th>Action</th>';
$v_dsp_tb_color .= '</tr>';
$v_count = 1;
$v_row = $v_offset+1;

foreach($arr_tb_color as $arr){
	$v_mongo_id = $cls_tb_color->get_mongo_id();
	$v_color_id = isset($arr['color_id'])?$arr['color_id']:0;
	$v_color_name = isset($arr['color_name'])?$arr['color_name']:'0';
	$v_color_code_hex = isset($arr['color_code_hex'])?$arr['color_code_hex']:'';
    $v_color_code = isset($arr['color_code'])?$arr['color_code']:'';
    $v_color_status = isset($arr['color_status'])?$arr['color_status']:0;
    settype($v_color_status, 'int');
    $v_color_status = $v_color_status==0?'Active':'Inactive';
	$v_dsp_tb_color .= '<tr align="left" valign="middle">';
	$v_dsp_tb_color .= '<td align="right">'.($v_row++).'</td>';
	$v_dsp_tb_color .= '<td>'.$v_color_name.'</td>';
	$v_dsp_tb_color .= '<td>'.$v_color_code_hex.'</td>';
    $v_dsp_tb_color .= '<td>'.$v_color_code.'</td>';
    $v_dsp_tb_color .= '<td bgcolor="'.$v_color_code_hex.'">'.$v_color_code_hex.'</td>';
    $v_dsp_tb_color .= '<td>'.$v_color_status.'</td>';
	$v_dsp_tb_color .= '<td align="center">
	                        <a href="'. URL .$v_admin_key.'/'.$v_color_id .'">Edit</a> |
	                        <a onclick="{return confirm(\'Do you want to remove '.$v_color_name  . '\')}" href="'. URL .$v_admin_key.'/'.$v_color_id .'/delete">Delete</a></td>';
	$v_dsp_tb_color .= '</tr>';
}
$v_dsp_tb_color .= '</table>';
?>