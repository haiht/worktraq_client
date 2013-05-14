<div class="distribution_item">
    <div class="distribution_header" btn-location-id="[@LOCATION_ID]" > Location: [@LOCATION_NAME] <span class="color_r">Total price:  [@TOTAL_PRICE] </span> </div>

    <div class="table3 "  rel="location_[@LOCATION_ID]">
        <span class="float_left tab_5">
            <p><span class="capital">Address: </span><span class="normal">[@LOCATION_ADDRESS]</span></p>
        </span>
        <span class="float_left tab_5">
            <p><span class="capital">Shipping Date: </span>[@SHIPPING_STATUS]</p>
            <p><span class="capital">Tracking Number: </span>[@TRACKING_NUMBER]</p>
        </span>
        <div class="clear"></div>
    </div>
    <div class="table3" rel="location_[@LOCATION_ID]">
        <div class="table4">
            <div class="td_1">
                <div class="table_youritem float_left">
                    Your Items
                </div>
                <div class="table_name float_left">
                    Name
                </div>
                <div class="table_Quantity float_left">
                    Quantity
                </div>
                <div class="table_to float_left">
                    Unit Price
                </div>
                <div class="table_sta float_left">
                    Extended Price
                </div>
            </div>
            [@TABLE_DISTRIBUTION_ITEM]
        </div>
    </div>
</div>
