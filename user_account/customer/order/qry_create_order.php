<?php  if(!isset($v_sval)) die(); ?>
<?php
$v_been_allocated = 0;
$v_been_threshold = 0;
add_class('cls_tb_product');
$v_warning_message = '';
$cls_tb_product = new cls_tb_product($db, LOG_DIR);
$v_count_record=1;
$v_price_all=0;
$v_quantity_all=0;
$tpl_one_allocation = new Template('dsp_order_allocation.tpl', $v_dir_templates);
if(isset($_SESSION['ss_current_order']))
{
    $v_po_number = '';
    $v_order_ref = '';
    $v_date_required = '';
    $v_order_description ='';
    if(isset($_SESSION['ss_order_info'])){
        $arr_order_info = unserialize($_SESSION['ss_order_info']);
        $v_po_number = $arr_order_info['po_number'];
        $v_order_ref = $arr_order_info['order_ref'];
        $v_date_required = $arr_order_info['date_required'];
        $v_order_description = $arr_order_info['description'];
    }


    $_SESSION['order_id']=0;
    $v_current_order = $_SESSION['ss_current_order'];
    $arr_order = unserialize($v_current_order);

    $arr_order_count = array('total_rows'=>0, 'invalid_rows'=>0);
    if(is_array($arr_order))
    {
        $arr_tpl_order_items = array();
        $arr_tpl_order_allocation = array();
        $arr_allocation = array();
        $v_total_amount=0;
        $arr_allocation_item = array();

        for($i=0; $i<count($arr_order);$i++)
        {
            $v_product_id = $arr_order[$i]['product_id'];
            $v_package_type = $arr_order[$i]['package_type'];
            $v_order_id = $arr_order[$i]['order_id'];
            //echo 'P: '.$v_product_id.'<br>';
            $v_product_description = $arr_order[$i]['product_description'];
            $v_product_sku = $arr_order[$i]['product_sku'];
            $v_product_price = $arr_order[$i]['product_price'];
            $v_product_quantity = $arr_order[$i]['product_quantity'];
            $v_product_image = $arr_order[$i]['product_image'];
            $v_graphic_id = $arr_order[$i]['graphic_id'];

            if($v_product_image!='' && strpos($v_product_image,'/')===false) $v_product_image = $v_company_product_url.'/'. $v_product_id.'/'.$v_product_image;

            $v_product_text = $arr_order[$i]['product_text'];
            $v_size_width = $arr_order[$i]['size_width'];
            $v_size_length = $arr_order[$i]['size_length'];
            $v_size_unit = $arr_order[$i]['size_unit'];
            $v_material_id = $arr_order[$i]['material_id'];
            $v_material_name = $arr_order[$i]['material_name'];
            $v_material_thickness_value = $arr_order[$i]['material_thickness_value'];
            $v_material_thickness_unit = $arr_order[$i]['material_thickness_unit'];
            $v_material_color = $arr_order[$i]['material_color'];
            $v_status = $arr_order[$i]['status'];
            $v_description = $arr_order[$i]['description'];
            $arr_allocation = $arr_order[$i]['allocation'];
            if($v_status==1){
                $v_been_allocated = 1;
                $v_warning_message.='*Product: #'.$v_product_sku.' has not been allocated.';
            }
            //print_r($arr_allocation);
            //die();
            for($j=0; $j< count($arr_allocation); $j++){
                $v_location_id = $arr_allocation[$j]['location_id'];
                $v_location_quantity = $arr_allocation[$j]['location_quantity'];
                if($v_location_quantity>0){
                    if(!isset($arr_allocation_item[$v_location_id])){
                        $arr_allocation_item[$v_location_id][0] = $arr_allocation[$j];
                    }else{
                        $v_row = count($arr_allocation_item[$v_location_id]);
                        $arr_allocation_item[$v_location_id][$v_row] = $arr_allocation[$j];
                    }
                    //echo 'L: '.$v_location_id.'<br>';
                }
            }

            $tpl_order_items = new Template('dsp_order_items_all.tpl',$v_dir_templates);
            $v_class_table_name = $v_count_record%2==0?'td_3':'td_2';
            $v_count_record++;
            $tpl_order_items->set('TABLE_CLASS',$v_class_table_name);
            $tpl_order_items->set('ORDER_ITEM_ID',isset($v_order_item_id)?$v_order_item_id:0);
            $tpl_order_items->set('AJAX_LOAD_ORDER_ALLOCATION_URL', URL.'order/');
            $tpl_order_items->set('PRODUCT_ID',$v_product_id);
            $tpl_order_items->set('ORDER_ID',isset($v_order_id)?$v_order_id:0);
            $tpl_order_items->set('GRAPHIC_ID',$v_graphic_id);


            if($v_package_type<=1)
                $v_product_material = $v_product_sku .'<br>'.$v_product_description.'<br>';
            if ($v_material_name != '') {
                $v_product_material .= $v_material_name;
            }
            $v_product_material .= ' - ('.$v_size_width.' &times; '.$v_size_length.' '.$v_size_unit.') ';
            if ($v_material_thickness_value != 0) {
                $v_product_material .= ' - ' .$v_material_thickness_value.' '.$v_material_thickness_unit;
            }
            if ($v_material_color != 'None') {
                $v_product_material .= ' - ' .$v_material_color;
            }
            //$v_product_material = '<span style="color:'.$v_material_color.'">'.$v_product_sku .' - '.$v_material_name.' '.$v_size_width.' &times; '.$v_size_length.' '.$v_size_unit.'</span>';
            //$v_product_material = $v_product_sku .'<br>'.$v_product_description.'<br>'.$v_material_name.' ('.$v_size_width.' &times; '.$v_size_length.' '.$v_size_unit.') '.$v_material_thickness_value.' '.$v_material_thickness_unit;
            else
                $v_product_material = $v_product_sku.'('.$cls_settings->get_option_name_by_id('package_type', $v_package_type).')<br>'.$v_product_description;
            //if($v_description!=''){
            //    $v_product_material .= '<br /><span style="color:red">'.$v_description.'</span>';
            //}
            $arr_order_count['total_rows']++;

            if($v_status==1){
                $arr_order_count['invalid_rows']++;
                //$v_product_material.='<br />[<span style="text-decoration:blink; color:red; font-weight: bold">'.$v_description.'</span>]';
            }
            if (!preg_match("~^(?:f|ht)tps?://~i", $v_product_image)) {
                $v_product_image = URL.$v_product_image;
            }
            //die("$v_product_image");
            $tpl_order_items->set('PRODUCT_MATERIAL', $v_product_material);
            $tpl_order_items->set('PRODUCT_IMAGE',$v_product_image);
            //$tpl_order_items->set('PRODUCT_IMAGE',URL.$v_product_image);
            $tpl_order_items->set('PRODUCT_QUANTITY', $v_product_quantity);
            $tpl_order_items->set('PRODUCT_PRICE', $v_user_rule_hide_price_all?NO_PRICE:$v_sign_money.' '.$v_product_price );
            $tpl_order_items->set('PRODUCT_AMOUNT', $v_user_rule_hide_price_all?NO_PRICE:$v_sign_money.' '. ($v_product_price*$v_product_quantity));
            $tpl_order_items->set('SELECT_DISABLED', "disabled='disabled'");

            $v_dsp_option_action = '<option value="delete">Delete</option>';
            //if($v_status==0){
            $v_dsp_option_action .= '<option value="edit">Edit</option>';
            if($v_user_rule_allocate)
                $v_dsp_option_action .= '<option value="allocation">Allocate</option>';
            //}
            $tpl_order_items->set('ORDER_OPTION_ACTION', $v_dsp_option_action);

            $arr_tpl_order_items[] = $tpl_order_items;
            //echo $v_product_image.'<br>';

        }
        $v_tmp_location = 0;
        foreach($arr_allocation_item as $v_location_id=>$arr)
        {
            if($v_location_id!=$v_tmp_location){
                $v_tmp_location = $v_location_id;
                $v_location_name = $arr[0]['location_name'];
                $v_location_address = $arr[0]['location_address'];
                $v_location_quantity = $arr[0]['location_quantity'];
                $v_location_price = 0;
                $arr_tpl_order_allocation_items = array();
                for($i=0; $i<count($arr); $i++){
                    $v_threshold = isset($arr[$i]['threshold'])?$arr[$i]['threshold']:'y:';
                    $v_sign_threshold = strlen($v_threshold)>1?substr($v_threshold,0,1):'y';
                    $v_threshold = str_replace($v_sign_threshold.':','',$v_threshold);
                    settype($v_threshold, 'int');

                    $tpl_order_allocation_items = new Template('dsp_order_view_edit_distribution.tpl',$v_dir_templates);
                    $tpl_order_allocation_items->set('PRODUCT_ID', $arr[$i]['product_id']);
                    $tpl_order_allocation_items->set('ORDER_ID', isset($v_order_id)?$v_order_id:0);
                    $v_allocation_product_name = $arr[$i]['product_name'];
                    if($v_sign_threshold=='a'){
                        if($v_been_threshold==0) $v_been_threshold = 1;
                        //$v_allocation_product_name .= '<br />[<span style="text-decoration:blink; color:red; font-weight: bold">Required approved for location\'s threshold (current: '.$v_location_quantity.' - threshold: '.$v_threshold.')</span>]';
                        $v_warning_message .= '*Product: #'.$v_product_sku.' has a quantity greater than threshold value  (current: '.$v_location_quantity.' - threshold: '.$v_threshold.'). Required approval!';
                    }else if($v_sign_threshold=='n'){
                        if($v_been_threshold<=1) $v_been_threshold = 2;
                        //$v_allocation_product_name .= '<br />[<span style="text-decoration:blink; color:red; font-weight: bold">Couldn\'t submitted for location\'s threshold (current: '.$v_location_quantity.' - threshold: '.$v_threshold.')</span>]';
                        $v_warning_message .= '*Product: #'.$v_product_sku.' has a quantity greater than threshold value  (current: '.$v_location_quantity.' - threshold: '.$v_threshold.'). The order could not be submitted!';
                    }
                    $tpl_order_allocation_items->set('PRODUCT_MATERIAL', $v_allocation_product_name);
                    //$tpl_order_allocation_items->set('PRODUCT_IMAGE', URL.'images/products/'.$arr[$i]['product_id'].'/'.$arr[$i]['product_image']);
                    $v_image_url = $arr[$i]['product_image'];

                    if($v_image_url!='' && strpos($v_image_url,'/')===false) $v_image_url = $v_company_product_url.  $arr[$i]['product_id'] . '/' . $v_image_url;

                    $tpl_order_allocation_items->set('PRODUCT_IMAGE', $v_image_url);
                    $tpl_order_allocation_items->set('PRODUCT_QUANTITY', $arr[$i]['location_quantity']);
                    $tpl_order_allocation_items->set('PRODUCT_PRICE',$v_user_rule_hide_price_all?NO_PRICE:$v_sign_money.' '. ($arr[$i]['location_price']));
                    $v_tmp_location_price = $arr[$i]['location_price']*$arr[$i]['location_quantity'];
                    $tpl_order_allocation_items->set('PRODUCT_AMOUNT', $v_user_rule_hide_price_all?NO_PRICE:$v_sign_money.' '. ($v_tmp_location_price));
                    $v_location_price += $v_tmp_location_price;
                    $v_total_amount += $v_tmp_location_price;
                    $v_price_all+=$v_tmp_location_price;
                    $v_quantity_all +=$arr[$i]['location_quantity'];
                    $tpl_order_allocation_items->set('URL', URL);
                    $tpl_order_allocation_items->set('TABLE_CLASS_NAME',$v_count_record++%2==0?'td_2':'td_3');
                    $arr_tpl_order_allocation_items[] = $tpl_order_allocation_items;
                }

                $v_dsp_one_allocation = Template::merge($arr_tpl_order_allocation_items);
                $tpl_one_allocation = new Template('dsp_order_allocation.tpl', $v_dir_templates);
                $tpl_one_allocation->set('LOCATION_NAME', $v_location_name);
                $tpl_one_allocation->set('TOTAL_PRICE', $v_total_amount);
                $tpl_one_allocation->set('LOCATION_ID', $v_location_id);
                $tpl_one_allocation->set('SIGN_MONEY', $v_sign_money);
                $tpl_one_allocation->set('LOCATION_ADDRESS', $v_location_address);
                $tpl_one_allocation->set('LOCATION_PRICE', $v_user_rule_hide_price_all?NO_PRICE:$v_sign_money.' '.($v_location_price));
                $tpl_one_allocation->set('PRICE_DISPLAY', $v_user_rule_hide_price_all?'display:none;':'');
                $tpl_one_allocation->set('TRACKING_NUMBER', '');
                $tpl_one_allocation->set('TRACKING_LINK', '');
                $tpl_one_allocation->set('SHIPPING_STATUS', '');
                $tpl_one_allocation->set('TABLE_DISTRIBUTION_ITEM', $v_dsp_one_allocation);
                $arr_tpl_order_allocation[] = $tpl_one_allocation;
            }
        }
        //die('C: '.count($arr_tpl_order_items));
        $v_dsp_order_details = Template::merge($arr_tpl_order_items);
        $v_dsp_order_allocations = Template::merge($arr_tpl_order_allocation);
        //$v_dsp_order_allocations = Template::merge($arr_tpl_order_allocation_items);
        $tpl_order_information_form = new Template('dsp_order_view_edit_information.tpl', $v_dir_templates);

        //$tpl_order_information_form->set('PO_NUMBER',$v_po_number);//$cls_tb_order->get_po_number();
        $tpl_order_information_form->set('PO_NUMBER',$cls_tb_order->get_po_number());
        $tpl_order_information_form->set('ORDER_REF',$cls_tb_order->get_order_ref());
        $tpl_order_information_form->set('ORDER_DESCRIPTION',$cls_tb_order->get_description());
        $tpl_order_information_form->set('URL',URL);
        $tpl_order_information_form->set('URL_TEMP',URL.$v_dir_templates);
        $tpl_order_information_form->set('ORDER_ALLOCATED','');
        $tpl_order_information_form->set('ORDER_THRESHOLD','');
        $tpl_order_information_form->set('ORDER_MESSAGE','');

        $tpl_order_information_form->set('ORDER_STATUS','1');
        $tpl_order_information_form->set('DATE_CREATED',date('d-M-Y'));
        $tpl_order_information_form->set('ORDER_BY',isset($arr_user['contact_name'])?$arr_user['contact_name']:'');
        $tpl_order_information_form->set('ORDER_ID',isset($v_order_id)?$v_order_id:0);
        $tpl_order_information_form->set('DATE_REQUIRED',"");
        $arr_tmp_order_information_form[] = $tpl_order_information_form;

        $tpl_order = new Template('dsp_order_list.tpl', $v_dir_templates);
        $tpl_order->set('ORDER_DETAIL_ITEMS', $v_dsp_order_details);
        $tpl_order->set('ORDER_DETAIL_ALLOCATION', $v_dsp_order_allocations);
        $tpl_order->set('SIGN_MONEY', $v_sign_money);
        $tpl_order->set('AJAX_LOAD_ORDER_ALLOCATION_URL', URL.'order/');
        $tpl_order->set('SESSION_ID', session_id());
        $tpl_order->set('TOTAL_AMOUNT', $v_user_rule_hide_price_all?NO_PRICE: $v_sign_money .' '.$v_total_amount );
        $tpl_order->set('TOTAL_QUANTITY', isset($v_quantity_all)?number_format($v_quantity_all):0 );
        $tpl_order->set('PRICE_DISPLAY', $v_user_rule_hide_price_all?'display:none;':'');
        $tpl_order->set('URL_REQUEST', $_SERVER['REQUEST_URI']);
        $tpl_order->set('URL',URL);
        $tpl_order->set('URL_TEMPLATE',URL.$v_dir_templates);
        //=================
        if(isset($arr_tmp_order_information_form) && is_array($arr_tmp_order_information_form))
            $v_dsp_order_information = Template::merge($arr_tmp_order_information_form);
        else
            $v_dsp_order_information ="";

        $arr_tpl_order_items[] = $tpl_order_items;
        $tpl_order->set('ORDER_INFORMATION', $v_dsp_order_information);
        $tpl_order->set('TABLE_ORDER_ITEM', $v_dsp_order_details);
        $tpl_order->set('TABLE_DISTRIBUTION', $tpl_one_allocation->output());
        //=================

        $arr_user_allocation = $arr_user['location'];
        $v_option_allocation = '';
        for($i=0; $i<count($arr_user_allocation); $i++){
            $v_option_allocation .= '<option value="'.$arr_user_allocation[$i]['location_id'].'">'.$arr_user_allocation[$i]['location_name'].'</option>';
        }
        //$tpl_order->set('ALLOCATION', isset($v_option_allocation)?$v_option_allocation:'');

        $tpl_order->set('SUBMIT_BUTTON_TITLE', 'Submit');
        $tpl_order->set('DIS_BUTTON_DISPLAY', 'style="display:none"');
        if($arr_order_count['total_rows']==$arr_order_count['invalid_rows']){
            $tpl_order->set('SUBMIT_BUTTON_DISPLAY', 'style="display:none"');
            $tpl_order->set('SAVE_BUTTON_DISPLAY', '');
            $tpl_order->set('ADD_BUTTON_ITEM', '');
        }else{
            $tpl_order->set('SUBMIT_BUTTON_DISPLAY', 'style="display:none"');
            $tpl_order->set('SAVE_BUTTON_DISPLAY', '');
            $tpl_order->set('ADD_BUTTON_ITEM', '');
        }

        if(!isset($_SESSION['ss_new_order_info'])){
            $v_order_information = 'You are creating a new order. This order current in session. You need to save or submit it for next work. <br />If not, this order will be destroyed when your session finish';
            $_SESSION['ss_new_order_info'] = $v_order_information;
        }else{
            $v_order_information = $_SESSION['ss_new_order_info'];
        }

        //Start check threshold for group of products
        add_class('cls_tb_location_group_threshold');
        add_class('cls_tb_product');
        add_class('cls_tb_product_group');
        $cls_check_product = new cls_tb_product($db, LOG_DIR);
        $cls_check_group = new cls_tb_product_group($db, LOG_DIR);
        $cls_check_threshold = new cls_tb_location_group_threshold($db, LOG_DIR);

        $arr_check = check_product_group_threshold($cls_check_product, $cls_check_threshold, $cls_check_group, $arr_order);

        $v_check_threshold_info = $v_warning_message. $arr_check[1];
        if(trim($arr_check[1])==1){
            if($v_been_threshold==0) $v_been_threshold=1;
        }
        $arr_check_threshold_info = explode('*', $v_check_threshold_info);
        $v_check_threshold_info = '';
        for($i=0; $i<count($arr_check_threshold_info);$i++){
            $v_one_row = trim($arr_check_threshold_info[$i]);
            if($v_one_row!='') $v_check_threshold_info.='<li>* '.$v_one_row.'</li>';
        }
        if($v_check_threshold_info!='') $v_check_threshold_info = '<ul>'.$v_check_threshold_info.'</ul>';
        //$v_order_information .= $v_check_threshold_info;
        if($v_check_threshold_info!='' || $arr_order_count['invalid_rows'] > 0){
            $tpl_order->set('TAB_WARNING_DISPLAY','');
            $tpl_order->set('WARNING_DISPLAY',$v_check_threshold_info);
            $tpl_order->set('TAB_WARNING_CSS','width: 180px !important');
        }else{
            $tpl_order->set('TAB_WARNING_DISPLAY','display:none;');
            $tpl_order->set('WARNING_DISPLAY','');
            $tpl_order->set('TAB_WARNING_CSS','');
        }
        //End check threshold for group of products

        $v_order_warning_message = '';
        if($v_been_allocated==1){
            $v_order_warning_message = $cls_tb_message->select_scalar('message_value', array('message_key'=>'cannot_submit_unallocated_items'));
        }else{
            $v_order_warning_message = $cls_tb_message->select_scalar('message_value', array('message_key'=>'cannot_submit_over_threshold_allowed'));
        }
        $tpl_order_information_form->set('ORDER_ALLOCATED',$v_been_allocated);
        $tpl_order_information_form->set('ORDER_THRESHOLD',$v_been_threshold);
        $tpl_order_information_form->set('ORDER_MESSAGE', $v_order_warning_message);
        $tpl_order->set('PO_NUMBER','N/A');
        $tpl_order->set('PO_REF','N/A');
        $tpl_order->set('ORDER_STATUS','N/A');
        $tpl_order->set('ORDER_NOTICE',$v_order_information);
        $tpl_order->set('ALL_PRICE',$v_user_rule_hide_price_all?NO_PRICE: $v_sign_money.' '. $v_total_amount );
        echo $tpl_order->output();
    }
}
?>