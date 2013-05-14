<?php if(!isset($v_sval)) die();?>
<?php
$v_test = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_company');
$cls_tb_company = new cls_tb_company($db,LOG_DIR);

switch($v_test){
    case 'AJ';
        include 'act_update_template.php';
        break;
    case "MODL"; //modules
        include 'qry_company_module.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_company_module.php';
        include 'user_account/admin/admin_footer.php';
        break;
    case "SH";
        include 'qry_details_company.php';
        include 'user_account/admin/header.php';
        include 'dsp_details_company.php';
        include 'user_account/admin/footer.php';
        break;
    case 'U':
        include 'act_update_company.php';
        break;
    case 'N':
    case 'E':
        include 'qry_single_tb_company.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_single_tb_company.php';
        include 'user_account/admin/admin_footer.php';
        break;
    case 'D':
        include 'act_delete_tb_company.php';
        break;
    case 'A':
    default:
        include 'qry_all_tb_company.php';
        include 'user_account/admin/admin_header.php';
        include 'dsp_all_tb_company.php';
        include 'user_account/admin/admin_footer.php';
        break;
}

?>