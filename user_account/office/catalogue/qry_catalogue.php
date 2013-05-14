<?php if (!isset($v_sval)) die(); ?>
<?php
$v_sign_money ='$';
/* LIST PRODUCT */
require 'classes/cls_tb_product.php';
$cls_tb_product = new cls_tb_product($db, LOG_DIR);
require 'classes/cls_tb_order.php';
$cls_tb_order = new cls_tb_order($db, LOG_DIR);
require 'classes/cls_tb_tag.php';
$cls_tb_tag = new cls_tb_tag($db, LOG_DIR);
require 'classes/cls_tb_product_images.php';
$cls_tb_product_images = new cls_tb_product_images($db, LOG_DIR);



$arr_where_clause = array();
$v_product_search = '';
$v_product_tag_all = 1;
$arr_tag_id = array();

$v_company_id = (int) $_SESSION['company_id'];
if(isset($_POST['btn_product_search'])){
    $v_product_tag_all = isset($_POST['txt_product_tag_all'])?1:0;
    $v_product_search = isset($_POST['txt_product_search'])?$_POST['txt_product_search']:'';
    $arr_product = array();
    if($v_product_search!=''){
        $arr_search_where = array('company_id'=>$v_company_id);
        $arr_tag = $cls_tb_tag->select($arr_search_where);
        foreach($arr_tag as $arr){
            if(strpos(strtolower($arr['tag_name']), strtolower($v_product_search))!==false)
                $arr_product[] = (int) $arr['tag_id'];
        }
    }
    $arr_product_tag = isset($_POST['txt_product_tag'])?$_POST['txt_product_tag']:array();
    if(!is_array($arr_product_tag)) $arr_product_tag = array();
    for($i=0; $i<count($arr_product_tag); $i++){
        $arr_product[] = (int) $arr_product_tag[$i];
        $arr_tag_id[] = $arr_product_tag[$i];
    }
    if($v_product_search==''){
        if(count($arr_product)>0)
            //$arr_where_clause = array('$or'=>array(array('product_status'=>3), array('product_status'=>4)),'tag'=>array('$in'=>$arr_product), 'company_id'=>$v_company_id);
            $arr_where_clause = array('product_status'=>3,'tag'=>array('$in'=>$arr_product), 'company_id'=>$v_company_id);
        else
            //$arr_where_clause = array('$or'=>array(array('product_status'=>3), array('product_status'=>4)), 'company_id'=>$v_company_id);
            $arr_where_clause = array('product_status'=>3, 'company_id'=>$v_company_id);
    }else{
        if(count($arr_product)>0)
            //$arr_where_clause = array('$or'=>array(array('product_status'=>3), array('product_status'=>4)),'$or'=>array(array('tag'=>array('$in'=>$arr_product)), array('short_description'=>new MongoRegex('/'.$v_product_search.'/i'))), 'company_id'=>$v_company_id);
            $arr_where_clause = array('product_status'=>3,'$or'=>array(array('tag'=>array('$in'=>$arr_product)), array('short_description'=>new MongoRegex('/'.$v_product_search.'/i'))), 'company_id'=>$v_company_id);
        else
            $arr_where_clause = array('product_status'=>3,'short_description'=>new MongoRegex('/'.$v_product_search.'/i'), 'company_id'=>$v_company_id);
            //$arr_where_clause = array('$or'=>array(array('product_status'=>3), array('product_status'=>4)),'short_description'=>new MongoRegex('/'.$v_product_search.'/i'), 'company_id'=>$v_company_id);
    }
    $_SESSION['ss_product_tag'] = serialize(array('where_clause'=>$arr_where_clause, 'product_search'=>$v_product_search, 'tag_id'=>$arr_tag_id, 'tag_all'=>$v_product_tag_all));
}else{
    if(isset($_SESSION['ss_product_tag'])){
        $arr_search = unserialize($_SESSION['ss_product_tag']);
        if(is_array($arr_search)){
            $arr_where_clause = $arr_search['where_clause'];
            $v_product_search = $arr_search['product_search'];
            $arr_tag_id = $arr_search['tag_id'];
            $v_product_tag_all = $arr_search['tag_all'];
        }
    }else{
        //$arr_where_clause = array('$or'=>array(array('product_status'=>3),array('product_status'=>4)), 'company_id'=>$v_company_id);
        $arr_where_clause = array('product_status'=>3, 'company_id'=>$v_company_id);
    }
}

//$arr_where_clause = array('$or'=>array(array('product_status'=>3),array('product_status'=>4)), 'company_id'=>$v_company_id, 'tag'=>array('$in'=>array(2), '$in'=>array(3)));

$v_page = isset($_REQUEST['txt_page'])?$_REQUEST['txt_page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:PRODUCT_ROWS_ONE_PAGE;
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?PRODUCT_ROWS_ONE_PAGE:$v_num_row;
//$arr_where_clause = array('location_id'=>$_SESSION['location_id']);
$v_total_row = $cls_tb_product->count($arr_where_clause);
$v_total_pages = ceil($v_total_row /$v_num_row);
if($v_total_pages <= 0) $v_total_pages = 1;
if($v_total_pages<$v_page) $v_page = $v_total_pages;
$v_offset = ($v_page - 1)*$v_num_row;

//$arr_tb_product = $cls_tb_product->select_limit($v_offset,$v_num_row,$arr_where_clause);
$arr_tb_product = $cls_tb_product->select($arr_where_clause);
//$arr_tb_product->skip($v_offset);
//$arr_tb_product->limit($v_num_row);
$tag = array();
$products = array();
$products = iterator_to_array($arr_tb_product);

foreach($products as $key =>$val ) {
    if (isset($val['tag'])) {        
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
//print_r($tag);

//foreach($arr_tb_product as $arr)
for ($index = $v_offset; $index < $v_offset+$v_num_row && $index < count($arr_tb_product); $index=$index+1 )
{
    $arr = $arr_tb_product[$index];
    /* */
    $tpl_product_list = new Template('dsp_catalogue_product_list.tpl',$v_dir_templates);

    $v_mongo_id = $cls_tb_product->get_mongo_id();
    $v_product_id = isset($arr['product_id'])?$arr['product_id']:0;
    $v_product_sku = isset($arr['product_sku'])?$arr['product_sku']:'';
    $v_short_description = isset($arr['short_description'])?$arr['short_description']:'';
    $v_long_description = isset($arr['long_description'])?$arr['long_description']:'';
    $v_product_detail = isset($arr['product_detail'])?$arr['product_detail']:'';
    $v_size_option = isset($arr['size_option'])?$arr['size_option']:0;
    $v_size_width = isset($arr['size_width'])?$arr['size_width']:0;
    $v_size_height = isset($arr['size_height'])?$arr['size_height']:0;
    $v_size_dept = isset($arr['size_dept'])?$arr['size_dept']:0;
    $v_size_unit = isset($arr['size_unit'])?$arr['size_unit']:0;
    $v_image_option = isset($arr['image_option'])?$arr['image_option']:0;
    $v_image_file = isset($arr['image_file'])?$arr['image_file']:'';
    $v_material_id = isset($arr['material_id'])?$arr['material_id']:0;
    $v_text_option = isset($arr['text_option'])?$arr['text_option']:0;
    $v_text = isset($arr['text'])?$arr['text']:'0';
    $v_sold_by = isset($arr['sold_by'])?$arr['sold_by']:'';
    $v_default_price = isset($arr['default_price'])?$arr['default_price']:0;
    $v_status = isset($arr['product_status'])?$arr['product_status']:0;
    $v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
    $v_allow_single = isset($arr['allow_single'])?$arr['allow_single']:0;

    $v_saved_dir = isset($arr['saved_dir'])?$arr['saved_dir']:'resources/'.$_SESSION['company_code'].'/products/'.$v_product_id.'/';

    if(strrpos($v_saved_dir,'/')!==strlen($v_saved_dir)-1) $v_saved_dir.='/';
    //catalogue
    $v_product_img ='<img src="images/product_default.jpg" title="Product sample - Missing image" />';
    if(file_exists($v_saved_dir .  $v_image_file))
        $v_product_img = '<img alt="'.htmlentities($v_short_description).'" src="'.URL.$v_saved_dir. $v_image_file.'" />';
    else if(file_exists($v_saved_dir . $v_image_file))
        $v_product_img = '<img alt="'.htmlentities($v_short_description).'" src="'.URL.$v_saved_dir. $v_image_file.'" />';

    $v_session_order_id = isset($_SESSION['order_id'])?$_SESSION['order_id']:'0';
    settype($v_session_order_id, 'int');
    if($v_session_order_id<0) $v_session_order_id = 0;
    $tpl_product_list->set('PRODUCT_IMG',$v_product_img);
    $v_short_description = htmlentities($v_short_description);
    $tpl_product_list->set('PRODUCT_NAME',$v_short_description);
    //$tpl_product_list->set('PRODUCT_NAME',$v_product_sku.' - '.htmlentities($v_short_description));
    $tpl_product_list->set('PRODUCT_ID',$v_product_id);
    $tpl_product_list->set('ORDER_ID',$v_session_order_id);
    $tpl_product_list->set('PRODUCT_PRICE', format_currency($v_default_price));

    if($v_session_order_id==0){
        if($v_user_rule_order_create){
            $tpl_product_list->set('DISPLAY_BUTTON', ($v_allow_single==1 && $v_status==3)?'':' style="display:none"');
        }else{
            $tpl_product_list->set('DISPLAY_BUTTON', ' style="display:none"');
        }
    }else{
        if($v_user_rule_order_edit || $v_user_rule_order_create){
            $tpl_product_list->set('DISPLAY_BUTTON', ($v_allow_single==1 && $v_status==3)?'':' style="display:none"');
        }else{
            $tpl_product_list->set('DISPLAY_BUTTON', ' style="display:none"');
        }
    }

    $tpl_product_list->set('URL',URL);

    $arr_tpl[] = $tpl_product_list;
}
$tpl_script = new Template('dsp_order_product_script.tpl', $v_dir_templates);
$tpl_script->set('SESSION_ID',session_id());
$tpl_script->set('ORDER_ID',isset($_SESSION['order_id'])?$_SESSION['order_id']:'0');
$tpl_script->set('AJAX_LOAD_PRODUCT_URL',URL.'order/');
$tpl_script->set('AJAX_ADD_ORDER_URL',URL.'order/');
$tpl_script->set('COMPANY_PRODUCT_URL','resources/'.$_SESSION['company_code'].'/products/');
$tpl_script->set('URL',URL);
$tpl_script->set('SIGN_MONEY',$v_sign_money);

$tpl_script->set('ALERT_INVALID_DATA',$cls_tb_message->select_value('invalid_data'));
$tpl_script->set('ALERT_CHOISE_SIZE',$cls_tb_message->select_value('invalid_choise_size'));
$tpl_script->set('ALERT_INVALID_PRODUCT_SIZE',$cls_tb_message->select_value('invalid_product_size'));
$tpl_script->set('ALERT_INVALID_MATERIAL',$cls_tb_message->select_value('invalid_choise_material'));
$tpl_script->set('ALERT_MATERIAL_THICKNESS',$cls_tb_message->select_value('invalid_material_thickness'));
$tpl_script->set('ALERT_ALLOCATE',$cls_tb_message->select_value('invalid_allocate_product'));

$v_order_option_item = '';

$v_order_option_item.='<option value="0" selected="selected">New Order in Session</option>';

$arr_order_where = array();
if($arr_user['user_type']>=5){
    if($v_user_rule_order_edit){
        add_class('cls_tb_user');
        $cls_user = new cls_tb_user($db, LOG_DIR);
        $v_user_location_view = $cls_user->select_scalar('user_location_view', array('user_name'=>$arr_user['user_name']));
        if($v_user_location_view=='') $v_user_location_view = $arr_user['location_default'];
        if($v_user_location_view!=''){
            $arr_user_location_view = explode(',', $v_user_location_view);
            $arr_location = array();
            $j=0;
            $v_tmp = 0;
            for($i=0; $i<count($arr_user_location_view);$i++){
                $v_tmp = (int) $arr_user_location_view[$i];
                if($v_tmp>0){
                    $arr_location[$j++] = array('location_id'=>$v_tmp);
                }
            }
            if($j>1){
                $arr_order_where = array('company_id'=>$v_company_id, '$or'=>$arr_location, 'status'=>array('$gt'=>0, '$lt'=>20));
            }else if($j==1){
                $arr_order_where = array('company_id'=>$v_company_id, 'location_id'=>$v_tmp, 'status'=>array('$gt'=>0, '$lt'=>20));
            }else{
                $arr_order_where = array('company_id'=>-1);
            }
        }
        //$arr_order_where = array('company_id'=>$v_company_id, 'location_id'=>$v_location_id, 'status'=>array('$gt'=>0));
    }else
        $arr_order_where = array('company_id'=>$v_company_id, 'user_name'=>$arr_user['user_name'], 'status'=>array('$gt'=>0, '$lt'=>20));
}else{
    $arr_order_where = array('company_id'=>$v_company_id, 'status'=>1);
}

$arr_all_order = $cls_tb_order->select($arr_order_where);
$v_selected_order = isset($_SESSION['order_id'])?$_SESSION['order_id']:'0';
settype($v_selected_order, 'int');
foreach($arr_all_order as $arr){
    $v_tmp_location_id = $arr['location_id'];
    if(check_rule_approve($v_tmp_location_id, $arr_user))
        $v_order_option_item.='<option value="'.$arr['order_id'].'"'.($v_selected_order==$arr['order_id']?' selected="selected"':'').'>Order: #'.$arr['order_id'].' #PO Number: '.$arr['po_number'].'</option>';
}
if($v_order_option_item!=''){
    $v_order_option_item = '<div class="select-ganeral"><label>Choose Order: <select style="width:250px; color:blue" id="txt_list_order">'.$v_order_option_item.'</select></label>&nbsp;';
}

$tpl_popup_add_order = new Template('dsp_popup_add_order.tpl', $v_dir_templates);
$tpl_popup_add_order->set('URL',URL);
$tpl_popup_add_order->set('SIGN_MONEY',$v_sign_money);
$tpl_popup_add_order->set('JAVASCRIPT_TPL', $tpl_script->output());
$tpl_popup_add_order->set('SELECT_LIST_ORDER', $v_order_option_item);
$tpl_popup_add_order->set('PRICE_DISPLAY',$v_user_rule_hide_price_all?' display: none;':'');


$v_content = (isset($arr_tpl)&&is_array($arr_tpl))?Template::merge($arr_tpl):'';
$tpl_catalogue = new Template('dsp_catalogue.tpl',$v_dir_templates);
$tpl_catalogue->set('LIST_PRODUCTS',$v_content);
$tpl_catalogue->set('POPUP_ADD_ORDER',$tpl_popup_add_order->output());

$v_product_pagination = pagination($v_total_pages, $v_page, URL.'catalogue');
$tpl_catalogue->set('PRODUCT_PAGING', $v_product_pagination);

$arr_tag_where_clause = array('company_id'=>(int)$v_company_id);
$arr_tag = $cls_tb_tag->select($arr_tag_where_clause, array('tag_name'=>1));

$v_dsp_product_tag = '';
$v_disabled = $v_product_tag_all==1?' disabled="disabled"':'';
$v_disabled = '';
$v_dsp_product_tag = '<li><label><input rel="search_tag" type="checkbox" name="txt_product_tag_all" id="txt_product_tag_all" value="0"'.($v_product_tag_all===1?' checked="checked"':'').' /> All</label></li>';
foreach($arr_tag as $arr){
    $v_checked = $v_product_tag_all===1?' checked="checked"':(in_array($arr['tag_id'],$arr_tag_id) && $v_disabled==''?' checked="checked"':'');

    $v_dsp_product_tag .= '<li><label><input rel="search_tag" type="checkbox" id="txt_product_tag" name="txt_product_tag[]" value="'.$arr['tag_id'].'"'.$v_checked.$v_disabled.' /> '.$arr['tag_name'].'</label></li>';
}
$tpl_catalogue->set('PRODUCT_TAG', $v_dsp_product_tag);
$tpl_catalogue->set('PRODUCT_SEARCH', $v_disabled==''?$v_product_search:'');
$tpl_catalogue->set('DISABLED_SEARCH', $v_disabled);
echo $tpl_catalogue->output();


?>
