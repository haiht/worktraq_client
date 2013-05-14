<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
$v_order_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_order_id, 'int');

add_class('cls_tb_order', 'cls_tb_order.php');
$cls_tb_order = new cls_tb_order($db, LOG_DIR);
add_class('cls_tb_order_items', 'cls_tb_order_items.php');
$cls_tb_order_items = new cls_tb_order_items($db, LOG_DIR);
add_class('cls_tb_color', 'cls_tb_color.php');
$cls_tb_color = new cls_tb_color($db, LOG_DIR);
add_class('cls_tb_order_log');
$cls_tb_order_log = new cls_tb_order_log($db, LOG_DIR);
add_class('cls_tb_allocation');
$cls_tb_allocation = new cls_tb_allocation($db, LOG_DIR);
add_class('cls_tb_shipping');
$cls_tb_shipping = new cls_tb_shipping($db, LOG_DIR);
add_class('cls_tb_tracking');
$cls_tb_tracking = new cls_tb_tracking($db, LOG_DIR);

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

$v_shipping_view_right = isset($arr_user_module_rule['manage_shipping']['view']);
$v_shipping_edit_right = isset($arr_user_module_rule['manage_shipping']['edit']);

$v_is_admin = is_admin_by_user($v_user_name) || is_admin();
$v_dsp_menu = $cls_tb_module->draw_kendo_menu($v_module_key, URL.'admin/', $v_is_admin, $arr_user_module_rule);
$v_dsp_horizontal_menu = $cls_tb_module->draw_kendo_horizontal_menu_from($v_dsp_menu);
$v_dsp_tree_menu = $cls_tb_module->draw_kendo_tree_menu_from('ANVY', URL, $v_dsp_menu, 'images/icons/logos.png');

//Show hide icon
$v_show_report_icon = $v_report_right || $v_is_admin;
$v_show_view_icon = $v_view_right || $v_is_admin;
$v_show_create_icon = false;
$v_show_search_icon = $v_search_right || $v_is_admin;
if(($v_report_right || $v_is_admin) && in_array($v_act, array('V', 'E'))){
    $v_dsp_show_action_icons = '
        <li>
            <a href="'.URL.$v_admin_key.'/'.$v_order_id.'/print" target="_blank">
            <p><img id="icons" src="images/icons/printer.png" title="Print" /></p><p>Print</p>
            </a>
        </li>';
}
//End show hide icon

switch($v_act){
	case 'N':
		if($v_create_right || $v_is_admin){
			include 'qry_single_tb_order.php';
			include 'user_account/admin/admin_header.php';
			include 'dsp_single_tb_order.php';
			include 'user_account/admin/admin_footer.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
	case 'V':
		if($v_view_right || $v_is_admin){
			include 'qry_single_tb_order.php';
			include 'user_account/admin/admin_header.php';
			include 'dsp_single_tb_order.php';
			include 'user_account/admin/admin_footer.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
	case 'E':
		if($v_edit_right || $v_is_admin){
			include 'qry_single_tb_order.php';
			include 'user_account/admin/admin_header.php';
			include 'dsp_single_tb_order.php';
			include 'user_account/admin/admin_footer.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
	case 'D':
		redir(URL.'admin/error/');
		break;
	case 'J':
        $v_json_type = isset($_POST['txt_json_type'])?$_POST['txt_json_type']:'';
        if($v_json_type=='json_order')
		    include 'qry_json_tb_order.php';
        else if($v_json_type=='json_shipping')
            include 'qry_json_shipping_tb_order.php';
		break;
	case 'X':
		if($v_report_right || $v_is_admin){
			include 'qry_export_tb_order.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
	case 'AJ':
		$v_ajax_type = isset($_POST['txt_ajax_type'])?$_POST['txt_ajax_type']:'';
        if($v_ajax_type=='save_order_status')
            include 'qry_ajax_save_order_status.php';
        else if($v_ajax_type=='reset_shipping')
            include 'qry_ajax_reset_shipping.php';
		break;
    case 'PRI':
        if($v_report_right || $v_is_admin){
            include 'qry_single_print_tb_order.php';
            include 'user_account/admin/print_header.php';
            include 'dsp_single_print_tb_order.php';
            include 'user_account/admin/print_footer.php';
        }else{
            redir(URL.'admin/error/');
        }
        break;
    case 'SHP':
        if($v_shipping_view_right || $v_is_admin){
            include 'qry_shipping_tb_order.php';
            include 'user_account/admin/admin_header.php';
            include 'dsp_shipping_tb_order.php';
            include 'user_account/admin/admin_footer.php';
        }else{
            redir(URL.'admin/error/');
        }
        break;
    case 'TNU':
        if(($v_shipping_view_right && $v_shipping_edit_right) || $v_is_admin){
            include 'qry_tracking_number.php';
            include 'user_account/admin/admin_header.php';
            include 'dsp_tracking_number.php';
            include 'user_account/admin/admin_footer.php';
        }else{
            redir(URL.'admin/error/');
        }
        break;
	case 'P':
		if($v_report_right || $v_is_admin){
			include 'qry_print_tb_order.php';
			include 'user_account/admin/print_header.php';
			include 'dsp_print_tb_order.php';
			include 'user_account/admin/print_footer.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
	case 'A':
	default:
		if($v_view_right || $v_is_admin){
			$v_act = 'A';
			include 'qry_all_tb_order.php';
			include 'user_account/admin/admin_header.php';
			include 'dsp_all_tb_order.php';
			include 'user_account/admin/admin_footer.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
}
?>