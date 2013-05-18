<?php
function get_image_info($p_sid, $p_id, $p_root_dir = USER_UPLOAD_DIR, $p_ds = DS_DS, $p_user_file=FILEDATA,  $p_no_session = false){
    $arr_return = array();
    $v_file = $p_root_dir.$p_ds.$p_user_file;
    if(file_exists($v_file)){
        $fp = fopen($v_file, 'r');
        $v_size  = filesize($v_file);
        $v_cont = fread($fp, $v_size);
        fclose($fp);
        $arr_cont = unserialize($v_cont);
        if(is_array($arr_cont)){
            $v_index = -1;
            for($i=0; $i<count($arr_cont) && $v_index==-1;$i++){
                if(($arr_cont[$i]['delete']==0 && $arr_cont[$i]['session']==$p_sid && $i==$p_id) || ($p_no_session && $p_id==$i)) $v_index = $i;
            }
            if($v_index>-1) $arr_return = $arr_cont[$v_index];
        }
    }
    return $arr_return;
}

function save_image_info(array $arr_info = array(), $p_root_dir = USER_UPLOAD_DIR, $p_ds = DS_DS, $p_user_file=FILEDATA){
    $v_file = $p_root_dir.$p_ds.$p_user_file;
    $v_return_id = -1;
    $arr_cont = array();
    if(file_exists($v_file)){
        $fp = fopen($v_file, 'r');
        $v_size  = filesize($v_file);
        $v_cont = fread($fp, $v_size);
        fclose($fp);
        $arr_cont = unserialize($v_cont);
        if(!is_array($arr_cont)) $arr_cont = array();
    }
    $v_return_id = count($arr_cont);
    $arr_cont[$v_return_id] = $arr_info;
    $v_cont = serialize($arr_cont);
    $fp = fopen($v_file, 'w');
    fwrite($fp, $v_cont, strlen($v_cont));
    fflush($fp);
    fclose($fp);

    return $v_return_id;
}

function delete_image_info($p_sid, $p_image_id, $p_root_dir = USER_UPLOAD_DIR, $p_ds = DS_DS, $p_user_file=FILEDATA){
    $v_file = $p_root_dir.$p_ds.$p_user_file;
    $v_return_id = -1;
    if(file_exists($v_file)){
        $fp = fopen($v_file, 'r');
        $v_size  = filesize($v_file);
        $v_cont = fread($fp, $v_size);
        fclose($fp);
        $arr_cont = unserialize($v_cont);
        if(is_array($arr_cont)){
            for($i=0; $i<count($arr_cont) && $v_return_id==-1; $i++){
                if($arr_cont[$i]['delete']==0 && $arr_cont[$i]['session']==$p_sid && $i==$p_image_id) $v_return_id = $i;
            }
        }
        if($v_return_id>-1){
            $arr_info = $arr_cont[$v_return_id];
            $arr_info['delete'] = 1;
            $arr_cont[$v_return_id] = $arr_info;
            $v_cont = serialize($arr_cont);
            $fp = fopen($v_file, 'w');
            fwrite($fp, $v_cont, strlen($v_cont));
            fflush($fp);
            fclose($fp);
        }
    }
    return $v_return_id;
}

function list_user_image($p_sid, $p_root_dir = USER_UPLOAD_DIR, $p_ds = DS_DS, $p_user_file=FILEDATA){
    $arr_return = array();
    $v_file = $p_root_dir.$p_ds.$p_user_file;
    if(file_exists($v_file)){
        $fp = fopen($v_file, 'r');
        $v_size  = filesize($v_file);
        $v_cont = fread($fp, $v_size);
        fclose($fp);
        $arr_cont = unserialize($v_cont);
        if(is_array($arr_cont)){
            for($i=0; $i<count($arr_cont); $i++){
                if($arr_cont[$i]['delete']==0 && $arr_cont[$i]['session']==$p_sid){
                    $v_image = $arr_cont[$i]['name'];

                    if(file_exists($p_root_dir.$p_ds.$v_image)){
                        $arr_return[] = array(
                            "dpi"=>0
                            ,"extension"=>$arr_cont[$i]['extension']
                            ,"fotolia_id"=>null
                            ,"height"=>$arr_cont[$i]['height']
                            ,"width"=>$arr_cont[$i]['width']
                            ,"id"=>$i
                            ,"is_public"=>0
                            ,"is_vector"=>0
                            ,"name"=>$v_image
                            ,"svg_id"=>null
                            ,"svg_original_colors"=>null
                        );
                    }

                }
            }
        }
    }
    return $arr_return;
}

if(!function_exists('imageantialias')){
    function imageantialias($im, $p_flag){
        return $p_flag;
    }
}
?>