<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
$v_search_contact_name = isset($_POST['txt_search_contact_name'])?$_POST['txt_search_contact_name']:'';
$v_search_support_title = isset($_POST['txt_search_support_title'])?$_POST['txt_search_support_title']:'';
settype($v_company_id, 'int');
if($v_company_id > 0) $arr_where_clause['company_id'] = $v_company_id;

$arr_where = array();
if($v_search_support_title!='') $arr_where[] = array('support_title'=>new MongoRegex('/'.$v_search_support_title.'/i'));

if($v_search_contact_name!=''){
    $arr_tmp_where = array('$where'=>"(this.first_name+(this.middle_name!=''?' '+this.middle_name:'')+' '+this.last_name).toLowerCase().indexOf('".strtolower($v_search_contact_name)."')>=0");


    $arr_contact = $cls_tb_contact->select($arr_tmp_where);
    $arr_selected_contact = array();

    foreach($arr_contact as $arr){
        $v_contact_id = (int) $arr['contact_id'];
        $arr_selected_contact[] = $v_contact_id;
    }
    $arr_where[] = array('contact_id'=>array('$in'=>$arr_selected_contact));
}
if(count($arr_where)>1)
    $arr_where_clause['$or'] = $arr_where;
else if(count($arr_where)==1){
    foreach($arr_where as $key=>$value)
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
if(isset($_SESSION['ss_tb_support_redirect']) && $_SESSION['ss_tb_support_redirect']==1){
	if(isset($_SESSION['ss_tb_support_where_clause'])){
		$arr_where_clause = unserialize($_SESSION['ss_tb_support_where_clause']);
		if(!is_array($arr_where_clause)) $arr_where_clause = array();
	}
	if(isset($_SESSION['ss_tb_support_sort'])){
		$arr_sort = unserialize($_SESSION['ss_tb_support_sort']);
		if(!is_array($arr_sort)) $arr_sort = array();
	}
	unset($_SESSION['ss_tb_support_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_support->count($arr_where_clause);
if($v_page<1) $v_page = 1;
if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;
$_SESSION['ss_tb_support_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_support_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_support_page'] = $v_page;
$_SESSION['ss_tb_support_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_support = $cls_tb_support->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
$arr_company = array();
foreach($arr_tb_support as $arr){
	$v_support_id = isset($arr['support_id'])?$arr['support_id']:0;
	$v_support_title = isset($arr['support_title'])?$arr['support_title']:'';
	$v_support_description = isset($arr['support_description'])?$arr['support_description']:'';
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
	$v_date_created = isset($arr['date_created'])?$arr['date_created']:(new MongoDate(time()));
	$v_username = isset($arr['username'])?$arr['username']:'';
	$v_image_file = isset($arr['image_file'])?$arr['image_file']:'';
    if(!isset($arr_company[$v_company_id])) $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
    $v_contact = $cls_tb_contact->get_infomation_contact((int)$v_contact_id);
    $arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'support_id' => $v_support_id,
		'support_title' => $v_support_title,
		'support_description' => $v_support_description,
		'company_name' => $arr_company[$v_company_id],
		'location_id' => $v_location_id,
		'contact' => $v_contact,
		'date_created' => $v_date_created,
		'username' => $v_username,
		'image_file' => $v_image_file
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_support'=>$arr_ret_data);
echo json_encode($arr_return);
?>