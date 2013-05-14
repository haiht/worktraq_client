<?php if(!isset($v_sval)) die();?>
<?php
add_class('cls_tb_contact');
add_class('cls_tb_color');
add_class('cls_tb_company');

$cls_tb_color = new cls_tb_color($db, LOG_DIR);
$cls_tb_contact = new cls_tb_contact($db, LOG_DIR);
$cls_tb_company = new cls_tb_company($db, LOG_DIR);

$v_error_message = '';
$v_mongo_id = NULL;
$v_location_id = 0;
$v_order_id = 0;
$v_raw_id = '';
$v_anvy_id = '';
$v_po_number = '';
$v_order_type = 0;
$v_shipping_contact = '';
$v_total_order_amount = 0;
$v_total_discount = 0;
$v_billing_contact = '';
$v_net_order_amount = 0;
$v_gross_order_amount = 0;
$v_job_description = '';
$v_sale_rep = '';
$v_date_created = date('Y-M-d', time());
$v_date_required = '';
$v_term = 0;
$v_delivery_method = '';
$v_source = 0;
$v_status = 0;
$v_dispatch = 0;
$v_tax_1 = 0;
$v_tax_2 = 0;
$v_tax_3 = 0;
$v_order_ref = '';
$v_order_id = isset($_GET['id'])?$_GET['id']:0;


if($v_order_id!=0){
    $v_row = $cls_tb_order->select_one(array('order_id' => (int)$v_order_id));
    $arr_location_allocation = array();
    if($v_row == 1){
        $v_order_id = $cls_tb_order->get_order_id();
        $v_raw_id = $cls_tb_order->get_raw_id();
        $v_anvy_id = $cls_tb_order->get_anvy_id();
        $v_po_number = $cls_tb_order->get_po_number();
        $v_order_type = $cls_tb_order->get_order_type();
        $v_shipping_contact = $cls_tb_order->get_shipping_contact();
        $v_total_order_amount = $cls_tb_order->get_total_order_amount();
        $v_total_discount = $cls_tb_order->get_total_discount();
        $v_billing_contact = $cls_tb_order->get_billing_contact();
        $v_net_order_amount = $cls_tb_order->get_net_order_amount();
        $v_gross_order_amount = $cls_tb_order->get_gross_order_amount();
        $v_job_description = $cls_tb_order->get_description();
        $v_sale_rep = $cls_tb_order->get_sale_rep();
        $v_date_created = date('d-M-Y',$cls_tb_order->get_date_created());
        $v_date_required = $cls_tb_order->get_date_required();
        if($v_date_required==NULL) $v_date_required = 'N/A';
        else $v_date_required = date('d-M-Y',$cls_tb_order->get_date_required());
        $v_term = $cls_tb_order->get_term();
        $v_delivery_method = $cls_tb_order->get_delivery_method();
        $v_source = $cls_tb_order->get_source();
        $v_order_status = $cls_tb_order->get_status();
        $v_dispatch = $cls_tb_order->get_dispatch();
        $v_tax_1 = $cls_tb_order->get_tax_1();
        $v_tax_2 = $cls_tb_order->get_tax_2();
        $v_tax_3 = $cls_tb_order->get_tax_3();
        $v_company_id = $cls_tb_order->get_company_id();
        $v_order_location_id = $cls_tb_order->get_location_id();
        $v_order_ref = $cls_tb_order->get_order_ref();
        $v_company_code = "";
        $v_total = $cls_tb_company->select_one(array("company_id"=>$v_company_id));
        if($v_total>0) $v_company_code = $cls_tb_company->get_company_code();
    }
    /*Order Items */

    if($v_row == 1){

        $arr_where_clause = array('order_id' => (int)$v_order_id);
        $arr_tb_order_items = $cls_tb_order_items->select_limit(0,1000,$arr_where_clause);

        $v_dsp_tb_order_items = '';
        $v_count = 1;

        $v_total_quantity = 0;
        $v_order_total = 0;

        foreach($arr_tb_order_items as $arr){
            $v_order_item_id = isset($arr['order_item_id'])?$arr['order_item_id']:0;
            $v_order_id = isset($arr['order_id'])?$arr['order_id']:'';
            $v_product_id = isset($arr['product_id'])?$arr['product_id']:'';
            $v_product_code = isset($arr['product_code'])?$arr['product_code']:'';
            $v_quantity = isset($arr['quantity'])?$arr['quantity']:0;
            $v_description = isset($arr['description'])?$arr['description']:'';
            $v_customization_information = isset($arr['customization_information'])?$arr['customization_information']:'';
            $v_width = isset($arr['width'])?$arr['width']:0;
            $v_height = isset($arr['height'])?$arr['height']:0;
            $v_graphic_file = isset($arr['graphic_file'])?$arr['graphic_file']:'';
            $v_original_price = isset($arr['original_price'])?$arr['original_price']:0;
            $v_discount_price = isset($arr['discount_price'])?$arr['discount_price']:0;
            $v_current_price = isset($arr['current_price'])?$arr['current_price']:0;
            $v_unit_price = isset($arr['unit_price'])?$arr['unit_price']:0;
            $v_status = isset($arr['status'])?$arr['status']:0;
            $v_discount_type = isset($arr['discount_type'])?$arr['discount_type']:0;
            $v_discount_per_unit = isset($arr['discount_per_unit'])?$arr['discount_per_unit']:0;
            $v_net_price = isset($arr['net_price'])?$arr['net_price']:0;
            $v_extended_amount = isset($arr['extended_amount'])?$arr['extended_amount']:0;
            $v_unit = isset($arr['unit'])?$arr['unit']:'';
            $v_material_id = isset($arr['material_id'])?$arr['material_id']:0;
            $v_material_name = isset($arr['material_name'])?$arr['material_name']:'';
            $v_material_thickness_value = isset($arr['material_thickness_value'])?$arr['material_thickness_value']:'';
            $v_material_thickness_unit = isset($arr['material_thickness_unit'])?$arr['material_thickness_unit']:'';
            $v_material_color = isset($arr['material_color'])?$arr['material_color']:'';
            $v_total_price = isset($arr['total_price'])?$arr['total_price']:0;
            $arr_allocation = isset($arr['allocation'])?$arr['allocation']:array();

            $v_total_quantity += $v_quantity;
            $v_order_total += $v_total_price;

            $v_image = '';
            if($v_graphic_file!='') $v_image = '<img src="'.URL. $v_graphic_file .'" />';

            $v_dsp_tb_order_items .='<p class="break"/>
                                    <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                                        <tr align="right" valign="top">
                                            <th width="200px"><b>Product Code </b> </th>
                                            <th align="left" colspan="4" ><b>'. $v_product_code .'</b></th>

                                        </tr>';

            $v_dsp_tb_order_items .='<tr>
                                        <td >Width </td>
                                        <td ><b>'. $v_width. ' ' .$v_unit .'</b> </td>
                                        <td >Height </td>
                                        <td ><b>'. $v_height. ' ' .$v_unit.'</b> </td>
                                        <td rowspan="4" align="center">'. $v_image .'</td>
                                     </tr>';

            $v_dsp_tb_order_items .='<tr>
                                        <td> Thickness </td>
                                        <td colspan="3" ><b>'. $v_material_thickness_value. ' ' .$v_material_thickness_unit.'</b> </td>
                                    </tr>';

            $v_dsp_tb_order_items .='<tr>
                                        <td>Color </td>
                                        <td >'. $v_material_color .'</td>';

            $v_bgcolor = $cls_tb_color->select_scalar('color_code_hex',array('color_name'=>$v_material_color));

            //$v_dsp_tb_order_items .='<td <!-- bgcolor="'. $v_bgcolor .'" colspan="2" -->>#</td>';
            $v_dsp_tb_order_items .='<td colspan="2">#</td>';

            $v_dsp_tb_order_items .='<tr>
                                        <td>Current Price: </td>
                                        <td ><b>'. format_currency((float)$v_current_price) .' </b></td>
                                        <td>Quantity : <b>'.  number_format($v_quantity)  .' </b> </td>
                                        <td>Total Price: <b>'.  format_currency((float)$v_total_price)   .' </b></td>
                                     </tr>
                                </table>';

            $v_total_allocation = sizeof($arr_allocation);
            $v_count = 0;
            $arr_location_allocation[$v_order_id] = "";
            $v_header_location = '';

            $v_dsp_tb_order_allocation ="";
            for($j=0;$j<$v_total_allocation;$j++)
            {
                $v_location_id = isset($arr_allocation[$j]['location_id'])?$arr_allocation[$j]['location_id']:'';
                $v_location_name = isset($arr_allocation[$j]['location_name'])?$arr_allocation[$j]['location_name']:'';
                $v_location_address = isset($arr_allocation[$j]['location_address'])?$arr_allocation[$j]['location_address']:'';
                $v_location_quantity = isset($arr_allocation[$j]['location_quantity'])?$arr_allocation[$j]['location_quantity']:0;
                $v_location_price = isset($arr_allocation[$j]['location_price'])?$arr_allocation[$j]['location_price']:0;
                $v_tracking_url = isset($arr_allocation[$j]['tracking_url'])?$arr_allocation[$j]['tracking_url']:'';
                $v_tracking_number = isset($arr_allocation[$j]['tracking_number'])?$arr_allocation[$j]['tracking_number']:'';
                $v_tracking_company = isset($arr_allocation[$j]['tracking_company'])?$arr_allocation[$j]['tracking_company']:'';
                $v_date_shipping = isset($arr_allocation[$j]['date_shipping'])?date('d-M-Y',$arr_allocation[$j]['date_shipping']->sec) :'';
                $v_count++;


                $v_url_tracking = '';
                /*
                if($v_tracking_company=='')
                    $v_url_tracking = '<a rel="order_tracking" href ="'.URL.$v_admin_key.'/'.$v_order_item_id.'/'.$v_location_id.'/order_tracking"> Input Tracking!... </a>';
                else
                    $v_url_tracking = '<a rel="order_tracking" href ="'.URL.$v_admin_key.'/'.$v_order_item_id.'/'.$v_location_id.'/order_tracking">. Edit. </a>';
                */

                $v_dsp_tb_order_items .= '<h3>Dispath ID #:'. $v_count .'</h3>';
                $v_dsp_tb_order_items .='
                <p class="break"/>
                <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                    <tr valign="top">
                        <td width="200px">Location Name:</td>
                        <td colspan="2">'. $v_location_name .'</td>
                    </tr>';
                $v_dsp_tb_order_items .='
                    <tr>
                        <td>Location Address: </td>
                        <td colspan="2">'. $v_location_address .'</td>
                    </tr>';
                $v_dsp_tb_order_items .='
                    <tr>
                        <td>Quantity: </td>
                        <td colspan="2"><b>'. $v_location_quantity .'</b> </td>
                    </tr>';
                $v_dsp_tb_order_items .='
                    <tr>
                        <td>Tracking Company...</td>
                        <td colspan="2">'. $v_tracking_company .$v_url_tracking.' </td>
                    </tr>';
                $v_dsp_tb_order_items .='
                    <tr>
                        <td>Tracking Number...</td>
                        <td><b></b>'. $v_tracking_number .'</b></td>
                        <td>Check URL: '.  ($v_tracking_url!='' ? '<a target="_blank" href="'.$v_tracking_url.'"> Track '.$v_tracking_company.' Express Shipments </a>':'') .'</td>
                    </tr>';
                $v_dsp_tb_order_items .='
                    <tr>
                        <td>Date Shipping...</td>
                        <td colspan="2">'.$v_date_shipping .'</td>
                    </tr>';
                $v_dsp_tb_order_items .='</table>';
            }
            $arr_location_allocation[$v_order_item_id] =$v_dsp_tb_order_allocation;
        }
    }
}

?>