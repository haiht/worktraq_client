<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_rule->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$v_temp_rule = '-1';
$arr_tb_rule = $cls_tb_rule->select_limit($v_offset,$v_num_row,$arr_where_clause,array('rule_type'=>1,'rule_comp'=>1));
$v_dsp_tb_rule = '<table class="grid_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_rule .= '<tr align="center" valign="middle">';
$v_dsp_tb_rule .= '<th>Ord</th>';
$v_dsp_tb_rule .= '<th>Function name</th>';
$v_dsp_tb_rule .= '<th>Rule Key</th>';
$v_dsp_tb_rule .= '<th>Apply to</th>';
$v_dsp_tb_rule .= '<th>Rule Menu</th>';
$v_dsp_tb_rule .= '<th>#</th>';
$v_dsp_tb_rule .= '</tr>';
$v_count = $v_offset+1;
$arr_setting = array();

foreach($arr_tb_rule as $arr){
	$v_mongo_id = $cls_tb_rule->get_mongo_id();
	$v_rule_id = isset($arr['rule_id'])?$arr['rule_id']:0;
	$v_rule_title = isset($arr['rule_title'])?$arr['rule_title']:'';
	$v_rule_type = isset($arr['rule_type'])?$arr['rule_type']:'';
	$v_rule_key = isset($arr['rule_key'])?$arr['rule_key']:'0';
	$v_rule_menu = isset($arr['rule_menu'])?$arr['rule_menu']:'';
    $v_rule_comp = isset($arr['rule_comp'])?$arr['rule_comp']:0;

    $v_dsp_rule_comp ='User';
    if($v_rule_comp==1) $v_dsp_rule_comp ='<b>Company</b>';

    if($v_temp_rule!=$v_rule_type)
    {
        if(!isset($arr_setting[$v_rule_type]))
            $arr_setting[$v_rule_type] = $cls_tb_setting->get_option_name_by_id('rule_type',$v_rule_type);

        $v_temp_rule = $v_rule_type;
        $v_dsp_tb_rule .= '<tr align="left" valign="middle">
                                <th colspan="6"> Group Type: '.$arr_setting[$v_rule_type].'</th>
                            </tr>';
    }


	$v_dsp_tb_rule .= '<tr align="left" valign="middle">';
	$v_dsp_tb_rule .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_rule .= '<td>'.$v_rule_title.'</td>';
    $v_dsp_tb_rule .= '<td>'.$v_rule_key.'</td>';
	$v_dsp_tb_rule .= '<td>'.$v_dsp_rule_comp.'</td>';
	$v_dsp_tb_rule .= '<td>'.$v_rule_menu.'</td>';
	$v_dsp_tb_rule .= '<td align="right"><a href="'.URL . $v_admin_key.'/'.$v_rule_id.'/edit">Edit</a> |
	                    <a class="confirm" href="'.URL . $v_admin_key.'/'.$v_rule_id.'/delete">Delete</a></td>';
	$v_dsp_tb_rule .= '</tr>';
}
$v_dsp_tb_rule .= '</table>';
?>