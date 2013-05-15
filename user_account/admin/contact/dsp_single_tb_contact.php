<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
var allow = false;
$(document).ready(function(){
	$("input#btn_submit_tb_contact").click(function(e){
		var company_id = $("input#txt_company_id").val();
        company_id = parseInt(company_id, 10);
        if(isNaN(company_id) || company_id<0) company_id = 0;
        if(company_id==0){
            e.preventDefault();
            alert("Please select Company!");
            $('select#txt_company_id').focus();
            combo_company.focus();
            return false;
        }
        if(!validator.validate()){
            e.preventDefault();
            if(tab_strip.select().index()!=0) tab_strip.select(0);
            return false;
        }
        $('input#txt_birth_date').val(kendo.toString(birthday.value(),'yyyy-MM-dd HH:mm:ss'));
        if(!validator1.validate()){
            e.preventDefault();
            if(tab_strip.select().index()!=1) tab_strip.select(1);
            return false;
        }
        var user_id = $('input#txt_user_id').val();
        user_id = parseInt(user_id,10);
        if(isNaN(user_id) || user_id<0) user_id = 0;
        if(user_id==0){
            if(confirm("This contact have not an account.\n\tDo you want to create an account for this contact?")){
                e.preventDefault();
                if(tab_strip.select().index()!=2) tab_strip.select(2);
                return false;
            }else allow = true;
        }
        return true;
	});
	var birthday = $('input#txt_birth_date').kendoDatePicker({format:"dd-MMM-yyyy"}).data("kendoDatePicker");

    var validator = $('div.information').kendoValidator().data("kendoValidator");
    var validator1 = $('div.address').kendoValidator().data("kendoValidator");
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

    $('select#txt_company_id').change(function(e){
        var company_id = $(this).val();
        company_id = parseInt(company_id, 10);
        if(isNaN(company_id) || company_id<0) company_id = 0;
        var $this = $(this);
        $.ajax({
            url     : '<?php echo URL.$v_admin_key;?>/ajax',
            type    : "POST",
            data    : {txt_session_id: '<?php echo session_id();?>', txt_company_id: company_id, txt_ajax_type: 'load_location'},
            beforeSend: function(){
                $this.prop("disabled", true);
                combo_company.enable(false);
            },
            success: function(data, status){
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    var locations = ret.location;
                    combo_location.setDataSource(locations);
                }
                $this.prop("disabled", false);
                combo_company.enable(true);
            }
        });
        $('form#frm_tb_contact').find('#txt_company_id').val(company_id);
    });
    var combo_company = $('select#txt_company_id').data("kendoComboBox");
    <?php if($v_company_id>0){?>
    combo_company.enable(false);
    <?php }?>
    var locations = <?php echo json_encode($arr_all_location);?>;
    var combo_location = $('select#txt_location_id').width(200).kendoComboBox({
        dataSource: locations,
        dataTextField: "location_name",
        dataValueField: "location_id"
    }).data("kendoComboBox");
    combo_location.value(<?php echo $v_location_id;?>);
    $('select#txt_location_id').change(function(e){
        var val = $(this).val();
        val = parseInt(val, 10);
        if(isNaN(val) || val<0) val=0;
        $('input#txt_hidden_location_id').val(val>0?'Y':'');
    });
    $('select#txt_contact_type').width(200).kendoComboBox();
    $('select#txt_contact_type').change(function(){
        var val = $(this).val();
        val = parseInt(val,10);
        if(isNaN(val)) val=0;
        $('input#txt_hidden_contact_type').val(val<0?'':'Y');

    });
    $('select#txt_address_country').width(150).kendoComboBox();
    $('select#txt_address_type').width(150).kendoComboBox();
    $('select#txt_address_type').change(function(e){
        var val = $(this).val();
        val = parseInt(val, 10);
        if(isNaN(val) || val<0) val = 0;
        var css = '';
        if(val<=1) css='none';
        $('input#txt_hidden_address_type').val(val>0?'Y':'');
        $.each($('div.address table tr'), function(index, element){
            if(index>0){
                $(this).css("display", css);
            }
        });
    });
    <?php if($v_user_id<=0){?>
    var validator2 = $('div.account').kendoValidator({
        rules:{
            custom: function(input){
                if(input.is("[name=txt_user_name]") && $.trim(input.val())==''){
                    return false;
                }else if(input.is("[name=txt_hidden_user_name]") && $.trim(input.val())==''){
                    return false
                }else if(input.is("[name=txt_user_password]") && input.val()==''){
                    return false;
                }else if(input.is("[name=txt_repeat_password]") && input.val()==''){
                    return false;
                }else if(input.is("[name=txt_repeat_password]") && input.val()!=$('input#txt_user_password').val()){
                    return false;
                }else return allow;
            }
        }
    }).data("kendoValidator");
    $('select#txt_user_type').width(150).kendoComboBox();
    $('input#btn_create_user').click(function(e){
        var company_id = $('select#txt_company_id').val();
        company_id = parseInt(company_id, 10);
        if(isNaN(company_id) || company_id<0) company_id = 0;
        if(company_id<=0){
            alert("Please select Company!");
            combo_company.focus();
            $('select#txt_company_id').focus();
            return false;
        }
        var location_id = $('select#txt_location_id').val();
        location_id = parseInt(location_id, 10);
        if(isNaN(location_id) || location_id<0) location_id = 0;
        if(location_id<=0){
            alert("Please select Location!");
            tab_strip.select(0);
            combo_location.focus();
            $('select#txt_location_id').focus();
            return false;
        }
        if(!validator2.validate()){
            return false;
        }
        var $this = $(this);
        var user_name = $('input#txt_user_name').val();
        var user_password = $('input#txt_user_password').val();
        var repeat_password = $('input#txt_repeat_password').val();
        var user_type = $('select#txt_user_type').val();
        var contact_id = $('input#txt_contact_id').val();
        var user_status = $('input#txt_user_status').prop("checked")?0:1;
        $.ajax({
            url:    '<?php echo URL.$v_admin_key;?>/ajax',
            type:   'POST',
            data:   {txt_session_id:'<?php echo session_id();?>', txt_ajax_type:'create_user', txt_user_name: user_name, txt_user_password: user_password, txt_repeat_password: repeat_password, txt_user_type: user_type, txt_user_status: user_status, txt_company_id: company_id, txt_location_id:location_id, txt_contact_id: contact_id},
            beforeSend: function(){
                $this.prop("disabled", true);
            },
            success: function(data, status){
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    $('span#sp_user_name').html(user_name);
                    $('input#txt_user_id').val(ret.user_id);
                    $('label#lbl_user_name').css("display", 'none');
                    $('input#txt_user_name').css("display", "none");
                    $.each($('div.account table tr'), function(index, element){
                       if(index>0){
                           $(this).css("display", "none");
                       }
                    });
                }else{
                    alert(ret.message);
                    $this.prop("disabled", false);
                }
            }
        });
    });
    $('input#txt_user_name').focusout(function(e){
        var user_name = $.trim($(this).val());
        if(user_name==''){
            $(this).val('');
            $('input#txt_hidden_user_name').val('N');
            validator2.validate();
            return false;
        }
        var $this = $(this);
        $.ajax({
            url:'<?php echo URL.$v_admin_key;?>/ajax',
            type:   'POST',
            data:   {txt_session_id: '<?php echo session_id();?>', txt_user_name:user_name, txt_ajax_type:'check_exist_user'},
            beforeSend: function(){
                $('span#sp_user_name').html('Checking...');
                $this.prop("disabled", true);
            },
            success: function(data, status){
                var ret = $.parseJSON(data);
                $('span#sp_user_name').html('');
                if(ret.error==0){
                    $('input#txt_hidden_user_name').val('Y');
                }else{
                    $('input#txt_hidden_user_name').val('');
                    $this.prop("disabled", false);
                }
                validator2.validate();
            }
        });
    });
    <?php }?>
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
                        <h3>Contact<?php if($v_contact_id>0) echo ': '.$v_first_name.' '.$v_middle_name.' '.$v_last_name;?></h3>
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

<form id="frm_tb_contact" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_contact_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_contact_id" name="txt_contact_id" value="<?php echo $v_contact_id;?>" />
<input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
<input type="hidden" id="txt_user_id" name="txt_user_id" value="<?php echo $v_user_id;?>" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                        <li>Address</li>
                        <li>Account</li>
                        <li>Other</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="right" valign="top">
		<td style="width:200px">Location</td>
		<td style="width:1px">&nbsp;</td>
		<td align="left">
            <select id="txt_location_id" name="txt_location_id">

            </select>
            <input type="hidden" id="txt_hidden_location_id" name="txt_hiden_location_id" value="<?php echo $v_location_id>0?'Y':''?>" required validationMessage="Please select Location" />
            <label id="lbl_location_id" class="k-required">(*)</label>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Contact Type</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_contact_type" name="txt_contact_type">
                <?php
                echo $cls_settings->draw_option_by_id('contact_type',0,$v_contact_type);
                ?>
            </select>
            <input type="hidden" id="txt_hidden_contact_type" name="txt_hidden_contact_type" required validationMessage="Please select Contact Type" value="<?php echo $v_contact_type>0?'Y':''?>" />
             <label id="lbl_contact_type" class="k-required">(*)</label>
        </td>
	</tr>
<tr align="right" valign="top">
        <td>Main Contact</td>
        <td>&nbsp;</td>
        <td align="left">
            <label><input type="checkbox" id="txt_main_contact" name="txt_main_contact"<?php echo $v_check_main_contact>0?' checked="checked"':'';?> />This contact is a main contact for selected Location</label>
        </td>
    </tr>
<tr align="right" valign="top">
		<td>First Name</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_first_name" name="txt_first_name" value="<?php echo $v_first_name;?>" required validationMessage="Please input First Name" /> <label id="lbl_first_name" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Last Name</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_last_name" name="txt_last_name" value="<?php echo $v_last_name;?>" required validationMessage="Please input Last Name" /> <label id="lbl_last_name" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Middle Name</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_middle_name" name="txt_middle_name" value="<?php echo $v_middle_name;?>" /></td>
	</tr>
<tr align="right" valign="top">
		<td>Birth Date</td>
		<td>&nbsp;</td>
		<td align="left"><input type="text" id="txt_birth_date" name="txt_birth_date" value="<?php echo $v_birth_date;?>" /></td>
	</tr>
    <tr align="right" valign="top">
        <td>Email</td>
        <td>&nbsp;</td>
        <td align="left"><input class="text_css k-textbox" size="50" type="email" id="txt_email" name="txt_email" value="<?php echo $v_email;?>" data-email-msg="Invalid email" /></td>
    </tr>
    <tr align="right" valign="top">
        <td>Direct Phone</td>
        <td>&nbsp;</td>
        <td align="left"><input class="k-textbox" type="tel" id="txt_direct_phone" name="txt_direct_phone" value="<?php echo $v_direct_phone;?>" pattern="\d{3}.\d{3}.\d{4}" validationMessage="Please input ten digit e.g. 054.345.6578"  /></td>
    </tr>
</table>
                    </div>
        <div class="address div_details">
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                <tr align="right" valign="top">
                    <td style="width:200px">Address Type</td>
                    <td style="width:1px">&nbsp;</td>
                    <td align="left">
                        <select id="txt_address_type" name="txt_address_type">
                            <?php
                            echo $cls_settings->draw_option_by_id('address_type',0,$v_address_type);
                            ?>
                        </select>
                        <input type="hidden" id="txt_hidden_address_type" name="txt_hidden_address_type" value="<?php echo $v_address_type>0?'Y':'';?>" required validationMessage="Please select Address Type" />
                        <label id="txt_address_type" class="k-required">(*)</label>
                    </td>
                </tr>
                <tr align="right" valign="top"<?php echo $v_address_type<=1?' style="display:none"':''?>>
                    <td>Address Unit</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_address_unit" name="txt_address_unit" value="<?php echo $v_address_unit;?>" /></td>
                </tr>
                <tr align="right" valign="top"<?php echo $v_address_type<=1?' style="display:none"':''?>>
                    <td>Address Line 1</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_address_line_1" name="txt_address_line_1" value="<?php echo $v_address_line_1;?>" /></td>
                </tr>
                <tr align="right" valign="top"<?php echo $v_address_type<=1?' style="display:none"':''?>>
                    <td>Address Line 2</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_address_line_2" name="txt_address_line_2" value="<?php echo $v_address_line_2;?>" /></td>
                </tr>
                <tr align="right" valign="top"<?php echo $v_address_type<=1?' style="display:none"':''?>>
                    <td>Address Line 3</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_address_line_3" name="txt_address_line_3" value="<?php echo $v_address_line_3;?>" /></td>
                </tr>
                <tr align="right" valign="top"<?php echo $v_address_type<=1?' style="display:none"':''?>>
                    <td>Address City</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_address_city" name="txt_address_city" value="<?php echo $v_address_city;?>" /></td>
                </tr>
                <tr align="right" valign="top"<?php echo $v_address_type<=1?' style="display:none"':''?>>
                    <td>Address Province</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_address_province" name="txt_address_province" value="<?php echo $v_address_province;?>" /></td>
                </tr>
                <tr align="right" valign="top"<?php echo $v_address_type<=1?' style="display:none"':''?>>
                    <td>Address Postal</td>
                    <td>&nbsp;</td>
                    <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_address_postal" name="txt_address_postal" value="<?php echo $v_address_postal;?>" /></td>
                </tr>
                <tr align="right" valign="top"<?php echo $v_address_type<=1?' style="display:none"':''?>>
                    <td>Address Country</td>
                    <td>&nbsp;</td>
                    <td align="left">
                        <select id="txt_address_country" name="txt_address_country">
                            <option value="0">--------</option>
                            <?php
                            echo $cls_tb_country->draw_option('country_id', 'country_name', $v_address_country);
                            ?>
                        </select>

                    </td>
                </tr>
            </table>
        </div>
        <div class="account div_details">
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                <tr align="right" valign="top">
                    <td style="width: 200px;">User Name</td>
                    <td style="width: 1px;">&nbsp;</td>
                    <td align="left">
                        <?php if($v_user_id<=0){?>
                            <input class="k-textbox" type="text" id="txt_user_name" name="txt_user_name" value="" validationMessage="Please input username" />
                            <input type="hidden" id="txt_hidden_user_name" name="txt_hidden_user_name" validationMessage="Duplicate username" value="Y" />
                            <span id="sp_user_name"></span>
                            <span class="tooltips"><a title="User Name is unique">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
                            <label id="lbl_user_name" class="k-required">(*)</label>
                        <?php }else{
                            echo $cls_tb_user->select_scalar('user_name', array('user_id'=>$v_user_id));
                        }
                        ?>
                    </td>
                </tr>
                <?php if($v_user_id<=0){?>
                    <tr align="right" valign="top">
                        <td>User Password</td>
                        <td>&nbsp;</td>
                        <td align="left"><input class="k-textbox" type="text" id="txt_user_password" name="txt_user_password" value="" required validationMessage="Please input password" /> <label id="lbl_user_password" class="k-required">(*)</label></td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Repeat Password</td>
                        <td>&nbsp;</td>
                        <td align="left"><input class="k-textbox" type="text" id="txt_repeat_password" name="txt_repeat_password" value="" required validationMessage="Please repeat password" /> <label id="lbl_user_password" class="k-required">(*)</label></td>
                    </tr>
                <tr align="right" valign="top">
                    <td>User Type</td>
                    <td>&nbsp;</td>
                    <td align="left">
                        <select id="txt_user_type" name="txt_user_type">
                            <?php echo $cls_settings->draw_option_by_id('user_type',0,0);?>
                        </select>
                        <label id="lbl_user_type" class="k-required">(*)</label>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>User Status</td>
                    <td>&nbsp;</td>
                    <td align="left"><label><input type="checkbox" id="txt_user_status" name="txt_user_status" /> Active?</label></td>
                </tr>
                    <tr align="right" valign="top">
                        <td>&nbsp</td>
                        <td>&nbsp;</td>
                        <td align="left"><input type="button" class="k-button" value="Create" id="btn_create_user" /></td>
                    </tr>
                <?php }?>
             </table>
        </div>
        <div class="other div_details">
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                <tr align="right" valign="top">
                    <td style="width: 200px;">Mobile Phone</td>
                    <td style="width: 1px;">&nbsp;</td>
                <td align="left"><input class="k-textbox" size="50" type="text" id="txt_mobile_phone" name="txt_mobile_phone" value="<?php echo $v_mobile_phone;?>" /> </td>
            </tr>
            <tr align="right" valign="top">
                <td>Fax Number</td>
                <td>&nbsp;</td>
                <td align="left"><input class="k-textbox" size="50" type="text" id="txt_fax_number" name="txt_fax_number" value="<?php echo $v_fax_number;?>" /> </td>
            </tr>
            <tr align="right" valign="top">
                <td>Home Phone</td>
                <td>&nbsp;</td>
                <td align="left"><input class="k-textbox" size="50" type="text" id="txt_home_phone" name="txt_home_phone" value="<?php echo $v_home_phone;?>" /> </td>
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
                    <input type="submit" id="btn_submit_tb_contact" name="btn_submit_tb_contact" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
