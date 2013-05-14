<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt <a href="<?php echo URL .'admin/product'; ?>">Product  </a> &gt; &gt; Packages</p>
<p class="highlightNavTitle"><span> Packages  </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL;?>admin/product/packages/add"> Insert new Package; </a>
</div>
<p class="break"></p>
<?php
echo $v_dsp_tb_product_packages;
?>
<script type="text/javascript">
$(document).ready(function(e) {
    $('.confirm').live('click', function(){
		return confirm('Are you sure you want to delete this info?');
	});
});
</script>