<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL; ?>"> Account  </a> &gt; &gt; <a href="<?php echo URL.'admin/user/user/'; ?>">  User  </a> &gt; &gt; Roles </p>
<p class="highlightNavTitle"><span>  Roles </span></p>
<p class="break"></p>
<script type="text/javascript">
    $(document).ready(function(e){
        $('.confirm').live('click', function(){
            return confirm('Are you sure you want to delete this info?');
        });
    });
</script>
<div class="insert" align="right">
    <a href="<?php echo URL.$v_admin_key; ?>/add"> Add new functions; </a>
</div>
<p class="break"></p>
<?php
echo $v_dsp_tb_rule;
?>