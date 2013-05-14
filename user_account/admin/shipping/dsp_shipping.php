<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
    $(document).ready(function(){
        $("input[rel=shipping]").fancybox({
            'showNavArrows'         : false,
            'width'                 : '65%',
            'height'                : '55%',
            'transitionIn'	        :	'elastic',
            'transitionOut'	        :	'elastic',
            'overlayShow'	        :	true,
            'type'                 : 'iframe'
        });
        $("a[rel=details]").fancybox({
            'showNavArrows'         : false,
            'width'                 : '65%',
            'height'                : '55%',
            'transitionIn'	        :	'elastic',
            'transitionOut'	        :	'elastic',
            'overlayShow'	        :	true,
            'type'                 : 'iframe'
        });
    });
</script>
<p class="navTitle"><a href="<?php echo URL; ?>"> Account  </a> &gt; &gt; <a href="<?php echo URL.'admin/order/order/'; ?>">  Order  </a> &gt; &gt; Shipping Order </p>
<p class="highlightNavTitle"><span>   Shipping Order </span></p>
<p class="break"></p>


<form action="<?php echo URL.$v_admin_key.'/'.$v_order_id.'/order_tracking'; ?>" method="POST" >
    <input type="hidden" name="txt_order_id" value="<?php echo $v_order_id; ?>">
    <input type="hidden" name="hdn_allocation_list" id="hdn_allocation_list" value="0" >
    <?php
        echo $v_dsp_tb_allocation;
    ?>
    <br>
</form>