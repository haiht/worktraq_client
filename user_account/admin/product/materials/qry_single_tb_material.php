<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_material_id = 0;
$v_material_name = '';
$v_material_status = 0;
$arr_material_option = array();
$v_material_status = 0;
$v_size_option = 0;
$v_two_sided_print = 0;
$v_description = '';
$v_dsp_unit_option = '';
$v_dsp_color_option = '';
$v_material_type = 0;

if(isset($_POST['btn_submit_tb_material'])){
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='')
        $v_mongo_id = new MongoID($v_mongo_id);
    else
        $v_mongo_id = NULL;
	$cls_tb_material->set_mongo_id($v_mongo_id);
	$v_material_id = isset($_POST['txt_material_id'])?$_POST['txt_material_id']:$v_material_id;
	$v_material_id = (int) $v_material_id;
	if($v_material_id<=0) {
        $v_material_id = $cls_tb_material->select_next('material_id');
    }
    if($v_material_id<=0) $v_error_message.='+ Can not get next id.<br />';
	$cls_tb_material->set_material_id($v_material_id);
	$v_material_name = isset($_POST['txt_material_name'])?$_POST['txt_material_name']:$v_material_name;
	$v_material_name = trim($v_material_name);
	if($v_material_name=='') $v_error_message .= 'Material Name is empty!<br />';
	$cls_tb_material->set_material_name($v_material_name);
	$v_description = isset($_POST['txt_description'])?$_POST['txt_description']:$v_description;
	$v_description = trim($v_description);
	$cls_tb_material->set_description($v_description);
	
	$v_material_type = isset($_POST['txt_material_type']) ? $_POST['txt_material_type'] : 0;
	$cls_tb_material->set_material_type($v_material_type);	
	
    $v_two_sided_print = isset($_POST['txt_two_sided_print'])?1:0;
    $cls_tb_material->set_two_sided_print($v_two_sided_print);

    $v_material_option = isset($_POST['txt_hidden_material_option'])?$_POST['txt_hidden_material_option']:'';
    if($v_material_option!=''){
        $v_material_option = stripcslashes($v_material_option);
        $arr_material_option = json_decode($v_material_option, true);
    }
    if(!is_array($arr_material_option)) $arr_material_option = array();
    for($i=0; $i<count($arr_material_option);$i++){
        if(isset($arr_material_option[$i]['del'])) unset($arr_material_option[$i]['del']);
        if($v_two_sided_print==0) $arr_material_option[$i]['sided'] = 0;
    }
    $cls_tb_material->set_material_option($arr_material_option);
    $cls_tb_material->set_status(isset($_POST['txt_material_status'])?0:1);
    $cls_tb_material->set_size_option(isset($_POST['txt_size_option'])?1:0);



	if($v_error_message==''){
		if(is_null($v_mongo_id)){
			$v_mongo_id = $cls_tb_material->insert();
            //die('INS: '.$v_error_message);
            $v_result = is_object($v_mongo_id);
        }else{
			$v_result = $cls_tb_material->update(array('material_id' => $v_material_id));
            //die('UPD: '.$v_error_message);
        }
		if($v_result) redir(URL.$v_admin_key);
	}//else echo ;

}else{
	$v_material_id = isset($_GET['id'])?$_GET['id']:0;
    settype($v_material_id, 'int');
	if($v_material_id>0){
		//$v_mongo_id = new MongoID($v_mongo_id);
		$v_row = $cls_tb_material->select_one(array('material_id' => $v_material_id));
		if($v_row == 1){
            $v_mongo_id = $cls_tb_material->get_mongo_id();
            $v_material_id = $cls_tb_material->get_material_id();
            $v_material_name = $cls_tb_material->get_material_name();
            $v_material_type = $cls_tb_material->get_material_type();
            $v_material_status = $cls_tb_material->get_status();
            $v_size_option = $cls_tb_material->get_size_option();
            $v_two_sided_print = $cls_tb_material->get_two_sided_print();
            $arr_material_option = $cls_tb_material->get_material_option();
            $v_description = $cls_tb_material->get_description();
		}
	}
}
$v_dsp_unit_option = $cls_settings->draw_option_by_key('size_unit', 0, '');
$v_dsp_color_option = $cls_tb_color->draw_option('color_code', 'color_name','');
$v_dsp_option = '';
$v_dsp_script = "\nvar opt = new Array();";
for($i=0; $i<count($arr_material_option);$i++){
    $v_color = $arr_material_option[$i]['color'];
    $v_thick = $arr_material_option[$i]['thick'];
    $v_unit = $arr_material_option[$i]['unit'];
    $v_status = isset($arr_material_option[$i]['status'])?$arr_material_option[$i]['status']:0;
    $v_sided = isset($arr_material_option[$i]['sided'])?$arr_material_option[$i]['sided']:0;
    $v_data = $v_color.'-'.$v_thick.'-'.$v_unit;
    $v_dsp_option .= '<p style="margin:1px; border: 1px solid #CCCCCC;padding:4px; width: 500px;"><img style="cursor:pointer" src="'.URL.'images/icons/delete.png" data-option="'.$v_data.'" id="img_action" title="Remove this option" />&nbsp;<label><input type="checkbox" data-option="'.$v_data.'" id="txt_option_status"'.($v_status==0?' checked="checked"':'').' />Active</label>';
    $v_dsp_option .= '&nbsp;&nbsp;&nbsp;<label><input type="checkbox" id="txt_two_sided" data-option="'.$v_data.'"'.($v_two_sided_print==0?' disabled="disabled"':($v_sided==1?' checked="checked"':'')).' />Two-sided print</label>';
    $v_dsp_option .= '&nbsp;&nbsp;&nbsp;&rarr;&nbsp;&nbsp;&nbsp;<span>'.$v_thick.' '.$v_unit.' - '.$v_color.'</span></p>';
    $v_dsp_script .= "\nopt[".$i."] = new Option('{$v_color}', {$v_thick},'{$v_unit}',{$v_sided}, {$v_status});";
}

?>