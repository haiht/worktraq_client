<?php
if(!isset($v_sval)) die();
$v_session_id = isset($_POST['txt_session_id'])?$_POST['txt_session_id']:'';
$v_product_id = isset($_POST['txt_product_id'])?$_POST['txt_product_id']:0;
$v_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:0;
$v_image_id = isset($_POST['txt_image_id'])?$_POST['txt_image_id']:0;
$v_image_url = isset($_POST['txt_image_url'])?$_POST['txt_image_url']:'';
$v_order_item_id = isset($_POST['txt_order_item_id'])?$_POST['txt_order_item_id']:0;
settype($v_product_id, 'int');
settype($v_image_id, 'int');
settype($v_order_id, 'int');
settype($v_order_item_id, 'int');
if($v_product_id<0) $v_product_id = 0;
if($v_order_id<0) $v_order_id = 0;
if($v_order_item_id<0) $v_order_item_id = 0;
$_SESSION['ss_upload_image_product'] = $v_product_id;
if($v_order_id>0)
{
    $v_row = 0;
    if($v_order_item_id>0){
        $v_row = $cls_tb_order_items->select_one(array('order_item_id'=>$v_order_item_id));
    }else{
        $v_row = $cls_tb_order_items->select_one(array('order_id'=>$v_order_id, 'product_id'=>$v_product_id));
    }
    if($v_row==1)
    {
        $arr_order_item = array(
        'product_id'=>$cls_tb_order_items->get_product_id()
        ,'order_id'=>$cls_tb_order_items->get_order_id()
        ,'package_type'=>$cls_tb_order_items->get_package_type()
        ,'product_detail'=>''
        ,'product_sku'=>$cls_tb_order_items->get_product_code()
        ,'product_image'=>$cls_tb_order_items->get_graphic_file()
        ,'product_image_id'=>$cls_tb_order_items->get_graphic_id()
        ,'product_price'=>$cls_tb_order_items->get_current_price()
        ,'product_quantity'=>$cls_tb_order_items->get_quantity()
        ,'size_width'=>$cls_tb_order_items->get_width()
        ,'size_length'=>$cls_tb_order_items->get_length()
        ,'size_unit'=>$cls_tb_order_items->get_unit()
        ,'material_id'=>$cls_tb_order_items->get_material_id()
        ,'material_name'=>$cls_tb_order_items->get_material_name()
        ,'material_thickness_value'=>$cls_tb_order_items->get_material_thickness_value()
        ,'material_thickness_unit'=>$cls_tb_order_items->get_material_thickness_unit()
        ,'current_size_option'=>$cls_tb_order_items->get_current_size_option()
        ,'current_image_option'=>$cls_tb_order_items->get_current_image_option()
        ,'current_text_option'=>$cls_tb_order_items->get_current_text_option()
        ,'material_color'=>$cls_tb_order_items->get_material_color()
        ,'product_text'=>$cls_tb_order_items->get_text()
        ,'allocation'=>$cls_tb_order_items->get_allocation()
        ,'status'=>0
        ,'order'=>0
        );
        $v_product_extra = json_encode($arr_order_item);
        $v_product_extra = str_replace('{','&ldquo;', $v_product_extra);
        $v_product_extra = str_replace('}','&rdquo;', $v_product_extra);

    }else
        $v_product_extra='';
}else{
    if(isset($_SESSION['ss_current_order'])){
        $v_current_order = $_SESSION['ss_current_order'];
        $arr_order = unserialize($v_current_order);

        if(isset($arr_order) && is_array($arr_order)){
            $v_pos = -1;
            for($i=0; ($i<count($arr_order) && ($v_pos<0)); $i++){
                if($v_product_id==$arr_order[$i]['product_id']){
                    $v_pos = $i;
                }
            }
            if($v_pos>=0){
                $v_product_extra = json_encode($arr_order[$v_pos]);
                $arr_order_item = $arr_order[$v_pos];
                $v_product_extra = str_replace('{','&ldquo;', $v_product_extra);
                $v_product_extra = str_replace('}','&rdquo;', $v_product_extra);
            }
        }
    }
}
require 'classes/cls_tb_product.php';
require 'classes/cls_tb_product_images.php';
require 'classes/cls_tb_material.php';
$cls_product = new cls_tb_product($db, LOG_DIR);
$cls_images = new cls_tb_product_images($db, LOG_DIR);
$cls_material = new cls_tb_material($db, LOG_DIR);
$arr = $cls_product->select_one_array($cls_material, array('product_id'=>$v_product_id));
$arr["graphic_id"] = $v_image_id;
$arr_choose_image = array();
$arr_choose_image[0] = array('value'=>0,'image'=>$arr['image_url'], 'file'=>$arr['image_file'], 'text'=>'Product Img', 'selected'=>$v_image_id==0?1:0);
if($v_image_id>0){
    $arr["image_file"] = $cls_images->select_scalar('product_image', array('image_id'=>$v_image_id));
    $arr['image_url'] = $v_image_url;
}
if($cls_product->get_package_image_choose($cls_images, $v_product_id)){
    $arr_images  = $cls_images->select(array('product_id'=>$v_product_id, 'image_type'=>1, 'status'=>0, 'user_type'=>0));
    foreach($arr_images as $ay){
        $v_saved_dir = $ay['saved_dir'];
        $v_image_code = isset($ay['image_code'])?$ay['image_code']:'';
        $v_product_images_id =$ay['product_images_id'];
        $v_image_selected = $v_image_id==$v_product_images_id;
        $v_image_low = $ay['low_res_image'];
        $v_image_file = $ay['product_image'];
        if(strrpos($v_saved_dir, '/')!==strlen($v_saved_dir)-1) $v_saved_dir .= '/';
        $v_image_url = $v_saved_dir.$v_image_low;
        $v_len = count($arr_choose_image);
        $arr_choose_image[$v_len] = array('value'=>$v_product_images_id,'image'=>$v_image_url, 'file'=>$v_image_file, 'text'=>$v_image_code, 'selected'=>$v_image_selected?1:0);
    }
}
if(count($arr_choose_image)>1){
    $arr['image_change'] = 1;
}else{
    $arr['image_change'] = 0;
}
if(is_array($arr)){
    $v_json = json_encode($arr);
    $v_json = str_replace('{','&ldquo;', $v_json);
    $v_json = str_replace('}','&rdquo;', $v_json);
    $v_image = json_encode($arr_choose_image);
    $v_image = str_replace('{','&ldquo;', $v_image);
    $v_image = str_replace('}','&rdquo;', $v_image);
    $arr_return = array(
        'error'=>0
    ,'message'=>'OK'
    ,'product'=>$arr
    ,'item'=>isset($arr_order_item)?$arr_order_item:array()
    ,'image'=>$arr_choose_image
    );
    $temp_late = json_encode($arr_return);
    echo $temp_late;
}else{
    die(json_encode(array('error'=>1, 'message'=>'Error: '.$v_product_id)));
}
?>