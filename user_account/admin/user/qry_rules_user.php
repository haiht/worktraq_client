<?php if(!isset($v_sval)) die();?>
<?php
$v_user_id =isset($_REQUEST['id'])?$_REQUEST['id']:0;
$v_user_info='';
$v_row = $cls_tb_user->select_one(array('user_id'=>(int)$v_user_id));
if($v_row==1){
    $arr_user_rule = $cls_tb_user->get_user_rule();
    $v_user_name = $cls_tb_user->get_user_name();
    $v_contact_id = $cls_tb_user->get_contact_id();
    $v_location_id = $cls_tb_user->get_location_id();
    $v_company_id = $cls_tb_user->get_company_id();

    $v_user_info = $v_user_name;
}


if(!isset($arr_user_rule) || !is_array($arr_user_rule)) $arr_user_rule = array();

$cls_tb_module = new cls_tb_module($db);


$arr_tb_module = $cls_tb_module->select(array('module_type'=>3));

$v_dsp_tb_rule = '<table class="grid_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_tb_rule .= '<tr valign="middle">';
$v_dsp_tb_rule .= '<th width="10px" align="center">
                        <input id="check_all" type="checkbox">
                    </th>';
$v_dsp_tb_rule .= '<th width="30px">Ord</th>';
$v_dsp_tb_rule .= '<th width="300px">Rule Title</th>';
$v_dsp_tb_rule .= '<th>Description</th>';
$v_dsp_tb_rule .= '</tr>';
$v_count = 1;

$arr_user_rule = $cls_tb_user->select_scalar('user_rule',array('user_id'=>(int)$v_user_id));
$v_tmp_module_menu = '';
$v_dsp_script = '';
$i = 0;
foreach($arr_tb_module as $arr){
    $v_module_menu = isset($arr['module_menu'])?$arr['module_menu']:'';
    $v_module_text = isset($arr['module_text'])?$arr['module_text']:'';
    $arr_module_rules = isset($arr['module_rules'])?$arr['module_rules']:array();
    $v_checked = '';

    if($v_tmp_module_menu!=$v_module_menu)
    {
        $v_tmp_module_menu=$v_module_menu;
        $v_dsp_tb_rule .= '<tr align="left" valign="middle">
                                <th colspan="6"><input id="check_all_menu" data-menu="'.$v_module_menu.'" type="checkbox" /> Rules for module: '.$v_module_text.'</th>
                            </tr>';
        $v_count=1;
    }


    $v_dsp_tb_rule .= '<tr align="left" valign="middle">';
    if(count($arr_module_rules)>0)
    {
        for($j=0; $j<count($arr_module_rules); $j++){
            $v_key = $arr_module_rules[$j]['key'];
            $v_description = htmlspecialchars($arr_module_rules[$j]['description']);
            $v_checked = isset($arr_user_rule[$v_module_menu][$v_key])?'checked="checked"':'';
            $v_dsp_tb_rule .= '<th><input '.$v_checked.' type="checkbox" data-menu="'.$v_module_menu.'" name="chk_rule_id" title="'.$v_description.'" value="'.$v_key.'" id="chk_rule_id"></th>';
            $v_dsp_tb_rule .= '<td align="right">'.($v_count++).'</td>';
            $v_dsp_tb_rule .= '<td>'.$v_key.'</td>';
            $v_dsp_tb_rule .= '<td>'.$v_description.'</td></tr>';
            if($v_checked!=''){
                $v_dsp_script .= "\nrule[{$i}] = new UserRule('{$v_module_menu}', '{$v_key}', '". addslashes($v_description)."', 1);";
                $i++;
            }
        }
    }

}
$v_dsp_tb_rule .='<tr>
                    <td colspan="4" align="center">
                        <input type="button" name="btn_submit_user_rule" id="btn_submit_user_rule" class="button" value="Submit Rule">
                    </td>
                </tr>';
$v_dsp_tb_rule .= '</table>';


?>