<?php if (!isset($v_sval)) die(); ?>
<?php
add_class('cls_tb_rule');
$cls_tb_rule = new cls_tb_rule($db);
$cls_tb_setting = new cls_settings($db);
$v_company_id = isset($_REQUEST['id'])?$_REQUEST['id']:0;
$v_error_message = '';
if($v_company_id==0)
{
    $_SESSION['error_session'] ='Unknow Company!...';
    redir(URL.'admin/error');
}
$v_rule_list = (isset($_REQUEST['hdn_rule_list'])) ?$_REQUEST['hdn_rule_list'] :'';

/*Apply add modules */
if(isset($_REQUEST['btn_submit_user_rule']))
{
    $arr_rule_list =explode(',',$v_rule_list);
    $v_total = sizeof($arr_rule_list);
    $v_tmp_user_rule = '';
    if($v_total>0)
    {
        for($i=0;$i<$v_total;$i++)
        {
            $v_rule_key = $arr_rule_list[$i];
            if($v_rule_key!='')
                $v_tmp_user_rule .= $v_rule_key .',';
        }
        $cls_tb_company->update_field('modules',$v_tmp_user_rule,array("company_id"=>(int) $v_company_id));
    }
    redir(URL.$v_admin_key);
}
/*Apply add modules */

$v_temp_rule = '-1';
$arr_tb_rule = $cls_tb_rule->select(array('rule_comp'=>1));
$v_dsp_tb_rule ='<div id="simpleTooltip">Add modules for the company: <b> '.$cls_tb_company->select_scalar('company_name',array('company_id'=>(int)$v_company_id)).'</b></div><p class="break"></p>';


$v_dsp_tb_rule .= '<table class="grid_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_tb_rule .= '<tr valign="middle">';
$v_dsp_tb_rule .= '<th width="10px" align="center">
                        <input type="checkbox" onclick="check_all(\'chk_rule_id\',this.checked);add_to_list(\'chk_rule_id\',\'hdn_rule_list\')">
                    </th>';
$v_dsp_tb_rule .= '<th width="30px">Ord</th>';
$v_dsp_tb_rule .= '<th width="300px">Rule Title</th>';
$v_dsp_tb_rule .= '<th>Description</th>';
$v_dsp_tb_rule .= '</tr>';
$v_count = 1;

$v_user_rule = $cls_tb_company->select_scalar('modules',array('company_id'=>(int)$v_company_id));
$arr_setting = array();
foreach($arr_tb_rule as $arr){
    $v_rule_id = isset($arr['rule_id'])?$arr['rule_id']:0;
    $v_rule_title = isset($arr['rule_title'])?$arr['rule_title']:'';
    $v_rule_key = isset($arr['rule_key'])?$arr['rule_key']:'';
    $v_rule_type = isset($arr['rule_type'])?$arr['rule_type']:0;
    $v_rule_comp = isset($arr['rule_comp'])?$arr['rule_comp']:0;
    $v_rule_description = isset($arr['rule_description'])?$arr['rule_description']:'';
    $v_checked = '';

    if($v_temp_rule!=$v_rule_type)
    {
        if(!isset($arr_setting[$v_rule_type]))
            $arr_setting[$v_rule_type] = $cls_tb_setting->get_option_name_by_id('rule_type',$v_rule_type);

        $v_temp_rule = $v_rule_type;
        $v_dsp_tb_rule .= '<tr align="left" valign="middle">
                                <th colspan="6"> Order Type: '.$arr_setting[$v_rule_type].'</th>
                            </tr>';
    }
    if(strpos($v_user_rule,$v_rule_key)!== false) $v_checked = 'checked';

    if($v_rule_comp==1)
    {
        $v_dsp_tb_rule .= '<tr align="left" valign="middle">';
        $v_dsp_tb_rule .= '<th><input '.$v_checked.' type="checkbox" name="chk_rule_id" onclick="add_to_list(\'chk_rule_id\',\'hdn_rule_list\');" value="'.$v_rule_key.'" name="chk_rule_id"></th>';
        $v_dsp_tb_rule .= '<td align="right">'.($v_count++).'</td>';
        $v_dsp_tb_rule .= '<td>'.$v_rule_title.'</td>';
        $v_dsp_tb_rule .= '<td>'.$v_rule_description.'</td></tr>';
    }
}
$v_dsp_tb_rule .='<tr>
                    <td colspan="4" align="center">
                        <input type="submit" name="btn_submit_user_rule" id="btn_submit_user_rule" class="button" value="Add Modules for Company">
                    </td>
                </tr>';
$v_dsp_tb_rule .= '</table>';


?>