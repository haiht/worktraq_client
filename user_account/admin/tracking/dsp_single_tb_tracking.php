<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_tracking").click(function(e){
		var css = '';
        if(!validator.validate()){
            e.preventDefault();
            return false;
        }
		return true;
	});
	var tab_strip = $("#data_single_tab").kendoTabStrip({
		animation:  {
			open: {
				effects: "fadeIn"
			}
		}
	}).data("kendoTabStrip");
	var tooltip = $("span.tooltips").kendoTooltip({
	filter:"a",
		width: 120,
		position: "top"
	}).data("kendoTooltip");
	var validator = $("div.information").kendoValidator().data("kendoValidator");

    var country_data = <?php echo json_encode($arr_all_country);?>;
    var combo_country = $('select#txt_country_id').width(200).kendoComboBox({
        dataSource: country_data,
        dataTextField: "country_name",
        dataValueField:"country_id",
        template: '<img src=\"<?php echo URL;?>images/flags/${data.country_key}.png\" alt=\"${data.country_name}\" hspace="5" align="left" />' +
        '<span>${ data.country_name }</span>'
    }).data("kendoComboBox");
    combo_country.value(<?php echo $v_country_id;?>);
    $('input#txt_tracking_key').focusout(function(e){
        var key = $.trim($(this).val());
        if(key==''){
            $(this).val('');
            $('input#txt_hidden_tracking_key').val('N');
            validator.validate();
            return false;
        }
        var tracking_id = $('input#txt_tracking_id').val();
        $.ajax({
            url : '<?php echo URL.$v_admin_key;?>/ajax',
            type:   'POST',
            data:   {txt_session_id: '<?php echo session_id();?>', txt_tracking_key: key, txt_tracking_id:tracking_id, txt_ajax_type: 'check_tracking_key'},
            beforeSend: function(){
                $('span#sp_tracking_key').html('Checking...');
            },
            success: function(data, status){
                $('span#sp_tracking_key').html('');
                var ret = $.parseJSON(data);
                $('input#txt_hidden_tracking_key').val(ret.error==0?'Y':'');
                validator.validate();
            }
        });
    });
});
</script>
    <div id="div_body">
        <div id="div_splitter_content" style="height: 100%; width: 100%;">
            <div id="div_left_pane">
                <div class="pane-content">
                	<div id="div_treeview"></div>
                </div>
            </div>
            <div id="div_right_pane">
                <div class="pane-content">
                    <div id="div_title" class="k-block k-widget">
                        <h3>Tracking</h3>
                    </div>
                    <div id="div_quick">
                        <div id="div_quick_search">
                        &nbsp;
                        </div>
                        <div id="div_select"><!--
                            <form id="frm_company_id" method="post">
                        Company: <select id="txt_company_id" name="txt_company_id">
                                    <option value="0" selected="selected">-------</option>
                                    <?php
                                    //echo $v_dsp_company_option;
                                    ?>
                                </select>
                            </form>
                        --></div>
                    </div>

<form id="frm_tb_tracking" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_tracking_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_tracking_id" name="txt_tracking_id" value="<?php echo $v_tracking_id;?>" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="right" valign="top">
		<td style="width: 200px">Tracking Name</td>
		<td style="width: 1px">&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_tracking_name" name="txt_tracking_name" value="<?php echo $v_tracking_name;?>" required data-required-msg="Please input Tracking Name" /> <label id="lbl_tracking_name" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Tracking Key</td>
		<td>&nbsp;</td>
		<td align="left"><input type="text" class="k-textbox" id="txt_tracking_key" name="txt_tracking_key" value="<?php echo $v_tracking_key;?>" required data-required-msg="Please input Tracking Key" />
        <input type="hidden" id="txt_hidden_tracking_key" name="txt_hidden_tracking_key" value="<?php echo $v_tracking_key!=''?'Y':'N';?>"  required data-required-msg="Tracking Key is unique"/ >
            <span id="sp_tracking_key"></span>
            <span class="tooltips"><a title="Tracking Key is unique">&nbsp;&nbsp;&nbsp;&nbsp;</a> </span>
            <label id="lbl_tracking_key" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Website</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="url" id="txt_website" name="txt_website" value="<?php echo $v_website;?>" required data-required-msg="Please input Website URL" data-url-msg="Invalid URL" /> <label id="lbl_website" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Tracking URL</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="url" id="txt_tracking_url" name="txt_tracking_url" value="<?php echo $v_tracking_url;?>" data-url-msg="Invalid URL" /></td>
	</tr>
<tr align="right" valign="top">
		<td>Option URL</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="url" id="txt_option_url" name="txt_option_url" value="<?php echo $v_option_url;?>" data-url-message="Invalid URL" /> </td>
	</tr>
<tr align="right" valign="top">
		<td>Phone</td>
		<td>&nbsp;</td>
		<td align="left"><input type="tel" class="k-textbox" id="txt_phone" name="txt_phone" value="<?php echo $v_phone;?>" pattern="\d{3}.\d{3}.\d{4}" placeholder="Please input ten digit number such as 432.548.2233" validationMessage="Please input ten digit number such as 432.548.2233" /></td>
	</tr>
<tr align="right" valign="top">
		<td>Email</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="email" id="txt_email" name="txt_email" value="<?php echo $v_email;?>" data-email-msg="Invalid Email" /></td>
	</tr>
<tr align="right" valign="top">
		<td>Contact Name</td>
		<td>&nbsp;</td>
		<td align="left"><input type="text" class="k-textbox" id="txt_contact_name" name="txt_contact_name" value="<?php echo $v_contact_name;?>" /></td>
	</tr>
<tr align="right" valign="top">
		<td>Status</td>
		<td>&nbsp;</td>
		<td align="left"><label><input type="checkbox" id="txt_status" name="txt_status" value="<?php echo $v_status;?>"<?php echo $v_status==0?' checked="checked"':'';?> /> Active?</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Description</td>
		<td>&nbsp;</td>
		<td align="left">
            <textarea class="k-textbox" style="width: 400px; hight: 100px" type="text" id="txt_description" name="txt_description"><?php echo $v_description;?></textarea></td>
	</tr>
<tr align="right" valign="top">
		<td>Country</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_country_id" name="txt_country_id">

            </select>

        </td>
	</tr>
</table>
                    </div>
                   </div>
                   <?php if(isset($v_act) && in_array($v_act, array('E', 'N'))){?>
                   <?php if($v_error_message!=''){?>
                    <div class="k-block k-widget k-error-colored div_errors">
                    <?php echo $v_error_message;?>
                    </div>
                    <?php }?>
                    <div class="k-block k-widget div_buttons">
                    <input type="submit" id="btn_submit_tb_tracking" name="btn_submit_tb_tracking" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
