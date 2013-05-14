<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_user_id = 0;
$v_user_name = '';
$v_company_id = 0;
$v_location_id = 0;
$v_contact_id = 0;
$v_user_password = '';
$v_user_location_approve = '';
$v_user_location_allocate = '';
$v_user_location_view = '';
$v_user_type = 3;
$arr_user_rule = array();
$arr_user_role = array();
$v_user_status = '0';
$v_user_lastlog = date('Y-m-d H:i:s', time());
$v_new_user = true;
$v_row = 0;
if(isset($_POST['btn_submit_tb_user'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_user->set_mongo_id($v_mongo_id);
	$v_user_id = isset($_POST['txt_user_id'])?$_POST['txt_user_id']:$v_user_id;
	if(is_null($v_mongo_id)){
		$v_user_id = $cls_tb_user->select_next('user_id');
	}
	$v_user_id = (int) $v_user_id;
	$cls_tb_user->set_user_id($v_user_id);
	$v_user_name = isset($_POST['txt_user_name'])?$_POST['txt_user_name']:$v_user_name;
	$v_user_name = trim($v_user_name);
	if($v_user_name=='') $v_error_message .= '[User Name] is empty!<br />';

    $arr_where = array('$where'=>"this.user_name.toLowerCase()==='".strtolower($v_user_name)."'");
    if($cls_tb_user->count($arr_where)>0) $v_error_message .= 'The current username is existed.<br />';

	$cls_tb_user->set_user_name($v_user_name);
	$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
	$v_company_id = (int) $v_company_id;
	if($v_company_id<=0) $v_error_message .= '[Company Id] is negative!<br />';
	$cls_tb_user->set_company_id($v_company_id);
	$v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:$v_location_id;
	$v_location_id = (int) $v_location_id;
	if($v_location_id<0) $v_error_message .= '[Location Id] is negative!<br />';
	$cls_tb_user->set_location_id($v_location_id);
	$v_contact_id = isset($_POST['txt_contact_id'])?$_POST['txt_contact_id']:$v_contact_id;
	$v_contact_id = (int) $v_contact_id;
	if($v_contact_id<=0) $v_error_message .= '[Contact Id] is negative!<br />';
	$cls_tb_user->set_contact_id($v_contact_id);
	$v_user_password = isset($_POST['txt_user_password'])?$_POST['txt_user_password']:$v_user_password;
	$v_user_password = trim($v_user_password);
	if($v_user_password=='') $v_error_message .= '[User Password] is empty!<br />';
	$cls_tb_user->set_user_password(md5($v_user_password));

	$v_user_location_approve = isset($_POST['txt_hidden_location_approve'])?$_POST['txt_hidden_location_approve']:$v_user_location_approve;
	$v_user_location_approve = trim($v_user_location_approve);
	$cls_tb_user->set_user_location_approve($v_user_location_approve);
	$v_user_location_allocate = isset($_POST['txt_hidden_location_allocate'])?$_POST['txt_hidden_location_allocate']:$v_user_location_allocate;
	$v_user_location_allocate = trim($v_user_location_allocate);
	$cls_tb_user->set_user_location_allocate($v_user_location_allocate);
	$v_user_location_view = isset($_POST['txt_hidden_location_view'])?$_POST['txt_hidden_location_view']:$v_user_location_view;
	$v_user_location_view = trim($v_user_location_view);
	$cls_tb_user->set_user_location_view($v_user_location_view);
	$v_user_type = isset($_POST['txt_user_type'])?$_POST['txt_user_type']:$v_user_type;
	$v_user_type = (int) $v_user_type;
	if($v_user_type<0) $v_error_message .= '[User Type] is negative!<br />';
	$cls_tb_user->set_user_type($v_user_type);
	$v_user_status = isset($_POST['txt_user_status'])?$_POST['txt_user_status']:$v_user_status;
	$v_user_status = (int) $v_user_status;
	if($v_user_status<0) $v_error_message .= '[User Status] is negative!<br />';
	$cls_tb_user->set_user_status($v_user_status);
	$v_user_lastlog = isset($_POST['txt_user_lastlog'])?$_POST['txt_user_lastlog']:$v_user_lastlog;
	if(!check_date($v_user_lastlog)) $v_error_message .= '[User Lastlog] is invalid date/time!<br />';
    $cls_tb_user->set_user_lastlog($v_user_lastlog);

    $arr_user_role = isset($_POST['txt_role_id'])?$_POST['txt_role_id']:array();
    if(!is_array($arr_user_role)) $arr_user_role = explode(',', $arr_user_role);
    for($i=0; $i<count($arr_user_role); $i++)
        $arr_user_role[$i] = (int) $arr_user_role[$i];
    $cls_tb_user->set_user_role($arr_user_role);
    $v_user_rule = isset($_POST['txt_user_rule'])?$_POST['txt_user_rule']:'';
    if(get_magic_quotes_gpc()) $v_user_rule = stripcslashes($v_user_rule);
    $arr_user_rule = array();
    if($v_user_rule!=''){
        $arr_tmp_user_rule = json_decode($v_user_rule, true);
        if(is_array($arr_tmp_user_rule)){
            for($i=0; $i<count($arr_tmp_user_rule);$i++){
                $v_menu = $arr_tmp_user_rule[$i][0];
                $v_key = $arr_tmp_user_rule[$i][1];
                $v_description = $arr_tmp_user_rule[$i][2];
                $arr_user_rule[$v_menu][$v_key] = $v_description;
            }
        }
    }
    $cls_tb_user->set_user_rule($arr_user_rule);

	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_user->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_user->update(array('_id' => $v_mongo_id));
			$v_new_user = false;
		}
		if($v_result){
			$_SESSION['ss_tb_user_redirect'] = 1;
			redir(URL.$v_admin_key);
		}else{
			if($v_new_user) $v_user_id = 0;
		}
	}
}else{
	$v_user_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_user_id,'int');
	if($v_user_id>0){
		$v_row = $cls_tb_user->select_one(array('user_id' => $v_user_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_user->get_mongo_id();
			$v_user_id = $cls_tb_user->get_user_id();
			$v_user_name = $cls_tb_user->get_user_name();
			$v_company_id = $cls_tb_user->get_company_id();
			$v_location_id = $cls_tb_user->get_location_id();
			$v_contact_id = $cls_tb_user->get_contact_id();
			$v_user_password = $cls_tb_user->get_user_password();
			$v_user_location_approve = $cls_tb_user->get_user_location_approve();
			$v_user_location_allocate = $cls_tb_user->get_user_location_allocate();
			$v_user_location_view = $cls_tb_user->get_user_location_view();
			$v_user_type = $cls_tb_user->get_user_type();
			$arr_user_rule = $cls_tb_user->get_user_rule();
			$arr_user_role = $cls_tb_user->get_user_role();
			$v_user_status = $cls_tb_user->get_user_status();
			$v_user_lastlog = date('Y-m-d H:i:s',$cls_tb_user->get_user_lastlog());
		}
	}
}
$v_user_lastlog = date('d-M-Y H:i:s', strtotime($v_user_lastlog));

$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);

$arr_all_location = array();
$arr_all_location[0] = array('location_id'=>0, 'location_name'=>'--------');
$arr_all_user_location = array();

$arr_all_contact = array();

$v_tmp_location_id = 0;
$v_tmp_contact_id = 0;
if($v_user_id>0){
    //Combobox for locations
    //$arr_all_location = get_array_data($cls_tb_location, 'location_id', 'location_name', $v_tmp_location_id, array(0,'--------'), array('company_id'=>$v_company_id));

    $arr_location = $cls_tb_location->select(array('company_id'=>$v_company_id));
    $v_idx = 1;
    foreach($arr_location as $arr){
        $v_c_location_id = isset($arr['location_id'])?$arr['location_id']:0;
        $v_c_location_name = isset($arr['location_name'])?$arr['location_name']:'';
        $v_c_location_number = isset($arr['location_number'])?$arr['location_number']:'';
        $v_c_location_banner = isset($arr['location_banner'])?$arr['location_banner']:'';

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

        $arr_all_user_location[] = array(
            'row_order'=> $v_idx++
            ,'location_id'=>$v_c_location_id
            ,'location_name'=>$v_c_location_name
            ,'location_number'=> $v_c_location_number.""
            ,'location_banner'=>$v_c_location_banner
            ,'main_contact'=>$v_main_contact_name
            ,'location_address'=>$v_dsp_address
            ,'location_view'=> strpos($v_user_location_view.',', $v_c_location_id.',')===false?0:1
            ,'location_approve'=> strpos($v_user_location_approve.',', $v_c_location_id.',')===false?0:1
            ,'location_allocate'=> strpos($v_user_location_allocate.',', $v_c_location_id.',')===false?0:1
        );

        //$arr_all_location[] = array('location_id'=>$v_c_location_id, 'location_name'=>$v_c_location_name);
        //if($v_c_location_id==$v_location_id) $v_tmp_location_id = $v_location_id;
    }
    //$v_location_id = $v_tmp_location_id;


    //if($v_location_id>0)
    //    $arr_where = array('location_id'=>$v_location_id);
    //else
    //    $arr_where = array('company_id'=>$v_company_id);
    //$arr_tmp_contact = $cls_tb_contact->select($arr_where);

    //$arr_all_contact = array();
    //$arr_all_contact[] = array('contact_id'=>0,'contact_name'=>'--------');
    //foreach($arr_tmp_contact as $arr){
    //    $arr_all_contact[] = array('contact_id'=>$arr['contact_id'],'contact_name'=>trim($arr['first_name'].' '.$arr['last_name']));
    //    if($v_contact_id==$arr['contact_id']) $v_tmp_contact_id = $v_contact_id;
    //}
    //$v_contact_id = $v_tmp_contact_id;

    $arr_user_rule = $cls_tb_user->select_scalar('user_rule',array('user_id'=>(int)$v_user_id));
    $v_tmp = 0;
    $arr_all_role = get_array_data($cls_tb_role,'role_id', 'role_title',$v_tmp, array(), array('company_id'=>$v_company_id));
}else{
    $arr_all_contact[0] = array('contact_id'=>0, 'contact_name'=>'--------');
    $arr_user_rule = array();
    $arr_all_role = array();
}
$v_dsp_user_type_option = $cls_settings->draw_option_by_id('user_type', 0, $v_user_type);

//Tab Direct Permission
if(!is_array($arr_user_rule)) $arr_user_rule = array();
$v_tmp_module_menu = '';
$v_dsp_script = '';

add_class('cls_tb_module');
$cls_tb_module = new cls_tb_module($db, LOG_DIR);

$v_dsp_modules = '';
$v_dsp_script = "\nvar rule = new Array();";
$v_index = 0;
$arr_where_clause = array('module_root'=>'office', 'module_role'=>1);
$arr_module = $cls_tb_module->select($arr_where_clause);
$v_idx = 0;
foreach($arr_module as $arr){
    $v_module_text = isset($arr['module_text'])?$arr['module_text']:'';
    $v_module_menu = isset($arr['module_menu'])?$arr['module_menu']:'';
    $arr_module_rule = isset($arr['module_rules'])?$arr['module_rules']:array();
    $v_dsp_modules_one = '';
    for($i=0; $i<count($arr_module_rule);$i++){
        $v_key = $arr_module_rule[$i]['key'];
        $v_value = $arr_module_rule[$i]['description'];
        $v_value_script = addslashes($v_value);
        $v_tmp_status = $arr_module_rule[$i]['status'];
        if($v_tmp_status==0 && $v_module_menu!=''){
            $v_checked = isset($arr_user_rule[$v_module_menu][$v_key])?' checked="checked"':'';
            $v_dsp_modules_one .= '<li style="padding-left:20px"><label><input '.$v_checked.' type="checkbox" data-menu="'.$v_module_menu.'" name="chk_rule_id" title="'.$v_value.'" value="'.$v_key.'" id="chk_rule_id"> '.$v_value.'</label></li>';
            if($v_checked!=''){
                $v_dsp_script .= "\nrule[".$v_index."] = new UserRule('{$v_module_menu}', '{$v_key}', '{$v_value_script}', 1);";
                $v_index++;
            }
        }
    }
    if($v_dsp_modules_one!=''){
        $v_dsp_modules_one = '<li'.($v_idx==0?' class="k-state-active"':'').'><label style="font-weight:bold">Rules for module: '.$v_module_text.' [Customer\'s interface]</label><ul><li><label style="font-weight:bold"><input id="chk_all_rule" data-menu="'.$v_module_menu.'" type="checkbox" /> Select All</label></li>'.$v_dsp_modules_one.'</ul></li>';
    }
    $v_dsp_modules .= $v_dsp_modules_one;
    $v_idx++;
}
$arr_where_clause = array('module_root'=>'admin', 'module_role'=>1);
$arr_module = $cls_tb_module->select($arr_where_clause);
foreach($arr_module as $arr){
    $v_module_text = isset($arr['module_text'])?$arr['module_text']:'';
    $v_module_menu = isset($arr['module_menu'])?$arr['module_menu']:'';
    $arr_module_rule = isset($arr['module_rules'])?$arr['module_rules']:array();
    $v_dsp_modules_one = '';
    for($i=0; $i<count($arr_module_rule);$i++){
        $v_key = $arr_module_rule[$i]['key'];
        $v_value = $arr_module_rule[$i]['description'];
        $v_value_script = addslashes($v_value);
        $v_tmp_status = $arr_module_rule[$i]['status'];
        if($v_tmp_status==0 && $v_module_menu!=''){
            $v_checked = isset($arr_user_rule[$v_module_menu][$v_key])?' checked="checked"':'';
            $v_dsp_modules_one .= '<li style="padding-left:20px"><label><input '.$v_checked.' type="checkbox" data-menu="'.$v_module_menu.'" name="chk_rule_id" title="'.$v_value.'" value="'.$v_key.'" id="chk_rule_id"> '.$v_value.'</label></li>';
            if($v_checked!=''){
                $v_dsp_script .= "\nrule[".$v_index."] = new UserRule('{$v_module_menu}', '{$v_key}', '{$v_value_script}', 1);";
                $v_index++;
            }
        }
    }
    if($v_dsp_modules_one!=''){
        $v_dsp_modules_one = '<li'.($v_idx==0?' class="k-state-active"':'').'><label style="font-weight:bold">Rules for module: '.$v_module_text.' [Administrator\'s interface]</label><ul><li><label style="font-weight:bold"><input id="chk_all_rule" data-menu="'.$v_module_menu.'" type="checkbox" /> Select All</label></li>'.$v_dsp_modules_one.'</ul></li>';
        //$v_dsp_modules_one = '<li'.($v_idx==0?' class="k-state-active"':'').'><label style="font-weight:bold"><input id="chk_all_rule" data-menu="'.$v_module_menu.'" type="checkbox" /> Rules for module: '.$v_module_text.' [Admin\'s interface]</label><ul>'.$v_dsp_modules_one.'</ul></li>';
    }
    $v_dsp_modules .= $v_dsp_modules_one;
    $v_idx++;
}
if($v_dsp_modules!=''){
    $v_dsp_modules = '<ul id="ul_data_role">'.$v_dsp_modules.'</ul>';
    $v_dsp_modules .= "
        <script type=\"text/javascript\">
            \$(document).ready(function() {
                \$(\"#ul_data_role\").kendoPanelBar({
                    expandMode: \"single\"
                });
            });
        </script>
    ";
}

//Tab All Permission
$v_dsp_tb_user_rule = '';
$v_idx = 0;
if($v_row==1){
    $v_dsp_tb_rule_header = '<div style="padding: 10px">
        <table class="list_table" cellpadding="3" cellspacing="0" border="1" align="center">'.
        '<tr valign="middle" align="center">'.
        '<th width="10"> Ord.</th>'.
        '<th width="200">Rule Title</th>'.
        '<th width="80">Rule Key</th>'.
        '<th width="200">Rule Type</th>'.
        '</tr>{_TABLE_BODY_}'.
        '</table></div>';


    $arr_all_user_rule = $cls_tb_user->get_all_permission_width_note($db);
    $v_count = 1;
    foreach($arr_all_user_rule as $menu=>$arr){
        $v_menu = $menu;
        $v_row = $cls_tb_module->select_one(array('module_menu'=>$menu));
        if($v_row!=1) continue;
        $v_one_header = '<li'.($v_idx==0?' class="k-state-active"':'').'><span class="k-link k-state-selected">'.$cls_tb_module->get_module_text().' '.($cls_tb_module->get_module_root()=='admin'?'Administrator\'s':'Customer\'s').' Interface</span>';
        $v_dsp_tb_user_rule_body = '';
        $v_count = 1;
        foreach($arr as $key=>$a){
            $v_dsp_tb_user_rule_body .= '<tr valign="middle" align="left"><td align="right">'.($v_count++).'</td>';
            $v_dsp_tb_user_rule_body .= '<td>'.$a['desc'].'</td>';
            $v_dsp_tb_user_rule_body .= '<td>'.$key.'</td>';
            $v_dsp_tb_user_rule_body .= '<td>'.$a['note'].'</td></tr>';
        }
        $v_dsp_tb_user_rule_body = str_replace('{_TABLE_BODY_}', $v_dsp_tb_user_rule_body, $v_dsp_tb_rule_header);
        $v_dsp_tb_user_rule_body = $v_one_header . $v_dsp_tb_user_rule_body .'</li>';
        $v_dsp_tb_user_rule .= $v_dsp_tb_user_rule_body;
        $v_idx++;
    }
}

if($v_dsp_tb_user_rule!=''){
    $v_dsp_tb_user_rule = '<ul id="ul_data_user_rule">'.$v_dsp_tb_user_rule.'</ul>';
    $v_dsp_modules .= "
        <script type=\"text/javascript\">
            \$(document).ready(function() {
                \$(\"#ul_data_user_rule\").kendoPanelBar({
                    expandMode: \"single\"
                });
            });
        </script>
    ";
}
//Tab all location
?>