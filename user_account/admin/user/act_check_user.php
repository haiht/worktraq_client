<?php if(!isset($v_sval)) die();?>
<?php
$v_user_name = isset($_REQUEST['txt_user_name']) ? $_REQUEST['txt_user_name'] : '';
$v_error = 101;
if($v_user_name=='' ) $v_error = 101;
else
{
    $v_total_count = $cls_tb_user->count(array('user_name'=>trim($v_user_name)));

    if($v_total_count>0 )
        $v_error = 100;
    else
        $v_error = 102;
}
echo $v_error;

?>