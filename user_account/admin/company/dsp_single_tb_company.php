<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_company").click(function(e){
        if(!validator.validate()){
            e.preventDefault();
            return false;
        }
		return true;
	});
    var contact_data = <?php echo json_encode($arr_all_contact);?>;
    var combo_csr = $('select#txt_csr_id').width(200).kendoComboBox({
        filter:"startswith",
        dataSource: contact_data,
        dataTextField: "contact_name",
        dataValueField: "contact_id",
        template: '<h3>#= contact_name #</h3>' +
            '<p>#= contact_info #</p>'
    }).data("kendoComboBox");
    var combo_sales_rep_id = $('select#txt_sales_rep_id').width(200).kendoComboBox({
        filter:"startswith",
        dataSource: contact_data,
        dataTextField: "contact_name",
        dataValueField: "contact_id",
        template: '<h3>#= contact_name #</h3>' +
            '<p>#= contact_info #</p>'
    }).data("kendoComboBox");

    combo_csr.value(<?php echo $v_csr_id;?>);
    combo_sales_rep_id.value(<?php echo $v_sales_rep_id;?>);

    $('input#txt_logo_file').kendoUpload({
        multiple: false
    });
    $('input#txt_company_code').focusout(function(e){
        var val = $.trim($(this).val());
        if(val==''){
            $(this).val('');
            $('input#txt_hidden_company_code').val('N');
            return false;
        }
        var company_id = $('input#txt_company_id').val();
        $.ajax({
            url : '<?php echo URL.$v_admin_key;?>/ajax',
            type: 'POST',
            data:   {txt_session_id:'<?php echo session_id();?>', txt_company_id: company_id, txt_company_code: val, txt_ajax_type: 'check_company_code'},
            beforeSend: function(){
                $('span#sp_company_code').html('Checking...');
            },
            success: function(data, status){
                var ret = $.parseJSON(data);
                $('span#sp_company_code').html('');
                $('input#txt_hidden_company_code').val(ret.error==0?'Y':'');
                validator.validate();
            }
        });
    });
    $('select#txt_relationship').width(150).kendoDropDownList();
    $('select#txt_industry').width(150).kendoDropDownList();
    $('select#txt_business_type').width(150).kendoDropDownList();
    $('select#txt_status').width(100).kendoDropDownList();
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
                        <h3>Company<?php echo $v_company_id>0?': '.$v_company_name:'';?></h3>
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

<form id="frm_tb_company" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_company_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="right" valign="top">
		<td style="width: 200px">Company Name</td>
		<td style="width: 1px">&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_company_name" name="txt_company_name" value="<?php echo $v_company_name;?>" required data-required-msg="Please input Company Name" /> <label id="lbl_company_name" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Company Code</td>
		<td>&nbsp;</td>
		<td align="left">
            <?php if($v_company_id<=0){?>
            <input class="k-textbox" type="text" id="txt_company_code" name="txt_company_code" value="<?php echo $v_company_code;?>" required data-required-msg="Please input Company Code" pattern="\w+" validationMessage="Only normal character allowed" />
                <input type="hidden" id="txt_hidden_company_code" name="txt_hidden_company_code" value="<?php echo $v_company_code!=''?'Y':'N';?>" required data-required-msg="Duplicate Company Code" />
                <span id="sp_company_code"></span>
                <span class="tooltips"><a title="Company Code is unique">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
                <label id="lbl_company_code" class="k-required">(*)</label>
            <?php }else{?>
                <span><?php echo $v_company_code;?></span>
                <input type="hidden" value="<?php echo $v_company_code;?>" id="txt_company_code" name="txt_company_code" />
            <?php }?>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Relationship</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_relationship" name="txt_relationship">
                <?php echo $cls_settings->draw_option_by_id('relationship', 0, $v_relationship);?>
            </select>
        </td>
	</tr>
    <tr align="right" valign="top">
        <td>Industry</td>
        <td>&nbsp;</td>
        <td align="left">
            <select id="txt_industry" name="txt_industry">
                <?php echo $cls_settings->draw_option_by_id('industry', 0, $v_industry);?>
            </select>
        </td>
    </tr>
    <tr align="right" valign="top">
        <td>Business Type</td>
        <td>&nbsp;</td>
        <td align="left">
            <select id="txt_business_type" name="txt_business_type">
                <?php echo $cls_settings->draw_option_by_id('bussiness_type', 0, $v_bussines_type);?>
            </select>
        </td>
    </tr>
<tr align="right" valign="top">
		<td>CSR</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_csr_id" name="txt_csr_id">

            </select></td>
	</tr>
<tr align="right" valign="top">
		<td>Sales Rep</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_sales_rep_id" name="txt_sales_rep_id">

            </select>
            </td>
	</tr>
<tr align="right" valign="top">
		<td>Website</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="url" id="txt_website" name="txt_website" value="<?php echo $v_website;?>" data-url-msg="Invalid URL" /></td>
	</tr>
    <tr align="right" valign="top">
        <td>Email</td>
        <td>&nbsp;</td>
        <td align="left"><input class="text_css k-textbox" size="50" type="email" id="txt_sales_rep_email" name="txt_sales_rep_email" value="<?php echo $v_sales_rep_email;?>" data-email-msg="Invalid Email" /></td>
    </tr>
<tr align="right" valign="top">
		<td>Status</td>
		<td>&nbsp;</td>
		<td align="left">
            <select name="txt_status" id="txt_status">
                <?php echo $cls_settings->draw_option_by_id('status',0,$v_status); ?>
            </select>
        </td>
	</tr>
    <tr align="right" valign="top">
        <td>Logo File</td>
        <td>&nbsp;</td>
        <td align="left"><input type="file" id="txt_logo_file" name="txt_logo_file" accept="image/*" />
        <input type="hidden" name="txt_hidden_logo_file" value="<?php echo $v_logo_file;?>" />
        </td>
    </tr>
    <tr align="right" valign="top">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="left"><?php if($v_logo_url!='') echo $v_logo_url;?>&nbsp;</td>
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
                    <input type="submit" id="btn_submit_tb_company" name="btn_submit_tb_company" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
