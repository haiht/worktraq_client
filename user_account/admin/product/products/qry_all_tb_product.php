<?php if(!isset($v_sval)) die();?>
<?php

if(!isset($_SESSION['where_clause_product'])) $_SESSION['where_clause_product']="";
$arr_where_clause=array();
if($_SESSION['where_clause_product']!=""){  $arr_where_clause  = $_SESSION['where_clause_product'];}

$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:ADMIN_ROWS_ONE_PAGE;
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?ADMIN_ROWS_ONE_PAGE:$v_num_row;

$v_search_product_sku = isset($_REQUEST['txt_product_sku']) ? $_REQUEST['txt_product_sku'] : (isset($arr_where_clause['product_sku'])? ftext($arr_where_clause['product_sku']) :'') ;
$v_search_company_id = isset($_REQUEST['txt_company_id']) ? $_REQUEST['txt_company_id'] : (isset($arr_where_clause['company_id'])? $arr_where_clause['company_id']:0);
$v_search_short_product = isset($_REQUEST['txt_short_product']) ? $_REQUEST['txt_short_product'] : (isset($arr_where_clause['short_description'])? ftext($arr_where_clause['short_description']):'');

$arr_product_tag = isset($_POST['txt_tag_id'])?$_POST['txt_tag_id']:array();
if(!is_array($arr_product_tag)) $arr_product_tag = array();
for($i=0; $i<count($arr_product_tag); $i++){
    $arr_product_tag[$i] = (int) $arr_product_tag[$i];
}

if($v_search_product_sku!='') $arr_where_clause['product_sku'] = new MongoRegex("/".(string)trim($v_search_product_sku)."/") ;
if($v_search_company_id!=0) $arr_where_clause['company_id'] = (int)$v_search_company_id;
if($v_search_short_product!='') $arr_where_clause['short_description'] =new MongoRegex("/".(string)trim($v_search_short_product)."/") ;
if(count($arr_product_tag)>0 ) $arr_where_clause['tag'] =  $arr_product_tag;

if(isset($_REQUEST['btn_product_cancel']))
{
    unset($_SESSION['where_clause_product']);
    unset($arr_where_clause);
    redir(URL.$v_admin_key);
}
if($v_search_product_sku!=''||$v_search_company_id!=0 )
$_SESSION['where_clause_product'] = $arr_where_clause;


$v_total_row = $cls_tb_product->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_product = $cls_tb_product->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");

$v_dsp_tb_product = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_tb_product .= '<tr align="center" valign="middle">';
$v_dsp_tb_product .= '<th>Ord</th>';
$v_dsp_tb_product .= '<th>Company</th>';
$v_dsp_tb_product .= '<th>Product Sku</th>';
$v_dsp_tb_product .= '<th>Short Description</th>';
$v_dsp_tb_product .= '<th>Image</th>';
$v_dsp_tb_product .= '<th>Tag</th>';
$v_dsp_tb_product .= '<th>Package Type</th>';
$v_dsp_tb_product .= '<th>Status</th>';
$v_dsp_tb_product .= '<th>&nbsp;</th>';
$v_dsp_tb_product .= '</tr>';
$v_count = $v_offset+1;

foreach($arr_tb_product as $arr){
    $v_mongo_id = $cls_tb_product->get_mongo_id();
    $v_product_id = isset($arr['product_id'])?$arr['product_id']:0;
    $v_product_sku = isset($arr['product_sku'])?$arr['product_sku']:'0';
    $v_short_description = isset($arr['short_description'])?$arr['short_description']:'';
    $v_long_description = isset($arr['long_description'])?$arr['long_description']:'';
    $v_product_detail = isset($arr['product_detail'])?$arr['product_detail']:'';
    $v_size_option = isset($arr['size_option'])?$arr['size_option']:0;
    $v_size_unit = isset($arr['size_unit'])?$arr['size_unit']:0;
    $v_image_option = isset($arr['image_option'])?$arr['image_option']:0;
    $v_image_file = isset($arr['image_file'])?$arr['image_file']:'';
    $v_saved_dir = isset($arr['saved_dir'])?$arr['saved_dir']:'';
    $v_image_desc = isset($arr['image_desc'])?$arr['image_desc']:'';
    $v_text_option = isset($arr['text_option'])?$arr['text_option']:0;
    $v_default_price = isset($arr['default_price'])?$arr['default_price']:0;
    $v_status = isset($arr['product_status'])?$arr['product_status']:0;
    $v_package_type = isset($arr['package_type'])?$arr['package_type']:0;
    $v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;

    $v_package_type = $cls_settings->get_option_name_by_id('package_type', $v_package_type);
    $v_company_name = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
    $v_company_code = $cls_tb_company->select_scalar('company_code', array('company_id'=>$v_company_id));
    $arr_tag = isset($arr['tag'])?$arr['tag']:array();
    $v_count_tag = sizeof($arr_tag);
    $v_list_tag = "";
    for($i=0;$i<$v_count_tag;$i++)
    {
        if($i==$v_count_tag-1)
            $v_list_tag .= $cls_tb_tag->select_scalar('tag_name', array("tag_id"=>(int)$arr_tag[$i]));
        else
            $v_list_tag .= $cls_tb_tag->select_scalar('tag_name', array("tag_id"=>(int)$arr_tag[$i])) .', ';
    }
    /*
    if(!is_dir('resources/'.$v_company_code.'/products/'.$v_product_id))
    {
        mkdir('resources/'.$v_company_code.'/products/'.$v_product_id);
        $v_product_dir_old = PRODUCT_IMAGE_DIR.DS.$v_company_code.DS.'products'.DS. $v_image_file;
        $v_product_dir_new = PRODUCT_IMAGE_DIR.DS.$v_company_code.DS.'products'.DS. $v_product_id .DS.$v_image_file;
        @copy($v_product_dir_old, $v_product_dir_new);

        for($i=0; $i<count($arr_product_image_size); $i++){
            $v_temp = $arr_product_image_size[$i];
            $v_product_dir_old = PRODUCT_IMAGE_DIR.DS.$v_company_code.DS.'products'.DS. $v_temp .'_'.$v_image_file;
            @unlink($v_product_dir_old);
        }
        @unlink(PRODUCT_IMAGE_DIR.DS.$v_company_code.DS.'products'.DS. $v_image_file);
    }
    */
    $v_status_name = $cls_settings->get_option_name_by_id('product_status',$v_status);
    $v_size_unit_name = $cls_settings->get_option_name_by_key('size_unit', $v_size_unit);
    $v_image_url = '';
    if($v_image_file!='')
    {
        if($v_saved_dir!=''){
            if(strrpos($v_saved_dir, '/')!==strlen($v_saved_dir)-1) $v_saved_dir.='/';
            if(file_exists($v_saved_dir.PRODUCT_IMAGE_THUMB.'_'.$v_image_file))
                $v_image_url = '<img src="'.$v_saved_dir.PRODUCT_IMAGE_THUMB.'_'.$v_image_file.'" title="'.$v_image_desc.'" />';
            else if(file_exists($v_saved_dir.$v_image_file))
                $v_image_url = '<img src="'.$v_saved_dir.$v_image_file.'" title="'.$v_image_desc.'" />';
        }else{
            $v_product_dir = PRODUCT_IMAGE_DIR.DS.$v_company_code.DS.'products'.DS;
            $v_product_file = PRODUCT_IMAGE_DIR.DS.$v_company_code.DS.'products'.DS.$v_image_file;
            if(file_exists($v_product_file)){
                $v_image_url = '<img src="'.URL.'resources/'.$v_company_code.'/products/'.$v_product_id.'/'.$v_image_file.'" title="'.$v_image_desc.'" />';
            }
        }
    }
    $v_dsp_tb_product .= '<tr align="left" valign="middle">';
    $v_dsp_tb_product .= '<td align="right">'.($v_count++).'</td>';
    $v_dsp_tb_product .= '<td>'.$v_company_name.'</td>';
    $v_dsp_tb_product .= '<td>'.$v_product_sku.'</td>';
    $v_dsp_tb_product .= '<td>'.$v_short_description.'</td>';
    $v_dsp_tb_product .= '<td class="product-image">'.$v_image_url.'&nbsp;</td>';
    $v_dsp_tb_product .= '<td>'.$v_list_tag.'</td>';
    $v_dsp_tb_product .= '<td>'.$v_package_type.'</td>';
    $v_dsp_tb_product .= '<td>'.$v_status_name.'</td>';

    $v_dsp_tb_product .= '<td align="center">
                            <a href="'.$v_admin_key.'/'.$v_product_id.'/edit'. ( $v_page==1?'':'/'.$v_page ).'">Edit</a> |';
    if($v_per_delete==1)
        $v_dsp_tb_product .= '<a class="confirm" href="'.$v_admin_key.'/'.$v_product_id.'/delete">Delete</a>';

    $v_dsp_tb_product .= '</td></tr>';
}
$v_dsp_tb_product .= '</table>';
?>