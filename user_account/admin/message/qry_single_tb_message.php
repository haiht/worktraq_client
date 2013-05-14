<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_message_id = 0;
$v_message_type = ' ';
$v_message_key = '';
$v_message_value = '';
$v_message_order = $v_message_id = $cls_tb_message->select_next('message_order');
if(isset($_POST['btn_submit_tb_message'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_message->set_mongo_id($v_mongo_id);

	$v_message_id = isset($_POST['txt_message_id'])?$_POST['txt_message_id']:$v_message_id;
	$v_message_id = (int) $v_message_id;
	$cls_tb_message->set_message_id($v_message_id);

	$v_message_type = isset($_POST['txt_message_type'])?$_POST['txt_message_type']:$v_message_type;
	$v_message_type = (int) $v_message_type;
	if($v_message_type<0) $v_error_message .= 'Message Type is negative!<br />';
	$cls_tb_message->set_message_type($v_message_type);

	$v_message_key = isset($_POST['txt_message_key'])?$_POST['txt_message_key']:$v_message_key;
	$v_message_key = trim($v_message_key);
	$cls_tb_message->set_message_key($v_message_key);

	$v_message_value = isset($_POST['txt_message_value'])?$_POST['txt_message_value']:$v_message_value;
	$v_message_value = trim($v_message_value);
	if($v_message_value=='') $v_error_message .= 'Message value] is empty!<br />';
	$cls_tb_message->set_message_value($v_message_value);

	$v_message_order = isset($_POST['txt_message_order'])?$_POST['txt_message_order']:$v_message_order;
	$v_message_order = trim($v_message_order);
	//if($v_message_order=='') $v_error_message .= 'M essage_order] is empty!<br />';
	$cls_tb_message->set_message_order($v_message_order);

	if($v_error_message==''){
		if(is_null($v_mongo_id)){
            $v_message_id = $cls_tb_message->select_next('message_id');
            $cls_tb_message->set_message_id((int) $v_message_id);
			$v_mongo_id = $cls_tb_message->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_message->update(array('_id' => $v_mongo_id));
		}
		if($v_result) redir(URL.$v_admin_key);
	}
}else{
	$v_message_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_message_id,'int');
	if($v_message_id>0){
		$v_row = $cls_tb_message->select_one(array('message_id' => $v_message_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_message->get_mongo_id();
			$v_message_id = $cls_tb_message->get_message_id();
			$v_message_type = $cls_tb_message->get_message_type();
			$v_message_key = $cls_tb_message->get_message_key();
			$v_message_value = $cls_tb_message->get_message_value();
			$v_message_order = $cls_tb_message->get_message_order();
		}
	}
}
?>