<?php if (!isset($v_sval)) die(); ?>
<?php echo js_tabas();?>
<script type="text/javascript">
    $(document).ready( function() {
        $('#tab-container').easytabs();
    });
</script>
<p class="navTitle"><a href="<?php echo URL; ?>"> Account  </a> &gt &gt <a href="<?php echo URL.'/admin/company/location'; ?>">  Location  </a> &gt &gt Location Area  </p>
<p class="highlightNavTitle"><span> Location Area  </span></p>
<p class="break"></p>
    <form id="frm_tb_location_area" action="<?php echo URL.$v_admin_key .'/'.$v_location_id.'/area/update' ;?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_area_mongo_id;?>" />
        <input type="hidden" id="txt_area_id" name="txt_area_id" value="<?php echo $v_area_id;?>" />
        <input type="hidden" id="txt_location_id" name="txt_location_id" value="<?php echo $v_location_id;?>" />
        <input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id; ?>">
        <input type="hidden" id="txt_session_id" name="txt_session_id" value="<?php echo session_id(); ?>">
        <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
            <caption>Location Area [<?php echo $v_area_id>0?'Edit':'New';?>]</caption>
            <?php if($v_error_message!=''){?>
            <tr align="left" valign="top">
                <td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
            </tr>
            <?php }?>
            <tr align="right" valign="top">
                <td>Area Name</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="text" id="txt_area_name" name="txt_area_name" value="<?php echo $v_area_name;?>" /> <label id="lbl_area_name" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Area Description</td>
                <td>&nbsp;</td>
                <td align="left">
                    <textarea id="txt_area_description" name="txt_area_description" rows="5" cols="50"><?php echo $v_area_description;?></textarea>
                    <label id="lbl_area_description" style="color:red;display:none;">(*)</label>
                </td>
            </tr>
            <tr align="right" valign="top">
                <td>Status</td>
                <td>&nbsp;</td>
                <td align="left"><label><input type="checkbox" id="txt_status" name="txt_status"<?php echo $v_status==0?' checked="checked"':'';?> /> Enable?</label></td>
            </tr>
            <tr align="right" valign="top">
                <td>Area Image</td>
                <td>&nbsp;</td>
                <td align="left"><input class="" size="50" type="file" multiple  id="txt_area_image" name="txt_area_image[]" /> <label id="lbl_area_image" style="color:red;display:none;">(*)</label></td>
            </tr>
            <tr align="center" valign="middle">
                <td colspan="3"><input type="submit" id="btn_submit_tb_location_area" name="btn_submit_tb_location_area" value="Submit" class="button" /></td>
            </tr>
        </table>
    </form>
