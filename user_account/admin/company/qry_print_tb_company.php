<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_company_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_company_sort'])){
	$v_sort = $_SESSION['ss_tb_company_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_company = $cls_tb_company->select($arr_where_clause, $arr_sort);
$v_dsp_tb_company = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_company .= '<tr align="center" valign="middle">';
$v_dsp_tb_company .= '<th>Ord</th>';
$v_dsp_tb_company .= '<th>Company Id</th>';
$v_dsp_tb_company .= '<th>Company Name</th>';
$v_dsp_tb_company .= '<th>Company Code</th>';
$v_dsp_tb_company .= '<th>Email Sales Rep</th>';
$v_dsp_tb_company .= '<th>Relationship</th>';
$v_dsp_tb_company .= '<th>Logo File</th>';
$v_dsp_tb_company .= '<th>Modules</th>';
$v_dsp_tb_company .= '<th>Crs Id</th>';
$v_dsp_tb_company .= '<th>Sales Rep Id</th>';
$v_dsp_tb_company .= '<th>Bussines Type</th>';
$v_dsp_tb_company .= '<th>Industry</th>';
$v_dsp_tb_company .= '<th>Website</th>';
$v_dsp_tb_company .= '<th>Status</th>';
$v_dsp_tb_company .= '</tr>';
$v_count = 1;
foreach($arr_tb_company as $arr){
	$v_dsp_tb_company .= '<tr align="left" valign="middle">';
	$v_dsp_tb_company .= '<td align="right">'.($v_count++).'</td>';
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_company_name = isset($arr['company_name'])?$arr['company_name']:'';
	$v_company_code = isset($arr['company_code'])?$arr['company_code']:'';
	$v_email_sales_rep = isset($arr['email_sales_rep'])?$arr['email_sales_rep']:'';
	$v_relationship = isset($arr['relationship'])?$arr['relationship']:0;
	$v_logo_file = isset($arr['logo_file'])?$arr['logo_file']:'';
	$v_modules = isset($arr['modules'])?$arr['modules']:'';
	$v_crs_id = isset($arr['crs_id'])?$arr['crs_id']:0;
	$v_sales_rep_id = isset($arr['sales_rep_id'])?$arr['sales_rep_id']:0;
	$v_bussines_type = isset($arr['bussines_type'])?$arr['bussines_type']:0;
	$v_industry = isset($arr['industry'])?$arr['industry']:0;
	$v_website = isset($arr['website'])?$arr['website']:'';
	$v_status = isset($arr['status'])?$arr['status']:'0';
	$v_dsp_tb_company .= '<td>'.$v_company_id.'</td>';
	$v_dsp_tb_company .= '<td>'.$v_company_name.'</td>';
	$v_dsp_tb_company .= '<td>'.$v_company_code.'</td>';
	$v_dsp_tb_company .= '<td>'.$v_email_sales_rep.'</td>';
	$v_dsp_tb_company .= '<td>'.$v_relationship.'</td>';
	$v_dsp_tb_company .= '<td>'.$v_logo_file.'</td>';
	$v_dsp_tb_company .= '<td>'.$v_modules.'</td>';
	$v_dsp_tb_company .= '<td>'.$v_crs_id.'</td>';
	$v_dsp_tb_company .= '<td>'.$v_sales_rep_id.'</td>';
	$v_dsp_tb_company .= '<td>'.$v_bussines_type.'</td>';
	$v_dsp_tb_company .= '<td>'.$v_industry.'</td>';
	$v_dsp_tb_company .= '<td>'.$v_website.'</td>';
	$v_dsp_tb_company .= '<td>'.$v_status.'</td>';
	$v_dsp_tb_company .= '</tr>';
}
$v_dsp_tb_company .= '</table>';
?>