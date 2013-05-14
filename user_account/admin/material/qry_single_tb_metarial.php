<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_material_id = 0;
$v_material_name = '';
$v_material_description = '';
if(isset($_POST['btn_submit_tb_metarial'])){

}else{
	$v_mongo_id = isset($_GET['txt_mongo_id'])?$_GET['txt_mongo_id']:NULL;
	if(!is_null($v_mongo_id)){
		$v_mongo_id = new MongoID($v_mongo_id);
		$v_row = $cls_tb_metarial->select_one(array('_id' => $v_mongo_id));
		if($v_row == 1){
			$v_material_id = $cls_tb_metarial->get_material_id();
			$v_material_name = $cls_tb_metarial->get_material_name();
			$v_material_description = $cls_tb_metarial->get_material_description();
		}
	}
}
?>