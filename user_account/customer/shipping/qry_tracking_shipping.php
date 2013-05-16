<?php
if (!isset($v_sval)) die();
?>
<?php
$v_tracking_number = isset($_GET['txt_tracking_number'])?$_GET['txt_tracking_number']:'';
require 'classes/cls_tb_allocation.php';
require 'classes/cls_tb_order.php';
require 'classes/cls_tb_order_items.php';
$cls_tb_shipping = new cls_tb_allocation($db, LOG_DIR);
$cls_tb_order = new cls_tb_order($db, LOG_DIR);
$cls_tb_order_items = new cls_tb_order_items($db, LOG_DIR);
$v_row = $cls_tb_shipping->select_one(array('tracking_number'=>$v_tracking_number, 'company_id'=>$v_company_id));
if($v_row==1){
    $v_shipping_tracking_number = $cls_tb_shipping->get_tracking_number();
    $v_shipping_date_ship = $cls_tb_shipping->get_date_shipping();
    $v_shipping_shipper = $cls_tb_shipping->get_shipper();
    $v_shipping_tracking_url = $cls_tb_shipping->get_tracking_url();

    $arr_shipping = $cls_tb_shipping->select(array('tracking_number'=>$v_shipping_tracking_number, 'company_id'=>$v_company_id));
    $arr_allocation = array();
    $arr_product = array();
    foreach($arr_shipping as $arr){
        $v_location_id = $arr['location_id'];
        $v_location_name = $arr['location_name'];
        $v_shipping_date = $arr['date_shipping'];
        $v_location_address = $arr['location_address'];
        $v_quantity = $arr['quantity'];
        $v_shipper = $arr['shipper'];
        $v_shipping_status = $arr['ship_status'];
        $v_tracking_url = $arr['tracking_url'];
        $v_tracking_number = $arr['tracking_number'];
        $v_order_id = $arr['order_id'];
        $v_order_item_id = $arr['order_items_id'];
        $v_row = $cls_tb_order_items->select_one(array('order_item_id'=>$v_order_item_id));
        $v_product_id = 0;
        if($v_row == 1){
            $v_product_id = $cls_tb_order_items->get_product_id();
            $v_product_code = $cls_tb_order_items->get_product_code();
            $v_width = $cls_tb_order_items->get_width();
            $v_height = $cls_tb_order_items->get_height();
            $v_unit = $cls_tb_order_items->get_unit();
            $v_item_price = $cls_tb_order_items->get_current_price();
            $v_item_quantity = $cls_tb_order_items->get_quantity();
            $v_graphic_file = $cls_tb_order_items->get_graphic_file();
            $v_total_price = $cls_tb_order_items->get_total_price();
            $v_material_id = $cls_tb_order_items->get_material_id();
            $v_material_name = $cls_tb_order_items->get_material_name();
            $v_material_color = $cls_tb_order_items->get_material_color();
            $v_material_thickness_value = $cls_tb_order_items->get_material_thickness_value();
            $v_material_thickness_unit = $cls_tb_order_items->get_material_thickness_unit();
        }
        $v_index = 0;
        if(isset($arr_allocation[$v_location_id])){
            $v_index = count($arr_allocation[$v_location_id]);
        }
        $arr_allocation[$v_location_id][$v_index] = array('location_id'=>$v_location_id,
            'location_name'=>$v_location_name,
            'location_address'=>$v_location_address,
            'shipper'=>$v_shipper,
            'tracking_number'=>$v_tracking_number,
            'tracking_url'=>$v_tracking_url,
            'order_id'=>$v_order_id,
            'quantity'=>$v_quantity,
            'price'=>isset($v_item_price)?$v_item_price:0,
            'amount'=>isset($v_total_price)?$v_total_price:0,
            'status'=>$v_shipping_status,
            'width'=>isset($v_width)?$v_width:0,
            'height'=>isset($v_height)?$v_height:0,
            'unit'=>isset($v_unit)?$v_unit:'',
            'order_item_id'=>isset($v_order_item_id)?$v_order_item_id:0,
            'product_id'=>isset($v_product_id)?$v_product_id:0,
            'product_code'=>isset($v_product_code)?$v_product_code:'',
            'graphic_file'=>isset($v_graphic_file)?$v_graphic_file:'',
            'material_id'=>isset($v_material_id)?$v_material_id:'',
            'material_name'=>isset($v_material_name)?$v_material_name:'',
            'material_color'=>isset($v_material_color)?$v_material_color:'',
            'material_thickness_value'=>isset($v_material_thickness_value)?$v_material_thickness_value:'',
            'material_thickness_unit'=>isset($v_material_thickness_unit)?$v_material_thickness_unit:''
        );
        if($v_product_id>0){
            if(!isset($arr_product['$v_product_id'])){
                $arr_product[$v_product_id] = array(
                    'quantity'=>$v_quantity
                ,'order_id'=>$v_order_id
                ,'order_item_id'=>isset($v_order_item_id)?$v_order_item_id:0
                ,'price'=>isset($v_item_price)?$v_item_price:0
                ,'amount'=>isset($v_total_price)?$v_total_price:0
                ,'width'=>isset($v_width)?$v_width:0
                ,'height'=>isset($v_height)?$v_height:0
                ,'unit'=>isset($v_unit)?$v_unit:''
                ,'product_code'=>isset($v_product_code)?$v_product_code:''
                ,'graphic_file'=>isset($v_graphic_file)?$v_graphic_file:''
                ,'material_id'=>isset($v_material_id)?$v_material_id:''
                ,'material_name'=>isset($v_material_name)?$v_material_name:''
                ,'material_color'=>isset($v_material_color)?$v_material_color:''
                ,'material_thickness_value'=>isset($v_material_thickness_value)?$v_material_thickness_value:''
                ,'material_thickness_unit'=>isset($v_material_thickness_unit)?$v_material_thickness_unit:''
                );
            }else{
                $v_tmp_quantity = $arr_product[$v_product_id]['quantity'] + $v_quantity;
                $arr_product[$v_product_id]['quantity'] = $v_tmp_quantity;
            }
        }
    }
    $arr_tpl_shipping_item = array();
    $v_shipping_total = 0;
    foreach($arr_product as $v_product_id=>$arr){
        $tpl_ship_items = new Template('dsp_shipping_items_all.tpl',$v_dir_templates);
        $tpl_ship_items->set('PRODUCT_ID', $v_product_id);
        $tpl_ship_items->set('ORDER_ID', $arr['order_id']);
        $tpl_ship_items->set('ORDER_ITEM_ID', $arr['order_item_id']);
        $v_material_color = $arr['material_color'];
        $v_material_name = $arr['material_name'];
        $v_material_value = $arr['material_thickness_value'];
        $v_material_unit = $arr['material_thickness_unit'];
        $v_product_code = $arr['product_code'];
        $v_width = $arr['width'];
        $v_height = $arr['height'];
        $v_unit = $arr['unit'];
        $v_product_material = '<span style="color:'.$v_material_color.'">'.$v_product_code .' '.$v_width.' &times; '.$v_height.' '.$v_unit.' - '.$v_material_name. ' '.$v_material_unit. ' '.$v_material_value.'</span>';
        $tpl_ship_items->set('PRODUCT_MATERIAL',$v_product_material);
        $tpl_ship_items->set('PRODUCT_IMAGE',$v_company_product_url.$arr['graphic_file']);
        $tpl_ship_items->set('PRODUCT_QUANTITY', $arr['quantity']);
        $tpl_ship_items->set('PRODUCT_PRICE', format_currency($arr['price']));
        $tpl_ship_items->set('PRODUCT_AMOUNT', format_currency($arr['amount']));
        $tpl_ship_items->set('SELECT_DISABLED', 'disabled="disabled"');
        $arr_tpl_shipping_item[] = $tpl_ship_items;
        $v_shipping_total += $arr['amount'];
    }
    $v_tmp_location_id = 0;
    $arr_tpl_shipping_allocation = array();
    foreach($arr_allocation as $v_location_id=>$arr){
        $tpl_ship_items = new Template('dsp_shipping_items_all.tpl',$v_dir_templates);
        $arr_tpl_ship_allocation_items = array();
        $v_shipping_location_total = 0;
        if(count($arr)>0){
            $v_location_name = $arr[0]['location_name'];
            $v_location_address = $arr[0]['location_address'];
            $v_shipping_status = $arr[0]['status'];
            $v_tracking_number = $arr[0]['tracking_number'];
            $v_shipping_status_name = $cls_settings->get_option_name_by_id('ship_status', $v_shipping_status);
            for($i=0;$i<count($arr);$i++){
                $tpl_ship_allocation_items = new Template('dsp_shipping_allocation_items.tpl', $v_dir_templates);
                $v_material_color = $arr[$i]['material_color'];
                $v_material_name = $arr[$i]['material_name'];
                $v_product_code = $arr[$i]['product_code'];
                $v_width = $arr[$i]['width'];
                $v_height = $arr[$i]['height'];
                $v_unit = $arr[$i]['height'];
                $v_material_unit = $arr[$i]['material_thickness_unit'];
                $v_material_value = $arr[$i]['material_thickness_value'];
                $v_product_material = '<span style="color:'.$v_material_color.'">'.$v_product_code .' '.$v_width.' &times; '.$v_height.' '.$v_unit.' - '.$v_material_name. ' '.$v_material_unit. ' '.$v_material_value.'</span>';
                $tpl_ship_allocation_items->set('PRODUCT_ID', $arr[$i]['product_id']);
                $tpl_ship_allocation_items->set('ORDER_ID', $arr[$i]['order_id']);
                $tpl_ship_allocation_items->set('PRODUCT_MATERIAL', $v_product_material);
                $v_graphic_file = $arr[$i]['graphic_file'];
                if($v_graphic_file!='' && strpos($v_graphic_file,'/')===false) $v_graphic_file = $v_company_product_url.$v_graphic_file;
                $tpl_ship_allocation_items->set('PRODUCT_IMAGE', $v_graphic_file);
                $tpl_ship_allocation_items->set('PRODUCT_QUANTITY', $arr[$i]['quantity']);
                $tpl_ship_allocation_items->set('PRODUCT_PRICE', format_currency($arr[$i]['price']));
                $tpl_ship_allocation_items->set('PRODUCT_AMOUNT', format_currency($arr[$i]['amount']));

                $v_shipping_location_total += $arr[$i]['amount'];
                $arr_tpl_ship_allocation_items[] = $tpl_ship_allocation_items;
            }
            $v_dsp_ship_allocations = Template::merge($arr_tpl_ship_allocation_items);
            $tpl_ship_items_allocation = new Template('dsp_shipping_allocation.tpl',$v_dir_templates);
            $tpl_ship_items_allocation->set('SHIPPING_ROW_ITEM_ALLOCATION', $v_dsp_ship_allocations);
            $tpl_ship_items_allocation->set('LOCATION_PRICE', format_currency($v_shipping_location_total));
            $tpl_ship_items_allocation->set('LOCATION_NAME', $v_location_name);
            $tpl_ship_items_allocation->set('LOCATION_ADDRESS', $v_location_address);
            $tpl_ship_items_allocation->set('SHIPPING_STATUS', $v_shipping_status_name);
            $tpl_ship_items_allocation->set('TRACKING_NUMBER', $v_tracking_number);
            $arr_tpl_shipping_allocation[] = $tpl_ship_items_allocation;
        }
    }
    $v_dsp_shipping_items = Template::merge($arr_tpl_shipping_item);
    $v_dsp_shipping_allocations = Template::merge($arr_tpl_shipping_allocation);
    $tpl_shipping_view = new Template('dsp_shipping_view.tpl', $v_dir_templates);
    $tpl_shipping_view->set('SHIPPING_INFORMATION', '&nbsp;');
    $tpl_shipping_view->set('SHIPPING_DETAIL_ITEMS', $v_dsp_shipping_items);
    $tpl_shipping_view->set('SHIPPING_DETAIL_ALLOCATION', $v_dsp_shipping_allocations);
    $tpl_shipping_view->set('TOTAL_AMOUNT', format_currency($v_shipping_total));
    $v_shipping_information = '<li>Tracking number: '.$v_shipping_tracking_number.'</li>';
    if(is_valid_url($v_shipping_tracking_url))
        $v_shipping_information .= '<li>Shipper: <a href="'.$v_shipping_tracking_url.'" target="_blank">'.$v_shipping_shipper.'</a></li>';
    else
        $v_shipping_information .= '<li>Shipper: '.$v_shipping_shipper.'</li>';
    $v_shipping_information .= '<li>Shipping Date: '.date('M-d-Y',$v_shipping_date_ship).'</li>';

    $tpl_shipping_view->set('SHIP_INFO', '<ul>'.$v_shipping_information.'</ul>');

    echo $tpl_shipping_view->output();
}
?>