<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt;&gt; <a href="<?php echo URL .'admin/product/material'; ?>"> Material </a>  &gt;&gt; Material </p>
<p class="highlightNavTitle"><span> Material </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL.$v_admin_key;?>/add"> Add new Materia  </a>
</div>
<p class="break"></p>
<?php echo $v_dsp_tb_material; ?>
