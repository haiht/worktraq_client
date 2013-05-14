<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt <a href="<?php echo URL;?>admin/company">Company</a>  &gt &gt Areas</p>
<p class="highlightNavTitle"><span> Areas  </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL.$v_admin_key;?>/add"> Insert new Area; </a>
</div>
<p class="break"></p>

<?php
echo $v_dsp_tb_area;
echo $v_dsp_paginition;
?>
<script type="text/javascript">
$(document).ready(function(e){
	$('.confirm').live('click', function(){
		return confirm('Are you sure you want to delete this info?');
	});
});
</script>