<?php
if (!isset($v_sval)) die();
/**
 * User: longtt
 * Date: 11/24/12
 * Time: 2:06 PM
 */
?>
<?php
$_SESSION['error_material'] = "";

$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
if(!is_null($v_mongo_id)) $v_mongo_id = new MongoID($v_mongo_id);
$cls_tb_metarial->set_mongo_id($v_mongo_id);

$v_material_name = isset($_POST['txt_material_name'])?$_POST['txt_material_name']:$v_material_name;
$v_material_name = trim($v_material_name);
if($v_material_name=='') $_SESSION['error_material'] .=  ' Material Name is empty!<br />';
$cls_tb_metarial->set_material_name($v_material_name);

$v_material_description = isset($_POST['txt_material_description'])?$_POST['txt_material_description']:$v_material_description;
$v_material_description = trim($v_material_description);

$cls_tb_metarial->set_material_description($v_material_description);

$v_material_id = isset($_POST['txt_material_id'])?$_POST['txt_material_id']:$v_material_id;
$v_material_id = (int) $v_material_id;

if($_SESSION['error_material']==''){
    $cls_tb_metarial->set_material_id($v_material_id);

    if($v_material_id==0)
    {
        $v_material_id = $cls_tb_metarial->select_next('material_id');
        $cls_tb_metarial->set_material_id($v_material_id);
        $cls_tb_metarial->insert();
    }
    else
        $cls_tb_metarial->update(array('material_id' => $v_material_id));

    redir($_SERVER['HTTP_REFERER']);
}
else
{
    redir(URL.$v_admin_key.'/'.$v_material_id.'/edit/error');
}

?>