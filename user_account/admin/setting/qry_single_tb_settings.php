<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_setting_id = 0;
$v_setting_name = '';
$v_status = '0';
$v_setting_description = '';
$v_setting_type = 0;
$arr_option = array();
$v_new_settings = true;
if(isset($_POST['btn_submit_tb_settings'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_settings->set_mongo_id($v_mongo_id);
	$v_setting_id = isset($_POST['txt_setting_id'])?$_POST['txt_setting_id']:$v_setting_id;
	if(is_null($v_mongo_id)){
		$v_setting_id = $cls_settings->select_next('setting_id');
	}
	$v_setting_id = (int) $v_setting_id;
	$cls_settings->set_setting_id($v_setting_id);
	$v_setting_name = isset($_POST['txt_setting_name'])?$_POST['txt_setting_name']:$v_setting_name;
	$v_setting_name = trim($v_setting_name);
	if($v_setting_name=='')
        $v_error_message .= '[Setting Name] is empty!<br />';
    else{
        if($cls_settings->count(array('setting_name'=>$v_setting_name, 'setting_id'=>array('$ne'=>$v_setting_id)))>0) $v_error_message .= '+ Duplicate Setting Name';
    }
	$cls_settings->set_setting_name($v_setting_name);
	$v_status = isset($_POST['txt_status'])?0:1;
	$cls_settings->set_setting_status($v_status);
	$v_setting_description = isset($_POST['txt_setting_description'])?$_POST['txt_setting_description']:$v_setting_description;
	$v_setting_description = trim($v_setting_description);
	$cls_settings->set_setting_description($v_setting_description);
	$v_setting_type = isset($_POST['txt_setting_type'])?$_POST['txt_setting_type']:$v_setting_type;
	$v_setting_type = (int) $v_setting_type;
	$cls_settings->set_setting_type($v_setting_type);
	$v_option = isset($_POST['txt_data_option'])?$_POST['txt_data_option']:'';
    if(get_magic_quotes_gpc()) $v_option = stripcslashes($v_option);
    if($v_option!=''){
        $arr_option = json_decode($v_option, true);
    }
	$cls_settings->set_setting_option($arr_option);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_settings->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_settings->update(array('_id' => $v_mongo_id));
			$v_new_settings = false;
		}
		if($v_result){
			$_SESSION['ss_tb_settings_redirect'] = 1;
			redir(URL.$v_admin_key);
		}else{
			if($v_new_settings) $v_settings_id = 0;
		}
	}
}else{
	$v_setting_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_setting_id,'int');
	if($v_setting_id>0){
		$v_row = $cls_settings->select_one(array('setting_id' => $v_setting_id));
		if($v_row == 1){
			$v_mongo_id = $cls_settings->get_mongo_id();
			$v_setting_id = $cls_settings->get_setting_id();
			$v_setting_name = $cls_settings->get_setting_name();
			$v_status = $cls_settings->get_setting_status();
			$v_setting_description = $cls_settings->get_setting_description();
			$v_setting_type = $cls_settings->get_setting_type();
			$arr_option = $cls_settings->get_setting_option();
		}
	}
}
$arr_all_option = array();
$v_row_id = 1;
for($i=0; $i<count($arr_option);$i++){
    $v_id = isset($arr_option[$i]['id'])?$arr_option[$i]['id']:0;
    $v_name = isset($arr_option[$i]['name'])?$arr_option[$i]['name']:'';
    $v_key = isset($arr_option[$i]['key'])?$arr_option[$i]['key']:'';
    $v_group = isset($arr_option[$i]['group'])?$arr_option[$i]['group']:0;
    $v_sort = isset($arr_option[$i]['sort'])?$arr_option[$i]['sort']:0;
    $v_status = isset($arr_option[$i]['status'])?$arr_option[$i]['status']:0;
    $arr_all_option[] = array(
        'row_id'=>$v_row_id++
        ,'ids'=> (int) $v_id
        ,'name'=>$v_name
        ,'key'=>$v_key
        ,'status'=> $v_status==0?true:false
        ,'group'=>(int) $v_group
        ,'sort'=>(int) $v_sort
    );
}
$arr_all_option = record_sort($arr_all_option, 'ids');
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
?>