<?php if (!isset($v_sval)) die(); ?>
<?php
$v_slider_url = RESOURCE_URL.$_SESSION['company_code'].'/imgages/';
require 'classes/cls_tb_tag.php';
require 'classes/cls_tb_product.php';
require 'classes/cls_tb_product_images.php';
require 'classes/cls_tb_order.php';
$tpl_content = new Template('dsp_catalogue.tpl',$v_dir_templates);

$cls_tb_order = new cls_tb_order($db);
$cls_tb_product_images = new cls_tb_product_images($db);

$cls_tb_tag = new cls_tb_tag ($db,LOG_DIR);
$cls_tb_product = new cls_tb_product ($db,LOG_DIR);

$arr_where_clause = array();
$v_tag_check=0;
$v_product_tag_all="";
//=================
$v_company_id = (int) $_SESSION['company_id'];
$arr_tag  = $cls_tb_tag->select(array("company_id"=>$v_company_id));
$v_tag = '';
$v_tag_all='';
$arr_tag_id=array();
?>
<?php
if(isset($_POST['btn_product_search']) || isset($_POST['txt_product_search']) )
{
    $v_product_tag_all = isset($_POST['txt_product_tag_all'])?1:0;
    $v_product_search = isset($_POST['txt_product_search_input'])?$_POST['txt_product_search_input']:'';
    $arr_product = array();
    if($v_product_search!=''){
        $arr_search_where = array('company_id'=>$v_company_id);
        $arr_tag = $cls_tb_tag->select($arr_search_where);
        foreach($arr_tag as $arr){
            if(strpos(strtolower($arr['tag_name']), strtolower($v_product_search))!==false)
                $arr_product[] = (int) $arr['tag_id'];
        }
    }
    if($v_product_tag_all!=1){
        $arr_product_tag = isset($_POST['rd_search_tags'])?$_POST['rd_search_tags']:array();
        if(!is_array($arr_product_tag)) $arr_product_tag = array();
        for($i=0; $i<count($arr_product_tag); $i++){
            $arr_product[] = (int) $arr_product_tag[$i];
            $arr_tag_id[] = $arr_product_tag[$i];
        }
    }
    if($v_product_search=='')
    {
        if(count($arr_product)>0){
            $arr_where_clause = array('product_status'=>3,'tag'=>array('$in'=>$arr_product), 'company_id'=>$v_company_id);
        }
        else{
            $arr_where_clause = array('product_status'=>3, 'company_id'=>$v_company_id);
        }
    }else
    {
        if(count($arr_product)>0){
            $arr_where_clause = array('product_status'=>3,'$or'=>array(array('tag'=>array('$in'=>$arr_product)), array('short_description'=>new MongoRegex('/'.$v_product_search.'/i'))), 'company_id'=>$v_company_id);
        }

        else
            $arr_where_clause = array('product_status'=>3,'short_description'=>new MongoRegex('/'.$v_product_search.'/i'), 'company_id'=>$v_company_id);
    }
    $_SESSION['ss_product_tag'] = serialize(array('where_clause'=>$arr_where_clause, 'product_search'=>$v_product_search, 'tag_id'=>$arr_tag_id, 'tag_all'=>$v_product_tag_all));
}
else
{
    if(isset($_SESSION['ss_product_tag'])){
        $arr_search = unserialize($_SESSION['ss_product_tag']);
        if(is_array($arr_search)){
            $arr_where_clause = $arr_search['where_clause'];
            $v_product_search = $arr_search['product_search'];
            $arr_tag_id = $arr_search['tag_id'];
            $v_product_tag_all = $arr_search['tag_all'];
        }
    }else{
        $arr_where_clause = array('product_status'=>3, 'company_id'=>$v_company_id);
    }
}
foreach($arr_tag as $arr){
    $v_checked_tag='';

    $tpl_content_tag = new Template('dsp_catalogue_tag.tpl',$v_dir_templates);
    $v_tag_id = isset($arr['tag_id']) ?$arr['tag_id'] : 0;
    $v_tag_name = isset($arr['tag_name']) ?$arr['tag_name'] :'';
    if($v_product_tag_all==1)
    {
        $v_tag_all='checked="checked"';
        $v_checked_tag='';
    }
    else if(isset($arr_product_tag) && is_array($arr_product_tag) && in_array($v_tag_id,$arr_product_tag))
    {
        $v_checked_tag='checked="checked"';
        $v_tag_all ='';
    }
    $tpl_content_tag->set('TAG_ID',$v_tag_id);
    $tpl_content_tag->set('TAG_NAME',$v_tag_name);
    $tpl_content_tag->set('SELECT',$v_checked_tag);
    $arr_tag_list [] = $tpl_content_tag;
}
$v_page = isset($_REQUEST['txt_page'])?$_REQUEST['txt_page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:PRODUCT_ROWS_ONE_PAGE;
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?PRODUCT_ROWS_ONE_PAGE:$v_num_row;
$v_total_row = $cls_tb_product->count($arr_where_clause);

$v_total_num_row = count($v_total_row);
$v_total_pages = ceil($v_total_row /$v_num_row);
if($v_total_pages <= 0) $v_total_pages = 1;
if($v_total_pages<$v_page) $v_page = $v_total_pages;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_tb_product = $cls_tb_product->select($arr_where_clause);
$tag = array();
$products = array();
$products = iterator_to_array($arr_tb_product);
foreach($products as $key =>$val ) {
    if (isset($val['tag']))  {
        if (count($val['tag']) >0) {
            asort($val['tag']);
            $products[$key] = $val;
            $tag[$key] = $val['tag'][0];
        } else {
            $tag[$key] = 1000000;
        }
    } else {
        $tag[$key] = 1000000;
    }
}
unset($arr_tb_product);
$arr_tb_product = array();
asort($tag);
foreach($tag as $key => $val) {
    $arr_tb_product[] = $products[$key];
}
for ($index = $v_offset; $index < $v_offset+$v_num_row && $index < count($arr_tb_product); $index=$index+1 )
{
    $tpl_product_list = new Template('dsp_catalogue_product_list.tpl',$v_dir_templates);
    $arr_p_list = $arr_tb_product[$index];
    $v_mongo_id = $cls_tb_product->get_mongo_id();
    $v_product_id = isset($arr_p_list['product_id'])?$arr_p_list['product_id']:0;
    $v_product_sku = isset($arr_p_list['product_sku'])?$arr_p_list['product_sku']:'';
    $v_short_description = isset($arr_p_list['short_description'])?$arr_p_list['short_description']:'';
    $v_long_description = isset($arr_p_list['long_description'])?$arr_p_list['long_description']:'';
    $v_product_detail = isset($arr_p_list['product_detail'])?$arr_p_list['product_detail']:'';
    $v_size_height = isset($arr_p_list['size_height'])?$arr_p_list['size_height']:0;
    $v_size_dept = isset($arr_p_list['size_dept'])?$arr_p_list['size_dept']:0;
    $v_image_option = isset($arr_p_list['image_option'])?$arr_p_list['image_option']:0;
    $v_image_file = isset($arr_p_list['image_file'])?$arr_p_list['image_file']:'';
    $v_default_price = isset($arr_p_list['default_price'])?$arr_p_list['default_price']:0;
    $v_status = isset($arr_p_list['product_status'])?$arr_p_list['product_status']:0;
    $v_company_id = isset($arr_p_list['company_id'])?$arr_p_list['company_id']:0;
    $v_location_id = isset($arr_p_list['location_id'])?$arr_p_list['location_id']:0;
    $v_allow_single = isset($arr_p_list['allow_single'])?$arr_p_list['allow_single']:0;
    $v_saved_dir = isset($arr_p_list['saved_dir'])?$arr_p_list['saved_dir']:'resources/'.$_SESSION['company_code'].'/products/'.$v_product_id.'/';
    if(strrpos($v_saved_dir,'/')!==strlen($v_saved_dir)-1) $v_saved_dir.='/';
    $v_product_img ='<img src="images/product_default.jpg" title="Product sample - Missing image" />';
    if(file_exists($v_saved_dir .  $v_image_file))
        $v_product_img = '<img style="	min-width:50px;max-width:203px; max-height:145px " alt="'.htmlentities($v_short_description).'" src="'.URL.$v_saved_dir. $v_image_file.'"/>';
    $v_session_order_id = isset($_SESSION['order_id'])?$_SESSION['order_id']:'0';
    settype($v_session_order_id, 'int');
    if($v_session_order_id<0) $v_session_order_id = 0;
    $tpl_product_list->set('IMAGE_INFO',$v_product_img);
    $v_short_description = htmlentities($v_short_description);
    $tpl_product_list->set('PRODUCT_NAME',$v_short_description);
    $tpl_product_list->set('PRODUCT_ID',$v_product_id);
    $tpl_product_list->set('ODER_ID',$v_session_order_id);
    $tpl_product_list->set('URL',URL);
    $tpl_content->set('PRODUCT_ID',$v_product_id);
    $arr_list_set[] = $tpl_product_list;// sau khi lam xong bo vao` catalogue product list
}
$v_content_product_list = (isset($arr_list_set)&&is_array($arr_list_set))?Template::merge($arr_list_set):'';
$v_content_tag_list= (isset($arr_tag_list)&&is_array($arr_tag_list))?Template::merge($arr_tag_list):'';
$tpl_content->set('TAG_FIELD',  $v_content_tag_list);
$tpl_content->set('TAG_CLEAR_TAB',$v_content_product_list);
$v_product_pagination = pagination($v_total_pages, $v_page, URL.'catalogue');
$tpl_content->set('DEVICE_PAGE', $v_product_pagination);
$tpl_content->set('SELECT', $v_tag_all);
$tpl_content->set('TAG_ALL', $v_tag_all==1?1:0);
$tpl_content->set('URL',URL);
echo $tpl_content->output();
?>