<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_product_group') ;
add_class('cls_tb_company');
$cls_tb_company =  new cls_tb_company($db);
$cls_tb_product_group = new cls_tb_product_group($db);
switch($v_act){
    case 'AJ':
        include 'qry_load_product_ajax.php';
        break;
	case 'N':
	case 'E':
		include 'qry_single_tb_product_group.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_product_group.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_product_group.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_product_group.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_product_group.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>