<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt <a href="<?php echo URL .'admin/product'; ?>">Products</a>   &gt &gt Tags</p>
<p class="highlightNavTitle"><span> Tags  </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL;?>admin/product/tags/add"> Insert new Tags; </a>
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
                <td colspan="2" align="center">
                    <input name="btn_product_search" id="btn_product_search" type="submit" class="button" value="Search Location">
                    <input name="btn_product_cancel" id="btn_product_cancel" type="submit" class="button" value="Clear">
                </td>
            </tr>
        </table>
    </form>
</div>
<p class="break"></p>
<?php
echo $v_dsp_tb_tag;
echo $v_dsp_paginition;
?>
<script type="text/javascript">
$(document).ready(function(e){
	$('.confirm').live('click', function(){
		return confirm('Are you sure you want to delete this info?');
	});
});
</script>