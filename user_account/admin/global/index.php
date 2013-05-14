<?php if(!isset($v_sval)) die();?>
<?php
$v_act = isset($_GET['act'])?$_GET['act']:'';

$cls_tb_global = new cls_tb_global($db);
switch($v_act){
    case 'AJ':
        include 'act_update_global.php';
        break;
	case 'N':
	case 'E':
		include 'qry_single_tb_global.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_global.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_global.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_global.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_global.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>