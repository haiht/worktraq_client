<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_tag").submit(function(){
		var css = '';

		var tag_name = $("input#txt_tag_name").val();
		tag_name = $.trim(tag_name);
		css = tag_name==''?'':'none';
		$("label#lbl_tag_name").css("display",css);
		if(css == '') return false;
		var tag_order = $("input#txt_tag_order").val();
		tag_order = parseInt(tag_order, 10);
		css = isNaN(tag_order)?'':'none';
		$("label#lbl_tag_order").css("display",css);
		if(css == '') return false;
		var company_id = $("select#txt_company_id").val();
		company_id = parseInt(company_id, 10);
		css = isNaN(company_id) || company_id <=0?'':'none';
		$("label#lbl_company_id").css("display",css);
		if(css == '') return false;
		//var location_id = $("select#txt_location_id").val();
		//location_id = parseInt(location_id, 10);
		//css = isNaN(location_id) || location_id<=0 ?'':'none';
		//$("label#lbl_location_id").css("display",css);
		//if(css == '') return false;
		return true;
	});
	$('select#txt_company_id').change(function(e) {
		var $this = $(this);
        var company_id = $(this).val();
		company_id = parseInt(company_id, 10);
		if(isNaN(company_id) || company_id<0) company_id = 0;
		$.ajax({
			url	: '<?php echo URL;?>admin/company/location/ajax',
			type	: 'POST',
			data	:	{txt_company_id: company_id},
			beforeSend: function(){
				$this.attr('disabled', true);
			},
			success: function(data, type){
				var ret = $.parseJSON(data);
				if(ret.error==0){
					$('select#txt_location_id').html(ret.data);
				}else{
					alert(ret.message);
				}
				$this.attr('disabled', false);
			}
		});
		
    });
});
</script>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt&gt<a href="<?php echo URL .'admin/product'; ?>">  Product  </a> &gt; &gt; <a href="<?php echo URL.$v_admin_key;?>">Tags</a> &gt; &gt; Insert - Update Tags</p>
<p class="highlightNavTitle"><span> Insert - Update Tags  </span></p>
<p class="break"></p>

<form id="frm_tb_tag" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_tag_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_tag_id" name="txt_tag_id" value="<?php echo $v_tag_id;?>" />
<input type="hidden" id="txt_user_name" name="txt_user_name" value="<?php echo $v_user_name;?>" />
<input type="hidden" id="txt_date_created" name="txt_date_created" value="<?php echo $v_date_created;?>" />

<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td>Company</td>
		<td>&nbsp;</td>
		<td align="left">
        <select  id="txt_company_id" name="txt_company_id">
        	<option value="0" selected="selected">------</option>
            <?php echo $v_dsp_company;?>
        </select>
        <label id="lbl_company_id" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Location</td>
		<td>&nbsp;</td>
		<td align="left">
        <select  id="txt_location_id" name="txt_location_id">
        	<option value="0" selected="selected">------</option>
            <?php echo $v_dsp_location;?>
        </select>
        <label id="lbl_location_id" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td width="30%">Tag Name</td>
		<td width="1%">&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_tag_name" name="txt_tag_name" value="<?php echo $v_tag_name;?>" /> <label id="lbl_tag_name" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Tag Status</td>
		<td>&nbsp;</td>
		<td align="left"><input type="checkbox" id="txt_tag_status" name="txt_tag_status" value="0"<?php echo $v_tag_status==0?' checked="checkbox"':'';?> /> </td>
	</tr>
<tr align="right" valign="top">
		<td>Tag Order</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="10" type="text" id="txt_tag_order" name="txt_tag_order" value="<?php echo $v_tag_order;?>" /> <label id="lbl_tag_order" style="color:red;display:none;">(*)</label></td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_tag" name="btn_submit_tb_tag" value="Submit" class="button" /></td>
	</tr>
</table>
</form>