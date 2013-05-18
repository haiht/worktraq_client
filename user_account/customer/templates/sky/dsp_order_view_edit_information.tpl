            <div class="indent_sup2">
                <form id="frm_disapprove_order" method="post" action="[@URL]order/disapprove" style="display:none">
                    <input type="hidden" name="txt_order_id" id="txt_order_id" value="[@ORDER_ID]" />
                </form>
                <form id="frm_order_information" method="post" action="[@URL]order/update">
                    <p class="required create_in"></p>
                    <div class="indent_form clear create_h">
                        <label class="float_left create_cl">PO NUMBER</label>
                        <input class="float_left" name="txt_po_number" id="txt_po_number" type="text" value="[@PO_NUMBER]" [@READONLY] >
                        <span class="color_r float_left"> (*)</span>
                    </div>
                    <div class="indent_form clear create_h">
                        <label class="float_left create_cl">ORDER REF</label>
                        <input class="float_left"  name="txt_order_ref" id="txt_order_ref" type="text" value="[@ORDER_REF]"[@READONLY]>
                        <span class="color_r float_left""> (*)</span>
                    </div>
                    <div class="indent_form clear create_h2">
                        <label class="float_left create_cl"> Notes :</label>
                        <textarea name="txt_order_description" id="txt_order_description" class="float_left tex" [@READONLY]>
                        [@ORDER_DESCRIPTION]
                        </textarea>
                    </div>
                    <div class="indent_form clear create_h">
                        <label class="float_left create_cl">Date Required</label>
                        <input class="float_left sizecr" size="20" name="txt_date_required" id="txt_date_required" type="text" value="[@DATE_REQUIRED]"[@READONLY]>
                    </div>
                    <div class="indent_form clear create_h">
                        <label class="float_left create_cl">Date Created</label>
                        <input type="hidden" size="20" name="txt_date_created" id="txt_date_created" value="[@DATE_CREATED]" />
                        <label class="float_left create_cl">[@DATE_CREATED]</label>
                    </div>
                    <input type="hidden" name="txt_order_status" id="txt_order_status" value="[@ORDER_STATUS]" />
                    <input type="hidden" name="txt_order_id" id="txt_order_id" value="[@ORDER_ID]" />
                    <input type="hidden" name="txt_order_allocated" id="txt_order_allocated" value="[@ORDER_ALLOCATED]" />
                    <input type="hidden" name="txt_order_threshold" id="txt_order_threshold" value="[@ORDER_THRESHOLD]" />
                    <input type="hidden" name="txt_order_message" id="txt_order_message" value="[@ORDER_MESSAGE]" />
                    <div>
                    </div>
                </form>
            </div>
