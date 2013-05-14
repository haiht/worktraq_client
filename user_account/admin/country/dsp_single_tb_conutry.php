<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_conutry").submit(function(){
        if($("#txt_country_name").val()==0)
        {
            alert("Input Country Name....");
            $("#txt_country_name").addClass('invalid');
            $("#txt_country_name").focus();
            return false;
        }
        if($("#txt_country_key").val()==0)
        {
            alert("Input Country Name....");
            $("#txt_country_key").addClass('invalid');
            $("#txt_country_key").focus();
            return false;
        }
        return true;
	});
});
</script>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt&gt<a href="<?php echo URL .'admin/country'; ?>">  Contry  </a> &gt&gt Insert - Update Contry</p>
<p class="highlightNavTitle"><span> Insert - Update Contry  </span></p>
<p class="break"></p>
<?php if(isset($_REQUEST['error_country'])){ ?>
<div class="msgbox_error">
    <?php echo $_SESSION['error_country']!=''? $_SESSION['error_country'] : '';  ?>
</div>
<?php } ?>
<form id="frm_tb_conutry" action="<?php echo URL.$v_admin_key.'/'.$v_country_id.'/update'; ?>" method="POST">
<input class="" size="50" type="hidden" id="txt_country_id" name="txt_country_id" value="<?php echo $v_country_id;?>" />
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<?php if(isset($_REQUEST['txt_error'])){ ?>
<tr>
    <th class="error" colspan="2" align="left">
        <?php echo (isset($_SESSION['error_country']) ? $_SESSION['error_country'] : '' );  ?>
    </th>
</tr>
<?php } ?>
<tr align="right" valign="top">
		<td>Country Name</td>
		<td align="left">
            <input class="" size="50" type="text" id="txt_country_name" name="txt_country_name" value="<?php echo $v_country_name;?>" />
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Country Key</td>
		<td align="left">
            <input class="" size="10" maxlength="3" type="text" id="txt_country_key" name="txt_country_key" value="<?php echo $v_country_key;?>" />
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Country Order</td>
		<td align="left">
            <input class="" size="50" type="text" id="txt_country_order" name="txt_country_order" value="<?php echo $v_country_order;?>" />
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Country Status</td>
		<td align="left">
            <select  id="txt_country_status" name="txt_country_status">
                <?php echo draw_option($arr_status_active, $v_country_status); ?>
            </select>
           </td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_conutry" name="btn_submit_tb_conutry" value="Submit" class="button" /></td>
	</tr>
</table>
</form>