<ul class="tr-row">
    <li class="td-cell">[@ORDER]</li>
    <li class="td-cell">[@ORDER_DATE]</li>
    <li class="td-cell align_left">[@PO_NUMBER]</li>
    <li class="td-cell align_left">[@LOCATION_NAME]</li>
    <li class="td-cell align_right">[@TOTAL_PRICE]</li>
    <li class="td-cell">[@ORDER_STATUS]</li>
    <li class="td-cell">
        <div class="select-ganeral">
            <label>
                <select class="text_color" data-order-id="[@ORDER_ID]" data-order-type="order_history">
                    <option selected>Select...</option>
                    [@OPTION_SELECT]
                </select>
            </label>
        </div>
    </li>
</ul>