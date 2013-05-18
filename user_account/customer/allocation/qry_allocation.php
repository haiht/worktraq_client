<?php if (!isset($v_sval)) die(); ?>
<?php
$v_order_id = isset($_REQUEST['txt_order']) ?$_REQUEST['txt_order'] : 0;
$v_order_item_id = isset($_REQUEST['txt_item']) ? $_REQUEST['txt_item'] : 0;
$v_product_id = isset($_REQUEST['txt_product_id']) ? $_REQUEST['txt_product_id'] : 0;
$v_company_code = isset($_SESSION['company_code'])?$_SESSION['company_code']:'';

$v_user_rule_allocate = isset($arr_user_rule[$v_module_menu_key]['allocate']);
if(isset($v_user_rule_allocate)== false || $v_user_rule_allocate==''){
    $_SESSION['ss_error_title'] = 'Access denied';
    $_SESSION['ss_error_info'] = 'You do not have right to allocate order.';
    redir(URL.'error/');
}
if(isset($_REQUEST['txt_item'])==false || isset($_REQUEST['txt_order'])==false || isset($_REQUEST['txt_product_id'])==false){
    $_SESSION['ss_error_title'] = 'Access denied';
    $_SESSION['ss_error_info'] = 'The orders that you want to edit/view does not exist.';
    redir(URL.'error/');
}
$v_allocation_script = new Template("dsp_allocation_script.tpl",$v_dir_templates);
$v_allocation_script->set('URL',URL);
$v_allocation_script->set('URL_TEMPLATE',URL.$v_dir_templates);
$v_allocation_script->set('AJAX_LOAD_ORDER_ALLOCATION_URL', URL.'order/');
$v_allocation_script->set('SESSION_ID', session_id());
$v_allocation_script->set('URL_REQUEST', URL.$_SERVER['REQUEST_URI']);


add_class("cls_tb_product");
add_class("cls_tb_order");
$cls_tb_product = new cls_tb_product($db);
$cls_tb_order = new cls_tb_order($db);

$cls_tb_product->select_one(array("product_id"=>(int)$v_product_id));
$cls_tb_order->select_one(array("order_id"=>(int) $v_order_id));

$v_product_name = $cls_tb_product->get_short_description();
$arr_product_material = $cls_tb_product->get_material();
$v_allocation_script->set('URL',URL);

$v_order_all_allocation = new Template("dsp_order_all_allocation.tpl",$v_dir_templates);
$v_order_all_allocation->set('order_id',$v_order_id);
$v_order_all_allocation->set('order_item_id',$v_order_item_id);
$v_order_all_allocation->set('URL', URL);
$v_order_all_allocation->set('URL_TEMPLATE', URL.$v_dir_templates);
$v_order_all_allocation->set('PRODUCT_NAME', $v_product_name);
$v_order_all_allocation->set('ALLOCATION_SCRIPT', $v_allocation_script->output());
$v_order_all_allocation->set('PRODUCT_ID',$v_product_id);
$v_order_all_allocation->set('PO_NUMBER', $cls_tb_order->get_po_number());
$v_order_all_allocation->set('ORDER_DESCRIPTION', $cls_tb_order->get_description());
$v_order_all_allocation->set('ORDER_STATUS', $cls_settings->get_option_name_by_id('order_status',$cls_tb_order->get_status()));
$v_image = RESOURCE_URL.$v_company_code.'/products/'. $v_product_id .'/'. $cls_tb_product->get_image_file();
$v_url_image = !file_exists($v_image) ? '<img src="'. $v_image .'" >' : '';
$v_order_all_allocation->set('IMAGE_PRODUCT', $v_url_image);
echo $v_order_all_allocation->output();
?>