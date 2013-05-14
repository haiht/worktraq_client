<?php if(!isset($v_sval)) die();?>
<?php
$v_setting_id = isset($_GET['id'])?$_GET['id']:0;
$v_setting_name = "";
$v_setting_description = "";
$v_setting_type = 0;
$arr_option = array();

if(isset($_REQUEST['btn_update_settings'])){
    $v_setting_id = isset($_REQUEST['txt_setting_id']) ? $_REQUEST['txt_setting_id'] : 0;
    $v_setting_name = isset($_REQUEST['txt_setting_name']) ? $_REQUEST['txt_setting_name'] : '';
    $v_setting_type = isset($_REQUEST['txt_setting_type']) ? $_REQUEST['txt_setting_type'] : 0;
    $v_setting_description  = isset($_REQUEST['txt_setting_description']) ? $_REQUEST['txt_setting_description'] : '';

    $v_setting_name = trim($v_setting_name);
    $v_setting_name = strtolower($v_setting_name);
    $v_setting_name = str_replace(" ","",$v_setting_name);

    if($v_setting_id!=0){ //update
        $arr_where_clause = array('setting_id'=>(int)$v_setting_id);
        $arr_field =  array('setting_name','setting_type','setting_description');
        $arr_values = array($v_setting_name,$v_setting_type,$v_setting_description);
        $v_result = $cls_settings->update_fields($arr_field,$arr_values,$arr_where_clause);
        redir(URL.$v_admin_key);
    }
    else{
        $arr_option = array(array('id'=>0,'name'=>'---','key'=>'','status'=>0));
        $v_setting_id = $cls_settings->select_next('setting_id');
        $cls_settings->set_setting_id((int)$v_setting_id);
        $cls_settings->set_setting_name($v_setting_name);
        $cls_settings->set_setting_status(0);
        $cls_settings->set_setting_description($v_setting_description);
        $cls_settings->set_setting_type($v_setting_type);
        $cls_settings->set_setting_option($arr_option);
        $cls_settings->insert();
    }
    redir(URL.$v_admin_key.'/'.$v_setting_id.'/edit');
}
$arr_settings = $cls_all_settings->select_data(array('setting_id'=>(int)$v_setting_id));
foreach($arr_settings as $arr)
{
    $v_setting_id = isset($arr['setting_id']) ? $arr['setting_id'] : 0;
    $v_setting_name = isset($arr['setting_name']) ? $arr['setting_name'] : '';
    $v_setting_description = isset($arr['setting_description']) ? $arr['setting_description'] : '';
    $v_setting_type = isset($arr['setting_type']) ? $arr['setting_type'] : 0;
    $arr_option = isset($arr['option']) ? $arr['option'] : array();
}


?>