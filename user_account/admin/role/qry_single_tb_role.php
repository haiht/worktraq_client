<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_role_id = 0;
$v_role_title = '';
$v_role_type = 0;
$v_role_key = '';
$arr_role_content = array();
$arr_role_child = array();
$v_status = 0;
$v_user_type = 0;
$v_default_role = 0;
$v_color = '';
$v_bold = 0;
$v_italic = 0;
$v_location_id = 0;
$v_company_id = 0;
$v_new_role = true;
if(isset($_POST['btn_submit_tb_role'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_role->set_mongo_id($v_mongo_id);
	$v_role_id = isset($_POST['txt_role_id'])?$_POST['txt_role_id']:$v_role_id;
	if(is_null($v_mongo_id)){
		$v_role_id = $cls_tb_role->select_next('role_id');
	}
	$v_role_id = (int) $v_role_id;
	$cls_tb_role->set_role_id($v_role_id);
	$v_role_title = isset($_POST['txt_role_title'])?$_POST['txt_role_title']:$v_role_title;
	$v_role_title = trim($v_role_title);
	if($v_role_title=='') $v_error_message .= '[Role Title] is empty!<br />';
	$cls_tb_role->set_role_title($v_role_title);
	$v_role_type = isset($_POST['txt_role_type'])?$_POST['txt_role_type']:$v_role_type;
	$v_role_type = (int) $v_role_type;
	if($v_role_type<0) $v_error_message .= '[Role Type] is negative!<br />';
	$cls_tb_role->set_role_type($v_role_type);
	$v_role_key = isset($_POST['txt_role_key'])?$_POST['txt_role_key']:$v_role_key;
	$v_role_key = trim($v_role_key);
	if($v_role_key=='')
        $v_error_message .= '[Role Key] is empty!<br />';
    else{
        if($cls_tb_role->count(array('company_id'=>$v_company_id, 'role_key'=>$v_role_key, 'role_id'=>array('$ne'=>$v_role_id)))>0) $v_error_message.= '+ [Role Key] is unique.<br />';
    }
	$cls_tb_role->set_role_key($v_role_key);

    $v_role_content = isset($_POST['txt_role_content'])?$_POST['txt_role_content']:'';
    $v_role_content = stripcslashes($v_role_content);
    if($v_role_content!=''){
        $arr_role = json_decode($v_role_content, true);
        for($i=0; $i<count($arr_role); $i++){
            $v_menu = $arr_role[$i][0];
            $v_key = $arr_role[$i][1];
            $v_desc = $arr_role[$i][2];
            if(!isset($arr_role_content[$v_menu][$v_key])) $arr_role_content[$v_menu][$v_key] = $v_desc;
        }
        if(!is_array($arr_role_content)) $arr_role_content = array();
    }
    $cls_tb_role->set_role_content($arr_role_content);

	$arr_role_child = isset($_POST['txt_role_child'])?$_POST['txt_role_child']:$arr_role_child;
    if(!is_array($arr_role_child)) $arr_role_child = array();
	$cls_tb_role->set_role_child($arr_role_child);
	$v_status = isset($_POST['txt_status'])?0:1;
	$v_status = (int) $v_status;
	$cls_tb_role->set_status($v_status);
	$v_user_type = isset($_POST['txt_user_type'])?$_POST['txt_user_type']:$v_user_type;
	$v_user_type = (int) $v_user_type;
	if($v_user_type<0) $v_error_message .= '[User Type] is negative!<br />';
	$cls_tb_role->set_user_type($v_user_type);
	$v_default_role = isset($_POST['txt_default_role'])?1:0;
	$v_default_role = (int) $v_default_role;
	$cls_tb_role->set_default_role($v_default_role);
	$v_color = isset($_POST['txt_color'])?$_POST['txt_color']:$v_color;
	$v_color = trim($v_color);
	$cls_tb_role->set_color($v_color);
	$v_bold = isset($_POST['txt_bold'])?1:0;
	$v_bold = (int) $v_bold;
	$cls_tb_role->set_bold($v_bold);
	$v_italic = isset($_POST['txt_italic'])?1:0;
	$v_italic = (int) $v_italic;
	$cls_tb_role->set_italic($v_italic);
	$v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:$v_location_id;
	$v_location_id = (int) $v_location_id;
	if($v_location_id<0) $v_error_message .= '[Location Id] is negative!<br />';
	$cls_tb_role->set_location_id($v_location_id);
	$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
	$v_company_id = (int) $v_company_id;
	if($v_company_id<0) $v_error_message .= '[Company Id] is negative!<br />';
	$cls_tb_role->set_company_id($v_company_id);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_role->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_role->update(array('_id' => $v_mongo_id));
			$v_new_role = false;
		}
		if($v_result){
            $_SESSION['ss_tb_role_redirect'] = 1;
			redir(URL.$v_admin_key);
		}else{
			if($v_new_role) $v_role_id = 0;
		}
	}
}else{
	$v_role_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_role_id,'int');
	if($v_role_id>0){
		$v_row = $cls_tb_role->select_one(array('role_id' => $v_role_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_role->get_mongo_id();
			$v_role_id = $cls_tb_role->get_role_id();
			$v_role_title = $cls_tb_role->get_role_title();
			$v_role_type = $cls_tb_role->get_role_type();
			$v_role_key = $cls_tb_role->get_role_key();
			$arr_role_content = $cls_tb_role->get_role_content();
			$arr_role_child = $cls_tb_role->get_role_child();
			$v_status = $cls_tb_role->get_status();
			$v_user_type = $cls_tb_role->get_user_type();
			$v_default_role = $cls_tb_role->get_default_role();
			$v_color = $cls_tb_role->get_color();
			$v_bold = $cls_tb_role->get_bold();
			$v_italic = $cls_tb_role->get_italic();
			$v_location_id = $cls_tb_role->get_location_id();
			$v_company_id = $cls_tb_role->get_company_id();
		}
	}
}
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);

$v_tmp_location_id = $v_location_id;
$arr_all_location = get_array_data($cls_tb_location, 'location_id', 'location_name', $v_tmp_location_id, array(0,'--------'), array('company_id'=>$v_company_id));
$v_location_id=$v_tmp_location_id;

add_class('cls_tb_module');
$cls_tb_module = new cls_tb_module($db, LOG_DIR);

$v_dsp_modules = '';
$v_dsp_script = "\nvar per = new Array();";
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
        //$v_value = htmlspecialchars($arr_module_rule[$i]['description']);
        $v_value = addslashes($arr_module_rule[$i]['description']);
        $v_tmp_status = $arr_module_rule[$i]['status'];
        if($v_tmp_status==0 && $v_module_menu!=''){
            $v_dsp_modules_one .= '<li><label><input id="txt_permission" title="'.$v_value.'" type="checkbox" data-menu="'.$v_module_menu.'" value="'.$v_key.'"'.(isset($arr_role_content[$v_module_menu][$v_key])?' checked="checked"':'').' /> '.$v_value.'</label></li>';
            if(isset($arr_role_content[$v_module_menu][$v_key])){
                $v_dsp_script .= "\nper[".$v_index."] = new Permission('{$v_module_menu}', '{$v_key}', '{$v_value}');";
                $v_index++;
            }
        }
    }
    if($v_dsp_modules_one!=''){
        $v_dsp_modules_one = '<li'.($v_idx==0?' class="k-state-active"':'').'>'.$v_module_text.' [Customer\'s interface]<ul>'.$v_dsp_modules_one.'</ul></li>';
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
        //$v_value = htmlspecialchars($arr_module_rule[$i]['description']);
        $v_value = addslashes($arr_module_rule[$i]['description']);

        $v_tmp_status = $arr_module_rule[$i]['status'];
        if($v_tmp_status==0 && $v_module_menu!=''){
            $v_dsp_modules_one .= '<li><label><input id="txt_permission" title="'.$v_value.'" type="checkbox" data-menu="'.$v_module_menu.'" value="'.$v_key.'"'.(isset($arr_role_content[$v_module_menu][$v_key])?' checked="checked"':'').' /> '.$v_value.'</label></li>';
            if(isset($arr_role_content[$v_module_menu][$v_key])){
                $v_dsp_script .= "\nper[".$v_index."] = new Permission('{$v_module_menu}', '{$v_key}', '{$v_value}');";
                $v_index++;
            }
        }
    }
    if($v_dsp_modules_one!=''){
        $v_dsp_modules_one = '<li'.($v_idx==0?' class="k-state-active"':'').'>'.$v_module_text.' [Admin\'s interface]<ul>'.$v_dsp_modules_one.'</ul></li>';
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
?>