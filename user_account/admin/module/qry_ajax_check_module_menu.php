<?php
if(!isset($v_sval)) die();?>
<?php
$v_module_menu = isset($_POST['txt_module_menu'])?$_POST['txt_module_menu']:'';
$v_module_id = isset($_POST['txt_module_id'])?$_POST['txt_module_id']:'0';
settype($v_module_id, 'int');
$arr_return = array('error'=>0, 'message'=>'OK');
if($v_module_menu!=''){
    $v_module_menu = strtolower(trim($v_module_menu));
    if($cls_tb_module->count(array('module_menu'=>$v_module_menu, 'module_id'=>array('$ne'=>$v_module_id)))>0){
        $arr_return['error'] = 2;
        $arr_return['message'] = 'Duplicate';
    }
}else{
    $arr_return['error'] = 1;
    $arr_return['message'] = 'Lost data';
}
echo json_encode($arr_return);
?>