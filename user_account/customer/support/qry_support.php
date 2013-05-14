<?php if (!isset($v_sval)) die(); ?>
<?php
$tpl_support = new Template('dsp_support.tpl',$v_dir_templates);
$tpl_support->set('URL',URL);
$tpl_support->set('URL_TEMPLATE',URL.$v_dir_templates);
$v_error = "";
$v_email_support = $cls_settings->get_option_name_by_key('email','support_email','nguyen@anvydigital.com');
$v_email_orgin = $cls_settings->get_option_name_by_key('email','email_orgin');
if(isset($_POST['btn_submit_support']))
{
    $v_support_title = isset($_POST['support_title'])?$_POST['support_title']:'';
    $v_support_description = isset($_POST['support_content'])?$_POST['support_content']:'';
    $v_support_name = isset($_POST['support_name'])?$_POST['support_name']:'';
    if(trim($v_support_title)=='' && trim($v_support_description)=='')
        $v_error = "<h4 align='center' style='color:red;'>". " Please input title or description on support.... </h4> ";
    if($v_error=='')
    {
        require 'classes/cls_tb_support.php';
        $cls_support = new cls_tb_support($db);
        $v_support_id = $cls_support->select_next('support_id');
        $cls_support->set_support_id($v_support_id);
        $cls_support->set_company_id($_SESSION['company_id']);
        $cls_support->set_contact_id($_SESSION['contact_id']);
        $cls_support->set_location_id( $_SESSION['location_id']);
        $cls_support->set_username($_SESSION['customer_name']);
        $cls_support->set_date_created( date('d-M-Y H:i:s'));
        $cls_support->set_image_file('');
        $cls_support->set_support_title($v_support_title);
        $cls_support->set_support_description($v_support_description);
        $v_result  = $cls_support->insert();
        if($v_result!=''){
            $v_error = '<h4 align="center" style="color:#AD8100">Your Message has been sent. We will contact you as soon as we can. Thank you for your feedback!.... </h4> ';
            /*Send email */
            mail($v_email_support,'Worktraq Support','Please, login to Worktraq, you have one message form support of Worktraq');
        }
    }
}
$v_contact_info ='<p>Anvy Inc</p>
                   <p>No. 103, 3016-10 Avenue N.E.</p>
                   <p>Calgary Alberta, Canada T2A6A3</p>
                   <p>Tel: <strong>403.291.2244</strong></p>
                   <p>Fax: 403.291.2246</p>
                   <p>Email: <a href="mailto:'.$v_email_support.'">'.$v_email_support.'</a></p>';

if($v_error=='')
{
    $tpl_support->set('ERROR_STYLE','display:none');
}
else{
    $tpl_support->set('ERROR_STYLE','text-align:center;color:red');
}
$tpl_support->set('ERROR_RESULT',$v_error);
$tpl_support->set('CONTACT_INFO',$v_contact_info);
$tpl_support->set('USER_NAME',$_SESSION['customer_name']);
$tpl_support->set('ACTION',URL.'support');
echo $tpl_support->output();
?>
