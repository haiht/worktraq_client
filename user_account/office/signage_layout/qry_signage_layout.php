<?php if (!isset($v_sval)) die(); ?>
<?php

$v_location_id = isset($arr_user['default_location'])?$arr_user['default_location']:'0';
$v_location_area_id = 0;
$v_option = 0;
if(isset($_POST['txt_session_id'])){
    //echo $_POST['txt_session_id'].'<br />';
    $v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:'0';
    $v_location_area_id = isset($_POST['txt_location_area_id'])?$_POST['txt_location_area_id']:'0';
    $v_option = isset($_POST['txt_option'])?$_POST['txt_option']:'0';
    $arr_signage_layout = array('location'=>$v_location_id, 'location_area'=>$v_location_area_id, 'option'=>$v_option);
    $_SESSION['ss_signage_layout'] = serialize($arr_signage_layout);
}else{
    if(isset($_SESSION['ss_signage_layout'])){
        $arr_signage_layout = unserialize($_SESSION['ss_signage_layout']);
        $v_location_id = isset($arr_signage_layout['location'])?$arr_signage_layout['location']:'0';
        $v_location_area_id = isset($arr_signage_layout['location_area'])?$arr_signage_layout['location_area']:'0';
        $v_option = isset($arr_signage_layout['option'])?$arr_signage_layout['option']:'0';
    }
}
$v_company_id = isset($_SESSION['company_id'])?$_SESSION['company_id']:'0';
settype($v_location_id, 'int');
settype($v_company_id, 'int');
settype($v_location_area_id, 'int');
settype($v_option, 'int');
if(!in_array($v_option, array(0,1))) $v_option = 0;
$cls_tb_location = new cls_tb_location($db, LOG_DIR);
$v_dsp_location =  '';
$v_tmp_location_id = 0;
$arr_location = $cls_tb_location->select_limit_fields(0, 1000, array('location_id', 'location_name'), array('company_id'=>$v_company_id, 'status'=>0));
foreach($arr_location as $arr){
    if($v_tmp_location_id==0) $v_tmp_location_id = $arr['location_id'];
    $v_dsp_location .= '<option value="'.$arr['location_id'].'"'.($arr['location_id']==$v_location_id?' selected="selected"':'').'>'.$arr['location_name'].'</option>';
}
if($v_location_id==0 && $v_dsp_location!=''){
    $v_location_id = $v_tmp_location_id;
}

$v_dsp_location_area = $cls_tb_area->draw_option('area_id', 'area_name', $v_location_area_id, array('location_id'=>$v_location_id, 'status'=>0));
$v_dsp_option = '<option value="0"'.($v_option==0?' selected="selected"':'').'>Thumbnail</option><option value="1"'.($v_option==1?' selected="selected"':'').'>Slide</option>';

$tpl_signage_layout = new Template('dsp_signage_layout.tpl',$v_dir_templates);

$tpl_signage_layout->set('SESSION_ID', session_id());
$tpl_signage_layout->set('LOCATION', $v_dsp_location);
$tpl_signage_layout->set('AREA', $v_dsp_location_area);
$tpl_signage_layout->set('OPTIONS', $v_dsp_option);

$arr_where_clause = array('hot_spot'=>1,'image_type'=>2, 'location_id'=>$v_location_id);

if($v_location_area_id>0){
    //$v_search = $v_location_area_id.',';
    //$arr_where_clause = array('$or'=>array(array('location_area'=>new MongoRegex("/".$v_search."^/")), array('location_area'=>new MongoRegex("/^".$v_search."/")), array('location_area'=>new MongoRegex("/".$v_search."/"))));
    $arr_where_clause = array('hot_spot'=>1,'image_type'=>2, 'area_id'=>$v_location_area_id, 'status'=>0);
}else{
    $arr_where_clause = array('hot_spot'=>1,'image_type'=>2, 'location_id'=>$v_location_id, 'status'=>0);
}
$arr_order = array('area_id'=>1);
//print_r($arr_where_clause);

$v_link_view = URL.'signage_layout/';
$v_dsp_images = '';
$v_dsp_one = '';

$arr_product_images = $cls_tb_product_images->select($arr_where_clause, $arr_order);
$arr_show_image = array();
$v_tmp_area_id = -1;
$i=0;
foreach($arr_product_images as $arr){
    $v_product_images_id = $arr['product_images_id'];
    $v_saved_dir = $arr['saved_dir'];
    if(strrpos($v_saved_dir,'/')!==strlen($v_saved_dir)-1) $v_saved_dir.='/';
    $v_product_image = $arr['product_image'];
    $v_product_image_low_res = $arr['low_res_image'];
    $v_area_id = isset($arr['area_id'])?$arr['area_id']:0;


    $v_image_url = $v_saved_dir.$v_product_image_low_res;

    if($v_tmp_area_id!=$v_area_id && $v_option==0){
        if($i>0){
            $v_dsp_images .= '<tr align="left" valign="top"><td>'.$v_dsp_one.'</td></tr></table>';
        }
        $v_dsp_one = '';

        $v_tmp_area_id = $v_area_id;
        $v_area_name = $cls_tb_area->select_scalar('area_name', array('area_id'=>$v_area_id));
        $v_dsp_images .= '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
        $v_dsp_images .= '<tr><th align="left" valign="middel">Location Area: '.$v_area_name.'</th></tr>';

        $i++;
    }


    if($v_option==0){
        $v_dsp_one .= '<div class="imgborder"><div class="img">
                <a rel="signage_layout_image"  href="'.$v_link_view.$v_product_images_id.'/view" title="Click on hot spot to go the referred product"><img src="'.$v_image_url.'" border="0" /><br />Zoom in &amp; View</a>'.'
            </div></div>';
    }else{
        $v_dsp_images .= '<span><a rel="signage_layout_image" href="'.$v_link_view.$v_product_images_id.'/view"><img src="'.$v_image_url.'" alt="Click on hot spot to go the referred product" width="200" /><br />Zoom in &amp; View</a></span>';
    }
}
if($v_option==0){
    if($i>0){
        $v_dsp_images .= '<tr align="left" valign="top"><td>'.$v_dsp_one.'</td></tr></table>';
    }
}else{
    $tpl_product_slide = new Template('dsp_product_info_slide.tpl', $v_dir_templates);
    $tpl_product_slide->set('IMAGE_LIST', $v_dsp_images);
    $tpl_product_slide->set('URL', URL);
    $v_dsp_images = $tpl_product_slide->output();
}
$tpl_signage_layout->set('IMAGES', $v_dsp_images);
$tpl_signage_layout->set('URL', URL);

echo $tpl_signage_layout->output();
?>