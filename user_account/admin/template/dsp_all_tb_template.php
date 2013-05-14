<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL; ?>"> Account  </a> &gt; &gt; <a href="<?php echo URL.'admin/system/template/'; ?>">  System  </a> &gt; &gt; Template </p>
<p class="highlightNavTitle"><span>   Template </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL;?>admin/system/template/add/">Add new template</a>
</div>
<?php
echo $v_dsp_tb_template;
?>
<script type="text/javascript">
$(document).ready(function(e){
	$('.confirm').live('click', function(){
		return confirm('Are you sure you want to delete this info?');
	});
});
</script>