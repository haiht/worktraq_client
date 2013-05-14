<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="?a=ACC"> Account  </a> &gt &gt Location  </p>
<p class="highlightNavTitle"><span> Location  </span></p>
<p class="break"></p>
<script type="text/javascript ">
    $(document).ready(function(){
        $("a[rel=showdetails]").fancybox({
            'showNavArrows'         : false,
            'width'                 : '65%',
            'height'                : '85%',
            'autoScale'             :  true,
            'type'                  : 'iframe',
            'transitionIn'	        :	'elastic',
            'transitionOut'	        :	'elastic',
            'overlayShow'	        :	true
        });
    });
</script>

<div class="insert" align="right">
    <a href="<?php echo URL.$v_admin_key.'/add' ?>"> Insert new Location; </a>
</div>
<p class="break"></p>
<div class="form">
    <form method="POST" >
        <table cellpadding="3" cellspacing="3" class="list_table" width="100%" border="0px">
            <tr>
                <td colspan="2">
                    <b>Search Location in database</b>
                </td>
            </tr>
            <tr>
                <td align="right" width="180px">Company</td>
                <td >
                    <select name="txt_company_id">
                        <option value="0" <?php echo ($v_search_company_id==0? 'selected' :''); ?>> -- Select -- </option>
                        <?php echo $cls_tb_company->draw_option('company_id','company_name',$v_search_company_id); ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td  align="right" >Location name </td>
                <td ><input type="text" name="txt_location_name" value="<?php echo ftext($v_search_location_name);?>" size="50"> </td>
            </tr>
            <tr>
                <td align="right" width="180px">Location banner</td>
                <td ><input type="text" name="txt_location_banner" value="<?php echo ftext($v_search_location_banner);?>" size="20">
                &nbsp Location number
                    <input type="text" name="txt_location_number" value="<?php echo ftext($v_search_location_number);?>" size="25">


                </td>
            </tr>
            <tr>
                <td colspan="2"><b>Sort by</b> </td>
            </tr>
            <tr>
                <td align="right">Type</td>
                <td>
                    <select name="txt_order_id">
                        <option value="_id" <?php echo ($v_sort_name=='_id'?'selected':''); ?>> -- Select -- </option>
                        <option value="company_id" <?php echo ($v_sort_name=='company_id'?'selected':''); ?>>Company</option>
                        <option value="location_name" <?php echo ($v_sort_name=='location_name'?'selected':''); ?>>Location name</option>
                        <option value="location_banner" <?php echo ($v_sort_name=='location_banner'?'selected':''); ?>>Location banner</option>
                    </select>
                    Ascending
                    <input type="radio" name="txt_order_by" value="1" <?php echo ($v_sort_by==1?'checked':''); ?>>
                    Descending
                    <input type="radio" name="txt_order_by" value="-1" <?php echo ($v_sort_by==-1)?'checked':''; ?>>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input name="btn_product_search" id="btn_product_search" type="submit" class="button" value="Search Location">
                    <input name="btn_product_cancel" id="btn_product_cancel" type="submit" class="button" value="Clear">
                </td>
            </tr>
        </table>
    </form>
</div>
<p class="break"></p>
<?php echo '<span class="paginate">Total: '.$v_total_row.' records in '.$v_total_page.' pages. Current page: '.$v_page.'</span>'; ?>
<p class="break"></p>
<?php echo $v_dsp_tb_location; ?>
<p class="break"></p>
<?php echo '<span class="paginate">Total: '.$v_total_row.' records in '.$v_total_page.' pages </span>'. $v_dsp_paginition; ?>