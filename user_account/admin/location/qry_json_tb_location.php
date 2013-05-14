<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_location_name = isset($_POST['txt_search_location_name'])?$_POST['txt_search_location_name']:'';
$v_search_location_number = isset($_POST['txt_search_location_number'])?$_POST['txt_search_location_number']:'';

settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
$arr_tmp = array();
if($v_search_location_name!='') $arr_tmp[] = array('location_name'=>new MongoRegex('/'.$v_search_location_name.'/i'));
if($v_search_location_number!='') $arr_tmp[] = array('$where'=>"(this.location_number+'').indexOf('".$v_search_location_number."')>=0");
if(count($arr_tmp)>1)
    $arr_where_clause['$or'] = $arr_tmp;
else if(count($arr_tmp)==1){
    $arr_temp = $arr_tmp[0];
    foreach($arr_temp as $key=>$value)
        $arr_where_clause[$key] = $value;
}
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
if(isset($_SESSION['ss_tb_location_redirect']) && $_SESSION['ss_tb_location_redirect']==1){
	if(isset($_SESSION['ss_tb_location_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_location_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_location_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_location_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_location_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_location->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_location_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_location_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_location_page'] = $v_page;
$_SESSION['ss_tb_location_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_location = $cls_tb_location->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
$arr_company = array();

foreach($arr_tb_location as $arr){
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_region_id = isset($arr['location_region'])?$arr['location_region']:0;
	$v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
	$v_location_type = isset($arr['location_type'])?$arr['location_type']:0;
	$v_location_number = isset($arr['location_number'])?$arr['location_number']:0;
	$v_main_contact = isset($arr['main_contact'])?$arr['main_contact']:0;
	$v_approved_contact = isset($arr['approved_contact'])?$arr['approved_contact']:0;
	$v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
	$v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
	$v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
	$v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
	$v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
	$v_address_province = isset($arr['address_province'])?$arr['address_province']:0;
	$v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
	$v_address_country = isset($arr['address_country'])?$arr['address_country']:0;
	$v_open_date = isset($arr['open_date'])?$arr['open_date']:(new MongoDate(time()));
	$v_close_date = isset($arr['close_date'])?$arr['close_date']:(new MongoDate(time()));
	$v_status = isset($arr['status'])?$arr['status']:'0';

    if(!isset($arr_company[$v_company_id])) $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));

    $v_dsp_address = (trim($v_address_unit)!=''?trim($v_address_unit) .', ':'') . (trim($v_address_line_1)!=''?trim($v_address_line_1).', ' :'');
    $v_dsp_address .= (trim($v_address_line_2)!=''?trim($v_address_line_2). ', ' :'');
    $v_dsp_address .= (trim($v_address_line_3)!=''?trim($v_address_line_3).', ' :'');
    $v_dsp_address .= (trim($v_address_city)!=''?trim($v_address_city) .', ':'') . (trim($v_address_province)!=''?trim($v_address_province) .', ':'') .(trim($v_address_postal)!=''?trim($v_address_postal).', ':'');

    $v_dsp_address = trim($v_dsp_address);
    if($v_dsp_address!=''){
        if(substr($v_dsp_address, strlen($v_dsp_address)-1)==',') $v_dsp_address = substr($v_dsp_address,0,strlen($v_dsp_address)-1);
    }

	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'location_id' => $v_location_id,
		'location_name' => $v_location_name,
		'company_name' => $arr_company[$v_company_id],
		'location_number' => $v_location_number,
        'region_name' => $v_region_id>0?$cls_tb_region->select_scalar('region_name', array('region_id'=>$v_region_id)):'',
		'main_contact' => $v_main_contact>0?$cls_tb_contact->get_full_name_contact($v_main_contact):'',
		'approved_contact' => $v_approved_contact>0?$cls_tb_contact->get_full_name_contact($v_approved_contact):'',
		'address' => $v_dsp_address,
		'status' => $cls_settings->get_option_name_by_id('location_status',$v_status)
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_location'=>$arr_ret_data);
echo json_encode($arr_return);
?>