<?php
if(!isset($v_sval)) die();
?>
<?php
if(isset($v_user_rule_approve) && $v_user_rule_approve!='' && isset($_POST['txt_order_status']) && isset($_POST['txt_order_id']) ){

    $cls_tb_order_2 = new $cls_tb_order($db);
    $v_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:'0';
    settype($v_order_id,"int");
    $v_order_status = $cls_tb_order_2->select_scalar('status',array("order_id"=>$v_order_id));
    settype($v_order_status,"int");
    if($v_order_status==20){
        $cls_tb_order_2->update_field("status",30,array("order_id"=>$v_order_id));
        redir(URL.'order');
    }
}
$v_po_number = isset($_POST['txt_po_number'])?$_POST['txt_po_number']:'';
$v_order_ref = isset($_POST['txt_order_ref'])?$_POST['txt_order_ref']:'';
$v_description = isset($_POST['txt_order_description'])?$_POST['txt_order_description']:'';
$v_date_required = isset($_POST['txt_date_required'])?$_POST['txt_date_required']:'';
$v_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:'0';
$v_order_status = isset($_POST['txt_order_status'])?$_POST['txt_order_status']:'0';
$v_order_threshold = isset($_POST['txt_order_threshold'])?$_POST['txt_order_threshold']:'0';
settype($v_order_id, 'int');
settype($v_order_status, 'int');
settype($v_order_threshold, 'int');
$v_po_number = trim($v_po_number);
$v_order_ref = trim($v_order_ref);
if(!in_array($v_order_threshold,array(1,2))) $v_order_threshold = 0;
if($v_order_id<0) $v_order_id=0;
if($v_order_status!=2) $v_order_status = 1;
$cls_tb_company = new cls_tb_company($db);
$arr_date = explode('-', $v_date_required);
if(!is_array($arr_date) || count($arr_date)!=3)
{
    $v_date_required = NULL;
}
else
{
    $v_date_required = $arr_date[2].'-'.$arr_date[1].'-'.$arr_date[0];
    $v_date_required = strtotime($v_date_required);
    if($v_date_required<=time())
    {
        $v_date_required = NULL;
    }
    else
        $v_date_required = date('Y-m-d H:i:s', $v_date_required);
}
$cls_tb_company = new cls_tb_company($db, LOG_DIR);
add_class('cls_tb_product');
$cls_product = new cls_tb_product($db, LOG_DIR);
add_class('cls_tb_location');
$cls_location = new cls_tb_location($db, LOG_DIR);
add_class('cls_tb_location_threshold');
$cls_threshold = new cls_tb_location_threshold($db, LOG_DIR);
add_class('cls_tb_contact');
$cls_contact = new cls_tb_contact($db, LOG_DIR);
add_class('cls_tb_user');
$cls_user = new cls_tb_user($db, LOG_DIR);
$v_order_error = 0;
$v_log_desc = '';
$v_log_action = '';
$v_mail_subject = '';
$v_mail_body = '';
$v_is_mail = 0;
$v_mail_send = 0;
//0: no send; 1: pending submitted; 2: approve pending order; 3: rejected
$v_mail_template = '';
$v_redirect = 0;
$v_error_message = '';
$v_order_message = '';
$v_log_message = '';
$v_contact_email = '';
$v_been_allocated = 0;
$v_require_approved = 0;
$v_item_description = '';
$cls_exist_order = new cls_tb_order($db, LOG_DIR);
$arr_product_threshold = array();
$arr_to_mail = array();
$arr_allocation_email = array();
$v_set_order_status = 10;
$v_company_status = $cls_tb_company->select_scalar('status',array('company_id'=>(int) $_SESSION['company_id'] ));
$v_company_status_key = $cls_settings->get_option_key_by_id('status',$v_company_status);
if($v_order_id>0){
    $v_row = $cls_tb_order->select_one(array('order_id'=>$v_order_id));
    if($v_row==1){
        $v_current_order_status = $cls_tb_order->get_status();
        if($v_current_order_status<20 && $v_current_order_status>0){
            $v_current_location_id = $cls_tb_order->get_location_id();
            $v_current_company_id = $cls_tb_order->get_company_id();
            $v_current_user_create = $cls_tb_order->get_user_name();
            $v_current_user_edit = $cls_tb_order->get_user_modified();
            $v_row_user = $cls_user->select_one(array('user_name'=>$v_current_user_create));
            $v_list_location_allocate = $cls_user->get_user_location_allocate();
            if(is_null($v_list_location_allocate)) $v_list_location_allocate = '';
            if($v_list_location_allocate=='') $v_list_location_allocate = $cls_user->get_location_id();
            $v_list_location_allocate .= ',';
            $arr_all_items = $cls_tb_order_items->select(array('order_id'=>$v_order_id));
            foreach($arr_all_items as $arr_temp)
            {
                $v_flag_change = false;
                $v_item_status = 0;
                $v_item_desc = 'Already allocated';
                $v_customize_information = '';
                $v_item_product_id = (int) $arr_temp['product_id'];
                $v_item_product_code = $arr_temp['product_code'];
                $v_item_id = (int) $arr_temp['order_item_id'];
                $v_item_quantity = (int) $arr_temp['quantity'];
                $v_current_item_status = (int) $arr_temp['status'];
                if(!isset($arr_product_threshold[$v_item_product_id])) $arr_product_threshold[$v_item_product_id] = $cls_product->select_scalar('product_threshold', array('product_id'=>$v_item_product_id));
                $v_product_threshold = $arr_product_threshold[$v_item_product_id];
                if(is_null($v_product_threshold)) $v_product_threshold = -1;
                $v_all_quantity = 0;
                $arr_allocation = $arr_temp['allocation'];
                $arr_item = array();
                $j = 0;
                for($i=0; $i<count($arr_allocation); $i++){
                    $v_location_quantity = (int) $arr_allocation[$i]['location_quantity'];
                    if($v_location_quantity<=0){
                        $v_flag_change = true;
                        continue;
                    }
                    $v_item_message = '';
                    $v_location_id = (int) $arr_allocation[$i]['location_id'];
                    $v_all_quantity += $v_location_quantity;
                    $v_location_threshold = $cls_threshold->check_product_threshold($v_item_product_id, $v_location_id, $v_location_quantity, $v_product_threshold);
                    if(strlen($v_location_threshold)<3) $v_location_threshold = 'y:-1';
                    $v_threshold = isset($arr_allocation[$i]['threshold'])?$arr_allocation[$i]['threshold']:'';
                    if($v_threshold!=$v_location_threshold) $v_flag_change = true;
                    $arr_allocation[$i]['threshold'] = $v_location_threshold;
                    $v_sign_threshold = substr($v_location_threshold,0,1);
                    $v_quantity_threshold = (int) substr($v_location_threshold,2);
                    if(strpos($v_list_location_allocate, $v_location_id.',')===false){
                        $v_item_status = 1;
                        $v_been_allocated = 1;
                        if($v_item_desc=='') $v_item_desc = 'Not allocated';
                        $v_item_message = '*Product: #'.$v_item_product_code.' could not be allocated to location: '.$cls_location->select_scalar('location_name', array('location_id'=>$v_location_id));
                    }else{
                        if($v_sign_threshold=='a'){
                            if($v_require_approved<1) $v_require_approved = 1;
                            $v_item_message = '*Product #'.$v_item_product_code.' has quantity: '.$v_location_quantity.' greater than threshold: '.$v_quantity_threshold.' on location #'.$cls_location->select_scalar('location_name', array('location_id'=>$v_location_id)).'. Must be approved.';
                        }else if($v_sign_threshold=='n'){
                            $v_require_approved = 2;
                            $v_item_message = '*Product #'.$v_item_product_code.' has quantity: '.$v_location_quantity.' greater than threshold: '.$v_quantity_threshold.' on location #'.$cls_location->select_scalar('location_name', array('location_id'=>$v_location_id)).'. Could not submitted.';
                        }
                    }
                    $v_customize_information .= $v_item_message;
                    $v_error_message .= $v_item_message;
                    $v_order_message .= $v_item_message;
                    $arr_allocation[$i]['shipping_status'] = 0;
                    $arr_item[$j++] = $arr_allocation[$i];

                    if(!isset($arr_allocation_mail[$v_location_id])){
                        $arr_allocation_email[$v_location_id] = 1;
                        $arr_contact = $cls_contact->select(array('location_id'=>$v_location_id ));
                        foreach($arr_contact as $arr){
                            $v_receive_email = isset($arr['receive_email_notification']) ? $arr['receive_email_notification'] : 0;
                            settype($v_receive_email, 'int');
                            if($v_receive_email){
                                $v_email = isset($arr['email']) ? $arr['email'] : '';
                                if(is_valid_email($v_email))
                                    $arr_to_mail[] = $v_email;
                            }
                        }
                    }
                }
                if($v_all_quantity!=$v_item_quantity){
                    $v_item_status = 1;
                    $v_been_allocated = 1;
                    $v_item_desc = 'Not allocated';
                    $v_item_message = '*Product: #'.$v_item_product_code.' has quantity: '.$v_item_quantity.', but the sum of quantity for all allocated locations is: '.$v_all_quantity;
                    $v_customize_information .= $v_item_message;
                    $v_error_message .= $v_item_message;
                    $v_order_message .= $v_item_message;
                }
                $v_flag_change = $v_current_item_status!=$v_item_status;
                if($v_flag_change) $cls_tb_order_items->update_fields(array('status','description','customization_information', 'allocation'), array($v_item_status, $v_item_desc, $v_customize_information, $arr_item), array('order_item_id'=>$v_item_id));
            }
            $v_set_order_status = $v_current_order_status;
            $v_user_name = $arr_user['user_name'];
            $v_user_approved = '';
            $v_date_approved = NULL;
            if($v_order_status==2){
                if($v_been_allocated==0)
                {
                    if($v_require_approved==2)
                    {
                        $v_set_order_status = $v_current_order_status<20?$v_current_order_status:10;
                        if($v_current_order_status==20) $v_mail_send = 3;
                    }
                    else if($v_require_approved==1)
                    {
                        if(isset($v_user_rule_approve) && $v_user_rule_approve!=''){
                            $v_list_location_approve = $cls_user->select_scalar('user_location_approve', array('user_name'=>$v_user_name));
                            if(strpos($v_list_location_approve.',', $v_current_location_id.',')!==false){
                                $v_set_order_status = 35;//approved
                                $v_order_message .= '*This order was required approval and has been approved';
                                $v_log_desc .= '*This order was required approval and has been approved';
                                $v_mail_send = 2;
                                $v_user_approved = $v_user_name;
                                $v_date_approved = date('Y-m-d H:i:s',time());
                                $v_redirect = 1;

                            }else{
                                $v_set_order_status = 20;
                                $v_item_message = '*This order is required approval. User #'.$v_user_name.' has approval rule, but not for order\'s location: '.$cls_location->select_scalar('location_name', array('location_id'=>$v_current_location_id));
                                $v_order_message .= $v_item_message;
                                $v_log_desc .= $v_item_message;
                                $v_redirect = 0;
                                $v_mail_send = 1;

                            }
                        }else{
                            $v_item_message = '*This order is required approval. User #'.$v_user_name.' has no approval rule. This order is pending to approve.';
                            $v_order_message .= $v_item_message;
                            $v_log_desc .= $v_item_message;
                            $v_set_order_status = 20;
                            $v_redirect = 0;

                            $v_mail_send = 1;

                        }
                    }
                    else
                    {
                        if(isset($v_user_rule_approve) && $v_user_rule_approve!=''){
                            $v_set_order_status = 30;
                        }
                        else{
                            $v_set_order_status = 20;
                        }
                        //$v_order_message .= '*This order was submitted';
                        $v_redirect = 1;
                        $v_mail_send = 2;
                    }
                }else{
                    $v_set_order_status = $v_current_order_status<20?$v_current_order_status:10;
                    $v_redirect = 0;
                }
            }else{
                $v_set_order_status = $v_current_order_status<20?$v_current_order_status:10;
                $v_redirect = 1;
            }
            if($v_po_number==''){
                $v_item_message = '*Please check "po number" (that maybe empty) for this order and try save/submit again!';
                $v_error_message .= $v_item_message;
                $v_order_message .= $v_item_message;
                $v_set_order_status = $v_current_order_status<20?$v_current_order_status:20;
                $v_redirect = 0;

                if($v_set_order_status==20) $v_mail_send = 1;
            }
            $arr_check = array('order_id'=>array('$ne'=>$v_order_id), 'po_number'=>$v_po_number, 'company_id'=>$v_current_company_id);
            $v_result_row = $cls_exist_order->count($arr_check);
            if($v_result_row>0){
                $v_item_message = '*Please input another "po number" because of existing this "po number" in system!';
                $v_error_message .= $v_item_message;
                $v_order_message .= $v_item_message;
                $v_set_order_status = $v_current_order_status<20?$v_current_order_status:20;
                if($v_set_order_status==20) $v_mail_send = 1;
                $v_redirect = $v_order_status==2?0:1;
            }
            $arr_order = $cls_tb_order_items->select(array('order_id'=>$v_order_id));
            add_class('cls_tb_location_group_threshold');
            add_class('cls_tb_product');
            add_class('cls_tb_product_group');
            $cls_check_product = new cls_tb_product($db, LOG_DIR);
            $cls_check_group = new cls_tb_product_group($db, LOG_DIR);
            $cls_check_threshold = new cls_tb_location_group_threshold($db, LOG_DIR);
            $arr_check = check_product_group_threshold($cls_check_product, $cls_check_threshold, $cls_check_group, $arr_order);
            $v_check = isset($arr_check[0])?$arr_check[0]:1;
            if($v_check==0){
                $v_set_order_status = $v_set_order_status<20?$v_set_order_status:10;
                $v_redirect = $v_order_status==2?0:1;
            }
            $cls_tb_order->set_status($v_set_order_status);
            $cls_tb_order->set_description($v_description);
            $cls_tb_order->set_notes($v_order_message);
            $cls_tb_order->set_order_ref($v_order_ref);
            $cls_tb_order->set_date_required($v_date_required);
            $cls_tb_order->set_date_approved($v_date_approved);
            $cls_tb_order->set_user_approved($v_user_approved);
            $cls_tb_order->set_po_number($v_po_number);
            $v_result = $cls_tb_order->update();
            $v_log_action = 'Update order';
            $v_is_mail = 0;
            if($v_result){
                if($v_mail_send>0){
                    $v_mail_subject = 'Info about order #'.$v_po_number;
                    $v_user_create_order = $cls_contact->get_full_name_contact($arr_user['contact_id']);
                    $v_approved_contact = $cls_location->select_scalar('approved_contact', array('location_id'=>$v_current_location_id));
                    $tpl_mail = $v_mail_send==2?new Template('tpl_email_submitted_approved.tpl', $v_mail_dir_templates):new Template('tpl_email_pending_submited.tpl', $v_mail_dir_templates);
                    $tpl_mail->set('ORDER_ID', $v_order_id);
                    $tpl_mail->set('ORDER_PO', $v_po_number);
                    $tpl_mail->set('ORDER_REF', $v_order_ref);
                    $tpl_mail->set('ORDER_DATE', fdate(date('d-M-Y', $cls_tb_order->get_date_created())));
                    $tpl_mail->set('ORDER_BY', $cls_tb_order->get_user_name());
                    $tpl_mail->set('ORDER_USER_CREATE', $v_user_create_order );
                    $v_mail_body = $tpl_mail->output();
                    $v_is_mail = 1;
                    $arr_to_mail[] =  $arr_user['user_email'];
                    $v_list_email_head_office=  $cls_tb_company->select_scalar('email_head_office', array('company_id'=>(int) $v_company_id));
                    $arr_email_head_office = explode(';',$v_list_email_head_office);
                    for($i=0;$i<sizeof($arr_email_head_office);$i++)
                        $arr_to_mail[] = $arr_email_head_office[$i];
                    $arr_to_mail[] = $cls_tb_company->select_scalar('email_sales_rep', array('company_id'=>(int) $v_company_id));
                    $v_contact_email = $cls_contact->select_scalar('email', array('contact_id'=>$v_approved_contact));
                    $v_contact_email = is_valid_email($v_contact_email)?$v_contact_email:'';
                    if($v_contact_email!='') $arr_to_mail[] = $v_contact_email;
                    $v_mail_send = send_mail($cls_mail,'Anvy Website Worktraq', 'info@anvyinc.com', $arr_to_mail,$v_mail_subject, $v_mail_body,$v_company_status_key);
                    $v_mail_send = $v_mail_send?1:0;
                }
                $cls_tb_order_log->save_log($cls_tb_order, $arr_user['user_name'],$v_log_action, 0,$v_log_desc, $v_is_mail, $v_mail_send, $arr_user['user_email']);
            }else{
                $v_item_message = '*System error! Orders can not be saved. Please contact to Anvy to fix this error!';
                $v_error_message = $v_item_message;
                $v_redirect = 0;
                $v_log_desc .= '*Order cannot be updated because of ['.$cls_tb_order->get_error_message().']';
                $cls_tb_order_log->save_log($cls_tb_order, $arr_user['user_name'],$v_log_action, 1,$v_log_desc, $v_is_mail, $v_mail_send, $arr_user['user_email']);
            }
        }else{
            $v_error_message .= '*This order could not be edited!!!';
            $v_redirect = 0;
        }
    }else{
        $v_error_message .= '*Could not find this order! Please contact to Anvy!';
        $v_redirect = 0;
    }
}else{
    if(isset($_SESSION['ss_current_order'])){

        $v_item_message = '';
        $v_redirect = 1;
        $v_current_company_id = isset($_SESSION['company_id'])?$_SESSION['company_id']:0;
        $v_user_name = isset($arr_user['user_name'])?$arr_user['user_name']:'';
        $v_current_location_id = $arr_user['location_default'];
        settype($v_current_company_id, 'int');
        $v_order_id = $cls_tb_order->select_next('order_id');
        $cls_tb_order->set_order_id($v_order_id);
        $cls_tb_order->set_anvy_id('');
        $cls_tb_order->set_raw_id('');
        $cls_tb_order->set_company_id($v_current_company_id);
        $cls_tb_order->set_date_required($v_date_required);
        $cls_tb_order->set_date_created(date('Y-m-d H:i:s'));
        $cls_tb_order->set_description($v_description);
        $cls_tb_order->set_shipping_contact($_SESSION['contact_id']);
        $cls_tb_order->set_sale_rep($v_order_ref);
        $cls_tb_order->set_order_ref($v_order_ref);
        $cls_tb_order->set_status(10);
        $cls_tb_order->set_notes('');
        $cls_tb_order->set_delivery_method('0');
        $cls_tb_order->set_po_number($v_po_number);
        $cls_tb_order->set_location_id($v_current_location_id);
        $cls_tb_order->set_user_name($v_user_name);
        $v_mongo_id = $cls_tb_order->insert();
        if(is_object($v_mongo_id)){
            $v_current_order = $_SESSION['ss_current_order'];
            $arr_order = unserialize($v_current_order);
            $v_total_order_amount = 0;
            if(is_array($arr_order)){
                for($i=0; $i<count($arr_order);$i++){
                    $v_product_id = $arr_order[$i]['product_id'];
                    $v_product_sku = $arr_order[$i]['product_sku'];
                    $v_product_description = $arr_order[$i]['product_description'];
                    $v_product_price = $arr_order[$i]['product_price'];
                    $v_product_quantity = $arr_order[$i]['product_quantity'];
                    $v_product_image = $arr_order[$i]['product_image'];
                    $v_graphic_id = $arr_order[$i]['graphic_id'];
                    $v_product_text = $arr_order[$i]['product_text'];
                    $v_size_width = $arr_order[$i]['size_width'];
                    $v_size_length = $arr_order[$i]['size_length'];
                    $v_size_unit = $arr_order[$i]['size_unit'];
                    $v_package_type = $arr_order[$i]['package_type'];
                    $v_material_id = $arr_order[$i]['material_id'];
                    $v_material_name = $arr_order[$i]['material_name'];
                    $v_material_thickness_value = $arr_order[$i]['material_thickness_value'];
                    $v_material_thickness_unit = $arr_order[$i]['material_thickness_unit'];
                    $v_material_color = $arr_order[$i]['material_color'];
                    $arr_allocation = $arr_order[$i]['allocation'];
                    $v_product_image_option = $arr_order[$i]['product_image_option'];
                    $v_product_size_option = $arr_order[$i]['product_size_option'];
                    $v_product_text_option = $arr_order[$i]['product_text_option'];
                    $v_current_text_option = $arr_order[$i]['current_text_option'];
                    $v_current_image_option = $arr_order[$i]['current_image_option'];
                    $v_current_size_option = $arr_order[$i]['current_size_option'];
                    $v_custom_image_path = $arr_order[$i]['custom_image_path'];
                    $v_order_items_id = $cls_tb_order_items->select_next('order_item_id');
                    if(!isset($arr_product_threshold[$v_product_id])) $arr_product_threshold[$v_product_id] = $cls_product->select_scalar('product_threshold', array('product_id'=>$v_product_id));
                    $v_product_threshold = $arr_product_threshold[$v_product_id];
                    if(is_null($v_product_threshold)) $v_product_threshold = -1;
                    $v_item_status = 0;
                    $v_item_desc = 'Already allocated';
                    $v_customize_information = '';
                    $arr_item = array();
                    $v_item_quantity = 0;
                    $k=0;
                    for($j=0; $j<count($arr_allocation);$j++){
                        if($arr_allocation[$j]['delete']==0){
                            unset($arr_allocation[$j]['delete']);
                        }else{
                            continue;
                        }
                        $v_location_quantity = $arr_allocation[$j]['location_quantity'];
                        if($v_location_quantity<=0) continue;
                        $arr_item[$k] = $arr_allocation[$j];
                        $v_item_location_id = $arr_item[$k]['location_id'];
                        $arr_item[$k]['shipping_status'] = 0;
                        $v_item_quantity += $v_location_quantity;
                        $v_location_threshold = $cls_threshold->check_product_threshold($v_product_id, $v_item_location_id, $v_location_quantity, $v_product_threshold);
                        if(strlen($v_location_threshold)<3) $v_location_threshold = 'y:-1';
                        $arr_item[$k]['threshold'] = $v_location_threshold;
                        $v_sign_threshold = substr($v_location_threshold,0,1);
                        $v_quantity_threshold = (int) substr($v_location_threshold,2);
                        if($v_sign_threshold=='a'){
                            if($v_require_approved<1) $v_require_approved = 1;
                            $v_item_message = '*Product #'.$v_item_product_code.' has quantity: '.$v_location_quantity.' greater than threshold: '.$v_quantity_threshold.' on location #'.$cls_location->select_scalar('location_name', array('location_id'=>$v_item_location_id)).'. Must be approved.';
                        }else if($v_sign_threshold=='n'){
                            $v_require_approved = 2;
                            $v_item_message = '*Product #'.$v_item_product_code.' has quantity: '.$v_location_quantity.' greater than threshold: '.$v_quantity_threshold.' on location #'.$cls_location->select_scalar('location_name', array('location_id'=>$v_item_location_id)).'. Could not submitted.';
                        }
                        $v_customize_information .= $v_item_message;
                        $v_error_message .= $v_item_message;
                        $v_order_message .= $v_item_message;
                        $k++;

                        if(!isset($arr_allocation_mail[$v_item_location_id])){
                            $arr_allocation_email[$v_item_location_id] = 1;
                            $arr_contact = $cls_contact->select(array('location_id'=>$v_item_location_id ));
                            foreach($arr_contact as $arr){
                                $v_receive_email = isset($arr['receive_email_notification']) ? $arr['receive_email_notification'] : 0;
                                settype($v_receive_email, 'int');
                                if($v_receive_email){
                                    $v_email = isset($arr['email']) ? $arr['email'] : '';
                                    if(is_valid_email($v_email))
                                        $arr_to_mail[] = $v_email;
                                }
                            }
                        }

                    }
                    if($v_product_quantity!=$v_item_quantity){
                        $v_item_status = 1;
                        $v_been_allocated = 1;
                        $v_item_desc = 'Not allocated';
                        $v_item_message = '*Product: #'.$v_product_sku.' has quantity: '.$v_product_quantity.', but the sum of quantity for all allocated locations is: '.$v_item_quantity;
                        $v_customize_information .= $v_item_message;
                        $v_error_message .= $v_item_message;
                        $v_order_message .= $v_item_message;
                    }
                    $cls_tb_order_items->set_order_item_id($v_order_items_id);
                    $cls_tb_order_items->set_order_id($v_order_id);
                    $cls_tb_order_items->set_product_id($v_product_id);
                    $cls_tb_order_items->set_package_type($v_package_type);
                    $cls_tb_order_items->set_company_id($v_current_company_id);
                    $cls_tb_order_items->set_location_id($arr_user['location_default']);
                    $cls_tb_order_items->set_product_code($v_product_sku);
                    $cls_tb_order_items->set_product_description($v_product_description);
                    $cls_tb_order_items->set_quantity($v_product_quantity);
                    $cls_tb_order_items->set_width($v_size_width);
                    $cls_tb_order_items->set_length($v_size_length);
                    $cls_tb_order_items->set_unit($v_size_unit);
                    $cls_tb_order_items->set_package_type($v_package_type);
                    $cls_tb_order_items->set_graphic_file( 'resources/'.$v_company_code.'/products/'.$v_product_id .'/'. $v_product_image);
                    $cls_tb_order_items->set_graphic_id($v_graphic_id);
                    $cls_tb_order_items->set_current_price($v_product_price);
                    $cls_tb_order_items->set_material_id($v_material_id);
                    $cls_tb_order_items->set_material_name($v_material_name);
                    $cls_tb_order_items->set_material_thickness_value($v_material_thickness_value);
                    $cls_tb_order_items->set_material_thickness_unit($v_material_thickness_unit);
                    $cls_tb_order_items->set_material_color($v_material_color);
                    $v_total_order_items = $v_product_quantity*$v_product_price;
                    $cls_tb_order_items->set_total_price($v_total_order_items);
                    $cls_tb_order_items->set_product_image_option($v_product_image_option);
                    $cls_tb_order_items->set_product_size_option($v_product_size_option);
                    $cls_tb_order_items->set_product_text_option($v_product_text_option);
                    $cls_tb_order_items->set_current_size_option($v_current_size_option);
                    $cls_tb_order_items->set_current_text_option($v_current_text_option);
                    $cls_tb_order_items->set_current_image_option($v_current_image_option);
                    $cls_tb_order_items->set_custom_image_path($v_custom_image_path);
                    $cls_tb_order_items->set_status($v_item_status);
                    $cls_tb_order_items->set_description($v_item_desc);
                    $cls_tb_order_items->set_customization_information($v_customize_information);
                    $cls_tb_order_items->set_allocation($arr_item);
                    $cls_tb_order_items->insert();
                    $v_total_order_amount += $v_total_order_items;
                }
                $v_user_approved = '';
                $v_date_approved = NULL;
                $v_set_order_status = 10;
                $v_redirect = 1;
                if($v_order_status==2){
                    if($v_been_allocated==0){
                        if($v_require_approved==2){
                            $v_redirect = 0;
                        }else if($v_require_approved==1){
                            if($v_user_rule_approve){
                                $v_list_location_approve = $cls_user->select_scalar('user_location_approve', array('user_name'=>$v_user_name));
                                if(strpos($v_list_location_approve.',', $v_current_location_id.',')!==false){
                                    $v_set_order_status = 35;//approved
                                    $v_order_message .= '*This order was required approval and has been approved';
                                    $v_log_desc .= '*This order was required approval and has been approved';
                                    $v_mail_send = 2;
                                    $v_user_approved = $v_user_name;
                                    $v_date_approved = date('Y-m-d H:i:s',time());
                                    $v_mail_send = 2;
                                    $v_redirect = 1;
                                }else{
                                    $v_set_order_status = 20;
                                    $v_item_message = '*This order is required approval. User #'.$v_user_name.' has approval rule, but not for order\'s location: '.$cls_location->select_scalar('location_name', array('location_id'=>$v_current_location_id));
                                    $v_order_message .= $v_item_message;
                                    $v_log_desc .= $v_item_message;
                                    $v_redirect = 0;
                                    $v_mail_send = 1;
                                }
                            }else{
                                $v_item_message = '*This order is required approval. User #'.$v_user_name.' has no approval rule. This order is pending to approve.';
                                $v_order_message .= $v_item_message;
                                $v_log_desc .= $v_item_message;
                                $v_set_order_status = 20;
                                $v_redirect = 0;
                                $v_mail_send = 1;
                            }
                        }else{
                            $v_set_order_status = 30;
                            $v_order_message .= '*This order was submitted';
                            $v_redirect = 1;
                            $v_mail_send = 2;
                        }
                    }else{
                        $v_redirect = 0;
                    }
                }else
                {
                    $v_redirect = 1;
                }
                if($v_po_number=='')
                {
                    $v_item_message = '*Please check "po number" (that maybe empty) for this order and try save/submit again!';
                    $v_error_message .= $v_item_message;
                    $v_order_message .= $v_item_message;
                    $v_set_order_status = $v_set_order_status>=30?20:$v_set_order_status;
                    $v_redirect = 0;
                    if($v_set_order_status==20) $v_mail_send=1;
                }
                $arr_check = array('order_id'=>array('$ne'=>$v_order_id),'po_number'=>$v_po_number, 'company_id'=>$v_current_company_id);
                $v_result_row = $cls_exist_order->count($arr_check);
                if($v_result_row>0){
                    $v_item_message = '*Please input another "po number" because of existing this "po number" in system!';
                    $v_error_message .= $v_item_message;
                    $v_order_message .= $v_item_message;
                    $v_set_order_status = 10;
                    $v_redirect = $v_order_status==2?0:1;
                }
                $arr_order = $cls_tb_order_items->select(array('order_id'=>$v_order_id));
                add_class('cls_tb_location_group_threshold');
                add_class('cls_tb_product');
                add_class('cls_tb_product_group');
                $cls_check_product = new cls_tb_product($db, LOG_DIR);
                $cls_check_group = new cls_tb_product_group($db, LOG_DIR);
                $cls_check_threshold = new cls_tb_location_group_threshold($db, LOG_DIR);
                $arr_check = check_product_group_threshold($cls_check_product, $cls_check_threshold, $cls_check_group, $arr_order);
                $v_check = isset($arr_check[0])?$arr_check[0]:1;
                if($v_check==0){
                    $v_set_order_status = $v_set_order_status<20?$v_set_order_status:10;
                    $v_redirect = $v_order_status==2?0:1;
                }
                $cls_tb_order->set_total_order_amount($v_total_order_amount);
                $cls_tb_order->set_status($v_set_order_status);
                $cls_tb_order->set_po_number($v_po_number);
                $cls_tb_order->set_description($v_description);
                $cls_tb_order->set_notes($v_order_message);
                $cls_tb_order->set_order_ref($v_order_ref);
                $cls_tb_order->set_date_required($v_date_required);
                $cls_tb_order->set_date_approved($v_date_approved);
                $cls_tb_order->set_user_approved($v_user_approved);
                $v_result = $cls_tb_order->update(array('order_id'=>$v_order_id));
                $v_log_action = 'Create new order';
                $v_is_mail = 0;
                if($v_result){
                    if($v_mail_send>0){
                        $v_mail_subject = 'Info about order #'.$v_po_number;
                        $v_user_create_order = $cls_contact->get_full_name_contact($arr_user['contact_id']);
                        $v_approved_contact = $cls_location->select_scalar('approved_contact', array('location_id'=>$v_current_location_id));
                        $tpl_mail = $v_mail_send==2?new Template('tpl_email_submitted_approved.tpl', $v_mail_dir_templates):new Template('tpl_email_pending_submited.tpl', $v_mail_dir_templates);
                        $tpl_mail->set('ORDER_ID', $v_order_id.' (New Order!!!)');
                        $tpl_mail->set('ORDER_PO', $v_po_number);
                        $tpl_mail->set('ORDER_REF', $v_order_ref);
                        $tpl_mail->set('ORDER_DATE', fdate(date('d-M-Y', $cls_tb_order->get_date_created())));
                        $tpl_mail->set('ORDER_BY', $cls_tb_order->get_user_name());
                        $tpl_mail->set('ORDER_USER_CREATE', $v_user_create_order );
                        $v_mail_body = $tpl_mail->output();
                        $v_is_mail = 1;
                        $arr_to_mail[] =  $arr_user['user_email'];
                        $v_list_email_head_office =  $cls_tb_company->select_scalar('email_head_office', array('company_id'=>(int) $v_company_id));
                        $arr_email_head_office = explode(';',$v_list_email_head_office);
                        for($i=0;$i<sizeof($arr_email_head_office);$i++)
                            $arr_to_mail[] = $arr_email_head_office[$i];
                        $arr_to_mail[] = $cls_tb_company->select_scalar('email_sales_rep', array('company_id'=>(int) $v_company_id));
                        $v_contact_email = $cls_contact->select_scalar('email', array('contact_id'=>$v_approved_contact));
                        $v_contact_email = is_valid_email($v_contact_email)?$v_contact_email:'';
                        if($v_contact_email!='') $arr_to_mail[] = $v_contact_email;
                        $v_mail_send = send_mail($cls_mail,'Anvy Website Worktraq', 'info@anvyinc.com', $arr_to_mail,$v_mail_subject, $v_mail_body,$v_company_status_key);
                        $v_mail_send = $v_mail_send?1:0;
                    }
                    $cls_tb_order_log->save_log($cls_tb_order, $arr_user['user_name'],$v_log_action, 0,$v_log_desc, $v_is_mail, $v_mail_send, $arr_user['user_email']);
                }else{
                    $v_item_message = '*System error! Orders can not be saved. Please contact to Anvy to fix this error!';
                    $v_error_message = $v_item_message;
                    $v_redirect = 0;
                    $v_log_desc .= '*Order cannot be updated because of ['.$cls_tb_order->get_error_message().']';
                    $cls_tb_order_log->save_log($cls_tb_order, $arr_user['user_name'],$v_log_action, 1,$v_log_desc, $v_is_mail, $v_mail_send, $arr_user['user_email']);
                }
            }else{
                $cls_tb_order->delete(array('order_id'=>$v_order_id));
                $v_error_message = '*Inactive time between your work maybe is greater than session time. You order on session is destroyed. Please try again!';
            }
            if(isset($_SESSION['ss_current_order'])) unset($_SESSION['ss_current_order']);
            if(isset($_SESSION['ss_new_order_info'])) unset($_SESSION['ss_new_order_info']);
            if(isset($_SESSION['ss_order_info'])) unset($_SESSION['ss_order_info']);
        }
    }else{
        $v_error_message = '*Inactive time between your work maybe is greater than session time. You order on session is destroyed. Please try again!';
    }
}
if($v_redirect){
    if(isset($_SESSION['order_id'])) unset($_SESSION['order_id']);
    if(isset($_SESSION['ss_error_approved'])) unset($_SESSION['ss_error_approved']);
    redir(URL.'order');
}else{
    $arr_error_message = array($v_order_id=>$v_error_message);
    $_SESSION['ss_error_approved'] = serialize($arr_error_message);
    if($v_set_order_status>=20)
        redir(URL.'order/'.$v_order_id.'/view');
    else
        redir(URL.'order/'.$v_order_id.'/edit');
}
?>