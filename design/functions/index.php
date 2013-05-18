<?php
if ($handle = opendir('functions')) {
    while (false !== ($file = readdir($handle))){
        if ($file!="." && $file!=".." && $file!="index.php" && strpos($file,".php") ){
            include($file);
        }
    }
}
?>