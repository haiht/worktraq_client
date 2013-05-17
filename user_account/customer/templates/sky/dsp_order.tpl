<script type="text/javascript">
    $(document).ready(function() {
        $("select[rel=action_order]").change(function(){
            var order_id = $(this).attr('data-order-id');
            if(order_id!="") location.href="[@URL]order/"+order_id+"/"+$(this).val();
        });
        $("input.btn_2").click(function(){
            $("div[rel=create-order]").toggle('slow');
        });
        $("input.btn_1").click(function(){
            $("div[rel=search-order]").toggle('slow');
        });
        $("#close_create_order").click(function(){
            $("div[rel=create-order]").hide('slow');
        });
        $("#btn_create_order").click(function(){
            document.location = 'catalogue/order';
        });

    });
</script>

<div id="content">
    <div class="sub">
        <a href="[@URL]">Home</a>
        <span class="icon_sub_next"></span>
        <a href="[@URL]/order" class="sub_active">Order </a>
    </div>
    <div class="line_or">
        <div class="title_r float_left">Order History</div>
        <form class="float_right">
            <input type="button" class="btn_1" value="Search Order" />
            <input type="button" class="btn_2" value="Create New Order" />
        </form>
        [@FORM_SEARCH]
        <div class="clear"></div>
        <div rel="create-order" class="clear text" style="display:none">
            <p>Are you sure you want to create a new order? After creating a new order, you can add items to your order from the Catalogue!</p>
            <p class="title_s">Create a new order?</p>
            <div class="space">
                <input type="submit" id="btn_create_order" value="Create New Order" class="btn" />
                <input type="button" id="close_create_order"  value="Close" class="btn" />
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="table">
        <div class="td_1">
            <div class="table_no float_left">No</div>
            <div class="table_date float_left">Date</div>
            <div class="table_po float_left">PO Number</div>
            <div class="table_lo float_left">Location Name</div>
            <div class="table_to float_left">Total ($)</div>
            <div class="table_sta float_left">Status</div>
            <div class="table_ac float_left">Action</div>
        </div>
        [@ORDER_ITEM_LIST]
    </div>
    <div class="device_page">
        <div class="indent">
            [@ORDER_PAGING]
        </div>
    </div>
</div>
</div>