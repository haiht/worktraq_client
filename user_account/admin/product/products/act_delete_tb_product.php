<?php if(!isset($v_sval)) die();?>
<?php
add_class('ManageFile','cls_file.php');
$v_product_id = isset($_GET['id'])?$_GET['id']:0;
settype($v_product_id, 'int');
if($v_product_id>0){
    $v_saved_dir = $cls_tb_product->select_scalar('saved_dir', array('product_id'=>$v_product_id));
    $cls_tb_product->delete(array('product_id' =>(int) $v_product_id));
    if($v_saved_dir!=''){
        if(strrpos($v_saved_dir, '/')!==strlen($v_saved_dir)-1) $v_saved_dir.='/';
        $v_saved_dir .= $v_product_id;
        if(file_exists($v_saved_dir) && is_dir($v_saved_dir)){
            $cls_file = new ManageFile($v_saved_dir);
            $cls_file->remove_dir_all();
        }
    }
}
$_SESSION['ss_tb_product_redirect'] = 1;
redir(URL.$v_admin_key);
?>