<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){

    $("select#txt_company_id").change(function(){
        var company_id = $("select#txt_company_id").val();
        company_id = parseInt(company_id, 10);

        $.ajax({
            url : '<?php echo URL .$v_admin_key.'/ajax';?>',
            type    : 'POST',
            data    :   {txt_company_id: company_id},
            beforeSend: function(){
                $("select#txt_company_id").attr('disabled', true);
            },
            success: function(data){
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    $('select#txt_product_group_parent').html(ret.data);
                }else{
                    alert(ret.message);
                }
                $("select#txt_company_id").attr('disabled', false);
            }
        });
    });

	$("form#frm_tb_product_group").submit(function(){
		var css = '';

		var product_group_id = $("input#txt_product_group_id").val();
		product_group_id = parseInt(product_group_id, 10);
		css = isNaN(product_group_id)?'':'none';
		$("label#lbl_product_group_id").css("display",css);
		if(css == '') return false;

		var company_id = $("select#txt_company_id").val();

		company_id = parseInt(company_id, 10);
		css = isNaN(company_id)?'':'none';
		$("label#lbl_company_id").css("display",css);
		if(css == '') return false;

		var product_group_name = $("input#txt_product_group_name").val();
		product_group_name = $.trim(product_group_name);
		css = product_group_name==''?'':'none';
		$("label#lbl_product_group_name").css("display",css);
		if(css == '') return false;

		var product_group_order = $("input#txt_product_group_order").val();
		product_group_order = parseInt(product_group_order, 10);
		css = isNaN(product_group_order)?'':'none';
		$("label#lbl_product_group_order").css("display",css);
		if(css == '') return false;


		return true;
	});
});
</script>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt <a href="<?php echo URL .'admin'; ?>">  Product Group </a> &gt; &gt; Edit Product Group </p>
<p class="highlightNavTitle"><span> Edit Product Group </span></p>
<p class="break"></p>


<form id="frm_tb_product_group" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_product_group_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_product_group_id" name="txt_product_group_id" value="<?php echo $v_product_group_id;?>" />
<input type="hidden" id="txt_product_group_key" name="txt_product_group_key" value="<?php echo $v_product_group_key;?>" />
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">

<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>

<tr align="right" valign="top">
		<td width="180px">Company Id</td>
		<td width="10px">&nbsp;</td>
		<td align="left">
            <select id="txt_company_id" name="txt_company_id">
                <option value="0" <?php echo ($v_company_id==0?'selected':''); ?>> -- Select -- </option>
                <?php echo $cls_tb_company->draw_option('company_id','company_name',$v_company_id); ?>
            </select>
            <label id="lbl_company_id" style="color:red;display:none;">(*)</label></td>
</tr>
<tr align="right" valign="top">
		<td>Product Group Name</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_product_group_name" name="txt_product_group_name" value="<?php echo $v_product_group_name;?>" /> <label id="lbl_product_group_name" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Product Group Order</td>
		<td>&nbsp;</td>
		<td align="left"><input class="" size="50" type="text" id="txt_product_group_order" name="txt_product_group_order" value="<?php echo $v_product_group_order;?>" /> <label id="lbl_product_group_order" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Product Group Parent</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_product_group_parent" name="txt_product_group_parent">
                <?php echo $cls_tb_product_group->draw_all_product_option($v_company_id,0,$v_product_group_id); ?>
            </select>
            <label id="lbl_product_group_parent" style="color:red;display:none;">(*)</label>
        </td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_product_group" name="btn_submit_tb_product_group" value="Submit" class="button" /></td>
	</tr>
</table>
</form>