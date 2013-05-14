<?php if(!isset($v_sval)) die(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="description" content="" />
    <base href="<?php echo URL;?>" />
    <title><?php echo $v_main_site_title .'-'. $v_sub_site_title; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL;?>images/icons/favicon.ico" />
    <meta name="keywords" content="" />
    <meta http-equiv="REFRESH" content="1800" />
    
    <script type="text/javascript" language="javascript" src="<?php echo URL; ?>lib/js/jquery.1.8.2.js"></script>
    <link rel="stylesheet" href="<?php echo URL .'lib/css/manage.css'  ?>" type="text/css" />
    <script type="text/javascript" language="javascript" src="<?php echo URL; ?>lib/js/common.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>lib/css/menu.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>lib/css/table_css.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>lib/css/news_paginition.css" />
    <script type="text/javascript" src="<?php echo URL.'lib/js/sorttables.js'; ?>"></script>
	<link href="lib/css/jquery_ui/cupertino/jquery.ui.all.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="lib/js/jquery-ui-1.8.14.custom.min.js"></script>
    <script type="text/javascript" src="lib/js/jquery-ui-timepicker-addon.js"></script>
    
    <?php echo js_fancybox();?>
    <script language="javascript">

        $(document).ready(function() {
            $("a.group").fancybox({
                'transitionIn'	:	'elastic',
                'transitionOut'	:	'elastic',
                'speedIn'		:	600,
                'speedOut'		:	200,
                'overlayShow'	:	true
            });
        });
    </script>
</head>
<body>

<div id="page">
    <?php echo get_header(); ?>
    <?php if($cls_tb_global->select_scalar('setting_key',array('global_key'=> 'website_testing'))=='enable'){
        echo '<div class="msgbox_error" >The website is current testing status!....</div>';
        $v_website_testing = true;
    }?>
    <?php include 'tpl_admin_menu.php'; ?>
