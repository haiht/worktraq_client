<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
var rule_change = false;
$(document).ready(function(){
	$("input#btn_submit_tb_user").click(function(e){
		var css = '';
		var company_id = $("input#txt_company_id").val();
		company_id = parseInt(company_id, 10);
        if(isNaN(company_id) || company_id<0) company_id =0;
        if(company_id<=0){
            e.preventDefault();
            alert('Please select Company!');
            if(combo_company) combo_company.focus();
            return false;
        }
        //alert($('input#txt_user_lastlog').val());
        //alert(kendo.toString(datetime.value(),'yyyy-MM-dd HH:mm:ss'));
        if(!validator.validate()){
            e.preventDefault();
            if(tab_strip.select().index()!=0) tab_strip.select(0);
            return false;
        }
        var data = [];
        for(var i=0;i<rule.length; i++){
            if(rule[i].status==0){
                data.push(new Array(rule[i].menu,rule[i].key,rule[i].description));
            }
        }
        $('input#txt_user_rule').val(JSON.stringify(data));
        var check = collect_checked_location();
        $('input#txt_hidden_location_view').val(check.location_view);
        $('input#txt_hidden_location_approve').val(check.location_approve);
        $('input#txt_hidden_location_allocate').val(check.location_allocate);

        $('input#txt_user_lastlog').val(kendo.toString(datetime.value(),'yyyy-MM-dd HH:mm:ss'));

		return true;
	});
	$('input#txt_user_lastlog').kendoDateTimePicker({
        format:"dd-MMM-yyyy HH:mm:ss",
        parseFormats:["MM-dd-yyyy"],
        footer: "Today - #=kendo.toString(data, 'M') #"
    });
    var datetime = $('input#txt_user_lastlog').data("kendoDateTimePicker");
    var validator = $('div.information').kendoValidator().data("kendoValidator");

    var tooltip = $("span.tooltips").kendoTooltip({
        filter: 'a',
        width: 120,
        position: "top"
    }).data("kendoTooltip");

    var combo_company = $("select#txt_company_id").data("kendoComboBox");
    <?php if($v_company_id>0){?>
    combo_company.enable(false);
    <?php }?>


    var roles = <?php echo json_encode($arr_all_role);?>;
    $('select#txt_role_id').width(300).kendoMultiSelect({
        dataSource: roles,
        dataValueField: "role_id",
        dataTextField: "role_title"
    });
    var roles_data = $('select#txt_role_id').data("kendoMultiSelect");
    roles_data.value(<?php echo json_encode($arr_user_role);?>);

    <?php if($v_user_id<=0){?>
    var locations = <?php echo json_encode($arr_all_location);?>;
    $("select#txt_location_id").width(200).kendoComboBox({
        dataSource: locations,
        dataValueField: "location_id",
        dataTextField: "location_name"
    });
    var locations_data = $("select#txt_location_id").data("kendoComboBox");
    locations_data.value(<?php echo $v_location_id;?>);

    var contacts = <?php echo json_encode($arr_all_contact);?>;
    $("select#txt_contact_id").width(200).kendoComboBox({
        dataSource: contacts,
        dataValueField: "contact_id",
        dataTextField: "contact_name"
    });
    var contacts_data = $("select#txt_contact_id").data("kendoComboBox");
    contacts_data.value(<?php echo $v_contact_id;?>);

    $('select#txt_company_id').change(function(e){
        var company_id = $(this).val();
        var $this = $(this);
        company_id = parseInt(company_id,10);
        if(isNaN(company_id) || company_id <0) company_id = 0;
        $.ajax({
            url     : '<?php echo URL.$v_admin_key;?>/ajax',
            type    : "POST",
            data    : {txt_session_id:'<?php echo session_id();?>', txt_company_id: company_id, txt_ajax_type:'load_user_info'},
            beforeSend: function(){
                combo_company.enable(false);
                $this.prop('disabled', true);
            },
            success: function(data, status){
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    var locations = ret.location;
                    var contacts = ret.contact;
                    var roles = ret.role;
                    var user_locations = ret.user_location;
                    locations_data.setDataSource(locations);
                    contacts_data.setDataSource(contacts);
                    roles_data.setDataSource(roles);
                    locations_data.value(0);
                    contacts_data.value(0);
                    roles_data.value([]);
                    grid_user_location.dataSource.data(user_locations);
                    grid_user_location.dataSource.pageSize(user_locations.length);
                    $('div.k-grid-content').css('height', grid_height);

                    $('form#frm_tb_user').find('#txt_company_id').val(company_id);
                }else{
                    alert(ret.message);
                }
                combo_company.enable(true);
                $this.prop('disabled', false);
            }
        });
    });
    $('select#txt_contact_id').change(function(e){
        val = $(this).val();
        val = parseInt(val,10);
        if(isNaN(val) || val<0) val = 0;
        $('input#txt_hidden_contact_id').val(val>0?'Y':'');
    });
    $('input#txt_user_name').focusout(function(){
        var username = $.trim($(this).val());
        $this = $(this);
        if(username==''){
            $(this).val('');
            $('input#txt_hidden_user_name').val('N');
            validator.validate();
            return false;
        }
        $.ajax({
            url :'<?php echo URL.$v_admin_key;?>/ajax',
            type:'POST',
            data: {txt_session_id: '<?php echo session_id();?>', txt_user_name: username, txt_ajax_type: 'check_exist_user'},
            beforeSend:function(){
                $this.prop('disabled', true);
                $('span#sp_user_name').addClass('k-info-colored');
                $('span#sp_user_name').html('Checking...');
            },
            success: function(data, status){
                $('span#sp_user_name').html('');
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    $('input#txt_hidden_user_name').val('Y');
                }else{
                    $('input#txt_hidden_user_name').val('');
                }
                validator.validate();
                $this.prop('disabled', false);
            }
        });

    });
    <?php }?>
    $('select#txt_user_type').width(150).kendoComboBox();
    var user_location = <?php echo json_encode($arr_all_user_location);?>;
    var user_location_data = new kendo.data.DataSource({
        data: user_location,
        pageSize: user_location.length
    });
    user_location_data.read();
    var grid_user_location = $("#grid_user_location").kendoGrid({
        dataSource: user_location_data,
        height: 310,
        scrollable: true,
        sortable: false,
        filterable: true,
        pageable:true,
        columns: [
            {field: "row_order", title: "&nbsp;", type:"int", width:"20px", sortable: false,filterable: false, template: '<span style="float:right">#= row_order #</span>'},
            {field: "location_name", title: "Location Name", type:"string", width:"100px", sortable: false },
            {field: "main_contact", title: "Main Contact", type:"string", width:"50px", sortable: false },
            {field: "location_number", title: "Loc. Number", type:"string", width:"50px", sortable: false},
            {field: "location_banner", title: "Loc. Banner", type:"string", width:"50px", sortable: true,filterable: false},
            {field: "location_address", title: "Location Address", type:"string", width:"150px", sortable: false,filterable: false},
            {field: "location_view", title: "<label><input type='checkbox' id='chk_all_location_view' />View All</label>", type:"int", width:"50px", sortable: false,filterable: false, template:'<p style="text-align: center; margin: 5px"><input type="checkbox" id="chk_location_view" data-location="#= location_id #" #= location_view==1?checked="checked":"" # /></p>'},
            {field: "location_approve", title: "<label><input type='checkbox' id='chk_all_location_approve' />Approve All</label>", type:"int", width:"50px", sortable: false,filterable: false, template:'<p style="text-align: center; margin: 5px"><input type="checkbox" id="chk_location_approve" data-location="#= location_id #" #= location_approve==1?checked="checked":"" # /></p>'},
            {field: "location_allocate", title: "<label><input type='checkbox' id='chk_all_location_allocate' />Allocate All</label>", type:"int", width:"50px", sortable: false,filterable: false, template:'<p style="text-align: center; margin: 5px"><input type="checkbox" id="chk_location_allocate" data-location="#= location_id #" #= location_allocate==1?checked="checked":"" # /></p>'}
        ]
    }).data("kendoGrid");
    var grid_height = $('div.k-grid-content').css('height');
    var tab_strip = $("#data_single_tab").kendoTabStrip({
        animation:  {
            open: {
                effects: "fadeIn"
            }
        }
    }).data("kendoTabStrip");

    $('input#chk_all_location_view').click(function(e){
        var chk = $(this).prop("checked");
        $.each(grid_user_location.dataSource.view(), function(){
            this.location_view = chk?1:0;
        });
        $.each($("input#chk_location_view"),function(){
            $(this).prop("checked", chk);
        });
    });
    $('input#chk_all_location_approve').click(function(e){
        var chk = $(this).prop("checked");
        $.each(grid_user_location.dataSource.view(), function(){
            this.location_approve = chk?1:0;
        });
        $.each($("input#chk_location_approve"),function(){
            $(this).prop("checked", chk);
        });
    });
    $('input#chk_all_location_allocate').click(function(e){
        var chk = $(this).prop("checked");
        $.each(grid_user_location.dataSource.view(), function(){
            this.location_allocate = chk?1:0;
        });
        $.each($("input#chk_location_allocate"),function(){
            $(this).prop("checked", chk);
        });
    });
    $('input#chk_location_view').click(function(e){
        var chk = $(this).prop("checked");
        var loc = $(this).attr("data-location");
        $.each(grid_user_location.dataSource.view(), function(){
            if(loc==this.location_id){
                this.location_view = chk?1:0;
            }
        });
    });
    $('input#chk_location_approve').click(function(e){
        var chk = $(this).prop("checked");
        var loc = $(this).attr("data-location");
        $.each(grid_user_location.dataSource.view(), function(){
            if(loc==this.location_id) this.location_approve = chk?1:0;
        });
    });
    $('input#chk_location_allocate').click(function(e){
        var chk = $(this).prop("checked");
        var loc = $(this).attr("data-location");
        $.each(grid_user_location.dataSource.view(), function(){
            if(loc==this.location_id) this.location_allocate = chk?1:0;
        });
    });
    $('input#chk_all_rule').click(function(){
        $(this).each(function(){
            var chk = $(this).prop('checked');
            //alert(chk);
            var menu = $(this).attr('data-menu');
            $('input#chk_rule_id').each(function(){
                var sub_menu = $(this).attr('data-menu');
                if(menu==sub_menu){
                    $(this).prop('checked', chk);
                    update_rules(menu, $(this).val(), $(this).attr('title'),chk);
                }
            });
            //$(this).attr('checked', chk);
        });
        rule_change = check_rule_change();
    });
    $('input#chk_rule_id').click(function(){
        $(this).each(function(){
            var menu = $(this).attr('data-menu');
            var chk = $(this).prop('checked');
            update_rules(menu, $(this).val(), $(this).attr('title'),chk);
        });
        rule_change = check_rule_change();
    });
});

function collect_checked_location(){
    var list_location_view = '';
    var list_location_approve = '';
    var list_location_allocate = '';
    var change = false;
    $.each($('input#chk_location_view'), function(index, element){
        if($(this).prop("checked")) list_location_view += $(this).attr("data-location")+',';
    });
    if(list_location_view!='') list_location_view = list_location_view.substring(0, list_location_view.length-1);
    if(list_location_view!=$('input#txt_hidden_location_view').val()){
        change = true;
    }
    $.each($('input#chk_location_approve'), function(index, element){
        if($(this).prop("checked")) list_location_approve += $(this).attr("data-location")+',';
    });
    if(list_location_approve!='') list_location_approve = list_location_approve.substring(0, list_location_approve.length-1);
    if(list_location_approve!=$('input#txt_hidden_location_approve').val()){
        change = true;
    }
    $.each($('input#chk_location_allocate'), function(index, element){
        if($(this).prop("checked")) list_location_allocate += $(this).attr("data-location")+',';
    });
    if(list_location_allocate!='') list_location_allocate = list_location_allocate.substring(0, list_location_allocate.length-1);
    if(list_location_allocate!=$('input#txt_hidden_location_allocate').val()){
        change = true;
    }
    return {location_view:list_location_view, location_approve: list_location_approve, location_allocate: list_location_allocate, change:change};
}
function check_rule_change(){
    var ret = false;
    for(var i=0; i<rule.length; i++){
        if(rule[i].change==1){
            ret = true;
            i = rule.length;
        }
    }
    return ret;
}
function update_rules(menu, key, desc, chk){
    var found = false;
    var len = rule.length;
    var pos = -1;
    for(var i=0; i<len; i++){
        if(menu==rule[i].menu && key==rule[i].key){
            found = true;
            pos = i;
            i = rule.length;
        }
    }
    if(found){
        rule[pos].status = chk?0:1;
        if(rule[pos].old==1) rule[pos].change = chk?0:1;
    }else{
        rule[len] = new UserRule(menu, key, desc, 0);
        rule[len].change = 1;
    }

}
function UserRule(menu, key, description, old){
    this.menu = menu;
    this.key = key;
    this.description = description;
    this.status = 0;
    this.change = 0;
    this.old = old;
}
UserRule.prototype.remove = function(){
    this.status = 1;
    if(this.old==1) this.change = 1;
}
UserRule.prototype.show = function(){
    var s = 'Menu: '+this.menu +"\n" + 'Key: '+this.key+"\n"+'Description: '+this.description+"\n"+'Status: '+this.status;
    s += "\n"+"Old: "+this.old+"\n"+"Change: "+this.change;
    alert(s);
}

var rule = new Array();
<?php
echo $v_dsp_script."\n";
?>

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
                        <h3>User<?php if($v_user_id>0) echo ': '.$v_user_name;?></h3>
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

<form id="frm_tb_user" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_user_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_user_id" name="txt_user_id" value="<?php echo $v_user_id;?>" />
<input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
<input type="hidden" id="txt_user_rule" name="txt_user_rule" value="" />
<input type="hidden" id="txt_hidden_location_view" name="txt_hidden_location_view" value="<?php echo $v_user_location_view;?>" />
<input type="hidden" id="txt_hidden_location_approve" name="txt_hidden_location_approve" value="<?php echo $v_user_location_approve;?>" />
<input type="hidden" id="txt_hidden_location_allocate" name="txt_hidden_location_allocate" value="<?php echo $v_user_location_allocate;?>" />

                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                        <?php if($v_user_id>0 && (isset($v_act) && in_array($v_act, array('E')))){?>
                        <li>Password</li>
                        <?php }?>
                        <li>Rules</li>
                        <?php if($v_user_id>0){?>
                        <li>All Permission</li>
                        <?php }?>
                        <li>Rule for Locations</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
    <tr align="right" valign="top">
        <td width="200">Location</td>
        <td width="1">&nbsp;</td>
        <td align="left">
            <?php if($v_user_id<=0){?>
            <select id="txt_location_id" name="txt_location_id">

            </select>
            <?php }else{
                echo $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id));
                ?>
                <input type="hidden" name="txt_location_id" value="<?php echo $v_location_id;?>" />
            <?php }?>
        </td>
    </tr>
<tr align="right" valign="top">
		<td>User Name</td>
		<td>&nbsp;</td>
		<td align="left">
            <?php if($v_user_id<=0){?>
            <input class="text_css k-textbox" type="text" id="txt_user_name" name="txt_user_name" value="<?php echo $v_user_name;?>" required validationMessage="Please input username" />
            <input type="hidden" id="txt_hidden_user_name" name="txt_hidden_user_name" required validationMessage="Duplicate username" value="<?php echo $v_user_name==''?'Y':'N';?>" />
                <span id="sp_user_name"></span>
                <span class="tooltips"><a title="User Name is unique">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
                <label id="lbl_user_name" class="k-required">(*)</label>
            <?php }else{
                echo $v_user_name;
            }
            ?>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Contact Name</td>
		<td>&nbsp;</td>
		<td align="left">
            <?php
            if($v_user_id>0){
                echo $cls_tb_contact->get_full_name_contact($v_contact_id);
            }else{?>
            <select id="txt_contact_id" name="txt_contact_id">

            </select>
                <input type="hidden" id="txt_hidden_contact_id" name="txt_hidden_contact_id" value="<?php echo $v_contact_id>0?'Y':'';?>" required data-required-msg="Please select Contact Name" />
            <label id="lbl_contact_id" class="k-required">(*)</label>
            <?php }?>
        </td>
	</tr>
<?php if($v_user_id<=0){?>
    <tr align="right" valign="top">
        <td>User Password</td>
        <td>&nbsp;</td>
        <td align="left"><input class="k-textbox" type="text" id="txt_user_password" name="txt_user_password" value="<?php echo $v_user_password;?>" required validationMessage="Please input password" /> <label id="lbl_user_password" class="k-required">(*)</label></td>
    </tr>
<?php }?>
<tr align="right" valign="top">
		<td>User Type</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_user_type" name="txt_user_type" required validateMessage="Please select user type">
            <?php echo $v_dsp_user_type_option;?>
            </select>
             <label id="lbl_user_type" class="k-required">(*)</label>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>User Status</td>
		<td>&nbsp;</td>
		<td align="left"><label><input type="checkbox" id="txt_user_status" name="txt_user_status" value="<?php echo $v_user_status;?>"<?php echo $v_user_status==0?' checked="checked"':'';?> /> Active?</label></td>
	</tr>
    <tr align="right" valign="top">
        <td>Role</td>
        <td>&nbsp;</td>
        <td align="left">
            <select id="txt_role_id" name="txt_role_id[]" multiple="multiple">
            </select>
        </td>
    </tr>
    <tr align="right" valign="top">
		<td>Last Login</td>
		<td>&nbsp;</td>
		<td align="left"><input type="text" id="txt_user_lastlog" name="txt_user_lastlog" value="<?php echo $v_user_lastlog;?>" /> <label id="lbl_user_lastlog" class="k-required">(*)</label></td>
	</tr>
    <?php if($v_user_id>0 && (isset($v_act) && in_array($v_act, array('E')))){?>
        <tr align="right" valign="top">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="left"><input type="button" class="k-button" id="btn_save_info" name="btn_save_info" value="Save" /></td>
        </tr>
    <?php }?>
</table>
<?php if($v_user_id>0 && (isset($v_act) && in_array($v_act, array('E')))){?>
    <script type="text/javascript">
        $(document).ready(function(e){
            $('input#btn_save_info').click(function(e){
                var user_type = $('select#txt_user_type').val();
                var roles_data = $('select#txt_role_id').data("kendoMultiSelect");
                var roles = roles_data.value();
                var user_status = $('input#txt_user_status').prop("checked")?0:1;
                var datetime = $('input#txt_user_lastlog').data("kendoDateTimePicker");
                var last_log = kendo.toString(datetime.value(),'yyyy-MM-dd HH:mm:ss');
                user_type = parseInt(user_type, 10);
                if(isNaN(user_type)) user_type = 0;
                if(user_type<=0){
                    alert('Please select User Type!');
                    return false;
                }
                if(last_log==null){
                    alert('Please input valid time of Last Log!');
                    return false;
                }
                var $this = $(this);
                $.ajax({
                    url     :   '<?php echo URL.$v_admin_key;?>/ajax',
                    type    :   'POST',
                    data    :   {txt_session_id: '<?php echo session_id();?>', txt_user_id:'<?php echo $v_user_id;?>',txt_user_role:roles, txt_user_type: user_type, txt_user_status: user_status, txt_user_lastlog: last_log, txt_ajax_type:'save_user_info', txt_save_info: 'user_info'},
                    beforeSend : function(){
                        $this.prop('disabled', true);
                    },
                    success: function(data, status){
                        var ret = $.parseJSON(data);
                        alert(ret.message);
                        $this.prop("disabled", false);
                    }
                });
            });
        });
    </script>
<?php }?>

                    </div>
                    <?php if($v_user_id>0 && (isset($v_act) && in_array($v_act, array('E')))){?>
                    <div class="password div_details">
                        <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                            <tr align="right" valign="top">
                                <td width="200">Password</td>
                                <td width="1">&nbsp;</td>
                                <td align="left">
                                    <input type="password" class="k-textbox" name="txt_new_password" id="txt_new_password" value="" required validationMessage="Require Password" />
                                </td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>Repeat Password</td>
                                <td>&nbsp;</td>
                                <td align="left">
                                    <input type="password" class="k-textbox" name="txt_repeat_password" id="txt_repeat_password" value="" required validationMessage="Invalid repeat Password" />
                                </td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>&nbsp;</td>
                                <td colspan="2" align="left">
                                    <input type="button" class="k-button" name="btn_save_password" id="btn_save_password" value="Save" />
                                </td>
                            </tr>
                        </table>
                        <script type="text/javascript">
                            $(document).ready(function(e){
                                var validator1 = $('div.password').kendoValidator({
                                   rules:{
                                       custom: function(input){
                                           if(input.is("[name=txt_new_password]") && input.val()==""){
                                               return false;
                                           }else if(input.is("[name=txt_repeat_password]") && input.val()==""){
                                               return false;
                                           }else if(input.is("[name=txt_repeat_password]") && input.val()!=""){
                                               if(input.val()!=$('input[name="txt_new_password"]').val()){
                                                   return false;
                                               }
                                               else
                                                return true;
                                           }else return true;
                                       }
                                   }
                                }).data("kendoValidator");
                                $('input#btn_save_password').click(function(e){
                                    if(!validator1.validate()) return false;
                                    var $this = $(this);
                                    var new_password = $('input#txt_new_password').val();
                                    var repeat_password = $('input#txt_repeat_password').val();
                                    $.ajax({
                                        url     : '<?php echo URL.$v_admin_key;?>/ajax',
                                        type    :   'POST',
                                        data    :{txt_session_id: '<?php echo session_id();?>', txt_user_id:'<?php echo $v_user_id;?>', txt_ajax_type:'save_user_info', txt_save_info:'password', txt_new_password: new_password, txt_repeat_password: repeat_password},
                                        beforeSend: function(){
                                            $this.prop("disabled", true);
                                        },
                                        success: function(data, type){
                                            var ret = $.parseJSON(data);
                                            alert(ret.message);
                                            $this.prop("disabled", false);
                                        }
                                    });
                                });
                            });
                        </script>
                    </div>
                    <?php }?>
                    <div class="rules div_details">
                        <?php if($v_user_id>0 && (isset($v_act) && in_array($v_act, array('E')))){?>
                            <div class="k-block k-widget">
                                <input type="button" class="k-button" value="Save" id="btn_save_rules" />
                                <script type="text/javascript">
                                    $(document).ready(function(e){
                                        $('input#btn_save_rules').click(function(e){
                                            var $this = $(this);
                                            var data = [];
                                            if(!rule_change){
                                                alert('Not any change for user\'s rules!');
                                                return;
                                            }
                                            for(var i=0;i<rule.length; i++){
                                                if(rule[i].status==0){
                                                    data.push(new Array(rule[i].menu,rule[i].key,rule[i].description));
                                                }
                                            }
                                            data = JSON.stringify(data);
                                            $.ajax({
                                                url     :   '<?php echo URL.$v_admin_key;?>/ajax',
                                                type    : 'POST',
                                                async: false,
                                                cache: false,
                                                timeout: 10000,
                                                data    :   {txt_session_id:'<?php echo session_id();?>', txt_user_id:<?php echo $v_user_id;?>, txt_user_rule: data, txt_ajax_type:'save_user_info', txt_save_info:'permission'},
                                                beforeSend: function(){
                                                    $this.attr('disabled', true);
                                                },
                                                success:function(data, type){
                                                    var ret = $.parseJSON(data);
                                                    if(ret.error==0){
                                                        rule_change = false;
                                                        for(var i=0; i<rule.length; i++){
                                                            if(rule[i].status==0){
                                                                rule[i].old = 1;
                                                                rule[i].change = 0;
                                                            }
                                                        }
                                                        $this.attr('disabled', false);
                                                    }
                                                    alert(ret.message)
                                                }
                                            });

                                        });
                                    });
                                </script>
                            </div>
                        <?php }?>
                        <?php echo $v_dsp_modules;?>
                    </div>
                    <?php if($v_user_id>0){?>
                    <div class="permission div_details">
                        <?php echo $v_dsp_tb_user_rule;?>
                    </div>
                    <?php }?>
                    <div class="locations div_details">
                        <?php if($v_user_id>0 && (isset($v_act) && in_array($v_act, array('E')))){?>
                            <div class="k-block k-widget">
                                <input type="button" class="k-button" value="Save" id="btn_save_location" />
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function(e){
                                   $('input#btn_save_location').click(function(e){
                                        var check = collect_checked_location();
                                       if(!check.change){
                                           alert('Nothing change!');
                                           return false;
                                       }
                                       var $this = $(this);
                                       $.ajax({
                                           url      : '<?php echo URL.$v_admin_key;?>/ajax',
                                           type     : 'POST',
                                           data     :   {txt_session_id: '<?php echo session_id();?>', txt_user_id: '<?php echo $v_user_id;?>', txt_user_location_view: check.location_view, txt_user_location_approve: check.location_approve, txt_user_location_allocate: check.location_allocate, txt_ajax_type: 'save_user_info', txt_save_info: 'user_location'},
                                           beforeSend: function(){
                                               $this.prop("disabled", true);
                                           },
                                           success: function(data, status){
                                               var ret = $.parseJSON(data);
                                               alert(ret.message);
                                               $this.prop("disabled", false);
                                               if(ret.error==0){
                                                   $('input#txt_hidden_location_view').val(check.location_view);
                                                   $('input#txt_hidden_location_approve').val(check.location_approve);
                                                   $('input#txt_hidden_location_allocate').val(check.location_allocate);
                                               }
                                           }
                                       });
                                   });
                                });
                            </script>
                        <?php }?>
                        <div id="grid_user_location"></div>
                    </div>

                   </div>
                   <?php if(isset($v_act) && in_array($v_act, array('N'))){?>
                   <?php if($v_error_message!=''){?>
                    <div class="k-block k-widget k-error-colored div_errors">
                    <?php echo $v_error_message;?>
                    </div>
                    <?php }?>
                    <div class="k-block k-widget div_buttons">
                    <input type="submit" id="btn_submit_tb_user" name="btn_submit_tb_user" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
