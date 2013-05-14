<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';
add_class('cls_tb_color');
$cls_tb_color = new cls_tb_color($db);
switch($v_act){
    case 'U':
        include 'act_update_color.php';
        break;
	case 'N':
	case 'E':
		include 'qry_single_tb_color.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_color.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_color.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_color.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_color.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>