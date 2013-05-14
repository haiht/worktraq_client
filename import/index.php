<?php
session_start();
error_reporting(E_ALL);
$v_sval = 1;
$v_dsp = '';
$v_date = date('d-M-Y');
include '../config.php';
include '../connect.php';
include '../classes/cls_tb_location.php';
include '../classes/cls_tb_contact.php';
include '../classes/cls_tb_company.php';
include '../classes/cls_tb_user.php';

$v_message = '';
$cls_location = new cls_tb_location($db);
$cls_contact = new cls_tb_contact($db);
$cls_user = new cls_tb_user($db);

require_once 'Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();

$data->setOutputEncoding('UTF-8');
$data->read('list_user.xls');

$v_company_id = 10007;
$v_dsp = '<table class="sorttable"  border="1" width="80%" cellspacing="0" cellpadding="3" align="center">';
$v_dsp .='<tr>
                <th></th>
                <th>Store Number</th>
                <th>Store Name </th>
                <th>User name</th>
                <th>Password</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Manager</th>
                <th>Email</th>
                <th>Location ID</th>
                <th>Contact ID</th>
                <th>User ID</th>
        </tr>';
$v_total = 0;
$v_total_filed_update=0;

$arr_location = array();
/* Contact **/
for ($x = 3; $x <= count($data->sheets[1]["cells"]); $x++) {
    $v_location_number  = $data->sheets[1]["cells"][$x][2];
    $v_store_name = $data->sheets[1]["cells"][$x][3];//
    $v_username = $data->sheets[1]["cells"][$x][4];//
    $v_password = $data->sheets[1]["cells"][$x][5];//
    $v_first_name = $data->sheets[1]["cells"][$x][6];//
    $v_last_name = $data->sheets[1]["cells"][$x][7];//
    $v_full_name = $data->sheets[1]["cells"][$x][8];//
    $v_email = isset($data->sheets[1]["cells"][$x][9]) ? $data->sheets[1]["cells"][$x][9] : '';//

    $v_location_id = $cls_location->select_scalar('location_id',array('location_number'=>$v_location_number, 'company_id'=>(int) $v_company_id));

    $v_total_records = $cls_contact->select_one(array('location_id'=>(int)$v_location_id));
    /*
    if($v_total_records !=0){
        $v_full_name  = trim($cls_contact->get_first_name()). ' ' .trim($cls_contact->get_last_name());
        if($v_full_name != ''  && $cls_contact->get_email()!='' && !isset($arr_contact[$v_full_name]))
            $arr_contact[$v_full_name] = $cls_contact->get_email();
    }
    */


    $cls_contact->set_company_id($v_company_id);
    $cls_contact->set_location_id($v_location_id);
    $cls_contact->set_contact_type(1);
    $cls_contact->set_first_name($v_first_name);
    $cls_contact->set_last_name($v_last_name);
    $cls_contact->set_middle_name("");
    $cls_contact->set_birth_date($v_date);
    $cls_contact->set_address_type(1);

    $cls_contact->set_direct_phone('000-000-0000');
    $cls_contact->set_mobile_phone("");
    $cls_contact->set_fax_number("");
    $cls_contact->set_home_phone("");
    $cls_contact->set_email($v_email);
    $cls_contact->set_receive_email_flag(1);

    $v_count = $cls_location->select_one(array("location_id"=>$v_location_id));
    if($v_count==1)
    {
        $cls_contact->set_address_unit($cls_location->get_address_unit());
        $cls_contact->set_address_line_1($cls_location->get_address_line_1());
        $cls_contact->set_address_line_2($cls_location->get_address_line_2());
        $cls_contact->set_address_line_3($cls_location->get_address_line_3());
        $cls_contact->set_address_city($cls_location->get_address_city());
        $cls_contact->set_address_province($cls_location->get_address_province());
    }


    $arr_country = $cls_location->get_address_postal();
    $v_country_id  = isset($arr_country['address_id']) ? $arr_country['address_id'] : 15;
    $cls_contact->set_address_country($v_country_id);
    $cls_contact->set_address_postal($cls_location->get_address_postal());

    $v_contact_id =  $cls_contact->select_next('contact_id');
    $cls_contact->set_contact_id($v_contact_id);
    $v_dsp_contact = "";
    if($cls_contact->insert()!=NULL);
        $v_dsp_contact = " Inserted - ";

    $cls_user->set_user_name($v_username);
    $cls_user->set_user_password(md5($v_password));
    $cls_user->set_user_type(5);
    $cls_user->set_user_status(0);
    $cls_user->set_location_id($v_location_id);
    $cls_user->set_contact_id($v_contact_id);
    $cls_user->set_company_id($v_company_id);
    $v_user_id = $cls_user->select_next('user_id');
    $cls_user->set_user_id($v_user_id);
    $v_dsp_user = "";
    if($cls_user->insert()!=NULL);
        $v_dsp_user = " Inserted - ";

    /* Set User */
    /*Check manager location */
    $v_dsp .='<tr><td>'.$v_total++.'</td>';
    $v_dsp .='<td>'.$v_location_number.'</td>';
    $v_dsp .='<td>'.$v_store_name.'</td>';
    $v_dsp .='<td>'.$v_username.'</td>';
    $v_dsp .='<td>'.$v_password.'</td>';
    $v_dsp .='<td>'.$v_first_name.'</td>';
    $v_dsp .='<td>'.$v_last_name.'</td>';
    $v_dsp .='<td>'.$v_full_name.'</td>';
    $v_dsp .='<td>'.$v_email.'</td>';
    $v_dsp .='<td>'.$v_location_id.'</td>';
    $v_dsp .='<td>'.$v_dsp_contact. $v_contact_id.'</td>';
    $v_dsp .='<td>'.$v_dsp_user. $v_user_id.'</td>';
    $v_dsp .='</tr>';
}

$v_dsp .= '</table>';

function add_class($p_class_name,$p_class_file="")
{
    if($p_class_file=="") $v_tmp_class_name = $p_class_name .'.php';
    else $v_tmp_class_name = $p_class_file;
    if(!class_exists($p_class_name)){
        if(file_exists('../classes/'.$v_tmp_class_name))
            require '../classes/'.$v_tmp_class_name;
        else
        {
            die('Can not require class '. $p_class_name. ' check dir (' .'../classes/'.$v_tmp_class_name  .')' );

        }
    }
}


include 'dsp_import.php';
?>