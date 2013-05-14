<?php
if(!isset($v_sval)) die();
?>
<?php
$v_root_dir = ROOT_DIR.DS.'user_account';
$v_module_root = isset($_POST['txt_module_root'])?$_POST['txt_module_root']:'';
$v_module_dir = isset($_POST['txt_module_dir'])?$_POST['txt_module_dir']:'';

$arr_module_index = array();
$arr_module_index[] = array(
    'file_value'=>'',
    'file_text'=>'--------'
);


$arr_return = array('error'=>0, 'message'=>'OK', 'index'=>array());
if($v_module_dir!='' && $v_module_root!=''){
    $v_dir = $v_root_dir.DS.$v_module_root.DS.$v_module_dir;
    if(file_exists($v_dir)){
        $v_handle = opendir($v_dir);
        if($v_handle){
            while(($file = readdir($v_handle))!==false){
                if($file!='.' && $file!='..'){
                    if(strlen($file)>4){
                        if(is_file($v_dir.DS.$file)){
                            if(strtolower(substr($file, strlen($file)-4))=='.php'){
                                $arr_module_index[] = array(
                                    'file_value'=>$file,
                                    'file_text'=>$file
                                );
                            }
                        }
                    }
                }
            }
        }
    }
}else{
    $arr_return['error'] = 1;
    $arr_return['message'] = 'Empty data!';
}
$arr_return['index'] = $arr_module_index;
echo json_encode($arr_return);
?>