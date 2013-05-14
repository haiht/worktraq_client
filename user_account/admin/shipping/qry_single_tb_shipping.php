<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_shipping_id = 0;
$v_shipper = '';
$v_tracking_number = '';
$v_tracking_url = '';
$v_date_shipping = date('Y-m-d H:i:s', time());
$v_ship_status = 0;
$v_ship_create_by = '';
$v_ship_create_date = date('Y-m-d H:i:s', time());
$v_location_from = 0;
$v_location_id = 0;
$v_location_name = '';
$v_location_address = '';
$v_company_id = 0;
$v_shipping_detail = '';
$v_new_shipping = true;
if(isset($_POST['btn_submit_tb_shipping'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_shipping->set_mongo_id($v_mongo_id);
	$v_shipping_id = isset($_POST['txt_shipping_id'])?$_POST['txt_shipping_id']:$v_shipping_id;
	if(is_null($v_mongo_id)){
		$v_shipping_id = $cls_tb_shipping->select_next('shipping_id');
	}
	$v_shipping_id = (int) $v_shipping_id;
	$cls_tb_shipping->set_shipping_id($v_shipping_id);
	$v_shipper = isset($_POST['txt_shipper'])?$_POST['txt_shipper']:$v_shipper;
	$v_shipper = trim($v_shipper);
	if($v_shipper=='') $v_error_message .= '[Shipper] is empty!<br />';
	$cls_tb_shipping->set_shipper($v_shipper);
	$v_tracking_number = isset($_POST['txt_tracking_number'])?$_POST['txt_tracking_number']:$v_tracking_number;
	$v_tracking_number = trim($v_tracking_number);
	if($v_tracking_number=='') $v_error_message .= '[Tracking Number] is empty!<br />';
	$cls_tb_shipping->set_tracking_number($v_tracking_number);
	$v_tracking_url = isset($_POST['txt_tracking_url'])?$_POST['txt_tracking_url']:$v_tracking_url;
	$v_tracking_url = trim($v_tracking_url);
	if($v_tracking_url=='') $v_error_message .= '[Tracking Url] is empty!<br />';
	$cls_tb_shipping->set_tracking_url($v_tracking_url);
	$v_date_shipping = isset($_POST['txt_date_shipping'])?$_POST['txt_date_shipping']:$v_date_shipping;
	if(!check_date($v_date_shipping)) $v_error_message .= '[Date Shipping] is invalid date/time!<br />';
	$cls_tb_shipping->set_date_shipping($v_date_shipping);
	$v_ship_status = isset($_POST['txt_ship_status'])?$_POST['txt_ship_status']:$v_ship_status;
	$v_ship_status = (int) $v_ship_status;
	if($v_ship_status<0) $v_error_message .= '[Ship Status] is negative!<br />';
	$cls_tb_shipping->set_ship_status($v_ship_status);
	$v_ship_create_by = isset($_POST['txt_ship_create_by'])?$_POST['txt_ship_create_by']:$v_ship_create_by;
	$v_ship_create_by = trim($v_ship_create_by);
	if($v_ship_create_by=='') $v_error_message .= '[Ship Create By] is empty!<br />';
	$cls_tb_shipping->set_ship_create_by($v_ship_create_by);
	$v_ship_create_date = isset($_POST['txt_ship_create_date'])?$_POST['txt_ship_create_date']:$v_ship_create_date;
	if(!check_date($v_ship_create_date)) $v_error_message .= '[Ship Create Date] is invalid date/time!<br />';
	$cls_tb_shipping->set_ship_create_date($v_ship_create_date);
	$v_location_from = isset($_POST['txt_location_from'])?$_POST['txt_location_from']:$v_location_from;
	$v_location_from = (int) $v_location_from;
	if($v_location_from<0) $v_error_message .= '[Location From] is negative!<br />';
	$cls_tb_shipping->set_location_from($v_location_from);
	$v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:$v_location_id;
	$v_location_id = (int) $v_location_id;
	if($v_location_id<0) $v_error_message .= '[Location Id] is negative!<br />';
	$cls_tb_shipping->set_location_id($v_location_id);
	$v_location_name = isset($_POST['txt_location_name'])?$_POST['txt_location_name']:$v_location_name;
	$v_location_name = trim($v_location_name);
	if($v_location_name=='') $v_error_message .= '[Location Name] is empty!<br />';
	$cls_tb_shipping->set_location_name($v_location_name);
	$v_location_address = isset($_POST['txt_location_address'])?$_POST['txt_location_address']:$v_location_address;
	$v_location_address = trim($v_location_address);
	if($v_location_address=='') $v_error_message .= '[Location Address] is empty!<br />';
	$cls_tb_shipping->set_location_address($v_location_address);
	$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
	$v_company_id = (int) $v_company_id;
	if($v_company_id<0) $v_error_message .= '[Company Id] is negative!<br />';
	$cls_tb_shipping->set_company_id($v_company_id);
	$v_shipping_detail = isset($_POST['txt_shipping_detail'])?$_POST['txt_shipping_detail']:$v_shipping_detail;
	$v_shipping_detail = trim($v_shipping_detail);
	if($v_shipping_detail=='') $v_error_message .= '[Shipping Detail] is empty!<br />';
	$cls_tb_shipping->set_shipping_detail($v_shipping_detail);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_shipping->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_shipping->update(array('_id' => $v_mongo_id));
			$v_new_shipping = false;
		}
		if($v_result){
			$_SESSION['ss_tb_shipping_redirect'] = 1;
			redir(URL.$v_admin_key);
		}else{
			if($v_new_shipping) $v_shipping_id = 0;
		}
	}
}else{
	$v_shipping_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_shipping_id,'int');
	if($v_shipping_id>0){
		$v_row = $cls_tb_shipping->select_one(array('shipping_id' => $v_shipping_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_shipping->get_mongo_id();
			$v_shipping_id = $cls_tb_shipping->get_shipping_id();
			$v_shipper = $cls_tb_shipping->get_shipper();
			$v_tracking_number = $cls_tb_shipping->get_tracking_number();
			$v_tracking_url = $cls_tb_shipping->get_tracking_url();
			$v_date_shipping = date('Y-m-d H:i:s',$cls_tb_shipping->get_date_shipping());
			$v_ship_status = $cls_tb_shipping->get_ship_status();
			$v_ship_create_by = $cls_tb_shipping->get_ship_create_by();
			$v_ship_create_date = date('Y-m-d H:i:s',$cls_tb_shipping->get_ship_create_date());
			$v_location_from = $cls_tb_shipping->get_location_from();
			$v_location_id = $cls_tb_shipping->get_location_id();
			$v_location_name = $cls_tb_shipping->get_location_name();
			$v_location_address = $cls_tb_shipping->get_location_address();
			$v_company_id = $cls_tb_shipping->get_company_id();
			$v_shipping_detail = $cls_tb_shipping->get_shipping_detail();
		}
	}
}
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
?>