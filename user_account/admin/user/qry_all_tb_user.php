<?php if(!isset($v_sval)) die();?>
<?php
if(!isset($_SESSION['where_clause_user'])) $_SESSION['where_clause_user']="";
$arr_where_clause=array();
if($_SESSION['where_clause_user']!=""){  $arr_where_clause  = $_SESSION['where_clause_user'];}

$v_search_company_id = isset($_REQUEST['txt_company_id']) ? $_REQUEST['txt_company_id'] :(isset($arr_where_clause['company_id'])? ($arr_where_clause['company_id']) :0);
$v_search_location_id = isset($_REQUEST['txt_location_id']) ? $_REQUEST['txt_location_id'] :(isset($arr_where_clause['location_id'])? ($arr_where_clause['location_id']) :0);
$v_search_user_type = isset($_REQUEST['txt_search_user_type']) ? $_REQUEST['txt_search_user_type'] :(isset($arr_where_clause['user_type'])? ($arr_where_clause['user_type']) :'');
$v_search_username = isset($_REQUEST['txt_search_username']) ? $_REQUEST['txt_search_username'] :(isset($arr_where_clause['user_name'])? ftext($arr_where_clause['user_name']) :'');

if($v_search_company_id!=0) $arr_where_clause['company_id'] = (int) $v_search_company_id;
if($v_search_location_id!=0) $arr_where_clause['location_id'] = (int) $v_search_location_id;
if($v_search_user_type!='') $arr_where_clause['user_type'] = (int) $v_search_user_type;
if($v_search_username!='') $arr_where_clause['user_name'] =new MongoRegex("/".(string) $v_search_username."/") ;

if($v_search_company_id!=0||$v_search_location_id!=0||$v_search_user_type!='' || $v_search_username!='' )
    $_SESSION['where_clause_user'] = $arr_where_clause;

if(isset($_REQUEST['btn_search_cancel'])){
    $v_search_company_id = 0;
    $v_search_location_id = 0;
    $v_search_user_type = '';
    $v_search_username = '';
    unset($_SESSION['where_clause_user']);
}

$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;

$v_total_row = $cls_tb_user->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;

add_class('cls_tb_company');
add_class('cls_tb_location');
add_class('cls_tb_contact');
$cls_tb_company = new cls_tb_company($db);
$cls_tb_location = new cls_tb_location($db);
$cls_tb_contact = new cls_tb_contact($db);

$arr_temp_company = array();
$arr_temp_location = array();
$arr_temp_contact = array();


$arr_tb_user = $cls_tb_user->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_user = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_tb_user .= '<tr align="center" valign="middle">';
$v_dsp_tb_user .= '<th></th>';
$v_dsp_tb_user .= '<th>Company</th>';
$v_dsp_tb_user .= '<th>Location</th>';
$v_dsp_tb_user .= '<th>User Name</th>';
$v_dsp_tb_user .= '<th>User Type</th>';

$v_dsp_tb_user .= '<th>Contact name</th>';
$v_dsp_tb_user .= '<th>Action</th>';
$v_dsp_tb_user .= '</tr>';
$v_count = $v_offset+1;
$arr_tmp_user_type = array();

foreach($arr_tb_user as $arr){
    $v_mongo_id = $cls_tb_user->get_mongo_id();
    $v_user_id = isset($arr['user_id'])?$arr['user_id']:0;
    $v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
    $v_user_password = isset($arr['user_password'])?$arr['user_password']:'';
    $v_user_type = isset($arr['user_type'])?$arr['user_type']:0;
    $v_user_status = isset($arr['user_status'])?$arr['user_status']:0;
    $v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
    $v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;

    $v_user_lastlog = isset($arr['user_lastlog'])?date('Y-m-d H:i:s',$arr['user_lastlog']->sec):date('Y-m-d H:i:s', time());

    if(!isset($arr_tmp_user_type[$v_user_type]))
        $arr_tmp_user_type[$v_user_type] = $cls_settings->get_option_name_by_id('user_type',(int) $v_user_type);

    if(!isset($arr_temp_company[$v_company_id]))
        $arr_temp_company[$v_company_id] = $cls_tb_company->select_scalar('company_name',array('company_id'=>(int)$v_company_id));
    if(!isset($arr_temp_location[$v_location_id]))
        $arr_temp_location[$v_location_id] = $cls_tb_location->select_scalar('location_name',array('location_id'=>(int)$v_location_id));
    if(!isset($arr_temp_contact[$v_contact_id]))
        $arr_temp_contact[$v_contact_id] = $cls_tb_contact->get_full_name_contact($v_contact_id);



    $v_dsp_tb_user .= '<tr align="left" valign="middle">';
    $v_dsp_tb_user .= '<td align="right">'.($v_count++).'</td>';
    $v_dsp_tb_user .= '<td>'.$arr_temp_company[$v_company_id].'</td>';
    $v_dsp_tb_user .= '<td>'.$arr_temp_location[$v_location_id].'</td>';

    $v_dsp_tb_user .= '<td><b><a rel="showdetails" href="'. URL .'admin/contact/contact/'.$v_contact_id.'/details/'.'">' .$v_user_name.'</a></b></td>';
    $v_dsp_tb_user .= '<td>'.$arr_tmp_user_type[$v_user_type].'</td>';

    $v_dsp_tb_user .= '<td>'.$arr_temp_contact[$v_contact_id].'</td>';
    $v_dsp_tb_user .= '<td align="right">'.'<a rel="rules_user" href="'.URL. $v_admin_key.'/'.$v_user_id.'/rule">Rules</a> | '.'
                            <a href="'.URL. $v_admin_key.'/'.$v_user_id.'/edit">Edit</a> |
                            <a href="'.URL. $v_admin_key.'/'.$v_user_id.'/cpasswd">Change Password</a> |
                            <a onclick="{return confirm(\'Do you want to remove '.$v_user_name . '\')}" href="'.URL.$v_admin_key.'/'.$v_user_id.'/delete">Delete</a></td>';
    $v_dsp_tb_user .= '</tr>';
}
$v_dsp_tb_user .= '</table>';
?>