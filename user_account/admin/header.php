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
    <base href="<?php echo URL;?>" />
    <link href="<?php echo URL;?>lib/kendo/css/kendo.common.min.css" rel="stylesheet" />
    <link href="<?php echo URL;?>lib/css/special.css" rel="stylesheet" type="text/css" />
    <link id="link_theme" href="<?php echo URL;?>lib/css/theme.<?php echo $v_default_theme;?>.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="<?php echo URL;?>lib/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>lib/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>lib/kendo/js/kendo.web.min.js"></script>
</head>
<body>
<div id="page">