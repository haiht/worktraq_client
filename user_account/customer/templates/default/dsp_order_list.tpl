<script src="[@URL]lib/ajaxupload/ajaxupload.js" type="text/javascript"></script>
<script type="text/javascript" src="[@URL]lib/js/jquery-ui-timepicker-addon.js.js"></script>
<script type="text/javascript" src="[@URL]lib/js/date.js"> </script>
<script type="text/javascript" src="[@URL]lib/js/yahoo-min.js"></script>
<script type="text/javascript" src="[@URL]lib/js/json-min.js"></script>

<link href="[@URL]lib/ajaxupload/css/listTheme/style.css" rel="stylesheet" type="text/css" />
<link href="[@URL]lib/css/jquery_ui/cupertino/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<link href="[@URL]lib/scrollbars/jquery.scrollbars.css" rel="stylesheet" type="text/css" />

<script>
    $(document).ready(function() {
        $("input#txt_date_required").datepicker({
            dateFormat: 'dd-M-yy',
            changeMonth:true,
            changeYear:true,
            showOn:'both',
            buttonImage:"[@URL_TEMPLATE]/images/calendar.gif",
            buttonImageOnly:true
        });

        $(".distribution_item").each(function(){
            //$(this).slideUp();
            $(".table3",this).each(function(){
                $(this).hide();
            });
        });
        $("#hide_all").click(function(){
           //$("#distribution_name").slideUp();
           $(".distribution_item").each(function(){
              //$(this).slideUp();
              $(".table3",this).each(function(){
                  $(this).hide();
              });
           });
        });
        $("#show_all").click(function(){
            $(".distribution_item").each(function(){
                //$(this).slideDown();
                $(".table3",this).each(function(){
                    $(this).show();
                });
            });
        });
        $("a.tab").click(function () {
            $(".active").removeClass("active");

             $(this).addClass("active");

            $(this).addClass("active");

            $(".content_table").hide();
            var content_show = $(this).attr("title");
            $("#"+content_show).show();
            return false;
        });
        $("input#btn_add_more").click(function(){
            window.location="[@URL]catalogue";
        });
        $('input#btn_submit_order').click(function(){
            check_save_order(2);
        });
        $('input#btn_disapprove_order').click(function(){
            $('form#frm_disapprove_order').submit();

        });
        $('input#btn_save_order').click(function(){
            check_save_order(1);
        });

        $(".distribution_header").click(function(){
            var location_id = $(this).attr("btn-location-id");
            $("div[rel=location_"+location_id+"]").slideToggle();
        });

        $('input#txt_order_ref').change(function(e) {
            var val = $(this).val();
            var order_id = $('input#txt_order_id').val();
            save_order_info('order_ref', val, order_id);
        });
        $('input#txt_date_required').change(function(e) {
            var val = $(this).val();
            var order_id = $('input#txt_order_id').val();
            save_order_info('date_required', val, order_id);
        });
        $('textarea#txt_order_description').change(function(e) {
            var val = $(this).val();
            var order_id = $('input#txt_order_id').val();
            save_order_info('description', val, order_id);
        });
        $('input#txt_po_number').change(function(){
            var val = $(this).val();
            val = $.trim(val);
            var id = $('input#txt_order_id').val();
            var $this = $(this);
            var color = $('input#txt_order_ref').css('color');
            id = parseInt(id, 10);
            if(isNaN(id) || id <0) id = 0;
            if(val!=''){
                $.ajax({
                    url	:	'[@AJAX_LOAD_ORDER_ALLOCATION_URL]',
                    type	:	'POST',
                    data	:	{txt_po_number:val, txt_order_id:id, txt_session_id:'[@SESSION_ID]', txt_order_ajax:105},
                    beforeSend: function(){
                    },
                    success	: function(data, type){
                        var err = readKey('error', data, 'int');
                        var msg = readKey('message', data);
                        if(err==0){
                            $this.css('color', color);
                        }else{
                            $this.css('color', 'red');
                            alert(msg);
                        }
                    }
                });

            }
        });
        $('input#btn_submit_order').click(function(){
            check_save_order(2);
        });
        $('input#btn_save_order').click(function(){
            check_save_order(1);
        });

        $("select[rel=act_order_item_id]").change(function(){
            var v_product_id = $(this).attr('data-product-id');
            var v_order_id = $(this).attr('data-order-id');
            var v_order_item_id = $(this).attr('data-order-item-id');
            var v_act = $(this).val();

            switch(v_act){
                case 'edit_item':
                    window.location = 'item/'+v_order_item_id
                    break;
                case 'delete_item':
                    if(confirm('Do you want to delete this item ')){
                        $.ajax({
                            url	:   '[@AJAX_LOAD_ORDER_ALLOCATION_URL]',
                            type	:	'POST',
                            data	:	{txt_product_id: v_product_id, txt_order_id:v_order_id, txt_order_item_id:v_order_item_id, txt_session_id:'[@SESSION_ID]', txt_order_ajax:104},
                            beforeSend: function(){
                            },
                            success	: function(data){
                                var ret = $.parseJSON(data);
                                if(ret.error==0)
                                    location.reload();
                                else
                                    alert(ret.message);
                            },
                            error: function(xhr, status, error){
                                alert("Error!" +'[@AJAX_LOAD_ORDER_ALLOCATION_URL]');
                            }
                        });
                    }
                    break;
                case 'allocation':
                    window.location = 'allocation/'+v_order_item_id+'/'+v_product_id+'/'
                    break;
            }
        });

    });
</script>
<script type="text/javascript">
function save_order_info(key, value, order){
    $.ajax({
        url	:	'[@AJAX_LOAD_ORDER_ALLOCATION_URL]',
        type	:	'POST',
        data	:	{txt_order_id:order, txt_order_key:key, txt_order_value:value, txt_session_id:'[@SESSION_ID]', txt_order_ajax:106},
        beforeSend: function(){
        },
        success	: function(data, type){
        }
    });
}
function check_save_order(order_status){
    $('input#txt_order_status').val(order_status);
    var po_number = $.trim($('input#txt_po_number').val());
    var order_ref = $.trim($('input#txt_order_ref').val());
    var order_desc = $.trim($('textarea#txt_order_description').val());
    var order_allocated = $.trim($('input#txt_order_allocated').val());
    var order_threshold = $.trim($('input#txt_order_threshold').val());

    order_allocated = parseInt(order_allocated, 10);
    order_threshold = parseInt(order_threshold, 10);
    if(isNaN(order_allocated) || order_allocated!=1) order_allocated = 0;
    if(isNaN(order_threshold)) order_threshold = 0;
    if(order_threshold!=1 && order_threshold!=2) order_threshold = 0;
    var date_required = Date.parse($('input#txt_date_required').val());
    var date_created = Date.parse($('input#txt_date_created').val());
    var msg = '';
    var ask = false;

    if(po_number==''){
        alert('Please input PO NUMBER for current order!');
        $('.wrap-tab ul li').eq(0).click();
        return;
    }

    if(order_ref==''){
        alert('Please input Order Ref for current order!');
        $('.wrap-tab ul li').eq(0).click();
        return;
    }

    if(order_status==2)
    {
        if(order_allocated==1){
            alert("Please allocation all your product first");
            order_status = 1;
        }else{
            if(order_threshold>=1){
                order_status = 1;
                return;
            }
        }
    }
    $('form#frm_order_information').submit();
}
</script>
<div class="sub">
    <a href="[@URL]">HOME</a>
    <span class="icon_sub_next"></span>
    <a class="sub_active" href="[@URL]order" >ORDERS</a>
    <span class="icon_sub_next"></span>
    <a class="sub_active" href="[@URL]order/[@ORDER_ID]/view" >ORDERS DETAILS</a>
</div>
</div>
</div>
<div class="content">
    <div class="float_right">
        <div class="title_r">
            order details
        </div>
        <div class="right_ct_pro_lates">
            <div id="order_ref">
                <p class="clear"><span class="p_left float_left">Your PO # :</span><span class="p_color p_right">[@PO_NUMBER]</span></p>
                <p class="clear"><span class="p_left float_left">Your Order Reference :</span><span class="p_color">[@PO_REF]</span></p>
                <p class="clear"><span class="p_left float_left">Your Order Status :</span><span class="p_color">[@ORDER_STATUS]</span></p>
                <p class="clear"><span class="p_left float_left">Total Quantity :</span><span class="p_color">[@TOTAL_QUANTITY]</span></p>
                <p class="clear"><span class="p_left float_left">Total Money :</span><span class="p_color">[@ALL_PRICE]</span></p>

            </div>
                <div class="indent">
                    <div class="box_2 tabs" id="tabs">
                        <div class="infor float_left" id="tab_item">
                            <a href="#" title="information" class="tab ">Information</a>
                        </div>
                        <div class="infor float_left">
                            <a href="#" title="item" class="tab active">Item</a>
                        </div>
                        <div class="infor float_left">
                            <a href="#" title="distribution" class="tab">Distribution</a>
                        </div>
                        <div class="infor float_left" style="[@TAB_WARNING_DISPLAY]" >
                            <a href="#" title="warning" class="tab tab2">Warning</a>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="reate">
                        <div class="right_ct_sup noborder content_table" id="information" style="display: none" >
                            [@ORDER_INFORMATION]
                        </div>
                        <div class="content_table" id="item" >
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
                                    <div class="table_ac float_left">
                                        ACTION
                                    </div>
                                </div>
                                [@TABLE_ORDER_ITEM]
                            </div>
                        </div>
                        <div class="content_table" id="distribution" style="display: none" >
                            <div class="btn_lates float_right">
                                <input class="btn" type="button" value="Expand all" id="show_all">
                                <input class="btn" type="button" value="Collapse all" id="hide_all">
                            </div>
                            <p class="clear"></p>
                            <div id="distribution_name">
                                [@TABLE_DISTRIBUTION]
                            </div>
                            <div class="table3 [@LOCATION_ID]" data-location-id="[@LOCATION_ID]" id="[@LOCATION_ID]">
                                <div class="total_price">
                                    <p>
                                        <span class="color_r">
                                        All price:  [@ALL_PRICE]
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <p class="clear"></p>
                        </div>
                        <div class="content_table" id="warning" style="display: none" >
                            [@WARNING_DISPLAY]
                            <p class="clear"></p>
                        </div>
                        <div class="line" [@STYLE]>
                            <input class="btn_create2" type="button" value="Add More Item" id="btn_add_more" [@ADD_BUTTON_ITEM]>
                            <input class="btn_create" type="button" value="Save Your Order" id="btn_save_order" [@SAVE_BUTTON_DISPLAY]>
                            <input id="btn_disapprove_order" type="button" class="btn_create btn btn-large btn-success" value="Disapprove Your Order" [@DIS_BUTTON_DISPLAY] />
                            <input class="btn_create" name="btn_submit_order" id="btn_submit_order" type="button" value="[@SUBMIT_BUTTON_TITLE] Your Order"  [@SUBMIT_BUTTON_DISPLAY]>
                        </div>
                </div>
                    <div class="clear"></div>
                </div>
        </div>
    </div>
</div>
