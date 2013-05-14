<?php if(!isset($v_sval)) die();?>
<?php
$v_search_company_id = isset($_REQUEST['txt_search_company_id']) ? $_REQUEST['txt_search_company_id'] : 0;
$v_search_group_product_id = isset($_REQUEST['txt_search_product_group_id']) ? $_REQUEST['txt_search_product_group_id'] : 0;

$v_product_name = '';
$v_group_name = '';
add_class('cls_tb_location_group_threshold');
add_class('cls_tb_product_group');
add_class('cls_tb_contact');
$cls_tb_location_group_threshold = new cls_tb_location_group_threshold($db);
$cls_tb_product_group = new cls_tb_product_group($db);
$cls_tb_contact = new cls_tb_contact($db);

$v_total = $cls_tb_product_group->select_one(array('product_group_id'=>(int) $v_search_group_product_id));

if($v_total>0)  $v_group_name = $cls_tb_product_group->get_product_group_name();

$v_message = '';
/*-------------------------- Update -----------------*/
if(isset($_POST['btn_update_threshold']))
{
    $v_search_company_id = isset($_REQUEST['txt_search_company_id']) ? $_REQUEST['txt_search_company_id'] : 0;
    $v_search_group_product_id = isset($_REQUEST['txt_search_product_group_id']) ? $_REQUEST['txt_search_product_group_id'] : 0;

    if($v_search_group_product_id==0) $v_message = "Not found the product group id <br>";
    if($v_search_company_id==0) $v_message .= "Not found the company id <br>";

    if($v_message==''){
        $arr_location = $cls_tb_location->select(array('company_id'=>(int) $v_search_company_id));
        $v_total_record = 0;
        foreach ($arr_location as $arr) {
            $v_location_id = isset($arr['location_id']) ? $arr['location_id'] : 0;

            $v_threshold_value = isset($_POST['txt_threshold_value_'.$v_location_id]) ? $_POST['txt_threshold_value_'.$v_location_id] : '';

            /* Delete old data */
            $cls_tb_location_group_threshold->delete(array('location_id'=>(int)$v_location_id,'group_id'=>(int)$v_search_group_product_id,'company_id'=>(int)$v_search_company_id));

            if($v_threshold_value!='')
            {
                $v_lg_threshold_id = (int) $cls_tb_location_group_threshold->select_next('lg_threshold_id');
                $cls_tb_location_group_threshold->set_lg_threshold_id($v_lg_threshold_id);
                $cls_tb_location_group_threshold->set_company_id((int)$v_search_company_id);
                $cls_tb_location_group_threshold->set_group_id((int)$v_search_group_product_id);
                $cls_tb_location_group_threshold->set_location_id((int)$v_location_id);
                $cls_tb_location_group_threshold->set_threshold_value((int)$v_threshold_value);
                $cls_tb_location_group_threshold->set_overflow(0);
                $cls_tb_location_group_threshold->set_threshold_note('');
                $v_result = $cls_tb_location_group_threshold->insert();
                if($v_result!='') $v_total_record++;
            }
        }
        $v_message = 'Total: <b>'. $v_total_record .' </b> records has updated!...';
    }
}

/*Get product group id */
$v_dsp = '';
$v_total = 1;

if($v_search_company_id>0){
    /* List location */
    $arr_main_contact = array();
    $arr_location = $cls_tb_location->select(array('company_id'=>(int) $v_search_company_id),array('location_number'=>1));
    foreach ($arr_location as $arr) {
        $v_location_id = isset($arr['location_id']) ? $arr['location_id'] : 0;
        $v_location_name = isset($arr['location_name']) ? $arr['location_name'] : '';
        $v_location_number = isset($arr['location_number']) ? $arr['location_number'] : '';
        $v_location_phone = isset($arr['location_phone']) ? $arr['location_phone'] : '';
        $v_main_contact = isset($arr['main_contact']) ? $arr['main_contact'] : 0;

        $v_where_clause = array('location_id'=>(int)$v_location_id,'group_id'=>(int)$v_search_group_product_id);
        $v_total_threshold = $cls_tb_location_group_threshold->select_scalar('threshold_value',$v_where_clause);

        if(!isset($arr_main_contact[$v_main_contact]))
            $arr_main_contact[$v_main_contact] = $cls_tb_contact->get_full_name_contact($v_main_contact);

        $v_dsp .='<tr>';
        $v_dsp .='<td>'. $v_total++.'&nbsp  </td>';
        $v_dsp .='<td>'. $v_location_number.'</td>';
        $v_dsp .='<td><b>'.  $arr_main_contact[$v_main_contact].'</b></td>';
        $v_dsp .='<td>'. $v_location_name.'</td>';
        $v_dsp .='<td>'. $v_location_phone.'</td>';
        $v_dsp .='<td><input  type="text" size="10px" name="txt_threshold_value_'.$v_location_id.'" id="txt_threshold_value"'.  ($v_total_threshold>=0?'value="'.$v_total_threshold.'"':'').' >
                        <input type="hidden" name="txt_hidden_location" id="txt_hidden_location" value="'.$v_location_id.'">
                </td>';
        $v_dsp .='</tr>';
    }
}


?>