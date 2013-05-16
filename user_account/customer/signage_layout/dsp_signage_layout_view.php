<?php
if(!isset($v_sval)) die();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $v_main_site_title .'-'. $v_sub_site_title; ?></title>
<base href="<?php echo URL;?>" />
<script type="text/javascript" src="lib/js/jquery.min.1.8.2.js"></script>
<script type="text/javascript" src="lib/imagemapster/jquery.imagemapster.js"></script>
<script type="text/javascript">
$(document).ready(function(){
<?php echo $v_dsp_script;?>
});
</script>
<style type="text/css">
body{
    font-family: Tahoma, Verdana, Arial;
    font-size: 12px;
    margin: 0px;
    text-align: justify;
}
</style>
</head>

<body>
<div style="margin-left: 10px; margin-right: 10px;">
<?php echo $v_dsp_map;?>
</div>
</body>
</html>