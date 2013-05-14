<?php if(!isset($v_sval)) die();?>
<?php
$v_product_images_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_product_images_id, 'int');
$v_str_key = 'ABCDEFGHIJKLMNOPQRSTUVXYZW';
$v_has_get = '';
$v_dsp_script = '';
$v_main_product_id = 0;
$v_dsp_main_product = '';
$v_row = $cls_tb_product_images->select_one(array('product_images_id'=>$v_product_images_id));
$v_jj = 0;
$v_dsp_canvas = '';
$v_list_images = '';
$v_hot_spot_company_id = 0;
$v_hot_spot_location_id = 0;
$v_location_area = '';

if($v_row==1){
    $v_main_product_id = $cls_tb_product_images->get_product_id();
    $v_main_product_image = $cls_tb_product_images->get_product_image();
    $v_main_product_dir = $cls_tb_product_images->get_saved_dir();
    $v_hot_spot = $cls_tb_product_images->get_hot_spot();
    $arr_map_content = $cls_tb_product_images->get_map_content();
    $v_hot_spot_company_id = $cls_tb_product_images->get_company_id();
    $v_hot_spot_location_id = $cls_tb_product_images->get_location_id();
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
            if($v_sub_map_coords!=''){
                if($v_sub_map_shape=='rect'){
                    $arr_coords = explode(',',$v_sub_map_coords);
                    $v_left = $arr_coords[0];
                    $v_top = $arr_coords[1];
                    $v_width = $arr_coords[2] - $arr_coords[0];
                    $v_height = $arr_coords[3] = $arr_coords[1];
                }else if($v_sub_map_shape=='circle'){
                    $arr_coords = explode(',',$v_sub_map_coords);
                    $v_left = $arr_coords[0] - $arr_coords[2];
                    $v_top = $arr_coords[1] - $arr_coords[2];
                    $v_width = $v_left + $arr_coords[2]*2;
                    $v_height = $v_top + $arr_coords[2]*2;
                }else if($v_sub_map_shape=='poly'){
                    $arr_coords = explode(',',$v_sub_map_coords);
                    //echo 'Coords: '.$v_sub_map_coords.'<br>';
                    $v_top = 2000;
                    $v_left = 2000;
                    $v_width = -2000;
                    $v_height = -2000;
                    for($j=0; $j<count($arr_coords); $j+=2){
                        if($v_left > $arr_coords[$j]) $v_left = $arr_coords[$j];
                        if($v_top > $arr_coords[$j+1]) $v_top = $arr_coords[$j+1];
                        if($v_width < $arr_coords[$j]) $v_width = $arr_coords[$j];
                        if($v_height < $arr_coords[$j+1]) $v_height = $arr_coords[$j+1];
                        /*
                        echo 'S'.($j+1).'- L: '.$v_left.'<br />';
                        echo 'S'.($j+1).'- T: '.$v_top.'<br />';
                        echo 'S'.($j+1).'- W: '.$v_width.'<br />';
                        echo 'S'.($j+1).'- H: '.$v_height.'<br />';
                        */
                    }
                    $v_width = $v_width - $v_left;
                    $v_height = $v_height - $v_top;
                }
                /*
                echo 'S: '.$v_sub_map_shape.'<br>';
                echo 'L: '.$v_left.'<br>';
                echo 'T: '.$v_top.'<br>';
                echo 'W: '.$v_width.'<br>';
                echo 'H: '.$v_height.'<br><br>';
                */

                $v_dsp_script .= "\nproduct[".$v_jj++."] = new Product(".$v_sub_product_id.",'".$v_sub_product_name."','".$v_sub_product_url."','".$v_sub_product_link_info."','".$v_sub_map_shape."', '".$v_sub_map_coords."','".$v_sub_map_key."');";
                /*
                $v_dsp_canvas.='<canvas id="imgmap201314173015area'.($v_jj-1).'" style="position: absolute; top: '.$v_top.'px; left: '.$v_left.'px; background-color: rgb(255, 255, 255); opacity: 0.5; width: '.$v_width.'px; height: '.$v_height.'px; border-width: 1px; border-style: solid; border-color: rgb(221, 0, 0); cursor: default;" width="'.$v_width.'" height="'.$v_height.'" title="#'.($v_jj-1).' '.$v_sub_product_link_info.'"></canvas>'.
                    '<div class="imgmap_label" style="font-weight: bold; font-size: 16px; font-family: Arial; color: rgb(153, 102, 68); position: absolute; top: '.$v_top.'px; left: '.$v_left.'px;">'.$v_sub_product_link_info.'</div>';
                */
            }
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
settype($v_main_product_id, 'int');

$v_dsp_list_link = '';

$v_max_hot_spot = 0;
if($v_main_product_id > 0){
    $arr_package_content = $cls_tb_product->select_scalar('package_content', array('product_id'=>$v_main_product_id));
    if(is_array($arr_package_content)){
        for($i=0; $i<count($arr_package_content); $i++){
            $v_product_id = $arr_package_content[$i]['refer_id'];
            $v_product_name = $arr_package_content[$i]['package_name'];
            $v_product_image = $arr_package_content[$i]['package_image'];
            $v_product_dir = $arr_package_content[$i]['saved_dir'];
            if(strrpos($v_product_dir, '/')!=strlen($v_product_dir)-1) $v_product_dir .= '/';
            if(file_exists($v_product_dir.PRODUCT_IMAGE_THUMB.'_'.$v_product_image))
                $v_product_url = $v_product_dir.PRODUCT_IMAGE_THUMB.'_'.$v_product_image;
            else
                $v_product_url = $v_product_dir.$v_product_image;
            $v_max_hot_spot++;
            $v_list_images.=",'".$v_product_url."'";
            $v_link_info = 'catalogue/'.$v_product_id.'/info';
            $v_dsp_list_link .= $i==0?"'".$v_link_info."'":",'".$v_link_info."'";
            if($i>=$v_jj)
                $v_dsp_script .= "\nproduct[".$i."] = new Product(".$v_product_id.",'".$v_product_name."','".$v_product_url."','".$v_link_info."','rect', '0,0,0,0','".get_unique_key(2)."');";
        }
        if($v_dsp_script!=''){
            $v_dsp_script = "\nvar product = new Array();".$v_dsp_script;
        }
    }
}

$v_list_check_location_area='';

$arr_location_area = $cls_tb_image_area->select(array('company_id'=>$v_hot_spot_company_id, 'location_id'=>$v_hot_spot_location_id));
//$arr_tmp_location_area = $v_location_area!=''?explode(',', substr($v_location_area,0, strlen($v_location_area)-1)):array();
foreach($arr_location_area as $arr){
    $v_location_area_id = $arr['location_area_id'];
    $v_location_area_name = $arr['location_area_name'];
    $v_list_check_location_area .= '<label><input type="checkbox" name="txt_location_area" value="'.$v_location_area_id.'"'.(strpos($v_location_area, $v_location_area_id.',')!==false?' checked="checked"':'').' /> '.$v_location_area_name.'</label><br />';
}

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