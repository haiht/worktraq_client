<?php if(!isset($v_sval)) die();?>
<?php
$v_quick_search = '';
$v_search_po_number = '';
$v_search_order_ref = '';
$v_company_id = 0;
$v_page = 1;
if(isset($_POST['btn_advanced_search'])){
	$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
}else if(isset($_POST['btn_advanced_reset'])){
}else{
	$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
	$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
	if(isset($_SESSION['ss_tb_order_redirect']) && $_SESSION['ss_tb_order_redirect']==1){
		$v_page = isset($_SESSION['ss_tb_order_page'])?$_SESSION['ss_tb_order_page']:'1';
		settype($v_page,'int');
		if($v_page<1) $v_page = 1;
		if(isset($_SESSION['ss_tb_order_where_clause'])){
			$arr_where_clause = unserialize($_SESSION['ss_tb_order_where_clause']);
			if(isset($arr_where_clause['company_id'])) $v_company_id = $arr_where_clause['company_id'];
		}
		$v_quick_search = isset($_SESSION['ss_tb_order_quick_search'])?$_SESSION['ss_tb_order_quick_search']:'';
	}
    $v_search_po_number = $v_quick_search;
    $v_search_order_ref = $v_quick_search;
}
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
//Add code here if required

$arr_order_status = array();
$arr_option = $cls_settings->select_scalar('option', array('setting_name'=>'order_status'));
for($i=0;$i<count($arr_option);$i++){
    $v_status_id = $arr_option[$i]['id'];
    $v_status_name = $arr_option[$i]['name'];
    if($v_status_id>20){
        $arr_order_status[] = array('status_id'=>$v_status_id, 'status_name'=>$v_status_name);
    }
}
//print_r($arr_order_status);
?>