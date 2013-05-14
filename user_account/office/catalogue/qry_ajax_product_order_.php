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
$v_order_id = isset($_POST['txt_order_id'])?$_POST['txt_order_id']:0;
settype($v_product_id, 'int');
settype($v_order_id, 'int');

if(isset($_SESSION['ss_current_order'])){
    $v_current_order = $_SESSION['ss_current_order'];
    $arr_order = unserialize($v_current_order);
}
if(isset($arr_order) && is_array($arr_order)){
    $v_pos = -1;
    for($i=0; ($i<count($arr_order) && ($v_pos<0)); $i++){
        if($v_product_id==$arr_order[$i]['product_id']){
            $v_pos = $i;
        }
    }
    if($v_pos>=0){
        $v_product_extra = json_encode($arr_order[$v_pos]);
        $v_product_extra = str_replace('{','&ldquo;', $v_product_extra);
        $v_product_extra = str_replace('}','&rdquo;', $v_product_extra);
    }
}
require 'classes/cls_tb_product.php';
require 'classes/cls_tb_material.php';
$cls_product = new cls_tb_product($db, LOG_DIR);
$cls_material = new cls_tb_material($db, LOG_DIR);

$arr = $cls_product->select_one_array($cls_material, array('product_id'=>$v_product_id));
//die("{error=0}{message=@#$%###############: Array: ".is_array($arr)."}");

if(is_array($arr)){
    $v_json = json_encode($arr);
    $v_json = str_replace('{','&ldquo;', $v_json);
    $v_json = str_replace('}','&rdquo;', $v_json);
    die("{error=0}{message=".$v_json."}{product=".(isset($v_product_extra)?$v_product_extra:'')."}");
}else{
    die("{error=1}{message=Error: ".$v_product_id."}");
}
?>