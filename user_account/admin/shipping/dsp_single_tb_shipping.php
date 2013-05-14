<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_shipping").click(function(e){
		var css = '';

		var shipping_id = $("input#txt_shipping_id").val();
		shipping_id = parseInt(shipping_id, 10);
		css = isNaN(shipping_id)?'':'none';
		$("label#lbl_shipping_id").css("display",css);
		if(css == '') return false;
		var shipper = $("input#txt_shipper").val();
		shipper = $.trim(shipper);
		css = shipper==''?'':'none';
		$("label#lbl_shipper").css("display",css);
		if(css == '') return false;
		var tracking_number = $("input#txt_tracking_number").val();
		tracking_number = $.trim(tracking_number);
		css = tracking_number==''?'':'none';
		$("label#lbl_tracking_number").css("display",css);
		if(css == '') return false;
		var tracking_url = $("input#txt_tracking_url").val();
		tracking_url = $.trim(tracking_url);
		css = tracking_url==''?'':'none';
		$("label#lbl_tracking_url").css("display",css);
		if(css == '') return false;
		var date_shipping = $("input#txt_date_shipping").val();
		css = check_date(date_shipping)?'':'none';
		$("label#lbl_date_shipping").css("display",css);
		if(css == '') return false;
		var ship_status = $("input#txt_ship_status").val();
		ship_status = parseInt(ship_status, 10);
		css = isNaN(ship_status)?'':'none';
		$("label#lbl_ship_status").css("display",css);
		if(css == '') return false;
		var ship_create_by = $("input#txt_ship_create_by").val();
		ship_create_by = $.trim(ship_create_by);
		css = ship_create_by==''?'':'none';
		$("label#lbl_ship_create_by").css("display",css);
		if(css == '') return false;
		var ship_create_date = $("input#txt_ship_create_date").val();
		css = check_date(ship_create_date)?'':'none';
		$("label#lbl_ship_create_date").css("display",css);
		if(css == '') return false;
		var location_from = $("input#txt_location_from").val();
		location_from = parseInt(location_from, 10);
		css = isNaN(location_from)?'':'none';
		$("label#lbl_location_from").css("display",css);
		if(css == '') return false;
		var location_id = $("input#txt_location_id").val();
		location_id = parseInt(location_id, 10);
		css = isNaN(location_id)?'':'none';
		$("label#lbl_location_id").css("display",css);
		if(css == '') return false;
		var location_name = $("input#txt_location_name").val();
		location_name = $.trim(location_name);
		css = location_name==''?'':'none';
		$("label#lbl_location_name").css("display",css);
		if(css == '') return false;
		var location_address = $("input#txt_location_address").val();
		location_address = $.trim(location_address);
		css = location_address==''?'':'none';
		$("label#lbl_location_address").css("display",css);
		if(css == '') return false;
		var company_id = $("input#txt_company_id").val();
		company_id = parseInt(company_id, 10);
		css = isNaN(company_id)?'':'none';
		$("label#lbl_company_id").css("display",css);
		if(css == '') return false;
		var shipping_detail = $("input#txt_shipping_detail").val();
		shipping_detail = $.trim(shipping_detail);
		css = shipping_detail==''?'':'none';
		$("label#lbl_shipping_detail").css("display",css);
		if(css == '') return false;
		return true;
	});
	$('input#txt_date_shipping').kendoDatePicker({format:"dd-MMM-yyyy"});
	$('input#txt_ship_create_date').kendoDatePicker({format:"dd-MMM-yyyy"});
	var tab_strip = $("#data_single_tab").kendoTabStrip({
		animation:  {
			open: {
				effects: "fadeIn"
			}
		}
	}).data("kendoTabStrip");
	var tooltip = $("#tooltip").kendoTooltip({
		width: 120,
		position: "top"
	}).data("kendoTooltip");
	if(tooltip) tooltip.show();
	var validator = $("div.information").kendoValidator().data("kendoValidator");
	var combo_company = $('select#txt_company_id').data('kendoComboBox');
	<?php if($v_company_id <= 0){;?>
	$('select#txt_company_id').change(function(e){
		var company_id = $(this).val();
		company_id = parseInt(company_id, 10);
		if(isNaN(company) || company_id <0) company_id = 0;
		$('form#frm_tb_shipping').find('#txt_company_id').val(company_id);
		});
	<?php }else{;?>
		combo_company.enable(false);
	<?php };?>
});
</script>
    <div id="div_body">
        <div id="div_splitter_content" style="height: 100%; width: 100%;">
            <div id="div_left_pane">
                <div class="pane-content">
                	<div id="div_treeview"></div>
                </div>
            </div>
            <div id="div_right_pane">
                <div class="pane-content">
                    <div id="div_title" class="k-block k-widget">
                        <h3>Shipping</h3>
                    </div>
                    <div id="div_quick">
                        <div id="div_quick_search">
                        &nbsp;
                        </div>
                        <div id="div_select">
                            <form id="frm_company_id" method="post">
                        Company: <select id="txt_company_id" name="txt_company_id">
                                    <option value="0" selected="selected">-------</option>
                                    <?php
                                    echo $v_dsp_company_option;
                                    ?>
                                </select>
                            </form>
                        </div>
                    </div>

<form id="frm_tb_shipping" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_shipping_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_shipping_id" name="txt_shipping_id" value="<?php echo $v_shipping_id;?>" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                        <li>Other</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="right" valign="top">
		<td>Shipper</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_shipper" name="txt_shipper" value="<?php echo $v_shipper;?>" /> <label id="lbl_shipper" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Tracking Number</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_tracking_number" name="txt_tracking_number" value="<?php echo $v_tracking_number;?>" /> <label id="lbl_tracking_number" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Tracking Url</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_tracking_url" name="txt_tracking_url" value="<?php echo $v_tracking_url;?>" /> <label id="lbl_tracking_url" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Date Shipping</td>
		<td>&nbsp;</td>
		<td align="left"><input type="text" id="txt_date_shipping" name="txt_date_shipping" value="<?php echo $v_date_shipping;?>" /> <label id="lbl_date_shipping" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Ship Status</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_ship_status" name="txt_ship_status" value="<?php echo $v_ship_status;?>" /> <label id="lbl_ship_status" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Ship Create By</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_ship_create_by" name="txt_ship_create_by" value="<?php echo $v_ship_create_by;?>" /> <label id="lbl_ship_create_by" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Ship Create Date</td>
		<td>&nbsp;</td>
		<td align="left"><input type="text" id="txt_ship_create_date" name="txt_ship_create_date" value="<?php echo $v_ship_create_date;?>" /> <label id="lbl_ship_create_date" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Location From</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_location_from" name="txt_location_from" value="<?php echo $v_location_from;?>" /> <label id="lbl_location_from" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Location Id</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_location_id" name="txt_location_id" value="<?php echo $v_location_id;?>" /> <label id="lbl_location_id" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Location Name</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_location_name" name="txt_location_name" value="<?php echo $v_location_name;?>" /> <label id="lbl_location_name" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Location Address</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_location_address" name="txt_location_address" value="<?php echo $v_location_address;?>" /> <label id="lbl_location_address" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Company Id</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" /> <label id="lbl_company_id" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Shipping Detail</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_shipping_detail" name="txt_shipping_detail" value="<?php echo $v_shipping_detail;?>" /> <label id="lbl_shipping_detail" class="k-required">(*)</label></td>
	</tr>
</table>
                    </div>
                    <div class="other div_details">
                    </div>
                   </div>
                   <?php if(isset($v_act) && in_array($v_act, array('E', 'N'))){?>
                   <?php if($v_error_message!=''){?>
                    <div class="k-block k-widget k-error-colored div_errors">
                    <?php echo $v_error_message;?>
                    </div>
                    <?php }?>
                    <div class="k-block k-widget div_buttons">
                    <input type="submit" id="btn_submit_tb_shipping" name="btn_submit_tb_shipping" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
