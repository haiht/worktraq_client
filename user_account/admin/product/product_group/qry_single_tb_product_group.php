<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_product_group_id = 0;
$v_company_id = 0;
$v_product_group_key = '';
$v_product_group_name = '';
$v_product_group_order = $cls_tb_product_group->select_scalar('product_group_order');
$v_product_group_parent = 0;
if(isset($_POST['btn_submit_tb_product_group'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_product_group->set_mongo_id($v_mongo_id);
	$v_product_group_id = isset($_POST['txt_product_group_id'])?$_POST['txt_product_group_id']:$v_product_group_id;
	if(is_null($v_mongo_id)){
		$v_product_group_id = $cls_tb_product_group->select_next('product_group_id');
	}
	$v_product_group_id = (int) $v_product_group_id;
	$cls_tb_product_group->set_product_group_id($v_product_group_id);
	$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
	$v_company_id = (int) $v_company_id;
	if($v_company_id<0) $v_error_message .= 'Company id is negative!<br />';
    $cls_tb_product_group->set_company_id($v_company_id);

    $cls_tb_product_group->set_product_group_key($v_product_group_key);
    $v_product_group_name = isset($_POST['txt_product_group_name'])?$_POST['txt_product_group_name']:$v_product_group_name;
    $v_product_group_name = trim($v_product_group_name);
    if($v_product_group_name=='') $v_error_message .= 'Product group name is empty!<br />';
    $cls_tb_product_group->set_product_group_name($v_product_group_name);

	$v_product_group_key = isset($_POST['txt_product_group_key'])?$_POST['txt_product_group_key']:$v_product_group_key;
    $v_product_group_key = strtolower($v_product_group_name);
    $v_product_group_key = str_replace(" ","_",$v_product_group_key);
    $cls_tb_product_group->set_product_group_key($v_product_group_key);

	$v_product_group_order = isset($_POST['txt_product_group_order'])?$_POST['txt_product_group_order']:$v_product_group_order;
	$v_product_group_order = (int) $v_product_group_order;
	if($v_product_group_order<0) $v_error_message .= 'Product group order  is negative!<br />';
	$cls_tb_product_group->set_product_group_order($v_product_group_order);
	$v_product_group_parent = isset($_POST['txt_product_group_parent'])?$_POST['txt_product_group_parent']:$v_product_group_parent;
	$v_product_group_parent = (int) $v_product_group_parent;
	if($v_product_group_parent<0) $v_error_message .= 'Product group parent is negative!<br />';
	$cls_tb_product_group->set_product_group_parent($v_product_group_parent);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_product_group->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_product_group->update(array('_id' => $v_mongo_id));
		}
		if($v_result) redir(URL.$v_admin_key);
	}
}else{
	$v_product_group_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_product_group_id,'int');
	if($v_product_group_id>0){
		$v_row = $cls_tb_product_group->select_one(array('product_group_id' => $v_product_group_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_product_group->get_mongo_id();
			$v_product_group_id = $cls_tb_product_group->get_product_group_id();
			$v_company_id = $cls_tb_product_group->get_company_id();
			$v_product_group_key = $cls_tb_product_group->get_product_group_key();
			$v_product_group_name = $cls_tb_product_group->get_product_group_name();
			$v_product_group_order = $cls_tb_product_group->get_product_group_order();
			$v_product_group_parent = $cls_tb_product_group->get_product_group_parent();
		}
	}
}
?>