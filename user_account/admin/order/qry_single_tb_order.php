<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_location_id = 0;
$v_order_id = 0;
$v_raw_id = '';
$v_anvy_id = '';
$v_po_number = '';
$v_order_type = 0;
$v_shipping_contact = '';
$v_total_order_amount = 0;
$v_total_discount = 0;
$v_billing_contact = '';
$v_net_order_amount = 0;
$v_gross_order_amount = 0;
$v_job_description = '';
$v_sale_rep = '';
$v_date_created = date('Y-m-d H:i:s', time());
$v_date_required = date('Y-m-d H:i:s', time());
$v_term = 0;
$v_delivery_method = '';
$v_source = 0;
$v_status = 0;
$v_dispatch = 0;
$v_tax_1 = 0;
$v_tax_2 = 0;
$v_tax_3 = 0;
if(isset($_POST['btn_submit_tb_order'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_order->set_mongo_id($v_mongo_id);

	$v_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:$v_order_id;
	$v_order_id = (int) $v_order_id;
	if($v_order_id<0) $v_error_message .= '[order_id] is negative!<br />';
	$cls_tb_order->set_order_id($v_order_id);

    $v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:$v_location_id;
    $v_location_id = (int) $v_location_id;
    if($v_location_id<0) $v_error_message .= ' Location is negative!<br />';
    $cls_tb_order->set_location_id($v_location_id);


	$v_raw_id = isset($_POST['txt_raw_id'])?$_POST['txt_raw_id']:$v_raw_id;
	$v_raw_id = trim($v_raw_id);
	if($v_raw_id=='') $v_error_message .= '[raw_id] is empty!<br />';
	$cls_tb_order->set_raw_id($v_raw_id);
	$v_anvy_id = isset($_POST['txt_anvy_id'])?$_POST['txt_anvy_id']:$v_anvy_id;
	$v_anvy_id = trim($v_anvy_id);
	if($v_anvy_id=='') $v_error_message .= '[anvy_id] is empty!<br />';
	$cls_tb_order->set_anvy_id($v_anvy_id);
	$v_po_number = isset($_POST['txt_po_number'])?$_POST['txt_po_number']:$v_po_number;
	$v_po_number = trim($v_po_number);
	if($v_po_number=='') $v_error_message .= '[po_number] is empty!<br />';
	$cls_tb_order->set_po_number($v_po_number);
	$v_order_type = isset($_POST['txt_order_type'])?$_POST['txt_order_type']:$v_order_type;
	$v_order_type = (int) $v_order_type;
	if($v_order_type<0) $v_error_message .= '[order_type] is negative!<br />';
	$cls_tb_order->set_order_type($v_order_type);
	$v_shipping_contact = isset($_POST['txt_shipping_contact'])?$_POST['txt_shipping_contact']:$v_shipping_contact;
	$v_shipping_contact = trim($v_shipping_contact);
	if($v_shipping_contact=='') $v_error_message .= '[shipping_contact] is empty!<br />';
	$cls_tb_order->set_shipping_contact($v_shipping_contact);
	$v_total_order_amount = isset($_POST['txt_total_order_amount'])?$_POST['txt_total_order_amount']:$v_total_order_amount;
	$v_total_order_amount = (float) $v_total_order_amount;
	if($v_total_order_amount<0) $v_error_message .= '[total_order_amount] is negative!<br />';
	$cls_tb_order->set_total_order_amount($v_total_order_amount);
	$v_total_discount = isset($_POST['txt_total_discount'])?$_POST['txt_total_discount']:$v_total_discount;
	$v_total_discount = (float) $v_total_discount;
	if($v_total_discount<0) $v_error_message .= '[total_discount] is negative!<br />';
	$cls_tb_order->set_total_discount($v_total_discount);
	$v_billing_contact = isset($_POST['txt_billing_contact'])?$_POST['txt_billing_contact']:$v_billing_contact;
	$v_billing_contact = trim($v_billing_contact);
	if($v_billing_contact=='') $v_error_message .= '[billing_contact] is empty!<br />';
	$cls_tb_order->set_billing_contact($v_billing_contact);
	$v_net_order_amount = isset($_POST['txt_net_order_amount'])?$_POST['txt_net_order_amount']:$v_net_order_amount;
	$v_net_order_amount = (float) $v_net_order_amount;
	if($v_net_order_amount<0) $v_error_message .= '[net_order_amount] is negative!<br />';
	$cls_tb_order->set_net_order_amount($v_net_order_amount);
	$v_gross_order_amount = isset($_POST['txt_gross_order_amount'])?$_POST['txt_gross_order_amount']:$v_gross_order_amount;
	$v_gross_order_amount = (float) $v_gross_order_amount;
	if($v_gross_order_amount<0) $v_error_message .= '[gross_order_amount] is negative!<br />';
	$cls_tb_order->set_gross_order_amount($v_gross_order_amount);
	$v_job_description = isset($_POST['txt_job_description'])?$_POST['txt_job_description']:$v_job_description;
	$v_job_description = trim($v_job_description);
	if($v_job_description=='') $v_error_message .= '[job_description] is empty!<br />';
	$cls_tb_order->set_description($v_job_description);
	$v_sale_rep = isset($_POST['txt_sale_rep'])?$_POST['txt_sale_rep']:$v_sale_rep;
	$v_sale_rep = trim($v_sale_rep);
	if($v_sale_rep=='') $v_error_message .= '[sale_rep] is empty!<br />';
	$cls_tb_order->set_sale_rep($v_sale_rep);
	$v_date_created = isset($_POST['txt_date_created'])?$_POST['txt_date_created']:$v_date_created;
	if(!check_date($v_date_created)) $v_error_message .= '[date_created] is invalid date/time!<br />';
	$cls_tb_order->set_date_created($v_date_created);
	$v_date_required = isset($_POST['txt_date_required'])?$_POST['txt_date_required']:$v_date_required;
	if(!check_date($v_date_required)) $v_error_message .= '[date_required] is invalid date/time!<br />';
	$cls_tb_order->set_date_required($v_date_required);
	$v_term = isset($_POST['txt_term'])?$_POST['txt_term']:$v_term;
	$v_term = (int) $v_term;
	if($v_term<0) $v_error_message .= '[term] is negative!<br />';
	$cls_tb_order->set_term($v_term);

	$v_delivery_method = isset($_POST['txt_delivery_method'])?$_POST['txt_delivery_method']:$v_delivery_method;
	$v_delivery_method = (int) $v_delivery_method;
	if($v_delivery_method<0) $v_error_message .= '[delivery_method] is negative!<br />';
	$cls_tb_order->set_delivery_method($v_delivery_method);
	$v_source = isset($_POST['txt_source'])?$_POST['txt_source']:$v_source;
	$v_source = (int) $v_source;
	if($v_source<0) $v_error_message .= '[source] is negative!<br />';
	$cls_tb_order->set_source($v_source);
	$v_status = isset($_POST['txt_status'])?$_POST['txt_status']:$v_status;
	$v_status = (int) $v_status;
	if($v_status<0) $v_error_message .= '[status] is negative!<br />';
	$cls_tb_order->set_status($v_status);
	$v_dispatch = isset($_POST['txt_dispatch'])?$_POST['txt_dispatch']:$v_dispatch;
	$v_dispatch = (int) $v_dispatch;
	if($v_dispatch<0) $v_error_message .= '[dispatch] is negative!<br />';
	$cls_tb_order->set_dispatch($v_dispatch);
	$v_tax_1 = isset($_POST['txt_tax_1'])?$_POST['txt_tax_1']:$v_tax_1;
	$v_tax_1 = (float) $v_tax_1;
	if($v_tax_1<0) $v_error_message .= '[tax_1] is negative!<br />';
	$cls_tb_order->set_tax_1($v_tax_1);
	$v_tax_2 = isset($_POST['txt_tax_2'])?$_POST['txt_tax_2']:$v_tax_2;
	$v_tax_2 = (float) $v_tax_2;
	if($v_tax_2<0) $v_error_message .= '[tax_2] is negative!<br />';
	$cls_tb_order->set_tax_2($v_tax_2);
	$v_tax_3 = isset($_POST['txt_tax_3'])?$_POST['txt_tax_3']:$v_tax_3;
	$v_tax_3 = (float) $v_tax_3;
	if($v_tax_3<0) $v_error_message .= '[tax_3] is negative!<br />';
	$cls_tb_order->set_tax_3($v_tax_3);
	if($v_error_message==''){
		if($v_order_id==0){
            $v_order_id = $cls_tb_order->select_next('order_id');
            $cls_tb_order->set_order_id($v_order_id);
			$v_mongo_id = $cls_tb_order->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_order->update(array('order_id' => $v_order_id));
		}
		//if($v_result) redir(URL.$v_admin_key);
	}
}else{
    $v_order_id = isset($_GET['id'])?$_GET['id']:0;

	if($v_order_id!=0){

		//$v_mongo_id = new MongoID($v_mongo_id);
		$v_row = $cls_tb_order->select_one(array('order_id' => (int)$v_order_id));
		if($v_row == 1){
			$v_order_id = $cls_tb_order->get_order_id();
			$v_raw_id = $cls_tb_order->get_raw_id();
			$v_anvy_id = $cls_tb_order->get_anvy_id();
			$v_po_number = $cls_tb_order->get_po_number();
			$v_order_type = $cls_tb_order->get_order_type();
			$v_shipping_contact = $cls_tb_order->get_shipping_contact();
			$v_total_order_amount = $cls_tb_order->get_total_order_amount();
			$v_total_discount = $cls_tb_order->get_total_discount();
			$v_billing_contact = $cls_tb_order->get_billing_contact();
			$v_net_order_amount = $cls_tb_order->get_net_order_amount();
			$v_gross_order_amount = $cls_tb_order->get_gross_order_amount();
			$v_job_description = $cls_tb_order->get_description();
			$v_sale_rep = $cls_tb_order->get_sale_rep();
			$v_date_created = date('Y-m-d H:i:s',$cls_tb_order->get_date_created());
			$v_date_required = date('Y-m-d H:i:s',$cls_tb_order->get_date_required());
			$v_term = $cls_tb_order->get_term();
			$v_delivery_method = $cls_tb_order->get_delivery_method();
			$v_source = $cls_tb_order->get_source();
			$v_status = $cls_tb_order->get_status();
			$v_dispatch = $cls_tb_order->get_dispatch();
			$v_tax_1 = $cls_tb_order->get_tax_1();
			$v_tax_2 = $cls_tb_order->get_tax_2();
			$v_tax_3 = $cls_tb_order->get_tax_3();
            $v_location_id = $cls_tb_order->get_location_id();
		}
	}
}
?>