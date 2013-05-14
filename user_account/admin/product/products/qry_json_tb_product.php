<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause = array();
$v_search_short_description = isset($_REQUEST['txt_search_short_description'])?$_REQUEST['txt_search_short_description']:'';
$v_search_product_sku = isset($_REQUEST['txt_search_product_sku'])?$_REQUEST['txt_search_product_sku']:'';
$v_search_company_id = isset($_REQUEST['txt_search_company_id'])?$_REQUEST['txt_search_company_id']:'0';
$v_quick_search = isset($_REQUEST['txt_quick_search'])?$_REQUEST['txt_quick_search']:'';
settype($v_search_company_id, 'int');
if($v_search_company_id>0) $arr_where_clause['company_id'] = $v_search_company_id;
if($v_search_product_sku!='' && $v_search_short_description!=''){
    $arr_where_clause['$or'] = array(array('product_sku'=>new MongoRegex('/'.$v_search_product_sku.'/i')), array('short_description'=>new MongoRegex('/'.$v_search_short_description.'/i')));
}else if($v_search_product_sku!='' && $v_search_short_description==''){
    $arr_where_clause['product_sku'] = new MongoRegex('/'.$v_search_product_sku.'/i');
}else if($v_search_product_sku=='' && $v_search_short_description!=''){
    $arr_where_clause['short_description'] = new MongoRegex('/'.$v_search_short_description.'/i');
}
$arr_product_tag = isset($_POST['txt_search_product_tag'])?$_POST['txt_search_product_tag']:array();
if(is_array($arr_product_tag)) $arr_product_tag = array();
if(count($arr_product_tag)>0) $arr_where_clause['tag'] = array('$in'=>$arr_product_tag);

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
if(isset($_SESSION['ss_tb_product_redirect']) && $_SESSION['ss_tb_product_redirect']==1){
    if(isset($_SESSION['ss_tb_product_where_clause'])){
        $arr_where_clause = unserialize($_SESSION['ss_tb_product_where_clause']);
        if(!is_array($arr_where_clause)) $arr_where_clause = array();
    }
    if(isset($_SESSION['ss_tb_product_sort'])){
        $arr_sort = unserialize($_SESSION['ss_tb_product_sort']);
        if(!is_array($arr_sort)) $arr_sort = array();
    }
    unset($_SESSION['ss_tb_product_redirect']);
}
settype($v_page, 'int');
settype($v_page_size, 'int');
$v_total_rows = $cls_tb_product->count($arr_where_clause);
if($v_page<1) $v_page = 1;

if($v_page_size<10) $v_page_size = 10;
$v_total_pages = ceil($v_total_rows/$v_page_size);
$v_skip = ($v_page - 1) * $v_page_size;

$_SESSION['ss_tb_product_where_clause'] = serialize($arr_where_clause);
$_SESSION['ss_tb_product_sort'] = serialize($arr_sort);
$_SESSION['ss_tb_product_page'] = $v_page;
$_SESSION['ss_tb_product_quick_search'] = $v_quick_search;
//End pagination
$arr_tb_product = $cls_tb_product->select_limit($v_skip, $v_page_size, $arr_where_clause, $arr_sort);
$arr_ret_data = array();
$v_row = $v_skip;
add_class('cls_tb_tag');
$cls_tag = new cls_tb_tag($db, LOG_DIR);
$arr_company = array();
$arr_package_type = array();
$arr_status = array();
foreach($arr_tb_product as $arr){
	$v_product_id = isset($arr['product_id'])?$arr['product_id']:0;
	$v_product_sku = isset($arr['product_sku'])?$arr['product_sku']:'0';
	$v_short_description = isset($arr['short_description'])?$arr['short_description']:'';
	$v_long_description = isset($arr['long_description'])?$arr['long_description']:'';
	$v_product_detail = isset($arr['product_detail'])?$arr['product_detail']:'';
	$v_size_option = isset($arr['size_option'])?$arr['size_option']:0;
	$v_size_unit = isset($arr['size_unit'])?$arr['size_unit']:'0';
	$v_image_option = isset($arr['image_option'])?$arr['image_option']:0;
	$v_num_images = isset($arr['num_images'])?$arr['num_images']:0;
	$v_package_quantity = isset($arr['package_quantity'])?$arr['package_quantity']:1;
	$v_allow_single = isset($arr['allow_single'])?$arr['allow_single']:1;
	$v_package_type = isset($arr['package_type'])?$arr['package_type']:0;
	$v_image_file = isset($arr['image_file'])?$arr['image_file']:'';
	$v_image_desc = isset($arr['image_desc'])?$arr['image_desc']:'';
	$v_image_choose = isset($arr['image_choose'])?$arr['image_choose']:0;
	$v_saved_dir = isset($arr['saved_dir'])?$arr['saved_dir']:'';
	$v_text_option = isset($arr['text_option'])?$arr['text_option']:0;
	$v_sold_by = isset($arr['sold_by'])?$arr['sold_by']:'';
	$v_default_price = isset($arr['default_price'])?$arr['default_price']:0;
	$v_product_status = isset($arr['product_status'])?$arr['product_status']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_product_note = isset($arr['product_note'])?$arr['product_note']:'';
	$v_product_threshold = isset($arr['product_threshold'])?$arr['product_threshold']:-1;
	$v_product_threshold_group_id = isset($arr['product_threshold_group_id'])?$arr['product_threshold_group_id']:0;
	$v_excluded_location = isset($arr['excluded_location'])?$arr['excluded_location']:'';
	$v_file_hd = isset($arr['file_hd'])?$arr['file_hd']:'';
	$v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
	$v_user_type = isset($arr['user_type'])?$arr['user_type']:0;
	$v_date_created = isset($arr['date_created'])?$arr['date_created']:(new MongoDate(time()));

    $arr_tag = isset($arr['tag'])?$arr['tag']:array();
    if(!is_array($arr_tag)) $arr_tag = array();
    $v_product_tag = '';
    if(sizeof($arr_tag)>0){
        $arr_get_tag = $cls_tag->select(array('tag_id'=>array('$in'=>$arr_tag)));
        foreach($arr_get_tag as $arr_get){
            $v_tag_name = isset($arr_get['tag_name'])?$arr_get['tag_name']:'';
            if($v_tag_name!='') $v_product_tag .= $v_tag_name.', ';
        }
        if($v_product_tag!=''){
            $v_product_tag = substr($v_product_tag,0, strlen($v_product_tag)-2);
        }
    }

    if(!isset($arr_company[$v_company_id])) $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name', array('company_id'=> (int)$v_company_id));
    $v_company_name = $arr_company[$v_company_id];
    if(!isset($arr_package_type[$v_package_type])) $arr_package_type[$v_package_type] = $cls_settings->get_option_name_by_id('package_type', $v_package_type);
    $v_package_name = $arr_package_type[$v_package_type];
    if(!isset($arr_status[$v_product_status])) $arr_status[$v_product_status] = $cls_settings->get_option_name_by_id('product_status', $v_product_status);
    $v_status = $arr_status[$v_product_status];

	$arr_ret_data[] = array(
		'row_order'=>++$v_row,
		'product_id' => $v_product_id,
		'product_sku' => $v_product_sku,
		'short_description' => $v_short_description,
		'package_type' => $v_package_name,
		'image_url' => $v_saved_dir. $v_image_file,
		'product_status' => $v_status,
		'company_name' => $v_company_name,
        'product_tag' => $v_product_tag
	);
}
header("Content-type: application/json");
$arr_return = array('total_rows'=>$v_total_rows, 'tb_product'=>$arr_ret_data);
echo json_encode($arr_return);
?>