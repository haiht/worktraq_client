<div class="[@TABLE_CLASS]">
    <div class="table_no float_left"><img src="[@PRODUCT_IMAGE]" width="98" /> </div>
    <div class="table_date float_left">[@PRODUCT_MATERIAL]</div>
    <div class="table_po float_left">[@PRODUCT_QUANTITY]</div>
    <div class="table_lo float_left">[@PRODUCT_PRICE]</div>
    <div class="table_to float_left">[@PRODUCT_AMOUNT]</div>
    <div class="table_to float_left">
        <form class="field">
            <select [@SELECT_DISABLED] data-product-id="[@PRODUCT_ID]" data-order-id="[@ORDER_ID]" data-order-item-id="[@ORDER_ITEM_ID]" date-order-type="order_edit" data-image-id="[@GRAPHIC_ID]" data-image-url="[@PRODUCT_IMAGE]">
                <option value="" selected>Select...</option>
                [@ORDER_OPTION_ACTION]
            </select>
        </form>
    </div>
</div>
<div class="clear"></div>
