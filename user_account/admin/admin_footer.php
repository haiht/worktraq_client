<?php
if(!isset($v_sval)) die();
?>
<!--START FOOTER-->
<p class="break"></p>
<div class="footer">
    <?php $v_time_end = microtime(true);  ?>
     <br> <?php echo $v_main_site_title .'-'. $v_sub_site_title; ?> version 1.0 <br>
    <?php echo "Php execution time in :" . ($v_time_end -  $v_time_start) .' microseconds '; ?>
</div>
</div>

<br>
<br>

</body>
</html>