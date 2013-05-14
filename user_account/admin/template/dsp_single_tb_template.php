<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_template").submit(function(){
		var css = '';

		var template_id = $("input#txt_template_id").val();
		template_id = parseInt(template_id, 10);
		css = isNaN(template_id)?'':'none';
		$("label#lbl_template_id").css("display",css);
		if(css == '') return false;
		var template_name = $("input#txt_template_name").val();
		template_name = $.trim(template_name);
		css = template_name==''?'':'none';
		$("label#lbl_template_name").css("display",css);
		if(css == '') return false;
		var template_default = $("input#txt_template_default").val();
		template_default = $.trim(template_default);
		css = template_default==''?'':'none';
		$("label#lbl_template_default").css("display",css);
		if(css == '') return false;
		var date_created = $("input#txt_date_created").val();
		css = check_date(date_created)?'':'none';
		$("label#lbl_date_created").css("display",css);
		if(css == '') return false;
		return true;
	});
	$('input#txt_date_created').datetimepicker({});
});
</script>
<form id="frm_tb_template" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add/':$v_template_id."/edit";?>" method="POST">

<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<table align="center" width="100%" border="1" class="list_table sortable" cellpadding="3" cellspacing="0">
<caption>Template [<?php echo $v_template_id>0?'Edit':'New';?>]</caption>
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td width="30%">Template Id</td>
		<td width="1%">&nbsp;</td>
		<td align="left" width="69%">
            <input class="text_css" size="50" type="text" id="txt_template_id" name="txt_template_id" value="<?php echo $v_template_id;?>" /> <label id="lbl_template_id" style="color:red;display:none;">(*)</label>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Template Name</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_template_name" name="txt_template_name" value="<?php echo $v_template_name;?>" /> <label id="lbl_template_name" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Template Default</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_template_default" name="txt_template_default" value="<?php echo $v_template_default;?>" /> <label id="lbl_template_default" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Date Created</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_date_created" name="txt_date_created" value="<?php echo $v_date_created;?>" /> <label id="lbl_date_created" style="color:red;display:none;">(*)</label></td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_template" name="btn_submit_tb_template" value="Submit" class="button" /></td>
	</tr>
</table>
</form>