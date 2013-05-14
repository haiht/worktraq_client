<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_contact_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_contact_sort'])){
	$v_sort = $_SESSION['ss_tb_contact_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_contact = $cls_tb_contact->select($arr_where_clause, $arr_sort);
$v_dsp_tb_contact = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_contact .= '<tr align="center" valign="middle">';
$v_dsp_tb_contact .= '<th>Ord</th>';
$v_dsp_tb_contact .= '<th>Contact Id</th>';
$v_dsp_tb_contact .= '<th>Location Id</th>';
$v_dsp_tb_contact .= '<th>Contact Type</th>';
$v_dsp_tb_contact .= '<th>First Name</th>';
$v_dsp_tb_contact .= '<th>Last Name</th>';
$v_dsp_tb_contact .= '<th>Middle Name</th>';
$v_dsp_tb_contact .= '<th>Birth Date</th>';
$v_dsp_tb_contact .= '<th>Address Type</th>';
$v_dsp_tb_contact .= '<th>Address Unit</th>';
$v_dsp_tb_contact .= '<th>Address Line 1</th>';
$v_dsp_tb_contact .= '<th>Address Line 2</th>';
$v_dsp_tb_contact .= '<th>Address Line 3</th>';
$v_dsp_tb_contact .= '<th>Address City</th>';
$v_dsp_tb_contact .= '<th>Address Province</th>';
$v_dsp_tb_contact .= '<th>Address Postal</th>';
$v_dsp_tb_contact .= '<th>Address Country</th>';
$v_dsp_tb_contact .= '<th>Direct Phone</th>';
$v_dsp_tb_contact .= '<th>Mobile Phone</th>';
$v_dsp_tb_contact .= '<th>Fax Number</th>';
$v_dsp_tb_contact .= '<th>Home Phone</th>';
$v_dsp_tb_contact .= '<th>Email</th>';
$v_dsp_tb_contact .= '<th>User Id</th>';
$v_dsp_tb_contact .= '</tr>';
$v_count = 1;
foreach($arr_tb_contact as $arr){
	$v_dsp_tb_contact .= '<tr align="left" valign="middle">';
	$v_dsp_tb_contact .= '<td align="right">'.($v_count++).'</td>';
	$v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_contact_type = isset($arr['contact_type'])?$arr['contact_type']:'';
	$v_first_name = isset($arr['first_name'])?$arr['first_name']:'';
	$v_last_name = isset($arr['last_name'])?$arr['last_name']:'';
	$v_middle_name = isset($arr['middle_name'])?$arr['middle_name']:'';
	$v_birth_date = isset($arr['birth_date'])?$arr['birth_date']:(new MongoDate(time()));
	$v_address_type = isset($arr['address_type'])?$arr['address_type']:0;
	$v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
	$v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
	$v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
	$v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
	$v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
	$v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
	$v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
	$v_address_country = isset($arr['address_country'])?$arr['address_country']:0;
	$v_direct_phone = isset($arr['direct_phone'])?$arr['direct_phone']:'';
	$v_mobile_phone = isset($arr['mobile_phone'])?$arr['mobile_phone']:'';
	$v_fax_number = isset($arr['fax_number'])?$arr['fax_number']:'';
	$v_home_phone = isset($arr['home_phone'])?$arr['home_phone']:'';
	$v_email = isset($arr['email'])?$arr['email']:'';
	$v_user_id = isset($arr['user_id'])?$arr['user_id']:0;
	$v_dsp_tb_contact .= '<td>'.$v_contact_id.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_location_id.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_contact_type.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_first_name.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_last_name.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_middle_name.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_birth_date.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_address_type.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_address_unit.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_address_line_1.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_address_line_2.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_address_line_3.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_address_city.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_address_province.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_address_postal.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_address_country.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_direct_phone.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_mobile_phone.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_fax_number.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_home_phone.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_email.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_user_id.'</td>';
	$v_dsp_tb_contact .= '</tr>';
}
$v_dsp_tb_contact .= '</table>';
?>