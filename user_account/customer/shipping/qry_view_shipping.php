<?php if (!isset($v_sval)) die();  ?>
<?php
$style ='';
$v_order_id = isset($_GET['txt_order'])?$_GET['txt_order']:'0';
settype($v_order_id, 'int');
if($v_order_id<=0) $v_order_id = isset($_SESSION['order_id'])?$_SESSION['order_id']:'0';
settype($v_order_id, 'int');
if($v_order_id<=0) redir(URL.'order/');
$style='';
add_class('cls_tb_order');
add_class('cls_tb_user');
$cls_tb_order = new cls_tb_order($db);
$v_row = $cls_tb_order->select_one(array('order_id'=>$v_order_id, 'company_id'=>$v_company_id));
$v_count_record=1;
$v_order_full_notes  = '';
$v_order_flag = 0;
if(!isset($v_view_order_only)) $v_view_order_only = 0;
$v_been_allocated = 0;
$v_been_threshold = 0;
$v_shipping=$v_link_tracking=$v_location_address=$v_location_name=$v_tracking='';
$tpl_order = new Template('dsp_order_list.tpl', $v_dir_templates);
if(isset($cls_tb_threshold)==false){
    add_class('cls_tb_location_threshold');
    $cls_tb_threshold = new cls_tb_location_threshold($db, LOG_DIR);
}
if(isset($cls_tb_product)==false){
    add_class('cls_tb_product');
    $cls_tb_product = new cls_tb_product($db, LOG_DIR);
}
$arr_product_threshold = array();
$arr_all_material = array();
$v_error_approve = '';
$v_all_price=0;
if($v_row==1){
    $_SESSION['order_id'] = $v_order_id;
    $v_po_number = $cls_tb_order->get_po_number();
    $v_order_description = $cls_tb_order->get_description();
    $v_date_required = $cls_tb_order->get_date_required();
    $v_order_status = $cls_tb_order->get_status();
    $v_order_notes = $cls_tb_order->get_notes();
    $v_order_ref = $cls_tb_order->get_order_ref();
    $v_date_created = $cls_tb_order->get_date_created();
    $v_user_name = $cls_tb_order->get_user_name();
    $v_status = $cls_tb_order->get_status();
    $v_order_status_message = $cls_settings->get_option_name_by_id('order_status', $v_order_status);
    $v_order_location = $cls_tb_order->get_location_id();
    $v_order_user_name = $v_user_name;
    if($v_status<20){
        //if(!isset($v_view_order_only))
        //    $cls_tb_order->update_field('status',1, array('order_id'=>$v_order_id));
    }else{
        $v_view_order_only = 1;
    }
    $cls_tb_user = new cls_tb_user($db, LOG_DIR);
    $v_order_contact_id = $cls_tb_user->select_scalar('contact_id', array('user_name'=>$v_user_name));
    if($v_order_contact_id >0){
        $cls_tb_contact = new cls_tb_contact($db, LOG_DIR);
        $v_row = $cls_tb_contact->select_one(array('contact_id'=>$v_order_contact_id));
        if($v_row==1)
            $v_user_name = $cls_tb_contact->get_first_name(). ", " . $cls_tb_contact->get_last_name() .  $cls_tb_contact->get_middle_name();
    }
    if(isset($v_view_order_only) && $v_view_order_only==1 && $v_order_status<20) $v_order = 'VIEW';
    $arr_tmp_allocation = array();
    $arr_tpl_order_items = array();
    add_class('cls_tb_order_items');
    $cls_tb_order_items = new cls_tb_order_items($db);
    $arr_order_items = $cls_tb_order_items->select_limit(0, 1000, array('order_id'=>$v_order_id));

    foreach($arr_order_items as $arr){
        $v_order_item_id = $arr['order_item_id'];
        $v_product_id = $arr['product_id'];
        $v_product_code = $arr['product_code'];
        $v_product_description = isset($arr['product_description'])?$arr['product_description']:'';
        $v_product_quantity = $arr['quantity'];
        $v_width = $arr['width'];
        $v_length = $arr['length'];
        $v_unit = $arr['unit'];
        $v_package_type = isset($arr['package_type'])?$arr['package_type']:0;
        $v_graphic_file = $arr['graphic_file'];
        $v_graphic_id = $arr['graphic_id'];
        $v_current_price = $arr['current_price'];
        $v_material_id = $arr['material_id'];
        $v_material_name = $arr['material_name'];
        $v_material_thickness_value = $arr['material_thickness_value'];
        $v_material_thickness_unit = $arr['material_thickness_unit'];
        $v_material_color = $arr['material_color'];
        $v_item_status = $arr['status'];
        $v_item_desc = $arr['description'];
        $arr_allocation = $arr['allocation'];
        if($v_item_status==1) $v_been_allocated = 1;
        if($v_item_status==1){
            $v_error_approve.='*Product: '.$v_product_code.' has not been allocated.';
        }
        $v_image_url = URL .'/'.$v_graphic_file ;
        $tpl_order_items = new Template('dsp_order_items_all.tpl',$v_dir_templates);
        $v_class_table_name = $v_count_record%2==0?'td_3':'td_2';
        $v_count_record++;
        $tpl_order_items->set('TABLE_CLASS',$v_class_table_name);
        $tpl_order_items->set('PRODUCT_ID',$v_product_id);
        $tpl_order_items->set('ORDER_ID',isset($v_order_id)?$v_order_id:0);
        $tpl_order_items->set('ORDER_ITEM_ID',isset($v_order_item_id)?$v_order_item_id:0);
        if($v_package_type<=1) {
            $v_product_material = $v_product_code .' - '.$v_product_description.' - ';
            if ($v_material_name != '') {
                $v_product_material .= $v_material_name;
            }
            $v_product_material .= ' - ('.$v_width.' &times; '.$v_length.' '.$v_unit.') ';
            if ($v_material_thickness_value != 0) {
                $v_product_material .= ' - ' .$v_material_thickness_value.' '.$v_material_thickness_unit;
            }
            if ($v_material_color != 'None') {
                $v_product_material .= ' - ' .$v_material_color;
            }
        }
        else
            $v_product_material = $v_product_code .' - '. $v_product_description.' - '.'( '.$cls_settings->get_option_name_by_id('package_type', $v_package_type).')';
        if($v_item_status==1){
            $v_order_flag = 1;
        }
        $tpl_order_items->set('PRODUCT_MATERIAL',$v_product_material);
        $tpl_order_items->set('PRODUCT_IMAGE',$v_image_url);
        $tpl_order_items->set('GRAPHIC_ID',$v_graphic_id);
        $tpl_order_items->set('PRODUCT_QUANTITY', $v_product_quantity);
        $tpl_order_items->set('PRODUCT_PRICE', $v_user_rule_hide_price_all?NO_PRICE:format_currency($v_current_price));
        $tpl_order_items->set('PRODUCT_AMOUNT', $v_user_rule_hide_price_all?NO_PRICE:format_currency($v_current_price*$v_product_quantity));
        $tpl_order_items->set('SELECT_DISABLED', 'disabled="disabled"');
        $arr_tpl_order_items[] = $tpl_order_items;
        foreach($arr_allocation as $arr_loc){
            $v_location_id = $arr_loc['location_id'];
            $v_location_name = $arr_loc['location_name'];
            $v_location_address = $arr_loc['location_address'];
            $v_location_quantity = $arr_loc['location_quantity'];
            $v_location_price = $arr_loc['location_price'];
            $v_location_product_id = $arr_loc['product_id'];
            $v_location_product_name = $arr_loc['product_name'];
            $v_location_product_image = $arr_loc['product_image'];
            $v_location_tracking_number = $arr_loc['tracking_number'];
            $v_location_tracking_company = $arr_loc['tracking_company'];
            $v_location_tracking_url = $arr_loc['tracking_url'];
            $v_date_shipping = $arr_loc['date_shipping'];
            $arr_loc['product_name'] = $v_product_material;
            if($v_item_status==0){
                if(!isset($arr_product_threshold[$v_location_product_id])) $arr_product_threshold[$v_location_product_id] = $cls_tb_product->select_scalar('product_threshold', array('product_id'=>$v_location_product_id));
                $v_location_threshold = isset($arr_loc['threshold'])?$arr_loc['threshold']:$cls_tb_threshold->check_product_threshold($v_location_product_id, $v_location_id, $v_location_quantity, $arr_product_threshold[$v_location_product_id]);
                $v_threshold = strlen($v_location_threshold)>1?substr($v_location_threshold,0,1):'y';
                $v_location_threshold = str_replace($v_threshold.':','',$v_location_threshold);
                settype($v_location_threshold, 'int');
                if($v_threshold=='a'){
                    if($v_been_threshold==0) $v_been_threshold = 1;
                    $arr_loc['product_name'] = $v_product_material;//.'<br />[<span style="text-decoration:blink; color:red; font-weight: bold">Required approved for location\'s threshold (current: '.$v_location_quantity.' - threshold: '.$v_location_threshold.')</span>]';
                    $v_error_approve .= '*Product: '.$v_product_code.' for location: '.$v_location_name.' (current: '.$v_location_quantity.') is greater than threshold value ('.$v_location_threshold.')';
                }else if($v_threshold=='n'){
                    if($v_been_threshold<=1) $v_been_threshold = 2;
                    $arr_loc['product_name'] = $v_product_material;//.'<br />[<span style="text-decoration:blink; color:red; font-weight: bold">Couldn\'t submitted for location\'s threshold (current: '.$v_location_quantity.' - threshold: '.$v_location_threshold.')</span>]';
                    $v_error_approve .= '*Product: '.$v_product_code.' for location: '.$v_location_name.' (current: '.$v_location_quantity.') is greater than threshold value ('.$v_location_threshold.')';
                }
            }
            $arr_loc['delete'] = 0;
            if(!isset($arr_tmp_allocation[$v_location_id])){
                $arr_tmp_allocation[$v_location_id][0] = $arr_loc;
            }else{
                $v_count = count($arr_tmp_allocation[$v_location_id]);
                $arr_tmp_allocation[$v_location_id][$v_count] = $arr_loc;
            }
        }
    }
    $v_dsp_order_details = Template::merge($arr_tpl_order_items);
    $v_allocation_total_amount = 0;
    if(count($arr_tmp_allocation)<=0)
    {
        $tpl_order_allocation_items = new Template('dsp_order_view_edit_distribution.tpl',$v_dir_templates);
        $tpl_order_allocation_items->set('PRODUCT_ID', '');
        $tpl_order_allocation_items->set('URL', URL);
        $tpl_order_allocation_items->set('TABLE_CLASS_NAME', 'td_3');
        $tpl_order_allocation_items->set('ORDER_ID', 0);
        $tpl_order_allocation_items->set('PRODUCT_MATERIAL', '');

        $tpl_order_allocation_items->set('PRODUCT_IMAGE', '');
        $tpl_order_allocation_items->set('PRODUCT_QUANTITY', '');
        $tpl_order_allocation_items->set('PRODUCT_PRICE', '');
        $tpl_order_allocation_items->set('PRODUCT_AMOUNT', '');
        $arr_tpl_order_allocation_items[] = $tpl_order_allocation_items;
        $v_dsp_one_allocation = Template::merge($arr_tpl_order_allocation_items);
        $tpl_one_allocation = new Template('dsp_order_allocation.tpl', $v_dir_templates);
        $tpl_one_allocation->set('TABLE_CLASS','td_3');
        $tpl_one_allocation->set('LOCATION_NAME', '');
        $tpl_one_allocation->set('LOCATION_ID', '');
        $tpl_one_allocation->set('LOCATION_ADDRESS', '');
        $tpl_one_allocation->set('LOCATION_PRICE', 0);
        $tpl_one_allocation->set('TRACKING_NUMBER', '');
        $tpl_one_allocation->set('TRACKING_LINK', '');
        $tpl_one_allocation->set('SHIPPING_STATUS', '');
        $tpl_one_allocation->set('TOTAL_PRICE', 0);
        $tpl_one_allocation->set('DISTRIBUTION_DISPLAY', 'style="display: none"');
        $tpl_one_allocation->set('TABLE_DISTRIBUTION_ITEM', $v_dsp_one_allocation);
        $arr_tpl_order_allocation[] = $tpl_one_allocation;
    }
    else{
        foreach($arr_tmp_allocation as $v_location_id=>$arr)
        {
            $v_location_name = isset($arr[0]['location_name'])?$arr[0]['location_name']:'';
            $v_location_address = isset($arr[0]['location_address'])?$arr[0]['location_address']:'';
            $v_location_address = strtolower($v_location_address);
            $v_tracking_number = isset($arr[0]['tracking_number'])?$arr[0]['tracking_number']:'';
            $v_tracking_company = isset($arr[0]['tracking_company'])?$arr[0]['tracking_company']:'';
            $v_date_shipping = isset($arr[0]['date_shipping'])?$arr[0]['date_shipping']:NULL;
            $v_link_tracking = isset($arr[0]['tracking_url'])?$arr[0]['tracking_url']:'';
            if($v_link_tracking!='' && $v_tracking_number!='')
                $v_tracking_number = '<a target="_blank" href="'.$v_link_tracking.'"> '.$v_tracking_number.' </a>';
            $v_tracking = $v_tracking_number;
            if($v_tracking!='' && $v_tracking_company!='')
                $v_tracking.=' - '.$v_tracking_company;
            else
                $v_tracking = $v_tracking_company;
            if(is_null($v_date_shipping))
                $v_shipping = ' --- ';
            else
                $v_shipping = date('d-M-Y', $v_date_shipping->sec);
            $v_location_total_amount = 0;
            $arr_tpl_order_allocation_items = array();
            if(count($arr)<=0)
            {
                $tpl_order_allocation_items = new Template('dsp_order_view_edit_distribution.tpl',$v_dir_templates);
                $tpl_order_allocation_items->set('PRODUCT_ID', '');
                $tpl_order_allocation_items->set('URL', URL);
                $tpl_order_allocation_items->set('TABLE_CLASS_NAME', 'td_2');
                $tpl_order_allocation_items->set('ORDER_ID', 0);
                $tpl_order_allocation_items->set('PRODUCT_MATERIAL', '');
                $v_graphic_file = $arr[$i]['product_image'];
                if(strpos($v_graphic_file,'/')===false) $v_graphic_file = $v_company_product_url.'/'.$v_graphic_file;
                $tpl_order_allocation_items->set('PRODUCT_IMAGE', '');
                $tpl_order_allocation_items->set('PRODUCT_QUANTITY', '');
                $tpl_order_allocation_items->set('PRODUCT_PRICE', '');
                $tpl_order_allocation_items->set('PRODUCT_AMOUNT', '');
                $arr_tpl_order_allocation_items[] = $tpl_order_allocation_items;
            }
            else
            {
                for($i=0; $i<count($arr); $i++)
                {
                    $tpl_order_allocation_items = new Template('dsp_order_view_edit_distribution.tpl',$v_dir_templates);
                    $tpl_order_allocation_items->set('PRODUCT_ID', $arr[$i]['product_id']);
                    $tpl_order_allocation_items->set('URL', URL);
                    $tpl_order_allocation_items->set('TABLE_CLASS_NAME', $i%2==0?'td_3':'td_2');
                    $tpl_order_allocation_items->set('ORDER_ID', isset($v_order_id)?$v_order_id:0);
                    $tpl_order_allocation_items->set('PRODUCT_MATERIAL', $arr[$i]['product_name']);
                    $v_graphic_file = $arr[$i]['product_image'];
                    if(strpos($v_graphic_file,'/')===false) $v_graphic_file = $v_company_product_url.'/'.$v_graphic_file;
                    $tpl_order_allocation_items->set('PRODUCT_IMAGE', $v_graphic_file);
                    $tpl_order_allocation_items->set('PRODUCT_QUANTITY', $arr[$i]['location_quantity']);
                    $tpl_order_allocation_items->set('PRODUCT_PRICE', $v_user_rule_hide_price_all?NO_PRICE:format_currency($arr[$i]['location_price']));
                    $v_tmp_location_price = $arr[$i]['location_price']*$arr[$i]['location_quantity'];
                    $tpl_order_allocation_items->set('PRODUCT_AMOUNT', $v_user_rule_hide_price_all?NO_PRICE:format_currency($v_tmp_location_price));
                    $v_location_total_amount += $v_tmp_location_price;
                    $v_all_price +=$v_tmp_location_price;
                    $arr_tpl_order_allocation_items[] = $tpl_order_allocation_items;
                }
            }
            $v_dsp_one_allocation = Template::merge($arr_tpl_order_allocation_items);
            $tpl_one_allocation = new Template('dsp_order_allocation.tpl', $v_dir_templates);
            $tpl_one_allocation->set('TABLE_CLASS',$v_class_table_name);
            $tpl_one_allocation->set('DISTRIBUTION_DISPLAY', '');
            $tpl_one_allocation->set('TRACKING_LINK', $v_link_tracking);
            $tpl_one_allocation->set('SHIPPING_STATUS', $v_shipping);
            $tpl_one_allocation->set('LOCATION_ADDRESS', strtolower($v_location_address) );
            $tpl_one_allocation->set('LOCATION_NAME', $v_location_name);
            $tpl_one_allocation->set('TRACKING_NUMBER', $v_tracking);
            $tpl_one_allocation->set('LOCATION_ID', $v_location_id);
            $tpl_one_allocation->set('LOCATION_PRICE', $v_user_rule_hide_price_all?NO_PRICE:format_currency($v_location_total_amount));
            $tpl_one_allocation->set('TOTAL_PRICE', $v_allocation_total_amount+$v_location_total_amount);
            $tpl_one_allocation->set('TABLE_DISTRIBUTION_ITEM', $v_dsp_one_allocation);
            $arr_tpl_order_allocation[] = $tpl_one_allocation;
        }
    }
    if(isset($v_po_number)){
        $tpl_order_information_form = new Template('dsp_order_view_edit_information.tpl', $v_dir_templates);
        $tpl_order_information_form->set('PO_NUMBER',$v_po_number);
        $tpl_order_information_form->set('URL',URL);
        $tpl_order_information_form->set('URL_TEMP',URL.$v_dir_templates);
        $tpl_order_information_form->set('ORDER_DESCRIPTION',$v_order_description);
        $tpl_order_information_form->set('ORDER_STATUS',$v_order_status);
        $tpl_order_information_form->set('ORDER_ID',$v_order_id);
        $tpl_order_information_form->set('ORDER_REF',$v_order_ref);
        $tpl_order_information_form->set('DATE_CREATED',date('d-M-Y', $v_date_created));
        $tpl_order_information_form->set('ORDER_BY',$v_user_name);
        $tpl_order_information_form->set('READONLY',$v_status>=20 ||$v_view_order_only==1?' disabled="disabled"':'');
        if($v_date_required!=NULL)
            $tpl_order_information_form->set('DATE_REQUIRED',fdate(date('d-M-Y', $v_date_required)));
        else
            $tpl_order_information_form->set('DATE_REQUIRED','');
        $tpl_order_information_form->set('ORDER_ALLOCATED',$v_been_allocated);
        $tpl_order_information_form->set('ORDER_THRESHOLD',$v_been_threshold);
        $tpl_order_information_form->set('ORDER_STATUS',$v_order_status_message);
        $arr_tmp_order_information_form[] = $tpl_order_information_form;
    }else{
        $tpl_order_information_form = new Template('dsp_order_view_edit_information.tpl', $v_dir_templates);
        $tpl_order_information_form->set('PO_NUMBER','');
        $tpl_order_information_form->set('URL',URL);
        $tpl_order_information_form->set('URL_TEMP',URL.$v_dir_templates);
        $tpl_order_information_form->set('ORDER_DESCRIPTION','');
        $tpl_order_information_form->set('ORDER_STATUS','');
        $tpl_order_information_form->set('ORDER_ID','');
        $tpl_order_information_form->set('ORDER_REF','');
        $tpl_order_information_form->set('DATE_CREATED',date('d-M-Y', $v_date_created));
        $tpl_order_information_form->set('ORDER_BY','');
        $tpl_order_information_form->set('READONLY',$v_status>=20 ||$v_view_order_only==1?' disabled="disabled"':'');
        if($v_date_required!=NULL)
            $tpl_order_information_form->set('DATE_REQUIRED',fdate(date('d-M-Y', $v_date_required)));
        else
            $tpl_order_information_form->set('DATE_REQUIRED','');
        $tpl_order_information_form->set('ORDER_ALLOCATED',0);
        $tpl_order_information_form->set('ORDER_THRESHOLD',0);
        $tpl_order_information_form->set('ORDER_STATUS',0);
        $arr_tmp_order_information_form[] = $tpl_order_information_form;
    }
    if(isset($arr_tpl_order_allocation) && is_array($arr_tpl_order_allocation))
        $v_dsp_order_allocations = Template::merge($arr_tpl_order_allocation);
    else
        $v_dsp_order_allocations ='';
    $tpl_order->set('URL_TEMP', URL.$v_dir_templates);
    $tpl_order->set('ORDER_ID', $v_order_id);
    $tpl_order->set('STYLE',  $style);
    $tpl_order->set('ORDER_DETAIL_ALLOCATION', $v_dsp_order_allocations);
    $tpl_order->set('URL', URL);
    $tpl_order->set('AJAX_LOAD_ORDER_ALLOCATION_URL', URL.'order/');
    $tpl_order->set('SESSION_ID', session_id());
    $tpl_order->set('TOTAL_AMOUNT', $v_user_rule_hide_price_all?NO_PRICE:format_currency($v_allocation_total_amount));
    $tpl_order->set('URL_REQUEST', $_SERVER['REQUEST_URI']);
    $arr_user_allocation = array();
    if($v_order_user_name==$arr_user['user_name'])
        $arr_user_allocation = $arr_user['location'];
    else{
        $arr_user_location = array();
        if(isset($cls_user)==false){
            add_class('cls_tb_user');
            $cls_user = new cls_tb_user($db, LOG_DIR);
        }
        $v_row = $cls_user->select_one(array('user_name'=>$v_order_user_name));
        if($v_row==1){
            $v_tmp_location_allocate = $cls_user->get_user_location_allocate();
            $v_order_default_location = $cls_user->get_location_id();
            if($v_tmp_location_allocate!=''){
                $j=0;
                if(strpos($v_tmp_location_allocate.',',$v_order_default_location.',')!==false){
                    $arr_user_location[$j] = $v_order_default_location;
                    $j++;
                }
                $arr_tmp = explode(',', $v_tmp_location_allocate);
                for($i=0; $i<count($arr_tmp); $i++){
                    $v_one = (int) $arr_tmp[$i];
                    if($v_one>0 && $v_one!=$v_order_default_location){
                        $arr_user_location[$j++] = $v_one;
                    }
                }
            }else{
                $arr_user_location[0] = $v_order_default_location;
            }
            $arr_where_clause = array('location_id'=>array('$in'=>$arr_user_location));
            if(isset($cls_location)==false){
                add_class('cls_tb_location');
                $cls_location = new cls_tb_location($db, LOG_DIR);
            }
            $arr_user_location = $cls_location->select($arr_where_clause);
            $arr_temp = array();
            foreach($arr_user_location as $a){
                $arr_temp[] = $a;
            }
            $arr_user_allocation = $arr_temp;
        }
    }
    $v_option_allocation = '';
    for($i=0; $i<count($arr_user_allocation); $i++){
        $v_option_allocation .= '<option value="'.$arr_user_allocation[$i]['location_id'].'">'.$arr_user_allocation[$i]['location_name'].'</option>';
    }
    $v_order_information =  '<ul><li>Your PO#: '.$v_po_number.'</li>';
    $v_order_information .= '<li>Your Order Reference: '.$v_order_ref.'</li>';
    $v_order_information .= '<li>Your Order Status: '.$v_order_status_message.'</li></ul>';
    $tpl_order->set('SUBMIT_BUTTON_DISPLAY', 'style="display:none"');
    $tpl_order->set('SAVE_BUTTON_DISPLAY', 'style="display:none"');
    $tpl_order->set('ADD_BUTTON_ITEM', 'style="display:none"');
    $tpl_order->set('DIS_BUTTON_DISPLAY', 'style="display:none"');
    if(isset($cls_check_threshold)==false){
        add_class('cls_tb_location_group_threshold');
        $cls_check_threshold = new cls_tb_location_group_threshold($db, LOG_DIR);
    }
    if(isset($cls_check_product)==false){
        //add_class('cls_tb_product');
        $cls_check_product = new cls_tb_product($db, LOG_DIR);
    }
    if(isset($cls_check_group)==false){
        add_class('cls_tb_product_group');
        $cls_check_group = new cls_tb_product_group($db, LOG_DIR);
    }
    $arr_check = check_product_group_threshold($cls_check_product, $cls_check_threshold, $cls_check_group, $arr_order_items);
    $v_check_threshold_info = $v_error_approve. $arr_check[1];
    if($arr_check[1]!='') $v_been_threshold = 1;
    $arr_check_threshold_info = explode('*', $v_check_threshold_info);
    $v_check_threshold_info = '';
    for($i=0; $i<count($arr_check_threshold_info);$i++){
        $v_one_row = trim($arr_check_threshold_info[$i]);
        if($v_one_row!='') $v_check_threshold_info.='<li>* '.$v_one_row.'</li>';
    }
    if($v_check_threshold_info!='') $v_check_threshold_info = '<ul>'.$v_check_threshold_info.'</ul>';
    $v_error_approve = $v_check_threshold_info;
    if($v_error_approve!=''){
        $tpl_order->set('TAB_WARNING_DISPLAY','');
        $tpl_order->set('WARNING_DISPLAY',$v_error_approve);
    }else{
        $tpl_order->set('TAB_WARNING_DISPLAY','display:none;');
        $tpl_order->set('WARNING_DISPLAY','');
    }
    $v_order_warning_message = '';
    if($v_been_allocated==1){
        $v_order_warning_message = $cls_tb_message->select_scalar('message_value', array('message_key'=>'cannot_submit_unallocated_items'));
    }else{
        $v_order_warning_message = $cls_tb_message->select_scalar('message_value', array('message_key'=>'cannot_submit_over_threshold_allowed'));
    }

    if(isset($arr_tmp_order_information_form) && is_array($arr_tmp_order_information_form))
        $v_dsp_order_information = Template::merge($arr_tmp_order_information_form);
    else
        $v_dsp_order_information ='';
    $tpl_order->set('ORDER_INFORMATION', $v_dsp_order_information);
    $tpl_order->set('TABLE_ORDER_ITEM', $v_dsp_order_details);
    $tpl_order->set('PO_NUMBER', $v_po_number);
    $tpl_order->set('PO_REF', $v_order_ref);
    $tpl_order->set('ORDER_STATUS', $v_order_status_message);
    $tpl_order->set('TABLE_ORDER_ITEM', $v_dsp_order_details);
    $tpl_order->set('ALL_PRICE', $v_all_price);
    if(isset($arr_tpl_order_allocation) && is_array($arr_tpl_order_allocation))
        $v_dsp_order_allocations = Template::merge($arr_tpl_order_allocation);
    else
        $v_dsp_order_allocations = '';
    $tpl_order->set('URL_TEMP',URL.$v_dir_templates);
    $tpl_order->set('TABLE_DISTRIBUTION', $v_dsp_order_allocations);
    unset($arr_tpl_order_allocation);
    $tpl_order->set('ORDER_INFO', $v_order_information);
    unset($arr_tmp_order_information_form);
    $tpl_order->set('SIGN_MONEY', $v_sign_money);
    $tpl_order->set('ORDER_ID', $v_order_id);
    $tpl_order->set('PRICE_DISPLAY', $v_user_rule_hide_price_all?' display: none;':'');
    $tpl_order->set('DISABLE_PICKER', $v_order_status>=20 ||$v_view_order_only==1?'1':'0');
    $tpl_order->set('MATERIAL_OPTION',  json_encode($arr_all_material));
    echo $tpl_order->output();
}else{
    redir(URL.'order');
}
?>