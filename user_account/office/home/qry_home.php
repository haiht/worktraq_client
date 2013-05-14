<?php
if (!isset($v_sval)) die();
/**
 * User: longtt
 * Date: 11/23/12
 * Time: 9:47 AM
 */
?>
<?php
$tpl_content = new Template('dsp_home.tpl',$v_dir_templates);
$v_slider_url = RESOURCE_URL.$_SESSION['company_code'].'/slider/';

$tpl_content->set('SLIDE_IMAGE_URL',  $v_slider_url);
$tpl_content->set('URL_TEMPLATES',  $v_templates);
$tpl_content->set('LOGO',isset($_SESSION['SRC_LOGO'])?$_SESSION['SRC_LOGO']:'');
echo $tpl_content->output();

?>