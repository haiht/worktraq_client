<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_email_id = 0;
$v_email_key = '';
$v_email_file = '';
$v_email_data = '';
$v_email_type = 0;
$v_description = '';
$v_dsp_email = '';
$v_new_email_templates = true;
if(isset($_POST['btn_submit_tb_email_templates'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_email_templates->set_mongo_id($v_mongo_id);
	$v_email_id = isset($_POST['txt_email_id'])?$_POST['txt_email_id']:$v_email_id;
	if(is_null($v_mongo_id)){
		$v_email_id = $cls_tb_email_templates->select_next('email_id');
	}
	$v_email_id = (int) $v_email_id;
	$cls_tb_email_templates->set_email_id($v_email_id);
	$v_email_key = isset($_POST['txt_email_key'])?$_POST['txt_email_key']:$v_email_key;
	$v_email_key = trim($v_email_key);
	if($v_email_key=='') $v_error_message .= '[Email Key] is empty!<br />';
	$cls_tb_email_templates->set_email_key($v_email_key);
	$v_email_file = $v_email_key.'.tpl';
	$cls_tb_email_templates->set_email_file($v_email_file);
	$v_email_data = isset($_POST['txt_email_data'])?$_POST['txt_email_data']:$v_email_data;
	$v_email_data = trim($v_email_data);
	if($v_email_data=='') $v_error_message .= '[Email Data] is empty!<br />';
	$cls_tb_email_templates->set_email_data($v_email_data);
	$v_email_type = isset($_POST['txt_email_type'])?$_POST['txt_email_type']:$v_email_type;
	$v_email_type = (int) $v_email_type;
	if($v_email_type<0) $v_error_message .= '[Email Type] is negative!<br />';
	$cls_tb_email_templates->set_email_type($v_email_type);
	$v_description = isset($_POST['txt_description'])?$_POST['txt_description']:$v_description;
	$v_description = trim($v_description);
	$cls_tb_email_templates->set_description($v_description);
    $v_mail_template = isset($_POST['txt_content_email'])?$_POST['txt_content_email']:'';
    $v_file = ROOT_DIR.DS.'mail'.DS.$v_email_file;
    $fp = fopen($v_file, 'w');
    $v_mail_template = str_replace("</p>", "</p>\r\n", $v_mail_template);
    $v_mail_template = str_replace("</div>", "</div>\r\n", $v_mail_template);
    $v_mail_template = str_replace("<br>", "<br />\r\n", $v_mail_template);
    $v_mail_template = str_replace("<br />", "<br />\r\n", $v_mail_template);
    //$v_mail_template = html_entity_decode($v_mail_template);
    fwrite($fp, $v_mail_template, strlen($v_mail_template));
    fflush($fp);
    fclose($fp);
	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_email_templates->insert();
			$v_result = is_object($v_mongo_id);
		}else{
			$v_result = $cls_tb_email_templates->update(array('_id' => $v_mongo_id));
			$v_new_email_templates = false;
		}
		if($v_result){
			$_SESSION['ss_tb_email_templates_redirect'] = 1;
			redir(URL.$v_admin_key);
		}else{
			if($v_new_email_templates) $v_email_templates_id = 0;
		}
	}
}else{
	$v_email_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_email_id,'int');
	if($v_email_id>0){
		$v_row = $cls_tb_email_templates->select_one(array('email_id' => $v_email_id));
		if($v_row == 1){
			$v_mongo_id = $cls_tb_email_templates->get_mongo_id();
			$v_email_id = $cls_tb_email_templates->get_email_id();
			$v_email_key = $cls_tb_email_templates->get_email_key();
			$v_email_file = $cls_tb_email_templates->get_email_file();
			$v_email_data = $cls_tb_email_templates->get_email_data();
			$v_email_type = $cls_tb_email_templates->get_email_type();
			$v_description = $cls_tb_email_templates->get_description();
            if($v_email_file!=''){
                $v_email_file = ROOT_DIR.DS.'mail/'.$v_email_file;
                if(file_exists($v_email_file)){
                    $fp = fopen($v_email_file,'r');
                    $v_dsp_email = fread($fp, filesize($v_email_file));
                    fclose($fp);
                }
            }
		}
	}
}
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
?>