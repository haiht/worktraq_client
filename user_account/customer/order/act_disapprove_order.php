<?php
if(!isset($v_sval)) die();
?>
<?php
$v_tmp_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:'0';
settype($v_tmp_order_id, 'int');
if($v_tmp_order_id<0) $v_tmp_order_id=0;

$v_redirect = false;

$v_row = $cls_tb_order->select_one(array('order_id'=>$v_tmp_order_id));
if($v_row==1){

    add_class('cls_tb_user');
    $cls_user = new cls_tb_user($db, LOG_DIR);

    $v_tmp_order_location = $cls_tb_order->get_location_id();
    $v_tmp_order_status = $cls_tb_order->get_status();
    $v_tmp_order_company = $cls_tb_order->get_company_id();
    $v_tmp_po_number = $cls_tb_order->get_po_number();
    $v_tmp_user_name = $cls_tb_order->get_user_name();
    $v_tmp_order_ref = $cls_tb_order->get_order_ref();
    $v_tmp_date_created = $cls_tb_order->get_date_created();


    if($v_tmp_order_status==20){
        if($v_user_rule_approve){
            $v_user_location_approve = $cls_user->select_scalar('user_location_approve', array('user_name'=>$arr_user['user_name']));
            $v_tmp_contact_id = $cls_user->select_scalar('contact_id', array('user_name'=>$v_tmp_user_name));
            if(strpos($v_user_location_approve.',', $v_tmp_order_location.',')!==false){
                $v_result = $cls_tb_order->update_field('status', 15, array('order_id'=>$v_tmp_order_id));
                if($v_result){

                    $v_email_key = 'tpl_email_rejected';
                    //add_class('cls_tb_mail_templates');
                    //$cls_mail_templates = new cls_tb_email_templates($db, LOG_DIR);
                    //$v_mail_template = $cls_mail_templates->select_scalar('email_file', array('email_key'=>$v_email_key));
                    $v_send_mail = 0;
                    if(file_exists($v_dir)){
                        add_class('cls_tb_contact');
                        $cls_contact = new cls_tb_contact($db, LOG_DIR);
                        $v_full_name = $cls_contact->get_full_name_contact($v_tmp_contact_id);
                        $v_contact_email = $cls_contact->select_scalar('email', array('contact_id'=>$v_tmp_contact_id));
                        $tpl_mail = new Template($v_email_key.'.tpl', $v_mail_dir_templates);
                        $tpl_mail->set('ORDER_USER_CREATE', $v_full_name);
                        $tpl_mail->set('ORDER_ID', $v_tmp_order_id);
                        $tpl_mail->set('ORDER_PO', $v_tmp_po_number);
                        $tpl_mail->set('ORDER_REF', $v_tmp_order_ref);
                        $tpl_mail->set('ORDER_DATE', date('d-M-Y', $v_tmp_date_created));
                        $v_disapprove_reason = isset($_POST['txt_disapprove_order'])?$_POST['txt_disapprove_order']:'';
                        //require_once 'classes/class.phpmailer.php';
                        //$cls_mail = new PHPMailer(true);
                        $v_send_mail = send_mail($cls_mail, 'Anvy Website Worktraq', 'info@anvyinc.com', array($v_contact_email),'Reject pending orders', $tpl_mail->output());

                    }

                    add_class('cls_tb_order_log');
                    $cls_log = new cls_tb_order_log($db, LOG_DIR);
                    $v_tmp_description = $arr_user['user_name']. ' has been disapproved orders #'. $v_tmp_order_id.' ['.$v_tmp_po_number.'], created by: '.$v_tmp_user_name;
                    $cls_log->save_log($cls_tb_order, $arr_user['user_name'], 'Disapprove', 1, $v_tmp_description,1, $v_send_mail?1:0,$arr_user['user_name']);
                    if($arr_user['user_type']<5){
                        $v_redirect = true;
                    }else if($v_user_rule_edit){
                        $v_user_location_view = $cls_user->select_scalar('user_location_view', array('user_name'=>$arr_user['user_name']));
                        $v_user_rule_edit = strpos($v_user_location_view.',', $v_tmp_order_location.',')!==false;
                        $v_redirect = $v_user_rule_edit;
                    }
                }
            }
        }
    }
}

if(! $v_redirect){
    if(isset($_SESSION['order_id'])) unset($_SESSION['order_id']);
    if(isset($_SESSION['ss_error_approved'])) unset($_SESSION['ss_error_approved']);
    redir(URL.'order/');
}else{
    redir(URL.'order/'.$v_tmp_order_id.'/edit');
}
?>