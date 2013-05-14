<?php if(!isset($v_sval)) die();?>
<?php
add_class('cls_tb_company');
$cls_tb_company = new cls_tb_company($db);
if(!isset($_SESSION['where_clause_order'])) $_SESSION['where_clause_order']="";
$arr_where_clause=array();

/*Where Search */
$v_search_company_id = isset($_REQUEST['txt_company_id'])?$_REQUEST['txt_company_id']: (isset($arr_where_clause['company_id'])? ftext($arr_where_clause['company_id']) :0);
$v_search_order_po = isset($_REQUEST['txt_search_order_po']) ?$_REQUEST['txt_search_order_po']: (isset($arr_where_clause['po_number'])? ftext($arr_where_clause['po_number']) :'');
$v_search_order_ref = isset($_REQUEST['txt_search_order_ref']) ?$_REQUEST['txt_search_order_ref']: (isset($arr_where_clause['order_ref'])? ftext($arr_where_clause['order_ref']) :'');
$v_search_order_status = isset($_REQUEST['txt_search_order_status']) ?$_REQUEST['txt_search_order_status']: (isset($arr_where_clause['status'])? ftext($arr_where_clause['status']) :0);

if($v_search_company_id!=0) $arr_where_clause['company_id'] =(int) $v_search_company_id ;
if($v_search_order_po!='') $arr_where_clause['po_number'] = new MongoRegex("/".$v_search_order_po."/") ;
if($v_search_order_ref!='') $arr_where_clause['order_ref'] = new MongoRegex("/".$v_search_order_ref."/") ;
if($v_search_order_status!=0) $arr_where_clause['status'] =(int) $v_search_order_status ;

if($v_search_company_id!=0||$v_search_order_po!=''||$v_search_order_ref!='' || $v_search_order_status!=0 )
    $_SESSION['where_clause_order'] = $arr_where_clause;

if(isset($_REQUEST['btn_order_cancel'])){
    $v_search_location_id = 0;
    $v_search_order_po = '';
    $v_search_order_ref = '';
    $v_search_order_status = 0;
    $_SESSION['where_clause_order'] = "";
    $arr_where_clause=array();
}
$v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
settype($v_page,"int");
$v_page = ($v_page<=0)?1:$v_page;
$v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:'100';
settype($v_num_row,"int");
$v_num_row = ($v_num_row<0)?100:$v_num_row;
$v_total_row = $cls_tb_order->count($arr_where_clause);
$v_total_page = ceil($v_total_row /$v_num_row);
if($v_total_page <= 0) $v_total_page = 1;
if($v_total_page<$v_page) $v_page = $v_total_page;
$v_offset = ($v_page - 1)*$v_num_row;
$arr_company = array();
$arr_order_status = array();

$v_order_status_shipping = $cls_settings->get_option_id_by_key('order_status','partly_shipped');
$v_order_status_in_production = $cls_settings->get_option_id_by_key('order_status','in_production');

$arr_tb_order = $cls_tb_order->select_limit($v_offset,$v_num_row,$arr_where_clause);
$v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");
$v_dsp_tb_order = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
$v_dsp_tb_order .= '<tr align="center" valign="middle">';
$v_dsp_tb_order .= '<th></th>';
$v_dsp_tb_order .= '<th>Company</th>';
$v_dsp_tb_order .= '<th>Po Number</th>';
$v_dsp_tb_order .= '<th>Order Ref</th>';
$v_dsp_tb_order .= '<th>Total Order Amount</th>';
$v_dsp_tb_order .= '<th>Date Created</th>';
$v_dsp_tb_order .= '<th>Date Required</th>';
$v_dsp_tb_order .= '<th>Delivery Method</th>';
$v_dsp_tb_order .= '<th>Status</th>';
$v_dsp_tb_order .= '<th>&nbsp;</th>';
$v_dsp_tb_order .= '</tr>';
$v_count = $v_offset+1;

foreach($arr_tb_order as $arr){
	$v_mongo_id = $cls_tb_order->get_mongo_id();
	$v_order_id = isset($arr['order_id'])?$arr['order_id']:0;
	$v_raw_id = isset($arr['raw_id'])?$arr['raw_id']:'';
	$v_anvy_id = isset($arr['anvy_id'])?$arr['anvy_id']:'';
	$v_po_number = isset($arr['po_number'])?$arr['po_number']:'';
	$v_order_type = isset($arr['order_type'])?$arr['order_type']:0;
	$v_shipping_contact = isset($arr['shipping_contact'])?$arr['shipping_contact']:'';
	$v_total_order_amount = isset($arr['total_order_amount'])?$arr['total_order_amount']:0;
	$v_total_discount = isset($arr['total_discount'])?$arr['total_discount']:0;
	$v_billing_contact = isset($arr['billing_contact'])?$arr['billing_contact']:'';
	$v_net_order_amount = isset($arr['net_order_amount'])?$arr['net_order_amount']:0;
	$v_gross_order_amount = isset($arr['gross_order_amount'])?$arr['gross_order_amount']:0;
	$v_job_description = isset($arr['job_description'])?$arr['job_description']:'';
	$v_sale_rep = isset($arr['sale_rep'])?$arr['sale_rep']:'';
	$v_date_created = isset($arr['date_created'])?date('d-M-Y ',$arr['date_created']->sec):'N/A';
	$v_date_required = isset($arr['date_required'])?date('d-M-Y ',$arr['date_required']->sec):'N/A';

    if(strtotime($v_date_required)<=strtotime($v_date_created))
    {
        $v_date_required = "N/A";
        $cls_tb_order->update_field('date_required',NULL,array('order_id'=>(int)$v_order_id));
    }

	$v_term = isset($arr['term'])?$arr['term']:0;
	$v_delivery_method = isset($arr['delivery_method'])?$arr['delivery_method']:'';
	$v_source = isset($arr['source'])?$arr['source']:0;
	$v_status = isset($arr['status'])?$arr['status']:0;
	$v_dispatch = isset($arr['dispatch'])?$arr['dispatch']:0;
	$v_tax_1 = isset($arr['tax_1'])?$arr['tax_1']:0;
	$v_tax_2 = isset($arr['tax_2'])?$arr['tax_2']:0;
	$v_tax_3 = isset($arr['tax_3'])?$arr['tax_3']:0;
    $v_company_id =isset($arr['company_id'])?$arr['company_id']:0;
    $v_order_ref  =isset($arr['order_ref'])?$arr['order_ref']:'';
    $v_link_change_status = "";
    $v_link_shipping = "";

    if(!isset($arr_order_status[$v_status])){
        $arr_order_status[$v_status][0] = $cls_settings->get_option_key_by_id('order_status',$v_status); //key
        $arr_order_status[$v_status][1] = $cls_settings->get_option_name_by_id('order_status',$v_status); //name
    }

    if($v_status==$v_order_status_in_production ||$v_status== $v_order_status_shipping )
        $v_link_shipping = '<a href="'.URL. $v_admin_key.'/'.$v_order_id.'/shipping' .'">Ship</a> |';

    if( $arr_order_status[$v_status][0]=='submitted')
        $v_td_order = '<div id="div_order_status_'.$v_order_id.'"> '.$arr_order_status[$v_status][1].' <img data="'.$v_order_id.'" rel="change_dps" src="'. URL .'images/icons/gtk-edit.png"> </div>
                            <select order_id="'.$v_order_id.'" rel="order_status" id="sel_order_status_'.$v_order_id.'" name="sel_order_status_'.$v_order_id.'" style="display:none">
                                <option value="0" selected>--- Select ----</option>'.
                                $cls_settings->draw_option_by_id('order_status',4,$v_status,array("5")).'
                            </select>';
    else
        $v_td_order = $cls_settings->get_option_name_by_id('order_status',$v_status,0);

    if($v_status<0) $v_td_order = "Deleted";

    if(!isset($arr_company[$v_company_id]))
        $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name',array('company_id'=>(int) $v_company_id));

	$v_dsp_tb_order .= '<tr align="left" valign="middle">';
	$v_dsp_tb_order .= '<td align="right">'.($v_count++).'</td>';
	$v_dsp_tb_order .= '<td >'.$arr_company[$v_company_id].'</td>';
	$v_dsp_tb_order .= '<td><a target="_blank" href="'.URL. $v_admin_key.'/'.$v_order_id.'/details'.'"> '.$v_po_number.'</a> </td>';
	$v_dsp_tb_order .= '<td >'.$v_order_ref.'</td>';
	$v_dsp_tb_order .= '<td align="right"><b>'. format_currency($v_total_order_amount).'</b></td>';
	$v_dsp_tb_order .= '<td>'.$v_date_created.'</td>';
	$v_dsp_tb_order .= '<td>'.$v_date_required.'</td>';
	$v_dsp_tb_order .= '<td>'.$cls_settings->get_option_name_by_id('delivery_method',$v_delivery_method,0).'</td>';
    $v_dsp_tb_order .= '<td align="right">'.$v_td_order.'</td>';
	//$v_dsp_tb_order .= '<td bgcolor="'.$arr_color_order_status[$v_status].'" align="right">'.$cls_settings->get_option_name_by_id('order_status',$v_status,0).'</td>';
	$v_dsp_tb_order .= '<td align="right" target="_blank" id="td_'.$v_order_id.'">
                                '.$v_link_shipping.'
                                '.$v_link_change_status.'';
    if($v_per_delete==1) $v_dsp_tb_order .= ' <a class="confirm" href="'.URL. $v_admin_key.'/'.$v_order_id.'/delete' .'">Delete </a>';

	$v_dsp_tb_order .= '</td></tr>';
}
$v_dsp_tb_order .= '</table>';
?>