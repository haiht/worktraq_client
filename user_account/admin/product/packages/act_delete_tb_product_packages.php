<?php if(!isset($v_sval)) die();?>
<?php
$v_package_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_package_id, 'int');
if($v_package_id>0){
    $v_row = $cls_tb_product_packages->select_one(array('package_id'=>$v_package_id));
    if($v_row==1){

        $v_package_image = $cls_tb_product_packages->get_package_image();
        $v_saved_dir = $cls_tb_product_packages->get_saved_dir();
        add_class('ManageFile','cls_file.php');
        $cls_file = new ManageFile($v_saved_dir, DS);
        $cls_file->remove_dir_all($v_saved_dir);
        /*
        for($i=0; $i<count($arr_product_image_size); $i++){
            $v_width = $arr_product_image_size[$i];
            $v_dir = $v_saved_dir.DS.$v_width.'_'.$v_package_image;
            if(file_exists($v_dir)) @unlink($v_dir);
        }
        $v_dir = $v_saved_dir.DS.$v_package_image;
        if(file_exists($v_dir)) @unlink($v_dir);
        */
    }
    $cls_tb_product_packages->delete(array('package_id' => $v_package_id));
}
redir(URL.$v_admin_key);
?>