<?php if (!isset($v_sval)) die(); ?>
<?php
$v_area_id = isset($_REQUEST['txt_area_id']) ? $_REQUEST['txt_area_id'] : 0;
$v_image_id = isset($_REQUEST['txt_image_id']) ? $_REQUEST['txt_image_id'] : 0;
$arr_where = array('location_id'=>(int)$v_area_id );
$cls_tb_location_area->select_one(array('area_id'=>(int)$v_area_id));

$arr_area_image = array();
$v_location_id = $cls_tb_location_area->get_location_id();
$v_area_id = $cls_tb_location_area->get_area_id();
$arr_image = $cls_tb_location_area->get_area_image();
$v_image_name = '';
$arr_temp_images = array();
foreach ($arr_image as $arr) {
    $v_tmp_image_id = isset($arr['image_id']) ? $arr['image_id'] : 0;
    $v_tmp_image_file = isset($arr['image_file']) ? $arr['image_file'] : '';
    $v_tmp_image_html = isset($arr['image_html']) ? $arr['image_html'] : '';

    if($v_tmp_image_id!=$v_image_id)
        $arr_area_image[]= array('image_id'=>$v_tmp_image_id,'image_file'=> $v_tmp_image_file,'image_html'=>$v_tmp_image_html);
    else
        $v_image_name = $v_tmp_image_file;
}

$cls_tb_location_area->update_field('area_image',$arr_area_image, array('area_id'=>(int)$v_area_id));
/*Delete file */
$v_company_id = $cls_tb_location->select_scalar('company_id',array('location_id'=>(int)$v_location_id));
$v_company_code = $cls_tb_company->select_scalar('company_code',array('company_id'=>(int)$v_company_id));

$cls_tb_location_area->delete_area_image($v_image_id,$arr_where);
for($i=0; $i<count($arr_product_image_size); $i++){
    $v_width = $arr_product_image_size[$i];
    unlink(PRODUCT_IMAGE_DIR.'/'. $v_company_code.'/signage_layout/'.$v_width .'_'.$v_image_name );
}


?>