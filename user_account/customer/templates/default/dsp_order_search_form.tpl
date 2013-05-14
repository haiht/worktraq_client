<link href="[@URL]lib/css/jquery_ui/cupertino/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<div class="clear text text2 text_insert hidden" id="order_search_form" name="order_search_form" >
    <form id="frm_order_search" method="post" action="[@URL]order/">
        <div class="indent_form float_left create_h">
            <label class="float_left create_cl">PO Number :</label>
            <input type="text" size="30" name="txt_po_number" id="txt_po_number" value="[@PO_NUMBER]" placeholder="PO Number" />
        </div>
        <div class="indent_form float_left create_h">
            <label class="float_left create_cl">From location :</label>
            <select id="txt_location_id" name="txt_location_id" class="text_color">
                <option value="" selected="selected">---- Select All ----</option>
                [@ORDER_LOCATION]
            </select>
        </div>
        <div class="indent_form float_left create_h">
            <label class="float_left create_cl">Status :</label>
            <select id="txt_order_status" name="txt_order_status" class="text_color">
                <option value="0" selected="selected">---- Select All ----</option>
                [@ORDER_STATUS]
            </select>
        </div>
        <div class="indent_form float_left create_h">
            <label class="float_left create_cl">Created by :</label>
            <select id="txt_user_name" name="txt_user_name" class="text_color">
                <option value="" selected="selected">---- Select All ----</option>
                [@USER_NAME]
            </select>
        </div>
        <div class="clear">
            <div class="indent_form float_left create_h create_h5">
                <label class="float_left create_cl">Create Date :</label>
                <input type="checkbox" name="txt_date_created" id="txt_date_created" value="1"[@CHECKED] />
            </div>
            <div class="indent_form float_left create_h">
                <label class="float_left create_cl">From :</label>
                <input type="text" size="15" name="txt_date_from" id="txt_date_from" value="[@DATE_FROM]" style="width: 110px" />

            </div>
            <div class="indent_form float_left create_h">
                <label class="float_left create_cl">To :</label>
                <input type="text" size="15" name="txt_date_to" id="txt_date_to" value="[@DATE_TO]" style="width: 100px" />

            </div>
        </div>
    <div class="space">
        <input type="hidden" name="txt_submit_search_order_form" />
        <input type="submit" class="btn_sup space2" value="Search" name="btn_order_search" />
    </div>
    </form>
    <div class="clear"></div>
</div>
<script type="text/javascript">
    $(document).ready(function(e) {

        $('input#txt_date_from').datepicker({
            dateFormat: 'dd-M-yy',
            changeMonth:true,
            changeYear:true,
            showOn:'both',
            buttonImage:"[@URL]images/_calendar.gif",
            buttonImageOnly:true
        });
        $('input#txt_date_to').datepicker({
            dateFormat: 'dd-M-yy',
            changeMonth:true,
            changeYear:true,
            showOn:'both',
            buttonImage:"[@URL]images/_calendar.gif",
            buttonImageOnly:true
        });
    });
</script>