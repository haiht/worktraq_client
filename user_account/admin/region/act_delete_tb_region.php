<?php if(!isset($v_sval)) die();?>
<?php
$v_region_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_region_id, 'int');
if($v_region_id>0){
	$v_result = $cls_tb_region->delete(array('region_id' => $v_region_id));
    if($v_result){
        $arr_location = $cls_tb_location->select(array('location_region'=>$v_region_id));
        foreach($arr_location as $arr){
            $v_location_id = $arr['location_id'];
            $cls_tb_location_log->update_field('close_date', new MongoDate(time()), array('location_id'=>$v_location_id, 'region_id'=>$v_region_id));
        }
        $cls_tb_location->update_field('location_region', 0, array('location_region'=>$v_region_id));
    }
}
$_SESSION['ss_tb_region_redirect'] = 1;
redir(URL.$v_admin_key);
?>