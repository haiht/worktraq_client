<link rel="stylesheet" type="text/css" href="[@URL_TEMP]/css/tcal.css" />
<script type="text/javascript" src="[@URL_TEMP]/js/tcal.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("input[rel=tab_order]").click(function(){
            var v_tab = $(this).attr('tab');
            $(this).addClass("active");
            $("#"+v_tab).show();
            $("input[rel=tab_order]").each(function(){
                var v_tab_orther = $(this).attr('tab');
                if(v_tab!=$(this).attr('tab')){
                    $(this).removeClass("active");
                    $("#"+v_tab_orther).hide();
                }
            });
        });

        $("div[rel=allocation]").click(function(){
            var location_id = $(this).attr('data-id');
            $("div[rel=location_"+location_id+"]").slideToggle();
        });
        $('input#txt_po_number').change(function(e) {
            var val = $(this).val();
            var order_id = $('input#txt_order_id').val();
            save_order_info('po_number', val, order_id);
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

        $('input#btn_submit_order').click(function(){
            check_save_order(2);
        });
        $('input#btn_save_order').click(function(){
            check_save_order(1);
        });
        $('input#btn_disapprove_order').click(function(){
        });
        $('form#frm_order_information').submit(function(e) {
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
                    data	:	{txt_po_number:val, txt_order_id:id, txt_session_id:'7sv3u9omt9srkppbgjgdurbhl1', txt_order_ajax:105},
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

    });
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
        if(date_required!=null)
        {
            if(date_required < date_created )
            {
                alert('Please check date required, the date required is not past the date created');
                return false;
            }
        }
        msg = $('input#txt_order_message').val();
        $('input#txt_order_status').val(order_status);
        $('form#frm_order_information').submit();
    }
</script>

<div id="content">
    <div class="sub">
        <a href="[@URL]">Home</a>
        <span class="icon_sub_next"></span>
        <a href="[@URL]order" class="sub_active">Order information</a>
    </div>
    <div class="line_or">
        <div class="title_r float_left">CREATE ORDER</div>
        <div class="clear"></div>
    </div>
    <div class="indent"> [@ORDER_INFO] </div>
    <div class="indent">
        <input rel="tab_order" tab="tab_infomation"  class="tab_order active" type="button" value="INFOMATION" >
        <input rel="tab_order" tab="tab_items" class="tab_order" type="button" value="ITEMS" >
        <input rel="tab_order" tab="tab_distribution" class="tab_order" type="button" value="DISTRIBUTION" >

        <div class="float_right">
            <input id="btn_save_order" type="button" value="SAVE YOUR ORDER" class="btn_new_order" />
            <input id="btn_submit_order" type="button" value="submit your order" class="btn_new_order" />
        </div>
    </div>
    <div id="tab_infomation">
        [@ORDER_INFORMATION]
    </div>
    <div id="tab_items" style="display: none">
        <div class="div_bo">
            <div class="table2">
                <div class="td_1">
                    <div class="table_no float_left">Your Items</div>
                    <div class="table_date float_left">Name</div>
                    <div class="table_po float_left">Quantity</div>
                    <div class="table_lo float_left">Unit Price</div>
                    <div class="table_to float_left">Extended Price</div>
                    <div class="table_to float_left">Action</div>
                </div>
                [@ORDER_DETAIL_ITEMS]
            </div>
        </div>
    </div>
    <div id="tab_distribution" style="display: none">
        <div class="div_bo">
            [@ORDER_DETAIL_ALLOCATION]
        </div>
    </div>
</div>