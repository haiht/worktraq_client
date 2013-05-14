<?php
if(!isset($v_sval)) die();
?>
<?php
$arr_all_country = array();
$arr_all_country[] = array(
    'country_id'=>0,
    'country_name'=>'--------',
    'country_key'=>''
);
$arr_country = $cls_tb_country->select(array(), array('this.country_key.toLowerCase()'=>1));
foreach($arr_country as $arr){
    $v_country_id = $arr['country_id'];
    $v_country_name = $arr['country_name'];
    $v_country_key = strtolower($arr['country_key']);
    $arr_all_country[] = array(
        'country_id'=>$v_country_id,
        'country_name'=>$v_country_name,
        'country_key'=>$v_country_key
    );
}
header("Content-type: application/json");
echo json_encode($arr_all_country);

?>