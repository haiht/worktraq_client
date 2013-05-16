<?php if (!isset($v_sval)) die(); ?>
<?php
$tpl_content = new Template('dsp_home.tpl',$v_dir_templates);
$v_slider_url = RESOURCE_URL.$_SESSION['company_code'].'/slider/';
require 'classes/cls_tb_notice.php';
$cls_tb_note = new cls_tb_notice ($db,LOG_DIR);
$arr_note  = $cls_tb_note->select(array('$or'=>array(array('notice_company' => new MongoRegex("/".$_SESSION['company_id']."/")),
array('notice_company'=> new MongoRegex("/0/") ))));
$v_note = '';
$v_note_title_all='';
$v_note_description_all='';
foreach($arr_note as $arr){
    $v_note_title = isset($arr['title']) ?$arr['title'] : 0;
    $v_note_description = isset($arr['description']) ?$arr['description'] :0;
    $v_date_closed  = isset($arr['date_closed']) ?$arr['date_closed'] :date('d-M-Y');
    if(date('d-M-Y') <= $v_date_closed)
    {
        $v_note_title_all.=$v_note_title;
        $v_note_description_all.=$v_note_description;
    }
}
if($v_note_title_all!=''){
    $tpl_content->set('NOTICE_DISPLAY',  '');
    $tpl_content->set('NOTICE_TITLE',  $v_note_title_all);
    $tpl_content->set('NOTICE_DESCRIPTION',  $v_note_description_all);
}
else{
    $tpl_content->set('NOTICE_DISPLAY',  'display:none');
    $tpl_content->set('NOTICE_TITLE',  '');
    $tpl_content->set('NOTICE_DESCRIPTION',  '');
}
$tpl_content->set('SLIDE_IMAGE_URL',  $v_slider_url);
$tpl_content->set('URL_TEMPLATES',  $v_templates);
$tpl_content->set('URL',  URL);
$tpl_content->set('LOGO',isset($_SESSION['SRC_LOGO'])?$_SESSION['SRC_LOGO']:'');
echo $tpl_content->output();
?>