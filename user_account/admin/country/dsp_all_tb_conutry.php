<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt Country  </p>
<p class="highlightNavTitle"><span> Country  </span></p>
<p class="break"></p>
<div class="insert" align="right">
    <a href="<?php echo URL. $v_admin_key.'/add/' ?>"> Insert new Country; </a>
</div>
<p class="break"></p>
<?php
echo $v_dsp_tb_conutry;
echo $v_dsp_paginition;
?>