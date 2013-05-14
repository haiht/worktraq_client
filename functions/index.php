 s<?php if (!isset($v_sval)) header("Location: ".URL); ?>
<?php
/* __auto load class php */
if ($handle = opendir('functions')) {
    while (false !== ($file = readdir($handle))){
        if ($file!="." && $file!=".." && $file!="index.php" && strpos($file,".php") ){
            include($file);
        }
    }
}
/* Set new varriable */
?>