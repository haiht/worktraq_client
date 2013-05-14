<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
    $("input#btn_submit_tb_role").click(function(e){
		var css = '';
		var company_id = $("select#txt_company_id").val();
		company_id = parseInt(company_id, 10);
		css = isNaN(company_id)?'':(company_id<=0?'':'none');

		if(css == ''){
            e.preventDefault();
            alert('Choose company before, please!');
            combo_company.focus();
            return false;
        }
        if(!validator.validate()){
            e.preventDefault();
            tab_strip.select(0);
            return false;
        }
        var tmp = new Array();
        for(var i=0; i<per.length; i++){
            if(per[i].status==0){
                var t = new Array(per[i].menu,per[i].key,per[i].description);
                tmp.push(t);
            }
        }
        var permission = JSON.stringify(tmp);

        $('input#txt_role_content').val(permission);

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
    var tooltip = $("span.tooltips").kendoTooltip({
        filter: 'a',
        width: 120,
        position: "top"
    }).data("kendoTooltip");
    var locations = <?php echo json_encode($arr_all_location);?>;
    $("select#txt_location_id").width(250).kendoComboBox({
        dataSource: locations,
        dataTextField:'location_name',
        dataValueField:'location_id'
    });
    var locations_data = $("select#txt_location_id").data("kendoComboBox");
    locations_data.value(<?php echo $v_location_id;?>);
    var combo_company = $("select#txt_company_id").data("kendoComboBox");
    <?php if($v_company_id>0){?>
    combo_company.enable(false);
    <?php }?>
    $("select#txt_color").width(150).kendoComboBox();
    $("select#txt_user_type").width(150).kendoComboBox();
    $('select#txt_company_id').change(function(e) {
        var $this = $(this);
        var company_id = $(this).val();
        company_id = parseInt(company_id, 10);
        if(isNaN(company_id) || company_id<0) company_id = 0;
        $.ajax({
            url : '<?php echo URL.$v_admin_key;?>/ajax',
            type    : 'POST',
            data    :   {txt_company_id: company_id, txt_ajax_type:'load_location'},
            beforeSend: function(){
                $this.prop('disabled', true);
                combo_company.enable(false);
            },
            success: function(data, type){
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    var locations = ret.location;
                    locations_data.setDataSource(locations);
                    locations_data.value(0);
                    $('form#frm_tb_role').find('#txt_company_id').val(company_id);
                }else{
                    alert(ret.message);
                }
                $this.prop('disabled', false);
                combo_company.enable(true);
            }
        });
    });
    $('input#txt_permission[type="checkbox"]').click(function(e) {
        $(this).each(function(index, element) {
            var key = $(this).val();
            var menu = $(this).attr('data-menu');
            var desc = $(this).attr('title');
            var i = 0, p = -1;
            while(i<per.length && p<0){
                if(per[i].menu==menu && per[i].key==key){
                    p = i;
                }
                i++;
            }
            if($(this).prop('checked')){
                if(p<0) p = per.length;
                per[p] = new Permission(menu, key, desc);
            }else{
                if(p>=0) per[p].status = 1;
            }
        });
    });
    $('input#txt_role_key').focusout(function(e){
        var key = $.trim($(this).val());
        if(key==''){
            $(this).val('');
            $('input#txt_hidden_role_key').val('N');
            validator.validate();
            return false;
        }
        var company_id = $('input#txt_company_id').val();
        var role_id = $('input#txt_role_id').val();
        $.ajax({
            url : '<?php echo URL.$v_admin_key;?>/ajax',
            type:   'POST',
            data:   {txt_session_id: '<?php echo session_id();?>', txt_ajax_type: 'check_role_key', txt_company_id: company_id, txt_role_id: role_id, txt_role_key: key},
            beforeSend: function(){
                $('span#sp_role_key').html('Checking...');
            },
            success: function(data, status){
                $('span#sp_role_key').html('');
                var ret = $.parseJSON(data);
                $('input#txt_hidden_role_key').val(ret.error==0?'Y':'');
                validator.validate();
            }
        });
    });

});
function Permission(menu, key, description){
    this.menu = menu;
    this.key = key;
    this.description = description;
    this.status = 0;
}
    <?php
    echo $v_dsp_script;
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
                        <h3>Role<?php if($v_role_id>0) echo ': '.$v_role_title;?></h3>
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

<form id="frm_tb_role" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_role_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_role_id" name="txt_role_id" value="<?php echo $v_role_id;?>" />
<input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
<input type="hidden" id="txt_role_content" name="txt_role_content" value="" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                        <li>Permission</li>
                    </ul>

                    <div class="information div_details">
<table id="tbl_required" align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
    <tr align="right" valign="top">
        <td style="width:200px">Location</td>
        <td style="width:1px">&nbsp;</td>
        <td align="left">
            <select id="txt_location_id" name="txt_location_id">
            </select>
        </td>
    </tr>
<tr align="right" valign="top">
		<td>Role Title</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_role_title" name="txt_role_title" value="<?php echo $v_role_title;?>"  required validationMessage="Please input Role Title" /> <label id="lbl_role_title" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Role Type</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_role_type" name="txt_role_type" value="<?php echo $v_role_type;?>" /> </td>
	</tr>
<tr align="right" valign="top">
		<td>Role Key</td>
		<td>&nbsp;</td>
		<td align="left">
            <input class="text_css k-textbox" size="50" type="text" id="txt_role_key" name="txt_role_key" value="<?php echo $v_role_key;?>" required validationMessage="Please input Role Key" />
            <input type="hidden" id="txt_hidden_role_key" name="txt_hidden_role_key" value="<?php echo $v_role_key!=''?'Y':'N';?>" required validationMessage="Role Key is unique" />
            <span id="sp_role_key"></span>
            <span class="tooltips"><a title="Role Key is unique">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
            <label id="lbl_role_key" class="k-required">(*)</label>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Status</td>
		<td>&nbsp;</td>
		<td align="left"><label><input type="checkbox" id="txt_status" name="txt_status"<?php echo $v_status?'':' checked="checked"';?>" /> Active</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Default Role</td>
		<td>&nbsp;</td>
		<td align="left"><label><input type="checkbox" id="txt_default_role" name="txt_default_role"<?php echo $v_default_role?' checked="checked"':'';?>" /> Default Role for: </label>
        <select id="txt_user_type" name="txt_user_type">
            <?php
            echo $cls_settings->draw_option_by_id('user_type',0, $v_user_type);
            ?>
        </select>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Color</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_color" name="txt_color">
            <option value="">------</option>
                <?php echo $cls_tb_color->draw_option('color_code', 'color_name', $v_color);?>
            </select>
            </td>
	</tr>
<tr align="right" valign="top">
		<td>Bold</td>
		<td>&nbsp;</td>
		<td align="left"><label><input type="checkbox" id="txt_bold" name="txt_bold"<?php echo $v_bold?' checked="checked"':'';?>" /></label></td>
	</tr>
<tr align="right" valign="top">
		<td>Italic</td>
		<td>&nbsp;</td>
		<td align="left"><label><input type="checkbox" id="txt_italic" name="txt_italic"<?php echo $v_italic?' checked="checked"':'';?>" /></label></td>
	</tr>
</table>
                    </div>
                    <div class="permission div_details">
                        <?php echo $v_dsp_modules;?>
                    </div>
                   </div>
                   <?php if(isset($v_act) && in_array($v_act, array('E', 'N'))){?>
                   <?php if($v_error_message!=''){?>
                    <div class="k-block k-widget k-error-colored div_errors">
                    <?php echo $v_error_message;?>
                    </div>
                    <?php }?>
                    <div class="k-block k-widget div_buttons">
                    <input type="submit" id="btn_submit_tb_role" name="btn_submit_tb_role" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
