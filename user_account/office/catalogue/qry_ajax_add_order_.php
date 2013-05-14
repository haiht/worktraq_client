<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ANVYINC
 * Date: 11/29/12
 * Time: 12:55 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<?php
if(!isset($v_sval)) die();
$v_session_id = isset($_POST['txt_session_id'])?$_POST['txt_session_id']:'';
$v_product_id = isset($_POST['txt_product_id'])?$_POST['txt_product_id']:0;
settype($v_product_id, 'int');
$v_product_detail = isset($_POST['txt_product_detail'])?$_POST['txt_product_detail']:'';
$v_product_sku = isset($_POST['txt_product_sku'])?$_POST['txt_product_sku']:'';
$v_product_image = isset($_POST['txt_product_image'])?$_POST['txt_product_image']:'';
$v_product_price = isset($_POST['txt_product_price'])?$_POST['txt_product_price']:'0';
settype($v_product_price, 'float');
if($v_product_price<=0) $v_product_price = 1;
$v_product_quantity = isset($_POST['txt_product_quantity'])?$_POST['txt_product_quantity']:'0';
settype($v_product_quantity, 'int');
if($v_product_quantity<=0) $v_product_quantity = 1;
$v_size_width = isset($_POST['txt_size_width'])?$_POST['txt_size_width']:'';
$v_size_height = isset($_POST['txt_size_height'])?$_POST['txt_size_height']:'';
$v_size_unit = isset($_POST['txt_size_unit'])?$_POST['txt_size_unit']:'';
$v_material_id = isset($_POST['txt_material_id'])?$_POST['txt_material_id']:'0';
settype($v_material_id, 'int');
$v_material_name = isset($_POST['txt_material_name'])?$_POST['txt_material_name']:'';
$v_material_thickness_value = isset($_POST['txt_material_thickness_value'])?$_POST['txt_material_thickness_value']:'0';
$v_material_thickness_unit = isset($_POST['txt_material_thickness_unit'])?$_POST['txt_material_thickness_unit']:'';
//settype($v_material_thickness, 'float');
$v_material_color = isset($_POST['txt_material_color'])?$_POST['txt_material_color']:'';
$v_product_text = isset($_POST['txt_product_text'])?$_POST['txt_product_text']:'';
if($v_product_text!=''){
    $v_product_text = stripcslashes($v_product_text);
    $arr_product_text = json_decode($v_product_text);
    //$v_product_text = serialize($arr_product_text);
}else{
    $arr_product_text = array();
}
//if(isset($_SESSION['ss_current_order'])) unset($_SESSION['ss_current_order']);
$v_session_order = '';
if(isset($_SESSION['ss_current_order'])) $v_session_order = $_SESSION['ss_current_order'];
if($v_session_order!='')
       $arr_order = unserialize($v_session_order);
if(!isset($arr_order) || !is_array($arr_order)) $arr_order = array();
$v_count = count($arr_order);
$v_pos = -1;
for($i = 0; ($i < $v_count) && ($v_pos < 0); $i++){
    if($v_product_id==$arr_order[$i]['product_id']) $v_pos = $i;
}
if($v_pos<0) $v_pos = $v_count;


//require 'classes/cls_tb_contact.php';
$cls_tb_contact = new cls_tb_contact($db, LOG_DIR);
$v_user_id = isset($arr_user['user_id'])?$arr_user['user_id']:0;
settype($v_user_id, 'int');

$arr_allocation = array();
//$arr_contact = $cls_tb_contact->select_limit_fields(0,100, array('contact_id', 'location_id'), array('user_id'=>$v_user_id));
$i=0;
$arr_location = $arr_user['location'];
foreach($arr_location as $a){
    if($i==0)
        $arr_allocation[] = array('location_id'=>$a['location_id'],'location_name'=>$a['location_name'],'location_address'=>$a['address_postal'].' - '.$a['address_line_1'],'location_quantity'=>$v_product_quantity, 'location_price'=>$v_product_price, 'product_id'=>$v_product_id,'product_image'=>$v_product_image, 'product_name'=>$v_product_detail.' - '.$v_material_name.' '.$v_material_thickness_value.' '.$v_material_thickness_unit);
    else
        $arr_allocation[] = array('location_id'=>$a['location_id'],'location_name'=>$a['location_name'],'location_address'=>$a['address_postal'].' - '.$a['address_line_1'], 'location_quantity'=>0, 'location_price'=>0, 'product_id'=>0, 'product_image'=>0, 'product_name'=>'');
    $i++;
}

$arr_order[$v_pos] = array(
    'product_id'=>$v_product_id
    ,'product_detail'=>$v_product_detail
    ,'product_sku'=>$v_product_sku
    ,'product_image'=>$v_product_image
    ,'product_price'=>$v_product_price
    ,'product_quantity'=>$v_product_quantity
    ,'size_width'=>$v_size_width
    ,'size_height'=>$v_size_height
    ,'size_unit'=>$v_size_unit
    ,'material_id'=>$v_material_id
    ,'material_name'=>$v_material_name
    ,'material_thickness_value'=>$v_material_thickness_value
    ,'material_thickness_unit'=>$v_material_thickness_unit
    ,'material_color'=>$v_material_color
    ,'product_text'=>$arr_product_text
    ,'allocation'=>$arr_allocation
    ,'status'=>0
	,'order'=>0
);
$_SESSION['ss_current_order'] = serialize($arr_order);
die("{error=0}{message=OK".$v_product_detail."}")           ;
?>