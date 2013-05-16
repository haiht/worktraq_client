<?php if (!isset($v_sval)) die(); ?>
<?php
$tpl_signage_layout = new Template('dsp_signage_layout.tpl',$v_dir_templates);
$v_more_option = isset($_REQUEST['txt_option']) ? $_REQUEST['txt_option'] : 1;
$v_area_id = isset($_REQUEST['txt_area_id']) ? $_REQUEST['txt_area_id'] : -1;
$v_location_id = isset($_REQUEST['txt_location_id']) ? $_REQUEST['txt_location_id'] : $arr_user['location_default'];
$v_company_id  = $arr_user['company_id'];
$cls_tb_location = new cls_tb_location($db);
$v_cb_location = 'Location : <select name="txt_location_id" onchange=\'window.location.href=this.options[this.selectedIndex].value\'>';
$arr_location  = $cls_tb_location->select(array("company_id"=>(int)$v_company_id));
foreach ($arr_location as $arr ) {
    $v_temp_location_id = isset($arr['location_id']) ? $arr['location_id'] : '';
    $v_location_banner = isset($arr['location_banner']) ? $arr['location_banner'] : '';
    $v_cb_location .= "<option value='".URL."signage_layout/location/".$v_temp_location_id. "'". ($v_temp_location_id==$v_location_id?'selected':'') ." > ".$v_location_banner." </option> " ;
}
$v_cb_location .= "</select> &nbsp" ;
$v_cb_location  .= " &nbsp Area: <select name='txt_area' onchange='window.location.href=this.options[this.selectedIndex].value'>";
$v_cb_location  .= " <option value='".URL."signage_layout/location/".$v_location_id. "'". (-1==$v_area_id?'selected':'') ." > -- Area --  </option> " ;
$arr_location_area = $cls_tb_location_area->select(array("location_id"=>(int)$v_location_id));
foreach ($arr_location_area as $arr ) {
    $v_tmp_area_id = isset($arr['area_id']) ? $arr['area_id'] : 0;
    $v_tmp_area_name = isset($arr['area_name']) ? $arr['area_name'] : '';
    $v_cb_location .= "<option value='".URL."signage_layout/location/".$v_location_id. "/area_id/".$v_tmp_area_id."'". ($v_tmp_area_id==$v_area_id?'selected':'') ." > ".$v_tmp_area_name." </option> " ;
}
$v_cb_location .= "</select> &nbsp" ;
$tpl_signage_layout->set('LOCATION',$v_cb_location);
$tpl_signage_layout->set('AREA',"");
$v_cb_more_option  = " More options : <select name='txt_option' onchange='window.location.href=this.options[this.selectedIndex].value'>";
$v_cb_more_option .= "<option value='".URL."signage_layout/options/1". "'". ($v_more_option==1?'selected':'') ." > Thumbnail  </option> " ;
$v_cb_more_option .= "<option value='".URL."signage_layout/options/2". "'". ($v_more_option==2?'selected':'') ." > Slide </option> " ;
$v_cb_more_option .= "</select>" ;
$arr_where = array("location_id"=>(int)$v_location_id );
$v_where_location  = "";
if($v_area_id!=-1)
{
    $arr_where += array("area_id"=>(int)$v_area_id);
}
$tpl_signage_layout->set('URL',URL);
$tpl_signage_layout->set('OPTIONS',$v_cb_more_option);
$v_company_code = $_SESSION['company_code'];
$arr_location_area = $cls_tb_location_area->select($arr_where);
$v_count = 1;
if($v_more_option==1) { // Thumbnail
    $v_dsp_tb_location_area = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
    foreach($arr_location_area as $arr){
        $v_mongo_id = $cls_tb_location_area->get_mongo_id();
        $v_area_id = isset($arr['area_id'])?$arr['area_id']:0;
        $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
        $v_area_name = isset($arr['area_name'])?$arr['area_name']:'';
        $v_area_description = isset($arr['area_description'])?$arr['area_description']:'';
        $arr_area_image = isset($arr['area_image'])?$arr['area_image']:'';
        $v_dps_file = "";
        $v_count_image = 0;
        foreach($arr_area_image as $arr)
        {
            $v_count_image++;
            $v_image_id = isset($arr['image_id'])?$arr['image_id']:0;
            $v_image_file = isset($arr['image_file'])?$arr['image_file']:'';
            $v_image_html = isset($arr['image_html'])?$arr['image_html']:'';
            $v_link = URL.'signage_layout/'.$v_area_id .'';
            if($v_image_file!='')
            {
                $v_dps_file .= '<div class="imgborder">
                                    <div class="img">
                                        <a  href="'.URL.'signage_layout/'.$v_area_id .'/'.$v_image_id. '">
                                            <img src="'. RESOURCE_URL.'/'. $v_company_code.'/signage_layout/'. PRODUCT_IMAGE_THUMB.'_'.$v_image_file.'">
                                        </a>
                                    </div>
                                    <div class="footerimg">
                                        <a rel="example_group"  href="'. RESOURCE_URL.'/'. $v_company_code.'/signage_layout/'. PRODUCT_IMAGE_NORMAL.'_'.$v_image_file.'">   Zoom image </a>
                                    </div>
                                </div>';
            }
            if($v_count_image%4==0) $v_dps_file .= '<br>';
        }
        $v_dsp_tb_location_area .= '<tr align="left" valign="middle">';
        $v_dsp_tb_location_area .= '<th align="left"> Area Name : '.$v_area_name.'</th></tr>';
        $v_dsp_tb_location_area .= '<td align="left" style="padding:5px"> '.$v_dps_file.'</td>';
        $v_dsp_tb_location_area .= '</tr>';
    }
    $v_dsp_tb_location_area .= '</table>';
}
else
{
    $v_image_select = isset($_REQUEST['txt_image_id']) ?$_REQUEST['txt_image_id']  : '';
    $v_dsp_image_select = "";
    $v_dsp_tb_location_area = '';
    $v_dsp_image_thumb = '';
    foreach($arr_location_area as $arr){
        $v_mongo_id = $cls_tb_location_area->get_mongo_id();
        $v_area_id = isset($arr['area_id'])?$arr['area_id']:0;
        $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
        $v_area_name = isset($arr['area_name'])?$arr['area_name']:'';
        $v_area_description = isset($arr['area_description'])?$arr['area_description']:'';
        $arr_area_image = isset($arr['area_image'])?$arr['area_image']:'';
        $v_dps_file = "";
        $v_count_image = 0;
        $v_link = URL.'signage_layout/';
        foreach($arr_area_image as $arr)
        {
            $v_count_image++;
            $v_image_id = isset($arr['image_id'])?$arr['image_id']:0;
            $v_image_file = isset($arr['image_file'])?$arr['image_file']:'';
            $v_image_html = isset($arr['image_html'])?$arr['image_html']:'';
            if($v_image_select=='') $v_image_select = $v_image_id;

            if($v_image_select==$v_image_id)
                $v_dsp_image_select = '<a href="'.URL.'signage_layout/'.$v_area_id .'/'.$v_image_id. '">
                                        <img src="'. RESOURCE_URL.''. $v_company_code.'/signage_layout/'. PRODUCT_IMAGE_MINIMAL.'_'.$v_image_file.'"  alt=""  />
                                        </a>';

            $v_dsp_image_thumb .= '<img id="'.$v_image_id.'" parent="'.$v_area_id.'" class="sile_image" rel="'.$v_image_file.'" width="120px"  src="'. RESOURCE_URL.''. $v_company_code.'/signage_layout/'. PRODUCT_IMAGE_THUMB.'_'.$v_image_file.'" alt=""  />';
        }
    }
    $v_dsp_tb_location_area = '<br><div class="image_signage_layout">'.$v_dsp_image_select.'<br></div>
                                 <div id="slide-wrap">
                                    <div id="inner-wrap"> '.$v_dsp_image_thumb.'</div></div>';
}

$tpl_signage_layout->set('LINK',$v_link);
$tpl_signage_layout->set('SRC_IMAGE',RESOURCE_URL.''. $v_company_code.'/signage_layout/'. PRODUCT_IMAGE_MINIMAL.'_');
$tpl_signage_layout->set('IMAGES',$v_dsp_tb_location_area);
echo $tpl_signage_layout->output();
?>