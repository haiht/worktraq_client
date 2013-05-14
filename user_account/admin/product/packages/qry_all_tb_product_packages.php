<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:ADMIN_ROWS_ONE_PAGE;
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?ADMIN_ROWS_ONE_PAGE:$v_num_row;

$arr_where_clause = array('package_type'=>array('$gt'=>1));

$v_total_row = $cls_tb_product->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_product_packages = $cls_tb_product->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_product_packages = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_product_packages .= '<tr align="center" valign="middle">';
$v_dsp_tb_product_packages .= '<th>Ord</th>';
$v_dsp_tb_product_packages .= '<th>Package Name</th>';
$v_dsp_tb_product_packages .= '<th>Description</th>';
$v_dsp_tb_product_packages .= '<th>Package Image</th>';
$v_dsp_tb_product_packages .= '<th>Status</th>';
$v_dsp_tb_product_packages .= '<th>Package Type</th>';
$v_dsp_tb_product_packages .= '<th>Package Content</th>';
$v_dsp_tb_product_packages .= '<th>Price</th>';
$v_dsp_tb_product_packages .= '<th>&nbsp;</th>';
$v_dsp_tb_product_packages .= '</tr>';
$v_count = $v_offset+1;

$arr_settings = array();
foreach($arr_tb_product_packages as $arr){
	$v_mongo_id = $cls_tb_product->get_mongo_id();
	$v_package_id = isset($arr['product_id'])?$arr['product_id']:0;
	$v_package_name = isset($arr['product_sku'])?$arr['product_sku']:'';
	$v_description = isset($arr['short_description'])?$arr['short_description']:'';
	$v_package_image = isset($arr['image_file'])?$arr['image_file']:'';
	$v_saved_dir = isset($arr['saved_dir'])?$arr['saved_dir']:'';
	$v_status = isset($arr['status'])?$arr['status']:0;
	$v_package_type = isset($arr['package_type'])?$arr['package_type']:0;
	$arr_package_content = isset($arr['package_content'])?$arr['package_content']:array();
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
	$v_package_price = isset($arr['default_price'])?$arr['default_price']:0;

    $v_package_content = '';
    for($i=0; $i<count($arr_package_content); $i++){
        $v_name = $arr_package_content[$i]['package_name'];
        $v_type = $arr_package_content[$i]['package_type'];

        if(!isset($arr_settings[$v_type]))
            $arr_settings[$v_type] = $cls_settings->get_option_name_by_id('package_type', $v_type);
        $v_type = $arr_settings[$v_type];
        $v_quantity = $arr_package_content[$i]['quantity'];
        $v_price = $arr_package_content[$i]['price'];
        $v_package_content .= '<label>Name: '.$v_name.' - Type: '.$v_type.' - Quantity: '.$v_quantity.' - Price: '.$v_price;

        if($i<count($arr_package_content)-1) $v_package_content.='<br />';
    }

    if($v_package_image!='' && $v_saved_dir!='' && file_exists($v_saved_dir.'/'.$v_package_image))
        $v_package_image = '<img src="'.$v_saved_dir.'/'.PRODUCT_IMAGE_THUMB.'_'.$v_package_image.'" style="max-width: 200px;" />';
    else
        $v_package_image = '&nbsp;';
    $v_package_type = $cls_settings->get_option_name_by_id('package_type', $v_package_type);
    $v_status = $v_status==0?'Active':'Inactive';
	$v_date_created = isset($arr['date_created'])?date('Y-m-d H:i:s',$arr['date_created']->sec):date('Y-m-d H:i:s', time());
	$v_dsp_tb_product_packages .= '<tr align="left" valign="middle">';
	$v_dsp_tb_product_packages .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_product_packages .= '<td>'.$v_package_name.'</td>';
	$v_dsp_tb_product_packages .= '<td>'.$v_description.'</td>';
	$v_dsp_tb_product_packages .= '<td>'.$v_package_image.'</td>';
	$v_dsp_tb_product_packages .= '<td>'.$v_status.'</td>';
	$v_dsp_tb_product_packages .= '<td>'.$v_package_type.'</td>';
	$v_dsp_tb_product_packages .= '<td>'.$v_package_content.'</td>';
	$v_dsp_tb_product_packages .= '<td align="right">'. format_currency($v_package_price).'</td>';
	$v_dsp_tb_product_packages .= '<td align="center">
	                <a href="'.URL.$v_admin_key.'/'.$v_package_id.'/edit">Edit</a> |';

    if($v_per_delete==1)
        $v_dsp_tb_product_packages .= '<a href="'.URL.$v_admin_key.'/'.$v_package_id.'/delete" class="confirm">Delete</a>';

	$v_dsp_tb_product_packages .= '</td></tr>';
}
$v_dsp_tb_product_packages .= '</table>';
?>