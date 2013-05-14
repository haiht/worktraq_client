<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_support->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_support = $cls_tb_support->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");

$v_dsp_tb_support = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_support .= '<tr align="center" valign="middle">';
$v_dsp_tb_support .= '<th>Ord</th>';

$v_dsp_tb_support .= '<th>Support Title</th>';
$v_dsp_tb_support .= '<th>Support Description</th>';
$v_dsp_tb_support .= '<th>Contact Id</th>';
$v_dsp_tb_support .= '<th>Date Created</th>';
$v_dsp_tb_support .= '<th>Username</th>';
$v_dsp_tb_support .= '<th>Image File</th>';
$v_dsp_tb_support .= '<th>&nbsp;</th>';
$v_dsp_tb_support .= '</tr>';
$v_count = 1;


$arr_contact = array();

foreach($arr_tb_support as $arr){
	$v_mongo_id = $cls_tb_support->get_mongo_id();
	$v_support_id = isset($arr['support_id'])?$arr['support_id']:0;
	$v_support_title = isset($arr['support_title'])?$arr['support_title']:'';
	$v_support_description = isset($arr['support_description'])?$arr['support_description']:'';
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
	$v_date_created = isset($arr['date_created'])?date('Y-m-d H:i:s',$arr['date_created']->sec):date('Y-m-d H:i:s', time());
	$v_username = isset($arr['username'])?$arr['username']:'';
	$v_image_file = isset($arr['image_file'])?$arr['image_file']:'';
	$v_dsp_tb_support .= '<tr align="left" valign="middle">';
	$v_dsp_tb_support .= '<td align="right">'.($v_count++).'</td>';

    if(!isset($arr_contact[$v_contact_id]))
            $arr_contact[$v_contact_id] = $cls_tb_contact->get_infomation_contact((int)$v_contact_id);


	$v_dsp_tb_support .= '<td>'.$v_support_title.'</td>';
	$v_dsp_tb_support .= '<td>'.$v_support_description.'</td>';
	$v_dsp_tb_support .= '<td>'.$arr_contact[$v_contact_id].'</td>';
	$v_dsp_tb_support .= '<td>'.$v_date_created.'</td>';
	$v_dsp_tb_support .= '<td>'.$v_username.'</td>';
	$v_dsp_tb_support .= '<td>'.$v_image_file.'</td>';
	$v_dsp_tb_support .= '<td align="center">
                                <a href="'.URL. $v_admin_key.'/'.$v_support_id.'/delete">Delete</a>
                            </td>';
	$v_dsp_tb_support .= '</tr>';
}
$v_dsp_tb_support .= '</table>';
?>