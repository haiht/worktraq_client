<?php if(!isset($v_sval)) die();?>

<script type="text/javascript ">

    $(document).ready(function(){
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
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt Companys  </p>
<p class="highlightNavTitle"><span> Companys  </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL;?>admin/company/add"> Insert new Company; </a>
</div>
<p class="break"></p>
<?php
echo $v_dsp_tb_company;
echo $v_dsp_paginition;
?>

