<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
$v_shipping_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_shipping_id, 'int');
add_class('cls_tb_shipping', 'cls_tb_shipping.php');
$cls_tb_shipping = new cls_tb_shipping($db, LOG_DIR);

add_class('cls_tb_allocation', 'cls_tb_allocation.php');
$cls_tb_allocation = new cls_tb_allocation($db, LOG_DIR);
add_class('cls_tb_order', 'cls_tb_order.php');
$cls_tb_order = new cls_tb_order($db, LOG_DIR);
add_class('cls_tb_order_items', 'cls_tb_order_items.php');
$cls_tb_order_items = new cls_tb_order_items($db, LOG_DIR);


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
$v_search_right = true;
$v_view_all_right = false;
$v_is_admin = is_admin_by_user($v_user_name) || is_admin();
$v_dsp_menu = $cls_tb_module->draw_kendo_menu($v_module_key, URL.'admin/', $v_is_admin, $arr_user_module_rule);
$v_dsp_horizontal_menu = $cls_tb_module->draw_kendo_horizontal_menu_from($v_dsp_menu);
$v_dsp_tree_menu = $cls_tb_module->draw_kendo_tree_menu_from('ANVY', URL, $v_dsp_menu, 'images/icons/logos.png');
//Show hide icon
$v_show_report_icon = false;
$v_show_view_icon = false;
$v_show_create_icon = false;
$v_show_search_icon = $v_search_right || $v_is_admin;

switch($v_act){
	case 'N':
		redir(URL.'admin/error/');
		break;
	case 'V':
		redir(URL.'admin/error/');
		break;
	case 'E':
		redir(URL.'admin/error/');
		break;
	case 'D':
		redir(URL.'admin/error/');
		break;
	case 'J':
        $v_json_type = isset($_POST['txt_json_type'])?$_POST['txt_json_type']:'';
        if($v_json_type=='main_grid')
		    include 'qry_json_tb_shipping.php';
        else if($v_json_type=='sub_grid')
            include 'qry_sub_json_tb_shipping.php';
		break;
	case 'X':
		if($v_report_right || $v_is_admin){
			include 'qry_export_tb_shipping.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
	case 'AJ':
		$v_ajax_type = isset($_POST['txt_ajax_type'])?$_POST['txt_ajax_type']:'';
		break;
	case 'P':
		if($v_report_right || $v_is_admin){
			include 'qry_print_tb_shipping.php';
			include 'user_account/admin/print_header.php';
			include 'dsp_print_tb_shipping.php';
			include 'user_account/admin/print_footer.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
	case 'A':
	default:
		if($v_view_right || $v_is_admin){
			$v_act = 'A';
            $cls_tb_allocation->create_shipping($cls_tb_order, $cls_tb_order_items, array('$gte'=>30));
			include 'qry_all_tb_shipping.php';
			include 'user_account/admin/admin_header.php';
			include 'dsp_all_tb_shipping.php';
			include 'user_account/admin/admin_footer.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
}
?>