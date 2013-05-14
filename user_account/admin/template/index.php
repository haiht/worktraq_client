<?php if(!isset($v_sval)) die();?>
<?php
$v_ = isset($_GET['act'])?$_GET['act']:'';
require 'classes/cls_tb_template.php';
//$m = new Mongo();//instance of MongoDB
//$db = $m->db; //select database named 'db'
$cls_tb_template = new cls_tb_template($db);
switch($v_){
	case 'N':
	case 'E':
		include 'qry_single_tb_template.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_single_tb_template.php';
		include 'user_account/admin/admin_footer.php';
		break;
	case 'D':
		include 'act_delete_tb_template.php';
		break;
	case 'A':
	default:
		include 'qry_all_tb_template.php';
		include 'user_account/admin/admin_header.php';
		include 'dsp_all_tb_template.php';
		include 'user_account/admin/admin_footer.php';
		break;
}
?>