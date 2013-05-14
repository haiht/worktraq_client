<?php
if(!isset($v_sval)) die();
?>
<?php
$v_upload_url = '';
$v_upload_dir = '';
$v_area_id = 0;

$v_area_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_area_id,'int');
$v_allow = 0;
$v_company_id = 0;
$v_location_id = 0;
if($v_area_id>0){
    $v_row = $cls_tb_area->select_one(array('area_id'=>$v_area_id));
    if($v_row==1){
        $v_company_id = $cls_tb_area->get_company_id();
        $v_location_id = $cls_tb_area->get_location_id();
        $v_allow = 1;

        //$_SESSION['ss_location_area'] = serialize(array('company_id'=>$v_company_id, 'location_id'=>$v_location_id));

        $v_company_code = $cls_tb_company->select_scalar('company_code', array('company_id'=>$v_company_id));
        if($v_company_code!=''){
            $v_upload_url = URL.$v_admin_key.'/'.$v_area_id.'/upload';
            $v_upload_dir = 'resources/'.$v_company_code;
            $v_flag = file_exists($v_upload_dir) || mkdir($v_upload_dir);
            if($v_flag){
                $v_upload_dir .= '/signage_layout';
                $v_flag = file_exists($v_upload_dir) || mkdir($v_upload_dir);
            }
            if($v_flag){
                $v_upload_dir.='/'.$v_area_id;
                $v_flag = file_exists($v_upload_dir) || mkdir($v_upload_dir);
            }
            if($v_flag) $v_upload_dir.='/';
        }
    }
}

$v_dsp_list_images = '';
//$v_upload_url = URL.$v_admin_key.'/'.$v_product_id.'/upload';
$v_change_url = URL.$v_admin_key.'/'.$v_area_id.'/cimages';

?>