<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
    $("a[rel=showdetails]").fancybox({
        'showNavArrows'           : false,
        'width'                 : '75%',
        'height'                : '65%',
        'type'                  : 'iframe',
        'transitionIn'	        :	'elastic',
        'transitionOut'	        :	'elastic',
        'overlayShow'	        :	true

    });
	$('select#txt_company_id').change(function(e) {
	    var $this = $(this);
	    var company_id = $(this).val();
	    company_id = parseInt(company_id, 10);
	    if(isNaN(company_id) || company_id<0) company_id = 0;
	    $.ajax({
	        url : '<?php echo URL;?>admin/company/location/ajax',
	        type    : 'POST',
	        data    :   {txt_company_id: company_id},
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
});

</script>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt Contact  </p>
<p class="highlightNavTitle"><span> Contact  </span></p>
<p class="break"></p>
<div class="form">
<form method="POST" >
    <table cellpadding="3" cellspacing="3" class="list_table" width="100%" border="0px">
        <tr>
            <td colspan="2">
                <b>Search Contact in database</b>
            </td>
        </tr>
        <tr>
        	<td align="right" > Company </td>
        	<td>
        	<select name="txt_company_id" id="txt_company_id">
        		<option value="0" <?php echo ($v_search_company_id==0?'selected':'');?>> -- Select --</option>
        		<?php echo $cls_tb_company->draw_option('company_id', 'company_name', $v_search_company_id); ?>
        	</select>
        	Location
                <select name="txt_location_id" id="txt_location_id">
                    <option value="0" <?php echo ($v_search_location_id==0?'selected':''); ?>> -- Select All --- </option>
                    <?php echo $cls_tb_location->draw_option('location_id','location_name',$v_search_location_id,array('company_id'=>(int)$v_search_company_id)); ?>
                </select>
             Location number
                <input type="text" name="txt_location_number" value="<?php echo ftext($v_search_location_number);?>" size="30">


        	</td>

        </tr>
        <tr>
            <td  align="right" >First name </td>
            <td ><input type="text" name="txt_contact_first_name" value="<?php echo ftext($v_search_contact_first_name);?>" size="30">
                Last name <input type="text" name="txt_contact_last_name" value="<?php echo ftext($v_search_contact_last_name);?>" size="20">
                Contact Type
                <select name="txt_contact_type">
                    <?php echo $cls_settings->draw_option_by_id('contact_type',0,$v_search_contact_type); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right" width="180px">Email</td>
            <td ><input type="text" name="txt_contact_email" value="<?php echo ftext($v_search_contact_email);?>" size="50"> </td>
        </tr>
        <tr>
            <td align="right" width="180px">Sort by</td>
            <td >
                <?php
                    echo $v_dsp_sort_option;
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input name="btn_contact_search" id="btn_contact_search" type="submit" class="button" value="Search">
                <input name="btn_contact_cancel" id="btn_contact_cancel" type="submit" class="button" value="Cancel">
        </tr>
    </table>
</form>
</div>
<p class="break"></p>
<p class="break"></p>
<?php echo '<span class="paginate">Total: '.$v_total_row.' records in '.$v_total_page.' pages. Current page: '.$v_page.'</span>'; ?>
<p class="break"></p>
<?php echo $v_dsp_tb_contact;?>
<?php echo $v_dsp_paginition; ?>

