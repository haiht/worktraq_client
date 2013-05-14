<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_tracking_id = 0;
$v_tracking_name = '';
$v_tracking_key = '';
$v_website = '';
$v_tracking_url = '';
$v_option_url = '';
$v_phone = '';
$v_email = '';
$v_contact_name = '';
$v_status = '0';
$v_description = '';
$v_country_id = 15;
$v_new_tracking = true;
if(isset($_POST['btn_submit_tb_tracking'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_tracking->set_mongo_id($v_mongo_id);
	$v_tracking_id = isset($_POST['txt_tracking_id'])?$_POST['txt_tracking_id']:$v_tracking_id;
	if(is_null($v_mongo_id)){
		$v_tracking_id = $cls_tb_tracking->select_next('tracking_id');
	}
	$v_tracking_id = (int) $v_tracking_id;
	$cls_tb_tracking->set_tracking_id($v_tracking_id);
	$v_tracking_name = isset($_POST['txt_tracking_name'])?$_POST['txt_tracking_name']:$v_tracking_name;
	$v_tracking_name = trim($v_tracking_name);
	if($v_tracking_name=='') $v_error_message .= '[Tracking Name] is empty!<br />';
	$cls_tb_tracking->set_tracking_name($v_tracking_name);
	$v_tracking_key = isset($_POST['txt_tracking_key'])?$_POST['txt_tracking_key']:$v_tracking_key;
	$v_tracking_key = trim($v_tracking_key);
	if($v_tracking_key=='')
        $v_error_message .= '[Tracking Key] is empty!<br />';
    else if($cls_tb_tracking->count(array('tracking_key'=>$v_tracking_key, 'tracking_id'=>array('$ne'=>$v_tracking_id)))>0) $v_error_message .= '[Tracking Key] is unique!<br />';
	$cls_tb_tracking->set_tracking_key($v_tracking_key);
	$v_website = isset($_POST['txt_website'])?$_POST['txt_website']:$v_website;
	$v_website = trim($v_website);
	if($v_website=='')
        $v_error_message .= '[Website] is empty!<br />';
    else if(!is_valid_url($v_website)) $v_error_message .= '[Website] is invalid!<br />';

	$cls_tb_tracking->set_website($v_website);
	$v_tracking_url = isset($_POST['txt_tracking_url'])?$_POST['txt_tracking_url']:$v_tracking_url;
	$v_tracking_url = trim($v_tracking_url);
	if($v_tracking_url!='' && !is_valid_url($v_tracking_url)) $v_error_message .= '[Tracking URL] is invalid!<br />';
	$cls_tb_tracking->set_tracking_url($v_tracking_url);
	$v_option_url = isset($_POST['txt_option_url'])?$_POST['txt_option_url']:$v_option_url;
	$v_option_url = trim($v_option_url);
	if($v_option_url!='' &&!is_valid_url($v_option_url)) $v_error_message .= '[Option URL] is invalid!<br />';
	$cls_tb_tracking->set_option_url($v_option_url);
	$v_phone = isset($_POST['txt_phone'])?$_POST['txt_phone']:$v_phone;
	$v_phone = trim($v_phone);
	if($v_phone!='' && !is_validate_telephone_number($v_phone)) $v_error_message .= '[Phone] is invalid!<br />';
	$cls_tb_tracking->set_phone($v_phone);
	$v_email = isset($_POST['txt_email'])?$_POST['txt_email']:$v_email;
	$v_email = trim($v_email);
	if($v_email!='' && !is_valid_email($v_email)) $v_error_message .= '[Email] is invalid!<br />';
	$cls_tb_tracking->set_email($v_email);
	$v_contact_name = isset($_POST['txt_contact_name'])?$_POST['txt_contact_name']:$v_contact_name;
	$v_contact_name = trim($v_contact_name);
	$cls_tb_tracking->set_contact_name($v_contact_name);
	$v_status = isset($_POST['txt_status'])?0:1;
	$v_status = (int) $v_status;
	$cls_tb_tracking->set_status($v_status);
	$v_description = isset($_POST['txt_description'])?$_POST['txt_description']:$v_description;
	$v_description = trim($v_description);
	$cls_tb_tracking->set_description($v_description);
	$v_country_id = isset($_POST['txt_country_id'])?$_POST['txt_country_id']:$v_country_id;
	$v_country_id = (int) $v_country_id;
	$cls_tb_tracking->set_country_id($v_country_id);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_tracking->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_tracking->update(array('_id' => $v_mongo_id));
			$v_new_tracking = false;
		}
		if($v_result){
			$_SESSION['ss_tb_tracking_redirect'] = 1;
			redir(URL.$v_admin_key);
		}else{
			if($v_new_tracking) $v_tracking_id = 0;
		}
	}
}else{
	$v_tracking_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_tracking_id,'int');
	if($v_tracking_id>0){
		$v_row = $cls_tb_tracking->select_one(array('tracking_id' => $v_tracking_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_tracking->get_mongo_id();
			$v_tracking_id = $cls_tb_tracking->get_tracking_id();
			$v_tracking_name = $cls_tb_tracking->get_tracking_name();
			$v_tracking_key = $cls_tb_tracking->get_tracking_key();
			$v_website = $cls_tb_tracking->get_website();
			$v_tracking_url = $cls_tb_tracking->get_tracking_url();
			$v_option_url = $cls_tb_tracking->get_option_url();
			$v_phone = $cls_tb_tracking->get_phone();
			$v_email = $cls_tb_tracking->get_email();
			$v_contact_name = $cls_tb_tracking->get_contact_name();
			$v_status = $cls_tb_tracking->get_status();
			$v_description = $cls_tb_tracking->get_description();
			$v_country_id = $cls_tb_tracking->get_country_id();
		}
	}
}
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);

$arr_all_country = array();
$arr_all_country[] = array('country_id'=>0, 'country_name'=>'--------', 'country_key'=>'');

$arr_country = $cls_tb_country->select(array(), array('this.country_key.toLowerCase()'=>1));
foreach($arr_country as $arr){
    $v_tmp_country_id = $arr['country_id'];
    $v_country_name = $arr['country_name'];
    $v_country_key = strtolower($arr['country_key']);
    $arr_all_country[] = array('country_id'=>$v_tmp_country_id, 'country_name'=>$v_country_name, 'country_key'=>$v_country_key);
}
?>