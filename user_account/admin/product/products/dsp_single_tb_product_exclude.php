<?php
if(!isset($v_sval)) die();
?>

<style type="text/css">
#div_area{
    width: 100%;
    height: auto;
}
#div_close{
    height:40px;
    text-align:right;
    padding-right:10px;
}

select, table{
    font-size: 12px;
}
select#txt_selected_location, select#txt_all_location{
	width:300px;
	height:250px;
}
#tbl_wrapper{
    border: none !important;
}
#tbl_wrapper td{
    border: none;
}
#tbl_inner td, th {
    margin: 5px;
    text-align: center;
    vertical-align: middle;
}
p{
    margin: 10px;;
}
.btn_button{
    width: 30px;
    height: 30px;
}
</style>
<script type="text/javascript">
parent.list_excluded = new Array();

$(document).ready(function(){
    var combo_company = $("#txt_company_id").width(300).kendoComboBox().data("kendoComboBox");
    <?php if($v_product_id>0){?>
    combo_company.enable(false);
    <?php }?>

	if($('input#txt_hidden_search').val()=='0'){
		var value = '';
		var text = '';
		$('select#txt_selected_location option').remove();
		$('select#txt_excluded_location option:selected', parent.document).each(function(index, element) {
			value = $(this).val();
			text = $(this).text();
			var $opt = $('<option value="'+value+'">'+text+'</option>');
			$('select#txt_selected_location').append($opt);    
        });
	}
	$('select#txt_selected_location option').each(function(index, element) {
		value = $(this).val();
		text = $(this).text();
		if($('select#txt_all_location option[value="'+value+'"]').val()==value){
			$('select#txt_all_location option[value="'+value+'"]').remove();
		}
	});
	
    $('input#btn_get').click(function(){
        var i = 0;
        var val = 0;
        var text = '';
        $('select#txt_selected_location option').each(function(){
            val = $(this).val();
            text = $(this).text();
            parent.list_excluded[i] = new Array(val, text);
            i++;
        });

        parent.window_excluded_location_close_flag = true;
        parent.window_excluded_location.data("kendoWindow").close();
    });
	$('input#btn_right').click(function(e) {
		var value = '';
		var text = ''; 
		var found = false; 
        $('select#txt_all_location option:selected').each(function(index, element) {
			value = $(this).val();
			text = $(this).text();
            if($('select#txt_selected_location option[value="'+value+'"]').val()+''=='undefined'){
				var $opt = $('<option value="'+value+'">'+text+'</option>');
				$('select#txt_selected_location').append($opt);
				$(this).remove();
			}
        });
    });
	$('input#btn_left').click(function(e) {
		var value = '';
		var text = ''; 
		var found = false; 
        $('select#txt_selected_location option:selected').each(function(index, element) {
			value = $(this).val();
			text = $(this).text();
            if($('select#txt_all_location option[value="'+value+'"]').val()+''=='undefined'){
				var $opt = $('<option value="'+value+'">'+text+'</option>');
				$('select#txt_all_location').append($opt);
				$(this).remove();
			}
        });
    });
	$('input#btn_right_all').click(function(e) {
		var value = '';
		var text = ''; 
		var found = false; 
        $('select#txt_all_location option').each(function(index, element) {
			value = $(this).val();
			text = $(this).text();
            if($('select#txt_selected_location option[value="'+value+'"]').val()+''=='undefined'){
				var $opt = $('<option value="'+value+'">'+text+'</option>');
				$('select#txt_selected_location').append($opt);
				$(this).remove();
			}
        });
    });
	$('input#btn_left_all').click(function(e) {
		var value = '';
		var text = ''; 
		var found = false; 
        $('select#txt_selected_location option').each(function(index, element) {
			value = $(this).val();
			text = $(this).text();
            if($('select#txt_all_location option[value="'+value+'"]').val()+''=='undefined'){
				var $opt = $('<option value="'+value+'">'+text+'</option>');
				$('select#txt_all_location').append($opt);
				$(this).remove();
			}
        });
    });
	$('form#frm_exclude').submit(function(e) {
        var list = '';
		$('select#txt_selected_location option').each(function(index, element) {
            list += $(this).val()+',';
        });
		$('input#txt_hidden_selected_location').val(list);
		return true;
    });
});
</script>
<div id="div_close" class="k-block">
    <input type="button" value="Get them" id="btn_get"  class="k-button button_css" />
</div>

<div id="div_area" class="k-block">
<form id="frm_exclude" method="POST" action="<?php echo URL.$v_admin_key.'/'.$v_product_id.'/exclude';?>">
    <table id="tbl_wrapper" width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
    <tr align="left" valign="top">
    <td width="100" align="right">
    Company:</td>
    <td width="2">&nbsp;</td>
    <td>
    <select id="txt_company_id" name="txt_company_id" onchange="this.form.submit()">
    <option value="0" selected="selected">---- Choose Company ----</option>
    <?php echo $v_dsp_company;?>
    </select>
    </td>
    </tr>
    <tr align="left" valign="top">
    <td align="right">Search for locations:</td>
    <td>&nbsp;</td>
    <td>By name: <input type="text" id="txt_location_name" name="txt_location_name" class="k-textbox" value="<?php echo $v_location_name;?>" size="20" /> By number: <input class="k-textbox" type="text" id="txt_location_number" name="txt_location_number" value="<?php echo $v_location_number;?>" size="20" /> <input type="submit" value="Go" id="btn_submit" name="btn_submit" class="k-button" />
    </tr>

    <tr valign="top">
    <td align="center" colspan="3">
        <table id="tbl_inner" border="0" width="100%" align="center" cellpadding="3" cellspacing="0">
        	<tr align="center" valign="middle">
            	<th width="45%">Searching Locations</th>
                <th>&nbsp;</th>
                <th width="45%">Selected excluded Locations</th>
            </tr>
            <tr align="center" valign="middle">
                <td>
                    <select id="txt_all_location" name="txt_all_location[]" multiple="multiple" class="k-textbox k-input">
                        <?php echo $v_dsp_location;?>
                    </select>
                </td>
                <td width="10%">
                    <p><input type="button" value="&gt;&gt;" id="btn_right_all" class="k-button btn_button" /></p>
                    <p><input type="button" value="&gt;" id="btn_right" class="k-button btn_button" /></p>
                    <p><input type="button" value="&lt;&lt;" id="btn_left_all" class="k-button btn_button" /></p>
                    <p><input type="button" value="&lt;" id="btn_left" class="k-button btn_button" /></p>
                </td>
                <td>
                    <select id="txt_selected_location" name="txt_selected_location[]" multiple="multiple" class="k-textbox k-input">
                        <?php echo $v_dsp_selected_location;?>
                    </select>
                </td>
            </tr>
        </table>
</table>
<input type="hidden" id="txt_hidden_selected_location" name="txt_hidden_selected_location" value="" />
<input type="hidden" id="txt_hidden_search" name="txt_hidden_search" value="<?php echo $v_hidden_search;?>" />
</form>
</div>