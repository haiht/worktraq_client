<?php if(!isset($v_sval)) die();?>
<?php
$v_dsp_tb_location_area = '';

if(isset($_POST['txt_location_id']) && isset($_POST['txt_company_id'])){
    $v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
    $v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:'0';
}else if(isset($_SESSION['ss_location_area'])){
    $arr_location_area = unserialize($_SESSION['ss_location_area']);
    $v_company_id = isset($arr_location_area['company_id'])?$arr_location_area['company_id']:'0';
    $v_location_id = isset($arr_location_area['location_id'])?$arr_location_area['location_id']:'0';
}
settype($v_company_id, 'int');
settype($v_location_id, 'int');
if($v_company_id<0) $v_company_id = 0;
if($v_location_id<0) $v_location_id = 0;

if($v_company_id>0){
    if($v_location_id>0)
        $arr_where_clause = array('company_id'=>$v_company_id, 'location_id'=>$v_location_id, 'status'=>0);
    else
        $arr_where_clause = array('company_id'=>$v_company_id, 'status'=>0);
}else{
    $arr_where_clause = array('company_id'=>$v_company_id);
}
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'10';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?10:$v_num_row;

$v_total_row = $cls_tb_area->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;

$v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");

    $arr_tb_area = $cls_tb_area->select_limit($v_offset, $v_num_row, $arr_where_clause);
    $v_dsp_area_header = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
    $v_count = $v_offset+1;

    foreach($arr_tb_area as $arr){
        $v_area_id = isset($arr['area_id'])?$arr['area_id']:0;
        $v_tmp_location_id = isset($arr['location_id'])?$arr['location_id']:0;
        $v_tmp_company_id = isset($arr['company_id'])?$arr['company_id']:0;
        $v_area_name = isset($arr['area_name'])?$arr['area_name']:'';
        $v_area_description = isset($arr['area_description'])?$arr['area_description']:'';
        $v_area_image = isset($arr['area_image'])?$arr['area_image']:'';
        $v_company_code = $cls_tb_company->select_scalar('company_code',array('company_id'=> $v_company_id));

        $v_location_banner = $cls_tb_location->select_scalar('location_banner',array('location_id'=> $v_tmp_location_id));
        $v_location_name = '';
        $v_company_name = '';
        if($v_company_id<=0){
            $v_company_name = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_tmp_company_id));
            $v_location_name = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_tmp_location_id));
        }else if($v_location_id<=0){
            if($v_location_id==0) $v_location_name = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_tmp_location_id));
        }
        $v_dsp_area = '<div class="area__header">'.$v_dsp_area_header;
        $v_dsp_area .= '<tr align="left" valign="middle">';
        $v_dsp_area .= '<th align="right" colspan=2> Area Name : '.$v_area_name.($v_location_name!=''?' - [Location: '.$v_location_name.']':'').($v_company_name!=''?' - [Company: '.$v_company_name.']':'').'</th></tr>';
        $v_dsp_area .= '<tr><td width="15%">Description :</td><td>'.$v_area_description.' </td> </tr>
                                    <tr> <td width="15%">Location Banner :</td><td>'.$v_location_banner.' <a data-area="'.$v_area_id.'" rel="open_popup_upload" href="'. URL .$v_admin_key.'/'.$v_area_id.'/images"> [Upload images!.]</a> </td></tr>';
        $v_dsp_area .= '</table></div>';

        //if($v_area_image!=''){
            /*
            $arr_area_image = explode(',', $v_area_image);
            $arr_image_where_clause = array();
            $v_len = count($arr_area_image);
            if($v_len==1){
                if(trim($arr_area_image[0])!=''){
                    $v_product_images_id = (int) trim($arr_area_image[0]);
                    if($v_product_images_id>0) $arr_image_where_clause = array('product_images_id'=>$v_product_images_id);
                }
            }else{
                for($i=0; $i<count($arr_area_image); $i++){
                    if(trim($arr_area_image[$i])!=''){
                        $v_product_images_id = (int) trim($arr_area_image[$i]);
                        if($v_product_images_id>0) $arr_image_where_clause[] = array('product_images_id'=>$v_product_images_id);
                    }
                }
                $arr_image_where_clause = array('$or'=>$arr_image_where_clause);
            }

            $arr_image = $cls_tb_product_images->select_limit_fields(0, 1000, array('product_images_id','product_image', 'low_res_image', 'saved_dir', 'status'), $arr_image_where_clause);
            */
        $v_dsp_one_area = '';
        $arr_image = $cls_tb_product_images->select_limit_fields(0, 1000, array('product_images_id','product_image', 'low_res_image', 'saved_dir', 'status', 'hot_spot'),array('area_id'=>$v_area_id));
            foreach($arr_image as $arr){
                $v_product_image = $arr['product_image'];
                $v_product_images_id = $arr['product_images_id'];
                $v_low_res_image = $arr['low_res_image'];
                $v_saved_dir = $arr['saved_dir'];
                if(strrpos($v_saved_dir, '/')!==strlen($v_saved_dir)-1) $v_saved_dir.='/';
                $v_status = $arr['status'];
                $v_hot_spot = isset($arr['hot_spot'])?$arr['hot_spot']:0;
                $v_dsp_one_area.='<div class="div_image">';
                if($v_hot_spot==1)
                    $v_dsp_one_area .= '[<img title="Already hot-spot" src="images/icons/layers.png" align="absmiddle" />]';
                $v_dsp_one_area.='<img title="'.($v_status==0?'Go Inactive':'Go Active').'" id="img_enable_'.$v_product_images_id.'" src="images/icons/accept.png" class="icon"'.($v_status==0?'':' style="display:none"').' onclick="change_status(this,'.$v_product_images_id.',\''.$v_product_image.'\',1 ,\'active\')" />';
                $v_dsp_one_area.='<img title="'.($v_status!=0?'Go Active':'Go Inactive').'" id="img_disable_'.$v_product_images_id.'" src="images/icons/delete.png" class="icon"'.($v_status!=0?'':' style="display:none"').' onclick="change_status(this,'.$v_product_images_id.',\''.$v_product_image.'\',0 ,\'active\')" />';

                $v_dsp_one_area.='<a href="'.URL.$v_admin_key.'/'.$v_product_images_id.'/map" target="_parent" title="Create hot spot"><img src="images/icons/map_edit.png" class="icon" /></a>';

                $v_dsp_one_area.='<img title="Delete image" id="img_delete_'.$v_product_images_id.'" src="images/icons/cancel.png" class="icon" onclick="delete_image(this,'.$v_product_images_id.',\''.$v_product_image.'\', 0, \'delete\')" />';
                $v_dsp_one_area.='<img class="thumb" src="'.$v_saved_dir.$v_low_res_image.'" title="'.$v_product_image.'" /></div>';
            }
            $v_dsp_one_area = '<div id="div_list_thumb_'.$v_area_id.'" class="div_list_thumb">'.$v_dsp_one_area.'</div>';
            $v_dsp_area .= $v_dsp_one_area;
        //}
        $v_dsp_tb_location_area .= $v_dsp_area;
    }

    $arr_data = array('company_id'=>$v_company_id, 'location_id'=>$v_location_id);
    $_SESSION['ss_location_area'] = serialize($arr_data);
//}else{
//    if(isset($_SESSION['ss_location_area'])) unset($_SESSION['ss_location_area']);
//}

$v_dsp_company_draw = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);

if($v_company_id>0)
    $v_dsp_location_draw = $cls_tb_location->draw_option('location_id', 'location_name', $v_location_id, array('company_id'=>$v_company_id, 'status'=>0));
else
    $v_dsp_location_draw = '';

$v_change_url = URL.$v_admin_key.'/0/cimages';
?>