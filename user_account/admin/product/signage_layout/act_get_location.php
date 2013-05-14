<?php if (!isset($v_sval)) die(); ?>
<?php
$v_company_id = isset($_REQUEST['txt_company_id']) ? $_REQUEST['txt_company_id'] :0;

$v_dsp_location = '<select name="txt_location_id" id="txt_location_id">';
$v_dsp_location .= '<option value=0 selected> -- Choise Location --</option>';
$v_dsp_location .=  $cls_tb_location->draw_option('location_id','location_banner',0,array('company_id'=>(int)$v_company_id));
$v_dsp_location .= '</select>';
echo $v_dsp_location;
?>