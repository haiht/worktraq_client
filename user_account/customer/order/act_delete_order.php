<?php
if (!isset($v_sval)) die();
if(isset($_GET['txt_order'])==false) die("ko co gi ca");//redir($link);
$v_request_order_id = isset($_GET['txt_order'])?$_GET['txt_order']:'0';
if(settype($v_request_order_id, 'int')==false)
    redir($link);
?>
<?php
    $arr_response = array('error'=>1,'message'=>'','data'=>'');
    if($v_request_order_id>0){
        $v_order_status = $cls_tb_order->select_scalar("status",array("order_id"=>$v_request_order_id));
        $v_mess_status = $cls_settings->get_option_key_by_id("order_status",(int)$v_order_status);
        if($v_mess_status=='not_submitted'  || $v_mess_status=='pending' )
        {
            $v_row = $cls_tb_order->select_one(array('order_id'=>$v_request_order_id)) ;
            if($v_row==1){
                $v_current_status = $cls_tb_order->get_status();
                $v_current_status = - $v_current_status;
                if($v_current_status==0) $v_current_status = -100;
                $v_result = $cls_tb_order->update_field('status',$v_current_status,array('order_id'=>$v_request_order_id));
                if($v_result){
                    if(isset($_SESSION['order_id'])){
                        $v_session_order = isset($_SESSION['order_id']);
                        settype($v_session_order,'int');
                        if($v_session_order>0 && $v_session_order==$v_request_order_id) unset($_SESSION['order_id']);
                    }
                }
                $v_log = 'User delete order: #'.$v_request_order_id.' - PO: #'.$cls_tb_order->get_po_number() .' - Create: '.date('d-M-Y',$cls_tb_order->get_date_created()).' by: '.$cls_tb_order->get_user_name();
                $cls_tb_order_log->save_log($cls_tb_order, $arr_user['user_name'],'Delete Order', $v_result?0:1,$v_log, 0,0);
            }
        }
        else{
            $arr_response['error']=1;
            $arr_response['message']="You can't delete a submit order";
            echo "<script language=javascript> alert(\"You can't delete a submit order\");</script>";
        }
    }else{
        if(isset($_SESSION['ss_current_order'])) unset($_SESSION['ss_current_order']);
        if(isset($_SESSION['ss_new_order_info'])) unset($_SESSION['ss_new_order_info']);
    }
//$v_user_id = get_unserialize_user('user_id');
//
redir(URL.'order/');
?>