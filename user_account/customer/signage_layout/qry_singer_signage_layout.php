<?php if (!isset($v_sval)) die(); ?>
<?php
$v_area_id  = isset($_REQUEST['txt_area_id']) ? $_REQUEST['txt_area_id'] : '';
$v_image_id = isset($_REQUEST['txt_image_id']) ? $_REQUEST['txt_image_id'] : '';
$tpl_signage_layout = new Template('dsp_singer_signage_layout.tpl',$v_dir_templates);
$arr_where_clause = array('area_id'=>(int)$v_area_id );
$arr_location_area = $cls_tb_location_area->select($arr_where_clause);
$v_dsp_tb_location_area = '<table  width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_image = '';
$v_dsp_area_html ='';
$v_mapping_image = '';
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
        $v_company_code = $_SESSION['company_code'];
        if($v_image_id==$v_tmp_image_id){
            $v_dsp_image = '<img class="map" usemap="#imgmap" src="'.RESOURCE_URL.$v_company_code.'/signage_layout/'.PRODUCT_IMAGE_NORMAL.'_'.$v_tmp_image. '"> '.$v_tmp_image_html.'<br>';
        }
    }
}
$v_dsp_tb_location_area .='<tr>';
$v_dsp_tb_location_area .='<td align="center">' .$v_dsp_image.'</td>' ;
$v_dsp_tb_location_area .='</tr>';
$v_dsp_tb_location_area .='</table>';
$tpl_signage_layout->set('IMAGES',$v_dsp_tb_location_area);
$tpl_signage_layout->set('URL',URL);
echo $tpl_signage_layout->output();

?>