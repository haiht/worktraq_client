<?php
if(!isset($v_sval)) die();
?>
<?php
$v_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:'0';
$v_status = isset($_POST['txt_status'])?$_POST['txt_status']:'0';
settype($v_order_id, 'int');
settype($v_status, 'int');
$arr_return = array('error'=>0, 'message'=>'OK');
if($v_edit_right || $v_is_admin){
    if($v_order_id>0){
        if($v_status >= 30){
            $v_row = $cls_tb_order->select_one(array('order_id'=>$v_order_id));
            if($v_row==1){
                $v_current_status = $cls_tb_order->get_status();
                $v_abs_current_status = abs($v_current_status);
                $v_new_order_status = $v_status;

                $v_dsp_order_status = $cls_settings->get_option_name_by_id('order_status',$v_new_order_status);
                $v_dsp_old_order_status = $v_current_status>0?$cls_settings->get_option_name_by_id('order_status',$v_current_status):'Delete';

                if($v_current_status>=30){
                    $v_result_mail = 0;
                    $v_is_send_mail = 0;
                    $v_mail_from = '';

                    if($v_status==300)
                        $v_status = -$v_current_status;
                    $v_result = $cls_tb_order->update_field('status', $v_status, array('order_id'=>$v_order_id));
                    if(!$v_result){
                        $arr_return['error'] = 6;
                        $arr_return['message']= 'This Order: #'.$v_order_id.' is not saved!';
                    }else{
                        /*Check key new status */

                        $v_new_key_order_status = $cls_settings->get_option_key_by_id('order_status',$v_new_order_status);

                        /* Check current order status */
                        $v_order_current = $v_current_status;
                        $v_current_key_order_status = $cls_settings->get_option_key_by_id('order_status',$v_order_current);
                        if(($v_current_key_order_status=='submitted' ||$v_current_key_order_status=='approved') && ($v_new_key_order_status=='in_production' ||  $v_new_key_order_status=='on_hold')){
                            $v_is_send_mail = 1;
                            $arr_to_mail = array();
                            $cls_tb_order->select_one(array('order_id'=>(int)$v_order_id));
                            $v_po_number  = $cls_tb_order->get_po_number();
                            $v_user_create_order = $cls_tb_order->get_user_name();
                            $v_order_ref = $cls_tb_order->get_order_ref();
                            $v_date_create = $cls_tb_order->get_date_created();
                            $v_date_create = ($v_date_create==0 || $v_date_create<=100)?'':date('d-M-Y',$v_date_create);
                            $v_company_id = $cls_tb_order->get_company_id();
                            add_class('PHPMailer','class.phpmailer.php');
                            add_class('Template','xtemplate.class.php');
                            $mail = new PHPMailer (true);
                            $v_dir_templates = 'mail';
                            $v_email_body = '';
                            $p_subject = '';

                            $v_contact_id  = $cls_tb_user->select_scalar('contact_id',array('user_name'=>$v_user_create_order));
                            $v_user_create_order = $cls_tb_contact->get_full_name_contact($v_contact_id);

                            $v_email_user_create = $cls_tb_contact->select_scalar('email',array('contact_id'=>(int) $v_contact_id));
                            $v_sales_rep = $cls_tb_company->select_scalar('email_sales_rep',array('company_id'=>(int)$v_company_id));

                            $v_email_head_office = $cls_tb_company->select_scalar('email_head_office',array('company_id'=>(int)$v_company_id));
                            $arr_email_head_office = explode(";",$v_email_head_office);

                            for($i=0;$i<sizeof($arr_email_head_office);$i++){
                                $arr_to_mail[] = $arr_email_head_office[$i];
                            }

                            $v_email_approver = $cls_tb_order_log->select_scalar('user_mail',array('order_id'=>(int)$v_order_id, 'order_status'=>'submitted'));
                            $arr_to_mail[] = $v_email_approver; // Send email to approver

                            $v_mail_from = $cls_settings->get_option_name_by_key('email','email_orgin');
                            /* Content email */
                            $v_mail_subject = 'Info about order #'.$v_po_number . ' Oder Ref: '.$v_order_ref ;
                            $p_subject = 'Order Submitted – Approved';

                            /*Choise templates for email */
                            if($v_new_key_order_status=='in_production')
                                $tpl_content = new Template('tpl_email_order_in_production.tpl',$v_dir_templates);

                            if($v_new_key_order_status=='on_hold')
                                $tpl_content = new Template('tpl_email_order_on_hold.tpl',$v_dir_templates);

                            /* Set variable */
                            $tpl_content->set('URL',URL);
                            $tpl_content->set('ORDER_ID',$v_order_id);
                            $tpl_content->set('ORDER_PO',$v_po_number);
                            $tpl_content->set('ORDER_REF',$v_order_ref);
                            $tpl_content->set('ORDER_DATE',$v_date_create);
                            $tpl_content->set('ORDER_USER_CREATE',$v_user_create_order);
                            $v_email_body = $tpl_content->output();
                            /* End Content mail */
                            /* Add email Address */
                            $arr_to_mail[]=$v_email_user_create; // User create order
                            $arr_to_mail[]=$v_sales_rep; // User rep


                            /* Send email for allocation */
                            $arr_allocation_mail = array();
                            $arr_tb_order = $cls_tb_order_items->select(array('order_id'=>(int) $v_order_id ));
                            foreach($arr_tb_order as $arr_outer){
                                $v_product_code = isset($arr_outer['product_code'])?$arr_outer['product_code']:0;
                                $v_quantity = isset($arr_outer['quantity'])?$arr_outer['quantity']:0;
                                $arr_allocation = isset($arr_outer['allocation'])?$arr_outer['allocation']:array();
                                $v_order_item_id = isset($arr_outer['order_item_id'])?$arr_outer['order_item_id']:0;

                                $v_total = sizeof($arr_allocation);
                                for($i=0;$i<$v_total;$i++)
                                {
                                    $v_location_id = isset($arr_allocation[$i]['location_id'])?$arr_allocation[$i]['location_id']:'';
                                    if(!isset($arr_allocation_mail[$v_location_id])){
                                        $arr_allocation_mail[$v_location_id] = 1;
                                        $arr_contact = $cls_tb_contact->select(array('location_id'=>(int)$v_location_id ));
                                        foreach($arr_contact as $arr){
                                            $v_receive_email = isset($arr['receive_email_notification']) ? $arr['receive_email_notification'] : 0;
                                            $v_email = isset($arr['email']) ? $arr['email'] : '';
                                            $arr_to_mail[] = $v_email;
                                        }

                                    }
                                }
                            }
                            $v_option_mail_production = $cls_settings->get_option_name_by_key('email','list_email_production');
                            $arr_mail_production = explode(";",$v_option_mail_production);
                            $v_count_email = sizeof($arr_mail_production);

                            for($i=0;$i<$v_count_email;$i++){
                                $arr_to_mail[] =$arr_mail_production[$i];
                            }



                            /* Send email */
                            $v_result_mail = send_mail($mail,'Anvy Website Worktraq',$v_mail_from,$arr_to_mail,$v_mail_subject,$v_email_body);
                            $v_result_mail = $v_receive_email?1:0;

                            if($v_result_mail==false){
                                $arr_return['error']= $v_new_order_status;
                                $arr_return['message']= 'The order has changed status to <b> '.$v_dsp_order_status.'</b> , but can not send email!...';
                                $arr_return['data']= $cls_settings->get_option_name_by_id('order_status',$v_new_order_status);
                            } else {
                                if($v_website_testing==true){
                                    $v_result_mail = 0;
                                    $arr_return['error']= $v_new_order_status;
                                    $arr_return['message']= 'The order has changed status to <b> '.$v_dsp_order_status.' </b> !...Email has been sent for email testing....';
                                    $arr_return['data']= $cls_settings->get_option_name_by_id('order_status',$v_new_order_status);
                                }
                                else
                                {
                                    $v_result_mail = 0;
                                    $arr_return['error']= $v_new_order_status;
                                    $arr_return['message']= 'The order has changed status to <b> '.$v_dsp_order_status.' </b> !...Email has been sent for User creating: <b>'.  $v_email_user_create .', '. $v_option_mail_production  . '</b>, User Approved: <b>'.$v_email_approver.'</b> and Sales rep:<b>'.$v_sales_rep. ' </b> and '. implode(', ',$arr_to_mail) . '</b>';
                                    $arr_return['data']= $cls_settings->get_option_name_by_id('order_status',$v_new_order_status);
                                }
                            }

                        }
                        $cls_tb_order_log->save_log($cls_tb_order,isset($arr_user['user_name'])?$arr_user['user_name']:'',' Change status order from '.$v_dsp_old_order_status.' to '.$v_dsp_order_status.' ',$v_result,$arr_return['message'],$v_is_send_mail,$v_result_mail,$v_mail_from);

                    }
                }else{
                    if($v_abs_current_status>=30){
                        if($v_is_admin){
                            $v_result = $cls_tb_order->update_field('status', $v_status, array('order_id'=>$v_order_id));
                            $cls_tb_order_log->save_log($cls_tb_order,isset($arr_user['user_name'])?$arr_user['user_name']:'',' Change status order from '.$v_dsp_old_order_status.' to '.$v_dsp_order_status.' ',$v_result,$arr_return['message'],0,0,'');
                            if($v_result){
                                $arr_return['error'] = 0;
                                $arr_return['message']= 'Restore order status successful!';
                            }else{
                                $arr_return['error'] = 7;
                                $arr_return['message']= 'Restore order status not successful!';
                            }
                        }else{
                            $arr_return['error'] = 6;
                            $arr_return['message']= 'You have not authority!';
                        }
                    }else{
                        $arr_return['error'] = 5;
                        $arr_return['message']= 'This Order: #'.$v_order_id.' is not submitted!';
                    }
                }
            }else{
                $arr_return['error'] = 4;
                $arr_return['message']= 'Not found Order: #'.$v_order_id.'!';
            }
        }else{
            $arr_return['error'] = 3;
            $arr_return['message']= 'Lost Order Status!';
        }
    }else{
        $arr_return['error'] = 2;
        $arr_return['message']= 'Lost Order ID!';
    }
}else{
    $arr_return['error'] = 1;
    $arr_return['message']= 'You have no permission!';
}
echo json_encode($arr_return);
?>