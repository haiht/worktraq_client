<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_area_id = 0;
$v_company_id = 0;
$v_location_id = 0;
$v_area_name = '';
$v_area_description = '';
$v_status = 0;
$v_area_code = '';
$v_area_order = 0;
if(isset($_POST['btn_submit_tb_area'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_area->set_mongo_id($v_mongo_id);
	$v_area_id = isset($_POST['txt_area_id'])?$_POST['txt_area_id']:$v_area_id;
	if(is_null($v_mongo_id)){
		$v_area_id = $cls_tb_area->select_next('area_id');
	}
	$v_area_id = (int) $v_area_id;
    if($v_area_id<0) $v_error_message .= '+ Area ID is negative.<br />';
	$cls_tb_area->set_area_id($v_area_id);
	$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
	$v_company_id = (int) $v_company_id;
	if($v_company_id<0) $v_error_message .= 'Company Id is negative!<br />';
	$cls_tb_area->set_company_id($v_company_id);
	$v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:$v_location_id;
	$v_location_id = (int) $v_location_id;
	if($v_location_id<0) $v_location_id = 0;
	$cls_tb_area->set_location_id($v_location_id);
	$v_area_name = isset($_POST['txt_area_name'])?$_POST['txt_area_name']:$v_area_name;
	$v_area_name = trim($v_area_name);
	if($v_area_name=='') $v_error_message .= 'Area Name is empty!<br />';
	$cls_tb_area->set_area_name($v_area_name);
	$v_area_description = isset($_POST['txt_area_description'])?$_POST['txt_area_description']:$v_area_description;
	$v_area_description = trim($v_area_description);
	$cls_tb_area->set_area_description($v_area_description);
	$v_status = isset($_POST['txt_status'])?0:1;
	$v_status = (int) $v_status;
	$cls_tb_area->set_status($v_status);
	$v_area_code = isset($_POST['txt_area_code'])?$_POST['txt_area_code']:$v_area_code;
	$v_area_code = trim($v_area_code);
    if($v_area_code==''){
        $arr_area_name = explode(' ', $v_area_name);
        for($i=0; $i<count($arr_area_name); $i++){
            $v_one = trim($arr_area_name[$i]);
            if($v_one!='')
                $v_area_code .= substr($v_one,0,1);
        }
    }
	$cls_tb_area->set_area_code($v_area_code);
    $v_area_order = isset($_POST['txt_area_code'])?$_POST['txt_area_code']:'0';
    settype($v_area_order, 'int');
    if($v_area_order<=0) $v_area_order = $v_area_id;
    $cls_tb_area->set_area_order($v_area_order);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_area->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_area->update(array('_id' => $v_mongo_id));
		}
		if($v_result) redir(URL.$v_admin_key);
	}
}else{
	$v_area_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_area_id,'int');
	if($v_area_id>0){
		$v_row = $cls_tb_area->select_one(array('area_id' => $v_area_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_area->get_mongo_id();
			$v_area_id = $cls_tb_area->get_area_id();
			$v_company_id = $cls_tb_area->get_company_id();
			$v_location_id = $cls_tb_area->get_location_id();
			$v_area_name = $cls_tb_area->get_area_name();
			$v_area_description = $cls_tb_area->get_area_description();
			$v_status = $cls_tb_area->get_status();
			$v_area_code = $cls_tb_area->get_area_code();
			$v_area_order = $cls_tb_area->get_area_order();
		}
	}
}

$v_dsp_company_draw = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
if($v_company_id>0)
    $v_dsp_location_draw = $cls_tb_location->draw_option('location_id', 'location_name', $v_location_id, array('company_id'=>$v_company_id, 'status'=>0));
else
    $v_dsp_location_draw = '';
?>