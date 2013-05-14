<?php if(!isset($v_sval)) die();?>
<?php
$v_area_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_area_id, 'int');
$v_result = $cls_tb_area->delete(array('area_id' => $v_area_id));
add_class('cls_tb_product_images');
$cls_image = new cls_tb_product_images($db, LOG_DIR);
if($v_result){
    $v_row = $cls_image->select_one(array('area_id'=>$v_area_id));
    if($v_row==1){
        $v_saved_dir = $cls_image->get_saved_dir();
        add_class('ManageFile','cls_file.php');
        $cls_file = new ManageFile($v_saved_dir, DS);
        $cls_file->remove_dir_all();
        $cls_image->delete(array('area_id'=>$v_area_id));
    }
}
redir(URL.$v_admin_key);
?>