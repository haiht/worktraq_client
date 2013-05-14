<?php if(!isset($v_sval)) die();?>
<?php
$v_theme = isset($_POST['txt_theme'])?$_POST['txt_theme']:'';
$v_remember = isset($_POST['txt_remember'])?$_POST['txt_remember']:'0';
settype($v_remember, 'int');
if($v_remember!=1) $v_remember = 0;
if($v_theme=='') $v_theme = 'blueopal';
$v_theme_file = 'theme.'.$v_theme.'.css';
$v_dir = ROOT_DIR.DS.'lib'.DS.'css'.DS.$v_theme_file;
if(!file_exists($v_dir)) $v_theme = 'blueopal';
$v_user_name = isset($arr_user['user_name'])?$arr_user['user_name']:'unknown';
if($v_remember==1){
    $v_dir = ROOT_DIR.DS.'resources';
    if(file_exists($v_dir)){
        $v_theme_file = $v_dir. DS.THEMES_SAVED;
        $v_content = '';
        if(file_exists($v_theme_file)){
            $fp = fopen($v_dir, 'r');
            $v_content = fread($fp, filesize($v_theme_file));
            fclose($fp);
        }
        if($v_content!=''){
            $arr_content = unserialize($v_content);
        }
        if(!isset($arr_content) || !is_array($arr_content)) $arr_content = array();
        $arr_content[$v_user_name]['admin_theme'] = $v_theme;
        $fp = fopen($v_theme_file, 'w');
        $v_content = serialize($arr_content);
        fwrite($fp, $v_content, strlen($v_content));
        fflush($fp);
        fclose($fp);
    }
}
$arr_user['user_theme'] = $v_theme;
$_SESSION['ss_user'] = serialize($arr_user);
setcookie($v_user_name.'_admin_theme', $v_theme, time()+3600*24*7,'/');
?>