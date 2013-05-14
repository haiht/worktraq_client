<?php if(!isset($v_sval)) die();?>
<?php
$v_search_company_id = 0;
if(!isset($_SESSION['where_clause_location'])) $_SESSION['where_clause_tag']="";
$arr_where_clause=array();
$arr_where_or = array();
if($_SESSION['where_clause_tag']!=""){  $arr_where_clause  = $_SESSION['where_clause_tag'];}
$v_search_company_id = isset($_REQUEST['txt_company_id'])?$_REQUEST['txt_company_id']: (isset($arr_where_clause['company_id'])? $arr_where_clause['company_id'] :0);

if($v_search_company_id!=0) $arr_where_clause['company_id']=(int)$v_search_company_id;

$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:ADMIN_ROWS_ONE_PAGE;
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?ADMIN_ROWS_ONE_PAGE:$v_num_row;

$v_company_id = isset($arr_user['company_id'])?$arr_user['company_id']:0;
$v_location_id = isset($arr_user['location_default'])?$arr_user['location_default']:0;
if($v_search_company_id!=0) $_SESSION['where_clause_contact'] = $arr_where_clause;

$v_total_row = $cls_tb_tag->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;

if(isset($_REQUEST['btn_location_cancel'])){
    $_SESSION['where_clause_tag '] = "";
    $arr_where_clause=array();
}


$v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");
$arr_tb_tag = $cls_tb_tag->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_tag = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_tag .= '<tr align="center" valign="middle">';
$v_dsp_tb_tag .= '<th>Ord</th>';
$v_dsp_tb_tag .= '<th>Tag Name</th>';
$v_dsp_tb_tag .= '<th>Tag Status</th>';
$v_dsp_tb_tag .= '<th>Tag Order</th>';
$v_dsp_tb_tag .= '<th>Location</th>';
$v_dsp_tb_tag .= '<th>Company</th>';
$v_dsp_tb_tag .= '<th>User Name</th>';
$v_dsp_tb_tag .= '<th>Date Created</th>';
$v_dsp_tb_tag .= '<th>&nbsp;</th>';
$v_dsp_tb_tag .= '</tr>';
$v_count = $v_offset+1;

foreach($arr_tb_tag as $arr){
	$v_mongo_id = $cls_tb_tag->get_mongo_id();
	$v_tag_id = isset($arr['tag_id'])?$arr['tag_id']:0;
	$v_tag_name = isset($arr['tag_name'])?$arr['tag_name']:'';
	$v_tag_status = isset($arr['tag_status'])?$arr['tag_status']:0;
	$v_tag_order = isset($arr['tag_order'])?$arr['tag_order']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
	$v_date_created = isset($arr['date_created'])?date('M-d-Y H:i:s',$arr['date_created']->sec):date('Y-m-d H:i:s', time());
    $v_company = $v_company_id>0?$cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id)):'---';
    $v_location = $v_location_id>0?$cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id)):'---';
	$v_dsp_tb_tag .= '<tr align="left" valign="middle">';
	$v_dsp_tb_tag .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_tag .= '<td>'.$v_tag_name.'</td>';
	$v_dsp_tb_tag .= '<td>'.($v_tag_status==0?'Active':'Inactive').'</td>';
	$v_dsp_tb_tag .= '<td>'.$v_tag_order.'</td>';
	$v_dsp_tb_tag .= '<td>'.$v_location.'</td>';
	$v_dsp_tb_tag .= '<td>'.$v_company.'</td>';
	$v_dsp_tb_tag .= '<td>'.$v_user_name.'</td>';
	$v_dsp_tb_tag .= '<td>'.$v_date_created.'</td>';
	$v_dsp_tb_tag .= '<td align="center"><a href="'.URL.$v_admin_key.'/'.$v_tag_id.'/edit">Edit</a> | <a class="confirm" href="'.URL.$v_admin_key.'/'.$v_tag_id.'/delete">Delete</a></td>';
	$v_dsp_tb_tag .= '</tr>';
}
$v_dsp_tb_tag .= '</table>';
?>