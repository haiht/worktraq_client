<?php if(!isset($v_sval)) die();?>
<?php
$v_location_id = isset($_REQUEST['txt_location_id'])? $_REQUEST['txt_location_id'] :0;
$v_image_id = isset($_REQUEST['txt_image_id'])? $_REQUEST['txt_image_id'] :0;
$v_area_id = isset($_REQUEST['txt_area_id'])? $_REQUEST['txt_area_id'] :0;

$arr_where_clause = array('location_id'=>(int)$v_location_id , 'area_id'=>(int)$v_area_id );
$arr_location_area = $cls_tb_location_area->select($arr_where_clause);

$v_dsp_tb_location_area = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_tb_location_area .= '<tr align="center" valign="middle">';
$v_dsp_tb_location_area .= '<th colspan="2">Update Map image </th>';
$v_dsp_tb_location_area .= '</tr>';
$v_dsp_image = '';
$v_dsp_area_html ='';

if(isset($_POST['btn_cls_location_area'])){
    $v_image_html = isset($_REQUEST['txt_image_html'])? $_REQUEST['txt_image_html'] : '';

    if($v_location_id!=0 && $v_image_id!=0  && $v_area_id!=0)
    {
        $cls_tb_location_area->update_field("area_image.$.image_html",$v_image_html,
                                            array('location_id'=>(int)$v_location_id,
                                                    'area_id'=>(int)$v_area_id ,
                                                    'area_image.image_id'=>(int)$v_image_id));
        redir(URL. $v_admin_key.'/mapping-image/'.$v_location_id.'/id/'.$v_image_id.'/area_id/'.$v_area_id);
    }
}
foreach($arr_location_area as $arr)
{
    $v_mongo_id = $cls_tb_location_area->get_mongo_id();
    $v_area_id = isset($arr['area_id'])?$arr['area_id']:0;
    $arr_area_image = isset($arr['area_image'])?$arr['area_image']:'';
    $v_area_html = isset($arr['image_html'])?$arr['image_html']:'';
    foreach($arr_area_image as $arr_temp)
    {
        $v_tmp_image_id  = isset($arr_temp['image_id']) ? $arr_temp['image_id'] : 0;
        $v_tmp_image = isset($arr_temp['image_file']) ? $arr_temp['image_file'] : '';
        $v_tmp_image_html =  isset($arr_temp['image_html']) ? $arr_temp['image_html'] : '';

        if($v_image_id==$v_tmp_image_id)
        {
            $v_company_id = $cls_tb_location->select_scalar('company_id',array('location_id'=>(int)$v_location_id));
            $v_company_code = $cls_tb_company->select_scalar('company_code',array('company_id'=>(int) $v_company_id));
            $v_dsp_image = '<img class="map" usemap="#imgmap" src="'.RESOURCE_URL.$v_company_code.'/signage_layout/'.PRODUCT_IMAGE_NORMAL.'_'.$v_tmp_image. '"> '.$v_tmp_image_html.'<br>
                           <h2> <a target="_blank" href="'.URL .'library/image_map/map.php?txt_image='. $v_company_code.'/signage_layout/'.PRODUCT_IMAGE_NORMAL.'_'.$v_tmp_image. '" > Edit code HTML - Mapping </a> </h2>';
            $v_dsp_area_html ='Code HTML Map  :  <textarea rows="8" cols="40" name="txt_image_html">'.$v_tmp_image_html.'</textarea>
                                <input name="btn_cls_location_area" id="name="btn_cls_location_area"" type="submit" class="button" value="Update Map Image" >';
        }

    }
}
$v_dsp_tb_location_area .='<tr>';
$v_dsp_tb_location_area .='<td width="25%">' .$v_dsp_area_html. '</td>' ;
$v_dsp_tb_location_area .='<td>' .$v_dsp_image.'</td>' ;
$v_dsp_tb_location_area .='</tr>';
$v_dsp_tb_location_area .='</table>';
?>