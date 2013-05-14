<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_thickness_id = 0;
$v_thickness_name = '';
$v_thickness_size = '';
$v_thickness_type = '';
if(isset($_POST['btn_submit_tb_thickness'])){

}else{
	$v_mongo_id = isset($_GET['txt_mongo_id'])?$_GET['txt_mongo_id']:NULL;
	if(!is_null($v_mongo_id)){
		$v_mongo_id = new MongoID($v_mongo_id);
		$v_row = $cls_tb_thickness->select_one(array('_id' => $v_mongo_id));
		if($v_row == 1){
			$v_thickness_id = $cls_tb_thickness->get_thickness_id();
			$v_thickness_name = $cls_tb_thickness->get_thickness_name();
			$v_thickness_size = $cls_tb_thickness->get_thickness_size();
			$v_thickness_type = $cls_tb_thickness->get_thickness_type();
		}
	}
}
?>