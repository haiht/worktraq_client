<?php if (!isset($v_sval)) die(); ?>
<?php
add_class('cls_tb_province');
$cls_tb_province = new cls_tb_province($db);
$v_address_province ='';
$v_address_contry_id = isset($_REQUEST['txt_address_country_id']) ?$_REQUEST['txt_address_country_id'] : 0;
$v_type = isset($_REQUEST['txt_type']) ?$_REQUEST['txt_type'] : 0;

$v_dsp = "";
if($v_address_contry_id==15 || $v_address_contry_id==72 ){
    if($v_type=='shipping')
        $v_dsp = "<select name='txt_shipped_address_province'>";
    else
        $v_dsp = "<select name='txt_address_province'>";
    $v_dsp .= $cls_tb_province->draw_option('province_name','province_name','',array('country_id'=>(int)$v_address_contry_id ));
    $v_dsp .= "</select>";
}
else
{
   if($v_type=='shipping')
       $v_dsp .= '<input class="" size="50" type="text" id="txt_shipped_address_province" name="txt_shipped_address_province" value="'. $v_address_province .'" />';
   else
       $v_dsp .= '<input class="" size="50" type="text" id="txt_address_province" name="txt_address_province" value="'. $v_address_province .'" />';

}
echo $v_dsp;
?>