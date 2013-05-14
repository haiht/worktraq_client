<?php
if(!isset($v_sval)) die();

$v_user_id = isset($_POST['txt_user_id'])?$_POST['txt_user_id']:'0';
$v_user_rule = isset($_POST['txt_user_rule'])?$_POST['txt_user_rule']:'';
settype($v_user_id, 'int');

$arr_return = array('error'=>0, 'message'=>'');
if($v_user_id>0){
    if(get_magic_quotes_gpc()) $v_user_rule = stripcslashes($v_user_rule);
    $arr_user_rule = array();
    $v_line='';
    if($v_user_rule!=''){
        $arr_tmp_user_rule = json_decode($v_user_rule, true);
        if(is_array($arr_tmp_user_rule)){
            for($i=0; $i<count($arr_tmp_user_rule);$i++){
                $v_menu = $arr_tmp_user_rule[$i][0];
                $v_key = $arr_tmp_user_rule[$i][1];
                $v_description = $arr_tmp_user_rule[$i][2];
                $arr_user_rule[$v_menu][$v_key] = $v_description;
            }
        }
    }
    $v_ret = $cls_tb_user->update_field('user_rule', $arr_user_rule, array('user_id'=>$v_user_id));
    if($v_ret){
        $arr_return['message']='Update user\'s rules successful!';
    }else{
        $arr_return['error']=2;
        $arr_return['message']='Update user\'s rules error!!!';
    }
}else{
    $arr_return['error']=1;
    $arr_return['message']='Negative User ID!';
}
die(json_encode($arr_return));
?>