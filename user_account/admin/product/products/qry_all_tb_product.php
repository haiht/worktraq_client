<?php if(!isset($v_sval)) die();?>
<?php
add_class('cls_tb_tag');
$cls_tb_tag = new cls_tb_tag($db, LOG_DIR);
$arr_product_tag = array();
$v_quick_search = '';
$v_page = 1;
if(isset($_POST['btn_advanced_search'])){
    $v_company_id = isset($_POST['txt_search_company_id'])?$_POST['txt_search_company_id']:'0';
    $v_search_product_sku = isset($_POST['txt_search_product_sku'])?$_POST['txt_search_product_sku']:'';
    $v_search_short_description = isset($_POST['txt_search_short_description'])?$_POST['txt_search_short_description']:'';
    $arr_product_tag = isset($_POST['txt_search_product_tag'])?$_POST['txt_search_product_tag']:array();
    if(!is_array(($arr_product_tag)))
        $arr_product_tag = array();
    else if(count($arr_product_tag)>0){
        for($i=0; $i<count($arr_product_tag);$i++)
            $arr_product_tag[$i] = (int) ($arr_product_tag[$i]);
    }
}else if(isset($_POST['btn_advanced_reset'])){
    $v_company_id = 0;
    $v_search_product_sku = '';
    $v_search_short_description = '';
    $arr_product_tag = array();
}else{
    $v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:(isset($v_company_id)?$v_company_id:'0');
    $v_quick_search = isset($_POST['txt_quick_search'])?$_POST['txt_quick_search']:'';

    if(isset($_SESSION['ss_tb_product_redirect']) && $_SESSION['ss_tb_product_redirect']==1){
        $v_page = isset($_SESSION['ss_tb_product_page'])?$_SESSION['ss_tb_product_page']:'1';
        settype($v_page,'int');
        if($v_page<1) $v_page = 1;
        if(isset($_SESSION['ss_tb_product_where_clause'])){
            $arr_where_clause = unserialize($_SESSION['ss_tb_product_where_clause']);
            if(isset($arr_where_clause['company_id'])) $v_company_id = $arr_where_clause['company_id'];
        }
        $v_quick_search = isset($_SESSION['ss_tb_product_quick_search'])?$_SESSION['ss_tb_product_quick_search']:'';
    }
    $v_search_product_sku = $v_quick_search;
    $v_search_short_description = $v_quick_search;
}
settype($v_company_id, 'int');
$v_dsp_company_option = $cls_tb_company->draw_option('company_id', 'company_name', $v_company_id);
//Add code here if required

$arr_tag = $cls_tb_tag->select(array('company_id'=>(int) $v_company_id));
$arr_all_tag = array();
foreach($arr_tag as $arr){
    $arr_all_tag[] = array('tag_id'=>$arr['tag_id'], 'tag_name'=>$arr['tag_name']);
}
$v_dsp_tag_script = "\nvar tag = ".json_encode($arr_all_tag).";";
?>