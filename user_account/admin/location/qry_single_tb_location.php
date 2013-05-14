<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_location_name = '';
$v_location_id = 0;
$v_company_id = isset($_GET['id2'])?$_GET['id2']:0;
$v_page = isset($_REQUEST['txt_page']) ? $_REQUEST['txt_page'] : 1;
$v_location_banner = "";
$v_location_type = '';
$v_location_phone = '';
$v_location_region = '';
$v_location_number = '';
$v_main_contact = '';
$v_address_unit = '';
$v_address_line_1 = '';
$v_address_line_2 = '';
$v_address_line_3 = '';
$v_address_city = '';
$v_address_province = '';
$v_address_province_id = 0;
$v_address_postal = '';

$v_shipped_address_unit = '';
$v_shipped_address_line_1 = '';
$v_shipped_address_line_2 = '';
$v_shipped_address_line_3 = '';
$v_shipped_address_city = '';
$v_shipped_address_province = '';
$v_shipped_address_province_id = 0;
$v_shipped_address_postal = '';


$v_approved_contact = '';
$v_dsp_approved_contact = '';
$v_address_country = 15;
$v_open_date =NULL;
$v_close_date = NULL;
$v_status = 1;
$v_chk_closedate= 0;
$v_chk_opendate = 0;
$v_temp_close_date = NULL;
$v_chk_opendate = 0;
$v_chk_shipped_address = 1;
$v_address_country_id = 15;
$v_shipped_address_country_id = 15;
$v_error  = 0;

$v_check_location_number = 0;
$cls_tb_settings = new cls_settings($db);
if(isset($_POST['btn_submit_tb_location'])){
}else{
	$v_location_id = (int) isset($_GET['id'])?$_GET['id']:0;
    add_class('cls_tb_province');
    $cls_tb_province = new cls_tb_province($db);

	if($v_location_id!=0){
		$v_row = $cls_tb_location->select_one(array('location_id' =>(int) $v_location_id));
		$v_location_id = $cls_tb_location->get_location_id();
        $v_location_name = $cls_tb_location->get_location_name();
		$v_company_id = $cls_tb_location->get_company_id();
		$v_location_type = $cls_tb_location->get_location_type();
        $v_location_region = $cls_tb_location->get_location_region();
        $v_location_banner = $cls_tb_location->get_location_banner();
		$v_location_number = $cls_tb_location->get_location_number();
		$v_main_contact = $cls_tb_location->get_main_contact();
        $v_location_phone = $cls_tb_location->get_location_phone();

		$v_address_unit = $cls_tb_location->get_address_unit();
		$v_address_line_1 = $cls_tb_location->get_address_line_1();
		$v_address_line_2 = $cls_tb_location->get_address_line_2();
		$v_address_line_3 = $cls_tb_location->get_address_line_3();
		$v_address_city = $cls_tb_location->get_address_city();
		$v_address_province = $cls_tb_location->get_address_province();
		$v_address_postal = $cls_tb_location->get_address_postal();
		$v_address_country = $cls_tb_location->get_address_country();
		$v_approved_contact = $cls_tb_location->get_approved_contact();

        if(is_array($v_address_country))
			$v_address_country_id = get_select_id_one($v_address_country,'country_id');

        $v_chk_shipped_address = $cls_tb_location->get_flag_shipped_address();
        $v_shipped_address_unit = $cls_tb_location->get_shipped_address_unit();
        $v_shipped_address_line_1 = $cls_tb_location->get_shipped_address_line_1();
        $v_shipped_address_line_2 = $cls_tb_location->get_shipped_address_line_2();
        $v_shipped_address_line_3 = $cls_tb_location->get_shipped_address_line_3();
        $v_shipped_address_city = $cls_tb_location->get_shipped_address_city();
        $v_shipped_address_province = $cls_tb_location->get_shipped_address_province();
        $v_shipped_address_postal = $cls_tb_location->get_shipped_address_postal();
        $v_shipped_address_country = $cls_tb_location->get_shipped_address_country();

        if(is_array($v_shipped_address_country))
            $v_shipped_address_country_id = get_select_id_one($v_shipped_address_country,'country_id');

		$v_open_date = date('d-M-Y',$cls_tb_location->get_open_date());
		$v_close_date = date('d-M-Y',$cls_tb_location->get_close_date());
        if($v_close_date==date('M-d-Y')) $v_chk_closedate = 1;
        if($v_open_date==date('M-d-Y')) $v_chk_opendate = 1;
		$v_status = $cls_tb_location->get_status();

        $v_module_company = $cls_tb_company->select_scalar('modules',array('company_id'=>(int)$v_company_id));

        if(strpos($v_module_company,'location_number')!==false){
            $v_check_location_number = 1;
        }

        $arr_location = $cls_tb_location->select(array('company_id'=> $v_company_id));
        $arr_where = array();
        $arr_location_name = array();
        foreach($arr_location as $arr){
            $arr_where[] = array('location_id'=>$arr['location_id']);
            $arr_location_name[$arr['location_id']] = $arr['location_name'];
        }
        if(count($arr_where)>=1){
            if(count($arr_where)>1){
                $arr_where = array('$or'=>$arr_where);
            }else{
                $arr_where = $arr_where[0];
            }
            $v_dsp_approved_contact = '';
            $arr_contact = $cls_tb_contact->select( $arr_where, array('last_name'=>1));
            foreach($arr_contact as $arr){
                $v_dsp_approved_contact .= '<option value="'.$arr['contact_id'].'"'.($arr['contact_id']==$v_approved_contact?' selected="selected"':'').'>'.$arr['first_name'].' '.$arr['last_name'].' ('.$arr_location_name[$arr['location_id']].')</option>';
            }

        }else{
            $v_dsp_approved_contact = '';
        }

	}
}


?>