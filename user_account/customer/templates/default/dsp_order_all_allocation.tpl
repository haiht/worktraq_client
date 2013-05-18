[@ALLOCATION_SCRIPT]
<div class="sub">
    <a href="[@URL]">HOME</a>
    <span class="icon_sub_next"></span>
    <a href="[@URL]order" >order</a>
    <span class="icon_sub_next"></span>
    <a href class="sub_active" href="[@URL]order/allocation" >order</a>
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
            <div id="order_ref">
                <p class="clear"><span class="p_left float_left">Your PO # :</span><span class="p_color p_right">[@PO_NUMBER] </span></p>
                <p class="clear"><span class="p_left float_left">Your Order Reference :</span><span class="p_color">[@ORDER_DESCRIPTION]</span></p>
                <p class="clear"><span class="p_left float_left">Your Order Status :</span><span class="p_color">[@ORDER_STATUS]</span></p>
            </div>
            <div class="descript float_right">
                <span class="des_img">[@IMAGE_PRODUCT]</span>
            </div>
            <p class="clear"></p>
            <div class="indent">
                <div class="reate">
                    <div>
                        <p class="title_lef_dis2">Product Name: ABS Pump Topper - 3 Cent Litre Log [Package Type: Single]</p>
                        <div class="float_left box3">
                            <p class="title_3">all location</p>
                            <select id="txt_all_locations" name="txt_all_locations" class="txt_all_locations text_color" size="10">

                            </select>
                        </div>
                        <input id="btn_right"  type="button" class="button float_left">
                        <div class="float_right box4">
                            <p class="title_lef_dis3">Allocated locations</p>
                            <div class="table5">
                                <div class="td_1">
                                    <div class="table_yourpro float_left">Number</div>
                                    <div class="table_quali float_left">Name</div>
                                    <div class="table_unitprice float_left">Quantity</div>
                                    <div class="table_allow float_left">Allow over<br>threshold</div>
                                    <div class="table_extended float_left">Action</div>
                                </div>
                                <p class="clear"></p>
                            </div>
                        </div>
                        <p class="clear"></p>
                        <div class="total_price2">
                            <p>Quantity: <span class="color_blue" id="product_quanlity"></span></p>
                            <p class="float_left">Total remaining to allocate: </p>
                            <span class="color_blue color_r block float_left" id="location_quanlity"></span>
                            <input type="hidden" name="total_reamning_items"  id="total_reamning_items" value=""/>
                        </div>
                    </div>
                    <div class="line">
                        <input id="btn_save_allocation" type="button" class="btn_create" value="Save">
                        <input id="btn_caner" type="button" class="btn_create" value="cancel">
                    </div>
                </div>
                <p class="clear"></p>
            </div>
        </div>
    </div>
</div>
</div>