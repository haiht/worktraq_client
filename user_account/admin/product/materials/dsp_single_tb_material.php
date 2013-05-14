<?php if(!isset($v_sval)) die();?>
<script type="text/javascript" src="lib/js/yahoo-min.js"></script>
<script type="text/javascript" src="lib/js/json-min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("form#frm_tb_material").submit(function(){
		var css = '';
		var material_name = $("input#txt_material_name").val();
		material_name = $.trim(material_name);
		css = material_name==''?'':'none';
		$("label#lbl_material_name").css("display",css);
		if(css == '') return false;

		var r = [];
		
		for(var i=0; i<opt.length; i++){
			if(opt[i].del==0){
				var p = new Option(opt[i].color, opt[i].thick, opt[i].unit, opt[i].sided, opt[i].status);
				r.push(p);		
			}
		}
		$('input#txt_hidden_material_option').val(YAHOO.lang.JSON.stringify(r));
        return true;

		return true;
	});
	$('input#txt_two_sided_print').click(function(e) {
        var c = $(this).attr('checked')?true:false;
		$('div#div_option p').find('input#txt_two_sided').each(function(index, element) {
			var data = $(this).attr('data-option');
			var pos = find_option(data);
            if(c){
				$(this).attr('disabled', false);
			}else{
				$(this).attr('disabled', true);
				if(pos>=0) opt[pos].sided = 0;
			}
        });
    });
	$('input#txt_two_sided').click(function(e) {
        $(this).each(function(index, element) {
            var c= $(this).attr('checked');
			var data = $(this).attr('data-option');
			var pos = find_option(data);
			if(pos>=0) opt[pos].sided = c?1:0;
        });
    });
	
	$('img#img_add').click(function(e) {
		var pc = $('input#txt_two_sided_print').attr('checked')?true:false;
		var thick = $('input#txt_thick').val();
		thick = parseFloat(thick);
		if(isNaN(thick)) thick = 0;
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
			var $p = $('<p style="margin:1px; border: 1px solid #CCCCCC;padding:4px; width: 500px;"></p>');
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
							var c = $(this).attr('checked')?true:false;
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
							var c = $(this).attr('checked')?true:false;
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
				var c = $(this).attr('checked')?true:false;
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
<p class="navTitle">
<a href="<?php echo URL;?>/admin"> Account </a>>><a href="<?php echo URL;?>/admin/product/material"> Material </a> &gt;&gt; Insert - Update Material </p>
<p class="highlightNavTitle">
	<span> Insert - Update Material </span>
</p>
<p class="break"></p>

<form id="frm_tb_material" action="<?php echo URL.$v_admin_key.'/'.($v_material_id>0?$v_material_id.'/edit':'add');?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_material_id" name="txt_material_id" value="<?php echo $v_material_id;?>" />
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<caption>Material [<?php echo $v_material_id>0?'Edit':'New';?>]</caption>
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td>Material Name</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_material_name" name="txt_material_name" value="<?php echo $v_material_name;?>" /> <label id="lbl_material_name" style="color:red;display:none;">(*)</label>
        
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Material Type</td>
		<td>&nbsp;</td>
		<td align="left">
			<select name="txt_material_type">
				<option value=0 <?php echo ($v_material_type==0?'selected':''); ?>> -- Select -- </option>
				<?php echo $cls_settings->draw_option_by_id('material_type',0,$v_material_type); ?>							
			</select>	         
        </td>
	</tr>
<tr align="right" valign="top" class="no_backgound">
		<td>Material's Option</td>
		<td>&nbsp;</td>
		<td align="left">
        	<div>Thickness: <input type="text" size="10" id="txt_thick" />
            <select id="txt_unit">
            <option value="0" selected="selected">----</option>
            <?php echo $v_dsp_unit_option;?>
            </select> -
            Two-sided print <input type="checkbox" id="txt_two_sided_print" name="txt_two_sided_print"<?php echo $v_two_sided_print==1?' checked="checked"':'';?> />
             -
            Color:
            <select id="txt_color">
            <option value="" selected="selected">----</option>
            <?php echo $v_dsp_color_option;?>
            </select> <img src="<?php echo URL;?>images/icons/add.png" style="cursor:pointer"  id="img_add" />
            </div>
            &nbsp;&nbsp;             
            <div style="margin:0;" id="div_option">
            <?php echo $v_dsp_option;?>
            </div>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Description</td>
		<td>&nbsp;</td>
		<td align="left">
            <textarea rows="5" name="txt_description" cols="100" class="text_css"><?php echo $v_description;?></textarea>
<input type="hidden" name="txt_hidden_material_option" id="txt_hidden_material_option" />
	</tr>
<tr align="right" valign="top">
		<td>Status</td>
		<td>&nbsp;</td>
		<td align="left">
		<label><input type="checkbox" name="txt_material_status" id="txt_material_status"<?php echo $v_material_status==0?' checked="checkbox"':'';?> /> Active</label>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3"><input type="submit" id="btn_submit_tb_material" name="btn_submit_tb_material" value="Submit" class="button" /></td>
	</tr>
</table>
</form>