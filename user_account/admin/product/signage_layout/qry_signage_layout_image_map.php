<?php if(!isset($v_sval)) die();?>
<?php
$v_product_images_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_product_images_id, 'int');
$v_str_key = 'ABCDEFGHIJKLMNOPQRSTUVXYZW';
$v_has_get = '';
$v_dsp_script = '';
$v_dsp_main_product = '';
$v_row = $cls_tb_product_images->select_one(array('product_images_id'=>$v_product_images_id));
$v_list_images = '';
$v_list_key = '';
$v_dsp_list_link = '';
$v_dsp_list_alt = '';

$v_max_hot_spot = 0;
if($v_row==1){
    $v_main_product_id = $cls_tb_product_images->get_product_id();
    $v_main_product_image = $cls_tb_product_images->get_product_image();
    $v_main_product_dir = $cls_tb_product_images->get_saved_dir();
    $v_hot_spot = $cls_tb_product_images->get_hot_spot();
    $arr_map_content = $cls_tb_product_images->get_map_content();
    $v_hot_spot_company_id = $cls_tb_product_images->get_company_id();
    $v_hot_spot_location_id = $cls_tb_product_images->get_location_id();
    $v_hot_spot_area_id = $cls_tb_product_images->get_area_id();
    $v_location_area = $cls_tb_product_images->get_location_area();
    if($v_hot_spot==1){
        for($i=0; $i<count($arr_map_content);$i++){
            $v_sub_product_id = $arr_map_content[$i]['product_id'];
            $v_sub_product_name = $arr_map_content[$i]['product_name'];
            $v_sub_product_url = $arr_map_content[$i]['product_image'];
            $v_sub_product_link_info = $arr_map_content[$i]['product_url'];
            $v_sub_map_shape = $arr_map_content[$i]['map_shape'];
            $v_sub_map_coords = $arr_map_content[$i]['map_coords'];
            $v_sub_map_key = $arr_map_content[$i]['map_key'];
            $v_list_key .= $v_sub_map_key.',';

            $v_dsp_list_link .= ($v_dsp_list_link!=''?',':'')."'".$v_sub_product_link_info."'";
            $v_dsp_list_alt .= ($v_dsp_list_alt!=''?',':'')."'".$v_sub_product_name."'";

            $v_dsp_script .= "\nproduct[".$i."] = new Product(".$v_sub_product_id.",'".$v_sub_product_name."','".$v_sub_product_url."','".$v_sub_product_link_info."','".$v_sub_map_shape."', '".$v_sub_map_coords."','".$v_sub_map_key."', 1);";
            $v_max_hot_spot++;
        }
    }

    if(strrpos($v_main_product_dir, '/')!=strlen($v_main_product_dir)-1) $v_main_product_dir.='/';
    if(file_exists($v_main_product_dir.PRODUCT_IMAGE_NORMAL.'_'.$v_main_product_image))
        $v_main_product_url = $v_main_product_dir.PRODUCT_IMAGE_NORMAL.'_'.$v_main_product_image;
    else
        $v_main_product_url = $v_main_product_dir.$v_main_product_image;
    $v_dsp_main_product = '<img src="'.$v_main_product_url.'" />';
    $v_list_images = "'".$v_main_product_url."'";
}
$v_dsp_script = "\nvar list_key = '".$v_list_key."';\nvar product = new Array();\n".$v_dsp_script;



function get_unique_key($p_len){
    global $v_str_key, $v_has_key;
    $i=0;
    $v_end = false;
    $key='';
    while($i<$p_len && !$v_end){
        $p = rand(0, strlen($v_str_key)-1);
        $c = substr($v_str_key, $p, 1);
        $key.=$c;
        $i++;
        if(strlen($key==2)){
            if(strrpos($v_has_key, $key)===false){
                $v_end = true;
            }else{
                $key = '';
                $i=0;
            }
        }
    }
    return $key;
}
?>