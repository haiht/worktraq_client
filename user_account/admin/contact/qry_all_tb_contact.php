<?php if(!isset($v_sval)) die();?>
<?php
$arr_where_clause=array();
$arr_sort = array();

$v_search_company_id = 0;
$v_search_location_id = 0;
$v_search_contact_type = 0;
$v_search_contact_email = '';
$v_search_location_number = '';
$v_search_contact_first_name = '';
$v_search_contact_last_name = '';
$v_search_sort_by = '';
$v_search_sort_type = 1;
if(isset($_POST['btn_contact_search'])){
    $v_search_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
    $v_search_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:'0';
    $v_search_location_number = isset($_POST['txt_location_number'])?trim($_POST['txt_location_number']):'';
    $v_search_contact_first_name = isset($_POST['txt_contact_first_name'])?trim($_POST['txt_contact_first_name']):'';
    $v_search_contact_last_name = isset($_POST['txt_contact_last_name'])?trim($_POST['txt_contact_last_name']):'';
    $v_search_contact_email = isset($_POST['txt_contact_email'])?trim($_POST['txt_contact_email']):'';
    $v_search_contact_type = isset($_POST['txt_contact_type'])?$_POST['txt_contact_type']:'0';
    $v_search_sort_by = isset($_POST['txt_sort_by'])?$_POST['txt_sort_by']:'';
    $v_search_sort_type = isset($_POST['txt_sort_type'])?$_POST['txt_sort_type']:'1';

    if($v_search_sort_by!=''){
        settype($v_search_sort_type, 'int');
        if($v_search_sort_type!=1) $v_search_sort_type = -1;
        $arr_sort = array($v_search_sort_by => $v_search_sort_type);
    }

    $arr_location = array();
    $v_location_allow_search = 0;
    $v_location_no_search = 0;

    if($v_search_location_number==''){
        if($v_search_location_id > 0){
            $arr_where_clause['location_id'] = (int) $v_search_location_id;
        }else{
            if($v_search_company_id > 0){
                $arr_where_clause['company_id'] = (int) $v_search_company_id;
            }
        }
    }else{
        if($v_search_location_id>0){
            if(strpos($cls_tb_location->select_scalar('location_number',array('location_id'=>$v_search_location_id)).'', $v_search_location_number)!==false){
                $arr_location[] = array('location_id'=> (int) $v_search_location_id);
                $v_location_allow_search++;
            }else{
                $v_location_no_search++;
            }
        }else{
            if($v_search_company_id>0){
                $arr_tmp_location = $cls_tb_location->select(array('company_id'=> (int) $v_search_company_id));
            }else{
                $arr_tmp_location = $cls_tb_location->select();
            }
            foreach($arr_tmp_location as $arr){
                $v_tmp_location_id = $arr['location_id'];
                $v_tmp_location_number = $arr['location_number'];
                if(strpos($v_tmp_location_number.'', $v_search_location_number)!==false){
                    $arr_location[] = array('location_id'=>(int) $v_tmp_location_id);
                    $v_location_allow_search++;
                }else{
                    $v_location_no_search++;
                }
            }
        }
        if(count($arr_location)>0){
            if($v_location_allow_search>0){
                if(count($arr_location)==1)
                    $arr_where_clause['location_id']=$arr_location[0]['location_id'];
                else
                    $arr_where_clause['$or'] = $arr_location;
            }else{
                $arr_where_clause['location_id']=-1;
            }
        }else if($v_location_no_search>0) $arr_where_clause['location_id'] = -1;
    }
    if($v_search_contact_type>0) $arr_where_clause['contact_type'] = (int) $v_search_contact_type;
    if($v_search_contact_first_name!='') $arr_where_clause['first_name'] = new MongoRegex("/".$v_search_contact_first_name."/i") ;
    if($v_search_contact_last_name!='') $arr_where_clause['last_name'] = new MongoRegex("/".$v_search_contact_last_name."/i") ;
    if($v_search_contact_email!='') $arr_where_clause['email'] = new MongoRegex("/".$v_search_contact_email."/") ;
    $arr_where_clause_contact = array(
        'company'=>$v_search_company_id
        ,'location'=>$v_search_location_id
        ,'number'=>$v_search_location_number
        ,'type'=>$v_search_contact_type
        ,'email'=>$v_search_contact_email
        ,'first'=>$v_search_contact_first_name
        ,'last'=>$v_search_contact_last_name
        ,'where'=>serialize($arr_where_clause)
        ,'sort'=>serialize($arr_sort)
    );
    $_SESSION['ss_where_clause_contact'] = serialize($arr_where_clause_contact);

}else if(isset($_POST['btn_contact_cancel'])){
    if(isset($_SESSION['ss_where_clause_contact'])) unset($_SESSION['ss_where_clause_contact']);
}else{
    if(isset($_SESSION['ss_where_clause_contact'])){
        $arr_where_clause_contact = unserialize($_SESSION['ss_where_clause_contact']);
        $v_search_company_id = isset($arr_where_clause_contact['company'])?$arr_where_clause_contact['company']:'0';
        $v_search_location_id = isset($arr_where_clause_contact['location'])?$arr_where_clause_contact['location']:'0';
        $v_search_contact_type = isset($arr_where_clause_contact['type'])?$arr_where_clause_contact['type']:'0';
        $v_search_contact_email = isset($arr_where_clause_contact['email'])?$arr_where_clause_contact['email']:'';
        $v_search_contact_first_name = isset($arr_where_clause_contact['first'])?$arr_where_clause_contact['first']:'';
        $v_search_contact_last_name = isset($arr_where_clause_contact['last'])?$arr_where_clause_contact['last']:'';
        $v_search_location_number = isset($arr_where_clause_contact['number'])?$arr_where_clause_contact['number']:'';
        $v_where_clause = isset($arr_where_clause_contact['where'])?$arr_where_clause_contact['where']:'';
        $v_sort = isset($arr_where_clause_contact['sort'])?$arr_where_clause_contact['sort']:'';
        if($v_where_clause!='') $arr_where_clause = unserialize($v_where_clause);
        if($v_sort!=''){
            $arr_sort = unserialize($v_sort);
            foreach($arr_sort as $v_search_sort_by=>$v_search_sort_type);
        }
    }
}

$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$v_total_row = $cls_tb_contact->count($arr_where_clause);

$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;

$v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");
$arr_tb_contact = $cls_tb_contact->select_limit($v_offset,$v_num_row,$arr_where_clause,$arr_sort);
$arr_temp_location = array();
$v_dsp_tb_contact = '<table id="list_contact" class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_contact .= '<tr align="center" valign="middle">';
$v_dsp_tb_contact .= '<th></th>';
$v_dsp_tb_contact .= '<th>Contact\'s Name</th>';
$v_dsp_tb_contact .= '<th>Contact Type</th>';
$v_dsp_tb_contact .= '<th>Location</th>';
$v_dsp_tb_contact .= '<th>Location\'s Number</th>';

$v_dsp_tb_contact .= '<th>Direct Phone</th>';
$v_dsp_tb_contact .= '<th>Email</th>';
$v_dsp_tb_contact .= '<th>Main Contact Location</th>';
$v_dsp_tb_contact .= '<th>Action</th>';

$v_dsp_tb_contact .= '</tr>';
$v_count = $v_offset+1;

foreach($arr_tb_contact as $arr){
	$v_mongo_id = $cls_tb_contact->get_mongo_id();
	$v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_contact_type = isset($arr['contact_type'])?$arr['contact_type']:'';
	$v_first_name = isset($arr['first_name'])?$arr['first_name']:'';
	$v_last_name = isset($arr['last_name'])?$arr['last_name']:'';
	$v_middle_name = isset($arr['middle_name'])?$arr['middle_name']:'';
	$v_birth_date = isset($arr['birth_date'])?date('d-M-Y H:i:s',$arr['birth_date']->sec):date('d-M-Y H:i:s', time());
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
	
	if(!isset( $arr_temp_location[$v_location_id] )){
		//$arr_temp_location[$v_location_id] = $cls_tb_location->select_scalar('location_name',array('location_id'=>(int)$v_location_id));
        $arr_tmp_location = $cls_tb_location->select_limit_fields(0,1, array('location_name', 'location_number'), array('location_id'=>(int)$v_location_id));
        foreach($arr_tmp_location as $arr){
            $arr_temp_location[$v_location_id] = array('location_name'=>$arr['location_name'], 'location_number'=>$arr['location_number']);
        }
    }
	
	
    $v_main_contact_location = $cls_tb_location->select_scalar('location_name',array('main_contact'=>$v_contact_id));

    $v_dsp_tb_contact .= '<tr align="left" valign="middle">';
	$v_dsp_tb_contact .= '<td align="right">'.($v_count++).'</td>';

    if($cls_tb_user->count(array('contact_id'=>(int)$v_contact_id))>0)
	    $v_dsp_tb_contact .= '<td><a rel="showdetails" href="'.URL .'admin/user/user/'. $v_contact_id .'/details"> '.$v_first_name.'&nbsp'.$v_last_name.'</a></td>';
    else
        $v_dsp_tb_contact .= '<td>'.$v_first_name.'&nbsp'.$v_last_name.'</td>';

	$v_dsp_tb_contact .= '<td>'.$cls_settings->get_option_name_by_id('contact_type',$v_contact_type).'</td>';
	$v_dsp_tb_contact .= '<td>'.(isset($arr_temp_location[$v_location_id]['location_name'])?$arr_temp_location[$v_location_id]['location_name']:'----').'</td>';
	$v_dsp_tb_contact .= '<td>'.(isset($arr_temp_location[$v_location_id]['location_number'])?$arr_temp_location[$v_location_id]['location_number']:'----').'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_direct_phone.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_email.'</td>';
	$v_dsp_tb_contact .= '<td>'.$v_main_contact_location.'</td>';
	$v_dsp_tb_contact .= '<td align="right">
	                                <a href="'.URL. $v_admin_key.'/'.$v_contact_id.'/edit'.($v_page==1?'':'/'.$v_page).'">Edit</a> |';
    if($v_per_delete==1)
        $v_dsp_tb_contact .='<a href="'.URL. $v_admin_key.'/'.$v_contact_id.'/delete">Delete</a>';

	$v_dsp_tb_contact .= '</td></tr>';
}
$v_dsp_tb_contact .= '</table>';


$arr_sort_fields = array('first_name', 'last_name', 'email', 'direct_phone', 'contact_type');
$v_dsp_sort_option = draw_option_sort_key($arr_sort_fields, $v_search_sort_by, $v_search_sort_type);
?>