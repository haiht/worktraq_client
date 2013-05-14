<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_area").submit(function(){
		var css = '';

		var company_id = $("select#txt_company_id").val();
		company_id = parseInt(company_id, 10);
		css = isNaN(company_id)?'':'none';
		$("label#lbl_company_id").css("display",css);
		if(css == '') return false;
		var area_name = $("input#txt_area_name").val();
		area_name = $.trim(area_name);
		css = area_name==''?'':'none';
		$("label#lbl_area_name").css("display",css);
		if(css == '') return false;
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
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt&gt<a href="<?php echo URL .$v_admin_key; ?>">  Areas  </a> &gt&gt Insert - Update Areas</p>
<p class="highlightNavTitle"><span> Insert - Update Areas  </span></p>
<p class="break"></p>

<form id="frm_tb_area" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_area_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_area_id" name="txt_area_id" value="<?php echo $v_area_id;?>" />
<input type="hidden" id="txt_area_code" name="txt_area_code" value="<?php echo $v_area_code;?>" />
<input type="hidden" id="txt_area_order" name="txt_area_order" value="<?php echo $v_area_order;?>" />
<table align="center" width="100%" border="1" class="list_table sortable" cellpadding="3" cellspacing="0">
<caption>Area [<?php echo $v_area_id>0?'Edit':'New';?>]</caption>
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td>Company</td>
		<td>&nbsp;</td>
		<td align="left">
        <select id="txt_company_id" name="txt_company_id">
        	<option value="0" selected="selected">-------</option>
            <?php echo $v_dsp_company_draw;?>
        </select>
        <label id="lbl_company_id" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Location</td>
		<td>&nbsp;</td>
		<td align="left">
        <select id="txt_location_id" name="txt_location_id">
        	<option value="0" selected="selected">--------</option>
            <?php echo $v_dsp_location_draw;?>
        </select>
        <label id="lbl_location_id" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Area Name</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_area_name" name="txt_area_name" value="<?php echo $v_area_name;?>" /> <label id="lbl_area_name" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Area Description</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_area_description" name="txt_area_description" value="<?php echo $v_area_description;?>" /> <label id="lbl_area_description" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Status</td>
		<td>&nbsp;</td>
		<td align="left"><input type="checkbox" id="txt_status" name="txt_status" value="1"<?php echo $v_status==0?' checked="checked"':'';?> /> </td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_area" name="btn_submit_tb_area" value="Submit" class="button" /></td>
	</tr>
</table>
</form>