<?php
if(!isset($v_sval)) die();
?>
<?php
/* List all allocation*/
/* Checking Order in Shipping */
$arr_where = array('order_id'=>$v_order_id);

$cls_tb_order->select_one($arr_where);
$v_company_id  = $cls_tb_order->get_company_id();
$v_location_from = $cls_tb_order->get_location_id();
$v_po_number = $cls_tb_order->get_po_number();

$v_h3_title = ' to selected locations for Order: #'.$v_po_number;
$v_count_allocation =$cls_tb_allocation->count($arr_where);
/* Create Shipping */
if($v_count_allocation==0)
{
    $arr_tb_order = $cls_tb_order_items->select($arr_where);
    foreach($arr_tb_order as $arr){
        $v_product_code = isset($arr['product_code'])?$arr['product_code']:0;
        $v_quantity = isset($arr['quantity'])?$arr['quantity']:0;
        $arr_allocation = isset($arr['allocation'])?$arr['allocation']:array();
        $v_order_item_id = isset($arr['order_item_id'])?$arr['order_item_id']:0;
        $v_location_from = isset($arr['location_id'])?$arr['location_id']:0;


        $v_total = sizeof($arr_allocation);
        for($i=0;$i<$v_total;$i++)
        {
            $v_location_id = isset($arr_allocation[$i]['location_id'])?$arr_allocation[$i]['location_id']:0;
            $v_product_id = isset($arr_allocation[$i]['product_id'])?$arr_allocation[$i]['product_id']:0;
            $v_location_name = isset($arr_allocation[$i]['location_name'])?$arr_allocation[$i]['location_name']:'';
            $v_product_name = isset($arr_allocation[$i]['product_name'])?$arr_allocation[$i]['product_name']:'';
            $v_location_address = isset($arr_allocation[$i]['location_address'])?$arr_allocation[$i]['location_address']:'';
            $v_location_quantity = isset($arr_allocation[$i]['location_quantity'])?$arr_allocation[$i]['location_quantity']:0;
            $v_location_price = isset($arr_allocation[$i]['location_price'])?$arr_allocation[$i]['location_price']:0;
            $v_tracking_url = isset($arr_allocation[$i]['tracking_url'])?$arr_allocation[$i]['tracking_url']:'';
            $v_tracking_number = isset($arr_allocation[$i]['tracking_number'])?$arr_allocation[$i]['tracking_number']:'';
            $v_tracking_company = isset($arr_allocation[$i]['tracking_company'])?$arr_allocation[$i]['tracking_company']:'';
            $v_date_shipping = isset($arr_allocation[$i]['date_shipping'])?$arr_allocation[$i]['date_shipping']:NULL;;
            $v_ship_status = isset($arr_allocation[$i]['shipping_status'])?$arr_allocation[$i]['shipping_status']:0;


            $v_allocation_id  = $cls_tb_allocation->select_next('allocation_id');
            $cls_tb_allocation->set_allocation_id($v_allocation_id);
            $cls_tb_allocation->set_location_id((int)$v_location_id);
            $cls_tb_allocation->set_location_name($v_location_name);
            $cls_tb_allocation->set_location_address($v_location_address);
            $cls_tb_allocation->set_order_id((int)$v_order_id);
            $cls_tb_allocation->set_quantity((int)$v_location_quantity);
            $cls_tb_allocation->set_order_items_id((int)$v_order_item_id);

            $cls_tb_allocation->set_tracking_number($v_tracking_number);
            $cls_tb_allocation->set_shipper($v_tracking_company);
            $cls_tb_allocation->set_tracking_url($v_tracking_url);
            $cls_tb_allocation->set_date_shipping(NULL);
            $cls_tb_allocation->set_ship_status($v_ship_status);
            $cls_tb_allocation->set_product_id($v_product_id);
            $cls_tb_allocation->set_product_name($v_product_name);
            $cls_tb_allocation->set_shipped_quantity(0);
            $cls_tb_allocation->set_location_from($v_location_from);
            /*haiht EDIT*/
            $cls_tb_allocation->set_create_by(isset($arr_user['user_name'])?$arr_user['user_name']:'');
            $cls_tb_allocation->set_create_time(date('Y-m-d H:i:s', time()));
            /*haiht END EDIT*/
            $cls_tb_allocation->insert();
        }
    }
}


//For Normal Case
$v_quick_search = '';
$v_search_location_name = '';
$v_page = 1;
if(isset($_POST['btn_advanced_search'])){
    $v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
}else if(isset($_POST['btn_advanced_reset'])){
}else{
    $v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
    $v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
    if(isset($_SESSION['ss_shipping_tb_order_redirect']) && $_SESSION['ss_shipping_tb_order_redirect']==1){
        $v_page = isset($_SESSION['ss_shipping_tb_order_page'])?$_SESSION['ss_shipping_tb_order_page']:'1';
        settype($v_page,'int');
        if($v_page<1) $v_page = 1;
        if(isset($_SESSION['ss_tb_order_where_clause'])){
            $arr_where_clause = unserialize($_SESSION['ss_shipping_tb_order_where_clause']);
            if(isset($arr_where_clause['company_id'])) $v_company_id = $arr_where_clause['company_id'];
        }
        $v_quick_search = isset($_SESSION['ss_shipping_tb_order_quick_search'])?$_SESSION['ss_shipping_tb_order_quick_search']:'';
    }
    $v_search_location_name = $v_quick_search;
}
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
//Add code here if required

?>