<div rel="search-order" class="clear text text2" style="display:none">
    <form  action="[@URL]order" method="post">
        <div class="indent_form float_left create_h">
            <label class="float_left create_cl">PO Number :</label>
            <input id="txt_po_number" type="text" value="" name="txt_po_number" type="text" placeholder="PO Number" class="float_left" />
        </div>
        <div class="indent_form float_left create_h">
            <label class="float_left create_cl">Status :</label>
            <select id="txt_order_status" name="txt_order_status" type="text" placeholder="Order Ref" class="float_left" />
            <option value="0" selected="selected">---- Select All ----</option>
            [@ORDER_STATUS]
            </select>
        </div>
        <div class="indent_form float_left create_h">
            <label class="float_left create_cl">Created by :</label>
            <select id="txt_user_name" name="txt_user_name">
                <option value="" selected="selected">---- Select All ----</option>
                [@USER_NAME]
            </select>
        </div>
        <div class="clear">
            <div class="indent_form float_left create_h">
                <label class="float_left create_cl">From location :</label>
                <select id="txt_location_id" name="txt_location_id" class="float_left">
                    <option value="" selected="selected">---- Select All ----</option>
                    [@ORDER_LOCATION]
                </select>
            </div>
            <div class="indent_form float_left create_h">
                <label class="float_left create_cl">From :</label>
                <input type="text" placeholder="Order Ref" class="float_left" />
                <a href="#" class="cl"><img src="../images/calendar.png" /></a>
            </div>
            <div class="indent_form float_left create_h">
                <label class="float_left create_cl">To :</label>
                <input type="text" placeholder="Order Ref" class="float_left" />
                <a href="#" class="cl"><img src="../images/calendar.png" /></a>
            </div>
        </div>
    <div class="clear"></div>
    <div class="space">
        <input type="submit" name="txt_submit_search_order_form" value="Search" class="btn" />
    </div>
    <div class="clear"></div>

</div>