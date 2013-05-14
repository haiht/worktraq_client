<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt Message  </p>
<p class="highlightNavTitle"><span> Message  </span></p>
<p class="break"></p>

<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_message").submit(function(){
		var css = '';

		var message_id = $("input#txt_message_id").val();
		message_id = parseInt(message_id, 10);
		css = isNaN(message_id)?'':'none';
		$("label#lbl_message_id").css("display",css);
		if(css == '') return false;

		var message_type = $("select#txt_message_type").val();

		message_type = parseInt(message_type, 10);
		css = isNaN(message_type)?'':'none';
		$("label#lbl_message_type").css("display",css);
		if(css == '') return false;

		var message_value = $("input#txt_message_value").val();
		message_value = $.trim(message_value);
		css = message_value==''?'':'none';
		$("label#lbl_message_value").css("display",css);
		if(css == '') return false;

		return true;
	});
});
</script>
<form id="frm_tb_message" action="<?php echo URL.$v_admin_key;?>/<?php echo $v_message_id;?>/edit" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input class="" size="50" type="hidden" id="txt_message_id" name="txt_message_id" value="<?php echo $v_message_id;?>" />
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<caption>Message [<?php echo $v_message_id>0?'Edit':'New';?>]</caption>
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td width="180px">Message Type</td>
		<td  width="10px">&nbsp;</td>
		<td align="left">
            <select id="txt_message_type" name="txt_message_type">
                <?php echo $cls_settings->draw_option_by_id('message_type',0,$v_message_type);?>
            </select>
            <label id="lbl_message_type" style="color:red;display:none;">(*)</label>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Message Key</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_message_key" name="txt_message_key" value="<?php echo $v_message_key;?>" /> <label id="lbl_message_key" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Message Value</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_message_value" name="txt_message_value" value="<?php echo $v_message_value;?>" /> <label id="lbl_message_value" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Message Order</td>
		<td>&nbsp;</td>
		<td align="left">
            <input class="" size="10" type="text" id="txt_message_order" name="txt_message_order" value="<?php echo $v_message_order;?>" /> <label id="lbl_message_order" style="color:red;display:none;">(*)</label></td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_message" name="btn_submit_tb_message" value="Submit" class="button" /></td>
	</tr>
</table>
</form>