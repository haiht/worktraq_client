<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_module").click(function(e){
        if(!validator.validate()){
            e.preventDefault();
            return false;
        }
        var tmp = [];
        for(var i=0; i<rule.length; i++){
            if(rule[i].status==0){
                tmp.push(new Rule(rule[i].key, rule[i].description));
            }
        }
        $('input#txt_module_rules').val(JSON.stringify(tmp));

		return true;
	});
    var validator = $('div.information').kendoValidator().data("kendoValidator");
    var tab_strip = $("#data_single_tab").kendoTabStrip({
        animation:  {
            open: {
                effects: "fadeIn"
            }
        }
    }).data("kendoTabStrip");
    $('select#txt_module_root').width(150).kendoDropDownList();
    $('input#txt_module_order').kendoNumericTextBox({
        format: "n0",
        step: 1
    });
    $('input#txt_module_category').kendoNumericTextBox({
        format: "n0",
        step: 1,
        min:0
    });
    var module_dir_data = <?php echo json_encode($arr_module_dir);?>;
    var combo_module_dir = $('select#txt_module_dir').width(200).kendoDropDownList({
        dataSource:module_dir_data,
        dataTextField: 'folder_text',
        dataValueField:'folder_value'
    }).data("kendoDropDownList");
    combo_module_dir.value('<?php echo $v_module_dir;?>');


    var module_index_data = <?php echo json_encode($arr_module_index);?>;
    var combo_module_index = $('select#txt_module_index').width(200).kendoDropDownList({
        dataSource:module_index_data,
        dataTextField: 'file_text',
        dataValueField:'file_value'
    }).data("kendoDropDownList");
    combo_module_index.value('<?php echo $v_module_index;?>');

    $('select#txt_module_dir').change(function(e){
        var val = $(this).val();
        $('input#txt_hidden_module_dir').val(val);
        validator.validate();
        var module_root = $('select#txt_module_root').val();
        var $this = $(this);
        $.ajax({
            url :   '<?php echo URL.$v_admin_key;?>/ajax',
            type:   'POST',
            data:   {txt_session_id: '<?php echo session_id();?>', txt_module_root: module_root, txt_module_dir: val, txt_ajax_type: 'load_index'},
            beforeSend: function(){
                $this.prop("disabled", true);
                combo_module_dir.enable(false);
            },
            success: function(data, status){
                var ret = $.parseJSON(data);
                var module_data = ret.index;
                combo_module_index.setDataSource(module_data);
                combo_module_index.value('');
                $this.prop("disabled", false);
                combo_module_dir.enable();
            }
        });
    });
    $('input#txt_module_menu').focusout(function(e){
        var val = $.trim($(this).val());
        if(val==''){
            $('input#txt_hidden_module_menu').val('N');
            $(this).val('');
            return false;
        }
        var module_id = $('input#txt_module_id').val();
        $.ajax({
            url:    '<?php echo URL.$v_admin_key;?>/ajax',
            type:   'POST',
            data:   {txt_session_id: '<?php echo session_id();?>', txt_module_id: module_id, txt_module_menu: val, txt_ajax_type: 'check_module_menu'},
            beforeSend: function(){
                $('span#sp_module_menu').html('Checking...');
            },
            success: function(data, status){
                var ret = $.parseJSON(data);
                $('span#sp_module_menu').html('');
                $('input#txt_hidden_module_menu').val(ret.error==0?'Y':'');
                validator.validate();
            }
        });
    });
    var tooltip = $("span.tooltips").kendoTooltip({
        filter: 'a',
        width: 120,
        position: "top"
    }).data("kendoTooltip");

    $('input#txt_rule_key').click(function(){
        var len = rule.length;
        $(this).each(function(){
            var found = false;
            if($(this).prop('checked')){
                var key = $(this).val();
                for(var i = 0; i< len; i++){
                    if(rule[i].key==key){
                        rule[i].enabled();
                        i = rule.length;
                        found = true;
                    }
                }
                if(!found){
                    var desc = $(this).parent().parent().find('div').eq(1).find('input#txt_rule_description').val();
                    desc = $.trim(desc);
                    rule[len] = new Rule(key, desc);
                }
            }else{
                var key = $(this).val();
                for(var i = 0; i< len; i++){
                    if(rule[i].key==key){
                        rule[i].disabled();
                        i = rule.length;
                    }
                }
            }
        });
        var tmp = [];
        for(var i=0; i<len; i++){
            if(rule[i].status==0){
                tmp.push(new Rule(rule[i].key, rule[i].description));
            }
        }
        $('input#txt_module_rules').val(JSON.stringify(tmp));
    });

    $('input#txt_rule_description').change(function(){
        var len = rule.length;
        $(this).each(function(){
            var found = false;
            if($(this).parent().parent().find('div').eq(0).find('input#txt_rule_key').prop('checked')){
                var desc = $(this).val();
                var key = $(this).parent().parent().find('div').eq(0).find('input#txt_rule_key').val();
                for(var i = 0; i< len; i++){
                    if(rule[i].key==key){
                        rule[i].description = desc;
                        i = rule.length;
                        found = true;
                    }
                }
            }
        });
        var tmp = [];
        for(var i=0; i<len; i++){
            if(rule[i].status==0){
                tmp.push(new Rule(rule[i].key, rule[i].description));
            }
        }
        $('input#txt_module_rules').val(JSON.stringify(tmp));
    });
	$('#txt_module_pid').width(200).kendoComboBox();
	$('#txt_module_type').width(200).kendoComboBox();
	$('#txt_module_icon').width(200).kendoComboBox();
    var icons = <?php echo json_encode($arr_icons);?>;
	
	$("select#txt_module_icon").kendoComboBox({
		dataTextField: "file",
		dataValueField: "file",
		// define custom template
		template: '<img src=\"${data.url}\" alt=\"${data.file}\" hspace="5" align="left" />' +
							'<span>${ data.file }</span>',
		dataSource: icons
	});

	var combo_icons = $("#txt_module_icon").data("kendoComboBox");
	combo_icons.value('<?php echo $v_selected_icon;?>');
	
});
function Rule(key, description){
    this.key = key;
    this.description = description;
    this.status = 0;
}
Rule.prototype.disabled = function(){
    this.status = 1;
}
Rule.prototype.enabled = function(){
    this.status = 0;
}
var rule = new Array();
<?php
echo $v_dsp_rule_variables;
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
                        <h3>Module<?php if($v_module_id>0) echo ': '.$v_module_text;?></h3>
                    </div>
                    <div id="div_quick">
                    </div>

<form id="frm_tb_module" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_module_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input size="50" type="hidden" id="txt_module_id" name="txt_module_id" value="<?php echo $v_module_id;?>" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                        <li>Setup Permission</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<?php if($v_dsp_parent_module!=''){?>
<tr align="right" valign="top">
		<td style="width: 200px">Referer to parent</td>
		<td style="width: 1px">&nbsp;</td>
		<td align="left"><select id="txt_module_pid" name="txt_module_pid">
        <option value="0" selected="selected">-----</option>
        <?php echo $v_dsp_parent_module;?>
        </select>
        </td>
	</tr>
<?php }?>    
<tr align="right" valign="top">
		<td>Module Text</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_module_text" name="txt_module_text" value="<?php echo $v_module_text;?>" required data-required-msg="Please input Module Text" /> <label id="lbl_module_text" class="k-required">(*)</label></td>
	</tr>
    <tr align="right" valign="top">
        <td>Module Key</td>
        <td>&nbsp;</td>
        <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_module_menu" name="txt_module_menu" value="<?php echo $v_module_menu;?>" required data-required-msg="Please input unique Module Key" />
        <input type="hidden" id="txt_hidden_module_menu" name="txt_hidden_module_menu" value="<?php echo $v_module_menu!=''?'Y':'N';?>" required data-required-msg="Duplicate Module key" />
            <span id="sp_module_menu"></span>
            <span class="tooltips"><a title="Module Key must be unique">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
            <label id="lbl_module_menu"  class="k-required">(*)</label></td>
    </tr>
<tr align="right" valign="top">
		<td>Module for</td>
		<td>&nbsp;</td>
		<td align="left">
        <select id="txt_module_type" name="txt_module_type">
        	<?php echo $v_dsp_module_type;?>
        </select>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Module Root</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_module_root" name="txt_module_root">
            <?php echo $v_dsp_module_root;?>
                </select>
             </td>
	</tr>
<tr align="right" valign="top">
		<td>Module Dir</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_module_dir" name="txt_module_dir">

            </select>
            <input type="hidden" id="txt_hidden_module_dir" name="txt_hidden_module_dir" value="<?php echo $v_module_dir;?>" required data-required-msg="Please select Module Dir" />
            <label id="lbl_module_dir"  class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Icon for menu</td>
		<td>&nbsp;</td>
		<td align="left">
        <select id="txt_module_icon" name="txt_module_icon">
        </select>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Module Order</td>
		<td>&nbsp;</td>
		<td align="left"><input type="text" id="txt_module_order" name="txt_module_order" value="<?php echo $v_module_order;?>" /></td>
	</tr>
<tr align="right" valign="top">
		<td>Module Index</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_module_index" name="txt_module_index">
            </select>
            </td>
	</tr>
<tr align="right" valign="top">
		<td>Lock module</td>
		<td>&nbsp;</td>
		<td align="left"><input type="checkbox" id="txt_module_locked" name="txt_module_locked" value="1"<?php echo $v_module_locked?' checked="checked"':'';?> /></td>
	</tr>
<tr align="right" valign="top">
		<td>Module Category</td>
		<td>&nbsp;</td>
		<td align="left"><input type="text" id="txt_module_category" name="txt_module_category" value="<?php echo $v_module_category;?>" /></td>
	</tr>
</table>
                    </div>
                    <div class="other div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="left" valign="middle">
    <th colspan="3" align="left"><label style="cursor: pointer"><input type="checkbox" id="txt_module_role" name="txt_module_role"<?php echo $v_module_role==1?' checked="checked"':'';?> /> Apply role for module</label></th>
</tr>
<tr align="right" valign="top">
		<td>Add Rules</td>
		<td>&nbsp;</td>
		<td align="left">
        <?php echo $v_module_rules;?>&nbsp;
        </td>
	</tr>
</table>                    
<input type="hidden" name="txt_module_rules" id="txt_module_rules" value="" />
                    </div>
                   </div>
    <?php if(isset($v_act) && in_array($v_act, array('E', 'N'))){?>
                   <?php if($v_error_message!=''){?>
                    <div class="k-block k-widget k-error-colored div_errors">
                    <?php echo $v_error_message;?>
                    </div>
                    <?php }?>
                    <div class="k-block k-widget div_buttons">
                    <input type="submit" id="btn_submit_tb_module" name="btn_submit_tb_module" value="Submit" class="k-button button_css" />
                    </div>
    <?php }?>
</form>
                </div>
            </div>
        </div>
  </div>
