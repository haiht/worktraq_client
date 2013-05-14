<?php
if(!isset($v_sval)) redir(URL);
add_class('cls_tb_order');
add_class('cls_tb_allocation');

include 'qry_home.php';
include 'user_account/admin/admin_header.php';
include 'dsp_home.php';
include 'user_account/admin/admin_footer.php';

?>