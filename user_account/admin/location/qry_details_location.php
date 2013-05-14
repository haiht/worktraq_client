<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_location_id = 0;
$v_location_name = '';
$v_company_id = 0;
$v_location_type = '';
$v_location_area = '';
$v_location_number = '';
$v_main_contact = '';
$v_address_unit = '';
$v_address_line_1 = '';
$v_address_line_2 = '';
$v_address_line_3 = '';
$v_address_city = '';
$v_address_province = '';
$v_address_postal = '';
$v_address_country = 15;
$v_open_date = date('d-M-Y H:i:s', time());
$v_close_date = date('d-M-Y H:i:s', time());
$v_status = 1;
$v_chk_closedate = 0;
$v_chk_opendate = 0;
    $v_location_id = (int) isset($_GET['id'])?$_GET['id']:0;

    if($v_location_id!=0){
        $v_row = $cls_tb_location->select_one(array('location_id' =>(int) $v_location_id));

        $v_location_id = $cls_tb_location->get_location_id();
        $v_company_id = $cls_tb_location->get_company_id();
        $v_location_name = $cls_tb_location->get_location_name();
        $v_location_type = $cls_tb_location->get_location_type();
        $v_location_region = $cls_tb_location->get_location_region();
        $v_location_banner = $cls_tb_location->get_location_banner();
        $v_location_number = $cls_tb_location->get_location_number();
        $v_main_contact = $cls_tb_location->get_main_contact();
        $v_address_unit = $cls_tb_location->get_address_unit();
        $v_address_line_1 = $cls_tb_location->get_address_line_1();
        $v_address_line_2 = $cls_tb_location->get_address_line_2();
        $v_address_line_3 = $cls_tb_location->get_address_line_3();
        $v_address_city = $cls_tb_location->get_address_city();
        $v_address_province = $cls_tb_location->get_address_province();
        $v_address_postal = $cls_tb_location->get_address_postal();
        $v_address_country = $cls_tb_location->get_address_country();
        $v_status = $cls_tb_location->get_status();
    }


/* Area */
add_class('cls_tb_area');
add_class('cls_tb_product_images');
$cls_area = new cls_tb_area($db);
$cls_image = new cls_tb_product_images($db);

$arr_where_clause = array("location_id"=>(int)$v_location_id);
$arr_tb_area = $cls_area->select($arr_where_clause);
$v_dsp_tb_location_area = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_count = 1;

foreach($arr_tb_area as $arr){
    $v_area_id = isset($arr['area_id'])?$arr['area_id']:0;
    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
    $v_area_name = isset($arr['area_name'])?$arr['area_name']:'';
    $v_area_description = isset($arr['area_description'])?$arr['area_description']:'';

    $arr_area_image = $cls_image->select_limit_fields(0,1000, array('product_image', 'saved_dir', 'low_res_image'), array('area_id'=>$v_area_id))  ;

    $v_dps_file = "";
    $v_count_image = 0;
    foreach($arr_area_image as $arr)
    {
        $v_count_image++;
        $v_image_file = isset($arr['low_res_image'])?$arr['low_res_image']:'';
        $v_saved_dir = isset($arr['saved_dir'])?$arr['saved_dir']:'';

        if($v_image_file!=''){
            if(strrpos($v_saved_dir,'/')!==strlen($v_saved_dir)-1) $v_saved_dir.='/';
            $v_dps_file .= '<img style="padding:5px" src="'. $v_saved_dir.$v_image_file.'">';
        }
        if($v_count_image%4==0) $v_dps_file .= '<br>';
    }

    $v_dsp_tb_location_area .= '<tr align="left" valign="middle">';
    $v_dsp_tb_location_area .= '<th align="right"> Area Name : '.$v_area_name.'</th></tr>';
    $v_dsp_tb_location_area .= '<td align="left" style="padding:5px"> '.$v_dps_file.'</td>';
    $v_dsp_tb_location_area .= '</tr>';

}
$v_dsp_tb_location_area .= '</table>';

?>