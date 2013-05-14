<?php if (!isset($v_sval)) die(); ?>
<p class="navTitle"><a href="<?php echo URL; ?>"> Account  </a> &gt; &gt; <a href="<?php echo URL; ?>admin/company/company"> Company </a>&gt; &gt;  Add modules for company </p>
<p class="highlightNavTitle"><span> Add modules for company </span></p>
<p class="break"></p>
<?php if($v_error_message!=''){?>
<div class="msgbox_error">
    <?php echo $v_error_message;?>
</div>
<?php } ?>
<p class="break"></p>
<form action="" method="POST">
    <input id="hdn_rule_list" type="hidden" value="<?php echo $v_user_rule;?>" name="hdn_rule_list">
    <?php echo $v_dsp_tb_rule;?>
</form>