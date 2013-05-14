<?php
if (!isset($v_sval)) die();
/**
 * User: longtt
 * Date: 11/27/12
 * Time: 4:52 PM
 */

?>
<?php
$v_error_title_default = 'Page not Found';
$v_error_info_default = 'The page you want to see has not found.<br >If you for that it has been exists, please contact to: abc_def@anvyinc.com';

if(isset($_SESSION['ss_error_title'])){
    $v_tmp_title = $_SESSION['ss_error_title'];
    if($v_tmp_title!='') $v_error_title_default = $v_tmp_title;
}
if(isset($_SESSION['ss_error_info'])){
    $v_tmp_info = $_SESSION['ss_error_info'];
    if($v_tmp_info!='') $v_error_info_default = $v_tmp_info;
}

$tpl_error = new Template('dsp_error.tpl', $v_dir_templates);
$tpl_error->set('ERROR_TITLE', $v_error_title_default);
$tpl_error->set('ERROR_INFO', $v_error_info_default);

echo $tpl_error->output();


?>