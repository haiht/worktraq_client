<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_settings").click(function(e){
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
        var data_option = check_option();
        if(data_option=='N'){
            e.preventDefault();
            if(tab_strip.select().index()!=1) tab_strip.select(1);
            return false;
        }
        $('input#txt_data_option').val(data_option);
		return true;
	});
	var tooltip = $("span.tooltips").kendoTooltip({
        filter: 'a',
		width: 120,
		position: "top"
	}).data("kendoTooltip");
	var validator = $("div.information").kendoValidator().data("kendoValidator");
	var validator1 = $("div#grid").kendoValidator().data("kendoValidator");
	$('select#txt_setting_type').width(150).kendoDropDownList();
    $('input#txt_setting_name').focusout(function(e){
        var val = $.trim($(this).val());
        var setting_id = $('input#txt_setting_id').val();
        setting_id = parseInt(setting_id, 10);
        if(isNaN(setting_id) || setting_id<0) setting_id = 0;
        if(val==''){
            $(this).val('');
            $('input#txt_hidden_setting_name').val('N');
            validator.validate();
            return false;
        }
        $.ajax({
            url     : '<?php echo URL.$v_admin_key;?>/ajax',
            type    :   'POST',
            data    :   {txt_setting_name: val, txt_setting_id: setting_id, txt_ajax_type: 'check_setting_name'},
            success : function(){
                $('span#sp_setting_name').html('Checking...');
            },
            success:function(data, status){
                $('span#sp_setting_name').html('');
                var ret = $.parseJSON(data);
                $('input#txt_hidden_setting_name').val(ret.error==0?'Y':'');
                validator.validate();
            }
        });
    });
    var option_data = <?php echo json_encode($arr_all_option);?>;
    var option_data_source = new kendo.data.DataSource({
        data: option_data,
        pageSize: option_data.length + 100,
        schema: {
            model: {
                id: "row_id",
                fields: {
                    ids: { type:"number", validation: { min: 0, required: true, validationMessage:"AAA" } },
                    name: { validation: { required: true }},
                    key: { validation: { required: true }},
                    sort: { type: "number", validation: {step: 1 }},
                    group: { type: "number", validation: {step: 1} },
                    status: { type: "boolean"}
                }
            }
        }
    });
    option_data_source.read();

    var grid = $('#grid').kendoGrid({
        dataSource: option_data_source,
        height: 310,
        scrollable: true,
        sortable: false,
        filterable: false,
        pageable:false,
        toolbar: [{name:"create", text:"Create new Setting"}],
        columns: [
            {field: "ids", title: "Option ID", width:"50px", format: "{0:n0}"},
            {field: "name", title: "Option Name", width:"100px"},
            {field: "key", title: "Option Key", width:"80px" },
            {field: "sort", title: "Sort Order",  width:"50px", format: "{0:n0}"},
            {field: "group", title: "Group", width:"50px", format: "{0:n0}"},
            {field: "status", title: "Status", width:"50px", template:'#= status?"Active":"Inactive" #'},
            { command: ["edit"], title: "&nbsp;", width: "100px" }
        ],
        editable:'inline'

    }).data("kendoGrid");
    var tab_strip = $("#data_single_tab").kendoTabStrip({
        animation:  {
            open: {
                effects: "fadeIn"
            }
        }
    }).data("kendoTabStrip");
    function check_option(){
        var ret = 'N';
        var option = [];
        var data = grid.dataSource.data();
        var i = data.length, j, val_id, val_name, val_key;
        var f_id = false, f_name = false, f_key = false;
        var id, name, key, sort, group, status;
        while(i--){
            val_id = data[i].ids;
            val_name = data[i].name;
            val_key = data[i].key;
            j = i;
            while(j--){
                if(data[j].ids===val_id) f_id = true;
                if(data[j].name===val_name) f_name = true;
                if(data[j].key===val_key) f_key = true;
            }
        }
        if(f_id){
            alert('Duplicate Option ID!');
        }else if(f_name){
            alert('Duplicate Option Name!');
        }else if(f_key){
            alert('Duplicate Option Key!');
        }else{
            for(i=0; i<data.length; i++){
                id = data[i].ids;
                id = parseInt(id,10);
                sort = data[i].sort;
                sort = parseInt(sort, 10);
                group = data[i].group;
                group = parseInt(group, 10);
                status = data[i].status?0:1;
                var one = {'id': id, 'name': data[i].name, 'key':data[i].key, 'sort':sort, 'group': group, 'status': status};
                option.push(one);
            }
            ret = JSON.stringify(option);
        }
        return ret;
    }
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
                        <h3>Settings</h3>
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

<form id="frm_tb_settings" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_setting_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_setting_id" name="txt_setting_id" value="<?php echo $v_setting_id;?>" />
<input type="hidden" id="txt_data_option" name="txt_data_option" value="" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                        <li>Option</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="right" valign="top">
		<td style="width: 200px">Setting Name</td>
		<td style="width: 1px">&nbsp;</td>
		<td align="left">
            <input class="text_css k-textbox" size="50" type="text" id="txt_setting_name" name="txt_setting_name" value="<?php echo $v_setting_name;?>" required data-required-msg="Please input Setting Name" />
            <input type="hidden" id="txt_hidden_setting_name" name="txt_hidden_setting_name" value="<?php echo $v_setting_name!=''?'Y':'N';?>" required data-required-msg="Please choose another Setting Name" />
            <span id="sp_setting_name"></span>
            <span class="tooltips"><a title="Setting Name is unique">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
            <label id="lbl_setting_name" class="k-required">(*)</label>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Status</td>
		<td>&nbsp;</td>
		<td align="left"><label><input type="checkbox" id="txt_status" name="txt_status"<?php echo $v_status==0?' checked="checked"':'';?> /> Active?</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Setting Description</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_setting_description" name="txt_setting_description" value="<?php echo $v_setting_description;?>" /></td>
	</tr>
<tr align="right" valign="top">
		<td>Setting Type</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_setting_type" name="txt_setting_type">
                <?php echo draw_option($arr_setting_type,$v_setting_type);?>
            </select>
        </td>
	</tr>
</table>
                    </div>
        <div class="option div_details">
            <div id="grid"></div>
        </div>
                   </div>
                   <?php if(isset($v_act) && in_array($v_act, array('E', 'N'))){?>
                   <?php if($v_error_message!=''){?>
                    <div class="k-block k-widget k-error-colored div_errors">
                    <?php echo $v_error_message;?>
                    </div>
                    <?php }?>
                    <div class="k-block k-widget div_buttons">
                    <input type="submit" id="btn_submit_tb_settings" name="btn_submit_tb_settings" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
