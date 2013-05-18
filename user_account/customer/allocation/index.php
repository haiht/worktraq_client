<?php if(!isset($v_sval)) die(); ?>
<?php
$v_user_id = isset($arr_user['user_id'])?$arr_user['user_id']:0;
settype($v_user_id, 'int');
require_once 'classes/cls_tb_user.php';
$cls_user = new cls_tb_user($db, LOG_DIR);
$v_module_menu_key = 'customer_order';
$v_row = $cls_user->select_one(array('user_id'=>$v_user_id));
if($v_row==1){
    $arr_user_rule = $cls_user->get_module_permission($db, $v_module_menu_key);
}else{
    $arr_user_rule = array();
}
$v_user_rule_allocate = isset($arr_user_rule[$v_module_menu_key]['allocate']);

include $v_head.'header.php';
include $v_head.'allocation/qry_allocation.php';
include $v_head.'footer.php';
?>