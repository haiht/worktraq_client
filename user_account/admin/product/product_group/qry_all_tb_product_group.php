<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_product_group->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_product_group = $cls_tb_product_group->select_limit($v_offset,$v_num_row,$arr_where_clause,array('company_id'=>1));
$v_dsp_tb_product_group = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_product_group .= '<tr align="center" valign="middle">';
$v_dsp_tb_product_group .= '<th></th>';
$v_dsp_tb_product_group .= '<th>Company </th>';

$v_dsp_tb_product_group .= '<th>Product Group Name</th>';

$v_dsp_tb_product_group .= '<th>Product Group Parent</th>';
$v_dsp_tb_product_group .= '<th>&nbsp;</th>';
$v_dsp_tb_product_group .= '</tr>';
$v_count = 1;
$arr_company = array();
$arr_parent_product_group = array();

foreach($arr_tb_product_group as $arr){
	$v_mongo_id = $cls_tb_product_group->get_mongo_id();
	$v_product_group_id = isset($arr['product_group_id'])?$arr['product_group_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_product_group_key = isset($arr['product_group_key'])?$arr['product_group_key']:'';
	$v_product_group_name = isset($arr['product_group_name'])?$arr['product_group_name']:'';
	$v_product_group_order = isset($arr['product_group_order'])?$arr['product_group_order']:0;
	$v_product_group_parent = isset($arr['product_group_parent'])?$arr['product_group_parent']:0;

    if(!isset($arr_company[$v_company_id]))
        $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name',array('company_id'=>(int) $v_company_id));

    if(!isset($arr_parent_product_group[$v_product_group_id]))
        $arr_parent_product_group[$v_product_group_id] =  $cls_tb_product_group->select_scalar('product_group_name',array('product_group_id'=>(int)$v_product_group_parent));



	$v_dsp_tb_product_group .= '<tr align="left" valign="middle">';
	$v_dsp_tb_product_group .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_product_group .= '<td>'.$arr_company[$v_company_id].'</td>';
	$v_dsp_tb_product_group .= '<td>'.$v_product_group_name.'</td>';
	$v_dsp_tb_product_group .= '<td> <b> '. $arr_parent_product_group[$v_product_group_id] .'</b></td>';
	$v_dsp_tb_product_group .= '<td align="center">
	                                <a href="'.URL.$v_admin_key.'/'.$v_product_group_id.'/edit">Edit</a> |
	                                <a class="confirm" href="'.URL.$v_admin_key.'/'.$v_product_group_id.'/delete">Delete</a></td>';
	$v_dsp_tb_product_group .= '</tr>';
}
$v_dsp_tb_product_group .= '</table>';
?>