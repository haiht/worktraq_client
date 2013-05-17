<div class="[@ORDER_TABLE_CLASS_NAME]"><!-- td_2-->
    <div class="table_no float_left">[@ORDER_ORDER_NUMBER]</div>
    <div class="table_date float_left">[@ORDER_DATE]</div>
    <div class="table_po float_left">[@ORDER_PO_NUMBER]</div>
    <div class="table_lo float_left">[@ORDER_LOCATION_NAME]</div>
    <div class="table_to float_left right">[@ORDER_TOTAL_MONEY]</div>
    <div class="table_sta float_left">[@ORDER_STATUS]</div>
    <div class="table_ac1 float_left">
        <form class="field">
            <select rel="action_order" data-order-id=[@ORDER_ID] >
                <option value="0">Select....</option>
                [@OPTION_TYPE]
            </select>
        </form>
    </div>
</div>