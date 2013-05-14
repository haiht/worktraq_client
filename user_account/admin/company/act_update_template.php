<?php if(!isset($v_sval)) die();
$v_ajax_no =isset($_POST['txt_ajax_no']) ? $_POST['txt_ajax_no'] : 101 ;
?>
<?php
    if($v_ajax_no==101){
        $v_template_id =  isset($_POST['txt_template_id'])?$_POST['txt_template_id']:0;
        $v_company_id = isset($_POST['txt_company_id'])?$_POST['txt_company_id']:0;

        add_class("cls_tb_template");
        $cls_tb_template = new cls_tb_template($db);

        add_class("cls_tb_company");
        $cls_tb_company = new cls_tb_company($db,LOG_DIR);

        $arr_template_log = $cls_tb_company->select_scalar('template_log',array('company_id'=>(int)$v_company_id));
        $v_count = count($arr_template_log);
        $v_selected = false;
        $arr_element = array();
        for($i=0;$i<$v_count;$i++){
            $v_temp_template_id = isset($arr_template_log[$i]['template_id']) ? $arr_template_log[$i]['template_id'] : '';
            if($v_temp_template_id==$v_template_id){

                $v_selected = true;
                $arr_element = isset($arr_template_log[$i]['element']) ? $arr_template_log[$i]['element'] : array();
                $i= $v_count;
            }
        }
    }

?>