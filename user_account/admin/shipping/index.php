<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_order');
add_class('cls_tb_order_items');
add_class('cls_tb_allocation');
$cls_tb_settings = new cls_settings($db);
$cls_tb_order_items  = new cls_tb_order_items($db,LOG_DIR);
$cls_tb_order = new cls_tb_order($db,LOG_DIR);
$cls_tb_allocation = new cls_tb_allocation($db,LOG_DIR);

switch($v_act){
    case 'SH';
        include 'qry_details_shipping.php';
        include 'user_account/admin/header.php';
        include 'dsp_details_shipping.php';
        include 'user_account/admin/footer.php';
        break;
    default:
        create_shipping();
        include 'qry_shipping.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_shipping.php';
        include 'user_account/admin/admin_footer.php';
        break;
}
function create_shipping()
{
    global $cls_tb_order_items;
    global $cls_tb_order;
    global $cls_tb_allocation;

    $cls_tmp_order = $cls_tb_order;
    $cls_tmp_order_items = $cls_tb_order_items;
    $cls_tb_allocation = $cls_tb_allocation;

    $arr_where_clause = array('dispatch'=>0,'status'=>array('$gt'=>3));
    $arr_order = $cls_tmp_order->select($arr_where_clause);

    foreach($arr_order as $arr)
    {
        $v_order_id = isset($arr['order_id'])?$arr['order_id']:0;
        $arr_where_clause = array('order_id'=>(int) $v_order_id);
        $arr_order_items = $cls_tmp_order_items->select($arr_where_clause);

        foreach($arr_order_items as $arr_temp)
        {
            $v_quantity = isset($arr_temp['quantity'])?$arr_temp['quantity']:0;

            $arr_allocation = isset($arr_temp['allocation'])?$arr_temp['allocation']:array();
            $v_order_item_id = isset($arr_temp['order_item_id'])?$arr_temp['order_item_id']:0;

            $v_total = sizeof($arr_allocation);
            for($i=0;$i<$v_total;$i++)
            {
                $v_location_id = isset($arr_allocation[$i]['location_id'])?$arr_allocation[$i]['location_id']:'';
                $v_location_name = isset($arr_allocation[$i]['location_name'])?$arr_allocation[$i]['location_name']:'';
                $v_location_address = isset($arr_allocation[$i]['location_address'])?$arr_allocation[$i]['location_address']:'';
                $v_tracking_url = isset($arr_allocation[$i]['tracking_url'])?$arr_allocation[$i]['tracking_url']:'';
                $v_tracking_number = isset($arr_allocation[$i]['tracking_number'])?$arr_allocation[$i]['tracking_number']:'';
                $v_tracking_company = isset($arr_allocation[$i]['tracking_company'])?$arr_allocation[$i]['tracking_company']:'';
                $v_date_shipping = isset($arr_allocation[$i]['date_shipping'])?$arr_allocation[$i]['date_shipping']:NULL;;
                $v_ship_status = isset($arr_allocation[$i]['ship_status'])?$arr_allocation[$i]['ship_status']:0;;

                $arr_temp_where = array('order_items_id'=>(int)$v_order_item_id,
                                            'location_id'=>(int) $v_location_id,
                                            'order_id'=>(int) $v_order_id);
                if($cls_tb_allocation->count($arr_temp_where)==0)
                {
                    $v_allocation_id  = $cls_tb_allocation->select_next('allocation_id');
                    $cls_tb_allocation->set_allocation_id($v_allocation_id);
                    $cls_tb_allocation->set_location_id((int)$v_location_id);
                    $cls_tb_allocation->set_location_name($v_location_name);
                    $cls_tb_allocation->set_location_address($v_location_address);
                    $cls_tb_allocation->set_order_id((int)$v_order_id);
                    $cls_tb_allocation->set_quantity((int)$v_quantity);
                    $cls_tb_allocation->set_order_items_id((int)$v_order_item_id);
                    $cls_tb_allocation->set_tracking_number($v_tracking_number);
                    $cls_tb_allocation->set_shipper($v_tracking_company);
                    $cls_tb_allocation->set_tracking_url($v_tracking_url);
                    $cls_tb_allocation->set_date_shipping($v_date_shipping);
                    $cls_tb_allocation->set_ship_status($v_ship_status);
                    $cls_tb_allocation->insert();
                }
            }
        }
    }
}
?>