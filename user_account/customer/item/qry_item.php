<?php if (!isset($v_sval)) die(); ?>
<?php if(isset($_REQUEST['txt_item'])==false) die() ?>
<?php if(isset($_REQUEST['txt_order'])==false) die() ?>
<?php
$v_order_item_id = isset($_REQUEST['txt_item']) ?$_REQUEST['txt_item']  : 0 ;
$tpl_item_edit = new Template('dsp_edit_order_item.tpl',$v_dir_templates);
$v_error_approve ='';
$arr_order_item_row = array();
$arr_all_material =array();
$v_graphic_file ='';
$v_product_id = 0;
$v_material_idx = 0;
$v_product_material ='';
$v_dsp_option_size = '';
$v_dsp_option_material = '';
$v_dsp_option_thick = '';
$v_dsp_option_color = '';
add_class('cls_tb_order_items') ;
$cls_tb_order_items = new cls_tb_order_items ($db,LOG_DIR);
add_class('cls_tb_product');
$cls_tb_product = new cls_tb_product ($db,LOG_DIR);
add_class('cls_tb_order');
$cls_tb_order = new cls_tb_order ($db,LOG_DIR);
$v_order_id = isset($_REQUEST['txt_order']) ?$_REQUEST['txt_order']  : 0 ;
?>
<?php
$v_count = $cls_tb_order_items->select_one( array('order_id'=>(int)$v_order_id,'order_item_id'=>(int)$v_order_item_id));

if($v_count==1){
    $v_product_id = $cls_tb_order_items->get_product_id();
    $v_product_code = $cls_tb_order_items->get_product_code();
    $v_product_description = $cls_tb_order_items->get_product_description();
    $v_package_type_temp = $cls_tb_order_items->get_package_type();
    $v_package_type = isset($v_package_type_temp)?$v_package_type_temp:0;
    $v_product_unit_price = $cls_tb_order_items->get_unit_price();
    $v_product_quantity = $cls_tb_order_items->get_quantity();
    $v_width = $cls_tb_order_items->get_width();
    $v_length =$cls_tb_order_items->get_length();
    $v_unit = $cls_tb_order_items->get_unit();
    $v_graphic_file = $cls_tb_order_items->get_graphic_file();
    $v_graphic_id = $cls_tb_order_items->get_graphic_id();
    $v_current_price =  $cls_tb_order_items->get_current_price();
    $v_material_id = $cls_tb_order_items->get_material_id();
    $v_material_thickness_value = $cls_tb_order_items->get_material_thickness_value();
    $v_material_thickness_unit = $cls_tb_order_items->get_material_thickness_unit();
    $v_item_desc = $cls_tb_order_items->get_description();
    $arr_allocation = $cls_tb_order_items->get_allocation();
    $v_material_color = $cls_tb_order_items->get_material_color();
    $v_material_name = $cls_tb_order_items->get_material_name();
    $v_item_status = $cls_tb_order_items->get_status();
    $v_total_price = $cls_tb_order_items->get_total_price();
    $cls_tb_product->select_one(array('product_id'=>(int)$v_product_id));
    $arr_material = $cls_tb_product->get_material();
    $arr_all_material = array();
    $arr_option_size = array();
    $arr_option_material = array();
    $arr_option_color = array();
    $arr_option_thick = array();
    $v_index = 0;
    for($i=0; $i<count($arr_material);$i++){
        $v_tmp_material = isset($arr_material[$i]['name'])?$arr_material[$i]['name']:'';
        $v_tmp_id = isset($arr_material[$i]['id'])?$arr_material[$i]['id']:0;
        $v_tmp_color = isset($arr_material[$i]['color'])?$arr_material[$i]['color']:'';
        $v_tmp_width = isset($arr_material[$i]['width'])?$arr_material[$i]['width']:0;
        $v_tmp_length = isset($arr_material[$i]['length'])?$arr_material[$i]['length']:0;
        $v_tmp_size_unit = isset($arr_material[$i]['usize'])?$arr_material[$i]['usize']:'';
        $v_tmp_thick_unit = isset($arr_material[$i]['uthick'])?$arr_material[$i]['uthick']:'';
        $v_tmp_thick = isset($arr_material[$i]['thick'])?$arr_material[$i]['thick']:0;
        $v_tmp_price = isset($arr_material[$i]['price'])?$arr_material[$i]['price']:0;
        $v_tmp_price = floatval($v_tmp_price);
        $v_tmp_width = floatval($v_tmp_width);
        $v_tmp_length = floatval($v_tmp_length);
        $v_tmp_thick = floatval($v_tmp_thick);
        $v_tmp_id = intval($v_tmp_id);

        if($v_tmp_material==$v_material_name &&
                $v_tmp_thick == $v_material_thickness_value &&
                $v_tmp_thick_unit ==  $v_material_thickness_unit &&
                $v_tmp_width == $v_width &&
                $v_tmp_length==$v_length &&
                $v_tmp_size_unit==$v_unit &&
                $v_tmp_color == $v_material_color)
            $v_material_idx = $v_index;
        $arr_all_material[$v_index] = array(
            'id'=>$v_tmp_id
            ,'name'=>$v_tmp_material
            ,'width'=>$v_tmp_width
            ,'length'=>$v_tmp_length
            ,'color'=>$v_tmp_color
            ,'usize'=>$v_tmp_size_unit
            ,'uthick'=>$v_tmp_thick_unit
            ,'thick'=>$v_tmp_thick
            ,'price'=>$v_tmp_price
        );
        $v_index++;
    }
    $v_list_size = '';
    $v_first_size = '';
    $v_first_material = '';
    $v_first_thick = '';
    for($i=0; $i<count($arr_all_material);$i++){
        $v_one_size = '('.$arr_all_material[$i]['width'].' &times; '.$arr_all_material[$i]['length']. ' '.$arr_all_material[$i]['usize'].')';
        if($arr_all_material[$i]['width']==$v_width && $arr_all_material[$i]['length']==$v_length && $arr_all_material[$i]['usize']==$v_unit)
            $v_dsp_selected = 'selected';
        else
            $v_dsp_selected = '';

        if(strpos($v_list_size, $v_one_size)===false){
            $v_dsp_option_size .='<option value="'.$i.'" '. $v_dsp_selected. ' >'.$v_one_size.'</option>';
            $v_list_size .= $v_one_size;
            if($v_first_size=='') $v_first_size = $v_one_size;
        }
    }
    if($v_first_size!=''){
        $v_list_material = '';
        for($i=0; $i<count($arr_all_material);$i++){
            $v_one_size = '('.$arr_all_material[$i]['width'].' &times; '.$arr_all_material[$i]['length']. ' '.$arr_all_material[$i]['usize'].')';
            $v_one_material = $arr_all_material[$i]['name'];

            if( $arr_all_material[$i]['name'] == $v_material_name)
                $v_dsp_selected = 'selected';
            else
                $v_dsp_selected = '';

            if(strpos($v_list_material, $v_one_material.',')===false && $v_one_size==$v_first_size){
                $v_dsp_option_material .='<option value="'.$i.'" '. $v_dsp_selected. ' >'.$v_one_material.'</option>';
                if($v_first_material=='') $v_first_material = $v_one_material;
                $v_list_material .= $v_one_material.',';
            }
        }
    }
    if($v_first_material!=''){
        $v_list_thick = '';
        for($i=0; $i<count($arr_all_material);$i++){
            $v_one_size = '('.$arr_all_material[$i]['width'].' &times; '.$arr_all_material[$i]['length']. ' '.$arr_all_material[$i]['usize'].')';
            $v_one_material = $arr_all_material[$i]['name'];
            $v_one_thick = $arr_all_material[$i]['thick'].' '.$arr_all_material[$i]['uthick'];

            if( $arr_all_material[$i]['thick']  == $v_material_thickness_value  && $v_material_thickness_unit == $arr_all_material[$i]['uthick'] )
                $v_dsp_selected = 'selected';
            else
                $v_dsp_selected = '';

            if(strpos($v_list_thick, $v_one_thick)===false && $v_one_size==$v_first_size && $v_one_material==$v_first_material){
                $v_dsp_option_thick .='<option value="'.$i.'" '. $v_dsp_selected. '>'.$v_one_thick.'</option>';
                if($v_first_thick=='') $v_first_thick = $v_one_thick;
            }
        }
    }
    if($v_first_material!=''){
        $v_list_color = '';
        for($i=0; $i<count($arr_all_material);$i++){
            $v_one_size = '('.$arr_all_material[$i]['width'].' &times; '.$arr_all_material[$i]['length']. ' '.$arr_all_material[$i]['usize'].')';
            $v_one_material = $arr_all_material[$i]['name'];
            $v_one_color = $arr_all_material[$i]['color'];
            $v_one_thick = $arr_all_material[$i]['thick'].' '.$arr_all_material[$i]['uthick'];

            if( $arr_all_material[$i]['color']  == $v_material_color )
                $v_dsp_selected = 'selected';
            else
                $v_dsp_selected = '';

            if(strpos($v_list_color, $v_one_color)===false && $v_one_size==$v_first_size && $v_one_material==$v_first_material && $v_first_thick==$v_one_thick){
                $v_dsp_option_color .='<option value="'.$i.'">'.$v_one_color.'</option>';
                if($v_list_color=='') $v_unit_price = $arr_all_material[$i]['price'];
                $v_list_color .= $v_one_color.',';
            }
        }
    }
    /*Set Image */
    $v_saved_dir = $cls_tb_product->get_saved_dir();
    $v_image_url = URL.  $v_graphic_file;

    if($v_item_status==1) $v_been_allocated = 1;
    if($v_item_status==1){
        $v_error_approve.='*Product: '.$v_product_code.' has not been allocated.';
    }

}
if($v_package_type<=1) {
    $v_product_material = $v_product_code .' - '.$v_product_description.' - ';
    if ($v_material_name != '') {
        $v_product_material .= $v_material_name;
    }
    $v_product_material .= ' - ('.$v_width.' &times; '.$v_length.' '.$v_unit.') ';
    if ($v_material_thickness_value != 0) {
        $v_product_material .= ' - ' .$v_material_thickness_value.' '.$v_material_thickness_unit;
    }
    if ($v_material_color != 'None') {
        $v_product_material .= ' - ' .$v_material_color;
    }
}
else{
    $v_product_material = $v_product_code .' - '. $v_product_description.' - '.'( '.$cls_settings->get_option_name_by_id('package_type', $v_package_type).')';
}
if($v_item_status==1)  $v_order_flag = 1;

$arr_cls_tb_product = $cls_tb_product->select_scalar("material",array('product_id'=>(int)$v_product_id));
$v_option_size_all = "";
$v_option_material_all = "";
$v_option_thickness_all = "";
$v_option_color_all = "";
$v_check = '';
$v_unit_price = 0;
$tpl_item_edit->set('URL',  URL);
$tpl_item_edit->set('BTN_NAME_DISPLAY',  'Update Item');
$tpl_item_edit->set('URL_TEMPLATES',  URL.$v_templates);
$tpl_item_edit->set('ORDER_ID',  $v_order_id);
$tpl_item_edit->set('ORDER_ITEM_ID',  $v_order_item_id);
$tpl_item_edit->set('PRODUCT_IMAGE',$v_image_url);
$tpl_item_edit->set('DESCRIPTION',$cls_tb_product->get_long_description());
$tpl_item_edit->set('PRODUCT_INFO_TITLE',$cls_tb_product->get_short_description());
$tpl_item_edit->set('ORDER_STATUS',$cls_tb_order->select_scalar('status',array('order_id'=>(int)$v_order_id )));
$tpl_item_edit->set('OPTION_SIZE',  $v_dsp_option_size);
$tpl_item_edit->set('OPTION_MATERIAL',  $v_dsp_option_material);
$tpl_item_edit->set('OPTION_THICKNESS',$v_dsp_option_thick);
$tpl_item_edit->set('OPTION_COLOR',$v_dsp_option_color);
$tpl_item_edit->set('OPTION_TEXT',"THERE NO OPTION AVAILABLE FOR THIS ITEM");
$tpl_item_edit->set('GRAPHIC_ID',$v_graphic_id);
$tpl_item_edit->set('PRODUCT_IMAGE',$v_image_url);
$tpl_item_edit->set('PRODUCT_ID',$v_product_id);
$v_order_item_count=1;
$tpl_order_item_row = new Template('dsp_order_item_row.tpl', $v_dir_templates);
$tpl_order_item_row->set('PRODUCT_ADD_ORDER_CLASS',$v_order_item_count++%2==0?'td_2':'td_3');
//$tpl_order_item_row->set('UNIT_PRICE',$v_unit_price);
$tpl_order_item_row->set('UNIT_PRICE',$v_current_price);
$tpl_order_item_row->set('TOTAL_PRICE',$v_total_price);
$tpl_order_item_row->set('URL_TEMPLATE',URL.$v_dir_templates);
$tpl_order_item_row->set('QUANTITY',1);
$v_order_option_item = '';

$arr_order_where = array();
if($arr_user['user_type']>=5){
    if(isset($v_user_rule_order_edit) && $v_user_rule_order_edit!=''){
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
    }else
        $arr_order_where = array('company_id'=>$v_company_id, 'user_name'=>$arr_user['user_name'], 'status'=>array('$gt'=>0, '$lt'=>20));
}else{
    $arr_order_where = array('company_id'=>$v_company_id, 'status'=>array('$gt'=>0, '$lt'=>20));
}
$arr_all_order = $cls_tb_order->select($arr_order_where);
$v_selected_order = isset($_SESSION['order_id'])?$_SESSION['order_id']:'0';
settype($v_selected_order, 'int');
foreach($arr_all_order as $arr){
    $v_order_option_item.='<option value="'.$arr['order_id'].'"'.($v_order_id==$arr['order_id']?' selected="selected"':'').'>Order: #'.$arr['order_id'].' #PO Number: '.$arr['po_number'].'</option>';
}
$tpl_order_item_row->set('OPTION_FIELD',$v_order_option_item);
$tpl_item_edit->set('TABLE_ITEM_ROW',$tpl_order_item_row->output());
$tpl_item_edit->set('SESSION_ID',session_id());
$tpl_item_edit->set('ORDER_ID',isset($v_order_id)?$v_order_id:0);
$tpl_item_edit->set('AJAX_LOAD_PRODUCT_URL',URL.'order/');
$tpl_item_edit->set('AJAX_ADD_ORDER_URL',URL.'order/');
$tpl_item_edit->set('URL',URL);
$tpl_item_edit->set('COMPANY_PRODUCT_URL','resources/'.$_SESSION['company_code'].'/products/');
$tpl_item_edit->set('PRODUCT_ID',$v_product_id);
$tpl_item_edit->set('ALERT_INVALID_DATA',$cls_tb_message->select_value('invalid_data'));
$tpl_item_edit->set('ALERT_CHOISE_SIZE',$cls_tb_message->select_value('invalid_choise_size'));
$tpl_item_edit->set('ALERT_INVALID_PRODUCT_SIZE',$cls_tb_message->select_value('invalid_product_size'));
$tpl_item_edit->set('ALERT_INVALID_MATERIAL',$cls_tb_message->select_value('invalid_choise_material'));
$tpl_item_edit->set('ALERT_MATERIAL_THICKNESS',$cls_tb_message->select_value('invalid_material_thickness'));
$tpl_item_edit->set('ALERT_ALLOCATE',$cls_tb_message->select_value('invalid_allocate_product'));
$tpl_item_edit->set('DISABLED','disabled');
$tpl_item_edit->set('MATERIAL_OPTION',  json_encode($arr_all_material));
$tpl_item_edit->set('MATERIAL_IDX',$v_material_idx);
echo $tpl_item_edit->output();
?>