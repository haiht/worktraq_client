<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_color_id = 0;
$v_color_name = '';
$v_color_code_hex = '#FFFFFF';
$v_color_code = 'White';
$v_color_order = 0;
$v_color_status = 0;
if(isset($_POST['btn_submit_tb_color'])){
    $v_color_id = isset($_POST['txt_color_id'])?$_POST['txt_color_id']:0;
    $v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:'';
    if($v_mongo_id!='')
        $v_mongo_id = new MongoId($v_mongo_id);
    else
        $v_mongo_id = NULL;
    if(is_null($v_mongo_id)){
        $v_color_id = $cls_tb_color->select_next('color_id');
    }
    if($v_color_id<=0) $v_error_message.='+ Color ID is nagative!<br />';
    $cls_tb_color->set_color_id($v_color_id);

    $v_color_order = isset($_POST['txt_color_order'])?$_POST['txt_color_order']:0;
    settype($v_color_order, 'int');
    if($v_color_order<0) $v_color_order = $v_color_id;
    $cls_tb_color->set_color_order($v_color_order);

    $v_color_code = isset($_POST['txt_color_code'])?$_POST['txt_color_code']:'';
    $v_color_code = trim($v_color_code);
    if($v_color_code=='') $v_error_message.='Color code is empty!<br />';

    $v_color_code_hex = isset($_POST['txt_color_code_hex'])?$_POST['txt_color_code_hex']:'';
    $v_color_code_hex = trim($v_color_code_hex);
    if($v_color_code_hex=='') $v_error_message.='Color code hexa is empty!<br />';
    $v_color_status = isset($_POST['txt_color_status'])?0:1;
    $cls_tb_color->set_color_code($v_color_code);
    $cls_tb_color->set_color_code_hex($v_color_code_hex);
    $cls_tb_color->set_color_status($v_color_status);

    if(is_null($v_mongo_id)){
        $v_mongo_id = $cls_tb_color->insert();
        $v_result = is_object($v_mongo_id);
    }else{
        $v_result = $cls_tb_color->update(array('mongo_id'=>$v_mongo_id));
    }
    if($v_result) redir(URL.$v_admin_key);
}else{
	$v_color_id = isset($_GET['id'])?$_GET['id']:0;
    settype($v_color_id, 'int');
	if($v_color_id>0){
		//$v_mongo_id = new MongoID($v_mongo_id);
		$v_row = $cls_tb_color->select_one(array('color_id' => $v_color_id));
		if($v_row == 1){
            $v_mongo_id = $cls_tb_color->get_mongo_id();
			$v_color_id = $cls_tb_color->get_color_id();
			$v_color_name = $cls_tb_color->get_color_name();
			$v_color_code_hex = $cls_tb_color->get_color_code_hex();
            $v_color_code = $cls_tb_color->get_color_code();
		}
	}
}
?>