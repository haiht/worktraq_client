<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_company->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;

$v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");

$arr_tb_company = $cls_tb_company->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_company = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="1" align="center">';
$v_dsp_tb_company .= '<tr align="center" valign="middle">';
$v_dsp_tb_company .= '<th></th>';
$v_dsp_tb_company .= '<th>Company Name</th>';
$v_dsp_tb_company .= '<th>Company Code</th>';
$v_dsp_tb_company .= '<th>Relationship</th>';
$v_dsp_tb_company .= '<th>Bussines Type</th>';
$v_dsp_tb_company .= '<th>Industry</th>';
$v_dsp_tb_company .= '<th>Action</th>';
$v_dsp_tb_company .= '</tr>';
$v_count = $v_offset+1;
$arr_relationship = array();
$arr_bussines_type = array();
$arr_industry = array();
foreach($arr_tb_company as $arr){
	$v_mongo_id = isset($arr['_id'])?$arr['_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_company_name = isset($arr['company_name'])?$arr['company_name']:'';
	$v_company_code = isset($arr['company_code'])?$arr['company_code']:'';
	$v_relationship = isset($arr['relationship'])?$arr['relationship']:'0';
	$v_bussines_type = isset($arr['bussines_type'])?$arr['bussines_type']:'';
	$v_industry = isset($arr['industry'])?$arr['industry']:'';
	$v_website = isset($arr['website'])?$arr['website']:'';
	$v_status = isset($arr['status'])?$arr['status']:'';
	$v_logo_file = isset($arr['logo_file'])?$arr['logo_file']:'';

    if(!isset($arr_relationship[$v_relationship]))
        $arr_relationship[$v_relationship] = $cls_settings->get_option_name_by_id('relationship',$v_relationship);

    if(!isset($arr_bussines_type[$v_bussines_type]))
        $arr_bussines_type[$v_bussines_type] = $cls_settings->get_option_name_by_id('bussiness_type',$v_bussines_type);

    if(!isset($arr_industry[$v_industry]))
        $arr_industry[$v_industry] = $cls_settings->get_option_name_by_id('industry',$v_industry);

	$v_dsp_tb_company .= '<tr align="left" valign="middle">';
	$v_dsp_tb_company .= '<td align="right">'.($v_count++).'</td>';
    $v_dsp_tb_company .= '<td><a rel="showdetails" href="'.URL.$v_admin_key.'/'.$v_company_id.'/details">'.$v_company_name.'</a></td>';
	$v_dsp_tb_company .= '<td>'.$v_company_code.'</td>';
	$v_dsp_tb_company .= '<td>'.$arr_relationship[$v_relationship]  .'</td>';
	$v_dsp_tb_company .= '<td>'.$arr_bussines_type[$v_bussines_type] .'</td>';
	$v_dsp_tb_company .= '<td>'.$arr_industry[$v_industry].'</td>';

	$v_dsp_tb_company .= '<td align="center">
	                            <a href="'.URL.'admin/company/location/add/'.$v_company_id.'">Add Location</a> |
	                            <a href="'.URL.$v_admin_key.'/'.$v_company_id. ($v_page==1?'':'/page'.$v_page).'"> Edit </a> |
	                            <a href="'.URL.$v_admin_key.'/'.$v_company_id.'/modules"> Modules </a> |';
    if($v_per_delete==1)
        $v_dsp_tb_company .= '<a onclick="{return confirm(\'Do you want to remove '.$v_company_name . '\')}"  href="'.URL.$v_admin_key.'/'.$v_company_id.'/delete">Delete</a>';

    $v_dsp_tb_company .= '</td></tr>';
}
$v_dsp_tb_company .= '</table>';
?>