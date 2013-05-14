<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_company_id = 0;
$v_company_name = '';
$v_company_code = '';
$v_relationship = '';
$v_bussines_type = '';
$v_industry = '';
$v_website = 'http://';
$v_status = '';
$v_logo_file = '';
$v_mongo_id = isset($_GET['id'])?$_GET['id']:0;
$v_csr = '';
$v_sales_rep = '';
add_class('cls_tb_contact');
add_class('cls_tb_location');
$cls_tb_contact = new cls_tb_contact($db);
add_class('cls_tb_template');
$cls_tb_template = new cls_tb_template($db);
$v_option_template='';
if($v_mongo_id!=0)
{
    $cls_tb_company->select_one(array('company_id' => (int)$v_mongo_id));
    $v_company_id = $cls_tb_company->get_company_id();
    $v_company_name = $cls_tb_company->get_company_name();
    $v_company_code = $cls_tb_company->get_company_code();
    $v_relationship = $cls_tb_company->get_relationship();
    $v_bussines_type = $cls_tb_company->get_bussines_type();
    $v_industry = $cls_tb_company->get_industry();
    $v_website = $cls_tb_company->get_website();
    $v_status = $cls_tb_company->get_status();
    $v_email_sales_rep = $cls_tb_company->get_sales_rep();
    $v_logo_file = $cls_tb_company->get_logo_file();
    $v_csr = $cls_tb_company->get_csr();
    $v_sales_rep = $cls_tb_company->get_sales_rep();
    $v_company_template = $cls_tb_company->get_company_template();
    $arr_template = $cls_tb_template->select();
    foreach($arr_template as $arr){
        $v_check ='';
        if($v_company_template==$arr['template_name'])
            $v_check="checked='checked'";
        $v_option_template.="<option $v_check value=".$arr['template_id'].">";
            $v_option_template .=$arr['template_id'];
        $v_option_template.="</option>";
    }
}
?>