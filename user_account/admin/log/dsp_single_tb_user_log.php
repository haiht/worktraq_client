<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_user_log").submit(function(){
		var css = '';

		var log_id = $("input#txt_log_id").val();
		log_id = parseInt(log_id, 10);
		css = isNaN(log_id)?'':'none';
		$("label#lbl_log_id").css("display",css);
		if(css == '') return false;
		var user_id = $("input#txt_user_id").val();
		user_id = parseInt(user_id, 10);
		css = isNaN(user_id)?'':'none';
		$("label#lbl_user_id").css("display",css);
		if(css == '') return false;
		var user_password = $("input#txt_user_password").val();
		user_password = $.trim(user_password);
		css = user_password==''?'':'none';
		$("label#lbl_user_password").css("display",css);
		if(css == '') return false;
		var log_ipaddress = $("input#txt_log_ipaddress").val();
		log_ipaddress = $.trim(log_ipaddress);
		css = log_ipaddress==''?'':'none';
		$("label#lbl_log_ipaddress").css("display",css);
		if(css == '') return false;
		var log_url = $("input#txt_log_url").val();
		log_url = $.trim(log_url);
		css = log_url==''?'':'none';
		$("label#lbl_log_url").css("display",css);
		if(css == '') return false;
		var log_datetime = $("input#txt_log_datetime").val();
		css = check_date(log_datetime)?'':'none';
		$("label#lbl_log_datetime").css("display",css);
		if(css == '') return false;
		return true;
	});
	$('input#txt_log_datetime').datetimepicker({});
});
</script>
<form id="frm_tb_user_log" action="##" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td width="30%">log_id</td>
		<td width="1%">&nbsp;</td>
		<td align="left" width="69%"><input class="" size="50" type="text" id="txt_log_id" name="txt_log_id" value="<?php echo $v_log_id;?>" /> <label id="lbl_log_id" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>user_id</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_user_id" name="txt_user_id" value="<?php echo $v_user_id;?>" /> <label id="lbl_user_id" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>user_password</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_user_password" name="txt_user_password" value="<?php echo $v_user_password;?>" /> <label id="lbl_user_password" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>log_ipaddress</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_log_ipaddress" name="txt_log_ipaddress" value="<?php echo $v_log_ipaddress;?>" /> <label id="lbl_log_ipaddress" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>log_url</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_log_url" name="txt_log_url" value="<?php echo $v_log_url;?>" /> <label id="lbl_log_url" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>log_datetime</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_log_datetime" name="txt_log_datetime" value="<?php echo $v_log_datetime;?>" /> <label id="lbl_log_datetime" style="color:red;display:none;">(*)</label></td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_user_log" name="btn_submit_tb_user_log" value="Submit" class="button" /></td>
	</tr>
</table>
</form>