<?php if(!isset($v_sval)) die();?>
<?php
if(!isset($_SESSION['where_clause_location'])) $_SESSION['where_clause_location']="";
if(!isset($_SESSION['order_location'])) $_SESSION['order_location']="_id";
if(!isset($_SESSION['order_by'])) $_SESSION['order_by']=-1;

$arr_where_clause=array();
$arr_order = array('_id'=>-1);
$v_sort_by = -1;
if($_SESSION['where_clause_location']!=""){$arr_where_clause  = $_SESSION['where_clause_location'];}
if($_SESSION['order_location']!="_id"){$v_sort_name  = $_SESSION['order_location'];}
if($_SESSION['order_by']!=-1){$v_sort_by  = $_SESSION['order_by'];}

$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$v_sort_name = isset($_REQUEST['txt_order_id'])?$_REQUEST['txt_order_id']:$_SESSION['order_location'];
$v_sort_by = isset($_REQUEST['txt_order_by'])?$_REQUEST['txt_order_by']:$_SESSION['order_by'];

$v_search_company_id  = isset($_REQUEST['txt_company_id'])?$_REQUEST['txt_company_id']:(isset($arr_where_clause['company_id'])? $arr_where_clause['company_id'] :0);
$v_search_location_name= isset($_REQUEST['txt_location_name'])?$_REQUEST['txt_location_name']:(isset($arr_where_clause['location_name'])? ftext($arr_where_clause['location_name']) :'');
$v_search_location_banner = isset($_REQUEST['txt_location_banner'])?$_REQUEST['txt_location_banner']:(isset($arr_where_clause['location_banner'])? ftext($arr_where_clause['location_banner']) :'');
$v_search_location_number = isset($_REQUEST['txt_location_number'])?$_REQUEST['txt_location_number']:(isset($arr_where_clause['location_number'])? ftext($arr_where_clause['location_number']) :'');

if($v_search_company_id!=0){$arr_where_clause['company_id'] = (int)$v_search_company_id;}
else { unset($arr_where_clause['company_id']);}
if($v_search_location_name!='')$arr_where_clause['location_name'] = new MongoRegex("/".(string) $v_search_location_name."/") ;
else{ unset($arr_where_clause['location_name']); }
if($v_search_location_banner!='')$arr_where_clause['location_banner'] = new MongoRegex("/".(string) $v_search_location_banner."/") ;
else{ unset($arr_where_clause['location_banner']);}
if($v_search_location_number!='')$arr_where_clause['location_number'] = (int) $v_search_location_number ;
else{ unset($arr_where_clause['location_number']);}


if($v_search_company_id!=0||$v_search_location_name!=''||$v_search_location_banner!=''  || $v_search_location_number!='')
    $_SESSION['where_clause_location'] = $arr_where_clause;

$_SESSION['order_by'] =$v_sort_by;

if($v_sort_name!='_id' ){
    unset($arr_order);
    $arr_order[$v_sort_name]= (int)$_SESSION['order_by'];
    $_SESSION['order_location'] = $v_sort_name;
}
if(isset($_REQUEST['btn_product_cancel'])){
    $v_search_company_id = 0;
    $v_search_location_name = '';
    $v_search_location_banner = '';
    unset($_SESSION['where_clause']);
    $v_sort_name='_id';
    $v_sort_by = -1;
    unset($_SESSION['where_clause_location']);
    unset($_SESSION['order_location']);
    redir(URL.$v_admin_key);
}
$v_total_row  = $cls_tb_location->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;

if(!is_array($arr_order))$arr_order=array('_id'=>-1);
if(!is_array($arr_where_clause))$arr_where_clause=array();

$arr_tb_location = $cls_tb_location->select_limit($v_offset,$v_num_row,$arr_where_clause,$arr_order);
$v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");

$v_dsp_tb_location = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_tb_location .= '<tr align="center" valign="middle">';
$v_dsp_tb_location .= '<th></th>';
$v_dsp_tb_location .= '<th>Location Name</th>';
$v_dsp_tb_location .= '<th>Company Name</th>';
$v_dsp_tb_location .= '<th>Location Number</th>';
$v_dsp_tb_location .= '<th>Location Banner</th>';
$v_dsp_tb_location .= '<th>Main Contact</th>';
$v_dsp_tb_location .= '<th>Approved Contact</th>';
$v_dsp_tb_location .= '<th>Action</th>';
$v_dsp_tb_location .= '</tr>';
$v_count = $v_offset+1;
$arr_temp_contact = array();
foreach($arr_tb_location as $arr){
	$v_mongo_id = $cls_tb_location->get_mongo_id();
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_location_type = isset($arr['location_type'])?$arr['location_type']:0;
	$v_location_region = isset($arr['location_region'])?$arr['location_region']:'';
    $v_location_banner = isset($arr['location_banner'])?$arr['location_banner']:'';
	$v_location_number = isset($arr['location_number'])?$arr['location_number']:'';
	$v_main_contact = isset($arr['main_contact'])?$arr['main_contact']:'';
	$v_approved_contact = isset($arr['approved_contact'])?$arr['approved_contact']:0;
	$v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
	$v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
	$v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
	$v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
	$v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
	$v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
	$v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
	$v_address_country = isset($arr['address_country'])?$arr['address_country']:'';
	$v_open_date = isset($arr['open_date'])?date('d-M-Y ',$arr['open_date']->sec):date('d-M-Y H:i:s', time());
	$v_close_date = isset($arr['close_date'])?date('d-M-Y ',$arr['close_date']->sec):date('d-M-Y H:i:s', time());
    $v_company_name =$cls_tb_company->get_company_name_by_id($v_company_id);

    if(!isset($arr_temp_contact[$v_main_contact]))
            $arr_temp_contact[$v_main_contact] = $cls_tb_contact->get_full_name_contact($v_main_contact);

    $v_full_approved_contact =  $v_approved_contact>0?$cls_tb_contact->get_full_name_contact($v_approved_contact):'';

	$v_status = isset($arr['status'])?$arr['status']:1;

	$v_dsp_tb_location .= '<tr align="left" valign="middle">';
	$v_dsp_tb_location .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_location .= '<td><a rel="showdetails" href="'. URL.$v_admin_key .'/'.$v_location_id.'/details"> '.$v_location_name.'</a></td>';
    $v_dsp_tb_location .= '<td>'.$v_company_name.'</td>';
    $v_dsp_tb_location .= '<td>'.$v_location_number.'</td>';
    $v_dsp_tb_location .= '<td>'.$v_location_banner.'</td>';
	$v_dsp_tb_location .= '<td><b>'.$arr_temp_contact[$v_main_contact].'</b></td>';
    $v_dsp_tb_location .= '<td><b>'.$v_full_approved_contact.'</b></td>';
	$v_dsp_tb_location .= '<td align="center">
	                            <a href="'. URL.'admin/contact/contact/add/'.$v_location_id.'/'.$v_company_id.'">Add Contact </a> |
	                            <a href="'. URL.$v_admin_key .'/'.$v_location_id.'/edit'.($v_page==1?'':'/'.$v_page).'">Edit</a> |';
    if($v_per_delete==1)$v_dsp_tb_location .='<a onclick="{return confirm(\'Do you want to remove '.$v_company_name. '\')}" href="'. URL.$v_admin_key .'/'.$v_location_id.'/delete'.'">Delete</a>';

    $v_dsp_tb_location .= '</td></tr>';
}
$v_dsp_tb_location .= '</table>';
?>