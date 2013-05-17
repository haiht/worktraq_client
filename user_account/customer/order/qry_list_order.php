<?php if(!isset($v_sval)) die(); ?>
<?php
$v_page = isset($_GET['txt_page'])?$_GET['txt_page']:'1';
settype($v_page, 'int');
if($v_page<1) $v_page = 1;
$v_order = 1;
$v_row_page = ORDER_ROWS_ONE_PAGE;
$arr_tbl_order_list_item = array();
$cls_tb_location = new cls_tb_location($db);
$arr_temp_location = array();
$arr_order_where = array();
$v_order_count=1;
$tpl_order = new Template('dsp_order.tpl', $v_dir_templates);
if($v_page==1)
{
    if(isset($_SESSION['ss_current_order']))
    {
        $tpl_order_list_item = new Template('dsp_order_item.tpl', $v_dir_templates);
        $v_total_price = 0;
        $arr_current_order = unserialize($_SESSION['ss_current_order']);
        $v_template_po_name = '';
        for($i=0; $i<count($arr_current_order); $i++){
            $v_total_price += $arr_current_order[$i]['product_price']*$arr_current_order[$i]['product_quantity'];
            $v_template_po_name = $arr_current_order[$i]['material_name'].' - '.$arr_current_order[$i]['product_description'];
        }
        if(!isset($arr_temp_location[$v_location_id]))
            $arr_temp_location[$v_location_id] = $cls_tb_location->select_scalar('location_name',array('location_id'=>(int)$v_location_id));
        $v_tb_class_name='';
        $v_tb_class_name=$v_order_count%2==0?"td_2":"td_3";
        $tpl_order_list_item->set("ORDER_TABLE_CLASS_NAME",$v_tb_class_name);
        $tpl_order_list_item->set("ORDER_ORDER_NUMBER",$v_order_count++);
        $tpl_order_list_item->set('ORDER_DATE', date('d-M-Y'));
        $tpl_order_list_item->set('ORDER_PO_NUMBER', $v_template_po_name);
        $tpl_order_list_item->set('ORDER_LOCATION_NAME',$arr_temp_location[$v_location_id]);
        $tpl_order_list_item->set('ORDER_TOTAL_MONEY', $v_user_rule_hide_price_all?NO_PRICE:format_currency($v_total_price));
        $tpl_order_list_item->set('ORDER_STATUS', 'On Session');
        $tpl_order_list_item->set('ORDER_ID',0);
        $v_dsp_option_order = '<option class="text_color" value="edit">Edit</option><option class="text_color" value="delete">Delete</option>';
        $tpl_order_list_item->set('OPTION_TYPE', $v_dsp_option_order);
        $tpl_order_list_item->set('TOOL_TIP', '');
        $arr_tbl_order_list_item[] = $tpl_order_list_item;
        $v_order++;
    }
}
if(isset($_POST['txt_submit_search_order_form'])){
    $v_search_po_number = isset($_POST['txt_po_number'])?$_POST['txt_po_number']:'';
    $v_search_order_status = isset($_POST['txt_order_status'])?$_POST['txt_order_status']:'0';
    settype($v_search_order_status, 'int');
    $v_search_user_name = isset($_POST['txt_user_name'])?$_POST['txt_user_name']:'';
    $v_search_order_location = isset($_POST['txt_location_id'])?$_POST['txt_location_id']:'0';
    settype($v_search_order_location, 'int');
    $v_search_date_create = isset($_POST['txt_date_created'])?1:0;
    $v_search_date_from = isset($_POST['txt_date_from'])?$_POST['txt_date_from']:'';
    $v_search_date_to = isset($_POST['txt_date_to'])?$_POST['txt_date_to']:'';
    $arr_order_search = array(
        'po_number'=>$v_search_po_number
        ,'status'=>$v_search_order_status
        ,'user_name'=>$v_search_user_name
        ,'location'=>$v_search_order_location
        ,'create'=>$v_search_date_create
        ,'from'=>$v_search_date_from
        ,'to'=>$v_search_date_to
    );
    $_SESSION['ss_search_order'] = serialize($arr_order_search);
}
else
    {
        if(isset($_SESSION['ss_search_order']))
        {
            $arr_order_search = unserialize($_SESSION['ss_search_order']);
        }
        $v_search_po_number = isset($arr_order_search['po_number'])?$arr_order_search['po_number']:'';
        $v_search_order_status = isset($arr_order_search['status'])?$arr_order_search['status']:'0';
        $v_search_user_name = isset($arr_order_search['user_name'])?$arr_order_search['user_name']:'';
        $v_search_order_location = isset($arr_order_search['location'])?$arr_order_search['location']:'0';
        $v_search_date_create = isset($arr_order_search['create'])?$arr_order_search['create']:'0';
        $v_search_date_from = isset($arr_order_search['from'])?$arr_order_search['from']:'';
        $v_search_date_to = isset($arr_order_search['from'])?$arr_order_search['to']:'';
        settype($v_search_order_status,'int');
        settype($v_search_order_location,'int');
        settype($v_search_date_create,'int');
        if($v_search_date_create!=1) $v_search_date_create = 0;
    }
$arr_search = array();
if($v_search_po_number!=''){
    $arr_search['po_number']=new MongoRegex('/'.$v_search_po_number.'/i');
}
if($v_search_order_status>0){
    $arr_search['status']= $v_search_order_status;
}
if($v_search_order_location>0){
    $arr_search['location_id'] = $v_search_order_location;
}
if($v_search_user_name!=''){
    $arr_search['user_name'] = $v_search_user_name;
}
if($v_search_date_create==1){
    $v_search_date_from_s = NULL;
    $v_search_date_to_s = NULL;
    if($v_search_date_from!=''){
        $arr_search_date_from = explode('-', $v_search_date_from);
        if(count($arr_search_date_from)==3){
            $v_search_date_from_s = $arr_search_date_from[2].'-'.$arr_search_date_from[1].'-'.$arr_search_date_from[0];
            $v_search_date_from_s = strtotime($v_search_date_from_s);
            $v_search_date_from_s = new MongoDate($v_search_date_from_s);
        }
    }
    if($v_search_date_to!=''){
        $arr_search_date_to = explode('-', $v_search_date_to);
        if(count($arr_search_date_to)==3){
            $v_search_date_to_s = $arr_search_date_to[2].'-'.$arr_search_date_to[1].'-'.$arr_search_date_to[0];
            $v_search_date_to_s = strtotime($v_search_date_to_s);
            $v_search_date_to_s = new MongoDate($v_search_date_to_s);
        }
    }
    if(!is_null($v_search_date_from_s) && !is_null($v_search_date_to_s)){
        $arr_search['date_created'] = array('$gte'=>$v_search_date_from_s, '$lte'=>$v_search_date_to_s);
    }else if(!is_null($v_search_date_from_s) && is_null($v_search_date_to_s)){
        $arr_search['date_created'] = array('$gte'=>$v_search_date_from_s);
    }else if(is_null($v_search_date_from_s) && !is_null($v_search_date_to_s)){
        $arr_search['date_created'] = array('$lte'=>$v_search_date_to_s);
    }
}
$tbl_order_form_search = new Template('dsp_order_search_form.tpl', $v_dir_templates);
$tbl_order_form_search->set('PO_NUMBER','');
$v_order_search_status = $cls_settings->draw_option_by_id('order_status',1,$v_search_order_status);
$tbl_order_form_search->set('ORDER_STATUS',$v_order_search_status);
$v_order_search_location = $cls_tb_location->draw_option('location_id', 'location_name', $v_search_order_location, array('company_id'=>$v_company_id));
$tbl_order_form_search->set('ORDER_LOCATION',$v_order_search_location);
$v_order_search_user = $cls_user->draw_option('user_name', 'user_name', $v_search_user_name, array('company_id'=>$v_company_id));
$tbl_order_form_search->set('USER_NAME',$v_order_search_user);
$tbl_order_form_search->set('DATE_FROM',$v_search_date_from);
$tbl_order_form_search->set('DATE_TO',$v_search_date_to);
$tbl_order_form_search->set('CHECKED',$v_search_date_create==1?' checked="checked"':'');
$tbl_order_form_search->set('URL',URL);
add_class('cls_tb_user');
$cls_user = new cls_tb_user($db, LOG_DIR);
$arr_location_view = array();
if($arr_user['user_type']>=4){
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
    }
    else
        $arr_order_where = array('company_id'=>$v_company_id, 'user_name'=>$arr_user['user_name'], 'status'=>array('$gt'=>0));}
else
    $arr_order_where = array('company_id'=>$v_company_id, 'status'=>array('$gt'=>0));
foreach($arr_search as $key=>$val){
    if($key=='location_id'){
        if($arr_user['user_type']<5){
            $arr_order_where[$key] = $val;
        }else if(in_array($val, $arr_location_view)){
            $arr_order_where[$key] = $val;
        }else{
            if($val!=$arr_user['location_default'])
                $arr_order_where[$key] = -1;
            else{
                $arr_order_where[$key] = (int) $arr_user['location_default'];
                $arr_order_where['user_name'] = $arr_user['user_name'];
            }
        }
    }else if($key=='user_name')
    {
        if($arr_user['user_type']>=5)
        {
            if($arr_user['user_name']==$v_search_user_name)
                $arr_order_where[$key] = $val;
            else
                $arr_order_where[$key] = '';
        }
    }
    else
    {
        $arr_order_where[$key] = $val;
    }
}
$v_total_rows = $cls_tb_order->count($arr_order_where);
$v_total_pages = ceil($v_total_rows/$v_row_page);
if($v_total_pages<1) $v_total_pages = 1;
if($v_page > $v_total_pages) $v_page = $v_total_pages;
$v_offset = ($v_page - 1)*$v_row_page;
$arr_order = $cls_tb_order->select_limit($v_offset, $v_row_page,$arr_order_where);
$output ='';
foreach($arr_order as $a){
    $v_tmp_order_id = $a['order_id'];
    $v_tmp_po_number = $a['po_number'];
    $v_tmp_order_status = $a['status'];
    $output .=" ".$v_tmp_order_status;
    settype($v_tmp_order_status,"int");
    $v_tmp_order_location = $a['location_id'];
    $v_tmp_order_user = $a['user_name'];
    $v_order_status = $cls_settings->get_option_name_by_id('order_status',$v_tmp_order_status);

    $v_date_created = isset($a['date_created'])?$a['date_created']:NULL;
    if(is_null($v_date_created))
        $v_date_created = time();
    else
        $v_date_created = is_object($v_date_created)?$v_date_created->sec:time();
    $v_date_create = date('d-M-Y',$v_date_created);
    $v_total_price = $a['total_order_amount'];
    $v_dsp_option_order = '';
    if($v_user_rule_view || ($v_tmp_order_user==$arr_user['user_name']))
    {
        $v_dsp_option_order = '<option class="text_color" value="view">View</option>';
        if($v_tmp_order_user==$arr_user['user_name'])
        {
            if($v_tmp_order_status<20){
                if($v_user_rule_create || ($v_user_rule_create && $v_user_rule_edit) || $v_owner==true){
                    $v_dsp_option_order .= '<option class="text_color" value="edit">Edit</option>';
                }
                else if($v_user_rule_edit || $v_user_rule_submit){
                    $v_dsp_option_order .= '<option class="text_color" value="edit">Edit</option>';
                }
                if($v_user_rule_delete){
                    $v_dsp_option_order .= '<option class="text_color" value="delete">Delete</option>';
                }
            }
        }
        else
        {
            if($v_tmp_order_status < 30){
                if($v_tmp_order_status==20){
                    if(($v_user_rule_approve && $cls_user->check_user_rule('user_location_approve', $v_tmp_order_location, $arr_user['user_name'])==1) || $v_user_rule_cancel!=''){
                        $v_dsp_option_order .= '<option class="text_color" value="edit">Approve</option>';
                    }
                }else{
                    if($v_user_rule_edit)
                        $v_dsp_option_order .= '<option class="text_color" value="edit">Edit</option>';
                    if($v_user_rule_delete)
                        $v_dsp_option_order .= '<option class="text_color" value="delete">Delete</option>';
                }
            }
        }
        if(!isset($_SESSION['ss_current_order']))
        {
            if($v_tmp_order_status>=30){
                if($v_user_rule_reorder)
                    $v_dsp_option_order .= '<option class="text_color" value="reorder">ReOrders</option>';
            }
        }
        if(!isset($arr_temp_location[$v_tmp_order_location]))
            $arr_temp_location[$v_tmp_order_location] = $cls_tb_location->select_scalar('location_name',array('location_id'=>(int)$v_tmp_order_location));
        if(!isset($arr_temp_location[$v_location_id]))
            $arr_temp_location[$v_location_id] = $cls_tb_location->select_scalar('location_name',array('location_id'=>(int)$v_location_id));
        $v_tb_class_name='';
        $v_total_items = $cls_tb_order_items->select_total_items_in_order($v_tmp_order_id);
        $v_tb_class_name=$v_order%2==0?"td_2":"td_3";
            $tpl_order_list_item = new Template('dsp_order_item.tpl', $v_dir_templates);
            $tpl_order_list_item->set("ORDER_TABLE_CLASS_NAME",$v_tb_class_name);
            $tpl_order_list_item->set("ORDER_ORDER_NUMBER",$v_order);
            $tpl_order_list_item->set('ORDER_DATE', $v_date_create);
            $tpl_order_list_item->set('ORDER_PO_NUMBER', $v_tmp_po_number);
            $tpl_order_list_item->set('ORDER_LOCATION_NAME',$arr_temp_location[$v_tmp_order_location]);
            $tpl_order_list_item->set('ORDER_TOTAL_MONEY', $v_user_rule_hide_price_all?NO_PRICE:format_currency($v_total_price));
            $tpl_order_list_item->set('ORDER_STATUS', $v_order_status);
            $tpl_order_list_item->set('ORDER_ID',$v_tmp_order_id);
            $tpl_order_list_item->set('OPTION_TYPE', $v_dsp_option_order);
            $v_date = $cls_tb_order->select_scalar("date_required",array("order_id"=>$v_tmp_order_id));
            $v_date = isset($v_date)?date('Y-m-d',$v_date->sec):'N/A';
            $v_tool_tip = "<span style='font-weight:bold'>Order quantity: </span> ". number_format($v_total_items)
            ." <br/><span style='font-weight:bold'> Order Ref: </span> ".$cls_tb_order->select_scalar("order_ref",array("order_id"=>$v_tmp_order_id))
            ." <br/><span style='font-weight:bold'> Date Required: </span> ".$v_date;
            $tpl_order_list_item->set('TOOL_TIP', $v_tool_tip);
            $arr_tbl_order_list_item[] = $tpl_order_list_item;
        $v_order++;
    }
}
$v_hide_div_create_new = 'style="display:none"';
if($v_user_rule_create){
    $v_hide_div_create_new = isset($_SESSION['ss_current_order'])?' style="display:none"':'';
}
$v_order_pagination = pagination($v_total_pages, $v_page, URL.'order');
$tpl_order->set('ORDER_PAGING', $v_order_pagination);
$tpl_order->set('STYLE', ' style="margin: 10px 0 4px"');
$v_order_list_item = (isset($arr_tbl_order_list_item)&&is_array($arr_tbl_order_list_item))?Template::merge($arr_tbl_order_list_item):'';
$tpl_order->set('ORDER_ITEM_LIST',$v_order_list_item);
$tpl_order->set('FORM_SEARCH', $tbl_order_form_search->output());
$tpl_order->set('URL',URL);
$tpl_order->set('URL_TEMPLATE',URL.$v_dir_templates);
echo $tpl_order->output();
?>