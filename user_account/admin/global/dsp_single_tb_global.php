<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_global").submit(function(){
		var css = '';

		var global_id = $("input#txt_global_id").val();
		global_id = parseInt(global_id, 10);
		css = isNaN(global_id)?'':'none';
		$("label#lbl_global_id").css("display",css);
		if(css == '') return false;
		var global_key = $("input#txt_global_key").val();
		global_key = $.trim(global_key);
		css = global_key==''?'':'none';
		$("label#lbl_global_key").css("display",css);
		if(css == '') return false;
		var global_name = $("input#txt_global_name").val();
		global_name = $.trim(global_name);
		css = global_name==''?'':'none';
		$("label#lbl_global_name").css("display",css);
		if(css == '') return false;
		var global_description = $("input#txt_global_description").val();
		global_description = $.trim(global_description);
		css = global_description==''?'':'none';
		$("label#lbl_global_description").css("display",css);
		if(css == '') return false;
		var global_value = $("input#txt_global_value").val();
		global_value = $.trim(global_value);
		css = global_value==''?'':'none';
		$("label#lbl_global_value").css("display",css);
		if(css == '') return false;
		var setting_name = $("input#txt_setting_name").val();
		setting_name = $.trim(setting_name);
		css = setting_name==''?'':'none';
		$("label#lbl_setting_name").css("display",css);
		if(css == '') return false;
		var setting_key = $("input#txt_setting_key").val();
		setting_key = $.trim(setting_key);
		css = setting_key==''?'':'none';
		$("label#lbl_setting_key").css("display",css);
		if(css == '') return false;
		return true;
	});
});
</script>
<form id="frm_tb_global" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_global_id;?>/edit" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<table align="center" width="100%" border="1" class="list_table sortable" cellpadding="3" cellspacing="0">
<caption>Global [<?php echo $v_global_id>0?'Edit':'New';?>]</caption>
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td width="30%">Global Id</td>
		<td width="1%">&nbsp;</td>
		<td align="left" width="69%"><input class="text_css" size="50" type="text" id="txt_global_id" name="txt_global_id" value="<?php echo $v_global_id;?>" /> <label id="lbl_global_id" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Global Key</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_global_key" name="txt_global_key" value="<?php echo $v_global_key;?>" /> <label id="lbl_global_key" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Global Name</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_global_name" name="txt_global_name" value="<?php echo $v_global_name;?>" /> <label id="lbl_global_name" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Global Description</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_global_description" name="txt_global_description" value="<?php echo $v_global_description;?>" /> <label id="lbl_global_description" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Global Value</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_global_value" name="txt_global_value" value="<?php echo $v_global_value;?>" /> <label id="lbl_global_value" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Setting Name</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_setting_name" name="txt_setting_name" value="<?php echo $v_setting_name;?>" /> <label id="lbl_setting_name" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Setting Key</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_setting_key" name="txt_setting_key" value="<?php echo $v_setting_key;?>" /> <label id="lbl_setting_key" style="color:red;display:none;">(*)</label></td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_global" name="btn_submit_tb_global" value="Submit" class="button" /></td>
	</tr>
</table>
</form>