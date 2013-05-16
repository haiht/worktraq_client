<?php if(!isset($v_sval)) die(); ?>
<?php
$x_header = new Template('header.tpl',$v_dir_templates);
$x_header->set('TITLE','WorkTraq');
$x_header->set('DESCRIPTION','WorkTraq');
$x_header->set('KEYWORDS','WorkTraq');
$x_header->set('URL_TEMPLATES',$v_templates);
$x_header->set('CUSTOMER_NAME',$arr_user['contact_name']);
$x_header->set('URL_CSS_CUSTOMIZE','');
if( $v_customer_template_id > 0)
    $x_header->set('URL_CSS_CUSTOMIZE','<link href="'.URL.'resources/'.$_SESSION['company_code'].'/customize.css" rel="stylesheet" type="text/css">');
if($v_website_testing==true)
    $x_header->set('WEBSITE_STATUS',' The website is on testing status now!...');
else
    $x_header->set('WEBSITE_STATUS','');
$x_header->set('TITLE_PAGE',$v_navigator_name);
$x_header->set('COMPANY_NAME',$_SESSION['company_name']);
$x_header->set('LOGO',isset($_SESSION['SRC_LOGO'])?$_SESSION['SRC_LOGO']:'');
$x_header->set('URL',URL);
$x_header->set('MENU',URL);
$v_dsp_home = ' <li '.($v_acc==''?'class="active tab_menu"':'') .'><a title="Home" href="'.URL.'">Home</a></li>';
$v_dsp_home .=  '<li '.($v_acc=='CAT' || $v_acc=='INFO'?'class="active"':'') .'><a title="Catalogue" href="'.URL.'catalogue">Catalogue</a></li>';
$v_dsp_home .=  '<li '.($v_acc=='ORDER'?'class="active"':'') .'><a title="Order" href="'.URL.'order">Order</a></li>';
$v_dsp_home .=  '<li '.($v_acc=='SHIP'?'class="active"':'') .'><a title="Ship" href="'.URL.'shipping">Shipping</a></li>';
if(check_permission($_SESSION['user_rule'],'comp_module_signage_layout')==true)
    $v_dsp_home .=  '<li '.($v_acc=='SIGN'?'class="active"':'') .'><a title="Home" href="'.URL.'signage_layout">Signage Layout</a></li>';
$v_dsp_home .=  '<li '.($v_acc=='SUPPORT'?'class="active"':'') .'><a title="Support" href="'.URL.'support">Support</a></li>';
$x_header->set('MENU',$v_dsp_home);
$x_header->set('URL',URL);
echo $x_header->output();
?>