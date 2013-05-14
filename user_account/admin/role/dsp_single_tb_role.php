<?php if(!isset($v_sval)) die();?>
<?php echo js_tabas();?>
<script type="text/javascript" src="lib/js/yahoo-min.js"></script>
<script type="text/javascript" src="lib/js/json-min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#tab-container').easytabs();
	$("form#frm_tb_role").submit(function(){
		var css = '';
		var company_id = $("select#txt_company_id").val();
		company_id = parseInt(company_id, 10);
		css = isNaN(company_id)?'':'none';
		$("label#lbl_company_id").css("display",css);
		if(css == '') return false;
		var role_title = $("input#txt_role_title").val();
		role_title = $.trim(role_title);
		css = role_title==''?'':'none';
		$("label#lbl_role_title").css("display",css);
		if(css == '') return false;
		var role_key = $("input#txt_role_key").val();
		role_key = $.trim(role_key);
		css = role_key==''?'':'none';
		$("label#lbl_role_key").css("display",css);
		if(css == '') return false;

		var tmp = new Array();
		for(var i=0; i<per.length; i++){
			if(per[i].status==0){
				var t = new Array(per[i].menu,per[i].key,per[i].description);
				tmp.push(t);
			}
		}
		var permission = YAHOO.lang.JSON.stringify(tmp);
		$('input#txt_role_content').val(permission);
		return true;
	});
	$('select#txt_company_id').change(function(e) {
		var $this = $(this);
        var company_id = $(this).val();
		company_id = parseInt(company_id, 10);
		if(isNaN(company_id) || company_id<0) company_id = 0;
		$.ajax({
			url	: '<?php echo URL;?>admin/company/location/ajax',
			type	: 'POST',
			data	:	{txt_company_id: company_id},
			beforeSend: function(){
				$this.attr('disabled', true);
			},
			success: function(data, type){
				var ret = $.parseJSON(data);
				if(ret.error==0){
					$('select#txt_location_id').html(ret.data);
				}else{
					alert(ret.message);
				}
				$this.attr('disabled', false);
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
            if($(this).attr('checked')){
				if(p<0) p = per.length;
				per[p] = new Permission(menu, key, desc);
			}else{
				if(p>=0) per[p].status = 1;				
			}
        });
    });
    function getChildren($row) {
        var children = [];
        while($row.next().hasClass('child')) {
             children.push($row.next());
             $row = $row.next();
        }            
        return children;
    }        

    $('.parent').on('click', function() {
    
        var children = getChildren($(this));
        $.each(children, function() {
            $(this).toggle();
        })
    });
	$('.parent').each(function(index, element) {
        if(index>0) $(this).trigger('click');
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
<style type="text/css">
select{
	font-size:12px;
}
</style>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt;&gt;<a href="<?php echo URL .'admin/company/role'; ?>">  Role  </a> &gt;&gt; Create - Update Role</p>
<p class="highlightNavTitle"><span> Create - Update Role  </span></p>
<p class="break"></p>

<form id="frm_tb_role" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_role_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_role_id" name="txt_role_id" value="<?php echo $v_role_id;?>" />
<input type="hidden" id="txt_role_content" name="txt_role_content" value="" />
<div id="tab-container" class='tab-container'>
    <ul class='etabs'>
        <li class='tab'><a href="#tab_information">Information </a></li>
        <li class='tab'><a href="#tab_content">Permission</a></li>
    </ul>
    <div class='panel-container'>
        <div id="tab_information">

<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<caption>Role [<?php echo $v_role_id>0?'Edit':'New';?>]</caption>
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td width="30%">Company</td>
		<td width="1%">&nbsp;</td>
		<td align="left" width="69%">
        <select id="txt_company_id" name="txt_company_id">
        <option value="0" selected="selected">--------</option>
        <?php echo $v_dsp_company_draw;?>
        </select>
        <label id="lbl_company_id" style="color:red;display:none;">(*)</label></td>
	</tr>
	<tr align="right" valign="top">
		<td>Location Id</td>
		<td>&nbsp;</td>
		<td align="left">
        <select id="txt_location_id" name="txt_location_id">
            <option value="0" selected="selected">--------</option>
            <?php echo $v_dsp_location_draw;?>
        </select>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Role Title</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_role_title" name="txt_role_title" value="<?php echo $v_role_title;?>" /> <label id="lbl_role_title" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Role Type</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_role_type" name="txt_role_type" value="<?php echo $v_role_type;?>" /> <label id="lbl_role_type" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Role Key</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_role_key" name="txt_role_key" value="<?php echo $v_role_key;?>" /> <label id="lbl_role_key" style="color:red;display:none;">(*)</label></td>
	</tr>
<!--    
<tr align="right" valign="top">
		<td>Role Content</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_role_content" name="txt_role_content" value="<?php echo $v_role_content;?>" /> <label id="lbl_role_content" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Role Child</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_role_child" name="txt_role_child" value="<?php echo $v_role_child;?>" /> <label id="lbl_role_child" style="color:red;display:none;">(*)</label></td>
	</tr>
-->    
<tr align="right" valign="top">
		<td>Status</td>
		<td>&nbsp;</td>
		<td align="left"><label><input class="text_css" type="checkbox" id="txt_status" name="txt_status"<?php echo $v_status==0?' checked="checked"':'';?> /> Active</label></td>
	</tr>
	<tr align="right" valign="top">
		<td>Default</td>
		<td>&nbsp;</td>
		<td align="left"><label><input class="text_css" type="checkbox" id="txt_default_role" name="txt_default_role"<?php echo $v_default_role==1?' checked="checked"':'';?> /> Default role for </label>
        <select id="txt_user_type" name="txt_user_type">
        <option value="0" selected="selected">--------</option>
        <?php echo $v_dsp_user_type;?>
        </select>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Format Role's Title</td>
		<td>&nbsp;</td>
		<td align="left">Color: 
        <select id="txt_color" name="txt_color">
        <option value="" selected="selected">--------</option>
        <?php echo $v_dsp_color_draw;?>
        </select> <label><input type="checkbox" id="txt_bold" name="txt_bold"<?php echo $v_bold==1?' checked="checked"':'';?> /> <b>Bold</b></label> 
        <label><input type="checkbox" id="txt_italic" name="txt_italic"<?php echo $v_italic==1?' checked="checked"':'';?> /> <i>Italic</i></label>
        </td>
	</tr>
</table>
</div>
<div id="tab_content">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<?php echo $v_dsp_modules;?>
</table>
</div>
</div>
</div>
<p class="msgbox_success">
<input  type="submit" id="btn_submit_tb_role" name="btn_submit_tb_role" value="Update Role" class="button" />
</p>
</form>