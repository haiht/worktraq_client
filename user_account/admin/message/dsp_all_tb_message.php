<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt Message  </p>
<p class="highlightNavTitle"><span> Message  </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL;?>admin/system/message/add"> Insert new message; </a>
</div>
<p class="break"></p>

<?php
echo $v_dsp_tb_message;
?>
<script type="text/javascript">
$(document).ready(function(e){
	$('.confirm').live('click', function(){
		return confirm('Are you sure you want to delete this info?');
	});
});
</script>