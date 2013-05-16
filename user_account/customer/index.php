<?php if(!isset($v_sval)) die(); ?>
<?php
include_once "classes/xtemplate.class.php";
$v_customer_id = isset($_REQUEST['id'])? $_REQUEST['id'] : 0;
$v_acc = isset($_REQUEST['acc'])? $_REQUEST['acc'] : '';
require 'classes/cls_tb_contact.php';
require 'classes/cls_tb_location.php';
require 'classes/cls_tb_company.php';
require 'classes/cls_settings.php';
$cls_settings = new cls_settings($db, LOG_DIR);
require 'classes/cls_tb_module.php';
$cls_module = new cls_tb_module($db, LOG_DIR);
require 'classes/cls_tb_message.php';
$cls_tb_message = new cls_tb_message($db,LOG_DIR);
require 'classes/cls_tb_global.php';
$cls_tb_global = new cls_tb_global($db,LOG_DIR);
$v_contact_id = (int) get_unserialize_user('contact_id');
$v_company_id = (int) get_unserialize_user('company_id');
$v_location_id =(int) get_unserialize_user('location_default');
$cls_tb_company = new cls_tb_company($db);
$v_customer_template_id = $cls_tb_company->select_scalar('company_template_id', array('company_id'=>(int) $v_company_id));
if(!isset($_SESSION['templates']) || (isset($_SESSION['templates']) && $_SESSION['templates']=='')){
    $v_templates_name = 'default';
    add_class('cls_tb_template');
    $cls_tb_template = new cls_tb_template($db);
    if($v_customer_template_id > 0)
        $v_templates_name = $cls_tb_template->select_scalar('template_name',array('template_id'=>(int)$v_customer_template_id));
    $_SESSION['templates'] = $v_templates_name;
}
$v_templates_name = $_SESSION['templates'];
$v_templates = URL.'user_account/customer/templates/'.$v_templates_name;
$v_dir_templates = 'user_account/customer/templates/'.$v_templates_name;
$v_url = URL;
$v_website_testing = false;
if($cls_tb_global->select_scalar('setting_key',array('global_key'=> 'website_testing'))=='enable')
    $v_website_testing = true;
if(!isset($_SESSION['company_id']) || !isset($_SESSION['contact_id']) || !isset($_SESSION['location_id'])){
    $cls_tb_contact = new cls_tb_contact($db, LOG_DIR);
    $cls_tb_company = new cls_tb_company($db, LOG_DIR);
    $cls_tb_location = new cls_tb_location($db, LOG_DIR);
    $_SESSION['contact_id'] = $v_contact_id;
    $_SESSION['location_id'] = $v_location_id;
    $_SESSION['company_id'] = $v_company_id;
    /* Modules */
    $_SESSION['user_rule'] = $cls_tb_company->select_scalar('modules',array('company_id'=>(int)$v_company_id));

    $v_total = $cls_tb_contact->select_one(array("contact_id"=>(int) $v_contact_id));
    if($v_total==1){
        $arr_user['contact_name'] = $cls_tb_contact->get_first_name(). ", " . $cls_tb_contact->get_last_name() .  $cls_tb_contact->get_middle_name() ;
        $arr_user['user_email'] = $cls_tb_contact->get_email();
        $_SESSION['customer_name'] = $cls_tb_contact->get_first_name(). " " . $cls_tb_contact->get_middle_name() .  $cls_tb_contact->get_last_name() ;
        $_SESSION['customer_email'] = $cls_tb_contact->get_email();
    }
    $v_total = $cls_tb_company->select_one(array('company_id'=>(int)$v_company_id));
    if($v_total==1)
    {
        $arr_user['company_name']  = $cls_tb_company->get_company_name();
        $_SESSION['company_id'] = $cls_tb_company->get_company_id();
        $_SESSION['company_name']  = $cls_tb_company->get_company_name();
        $_SESSION['company_code'] = $cls_tb_company->get_company_code();
        $v_company_module = $cls_tb_company->get_modules();
        $arr_user['confirm_allocate'] = $arr_user['confirm_allocate'] || (strrpos($v_company_module, 'location_number')!==false?1:0);
        $v_file_logo = $cls_tb_company->get_logo_file();
        $_SESSION['SRC_LOGO'] = '';
        if($v_file_logo!='')
            if(file_exists('resources/'.$_SESSION['company_code'].'/'.$v_file_logo))
                $_SESSION['SRC_LOGO'] = '<img src="'.URL .'resources/'.$_SESSION['company_code'].'/'.$v_file_logo.'" >';
        $arr_temp = array();
        $arr_where_clause = array('company_id'=>$v_company_id);
        $arr_where_clause = array('location_id'=>array('$in'=>$arr_user['location']));
        $arr_location = $cls_tb_location->select($arr_where_clause);
        foreach($arr_location as $a){
            $arr_temp[] = $a;
        }
        $arr_user['location'] = $arr_temp;

        $_SESSION['ss_user'] = serialize($arr_user);
    }
}
$v_user_rule_hide_price_all = strpos($_SESSION['user_rule'], 'hide_price_on_order')!==false;
if($v_user_rule_hide_price_all) $v_user_rule_hide_price_all=in_array($arr_user['user_type'],array(4,5));
switch($v_acc)
{
    case 'ERROR':
        $v_navigator_name = "Error";
        include 'user_account/customer/error/index.php';
        break;
    case 'INFO':
        $v_navigator_name = "Catalogue";
        include 'user_account/customer/product/index.php';
        break;
    case 'SUPPORT';
        $v_navigator_name = "Support";
        include 'user_account/customer/support/index.php';
        break;
    case 'ORDER':
        $v_navigator_name = "Order";
        include 'user_account/customer/order/index.php';
        break;
    case 'CAOR'://new order from catalogue
        if(isset($_SESSION['order_id'])) unset ($_SESSION['order_id']);
        redir(URL.'catalogue/');
        break;
    case 'CAT':
        $v_navigator_name = "Catalogue";
        include 'user_account/customer/catalogue/index.php';
        break;
    case 'SHIP':
        $v_navigator_name = "Shipping";
        include 'user_account/customer/shipping/index.php';
        break;
    case 'SIGN':
        $v_navigator_name = "Signage Layout";
        include 'user_account/customer/signage_layout/index.php';
        break;
    case 'SUPPORT':
        $v_navigator_name = "Support";
        include 'user_account/customer/support/index.php';
        break;
    case 'CONF':
        $v_navigator_name = "Setting!...";
        include 'user_account/customer/settings/index.php';
        break;
    case 'ITEM':
        $v_navigator_name = "Item!...";
        include 'user_account/customer/item/index.php';
        break;
    case 'ALLOCATION':
        $v_navigator_name = "ALLOCATION!...";
        include 'user_account/customer/allocation/index.php';
        break;
    default:
        $v_navigator_name = "Home";
        include 'user_account/customer/home/index.php';
        break;
}
?>

