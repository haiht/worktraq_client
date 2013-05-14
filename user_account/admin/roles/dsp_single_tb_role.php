<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL; ?>"> Account  </a> &gt; &gt; <a href="<?php echo URL.'admin/user/roles/'; ?>">  Roles  </a> &gt; &gt; Edit Roles </p>
<p class="highlightNavTitle"><span>  Edit Roles </span></p>
<p class="break"></p>


<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_rule").submit(function(){
		var css = '';

		var rule_title = $("input#txt_rule_title").val();
		rule_title = $.trim(rule_title);
		css = rule_title==''?'':'none';
		$("label#lbl_rule_title").css("display",css);
        if(rule_title=='') alert("Input rule title!....");
		if(css == '') return false;

		var rule_url = $("input#txt_rule_key").val();
		rule_url = $.trim(rule_url);
		css = rule_url==''?'':'none';
		$("label#lbl_rule_url").css("display",css);
        if(rule_url=='')  alert("Input rule url!....");
		if(css == '') return false;

		return true;
	});
});
</script>
<form id="frm_tb_rule" action="<?php echo URL. $v_admin_key; ?>/<?php echo $v_rule_id;?>/edit" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<table align="center" width="100%" border="1" class="grid_table" cellpadding="3" cellspacing="0">
<input class="" size="50" type="hidden" id="txt_rule_id" name="txt_rule_id" value="<?php echo $v_rule_id;?>" />
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td>Rule Title</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_rule_title" name="txt_rule_title" value="<?php echo $v_rule_title;?>" /> <label id="lbl_rule_title" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Rule Type</td>
		<td>&nbsp;</td>
		<td align="left">
        <select id="txt_rule_type" name="txt_rule_type">
            <?php
                echo  $cls_tb_setting->draw_option_by_id('rule_type',0,$v_rule_type);
            ?>
        </select>
        <label id="lbl_rule_type" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
    <td >Rule Description</td>
    <td></td>
    <td align="left">
        <textarea rows="5" cols="50" id="txt_rule_description" name="txt_rule_description">
            <?php echo $v_rule_description ;?>
        </textarea>
        <label id="lbl_rule_description" style="color:red;display:none;">(*)</label>
    </td>
</tr>
<tr align="right" valign="top">
		<td>Rule Key</td>
		<td>&nbsp;</td>
		<td align="left"><input size="50" type="text" id="txt_rule_key" name="txt_rule_key" value="<?php echo $v_rule_key;?>" /> <label id="lbl_rule_url" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
        <td>Rule Menu</td>
        <td>&nbsp;</td>
        <td align="left">
            <input size="50" type="text" id="txt_rule_menu" name="txt_rule_menu" value="<?php echo $v_rule_menu;?>" />
            <label id="lbl_rule_menu" style="color:red;display:none;">(*)</label>
        </td>
    </tr>
<tr align="right" valign="top">
		<td>Rule Admin</td>
		<td>&nbsp;</td>
		<td align="left">
            <input  size="50" type="checkbox" id="txt_rule_admin" name="txt_rule_admin" value="1" <?php echo $v_rule_admin==1?'checked':'' ; ?> /> <label id="lbl_rule_admin" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
        <td>Rule Company</td>
        <td>&nbsp;</td>
        <td align="left">
            <input  size="50" type="checkbox" id="txt_rule_comp" name="txt_rule_comp" value="1" <?php echo $v_rule_comp==1?'checked':'' ; ?> />
            <label id="lbl_rule_comp" style="color:red;display:none;">(*)</label>
            Check to use for company!..
        </td>
    </tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_rule" name="btn_submit_tb_rule" value="Submit" class="button" /></td>
	</tr>
</table>
</form>