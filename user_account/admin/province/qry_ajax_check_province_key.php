<?php
if(!isset($v_sval)) die();?>
<?php
$v_province_key = isset($_POST['txt_province_key'])?$_POST['txt_province_key']:'';
$v_province_id = isset($_POST['txt_province_id'])?$_POST['txt_province_id']:'0';
settype($v_province_id, 'int');
$arr_return = array('error'=>0, 'message'=>'OK');

if($v_province_key!=''){

    if($cls_tb_province->count(array('province_key'=>strtoupper($v_province_key), 'province_id'=>array('$ne'=>$v_province_id)))>0){
        $arr_return = array('error'=>1, 'message'=>'Duplicate Province Key!');
    }
}else{
    $arr_return = array('error'=>2, 'message'=>'Lost data!');
}
echo json_encode($arr_return);
?>