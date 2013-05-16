<?php
if (!isset($v_sval)) die();
$v_order = isset($_GET['order'])?$_GET['order']:'';
add_class('cls_tb_location');
require 'classes/class.phpmailer.php';
$cls_mail = new PHPMailer(true);
require 'classes/cls_tb_order_log.php';
$cls_tb_order_log = new cls_tb_order_log($db, LOG_DIR);
require 'classes/cls_tb_order.php';
$cls_tb_order = new cls_tb_order($db, LOG_DIR);
require 'classes/cls_tb_order_items.php';
$cls_tb_order_items = new cls_tb_order_items($db, LOG_DIR);
add_class('cls_tb_location_threshold');
$cls_threshold = new cls_tb_location_threshold($db, LOG_DIR);
$v_mail_dir_templates = 'mail/';
/*
 * Check user rules vs module rules
 */
//If you want customers' rules affected only after that, they log out and log in again, remove following code
$v_user_id = isset($arr_user['user_id'])?$arr_user['user_id']:0;
settype($v_user_id, 'int');
require_once 'classes/cls_tb_user.php';
$cls_user = new cls_tb_user($db, LOG_DIR);
$v_module_menu_key = 'customer_order';
/*Temporary Opening*/
$v_row = $cls_user->select_one(array('user_id'=>$v_user_id));
if($v_row==1){
    $arr_user_rule = $cls_user->get_module_permission($db, $v_module_menu_key);
}else{
    $arr_user_rule = array();
}
//list orders rules for users
$v_user_rule_create = isset($arr_user_rule[$v_module_menu_key]['create']);
$v_user_rule_view = isset($arr_user_rule[$v_module_menu_key]['view']);
$v_user_rule_edit = isset($arr_user_rule[$v_module_menu_key]['edit']);
$v_user_rule_delete = isset($arr_user_rule[$v_module_menu_key]['delete']);
$v_user_rule_reorder = isset($arr_user_rule[$v_module_menu_key]['reorder']);
$v_user_rule_approve = isset($arr_user_rule[$v_module_menu_key]['approve']);
$v_user_rule_submit = isset($arr_user_rule[$v_module_menu_key]['submit']);
$v_user_rule_allocate = isset($arr_user_rule[$v_module_menu_key]['allocate']);
$v_user_rule_cancel = isset($arr_user_rule[$v_module_menu_key]['cancel']);
$v_user_rule_hide_price_all = $v_user_rule_hide_price_all || isset($arr_user_rule[$v_module_menu_key]['hide']);
/*
 * End check user rules vs module rules
 */
$v_order_ajax = isset($_POST['txt_order_ajax'])?$_POST['txt_order_ajax']:'0';
settype($v_order_ajax, 'int');
$v_order_id = isset($_SESSION['order_id'])?$_SESSION['order_id']:0;
$v_check_order_id = isset($_GET['txt_order'])?$_GET['txt_order']:'0';
settype($v_check_order_id, 'int');
$v_check_order_user = '';
$v_check_order_location = 0;
if($v_check_order_id>0){
    $v_check_order_user = $cls_tb_order->select_scalar('user_name', array('order_id'=>$v_check_order_id));
    $v_check_order_location = $cls_tb_order->select_scalar('location_id', array('order_id'=>$v_check_order_id));
}else $v_check_order_user=$arr_user['user_name'];
$v_company_code = isset($_SESSION['company_code'])?$_SESSION['company_code']:'default';
$v_company_product_url = RESOURCE_URL.$v_company_code.'/products/';
$v_owner = $cls_tb_order->check_order_own(array("order_id"=>(int)$v_order_id),$v_check_order_user);
if($v_order_ajax==0){
    switch($v_order){
        case 'UPL'://upload image //========== chua xu ly
            include $v_head.'order/act_upload_image_order.php';
            break;
        case 'DE':
            if(($v_user_rule_delete && check_rule_approve($v_check_order_location, $arr_user)) || $v_order_id==0 || ($v_check_order_user==$arr_user['user_name'] && $v_user_rule_create)){
                include $v_head.'order/act_delete_order.php';
            }
            else{
                $_SESSION['ss_error_title'] = 'Access denied';
                $_SESSION['ss_error_info'] = 'The orders that you want to delete does not exist.';
                redir(URL.'error/');
            }
            break;
        case 'DIS':
            include $v_head.'order/act_disapprove_order.php';
            break;
        case 'UP':
            include $v_head.'order/act_update_order.php';
            break;
        case 'VIEW':
            $v_view_order_only = 1;
        case 'EDIT':
            if((($v_user_rule_edit || $v_user_rule_view) && check_rule_approve($v_check_order_location, $arr_user)) ||($v_check_order_user==$arr_user['user_name'] && $v_user_rule_create)
                ||(isset($v_view_order_only) && $v_view_order_only==1) || $v_owner==true
                || $v_user_rule_cancel!=''
                ){
                include $v_head.'header.php';
                include $v_head.'order/qry_load_edit_order.php';
                include $v_head.'footer.php';
            }else{
                $_SESSION['ss_error_title'] = 'Access denied';
                $_SESSION['ss_error_info'] = 'The orders that you want to edit/view does not exist.';
                redir(URL.'error/');
            }
            break;
        case 'ROR':
            if($v_user_rule_reorder)
                include $v_head.'order/qry_create_reorder.php';
        case 'CRE':
            if($v_user_rule_create || $v_user_rule_reorder){
                include $v_head.'header.php';
                include $v_head.'order/qry_create_order.php';
                include $v_head.'footer.php';
            }else{
                $_SESSION['ss_error_title'] = 'Access denied';
                $_SESSION['ss_error_info'] = 'You may have no right here';
                redir(URL.'error/');
            }
            break;
        default:
            include $v_head.'header.php';
            include $v_head.'order/qry_list_order.php';
            include $v_head.'footer.php';
            break;
    }
}
else if($v_order_ajax==100){
    include 'qry_ajax_product_order.php';
}else if($v_order_ajax==101){
    include 'qry_ajax_add_order.php';
}else if($v_order_ajax==102){
    include 'qry_ajax_load_order_allocation.php';
}else if($v_order_ajax==103){
    include 'qry_ajax_save_order_allocation.php';
}else if($v_order_ajax==104){
    include 'act_ajax_delete_order_item.php';
}else if($v_order_ajax==105){
    include 'act_ajax_check_po_number.php';
}else if($v_order_ajax==106){
    include 'act_ajax__save_order_info.php';
}
?>