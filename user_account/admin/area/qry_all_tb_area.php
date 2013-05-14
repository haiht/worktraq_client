<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:ADMIN_ROWS_ONE_PAGE;
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?ADMIN_ROWS_ONE_PAGE:$v_num_row;

$arr_where_clause = array();
$v_total_row = $cls_tb_area->count($arr_where_clause);

$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;

$v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");

$arr_tb_area = $cls_tb_area->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_area = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_area .= '<tr align="center" valign="middle">';
$v_dsp_tb_area .= '<th>Ord</th>';
$v_dsp_tb_area .= '<th>Area Name</th>';
$v_dsp_tb_area .= '<th>Area Description</th>';
$v_dsp_tb_area .= '<th>Status</th>';
$v_dsp_tb_area .= '<th>Company</th>';
$v_dsp_tb_area .= '<th>Location</th>';
$v_dsp_tb_area .= '<th>&nbsp;</th>';
$v_dsp_tb_area .= '</tr>';
$v_count = 1;

foreach($arr_tb_area as $arr){
	$v_mongo_id = $cls_tb_area->get_mongo_id();
	$v_area_id = isset($arr['area_id'])?$arr['area_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_area_name = isset($arr['area_name'])?$arr['area_name']:'';
	$v_area_description = isset($arr['area_description'])?$arr['area_description']:'';
	$v_status = isset($arr['status'])?$arr['status']:0;
	$v_area_code = isset($arr['area_code'])?$arr['area_code']:'';
	$v_area_order = isset($arr['area_order'])?$arr['area_order']:0;

    $v_status = $v_status==0?'Active':'Inactive';
    $v_company_name = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
    $v_location_name = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id));

	$v_dsp_tb_area .= '<tr align="left" valign="middle">';
	$v_dsp_tb_area .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_area .= '<td>'.$v_area_name.'</td>';
	$v_dsp_tb_area .= '<td>'.$v_area_description.'</td>';
	$v_dsp_tb_area .= '<td>'.$v_status.'</td>';
    $v_dsp_tb_area .= '<td>'.$v_company_name.'</td>';
    $v_dsp_tb_area .= '<td>'.$v_location_name.'</td>';
	$v_dsp_tb_area .= '<td align="center"><a href="'.URL.$v_admin_key.'/'.$v_area_id.'/edit">Edit</a> | <a class="confirm" href="'.URL.$v_admin_key.'/'.$v_area_id.'/delete">Delete</a></td>';
	$v_dsp_tb_area .= '</tr>';
}
$v_dsp_tb_area .= '</table>';
?>