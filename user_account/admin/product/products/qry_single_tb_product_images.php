<?php
if(!isset($v_sval)) die();
?>
<?php
$v_product_id = isset($_GET['id'])?$_GET['id']:NULL;
settype($v_product_id, 'int');
$v_upload_url = URL.$v_admin_key.'/'.$v_product_id.'/upload';
$v_change_url = URL.$v_admin_key.'/'.$v_product_id.'/cimages';
$v_company_id = '';
$v_location_id = '';
if($v_product_id>0){
    $v_company_dir = PRODUCT_IMAGE_DIR;
    $v_company_id = $cls_tb_product->select_scalar('company_id', array('product_id'=>$v_product_id));
    $v_location_id = $cls_tb_product->select_scalar('location_id', array('product_id'=>$v_product_id));
    if($v_company_id>0){
        $v_company_code = $cls_tb_company->select_scalar('company_code', array('company_id'=>$v_company_id));

        if($v_company_code!=''){
            if(file_exists($v_company_dir.DS.$v_company_code) || @mkdir($v_company_dir.DS.$v_company_code)){
                $v_company_dir .= '/'.$v_company_code;
                if(file_exists($v_company_dir.DS.'products') || @mkdir($v_company_dir.DS.'products')){
                    $v_company_dir .= '/'.'products';
                }
            }
            if(file_exists($v_company_dir.DS.$v_product_id) || @mkdir($v_company_dir.DS.$v_product_id)){
                $v_company_dir .= '/'.$v_product_id;
            }
            $v_company_dir .= '/';

        }
    }
    $v_upload_dir = str_replace(ROOT_DIR.DS,'', $v_company_dir);
    add_class('cls_tb_product_images');
    $cls_product_images = new cls_tb_product_images($db, LOG_DIR);
    $v_dsp_list_images = '';
    $arr_images = $cls_product_images->select(array('product_id'=>$v_product_id));
    foreach($arr_images as $arr){
        $v_product_images_id = $arr['product_images_id'];
        $v_saved_dir = $arr['saved_dir'];
        $v_low_res_image = $arr['low_res_image'];
        $v_status = $arr['status'];
        $v_image_type = $arr['image_type'];
        $v_product_image = $arr['product_image'];
        $v_image_code = isset($arr['image_code'])?$arr['image_code']:'';

        $v_dsp_list_images.='<div class="div_image">';
        $v_dsp_list_images.='<img title="'.($v_status==0?'Go Active':'Go Inactive').'" id="img_enable_'.$v_product_images_id.'" src="images/icons/add.png" class="icon"'.($v_status==0?' style="display:none"':'').' onclick="change_status(this,'.$v_product_images_id.',\''.$v_product_image.'\',0 ,\'active\')" />';
        $v_dsp_list_images.='<img title="'.($v_status!=0?'Go Inactive':'Go Active').'" id="img_disable_'.$v_product_images_id.'" src="images/icons/delete.png" class="icon"'.($v_status!=0?' style="display:none"':'').' onclick="change_status(this,'.$v_product_images_id.',\''.$v_product_image.'\',1 ,\'active\')" />';
        $v_dsp_list_images.='<img title="'.($v_image_type==0?'Go product image':'Go sample image').'" id="img_product_'.$v_product_images_id.'" src="images/icons/package_add.png" class="icon"'.($v_image_type==0?' style="display:none"':'').' onclick="change_status(this,'.$v_product_images_id.',\''.$v_product_image.'\',0 ,\'type\')" />';
        $v_dsp_list_images.='<img title="'.($v_image_type!=0?'Go sample image':'Go product image').'" id="img_sample_'.$v_product_images_id.'" src="images/icons/package_delete.png" class="icon"'.($v_image_type!=0?' style="display:none"':'').' onclick="change_status(this,'.$v_product_images_id.',\''.$v_product_image.'\',1 ,\'type\')" />';

        //$v_dsp_list_images.='<a href="'.URL.'admin/product/hot-spot/'.$v_product_images_id.'/edit" target="_parent" title="Create hot spot"><img src="images/icons/map_edit.png" class="icon" /></a>';

        $v_dsp_list_images.='<img title="Delete image" id="img_delete_'.$v_product_images_id.'" src="images/icons/cancel.png" class="icon" onclick="delete_image(this,'.$v_product_images_id.',\''.$v_product_image.'\', 0, \'delete\')" />';
        $v_dsp_list_images.='<input type="text" value="'.$v_image_code.'" placeholder="Image Code" id="txt_savecode_'.$v_product_images_id.'" class="txt_code" onchange="save_code(this,'.$v_product_images_id.',\''.$v_product_image.'\', \'savecode\')" />';
        $v_dsp_list_images.='<img class="thumb" src="'.$v_saved_dir.$v_low_res_image.'" title="'.$v_product_image.'" /></div>';
    }
}
?>