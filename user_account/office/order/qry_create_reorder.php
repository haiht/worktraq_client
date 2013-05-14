<?php
if(!isset($v_sval)) die();
$v_selected_order_id = isset($_GET['txt_order'])?$_GET['txt_order']:'0';
settype($v_selected_order_id, 'int');
$v_redirect = !($v_selected_order_id>0);
if($v_redirect){
    $_SESSION['ss_error_title'] = 'These orders have been invalid!';
    $_SESSION['ss_error_info'] = 'These orders have been invalid!';
    $_SESSION['ss_error_referrer'] = URL.'order/';
    redir(URL.'error/');
}
$arr_where = array('order_id'=>$v_selected_order_id, 'company_id'=>isset($v_company_id)?$v_company_id:0);
$v_row = $cls_tb_order->select_one($arr_where);
if($v_row!=1){
    $_SESSION['ss_error_title'] = 'Cannot access!';
    $_SESSION['ss_error_info'] = 'These orders are not found! They has been delete or you not have permission to view them.';
    $_SESSION['ss_error_referrer'] = URL.'order/';
    redir(URL.'error/');
}
require 'classes/cls_tb_product.php';
$cls_tb_location = new cls_tb_location($db, LOG_DIR);
$cls_tb_product = new cls_tb_product($db, LOG_DIR);
$v_default_location = $arr_user['location_default'];
if($v_default_location<=0){
    $arr_where = array('company_id'=>isset($v_company_id)?$v_company_id:0, array('location_id'=>array('$gt'=>0)));
    $cls_tb_location = new cls_tb_location($db, LOG_DIR);
    $v_row = $cls_tb_location->select_one($arr_where);
    if($v_row==1) $v_default_location = $cls_tb_location->get_location_id();
}
//echo 'L: '.$v_default_location;
//die();
$v_have_trouble = 0;
if(isset($_SESSION['order_id'])) unset($_SESSION['order_id']);
if($v_default_location>0){
    $v_row = $cls_tb_location->select_one(array('location_id'=>$v_default_location));
    if($v_row==1){

        $arr_order = array();
        $v_order_index = 0;
        $arr_order_item = $cls_tb_order_items->select(array('order_id'=>$v_selected_order_id));
        foreach($arr_order_item as $arr){
            $v_status = 0;
            $v_description = '';
            $v_order_item_id = $arr['order_item_id'];
            $v_product_id = $arr['product_id'];
            $v_package_type = isset($arr['package_type'])?$arr['package_type']:0;
            $v_product_code = isset($arr['product_code'])?$arr['product_code']:'';
            $v_graphic_id = isset($arr['graphic_id'])?$arr['graphic_id']:0;
            $v_product_description = isset($arr['product_description'])?$arr['product_description']:'';

            $v_quantity = isset($arr['quantity'])?$arr['quantity']:1;
            $v_width = isset($arr['width'])?$arr['width']:0;
            $v_length = isset($arr['length'])?$arr['length']:0;
            $v_unit = isset($arr['unit'])?$arr['unit']:'';
            $v_price = isset($arr['current_price'])?$arr['current_price']:0;
            $v_graphic_file = isset($arr['graphic_file'])?$arr['graphic_file']:'';

            $v_material_name = isset($arr['material_name'])?$arr['material_name']:'';
            $v_material_id = isset($arr['material_id'])?$arr['material_id']:0;
            $v_material_thickness_value = isset($arr['material_thickness_value'])?$arr['material_thickness_value']:0;
            $v_material_thickness_unit = isset($arr['material_thickness_unit'])?$arr['material_thickness_unit']:'';
            $v_material_color = isset($arr['material_color'])?$arr['material_color']:'White';

            $v_product_image_option = isset($arr['product_image_option'])?$arr['product_image_option']:0;
            $v_product_size_option = isset($arr['product_size_option'])?$arr['product_size_option']:0;
            $v_product_text_option = isset($arr['product_text_option'])?$arr['product_text_option']:0;
            $v_current_text_option = isset($arr['current_text_option'])?$arr['current_text_option']:0;
            $v_current_image_option = isset($arr['current_image_option'])?$arr['current_image_option']:0;
            $v_current_size_option = isset($arr['current_size_option'])?$arr['current_size_option']:0;
            $v_custom_image_path = isset($arr['custom_image_path'])?$arr['custom_image_path']:'';

            $arr_text = isset($arr['text'])?$arr['text']:array();
            //$v_row = $cls_tb_product->select_one(array('product_id'=>$v_product_id, '$or'=>array(array('status'=>2), array('status'=>3))));
            $v_row = $cls_tb_product->select_one(array('product_id'=>$v_product_id));
            if($v_row==1){
                $v_product_sku = $cls_tb_product->get_product_sku();
                $v_product_image = $cls_tb_product->get_image_file();
                $v_product_price = $cls_tb_product->get_default_price();
                $v_product_detail = $cls_tb_product->get_product_detail();
                $v_product_image_option = $cls_tb_product->get_image_option();
                $v_product_text_option = $cls_tb_product->get_text_option();
                $v_product_size_option = $cls_tb_product->get_size_option();
                $v_product_status = $cls_tb_product->get_product_status();
                //$arr_product_size = $cls_tb_product->get_size();
                $arr_product_text = $cls_tb_product->get_text();
                //$arr_size = $cls_tb_product->get_size();
                $arr_material = $cls_tb_product->get_material();

                $arr_product_size = array();
                $arr_size = array();
                for($i=0; $i<count($arr_material); $i++){
                    $arr_product_size[$i] = array('width'=>$arr_material[$i]['width'], 'length'=>$arr_material[$i]['length'], 'unit'=>$arr_material[$i]['usize']);
                    $arr_size[$i] = array('width'=>$arr_material[$i]['width'], 'length'=>$arr_material[$i]['length'], 'unit'=>$arr_material[$i]['usize']);
                }

                if(!in_array($v_product_status, array(2,3))){
                    $v_status = 1;
                    $v_have_trouble = 1;
                    $v_description = 'Product is '.$cls_settings->get_option_name_by_id('product_status', $v_product_status);
                }
                if($v_current_size_option==1){
                    if($v_product_size_option==0){
                        $v_description = 'Size of product is not allowed customize';
                        if(count($arr_size)>0){
                            $v_width = $arr_size[0]['width'];
                            $v_length = $arr_size[0]['length'];
                            $v_unit = $arr_size[0]['unit'];
                        }
                    }
                }else{
                    if(count($arr_size)>0){
                        $v_pos = -1;
                        for($i=0; $i<count($arr_size); $i++){
                            if($v_width==$arr_size[$i]['width'] && $v_length==$arr_size[$i]['length'] && $v_unit==$arr_size[$i]['unit']){
                                $v_width = $arr_size[$i]['width'];
                                $v_length = $arr_size[$i]['length'];
                                $v_unit = $arr_size[$i]['unit'];
                                $v_pos = $i;
                            }
                        }
                        if($v_pos<0){
                            $v_description = 'The old size is not available!';
                            $v_width = $arr_size[0]['width'];
                            $v_length = $arr_size[0]['length'];
                            $v_unit = $arr_size[0]['unit'];
                        }
                    }else{
                        $v_width = 0;
                        $v_length = 0;
                        $v_unit = 0;
                        $v_status = 1;
                        $v_have_trouble = 1;
                        $v_description = 'This product has not any size!';
                    }
                }
                if($v_current_image_option==1){
                    if($v_product_image_option==0){
                        $v_current_image_option = 0;
                        $v_description = 'Not allow change image!';
                        $v_graphic_file = $v_product_image;
                    }
                }
                if($v_current_text_option==1){
                    if($v_product_text_option==0){
                        $v_current_text_option = 0;
                        $v_description = 'Not allow change text';
                        $arr_text = $arr_product_text;
                    }
                }
                if(count($arr_material)>0){
                    $v_pos = -1;
                    for($i=0; $i<count($arr_material);$i++){
                        if($v_material_id == $arr_material[$i]['id'] && $v_material_name == $arr_material[$i]['name'] && $v_material_thickness_value==$arr_material[$i]['thick'] && $v_material_thickness_unit == $arr_material[$i]['uthick']){
                            $v_pos = $i;
                            $v_product_price = $arr_material[$i]['price'];
                        }
                    }
                    if($v_pos<0){
                        $v_material_id = $arr_material[0]['id'];
                        $v_material_name = $arr_material[0]['name'];
                        $v_material_thickness_value = $arr_material[0]['thick'];
                        $v_material_thickness_unit = $arr_material[0]['uthick'];
                        $v_product_price = $arr_material[0]['price'];
                        $v_description = 'The old material not available';
                    }
                }else{
                    $v_status = 1;
                    $v_have_trouble = 1;
                    $v_description = 'Not any material';
                }
                if($v_price!=$v_product_price){
                    $v_description = ($v_description==''?'':$v_description.'<br />').'Price ';
                    if($v_price > $v_product_price)
                        $v_description .= 'decreases '.$v_sign_money.abs($v_product_price-$v_price);
                    else
                        $v_description .= 'increases '.$v_sign_money.abs($v_product_price-$v_price);
                    $v_price = $v_product_price;
                }

            }

            $arr_allocation = array();
            $arr_allocation[] = array('location_id'=>$v_default_location,
                'location_name'=>$cls_tb_location->get_location_name(),
                'location_address'=> $cls_tb_location->get_address_unit().'  '. $cls_tb_location->get_address_line_1() .'<br>'. $cls_tb_location->get_address_city() . ' ' . $cls_tb_location->get_address_province() . ' ' . $cls_tb_location->get_address_postal() ,
                'location_quantity'=>$v_quantity,
                'location_price'=>$v_price,
                'product_id'=>$v_product_id,
                'product_image'=>$v_graphic_file,
                'product_name'=>$v_product_code.' - '.$v_material_name.' '.$v_material_thickness_value.' '.$v_material_thickness_unit,
                'tracking_url'=>'',
                'tracking_number'=>'',
                'tracking_company'=>'',
                'date_shipping'=> new MongoDate(time()),
                'delete'=>0
            );

            $arr_order[$v_order_index++] = array(
                'product_id'=>$v_product_id
                ,'package_type'=>$v_package_type
                ,'order_id'=>0//$v_selected_order_id
                ,'graphic_id'=>$v_graphic_id
                ,'product_description'=>$v_product_description
                ,'product_detail'=>isset($v_product_detail)?$v_product_detail:''
                ,'product_sku'=>isset($v_product_sku)?$v_product_sku:$v_product_code
                ,'product_image'=>$v_graphic_file
                ,'product_price'=>$v_price
                ,'product_quantity'=>$v_quantity
                ,'size_width'=>$v_width
                ,'size_length'=>$v_length
                ,'size_unit'=>$v_unit
                ,'material_id'=>$v_material_id
                ,'material_name'=>$v_material_name
                ,'material_thickness_value'=>$v_material_thickness_value
                ,'material_thickness_unit'=>$v_material_thickness_unit
                ,'material_color'=>$v_material_color
                ,'product_text'=>$arr_text
                ,'allocation'=>$arr_allocation
                ,'status'=>1//$v_status
                ,'order'=>0
                ,'product_image_option'=>$v_product_image_option
                ,'product_size_option'=>$v_product_size_option
                ,'product_text_option'=>$v_product_text_option
                ,'current_text_option'=>$v_current_text_option
                ,'current_image_option'=>$v_current_image_option
                ,'current_size_option'=>$v_current_size_option
                ,'custom_image_path'=>$v_custom_image_path
                ,'description'=>'Not allocated'//$v_description
            );
        }


        $_SESSION['ss_current_order'] = serialize($arr_order);

        $v_order_information = 'Current orders have been created from order <a style="color:#0088CC" href="'.URL.'order/'.$v_selected_order_id.'/view" target="_blank">#';
        $v_order_information .= $cls_tb_order->get_po_number().'</a>, which had created at '.date('d-M-Y H:i:s',$cls_tb_order->get_date_created());
        $v_order_information .= '<br />All items have been allocated to default location. You need to allocate every item if it is necessary.';
        if($v_have_trouble){
            $v_order_information .= ' Maybe one of items has been invalid by a variety of reasons. See details below and Fix them before saving!!!';
        }
        $_SESSION['ss_new_order_info'] = $v_order_information;
    }
}
?>