<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_user_id = 0;
$v_user_name = '';
$v_user_password = '';
$v_user_type = 3;
$v_user_status = 0;
$v_user_lastlog = date('Y-m-d H:i:s', time());
$v_user_id = isset($_GET['id'])?$_GET['id']:0;
$v_user_location_approved  = '';
$v_user_location_allocated  = '';
$arr_user_role = array();
$cls_settings = new cls_settings($db);

$v_main_contact_name = '';
$v_main_location_name = '';
$v_main_company_name = '';

$v_dsp = '';
$v_allocate_dsp = '';
$v_dsp_all_role = '';
$v_dsp_user_role = '';

add_class('cls_tb_location');
add_class('cls_tb_company');
add_class('cls_tb_contact');
add_class('cls_tb_role');
$cls_tb_location = new cls_tb_location($db);
$cls_tb_company = new cls_tb_company($db, LOG_DIR);
$cls_tb_contact = new cls_tb_contact($db, LOG_DIR);
$cls_tb_role = new cls_tb_role($db, LOG_DIR);

if(isset($_POST['btn_submit_tb_user'])){

    $v_user_id =isset($_POST['txt_user_id'])?$_POST['txt_user_id']:0;
    $v_user_id = (int) $v_user_id;


    $v_user_name = isset($_POST['txt_user_name'])?$_POST['txt_user_name']:'';
    $v_user_name = trim($v_user_name);
    //$cls_tb_user->set_user_name($v_user_name);

    $v_user_type = isset($_POST['txt_user_type'])?$_POST['txt_user_type']:0;
    $v_user_type = (int) $v_user_type ;
    //$cls_tb_user->set_user_type($v_user_type);

    $v_user_status = isset($_POST['txt_user_status'])?$_POST['txt_user_status']:0;
    $v_user_status = (int) $v_user_status;
    //$cls_tb_user->set_user_status($v_user_status);

    $v_user_location_approve = isset($_POST['hdn_rule_list'])?$_POST['hdn_rule_list']:'';
    $v_user_location_allocate = isset($_POST['hdn_allocate_list'])?$_POST['hdn_allocate_list']:'';
	$v_user_location_view = isset($_POST['hdn_view_list'])?$_POST['hdn_view_list']:'';

    $v_user_role = isset($_POST['txt_user_role'])?$_POST['txt_user_role']:'';
    $arr_user_role = array();
    $arr_temp = explode(',', $v_user_role);
    for($i=0; $i<count($arr_temp);$i++){
        $v_role = (int) $arr_temp[$i];
        if($v_role>0) $arr_user_role[] = $v_role;
    }

    $arr_fields = array('user_type','user_status','user_location_approve','user_location_allocate','user_location_view', 'user_role');
    $arr_value = array((int) $v_user_type , (int) $v_user_status ,$v_user_location_approve ,$v_user_location_allocate ,$v_user_location_view, $arr_user_role);
    $arr_where = array('user_id'=>(int) $v_user_id);

    $cls_tb_user->update_fields($arr_fields,$arr_value,$arr_where);
    redir($_SERVER['HTTP_REFERER']);
}
else
{

    if($v_user_id!=0){
        $v_row = $cls_tb_user->select_one(array('user_id' =>(int)$v_user_id));

        if($v_row == 1){
            $v_user_id = $cls_tb_user->get_user_id();
            $v_user_name = $cls_tb_user->get_user_name();
            $v_user_password = $cls_tb_user->get_user_password();
            $v_user_type = $cls_tb_user->get_user_type();
            $v_user_status = $cls_tb_user->get_user_status();
            $v_contact_id = $cls_tb_user->get_contact_id();
            $v_company_id = $cls_tb_user->get_company_id();
            $v_location_id = $cls_tb_user->get_location_id();
            $v_user_location_approve = $cls_tb_user->get_user_location_approve();
			$v_user_location_allocate = $cls_tb_user->get_user_location_allocate();
			$v_user_location_view = $cls_tb_user->get_user_location_view();
            $v_user_lastlog = date('Y-m-d H:i:s',$cls_tb_user->get_user_lastlog());
            $arr_user_role = $cls_tb_user->get_user_role();

            $v_main_contact_name = $cls_tb_contact->get_full_name_contact($v_contact_id);
            $v_main_location_name = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id));
            $v_main_company_name = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));

            //$arr_return = $cls_tb_user->get_all_permission($db);
            //print_r($arr_return);

        }
		$v_user_location = $v_location_id;

        /*Get list Location */
        $arr_location = $cls_tb_location->select(array('company_id'=>(int)$v_company_id),array('location_number'=>1));
        $v_dsp = '';
        $v_inc = 1;
        $arr_main_contact = array();
        foreach($arr_location as $arr)
        {
            $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
            $v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
            $v_location_banner = isset($arr['location_banner'])?$arr['location_banner']:'';
            $v_location_number = isset($arr['location_number'])?$arr['location_number']:'';

            $v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
            $v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
            $v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
            $v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
            $v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
            $v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
            $v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
            $v_main_contact =  isset($arr['main_contact'])?$arr['main_contact']:'';
            $v_dsp_address = ($v_address_unit!=''?$v_address_unit .', ':'') . ($v_address_line_1!=''?$v_address_line_1 .'<br>':'');
            $v_dsp_address .= ($v_address_line_2!=''?$v_address_line_2 .'<br>':'');
            $v_dsp_address .= ($v_address_line_3!=''?$v_address_line_3 .'<br>':'');
            $v_dsp_address .= ($v_address_city!=''?$v_address_city .'&nbsp&nbsp':'') . ($v_address_province!=''?$v_address_province .'&nbsp&nbsp':'') .($v_address_postal!=''?$v_address_postal.'&nbsp&nbsp':'');

            $v_checked = '';
			$v_style = $v_location_id==$v_user_location?' style="background-color:#F09609;"':'';
            $v_dsp .='<tr'.$v_style.'><td width="10px">'.($v_inc++).'</td>';
            /**/
            if(!isset($arr_main_contact[$v_main_contact]))
                $arr_main_contact[$v_main_contact] = $cls_tb_contact->get_full_name_contact($v_main_contact);

            $v_dsp .='<td>'.$arr_main_contact[$v_main_contact].'</td>';
            $v_dsp .='<td>'.$v_location_name.'</td>';
            $v_dsp .='<td>'.$v_location_number.'</td>';
            $v_dsp .='<td>'.$v_location_banner.'</td>';
            $v_dsp .='<td>'.$v_dsp_address.'</td>';
            if(strpos($v_user_location_approve.',',$v_location_id.',')!== false)
                $v_checked = 'checked';

            $v_dsp .='<td align="center">
                        <input '.$v_checked.' type="checkbox" name="chk_rule_id" onclick="add_to_list(\'chk_rule_id\',\'hdn_rule_list\');" value="'.$v_location_id.'" name="chk_rule_id"></td>';

            $v_allocate_checked = '';
            if(strpos($v_user_location_allocate.',',$v_location_id.',')!== false)
                $v_allocate_checked = 'checked';

            $v_dsp .='<td align="center">
                        <input '.$v_allocate_checked.' type="checkbox" name="chk_allocate_id" onclick="add_to_list(\'chk_allocate_id\',\'hdn_allocate_list\');" value="'.$v_location_id.'" name="chk_allocate_id"></td>';

            $v_view_checked = '';
            if(strpos($v_user_location_view.',',$v_location_id.',')!== false)
                $v_view_checked = 'checked';

            $v_dsp .='<td align="center">
                        <input '.$v_view_checked.' type="checkbox" name="chk_view_id" onclick="add_to_list(\'chk_view_id\',\'hdn_view_list\');" value="'.$v_location_id.'" name="chk_view_id"></td>';

            $v_dsp .='</tr>';
        }


    }

    $arr_role = $cls_tb_role->select(array('company_id'=>$v_company_id, 'status'=>0));
    $v_list_role = trim(implode(',',$arr_user_role));
    if($v_list_role!='') $v_list_role.=',';
    foreach($arr_role as $arr){
        $v_role_id = $arr['role_id'];
        $v_role_title = $arr['role_title'];
        if(strpos($v_list_role, $v_role_id.',')!==false){
            $v_dsp_user_role .= '<option value="'.$v_role_id.'">'.$v_role_title.'</option>';
        }else{
            $v_dsp_all_role .= '<option value="'.$v_role_id.'">'.$v_role_title.'</option>';
        }
    }
}


?>