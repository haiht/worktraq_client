<?php if(!isset($v_sval)) die();?>
<?php

$arr_where = array();$arr_sort = array();
$arr_where = array('status'=>array('$gt'=>3),
                       'dispatch'=>0);


$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_allocation->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;

$arr_where_clause = array();
$arr_sort = array('tracking_number'=>'','date_shipping'=>-1,'location_id');
$arr_tb_allocation = $cls_tb_allocation->select_limit($v_offset,$v_num_row,$arr_where_clause,$arr_sort);

$v_dsp_tb_allocation = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_tb_allocation .= '<tr align="center" valign="middle">';
$v_dsp_tb_allocation .= '<th></th>';
$v_dsp_tb_allocation .= '<th>Location Name</th>';
$v_dsp_tb_allocation .= '<th>Location Address</th>';
$v_dsp_tb_allocation .= '<th>Quantity</th>';
$v_dsp_tb_allocation .= '<th>Tracking Url</th>';
$v_dsp_tb_allocation .= '<th>Shipping Status</th>';
$v_dsp_tb_allocation .= '<th>Date Shipping</th>';
$v_dsp_tb_allocation .= '</tr>';
$v_count = $v_offset+1;
$v_count_location = 0;
$v_group_id = -1;
$v_temp_location_id = 0;
foreach($arr_tb_allocation as $arr){
    $v_mongo_id = $cls_tb_allocation->get_mongo_id();
    $v_allocation_id = isset($arr['allocation_id'])?$arr['allocation_id']:0;
    $v_order_items_id = isset($arr['order_items_id'])?$arr['order_items_id']:0;
    $v_order_id = isset($arr['order_id'])?$arr['order_id']:0;
    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
    $v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
    $v_location_address = isset($arr['location_address'])?$arr['location_address']:'';
    $v_quantity = isset($arr['quantity'])?$arr['quantity']:1;
    $v_shipper = isset($arr['shipper'])?$arr['shipper']:'';
    $v_tracking_number = isset($arr['tracking_number'])?$arr['tracking_number']:'';
    $v_shipping_url = isset($arr['tracking_url'])?$arr['tracking_url']:'';
    $v_ship_status = isset($arr['ship_status'])?$arr['ship_status']:'';
    $v_url = '';
    if($v_shipping_url!='') $v_url='<a href="'.$v_shipping_url .'"> Checking Allocation </a>';

    if($v_temp_location_id!=$v_location_id){
        $v_count_location++;
        $v_temp_location_id = $v_location_id;
    }

    $v_bgcolor = "#FFFFFF";
    if($v_count_location%2==0)
        $v_bgcolor = "#98FB98";

    $v_date_shipping = isset($arr['date_shipping'])?fdate(date('d-M-Y ',$arr['date_shipping']->sec)):'';

    $v_dsp_tb_allocation .= '<tr align="left" valign="middle" >';
    $v_dsp_tb_allocation .= '<td align="right" bgcolor="'.$v_bgcolor.'">'.($v_count++).'</td>';
    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'"><a rel="details" href="'.URL .$v_admin_key.'/'. $v_allocation_id .'/details"> '.$v_location_name.'</a></td>';
    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'">'.$v_location_address.'</td>';
    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'">'.$v_quantity.'</td>';

    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'">'.$v_url.'</td>';
    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'">'.$cls_tb_settings->get_option_name_by_id('ship_status',$v_ship_status).'</td>';
    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'">'.$v_date_shipping.'</td>';
    $v_dsp_tb_allocation .= '</tr>';
}
$v_dsp_tb_allocation .= '</table>';




?>