<?php
if (!isset($v_sval)) die();
?>
<?php
$v_shipping_id = isset($_GET['txt_ship_id'])?$_GET['txt_ship_id']:0;
settype($v_shipping_id, 'int');
require 'classes/cls_tb_shipping.php';
require 'classes/cls_tb_order.php';
require 'classes/cls_tb_order_items.php';
$cls_tb_shipping = new cls_tb_shipping($db, LOG_DIR);
$cls_tb_order = new cls_tb_order($db, LOG_DIR);
$cls_tb_order_items = new cls_tb_order_items($db, LOG_DIR);
$v_row = $cls_tb_shipping->select_one(array('shipping_id'=>$v_shipping_id, 'company_id'=>$v_company_id));


//die('R: '.$v_row);
if($v_row==1){
    $v_shipper = $cls_tb_shipping->get_shipper();
    $v_tracking_number = $cls_tb_shipping->get_tracking_number();
    $v_tracking_url = $cls_tb_shipping->get_tracking_url();
    $v_shipping_date = $cls_tb_shipping->get_date_shipping();
    $v_shipping_date = date('M-d-Y', $v_shipping_date);
    $v_location_name = $cls_tb_shipping->get_location_name();
    $v_location_id = $cls_tb_shipping->get_location_id();
    $v_location_address = $cls_tb_shipping->get_location_address();


    $arr_shipping_detail = $cls_tb_shipping->get_shipping_detail();



    $arr_order_ship = array();
    $v_total_amount = 0;
    $arr_tpl_ship_items = array();
    foreach($arr_shipping_detail as $arr){
        $v_order_id = $arr['order_id'];
        $v_order_item_id = $arr['order_item_id'];
        $v_product_id = $arr['product_id'];
        $v_product_code = $arr['product_code'];
        $v_graphic_file = $arr['graphic_file'];
        $v_width = $arr['width'];
        $v_height = $arr['height'];
        $v_unit = $arr['unit'];
        $v_quantity = $arr['quantity'];
        $v_price = $arr['price'];
        $v_amount = $arr['amount'];
        $v_material_name = $arr['material_name'];
        $v_material_color = $arr['material_color'];
        $v_material_value = $arr['material_thickness_value'];
        $v_material_unit = $arr['material_thickness_unit'];
        $v_product_name = '<span style="color:'.$v_material_color.'">'.$v_product_code .' '.$v_width.' &times; '.$v_height.' '.$v_unit.' - '.$v_material_name. ' '.$v_material_unit. ' '.$v_material_value.'</span>';;
        $v_total_amount += $v_amount;

        $v_view_order = URL.'order/'.$v_order_id.'/view';

        $arr_order_detail = array(
            'product_id'=>$v_product_id
            ,'product_name'=>$v_product_name
            ,'quantity'=>$v_quantity
            ,'price'=>$v_price
            ,'amount'=>$v_amount
            ,'graphic_file'=>$v_graphic_file
        );
        if(!isset($arr_order_ship[$v_order_id])){
            $v_row = $cls_tb_order->select_one(array('order_id'=>$v_order_id));
            if($v_row==1){
                $v_po_number = $cls_tb_order->get_po_number();
                $v_order_date = $cls_tb_order->get_date_created();
                $v_order_amount = $cls_tb_order->get_total_order_amount();
                $v_order_ref = $cls_tb_order->get_order_ref();
                $v_order_date = date('M-d-Y', $v_order_date);


                $arr_order_ship[$v_order_id] = array(
                    'po_number'=>$v_po_number
                    ,'order_amount'=>$v_order_amount
                    ,'order_ref'=>$v_order_ref
                    ,'order_date'=>$v_order_date
                    ,'order_detail'=>array(0=>$arr_order_detail)
                );
            }
        }else{
            $v_index = count($arr_order_ship['order_detail']);
            $arr_order_ship['order_detail'][$v_index] = $arr_order_detail;
        }
        $tpl_ship_items = new Template('dsp_shipping_items_all.tpl',$v_dir_templates);
        $tpl_ship_items->set('PRODUCT_MATERIAL',$v_product_name);
        if($v_graphic_file!='' && strpos($v_graphic_file,'/')===false) $v_graphic_file = $v_company_product_url.$v_graphic_file;
        $tpl_ship_items->set('PRODUCT_IMAGE',$v_graphic_file);
        $tpl_ship_items->set('PRODUCT_QUANTITY', $v_quantity);
        $tpl_ship_items->set('PRODUCT_PRICE', format_currency($v_price));
        $tpl_ship_items->set('PRODUCT_AMOUNT', format_currency($v_amount));
        $tpl_ship_items->set('PO_NUMBER', isset($v_po_number)?'<a href="'.$v_view_order.'">'.$v_po_number.'</a>':'---');
        $arr_tpl_ship_items[] = $tpl_ship_items;
    }
    $arr_tpl_shipping_allocation = array();
    foreach($arr_order_ship as $v_order_id=>$arr){
        $arr_tpl_ship_allocation_items = array();
        $v_po_number = $arr['po_number'];
        $v_order_ref = $arr['order_ref'];
        $v_order_date = $arr['order_date'];
        $v_order_total_amount = $arr['order_amount'];

        $arr_order_detail = $arr['order_detail'];
        $v_order_amount = 0;
        for($i=0; $i<count($arr_order_detail); $i++){
            $v_product_id = $arr_order_detail[$i]['product_id'];
            $v_product_name = $arr_order_detail[$i]['product_name'];
            $v_graphic_file = $arr_order_detail[$i]['graphic_file'];
            $v_quantity = $arr_order_detail[$i]['quantity'];
            $v_price = $arr_order_detail[$i]['price'];
            $v_amount = $arr_order_detail[$i]['amount'];
            //$v_order_amount += $v_amount;
            $tpl_ship_allocation_items = new Template('dsp_shipping_allocation_items.tpl', $v_dir_templates);
            $tpl_ship_allocation_items->set('PRODUCT_ID', $v_product_id);
            $tpl_ship_allocation_items->set('ORDER_ID', $v_order_id);
            $tpl_ship_allocation_items->set('PRODUCT_MATERIAL', $v_product_name);
            if($v_graphic_file!='' && strpos($v_graphic_file,'/')===false) $v_graphic_file = $v_company_product_url.$v_graphic_file;
            $tpl_ship_allocation_items->set('PRODUCT_IMAGE', $v_graphic_file);
            $tpl_ship_allocation_items->set('PRODUCT_QUANTITY', $v_quantity);
            $tpl_ship_allocation_items->set('PRODUCT_PRICE', format_currency($v_price));
            $tpl_ship_allocation_items->set('PRODUCT_AMOUNT', format_currency($v_amount));

            $v_order_amount += $v_amount;
            $arr_tpl_ship_allocation_items[] = $tpl_ship_allocation_items;
        }

        $v_dsp_ship_allocations = Template::merge($arr_tpl_ship_allocation_items);
        $tpl_ship_items_allocation = new Template('dsp_shipping_allocation.tpl',$v_dir_templates);
        $tpl_ship_items_allocation->set('SHIPPING_ROW_ITEM_ALLOCATION', $v_dsp_ship_allocations);
        $tpl_ship_items_allocation->set('SHIPPING_AMOUNT', format_currency($v_order_amount));
        $tpl_ship_items_allocation->set('PO_NUMBER', $v_po_number);
        $tpl_ship_items_allocation->set('ORDER_REF', $v_order_ref.' [<a href="'.$v_view_order.'" target="_blank">View Orders</a>]');
        $tpl_ship_items_allocation->set('ORDER_ID', $v_order_id);
        $tpl_ship_items_allocation->set('CREATED_DATE', $v_order_date);
        $tpl_ship_items_allocation->set('TOTAL_AMOUNT', format_currency($v_order_amount));

        $arr_tpl_shipping_allocation[] = $tpl_ship_items_allocation;

    }



    $v_dsp_shipping_items = Template::merge($arr_tpl_ship_items);
    $v_dsp_shipping_allocations = Template::merge($arr_tpl_shipping_allocation);
    $tpl_shipping_view = new Template('dsp_shipping_view.tpl', $v_dir_templates);
    $tpl_shipping_view->set('SHIPPING_INFORMATION', '&nbsp;');
    $tpl_shipping_view->set('SHIPPING_DETAIL_ITEMS', $v_dsp_shipping_items);
    $tpl_shipping_view->set('SHIPPING_DETAIL_ALLOCATION', $v_dsp_shipping_allocations);
    $tpl_shipping_view->set('TOTAL_AMOUNT', format_currency($v_total_amount));

    $v_shipping_information = '<li>Tracking number: '.$v_tracking_number.'</li>';
    if(is_valid_url($v_tracking_url))
        $v_shipping_information .= '<li>Shipper: <a href="'.$v_tracking_url.'" target="_blank">'.$v_shipper.'</a></li>';
    else
        $v_shipping_information .= '<li>Shipper: '.$v_shipper.'</li>';
    $v_shipping_information .= '<li>Shipping Date: '.$v_shipping_date.'</li>';

    $tpl_shipping_view->set('SHIP_INFO', '<ul>'.$v_shipping_information.'</ul>');

    echo $tpl_shipping_view->output();
}else{
    redir(URL.'shipping');
}

?>