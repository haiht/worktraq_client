<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_metarial").submit(function(){
        if($("#txt_material_name").val()=="")
        {
            alert("Input material name!....");
            $("#txt_material_name").focus();
            $("#txt_material_name").addClass('invalid');
            return false;
        }
        return true;
	});
});
</script>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt&gt<a href="<?php echo URL .$v_admin_key; ?>">  Material  </a> &gt&gt Insert - Update Material</p>
<p class="highlightNavTitle"><span> Insert - Update material  </span></p>
<p class="break"></p>
<form id="frm_tb_metarial" action="<?php echo URL.$v_admin_key .'/'.$v_material_id.'/update'?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input class="" size="50" type="hidden" id="txt_material_id" name="txt_material_id" value="<?php echo $v_material_id;?>" />
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
    <?php if(isset($_REQUEST['txt_error'])){ ?>
    <tr>
        <th class="error" colspan="2" align="left">
            <?php echo (isset($_SESSION['error_material']) ? $_SESSION['error_material'] : '' );  ?>
        </th>
    </tr>
    <?php } ?>
<tr align="right" valign="top">
		<td>Material Name</td>
		<td align="left">
            <input class="" size="50" type="text" id="txt_material_name" name="txt_material_name" value="<?php echo $v_material_name;?>" />
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Material Description</td>
		<td align="left">
            <textarea rows="4" cols="50" id="txt_material_description" name="txt_material_description">
                <?php echo $v_material_description;?>
            </textarea>
        </td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_metarial" name="btn_submit_tb_metarial" value="Submit" class="button" /></td>
	</tr>
</table>
</form>