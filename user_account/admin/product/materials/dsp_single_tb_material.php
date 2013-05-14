<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_material").click(function(e){
		var css = '';
        if(!validator.validate()){
            e.preventDefault();
            if(tab_strip.select().index()!=0) tab_strip.select(0);
            return false;
        }

		return true;
	});
    var tab_strip = $("#data_single_tab").kendoTabStrip({
       animation:  {
            open: {
                effects: "fadeIn"
            }
        }
    }).data("kendoTabStrip");
    var validator = $("div.information").kendoValidator().data("kendoValidator");
    var tooltip = $("#tooltip").kendoTooltip({
        width: 120,
        position: "top"
    }).data("kendoTooltip");
    if(tooltip) tooltip.show();

    $('select#txt_material_type').kendoDropDownList();
    $('select#txt_unit').width(100).kendoDropDownList();
    $('select#txt_color').width(100).kendoDropDownList();
    $("#txt_thick").kendoNumericTextBox({
        format: "n2",
        min: 0,
        max: 100,
        step: 0.01
    });

    $('input#txt_two_sided_print').click(function(e) {
        var c = $(this).prop('checked')?true:false;
        $('input#txt_two_sided_printed').prop("disabled", !c);
        $('input#txt_two_sided_printed').prop("checked", c);
        $('div#div_option p').find('input#txt_two_sided').each(function(index, element) {
            var data = $(this).attr('data-option');
            var pos = find_option(data);
            if(c){
                $(this).prop('disabled', false);
            }else{
                $(this).prop('disabled', true);
                if(pos>=0) opt[pos].sided = 0;
            }
        });
    });
    $('input#txt_two_sided').click(function(e) {
        $(this).each(function(index, element) {
            var c= $(this).prop('checked');
            var data = $(this).attr('data-option');
            var pos = find_option(data);
            if(pos>=0) opt[pos].sided = c?1:0;
        });
    });

    $('img#img_add').click(function(e) {
        var pc = $('input#txt_two_sided_printed').prop('checked');
        var thick = $('input#txt_thick').val();
        thick = parseFloat(thick);
        if(isNaN(thick)) thick = -1;
        var color = $('select#txt_color').val();
        var u = $('select#txt_unit').val();
        if(thick<0){
            alert('Please input thickness!');
            $('input#txt_thick').focus();
            $('input#txt_thick').select();
            return;
        }
        if(u==''){
            alert('Please select unit of thickness!');
            $('select#txt_unit').focus();
            return;
        }
        if(color==''){
            alert('Please select color!');
            $('select#txt_color').focus();
            return;
        }
        var data = color+'-'+thick+'-'+u;
        var p = find_option(data);
        var i = p;
        var del = i>=0?opt[i].del:0;
        if(p<0) p = opt.length;
        opt[p] = new Option(color, thick, u, pc?1:0, 0);
        if(i<0 || del==1){
            var $p = $('<p class="k-block k-widget"></p>');
            var $s = $('<span>'+thick+' '+u+' - '+color+'</span>');
            var $l = $('<label></label>');
            var $lt = $('<label></label>');
            var $tw = $('<input />', {
                id : 'txt_two_sided',
                type : 'checkbox',
                disabled : !pc,
                checked : pc,
                'data-option': data,
                click : function (){
                    var d = $(this).attr('data-option');
                    var pos = find_option(d);
                    if(pos>=0){
                        var c = $(this).prop('checked')?true:false;
                        opt[pos].sided = c?1:0;
                    }
                }
            });
            $lt.append($tw);
            var $in = $('<input />', {
                id : 'txt_option_status',
                type : 'checkbox',
                checked : 'checked',
                'data-option': data,
                click : function (){
                    var d = $(this).attr('data-option');
                    var pos = find_option(d);
                    if(pos>=0){
                        var c = $(this).prop('checked')?true:false;
                        opt[pos].status = c?0:1;
                    }
                }
            });
            $lt.append('Two-sided print');
            $l.append($in);
            $l.append('Active');
            var $i = $('<img />',{
                'src': '<?php echo URL;?>images/icons/delete.png',
                'style': 'cursor:pointer',
                'data-option':data,
                'title': 'Remove this option',
                id : 'img_action',
                click: function(){
                    var d = $(this).attr('data-option');
                    var pos = find_option(d);
                    if(pos>=0){
                        $(this).parent().remove();
                        opt[pos].del = 1;
                    }
                }
            });
            $p.append($i);
            $p.append('&nbsp;');
            $p.append($l);
            $p.append('&nbsp;&nbsp;&nbsp;');
            $p.append($lt);
            $p.append('&nbsp;&nbsp;&nbsp;&rarr;&nbsp;&nbsp;&nbsp;');
            $p.append($s);
            $('div#div_option').append($p);
        }
    });
    $('img#img_action').click(function(e) {
        $(this).each(function(index, element) {
            var d = $(this).attr('data-option');
            var pos = find_option(d);
            if(pos>=0){
                $(this).parent().remove();
                opt[pos].del = 1;
            }
        });
    });
    $('input#txt_option_status').click(function(e) {
        $(this).each(function(index, element) {
            var d = $(this).attr('data-option');
            var pos = find_option(d);
            if(pos>=0){
                var c = $(this).prop('checked')?true:false;
                opt[pos].status = c?0:1;
            }
        });
    });
});
function find_option(data){
    var p = -1;
    var option = '';
    for(var i=0; i<opt.length && p<0; i++){
        option = opt[i].color+'-'+opt[i].thick+'-'+opt[i].unit;
        if(option == data){
            p = i;
        }
    }
    return p;
}
function Option(color, thick, unit, sided, status){
    this.color = color;
    this.thick = thick;
    this.unit = unit;
    this.status = status;
    this.sided = sided;
    this.del = 0;
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
                        <h3>Material<?php if($v_material_id>0) echo ': '.$v_material_name;?></h3>
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
                                    echo $v_dsp_company_option;
                                    ?>
                                </select>
                            </form>
                        --></div>
                    </div>

<form id="frm_tb_material" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_material_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_material_id" name="txt_material_id" value="<?php echo $v_material_id;?>" />
<input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                        <li>Option</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="right" valign="top">
		<td>Material Name</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" type="text" id="txt_material_name" name="txt_material_name" value="<?php echo $v_material_name;?>" required validationMessage="Please input Material Name" /> <label id="lbl_material_name" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Description</td>
		<td>&nbsp;</td>
		<td align="left"><textarea rows="5" class="text_css k-textbox" id="txt_description" name="txt_description"><?php echo $v_description;?></textarea></td>
	</tr>
<tr align="right" valign="top">
		<td>Size Option</td>
		<td>&nbsp;</td>
		<td align="left"><label><input type="checkbox" id="txt_size_option" name="txt_size_option" value="<?php echo $v_size_option;?>"<?php echo $v_size_option==1?' checked="checked"':'';?> /> Allow?</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Material Type</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_material_type" name="txt_material_type">
            <?php echo $cls_settings->draw_option_by_id('material_type',0,$v_material_type);?>
            </select>
	</tr>
<tr align="right" valign="top">
		<td>Status</td>
		<td>&nbsp;</td>
		<td align="left"><label><input type="checkbox" id="txt_status" name="txt_status" value="<?php echo $v_status;?>"<?php echo $v_status==0?' checked="checked"':'';?> /> Status?</label></td>
	</tr>
</table>
                    </div>
                    <div class="option div_details">
                        <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                            <tr align="right" valign="top">
                                <td>Two-sided printed</td>
                                <td>&nbsp;</td>
                                <td align="left"><label><input type="checkbox" id="txt_two_sided_print" name="txt_two_sided_print"<?php echo $v_two_sided_print==1?' checked="checked"':'';?> Allow?</label></td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>Material Option</td>
                                <td>&nbsp;</td>
                                <td align="left">
                                    Thickness: <input type="text" id="txt_thick" />
                                        <select id="txt_unit">
                                            <option value="0" selected="selected">----</option>
                                            <?php echo $v_dsp_unit_option;?>
                                        </select> -
                                        Color:
                                        <select id="txt_color">
                                            <option value="" selected="selected">----</option>
                                            <?php echo $v_dsp_color_option;?>
                                        </select>
                                    -
                                    <label>Two-sided printed <input type="checkbox" id="txt_two_sided_printed" name="txt_two_sided_printed"<?php echo $v_two_sided_print==0?' disabled="disabled"':'';?> /></label>

                                    <img src="<?php echo URL;?>images/icons/add.png" style="cursor:pointer"  id="img_add" />

                                    <div style="margin:0;" id="div_option">
                                        <?php echo $v_dsp_option;?>
                                    </div>
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
                    <input type="submit" id="btn_submit_tb_material" name="btn_submit_tb_material" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
