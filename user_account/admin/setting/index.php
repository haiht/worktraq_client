<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_settings');
$cls_all_settings = new cls_settings($db);

switch($v_act){
    case "AJ";
        include 'act_update_settings.php';
        break;
    case "A";
        include 'qry_all_settings.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_all_settings.php';
        include 'user_account/admin/admin_footer.php';
        break;
    case "E";
    case "N";
    case "S";
        include 'qry_singer_settings.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_singer_settings.php';
        include 'user_account/admin/admin_footer.php';
        break;
    default:
        include 'qry_all_settings.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_all_settings.php';
        include 'user_account/admin/admin_footer.php';
}



?>