<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt; &gt; <a href="<?php echo URL .'admin/product'; ?>"> Product </a>  &gt; &gt; Hot Spot</p>
<p class="highlightNavTitle"><span> Hot Spots  </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <!--<a href="<?php echo URL;?>admin/product/products/add"> Insert new Product; </a>-->
</div>
<p class="break"></p>

<?php
echo $v_dsp_tb_product_images;
echo $v_dsp_paginition;
?>