<?php if(!isset($v_sval)) die();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="description" content="" />
    <base href="<?php echo URL;?>" />
    <title>Anvy Inc. <?php echo isset($v_print_title)?' - '.$v_print_title:'';?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL;?>images/icons/favicon.ico" />
    <style type="text/css">
        body{
            text-align: center;
            margin: 5px;
        }
        body, table{
            font-family: "Segoe UI", "Lucida Grande", Verdana, Arial, Helvetica;
            font-size: 12px;
        }
        h2{
            font-weight: 700;
            font-size: 20px;
        }
        h3{
            font-weight: 600;
            font-size: 18px;
            color: #DB7100;
        }
        table.list_table {
            border-collapse: collapse;
            padding-bottom: 20px;
            padding-top: 20px;
            -webkit-margin-start: auto;
            -webkit-margin-end: auto;
            width: 100%;
            border-top-width: 1px;
            border-right-width: 1px;
            border-bottom-width: 1px;
            border-left-width: 1px;
            border-spacing: 0px;
            border-color: #94C0D2;
        }
        table.list_table th, table.list_table td{
            border-color: #94C0D2;
            border-collapse:collapse;
        }
        table.list_table tr{
            line-height: 20px;
        }
        #page{
            text-align: justify;
        }
        #header{
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div id="page">