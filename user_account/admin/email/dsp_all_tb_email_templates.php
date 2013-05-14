<?php if(!isset($v_sval)) die();?>
<?php echo js_tabas();?>

<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt Email Templates  </p>
<p class="highlightNavTitle"><span> Email Templates   </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL;?>admin/system/email-templates/add"> Add new email-templates; </a>
</div>
<?php
echo $v_dsp_tb_email_templates;
?>
<script type="text/javascript">
$(document).ready(function(e){
	$('.confirm').live('click', function(){
		return confirm('Are you sure you want to delete this info?');
	});
    $("a[rel=showdetails]").fancybox({
        'showNavArrows'           : false,
        'width'                : '75%',
        'height'               : '75%',
        'autoScale'            :  true,
        'type'                 : 'iframe',
        'transitionIn'	        :	'elastic',
        'transitionOut'	        :	'elastic',
        'overlayShow'	        :	true
    });
});
</script>