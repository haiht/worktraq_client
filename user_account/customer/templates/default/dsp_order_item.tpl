
<div class="[@ORDER_TABLE_CLASS_NAME] td_4"><!-- td_2-->
    <div class="table_no float_left">[@ORDER_ORDER_NUMBER]</div>
    <div class="table_date float_left">[@ORDER_DATE]</div>
    <div class="table_po float_left">
        <span  href="#" class="with-tooltip" title="[@TOOL_TIP]">
            [@ORDER_PO_NUMBER]
        </span>
    </div>
    <div class="table_lo float_left">[@ORDER_LOCATION_NAME]</div>
    <div class="table_to float_left"><span class="color_r2">[@ORDER_TOTAL_MONEY]</span></div>
    <div class="table_sta float_left">[@ORDER_STATUS]</div>
    <div class="table_ac1 float_left" id="div_select">
        <form class="field" method="post" class="form_select">
            <select data-order-id="[@ORDER_ID]" date-order-type="order_edit" class="text_color" >
                <option value="">Select....</option>
                [@OPTION_TYPE]
            </select>
        </form>
    </div>
</div>
<p class="clear"></p>
