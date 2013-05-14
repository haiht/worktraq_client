<?php if(!isset($v_sval)) die();?>
<?php
$v_company_id = isset($_GET['id'])?$_GET['id']:0;
settype($v_company_id,'int');
if($v_company_id!=10000){
    $cls_tb_company->delete(array('company_id'=>$v_company_id));
}
redir($_SERVER['HTTP_REFERER']);
?>