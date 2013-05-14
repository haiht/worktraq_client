<?php if(!isset($v_sval)) die();?>
<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL; ?>"> Account  </a> &gt; &gt; <a href="<?php echo URL.'admin/system/notice/'; ?>">  System  </a> &gt; &gt; Notice </p>
<p class="highlightNavTitle"><span>   Notice </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL;?>admin/system/notice/add/">Add new notice</a>
</div>
<?php echo $v_dsp_tb_notice; ?>

<script type="text/javascript">
$(document).ready(function(e){
	$('.confirm').live('click', function(){
		return confirm('Are you sure you want to delete this info?');
	});
});
</script>