<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
//Sort
$arr_temp = isset($_REQUEST['sort'])?$_REQUEST['sort']:array();
$arr_sort = array();
if(is_array($arr_temp) && count($arr_temp)>0){
	for($i=0; $i<count($arr_temp); $i++){
		$arr_sort[$arr_temp[$i]['field']] = $arr_temp[$i]['dir']=='asc'?1:-1;
	}
}
if(!is_array($arr_sort)) $arr_sort = array();
//Start pagination
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:1;
$v_page_size = isset($_REQUEST['pageSize'])?$_REQUEST['pageSize']:10;
if(isset($_SESSION['ss_tb_company_redirect']) && $_SESSION['ss_tb_company_redirect']==1){
	if(isset($_SESSION['ss_tb_company_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_company_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_company_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_company_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_company_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_company->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_company_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_company_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_company_page'] = $v_page;
$_SESSION['ss_tb_company_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_company = $cls_tb_company->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
foreach($arr_tb_company as $arr){
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
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'company_id' => $v_company_id,
		'company_name' => $v_company_name,
		'company_code' => $v_company_code,
		'email_sales_rep' => $v_email_sales_rep,
		'relationship' => $cls_settings->get_option_name_by_id('relationship',$v_relationship),
		'logo_file' => $v_logo_file,
		'modules' => $v_modules,
		'crs_id' => $v_crs_id,
		'sales_rep_id' => $v_sales_rep_id,
		'bussines_type' => $cls_settings->get_option_name_by_id('bussiness_type',(int)$v_bussines_type),
		'industry' => $cls_settings->get_option_name_by_id('industry',$v_industry),
		'website' => is_valid_url($v_website)?'<a class="a-link" href="'.$v_website.'" target="_blank">'.$v_website.'</a>':'',
		'status' => $v_status
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_company'=>$arr_ret_data);
echo json_encode($arr_return);
?>