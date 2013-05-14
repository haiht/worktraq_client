<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_province").submit(function(){
		var css = '';

		var province_id = $("input#txt_province_id").val();
		province_id = parseInt(province_id, 10);
		css = isNaN(province_id)?'':'none';
		$("label#lbl_province_id").css("display",css);
		if(css == '') return false;
		var province_name = $("input#txt_province_name").val();
		province_name = $.trim(province_name);
		css = province_name==''?'':'none';
		$("label#lbl_province_name").css("display",css);
		if(css == '') return false;
		var province_key = $("input#txt_province_key").val();
		province_key = $.trim(province_key);
		css = province_key==''?'':'none';
		$("label#lbl_province_key").css("display",css);
		if(css == '') return false;
		var province_status = $("input#txt_province_status").val();
		province_status = parseInt(province_status, 10);
		css = isNaN(province_status)?'':'none';
		$("label#lbl_province_status").css("display",css);
		if(css == '') return false;
		var province_order = $("input#txt_province_order").val();
		province_order = parseInt(province_order, 10);
		css = isNaN(province_order)?'':'none';
		$("label#lbl_province_order").css("display",css);
		if(css == '') return false;
		var country_id = $("input#txt_country_id").val();
		country_id = parseInt(country_id, 10);
		css = isNaN(country_id)?'':'none';
		$("label#lbl_country_id").css("display",css);
		if(css == '') return false;
		return true;
	});
});
</script>
<p class="navTitle"><a href="<?php echo URL; ?>"> Account  </a> &gt; &gt; <a href="<?php echo URL.'admin/system/province/'; ?>">  Province  </a> &gt; &gt; Update - Add new Province  </p>
<p class="highlightNavTitle"><span>  Update - Add new Province  </span></p>
<p class="break"></p>

<form id="frm_tb_province" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_province_id;?>/edit" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input size="50" type="hidden" id="txt_province_status" name="txt_province_status" value="<?php echo $v_province_status;?>" />
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<caption>Province [<?php echo $v_province_id>0?'Edit':'New';?>]</caption>
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td width="30%">Province Id</td>
		<td width="1%">&nbsp;</td>
		<td align="left" width="69%"><input class="" size="50" type="text" id="txt_province_id" name="txt_province_id" value="<?php echo $v_province_id;?>" /> <label id="lbl_province_id" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Province Name</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_province_name" name="txt_province_name" value="<?php echo $v_province_name;?>" /> <label id="lbl_province_name" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Province Key</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_province_key" name="txt_province_key" value="<?php echo $v_province_key;?>" /> <label id="lbl_province_key" style="color:red;display:none;">(*)</label></td>
	</tr>

<tr align="right" valign="top">
		<td>Province Order</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_province_order" name="txt_province_order" value="<?php echo $v_province_order;?>" /> <label id="lbl_province_order" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Country Id</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_country_id" name="txt_country_id">
                <?php
                    echo $cls_tb_country->draw_option('country_id','country_name',$v_country_id);
                ?>
            </select>
            <label id="lbl_country_id" style="color:red;display:none;">(*)</label></td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_province" name="btn_submit_tb_province" value="Submit" class="button" /></td>
	</tr>
</table>
</form>