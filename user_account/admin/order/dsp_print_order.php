<?php if(!isset($v_sval)) die();?>
<?php echo  get_header(); ?>
<h3>Details Order :  <?php echo $v_job_description .' # PO Number : ' . $v_po_number; ?> </h3>
<h3>Order ID :  <?php echo $v_order_id;  ?> </h3>
<p class="break"/>
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
    <tr align="right" valign="top">
        <td width="200px">Company</td>
        <td align="left" colspan="6">
            <b> <?php echo $cls_tb_company->select_scalar('company_name',array('company_id'=>(int)$v_company_id)); ?></b>
        </td>
    </tr>
    <tr align="right" valign="top" >
        <td>Location</td>
        <td align="left" colspan="6">
            <b> <?php echo $cls_tb_location->select_scalar('location_name',array('location_id'=>(int)$v_location_id)); ?></b>
        </td>
    </tr>

    <tr align="right" valign="top" >
        <td>Order Ref</td>
        <td align="left" colspan="6">
            <?php echo $v_order_ref;?>
        </td>
    </tr>
    <tr align="right" valign="top" >
        <td>Po Number</td>
        <td align="left" colspan="6">
            <?php echo $v_po_number;?>
        </td>
    </tr>


    <tr align="right" valign="top" >
        <td>Order Type</td>
        <td align="left" colspan="6">
            <?php echo $cls_settings->get_option_name_by_id('order_type',$v_order_type,0);?>
        </td>
    </tr>
    <tr align="right" valign="top" >
        <td>Shipping Contact</td>
        <td align="left" colspan="6">
            <?php echo  $cls_tb_contact->get_infomation_contact($v_shipping_contact)  ;?>
        </td>
    </tr>
    <tr align="right" valign="top">
        <td>Total Order Amount</td>
        <td align="left">
            <span class="note"><b><?php echo $v_total_order_amount .$v_sign_money;?></b> </span>
        </td>
        <td>Total Discount</td>
        <td align="left">
            <span class="note"><b><?php echo $v_total_discount.$v_sign_money ;?></b> </span>
        </td>
        <td>Billing Contact</td>
        <td align="left">
            <span class="note"><b><?php echo $v_billing_contact.$v_sign_money;?></b> </span>
        </td>
    </tr>

    <tr align="right" valign="top">
        <td>Net Order Amount</td>
        <td align="left">
            <?php echo $v_net_order_amount;?>
        </td>
        <td>Gross Order Amount</td>
        <td align="left" colspan="6">
            <?php echo $v_gross_order_amount;?>
        </td>
    </tr>

    <tr align="right" valign="top" >
        <td>Job Description</td>
        <td align="left" colspan="6" >
            <?php echo $v_job_description;?>
        </td>
    </tr>
    <tr align="right" valign="top">
        <td>Sale Rep</td>
        <td align="left" colspan="6">
            <?php echo $v_sale_rep;?>
        </td>
    </tr>
    <tr align="right" valign="top">
        <td>Date Created</td>
        <td align="left">
            <?php echo $v_date_created;?>
        </td>
        <td>Date Required</td>
        <td align="left" colspan="6">
            <?php echo $v_date_required;?>
        </td>
    </tr>

    <tr align="right" valign="top">
        <td>Terms</td>
        <td align="left">
            <?php echo $v_term;?>
        </td>
    </tr>
    <tr align="right" valign="top">
        <td>Delivery Method</td>
        <td align="left">
            <?php  echo  $cls_settings->get_option_name_by_id('delivery_method',$v_delivery_method,0);?>
        </td>
        <td>Source</td>
        <td align="left">
            <?php  echo  $cls_settings->get_option_name_by_id('source_type',$v_source,0);?>
        </td>
        <td>Status</td>
        <td align="left">
           <b>  <?php  echo  $cls_settings->get_option_name_by_id('order_status',$v_status,0);?></b>
        </td>
    </tr>

    <tr align="right" valign="top">
        <td>Dispatch</td>
        <td align="left" colspan="6">
            <b> <?php  echo  $cls_settings->get_option_name_by_id('dispatch',$v_dispatch,0);?></b>
        </td>
    </tr>
    <tr align="right" valign="top" >
        <td>Tax 1</td>
        <td align="left"><?php echo $v_tax_1;?></td>
        <td>Tax 2</td>
        <td align="left"><?php echo $v_tax_2;?></td>
        <td>Tax 3</td>
        <td align="left"><?php echo $v_tax_3;?></td>
    </tr>
</table>

<?php
$v_count = 0;
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

    $v_mongo_id = $arr['_id'];
    $v_count++;
    ?>
<p style="page-break-before: always">
<h3>Details Order :  <?php echo $v_job_description .' # PO Number : ' . $v_po_number; ?> </h3>
<h3>Order items ID #: <?php echo $v_count;  ?> </h3>
<p class="break"/>
    <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
        <tr  valign="top">
            <td width="200px">Product Code </td>
            <td align="left" colspan="3" ><?php echo $v_product_code ;?></td>
            <td rowspan="5" align="center">
                <?php
                    $v_image = '';
                    if(trim($v_graphic_file)!='') $v_image = '<img src="'.URL. $v_graphic_file .'" />';
                    echo $v_image;
                ?>
            </td>
        </tr>
        <tr>
            <td >Width </td>
            <td ><b><?php echo $v_width. ' ' .$v_unit;?></b> </td>
            <td >Height </td>
            <td ><b><?php echo $v_height. ' ' .$v_unit;?></b> </td>

        </tr>
        <tr>
            <td> Thickness </td>
            <td colspan="3" ><b><?php echo $v_material_thickness_value. ' ' .$v_material_thickness_unit;?></b> </td>
        </tr>
        <tr>
            <td>Color </td>
            <td ><?php echo $v_material_color;?> </td>
            <?php
                $v_count_color = $cls_tb_color->select_one(array('color_name'=>$v_material_color));
                $v_bgcolor = "";
                if($v_count_color > 0)
                    $v_bgcolor = $cls_tb_color->get_color_code_hex();
            ?>
            <td colspan="2"><span style="background-color:<?php echo $v_bgcolor; ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span></td>
        </tr>
        <tr>
            <td>Current Price: </td>
            <td ><b><?php echo number_format($v_current_price).$v_sign_money ;?> </b></td>
            <td>Quantity : <b><?php echo number_format($v_quantity) ;?> </b> </td>
            <td>Total Price: <b><?php echo number_format($v_total_price).$v_sign_money ;?> </b></td>
       </tr>
    </table>

    <?php
        $v_total_allocation = sizeof($arr_allocation);

        $v_count = 0;
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
            $v_date_shipping = isset($arr_allocation[$j]['date_shipping'])? fdate(date('d-M-Y',$arr_allocation[$j]['date_shipping']->sec)) :'';
            $v_count++;

    ?>
        <h3>Dispath ID #: <?php echo $v_count;?> </h3>
        <p class="break"/>
        <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
            <tr valign="top">
                <td width="200px" >Location Name:</td>
                <td colspan="2"><b> <?php echo $v_location_name; ?> </b></td>
            </tr>
            <tr>
                <td>Location Address: </td>
                <td colspan="2">
                    <?php echo $v_location_address; ?>
                </td>
            </tr>
            <tr>
                <td>Quantity: </td>
                <td colspan="2">
                    <b> <?php echo $v_location_quantity; ?> </b>
                </td>
            </tr>
            <tr>
                <td>Tracking Company...</td>
                <td colspan="2"><?php echo $v_tracking_company; ?> </td>
            </tr>
            <tr>
                <td>Tracking Number...</td>
                <td><b></b><?php echo $v_tracking_number; ?> </b></td>
                <td>Check URL: <?php echo $v_tracking_url; ?> </td>
            </tr>
            <tr>
                <td>Date Shipping...</td>
                <td colspan="2"><?php echo $v_date_shipping; ?> </td>
            </tr>
        </table>
    <?php } ?>
<?php } ?>


