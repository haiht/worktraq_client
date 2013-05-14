<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_full_name = isset($_POST['txt_search_full_name'])?$_POST['txt_search_full_name']:'';

settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;
if($v_search_full_name!='') $arr_where_clause['$where'] = "(this.first_name+(this.middle_name!=''?' ':'')+this.middle_name+(this.last_name!=''?' ':'')+this.last_name).toLowerCase().indexOf('".strtolower($v_search_full_name)."') >=0";
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
if(isset($_SESSION['ss_tb_contact_redirect']) && $_SESSION['ss_tb_contact_redirect']==1){
	if(isset($_SESSION['ss_tb_contact_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_contact_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_contact_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_contact_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_contact_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_contact->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_contact_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_contact_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_contact_page'] = $v_page;
$_SESSION['ss_tb_contact_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_contact = $cls_tb_contact->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;

$arr_company = array();
$arr_location = array();
foreach($arr_tb_contact as $arr){
	$v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_contact_type = isset($arr['contact_type'])?$arr['contact_type']:0;
	$v_first_name = isset($arr['first_name'])?$arr['first_name']:'';
	$v_last_name = isset($arr['last_name'])?$arr['last_name']:'';
	$v_middle_name = isset($arr['middle_name'])?$arr['middle_name']:'';
	$v_birth_date = isset($arr['birth_date'])?$arr['birth_date']:(new MongoDate(time()));
	$v_address_type = isset($arr['address_type'])?$arr['address_type']:0;
	$v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
	$v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
	$v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
	$v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
	$v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
	$v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
	$v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
	$v_address_country = isset($arr['address_country'])?$arr['address_country']:0;
	$v_direct_phone = isset($arr['direct_phone'])?$arr['direct_phone']:'';
	$v_mobile_phone = isset($arr['mobile_phone'])?$arr['mobile_phone']:'';
	$v_fax_number = isset($arr['fax_number'])?$arr['fax_number']:'';
	$v_home_phone = isset($arr['home_phone'])?$arr['home_phone']:'';
	$v_email = isset($arr['email'])?$arr['email']:'';
	$v_user_id = isset($arr['user_id'])?$arr['user_id']:0;
    if(!isset($arr_company[$v_company_id])) $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
    if(!isset($arr_location[$v_location_id])) $arr_location[$v_location_id] = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id));

    $v_dsp_address = (trim($v_address_unit)!=''?trim($v_address_unit) .', ':'') . (trim($v_address_line_1)!=''?trim($v_address_line_1).', ' :'');
    $v_dsp_address .= (trim($v_address_line_2)!=''?trim($v_address_line_2). ', ' :'');
    $v_dsp_address .= (trim($v_address_line_3)!=''?trim($v_address_line_3).', ' :'');
    $v_dsp_address .= (trim($v_address_city)!=''?trim($v_address_city) .', ':'') . (trim($v_address_province)!=''?trim($v_address_province) .', ':'') .(trim($v_address_postal)!=''?trim($v_address_postal).', ':'');

    $v_dsp_address = trim($v_dsp_address);
    if($v_dsp_address!=''){
        if(substr($v_dsp_address, strlen($v_dsp_address)-1)==',') $v_dsp_address = substr($v_dsp_address,0,strlen($v_dsp_address)-1);
    }
    $v_full_name = trim($v_first_name).(trim($v_first_name)!=''?' ':'').trim($v_middle_name).(trim($v_middle_name)!=''?' ':'').trim($v_last_name);
	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'contact_id' => $v_contact_id,
		'location_name' => $arr_location[$v_location_id],
		'company_name' => $arr_company[$v_company_id],
		'contact_type' => $cls_settings->get_option_name_by_id('contact_type', $v_contact_type),
		'full_name' => $v_full_name,
		'birth_date' => date('d-M-Y',$v_birth_date->sec),
		'address' => $v_dsp_address,
		'direct_phone' => $v_direct_phone,
		'mobile_phone' => $v_mobile_phone,
		'fax_number' => $v_fax_number,
		'home_phone' => $v_home_phone,
		'email' => $v_email
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_contact'=>$arr_ret_data);
echo json_encode($arr_return);
?>