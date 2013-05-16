<?php
if (!isset($v_sval)) die();
settype($v_user_id, 'int');
require_once 'classes/cls_tb_user.php';
$cls_user = new cls_tb_user($db, LOG_DIR);
$v_order_module_menu_key = 'customer_order';
$v_row = $cls_user->select_one(array('user_id'=>$v_user_id));
if($v_row==1){
    $arr_user_rule = $cls_user->get_module_permission($db, $v_order_module_menu_key);
}else{
    $arr_user_rule = array();
}
$v_user_rule_order_create = isset($arr_user_rule[$v_order_module_menu_key]['create']);
$v_user_rule_order_view = isset($arr_user_rule[$v_order_module_menu_key]['view']);
$v_user_rule_order_edit = isset($arr_user_rule[$v_order_module_menu_key]['edit']);
$v_user_rule_order_delete = isset($arr_user_rule[$v_order_module_menu_key]['delete']);
$v_user_rule_order_reorder = isset($arr_user_rule[$v_order_module_menu_key]['reorder']);
$v_user_rule_order_approve = isset($arr_user_rule[$v_order_module_menu_key]['approve']);
$v_user_rule_order_submit = isset($arr_user_rule[$v_order_module_menu_key]['submit']);
$v_user_rule_order_allocate = isset($arr_user_rule[$v_order_module_menu_key]['allocate']);
$v_user_rule_hide_price_all = $v_user_rule_hide_price_all || isset($arr_user_rule[$v_order_module_menu_key]['hide']);
include $v_head.'header.php';
include $v_head.'catalogue/qry_catalogue.php';
include $v_head.'footer.php';
?>