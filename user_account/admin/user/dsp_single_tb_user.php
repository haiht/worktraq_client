<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("#kwd_search").keyup(function(){
		if( $(this).val() != "")
		{
			$("#search_table tbody>tr").hide();
			$("#search_table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
		}
		else
		{
			$("#search_table tbody>tr").show();
		}
	});
	$("form#frm_tb_user").submit(function(){
		if($("#txt_user_name").val()=='')
		{
			alert("<?php echo $cls_tb_message->select_value('invalid_user_name'); ?>");
			$("#txt_user_name").css('backgroundColor','#990000');
			$("#txt_user_name").focus();
			return false;
		}
		var list = '';
		$('select#select_user_role option').each(function(index, element) {
			list += $(this).val()+',';
		});
		if(list!='') list = list.substring(0, list.length -1);
		$('input#txt_user_role').val(list);
		return true;
	});
	$('button#btn_right').click(function(e) {
		var value = '';
		var text = ''; 
		var found = false; 
        $('select#select_all_role option:selected').each(function(index, element) {
			value = $(this).val();
			text = $(this).text();
            if($('select#select_user_role option[value="'+value+'"]').val()+''=='undefined'){
				var $opt = $('<option value="'+value+'">'+text+'</option>');
				$('select#select_user_role').append($opt);
				$(this).remove();
			}
        });
		return false;
    });
	$('button#btn_left').click(function(e) {
		var value = '';
		var text = ''; 
		var found = false; 
        $('select#select_user_role option:selected').each(function(index, element) {
			value = $(this).val();
			text = $(this).text();
            if($('select#select_all_role option[value="'+value+'"]').val()+''=='undefined'){
				var $opt = $('<option value="'+value+'">'+text+'</option>');
				$('select#select_all_role').append($opt);
				$(this).remove();
			}
        });
		return false;
    });
	$('button#btn_right_all').click(function(e) {
		var value = '';
		var text = ''; 
		var found = false; 
        $('select#select_all_role option').each(function(index, element) {
			value = $(this).val();
			text = $(this).text();
            if($('select#select_user_role option[value="'+value+'"]').val()+''=='undefined'){
				var $opt = $('<option value="'+value+'">'+text+'</option>');
				$('select#select_user_role').append($opt);
				$(this).remove();
			}
        });
		return false;
    });
	$('button#btn_left_all').click(function(e) {
		var value = '';
		var text = ''; 
		var found = false; 
        $('select#select_user_role option').each(function(index, element) {
			value = $(this).val();
			text = $(this).text();
            if($('select#select_all_role option[value="'+value+'"]').val()+''=='undefined'){
				var $opt = $('<option value="'+value+'">'+text+'</option>');
				$('select#select_all_role').append($opt);
				$(this).remove();
			}
        });
		return false;
    });
    $("a[rel=zoom_rule]").fancybox({
        'showNavArrows'         : false,
        'width'                 : '700',
        'height'                : '600',
        'transitionIn'          :   'elastic',
        'transitionOut'         :   'elastic',
        'overlayShow'           :   true,
        'type'                 : 'iframe',
        'hideOnOverlayClick'    : false
    });

});
    // jQuery expression for case-insensitive filter
    $.extend($.expr[":"],
        {
            "contains-ci": function(elem, i, match, array)
            {
                return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
            }
    });

</script>
<style type="text/css">
ul#user_role{
	list-style-type:none;
}
ul#user_role li{
	float:left;
}
ul#user_role li select{
	font-size:12px;
	width:200px;
}
li#all_btn{
	width:35px;
	text-align:center;
	vertical-align:middle;
}
li#all_btn button{
	width:30px;
}
</style>
<p class="navTitle"><a href="<?php echo URL; ?>"> Account  </a> &gt;&gt; <a href="<?php echo URL.'admin/user/user'; ?>"> User  </a> &gt;&gt;  Change User Type or Staus </p>
<p class="highlightNavTitle"><span> Change User Type or Staus   </span></p>
<p class="break"></p>

<form id="frm_tb_user" action="<?php echo URL .$v_admin_key.'/'.$v_user_id.'/edit'; ?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input class="" size="50" type="hidden" id="txt_user_id" name="txt_user_id" value="<?php echo $v_user_id;?>" />
<input class="" size="50" type="hidden" id="txt_contact_id" name="txt_contact_id" value="<?php echo $v_contact_id;?>" />
<input class="" size="50" type="hidden" id="txt_location_id" name="txt_location_id" value="<?php echo $v_location_id;?>" />
<input class="" size="50" type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
<input type="hidden" id="txt_user_role" name="txt_user_role" value="" />
<p class="highlightTitle">
    <span>Infomation</span>
</p>
<input class="" size="50" type="hidden" id="txt_user_lastlog" name="txt_user_lastlog" value="<?php echo $v_user_lastlog;?>" />

<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
    <?php if(isset($_REQUEST['txt_error'])){ ?>
    <tr>
        <th class="error" colspan="2" align="left">
            <?php echo (isset($_SESSION['error_user']) ? $_SESSION['error_user'] : '' );  ?>
        </th>
    </tr>
    <?php } ?>
<tr align="right" valign="top">
		<td width="180px">User Name</td>
		<td align="left"><?php echo $v_user_name;?>
            <input class="" disabled="disabled" size="20" type="hidden" id="txt_user_name" name="txt_user_name" value="<?php echo $v_user_name;?>" />
        </td>
</tr>

<tr align="right" valign="top">
		<td>User Type</td>
		<td align="left" >
            <select  id="txt_user_type" name="txt_user_type">
                <?php echo $cls_settings->draw_option_by_id('user_type',0,$v_user_type);?>
            </select>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>User Status</td>
		<td align="left">
            <select id="txt_user_status" name="txt_user_status">
                <?php echo $cls_settings->draw_option_by_id('status',0,$v_user_status); ?>
            </select>
        </td>
</tr>
    <tr align="right" valign="top">
        <td>Contact Name</td>
        <td align="left"><?php echo $v_main_contact_name;?>
            &nbsp;
        </td>
    </tr>
    <tr align="right" valign="top">
        <td>Contact Company</td>
        <td align="left"><?php echo $v_main_company_name;?>
            &nbsp;
        </td>
    </tr>
    <tr align="right" valign="top">
        <td>Contact Location</td>
        <td align="left"><?php echo $v_main_location_name;?>
            &nbsp;
        </td>
    </tr>
    <tr align="right" valign="top">
        <td>Roles</td>
        <td align="left">
        <ul id="user_role">
        	<li id="all_role">
            <select id="select_all_role" multiple="multiple" size="10">
            <?php echo $v_dsp_all_role;?>
            </select>
            </li>
        	<li id="all_btn">
            <button id="btn_right">&gt;</button>
            <button id="btn_right_all">&gt;&gt</button>
            <button id="btn_left">&lt;</button>
            <button id="btn_left_all">&lt;&lt</button>
            </li>
        	<li id="user_role">
            <select id="select_user_role" name="select_user_role" multiple="multiple" size="10">
            <?php echo $v_dsp_user_role;?>
            </select> <a rel="zoom_rule" href="<?php echo URL. $v_admin_key.'/'.$v_user_id;?>/role"><img src="<?php echo URL;?>images/icons/zoom.png" border="0" title="Detail" /></a>
            </li>
        </ul>    
        </td>
    </tr>
</table>
<p class="highlightTitle">
    <span>Can approve and allocate for locations ... </span>
</p>

    <p class="msgbox_info">
        Search: <input id="kwd_search" value="" type="text" size="50px">

    </p>
    <input type="hidden" id="hdn_rule_list" name="hdn_rule_list" value="<?php echo $v_user_location_approve; ?>">
    <input type="hidden" id="hdn_allocate_list" name="hdn_allocate_list" value="<?php echo $v_user_location_allocate; ?>">
    <input type="hidden" id="hdn_view_list" name="hdn_view_list" value="<?php echo $v_user_location_view; ?>">
<table class="table_css sortable" id="search_table" cellpadding="2" cellspacing="2" width="100%">
    <tr>
    	<th width="10">Ord </th>
        <th>Main Contact</th>
        <th >Location Name </th>
        <th >Location Number </th>
        <th >Location Banner </th>
        <th>Location Address </th>
        <th align="center"><label><input type="checkbox" onclick="check_all('chk_rule_id',this.checked);add_to_list('chk_rule_id','hdn_rule_list')">Approve All</label></th>
        <th align="center"><label><input type="checkbox" onclick="check_all('chk_allocate_id',this.checked);add_to_list('chk_allocate_id','hdn_allocate_list')">Allocate All</label></th>
        <th align="center"><label><input type="checkbox" onclick="check_all('chk_view_id',this.checked);add_to_list('chk_view_id','hdn_view_list')">View All</label></th>
</tr>
<?php
echo $v_dsp;?>
</table>

<h3 align="center"> <input type="submit" name="btn_submit_tb_user" id="btn_submit_tb_user" value="Update User" class="button"></h3>
</form>