<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_user'])) unset($_SESSION['ss_user']);
session_destroy();
redir(URL);
?>