<?php if(!isset($v_sval)) die();?>
<script type="text/javascript" src="lib/js/yahoo-min.js"></script>
<script type="text/javascript" src="lib/js/json-min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_module").submit(function(){
		var css = '';
		var module_pid = $("input#txt_module_pid").val();
		module_pid = parseInt(module_pid, 10);
		if(isNaN(module_pid) || module_pid<0) module_pid=0;
		var module_text = $("input#txt_module_text").val();
		module_text = $.trim(module_text);
		css = module_text==''?'':'none';
		$("label#lbl_module_text").css("display",css);
		if(css == '') return false;
		var module_root = $("input#txt_module_root").val();
		module_root = $.trim(module_root);
		css = module_root==''?'':'none';
		$("label#lbl_module_root").css("display",css);
		//alert('text: '+css);
		if(css == '') return false;
		var module_dir = $("input#txt_module_dir").val();
		module_dir = $.trim(module_dir);
		css = module_dir==''?'':'none';
		$("label#lbl_module_dir").css("display",css);
		if(css == '') return false;
		var module_order = $("input#txt_module_order").val();
		module_order = parseInt(module_order, 10);
		css = isNaN(module_order)?'':'none';
		$("label#lbl_module_order").css("display",css);
		if(css == '') return false;
		var module_index = $("input#txt_module_index").val();
		module_index = $.trim(module_index);
		css = module_index==''?'':'none';
		$("label#lbl_module_index").css("display",css);
		if(css == '') return false;

        var tmp = [];
        for(var i=0; i<rule.length; i++){
            if(rule[i].status==0){
                tmp.push(new Rule(rule[i].key, rule[i].description));
            }
        }
        $('input#txt_module_rules').val(YAHOO.lang.JSON.stringify(tmp));

		return true;
	});
    $('input#txt_rule_key').click(function(){
        var len = rule.length;
        $(this).each(function(){
            var found = false;
            if($(this).attr('checked')){
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
        $('input#txt_module_rules').val(YAHOO.lang.JSON.stringify(tmp));
    });

    $('input#txt_rule_description').change(function(){
        var len = rule.length;
        $(this).each(function(){
            var found = false;
            if($(this).parent().parent().find('div').eq(0).find('input#txt_rule_key').attr('checked')){
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
        $('input#txt_module_rules').val(YAHOO.lang.JSON.stringify(tmp));
    });
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
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt;&gt; <a href="<?php echo URL.$v_admin_key;?>">Modules</a>  </p>
<p class="highlightNavTitle"><span> Modules  </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL;?>admin/product/products/add"> Insert new Product; </a>
</div>
<p class="break"></p>
<p class="break"></p>

<form id="frm_tb_module" action="<?php echo URL;?>admin/module/add/" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_module_id" name="txt_module_id" value="<?php echo $v_module_id;?>" />
<input type="hidden" id="txt_module_key" name="txt_module_key" value="<?php echo $v_module_key;?>" />
<table align="center" width="100%" border="1" class="table_css" cellpadding="3" cellspacing="0">
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<?php if($v_dsp_parent_module!=''){?>
<tr align="right" valign="top">
		<td>Referer to parent</td>
		<td>&nbsp;</td>
		<td align="left"><select id="txt_module_pid" name="txt_module_pid">
        <option value="0" selected="selected">-----</option>
        <?php echo $v_dsp_parent_module;?>
        </select>
        </td>
	</tr>
<?php }?>    
<tr align="right" valign="top">
		<td>Module's name</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_module_text" name="txt_module_text" value="<?php echo $v_module_text;?>" /> 
        <label id="lbl_module_text" style="color:red;display:none;">(*)</label></td>
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
		<td>Root dir</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_module_root" name="txt_module_root" value="<?php echo $v_module_root;?>" /> <label id="lbl_module_root" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
        <td>Module Menu</td>
        <td>&nbsp;</td>
        <td align="left"><input class="text_css" size="50" type="text" id="txt_module_menu" name="txt_module_menu" value="<?php echo $v_module_menu;?>" /> <label id="lbl_module_menu" style="color:red;display:none;">(*)</label></td>
    </tr>



<tr align="right" valign="top">
		<td>Sub. dir</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_module_dir" name="txt_module_dir" value="<?php echo $v_module_dir;?>" /> <label id="lbl_module_dir" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Module's order</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_module_order" name="txt_module_order" value="<?php echo $v_module_order;?>" /> <label id="lbl_module_order" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Module index file</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_module_index" name="txt_module_index" value="<?php echo $v_module_index;?>" /> <label id="lbl_module_index" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Lock module</td>
		<td>&nbsp;</td>
		<td align="left"><input type="checkbox" id="txt_module_locked" name="txt_module_locked" value="1"<?php echo $v_module_locked?' checked="checked"':'';?> /></td>
	</tr>
<tr align="right" valign="top">
		<td>Category of Module</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_module_category" name="txt_module_category" value="<?php echo $v_module_category;?>" /> <label id="lbl_module_index" style="color:red;display:none;">(*)</label></td>
	</tr>
    <tr align="right" valign="top">
        <td>Use role</td>
        <td>&nbsp;</td>
        <td align="left">
        <label><input type="checkbox" id="txt_module_role" name="txt_module_role"<?php echo $v_module_role==1?' checked="checked"':'';?> /> Apply role for module</label></td>
    </tr>
<tr align="right" valign="top">
		<td>Add Rules</td>
		<td>&nbsp;</td>
		<td align="left">
        <?php echo $v_module_rules;?>&nbsp;
        </td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3">
            <input type="hidden" name="txt_module_rules" id="txt_module_rules" value="" />
            <input type="submit" id="btn_submit_tb_module" name="btn_submit_tb_module" value="Submit" class="button_css" /></td>
	</tr>
</table>
</form>