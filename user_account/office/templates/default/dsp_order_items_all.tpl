                                <ul class="tr-row">                                                                
                                    <li class="td-cell"><span class="feature-img"><span><span><span><img src="[@PRODUCT_IMAGE]" width="98" /></span></span></span></span></li>
                                    <li class="td-cell align_left">[@PRODUCT_MATERIAL]</li>
                                    <li class="td-cell align_right">[@PRODUCT_QUANTITY]</li>
                                    <li class="td-cell align_right">[@PRODUCT_PRICE]</span></li>
                                    <li class="td-cell align_right">[@PRODUCT_AMOUNT]</span></li>
                                    <li class="td-cell">
                                        <div class="select-ganeral">
                                            <label>
                                                <!--<select style="padding:3px !important; font-size:12px" onChange="go_action(this,[@PRODUCT_ID])">-->
                                                <select [@SELECT_DISABLED] data-product-id="[@PRODUCT_ID]" data-order-id="[@ORDER_ID]" data-order-item-id="[@ORDER_ITEM_ID]" date-order-type="order_edit" data-image-id="[@GRAPHIC_ID]" data-image-url="[@PRODUCT_IMAGE]">
                                                    <option value="" selected>Select...</option>
                                                    [@ORDER_OPTION_ACTION]
                                                </select>
                                            </label>
                                        </div>
                                    </li>                               
                                </ul>
