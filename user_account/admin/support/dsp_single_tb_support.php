<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_support").click(function(e){
		return true;
	});
	$('input#txt_date_created').kendoDatePicker({format:"dd-MMM-yyyy"});
    var combo_location = $('select#txt_location_id').width(200).kendoComboBox({
        filter:"startswith",
        dataTextField: "location_name",
        dataValueField: "location_id",
        dataSource: {
            transport: {
                read: {
                    url: "<?php echo URL.$v_admin_key;?>/json",
                    type:"POST",
                    data:{txt_json_type:'load_location', txt_company_id: <?php echo $v_company_id;?>}
                },
                type: "json"
            }
        }
    }).data("kendoComboBox");
    combo_location.value(<?php echo $v_location_id;?>);
	var tab_strip = $("#data_single_tab").kendoTabStrip({
		animation:  {
			open: {
				effects: "fadeIn"
			}
		}
	}).data("kendoTabStrip");
    $('select#txt_location_id').change(function(e){
        var val = $(this).val();
        val = parseInt(val, 10);
        if(isNaN(val) || val<0) val=0;
        $('input#txt_hidden_location_id').val(val>0?'Y':'');
        validator.validate();
    });
    var combo_contact = $("select#txt_contact_id").width(300).kendoComboBox({
        filter:"startswith",
        dataTextField: "contact_name",
        dataValueField: "contact_id",
        template: '<h3>#= contact_name #</h3>' +
            '<p>#= contact_info #</p>',
        dataSource: {
            transport: {
                read: {
                    url: "<?php echo URL.$v_admin_key;?>/json",
                    type:"POST",
                    data:{txt_json_type:'load_contact', txt_company_id: <?php echo $v_company_id;?>}
                },
                type: "json"
            }
        }
    }).data("kendoComboBox");
    combo_contact.value(<?php echo $v_contact_id;?>);
    $("select#txt_contact_id").change(function(e){
        var val = $(this).val();
        val = parseInt(val, 10);
        if(isNaN(val) || val<0) val=0;
        $('input#txt_hidden_contact_id').val(val>0?'Y':'');
        validator.validate();
    });
    var tooltip = $("#tooltip").kendoTooltip({
		width: 120,
		position: "top"
	}).data("kendoTooltip");
	if(tooltip) tooltip.show();
	var validator = $("div.information").kendoValidator().data("kendoValidator");
	var combo_company = $('select#txt_company_id').data('kendoComboBox');
	<?php if($v_company_id <= 0){;?>
	$('select#txt_company_id').change(function(e){
		var company_id = $(this).val();
		company_id = parseInt(company_id, 10);
		if(isNaN(company_id) || company_id <0) company_id = 0;
        var $this = $(this);
        $.ajax({
            url     : '<?php echo URL.$v_admin_key;?>/ajax',
            type    : "POST",
            data    : {txt_session_id: '<?php echo session_id();?>', txt_ajax_type: 'load_location_contact', txt_company_id: company_id},
            beforeSend: function(){
                combo_company.enable(false);
                $this.prop("disabled", true);
            },
            success: function(data, status){
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    var location_data = ret.location;
                    var contact_data = ret.contact;
                    combo_location.setDataSource(location_data);
                    combo_location.value(0);
                    combo_contact.setDataSource(contact_data);
                    combo_contact.value(0);
                    $('form#frm_tb_support').find('#txt_company_id').val(company_id);
                }else{
                    alert('Cannot load data!');
                }
            }
        });

	});
	<?php }else{;?>
		combo_company.enable(false);
	<?php };?>
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
                        <h3>Support</h3>
                    </div>
                    <div id="div_quick">
                        <div id="div_quick_search">
                        &nbsp;
                        </div>
                        <div id="div_select">
                            <form id="frm_company_id" method="post">
                        Company: <select id="txt_company_id" name="txt_company_id">
                                    <option value="0" selected="selected">-------</option>
                                    <?php
                                    echo $v_dsp_company_option;
                                    ?>
                                </select>
                            </form>
                        </div>
                    </div>

<form id="frm_tb_support" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_support_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_support_id" name="txt_support_id" value="<?php echo $v_support_id;?>" />
<input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
    <tr align="right" valign="top">
        <td style="width:200px">Location</td>
        <td style="width:1px">&nbsp;</td>
        <td align="left">
            <select id="txt_location_id" name="txt_location_id">

            </select>
            <input type="hidden" id="txt_hidden_location_id" name="txt_hidden_location_id" value="<?php echo $v_location_id>0?'Y':'';?>" required data-required-msg="Please select Location" />
            <label id="lbl_location_id" class="k-required">(*)</label>
        </td>
    </tr>
<tr align="right" valign="top">
		<td>Support Title</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_support_title" name="txt_support_title" value="<?php echo $v_support_title;?>" required data-required-msg="Please input Support Title" /> <label id="lbl_support_title" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Support Description</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_support_description" name="txt_support_description" value="<?php echo $v_support_description;?>" /></td>
	</tr>
<tr align="right" valign="top">
		<td>Contact</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_contact_id" name="txt_contact_id">

            </select>
            <input type="hidden" id="txt_hidden_contact_id" name="txt_hidden_contact_id" value="<?php echo $v_contact_id>0?'Y':'';?>" required data-required-msg="Please select Contact" /> <label id="lbl_contact_id" class="k-required">(*)</label>
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
                    <input type="submit" id="btn_submit_tb_support" name="btn_submit_tb_support" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
