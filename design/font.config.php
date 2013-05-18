<?php
$arr_fonts = array();
$arr_fonts[] = array('key'=>'arial', 'name'=>"Arial", "bold"=>true, "italic"=>true);
$arr_fonts[] = array('key'=>'arialnarrow', 'name'=>"Arial Narrow", "bold"=>true, "italic"=>true);
$arr_fonts[] = array('key'=>'charissil', 'name'=>"Charis SIL", "bold"=>true, "italic"=>true);
$arr_fonts[] = array('key'=>'myriad', 'name'=>"Myriad Pro", "bold"=>true, "italic"=>true);
$arr_fonts[] = array('key'=>'segoeui', 'name'=>"Segoe UI", "bold"=>true, "italic"=>true);
$arr_fonts[] = array('key'=>'tahoma', 'name'=>"Tahoma", "bold"=>true, "italic"=>false);
$arr_fonts[] = array('key'=>'times', 'name'=>"Times New Roman", "bold"=>true, "italic"=>true);
$arr_fonts[] = array('key'=>'tuffy', 'name'=>"Tuffy", "bold"=>true, "italic"=>true);
$arr_fonts[] = array('key'=>'verdana', 'name'=>"Verdana", "bold"=>true, "italic"=>true);
$arr_fonts[] = array('key'=>'vnaptima', 'name'=>"VNI-Aptima", "bold"=>true, "italic"=>true);
$arr_fonts[] = array('key'=>'vnbodon', 'name'=>"VNI-Bodon", "bold"=>true, "italic"=>true);
$arr_fonts[] = array('key'=>'vnbook', 'name'=>"VNI-Book", "bold"=>true, "italic"=>true);
$arr_fonts[] = array('key'=>'vnhelve', 'name'=>"VNI-Helve", "bold"=>true, "italic"=>true);
$arr_fonts[] = array('key'=>'vnmeli', 'name'=>"VNI-Meli", "bold"=>true, "italic"=>true);
$arr_fonts[] = array('key'=>'vntimes', 'name'=>"VNI-Times", "bold"=>true, "italic"=>true);


$v_dsp_font = '';
for($i=0;$i<count($arr_fonts);$i++)
    $v_dsp_font .= ($v_dsp_font==''?'':','). '"'.$arr_fonts[$i]['name'].'": {"bold":'.($arr_fonts[$i]['bold']?'true':'false').', "italic": '.($arr_fonts[$i]['italic']?'true':'false').'}';


function get_font_key($p_name){
    global $arr_fonts;
    $i = 0;
    $v_found = false;
    while($i<count($arr_fonts) && ! $v_found){
        $v_found = $arr_fonts[$i]['name']==$p_name;
        $i++;
    }
    return $i>0?$arr_fonts[$i-1]['key']:'';
}
?>