<div class="div_bo">
    <div class="reate">
        <div class="right_ct_sup noborder">
            <div class="indent_sup2">
                <form id="frm_order_information" method="post" action="[@URL]order/update">
                    <p class="required create_in">Fields marked with a * are required.</p>
                    <div class="indent_form clear create_h">
                        <label class="float_left create_cl">PO Number :</label>
                        <input name="txt_po_number" id="txt_po_number" type="text" placeholder="PO Number" class="float_left" value="[@PO_NUMBER]" [@READONLY] />
                        <div class="cl float_left"><span class="color_r">(*)</span></div>
                    </div>
                    <div class="indent_form clear create_h">
                        <label class="float_left create_cl">Order Ref :</label>
                        <input  name="txt_order_ref" id="txt_order_ref" type="text" placeholder="Order Ref" class="float_left"  value="[@ORDER_REF]"[@READONLY] />
                        <div class="cl float_left"><span class="color_r">(*)</span></div>
                    </div>
                    <div class="indent_form clear create_h2">
                        <label class="float_left create_cl">Notes :</label>
                        <textarea  id="txt_order_description" name="txt_order_description" class="float_left tex" [@READONLY] >[@ORDER_DESCRIPTION]</textarea>
                    </div>
                    <div class="indent_form clear create_h">
                        <label class="float_left create_cl">Date required :</label>
                        <input size="20" name="txt_date_required" id="txt_date_required" type="text" class="float_left tcal"  value="[@DATE_REQUIRED]" [@READONLY] />
                        <div class="cl float_left"><a href="#"><img src="../images/calendar.png" /></a></div>
                    </div>
                    <div class="indent_form clear create_h">
                        <div>
                            <label class="float_left create_cl">Date created :</label>
                            <input type="hidden" size="20" name="txt_date_created" id="txt_date_created" value="[@DATE_CREATED]" />
                            <label class="float_left create_cl text-l">[@DATE_CREATED]</label>
                            <label class="float_left create_cl">Order by :</label>
                            <label class="float_left create_cl text-l">[@ORDER_BY]</label>
                        </div>
                    </div>
                    <input type="hidden" name="txt_order_status" id="txt_order_status" value="[@ORDER_STATUS]" />
                    <input type="hidden" name="txt_order_id" id="txt_order_id" value="[@ORDER_ID]" />
                    <input type="hidden" name="txt_order_allocated" id="txt_order_allocated" value="[@ORDER_ALLOCATED]" />
                    <input type="hidden" name="txt_order_threshold" id="txt_order_threshold" value="[@ORDER_THRESHOLD]" />
                    <input type="hidden" name="txt_order_message" id="txt_order_message" value="[@ORDER_MESSAGE]" />
                </form>
            </div>
        </div>
    </div>
</div>