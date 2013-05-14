<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_location").click(function(e){

		var company_id = $("select#txt_company_id").val();
		company_id = parseInt(company_id, 10);
        if(isNaN(company_id) || company_id<0) company_id = 0;
        if(company_id==0){
            e.preventDefault();
            alert('Please select Company first!');
            $("select#txt_company_id").focus();
            combo_company.focus();
            return false;
        }
        if(!validator.validate()){
            e.preventDefault();
            if(tab_strip.select().index()!=0) tab_strip.select(0);
            return false;
        }
        if(!validator1.validate()){
            e.preventDefault();
            if(tab_strip.select().index()!=1) tab_strip.select(1);
            return false;
        }
        $('input#txt_open_date').val(kendo.toString(open_date.value(),'yyyy-MM-dd HH:mm:ss'));
        $('input#txt_close_date').val(kendo.toString(close_date.value(),'yyyy-MM-dd HH:mm:ss'));
		return true;
	});
	var open_date = $('input#txt_open_date').kendoDatePicker(
        {
            format:"dd-MMM-yyyy",
            change: change_open_date
        }
    ).data("kendoDatePicker");
	var close_date = $('input#txt_close_date').kendoDatePicker(
        {
            format:"dd-MMM-yyyy",
            change: change_close_date
        }
    ).data("kendoDatePicker");
    function change_open_date() {
        var openDate = open_date.value(),
            closeDate = close_date.value();
        if (openDate) {
            openDate = new Date(openDate);
            openDate.setDate(openDate.getDate());
            close_date.min(openDate);
        } else if (closeDate) {
            open_date.max(new Date(closeDate));
        } else {
            closeDate = new Date();
            open_date.max(closeDate);
            close_date.min(closeDate);
        }
    }

    function change_close_date() {
        var closeDate = close_date.value(),
            openDate = open_date.value();

        if (closeDate) {
            closeDate = new Date(closeDate);
            closeDate.setDate(closeDate.getDate());
            open_date.max(closeDate);
        } else if (openDate) {
            close_date.min(new Date(openDate));
        } else {
            closeDate = new Date();
            open_date.max(closeDate);
            close_date.min(closeDate);
        }
    }
    open_date.max(<?php echo $v_enable_close_date?'close_date.value()':'new Date()';?>);
    close_date.min(open_date.value());
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
	//if(tooltip) tooltip.show();

	var validator = $("div.information").kendoValidator().data("kendoValidator");
	var validator1 = $("div.mailing").kendoValidator().data("kendoValidator");
    var combo_company = $('select#txt_company_id').data("kendoComboBox");
	<?php if($v_company_id <= 0){;?>
	$('select#txt_company_id').change(function(e){
		var company_id = $(this).val();
		company_id = parseInt(company_id, 10);
		if(isNaN(company_id) || company_id <0) company_id = 0;
        var $this = $(this);
        $.ajax({
            url     : '<?php echo URL.$v_admin_key;?>/ajax',
            type    : 'POST',
            data    : {txt_session_id: '<?php echo session_id();?>', txt_company_id: company_id, txt_ajax_type:'load_contact'},
            beforeSend: function(){
                $this.prop("disabled", true);
                combo_company.enable(false);
            },
            success: function(data, status){
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    var contact_data = ret.contact;
                    combo_main_contact.setDataSource(contact_data);
                    combo_approved_contact.setDataSource(contact_data);
                    combo_main_contact.value(0);
                    combo_approved_contact.value(0);
                    $('form#frm_tb_location').find('#txt_company_id').val(company_id);
                }
                combo_company.enable(true);
            }
        });

    });
	<?php }else{;?>
    combo_company.enable(false);
    <?php };?>
    $('select#txt_location_type').width(150).kendoComboBox();
    $('select#txt_location_type').change(function(e){
        var val = $(this).val();
        val = parseInt(val, 10);
        if(isNaN(val)||val<0) val=0;
        $('input#txt_hidden_location_type').val(val>0?'Y':'N');
    });
    $('input#txt_location_number').focusout(function(e){
        var location_number = $.trim($(this).val());
        if(location_number==''){
            $('input#txt_hidden_location_number').val('N');
            $(this).val('');
            return false;
        }
        var company_id = $('select#txt_company_id').val();
        var location_id = $('input#txt_location_id').val();
        var $this = $(this);
        $.ajax({
            'url'   :   '<?php echo URL.$v_admin_key;?>/ajax',
            type    :   'POST',
            data    :   {txt_session_id:'<?php echo session_id();?>', txt_location_number: location_number, txt_company_id:company_id,txt_location_id:location_id, txt_ajax_type:'check_location_number'},
            beforeSend: function(){
                $this.prop("disabled", true);
                $('span#sp_location_number').html('Checking...');
            },
            success: function(data, status){
                var ret = $.parseJSON(data);
                $this.prop("disabled", false);
                $('span#sp_location_number').html('');
                $('input#txt_hidden_location_number').val(ret.error==0?'Y':'');
                validator.validate();
            }
        });
    });
    $('input#chk_enable_close_date').click(function(e){
        var chk = $(this).prop("checked");
        $('span#sp_close_date').css("display",chk?'':'none');
        if(chk){
            var close_value = close_date.value();
            open_date.max(close_value);
        }else{
            var close_value = new Date();
            open_date.max(close_value);
        }
    });
    var combo_main_contact = $('select#txt_main_contact').width(300).kendoComboBox({
        filter:"startswith",
        dataValueField:"contact_id",
        dataTextField:'contact_name',
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
    var combo_approved_contact = $('select#txt_approved_contact').width(300).kendoComboBox({
        filter:"startswith",
        dataValueField:"contact_id",
        dataTextField:'contact_name',
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
    combo_main_contact.value(<?php echo $v_main_contact;?>);
    combo_approved_contact.value(<?php echo $v_approved_contact;?>);

    $('select#txt_address_province').width(150).kendoComboBox();
    $('select#txt_address_country').width(150).kendoComboBox();
    $('select#txt_address_province').change(function(e){
        var val = $(this).val();
        val = parseInt(val, 10);
        if(isNaN(val)|| val<0) val=0;
        $('input#txt_hidden_address_province').val(val>0?'Y':'');
    });
    $('select#txt_address_country').change(function(e){
        var val = $(this).val();
        val = parseInt(val, 10);
        if(isNaN(val)|| val<0) val=0;
        $('input#txt_hidden_address_country').val(val>0?'Y':'');
    });
    $('select#txt_shipped_address_province').width(150).kendoComboBox();
    $('select#txt_shipped_address_country').width(150).kendoComboBox();
    $('input#txt_flag_shipped_address').click(function(e){
        var chk = $(this).prop("checked");
        $.each($('div.shipping table tr'), function(index, element){
            if(index>0) $(this).css("display",chk?'none':'');
        });
    });
    $('select#txt_status').width(150).kendoComboBox();
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
                        <h3>Location<?php echo $v_location_id>0?': '.$v_location_name:'';?></h3>
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

<form id="frm_tb_location" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_location_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_location_id" name="txt_location_id" value="<?php echo $v_location_id;?>" />
<input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                        <li>Mailing Address</li>
                        <li>Shipping Address</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="right" valign="top">
		<td style="width:200px">Location Name</td>
		<td style="width:1px">&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" type="text" id="txt_location_name" name="txt_location_name" value="<?php echo $v_location_name;?>" required validationMessage="Please input Location Name" /> <label id="lbl_company_id" class="k-required">(*)</label></td>
	</tr>
    <tr align="right" valign="top">
        <td>Phone Number</td>
        <td>&nbsp;</td>
        <td align="left"><input class="k-textbox" type="tel" id="txt_location_phone" name="txt_location_phone" value="<?php echo $v_location_phone;?>" required validationMessage="Please input ten digit e.g. 344.535.8909" pattern="\d{3}.\d{3}.\d{4}" data-tel-msg="Please input ten digit e.g. 344.535.8909" />
            <span class="tooltips"><a title="Please input ten digit e.g. 344.535.8909">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
            <label id="lbl_location_phone" class="k-required">(*)</label></td>
    </tr>
<tr align="right" valign="top">
		<td>Location Type</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_location_type" name="txt_location_type">
                <?php
                echo $cls_settings->draw_option_by_id('location_type',0,$v_location_type);
                ?>
            </select>
            <input type="hidden" id="txt_hidden_location_type" name="txt_hidden_location_type" value="<?php echo $v_location_type>0?'Y':'';?>" required validationMessage="Please select Location Type" /> <label id="lbl_location_type" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Location Number</td>
		<td>&nbsp;</td>
		<td align="left"><input class="k-textbox" type="numbe" id="txt_location_number" name="txt_location_number" value="<?php echo $v_location_number;?>" required validationMessage="Please input Location Number" />
        <input type="hidden" id="txt_hidden_location_number" name="txt_hidden_location_number" value="<?php echo $v_location_number!=''?'Y':'N';?>" required validationMessage="Location Number must be unique" />
            <span id="sp_location_number"></span>
            <span class="tooltips"><a title="Location Number must be unique">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
            <label id="lbl_location_number" class="k-required">(*)</label></td>
	</tr>
    <tr align="right" valign="top">
        <td>Location Banner</td>
        <td>&nbsp;</td>
        <td align="left"><input class="k-textbox" type="text" id="txt_location_banner" name="txt_location_banner" value="<?php echo $v_location_banner;?>" /></td>
    </tr>
    <tr align="right" valign="top">
        <td>Location Region</td>
        <td>&nbsp;</td>
        <td align="left"><input class="k-textbox" type="text" id="txt_location_region" name="txt_location_region" value="<?php echo $v_location_region;?>" />
            <span class="tooltips"><a title="This field is used when company's location will be grouped into regions or areas">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
        </td>
    </tr>
<tr align="right" valign="top">
		<td>Main Contact</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_main_contact" name="txt_main_contact">

            </select>
        </td>
	</tr>
    <tr align="right" valign="top">
        <td>Approved Contact</td>
        <td>&nbsp;</td>
        <td align="left">
            <select id="txt_approved_contact" name="txt_approved_contact">

            </select>
        </td>
    </tr>
<tr align="right" valign="top">
		<td>Open Date</td>
		<td>&nbsp;</td>
		<td align="left"><input type="text" id="txt_open_date" name="txt_open_date" value="<?php echo $v_open_date;?>" /></td>
	</tr>
<tr align="right" valign="top">
		<td>Close Date</td>
		<td valign="middle"><input type="checkbox" id="chk_enable_close_date" name="chk_enable_close_date"<?php echo $v_enable_close_date?' checked="checked"':'';?> /></td>
		<td align="left">

            <span id="sp_close_date"<?php echo !$v_enable_close_date?' style="display:none"':'';?>>
            <input type="text" id="txt_close_date" name="txt_close_date" value="<?php echo $v_close_date;?>" /></span></td>
	</tr>
<tr align="right" valign="top">
		<td>Status</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_status" name="txt_status">
                <?php
                echo $cls_settings->draw_option_by_id('location_status',0,$v_status);
                ?>
            </select>

        </td>
	</tr>
</table>
                    </div>
                        <div class="mailing div_details">
                            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                                <tr align="right" valign="top">
                                    <td style="width:200px">Address Unit</td>
                                    <td style="width:1px">&nbsp;</td>
                                    <td align="left"><input class="k-textbox" type="text" id="txt_address_unit" name="txt_address_unit" value="<?php echo $v_address_unit;?>" /></td>
                                </tr>
                                <tr align="right" valign="top">
                                    <td>Address Line 1</td>
                                    <td>&nbsp;</td>
                                    <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_address_line_1" name="txt_address_line_1" value="<?php echo $v_address_line_1;?>" required validationMessage="Please input Address Line" /> <label id="lbl_address_line_1" class="k-required">(*)</label></td>
                                </tr>
                                <tr align="right" valign="top">
                                    <td>Address Line 2</td>
                                    <td>&nbsp;</td>
                                    <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_address_line_2" name="txt_address_line_2" value="<?php echo $v_address_line_2;?>" /></td>
                                </tr>
                                <tr align="right" valign="top">
                                    <td>Address Line 3</td>
                                    <td>&nbsp;</td>
                                    <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_address_line_3" name="txt_address_line_3" value="<?php echo $v_address_line_3;?>" /> </td>
                                </tr>
                                <tr align="right" valign="top">
                                    <td>Address City</td>
                                    <td>&nbsp;</td>
                                    <td align="left"><input class="k-textbox" type="text" id="txt_address_city" name="txt_address_city" value="<?php echo $v_address_city;?>" required validationMessage="Please input Address City" />
                                        <label id="lbl_address_city" class="k-required">(*)</label></td>
                                </tr>
                                <tr align="right" valign="top">
                                    <td>Address Postal</td>
                                    <td>&nbsp;</td>
                                    <td align="left"><input class="k-textbox" size="50" type="text" id="txt_address_postal" name="txt_address_postal" value="<?php echo $v_address_postal;?>" required validationMessage="Please input Address Postal" /> <label id="lbl_address_postal" class="k-required">(*)</label></td>
                                </tr>
                                <tr align="right" valign="top">
                                    <td>Address Province</td>
                                    <td>&nbsp;</td>
                                    <td align="left">
                                        <select id="txt_address_province" name="txt_address_province">
                                            <option value="0">--------</option>
                                            <?php
                                            echo $cls_tb_province->draw_option('province_id', 'province_name', $v_address_province);
                                            ?>
                                        </select>
                                        <input type="hidden" id="txt_hidden_address_province" name="txt_hidden_address_province" value="<?php echo $v_address_province>0?'Y':''?>" required validationMessage="Please select Address Province" />
                                        <label id="lbl_address_province" class="k-required">(*)</label>
                                    </td>
                                </tr>
                                <tr align="right" valign="top">
                                    <td>Address Country</td>
                                    <td>&nbsp;</td>
                                    <td align="left">
                                        <select id="txt_address_country" name="txt_address_country">
                                            <option value="0">--------</option>
                                            <?php
                                            echo $cls_tb_country->draw_option('country_id', 'country_name', $v_address_country);
                                            ?>
                                        </select>
                                        <input type="hidden" id="txt_hidden_address_country" name="txt_hidden_address_country" value="<?php echo $v_address_country>0?'Y':''?>" required validationMessage="Please select Address Country" />
                                        <label id="lbl_address_country" class="k-required">(*)</label></td>
                                </tr>
                            </table>
                        </div>
                        <div class="shipping div_details">
                            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                                <tr align="right" valign="middle">
                                    <td style="width:200px">Use default address</td>
                                    <td style="width:1px">&nbsp;</td>
                                    <td align="left">
                                        <input type="checkbox" id="txt_flag_shipped_address" name="txt_flag_shipped_address"<?php echo $v_flag_shipped_address==1?' checked="checked"':'';?> />
                                    </td>
                                </tr>
                                <tr align="right" valign="top"<?php echo $v_flag_shipped_address==1?' style="display:none"':'';?>>
                                    <td>Address Unit</td>
                                    <td>&nbsp;</td>
                                    <td align="left"><input class="k-textbox" type="text" id="txt_shipped_address_unit" name="txt_shipped_address_unit" value="<?php echo $v_shipped_address_unit;?>" /></td>
                                </tr>
                                <tr align="right" valign="top"<?php echo $v_flag_shipped_address==1?' style="display:none"':'';?>>
                                    <td>Address Line 1</td>
                                    <td>&nbsp;</td>
                                    <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_shipped_address_line_1" name="txt_shipped_address_line_1" value="<?php echo $v_shipped_address_line_1;?>" /></td>
                                </tr>
                                <tr align="right" valign="top"<?php echo $v_flag_shipped_address==1?' style="display:none"':'';?>>
                                    <td>Address Line 2</td>
                                    <td>&nbsp;</td>
                                    <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_shipped_address_line_2" name="txt_shipped_address_line_2" value="<?php echo $v_shipped_address_line_2;?>" /></td>
                                </tr>
                                <tr align="right" valign="top"<?php echo $v_flag_shipped_address==1?' style="display:none"':'';?>>
                                    <td>Address Line 3</td>
                                    <td>&nbsp;</td>
                                    <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_shipped_address_line_3" name="txt_shipped_address_line_3" value="<?php echo $v_shipped_address_line_3;?>" /> </td>
                                </tr>
                                <tr align="right" valign="top"<?php echo $v_flag_shipped_address==1?' style="display:none"':'';?>>
                                    <td>Address City</td>
                                    <td>&nbsp;</td>
                                    <td align="left"><input class="k-textbox" type="text" id="txt_shipped_address_city" name="txt_shipped_address_city" value="<?php echo $v_shipped_address_city;?>" />
                                        </td>
                                </tr>
                                <tr align="right" valign="top"<?php echo $v_flag_shipped_address==1?' style="display:none"':'';?>>
                                    <td>Address Postal</td>
                                    <td>&nbsp;</td>
                                    <td align="left"><input class="k-textbox" type="text" id="txt_shipped_address_postal" name="txt_shipped_address_postal" value="<?php echo $v_address_postal;?>" /></td>
                                </tr>
                                <tr align="right" valign="top"<?php echo $v_flag_shipped_address==1?' style="display:none"':'';?>>
                                    <td>Address Province</td>
                                    <td>&nbsp;</td>
                                    <td align="left">
                                        <select id="txt_shipped_address_province" name="txt_shipped_address_province">
                                            <option value="0">--------</option>
                                            <?php
                                            echo $cls_tb_province->draw_option('province_id', 'province_name', $v_shipped_address_province);
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr align="right" valign="top"<?php echo $v_flag_shipped_address==1?' style="display:none"':'';?>>
                                    <td>Address Country</td>
                                    <td>&nbsp;</td>
                                    <td align="left">
                                        <select id="txt_shipped_address_country" name="txt_shipped_address_country">
                                            <option value="0">--------</option>
                                            <?php
                                            echo $cls_tb_country->draw_option('country_id', 'country_name', $v_shipped_address_country);
                                            ?>
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
                    <input type="submit" id="btn_submit_tb_location" name="btn_submit_tb_location" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
