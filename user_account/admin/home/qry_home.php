<?php if(!isset($v_sval)) die();?>
<?php
$v_root_key = isset($_GET['key'])?$_GET['key']:'';
$cls_tb_order  = new cls_tb_order($db);
$arr_where = array('status'=>array('$gt' => 1));
$arr_order = array('date_created'=>1);
$arr_order = $cls_tb_order->select_limit(0,5,$arr_where,$arr_order);
$v_list_order = '<table cellpadding="2" cellspacing="2" border="1" width="100%"  class="list_table">
                <tr>
                    <th colspan="3"> Order list!.... </th>
                </tr>';
foreach ($arr_order as $arr) {
    $v_order_id  = isset($arr['order_id'])?$arr['order_id']:0;
    $v_order_ref = isset($arr['order_ref'])?$arr['order_ref']:'';
    $v_po_number = isset($arr['po_number'])?$arr['po_number']:'';
    $v_status = isset($arr['status'])?$arr['status']:0;
    $v_total_order_amount = isset($arr['total_order_amount'])?$arr['total_order_amount']:0;
    $v_date_created = isset($arr['date_created'])?date('d-M-y',$arr['date_created']->sec):date('d-M-y', time());

    $v_list_order .= '<tr>
                        <td>PO Number :'. $v_po_number . "  -- Order Ref: ". $v_order_ref.'
                            <p><span class="note"> Date Created: '.$v_date_created.'</span></p>
                        </td>
                        <td><b>'. format_currency($v_total_order_amount).'</b></td>
                        <td >'.$cls_settings->get_option_name_by_id('order_status',$v_status,0).'</td>
                    </tr>';
}
$v_list_order .= '</table>';


/* Shipping */
$v_count = 1;
$v_count_location = 0;
$v_temp_location_id = 0;

$cls_tb_allocation = new cls_tb_allocation($db);
$arr_where_clause = array();
$arr_sort = array('tracking_number'=>'','date_shipping'=>-1,'location_id');
$arr_tb_allocation = $cls_tb_allocation->select_limit(0,5,$arr_where_clause,$arr_sort);
$v_list_shipping = '<table cellpadding="2" cellspacing="2" border="1" width="100%"  class="list_table">
                <tr>
                    <th colspan="5"> Shipping list!.... </th>
                </tr>';
foreach($arr_tb_allocation as $arr){
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
    $v_date_shipping = isset($arr['date_shipping'])?date('d-M-Y',$arr['date_shipping']->sec):'';
    if($v_temp_location_id!=$v_location_id){
        $v_count_location++;
        $v_temp_location_id = $v_location_id;
    }

    $v_bgcolor = "#FFFFFF";
    if($v_count_location%2==0)
        $v_bgcolor = "#98FB98";


    $v_list_shipping .= '<tr align="left" valign="middle" >';
    $v_list_shipping .= '<td align="right" bgcolor="'.$v_bgcolor.'">'.($v_count++).'</td>';
    $v_list_shipping .= '<td bgcolor="'.$v_bgcolor.'">'.$v_location_name.'</td>';
    $v_list_shipping .= '<td bgcolor="'.$v_bgcolor.'">'.$v_location_address.'</td>';
    $v_list_shipping .= '<td bgcolor="'.$v_bgcolor.'">'.$v_tracking_number.'</td>';
    $v_list_shipping .= '<td bgcolor="'.$v_bgcolor.'">'.fdate($v_date_shipping).'</td>';
    $v_list_shipping .= '</tr>';
}
$v_list_shipping .='</table>';


/*Lis Charts */

$v_date = date('Y-m-d');
$v_ts = strtotime($v_date);
$v_dow = date('w', $v_ts);
$v_offset = $v_dow - 1;
if ($v_offset < 0) $v_offset = 6;
$v_ts = $v_ts - $v_offset*86400;

$arr_date_charts = array();
$arr_total_order = array();
for ($i = 0; $i < 7; $i++) {
     $arr_date_charts[$i] = date("d/M Y", $v_ts + $i * 86400);
     $v_check_date = new MongoDate(strtotime(date("Y-m-d", $v_ts + $i * 86400)));
     $arr_total_order[$i] = $cls_tb_order->sum(array('status'=>array('$gte'=>2),
                                                    'date_created'=>array('$gte' => new MongoDate(strtotime(date("Y-m-d 00:00:00", $v_ts + $i * 86400))),
                                                    '$lte' => new MongoDate(strtotime(date("Y-m-d 23:59:59", $v_ts + $i * 86400))))));
}
/* Statistics Order */
$cls_settings = new cls_settings($db);
$arr_where = array('setting_name'=>'order_status');
$arr_options = $cls_settings->select($arr_where);

$v_statistics_order = '<table cellpadding="2" cellspacing="2" border="1" width="100%"  class="list_table">
                <tr>
                    <th colspan="5"> Statistics Order!.... </th>
                </tr>';
foreach ($arr_options as $arr) {
    $v_static = isset($arr['id']) ? $arr['id'] : 0;
    $v_static_name  = isset($arr['name']) ? $arr['name'] : '';
    $v_count_order = $cls_tb_order->count(array('status'=>(int)$v_static));

    $v_statistics_order .= '<tr>
                                <td>'.$v_static_name.'</td>
                                <td align="right"><b>'.$v_count_order.'</b></td>
                            </tr>';
}
$v_statistics_order .='</table>';

?>