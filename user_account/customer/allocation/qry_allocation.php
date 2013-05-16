<?php if (!isset($v_sval)) die();
?>
<?php
if(isset($v_user_rule_allocate)== false || $v_user_rule_allocate==''){
    $_SESSION['ss_error_title'] = 'Access denied';
    $_SESSION['ss_error_info'] = 'You do not  have right to allocate order .';
    redir(URL.'error/');
}
if(isset($_REQUEST['txt_item'])==false || isset($_REQUEST['txt_order'])==false || isset($_REQUEST['txt_product_id'])==false){
    $_SESSION['ss_error_title'] = 'Access denied';
    $_SESSION['ss_error_info'] = 'The orders that you want to edit/view does not exist.';
    redir(URL.'error/');
}
add_class("cls_tb_product");
$cls_tb_product = new cls_tb_product($db);
$v_product_id = $_REQUEST['txt_product_id'];
$v_allocation_script = new Template("dsp_allocation_script.tpl",$v_dir_templates);
$v_allocation_script->set('URL',URL);
$v_allocation_script->set('URL_TEMPLATE',URL.$v_dir_templates);
$v_allocation_script->set('AJAX_LOAD_ORDER_ALLOCATION_URL', URL.'order/');
$v_allocation_script->set('SESSION_ID', session_id());
$v_allocation_script->set('URL_REQUEST', URL.$_SERVER['REQUEST_URI']);
$v_order_id = $_REQUEST['txt_order'];
$v_order_item_id = $_REQUEST['txt_item'];
$v_product_name = $cls_tb_product->select_scalar("product_sku",array("product_id"=>(int)$v_product_id));
$arr_product_material = $cls_tb_product->select_scalar("material",array("product_id"=>(int)$v_product_id));
$v_order_all_allocation = new Template("dsp_order_all_allocation.tpl",$v_dir_templates);
$v_order_all_allocation->set('order_id',$v_order_id);
$v_order_all_allocation->set('order_item_id',$v_order_item_id);
$v_order_all_allocation->set('URL', URL);
$v_order_all_allocation->set('URL_TEMPLATE', URL.$v_dir_templates);
$v_order_all_allocation->set('PRODUCT_NAME', $v_product_name);
$v_order_all_allocation->set('ALLOCATION_SCRIPT', $v_allocation_script->output());
$v_order_all_allocation->set('PRODUCT_ID',$v_product_id);
echo $v_order_all_allocation->output();
?>