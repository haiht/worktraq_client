<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
$v_product_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_product_id, 'int');

add_class('cls_tb_product');
add_class('cls_tb_material');
add_class('cls_tb_location_threshold');
add_class('cls_tb_tag');
add_class('cls_tb_color');
add_class('cls_tb_product_group');

$cls_tb_material = new cls_tb_material($db, LOG_DIR);
$cls_tb_tag = new cls_tb_tag($db, LOG_DIR);
$cls_tb_product = new cls_tb_product($db, LOG_DIR);
$cls_tb_color = new cls_tb_color($db, LOG_DIR);
$cls_tb_threshold = new cls_tb_location_threshold($db, LOG_DIR);
$cls_tb_product_group = new cls_tb_product_group($db,LOG_DIR );
add_class('cls_tb_contact', 'cls_tb_contact.php');
$cls_tb_contact = new cls_tb_contact($db, LOG_DIR);



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
$v_show_report_icon = $v_report_right || $v_is_admin;
$v_show_view_icon = $v_view_right || $v_is_admin;
$v_show_create_icon = $v_create_right || $v_is_admin;
$v_show_search_icon = $v_search_right || $v_is_admin;
//End show hide icon

switch($v_act){
	case 'N':
		if($v_create_right || $v_is_admin){
			include 'qry_single_tb_product.php';
			include 'user_account/admin/admin_header.php';
			include 'dsp_single_tb_product.php';
			include 'user_account/admin/admin_footer.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
	case 'V':
		if($v_view_right || $v_is_admin){
			include 'qry_single_tb_product.php';
			include 'user_account/admin/admin_header.php';
			include 'dsp_single_tb_product.php';
			include 'user_account/admin/admin_footer.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
	case 'E':
		if($v_edit_right || $v_is_admin){
			include 'qry_single_tb_product.php';
			include 'user_account/admin/admin_header.php';
			include 'dsp_single_tb_product.php';
			include 'user_account/admin/admin_footer.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
	case 'D':
		if($v_delete_right || $v_is_admin){
			include 'act_delete_tb_product.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
	case 'J':
		include 'qry_json_tb_product.php';
		break;
    case 'AJ':
        $v_ajax_type = isset($_POST['txt_ajax_type'])?$_POST['txt_ajax_type']:'';
        if($v_ajax_type=='product_info'){
            include 'qry_ajax_product_info.php';
        }else if($v_ajax_type=='upload_thumbnail'){
            include 'qry_ajax_save_product_thumbnail.php';
        }else if($v_ajax_type=='material_option'){
            include 'qry_ajax_load_material_option.php';
        }else if($v_ajax_type=='product_sku'){
            include 'qry_ajax_check_product_sku.php';
        }
        break;
	case 'X':
		if($v_report_right || $v_is_admin){
			include 'qry_export_tb_product.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
	case 'P':
		if($v_report_right || $v_is_admin){
			include 'qry_print_tb_product.php';
			include 'user_account/admin/print_header.php';
			include 'dsp_print_tb_product.php';
			include 'user_account/admin/print_footer.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
    case 'THR'://location threshold
        include 'qry_single_tb_location_threshold.php';
        include 'user_account/admin/header.php';
        include 'dsp_single_tb_location_threshold.php';
        include 'user_account/admin/footer.php';
        break;
    case 'EXL'://excluded location
        include 'qry_single_tb_product_exclude.php';
        include 'user_account/admin/header.php';
        include 'dsp_single_tb_product_exclude.php';
        include 'user_account/admin/footer.php';
        break;
	case 'A':
	default:
		if($v_view_right || $v_is_admin){
			$v_act = 'A';
			include 'qry_all_tb_product.php';
			include 'user_account/admin/admin_header.php';
			include 'dsp_all_tb_product.php';
			include 'user_account/admin/admin_footer.php';
		}else{
			redir(URL.'admin/error/');
		}
		break;
}
?>