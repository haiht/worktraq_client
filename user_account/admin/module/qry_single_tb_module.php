<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_module_id = 0;
$v_module_pid = 0;
$v_module_text = '';
$v_module_key = '';
$v_module_type = 0;
$v_module_root = 'admin';
$v_module_dir = '';
$v_module_menu = '';
$v_module_order = 0;
$v_module_role = 0;
$v_module_index = 'index.php';
$v_module_locked = 0;
$v_module_category = 0;
$arr_modules_rules = array();
$v_module_time = date('Y-m-d H:i:s', time());

$arr_setting_rules = $cls_settings->select_scalar('option', array('setting_name'=>'rule_action'));

if(isset($_POST['btn_submit_tb_module'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(!is_null($v_mongo_id) && $v_mongo_id!='') 
		$v_mongo_id = new MongoId($v_mongo_id);
	else
		$v_mongo_id = NULL;
	$cls_tb_module->set_mongo_id($v_mongo_id);
	$v_module_id = isset($_POST['txt_module_id'])?$_POST['txt_module_id']:$v_module_id;
	$v_module_id = (int) $v_module_id;
	if($v_module_id<=0){
		$v_module_id = $cls_tb_module->select_next('module_id');
		$cls_tb_module->set_module_id($v_module_id);
	}
		//die('MODULE_ID: '.$v_module_id);


	//if($v_module_id<0) $v_error_message .= '[module_id] is negative!<br />';
	//$cls_tb_module->set_module_id($v_module_id);
	$v_module_pid = isset($_POST['txt_module_pid'])?$_POST['txt_module_pid']:$v_module_pid;
	$v_module_pid = (int) $v_module_pid;
	if($v_module_pid<0) $v_module_pid = 0;
	$cls_tb_module->set_module_pid($v_module_pid);
	$v_module_text = isset($_POST['txt_module_text'])?$_POST['txt_module_text']:$v_module_text;
	$v_module_text = trim($v_module_text);
	if($v_module_text=='') $v_error_message .= '[module_text] is empty!<br />';
	$cls_tb_module->set_module_text($v_module_text);
	$v_module_key = strtolower($v_module_text);
	do{
		$v_found = strpos($v_module_key,'  ')!==false;
		if($v_found) $v_module_key = str_replace('  ',' ', $v_module_key);
	}while($v_found);
	$v_module_key = str_replace(' ','-', $v_module_key);
	
	if($v_module_pid>0){
		$v_module_parent_key = $cls_tb_module->select_scalar('module_key', array('module_id'=>$v_module_pid));
	//die('PID: '.$v_module_parent_key);	
		if($v_module_parent_key.''!='') $v_module_key = $v_module_parent_key.'/'.$v_module_key;
	}
	
	$cls_tb_module->set_module_key($v_module_key);
	$v_module_type = isset($_POST['txt_module_type'])?$_POST['txt_module_type']:$v_module_type;
	$v_module_type = (int) $v_module_type;
	if($v_module_type<0) $v_module_type = 0;
	$cls_tb_module->set_module_type($v_module_type);
	$v_module_root = isset($_POST['txt_module_root'])?$_POST['txt_module_root']:$v_module_root;
	$v_module_root = trim($v_module_root);
	if($v_module_root=='') $v_error_message .= '[module_root] is empty!<br />';
	$cls_tb_module->set_module_root($v_module_root);
	$v_module_dir = isset($_POST['txt_module_dir'])?$_POST['txt_module_dir']:$v_module_dir;
	$v_module_dir = trim($v_module_dir);
	if($v_module_dir=='') $v_error_message .= '[module_dir] is empty!<br />';
	$cls_tb_module->set_module_dir($v_module_dir);
	$v_module_order = isset($_POST['txt_module_order'])?$_POST['txt_module_order']:$v_module_order;
	$v_module_order = (int) $v_module_order;
	if($v_module_order<0) $v_module_order = 0;
	$cls_tb_module->set_module_order($v_module_order);
	$v_module_index = isset($_POST['txt_module_index'])?$_POST['txt_module_index']:$v_module_index;
	$v_module_index = trim($v_module_index);
	if($v_module_index=='') $v_module_index = 'index.php';
	$cls_tb_module->set_module_index($v_module_index);
	$v_module_locked = isset($_POST['txt_module_locked'])?1:0;
	$v_module_role = isset($_POST['txt_module_role'])?1:0;
	//$v_module_locked = (int) $v_module_locked;
	//if($v_module_locked<0) $v_error_message .= '[module_locked] is negative!<br />';
	$cls_tb_module->set_module_locked($v_module_locked);
	$cls_tb_module->set_module_role($v_module_role);

    $v_module_menu = isset($_POST['txt_module_menu'])?$_POST['txt_module_menu']:$v_module_menu;
    $v_module_menu = trim($v_module_menu);
    $cls_tb_module->set_module_menu($v_module_menu);

	$v_module_category = isset($_POST['txt_module_category'])?$_POST['txt_module_category']:'0';
	settype($v_module_category, 'int');
	$cls_tb_module->set_module_category($v_module_category);

	$v_module_time = date('Y-m-d H:i:s');
	$cls_tb_module->set_module_time($v_module_time);

    $arr_modules_rules = array();
    $v_module_rules =  isset($_POST['txt_module_rules'])?$_POST['txt_module_rules']:'';

    if($v_module_rules!=''){
        if(get_magic_quotes_gpc()) $v_module_rules = stripcslashes($v_module_rules);
        $arr_modules_rules = json_decode($v_module_rules, true);
    }

    $cls_tb_module->set_module_rules($arr_modules_rules);


	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			
			$v_mongo_id = $cls_tb_module->insert();
			//die('IN: '.$v_mongo_id);
		}else{
			//die('UP'.$v_mongo_id);
			$v_result = $cls_tb_module->update(array('_id' => $v_mongo_id));
		}
		
		redir(URL.'admin/module/list/');
	}
}else{
	$v_module_id = isset($_GET['id'])?$_GET['id']:0;
	if($v_module_id>0){
		//die('SS');
		settype($v_module_id, 'int');
		$v_row = $cls_tb_module->select_one(array('module_id' => $v_module_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_module->get_mongo_id();
			$v_module_id = $cls_tb_module->get_module_id();
			$v_module_pid = $cls_tb_module->get_module_pid();
			$v_module_text = $cls_tb_module->get_module_text();
			$v_module_key = $cls_tb_module->get_module_key();
			$v_module_type = $cls_tb_module->get_module_type();
			$v_module_root = $cls_tb_module->get_module_root();
			$v_module_dir = $cls_tb_module->get_module_dir();
			$v_module_order = $cls_tb_module->get_module_order();
			$v_module_role = $cls_tb_module->get_module_role();
			$v_module_index = $cls_tb_module->get_module_index();
			$v_module_locked = $cls_tb_module->get_module_locked();
			$v_module_category = $cls_tb_module->get_module_category();
			$arr_modules_rules = $cls_tb_module->get_module_rules();
            $v_module_menu = $cls_tb_module->get_module_menu();
			$v_module_time = date('Y-m-d H:i:s',$cls_tb_module->get_module_time());
		}
	}
}
$v_dsp_parent_module = $cls_tb_module->draw_tree_module_option(0, '-', $v_module_pid);
$arr_module_type = array(0=>'Admin', 1=>'Head Office', 2=>'Branch', 3=>'Customer', 4=>'Orther ');
$v_dsp_module_type = '';
for($i=0; $i<count($arr_module_type);$i++){
	$v_dsp_module_type.='<option value="'.$i.'"'.($i==$v_module_type?' selected="selected"':'').'>'.$arr_module_type[$i].'</option>';
}

$v_module_rules = '';
$v_dsp_rule_variables = '';
$j = 0;
for($i=0; $i<count($arr_setting_rules); $i++){
    $v_rule_action_key = $arr_setting_rules[$i]['key'];
    $v_rule_action_name = $arr_setting_rules[$i]['name'];
    $v_rule_action_status = $arr_setting_rules[$i]['status'];
    if($v_rule_action_status==0){
        $arr_one_rule = get_rule($arr_modules_rules, $v_rule_action_key);
        if(is_array($arr_one_rule)){
            $v_module_rules .= '<div style="margin:2px; clear:both; height:30px;"><div style="float:left; width:200px;"><input type="checkbox" id="txt_rule_key" name="txt_rule_key" value="'.$v_rule_action_key.'" checked="checked" />'.$v_rule_action_name.'</div><div style="float:left"> Description: <input type="text" id="txt_rule_description" name="txt_rule_description" size="60" value="'.$arr_one_rule['description'].'" /></div></div>';
            $v_dsp_rule_variables.="\r\nrule[".($j++)."] = new Rule('{$v_rule_action_key}','".htmlentities($arr_one_rule['description'],ENT_QUOTES)."');";
        }else{
            $v_module_rules .= '<div style="margin:2px; clear:both; height:30px;"><div style="float:left; width:200px;"><input type="checkbox" id="txt_rule_key" name="txt_rule_key" value="'.$v_rule_action_key.'" />'.$v_rule_action_name.'</div><div style="float:left"> Description: <input type="text" id="txt_rule_description" name="txt_rule_description" size="60" value="" /></div></div>';
        }
    }
}

function get_rule($arr_rules, $p_key){
    $i=0;
    $found = false;
    while($i<count($arr_rules) && !$found){
        $found = $arr_rules[$i]['key']==$p_key;
        $i++;
    }
    return $found?$arr_rules[$i-1]:NULL;
}
?>