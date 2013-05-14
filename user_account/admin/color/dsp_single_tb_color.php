<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_color").submit(function(){
        if($("#txt_color_name").val()=="")
        {
            alert("Input color name!....");
            $("#txt_color_name").focus();
            $("#txt_color_name").addClass('invalid');
            return false;
        }
        return true;
	});
});
</script>

<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt&gt<a href="<?php echo URL .'admin/system/color'; ?>">  Color  </a> &gt&gt Insert - Update Company</p>
<p class="highlightNavTitle"><span> Insert - Update Color  </span></p>
<p class="break"></p>

<script type="text/javascript" src="lib/colorpicker/js/colorpicker.js"></script>
<link href="lib/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css" media="screen" />

<form id="frm_tb_color" action="<?php echo URL.$v_admin_key .'/'.$v_color_id.'/update'; ?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input class="" size="50" type="hidden" id="txt_color_id" name="txt_color_id" value="<?php echo $v_color_id;?>" />
<input type="hidden" id="txt_color_order" name="txt_color_order" value="<?php echo $v_color_order;?>" />

<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<?php if(isset($_REQUEST['txt_error'])){ ?>
<tr>
    <th class="error" colspan="2" align="left">
        <?php echo (isset($_SESSION['error_country']) ? $_SESSION['error_country'] : '' );  ?>
    </th>
</tr>
<?php } ?>
<tr align="right" valign="top">
		<td>Color Name</td>
		<td align="left">
            <input class="" size="50" type="text" id="txt_color_name" name="txt_color_name" value="<?php echo $v_color_name;?>" />
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Color Code Hex</td>
		<td align="left">
            <input readonly="readonly" class="" size="50" type="text" id="txt_color_code_hex" name="txt_color_code_hex" value="<?php echo $v_color_code_hex;?>" />
        </td>
	</tr>
    <tr align="right" valign="top">
        <td>Color Code</td>
        <td align="left">
            <input class="" size="50" type="text" id="txt_color_code" name="txt_color_code" value="<?php echo $v_color_code;?>" />
        </td>
    <tr align="right" valign="top">
        <td>Active?</td>
        <td align="left">
            <input type="checkbox" id="txt_color_status" name="txt_color_status" value="1"<?php echo $v_color_status==0?' checked="checked"':'';?> />
        </td>
    </tr>
	<tr align="center" valign="middle">
		<td colspan="3">
            <input type="submit" id="btn_submit_tb_color" name="btn_submit_tb_color" value="Submit" class="button" />
        </td>
	</tr>
</table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
       $('input#txt_color_code_hex').ColorPicker({
           onSubmit: function(hsb, hex, rgb, el) {
               $(el).val('<?php echo $v_color_code_hex;?>');
               $(el).ColorPickerHide();
           },
           onBeforeShow: function () {
               $(this).ColorPickerSetColor(this.value);
           }
       }).bind('keyup', function(){
             $(this).ColorPickerSetColor(this.value);
        });
    });
</script>