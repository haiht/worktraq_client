<?php if (!isset($v_sval)) die(); ?>
<?php
$v_order_id = isset($_REQUEST['txt_order_id'])?$_REQUEST['txt_order_id']:0;
$v_location_id = isset($_REQUEST['txt_location_id'])?$_REQUEST['txt_location_id']:0;
$v_list_location = isset($_REQUEST['hdn_allocation_list'])?$_REQUEST['hdn_allocation_list']:'';

$cls_tb_settings = new cls_settings($db);
if($v_list_location=='' || $v_order_id==0) redir($_SERVER['HTTP_REFERER']);
$v_temp_list_location =$v_list_location;
$v_error_message = '';
$arr_allocation_mail = array();
$v_location_from = isset($_REQUEST['txt_location_from'])?$_REQUEST['txt_location_from']:0;
$v_company_id = isset($_REQUEST['txt_company_id'])?$_REQUEST['txt_company_id']:0;
$arr_to_mail = array();
$v_is_mail = 0;
$v_mail_send = 0;

settype($v_company_id, 'int');
settype($v_location_from, 'int');
settype($v_location_id, 'int');
settype($v_order_id, 'int');

if(isset($_POST['btn_submit_tb_order'])){
    $arr_tmp_allocation = array();
    $arr_tracking_company = isset($_POST['txt_tracking_company'])?$_POST['txt_tracking_company']:NULL;
    $arr_tracking_number = isset($_POST['txt_tracking_number'])?$_POST['txt_tracking_number']:NULL;
    $arr_tracking_url = isset($_POST['txt_tracking_url'])?$_POST['txt_tracking_url']:NULL;
    $arr_ship_status = isset($_POST['ship_status'])?$_POST['ship_status']:NULL;
    $arr_date_ship = isset($_POST['txt_date_ship'])?$_POST['txt_date_ship']:NULL;
    $arr_allocation = isset($_POST['txt_tmp_allocation_id'])?$_POST['txt_tmp_allocation_id']:NULL;
    $arr_location_id = isset($_POST['txt_tmp_location_id'])?$_POST['txt_tmp_location_id']:NULL;
    $arr_location_name = isset($_POST['txt_tmp_location_name'])?$_POST['txt_tmp_location_name']:NULL;
    $arr_location_address = isset($_POST['txt_tmp_location_address'])?$_POST['txt_tmp_location_address']:NULL;
    $v_order_status = $cls_tb_order->select_scalar('status',array('order_id'=>(int)$v_order_id));
    $v_check_insert_shipping  = 0;
    if(is_array($arr_tracking_company) && is_array($arr_tracking_number) && is_array($arr_tracking_url) && is_array($arr_ship_status) && is_array($arr_date_ship) && is_array($arr_allocation)){
        $v_count_total = count($arr_tracking_company) + count($arr_tracking_number) + count($arr_tracking_url) + count($arr_date_ship) + count($arr_allocation) + count($arr_ship_status);
        if($v_count_total > 0 && (count($arr_date_ship)==($v_count_total/6))){
            for($i=0; $i<count($arr_date_ship); $i++){
                $v_tracking_company = trim($arr_tracking_company[$i]);
                $v_tracking_number = trim($arr_tracking_number[$i]);
                $v_tracking_url = trim($arr_tracking_url[$i]);
                $v_ship_status = (int) $arr_ship_status[$i];
                $v_location_id = (int) $arr_location_id[$i];
                $v_location_name = $arr_location_name[$i];
                $v_location_address = $arr_location_address[$i];
                if($v_tracking_number=='' || $v_tracking_company=='') continue;
                $v_allocation = $arr_allocation[$i];
                if(strlen($v_allocation)>0){
                    $v_date_ship = $arr_date_ship[$i];
                    $arr_sub_date_ship = explode('-', $v_date_ship);
                    if(count($arr_sub_date_ship)==3){
                        $v_date_ship = strtotime($arr_sub_date_ship[2].'-'.$arr_sub_date_ship[0].'-'.$arr_sub_date_ship[1]);
                    }else{
                        $v_date_ship = time();
                    }
                    $v_date_ship = new MongoDate($v_date_ship);
                    $arr_sub_allocation = explode(',',$v_allocation);
                    //$arr_where_clause = array();
                    //$arr_item_where_clause = array();
                    for($j=0; $j<count($arr_sub_allocation); $j++){
                        $v_where_allocation_id = (int) $arr_sub_allocation[$j];
                        if($v_where_allocation_id>0){
                            $v_check_insert_shipping  =1;
                            $v_row = $cls_tb_allocation->select_one(array('allocation_id'=>$v_where_allocation_id));
                            if($v_row==1){
                                $arr_tmp_allocation[$v_where_allocation_id] = array(
                                    'edit'=>1,
                                    'new_status'=>$v_ship_status,//$v_ship_status,
                                    'old_status'=>$cls_tb_allocation->get_ship_status(),
                                    'old_tracking'=>$cls_tb_allocation->get_tracking_number(),
                                    'new_tracking'=>$v_tracking_number,
                                    'shipper'=>$cls_tb_allocation->get_shipper(),
                                    'tracking_url'=>$cls_tb_allocation->get_tracking_url(),
                                    'location_from'=>$cls_tb_allocation->get_location_from(),
                                    'location_id'=>$cls_tb_allocation->get_location_id(),
                                    'location_name'=>$cls_tb_allocation->get_location_name(),
                                    'location_address'=>$cls_tb_allocation->get_location_address(),
                                    'date_shipping'=>$cls_tb_allocation->get_date_shipping(),
                                    'order_item_id'=>$cls_tb_allocation->get_order_items_id(),
                                    'order_id'=>$cls_tb_allocation->get_order_id(),
                                    'quantity'=>$cls_tb_allocation->get_quantity()
                                );

                            }
                            $arr_where_clause = array('allocation_id'=> $v_where_allocation_id);

                            $v_total = $cls_tb_allocation->update_fields(array('shipper','tracking_number','tracking_url','date_shipping','ship_status','company_id','location_from'),
                                array($v_tracking_company,$v_tracking_number,$v_tracking_url,$v_date_ship, $v_ship_status, $v_company_id , $v_location_from ),
                                $arr_where_clause);

                            if($v_total){
                                if(isset($arr_tmp_allocation[$v_where_allocation_id])){

                                    $v_where_order_item = (int) $arr_tmp_allocation[$v_where_allocation_id]['order_item_id'];
                                    $v_where_location_id = (int) $arr_tmp_allocation[$v_where_allocation_id]['location_id'];
                                    $arr_item_where_clause = array('order_item_id'=>$v_where_order_item, 'allocation.location_id'=>$v_where_location_id);

                                    $arr_field =  array('allocation.$.tracking_company','allocation.$.tracking_number','allocation.$.tracking_url','allocation.$.date_shipping','allocation.$.shipping_status');
                                    $arr_values = array($v_tracking_company,$v_tracking_number,$v_tracking_url,$v_date_ship,$v_ship_status);
                                    $v_result = $cls_tb_order_items->update_fields($arr_field,$arr_values,$arr_item_where_clause);
                                }
                            }

                            $v_row = $cls_tb_shipping->select_one(array('tracking_number'=>$v_tracking_number));
                            if($v_row==1){ //tracking number has been in shipping
                                $v_mongo_id = $cls_tb_shipping->get_mongo_id();
                                $arr_shipping_detail = $cls_tb_shipping->get_shipping_detail();
                                $arr_temp = $arr_shipping_detail;
                                $arr_check_allocation = array();
                                for($j=0; $j<count($arr_temp); $j++){
                                    $arr_check_allocation[$arr_temp[$j]['allocation_id']] = 1;
                                }
                                if(!isset($arr_check_allocation[$v_where_allocation_id])){
                                    $arr = $arr_tmp_allocation[$v_where_allocation_id];
                                    $v_tmp_order_item_id = (int) $arr['order_item_id'];
                                    $v_index = count($arr_shipping_detail);
                                    $v_row = $cls_tb_order_items->select_one(array('order_item_id'=>$v_tmp_order_item_id));
                                    if($v_row==1){
                                        $arr_tmp_shipping_detail = array(
                                            'order_id'=>$arr['order_id']
                                            ,'order_item_id'=>$v_tmp_order_item_id
                                            ,'product_id'=>$cls_tb_order_items->get_product_id()
                                            ,'allocation_id'=>$v_where_allocation_id
                                            ,'product_code'=>$cls_tb_order_items->get_product_code()
                                            ,'width'=>$cls_tb_order_items->get_width()
                                            ,'height'=>$cls_tb_order_items->get_length()
                                            ,'unit'=>$cls_tb_order_items->get_unit()
                                            ,'quantity'=>$arr['quantity']
                                            ,'price'=>$cls_tb_order_items->get_current_price()
                                            ,'amount'=>$cls_tb_order_items->get_current_price()*$arr['quantity']
                                            ,'graphic_file'=>$cls_tb_order_items->get_graphic_file()
                                            ,'material_id'=>$cls_tb_order_items->get_material_id()
                                            ,'material_name'=>$cls_tb_order_items->get_material_name()
                                            ,'material_color'=>$cls_tb_order_items->get_material_color()
                                            ,'material_thickness_value'=>$cls_tb_order_items->get_material_thickness_value()
                                            ,'material_thickness_unit'=>$cls_tb_order_items->get_material_thickness_unit()
                                        );
                                        $arr_shipping_detail[$v_index] = $arr_tmp_shipping_detail;

                                        $v_result = $cls_tb_shipping->update_fields(array('shipping_detail', 'ship_status'), array($arr_shipping_detail, (int) $v_ship_status), array('_id'=>$v_mongo_id));
                                        if($v_result){
                                            $v_old_tracking_number = $arr['old_tracking'];
                                            $v_row = $cls_tb_shipping->select_one(array('tracking_number'=>$v_old_tracking_number));
                                            if($v_row==1){
                                                $arr_shipping_detail = $cls_tb_shipping->get_shipping_detail();
                                                $v_mongo_id = $cls_tb_shipping->get_mongo_id();
                                                $arr_temp = $arr_shipping_detail;
                                                for($j=0; $j<count($arr_temp); $j++){
                                                    if($v_where_allocation_id==$arr_temp[$j]['allocation_id']) unset($arr_shipping_detail[$j]);
                                                }
                                                $arr_temp = array();
                                                $v_count_shipping_detail = 0;
                                                foreach($arr_shipping_detail as $arr){
                                                    $arr_temp[] = $arr;
                                                    $v_count_shipping_detail++;
                                                }
                                                if($v_count_shipping_detail>0)
                                                    $cls_tb_shipping->update_field('shipping_detail', $arr_temp, array('_id'=>$v_mongo_id));
                                                else
                                                    $cls_tb_shipping->delete(array('_id'=>$v_mongo_id));
                                            }

                                        }
                                    }
                                }
                            }else{
                                if(isset($arr_tmp_allocation[$v_where_allocation_id])){
                                    $arr = $arr_tmp_allocation[$v_where_allocation_id];
                                    $v_order_item_id = $arr['order_item_id'];
                                    $v_row = $cls_tb_order_items->select_one(array('order_item_id'=>$v_order_item_id));
                                    if($v_row==1){
                                        $arr_shipping_detail[0] = array(
                                            'order_id'=>$arr['order_id']
                                            ,'order_item_id'=>$v_order_item_id
                                            ,'product_id'=>$cls_tb_order_items->get_product_id()
                                            ,'allocation_id'=>$v_where_allocation_id
                                            ,'product_code'=>$cls_tb_order_items->get_product_code()
                                            ,'width'=>$cls_tb_order_items->get_width()
                                            ,'height'=>$cls_tb_order_items->get_length()
                                            ,'unit'=>$cls_tb_order_items->get_unit()
                                            ,'quantity'=>$arr['quantity']
                                            ,'price'=>$cls_tb_order_items->get_current_price()
                                            ,'amount'=>$cls_tb_order_items->get_current_price()*$arr['quantity']
                                            ,'graphic_file'=>$cls_tb_order_items->get_graphic_file()
                                            ,'material_id'=>$cls_tb_order_items->get_material_id()
                                            ,'material_name'=>$cls_tb_order_items->get_material_name()
                                            ,'material_color'=>$cls_tb_order_items->get_material_color()
                                            ,'material_thickness_value'=>$cls_tb_order_items->get_material_thickness_value()
                                            ,'material_thickness_unit'=>$cls_tb_order_items->get_material_thickness_unit()
                                        );
                                        $arr_shipping = array(
                                            'shipping_id'=>$cls_tb_shipping->select_next('shipping_id')
                                            ,'shipper'=>$v_tracking_company
                                            ,'tracking_number'=>$v_tracking_number
                                            ,'tracking_url'=>$v_tracking_url
                                            ,'date_shipping'=>$v_date_ship
                                            ,'location_from'=>$v_location_from
                                            ,'company_id'=>$v_company_id
                                            ,'location_id'=>$v_location_id
                                            ,'location_name'=>$v_location_name
                                            ,'location_address'=>$v_location_address
                                            ,'create_by'=>$arr_user['user_name']
                                            ,'create_time'=>(new MongoDate(time()))
                                            ,'ship_status'=>$v_ship_status
                                            ,'shipping_detail'=>$arr_shipping_detail
                                        );
                                        $cls_tb_shipping->insert_array($arr_shipping);

                                    }
                                }
                            }
                            /* Add list email to send */
                            if(!isset($arr_allocation_mail[$v_location_id])){
                                $arr_allocation_mail[$v_location_id] = 1;
                                $arr_contact = $cls_tb_contact->select(array('location_id'=>(int)$v_location_id ));
                                foreach($arr_contact as $arr){
                                    $v_receive_email = isset($arr['receive_email_notification']) ? $arr['receive_email_notification'] : 0;
                                    $v_email = isset($arr['email']) ? $arr['email'] : '';
                                    $arr_to_mail[] = $v_email; //Add location is related when ship
                                }
                            }
                        }
                    }
                }

            } 
        }
    }
    if($v_check_insert_shipping==1) /*Ok*/
    {
        //Check ship all items for all locations or not
        $v_current_order_status = $cls_tb_order->select_scalar('status', array('order_id'=>$v_order_id));
        $arr_items = $cls_tb_order_items->select(array('order_id'=>$v_order_id));
        $v_stop = false;
        foreach($arr_items as $arr){
            $arr_tmp_allocation = $arr['allocation'];
            if(! $v_stop){
                for($i=0; $i<count($arr_tmp_allocation);$i++){
                    if(trim($arr_tmp_allocation[$i]['tracking_number'])==''){
                        $v_stop = true;
                    }
                }
            }
        }
        if($v_stop) $v_order_status = $cls_settings->get_option_id_by_key('order_status','partly_shipped');
        else $v_order_status = $cls_settings->get_option_id_by_key('order_status','fully_shipped');

        $cls_tb_order->update_field('status',$v_order_status,array('order_id'=>(int)$v_order_id));

        add_class('PHPMailer','class.phpmailer.php');
        add_class('Template','xtemplate.class.php');
        add_class('cls_tb_order_log');
        add_class('cls_tb_company');
        add_class('cls_tb_allocation');
        add_class('cls_tb_contact');
        add_class('cls_tb_user');
        $mail = new PHPMailer (true);
        $cls_tb_company = new cls_tb_company($db);
        $cls_tb_order_log = new cls_tb_order_log($db);
        $cls_tb_contact = new cls_tb_contact($db);
        $cls_tb_user = new cls_tb_user($db);
        /*Send email */
        $cls_tb_order->select_one(array('order_id'=>(int)$v_order_id));
        $v_po_number  = $cls_tb_order->get_po_number();
        $v_order_ref = $cls_tb_order->get_order_ref();
        $v_date_create = fdate(date('d-M-Y',$cls_tb_order->get_date_created()));
        $v_company_id = $cls_tb_order->get_company_id();

        $v_dir_templates = 'mail';
        $v_mail_subject = 'Info about order #'.$v_po_number . ' Oder Ref: '.$v_order_ref  ;
        $p_subject = 'Order Shipping!...';

        $v_sales_rep = $cls_tb_company->select_scalar('email_sales_rep',array('company_id'=>(int)$v_company_id));
	    
        $v_email_head_office = $cls_tb_company->select_scalar('email_head_office',array('company_id'=>(int)$v_company_id));
	    $arr_email_head_office = explode(";",$v_email_head_office);	    
	    for($i=0;$i<sizeof($arr_email_head_office);$i++){
	    	$arr_to_mail[] = $arr_email_head_office[$i];
	    } 

        $v_email_approver = $cls_tb_order_log->select_scalar('user_mail',array('order_id'=>(int)$v_order_id, 'order_status'=>(int)3));

        $v_user_create_order = $cls_tb_order->get_user_name();
        $v_contact_id  = $cls_tb_user->select_scalar('contact_id',array('user_name'=>$v_user_create_order));
        $v_user_create_order = $cls_tb_contact->get_full_name_contact($v_contact_id);
        $v_mail_create_order = $cls_tb_contact->select_scalar('email',array('contact_id'=>(int)$v_contact_id ));

        $v_mail_from = $cls_settings->get_option_name_by_key('email','email_orgin');
        $v_mail_production = $cls_settings->get_option_name_by_key('email','list_email_production');

        $v_email_body = '';
        $p_subject = 'Order Shipped ';
        $tpl_content = new Template('tpl_email_order_dispathed.tpl',$v_dir_templates);
        $tpl_content->set('URL',URL);
        $tpl_content->set('ORDER_ID',$v_order_id);
        $tpl_content->set('ORDER_PO',$v_po_number);
        $tpl_content->set('ORDER_REF',$v_order_ref);
        $tpl_content->set('ORDER_DATE',$v_date_create);
        $tpl_content->set('ORDER_USER_CREATE',$v_user_create_order);

        /* Create Shipping */
        $cls_tb_allocation = new cls_tb_allocation($db);
        $arr_where = array('order_id'=>(int)$v_order_id);
        $arr_allocation = $cls_tb_allocation->select($arr_where);

        $v_dsp_list_allocation = '<ul>';
        $v_inc = 1;
        foreach ($arr_allocation as $arr) {
            $v_location_name = isset($arr['location_name']) ?$arr['location_name'] :'';
            $v_shipper = isset($arr['shipper']) ?$arr['shipper'] :'';
            $v_tracking_number = isset($arr['tracking_number']) ?$arr['tracking_number'] :'';
            $v_tracking_url = isset($arr['tracking_url']) ?$arr['tracking_url'] :'';
            $v_date_shipping = isset($arr['date_shipping']) ?$arr['date_shipping'] :'';

            if($v_tracking_url != '' && $v_tracking_number != '' && $v_shipper!='' )
                $v_dsp_list_allocation .= '<li><a href="'.$v_tracking_url .'">   Location name:'.$v_location_name. ' - Shipper:'. $v_shipper . ' Date-shipping:' . fdate(date('d-M-Y',$v_date_shipping->sec)).' </a></li>';
        }
        $v_dsp_list_allocation .= '<ul>';
        $tpl_content->set('LINK_TRACKING',$v_dsp_list_allocation);
        $v_email_body = $tpl_content->output();

        /* list mail */
        $arr_to_mail[]= $v_sales_rep;
        $arr_to_mail[]= $v_mail_create_order;
        $arr_to_mail[]= $v_email_approver;

        $arr_mail_product = explode(';',$v_mail_production);
        for($i=0;$i<sizeof($arr_mail_product);$i++)
            $arr_to_mail[] = $arr_mail_product[$i];


        $v_result_mail = send_mail($mail,'Anvy Website Worktraq',$v_mail_from,$arr_to_mail,$v_mail_subject,$v_email_body);

        /* Upload order log */
        $v_log_action = "Shipping to location ";
        $v_log_desc = "The order is allocation for location ";
        $cls_tb_order_log->save_log($cls_tb_order, $arr_user['user_name'],$v_log_action, 0,$v_log_desc, $v_is_mail, $v_mail_send, $arr_user['user_email']);
    }
    /* Change status order and send email */
    //redir(URL.$v_admin_key.'/'.$v_order_id.'/shipping');
}

$arr_list_location = explode(',',$v_list_location);
$arr_tmp_location = array();
$v_total_order_shipping = sizeof($arr_list_location);
$arr_where = array();

for($i=0;$i<$v_total_order_shipping;$i++)
    $arr_where[$i] = array("allocation_id"=>(int) $arr_list_location[$i]);

$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_allocation->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_where_clause = array('$or'=>$arr_where);
$arr_tb_allocation = $cls_tb_allocation->select_limit($v_offset,$v_num_row,$arr_where_clause,array('location_name'=>1));

$v_dsp_tb_allocation = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_tb_allocation .= '<tr align="center" valign="middle">';
$v_dsp_tb_allocation .= '<th>Ord</th>';
$v_dsp_tb_allocation .= '<th>Location Address</th>';
$v_dsp_tb_allocation .= '<th>Quantity</th>';
$v_dsp_tb_allocation .= '<th>Shipper</th>';
$v_dsp_tb_allocation .= '<th>Tracking Number</th>';
$v_dsp_tb_allocation .= '<th>Ship Status</th>';
$v_dsp_tb_allocation .= '<th>Traking URL</th>';
$v_dsp_tb_allocation .= '<th>Date Shipping</th>';
$v_dsp_tb_allocation .= '</tr>';
$v_count = 1;
$v_count_location = 0;
// ;
$v_temp_location_id = 0;
$v_save_order_id = 0;
foreach($arr_tb_allocation as $arr){
    $v_mongo_id = $cls_tb_allocation->get_mongo_id();
    $v_allocation_id = isset($arr['allocation_id'])?$arr['allocation_id']:0;
    $v_order_items_id = isset($arr['order_items_id'])?$arr['order_items_id']:0;
    $v_order_id = isset($arr['order_id'])?$arr['order_id']:0;
    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
    $v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
    $v_location_address = isset($arr['location_address'])?$arr['location_address']:'';
    $v_quantity = isset($arr['quantity'])?$arr['quantity']:1;
    $v_tmp_shipper = isset($arr['shipper'])?$arr['shipper']:'';
    $v_tmp_tracking_number = isset($arr['tracking_number'])?$arr['tracking_number']:'';
    $v_shipping_url = isset($arr['tracking_url'])?$arr['tracking_url']:'';
    $v_ship_status = isset($arr['ship_status'])?$arr['ship_status']:0;
    $v_date_shipping = isset($arr['date_shipping'])?date('d-M-Y H:i:s',$arr['date_shipping']->sec):'';
    $v_location_from = isset($arr['location_from'])?$arr['location_from']:'';
    $v_company_id = isset($arr['company_id'])?$arr['company_id']:'0';

    /*haiht EDIT */
    $v_save_order_id = $v_order_id;
    $v_tmp_date_shipping = isset($arr['date_shipping'])?$arr['date_shipping']:NULL;
    if(is_null($v_tmp_date_shipping))
        $v_tmp_date_shipping = date('M-d-Y', time());
    else
        $v_tmp_date_shipping = date('M-d-Y', $v_tmp_date_shipping->sec);
    if(!isset($arr_tmp_location[$v_location_id]))
        $arr_tmp_location[$v_location_id] = array('location_id'=>$v_location_id,
            'location_name'=>$v_location_name,
            'location_address'=>$v_location_address,
            'allocation_id'=>$v_allocation_id,
            'date_shipping'=>$v_tmp_date_shipping,
            'ship_status'=>$v_ship_status,
            'tracking_company'=>$v_tmp_shipper,
            'tracking_number'=>$v_tmp_tracking_number,
            'tracking_url'=>$v_shipping_url
            ,'location_from'=>$v_location_from
            ,'company_id'=>$v_company_id
        );
    else
        $arr_tmp_location[$v_location_id]['allocation_id'] .= ','.$v_allocation_id;
    /*haiht END Edit */

    $v_url = '';
    if($v_shipping_url!='') $v_url='<a href="'.$v_shipping_url .'"> Checking Allocation </a>';
    if($v_tmp_shipper=='' || $v_tmp_tracking_number=='') $v_date_shipping ='';

    $v_dsp_tb_allocation .= '<tr align="left" valign="middle" >';
    $v_dsp_tb_allocation .= '<td align="right" >'.($v_count++).'</td>';
    $v_dsp_tb_allocation .= '<td >'.$v_location_address.'</td>';
    $v_dsp_tb_allocation .= '<td >'.$v_quantity.'</td>';
    $v_dsp_tb_allocation .= '<td >'.$v_tmp_shipper.'</td>';
    $v_dsp_tb_allocation .= '<td >'.$v_tmp_tracking_number.'</td>';
    $v_dsp_tb_allocation .= '<td >'.$cls_tb_settings->get_option_name_by_id('ship_status',$v_ship_status) .'</td>';
    $v_dsp_tb_allocation .= '<td >'.$v_url.'</td>';
    $v_dsp_tb_allocation .= '<td >'.$v_date_shipping.'</td>';

    $v_dsp_tb_allocation .= '</tr>';
}
$v_dsp_tb_allocation .= '</table>';
if($v_save_order_id>0) $v_company_id = $cls_tb_order->select_scalar('company_id', array('order_id'=>$v_save_order_id));

?>