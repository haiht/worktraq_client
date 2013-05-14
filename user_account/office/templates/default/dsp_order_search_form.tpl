<link href="[@URL]lib/css/jquery_ui/cupertino/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<div class="popup popup-search hidden">
<a href="javascript:void(0)" title="Close" class="btn-close close-popup">X</a>   
 <div class="search">
<form id="frm_order_search" method="post" action="[@URL]order/">
<table class="order_information_table">
  <tr>
    <td>PO Number</td>
    <td>&nbsp;</td>
    <td><input type="text" size="30" name="txt_po_number" id="txt_po_number" value="[@PO_NUMBER]" /></td>
  </tr>
  <tr>
    <td>Status</td>
    <td>&nbsp;</td>
    <td>
    <select id="txt_order_status" name="txt_order_status">
    	<option value="0" selected="selected">---- Select All ----</option>
        [@ORDER_STATUS]
    </select>
    </td>
  </tr>
  <tr>
    <td>Created by</td>
    <td>&nbsp;</td>
    <td>
    <select id="txt_user_name" name="txt_user_name">
    	<option value="" selected="selected">---- Select All ----</option>
        [@USER_NAME]
    </select>
    </td>
  </tr>
  <tr>
    <td>From location</td>
    <td>&nbsp;</td>
    <td>
    <select id="txt_location_id" name="txt_location_id">
    	<option value="" selected="selected">---- Select All ----</option>
        [@ORDER_LOCATION]
    </select>
    </td>
  </tr>
  <tr>
    <td>Created date</td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="txt_date_created" id="txt_date_created" value="1"[@CHECKED] /> 
    </td>
  </tr>
  <tr>
    <td>From</td>
    <td>&nbsp;</td>
    <td><input type="text" size="15" name="txt_date_from" id="txt_date_from" value="[@DATE_FROM]" /> 
    </td>
  </tr>
  <tr>
    <td>To</td>
    <td>&nbsp;</td>
    <td><input type="text" size="15" name="txt_date_to" id="txt_date_to" value="[@DATE_TO]" /> 
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
    <input type="hidden" name="txt_submit_search_order_form" />
    <input type="submit" value="Search" name="btn_order_search" class="btn btn-large btn-primary" /> 
    </td>
  </tr>
</table>
</form>
</div>
</div>
<style type="text/css">
.order_information_table{
	width:900px;
	border:none;
}
.order_information_table tr{
	text-align:left;
	vertical-align:top !important;
}
.order_information_table tr td{
	padding:4px;
}
.order_information_table tr td:first-child{
	width:300px;
	text-align:right;
}
order_information_table tr td:last-child{
	width:590px;
}
</style>
<script type="text/javascript">
$(document).ready(function(e) {
	
	$('input#txt_date_from').datepicker({
		dateFormat: 'dd-M-yy',
		changeMonth:true,
		changeYear:true,
		showOn:'both',
		buttonImage:"[@URL]images/_calendar.gif",
		buttonImageOnly:true
	});
	$('input#txt_date_to').datepicker({
		dateFormat: 'dd-M-yy',
		changeMonth:true,
		changeYear:true,
		showOn:'both',
		buttonImage:"[@URL]images/_calendar.gif",
		buttonImageOnly:true
	});
});
</script>