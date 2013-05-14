<?php
if(!isset($v_sval)) redir(URL);
add_class('cls_tb_order');
add_class('cls_tb_allocation');

$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', 0);
$v_this_module_menu = isset($v_module_menu)?$v_module_menu:''; //replace module_menu_key here
$v_user_full_name = '';
$v_user_name = isset($arr_user['user_name'])?$arr_user['user_name']:'';
$arr_user_module_rule = array();
$v_user_id = isset($arr_user['user_id'])?$arr_user['user_id']:0;
$v_row = $cls_tb_user->select_one(array('user_id'=>$v_user_id));
if($v_row == 1){
    $v_contact_id = $cls_tb_user->get_contact_id();
    $v_user_name = $cls_tb_user->get_user_name();
    $v_user_full_name = $cls_tb_contact->get_full_name_contact($v_contact_id);
    $arr_user_module_rule = $cls_tb_user->get_all_permission($db);
}
$v_view_right = isset($arr_user_module_rule[$v_this_module_menu]['view']);
$v_edit_right = isset($arr_user_module_rule[$v_this_module_menu]['edit']);
$v_create_right = isset($arr_user_module_rule[$v_this_module_menu]['create']);
$v_delete_right = isset($arr_user_module_rule[$v_this_module_menu]['delete']);
$v_report_right = isset($arr_user_module_rule[$v_this_module_menu]['report']);
$v_search_right = false;
$v_view_all_right = false;
$v_is_admin = is_admin_by_user($v_user_name) || is_admin();
$v_dsp_menu = $cls_tb_module->draw_kendo_menu($v_module_key, URL.'admin/', $v_is_admin, $arr_user_module_rule);
$v_dsp_horizontal_menu = $cls_tb_module->draw_kendo_horizontal_menu_from($v_dsp_menu);
$v_dsp_tree_menu = $cls_tb_module->draw_kendo_tree_menu_from('ANVY', URL, $v_dsp_menu, 'images/icons/logos.png');

//Show hide icon
$v_show_report_icon = false;
$v_show_view_icon = false;
$v_show_create_icon = false;
$v_show_search_icon = false;
//End show hide icon

include 'qry_home.php';
include 'user_account/admin/admin_header.php';
include 'dsp_home.php';
include 'user_account/admin/admin_footer.php';

?>