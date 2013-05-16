<?php
if(!isset($v_sval)) die();
?>
<?php
$v_request_product_id = isset($_POST['txt_product_id'])?$_POST['txt_product_id']:0;
$v_request_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:0;
$v_request_order_item_id = isset($_POST['txt_order_item_id'])?$_POST['txt_order_item_id']:0;
settype($v_request_order_id, 'int');
settype($v_request_order_item_id, 'int');
settype($v_request_product_id, 'int');
if($v_request_order_id<0) $v_request_order_id = 0;
if($v_request_order_item_id<0) $v_request_order_item_id = 0;
if($v_request_product_id<0) $v_request_product_id=0;

add_class('cls_tb_product');
$cls_tb_product = new cls_tb_product($db, LOG_DIR);

$v_product_excluded_location = $cls_tb_product->select_scalar('excluded_location', array('product_id'=>$v_request_product_id));
if($v_product_excluded_location!='') $v_product_excluded_location .= ',';

if($v_request_order_id==0){
    if(isset($_SESSION['ss_current_order'])){
        $arr_order = unserialize($_SESSION['ss_current_order']);

        $arr_location = array();
        $v_idx=-1;

        $v_product_name = '';
        $v_product_quantity = 0;
        $v_product_price = 0;
        for($i=0; $i<count($arr_order) && $v_idx==-1;$i++){
            $v_product_id = $arr_order[$i]['product_id'];
            if($v_product_id==$v_request_product_id){
                $v_product_name = $arr_order[$i]['product_sku'].' - '.$arr_order[$i]['material_name'].' '.$arr_order[$i]['material_thickness_value'].' '.$arr_order[$i]['material_thickness_unit'];
                $v_product_quantity = $arr_order[$i]['product_quantity'];
                $v_product_price = $arr_order[$i]['product_price'];
                $v_idx = $i;
            }
        }
        $arr_user_location = $arr_user['location'];
        $arr_tmp_location = array();
        for($i=0; $i<count($arr_user_location);$i++)
            $arr_tmp_location[$arr_user_location[$i]['location_id']] = $arr_user_location[$i]['location_number'];

        $arr_location = $arr_order[$v_idx]['allocation'];
        $arr_allocation = array();
        for($i=0;$i<count($arr_location);$i++){
            $arr_allocation[] = array(
                'location_id'=>$arr_location[$i]['location_id']
            ,'location_name'=>$arr_location[$i]['location_name']
            ,'location_number'=>$arr_tmp_location[$arr_location[$i]['location_id']]
            ,'quantity'=>$arr_location[$i]['location_quantity']
            );
        }
        $arr_allocation = record_sort($arr_allocation, 'location_number');
        $arr_location = array(
            'product_id'=>$v_product_id
        ,'product_name'=>$v_product_name
        ,'product_quantity'=>$v_product_quantity
        ,'product_price'=>$v_product_price
        ,'allocation'=>$arr_allocation
        );

        $v_json = json_encode($arr_location);
        $v_json = str_replace('{','&ldquo;', $v_json);
        $v_json = str_replace('}','&rdquo;', $v_json);
        die('{error=0}{message='.$v_json.'}');
    }else{
        die("{error=1}{message=Error}");
    }
}else{
    $arr_location = array();
    if($v_request_order_item_id>0){
        $v_order_user_name = $cls_tb_order->select_scalar('user_name', array('order_id'=>$v_request_order_id));
        if($v_order_user_name==$arr_user['user_name'])
            $arr_user_location = $arr_user['location'];
        else{
            $arr_user_location = array();
            add_class('cls_tb_user');
            $cls_user = new cls_tb_user($db, LOG_DIR);
            //$v_tmp_location_allocate = $cls_user->select_scalar('user_location_allocate', array('user_name'=>$v_order_user_name));
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
                add_class('cls_tb_location');
                $cls_location = new cls_tb_location($db, LOG_DIR);
                $arr_user_location = $cls_location->select($arr_where_clause);
                $arr_temp = array();
                foreach($arr_user_location as $a){
                    $arr_temp[] = $a;
                }
                $arr_user_location = $arr_temp;

            }

        }

        $arr_tmp_allocation = array();
        for($i=0; $i<count($arr_user_location); $i++){
            $v_location_id = $arr_user_location[$i]['location_id'];
            if(strpos($v_product_excluded_location,$v_location_id.',')===false)//this location not in excluded list
                $arr_tmp_allocation[] = array('location_id'=>$v_location_id, 'location_name'=>$arr_user_location[$i]['location_name'], 'location_number'=>$arr_user_location[$i]['location_number'], 'quantity'=>0);
        }
        $v_row = $cls_tb_order_items->select_one(array('order_item_id'=>$v_request_order_item_id));
        if($v_row==1){
            $v_product_id = $cls_tb_order_items->get_product_id();
            $v_product_name = $cls_tb_order_items->get_product_code().' - '.$cls_tb_order_items->get_material_name().' '.$cls_tb_order_items->get_material_thickness_value().' '.$cls_tb_order_items->get_material_thickness_unit();
            $v_product_quantity = $cls_tb_order_items->get_quantity();
            $v_product_price = $cls_tb_order_items->get_current_price();
            $arr_allocation = $cls_tb_order_items->get_allocation();
            //$arr_location[0] = array('product_id'=>$v_product_id, 'product_detail'=>$v_product_name, 'product_quantity'=>$v_product_quantity, 'product_price'=>$v_product_price, 'location'=>array(), 'allocation'=>$arr_tmp_allocation);
            for($i=0; $i<count($arr_allocation); $i++){
                $v_location_id = $arr_allocation[$i]['location_id'];
                $v_location_name = $arr_allocation[$i]['location_name'];
                $v_location_quantity = $arr_allocation[$i]['location_quantity'];
                $v_location_price = $arr_allocation[$i]['location_price'];

                $v_found = false;
                for($j=0; $j<count($arr_tmp_allocation) && !$v_found;$j++){
                    if($arr_tmp_allocation[$j]['location_id']==$v_location_id){
                        $v_found = true;
                        $arr_tmp_allocation[$j]['quantity'] = $v_location_quantity;
                    }
                }
            }
            $arr_tmp_allocation = record_sort($arr_tmp_allocation, 'location_number');
            $arr_location = array(
                'product_id'=>$v_product_id
            ,'product_name'=>$v_product_name
            ,'product_quantity'=>$v_product_quantity
            ,'product_price'=>$v_product_price
            ,'allocation'=>$arr_tmp_allocation
            );

            $v_json = json_encode($arr_location);


            $v_json = str_replace('{','&ldquo;', $v_json);
            $v_json = str_replace('}','&rdquo;', $v_json);

            die('{error=0}{message='.$v_json.'}');
        }else{
            die('{error=2}{message=Cannot load allocation for current order item.}');
        }
    }else{
        die('{error=3}{message=Invalid order item id.}');
    }
}
?>