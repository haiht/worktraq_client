<?php
if(!isset($v_sval)) die();
?>
<?php
$v_product_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_product_id, 'int');
$v_dsp_location_threshold = '';
$v_company_id = 0;
if($v_product_id==0){
    $v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:'0';
    settype($v_company_id, 'int');
    if($v_company_id<0) $v_company_id = 0;
}else{
    $v_company_id = $cls_tb_product->select_scalar('company_id', array('product_id'=>$v_product_id));
    if(is_null($v_company_id)) $v_company_id = 0;
}
if($v_company_id > 0){
    add_class('cls_tb_location_threshold');
    $cls_threshold = new cls_tb_location_threshold($db, LOG_DIR);


    $arr_threshold = $cls_threshold->select(array('company_id'=>$v_company_id, 'product_id'=>$v_product_id));
    $v_order = 1;

    $arr_exclude = array();
    foreach($arr_threshold as $arr){
        $v_tmp_location_id = $arr['location_id'];
        $v_tmp_product_id = $arr['product_id'];
        $v_tmp_product_threshold = $arr['product_threshold'];
        $v_tmp_is_overflow = $arr['is_overflow'];
        $v_tmp_status = $arr['status'];

        $v_location_name = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_tmp_location_id));
        $v_location_number = $cls_tb_location->select_scalar('location_number', array('location_id'=>$v_tmp_location_id));
        if(is_null($v_location_name)) $v_location_name = '';
        if($v_location_name!=''){
            $v_dsp_location_threshold .= '<tr align="center" valign="middle" id="tr_row">';
            $v_dsp_location_threshold .= '<td align="right">'.($v_order++).' <input type="checkbox" id="txt_status" checked="checked" value="'.$v_tmp_location_id.'" /></td>';
            $v_dsp_location_threshold .= '<td align="left">'.$v_location_name.'</td>';
            $v_dsp_location_threshold .= '<td align="right">'.$v_location_number.'</td>';
            $v_dsp_location_threshold .= '<td align="left"><input type="text" id="txt_threshold" value="'.$v_tmp_product_threshold.'" size="10" /><input type="hidden" id="txt_hidden_threshold" value="'.$v_tmp_product_threshold.'" /><input type="hidden" id="txt_hidden_location" value="'.$v_location_name.'" /></td>';
            $v_dsp_location_threshold .= '<td><input type="checkbox" id="txt_overflow"'.($v_tmp_is_overflow==1?' checked="checked"':'').' /></td>';
            $v_dsp_location_threshold .= '</tr>';
            $arr_exclude[] = $v_tmp_location_id;
        }
    }
    if(count($arr_exclude)>0)
        $arr_where = array('company_id'=>$v_company_id, 'location_id'=>array('$nin'=>$arr_exclude));
    else
        $arr_where = array('company_id'=>$v_company_id);
    $arr_location = $cls_tb_location->select($arr_where, array('location_name'=>1));
    foreach($arr_location as $arr){
        $v_location_name = $arr['location_name'];
        $v_location_number = $arr['location_number'];
        $v_tmp_location_id = $arr['location_id'];
        $v_dsp_location_threshold .= '<tr align="center" valign="middle" id="tr_row">';
        $v_dsp_location_threshold .= '<td align="right">'.($v_order++).' <input type="checkbox" id="txt_status" value="'.$v_tmp_location_id.'" /></td>';
        $v_dsp_location_threshold .= '<td align="left">'.$v_location_name.'</td>';
        $v_dsp_location_threshold .= '<td align="right">'.$v_location_number.'</td>';
        $v_dsp_location_threshold .= '<td align="left"><input type="text" id="txt_threshold" value="" size="10" disabled="disabled" /><input type="hidden" id="txt_hidden_threshold" value="" /><input type="hidden" id="txt_hidden_location" value="'.$v_location_name.'" /></td>';
        $v_dsp_location_threshold .= '<td><input type="checkbox" id="txt_overflow" /></td>';
        $v_dsp_location_threshold .= '</tr>';

    }
}
if($v_dsp_location_threshold!=''){
    $v_dsp_location_threshold = '<table id="tbl_location_threshold" width="100%" align="center" cellpadding="3" cellspacing="0" border="1">
    <tr align="center" valign="middle">
    <th>Ord.</th><th>Location\'s Name</th><th>Location\'s Number</th><th>Location Threshold</th><th>Overflow?</th>
    </tr>
    '.$v_dsp_location_threshold.'</table>';
}
$v_dsp_company = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
?>