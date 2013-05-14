<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_email_templates").submit(function(){
		var css = '';

		var email_id = $("input#txt_email_id").val();
		email_id = parseInt(email_id, 10);
		css = isNaN(email_id)?'':'none';
		$("label#lbl_email_id").css("display",css);
		if(css == '') return false;

		var email_key = $("input#txt_email_key").val();
		email_key = $.trim(email_key);
		css = email_key==''?'':'none';
		$("label#lbl_email_key").css("display",css);
		if(css == '') return false;
		return true;
	});
});
</script>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt Country  </p>
<p class="highlightNavTitle"><span> Country  </span></p>
<p class="break"></p>
<form id="frm_tb_email_templates" action="<?php echo URL.$v_admin_key;?>/<?php echo $v_email_id; ?>/edit" method="POST" enctype="multipart/form-data">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input class="" size="50" type="hidden" id="txt_email_id" name="txt_email_id" value="<?php echo $v_email_id;?>" />

<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<caption>Email templates [<?php echo $v_email_id>0?'Edit':'New';?>]</caption>
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td width="180px">Email Key</td>
		<td width="10px">&nbsp;</td>
		<td align="left">
            <input class="" size="50" type="text" id="txt_email_key" name="txt_email_key" value="<?php echo $v_email_key;?>" />
            <input class="" size="50" type="hidden" id="txt_old_email_key" name="txt_old_email_key" value="<?php echo $v_old_email_key;?>" />

            <label id="lbl_email_key" style="color:red;display:none;">(*)</label>
        </td>
	</tr>

<tr align="right" valign="top">
		<td>Email Data</td>
		<td>&nbsp;</td>
		<td align="left">
            <input class="" size="50" type="text" id="txt_email_data" name="txt_email_data" value="<?php echo $v_email_data;?>" />
            <label id="lbl_email_data" style="color:red;display:none;">(*)</label>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Email Type</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_email_type" name="txt_email_type">
                <?php echo $cls_settings->draw_option_by_id('email_type',0,$v_email_type); ?>
            </select>
            <label id="lbl_email_type" style="color:red;display:none;">(*)</label>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Description</td>
		<td>&nbsp;</td>
		<td align="left">
            <textarea rows="4" cols="50" id="txt_description" name="txt_description">
                <?php echo $v_description;?>
            </textarea>

            <label id="lbl_description" style="color:red;display:none;">(*)</label>
            </td>
	</tr>
<tr align="right" valign="top">
    <td>Email File</td>
    <td>&nbsp;</td>
    <td align="left">
        <input class="" size="50" type="file" id="txt_email_file" name="txt_email_file" value=""/>
        <input class="" size="50" type="hidden" id="txt_file_name_templates" name="txt_file_name_templates" value="<?php echo $v_email_file;?>" />
        <label id="lbl_email_file" style="color:red;display:none;">(*)</label>
    </td>
</tr>
<?php if($v_dsp_email!=''){ ?>
    <tr align="right">
        <td>Content email</td>
        <td>&nbsp;</td>
        <td align="left">
            <textarea rows="15" cols="80" name="txt_file_tempates"> <?php echo $v_dsp_email; ?> </textarea>
        </td>
    </tr>
<?php } ?>

<tr align="center" valign="middle">
	<td colspan="3"><input type="submit" id="btn_submit_tb_email_templates" name="btn_submit_tb_email_templates" value="Upload Email Templates" class="button" /></td>
</tr>
</table>
</form>

