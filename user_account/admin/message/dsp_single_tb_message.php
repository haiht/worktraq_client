<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_message").click(function(e){
        if(!validator.validate()){
            e.preventDefault();
            return false;
        }
		return true;
	});
    $('select#txt_message_type').width(150).kendoDropDownList();
    $('input#txt_message_order').kendoNumericTextBox({
        format: "n0",
        step: 1
    });
	var tab_strip = $("#data_single_tab").kendoTabStrip({
		animation:  {
			open: {
				effects: "fadeIn"
			}
		}
	}).data("kendoTabStrip");
	var tooltip = $("span.tooltips").kendoTooltip({
        filter: 'a',
		width: 120,
		position: "top"
	}).data("kendoTooltip");
	var validator = $("div.information").kendoValidator().data("kendoValidator");
    $('input#txt_message_key').focusout(function(e){
        var val = $.trim($(this).val());
        if(val==''){
            $(this).val('');
            $('input#txt_hidden_message_key').val('N');
            validator.validate();
            return false;
        }
        var message_id = $('input#txt_message_id').val();
        message_id = parseInt(message_id, 10);
        $.ajax({
            url     : '<?php echo URL.$v_admin_key;?>/ajax',
            type    :   'POST',
            data    :   {txt_message_key: val, txt_message_id: message_id, txt_ajax_type: 'check_message_key'},
            beforeSend: function(){
                $('span#sp_message_key').html('Checking...');
            },
            success: function(data, status){
                $('span#sp_message_key').html('');
                var ret = $.parseJSON(data);
                $('input#txt_hidden_message_key').val(ret.error==0?'Y':'');
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
                        <h3>Message</h3>
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

<form id="frm_tb_message" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_message_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_message_id" name="txt_message_id" value="<?php echo $v_message_id;?>" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="right" valign="top">
		<td style="width: 200px">Message Type</td>
		<td style="width: 1px">&nbsp;</td>
		<td align="left">
            <select id="txt_message_type" name="txt_message_type">
                <?php echo $cls_settings->draw_option_by_id('message_type',0,$v_message_type);?>
            </select>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Message Key</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_message_key" name="txt_message_key" value="<?php echo $v_message_key;?>" required data-required-msg="Please input Message Key" />
            <input type="hidden" id="txt_hidden_message_key" name="txt_hidden_message_key" value="<?php echo $v_message_key!=''?'Y':'N';?>" required data-required-msg="Please input another Message Key" />
            <span id="sp_message_key"></span>
            <span class="tooltips"><a title="Message Key is unique">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
            <label id="lbl_message_key" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Message Value</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_message_value" name="txt_message_value" value="<?php echo $v_message_value;?>" required data-required-msg="Please input Message Value" /> <label id="lbl_message_value" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Message Order</td>
		<td>&nbsp;</td>
		<td align="left"><input type="text" id="txt_message_order" name="txt_message_order" value="<?php echo $v_message_order;?>" /></td>
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
                    <input type="submit" id="btn_submit_tb_message" name="btn_submit_tb_message" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
