<?php if(!isset($v_sval)) die();?>
<?php echo js_tabas(); ?>
<?php echo js_tooltip(); ?>
<script type="text/javascript">
$(document).ready(function(){
    $(".with-tooltip").simpletooltip();
    $('#tab-container').easytabs();

	$("form#frm_tb_order").submit(function(){
		var css = '';

		var order_id = $("input#txt_order_id").val();
		order_id = parseInt(order_id, 10);
		css = isNaN(order_id)?'':'none';
		$("label#lbl_order_id").css("display",css);
		if(css == '') return false;
		var raw_id = $("input#txt_raw_id").val();
		raw_id = $.trim(raw_id);
		css = raw_id==''?'':'none';
		$("label#lbl_raw_id").css("display",css);
		if(css == '') return false;
		var anvy_id = $("input#txt_anvy_id").val();
		anvy_id = $.trim(anvy_id);
		css = anvy_id==''?'':'none';
		$("label#lbl_anvy_id").css("display",css);
		if(css == '') return false;
		var po_number = $("input#txt_po_number").val();
		po_number = $.trim(po_number);
		css = po_number==''?'':'none';
		$("label#lbl_po_number").css("display",css);
		if(css == '') return false;
        /*
		var order_type = $("input#txt_order_type").val();
		order_type = parseInt(order_type, 10);
		css = isNaN(order_type)?'':'none';
		$("label#lbl_order_type").css("display",css);
		if(css == '') return false;
		*/
		var shipping_contact = $("input#txt_shipping_contact").val();
		shipping_contact = $.trim(shipping_contact);
		css = shipping_contact==''?'':'none';
		$("label#lbl_shipping_contact").css("display",css);
		if(css == '') return false;
		var total_order_amount = $("input#txt_total_order_amount").val();
		total_order_amount = parseFloat(total_order_amount);
		css = isNaN(total_order_amount)?'':'none';
		$("label#lbl_total_order_amount").css("display",css);
		if(css == '') return false;
		var total_discount = $("input#txt_total_discount").val();
		total_discount = parseFloat(total_discount);
		css = isNaN(total_discount)?'':'none';
		$("label#lbl_total_discount").css("display",css);
		if(css == '') return false;
		var billing_contact = $("input#txt_billing_contact").val();
		billing_contact = $.trim(billing_contact);
		css = billing_contact==''?'':'none';
		$("label#lbl_billing_contact").css("display",css);
		if(css == '') return false;
		var net_order_amount = $("input#txt_net_order_amount").val();
		net_order_amount = parseFloat(net_order_amount);
		css = isNaN(net_order_amount)?'':'none';
		$("label#lbl_net_order_amount").css("display",css);
		if(css == '') return false;
		var gross_order_amount = $("input#txt_gross_order_amount").val();
		gross_order_amount = parseFloat(gross_order_amount);
		css = isNaN(gross_order_amount)?'':'none';
		$("label#lbl_gross_order_amount").css("display",css);
		if(css == '') return false;
		var job_description = $("input#txt_job_description").val();
		job_description = $.trim(job_description);
		css = job_description==''?'':'none';
		$("label#lbl_job_description").css("display",css);
		if(css == '') return false;
		var sale_rep = $("input#txt_sale_rep").val();
		sale_rep = $.trim(sale_rep);
		css = sale_rep==''?'':'none';
		$("label#lbl_sale_rep").css("display",css);
		if(css == '') return false;
		var date_created = $("input#txt_date_created").val();
		css = check_date(date_created)?'':'none';
		$("label#lbl_date_created").css("display",css);
		if(css == '') return false;
		var date_required = $("input#txt_date_required").val();
		css = check_date(date_required)?'':'none';
		$("label#lbl_date_required").css("display",css);
		if(css == '') return false;
		var term = $("input#txt_term").val();
		term = parseInt(term, 10);
		css = isNaN(term)?'':'none';
		$("label#lbl_term").css("display",css);
		if(css == '') return false;
		var delivery_method = $("input#txt_delivery_method").val();
		delivery_method = parseInt(delivery_method, 10);
		css = isNaN(delivery_method)?'':'none';
		$("label#lbl_delivery_method").css("display",css);
		if(css == '') return false;
		var source = $("input#txt_source").val();
		source = parseInt(source, 10);
		css = isNaN(source)?'':'none';
		$("label#lbl_source").css("display",css);
		if(css == '') return false;
		var status = $("input#txt_status").val();
		status = parseInt(status, 10);
		css = isNaN(status)?'':'none';
		$("label#lbl_status").css("display",css);
		if(css == '') return false;
		var dispatch = $("input#txt_dispatch").val();
		dispatch = parseInt(dispatch, 10);
		css = isNaN(dispatch)?'':'none';
		$("label#lbl_dispatch").css("display",css);
		if(css == '') return false;
		var tax_1 = $("input#txt_tax_1").val();
		tax_1 = parseFloat(tax_1);
		css = isNaN(tax_1)?'':'none';
		$("label#lbl_tax_1").css("display",css);
		if(css == '') return false;
		var tax_2 = $("input#txt_tax_2").val();
		tax_2 = parseFloat(tax_2);
		css = isNaN(tax_2)?'':'none';
		$("label#lbl_tax_2").css("display",css);
		if(css == '') return false;
		var tax_3 = $("input#txt_tax_3").val();
		tax_3 = parseFloat(tax_3);
		css = isNaN(tax_3)?'':'none';
		$("label#lbl_tax_3").css("display",css);
		if(css == '') return false;
		return true;
	});
	$('input#txt_date_created').datetimepicker({});
	$('input#txt_date_required').datetimepicker({});
});
</script>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Order  </a> &gt &gt Order   </p>
<p class="highlightNavTitle"><span> Order   </span></p>
<p class="break"></p>

<?php if($v_error_message!=''){?>
<div class="msgbox_error">
    <?php echo $v_error_message;?>
</div>
<?php }?>

<form id="frm_tb_order" action="<?php echo URL.$v_admin_key;?>/<?php echo ($v_order_id==0)?'add':$v_order_id.'/edit'?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_order_id" name="txt_order_id" value="<?php echo $v_order_id;?>" />

<div id="tab-container" class='tab-container'>
    <ul class='etabs'>
        <li class='tab'><a href="#tab_infomation">Infomation </a></li>
        <li class='tab'><a href="#tab_price">Price</a></li>
    </ul>
    <div class='panel-container'>
        <div id="tab_infomation">
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                <tr align="right" valign="top">
                    <td>Location</td>
                    <td>&nbsp;</td>
                    <td align="left">
                        <?php echo $cls_tb_location->set_location_name_by_id($v_location_id); ?>
                        <input class="" size="50" type="hidden" id="txt_location_id" name="txt_location_id" value="<?php echo $v_location_id;?>" />
                        <label id="lbl_location_id" style="color:red;display:none;">(*)</label>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Po Number</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="" size="50" type="text" id="txt_po_number" name="txt_po_number" value="<?php echo $v_po_number;?>" />
                        <label id="lbl_po_number" style="color:red;display:none;">(*)</label>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Order Type</td>
                    <td>&nbsp;</td>
                    <td align="left">
                        <select id="txt_order_type" name="txt_order_type">
                            <?php  echo  $cls_settings->draw_option_by_id('order_type',0,$v_order_type);?>
                        </select>
                        <label id="lbl_order_type" style="color:red;display:none;">(*)</label>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Shipping Contact</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="" size="50" type="text" id="txt_shipping_contact" name="txt_shipping_contact" value="<?php echo $v_shipping_contact;?>" />
                        <label id="lbl_shipping_contact" style="color:red;display:none;">(*)</label>
                    </td>
                </tr>
            </table>
        </div>
        <div id="tab_price">
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                <tr align="right" valign="top">
                    <td>Total Order Amount</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="" size="50" type="text" id="txt_total_order_amount" name="txt_total_order_amount" value="<?php echo $v_total_order_amount;?>" />
                        <label id="lbl_total_order_amount" style="color:red;display:none;">(*)</label>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Total Discount</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="" size="50" type="text" id="txt_total_discount" name="txt_total_discount" value="<?php echo $v_total_discount;?>" />
                        <label id="lbl_total_discount" style="color:red;display:none;">(*)</label></td>
                </tr>
                <tr align="right" valign="top">
                    <td>Billing Contact</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="" size="50" type="text" id="txt_billing_contact" name="txt_billing_contact" value="<?php echo $v_billing_contact;?>" />
                        <label id="lbl_billing_contact" style="color:red;display:none;">(*)</label></td>
                </tr>
                <tr align="right" valign="top">
                    <td>Net Order Amount</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="" size="50" type="text" id="txt_net_order_amount" name="txt_net_order_amount" value="<?php echo $v_net_order_amount;?>" />
                        <label id="lbl_net_order_amount" style="color:red;display:none;">(*)</label></td>
                </tr>
                <tr align="right" valign="top">
                    <td>Gross Order Amount</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="" size="50" type="text" id="txt_gross_order_amount" name="txt_gross_order_amount" value="<?php echo $v_gross_order_amount;?>" />
                        <label id="lbl_gross_order_amount" style="color:red;display:none;">(*)</label></td>
                </tr>
                <tr align="right" valign="top">
                    <td>Job Description</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="" size="50" type="text" id="txt_job_description" name="txt_job_description" value="<?php echo $v_job_description;?>" />
                        <label id="lbl_job_description" style="color:red;display:none;">(*)</label></td>
                </tr>
                <tr align="right" valign="top">
                    <td>Sale Rep</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="" size="50" type="text" id="txt_sale_rep" name="txt_sale_rep" value="<?php echo $v_sale_rep;?>" />
                        <label id="lbl_sale_rep" style="color:red;display:none;">(*)</label></td>
                </tr>
            </table>
        </div>
    </div>
































<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<caption>Order [<?php echo $v_order_id>0?'Edit':'New';?>]</caption>



<tr align="right" valign="top">
		<td>Date Created</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_date_created" name="txt_date_created" value="<?php echo $v_date_created;?>" />
            <label id="lbl_date_created" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Date Required</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_date_required" name="txt_date_required" value="<?php echo $v_date_required;?>" />
            <label id="lbl_date_required" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Terms</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_term" name="txt_term">
                <?php  echo  $cls_settings->draw_option_by_id('terms',0,$v_term);?>
            </select>
            <label id="lbl_term" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Delivery Method</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_delivery_method" name="txt_delivery_method">
                <?php  echo  $cls_settings->draw_option_by_id('delivery_method',0,$v_delivery_method);?>
            </select>
            <label id="lbl_delivery_method" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Source</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="source_type" name="source_type">
                <?php  echo  $cls_settings->draw_option_by_id('source_type',0,$v_source);?>
            </select>
            <label id="lbl_source" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Status</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_status" name="txt_status">
                <?php  echo  $cls_settings->draw_option_by_id('order_status',0,$v_status);?>
            </select>
            <label id="lbl_status" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Dispatch</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_dispatch" name="txt_dispatch">
                <?php  echo  $cls_settings->draw_option_by_id('dispatch',0,$v_dispatch);?>
            </select>
           </td>
	</tr>
<tr align="right" valign="top">
		<td>Tax 1</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_tax_1" name="txt_tax_1" value="<?php echo $v_tax_1;?>" />
            <label id="lbl_tax_1" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Tax 2</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_tax_2" name="txt_tax_2" value="<?php echo $v_tax_2;?>" />
            <label id="lbl_tax_2" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Tax 3</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_tax_3" name="txt_tax_3" value="<?php echo $v_tax_3;?>" />
            <label id="lbl_tax_3" style="color:red;display:none;">(*)</label></td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_order" name="btn_submit_tb_order" value="Submit" class="button" /></td>
	</tr>
</table>
</form>