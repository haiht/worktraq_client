<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_user_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_user_sort'])){
	$v_sort = $_SESSION['ss_tb_user_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_user = $cls_tb_user->select($arr_where_clause, $arr_sort);
$v_dsp_tb_user = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_user .= '<tr align="center" valign="middle">';
$v_dsp_tb_user .= '<th>Ord</th>';
$v_dsp_tb_user .= '<th>User Id</th>';
$v_dsp_tb_user .= '<th>User Name</th>';
$v_dsp_tb_user .= '<th>Company Id</th>';
$v_dsp_tb_user .= '<th>Location Id</th>';
$v_dsp_tb_user .= '<th>Contact Id</th>';
$v_dsp_tb_user .= '<th>User Password</th>';
$v_dsp_tb_user .= '<th>User Location Approve</th>';
$v_dsp_tb_user .= '<th>User Location Allocate</th>';
$v_dsp_tb_user .= '<th>User Location View</th>';
$v_dsp_tb_user .= '<th>User Type</th>';
$v_dsp_tb_user .= '<th>User Status</th>';
$v_dsp_tb_user .= '<th>User Lastlog</th>';
$v_dsp_tb_user .= '</tr>';
$v_count = 1;
foreach($arr_tb_user as $arr){
	$v_dsp_tb_user .= '<tr align="left" valign="middle">';
	$v_dsp_tb_user .= '<td align="right">'.($v_count++).'</td>';
	$v_user_id = isset($arr['user_id'])?$arr['user_id']:0;
	$v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
	$v_user_password = isset($arr['user_password'])?$arr['user_password']:'';
	$v_user_location_approve = isset($arr['user_location_approve'])?$arr['user_location_approve']:'';
	$v_user_location_allocate = isset($arr['user_location_allocate'])?$arr['user_location_allocate']:'';
	$v_user_location_view = isset($arr['user_location_view'])?$arr['user_location_view']:'';
	$v_user_type = isset($arr['user_type'])?$arr['user_type']:3;
	$v_user_status = isset($arr['user_status'])?$arr['user_status']:'0';
	$v_user_lastlog = isset($arr['user_lastlog'])?$arr['user_lastlog']:(new MongoDate(time()));
	$v_dsp_tb_user .= '<td>'.$v_user_id.'</td>';
	$v_dsp_tb_user .= '<td>'.$v_user_name.'</td>';
	$v_dsp_tb_user .= '<td>'.$v_company_id.'</td>';
	$v_dsp_tb_user .= '<td>'.$v_location_id.'</td>';
	$v_dsp_tb_user .= '<td>'.$v_contact_id.'</td>';
	$v_dsp_tb_user .= '<td>'.$v_user_password.'</td>';
	$v_dsp_tb_user .= '<td>'.$v_user_location_approve.'</td>';
	$v_dsp_tb_user .= '<td>'.$v_user_location_allocate.'</td>';
	$v_dsp_tb_user .= '<td>'.$v_user_location_view.'</td>';
	$v_dsp_tb_user .= '<td>'.$v_user_type.'</td>';
	$v_dsp_tb_user .= '<td>'.$v_user_status.'</td>';
	$v_dsp_tb_user .= '<td>'.$v_user_lastlog.'</td>';
	$v_dsp_tb_user .= '</tr>';
}
$v_dsp_tb_user .= '</table>';
?>