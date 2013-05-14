<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_email_templates").click(function(e){
        if(!validator.validate()){
            e.preventDefault();
            if(tab_strip.select().index()!=0) tab_strip.select(0);
            return false;
        }

		return true;
	});
    var editor = $('textarea#txt_content_email').kendoEditor({
        tools: [
            "bold",
            "italic",
            "underline",
            "strikethrough",
            "fontName",
            "fontSize",
            "foreColor",
            "backColor",
            "justifyLeft",
            "justifyCenter",
            "justifyRight",
            "justifyFull",
            "insertUnorderedList",
            "insertOrderedList",
            "indent",
            "outdent",
            "formatBlock",
            "createLink",
            "unlink",
            "insertImage",
            "subscript",
            "superscript",
            "viewHtml"
        ],
        encoded: false
    }).data("kendoEditor");
    $('select#txt_email_type').kendoDropDownList();
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
    $('input#txt_email_key').focusout(function(e){
        var val = $.trim($(this).val());
        if(val==''){
            $(this).val('');
            $('input#txt_hidden_email_key').val('N');
            validator.validate();
            return false;
        }
        var email_id = $('input#txt_email_id').val();
        $.ajax({
            url     : '<?php echo URL.$v_admin_key;?>/ajax',
            type    :   'POST',
            data    :   {txt_session_id: '<?php echo session_id();?>', txt_email_key: val, txt_email_id: email_id, txt_ajax_type:'check_email_key'},
            beforeSend: function(){
                $('span#sp_email_key').html('Checking...');
            },
            success : function(data, status){
                $('span#sp_email_key').html('');
                var ret = $.parseJSON(data);
                $('input#txt_hidden_email_key').val(ret.error==0?'Y':'');
                validator.validate();
            }
        })
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
                        <h3>Email_templates</h3>
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

<form id="frm_tb_email_templates" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_email_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_email_id" name="txt_email_id" value="<?php echo $v_email_id;?>" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                        <li>Content</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="right" valign="top">
		<td style="width: 200px">Email Key</td>
		<td style="width: 1px">&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_email_key" name="txt_email_key" value="<?php echo $v_email_key;?>" required data-required-msg="Please input Email Key" />
        <input type="hidden" id="txt_hidden_email_key" name="txt_hidden_email_key" value="<?php echo $v_email_key!=''?'Y':'N';?>"  required data-required-msg="Duplicate Email Key" />
            <span id="sp_email_key"></span>
            <span class="tooltips"><a title="Email Key is unique">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
            <label id="lbl_email_key" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Email Data</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_email_data" name="txt_email_data" value="<?php echo $v_email_data;?>" required data-required-msg="Please input Email Data" /> <label id="lbl_email_data" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Email Type</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_email_type" name="txt_email_tyle">
                <?php echo $cls_settings->draw_option_by_id('email_type',0, $v_email_type);?>
            </select>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Description</td>
		<td>&nbsp;</td>
		<td align="left">
            <textarea class="k-textbox" style="width: 500px; height: 200px; padding:5px;"id="txt_description" name="txt_description"><?php echo $v_description;?></textarea></label>
        </td>
	</tr>
</table>
                    </div>
                    <div class="content div_details">
                        <textarea id="txt_content_email" name="txt_content_email" style="width:90%; height:300px; padding:5px">
                            <?php echo $v_dsp_email;?>
                        </textarea>
                    </div>
                   </div>
                   <?php if(isset($v_act) && in_array($v_act, array('E', 'N'))){?>
                   <?php if($v_error_message!=''){?>
                    <div class="k-block k-widget k-error-colored div_errors">
                    <?php echo $v_error_message;?>
                    </div>
                    <?php }?>
                    <div class="k-block k-widget div_buttons">
                    <input type="submit" id="btn_submit_tb_email_templates" name="btn_submit_tb_email_templates" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
