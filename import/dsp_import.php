<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="description" content="" />
    <base href="http://worktraq-dev.anvy.net/" />
    <title>WorkTraq-Admin Panel</title>
    <link rel="shortcut icon" type="image/x-icon" href="http://worktraq-dev.anvy.net/images/icons/favicon.ico" />
    <meta name="keywords" content="" />
    <meta http-equiv="REFRESH" content="1800" />
    <script type="text/javascript" language="javascript" src="http://worktraq-dev.anvy.net/lib/js/jquery.1.8.2.js"></script>
    <script type="text/javascript" language="javascript" src="http://worktraq-dev.anvy.net/lib/js/sorttables.js"></script>
    <link rel="stylesheet" href="http://worktraq-dev.anvy.net/lib/css/manage.css" type="text/css" />
</head>

<body>
<?php if($v_message!=''){ ?>
    <p class="msgbox_success">
        <?php echo $v_message; ?>
    </p>
<?php } ?>:
<?php echo $v_dsp; ?>
</body>
</html>