<?php if(!isset($v_sval)) die();?>
<?php

if(check_permission('manage_shipping',$arr_user['user_rule'])==false)
{
    $_SESSION['error_session'] ='Access denied for user '.$arr_user['user_name'];
    redir(URL."/admin/error");
}
$v_order_id = isset($_REQUEST['txt_order_id'])?$_REQUEST['txt_order_id']:0;
$cls_tb_settings = new cls_settings($db);

/* List all allocation*/
/* Checking Order in Shipping */
$arr_where = array('order_id'=>(int)$v_order_id);
$v_company_id  = $cls_tb_order->select_scalar('company_id',array('order_id'=>(int)$v_order_id));
$v_location_from = $cls_tb_order->select_scalar('location_id',array('order_id'=>(int)$v_order_id));

$v_count_allocation =$cls_tb_allocation->count($arr_where);
/* Create Shipping */
if($v_count_allocation==0)
{
    $cls_tb_order_items  = new cls_tb_order_items($db,LOG_DIR);
    $arr_where = array('order_id'=>(int)$v_order_id);

    $arr_tb_order = $cls_tb_order_items->select_limit(0,1000,$arr_where);
    foreach($arr_tb_order as $arr){
        $v_product_code = isset($arr['product_code'])?$arr['product_code']:0;
        $v_quantity = isset($arr['quantity'])?$arr['quantity']:0;
        $arr_allocation = isset($arr['allocation'])?$arr['allocation']:array();
        $v_order_item_id = isset($arr['order_item_id'])?$arr['order_item_id']:0;

        $v_total = sizeof($arr_allocation);
        for($i=0;$i<$v_total;$i++)
        {
            $v_location_id = isset($arr_allocation[$i]['location_id'])?$arr_allocation[$i]['location_id']:'';
            $v_location_name = isset($arr_allocation[$i]['location_name'])?$arr_allocation[$i]['location_name']:'';
            $v_location_address = isset($arr_allocation[$i]['location_address'])?$arr_allocation[$i]['location_address']:'';
            $v_location_quantity = isset($arr_allocation[$i]['location_quantity'])?$arr_allocation[$i]['location_quantity']:0;
            $v_location_price = isset($arr_allocation[$i]['location_price'])?$arr_allocation[$i]['location_price']:0;
            $v_tracking_url = isset($arr_allocation[$i]['tracking_url'])?$arr_allocation[$i]['tracking_url']:'';
            $v_tracking_number = isset($arr_allocation[$i]['tracking_number'])?$arr_allocation[$i]['tracking_number']:'';
            $v_tracking_company = isset($arr_allocation[$i]['tracking_company'])?$arr_allocation[$i]['tracking_company']:'';
            $v_date_shipping = isset($arr_allocation[$i]['date_shipping'])?$arr_allocation[$i]['date_shipping']:NULL;;
            $v_ship_status = isset($arr_allocation[$i]['ship_status'])?$arr_allocation[$i]['ship_status']:0;;


            $v_allocation_id  = $cls_tb_allocation->select_next('allocation_id');
            $cls_tb_allocation->set_allocation_id($v_allocation_id);
            $cls_tb_allocation->set_location_id((int)$v_location_id);
            $cls_tb_allocation->set_location_name($v_location_name);
            $cls_tb_allocation->set_location_address($v_location_address);
            $cls_tb_allocation->set_order_id((int)$v_order_id);
            $cls_tb_allocation->set_quantity((int)$v_location_quantity);
            $cls_tb_allocation->set_order_items_id((int)$v_order_item_id);

            $cls_tb_allocation->set_tracking_number($v_tracking_number);
            $cls_tb_allocation->set_shipper($v_tracking_company);
            $cls_tb_allocation->set_tracking_url($v_tracking_url);
            $cls_tb_allocation->set_date_shipping(NULL);
            $cls_tb_allocation->set_ship_status($v_ship_status);
            /*haiht EDIT*/
            $cls_tb_allocation->set_create_by($arr_user['user_name']);
            $cls_tb_allocation->set_create_time(date('Y-m-d H:i:s', time()));
            /*haiht END EDIT*/
            $cls_tb_allocation->insert();
        }
    }
}

$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$arr_where_clause = array();
$v_total_row = $cls_tb_allocation->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;

$arr_where_clause = array('order_id'=>(int)$v_order_id);
$arr_tb_allocation = $cls_tb_allocation->select_limit($v_offset,$v_num_row,$arr_where_clause,array('location_name'=>1));

$v_dsp_tb_allocation = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_tb_allocation .= '<tr align="center" valign="middle">';
$v_dsp_tb_allocation .= '<th><input type="checkbox" onclick="check_all(\'chk_allocation_id\',this.checked);add_to_list(\'chk_allocation_id\',\'hdn_allocation_list\')"></th>';
$v_dsp_tb_allocation .= '<th>Ord</th>';
$v_dsp_tb_allocation .= '<th>Location Name</th>';
$v_dsp_tb_allocation .= '<th>Location Address</th>';
$v_dsp_tb_allocation .= '<th>Quantity</th>';
$v_dsp_tb_allocation .= '<th>Shipper</th>';
$v_dsp_tb_allocation .= '<th>Tracking Number</th>';
$v_dsp_tb_allocation .= '<th>Tracking Url</th>';
$v_dsp_tb_allocation .= '<th>Shipping Status</th>';
$v_dsp_tb_allocation .= '<th>Date Shipping</th>';
$v_dsp_tb_allocation .= '</tr>';
$v_count = 1;
$v_count_location = 0;
// ;
$v_temp_location_id = 0;
foreach($arr_tb_allocation as $arr){
    $v_mongo_id = $cls_tb_allocation->get_mongo_id();
    $v_allocation_id = isset($arr['allocation_id'])?$arr['allocation_id']:0;
    $v_order_items_id = isset($arr['order_items_id'])?$arr['order_items_id']:0;
    $v_order_id = isset($arr['order_id'])?$arr['order_id']:0;
    $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
    $v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
    $v_location_address = isset($arr['location_address'])?$arr['location_address']:'';
    $v_quantity = isset($arr['quantity'])?$arr['quantity']:1;
    $v_shipper = isset($arr['shipper'])?$arr['shipper']:'';
    $v_tracking_number = isset($arr['tracking_number'])?$arr['tracking_number']:'';
    $v_shipping_url = isset($arr['tracking_url'])?$arr['tracking_url']:'';
    $v_ship_status = isset($arr['ship_status'])?$arr['ship_status']:'';
    $v_url = '';
    if($v_shipping_url!='') $v_url='<a target="_blank" href="'.$v_shipping_url .'"> Checking Allocation </a>';

    if($v_temp_location_id!=$v_location_id){
        $v_count_location++;
        $v_temp_location_id = $v_location_id;
    }

    $v_bgcolor = "#FFFFFF";
    if($v_count_location%2==0)
          $v_bgcolor = "#98FB98";

    $v_check = '';
    $v_check = '<input type="checkbox" name="chk_allocation_id"   value="'.$v_allocation_id.'" onclick="add_to_list(\'chk_allocation_id\',\'hdn_allocation_list\')" /> ';

    $v_date_shipping = isset($arr['date_shipping'])?date('d-M-Y H:i:s',$arr['date_shipping']->sec):'';
    if($v_shipper=='' || $v_tracking_number=='') $v_date_shipping='';

    $v_dsp_tb_allocation .= '<tr align="left" valign="middle" >';
    $v_dsp_tb_allocation .= '<th  align="center" bgcolor="'.$v_bgcolor.'"> '.$v_check.'</th>';
    $v_dsp_tb_allocation .= '<td align="right" bgcolor="'.$v_bgcolor.'">'.($v_count++).'</td>';
    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'">'.$v_location_name.'</td>';
    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'">'.$v_location_address.'</td>';
    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'">'.$v_quantity.'</td>';
    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'">'.$v_shipper.'</td>';
    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'">'.$v_tracking_number.'</td>';
    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'">'.$v_url.'</td>';
    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'">'.$cls_tb_settings->get_option_name_by_id('ship_status',$v_ship_status).'</td>';
    $v_dsp_tb_allocation .= '<td bgcolor="'.$v_bgcolor.'">'.fdate($v_date_shipping).'</td>';
    $v_dsp_tb_allocation .= '</tr>';
}
$v_dsp_tb_allocation .= '</table>';




?>