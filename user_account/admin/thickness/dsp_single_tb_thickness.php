<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_thickness").submit(function(){
        if($("#txt_thickness_name").val()=="")
        {
            alert("Input Thickness Name!....");
            $("#txt_thickness_name").focus();
            $("#txt_thickness_name").css('backgroundColor','#990000');
            return false;
        }

        if($("#txt_thickness_size").val()=="")
        {
            alert("Input Thickness Size!....");
            $("#txt_thickness_size").focus();
            $("#txt_thickness_size").css('backgroundColor','#990000');
            return false;
        }

        if($("#txt_thickness_type").val()==0)
        {
            alert("Input Thickness Type!....");
            $("#txt_thickness_type").focus();
            $("#txt_thickness_type").css('backgroundColor','#990000');
            return false;
        }


        return true;


	});
});
</script>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt&gt<a href="<?php echo URL .'admin/material'; ?>">  Thickness  </a> &gt&gt Add new - Update Thickness</p>
<p class="highlightNavTitle"><span> Add new - Update Thickness  </span></p>
<p class="break"></p>
<form id="frm_tb_thickness" action="<?php echo URL.$v_admin_key.'/'.$v_thickness_id.'/update';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input size="50" type="hidden" id="txt_thickness_id" name="txt_thickness_id" value="<?php echo $v_thickness_id;?>" />
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
    <?php if(isset($_REQUEST['txt_error'])){ ?>
    <tr>
        <th class="error" colspan="2" align="left">
            <?php echo (isset($_SESSION['error_thickness']) ? $_SESSION['error_thickness'] : '' );  ?>
        </th>
    </tr>
    <?php } ?>
<tr align="right" valign="top">
		<td>Thickness Name</td>
		<td>&nbsp;</td>
		<td align="left">
            <input class="" size="50" type="text" id="txt_thickness_name" name="txt_thickness_name" value="<?php echo $v_thickness_name;?>" />
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Thickness Size</td>
		<td>&nbsp;</td>
		<td align="left">
            <input class="" size="50" type="text" id="txt_thickness_size" name="txt_thickness_size" value="<?php echo $v_thickness_size;?>" />
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Thickness Type</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_thickness_type" name="txt_thickness_type">
                <?php echo draw_option($arr_measurement_type,$v_thickness_type); ?>
            </select>
        </td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_thickness" name="btn_submit_tb_thickness" value="Submit" class="button" /></td>
	</tr>
</table>
</form>