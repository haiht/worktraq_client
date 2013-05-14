<?php if(!isset($v_sval)) die();?>
<?php
add_class('cls_tb_contact');
$cls_tb_contact = new cls_tb_contact($db);
$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:"";
$v_company_name = isset($_POST['txt_company_name'])?$_POST['txt_company_name']:"";
$v_company_code = isset($_POST['txt_company_code'])?$_POST['txt_company_code']:"";
$v_relationship = isset($_POST['txt_relationship'])?$_POST['txt_relationship']:"";
$v_template_id = isset($_POST['txt_template_company_id'])?$_POST['txt_template_company_id']:0;
$v_old_template_id = isset($_POST['txt_old_template_company_id'])?$_POST['txt_old_template_company_id']:0;
$v_bussines_type = isset($_POST['txt_bussines_type'])?$_POST['txt_bussines_type']:"";
$v_industry = isset($_POST['txt_industry'])?$_POST['txt_industry']:"";
$v_website = isset($_POST['txt_website'])?$_POST['txt_website']:"";
$v_status = isset($_POST['txt_status'])?$_POST['txt_status']:"";
$v_sales_rep =  isset($_POST['txt_sales_rep'])?$_POST['txt_sales_rep']:"";
$v_email_head_office = isset($_POST['txt_email_head_office'])?$_POST['txt_email_head_office']:"";
$v_csr =  isset($_POST['txt_csr'])?$_POST['txt_csr']:"";
$v_logo_file = isset($_REQUEST['txt_logo_file'])?$_REQUEST['txt_logo_file']:"";
$v_logo_file_size = isset($_FILES['txt_logo_file']) ? $_FILES['txt_logo_file']["size"] : 0;

$v_company_template = isset($_POST['template_name'])?$_POST['template_name']:"default";

/*Fillter */
$_SESSION['error_session'] = "";
if(trim($v_company_name)=="")  $_SESSION['error_company'] .=" The Company Name is not blank!...";
if(trim($v_company_code)=="")  $_SESSION['error_company'] .=" The Company Code is not blank!...";

if($v_company_id==0){
$v_num_code_company = $cls_tb_company->count(array('company_code'=>$v_company_code));
if($v_num_code_company>0) $_SESSION['error_session'] .=" The Company Code has in database, please choice other!...<br />";
}



$v_email_sales_rep = $cls_tb_contact->select_scalar('email',array('contact_id'=>(int)$v_sales_rep));
if(!filter_var($v_email_sales_rep,FILTER_VALIDATE_EMAIL))
    $_SESSION['error_session'] .= " Email is not vaild! <br /> ";

$v_num_sales_rep = $cls_tb_company->count(array('sales_rep'=>$v_email_sales_rep));
if($v_num_sales_rep > 0) $_SESSION['error_company'] .= " Email is duplicate!...<br> ";

if( $_SESSION['error_session']!='') redir(URL.'admin/error');

if(!is_null($v_mongo_id) && $v_company_id==0)
{
    $cls_tb_company->set_mongo_id($v_mongo_id);
    $v_company_id = $cls_tb_company->select_next('company_id');
    $cls_tb_company->set_company_id((int) $v_company_id);
    $cls_tb_company->set_company_name($v_company_name);
    $cls_tb_company->set_company_code($v_company_code);
    $cls_tb_company->set_relationship($v_relationship);
    $cls_tb_company->set_bussines_type($v_bussines_type);
    $cls_tb_company->set_industry($v_industry);
    $cls_tb_company->set_website($v_website);
    $cls_tb_company->set_sales_rep_email($v_email_sales_rep);
    $cls_tb_company->set_sales_rep($v_sales_rep);
    $cls_tb_company->set_email_head_office($v_email_head_office);
    $cls_tb_company->set_csr($v_csr);
    $cls_tb_company->set_company_template($v_template_id);
    $cls_tb_company->set_status($v_status);
    $cls_tb_company->insert();
}
else
{
    $cls_tb_company->set_company_id( $v_company_id,true);
    $cls_tb_company->set_company_name($v_company_name);
    $cls_tb_company->set_company_code($v_company_code);
    $cls_tb_company->set_relationship($v_relationship);
    $cls_tb_company->set_bussines_type($v_bussines_type);
    $cls_tb_company->set_industry($v_industry);
    $cls_tb_company->set_website($v_website);
    $cls_tb_company->set_sales_rep_email($v_email_sales_rep);
    $cls_tb_company->set_sales_rep($v_sales_rep);
    $cls_tb_company->set_email_head_office($v_email_head_office);
    $cls_tb_company->set_company_template($v_template_id);
    $cls_tb_company->set_csr($v_csr);
    $cls_tb_company->set_status($v_status);
    settype($v_company_id,'int');
    $cls_tb_company->update(array('company_id' => $v_company_id));
}
$v_dir = ROOT_DIR.DS.'resources'.DS.$v_company_code;
$v_allow = true;
if(!file_exists($v_dir)) $v_allow = mkdir($v_dir);
    if($v_allow){
        $v_product_dir = $v_dir.DS.'products';
        if(!file_exists($v_product_dir)) @mkdir($v_product_dir);
        $v_signage_layout_dir = $v_dir.DS.'signage_layout';
        if(!file_exists($v_signage_layout_dir)) @mkdir($v_signage_layout_dir);
        $v_slide_dir = $v_dir.DS.'slider';
        if(!file_exists($v_slide_dir)) @mkdir($v_slide_dir);
    }
/*Uploading file */
if($v_logo_file_size)
{
    $arr_original_file_name = explode(".",$_FILES["txt_logo_file"]["name"]) ;
    $v_file_ext = strtolower($arr_original_file_name[sizeof($arr_original_file_name)-1]);
    if(in_array($v_file_ext,$arr_allow_file_type)){
        $v_file_name = str_replace(".".$v_file_ext,"",$v_company_code);
        $v_file_name = remove_invailid_char($v_file_name);
        $v_file_name = strtolower($v_file_name);
        $v_file_name = 'logo.'.$v_file_ext;
        $v_dir = "resources/".$v_company_code;
        chmod($v_dir,755);
        /* Delete Old Logo */
        $v_old_logo = $cls_tb_company->select_scalar('logo_file',array('company_id'=>(int)$v_company_id));
        @unlink($v_dir.'/'.$v_old_logo);
        move_uploaded_file($_FILES['txt_logo_file']['tmp_name'],$v_dir."/".$v_file_name);
        $cls_tb_company->set_company_id($v_company_id);
        $cls_tb_company->set_logo_file($v_file_name);
        $cls_tb_company->update_field('logo_file',$v_file_name,(array('company_id' => (int)$v_company_id)));
    }
}
/*templates */

    $v_dir_templates  ="lib/templates/";
    add_class('cls_tb_template');
    $cls_tb_template = new cls_tb_template($db);
    $cls_tb_template->select_one(array('template_id'=>(int) $v_template_id));
    $arr_element = $cls_tb_template->get_element();
    $v_template_file = $cls_tb_template->get_template_file();

    if(file_exists($v_dir_templates.$v_template_file)){
        include_once "classes/xtemplate.class.php";
        $cls_template = new Template($v_template_file,$v_dir_templates);
        $arr = array();
        foreach($arr_element as $v_key => $v_value){
            $v_customer = isset($_POST['txt_element_'.$v_key]) ? $_POST['txt_element_'.$v_key] : '';
            $arr[$v_key] = $v_customer;
            $v_key = strtoupper($v_key);
            $cls_template->set($v_key,$v_customer);
        }
        $cls_tb_company->update_field('template_log',array(array("element"=>$arr,"template_id"=>(int) $v_template_id)),array('company_id'=>(int) $v_company_id));
        /* Create css file */
        $v_content = $cls_template->output();
        if($v_content!=''){
            $v_file = $v_dir.DIRECTORY_SEPARATOR.'customize.css';
            $fp = fopen($v_file,'w');
            fwrite($fp, $v_content, strlen($v_content));
            fflush($fp);
            fclose($fp);
        }

    }
redir($_SERVER['HTTP_REFERER']);
?>
