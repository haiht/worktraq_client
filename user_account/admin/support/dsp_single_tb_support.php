<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_support").submit(function(){
		var css = '';

		var support_id = $("input#txt_support_id").val();
		support_id = parseInt(support_id, 10);
		css = isNaN(support_id)?'':'none';
		$("label#lbl_support_id").css("display",css);
		if(css == '') return false;
		var support_title = $("input#txt_support_title").val();
		support_title = $.trim(support_title);
		css = support_title==''?'':'none';
		$("label#lbl_support_title").css("display",css);
		if(css == '') return false;
		var support_description = $("input#txt_support_description").val();
		support_description = $.trim(support_description);
		css = support_description==''?'':'none';
		$("label#lbl_support_description").css("display",css);
		if(css == '') return false;
		var company_id = $("input#txt_company_id").val();
		company_id = parseInt(company_id, 10);
		css = isNaN(company_id)?'':'none';
		$("label#lbl_company_id").css("display",css);
		if(css == '') return false;
		var location_id = $("input#txt_location_id").val();
		location_id = parseInt(location_id, 10);
		css = isNaN(location_id)?'':'none';
		$("label#lbl_location_id").css("display",css);
		if(css == '') return false;
		var contact_id = $("input#txt_contact_id").val();
		contact_id = parseInt(contact_id, 10);
		css = isNaN(contact_id)?'':'none';
		$("label#lbl_contact_id").css("display",css);
		if(css == '') return false;
		var date_created = $("input#txt_date_created").val();
		css = check_date(date_created)?'':'none';
		$("label#lbl_date_created").css("display",css);
		if(css == '') return false;
		var username = $("input#txt_username").val();
		username = $.trim(username);
		css = username==''?'':'none';
		$("label#lbl_username").css("display",css);
		if(css == '') return false;
		var image_file = $("input#txt_image_file").val();
		image_file = $.trim(image_file);
		css = image_file==''?'':'none';
		$("label#lbl_image_file").css("display",css);
		if(css == '') return false;
		return true;
	});
	$('input#txt_date_created').datetimepicker({});
});
</script>
<form id="frm_tb_support" action="?a=ACC&acc=ACT" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<cation>Support [<?php echo $v_support_id>0?'Edit':'New';?>]</caption>
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td width="30%">Support Id</td>
		<td width="1%">&nbsp;</td>
		<td align="left" width="69%"><input class="" size="50" type="text" id="txt_support_id" name="txt_support_id" value="<?php echo $v_support_id;?>" /> <label id="lbl_support_id" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Support Title</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_support_title" name="txt_support_title" value="<?php echo $v_support_title;?>" /> <label id="lbl_support_title" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Support Description</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_support_description" name="txt_support_description" value="<?php echo $v_support_description;?>" /> <label id="lbl_support_description" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Company Id</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" /> <label id="lbl_company_id" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Location Id</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_location_id" name="txt_location_id" value="<?php echo $v_location_id;?>" /> <label id="lbl_location_id" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Contact Id</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_contact_id" name="txt_contact_id" value="<?php echo $v_contact_id;?>" /> <label id="lbl_contact_id" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Date Created</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_date_created" name="txt_date_created" value="<?php echo $v_date_created;?>" /> <label id="lbl_date_created" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Username</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_username" name="txt_username" value="<?php echo $v_username;?>" /> <label id="lbl_username" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Image File</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_image_file" name="txt_image_file" value="<?php echo $v_image_file;?>" /> <label id="lbl_image_file" style="color:red;display:none;">(*)</label></td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_support" name="btn_submit_tb_support" value="Submit" class="button" /></td>
	</tr>
</table>
</form>