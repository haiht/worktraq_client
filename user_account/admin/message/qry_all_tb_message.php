<?php if(!isset($v_sval)) die();?>
<?php
$v_quick_search = '';
$v_search_message_key = '';
$v_search_message_value = '';
$v_company_id = 0;
$v_page = 1;
if(isset($_POST['btn_advanced_search'])){
	$v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
}else if(isset($_POST['btn_advanced_reset'])){
}else{
	$v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
	$v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';
	if(isset($_SESSION['ss_tb_message_redirect']) && $_SESSION['ss_tb_message_redirect']==1){
		$v_page = isset($_SESSION['ss_tb_message_page'])?$_SESSION['ss_tb_message_page']:'1';
		settype($v_page,'int');
		if($v_page<1) $v_page = 1;
		if(isset($_SESSION['ss_tb_message_where_clause'])){
			$arr_where_clause = unserialize($_SESSION['ss_tb_message_where_clause']);
			if(isset($arr_where_clause['company_id'])) $v_company_id = $arr_where_clause['company_id'];
		}
		$v_quick_search = isset($_SESSION['ss_tb_message_quick_search'])?$_SESSION['ss_tb_message_quick_search']:'';
	}
    $v_search_message_key = $v_quick_search;
    $v_search_message_value = $v_quick_search;
}
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
//Add code here if required
?>