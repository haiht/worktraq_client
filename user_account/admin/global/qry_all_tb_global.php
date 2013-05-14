<?php if(!isset($v_sval)) die();?>
<?php
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_global->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_global = $cls_tb_global->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_tb_global = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

$v_dsp_tb_global .= '<tr align="center" valign="middle">';
$v_dsp_tb_global .= '<th></th>';
$v_dsp_tb_global .= '<th>Name</th>';
$v_dsp_tb_global .= '<th>Description</th>';
$v_dsp_tb_global .= '<th>Value</th>';
$v_dsp_tb_global .= '</tr>';
$v_count = 1;



foreach($arr_tb_global as $arr){
	$v_mongo_id = $cls_tb_global->get_mongo_id();
	$v_global_id = isset($arr['global_id'])?$arr['global_id']:0;
	$v_global_key = isset($arr['global_key'])?$arr['global_key']:'';
	$v_global_name = isset($arr['global_name'])?$arr['global_name']:'';
	$v_global_description = isset($arr['global_description'])?$arr['global_description']:'';
	$v_global_value = isset($arr['global_value'])?$arr['global_value']:'';
	$v_setting_name = isset($arr['setting_name'])?$arr['setting_name']:'';
	$v_setting_key = isset($arr['setting_key'])?$arr['setting_key']:'';


    if(!isset($arr_option[$v_global_value])){
        $arr_option[$v_global_value][0] = $cls_settings->get_option_key_by_id('status',$v_global_value); //key
        $arr_option[$v_global_value][1] = $cls_settings->get_option_name_by_id('status',$v_global_value); //name
    }


	$v_dsp_tb_global .= '<tr align="left" valign="middle">';
	$v_dsp_tb_global .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_global .= '<td>'.$v_global_name.'</td>';
	$v_dsp_tb_global .= '<td>'.$v_global_description.'</td>';

    $v_dsp_global_value = '<div id="div_global_status_'.$v_global_id.'"> '.$arr_option[$v_global_value][1].' <img data="'.$v_global_id.'" rel="change_value" src="'. URL .'images/icons/gtk-edit.png"> </div>
                    <select global_id="'.$v_global_id.'" rel="global_status" id="sel_global_status_'.$v_global_id.'" name="sel_global_status_'.$v_global_id.'" style="display:none">
                        <option value="0" selected>--- Select ----</option>'.
                            $cls_settings->draw_option_by_id('status',0,$v_global_value).'
                    </select>';

	$v_dsp_tb_global .= '<td>'.$v_dsp_global_value.'</td>';
	$v_dsp_tb_global .= '</tr>';
}
$v_dsp_tb_global .= '</table>';
?>