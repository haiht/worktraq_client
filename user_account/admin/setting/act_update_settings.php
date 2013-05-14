<?php if(!isset($v_sval)) die();?>
<?php
$v_setting_id = isset($_REQUEST['txt_setting_id']) ? $_REQUEST['txt_setting_id'] : 0;
$v_option_id = isset($_REQUEST['txt_option_id']) ? $_REQUEST['txt_option_id'] : 0;
$v_count_option = isset($_REQUEST['txt_count_option']) ? $_REQUEST['txt_count_option'] : 0;
$v_option_key = isset($_REQUEST['txt_name_key']) ? $_REQUEST['txt_name_key'] : '---';
$v_option_name = isset($_REQUEST['txt_name_option']) ? $_REQUEST['txt_name_option'] : '---';
$v_act_settings =isset($_REQUEST['txt_action']) ? $_REQUEST['txt_action'] : '';
$arr_return = array('error'=>0, 'message'=>'', 'data'=>'');
$v_data = '';
$v_error= 0;
/*Check */
if($v_option_key=='' || $v_option_name=='')
{
    $arr_return = array('error'=>0, 'message'=>'The name and key must be data, not blank','data'=>'');
    $v_error++;
}

/*Update */
if($v_act_settings=='update' && $v_error==0)
{
    $arr_where_clause = array('setting_id'=>(int)$v_setting_id, 'option.id'=>(int)$v_option_id);
    $arr_field =  array('option.$.name','option.$.key');
    $arr_values = array($v_option_name,$v_option_key);

    $v_option_key = strtolower($v_option_key);
    $v_option_key = str_replace(" ","_",$v_option_key);

    $v_result = $cls_settings->update_fields($arr_field,$arr_values,$arr_where_clause);
    if($v_result==true){
        $v_data = '<b>'.$v_option_name.'</b> <img data="'.$v_option_id.'" rel="change_dps" src="'. URL .'images/icons/gtk-edit.png">';
        $arr_return = array('error'=>1, 'message'=>'', 'data'=>$v_data );
    }
    else
        $arr_return = array('error'=>0, 'message'=>'Unknow Error---', 'data'=>'');
}

if($v_act_settings=='add' && $v_error==0)
{
    $arr_option = $cls_settings->select(array('setting_id'=>(int)$v_setting_id));
    $arr_option = array_merge($arr_option,array(array('id'=>(int)$v_count_option ,'name'=>'----','key'=>'-----','status'=>0)));

    $arr_where_clause = array('setting_id'=>(int)$v_setting_id);
    $arr_field =  array('option');
    $arr_values = array($arr_option);
    $v_result = $cls_settings->update_fields($arr_field,$arr_values,$arr_where_clause);
    if($v_result==true){
        $v_data ='';
        $arr_return = array('error'=>1, 'message'=>'', 'data'=>$v_data );
    }else{
        $arr_return = array('error'=>0, 'message'=>'Unknow Error---', 'data'=>'' );
    }
}

die(json_encode($arr_return));
?>