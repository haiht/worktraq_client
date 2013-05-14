<?php if (!isset($v_sval)) die(); ?>
<?php
$v_list_allocation = isset($_REQUEST['txt_list_allocation'])?$_REQUEST['txt_list_allocation']:'';
$v_tmp_list_allocation = $v_list_allocation;
if($v_list_allocation=='' || !isset($v_order_id) || (isset($v_order_id) && $v_order_id==0)) redir($_SERVER['HTTP_REFERER']);

$v_error_message = '';
$arr_allocation_mail = array();
$v_location_from = isset($_POST['txt_location_from'])?$_POST['txt_location_from']:0;
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:0;
$arr_to_mail = array();
$v_is_mail = 0;
$v_mail_send = 0;

settype($v_company_id, 'int');
settype($v_location_from, 'int');
settype($v_order_id, 'int');

if(isset($_POST['btn_submit_tb_create_dispatch'])){
    $arr_tmp_allocation = array();
    $arr_shipping = array();

    $v_order_status = $cls_tb_order->select_scalar('status',array('order_id'=>(int)$v_order_id));
    $v_check_insert_shipping  = false;
    $v_check_fully_ship = true;

    $v_data_allocation = isset($_POST['txt_data_allocation'])?$_POST['txt_data_allocation']:'';
    if(get_magic_quotes_gpc()) $v_data_allocation = stripcslashes($v_data_allocation);
    $arr_data_allocation = json_decode($v_data_allocation, true);
    if(!is_array($arr_data_allocation)) $arr_data_allocation = array();
    for($i=0; $i<count($arr_data_allocation); $i++){
        $v_accept = true;
        $v_tracking_company = isset($arr_data_allocation[$i]['tracking_company'])?$arr_data_allocation[$i]['tracking_company']:'';
        $v_tracking_number = isset($arr_data_allocation[$i]['tracking_number'])?$arr_data_allocation[$i]['tracking_number']:'';
        $v_tracking_url = isset($arr_data_allocation[$i]['tracking_url'])?$arr_data_allocation[$i]['tracking_url']:'';
        $v_date_shipping = isset($arr_data_allocation[$i]['date_shipping'])?$arr_data_allocation[$i]['date_shipping']:'';
        $v_ship_status = isset($arr_data_allocation[$i]['ship_status'])?$arr_data_allocation[$i]['ship_status']:0;
        settype($v_ship_status, 'int');
        $arr_allocation = isset($arr_data_allocation[$i]['allocation'])?$arr_data_allocation[$i]['allocation']:array();
        $v_accept &= $v_tracking_company!='';
        $v_accept &= $v_tracking_number!='';
        $v_accept &= is_valid_url($v_tracking_url)!==false;
        $v_accept &= check_date($v_date_shipping);
        $v_accept &= is_array($arr_allocation) && count($arr_allocation)>0;
        $v_accept &= $v_ship_status>=0;
        if(! $v_accept) continue;
        for($j=0; $j<count($arr_allocation); $j++){
            $v_allocation_id = (int) $arr_allocation[$j]['allocation'];
            $v_current_shipped_quantity = (int) $arr_allocation[$j]['quantity'];
            if($v_allocation_id<=0 && $v_current_shipped_quantity<=0) continue;
            $v_row = $cls_tb_allocation->select_one(array('allocation_id'=>$v_allocation_id));
            if($v_row==1){
                $v_quantity = $cls_tb_allocation->get_quantity();
                $v_shipped_quantity = $cls_tb_allocation->get_shipped_quantity();
                $v_order_id = $cls_tb_allocation->get_order_id();
                $v_order_items_id = $cls_tb_allocation->get_order_items_id();
                $v_location_id = $cls_tb_allocation->get_location_id();
                $v_location_address = $cls_tb_allocation->get_location_address();
                $v_location_from = $cls_tb_allocation->get_location_from();
                $v_location_name = $cls_tb_allocation->get_location_name();
                $v_product_id = $cls_tb_allocation->get_product_id();
                $v_product_name = $cls_tb_allocation->get_product_name();
                $v_parent_allocation = $cls_tb_allocation->get_parent_allocation();
                $v_shipping_id = $cls_tb_allocation->get_shipping_id();



                $v_check_insert_shipping = true;
                $v_new_allocation_id = 0;
                if($v_current_shipped_quantity>$v_quantity) $v_current_shipped_quantity = $v_quantity;
                if($v_current_shipped_quantity>0){
                    $v_not_ship_quantity = $v_quantity - $v_current_shipped_quantity;
                    if($v_not_ship_quantity>0){
                        $v_new_allocation_id = $cls_tb_allocation->select_next('allocation_id');

                        $cls_tb_allocation->set_allocation_id($v_new_allocation_id);
                        $cls_tb_allocation->set_order_id($v_order_id);
                        $cls_tb_allocation->set_order_items_id($v_order_items_id);
                        $cls_tb_allocation->set_location_id($v_location_id);
                        $cls_tb_allocation->set_location_name($v_location_name);
                        $cls_tb_allocation->set_location_address($v_location_address);
                        $cls_tb_allocation->set_location_from($v_location_from);
                        $cls_tb_allocation->set_shipped_quantity(0);
                        $cls_tb_allocation->set_quantity($v_not_ship_quantity);
                        $cls_tb_allocation->set_parent_allocation($v_parent_allocation>0?$v_parent_allocation:$v_allocation_id);
                        $cls_tb_allocation->set_tracking_number('');
                        $cls_tb_allocation->set_tracking_url('');
                        $cls_tb_allocation->set_shipper('');
                        $cls_tb_allocation->set_create_by(isset($arr_user['user_name'])?$arr_user['user_name']:'');
                        $cls_tb_allocation->set_create_time(date('Y-m-d H:i:s'));
                        $cls_tb_allocation->set_date_shipping(NULL);
                        $cls_tb_allocation->set_ship_status(0);
                        $cls_tb_allocation->set_ship_complete(0);
                        $cls_tb_allocation->set_shipping_id(0);
                        $v_check_insert_shipping = $cls_tb_allocation->insert();
                        $v_check_fully_ship = false;
                    }
                }
                if($v_check_insert_shipping){
                    $arr_fields = array('tracking_url', 'tracking_number', 'shipper', 'create_by', 'create_time', 'quantity', 'shipped_quantity', 'ship_status', 'ship_complete', 'date_shipping');
                    $arr_values = array($v_tracking_url, $v_tracking_number, $v_tracking_company, isset($arr_user['user_name'])?$arr_user['user_name']:'', new MongoDate(time()), $v_current_shipped_quantity, $v_current_shipped_quantity, $v_ship_status, 1, new MongoDate(strtotime($v_date_shipping)));
                    $v_check_insert_shipping = $cls_tb_allocation->update_fields($arr_fields, $arr_values, array('allocation_id'=>$v_allocation_id));

                    //$arr_item_allocation = $cls_tb_order_items->select_scalar('allocation', array('order_item_id'=>$v_order_items_id));
                    $v_order_item_row = $cls_tb_order_items->select_one( array('order_item_id'=>$v_order_items_id));
                    if($v_order_item_row==1){
                        $v_change = false;
                        $arr_item_allocation = $cls_tb_order_items->get_allocation();
                        if(is_array($arr_item_allocation)){
                            for($k=0; $k<count($arr_item_allocation);$k++){
                                if($arr_item_allocation[$k]['location_id']==$v_location_id){
                                    $arr_item_allocation[$k]['allocation_id'] = $v_parent_allocation>0?$v_parent_allocation:$v_allocation_id;
                                    //Temporary for other info

                                    $arr_item_allocation[$k]['tracking_url'] = $v_tracking_url;
                                    $arr_item_allocation[$k]['tracking_company'] = $v_tracking_company;
                                    $arr_item_allocation[$k]['tracking_number'] = $v_tracking_number;
                                    $arr_item_allocation[$k]['date_shipping'] = new MongoDate(strtotime($v_date_shipping));
                                    $arr_item_allocation[$k]['shipping_status'] = $v_ship_status;
                                    $v_change = true;
                                }
                            }
                        }
                        if($v_change){
                            $cls_tb_order_items->update_field('allocation', $arr_item_allocation, array('order_item_id'=>$v_order_items_id));
                        }

                        $v_mixed = md5($v_tracking_url.$v_tracking_number);

                        $arr_shipping_detail = array();
                        $arr_tmp_shipping_detail = array(
                            'order_id'=>$v_order_id
                            ,'order_item_id'=>$v_order_item_id
                            ,'product_id'=>$cls_tb_order_items->get_product_id()
                            ,'allocation_id'=>$v_allocation_id
                            ,'product_code'=>$cls_tb_order_items->get_product_code()
                            ,'width'=>$cls_tb_order_items->get_width()
                            ,'height'=>$cls_tb_order_items->get_length()
                            ,'unit'=>$cls_tb_order_items->get_unit()
                            ,'quantity'=>$v_current_shipped_quantity
                            ,'price'=>$cls_tb_order_items->get_current_price()
                            ,'amount'=>$cls_tb_order_items->get_current_price()*$v_current_shipped_quantity
                            ,'graphic_file'=>$cls_tb_order_items->get_graphic_file()
                            ,'material_id'=>$cls_tb_order_items->get_material_id()
                            ,'material_name'=>$cls_tb_order_items->get_material_name()
                            ,'material_color'=>$cls_tb_order_items->get_material_color()
                            ,'material_thickness_value'=>$cls_tb_order_items->get_material_thickness_value()
                            ,'material_thickness_unit'=>$cls_tb_order_items->get_material_thickness_unit()
                        );

                        if(!isset($arr_tmp_allocation[$v_mixed])){
                            $arr_shipping_detail[] = $arr_tmp_shipping_detail;
                            $arr_tmp_allocation[$v_mixed] = array(
                                'shipping_id'=>$v_shipping_id
                                ,'shipper'=>$v_tracking_company
                                ,'tracking_number'=>$v_tracking_number
                                ,'tracking_url'=>$v_tracking_url
                                ,'date_shipping'=>new MongoDate(strtotime($v_date_shipping))
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
                        }else{
                            $arr_shipping_detail = $arr_tmp_allocation[$v_mixed]['shipping_detail'];
                            $arr_shipping_detail[] = $arr_tmp_shipping_detail;
                            $arr_tmp_allocation[$v_mixed]['shipping_detail'] = $arr_shipping_detail;
                        }
                    }
                }
            }
        }

    }

    foreach($arr_tmp_allocation as $arr){
        $v_tracking_number = $arr['tracking_number'];
        $v_tracking_url = $arr['tracking_url'];
        $v_row = $cls_tb_shipping->select_one(array('tracking_url'=>$v_tracking_url, 'tracking_number'=>$v_tracking_number));
        $arr_allocation_id = array();
        $arr_shipping_detail = $arr['shipping_detail'];
        if($v_row==1){
            $v_shipping_id = $cls_tb_shipping->get_shipping_id();
            $arr_tmp_shipping_detail = $cls_tb_shipping->get_shipping_detail();
            for($i=0; $i<count($arr_shipping_detail);$i++){
                $arr_allocation_id[] = $arr_shipping_detail[$i]['allocation_id'];
                $arr_tmp_shipping_detail[] = $arr_shipping_detail[$i];
            }
            $cls_tb_shipping->update_field('shipping_detail', $arr_tmp_shipping_detail, array('shipping_id'=>$v_shipping_id));
        }else{
            $v_shipping_id = $cls_tb_shipping->select_next('shipping_id');
            $arr['shipping_id'] = $v_shipping_id;
            for($i=0; $i<count($arr_shipping_detail);$i++){
                $arr_allocation_id[] = $arr_shipping_detail[$i]['allocation_id'];
            }
            $cls_tb_shipping->insert_array($arr);
        }
        $cls_tb_allocation->update_field('shipping_id', $v_shipping_id, array('allocation'=>array('$in'=>$arr_allocation_id)));
    }


    if($v_check_insert_shipping) /*Ok*/
    {
        //Check ship all items for all locations or not
        $v_current_order_status = $cls_tb_order->select_scalar('status', array('order_id'=>$v_order_id));
        $arr_items = $cls_tb_order_items->select(array('order_id'=>$v_order_id));
        $v_stop = !$v_check_fully_ship;
        if(!$v_stop){
            foreach($arr_items as $arr){
                $arr_tmp_allocation = $arr['allocation'];
                if(! $v_stop){
                    for($i=0; $i<count($arr_tmp_allocation);$i++){
                        if(!isset($arr_tmp_allocation[$i]['allocation_id']) || $arr_tmp_allocation[$i]['allocation_id']==0){
                            $v_stop = true;
                        }
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
        $cls_tb_order_log->save_log($cls_tb_order, isset($arr_user['user_name'])?$arr_user['user_name']:'',$v_log_action, 0,$v_log_desc, $v_is_mail, $v_mail_send, $arr_user['user_email']);
    }
    /* Change status order and send email */
    redir(URL.$v_admin_key.'/'.$v_order_id.'/shipping');
}



//Load tracking company
$arr_all_tracking = array();

$arr_all_tracking[] = array(
    'tracking_id'=>'',
    'tracking_name'=>'--------',
    'tracking_url'=>'',
    'website'=>'',
    'phone'=>'',
    'email'=>''
);

$arr_exist_tracking = array();
$arr_tracking = $cls_tb_tracking->select(array('status'=>0));
foreach($arr_tracking as $arr){
    $v_tmp_tracking_id = $arr['tracking_id'];
    $v_tmp_tracking_name = $arr['tracking_name'];
    $v_tmp_tracking_url = $arr['tracking_url'];
    if(!isset($arr_exist_tracking[$v_tmp_tracking_name])) $arr_exist_tracking[$v_tmp_tracking_name] = $v_tmp_tracking_id;
    $v_phone = $arr['phone'];
    $v_email = $arr['email'];
    $v_website = $arr['website'];
    if(!is_valid_url($v_tmp_tracking_url)) $v_tmp_tracking_url = $v_website;
    $arr_all_tracking[] = array(
        'tracking_id'=>$v_tmp_tracking_id,
        'tracking_name'=>$v_tmp_tracking_name,
        'tracking_url'=>$v_tmp_tracking_url,
        'website'=>$v_website,
        'phone'=>$v_phone,
        'email'=>$v_email
    );
}
//End load



$arr_list_allocation = explode(',',$v_list_allocation);
$arr_tmp_location = array();
$v_total_order_shipping = sizeof($arr_list_allocation);
$arr_where = array();
for($i=0;$i<$v_total_order_shipping;$i++)
    $arr_where[] = (int) $arr_list_allocation[$i];

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
//$arr_where_clause = array('$or'=>$arr_where);
$arr_where_clause = array('allocation_id'=>array('$in'=>$arr_where), '$or'=>array(array('shipped_quantity'=>NULL), array('$where'=>'this.quantity>this.shipped_quantity')));
$arr_tb_allocation = $cls_tb_allocation->select_limit($v_offset,$v_num_row,$arr_where_clause,array('location_name'=>1));

$v_count = 1;
$v_count_location = 0;
// ;
$v_temp_location_id = 0;
$v_save_order_id = 0;

$arr_grid_data = array();
foreach($arr_tb_allocation as $arr){
    $v_mongo_id = $cls_tb_allocation->get_mongo_id();
    $v_allocation_id = isset($arr['allocation_id'])?$arr['allocation_id']:0;
    $v_order_items_id = isset($arr['order_items_id'])?$arr['order_items_id']:0;
    $v_order_id = isset($arr['order_id'])?$arr['order_id']:0;
    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
    $v_product_id = isset($arr['product_id'])?$arr['product_id']:0;
    $v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
    $v_product_name = isset($arr['product_name'])?$arr['product_name']:'';
    $v_location_address = isset($arr['location_address'])?$arr['location_address']:'';
    $v_quantity = isset($arr['quantity'])?$arr['quantity']:0;
    $v_shipped_quantity = isset($arr['shipped_quantity'])?$arr['shipped_quantity']:0;
    $v_tmp_shipper = isset($arr['shipper'])?$arr['shipper']:'';
    $v_tmp_tracking_number = isset($arr['tracking_number'])?$arr['tracking_number']:'';
    $v_shipping_url = isset($arr['tracking_url'])?$arr['tracking_url']:'';
    $v_ship_status = isset($arr['ship_status'])?$arr['ship_status']:0;
    $v_date_shipping = isset($arr['date_shipping'])?date('d-M-Y H:i:s',$arr['date_shipping']->sec):'';
    $v_location_from = isset($arr['location_from'])?$arr['location_from']:'';
    $v_company_id = isset($arr['company_id'])?$arr['company_id']:'0';

    $v_tmp_tracking_id = isset($arr_exist_tracking[$v_tmp_shipper])?$arr_exist_tracking[$v_tmp_shipper]:0;
    /*haiht EDIT */
    $v_save_order_id = $v_order_id;
    $v_tmp_date_shipping = isset($arr['date_shipping'])?$arr['date_shipping']:NULL;
    if(is_null($v_tmp_date_shipping))
        $v_tmp_date_shipping = date('M-d-Y', time());
    else
        $v_tmp_date_shipping = date('M-d-Y', $v_tmp_date_shipping->sec);
    if(!isset($arr_tmp_location[$v_location_id])){
        $arr_product = array();
        $arr_product[] = array('product_id'=>$v_product_id, 'product_name'=>$v_product_name, 'quantity'=>$v_quantity, 'shipped_quantity'=>$v_shipped_quantity, 'allocation'=>$v_allocation_id);
        $arr_tmp_location[$v_location_id] = array(
            'location_id'=>$v_location_id,
            'location_name'=>$v_location_name,
            'location_address'=>$v_location_address,
            'allocation_id'=>$v_allocation_id,
            'date_shipping'=>$v_tmp_date_shipping,
            'ship_status'=>$v_ship_status,
            'tracking_company'=>$v_tmp_shipper,
            'tracking_id'=>$v_tmp_tracking_id,
            'tracking_number'=>$v_tmp_tracking_number,
            'tracking_url'=>$v_shipping_url
            ,'location_from'=>$v_location_from
            ,'company_id'=>$v_company_id
            ,'product'=>$arr_product
        );
    }else{
        $arr_product = $arr_tmp_location[$v_location_id]['product'];
        $arr_product[] = array('product_id'=>$v_product_id, 'product_name'=>$v_product_name, 'quantity'=>$v_quantity, 'shipped_quantity'=>$v_shipped_quantity, 'allocation'=>$v_allocation_id);
        $arr_tmp_location[$v_location_id]['allocation_id'] .= ','.$v_allocation_id;
        $arr_tmp_location[$v_location_id]['product'] = $arr_product;
    }
    /*haiht END Edit */

    $v_url = '';
    if($v_shipping_url!='') $v_url='<a class="a-link" href="'.$v_shipping_url .'"> Checking Allocation </a>';
    if($v_tmp_shipper=='' || $v_tmp_tracking_number=='') $v_date_shipping ='';


    $arr_grid_data[] = array(
        'row_order'=>$v_count
        ,'location_name'=>$v_location_name
        ,'product_name'=>$v_product_name
        ,'location_address'=>$v_location_address
        ,'quantity'=>$v_quantity - $v_shipped_quantity
        ,'shipper'=>$v_tmp_shipper
        ,'tracking_number'=>$v_tmp_tracking_number
        ,'tracking_url'=>$v_url
        ,'ship_status'=>$cls_settings->get_option_name_by_id('ship_status',$v_ship_status)
        ,'date_shipping'=>$v_date_shipping
    );
    $v_count++;
}

if($v_save_order_id>0) $v_company_id = $cls_tb_order->select_scalar('company_id', array('order_id'=>$v_save_order_id));

?>