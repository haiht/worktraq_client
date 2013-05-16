<?php
if(!isset($v_sval)) die();
?>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ANVYINC
 * Date: 12/4/12
 * Time: 12:08 PM
 * To change this template use File | Settings | File Templates.
 */
$v_session_id = isset($_POST['txt_session_id'])?$_POST['txt_session_id']:'';
$v_allocation_data = isset($_POST['txt_allocation'])?$_POST['txt_allocation']:'';
$v_request_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:'0';
$v_request_product_id = isset($_POST['txt_product_id'])?$_POST['txt_product_id']:'0';
$v_request_order_item_id = isset($_POST['txt_order_item_id'])?$_POST['txt_order_item_id']:'0';
settype($v_request_order_id, 'int');
settype($v_request_product_id, 'int');
settype($v_request_order_item_id, 'int');
if($v_request_order_id<0) $v_request_order_id=0;
if($v_request_product_id<0) $v_request_product_id=0;
if($v_request_order_item_id<0) $v_request_order_item_id=0;
$v_been_allocated = 0;
add_class('cls_tb_product');
$cls_tb_product = new cls_tb_product($db, LOG_DIR);
if(isset($_SESSION['ss_error_approved'])) unset($_SESSION['ss_error_approved']);
$v_order_notes = '';
$cls_tb_location = new cls_tb_location($db, LOG_DIR);
if($v_allocation_data!=''){
    $v_allocation_data = stripcslashes($v_allocation_data);
    $arr_allocation_data = json_decode($v_allocation_data, true);
    $v_tmp_product_id = $v_request_product_id;
    $v_product_exclude_location = $cls_tb_product->select_scalar('excluded_location', array('product_id'=>$v_request_product_id));
    if(is_array($arr_allocation_data) /*&& count($arr_allocation_data)>0*/){
        if($v_request_order_id>0){
            if($v_request_order_item_id>0){
                $v_row = $cls_tb_order_items->select_one(array('order_item_id'=>$v_request_order_item_id));
                if($v_row==1){
                    $v_user_name = $arr_user['user_name'];
                    $v_order_id = $cls_tb_order_items->get_order_id();
                    $v_product_id = $cls_tb_order_items->get_product_id();
                    $v_product_quantity = $cls_tb_order_items->get_quantity();
                    $v_product_code = $cls_tb_order_items->get_product_code();
                    $v_product_price = $cls_tb_order_items->get_current_price();
                    $v_product_image = $cls_tb_order_items->get_graphic_file();
                    $v_material_name = $cls_tb_order_items->get_material_name();
                    $v_material_thickness_value = $cls_tb_order_items->get_material_thickness_value();
                    $v_product_name = $cls_tb_order_items->get_product_code().'<br />'.$cls_tb_order_items->get_product_description().'<br />'.$cls_tb_order_items->get_material_name().' ('. $cls_tb_order_items->get_width().' &times; '.$cls_tb_order_items->get_length().') '. $v_material_thickness_value.' '. $cls_tb_order_items->get_material_thickness_unit();
                    $v_product_threshold = $cls_tb_product->select_scalar('product_threshold', array('product_id'=>$v_product_id));
                    if(is_null($v_product_threshold)) $v_product_threshold = -1;
                    //$arr_allocation = $cls_tb_order_items->get_allocation();
                    $arr_allocation = array();
                    for($i=0; $i<count($arr_allocation_data);$i++){
                        $v_tmp_location_id = (int) $arr_allocation_data[$i][1];
                        $v_tmp_location_quantity = (int) $arr_allocation_data[$i][2];
                        $v_product_quantity -= $v_tmp_location_quantity;
                        $v_threshold = $cls_threshold->check_product_threshold($v_product_id, $v_tmp_location_id, $v_tmp_location_quantity, $v_product_threshold);
                        $v_row = $cls_tb_location->select_one(array('location_id'=>$v_tmp_location_id));
                        $v_location_address = '';
                        $v_location_name = '';
                        if($v_row==1){
                            $v_location_name = $cls_tb_location->get_location_name();
                            $v_location_address .= $cls_tb_location->get_address_unit()!=''?$cls_tb_location->get_address_unit().',':'';
                            $v_location_address .= $cls_tb_location->get_address_line_1()!=''?$cls_tb_location->get_address_line_1().'<br />':'';
                            $v_location_address .= $cls_tb_location->get_address_line_2()!=''?$cls_tb_location->get_address_line_2().'<br />':'';
                            $v_location_address .= $cls_tb_location->get_address_line_3()!=''?$cls_tb_location->get_address_line_3().'<br />':'';
                            $v_location_address .= $cls_tb_location->get_address_city()!=''?$cls_tb_location->get_address_city().'&nbsp;&nbsp;':'';
                            $v_location_address .= $cls_tb_location->get_address_province()!=''?$cls_tb_location->get_address_province().'&nbsp;&nbsp;':'';
                            $v_location_address .= $cls_tb_location->get_address_postal()!=''?$cls_tb_location->get_address_postal():'';
                            $v_tracking_number = '';
                            $v_tracking_url ='';
                            $v_tracking_company = '';
                            $v_date_shipping = NULL;
                            $arr_allocation[] = array('location_id'=>$v_tmp_location_id,'location_name'=>$v_location_name,'location_address'=>$v_location_address,'location_quantity'=>$v_tmp_location_quantity,'threshold'=>$v_threshold, 'location_price'=>$v_product_price, 'product_id'=>$v_product_id,'product_image'=>$v_product_image, 'product_name'=>$v_product_name,'tracking_url'=>$v_tracking_url, 'tracking_number'=>$v_tracking_number,'tracking_company'=>$v_tracking_company, 'date_shipping'=> $v_date_shipping, 'shipping_status'=>0);
                        }
                    }
                    $v_allocation_message = 'Already Allocated';
                    $v_item_status = 0;
                    if($v_product_quantity!=0){
                        $v_allocation_message = 'Not Allocated';
                        $v_item_status = 1;
                        $v_been_allocated = 1;
                        $v_order_notes .= '*Product; #'.$v_product_code.' has not been allocated!';
                    }
                    $v_result = $cls_tb_order_items->update_fields(array('allocation', 'description', 'status'), array($arr_allocation,$v_allocation_message, $v_item_status) , array('order_item_id'=>$v_request_order_item_id));
                    if($v_result){
                        $cls_tb_order->update_fields(array('user_modified', 'date_modified', 'notes'), array($v_user_name, new MongoDate(time()), $v_order_notes),array('order_id'=>$v_order_id));
                        die('{error=0}{message=OK.}{allocated='.$v_been_allocated.'}');
                    }else
                        die('{error=7}{message=Cannot load current order item.}');
                }else{
                    die('{error=6}{message=Cannot load current order item:'.$v_request_order_item_id.'.}');
                }
            }else{
                die('{error=5}{message=Invalid order item id.}');
            }
        }else{

            if(isset($_SESSION['ss_current_order'])){
                $arr_order = unserialize($_SESSION['ss_current_order']);
                $v_found = false;
                $v_idx = 0;
                $v_total = 0;
                $v_count = 0;
                for($i=0; $i<count($arr_order) && ! $v_found;$i++){
                    $v_product_id = $arr_order[$i]['product_id'];
                    if($v_product_id==$v_tmp_product_id){
                        //'location_id'=>$a['location_id'],'location_name'=>$a['location_name'],'location_address'=>$a['address_postal'].' - '.$a['address_line_1'],'location_quantity'=>$v_product_quantity, 'location_price'=>$v_product_price, 'product_id'=>$v_product_id,'product_image'=>$v_product_image, 'product_name'=>$v_product_detail.' - '.$v_material_name.' '.$v_material_thickness_value.' '.$v_material_thickness_unit
                        $v_product_sku =  $arr_order[$i]['product_sku'];
                        $v_product_description =  $arr_order[$i]['product_description'];
                        $v_product_image =  $arr_order[$i]['product_image'];
                        $v_product_price =  $arr_order[$i]['product_price'];
                        $v_material_name =  $arr_order[$i]['material_name'];
                        $v_material_thickness_value =  $arr_order[$i]['material_thickness_value'];
                        $v_material_thickness_unit =  $arr_order[$i]['material_thickness_unit'];
                        $v_width = $arr_order[$i]['size_width'];
                        $v_length = $arr_order[$i]['size_length'];
                        $v_found = true;
                        $v_idx = $i;
                    }
                }
                $v_dsp_found='';
                if($v_found){
                    $v_product_quantity = $arr_order[$v_idx]['product_quantity'];

                    $v_product_threshold = $cls_tb_product->select_scalar('product_threshold', array('product_id'=>$v_request_product_id));
                    if(is_null($v_product_threshold)) $v_product_threshold = -1;
                    $arr_allocation = array();
                    //$arr_location = $arr_order[$v_idx]['allocation'];
                    $arr_location = $arr_user['location'];
                    $v_total = count($arr_allocation_data);
                    for($i=0; $i<$v_total;$i++){
                        $v_f = false;
                        $v_tmp_location_id = $arr_allocation_data[$i][1];
                        $v_tmp_location_quantity = $arr_allocation_data[$i][2];
                        $v_product_quantity -= $v_tmp_location_quantity;
                        foreach($arr_location as $a){
                            $v_tracking_number = '';
                            $v_tracking_url ='';
                            $v_tracking_company = '';
                            $v_shipping_status = 0;
                            $v_date_shipping = NULL;
                            $v_location_name = $a['location_name'];
                            if($v_tmp_location_id==$a['location_id']){
                                $v_threshold = $cls_threshold->check_product_threshold($v_request_product_id, (int) $v_tmp_location_id, $v_tmp_location_quantity, $v_product_threshold);
                                //$v_location_address = $a['location_address'];
                                $v_count++;
                                $v_location_address = ($a['address_unit']!=''?$a['address_unit'].',':'') . ($a['address_line_1']!=''?$a['address_line_1'].'<br>':'') .
                                    ($a['address_line_2']!=''?$a['address_line_2'].'<br>':'') .
                                    ($a['address_line_3']!=''?$a['address_line_3'].'<br>':'') .
                                    ($a['address_city']!=''?$a['address_city'].'&nbsp&nbsp':'') .($a['address_province']!=''?$a['address_province'].'&nbsp&nbsp':'') .($a['address_postal']!=''?$a['address_postal'].'&nbsp&nbsp':'');
                                $arr_allocation[] = array('location_id'=>$a['location_id'],'location_name'=>$v_location_name,'location_address'=>$v_location_address,'location_quantity'=>$v_tmp_location_quantity,'threshold'=>$v_threshold, 'location_price'=>$v_product_price, 'product_id'=>$v_tmp_product_id,'product_image'=>$v_product_image, 'product_name'=>$v_product_sku.'<br />'.$v_product_description.'<br />'.$v_material_name.' ('.$v_width.' &times; '.$v_length.') '.$v_material_thickness_value.' '.$v_material_thickness_unit,'tracking_url'=>$v_tracking_url, 'tracking_number'=>$v_tracking_number,'tracking_company'=>$v_tracking_company, 'date_shipping'=> $v_date_shipping,'shipping_status'=>$v_shipping_status, 'delete'=>0);
                                $v_dsp_found.=$v_tmp_location_id.'---'.$a['location_id'].'====';
                            }
                        }
                    }
                    foreach($arr_location as $a){
                        $v_location_id = $a['location_id'];
                        $v_location_name = $a['location_name'];
                        $v_found = false;
                        for($i=0; $i<count($arr_allocation) && !$v_found; $i++){
                            if($arr_allocation[$i]['location_id']==$v_location_id) $v_found = true;
                        }
                        if(!$v_found){
                            $arr_allocation[] = array('location_id'=>$a['location_id'],'location_name'=>$v_location_name,'location_address'=>'', 'location_quantity'=>0, 'location_price'=>0, 'product_id'=>0, 'product_image'=>0, 'product_name'=>'','tracking_url'=>'', 'tracking_number'=>'','tracking_company'=>'', 'date_shipping'=> NULL, 'shipping_status'=>0, 'delete'=>1);
                        }
                    }
                    $v_item_status = $v_product_quantity==0?0:1;
                    if($v_count==$v_total){
                        $arr_order[$v_idx]['allocation'] = $arr_allocation;
                        $arr_order[$v_idx]['status'] = $v_item_status;
                        $arr_order[$v_idx]['description'] = $v_item_status?'Not Allocated':'Already Allocated';
                        $_SESSION['ss_current_order'] = serialize($arr_order);
                        die('{error=0}{message=OK}{allocated='.$v_item_status.'}');
                    }else{
                        die('{error=5}{message=Error to allocate}{allocated=0}');
                    }
                }else{
                    die('{error=1}{message=Not found product}');
                }
            } else{
                die('{error=2}{message=Current order missing}');
            }
        }
    }else{
        die('{error=3}{message=Invalid request data}');
    }
}
else{
    die('{error=4}{message=Empty request data}');
}
?>