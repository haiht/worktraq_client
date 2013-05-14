<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_tag_id = 0;
$v_tag_name = '';
$v_tag_status = 0;
$v_tag_order = 0;
$v_location_id = 0;
$v_company_id = 0;
$v_user_name = '';
$v_date_created = date('Y-m-d H:i:s', time());
$v_new_tag = true;
if(isset($_POST['btn_submit_tb_tag'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_tag->set_mongo_id($v_mongo_id);
	$v_tag_id = isset($_POST['txt_tag_id'])?$_POST['txt_tag_id']:$v_tag_id;
	if(is_null($v_mongo_id)){
		$v_tag_id = $cls_tb_tag->select_next('tag_id');
	}
	$v_tag_id = (int) $v_tag_id;
	$cls_tb_tag->set_tag_id($v_tag_id);
	$v_tag_name = isset($_POST['txt_tag_name'])?$_POST['txt_tag_name']:$v_tag_name;
	$v_tag_name = trim($v_tag_name);
	if($v_tag_name=='') $v_error_message .= '[Tag Name] is empty!<br />';
	$cls_tb_tag->set_tag_name($v_tag_name);
	$v_tag_status = isset($_POST['txt_tag_status'])?0:1;
	$v_tag_status = (int) $v_tag_status;
	$cls_tb_tag->set_tag_status($v_tag_status);
	$v_tag_order = isset($_POST['txt_tag_order'])?$_POST['txt_tag_order']:$v_tag_order;
	$v_tag_order = (int) $v_tag_order;
	$cls_tb_tag->set_tag_order($v_tag_order);
	$v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:$v_location_id;
	$v_location_id = (int) $v_location_id;
	$cls_tb_tag->set_location_id($v_location_id);
	$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
	$v_company_id = (int) $v_company_id;
	if($v_company_id<0) $v_error_message .= '[Company Id] is negative!<br />';
	$cls_tb_tag->set_company_id($v_company_id);
	$v_user_name = isset($arr_user['user_name'])?$arr_user['user_name']:'';
	$cls_tb_tag->set_user_name($v_user_name);
	$v_date_created = date('Y-m-d H:i:s', time());
	$cls_tb_tag->set_date_created($v_date_created);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_tag->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_tag->update(array('_id' => $v_mongo_id));
			$v_new_tag = false;
		}
		if($v_result){
			$_SESSION['ss_tb_tag_redirect'] = 1;
			redir(URL.$v_admin_key);
		}else{
			if($v_new_tag) $v_tag_id = 0;
		}
	}
}else{
	$v_tag_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_tag_id,'int');
	if($v_tag_id>0){
		$v_row = $cls_tb_tag->select_one(array('tag_id' => $v_tag_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_tag->get_mongo_id();
			$v_tag_id = $cls_tb_tag->get_tag_id();
			$v_tag_name = $cls_tb_tag->get_tag_name();
			$v_tag_status = $cls_tb_tag->get_tag_status();
			$v_tag_order = $cls_tb_tag->get_tag_order();
			$v_location_id = $cls_tb_tag->get_location_id();
			$v_company_id = $cls_tb_tag->get_company_id();
			$v_user_name = $cls_tb_tag->get_user_name();
			$v_date_created = date('Y-m-d H:i:s',$cls_tb_tag->get_date_created());
		}
	}
}
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);

$v_tmp_location_id = $v_location_id;
$arr_all_location = get_array_data($cls_tb_location, 'location_id', 'location_name', $v_tmp_location_id, array(0,'--------'), array('company_id'=>$v_company_id));
$v_location_id=$v_tmp_location_id;
?>