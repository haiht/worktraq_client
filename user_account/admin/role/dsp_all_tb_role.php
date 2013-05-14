<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt;&gt; Role  </p>
<p class="highlightNavTitle"><span> Role  </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL;?>admin/company/role/add"> Create new Role; </a>
</div>
<p class="break"></p>
<p class="break"></p>
<?php
echo $v_dsp_tb_role;
?>
<script type="text/javascript">
$(document).ready(function(e){
	$('.confirm').live('click', function(){
		return confirm('Are you sure you want to delete this info?');
	});
});
</script>