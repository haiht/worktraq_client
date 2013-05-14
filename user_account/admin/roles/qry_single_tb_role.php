<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_rule_id = 0;
$v_rule_key= '';
$v_rule_title = '';
$v_rule_type = '';
$v_rule_url = '';
$v_rule_admin = '';
$v_rule_menu ='';
$v_rule_comp = 0;
$v_rule_description = '';

if(isset($_POST['btn_submit_tb_rule'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_rule->set_mongo_id($v_mongo_id);

	$v_rule_id = isset($_POST['txt_rule_id'])?$_POST['txt_rule_id']:$v_rule_id;
	$v_rule_id = (int) $v_rule_id;
	if($v_rule_id<0) $v_error_message .= 'Rule id is negative!<br />';


	$v_rule_title = isset($_POST['txt_rule_title'])?$_POST['txt_rule_title']:$v_rule_title;
	$v_rule_title = trim($v_rule_title);
	if($v_rule_title=='') $v_error_message .= 'Rule Title is empty!<br />';
	$cls_tb_rule->set_rule_title($v_rule_title);

	$v_rule_type = isset($_POST['txt_rule_type'])?$_POST['txt_rule_type']:$v_rule_type;
	$v_rule_type = (int) $v_rule_type;
	if($v_rule_type<0) $v_error_message .= ' Rule Type is negative!<br />';
	$cls_tb_rule->set_rule_type($v_rule_type);

    $v_rule_key = isset($_POST['txt_rule_key'])?$_POST['txt_rule_key']:$v_rule_key;
    $v_rule_key = trim($v_rule_key);
	if($v_rule_key=='') $v_error_message .= 'Rule Key is empty!<br />';

    $v_rule_key = strtolower($v_rule_key);
    $v_rule_key = str_replace(" ","_",$v_rule_key);
	$cls_tb_rule->set_rule_key($v_rule_key);

    $v_rule_menu = isset($_POST['txt_rule_menu'])?$_POST['txt_rule_menu']:$v_rule_menu;
    $v_rule_menu = trim($v_rule_menu);
    $cls_tb_rule->set_rule_menu($v_rule_menu);

	$v_rule_admin = isset($_POST['txt_rule_admin'])?$_POST['txt_rule_admin']:$v_rule_admin;
	$v_rule_admin = (int) $v_rule_admin;
    $cls_tb_rule->set_rule_admin($v_rule_admin);

    $v_rule_comp = isset($_POST['txt_rule_comp'])?$_POST['txt_rule_comp']:$v_rule_comp;
    $cls_tb_rule->set_rule_comp($v_rule_comp);

    $v_rule_description = isset($_POST['txt_rule_description'])?$_POST['txt_rule_description']:$v_rule_description;
    $cls_tb_rule->set_rule_description($v_rule_description);

	if($v_error_message==''){
		if($v_rule_id==0){
            $v_rule_id = $cls_tb_rule->select_next('rule_id');
            $cls_tb_rule->set_rule_id($v_rule_id);
			$v_mongo_id = $cls_tb_rule->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_rule->update(array('rule_id' => (int) $v_rule_id));
		}
		if($v_result) redir(URL.$v_admin_key);
	}
}else{
    $v_rule_id = isset($_GET['id'])?$_GET['id']:0;
	if($v_rule_id!=0){
		$v_row = $cls_tb_rule->select_one(array('rule_id' => (int)$v_rule_id));
		if($v_row == 1){
			$v_rule_id = $cls_tb_rule->get_rule_id();
			$v_rule_title = $cls_tb_rule->get_rule_title();
			$v_rule_type = $cls_tb_rule->get_rule_type();
			$v_rule_key = $cls_tb_rule->get_rule_key();
			$v_rule_admin = $cls_tb_rule->get_rule_admin();
            $v_rule_comp = $cls_tb_rule->get_rule_comp();
            $v_rule_description = $cls_tb_rule->get_rule_description();
		}
	}
}
?>