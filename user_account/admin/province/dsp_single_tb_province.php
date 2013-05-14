<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_province").click(function(e){
        if(!validator.validate()){
            e.preventDefault();
            return false;
        }
		return true;
	});
    var combo_country = $("select#txt_country_id").width(200).kendoComboBox({
        dataTextField: "country_name",
        dataValueField: "country_id",
        // define custom template
        template: '<p style=\"background: url(<?php echo URL;?>images/flags/${data.country_key}.png) no-repeat left center; margin:0; padding: 2px; text-indent: 20px\">${ data.country_name }</p>',

        dataSource:{
            transport:{
                read:{
                    url: '<?php echo URL.$v_admin_key;?>/json',
                    type: 'POST',
                    data: {txt_json_type: 'load_country'}
                }
            }
        }
    }).data("kendoComboBox");
    combo_country.value(<?php echo $v_country_id;?>);
    $('input#txt_province_key').focusout(function(e){
        var val = $.trim($(this).val());
        if(val==''){
            $(this).val('');
            $('input#txt_hidden_province_key').val('N');
            return false;
        }
        var province_id = $('input#txt_province_id').val();
        $.ajax({
            url:    '<?php echo URL.$v_admin_key;?>/ajax',
            type:   'POST',
            data:   {txt_session_id: '<?php echo session_id();?>', txt_province_key: val, txt_ajax_type: 'check_province_key', txt_province_id: province_id},
            beforeSend: function(){
                $('span#sp_province_key').html('Checking....');
            },
            success: function(data, status){
                $('span#sp_province_key').html('');
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    $('input#txt_hidden_province_key').val('Y');
                }else{
                    $('input#txt_hidden_province_key').val('');
                }
                validator.validate();
            }
        });
    });
    $('input#txt_province_order').kendoNumericTextBox({
        format: "n0",
        step:1
    });
    var tab_strip = $("#data_single_tab").kendoTabStrip({
		animation:  {
			open: {
				effects: "fadeIn"
			}
		}
	}).data("kendoTabStrip");
	var tooltip = $("#tooltip").kendoTooltip({
		width: 120,
		position: "top"
	}).data("kendoTooltip");
	if(tooltip) tooltip.show();
	var validator = $("div.information").kendoValidator().data("kendoValidator");
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
                        <h3>Province</h3>
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

<form id="frm_tb_province" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_province_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_province_id" name="txt_province_id" value="<?php echo $v_province_id;?>" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="right" valign="top">
		<td style="width: 200px">Province Name</td>
		<td style="width: 1px">&nbsp;</td>
		<td align="left"><input class="k-textbox" type="text" id="txt_province_name" name="txt_province_name" value="<?php echo $v_province_name;?>" required data-required-msg="Please input Province Name" /> <label id="lbl_province_name" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Province Key</td>
		<td>&nbsp;</td>
		<td align="left"><input class="k-textbox" type="text" id="txt_province_key" name="txt_province_key" value="<?php echo $v_province_key;?>" required data-required-msg="Please input Province Key" />
            <input type="hidden" id="txt_hidden_province_key" name="txt_hidden_province_key" value="<?php echo $v_province_key!=''?'Y':'N';?>" required data-required-msg="Duplicate Province Key!" />
            <span id="sp_province_key"></span>
            <label id="lbl_province_key" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Province Status</td>
		<td>&nbsp;</td>
		<td align="left">
            <label><input type="checkbox" id="txt_province_status" name="txt_province_status"<?php echo $v_province_status==0?' checked="checked"':'';?> /> Active?</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Province Order</td>
		<td>&nbsp;</td>
		<td align="left"><input type="text" id="txt_province_order" name="txt_province_order" value="<?php echo $v_province_order;?>" /></td>
	</tr>
<tr align="right" valign="top">
		<td>Country</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_country_id" name="txt_country_id">

            </select>
            <input type="hidden" id="txt_hidden_country_id" name="txt_hidden_country_id" value="<?php echo $v_country_id>0?'Y':'N';?>" /> <label id="lbl_country_id" class="k-required">(*)</label></td>
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
                    <input type="submit" id="btn_submit_tb_province" name="btn_submit_tb_province" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
