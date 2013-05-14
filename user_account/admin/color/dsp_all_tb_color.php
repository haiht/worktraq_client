<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt Color  </p>
<p class="highlightNavTitle"><span> Color  </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL.$v_admin_key;?>/add"> Add new Color; </a>
</div>

<?php
echo $v_dsp_tb_color;
echo $v_dsp_paginition;
?>