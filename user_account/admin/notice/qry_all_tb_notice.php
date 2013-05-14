<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;

add_class("cls_tb_company");

$cls_tb_company = new cls_tb_company($db);
$v_company_name='';

$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_notice->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_notice = $cls_tb_notice->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_notice = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_notice .= '<tr align="center" valign="middle">';
$v_dsp_tb_notice .= '<th>Ord</th>';
$v_dsp_tb_notice .= '<th>Title</th>';
$v_dsp_tb_notice .= '<th>Notice Company</th>';
$v_dsp_tb_notice .= '<th>Date Opened</th>';
$v_dsp_tb_notice .= '<th>Date Closed</th>';
$v_dsp_tb_notice .= '<th>User Creater</th>';
$v_dsp_tb_notice .= '<th>Description</th>';
$v_dsp_tb_notice .= '<th>&nbsp;</th>';
$v_dsp_tb_notice .= '</tr>';
$v_count = 1;

foreach($arr_tb_notice as $arr){
	$v_mongo_id = $cls_tb_notice->get_mongo_id();
	$v_notice_id = isset($arr['notice_id'])?$arr['notice_id']:0;
	$v_title = isset($arr['title'])?$arr['title']:'0';
	$v_notice_company = isset($arr['notice_company'])?$arr['notice_company']:0;
    if($v_notice_company!=0){
        $arr_notice_company = explode(",",$v_notice_company);
        for($i=0;$i<count($arr_notice_company);$i++){
            $v_company_name .="<p>".$cls_tb_company->select_scalar("company_name",array("company_id"=>(int)$arr_notice_company[$i])) ."</p>";
        }
    }
    else
        $v_company_name = "All Companies";

	$v_date_closed = isset($arr['date_closed'])?$arr['date_closed']:'';
	$v_description = isset($arr['description'])?$arr['description']:'';
    $v_date_opened = isset($arr['date_opened']) ?$arr['date_opened'] : '';
    $v_user_created = isset($arr['user_created']) ? $arr['user_created'] : '';

	$v_dsp_tb_notice .= '<tr align="left" valign="middle">';
	$v_dsp_tb_notice .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_notice .= '<td>'.$v_title.'</td>';
	$v_dsp_tb_notice .= '<td>'.$v_company_name.'</td>';
    $v_dsp_tb_notice .= '<td>'.$v_date_opened.'</td>';
	$v_dsp_tb_notice .= '<td>'.$v_date_closed.'</td>';
    $v_dsp_tb_notice .= '<td>'.$v_user_created.'</td>';
	$v_dsp_tb_notice .= '<td>'.$v_description.'</td>';
	$v_dsp_tb_notice .= '<td align="center"><a href="'.URL.$v_admin_key.'/'.$v_notice_id.'/edit">Edit</a> | <a class="confirm" href="'.URL.$v_admin_key.'/'.$v_notice_id.'/delete">Delete</a></td>';
	$v_dsp_tb_notice .= '</tr>';
}
$v_dsp_tb_notice .= '</table>';
?>