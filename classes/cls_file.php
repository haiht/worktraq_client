<?php

/**
 * @author Thanh Hai
 * @copyright 2011
 */

class ManageFile{
    private $ds = '/';
    private $dir = '';
    private $content='';
    
    public function __construct($dir, $ds = DIRECTORY_SEPARATOR){
        $this->dir = $dir;
        $this->ds = in_array($ds,array('/',"\\"))?$ds:'/';
    }
    public function callback_dir($dir, $step, $newline, $file=true){
       # do whatever you want here
       echo $step.($file?'-F-':'-D-').'-'."$dir".$newline;
    }
	public function set_dir($dir){
		$this->dir = $dir;
	}
    public function walk_dir($dir, & $root, $newline = '<br />'){
        $arStack = array();
        $arr_file = array();
        $arr_folder = array();
        //$this->callback_dir($dir, $root, $newline);
        $step = $root+1;
        if($dh = opendir($dir)){ 
            while( ($file=readdir($dh))!==false ){
                if( $file=='.' || $file=='..' ) continue;
                if( is_dir("$dir/$file") ){
                    //$this->callback_dir($file, $step, $newline,false);
                    if( !in_array("$dir/$file",$arStack) ) $arStack[]="$dir/$file";
                    $arr_folder[] = $file;
                }else if(is_file("$dir/$file")){
                    //$this->callback_dir($file, $step, $newline);
                    $arr_file[] = $file;
                }
            }
            asort($arr_file);
            asort($arr_folder);
            foreach($arr_file as $file)
                $this->callback_dir($file, $step, $newline);
            foreach($arr_folder as $file)
                $this->callback_dir($file, $step, $newline, false);
            
            closedir($dh);
        }
        if(count($arStack)){ 
            foreach( $arStack as $subdir ){
                $this->walk_dir($subdir, $step, $newline);
            }
        }
    }    
    
	public function draw_beatifull_tree_menu($p_root=''){
		$v_root = $p_root!=''?$p_root:$this->dir;
		$v_draw='';
		if($v_root!='' && file_exists($v_root)){
			$handle = opendir($v_root);
			if($handle){
				$arr_file = array();
				while(($file=readdir($handle))!==false){
					if($file=='.' || $file=='..') continue;
					if(is_dir($v_root.$this->ds.$file)){
						$v_draw .= '<li><span class="folder"><input type="radio" id="rd_folder" name="rd_folder" value="'.str_replace("\\","\\\\",$v_root.$this->ds.$file).'" />'.$file.'</span>';
						$v_tmp_draw = $this->draw_beatifull_tree_menu($v_root.$this->ds.$file);
						if($v_tmp_draw!=''){
							$v_draw .= '<ul>'.$v_tmp_draw.'</ul></li>';
						}else{
							$v_draw .= $v_tmp_draw.' <img src="images/icons/delete.png" style="cursor:pointer" onclick="delete_file(this,'."'".str_replace("\\","\\\\",$v_root.$this->ds.$file)."'".')" /></li>';
						}
					}else if(is_file($v_root.$this->ds.$file)){
						$v_dir = str_replace(ROOT_DIR.$this->ds,'', $v_root);
						$v_dir = str_replace("\\",'/',$v_dir).'/';
						$arr_file[] = array('file' => $file, 'dir'=>$v_dir);
					}
				}
				closedir($handle);
				for($i=0; $i<count($arr_file); $i++){
					$v_draw .= '<li><span class="file">'.$arr_file[$i]['file'].' [Liên kết: '.$arr_file[$i]['dir'].$arr_file[$i]['file'].'] <img src="images/icons/delete.png" style="cursor:pointer" onclick="delete_file(this,'."'".str_replace("\\","\\\\",$v_root.$this->ds.$arr_file[$i]['file'])."'".')" /></span></li>';
				}
				return $v_draw;
			}else{
				return '';
			}
		}else{
			return '';
		}
	}

    public function browse_dir($dir, $ext = ''){
        $arr_file = array();
        $arr_folder = array();
        $arr_return = array();
        if($dh = opendir($dir)){
            if($ext!=''){
                if(strpos($ext,'.')!==0){ 
                    $ext = '.'.$ext;
                }
                $ext = strtolower($ext);
            }
            $len = strlen($ext);
            while( ($file=readdir($dh))!==false ){
                if( $file=='.' || $file=='..' ) continue;
                if( is_dir("$dir/$file") ){
                    $arr_folder[] = $file;
                }else if(is_file("$dir/$file")){
                    if($ext!=''){
                        if((strpos($file,$ext)==(strlen($file)-$len))&& (strlen($file)>$len)) $arr_file[] = $file;
                    }else{
                        $arr_file[] = $file;
                    }
                }
            }
            asort($arr_file);
            asort($arr_folder);
            foreach($arr_folder as $file)
                $arr_return[] = $file;
            foreach($arr_file as $file)
                $arr_return[] = $file;
            closedir($dh);
        }
        return $arr_return;
    }    

    /**
     * Delete file
     * @param $file string: name of folder, which will be delete
     * @param $parent string: parent folder is optional, if it is empty, $dir folder in 
     * @return int: 1-> delete success, 0 -> delete non-success, -1 -> is file (non-folder), -2 -> folder is not exist
     */ 
    public function remove_file($file, $parent = ''){
        $rmfile = (($parent=='')?$this->dir:$parent).$this->ds.$file;
        if(file_exists($rmfile))
            if(is_file($rmfile)) 
                return @unlink($rmfile)?1:0;
            else
                return -1;
        else
            return -2;
    }
    /**
     * Delete directory
     * @param $dir string: name of folder, which will be delete
     * @param $parent string: parent folder is optional, if it is empty, $dir folder in 
     * @return int: 1-> delete success, 0 -> delete non-success, -1 -> is file (non-folder), -2 -> folder is not exist
     */ 
    public function remove_dir($dir, $parent = ''){
        $rmdir = (($parent=='')?$this->dir:$parent).$this->ds.$dir;
        if(file_exists($rmdir)){
            if(is_dir($rmdir))
                return @rmdir($rmdir)?1:0;
            else
                return -1;
        }else
            return -2;
    }
	
	function remove_dir_all($dir=''){
        if($dir=='') $dir = $this->dir;
        $ds = $this->ds!=''?$this->ds:DIRECTORY_SEPARATOR;
        if(strrpos($dir, $ds)===strlen($dir)) $dir = substr($dir,0,strlen($dir)-1);
		if(file_exists($dir)){
			$handle = opendir($dir);
			if($handle){
				while(($file=readdir($handle))!==false){
					if($file!='.' && $file!='..'){
						$v_dir = $dir.$ds.$file;
						if(is_file($v_dir))
							@unlink($v_dir);
						else if(is_dir($v_dir)) $this->remove_dir_all($v_dir);
					}
				}
                closedir($handle);
			}
			@rmdir($dir);
		}
	}
	
    public function get_file_content(){
        return $this->content;
    }
    
    public function set_file_content($content){
        $this->content = $content;
    }
    public function write_file($file, $parent = '', $mode = 'w'){
        $mode = in_array($mode,array('w', 'a'))?$mode:'w';
        $filename = (($parent=='')?$this->dir:$parent).$this->ds.$file;
        $fp = @fopen($filename,$mode);
        $len = strlen($this->content);
        if($fp){
            fwrite($fp, $this->content,$len);
            fflush($fp);
            fclose($fp);
            return 1;
        }else{
            return 0;
        }
    }
    public function read_file($file, $parent = ''){
        $filename = (($parent=='')?$this->dir:$parent).$this->ds.$file;
        if(!file_exists($filename)) return -2;
        if(!is_file($filename)) return -1;
        $fp = @fopen($filename, 'r');
        $size = filesize($filename);
        if($fp){
            $this->content = '';
            $this->content = fread($fp, $size);
            fclose($fp);
            return 1;
        }else{
            return 0;
        }
    }
    public function draw_list_folder_option($p_root='', $p_select='', $p_glue = ''){
        $v_ret = '';
        $v_root = $p_root!=''?$p_root:$this->dir;
        if(file_exists($v_root)){
            $v_handle = opendir($v_root);
            if($v_handle){
                while(($file = readdir($v_handle))!==false){
                    if($file!='.' && $file!='..'){
                        $v_file = $v_root.$this->ds.$file;
                        if(is_dir($v_file)){
                            $v_file = str_replace(getcwd().$this->ds,'',$v_file);
                            $v_ret .= '<option value="'.$v_file.'"'.($v_file==$p_select?' selected="selected"':'').'>'.$p_glue.$file.'</option>';
                            //echo $file.'<br>';
                            $v_ret .= $this->draw_list_folder_option($v_file, $p_select, $p_glue.'--');
                        }
                    }
                }
                closedir($v_handle);
            }
        }
        return $v_ret;
    }

    public function list_folder($p_root='', $p_dim = '', array $arr_return=array()){
        if(is_null($arr_return) || !is_array($arr_return)) $arr_return = array();
        $v_root = $p_root!=''?$p_root:$this->dir;
        if(file_exists($v_root)){
            $v_handle = opendir($v_root);
            if($v_handle){
                while(($file = readdir($v_handle))!==false){
                    if($file!='.' && $file!='..'){
                        $v_file = $v_root.$this->ds.$file;
                        if(is_dir($v_file)){
                            $v_value = str_replace($p_dim,'',$v_file);
                            $v_value = str_replace($this->ds, '/', $v_value);
                            $arr_return[] = array(
                                'folder_value'=>$v_value,
                                'folder_text'=>$v_value
                            );

                            $arr_return = $this->list_folder($v_file, $p_dim, $arr_return);
                        }
                    }
                }
                closedir($v_handle);
            }
        }
        return $arr_return;
    }
}
?>