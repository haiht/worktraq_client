<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL; ?>"> Account  </a> &gt; &gt;  Province   </p>
<p class="highlightNavTitle"><span> Province  </span></p>
<p class="break"></p>
<div class="insert" align="right"> <a href="<?php echo URL.$v_admin_key.'/add' ?>"> Add new Province </a> </div>
<?php echo $v_dsp_tb_province; ?>
<script type="text/javascript">
$(document).ready(function(e){
	$('.confirm').live('click', function(){
		return confirm('Are you sure you want to delete this info?');
	});
});
</script>