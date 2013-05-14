<?php if(!isset($v_sval)) die();?>
<?php
$_SESSION['error_country'] = "";

$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
if(!is_null($v_mongo_id)) $v_mongo_id = new MongoID($v_mongo_id);
$cls_tb_conutry->set_mongo_id($v_mongo_id);

$v_country_id = isset($_POST['txt_country_id'])?$_POST['txt_country_id']:0;
$v_country_id = (int) $v_country_id;
if($v_country_id==0) $cls_tb_conutry->set_country_id($v_country_id);
else $cls_tb_conutry->set_country_id($v_country_id,false);

$v_country_name = isset($_POST['txt_country_name'])?$_POST['txt_country_name']:'';
$v_country_name = trim($v_country_name);
if($v_country_name=='') $_SESSION['error_country'] .= ' Country Name is empty!<br />';
$cls_tb_conutry->set_country_name($v_country_name);

$v_country_key = isset($_POST['txt_country_key'])?$_POST['txt_country_key']:'';
$v_country_key = trim($v_country_key);
if($v_country_key=='') $_SESSION['error_country'] .= 'Country Key is empty!<br />';
$cls_tb_conutry->set_country_key(strtoupper( $v_country_key));

$v_country_order = isset($_POST['txt_country_order'])?$_POST['txt_country_order']:0;
$v_country_order = (int) $v_country_order;
if($v_country_order<0) $_SESSION['error_country'] .= 'Country Order is negative!<br />';
$cls_tb_conutry->set_country_order($v_country_order);

$v_country_status = isset($_POST['txt_country_status'])?$_POST['txt_country_status']:0;
$v_country_status = (int) $v_country_status;
$cls_tb_conutry->set_country_status($v_country_status);

if($_SESSION['error_country']==''){
    if($v_country_id==0){
        $cls_tb_conutry->insert();
    }
    else
        $cls_tb_conutry->update(array('country_id' => (int)$v_country_id));
    redir(URL.$v_admin_key);
}
else
{

}


?>