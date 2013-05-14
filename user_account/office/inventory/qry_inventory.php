<?php
if (!isset($v_sval)) die();
/**
 * User: longtt
 * Date: 11/23/12
 * Time: 9:47 AM
 */
?>
<?php
$tpl_content = new Template('dsp_inventory.tpl',$v_dir_templates);
echo $tpl_content->output();

?>