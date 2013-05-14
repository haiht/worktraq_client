<form id="frm_order_information" method="post" action="[@URL]order/update">
<table class="order_information_table">
  <tr>
    <td>PO Number (*)</td>
    <td>&nbsp;</td>
    <td>&nbsp;<input type="text" style="width: 400px;" size="80" name="txt_po_number" id="txt_po_number" value="[@PO_NUMBER]"[@READONLY] /><label id="lbl_po_number"></label></td>
  </tr>
  <tr>
    <td>Order Ref (*)</td>
    <td>&nbsp;</td>
    <td>&nbsp;<input type="text" style="width: 400px;"size="80" name="txt_order_ref" id="txt_order_ref" value="[@ORDER_REF]"[@READONLY] /></td>
  </tr>
  <tr>
    <td>Notes</td>
    <td>&nbsp;</td>
    <td>&nbsp;<textarea id="txt_order_description" name="txt_order_description" style="width: 500px;" rows="10"[@READONLY]>[@ORDER_DESCRIPTION]</textarea></td>
  </tr>
  <tr>
    <td>Date required</td>
    <td>&nbsp;</td>
    <td>&nbsp;<input type="text" size="20" name="txt_date_required" id="txt_date_required" value="[@DATE_REQUIRED]"[@READONLY] /> 
    </td>
  </tr>
  <tr>
    <td>Date created</td>
    <td>&nbsp;</td>
    <td>&nbsp;[@DATE_CREATED]
        <input type="hidden" size="20" name="txt_date_created" id="txt_date_created" value="[@DATE_CREATED]" />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Order by: [@ORDER_BY]
    </td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
  	<td>&nbsp;</td>
    <td>(*) Required fields</td>
  </tr>
</table>
<input type="hidden" name="txt_order_status" id="txt_order_status" value="[@ORDER_STATUS]" />
<input type="hidden" name="txt_order_id" id="txt_order_id" value="[@ORDER_ID]" />
<input type="hidden" name="txt_order_allocated" id="txt_order_allocated" value="[@ORDER_ALLOCATED]" />
<input type="hidden" name="txt_order_threshold" id="txt_order_threshold" value="[@ORDER_THRESHOLD]" />
<input type="hidden" name="txt_order_message" id="txt_order_message" value="[@ORDER_MESSAGE]" />
</form>
<style type="text/css">
.order_information_table{
	width:900px;
	border:none;
}
.order_information_table tr{
	text-align:left;
	vertical-align:top;
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