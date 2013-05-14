<?php
if (!isset($v_sval)) die("chet roi");
?>
<?php
$v_page = isset($_GET['txt_page'])?$_GET['txt_page']:'1';
settype($v_page, 'int');
if($v_page<1) $v_page = 1;
$v_order = 1;
$v_row_page = SHIPPING_ROWS_ONE_PAGE;
require 'classes/cls_tb_shipping.php';
$cls_tb_shipping = new cls_tb_shipping($db, LOG_DIR);
$v_total_rows = $cls_tb_shipping->count(array('company_id'=>$v_company_id));
$v_total_pages = ceil($v_total_rows/$v_row_page);
if($v_total_pages<1) $v_total_pages = 1;
if($v_page > $v_total_pages) $v_page = $v_total_pages;
$v_offset = ($v_page - 1)*$v_row_page;
$tpl_shipping = new Template('dsp_shipping.tpl',$v_dir_templates);
?>
<?php
$arr_shipping = $cls_tb_shipping->select_limit($v_offset,$v_row_page,array('company_id'=>$v_company_id));
$arr_tpl_shipping_row = array();
$v_order_row = 1;
foreach($arr_shipping as $arr)
{
    $v_shipping_id = $arr['shipping_id'];
    $v_shipping_date = $arr['date_shipping']->sec;
    $v_shipping_status = $arr['ship_status'];
    $v_shipping_to = $arr['location_name'];
    $v_shipper = $arr['shipper'];
    $v_tracking_number = $arr['tracking_number'];
    $v_tracking_url = $arr['tracking_url'];
    foreach($arr['shipping_detail'] as $arr_order){
        $v_shipping_to = '<a href="'.URL.'order/'.$arr_order['order_id'].'/view">'.$v_shipping_to.'</a>';
    }
    if(is_valid_url($v_tracking_url))
        $v_shipping_tracking = '<a target="_blank" href="'.$v_tracking_url.'">'.$v_tracking_number.'</a>';
    else
        $v_shipping_tracking = $v_tracking_number;
    $v_shipping_status_name = $cls_settings->get_option_name_by_id('ship_status', $v_shipping_status);
    if($v_order_row%2==0)
        $v_shipping_class_name ='td_2';
    else
        $v_shipping_class_name ='td_3';
    $tpl_shipping_row = new Template('dsp_shipping_item.tpl', $v_dir_templates);
    $tpl_shipping_row->set('SHIPPING_CLASS', $v_shipping_class_name);
    $tpl_shipping_row->set('SHIPPING_ORDER', $v_order_row++);
    $tpl_shipping_row->set('SHIPPING_DATE', date('d-M-Y',$v_shipping_date));
    $tpl_shipping_row->set('SHIPPING_PRICE', $v_shipping_tracking);//
    $tpl_shipping_row->set('SHIPPING_STATUS', $v_shipping_status_name);//
    $tpl_shipping_row->set('SHIPPING_REF', $v_shipping_to);
    $tpl_shipping_row->set('SHIPPING_SHIPPER', $v_shipper);
    $arr_tpl_shipping_row[] = $tpl_shipping_row;
}
$v_dsp_all_row = Template::merge($arr_tpl_shipping_row);
$tpl_shipping->set('SHIPPING_ITEM', $v_dsp_all_row);
$v_shipping_pagination = pagination($v_total_pages, $v_page, URL.'shipping');
$tpl_shipping->set('SHIPPING_PAGING', $v_shipping_pagination);
$tpl_shipping->set('URL', URL);
echo $tpl_shipping->output();
?>