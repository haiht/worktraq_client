<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
    $(document).ready(function(){
        $("form#frm_tb_order_items").submit(function(){
            var css = '';

            var order_item_id = $("input#txt_order_item_id").val();
            order_item_id = parseInt(order_item_id, 10);
            css = isNaN(order_item_id)?'':'none';
            $("label#lbl_order_item_id").css("display",css);
            if(css == '') return false;
            var order_id = $("input#txt_order_id").val();
            order_id = $.trim(order_id);
            css = order_id==''?'':'none';
            $("label#lbl_order_id").css("display",css);
            if(css == '') return false;
            var product_id = $("input#txt_product_id").val();
            product_id = $.trim(product_id);
            css = product_id==''?'':'none';
            $("label#lbl_product_id").css("display",css);
            if(css == '') return false;
            var product_code = $("input#txt_product_code").val();
            product_code = $.trim(product_code);
            css = product_code==''?'':'none';
            $("label#lbl_product_code").css("display",css);
            if(css == '') return false;
            var quantity = $("input#txt_quantity").val();
            quantity = parseInt(quantity, 10);
            css = isNaN(quantity)?'':'none';
            $("label#lbl_quantity").css("display",css);
            if(css == '') return false;
            var description = $("input#txt_description").val();
            description = $.trim(description);
            css = description==''?'':'none';
            $("label#lbl_description").css("display",css);
            if(css == '') return false;
            var customization_information = $("input#txt_customization_information").val();
            customization_information = $.trim(customization_information);
            css = customization_information==''?'':'none';
            $("label#lbl_customization_information").css("display",css);
            if(css == '') return false;
            var width = $("input#txt_width").val();
            width = parseFloat(width);
            css = isNaN(width)?'':'none';
            $("label#lbl_width").css("display",css);
            if(css == '') return false;
            var height = $("input#txt_height").val();
            height = parseFloat(height);
            css = isNaN(height)?'':'none';
            $("label#lbl_height").css("display",css);
            if(css == '') return false;
            var graphic_file = $("input#txt_graphic_file").val();
            graphic_file = $.trim(graphic_file);
            css = graphic_file==''?'':'none';
            $("label#lbl_graphic_file").css("display",css);
            if(css == '') return false;
            var original_price = $("input#txt_original_price").val();
            original_price = parseFloat(original_price);
            css = isNaN(original_price)?'':'none';
            $("label#lbl_original_price").css("display",css);
            if(css == '') return false;
            var discount_price = $("input#txt_discount_price").val();
            discount_price = parseFloat(discount_price);
            css = isNaN(discount_price)?'':'none';
            $("label#lbl_discount_price").css("display",css);
            if(css == '') return false;
            var current_price = $("input#txt_current_price").val();
            current_price = parseFloat(current_price);
            css = isNaN(current_price)?'':'none';
            $("label#lbl_current_price").css("display",css);
            if(css == '') return false;
            var unit_price = $("input#txt_unit_price").val();
            unit_price = parseFloat(unit_price);
            css = isNaN(unit_price)?'':'none';
            $("label#lbl_unit_price").css("display",css);
            if(css == '') return false;
            var status = $("input#txt_status").val();
            status = parseInt(status, 10);
            css = isNaN(status)?'':'none';
            $("label#lbl_status").css("display",css);
            if(css == '') return false;
            var discount_type = $("input#txt_discount_type").val();
            discount_type = parseFloat(discount_type);
            css = isNaN(discount_type)?'':'none';
            $("label#lbl_discount_type").css("display",css);
            if(css == '') return false;
            var discount_per_unit = $("input#txt_discount_per_unit").val();
            discount_per_unit = parseFloat(discount_per_unit);
            css = isNaN(discount_per_unit)?'':'none';
            $("label#lbl_discount_per_unit").css("display",css);
            if(css == '') return false;
            var net_price = $("input#txt_net_price").val();
            net_price = parseFloat(net_price);
            css = isNaN(net_price)?'':'none';
            $("label#lbl_net_price").css("display",css);
            if(css == '') return false;
            var extended_amount = $("input#txt_extended_amount").val();
            extended_amount = parseInt(extended_amount, 10);
            css = isNaN(extended_amount)?'':'none';
            $("label#lbl_extended_amount").css("display",css);
            if(css == '') return false;
            return true;
        });
    });
</script>
<form id="frm_tb_order_items" action="?a=ACC&acc=ACT" method="POST">
    <input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
    <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
        <caption>Order_items [<?php echo $v_order_item_id>0?'Edit':'New';?>]</caption>
            <?php if($v_error_message!=''){?>
                <tr align="left" valign="top">
                    <td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
                </tr>
                <?php }?>
            <tr align="right" valign="top">
                <td width="30%">Order Item Id</td>
                <td width="1%">&nbsp;</td>
                <td align="left" width="69%"><input class="" size="50" type="text" id="txt_order_item_id" name="txt_order_item_id" value="<?php echo $v_order_item_id;?>" /> <label id="lbl_order_item_id" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Order Id</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_order_id" name="txt_order_id" value="<?php echo $v_order_id;?>" /> <label id="lbl_order_id" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Product Id</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_product_id" name="txt_product_id" value="<?php echo $v_product_id;?>" /> <label id="lbl_product_id" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Product Code</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_product_code" name="txt_product_code" value="<?php echo $v_product_code;?>" /> <label id="lbl_product_code" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Quantity</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_quantity" name="txt_quantity" value="<?php echo $v_quantity;?>" /> <label id="lbl_quantity" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Description</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_description" name="txt_description" value="<?php echo $v_description;?>" /> <label id="lbl_description" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Customization Information</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_customization_information" name="txt_customization_information" value="<?php echo $v_customization_information;?>" /> <label id="lbl_customization_information" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Width</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_width" name="txt_width" value="<?php echo $v_width;?>" /> <label id="lbl_width" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Height</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_height" name="txt_height" value="<?php echo $v_height;?>" /> <label id="lbl_height" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Graphic File</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_graphic_file" name="txt_graphic_file" value="<?php echo $v_graphic_file;?>" /> <label id="lbl_graphic_file" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Original Price</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_original_price" name="txt_original_price" value="<?php echo $v_original_price;?>" /> <label id="lbl_original_price" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Discount Price</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_discount_price" name="txt_discount_price" value="<?php echo $v_discount_price;?>" /> <label id="lbl_discount_price" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Current Price</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_current_price" name="txt_current_price" value="<?php echo $v_current_price;?>" /> <label id="lbl_current_price" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Unit Price</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_unit_price" name="txt_unit_price" value="<?php echo $v_unit_price;?>" /> <label id="lbl_unit_price" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Status</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_status" name="txt_status" value="<?php echo $v_status;?>" /> <label id="lbl_status" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Discount Type</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_discount_type" name="txt_discount_type" value="<?php echo $v_discount_type;?>" /> <label id="lbl_discount_type" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Discount Per Unit</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_discount_per_unit" name="txt_discount_per_unit" value="<?php echo $v_discount_per_unit;?>" /> <label id="lbl_discount_per_unit" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Net Price</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_net_price" name="txt_net_price" value="<?php echo $v_net_price;?>" /> <label id="lbl_net_price" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Extended Amount</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_extended_amount" name="txt_extended_amount" value="<?php echo $v_extended_amount;?>" /> <label id="lbl_extended_amount" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="center" valign="middle">
                <td colspan="3"><input type="submit" id="btn_submit_tb_order_items" name="btn_submit_tb_order_items" value="Submit" class="button" /></td>
            </tr>
    </table>
</form>