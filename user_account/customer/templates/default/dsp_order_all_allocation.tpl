<div class="sub">
    <a href="[@URL]">HOME</a>
    <span class="icon_sub_next"></span>
    <a class="sub_active" href="[@URL]order" >order</a>
    <span class="icon_sub_next"></span>
    <span class="sub_active"> <a href="[@URL]order/allocation"> Alliocation </a></span>

</div>
</div>
</div>

<div class="content">
    <input type="hidden" id="data-order-id" value="[@order_id]" />
    <input type="hidden" id="data-order-item-id" value="[@order_item_id]" />
    <input type="hidden" id="data-product-id" value="[@PRODUCT_ID]" />
    <div class="float_right">
        <div class="title_r">order details</div>
        <div class="right_ct_pro_lates">
            <div class="indent">
                <div class="reate">
                    <div>
                        <p class="title_lef_dis2">Product Name: [@PRODUCT_NAME]</p>
                        <div class="float_right box4">
                            <div class="table5" id="table5">
                                <div class="td_1">
                                    <div class="table_yourpro float_left">#</div>
                                    <div class="table_quali float_left">Location Number</div>
                                    <div class="table_quali float_left">Location Number</div>
                                    <div class="table_unitprice float_left">Quantity</div>
                                    <div class="table_extended float_left">Action</div>
                                </div>
                                <p class="clear"></p>
                                [@ALLOCATION_ITEMS]
                            </div>
                        </div>
                        <p class="clear"></p>
                        <div class="total_price2">
                            <p>Quantity: <span class="color_blue " id="product_quanlity"></span></p>
                            <p class="float_left">Remaining to allocate: </p>
                            <span class="color_blue block float_left" id="location_quanlity"></span>
                        </div>
                    </div>
                    <div class="line">
                        <input type="button" id="btn_save_allocation" value="Save" class="btn_create" />
                        <input type="button" id="btn_caner" value="cancel" class="btn_create" />
                    </div>
                </div>
                <p class="clear"></p>
            </div>
        </div>
    </div>
</div>
</div>