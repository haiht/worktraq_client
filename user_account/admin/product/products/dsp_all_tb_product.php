<?php if(!isset($v_sval)) die();?>
<style type="text/css">
.product-image img { width: 150px; }
</style>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt Products  </p>
<p class="highlightNavTitle"><span> Products  </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL;?>admin/product/products/add"> Insert new Product; </a>
</div>
<p class="break"></p>
<p class="break"></p>
<script type="text/javascript">
    $(document).ready(function(e){
        $('.confirm').live('click', function(){
            return confirm('Are you sure you want to delete this info?');
        });

        $('select#txt_company_id').change(function(e) {
            var $this = $(this);
            var company_id = $(this).val();
            company_id = parseInt(company_id, 10);
            if(isNaN(company_id) || company_id<0) company_id = 0;
            $.ajax({
                url : '<?php echo URL;?>admin/product/tags/ajax',
                type    : 'POST',
                data    :   {txt_company_id: company_id},
                beforeSend: function(){
                    $this.attr('disabled', true);
                },
                success: function(data, type){
                    var ret = $.parseJSON(data);
                    if(ret.error==0){
                        $('select#txt_tag_id').html(ret.data);
                    }else{
                        alert(ret.message);
                    }
                    $this.attr('disabled', false);
                }
            });
        });


    });
</script>
    <div class="form">
        <form  method="POST" >
            <table cellpadding="3" cellspacing="3" class="list_table sortable" width="100%" border="0px">
                <tr>
                    <td colspan="2">
                        <b>Search Product in database</b>
                    </td>
                </tr>
                <tr>
                    <td align="right" width="180px">Company</td>
                    <td >
                        <select name="txt_company_id" id="txt_company_id">
                            <option value="0" <?php echo ($v_search_company_id==0? 'selected' :''); ?>> -- Select -- </option>
                            <?php echo $cls_tb_company->draw_option('company_id','company_name',$v_search_company_id); ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td  align="right" >Short Product </td>
                    <td ><input type="text" name="txt_short_product" value="<?php echo $v_search_short_product;?>" size="50"> </td>
                </tr>
                <tr>
                    <td  align="right" >Product SKU </td>
                    <td ><input type="text" name="txt_product_sku" value="<?php echo $v_search_product_sku;?>" size="50"> </td>
                </tr>
                <tr>
                    <td align="right">Tag</td>
                    <td>
                        <select id="txt_tag_id" name="txt_tag_id[]" multiple="multiple" style="width:250px">
                            <?php echo $cls_tb_tag->draw_option_multi('tag_id', 'tag_name', $arr_product_tag,array('company_id'=>(int) $v_search_company_id));?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input name="btn_product_search" id="btn_product_search" type="submit" class="button" value="Search Product">
                        <input name="btn_product_cancel" id="btn_product_cancel" type="submit" class="button" value="Clear">
                    </td>
                </tr>

            </table>
        </form>
    </div>
<p class="break"></p>
<?php echo '<span class="paginate">Total: '.$v_total_row.' records in '.$v_total_page.' pages. Current page: '.$v_page.'</span>'; ?>
<p class="break"></p>
<?php echo $v_dsp_tb_product; ?>
<?php echo $v_dsp_paginition; ?>
<p class="break"></p>