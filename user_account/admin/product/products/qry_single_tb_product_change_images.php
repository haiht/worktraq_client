<?php
if(!isset($v_sval)) die();
?>
<?php
$v_product_id = isset($_GET['id'])?$_GET['id']:'0';
$v_product_images_id = isset($_POST['txt_product_image'])?$_POST['txt_product_image']:'0';
//$v_action = isset($_POST['txt_action'])?$_POST['txt_action']:'';
$v_status = isset($_POST['txt_status'])?$_POST['txt_status']:'0';
$v_code = isset($_POST['txt_code'])?$_POST['txt_code']:'';
$v_flag = isset($_POST['txt_flag'])?$_POST['txt_flag']:'';
settype($v_product_images_id, 'int');
settype($v_status, 'int');
if($v_status!=1) $v_status = 0;
add_class('cls_tb_product_images');
$cls_product_images = new cls_tb_product_images($db, LOG_DIR);

if($v_flag!=''){
    if($v_product_images_id>0){
        $v_row = $cls_product_images->select_one(array('product_images_id'=>$v_product_images_id));
        if($v_row==1){
            $v_saved_dir = $cls_product_images->get_saved_dir();
            $v_product_image = $cls_product_images->get_product_image();
            if($v_flag=='delete'){
                $v_ret = $cls_product_images->delete(array('product_images_id'=>$v_product_images_id));
                if($v_ret){
                    if(file_exists($v_saved_dir.$v_product_image)) @unlink($v_saved_dir.$v_product_image);
                    for($i=0; $i<count($arr_product_image_size); $i++){
                        $v_width = $arr_product_image_size[$i];
                        if(file_exists($v_saved_dir.$v_width.'_'.$v_product_image)) unlink($v_saved_dir.$v_width.'_'.$v_product_image);
                    }
                    die(json_encode(array('error'=>0, 'message'=>'Delete image success')));
                }else{
                    die(json_encode(array('error'=>4, 'message'=>'Cannot delete')));
                }
            }else if($v_flag=='active'){
                 $v_ret = $cls_product_images->update_field('status', $v_status, array('product_images_id'=>$v_product_images_id));
                if($v_ret)
                    die(json_encode(array('error'=>0, 'message'=>'Change status success')));
                else
                    die(json_encode(array('error'=>6, 'message'=>'Change status not success')));
            }elseif($v_flag=='type'){
                $v_ret = $cls_product_images->update_field('image_type', $v_status, array('product_images_id'=>$v_product_images_id));
                if($v_ret)
                    die(json_encode(array('error'=>0, 'message'=>'Change status success')));
                else
                    die(json_encode(array('error'=>6, 'message'=>'Change status not success')));
            }else if($v_flag=='savecode'){
                $v_ret = $cls_product_images->update_field('image_code', $v_code, array('product_images_id'=>$v_product_images_id));
                if($v_ret)
                    die(json_encode(array('error'=>0, 'message'=>'Update code success')));
                else
                    die(json_encode(array('error'=>6, 'message'=>'Update code not success')));

            }else{
                die(json_encode(array('error'=>2, 'message'=>'Unknown action')));
            }
        }else{
            die(json_encode(array('error'=>5, 'message'=>'Cannot access this image')));
        }
    }else{
        die(json_encode(array('error'=>3, 'message'=>'Empty ID')));
    }
}else{
    die(json_encode(array('error'=>1, 'message'=>'Not action')));
}
?>