<?php
if(!isset($v_sval)) die();
?>
<script type="text/javascript" src="lib/imagemapster/jquery.imagemapster.js"></script>
<script type="text/javascript">
$(document).ready(function(){
<?php
echo $v_dsp_script;
?>
});
</script>
<div>
    <?php echo $v_dsp_map;?>
</div>