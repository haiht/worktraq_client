<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_product_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_product_sort'])){
	$v_sort = $_SESSION['ss_tb_product_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_product = $cls_tb_product->select($arr_where_clause, $arr_sort);
$v_dsp_tb_product = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_product .= '<tr align="center" valign="middle">';
$v_dsp_tb_product .= '<th>Ord</th>';
$v_dsp_tb_product .= '<th>Product Sku</th>';
$v_dsp_tb_product .= '<th>Short Description</th>';
$v_dsp_tb_product .= '<th>Size Option</th>';
$v_dsp_tb_product .= '<th>Image Option</th>';
$v_dsp_tb_product .= '<th>Image File</th>';
$v_dsp_tb_product .= '<th>Text Option</th>';
$v_dsp_tb_product .= '<th>Sold By</th>';
$v_dsp_tb_product .= '<th>Default Price</th>';
$v_dsp_tb_product .= '<th>Product Status</th>';
$v_dsp_tb_product .= '<th>Company</th>';
$v_dsp_tb_product .= '<th>Location</th>';
$v_dsp_tb_product .= '<th>Product Threshold</th>';
$v_dsp_tb_product .= '<th>Created User</th>';
$v_dsp_tb_product .= '<th>Created Date</th>';
$v_dsp_tb_product .= '</tr>';
$v_count = 1;
foreach($arr_tb_product as $arr){
	$v_dsp_tb_product .= '<tr align="left" valign="middle">';
	$v_dsp_tb_product .= '<td align="right">'.($v_count++).'</td>';
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
	$v_dsp_tb_product .= '<td>'.$v_product_sku.'</td>';
	$v_dsp_tb_product .= '<td>'.$v_short_description.'</td>';
	$v_dsp_tb_product .= '<td>'.($v_size_option==1?'Custom':'&nbsp;').'</td>';
	$v_dsp_tb_product .= '<td>'.($v_image_option==1?'Custom':'').'</td>';
	$v_dsp_tb_product .= '<td>'.$v_image_file.'&nbsp;</td>';
	$v_dsp_tb_product .= '<td>'.($v_text_option==1?'Custom':'').'</td>';
	$v_dsp_tb_product .= '<td>'.$cls_settings->get_option_name_by_id('sold_by',$v_sold_by).'</td>';
	$v_dsp_tb_product .= '<td align="right">'.number_format($v_default_price).'</td>';
	$v_dsp_tb_product .= '<td>'.$cls_settings->get_option_name_by_id('product_status',$v_product_status).'</td>';
	$v_dsp_tb_product .= '<td>'.$cls_tb_company->select_scalar('company_name',array('company_id'=>$v_company_id)).'</td>';
	$v_dsp_tb_product .= '<td>'.$cls_tb_location->select_scalar('location_name',array('location_id'=>$v_location_id)).'</td>';
	$v_dsp_tb_product .= '<td align="right">'.($v_product_threshold<0?'---':$v_product_threshold).'</td>';
	$v_dsp_tb_product .= '<td>'.$v_user_name.'</td>';
	$v_dsp_tb_product .= '<td>'.date('d-M-Y',$v_date_created->sec).'</td>';
	$v_dsp_tb_product .= '</tr>';
}
$v_dsp_tb_product .= '</table>';
?>