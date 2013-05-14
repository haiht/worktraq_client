<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
    $(document).ready(function(){
        $("form#frm_tb_order_item").submit(function(){
			var val='';
			var found = false;
			$('input#txt_tracking_company').each(function(index, element) {
				val = $.trim($(this).val());
				if(val==''){
                    alert("<?php echo $cls_tb_message->select_value('invalid_tracking_company'); ?>");
					$(this).focus();
					found = true;
					return false;
				}
            });
			if(found) return false;
			$('input#txt_tracking_number').each(function(index, element) {
				val = $.trim($(this).val());
				if(val==''){
                    alert("<?php echo $cls_tb_message->select_value('invalid_tracking_number'); ?>");
					$(this).focus();
					found = true;
					return false;
				}
            });
			if(found) return false;
			$('input#txt_tracking_url').each(function(index, element) {
				val = $.trim($(this).val());
				if(val==''){
                    alert("<?php echo $cls_tb_message->select_value('invalid_tracking_URL'); ?>");
					$(this).focus();
					found = true;
					return false;
				}
            });
            return !found;
        });
    });
</script>
<p class="navTitle"><a href="<?php echo URL; ?>"> Account  </a> &gt; &gt; <a href="<?php echo URL.'admin/order/order/'; ?>">  Order  </a> &gt; &gt; Create Dispatch </p>
<p class="highlightNavTitle"><span>  Create Dispatch  </span></p>
<p class="break"></p>

<?php  echo $v_dsp_tb_allocation?>
<p class="break"></p>
<form id="frm_tb_order_item" action="<?php echo URL.$v_admin_key;?>/<?php echo $v_order_id .'/order_tracking'; ?>" method="POST">
    <input type="hidden" name="txt_date_shipping" id="txt_date_shipping" value="<?php echo $v_date_shipping; ?>" />
    <input type="hidden" name="txt_order_id" id="txt_order_id" value="<?php echo $v_order_id; ?>" />
    <input type="hidden" name="txt_location_id" id="txt_location_id" value="<?php echo $v_location_id; ?>" />
    <input type="hidden" name="hdn_allocation_list" id="hdn_allocation_list" value="<?php echo $v_temp_list_location;?>" >
    <input type="hidden" name="txt_company_id" id="txt_company_id" value="<?php echo $v_company_id; ?>" />
    <input type="hidden" name="txt_location_from" id="txt_location_from" value="<?php echo $v_location_from; ?>" />
    <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
        <?php if($v_error_message!=''){ ?>
        <tr>
            <td colspan="2" ><?php echo $v_error_message;  ?></td>
        </tr>
        <?php } ?>
        <?php
        foreach($arr_tmp_location as $v_location_id=>$arr ){
        ?>
        <tr  valign="top">
            <th colspan="2">To: <?php echo $arr['location_name'].' (' .$arr['location_address'].')' ; ?>
            <input type="hidden" name="txt_tmp_location_id[]" value="<?php echo $arr['location_id'];?>" />
            <input type="hidden" name="txt_tmp_location_name[]" value="<?php echo $arr['location_name'];?>" />
            <input type="hidden" name="txt_tmp_location_address[]" value="<?php echo $arr['location_address'];?>" />
            <input type="hidden" name="txt_tmp_allocation_id[]" value="<?php echo $arr['allocation_id'];?>" />
            </th>
        </tr>
        <tr  valign="top">
            <td>Shipping Company </td>
            <td ><input type="text" size="35" id="txt_tracking_company" name="txt_tracking_company[]" value="<?php echo $arr['tracking_company']; ?>" />
            &nbsp&nbsp&nbsp Date Shipping: <input name="txt_date_ship[]" size="20" id="txt_date_ship_<?php echo $arr['location_id'];?>" value="<?php echo fdate($arr['date_shipping']);?>" />
            </td>
        </tr>
        <tr>
            <td>Tracking Number</td>
            <td ><input type="text" size="25" id="txt_tracking_number" name="txt_tracking_number[]" value="<?php echo $arr['tracking_number']; ?>" />
             &nbsp&nbsp&nbsp Ship Status
                    <select name="ship_status[]" id="ship_status">
                        <?php echo $cls_tb_settings->draw_option_by_id('ship_status',0,$arr['ship_status']); ?>
                    </select>
                    <script type="text/javascript">
						$(document).ready(function(e) {
                            $('input#txt_date_ship_<?php echo $arr['location_id'];?>').datepicker({
								dateFormat: 'M-dd-yy',
								changeMonth:true,
								changeYear:true,
								showOn:'both',
								buttonImage:"<?php echo URL;?>images/_calendar.gif",
								buttonImageOnly:true
							});
                        });
					</script>
            </td>
        </tr>
        <tr>
           <td>Tracking URL</td>
            <td><input type="text" size="75" id="txt_tracking_url" name="txt_tracking_url[]" value="<?php echo $arr['tracking_url']; ?>" /></td>

        </tr>
        <?php
        }
        ?>
        <tr align="center" valign="middle">
            <td colspan="2">
                <input type="submit" id="btn_submit_tb_order" name="btn_submit_tb_order" value="Submit" class="button" />
            </td>
        </tr>
    </table>
</form>