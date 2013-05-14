<?php
if(!isset($v_sval)) die();
?>
<script type="text/javascript" src="lib/imagemapster/jquery.imagemapster.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('div.masthead_hr').css('display', 'none');
    <?php
    echo $v_dsp_script;
    ?>
    });
</script>
<style type="text/css">
div.masthead_hr{
    display: none !important;
}
</style>
<div>
    <?php echo $v_dsp_map;?>
</div>