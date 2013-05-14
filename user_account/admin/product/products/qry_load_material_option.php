<?php
if(!isset($v_sval)) die();
?>
<?php
$v_material_id = isset($_POST['txt_material_id'])?$_POST['txt_material_id']:'0';
settype($v_material_id, 'int');

$arr_ret = array('error'=>0, 'message'=>'', 'option'=>array());
if($v_material_id>0){
    //add_class('cls_tb_material');
    //$cls_material = new cls_tb_material($db, LOG_DIR);
    $arr_material_option = $cls_tb_material->select_scalar('material_option', array('material_id'=>$v_material_id, 'status'=>0, '$where'=>'this.material_option.length>0'));
    if(!is_null($arr_material_option)){
        if(is_array($arr_material_option)){
            $arr_data = array();
            for($i=0; $i<count($arr_material_option);$i++){
                $v_color_code = $arr_material_option[$i]['color'];
                $v_thick = $arr_material_option[$i]['thick'];
                $v_unit = $arr_material_option[$i]['unit'];
                $v_status = $arr_material_option[$i]['status'];
                if($v_status==0){
                    $arr_data[] = array(
                        'thick'=>$v_thick
                        ,'unit_code'=>$v_unit
                        ,'unit_name'=>$cls_settings->get_option_name_by_key('size_unit',$v_unit)
                        ,'color_code'=>$v_color_code
                        ,'color_name'=>$v_color_code
                    );
                }
            }
            $arr_ret['option'] = $arr_data;
        }else{
            $arr_ret['error'] = 3;
            $arr_ret['message'] = 'Error access data';
        }
    }else{
        $arr_ret['error'] = 2;
        $arr_ret['message'] = 'None option for this material';
    }
}else{
    $arr_ret['error'] = 1;
    $arr_ret['message'] = 'Negative material\'s ID';
}
die(json_encode($arr_ret));
?>