<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_company_id = 0;
$v_company_name = '';
$v_company_code = '';
$v_sales_rep_email = '';
$v_relationship = 0;
$v_logo_file = '';
$v_modules = '';
$v_csr_id = 0;
$v_sales_rep_id = 0;
$v_bussines_type = 0;
$v_industry = 0;
$v_website = '';
$v_status = '0';
$v_new_company = true;
if(isset($_POST['btn_submit_tb_company'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_company->set_mongo_id($v_mongo_id);
	$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
	if(is_null($v_mongo_id)){
		$v_company_id = $cls_tb_company->select_next('company_id');
	}
	$v_company_id = (int) $v_company_id;
	$cls_tb_company->set_company_id($v_company_id);
	$v_company_name = isset($_POST['txt_company_name'])?$_POST['txt_company_name']:$v_company_name;
	$v_company_name = trim($v_company_name);
	if($v_company_name=='') $v_error_message .= '[Company Name] is empty!<br />';
	$cls_tb_company->set_company_name($v_company_name);
	$v_company_code = isset($_POST['txt_company_code'])?$_POST['txt_company_code']:$v_company_code;
	$v_company_code = trim($v_company_code);
    $v_company_code = remove_invailid_char($v_company_code);
	if($v_company_code=='')
        $v_error_message .= '[Company Code] is empty!<br />';
    else{
        if($cls_tb_company->count(array('$where'=>"this.company_code.toLowerCase()=='".strtolower($v_company_code)."'", 'company_id'=>array('$ne'=>$v_company_id)))>0) $v_error_message .= '+ Duplicate Company Code.<br />';
    }
	$cls_tb_company->set_company_code($v_company_code);
	$v_sales_rep_email = isset($_POST['txt_sales_rep_email'])?$_POST['txt_sales_rep_email']:$v_sales_rep_email;
    $v_sales_rep_email = trim($v_sales_rep_email);
	if($v_sales_rep_email!='' && !is_valid_email($v_sales_rep_email)) $v_error_message .= '+ Sales Rep Email] is invalid.<br />';
	$cls_tb_company->set_sales_rep_email($v_sales_rep_email);
	$v_relationship = isset($_POST['txt_relationship'])?$_POST['txt_relationship']:$v_relationship;
	$v_relationship = (int) $v_relationship;
	$cls_tb_company->set_relationship($v_relationship);
	$cls_tb_company->set_modules($v_modules);
	$v_csr_id = isset($_POST['txt_csr_id'])?$_POST['txt_csr_id']:$v_csr_id;
	$v_csr_id = (int) $v_csr_id;
	$cls_tb_company->set_csr($v_csr_id);
	$v_sales_rep_id = isset($_POST['txt_sales_rep_id'])?$_POST['txt_sales_rep_id']:$v_sales_rep_id;
	$v_sales_rep_id = (int) $v_sales_rep_id;
	$cls_tb_company->set_sales_rep($v_sales_rep_id);
	$v_bussines_type = isset($_POST['txt_business_type'])?$_POST['txt_business_type']:$v_bussines_type;
	$v_bussines_type = (int) $v_bussines_type;
	$cls_tb_company->set_bussines_type($v_bussines_type);
	$v_industry = isset($_POST['txt_industry'])?$_POST['txt_industry']:$v_industry;
	$v_industry = (int) $v_industry;
	$cls_tb_company->set_industry($v_industry);
	$v_website = isset($_POST['txt_website'])?$_POST['txt_website']:$v_website;
	$v_website = trim($v_website);
	if($v_website!='' && !is_valid_url($v_website)) $v_error_message .= '[Website] is Invalid!<br />';
	$cls_tb_company->set_website($v_website);
	$v_status = isset($_POST['txt_status'])?0:1;
	$v_status = (int) $v_status;
	$cls_tb_company->set_status($v_status);

    if($v_error_message==''){
        $v_dir = ROOT_DIR.DS.'resources'.DS.$v_company_code;
        $v_allow = file_exists($v_dir) || @mkdir($v_dir);
        if($v_allow){

            add_class('clsupload');
            $cls_upload = new clsupload();
            $cls_upload->set_destination_dir($v_dir);
            $cls_upload->set_allow_array_extension(array('png', 'gif', 'jpg'));
            $cls_upload->set_field_name('txt_logo_file');
            $cls_upload->set_allow_overwrite();
            $cls_upload->upload_process();
            if($cls_upload->get_error_number()==0){
                $v_file_name = $cls_upload->get_filename();
                $v_pos = strrpos($v_file_name, '.');
                if($v_pos>0){
                    $v_ext = substr($v_file_name, $v_pos);
                    if(file_exists($v_dir.DS.'logo'.$v_ext)) @unlink($v_dir.DS.'logo'.$v_ext);
                    rename($v_dir.DS.$v_file_name, $v_dir.DS.'logo'.$v_ext);

                    $v_logo_file = 'logo'.$v_ext;
                }
            }
            $v_product_dir = $v_dir.DS.'products';
            if(!file_exists($v_product_dir)) @mkdir($v_product_dir);
            $v_signage_layout_dir = $v_dir.DS.'signage_layout';
            if(!file_exists($v_signage_layout_dir)) @mkdir($v_signage_layout_dir);
            $v_slide_dir = $v_dir.DS.'slider';
            if(!file_exists($v_slide_dir)) @mkdir($v_slide_dir);
        }else{
            $v_error_message .= '+ Cannot create resource for Company in: "'.$v_dir.'".<br />';
        }
    }
    if($v_logo_file=='') $v_logo_file = isset($_POST['txt_hidden_logo_file'])?$_POST['txt_hidden_logo_file']:'';
    $cls_tb_company->set_logo_file($v_logo_file);

	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_company->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_company->update(array('_id' => $v_mongo_id));
			$v_new_company = false;
		}
		if($v_result){
			$_SESSION['ss_tb_company_redirect'] = 1;
			redir(URL.$v_admin_key);
		}else{
			if($v_new_company) $v_company_id = 0;
		}
	}
}else{
	$v_company_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_company_id,'int');
	if($v_company_id>0){
		$v_row = $cls_tb_company->select_one(array('company_id' => $v_company_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_company->get_mongo_id();
			$v_company_id = $cls_tb_company->get_company_id();
			$v_company_name = $cls_tb_company->get_company_name();
			$v_company_code = $cls_tb_company->get_company_code();
			$v_sales_rep_email = $cls_tb_company->get_sales_rep_email();
			$v_relationship = $cls_tb_company->get_relationship();
			$v_logo_file = $cls_tb_company->get_logo_file();
			$v_modules = $cls_tb_company->get_modules();
			$v_csr_id = $cls_tb_company->get_csr();
			$v_sales_rep_id = $cls_tb_company->get_sales_rep();
			$v_bussines_type = $cls_tb_company->get_bussines_type();
			$v_industry = $cls_tb_company->get_industry();
			$v_website = $cls_tb_company->get_website();
			$v_status = $cls_tb_company->get_status();
		}
	}
}

$v_dir_file = ROOT_DIR.DS.'resources'.DS.$v_company_code.DS.$v_logo_file;
$v_logo_url = '';
if(file_exists($v_dir_file) && $v_logo_file!=''){
    $v_logo_url = URL.'resources/'.$v_company_code.'/'.$v_logo_file;
    $v_logo_url = '<img title="'.$v_company_name.'" src="'.$v_logo_url.'" style="border:none" />';
}

$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);

$arr_all_contact = array();
$arr_all_contact[] = array(
    'contact_id'=>0,
    'contact_name'=>'--------',
    'contact_info'=>''
);

$arr_contact = $cls_tb_contact->select(array('location_id'=>10000));
$v_tmp_csr_id =0;
$v_tmp_sales_rep_id = 0;
foreach($arr_contact as $arr){
    $v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
    $v_first_name = isset($arr['first_name'])?$arr['first_name']:'';
    $v_last_name = isset($arr['last_name'])?$arr['last_name']:'';
    $v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
    $v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
    $v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
    $v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
    $v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
    $v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
    $v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
    $v_direct_phone = isset($arr['direct_phone'])?$arr['direct_phone']:'';
    $v_email = isset($arr['email'])?$arr['email']:'';

    $v_full_name = $v_first_name.' ' .$v_last_name;
    $v_info = ($v_address_unit!=''?$v_address_unit.',':'') . ($v_address_line_1!=''?$v_address_line_1. '<br>':'');
    $v_info .= (trim($v_address_line_2)!="" ? "-". $v_address_line_2.'<br>': '');
    $v_info .= (trim($v_address_line_3)!="" ? "-". $v_address_line_3.'<br>': '');
    $v_info .=  $v_address_city.'&nbsp&nbsp' .$v_address_province .'&nbsp&nbsp'.   $v_address_postal.'<br>' ;
    $v_info .=  ($v_direct_phone!=''?$v_direct_phone .'<br>':'') ;
    $v_info .=  $v_email;
    if($v_csr_id==$v_contact_id) $v_tmp_csr_id = $v_contact_id;
    if($v_sales_rep_id==$v_contact_id) $v_tmp_sales_rep_id = $v_contact_id;
    $arr_all_contact[] = array(
        'contact_id'=>$v_contact_id,
        'contact_name'=>$v_full_name,
        'contact_info'=>$v_info
    );
}
$v_csr_id = $v_tmp_csr_id;
$v_sales_rep_id = $v_tmp_sales_rep_id;
?>