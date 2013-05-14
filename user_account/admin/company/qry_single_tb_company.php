<?php if(!isset($v_sval)) die();?>
<?php
add_class('cls_tb_contact');
add_class('cls_tb_template');
$cls_tb_contact = new cls_tb_contact($db);
$cls_settings = new cls_settings($db);
$cls_tb_template = new cls_tb_template($db);
$v_error_message = '';
$v_mongo_id = NULL;
$v_company_id = 0;
$v_company_name = '';
$v_company_code = '';
$v_relationship = '';
$v_bussines_type = '';
$v_industry = '';
$v_email_sales_rep = '';
$v_website = 'http://';
$v_status = '';
$v_logo_file = '';
$v_csr = '';
$v_sales_rep = '';
$v_head_office_email = '';
$v_company_template_id= 0;
add_class('cls_tb_template');
$cls_tb_template = new cls_tb_template($db);

if(isset($_POST['btn_submit_tb_company'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
    $v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:$v_company_id;
	if(!is_null($v_mongo_id)){
        $v_mongo_id = new MongoID($v_mongo_id);
        $cls_tb_company->set_mongo_id($v_mongo_id);
    }else{
        $v_company_id = $cls_tb_company->select_next('company_id');
    }
    $v_company_template = isset($_POST['template_name'])?$_POST['template_name']:"default";
	$v_company_id = (int) $v_company_id;
    if($v_company_id<=0) $v_error_message .= '+ Company ID is negative!<br />';
	$cls_tb_company->set_company_id($v_company_id);
	$cls_tb_company->set_company_template($v_company_template);
	$v_company_name = isset($_POST['txt_company_name'])?$_POST['txt_company_name']:$v_company_name;
	$v_company_name = trim($v_company_name);
    if($v_company_name=='') $v_error_message.='+ Company Nam is empty<br />';
	$cls_tb_company->set_company_name($v_company_name);
	$v_company_code = isset($_POST['txt_company_code'])?$_POST['txt_company_code']:$v_company_code;
    if($v_company_code==''){
        $arr_company_name = explode(' ',$v_company_name);
        for($i=0; $i<count($arr_company_name);$i++){
            $v_tmp = trim($arr_company_name[$i]);
            if($v_tmp!='') $v_company_code.=substr($v_tmp,0,1);
        }
    }
    $v_company_code = remove_invailid_char($v_company_code);
    $v_row = $cls_tb_company->select_one(array('company_code'=>$v_company_code));
    if($v_row==1) $v_company_code.='_'.$v_company_id;
	$v_company_code = trim($v_company_code);

	$cls_tb_company->set_company_code($v_company_code);
	$v_relationship = isset($_POST['txt_relationship'])?$_POST['txt_relationship']:$v_relationship;
	$v_relationship = trim($v_relationship);

	$cls_tb_company->set_relationship($v_relationship);
	$v_bussines_type = isset($_POST['txt_bussines_type'])?$_POST['txt_bussines_type']:$v_bussines_type;
	$v_bussines_type = trim($v_bussines_type);

	$cls_tb_company->set_bussines_type($v_bussines_type);
	$v_industry = isset($_POST['txt_industry'])?$_POST['txt_industry']:$v_industry;
	$v_industry = trim($v_industry);

	$cls_tb_company->set_industry($v_industry);
	$v_website = isset($_POST['txt_website'])?$_POST['txt_website']:$v_website;
	$v_website = trim($v_website);

	$cls_tb_company->set_website($v_website);
	$v_status = isset($_POST['txt_status'])?$_POST['txt_status']:$v_status;
	$v_status = trim($v_status);
	if($v_status=='') $v_error_message .= '[status] is empty!<br />';

	$cls_tb_company->set_status($v_status);
	$v_logo_file = isset($_POST['txt_logo_file'])?$_POST['txt_logo_file']:$v_logo_file;
	$v_logo_file = trim($v_logo_file);
	$cls_tb_company->set_logo_file($v_logo_file);

	if($v_error_message==''){
        if(is_null($v_mongo_id))
        {
            $v_mongo_id = $cls_tb_company->insert();
            $v_result = is_object($v_mongo_id);
            if($v_result){
                $v_dir = ROOT_DIR.DS.'resources'.DS.$v_company_code;
                $v_allow = true;
                if(!file_exists($v_dir)) $v_allow = @mkdir($v_dir);
                if($v_allow){
                    $v_product_dir = $v_dir.DS.'products';
                    if(!file_exists($v_product_dir)) @mkdir($v_product_dir);
                    $v_signage_layout_dir = $v_dir.DS.'signage_layout';
                    if(!file_exists($v_signage_layout_dir)) @mkdir($v_signage_layout_dir);
                    $v_slide_dir = $v_dir.DS.'slider';
                    if(!file_exists($v_slide_dir)) @mkdir($v_slide_dir);
                }
            }
        }
		else
        {
            $v_result = $cls_tb_company->update(array('_id' => $v_mongo_id));
        }
        if($v_result) redir(URL.$v_admin_key);
	}
}else{
	$v_company_id = isset($_GET['id'])?$_GET['id']:0;
	if($v_company_id!=0)
    {
		$cls_tb_company->select_one(array('company_id' => (int)$v_company_id));
		$v_company_id = $cls_tb_company->get_company_id();
		$v_company_name = $cls_tb_company->get_company_name();
		$v_company_code = $cls_tb_company->get_company_code();
		$v_relationship = $cls_tb_company->get_relationship();
		$v_bussines_type = $cls_tb_company->get_bussines_type();
		$v_industry = $cls_tb_company->get_industry();
		$v_website = $cls_tb_company->get_website();
		$v_status = $cls_tb_company->get_status();
        $v_logo_file = $cls_tb_company->get_logo_file();
        $v_sales_rep = $cls_tb_company->get_sales_rep();
        $v_csr =$cls_tb_company->get_csr();
        $v_sales_rep_email = $cls_tb_company->get_sales_rep_email();
        $v_head_office_email = $cls_tb_company->get_email_head_office();
        $v_company_template_id = $cls_tb_company->get_company_template_id();
        $arr_company_log  = $cls_tb_company->get_company_template_log();
    }
}
?>