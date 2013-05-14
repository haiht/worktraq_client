<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL; ?>"> Account  </a> &gt;&gt; <a href="<?php echo URL.'admin/user/user'; ?>"> User  </a> &gt;&gt;  Change Rule for User </p>
<p class="highlightNavTitle"><span> Change Rule for User </span></p>
<p class="break"></p>


<form action="" method="POST">
<input id="hdn_rule_list" type="hidden" value="0" name="hdn_rule_list">
<?php echo $v_dsp_tb_rule; ?>

</form>