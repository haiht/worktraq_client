<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL;?>"> Account </a> &gt;&gt;  <a href="<?php echo URL .'admin/system'; ?>"> System  </a> &gt &gt<a href="<?php echo URL .'admin/system/notice/'; ?>">  Note </a>  </p>
<p class="highlightNavTitle"><span> Insert - Update Note  </span></p>
<p class="break"></p>

<script type="text/javascript">
$(document).ready(function(){

    $("#company_hidden").hide();
    var select = $("#select_company").val();
    if(select==1)
        $("#company_hidden").show();
    $("select").change(function(){
        var select = $("#select_company").val();
        if(select==1)
            $("#company_hidden").show();
        else
            $("#company_hidden").hide();
    });


    $('input#txt_date_closed').datepicker({
        dateFormat: 'dd-M-yy',
        defaultDate: "+1w",
        changeMonth:true,
        changeYear:true,
        showOn:'both',
        buttonImage:"http://worktraq.anvy.net/images/_calendar.gif",
        buttonImageOnly:true
    });
	$("form#frm_tb_notice").submit(function(){
		var css = '';

		var notice_id = $("input#txt_notice_id").val();
		notice_id = parseInt(notice_id, 10);
		css = isNaN(notice_id)?'':'none';
		$("label#lbl_notice_id").css("display",css);
		if(css == ''){
            return false;
        }

		var title = $("input#txt_title").val();
		title = $.trim(title);
		css = title==''?'':'none';
		$("label#lbl_title").css("display",css);
        if(css == ''){
            alert("please insert your title notice ");
            return false;
        }
		var notice_company = $("select").val();
		css = notice_company==''?'':'none';
		$("label#lbl_notice_company").css("display",css);
        if(css == ''){
            alert("please insert your company for noticing ");
            return false;
        }

		var date_closed = $("input#txt_date_closed").val();
        if(date_closed=='')
        {
            alert("please insert your notice closed date");
            return false;
        }
		return true;
	});
});

</script>
<form id="frm_tb_notice" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_notice_id."/edit";?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_notice_id" name="txt_notice_id" value="<?php echo $v_notice_id;?>" />
<input type="hidden" id="txt_user_create" name="txt_user_create" value="<?php echo $v_user_created; ?>">
<input type="hidden" id="txt_date_opened" name="txt_date_opened" value="<?php echo $v_date_opened; ?>">
<table align="center" width="100%" border="1" class="list_table sortable" cellpadding="3" cellspacing="0" name="tb_name">
<caption>Notice [<?php echo $v_notice_id>0?'Edit':'New';?>]</caption>
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="3"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td style="width: 150px">Title</td>
		<td style=" width: 10px;">&nbsp;</td>
		<td align="left">
            <input class="text_css" size="50" type="text" id="txt_title" name="txt_title" value="<?php echo $v_title;?>" />
        </td>
	</tr>
<tr align="right" valign="top">
		<td style="width: 150px">Notice Company</td>
		<td>&nbsp;</td>
		<td align="left">
            <select name="select_company" id="select_company">
                <?php
                    $v_selected_all='';
                    $v_selected_many='';
                    if(isset($v_notice_company) && $v_notice_company==0)
                        $v_selected_all = "selected='selected'";
                    else
                        $v_selected_many = "selected='selected'";
                ?>
                <option value="0" <?php echo $v_selected_all; ?> >All Company</option>
                <option value="1" <?php echo $v_selected_many; ?> >Select</option>
            </select>
        </td>
</tr>
<tr id="company_hidden" align="right" valign="top">
    <td>Select company</td>
    <td>&nbsp</td>
    <td align="left">
        <?php
            $v_total_count =  count($rss_check);

            foreach($rss_company as $arr){
                $v_check = '';
                if(isset($rss_check)){
                    $v_total_rss = count($rss_check);
                    for($j=0;$j<$v_total_rss;$j++){
                        if($rss_check[$j]==$arr['company_id']){
                            $v_check="checked='checked'";
                            break;
                        }
                    }
                }
        ?>
        <p>
            <input type="checkbox" name="company_id[]" id="company_id[]" value="<?php echo $arr['company_id'] ?>" <?php echo $v_check; ?> />
            <?php echo $arr['company_name']; ?>
        </p>
        <?php } ?>

    </td>
</tr>
<tr align="right" valign="top">
		<td style="width: 150px">Date Closed</td>
		<td>&nbsp;</td>
		<td align="left">
            <input class="" size="20" type="text" id="txt_date_closed" name="txt_date_closed" value="<?php echo fdate($v_date_closed);?>" /
        </td>
</tr>
<tr align="right" valign="top">
		<td style="width: 150px">Description</td>
		<td>&nbsp;</td>
		<td align="left">
            <textarea class="text_css" style="width: 320px; height: 100px;" id="txt_description" name="txt_description"><?php echo $v_description;?></textarea>
        </td>
	</tr>
	<tr align="center" valign="middle">
		<td colspan="3">
            <input type="submit" id="btn_submit_tb_notice" name="btn_submit_tb_notice" value="Submit" class="button" />
        </td>
	</tr>
</table>
</form>