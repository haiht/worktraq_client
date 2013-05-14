<?php
if(!isset($v_sval)) die();
?>

<style type="text/css">
#div_area{
    float: left;
    width: 600px;
    height: 350px;
	overflow:scroll;
}
#div_close{
    height:40px;
    text-align:right;
    padding-right:10px;
}

select, table{
    font-size: 12px;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
    $('input#btn_get').click(function(){
        var i=0;
        parent.list_threshold = new Array();
        $('table#tbl_location_threshold tr#tr_row').each(function(index, element){
            if($(this).find('input#txt_status').attr('checked')){
                var location_id = $(this).find('input#txt_status').val();
                var location_name = $(this).find('input#txt_hidden_location').val();
                var threshold = $(this).find('input#txt_threshold').val();
                var overflow = $(this).find('input#txt_overflow').attr('checked')?1:0;
                parent.list_threshold[i++] = new parent.Threshold(location_id, location_name, threshold, overflow);
            }
        });
        parent.$.fancybox.close();
    });
    $('input#txt_status').click(function(){
        if($(this).attr('checked')){
           $(this).parent().parent().find('input#txt_threshold').attr('disabled', false);
            var val = $(this).parent().parent().find('input#txt_hidden_threshold').val();
            val = parseInt(val, 10);
            if(isNaN(val) || val<0) val = 0;
            $(this).parent().parent().find('input#txt_threshold').val(val);
            $(this).parent().parent().find('input#txt_threshold').focus();
            $(this).parent().parent().find('input#txt_threshold').select();
            //$(this).parent().find('input#txt_hidden_threshold').val(val);
        }else{
            $(this).parent().parent().find('input#txt_threshold').attr('disabled', true);
            $(this).parent().parent().find('input#txt_threshold').val('');
        }
    });
    $('input#txt_threshold').change(function(){
        var val = $(this).val();
        val = parseInt(val, 10);
        if(isNaN(val) || val<0) val = 0;
        $(this).parent().parent().find('input#txt_threshold').val(val);
        $(this).parent().parent().find('input#txt_hidden_threshold').val(val);
    });
});
</script>

<div id="div_area">
<form method="POST" action="<?php echo URL.$v_admin_key.'/'.$v_product_id.'/threshold';?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
    <tr align="left" valign="top">
    <td width="200" align="right">
    Company:</td>
    <td width="2">&nbsp;</td>
    <td>
    <select id="txt_company_id" name="txt_company_id" onchange="this.form.submit()">
    <option value="0" selected="selected">---- Choose Company ----</option>
    <?php echo $v_dsp_company;?>
    </select>
    </td>
    </tr>
</table>
    <?php
    echo $v_dsp_location_threshold;
    ?>

</form>
</div>
<div id="div_close">
    <input type="button" value="Get them" id="btn_get" class="button" />
</div>
