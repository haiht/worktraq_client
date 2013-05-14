<?php
if(!isset($v_sval)) die();
?>
<?php
$v_product_images_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_product_images_id, 'int');
$arr_return = array('error'=>0, 'message'=>'');
if($v_product_images_id>0){
    $v_map_content = isset($_POST['txt_map_content'])?$_POST['txt_map_content']:'';
    if($v_map_content!=''){
        if(get_magic_quotes_gpc()) $v_map_content = stripcslashes($v_map_content);
        $arr_map_content = json_decode($v_map_content, true);

        $arr_map_images = array();

        $v_row = $cls_tb_product_images->select_one(array('product_images_id'=>$v_product_images_id));
        if($v_row==1){
            $v_image = $cls_tb_product_images->get_product_image();
            $v_dir = $cls_tb_product_images->get_saved_dir();
            $v_company_id = $cls_tb_product_images->get_company_id();
            $v_location_id = $cls_tb_product_images->get_location_id();
            if(strrpos($v_dir,'/')!==strlen($v_dir)-1) $v_dir.='/';
            if(file_exists($v_dir.PRODUCT_IMAGE_NORMAL.'_'.$v_image)){
                $v_url = $v_dir.PRODUCT_IMAGE_NORMAL.'_'.$v_image;
                $v_image = PRODUCT_IMAGE_NORMAL.'_'.$v_image;
            }else
                $v_url = $v_dir.$v_image;
            $v_image1 = 'map1_'.$v_image;
            $v_image2 = 'map2_'.$v_image;
            if(file_exists($v_dir.$v_image)){
                list($w, $h, $t) = getimagesize($v_dir.$v_image);
                //images_resize_by_width($w, $v_dir.$v_image, $v_dir.$v_image1);
                //images_resize_by_width($w, $v_dir.$v_image, $v_dir.$v_image2);

                $im1 = @imagecreatefromjpeg($v_dir.$v_image);
                $im2 = @imagecreatefromjpeg($v_dir.$v_image);
                imagefilter($im1, IMG_FILTER_GRAYSCALE, IMG_FILTER_CONTRAST, IMG_FILTER_COLORIZE,IMG_FILTER_COLORIZE);
                imagejpeg($im1, $v_dir.$v_image1);
                imagefilter($im2, IMG_FILTER_EMBOSS, IMG_FILTER_CONTRAST, IMG_FILTER_COLORIZE,IMG_FILTER_COLORIZE);
                imagejpeg($im2, $v_dir.$v_image2);
                imagedestroy($im1);
                imagedestroy($im2);
                $arr_map_images = array('image'=>$v_dir.$v_image, 'image1'=>$v_dir.$v_image1, 'image2'=>$v_dir.$v_image2);
            }

        }
        /*$arr_save = array();
        for($i=0; $i<count($arr_map_content); $i++){
            $arr_save[] = array(
                'product_id'=>isset($arr_map_content[$i]['product_id'])?$arr_map_content[$i]['product_id']:0
                ,'product_name'=>isset($arr_map_content[$i]['product_name'])?$arr_map_content[$i]['product_name']:''
                ,'product_image'=>isset($arr_map_content[$i]['product_image'])?$arr_map_content[$i]['product_image']:''
                ,'product_url'=>isset($arr_map_content[$i]['product_url'])?$arr_map_content[$i]['product_url']:''
                ,'map_shape'=>isset($arr_map_content[$i]['map_shape'])?$arr_map_content[$i]['map_shape']:'rect'
                ,'map_coords'=>isset($arr_map_content[$i]['map_coords'])?$arr_map_content[$i]['map_coords']:'0,0,0,0'
                ,'map_key'=>isset($arr_map_content[$i]['map_key'])?$arr_map_content[$i]['map_key']:''
            );
        }
        */
        if(!is_array($arr_map_content)) $arr_map_content = array();

        $v_ret = $cls_tb_product_images->update_fields(array('map_content', 'map_images', 'hot_spot'), array($arr_map_content, $arr_map_images, 1), array('product_images_id'=>$v_product_images_id));
        if($v_ret){
            $arr_return['error']=0;
            $arr_return['message']='OK!';

        }else{
            $arr_return['error']=3;
            $arr_return['message']='Cannot update!';
        }
    }else{
        $arr_return['error']=2;
        $arr_return['message']='Empty data!';
    }
}else{
    $arr_return['error']=1;
    $arr_return['message']='Get negative ID!';
}
die(json_encode($arr_return));
?>