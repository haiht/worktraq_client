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
$v_old_email_key  = '';
$v_upload_dir = 'mail';
$v_dsp_email  = '';

if(isset($_POST['btn_submit_tb_email_templates'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_email_templates->set_mongo_id($v_mongo_id);
	$v_email_id = isset($_POST['txt_email_id'])?$_POST['txt_email_id']:$v_email_id;

	$v_email_id = (int) $v_email_id;
	$cls_tb_email_templates->set_email_id($v_email_id);

    $v_old_email_key = isset($_POST['txt_old_email_key'])?$_POST['txt_old_email_key']:$v_old_email_key;
    $v_email_key = isset($_POST['txt_email_key'])?$_POST['txt_email_key']:$v_email_key;
	$v_email_key = trim($v_email_key);
    $v_email_key = strtolower($v_email_key);
    $v_email_key = str_replace(" ","_",$v_email_key);

	if($v_email_key=='') $v_error_message .= 'Email Key is empty!<br />';
	$cls_tb_email_templates->set_email_key($v_email_key);

    /*Code upload file templates */

    add_class('clsupload');
    $v_has_upload = false;
    $v_image_file  ='';
    $cls_upload = new clsupload();
    $v_upload_dir = "mail";
    $cls_upload->set_allow_overwrite(1);
    $cls_upload->set_destination_dir($v_upload_dir);
    $cls_upload->set_field_name('txt_email_file');
    $cls_upload->set_new_filename($v_email_key);
    $cls_upload->upload_process();
    if($cls_upload->get_error_number()==0){
        $v_image_file = $cls_upload->get_filename();
        $v_has_upload = true;
    }

    if($v_email_id==0){
        $cls_tb_email_templates->set_email_file($v_email_file);
    }

	$v_email_data = isset($_POST['txt_email_data'])?$_POST['txt_email_data']:$v_email_data;
	$v_email_data = trim($v_email_data);
	$cls_tb_email_templates->set_email_data($v_email_data);

	$v_email_type = isset($_POST['txt_email_type'])?$_POST['txt_email_type']:$v_email_type;
	$v_email_type = (int) $v_email_type;
	$cls_tb_email_templates->set_email_type($v_email_type);

	$v_description = isset($_POST['txt_description'])?$_POST['txt_description']:$v_description;
	$v_description = trim($v_description);
	$cls_tb_email_templates->set_description($v_description);

    $v_dsp_email = isset($_POST['txt_file_tempates'])?$_POST['txt_file_tempates']:$v_dsp_email;
    $v_file_name_templates = isset($_POST['txt_file_name_templates'])?$_POST['txt_file_name_templates']:$v_email_file;

    if($v_error_message==''){
		if($v_email_id==0){
            $v_email_id = $cls_tb_email_templates->select_next('email_id');
            $cls_tb_email_templates->set_email_id((int) $v_email_id);
			$v_mongo_id = $cls_tb_email_templates->insert();
			$v_result = is_object($v_mongo_id);
            if($v_result) $v_result = true;
		}else{
            $arr_fields = array('email_key','email_type','email_data','description');
            $arr_values = array($v_email_key,(int)$v_email_type,$v_email_data, $v_description);
            $arr_where = array('email_id'=>(int)$v_email_id );
            $v_result = $cls_tb_email_templates->update_fields($arr_fields,$arr_values,$arr_where);
		}

        if($v_has_upload==true){ //allow to upload file
            $cls_tb_email_templates->update_field('email_file',$v_image_file,array('email_id'=>(int)$v_email_id ));
        }
        /*Update file contents */
        $v_file = 'mail'.DIRECTORY_SEPARATOR.$v_file_name_templates;
        $fp = fopen($v_file,'w');
        fwrite($fp, $v_dsp_email, strlen($v_dsp_email));
        fflush($fp);
        fclose($fp);
		if($v_result) redir(URL.$v_admin_key);
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
                if(file_exists('mail/'.$v_email_file)){
                    $v_dsp_email = file_get_contents('mail/'.$v_email_file);
                }
            }
		}
	}
}
?>