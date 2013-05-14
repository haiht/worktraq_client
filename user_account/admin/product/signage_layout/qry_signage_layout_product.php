<?php
if(!isset($v_sval)) die();
?>
<?php
$v_product_images_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_product_images_id, 'int');
$v_company_id = 0;
$v_location_id = 0;
$v_area_id = 0;
$v_row_title = '';
$v_root_location = 0;
if(isset($_SESSION['ss_location_area']))
{
    $arr_location_area = unserialize($_SESSION['ss_location_area']);
    $v_company_id = isset($arr_location_area['company_id'])?$arr_location_area['company_id']:'0';
    $v_location_id = isset($arr_location_area['location_id'])?$arr_location_area['location_id']:'0';
}

$v_root_location = $v_location_id;
$arr_images = $cls_tb_product_images->select_limit_fields(0,1,array('company_id', 'location_id', 'area_id'), array('product_images_id'=>$v_product_images_id));
foreach($arr_images as $arr){
    $v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
    $v_area_id = isset($arr['area_id'])?$arr['area_id']:0;
}
$v_root_location = $v_location_id;

if(isset($_POST['txt_product_location'])){
    $v_location_id = $_POST['txt_product_location'];
    setcookie('ck_product_location',$v_location_id, time()+300);
}else if(isset($_COOKIE['ck_product_location'])){
    $v_location_id = $_COOKIE['ck_product_location'];
    setcookie('ck_product_location',$v_location_id, time()+300);
}

$v_page = isset($_GET['txt_page'])?$_GET['txt_page']:'1';
$v_item_per_page = 10;

settype($v_company_id, 'int');
settype($v_location_id, 'int');
settype($v_root_location, 'int');
settype($v_area_id, 'int');

$v_company_name = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
$v_location_name = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_root_location));
$v_area_name = $cls_tb_area->select_scalar('area_name', array('area_id'=>$v_area_id));

$v_row_title = '<u><b>Company:</b></u> '.(($v_company_name!='' && $v_company_name!=NULL)?$v_company_name:'[Missing]');
$v_row_title .= ' <span style="color:blue">&raquo;</span> <u><b>Location:</b></u> '.(($v_location_name!='' && $v_location_name!=NULL)?$v_location_name:'[Missing]');
$v_row_title .= ' <span style="color:blue">&raquo;</span> <u><b>Area:</b></u> '.(($v_area_name!='' && $v_area_name!=NULL)?$v_area_name:'[Missing]');


settype($v_page, 'int');
if($v_page<1) $v_page=1;

if($v_location_id>0 && $v_company_id>0)
    $arr_where = array('company_id'=>$v_company_id, 'location_id'=>$v_location_id);
else if($v_location_id<=0 && $v_company_id>0)
    $arr_where = array('company_id'=>$v_company_id);
else
    $arr_where = array();

$v_dsp_content = '';
$v_dsp_pagination = '';
//if($v_package_type==0){


$v_total_items = $cls_tb_product->count($arr_where);
$v_pages = ceil($v_total_items/$v_item_per_page);
if($v_pages<1) $v_pages = 1;
if($v_page>$v_pages) $v_page = $v_pages;
$v_offset = ($v_page-1)*$v_item_per_page;

$v_dsp_pagination = news_pagination($v_pages, $v_page, $v_admin_key.'/'.$v_product_images_id.'/product', 4, '/', "");

$arr_product = $cls_tb_product->select_limit($v_offset, $v_item_per_page, $arr_where);

$i = 0;
$v_tmp_company_code = '';
$v_list_images = '';
$v_temp_company_id = 0;
foreach($arr_product as $arr){
    $v_product_id = $arr['product_id'];
    $v_product_sku = $arr['product_sku'];
    $v_image_file = $arr['image_file'];
    $v_saved_dir = $arr['saved_dir'];
    $v_product_price = $arr['default_price'];
    $v_package_type = $arr['package_type'];

    $v_package_name = $cls_settings->get_option_name_by_id('package_type', $v_package_type);

    if(strrpos($v_saved_dir,'/')!==strlen($v_saved_dir)-1) $v_saved_dir .='/';

    $v_dir = $v_saved_dir.PRODUCT_IMAGE_THUMB.'_'. $v_image_file;

    if(!file_exists($v_dir)) $v_dir = $v_saved_dir. $v_image_file;



    if($i==0)
        $v_dsp_content.='<tr align="center" valign="top">';
    else if($i%5==0)
        $v_dsp_content.='</tr></tr><tr align="center" valign="top">';
    $v_list_images .= ($v_list_images!=''?',':''). "'".$v_dir."'";
    $v_dsp_content.='<td width="20%"><img style="max-width:180px; max-height: 200px" src="'.$v_dir.'" /><br />';
    $v_dsp_content.='<label><input type="checkbox" data-type="'.$v_package_type.'" data-id="'.$v_product_id.'" data-name="'.$v_product_sku.'" data-price="'.$v_product_price.'" data-image-name="'.$v_image_file.'" data-image-url="'.$v_dir.'" /> '.$v_product_sku.' <br /> '. $v_package_name. ' <br />['.format_currency($v_product_price).']</label><br />';
    $i++;
}
//echo 'I: '.$i.'<br>';
if($i % 5 != 0){
    $i = 5 - ($i % 5);
    while($i>0){
        $v_dsp_content.='<td>&nbsp;</td>';
        $i--;
    }
}
if($v_dsp_content!=''){
    $v_dsp_content = '<table border="1" class="grid_table" cellpadding="3" cellspacing="0" width="100%">'.$v_dsp_content.'</tr></table>';
}

$v_dsp_location_draw = $cls_tb_location->draw_option('location_id', 'location_name', $v_location_id);
?>