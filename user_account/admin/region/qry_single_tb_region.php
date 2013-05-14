<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_region_id = 0;
$v_company_id = 0;
$v_region_name = '';
$v_region_key = '';
$v_region_type = 0;
$v_region_contact = 0;
$v_status = '0';
$v_new_region = true;
$v_old_region_contact = 0;
if(isset($_POST['btn_submit_tb_region'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_region->set_mongo_id($v_mongo_id);
	$v_region_id = isset($_POST['txt_region_id'])?$_POST['txt_region_id']:$v_region_id;
	if(is_null($v_mongo_id)){
		$v_region_id = $cls_tb_region->select_next('region_id');
	}
	$v_region_id = (int) $v_region_id;
	$cls_tb_region->set_region_id($v_region_id);
	$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
	$v_company_id = (int) $v_company_id;
	if($v_company_id<0) $v_error_message .= '[Company Id] is negative!<br />';
	$cls_tb_region->set_company_id($v_company_id);
	$v_region_name = isset($_POST['txt_region_name'])?$_POST['txt_region_name']:$v_region_name;
	$v_region_name = trim($v_region_name);
	if($v_region_name=='') $v_error_message .= '[Region Name] is empty!<br />';
	$cls_tb_region->set_region_name($v_region_name);

    $v_region_key = isset($_POST['txt_region_key'])?$_POST['txt_region_key']:$v_region_key;
    $v_region_key = trim($v_region_key);
    if($v_region_key=='')
        $v_error_message .= '[Region Key] is empty!<br />';
    else{
        if($cls_tb_region->count(array('company_id'=>$v_company_id, 'region_key'=>$v_region_key, 'region_id'=>array('$ne'=>$v_region_id)))>0) $v_error_message.= '+ [Region Key] is unique.<br />';
    }
    $cls_tb_region->set_region_key($v_region_key);


	$v_region_type = isset($_POST['txt_region_type'])?$_POST['txt_region_type']:$v_region_type;
	$v_region_type = (int) $v_region_type;
	$cls_tb_region->set_region_type($v_region_type);
	$v_region_contact = isset($_POST['txt_region_contact'])?$_POST['txt_region_contact']:$v_region_contact;
	$v_region_contact = (int) $v_region_contact;
	if($v_region_contact<0) $v_error_message .= '[Region Contact] is negative!<br />';
	$cls_tb_region->set_region_contact($v_region_contact);
	$v_status = isset($_POST['txt_status'])?0:1;
	$v_status = (int) $v_status;
	$cls_tb_region->set_status($v_status);

    $v_old_region_contact = isset($_POST['txt_old_region_contact'])?$_POST['txt_old_region_contact']:$v_old_region_contact;
    $v_old_region_contact = (int) $v_old_region_contact;



    $v_list_location = isset($_POST['txt_list_location'])?$_POST['txt_list_location']:'';
    $v_is_array = false;
    $arr_list_location = array();
    if($v_list_location!=''){
        if(get_magic_quotes_gpc()) $v_list_location = stripcslashes($v_list_location);
        $arr_list_location = json_decode($v_list_location, true);
        $v_is_array = is_array($arr_list_location);
        if($v_is_array){
            for($i=0; $i<count($arr_list_location);$i++)
                $arr_list_location[$i] = (int) $arr_list_location[$i];
        }
    }
    $v_str = "\r\nStep 1: ".json_encode($arr_list_location);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_region->insert();
			$v_result = is_object($v_mongo_id);
            if($v_result){
                $cls_tb_location->update_field('location_region', $v_region_id, array('location_id'=>array('$in'=>$arr_list_location)));
                for($i=0; $i<count($arr_list_location);$i++){
                    $v_location_id = $arr_list_location[$i];
                    if($v_location_id<=0) continue;
                    $v_location_log_id = $cls_tb_location_log->select_next('log_id');
                    $cls_tb_location_log->set_log_id($v_location_log_id);
                    $cls_tb_location_log->set_company_id($v_company_id);
                    $cls_tb_location_log->set_location_id($v_location_id);
                    $cls_tb_location_log->set_region_contact($v_region_contact);
                    $cls_tb_location_log->set_open_date(date('Y-m-d H:i:s'));
                    $cls_tb_location_log->set_close_date(NULL);
                    $cls_tb_location_log->set_region_id($v_region_id);
                    $cls_tb_location_log->insert();
                }
            }
		}else{
			$v_result = $cls_tb_region->update(array('_id' => $v_mongo_id));
			$v_new_region = false;
            if($v_result){
                $arr_location = $cls_tb_location->select(array('location_region'=>$v_region_id));
                $arr_old_location = array();
                foreach($arr_location as $arr){
                    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
                    $v_location_region = isset($arr['location_region'])?$arr['location_region']:0;
                    settype($v_location_region, 'int');
                    if($v_location_id<=0) continue;
                    if(!in_array($v_location_id, $arr_list_location)){
                        $cls_tb_location->update_field('location_region', 0, array('location_id'=>$v_location_id));
                        $cls_tb_location_log->update_field('close_date', new MongoDate(time()), array('location_id'=>$v_location_id, 'region_id'=>$v_region_id));
                    }else{

                        if($v_old_region_contact!=$v_region_contact && $v_old_region_contact>0){//if new region contact
                            //close log for old contact
                            $cls_tb_location_log->update_field('close_date', new MongoDate(time()), array('location_id'=>$v_location_id, 'region_id'=>$v_region_id));
                        }else{
                            $arr_old_location[] = $v_location_id; //no change
                        }
                    }
                }

                $v_str .= "\r\n\r\nStep 2: ".json_encode($arr_old_location);
                $arr_new_location = array();
                if(count($arr_old_location)>0){
                    for($i=0; $i<count($arr_list_location);$i++){
                        $v_location_id = $arr_list_location[$i];
                        if(!in_array($v_location_id, $arr_old_location)) $arr_new_location[] = $v_location_id;
                    }
                }else{
                    $arr_new_location = $arr_list_location;
                }
                $v_str .= "\r\n\r\nStep 3: ".json_encode($arr_new_location);
                $cls_tb_location->update_field('location_region', $v_region_id, array('location_id'=>array('$in'=>$arr_new_location)));
                for($i=0; $i<count($arr_new_location);$i++){
                    $v_location_id = $arr_new_location[$i];
                    if($v_location_id<=0) continue;
                    $v_location_log_id = $cls_tb_location_log->select_next('log_id');
                    $cls_tb_location_log->set_log_id($v_location_log_id);
                    $cls_tb_location_log->set_company_id($v_company_id);
                    $cls_tb_location_log->set_location_id($v_location_id);
                    $cls_tb_location_log->set_region_contact($v_region_contact);
                    $cls_tb_location_log->set_open_date(date('Y-m-d H:i:s'));
                    $cls_tb_location_log->set_close_date(NULL);
                    $cls_tb_location_log->set_region_id($v_region_id);
                    $cls_tb_location_log->insert();
                }
            }
		}
		if($v_result){
			$_SESSION['ss_tb_region_redirect'] = 1;
			redir(URL.$v_admin_key);
		}else{
			if($v_new_region) $v_region_id = 0;
		}
	}
    $fp = fopen('xem1.txt', 'w');
    fwrite($fp, $v_str, strlen($v_str));
    fclose($fp);
}else{
	$v_region_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_region_id,'int');
	if($v_region_id>0){
		$v_row = $cls_tb_region->select_one(array('region_id' => $v_region_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_region->get_mongo_id();
			$v_region_id = $cls_tb_region->get_region_id();
			$v_company_id = $cls_tb_region->get_company_id();
			$v_region_name = $cls_tb_region->get_region_name();
			$v_region_key = $cls_tb_region->get_region_key();
			$v_region_type = $cls_tb_region->get_region_type();
			$v_region_contact = $cls_tb_region->get_region_contact();
			$v_status = $cls_tb_region->get_status();
		}
	}
}

/*
$arr_all_region_location = array();

if($v_region_id>0){

    $arr_location = $cls_tb_location->select(array('company_id'=>$v_company_id));
    $v_idx = 1;
    foreach($arr_location as $arr){
        $v_c_location_id = isset($arr['location_id'])?$arr['location_id']:0;
        $v_c_location_name = isset($arr['location_name'])?$arr['location_name']:'';
        $v_c_location_number = isset($arr['location_number'])?$arr['location_number']:'';
        $v_c_location_banner = isset($arr['location_banner'])?$arr['location_banner']:'';
        $v_c_location_region = isset($arr['location_region'])?$arr['location_region']:'0';
        $v_c_location_type = isset($arr['location_type'])?$arr['location_type']:'0';
        settype($v_c_location_region, 'int');
        settype($v_c_location_type, 'int');
        if($v_c_location_region>0 && $v_region_id!=$v_c_location_region) continue;
        $v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
        $v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
        $v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
        $v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
        $v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
        $v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
        $v_address_unit =  isset($arr['address_unit'])?$arr['address_unit']:'';
        $v_main_contact =  isset($arr['main_contact'])?$arr['main_contact']:'';
        $v_dsp_address = (trim($v_address_unit)!=''?trim($v_address_unit) .', ':'') . (trim($v_address_line_1)!=''?trim($v_address_line_1).', ' :'');
        $v_dsp_address .= (trim($v_address_line_2)!=''?trim($v_address_line_2). ', ' :'');
        $v_dsp_address .= (trim($v_address_line_3)!=''?trim($v_address_line_3).', ' :'');
        $v_dsp_address .= (trim($v_address_city)!=''?trim($v_address_city) .', ':'') . (trim($v_address_province)!=''?trim($v_address_province) .', ':'') .(trim($v_address_postal)!=''?trim($v_address_postal).', ':'');

        $v_dsp_address = trim($v_dsp_address);
        if($v_dsp_address!=''){
            if(substr($v_dsp_address, strlen($v_dsp_address)-1)==',') $v_dsp_address = substr($v_dsp_address,0,strlen($v_dsp_address)-1);
        }
        $v_main_contact_name = $cls_tb_contact->get_full_name_contact($v_main_contact);

        $arr_all_region_location[] = array(
            'row_order'=> $v_idx++
            ,'location_id'=>$v_c_location_id
            ,'location_name'=>$v_c_location_name
        ,'location_type'=> $cls_settings->get_option_name_by_id('location_type', $v_c_location_type)
            ,'location_number'=> $v_c_location_number.""
            ,'location_banner'=>$v_c_location_banner
            ,'main_contact'=>$v_main_contact_name
            ,'location_address'=>$v_dsp_address
            ,'location_region'=> $v_c_location_region==$v_region_id?1:0
        );
    }
    $arr_all_region_location = record_sort($arr_all_region_location, 'location_region', true);
    for($i=0; $i<count($arr_all_region_location);$i++)
        $arr_all_region_location[$i]['row_order'] = $i+1;
}
*/



$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
?>