<?php if(!isset($v_sval)) die(); ?>
<?php
$x_header = new Template('header.tpl',$v_dir_templates);

$x_header->set('TITLE','WorkTraq');
$x_header->set('DESCRIPTION','WorkTraq');
$x_header->set('KEYWORDS','WorkTraq');
$x_header->set('URL_TEMPLATES',$v_templates);
$x_header->set('CUSTOMER_NAME',$arr_user['contact_name']);

if($v_website_testing==true)
    $x_header->set('WEBSITE_STATUS','<b><font color="yellow"> The website is on testing status now!...</font></b>');
else
    $x_header->set('WEBSITE_STATUS','');


$x_header->set('TITLE_PAGE',$v_navigator_name);
$x_header->set('COMPANY_NAME',$_SESSION['company_name']);
$x_header->set('LOGO',isset($_SESSION['SRC_LOGO'])?$_SESSION['SRC_LOGO']:'');
$x_header->set('URL',URL);
   //die($v_acc);
$x_menu = new Template('menu.tpl',$v_dir_templates);

if($v_acc!='')
	$x_menu->set($v_acc,' class="active"');
else
	$x_menu->set('HOME',' class="active"');

$v_dsp_home = ' <li '.($v_acc==''?'class="active"':'') .'><a title="Home" href="'.URL.'">Home</a></li>';
$v_dsp_home .=  '<li '.($v_acc=='CAT' || $v_acc=='INFO'?'class="active"':'') .'><a title="Home" href="'.URL.'catalogue">Catalogue</a></li>';
$v_dsp_home .=  '<li '.($v_acc=='ORDER'?'class="active"':'') .'><a title="Home" href="'.URL.'order">Order</a></li>';
$v_dsp_home .=  '<li '.($v_acc=='SHIP'?'class="active"':'') .'><a title="Home" href="'.URL.'shipping">Shipping</a></li>';

if(check_permission($_SESSION['user_rule'],'comp_module_signage_layout')==true)
    $v_dsp_home .=  '<li '.($v_acc=='SIGN'?'class="active"':'') .'><a title="Home" href="'.URL.'signage_layout">Signage Layout</a></li>';


$v_dsp_home .=  '<li '.($v_acc=='SUPPORT'?'class="active"':'') .'><a title="Home" href="'.URL.'support">Support</a></li>';

$x_menu->set('MENU',$v_dsp_home);

$x_menu->set('URL',URL);

$x_header->set('COMPANY_MENU', $x_menu->output());

echo $x_header->output();
?>