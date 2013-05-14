<?php if(!isset($v_sval)) die(); ?>
<?php
$tpl_footer = new Template('footer.tpl',$v_dir_templates);
$tpl_footer->set('URL_TEMPLATE',$v_templates);
$tpl_footer->set('URL',URL);
echo $tpl_footer->output();

?>