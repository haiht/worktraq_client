<?php
if (!isset($v_sval)) die();
?>
<?php
$v_sign_money ='$';
$v_selected_product_id = isset($_GET['txt_product_id'])?$_GET['txt_product_id']:'0';

settype($v_selected_product_id, 'int');
/* LIST PRODUCT */
require 'classes/cls_tb_product.php';
$cls_tb_product = new cls_tb_product($db, LOG_DIR);
require 'classes/cls_tb_product_images.php';
$cls_tb_product_images = new cls_tb_product_images($db, LOG_DIR);
require 'classes/cls_tb_order.php';
$cls_tb_order = new cls_tb_order($db, LOG_DIR);
require 'classes/cls_tb_order_items.php';
$cls_tb_order_items = new cls_tb_order_items($db, LOG_DIR);

add_class('cls_tb_location', 'cls_tb_location.php');
$cls_tb_location = new cls_tb_location($db, LOG_DIR);

if($v_selected_product_id<=0){
    $_SESSION['ss_error_title'] = 'Invalid product!';
    $_SESSION['ss_error_info'] = 'Invalid product!';
    $_SESSION['ss_error_referrer'] = URL.'catalogue/';
    redir(URL.'error/');
}
$arr_where = array('product_id'=>$v_selected_product_id, 'company_id'=>isset($v_company_id)?$v_company_id:0);

$v_row = $cls_tb_product->select_one($arr_where);
if($v_row!=1){
    $_SESSION['ss_error_title'] = 'Cannot access!';
    $_SESSION['ss_error_info'] = 'Product not found! It has been deleted or you do not have permission to view it.';
    $_SESSION['ss_error_referrer'] = URL.'catalogue/';
    redir(URL.'error/');
}

$v_product_detail = $cls_tb_product->get_product_detail();
$v_product_sku = $cls_tb_product->get_product_sku();
$v_short_description = $cls_tb_product->get_short_description();
$v_long_description = $cls_tb_product->get_long_description();
$v_product_img = $cls_tb_product->get_image_file();
$v_saved_dir = $cls_tb_product->get_saved_dir();
if($v_saved_dir!='' && (strrpos($v_saved_dir, '/')!==strlen($v_saved_dir)-1)) $v_saved_dir.='/';
$v_default_product_price = $cls_tb_product->get_default_price();
$v_package_type = $cls_tb_product->get_package_type();
$v_image_choose = $cls_tb_product->get_image_choose();
$v_allow_single = $cls_tb_product->get_allow_single();
$v_product_status = $cls_tb_product->get_product_status();
$v_package_type_name = $cls_settings->get_option_name_by_id('package_type', $v_package_type);
$v_size_option = $cls_tb_product->get_size_option();
$v_excluded_location = $cls_tb_product->get_excluded_location();
$arr_excluded_location = $v_excluded_location!=''?explode(',', $v_excluded_location):array();
$v_image_description = $cls_tb_product->get_image_desc();

settype($v_size_option, 'int');
if ($v_size_option <0) $v_size_option = 0;
$v_sold_by = $cls_tb_product->get_sold_by();
settype($v_sold_by, 'int');
if($v_sold_by<0) $v_sold_by = 0;
$v_image_option = $cls_tb_product->get_image_option();
settype($v_image_option, 'int');
if($v_image_option<0) $v_image_option = 0;

if($v_package_type<=1){
    $arr_material = $cls_tb_product->get_material();
    $v_product_price_view = '';
    $v_product_price = '<h1>Price</h1>';
    $v_product_material = '';
    $v_product_size = '';
    $v_product_print_image = '';


    if ($v_image_option == 1) {
        if ($v_image_description == '' or $v_image_description == 'Image for current product') {
            $v_product_print_image .= '<h1>Print Image</h1><span>Need to upload image. Otherwise, the default image related to this product will be used.</span>';        
        } else {
            $v_product_print_image .= '<h1>Print Image</h1><span>';        
            $v_product_print_image .= $v_image_description;
            $v_product_print_image .= '.</span>';
        }    
    } else {
        $v_product_print_image .= "<h1>Print Image</h1><span>This product uses a standard image already provided.</span>";                
    }

    if ($v_size_option == 1) {
        $v_product_size .= '<h1>Custom Sizes</h1><span>The size of this product is customizable.</span>';        
    }
    if(!$v_user_rule_hide_price_all){
        if ($v_sold_by == 1) {
            $v_product_price .= '<span>This product is sold by Unit. <br> The regular price is: <strong>' .$v_sign_money.$v_default_product_price .'</strong></span><br>';
        } else {
            $v_product_price .= '<span>This product is sold by square foot. <br> The regular price is: <strong>' .$v_sign_money.$v_default_product_price . '/sqft</strong>. </span><br>';
        }
    }
    $v_product_price .= '';
    //$v_product_price .= '<h1>Product Combinations</h1>';

    if (count($arr_material) > 0) {
        $v_product_price .= '<h1>Product Combinations</h1>';
        $v_product_price .= '<ul>';
    }

    $size = array();
    $mat = array();
    $v_size_custom = '';

    for($i=0; $i<count($arr_material);$i++){
        $v_material = $arr_material[$i]['name'];
        $v_width = $arr_material[$i]['width'];
        $v_length = $arr_material[$i]['length'];

        if (in_array($v_material, $mat) == false && $v_material != '-------') {
            $mat[] = $v_material;
        }

        if (intval($v_width)*intval($v_width) == 0) {
            $v_size_custom = "(Custom Size)";
        } else {
            $v_size = '';
            $v_size .= '(' .$v_width .' &times; ' . $v_length .')';
            if (in_array($v_size, $size) == false) {
                $size[] = $v_size;
            }
        }
    }    
    /*
    if ($v_size_custom != '') {
        $size[] = $v_size_custom;
    }
    */
    // material
    if (count($mat) != 0) {
        $v_product_material .= '<h1>Print Materials</h1><ul>';
        foreach ($mat as $v_material) {            
            $v_product_material .= '<li>'.$v_material.'</li>';
        }
    }

    // size
    if (count($size) != 0) {
        $v_product_size .= '<h1>Standard Sizes</h1><ul>';
        foreach($size as $v_size){
           $v_product_size .= '<li>' .$v_size .'</li>';
        }
    }

    for($i=0; $i<count($arr_material);$i++){
        $v_material = $arr_material[$i]['name'];
        $v_color = $arr_material[$i]['color'];
        $v_width = $arr_material[$i]['width'];
        $v_length = $arr_material[$i]['length'];
        $v_size_unit = $arr_material[$i]['usize'];
        $v_thick_unit = $arr_material[$i]['uthick'];
        $v_thick = $arr_material[$i]['thick'];
        $v_price = $arr_material[$i]['price'];

        $v_product_price .= '<li>';
        if ($v_material != "-------") {           
            $v_product_price .= $v_material .' ';
        }

        if ($v_color != "None") {
            $v_product_price .= ' - '.$v_color .' ';
        }
        if (intval($v_thick) != 0) {
            $v_product_price .= ' - '.$v_thick.' '.$v_thick_unit.' ';
        }

        if (intval($v_width)*intval($v_width) != 0) {           
            $v_product_price .= '('.$v_width.' &times; '.$v_length.') ';
        } else {
            $v_product_price .= '(Custom Size) ';
        }

        if (intval($v_price) != 0) {
            if (intval($v_width)*intval($v_width) != 0) {
                $v_product_price .= '<br><strong style="margin-left: 20px;"> '.($v_user_rule_hide_price_all?NO_PRICE:format_currency($v_price).'/unit').' </strong>';
            } else {
                $v_product_price .= '<br><strong style="margin-left: 20px;"> '.($v_user_rule_hide_price_all?NO_PRICE:format_currency($v_price).'/sqft').' </strong>';
            }    
        }

        $v_product_price .= '</li>';
        //$v_product_price_view .= $v_material .' ('.$v_width.' &times; '.$v_length.') '.$v_color.' '.$v_thick.' '.$v_thick_unit.' ('.format_currency($v_price).')<br />';
    }
    if (count($arr_material) > 0) {
        $v_product_material .= '</ul>';
        $v_product_size .= '</ul>';
        $v_product_price .= '</ul>';
    }

    $v_product_price_view .= $v_product_print_image .$v_product_size .$v_product_material .$v_product_price."<br><br>";

    //if($v_product_price_view=='')
    // $v_product_price_view = $v_sign_money.$v_product_price;
}else{
    $v_product_price_view .= $v_sign_money.$v_product_price;
}

$v_tree_view = '';
if($v_package_type>0){
    $v_tree_view = $cls_tb_product->get_family_tree($v_selected_product_id, $v_sign_money, URL.'catalogue/');
    if($v_tree_view!=''){
        $v_tree_view = '<p><h3 align="left">Family Tree</h3><ul id="tree_menu">'.$v_tree_view.'</ul>';
    }
    $v_product_detail .= $cls_settings->get_option_name_by_id('package_type', $v_package_type);
}

$v_image_dir = 'resources/'.$_SESSION['company_code'].'/products/'.$v_selected_product_id.'/';

$v_image_url = URL.'images/product_sample.jpg';
if(file_exists($v_saved_dir.$v_product_img)){
    $v_image_url = $v_saved_dir.$v_product_img;
}else if(file_exists($v_saved_dir.$v_product_img)){
    $v_image_url = $v_saved_dir.$v_product_img;
}
//$v_product_name =  $v_product_sku.($v_product_detail!=''?' - '.htmlentities($v_product_detail):'');
$v_product_name = htmlentities($v_short_description);
$v_product_name .= '<br>[Package Type: '.$v_package_type_name.']'.($cls_tb_product->get_package_image_choose($cls_tb_product_images)?' - Allow change image':'');

//.'<br />['.$v_package_type_name.']'.($cls_tb_product->get_package_image_choose($cls_tb_product_images)?'<br />Allow change image':'')
$v_session_order_id = isset($_SESSION['order_id'])?$_SESSION['order_id']:'0';
settype($v_session_order_id, 'int');

$tpl_product_info_main = new Template('dsp_product_info_main.tpl', $v_dir_templates);
$tpl_product_info_main->set('PRODUCT_IMAGE', $v_image_url);
$tpl_product_info_main->set('PRODUCT_PRICE', $v_product_price_view);
$tpl_product_info_main->set('PRODUCT_NAME', $v_product_name);
$tpl_product_info_main->set('SHORT_DESCRIPTION', htmlentities($v_short_description));
$tpl_product_info_main->set('LONG_DESCRIPTION', htmlentities($v_long_description));
$tpl_product_info_main->set('PRODUCT_ID', $v_selected_product_id);
$tpl_product_info_main->set('URL', URL);
$tpl_product_info_main->set('TREE_VIEW', $v_tree_view);
$tpl_product_info_main->set('ORDER_ID', $v_session_order_id);

//if(in_array($arr_user['location_default'], $arr_excluded_location)){   //check excluded locations
//    $tpl_product_info_main->set('DISPLAY_BUTTON', ' style="display:none"');
//}else{
    if($v_session_order_id==0){
        if($v_user_rule_order_create)
            $tpl_product_info_main->set('DISPLAY_BUTTON', ($v_allow_single==1 && $v_product_status==3)?'':' style="display:none"');
        else
            $tpl_product_info_main->set('DISPLAY_BUTTON', ' style="display:none"');
    }else{
        if($v_user_rule_order_edit || $v_user_rule_order_create)
            $tpl_product_info_main->set('DISPLAY_BUTTON', ($v_allow_single==1 && $v_product_status==3)?'':' style="display:none"');
        else
            $tpl_product_info_main->set('DISPLAY_BUTTON', ' style="display:none"');
    }
//}


//require 'classes/cls_tb_product_images.php';
//$cls_tb_product_images = new cls_tb_product_images($db, LOG_DIR);
$v_dsp_image_list = '';
if($cls_tb_product->get_package_image_choose($cls_tb_product_images, $v_selected_product_id)){
    $arr_images = $cls_tb_product_images->select(array('product_id'=>$v_selected_product_id, 'status'=>0, 'image_type'=>1, 'user_type'=>0));
    foreach($arr_images as $arr){
        $v_product_images_id = $arr['product_images_id'];
        $v_low_res_image = $arr['low_res_image'];
        $v_saved_dir = $arr['saved_dir'];
        $v_product_image = $arr['product_image'];
        if(strrpos($v_saved_dir,'/')!=(strlen($v_saved_dir)-1))
            $v_saved_dir .= '/';
        $v_image_url = $v_saved_dir.$v_low_res_image;

        $v_dsp_image_list .='<span id="sp_basket"><img src="'.$v_image_url.'" alt="'.$v_product_name.'" width="200" /><br />';
        if(($v_user_rule_order_create && ($v_session_order_id==0)) || ($v_user_rule_order_edit && ($v_session_order_id>0)))
            $v_dsp_image_list .='<img id="img_basket" src="images/icons/basket.png" title="Add product with showed image" style="cursor:pointer;" data-product-id="'.$v_selected_product_id.'" data-order-id="'.$v_session_order_id.'" data-order-item-id="0" data-image-id="'.$v_product_images_id.'" data-image-url="'.$v_image_url.'" data-image-name="'.$v_product_image.'" />';
        $v_dsp_image_list .='</span>';
    }
    $tpl_product_info_slide = new Template('dsp_product_info_slide.tpl', $v_dir_templates);
    $tpl_product_info_slide->set('IMAGE_LIST', $v_dsp_image_list);
    $tpl_product_info_slide->set('URL', URL);
    $v_dsp_image_list = $v_dsp_image_list!=''?$tpl_product_info_slide->output():'';
}

$tpl_product_info_main->set('PRODUCT_INFO_SLIDE', $v_dsp_image_list);

$arr_where = array('product_id'=>$v_selected_product_id, 'company_id'=>isset($v_company_id)?$v_company_id:0);
$arr_order = array();
$arr_order_id = array();

add_class('cls_tb_user');
$cls_user = new cls_tb_user($db, LOG_DIR);
$v_user_location_view = $cls_user->select_scalar('user_location_view', array('user_name'=>$arr_user['user_name']));
if($v_user_location_view!=''){
    if(!$v_user_rule_order_view)  $v_user_location_view = $arr_user['location_default'];
}
$v_user_location_view .= ',';

$arr_items = $cls_tb_order_items->select($arr_where);
$v_tmp_order_id = 0;
foreach($arr_items as $a){
    $v_order_id = $a['order_id'];
    if(isset($arr_order_id[$v_order_id])) continue;

    $v_row = $cls_tb_order->select_one(array('order_id'=>$v_order_id));
    $v_location_id = 0;
    $v_user_name = '';
    $v_status = 0;
    if($v_row==1){
        $v_location_id = $cls_tb_order->get_location_id();
        $v_user_name = $cls_tb_order->get_user_name();
        $v_status = $cls_tb_order->get_status();
    }
    if($v_status<0) continue;
    if($arr_user['user_type']>=5){
        if($v_user_rule_order_view){
            if(strpos($v_user_location_view, $v_location_id.',')!==false){
                $arr_order_id[$v_order_id] = 1;
                $arr_order[] = array('order_id'=>$v_order_id);
                $v_tmp_order_id = $v_order_id;
            }
        }else{
            if($arr_user['user_name']==$v_user_name){
                $arr_order_id[$v_order_id] = 1;
                $arr_order[] = array('order_id'=>$v_order_id);
                $v_tmp_order_id = $v_order_id;
            }
        }
    }else{
        $arr_order_id[$v_order_id] = 1;
        $arr_order[] = array('order_id'=>$v_order_id);
        $v_tmp_order_id = $v_order_id;
    }
}
if(count($arr_order)>0){

    $v_module_menu_key = 'customer_order';
    $arr_module_rule = $cls_module->select_scalar('module_rules', array('module_menu'=>$v_module_menu_key));
    for($i=0; $i<count($arr_module_rule); $i++){
        $v_rule_key = $arr_module_rule[$i]['key'];
        if(isset($arr_user['user_rule'][$v_module_menu_key][$v_rule_key])) $arr_user['user_rule'][$v_module_menu_key][$v_rule_key]=1;
    }

    $v_user_rule_create = isset($arr_user['user_rule'][$v_module_menu_key]['create']) && $arr_user['user_rule'][$v_module_menu_key]['create']===1;
    $v_user_rule_view = isset($arr_user['user_rule'][$v_module_menu_key]['view']) && $arr_user['user_rule'][$v_module_menu_key]['view']===1;
    $v_user_rule_edit = isset($arr_user['user_rule'][$v_module_menu_key]['edit']) && $arr_user['user_rule'][$v_module_menu_key]['edit']===1;
    $v_user_rule_delete = isset($arr_user['user_rule'][$v_module_menu_key]['delete']) && $arr_user['user_rule'][$v_module_menu_key]['delete']===1;
    $v_user_rule_reorder = isset($arr_user['user_rule'][$v_module_menu_key]['reorder']) && $arr_user['user_rule'][$v_module_menu_key]['reorder']===1;
    $v_user_rule_approve = isset($arr_user['user_rule'][$v_module_menu_key]['approve']) && $arr_user['user_rule'][$v_module_menu_key]['approve']===1;
    $v_user_rule_submit = isset($arr_user['user_rule'][$v_module_menu_key]['submit']) && $arr_user['user_rule'][$v_module_menu_key]['submit']===1;
    $v_user_rule_allocate = isset($arr_user['user_rule'][$v_module_menu_key]['allocate']) && $arr_user['user_rule'][$v_module_menu_key]['allocate']===1;

    if(count($arr_order)>1)
        $arr_order_where = array('status'=>array('$gt'=>0), '$or'=>$arr_order);
    else
        $arr_order_where = array('status'=>array('$gt'=>0), 'order_id'=>$v_tmp_order_id);

    $arr_location_view = array();

    if($arr_user['user_type']>=4)
        if($v_user_rule_view){
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
                        $arr_location_view[] = $v_tmp;
                    }
                }
                if($j>1){
                    $arr_order_where = array('company_id'=>$v_company_id, '$or'=>$arr_location, 'status'=>array('$gt'=>0));
                }else if($j==1){
                    $arr_order_where = array('company_id'=>$v_company_id, 'location_id'=>$v_tmp, 'status'=>array('$gt'=>0));
                }else{
                    $arr_order_where = array('company_id'=>-1);
                }
            }
            //$arr_order_where = array('company_id'=>$v_company_id, 'location_id'=>$v_location_id, 'status'=>array('$gt'=>0));
        }else
            $arr_order_where = array('company_id'=>$v_company_id, 'user_name'=>$arr_user['user_name'], 'status'=>array('$gt'=>0));
    else
        $arr_order_where = array('company_id'=>$v_company_id, 'status'=>array('$gt'=>0));

    $arr_orders = $cls_tb_order->select($arr_order_where);
    $v_order=1;

    $v_dsp_order_select = '<option value="view">View</option>';
    $arr_product_info_order_row = array();

    $arr_location_name = array();
    foreach($arr_orders as $arr){
        $v_order_id = $arr['order_id'];
        $v_location_id = $arr['location_id'];
        $v_po_number = $arr['po_number'];
        $v_date_created = $arr['date_created'];
        $v_date_created = is_null($v_date_created)?date('M-d-Y', $v_date_created):date('M-d-Y');
        $v_status = $arr['status'];
        $v_order_total = $arr['total_order_amount'];
        $v_tmp_order_user = $arr['user_name'];
        $v_status = $cls_settings->get_option_name_by_id('order_status', $v_status);
        $v_order_total = format_currency($v_order_total);

        if($v_user_rule_view || ($v_tmp_order_user==$arr_user['user_name'])){
            if(!isset($arr_location_name[$v_location_id]))
                $arr_location_name[$v_location_id] = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id));

            $tpl_product_info_order_row = new Template('dsp_order_list_item.tpl', $v_dir_templates);
            $tpl_product_info_order_row->set('ORDER', $v_order++);
            $tpl_product_info_order_row->set('ORDER_ID', $v_order_id);
            $tpl_product_info_order_row->set('ORDER_DATE', $v_date_created);
            $tpl_product_info_order_row->set('PO_NUMBER', $v_po_number);
            $tpl_product_info_order_row->set('TOTAL_PRICE', $v_user_rule_hide_price_all?NO_PRICE:$v_order_total);
            $tpl_product_info_order_row->set('ORDER_STATUS', $v_status);
            $tpl_product_info_order_row->set('LOCATION_NAME', $arr_location_name[$v_location_id]);
            if($arr['status']>=30)
                $v_tmp_order_select = $v_dsp_order_select. ($v_user_rule_order_reorder?'<option value="reorder">ReOrders</option>':'');
            else
                $v_tmp_order_select = $v_dsp_order_select;

            $tpl_product_info_order_row->set('OPTION_SELECT', $v_tmp_order_select);
            $arr_product_info_order_row[] = $tpl_product_info_order_row;
        }

    }
    $v_dsp_product_info_order_row = Template::merge($arr_product_info_order_row);
    $tpl_dsp_product_info_order = new Template('dsp_product_info_order.tpl', $v_dir_templates);
    $tpl_dsp_product_info_order->set('ORDER_LIST_ITEM', $v_dsp_product_info_order_row);
    $v_dsp_product_info_order = $tpl_dsp_product_info_order->output();
    $tpl_product_info_main->set('PRODUCT_INFO_ORDER', $v_dsp_product_info_order);
}else{
    $tpl_product_info_main->set('PRODUCT_INFO_ORDER', '');
}


$v_dsp_script_tpl = '';
$v_dsp_popup_order = '';

if($v_user_rule_order_create || $v_user_rule_order_edit){
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
    $v_dsp_script_tpl = $tpl_script->output();


    $v_order_option_item = '';
    //if(isset($_SESSION['ss_current_order'])){
    $v_order_option_item.='<option value="0" selected="selected">New Order in Session</option>';
    //}
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
        $arr_order_where = array('company_id'=>$v_company_id, 'status'=>array('$gt'=>0, '$lt'=>20));
    }

    $arr_all_order = $cls_tb_order->select($arr_order_where);
    $v_selected_order = isset($_SESSION['order_id'])?$_SESSION['order_id']:'0';
    settype($v_selected_order, 'int');
    foreach($arr_all_order as $arr){
        $v_order_option_item.='<option value="'.$arr['order_id'].'"'.($v_selected_order==$arr['order_id']?' selected="selected"':'').'>Order: #'.$arr['order_id'].' #PO Number: '.$arr['po_number'].'</option>';
    }
    if($v_order_option_item!=''){
        $v_order_option_item = '<div class="select-ganeral"><label>Choose Order: <select style="width:250px;color:blue" id="txt_list_order">'.$v_order_option_item.'</select></label>&nbsp;';
    }


    $tpl_popup_add_order = new Template('dsp_popup_add_order.tpl', $v_dir_templates);
    $tpl_popup_add_order->set('URL',URL);
    $tpl_popup_add_order->set('SIGN_MONEY',$v_sign_money);
    $tpl_popup_add_order->set('JAVASCRIPT_TPL', $v_dsp_script_tpl);
    $tpl_popup_add_order->set('SELECT_LIST_ORDER', $v_order_option_item);
    $tpl_popup_add_order->set('PRICE_DISPLAY',$v_user_rule_hide_price_all?' display: none;':'');

    $v_dsp_popup_order = $tpl_popup_add_order->output();
}

$tpl_product_info_main->set('POPUP_ADD_ORDER', $v_dsp_popup_order);

echo $tpl_product_info_main->output();


?>