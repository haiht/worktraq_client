<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_location_id = 0;
$v_company_id = 0;
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
$v_order_ref = '';
$v_order_id = isset($_GET['id'])?$_GET['id']:0;
if($v_order_id!=0){
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

        $v_date_created = $cls_tb_order->get_date_created();
        if($v_date_created==NULL) $v_date_created = 'N/A';
        else $v_date_created = date('d-M-Y',strtotime($cls_tb_order->get_date_required()) );

        $v_date_required = $cls_tb_order->get_date_required();
        if($v_date_required==NULL) $v_date_required = 'N/A';
        else $v_date_required = date('d-M-Y',strtotime($cls_tb_order->get_date_required()));

        $v_term = $cls_tb_order->get_term();
        $v_location_id = $cls_tb_order->get_location_id();
        $v_company_id = $cls_tb_order->get_company_id();
        $v_delivery_method = $cls_tb_order->get_delivery_method();
        $v_source = $cls_tb_order->get_source();
        $v_status = $cls_tb_order->get_status();
        $v_dispatch = $cls_tb_order->get_dispatch();
        $v_tax_1 = $cls_tb_order->get_tax_1();
        $v_tax_2 = $cls_tb_order->get_tax_2();
        $v_tax_3 = $cls_tb_order->get_tax_3();
        $v_order_ref = $cls_tb_order->get_order_ref();
        $v_company_code = "";
        $v_total = $cls_tb_company->select_one(array("company_id"=>$v_company_id));
        if($v_total>0) $v_company_code = $cls_tb_company->get_company_code();
        $v_print_title = 'Order #'.$v_po_number;
    }
    /*Order Items */
    if($v_row == 1)
    {
        $arr_where_clause = array('order_id' => (int)$v_order_id);
        $arr_tb_order_items = $cls_tb_order_items->select_limit(0,1000,$arr_where_clause);
        $v_count = 1;
        $v_total_quantity = 0;
        $v_order_total = 0;

        /*Dispatch*/
    }
}
?>