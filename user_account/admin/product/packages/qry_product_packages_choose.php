<?php
if(!isset($v_sval)) die();
?>
<?php
if(isset($_POST['txt_company_id'])){
    $v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
    $v_location_id = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:'0';
    if(isset($_SESSION['ss_package_choose_where_clause'])) unset($_SESSION['ss_package_choose_where_clause']);
}else{
    $v_company_id = isset($_COOKIE['ck_package_company'])?$_COOKIE['ck_package_company']:'0';
    $v_location_id = isset($_COOKIE['ck_package_location'])?$_COOKIE['ck_package_location']:'0';
}

$v_package_type = isset($_GET['id'])?$_GET['id']:'0';
$v_page = isset($_GET['txt_page'])?$_GET['txt_page']:'1';
$v_item_per_page = 10;

settype($v_package_type, 'int');
settype($v_company_id, 'int');
settype($v_location_id, 'int');
settype($v_page, 'int');
if($v_page<1) $v_page=1;

if($v_location_id>0 && $v_company_id>0)
    $arr_where = array('company_id'=>$v_company_id, 'location_id'=>$v_location_id);
else if($v_location_id<=0 && $v_company_id>0)
    $arr_where = array('company_id'=>$v_company_id);
else
    $arr_where = array();

$arr_where['package_type'] = $v_package_type;

if($v_package_type==0){//Single
    $arr_where['allow_single'] = 1;
}
$_SESSION['ss_package_choose_where_clause'] = serialize($arr_where);

$v_dsp_content = '';
$v_dsp_pagination = '';
if($v_package_type<1) $v_package_type=1;
if($v_package_type>3) $v_package_type = 3;
$v_package_type--;
//if($v_package_type==0){
    $v_total_items = $cls_tb_product->count($arr_where);
    $v_pages = ceil($v_total_items/$v_item_per_page);
    if($v_pages<1) $v_pages = 1;
    if($v_page>$v_pages) $v_page = $v_pages;
    $v_offset = ($v_page-1)*$v_item_per_page;

    $v_dsp_pagination = news_pagination($v_pages, $v_page, $v_admin_key.'/'.($v_package_type+1).'/choose', 4, '/', "");

    $arr_product = $cls_tb_product->select_limit($v_offset, $v_item_per_page, $arr_where);

    $i = 0;
    $v_tmp_company_code = '';
    $v_temp_company_id = 0;
    foreach($arr_product as $arr){
        $v_product_id = $arr['product_id'];
        $v_product_sku = $arr['product_sku'];
        $v_image_file = $arr['image_file'];
        $v_saved_dir = $arr['saved_dir'];
        $v_product_price = $arr['default_price'];
        $v_tmp_company_id = $arr['company_id'];
        $v_tmp_location_id = $arr['location_id'];
        if(strrpos($v_saved_dir,'/')!=(strlen($v_saved_dir)-1))
            $v_saved_dir .='/';
        $v_company_code = $v_saved_dir;
        /*
        if($v_tmp_company_id>0 && $v_tmp_company_id!=$v_temp_company_id){
            $v_company_code = $cls_tb_company->select_scalar('company_code',array('company_id'=>$v_tmp_company_id));
            if($v_company_code!=''){
                $v_company_code = RESOURCE_URL.$v_company_code.'/products/';
                $v_temp_company_id = $v_tmp_company_id;
                $v_tmp_company_code = $v_company_code;
            }
        }else{
            $v_tmp_company_id = $v_temp_company_id;
            $v_company_code = $v_tmp_company_code;
        }
        */
        //echo $v_company_code.'<br>';
        if($i==0)
            $v_dsp_content.='<tr align="center" valign="top">';
        else if($i%5==0)
            $v_dsp_content.='</tr></tr><tr align="center" valign="top">';
        $v_dsp_content.='<td width="20%"><img style="max-width:180px; max-height: 200px" src="'.$v_saved_dir. $v_image_file.'" /><br />';
        $v_dsp_content.='<label><input type="checkbox" data-type="'.$v_package_type.'" data-id="'.$v_product_id.'" data-name="'.$v_product_sku.'" data-price="'.$v_product_price.'" data-location="'.$v_tmp_location_id.'" data-image="'.$v_image_file.'" data-dir="'.$v_company_code.'" /> '.$v_product_sku.' ['.format_currency($v_product_price).']</label><br />';
        $v_dsp_content.='<input type="text" style="height:20px; width:30px; text-align: center;" value="1" /></td>';
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





//$v_dsp_company_draw = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
$v_company_name = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
if($v_company_name==''||$v_company_name==NULL) $v_company_name = '[Error?? Company Name missed!!!';
if($v_company_id>0)
    $arr_where = array('company_id'=>$v_company_id);
else
    $arr_where = array();
$v_dsp_location_draw = $cls_tb_location->draw_option('location_id', 'location_name', $v_location_id, $arr_where);
?>