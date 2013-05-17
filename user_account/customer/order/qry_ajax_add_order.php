<?php if(!isset($v_sval)) die(); ?>
<?php
add_class('cls_tb_product');
$cls_tb_product = new cls_tb_product($db, LOG_DIR);
add_class('cls_tb_user');
$cls_user = new cls_tb_user($db, LOG_DIR);
add_class('cls_tb_location');
$cls_location = new cls_tb_location($db, LOG_DIR);
$v_session_id = isset($_POST['txt_session_id'])?$_POST['txt_session_id']:'';
$v_product_id = isset($_POST['txt_product_id'])?$_POST['txt_product_id']:0;
$v_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:0;
$v_order_item_id = isset($_POST['txt_order_item_id'])?$_POST['txt_order_item_id']:0;
$v_material_idx = isset($_POST['txt_material_idx'])?$_POST['txt_material_idx']:0;
$arr_text = isset($_POST['txt_text'])?$_POST['txt_text']:0;

settype($v_product_id, 'int');
settype($v_package_type, 'int');
settype($v_order_id, 'int');
settype($v_order_item_id, 'int');
$v_graphic_id = 0;
$v_total_records  = $cls_tb_product->select_one(array('product_id'=>(int)$v_product_id));
if($v_total_records!=1)  die('{error=100}{message=This product is not available...!}');
$arr_material= $cls_tb_product->get_material();
$_SESSION['ss_upload_image_product'] = $v_product_id;
if($v_product_id<0) $v_product_id=0;
if($v_order_id<0) $v_order_id=0;
if($v_order_item_id<0) $v_order_item_id=0;
$v_product_description = isset($_POST['txt_product_description'])?$_POST['txt_product_description']:$cls_tb_product->get_long_description();
$v_product_sku = isset($_POST['txt_product_sku'])?$_POST['txt_product_sku']:$cls_tb_product->get_product_sku() ;
$v_product_price = isset($_POST['txt_product_price'])?$_POST['txt_product_price']:$arr_material[$v_material_idx]['price'];
settype($v_product_price, 'float');
if($v_product_price<0) $v_product_price = 0;
$v_product_quantity = isset($_POST['txt_product_quantity'])?$_POST['txt_product_quantity']:'0';
settype($v_product_quantity, 'int');
if($v_product_quantity<0) $v_product_quantity = 0;
$v_size_width = isset($_POST['txt_size_width'])?$_POST['txt_size_width']:$arr_material[$v_material_idx]['width'];
$v_size_length = isset($_POST['txt_size_length'])?$_POST['txt_size_length']:$arr_material[$v_material_idx]['length'];
$v_size_unit = isset($_POST['txt_size_unit'])?$_POST['txt_size_unit']:$arr_material[$v_material_idx]['usize'];
$v_size_option = isset($_POST['txt_size_option'])?$_POST['txt_size_option']:$arr_material[$v_material_idx]['size'];
settype($v_size_option, 'int');
if($v_size_option!=1) $v_size_option = 0;
$v_material_id = isset($_POST['txt_material_id'])?$_POST['txt_material_id']:$arr_material[$v_material_idx]['id'];
settype($v_material_id, 'int');
$v_material_name = isset($_POST['txt_material_name'])?$_POST['txt_material_name']:$arr_material[$v_material_idx]['name'];
$v_material_thickness_value = isset($_POST['txt_material_thickness_value'])?$_POST['txt_material_thickness_value']:$arr_material[$v_material_idx]['thick'];
$v_material_thickness_unit = isset($_POST['txt_material_thickness_unit'])?$_POST['txt_material_thickness_unit']:$arr_material[$v_material_idx]['uthick'];
$v_material_color = isset($_POST['txt_material_color'])?$_POST['txt_material_color']:$arr_material[$v_material_idx]['color'];;
$v_product_text = isset($_POST['txt_product_text'])?$_POST['txt_product_text']:'';
if($v_product_text!=''){
    $v_product_text = stripcslashes($v_product_text);
    $arr_product_text = json_decode($v_product_text);
 }else{
    $arr_product_text = array();
}
$v_custom_image_path = isset($_POST['txt_custom_image_path'])?$_POST['txt_custom_image_path']:'';
$v_row = $cls_tb_product->select_one(array('product_id'=>$v_product_id));
$v_tmp_product_size_option = 0;
$v_tmp_product_image_option = 0;
$v_tmp_product_text_option = 0;
$v_tmp_product_excluded_location = '';
$v_product_threshold = -1;
if($v_row==1){
    $v_tmp_product_size_option = $cls_tb_product->get_size_option();
    $v_tmp_product_image_option = $cls_tb_product->get_image_option();
    $v_tmp_product_text_option = $cls_tb_product->get_text_option();
    $v_product_threshold = $cls_tb_product->get_product_threshold();
    $v_tmp_product_excluded_location = $cls_tb_product->get_excluded_location();
    if($v_tmp_product_excluded_location!='') $v_tmp_product_excluded_location.=',';
    if(is_null($v_product_threshold) || $v_product_threshold<0) $v_product_threshold = -1;
    //check exclude location
    $v_excluded_location = $cls_tb_product->get_excluded_location();
    $arr_excluded_location = $v_excluded_location!=''?explode(',',$v_excluded_location):array();
    if(in_array($arr_user['location_default'], $arr_excluded_location)){
        //die('{error=100}{message=This product is not available for your location!}');
    }
}
$v_order_notes = '';
$v_been_allocated = 0;
if($v_order_id>0){
    $v_order_default_location = $arr_user['location_default'];
    $v_confirm_allocate = $arr_user['confirm_allocate'];
    $v_row = $cls_tb_order->select_one(array('order_id'=>$v_order_id, 'company_id'=>$v_company_id));
    if($v_row==1){
        $v_order_user_name = $cls_tb_order->get_user_name();
        $v_order_location = $cls_tb_order->get_location_id();
        $v_order_company = $cls_tb_order->get_company_id();
        $arr_tmp_product_text = $cls_tb_product->select_scalar('text', array('product_id'=>$v_product_id));
        if(!is_array($arr_tmp_product_text)) $arr_tmp_product_text = array();
        for($i=0; $i<count($arr_tmp_product_text); $i++){
            if(isset($arr_product_text[$i]))
                $arr_tmp_product_text[$i]['text']=$arr_product_text[$i];
        }
        $v_order_total_amount = $cls_tb_order->get_total_order_amount();
        $v_order_status = $cls_tb_order->get_status();
        $v_order_flag = 0;
        if($v_order_item_id==0){
            $v_order_item_id = $cls_tb_order_items->select_scalar('order_item_id', array('order_id'=>$v_order_id, 'product_id'=>$v_product_id));
            settype($v_order_item_id, 'int');
            if($v_order_item_id<0) $v_order_item_id = 0;
        }
        $v_delete_item = false;
        if($v_order_item_id>0){
            $v_user_order_location = 0;
            $v_row = $cls_tb_order_items->select_one(array('order_item_id'=>$v_order_item_id));
            if($v_row==1){
                $v_product_code = $cls_tb_order_items->get_product_code();
                $v_current_order_item_quantity = $cls_tb_order_items->get_quantity();
                $arr_tmp_allocation = $cls_tb_order_items->get_allocation();
                $v_product_image = $cls_tb_order_items->get_graphic_file();
                $v_tmp_location_quantity = 0;
                if($v_order_user_name!=$arr_user['user_name']){
                    $v_row = $cls_user->select_one(array('user_name'=>$v_order_user_name));
                    if($v_row==1){
                        $v_user_order_location = $cls_user->get_location_id();
                        $v_user_order_allocate = $cls_user->get_user_location_allocate();
                        $arr_user_order_allocate_rule = $cls_user->get_user_rule();
                        $v_user_order_allocate_rule = isset($arr_user_order_allocate_rule['customer_order']['allocate']);
                        if($v_user_order_allocate_rule){
                            if($v_user_order_allocate!=''){
                                $v_user_order_location = strpos($v_user_order_allocate.',', $v_user_order_location.',')!==false?$v_user_order_location:0;
                                if($v_user_order_location==0) $v_confirm_allocate = 1;
                            }
                        }
                    }
                }else{
                    if(!$v_confirm_allocate) $v_user_order_location = $v_order_default_location;
                }
                for($i=0; $i<count($arr_tmp_allocation);$i++){
                    $v_tmp_location_quantity += $arr_tmp_allocation[$i]['location_quantity'];
                    $arr_tmp_allocation[$i]['location_price'] = $v_product_price;
                    if($v_user_order_location==$arr_tmp_allocation[$i]['location_id']) $v_user_order_location = -$v_user_order_location;
                }
                if($v_tmp_location_quantity != $v_product_quantity){
                    $v_allocated_message = 'Not Allocated';
                    $v_item_status = 1;
                    $v_order_flag = 1;
                    $v_been_allocated = 1;
                    $v_order_notes .= '*Product: #'.$v_product_code.' has not been allocated.';
                    /*
                    if($v_user_order_location==0){
                        $v_allocated_message = 'Not Allocated';
                        $v_item_status = 1;
                        $v_order_flag = 1;
                        $v_been_allocated = 1;
                        $v_order_notes .= '*Product: #'.$v_product_code.' has not been allocated.';
                    }else{
                        if($v_confirm_allocate){
                            $v_allocated_message = 'Not Allocated';
                            $v_item_status = 1;
                            $v_order_flag = 1;
                            $v_been_allocated = 1;
                            $v_order_notes .= '*Product: #'.$v_product_code.' has not been allocated.';
                        }else{
                            $v_quantity = $v_product_quantity - $v_tmp_location_quantity;
                            if($v_quantity>0){//increase
                                if($v_user_order_location<0){
                                    $v_user_order_location = abs($v_user_order_location);
                                    for($k=0; $k<count($arr_tmp_allocation);$k++){
                                        if($arr_tmp_allocation[$k]['location_id']==$v_user_order_location){
                                            $arr_tmp_allocation[$k]['location_quantity'] = $arr_tmp_allocation[$k]['location_quantity']+$v_quantity;
                                        }
                                    }

                                }else{
                                    $v_count = count($arr_tmp_allocation);
                                    for($k=$v_count; $k>0; $k--){
                                        $arr_tmp_allocation[$k] = $arr_tmp_allocation[$k-1];
                                    }
                                    $cls_location->select_one(array('location_id'=>$v_user_order_location));
                                    $arr_tmp_allocation[0] = array(
                                        'location_id'=>$v_user_order_location,
                                        'location_name'=>$cls_location->get_location_name(),
                                        'location_address'=>($cls_location->get_address_unit()!=''?$cls_location->get_address_unit() .' ':'') . ($cls_location->get_address_line_1()!=''?$cls_location->get_address_line_1().'<br>':'') . ($cls_location->get_address_city()!=''?$cls_location->get_address_city() .' ':'') . ($cls_location->get_address_province()!=''?$cls_location->get_address_province() .' ':'')  .($cls_location->get_address_postal()!=''?$cls_location->get_address_postal() .' ':'')  ,
                                        'location_quantity'=>$v_quantity,
                                        'location_price'=>$v_product_price,
                                        'product_id'=>$arr_tmp_allocation[1]['product_id'],
                                        'product_image'=>$arr_tmp_allocation[1]['product_image'],
                                        'product_name'=>$arr_tmp_allocation[1]['product_name'],
                                        'tracking_url'=>'',
                                        'tracking_number'=>'',
                                        'tracking_company'=>'',
                                        'date_shipping'=> NULL,
                                        'shipping_status'=>0
                                    );
                                }
                            }else{
                                $v_quantity = abs($v_quantity);
                                if($v_user_order_location<0){
                                    $v_user_order_location = abs($v_user_order_location);
                                    $v_shift = false;
                                    for($k=0; $k<count($arr_tmp_allocation);$k++){
                                        if($arr_tmp_allocation[$k]['location_id']==$v_user_order_location){
                                            if($v_quantity<$arr_tmp_allocation[$k]['location_quantity']){
                                                $arr_tmp_allocation[$k]['location_quantity'] = $arr_tmp_allocation[$k]['location_quantity']-$v_quantity;
                                                $v_quantity = 0;
                                            }else{
                                                $v_quantity -= $arr_tmp_allocation[$k]['location_quantity'];
                                                $arr_tmp_allocation[$k]['location_quantity'] = 0;
                                            }
                                            $v_shift = $arr_tmp_allocation[$k]['location_quantity']==0;
                                        }
                                        if($v_shift){
                                            if($k<count($arr_tmp_allocation)-1){
                                                $arr_tmp_allocation[$k] = $arr_tmp_allocation[$k+1];
                                            }
                                        }
                                    }
                                    if($v_shift){
                                        $k = count($arr_tmp_allocation)-1;
                                        unset($arr_tmp_allocation[$k]);
                                        $v_delete_item = $k==0;
                                    }
                                    if($v_quantity>0){
                                        $v_allocated_message = 'Not Allocated';
                                        $v_item_status = 1;
                                        $v_order_notes .= '*Product: #'.$v_product_code.' has not been allocated.';
                                        $v_order_flag = 1;
                                        $v_been_allocated = 1;
                                    }
                                }else{
                                    $v_allocated_message = 'Not Allocated';
                                    $v_been_allocated = 1;
                                    $v_item_status = 1;
                                    $v_order_flag = 1;
                                    $v_order_notes .= '*Product: #'.$v_product_code.' has not been allocated.';
                                }
                            }
                        }
                    }
                    */
                }else{
                    $v_allocated_message = 'Already Allocated';
                    $v_item_status = 0;
                }
                if($v_delete_item){
                    $v_result = $cls_tb_order_items->delete(array('order_item_id'=>$v_order_item_id));
                }else{
                    for($x=0; $x <count($arr_tmp_allocation); $x++){
                        $v_item_location = (int) $arr_tmp_allocation[$x]['location_id'];
                        $v_item_quantity = (int) $arr_tmp_allocation[$x]['location_quantity'];
                        $v_item_threshold = $cls_threshold->check_product_threshold($v_product_id, $v_item_location, $v_item_quantity, $v_product_threshold);
                        $arr_tmp_allocation[$x]['threshold'] = $v_item_threshold;
                    }
                    $cls_tb_order_items->set_product_code($v_product_sku);
                    $cls_tb_order_items->set_product_description($v_product_description);
                    $cls_tb_order_items->set_quantity($v_product_quantity);
                    $cls_tb_order_items->set_width($v_size_width);
                    $cls_tb_order_items->set_length($v_size_length);
                    $cls_tb_order_items->set_package_type($v_package_type);
                    $cls_tb_order_items->set_unit($v_size_unit);
                    $cls_tb_order_items->set_graphic_file($v_product_image);
                    $cls_tb_order_items->set_graphic_id($v_graphic_id);
                    $cls_tb_order_items->set_current_price($v_product_price);
                    $cls_tb_order_items->set_material_id($v_material_id);
                    $cls_tb_order_items->set_material_name($v_material_name);
                    $cls_tb_order_items->set_material_thickness_value($v_material_thickness_value);
                    $cls_tb_order_items->set_material_thickness_unit($v_material_thickness_unit);
                    $cls_tb_order_items->set_material_color($v_material_color);
                    $cls_tb_order_items->set_status($v_item_status);
                    $cls_tb_order_items->set_description($v_allocated_message);
                    $cls_tb_order_items->set_location_id($v_order_location);
                    $cls_tb_order_items->set_company_id($v_order_company);
                    $cls_tb_order_items->set_text($arr_tmp_product_text);
                    $v_total_order_items = $v_product_quantity*$v_product_price;
                    $cls_tb_order_items->set_total_price($v_total_order_items);
                    $cls_tb_order_items->set_product_image_option($v_tmp_product_image_option);
                    $cls_tb_order_items->set_product_size_option($v_tmp_product_size_option);
                    $cls_tb_order_items->set_product_text_option($v_tmp_product_text_option);
                    $cls_tb_order_items->set_current_text_option($v_tmp_product_text_option);
                    $cls_tb_order_items->set_current_image_option(0);
                    $cls_tb_order_items->set_current_size_option($v_size_option);
                    $cls_tb_order_items->set_custom_image_path($v_custom_image_path);
                    $cls_tb_order_items->set_allocation($arr_tmp_allocation);
                    $v_result = $cls_tb_order_items->update();
                }
            }else{
                die('{error=1}{message=Cannot select order item!}');
            }
        }else{
            $v_order_item_id = $cls_tb_order_items->select_next('order_item_id');
            $v_product_image = $cls_tb_product->get_image_file(array('product_id'=>(int) $v_product_id));
            if($v_order_item_id>0){
                $arr_allocation = array();
                $i=0;
                if($v_order_user_name==$arr_user['user_name'])
                    $arr_location = $arr_user['location'];
                else{
                    $arr_location = array();
                    $v_row = $cls_user->select_one(array('user_name'=>$v_order_user_name));
                    if($v_row==1){
                        $v_tmp_location_allocate = $cls_user->get_user_location_allocate();
                        $v_order_default_location = $cls_user->get_location_id();
                        if($v_tmp_location_allocate!=''){
                            $j=0;

                            if(strpos($v_tmp_location_allocate.',',$v_order_default_location.',')!==false){
                                $arr_location[$j] = $v_order_default_location;
                                $j++;
                            }else{
                                $v_confirm_allocate = 1;
                            }
                            $arr_tmp = explode(',', $v_tmp_location_allocate);
                            for($i=0; $i<count($arr_tmp); $i++){
                                $v_one = (int) $arr_tmp[$i];
                                if($v_one>0 && $v_one!=$v_order_default_location){
                                    $arr_location[$j++] = $v_one;
                                }
                            }

                        }else{
                            $arr_location[0] = $v_order_default_location;
                        }
                        $arr_where_clause = array('location_id'=>array('$in'=>$arr_location));
                        $arr_location = $cls_location->select($arr_where_clause);
                        $arr_temp = array();
                        foreach($arr_location as $a){
                            $arr_temp[] = $a;
                        }
                        $arr_location = $arr_temp;
                    }
                }
                $v_allocated = 0;
                //Check confirm allocated
                $v_assign_product_quantity = $v_confirm_allocate==1?0:$v_product_quantity;
                $v_been_allocated = $v_confirm_allocate;
                //End check
                if($v_assign_product_quantity>0 && $arr_user['user_type']==5){
                    foreach($arr_location as $a){
                        if($v_order_default_location==$a['location_id']){
                            if(strpos($v_tmp_product_excluded_location, $v_order_default_location.',')!==false) continue;
                            $v_threshold_location = (int) $a['location_id'];
                            $v_threshold = $cls_threshold->check_product_threshold($v_product_id, $v_threshold_location, $v_assign_product_quantity, $v_product_threshold);
                            if($v_package_type<=1)
                                $arr_allocation[] = array('location_id'=>$a['location_id'],
                                    'location_name'=>$a['location_name'],
                                    'location_address'=>($a['address_unit']!=''?$a['address_unit'] .' ':'') . ($a['address_line_1']!=''?$a['address_line_1'].'<br>':'') . ($a['address_city']!=''?$a['address_city'] .' ':'') . ($a['address_province']!=''?$a['address_province'] .' ':'')  .($a['address_postal']!=''?$a['address_postal'] .' ':'')  ,
                                    'location_quantity'=>$v_assign_product_quantity,
                                    'threshold'=>$v_threshold,
                                    'location_price'=>$v_product_price,
                                    'product_id'=>$v_product_id,
                                    'product_image'=>$v_product_image,
                                    'product_name'=>$v_product_sku.' <br> '.$v_product_description.' <br> '.$v_material_name .' ('.$v_size_width.' &times; '.$v_size_length.' '.$v_size_unit .') '.$v_material_thickness_value.' '.$v_material_thickness_unit,
                                    'tracking_url'=>'',
                                    'tracking_number'=>'',
                                    'tracking_company'=>'',
                                    'date_shipping'=> NULL,
                                    'delete'=>0);
                            else
                                $arr_allocation[] = array('location_id'=>$a['location_id'],
                                    'location_name'=>$a['location_name'],
                                    'location_address'=>($a['address_unit']!=''?$a['address_unit'] .' ':'') . ($a['address_line_1']!=''?$a['address_line_1'].'<br>':'') . ($a['address_city']!=''?$a['address_city'] .' ':'') . ($a['address_province']!=''?$a['address_province'] .' ':'')  .($a['address_postal']!=''?$a['address_postal'] .' ':'')  ,
                                    'location_quantity'=>$v_assign_product_quantity,
                                    'threshold'=>$v_threshold,
                                    'location_price'=>$v_product_price,
                                    'product_id'=>$v_product_id,
                                    'product_image'=>$v_product_image,
                                    'product_name'=>$v_product_sku.' <br> '.$v_product_description.' <br> ' .' ('.$cls_settings->get_option_name_by_id('package_type', $v_package_type) .') ',
                                    'tracking_url'=>'',
                                    'tracking_number'=>'',
                                    'tracking_company'=>'',
                                    'date_shipping'=>NULL,
                                    'delete'=>0);
                            $v_allocated = 1;
                        }
                        $i++;
                    }
                    if(! $v_allocated){
                        $i=0;
                        foreach($arr_location as $a){
                            $v_threshold_location = (int) $a['location_id'];
                            if(strpos($v_tmp_product_excluded_location, $v_threshold_location.',')!==false) continue;
                            if($i==0){

                                $v_threshold = $cls_threshold->check_product_threshold($v_product_id, $v_threshold_location, $v_assign_product_quantity, $v_product_threshold);
                                if($v_package_type<=1)
                                    $arr_allocation[] = array('location_id'=>$a['location_id'], 'location_name'=>$a['location_name'],
                                        'location_address'=>($a['address_unit']!=''?$a['address_unit'] .' ':'') . ($a['address_line_1']!=''?$a['address_line_1'].'<br>':'') . ($a['address_city']!=''?$a['address_city'] .' ':'') . ($a['address_province']!=''?$a['address_province'] .' ':'')  .($a['address_postal']!=''?$a['address_postal'] .' ':'') ,
                                        'location_quantity'=>$v_assign_product_quantity,'threshold'=>$v_threshold, 'location_price'=>$v_product_price, 'product_id'=>$v_product_id,'product_image'=>$v_product_image, 'product_name'=>$v_product_sku.'<br>'.$v_product_description.'<br>'.$v_material_name.' ('.$v_size_width.' &times; '.$v_size_length.' '.$v_size_unit .') '.$v_material_thickness_value.' '.$v_material_thickness_unit,'tracking_url'=>'','tracking_number'=>'', 'tracking_company'=>'', 'date_shipping'=> NULL, 'delete'=>0);
                                else
                                    $arr_allocation[] = array('location_id'=>$a['location_id'],  'location_name'=>$a['location_name'],
                                        'location_address'=>($a['address_unit']!=''?$a['address_unit'] .' ':'') . ($a['address_line_1']!=''?$a['address_line_1'].'<br>':'') . ($a['address_city']!=''?$a['address_city'] .' ':'') . ($a['address_province']!=''?$a['address_province'] .' ':'')  .($a['address_postal']!=''?$a['address_postal'] .' ':'') ,
                                        'location_quantity'=>$v_assign_product_quantity,'threshold'=>$v_threshold, 'location_price'=>$v_product_price, 'product_id'=>$v_product_id,'product_image'=>$v_product_image, 'product_name'=>$v_product_sku.'<br>'.$v_product_description.'<br>'.' ('.$cls_settings->get_option_name_by_id('package_type', $v_package_type) .') ','tracking_url'=>'','tracking_number'=>'', 'tracking_company'=>'', 'date_shipping'=> NULL, 'delete'=>0);
                                $i++;
                                $v_allocated = 1;
                            }
                        }
                    }
                }else{
                    $v_been_allocated = 1;
                }
                $v_been_allocated = ($v_been_allocated==0 && $v_allocated==1)?0:1;
                $cls_tb_order_items->set_order_item_id($v_order_item_id);
                $cls_tb_order_items->set_order_id($v_order_id);
                $cls_tb_order_items->set_product_id($v_product_id);
                $cls_tb_order_items->set_product_code($v_product_sku);
                $cls_tb_order_items->set_product_description($v_product_description);
                $cls_tb_order_items->set_quantity($v_product_quantity);
                $cls_tb_order_items->set_width($v_size_width);
                $cls_tb_order_items->set_length($v_size_length);
                $cls_tb_order_items->set_unit($v_size_unit);
                $cls_tb_order_items->set_package_type($v_package_type);
                $cls_tb_order_items->set_graphic_file( 'resources/'. $v_company_code.'/products/'. $v_product_id.'/'. $v_product_image);
                $cls_tb_order_items->set_graphic_id($v_graphic_id);
                $cls_tb_order_items->set_current_price($v_product_price);
                $cls_tb_order_items->set_material_id($v_material_id);
                $cls_tb_order_items->set_material_name($v_material_name);
                $cls_tb_order_items->set_material_thickness_value($v_material_thickness_value);
                $cls_tb_order_items->set_material_thickness_unit($v_material_thickness_unit);
                $cls_tb_order_items->set_material_color($v_material_color);
                $cls_tb_order_items->set_status($v_been_allocated);
                $cls_tb_order_items->set_location_id($v_order_location);
                $cls_tb_order_items->set_company_id($v_order_company);
                $cls_tb_order_items->set_description($v_been_allocated==1?'Not Allocated':'Already Allocated');
                if($v_been_allocated==1) $v_order_flag = 1;
                if($v_been_allocated==1){
                    $v_order_notes .='*Product: #'.$v_product_sku.' has not been allocated';
                }
                $v_total_order_items = $v_product_quantity*$v_product_price;
                $cls_tb_order_items->set_total_price($v_total_order_items);
                $cls_tb_order_items->set_allocation($arr_allocation);
                $cls_tb_order_items->set_text($arr_tmp_product_text);
                $cls_tb_order_items->set_product_image_option($v_tmp_product_image_option);
                $cls_tb_order_items->set_product_size_option($v_tmp_product_size_option);
                $cls_tb_order_items->set_product_text_option($v_tmp_product_text_option);
                $cls_tb_order_items->set_current_text_option($v_tmp_product_text_option);
                $cls_tb_order_items->set_current_image_option(0);
                $cls_tb_order_items->set_current_size_option($v_size_option);
                $cls_tb_order_items->set_custom_image_path($v_custom_image_path);
                $v_result = $cls_tb_order_items->insert();
            }else{
                die('{error=1}{message=Cannot get next order item!}');
            }
        }
        $v_order_total_amount = 0;
        $arr_order_items = $cls_tb_order_items->select(array('order_id'=>$v_order_id));
        foreach($arr_order_items as $arr){
            $v_product_quantity = $arr['quantity'];
            $v_current_price = $arr['current_price'];
            $v_order_total_amount += $v_product_quantity*$v_current_price;
        }
        $v_edit_user = $arr_user['user_name'];
        $v_edit_time = new MongoDate(time());
        if($v_order_flag==1){
            $cls_tb_order->update_fields(array('total_order_amount','status', 'user_modified', 'date_modified', 'notes'), array($v_order_total_amount, $v_order_status<20?$v_order_status:10, $v_edit_user, $v_edit_time, $v_order_notes), array('order_id'=>$v_order_id));
        }else
            $cls_tb_order->update_fields(array('total_order_amount', 'user_modified', 'date_modified', 'notes'), array($v_order_total_amount, $v_edit_user, $v_edit_time, $v_order_notes), array('order_id'=>$v_order_id));
    }else{
        die('{error=2}{message=Cannot found order!}');
    }
}else{
    $arr_text_temp = array();
    $i=0;
    foreach($arr_text as $arr_template){
        if(isset($arr_template[$i])){
            $i++;
            $arr_text_temp[$i]['text']=$arr_template['text'];
        }
    }
    $v_session_order = '';
    if(isset($_SESSION['ss_current_order'])) $v_session_order = $_SESSION['ss_current_order'];
    if($v_session_order!='')
        $arr_order = unserialize($v_session_order);
    if(!isset($arr_order) || !is_array($arr_order)) $arr_order = array();
    $v_count = count($arr_order);
    $v_pos = -1;
    $v_new = false;
    for($i = 0; ($i < $v_count) && ($v_pos < 0); $i++){
        if($v_product_id==$arr_order[$i]['product_id']) $v_pos = $i;
    }
    $v_new = $v_pos <0;
    if($v_pos<0) $v_pos = $v_count;
    $v_user_id = isset($arr_user['user_id'])?$arr_user['user_id']:0;
    settype($v_user_id, 'int');
    $arr_allocation = array();
    $i=0;
    $v_allocated = 0;
    $arr_location = $arr_user['location'];
    $v_location_default = $arr_user['location_default'];
    $v_assign_product_quantity = $arr_user['confirm_allocate']==1?0:$v_product_quantity;
    $v_been_allocated = $arr_user['confirm_allocate'];
    $v_product_image = $cls_tb_product->get_image_file();
    if($v_new){
        $v_assign_product_quantity = $arr_user['confirm_allocate']==1?0:$v_product_quantity;
        $v_been_allocated = $arr_user['confirm_allocate'];
        foreach($arr_location as $a){
            if(strpos($v_tmp_product_excluded_location, $a['location_id'].',')!==false) continue;
            if($v_location_default == $a['location_id']){
                $v_threshold_location = (int) $a['location_id'];
                $v_threshold = $cls_threshold->check_product_threshold($v_product_id, $v_threshold_location, $v_assign_product_quantity, $v_product_threshold);
                if($v_package_type<=1)
                    $arr_allocation[] = array('location_id'=>$a['location_id'],'location_name'=>$a['location_name'],
                        'location_address'=>($a['address_unit']!=''?$a['address_unit'] .' ':'') . ($a['address_line_1']!=''?$a['address_line_1'].'<br>':'') . ($a['address_city']!=''?$a['address_city'] .' ':'') . ($a['address_province']!=''?$a['address_province'] .' ':'')  .($a['address_postal']!=''?$a['address_postal'] .' ':'') ,
                        'location_quantity'=>$v_assign_product_quantity,'threshold'=>$v_threshold, 'location_price'=>$v_product_price, 'product_id'=>$v_product_id,'product_image'=>$v_product_image, 'product_name'=>$v_product_sku.'<br>'.$v_product_description.'<br>'.$v_material_name.' ('.$v_size_width . ' &times; '. $v_size_length.' '.$v_size_unit.') '.$v_material_thickness_value.' '.$v_material_thickness_unit,'tracking_url'=>'','tracking_number'=>'', 'tracking_company'=>'', 'date_shipping'=> NULL, 'delete'=>0);
                else
                    $arr_allocation[] = array('location_id'=>$a['location_id'], 'location_name'=>$a['location_name'],'location_address'=>($a['address_unit']!=''?$a['address_unit'] .' ':'') . ($a['address_line_1']!=''?$a['address_line_1'].'<br>':'') . ($a['address_city']!=''?$a['address_city'] .' ':'') . ($a['address_province']!=''?$a['address_province'] .' ':'')  .($a['address_postal']!=''?$a['address_postal'] .' ':'')  ,'location_quantity'=>$v_assign_product_quantity,'threshold'=>$v_threshold, 'location_price'=>$v_product_price, 'product_id'=>$v_product_id,'product_image'=>$v_product_image, 'product_name'=>$v_product_sku.'<br>'.$v_product_description.'<br>('.$cls_settings->get_option_name_by_id('package_type', $v_package_type).')','tracking_url'=>'','tracking_number'=>'', 'tracking_company'=>'', 'date_shipping'=> NULL, 'delete'=>0);
                $v_allocated = 1;
            }else{
                $arr_allocation[] = array('location_id'=>$a['location_id'], 'location_name'=>$a['location_name'],'location_address'=>($a['address_unit']!=''?$a['address_unit'] .' ':'') . ($a['address_line_1']!=''?$a['address_line_1'].'<br>':'') . ($a['address_city']!=''?$a['address_city'] .' ':'') . ($a['address_province']!=''?$a['address_province'] .' ':'')  .($a['address_postal']!=''?$a['address_postal'] .' ':''),' - '.$a['address_line_1'], 'location_quantity'=>0,'threshold'=>-1, 'location_price'=>0, 'product_id'=>0, 'product_image'=>0, 'product_name'=>'','tracking_url'=>'','tracking_number'=>'', 'tracking_company'=>'', 'date_shipping'=> NULL, 'delete'=>1);
            }
            $i++;
        }
        if(! $v_allocated){
            $arr_allocation = array();
            $i=0;
            foreach($arr_location as $a){
                if(strpos($v_tmp_product_excluded_location, $a['location_id'].',')!==false) continue;
                if($i==0){
                    $v_threshold_location = (int) $a['location_id'];
                    $v_threshold = $cls_threshold->check_product_threshold($v_product_id, $v_threshold_location, $v_assign_product_quantity, $v_product_threshold);
                    if($v_package_type<=1)
                        $arr_allocation[] = array('location_id'=>$a['location_id'],'location_name'=>$a['location_name'],'location_address'=>($a['address_unit']!=''?$a['address_unit'] .' ':'') . ($a['address_line_1']!=''?$a['address_line_1'].'<br>':'') . ($a['address_city']!=''?$a['address_city'] .' ':'') . ($a['address_province']!=''?$a['address_province'] .' ':'')  .($a['address_postal']!=''?$a['address_postal'] .' ':'')  ,'location_quantity'=>$v_assign_product_quantity,'threshold'=>$v_threshold, 'location_price'=>$v_product_price, 'product_id'=>$v_product_id,'product_image'=>$v_product_image, 'product_name'=>$v_product_sku.'<br>'.$v_product_description.'<br>'.$v_material_name.' ('.$v_size_width . ' &times; '. $v_size_length.' '.$v_size_unit.') '.$v_material_thickness_value.' '.$v_material_thickness_unit,'tracking_url'=>'','tracking_number'=>'', 'tracking_company'=>'', 'date_shipping'=> NULL, 'delete'=>0);
                    else
                        $arr_allocation[] = array('location_id'=>$a['location_id'],'location_name'=>$a['location_name'],'location_address'=>($a['address_unit']!=''?$a['address_unit'] .' ':'') . ($a['address_line_1']!=''?$a['address_line_1'].'<br>':'') . ($a['address_city']!=''?$a['address_city'] .' ':'') . ($a['address_province']!=''?$a['address_province'] .' ':'')  .($a['address_postal']!=''?$a['address_postal'] .' ':'')  ,'location_quantity'=>$v_assign_product_quantity,'threshold'=>$v_threshold, 'location_price'=>$v_product_price, 'product_id'=>$v_product_id,'product_image'=>$v_product_image, 'product_name'=>$v_product_sku.'<br>'.$v_product_description.'<br>('.$cls_settings->get_option_name_by_id('package_type', $v_package_type).')','tracking_url'=>'','tracking_number'=>'', 'tracking_company'=>'', 'date_shipping'=> NULL, 'delete'=>0);
                    $v_allocated = 1;
                }else
                    $arr_allocation[] = array('location_id'=>$a['location_id'],'location_name'=>$a['location_name'],'location_address'=>($a['address_unit']!=''?$a['address_unit'] .' ':'') . ($a['address_line_1']!=''?$a['address_line_1'].'<br>':'') . ($a['address_city']!=''?$a['address_city'] .' ':'') . ($a['address_province']!=''?$a['address_province'] .' ':'')  .($a['address_postal']!=''?$a['address_postal'] .' ':'')  , 'location_quantity'=>0,'threshold'=>-1, 'location_price'=>0, 'product_id'=>0, 'product_image'=>0, 'product_name'=>'','tracking_url'=>'','tracking_number'=>'', 'tracking_company'=>'', 'date_shipping'=> NULL, 'delete'=>1);
                $i++;
            }
        }
    }else{
        $v_been_allocated = 1;
        $arr_allocation = $arr_order[$v_pos]['allocation'];
    }
    $arr_order[$v_pos] = array(
        'product_id'=>$v_product_id
        ,'package_type'=>$v_package_type
        ,'order_id'=>$v_order_id
        ,'text'=>$arr_text_temp
        ,'product_sku'=>$v_product_sku
        ,'product_description'=>$v_product_description
        ,'product_image'=>$v_product_image
        ,'graphic_id'=>$v_graphic_id
        ,'product_price'=>$v_product_price
        ,'product_quantity'=>$v_product_quantity
        ,'size_width'=>$v_size_width
        ,'size_length'=>$v_size_length
        ,'size_unit'=>$v_size_unit
        ,'material_id'=>$v_material_id
        ,'material_name'=>$v_material_name
        ,'material_thickness_value'=>$v_material_thickness_value
        ,'material_thickness_unit'=>$v_material_thickness_unit
        ,'material_color'=>$v_material_color
        ,'product_text'=>$arr_product_text
        ,'allocation'=>$arr_allocation
        ,'status'=>$v_been_allocated
        ,'order'=>0
        ,'product_image_option'=>$v_tmp_product_image_option
        ,'product_size_option'=>$v_tmp_product_size_option
        ,'product_text_option'=>$v_tmp_product_text_option
        ,'current_text_option'=>$v_tmp_product_text_option
        ,'current_image_option'=>0
        ,'current_size_option'=>$v_size_option
        ,'custom_image_path'=>$v_custom_image_path
        ,'description'=>$v_been_allocated==1?'Not Allocated':'Already Allocated'
    );
    $_SESSION['ss_current_order'] = serialize($arr_order);
}
if(isset($_SESSION['ss_error_approved'])) unset($_SESSION['ss_error_approved']);
die("{error=0}{message=OK}{allocated=".$v_been_allocated."}")           ;
?>