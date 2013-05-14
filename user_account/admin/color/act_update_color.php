<?php if (!isset($v_sval)) die(); ?>
<?php
$_SESSION['error_color'] = "";
$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
if(!is_null($v_mongo_id)) $v_mongo_id = new MongoID($v_mongo_id);
$cls_tb_color->set_mongo_id($v_mongo_id);

$v_color_name = isset($_POST['txt_color_name'])?$_POST['txt_color_name']:'';
$v_color_name = trim($v_color_name);
if($v_color_name=='') $_SESSION['error_color'] .= 'Color name is empty!<br />';
$cls_tb_color->set_color_name($v_color_name);

$v_color_id = isset($_POST['txt_color_id'])?$_POST['txt_color_id']:0;
$v_color_id = (int) $v_color_id;

if($_SESSION['error_color']!='')
{
    if($v_color_id==0)
    {
        $v_color_id = $cls_tb_color->select_next('color_id');
        $cls_tb_color->set_color_id($v_color_id);
        $cls_tb_color->insert();
    }
    else
    {
        $cls_tb_color->update(array('color_id' => $v_color_id));
    }
    redir($_SERVER['HTTP_REFERER']);
}
else
{
    redir(URL.$v_admin_key.'/'.$v_color_id.'/edit/error');

}



?>