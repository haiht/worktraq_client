<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL ; ?>"> Account  </a>&gt&gt <a href="<?php echo URL .'admin'; ?>"> Order  </a> &gt&gt Change Status   </p>
<p class="highlightNavTitle"><span> Change Status <?php echo $v_order_ref;?>   </span></p>
<p class="break"></p>

<script type="text/javascript">
    $(document).ready(function(){
        $("form#frm_tb_order").submit(function(){
            if($("#txt_status").val()==0){
                alert("Select order status....");
                $("#txt_status").focus();
                return false;
            }
            return true;
        });
    });
</script>

<form id="frm_tb_order" action="<?php echo URL.$v_admin_key;?>/<?php echo $v_order_id.'/order_status'; ?>" method="POST">
    <input type="hidden" id="txt_order_id" name="txt_order_id" value="<?php echo $v_order_id;?>" />
    <input type="hidden" id="txt_location_id" name="txt_location_id" value="<?php echo $v_location_id;?>" />
    <input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
    <input type="hidden" id="txt_po_number" name="txt_po_number" value="<?php echo $v_po_number;?>" />
    <input type="hidden" id="txt_order_ref" name="txt_order_ref" value="<?php echo $v_order_ref;?>" />
    <input type="hidden" id="txt_date_created" name="txt_date_created" value="<?php echo $v_date_created;?>" />
    <input type="hidden" id="txt_user_create" name="txt_user_create" value="<?php echo $v_user_name;?>" />
    <input type="hidden" id="txt_user_create_order" name="txt_user_create_order" value="<?php echo $v_user_create_order;?>" />
    <input type="hidden" id="txt_contact_id" name="txt_user_create" value="<?php echo $v_contact_id;?>" />
    <input type="hidden" id="txt_email_user" name="txt_email_user" value="<?php echo $v_email;?>" />
    <input type="hidden" name="chk_send_email" value="1" checked="checked">
    <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
        <caption>Order [<?php echo $v_order_id>0?'Change Status!....':'New';?>]</caption>
        <tr align="right">
            <td width="180px">Order Ref</td>
            <td width="20px">&nbsp;</td>
            <td align="left"><?php echo $v_order_ref; ?></td>
        </tr>
        <tr align="right">
            <td>PO Number</td>
            <td>&nbsp;</td>
            <td align="left"><?php echo $v_po_number; ?></td>
        </tr>
        <tr align="right">
            <td>Order Date</td>
            <td>&nbsp;</td>
            <td align="left"><?php echo fdate($v_date_created); ?></td>
        </tr>
        <tr align="right">
            <td>Order User</td>
            <td>&nbsp;</td>
            <td align="left"><?php echo $v_user_create_order; ?></td>
        </tr>

        <tr align="right" valign="top">
            <td>Status</td>
            <td>&nbsp;</td>
            <td align="left">
                Current :
                <?php echo  $cls_settings->get_option_name_by_id('order_status',$v_status); ?> &nbsp &nbsp change to
                <select id="txt_status" name="txt_status">
                    <option value="0" selected="selected">-- Select -- </option>
                    <?php  echo  $cls_settings->draw_option_by_id('order_status',4,$v_status,array("5"));?>
                </select>
                <label id="lbl_status" style="color:red;display:none;">(*)</label></td>
        </tr>
        <tr align="center" valign="middle">
            <td colspan="3">
                <input type="submit" id="btn_submit_tb_order" name="btn_submit_tb_order" value="Save Order Status" class="button" />
                <input type="button" onclick="javascript:history(-1)" id="btn_cancel_tb_order" name="btn_cancel_tb_order" value="Cancel " class="button" />
            </td>
        </tr>
    </table>
</form>