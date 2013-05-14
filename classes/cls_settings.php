<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ANVYINC
 * Date: 11/17/12
 * Time: 10:09 AM
 * To change this template use File | Settings | File Templates.
 */
 
class cls_settings{
    private $collection = NULL;
    private $v_error_code = 0;
    private $v_error_message = '';
    private $v_dir = '';
    private $v_is_log = true;
    private $v_setting_id = 0;
    private $v_setting_name = '';
    private $v_setting_description = '';
    private $v_setting_type = 0;
    private $v_option = '';
    private $v_status = '';


    public function __construct(MongoDB $db, $p_log_dir=''){
        $this->v_is_log = $p_log_dir!='' && file_exists($p_log_dir) && is_writable($p_log_dir);
        if($this->v_is_log) $this->v_dir = $p_log_dir.DIRECTORY_SEPARATOR;
        $this->collection = $db->selectCollection('tb_settings');
        $this->collection->ensureIndex(array("setting_id"=>1), array('name'=>"setting_id_key", "unique"=>1, "dropDups" => 1));
    }

    public function get_setting_id(){
        return $this->v_setting_id;
    }
    public function get_setting_name(){
        return $this->v_setting_name;
    }
    public function set_setting_id($p_setting_id){
        $this->v_setting_id = $p_setting_id;
    }
    public function set_setting_name($p_setting_name){
        $this->v_setting_name = $p_setting_name;
    }
    public  function set_setting_option($arr_option){
        $this->v_option = $arr_option;
    }
    public function get_setting_option(){
        return $this->v_option;
    }
    public  function set_setting_status($p_status){
        $this->v_status = $p_status;
    }
    public function get_setting_status(){
        return $this->v_status;
    }
    public function get_setting_description(){
        return $this->v_setting_description;
    }
    public function set_setting_description($p_setting_description){
        $this->v_setting_description = $p_setting_description;
    }
    public function get_setting_type(){
        return $this->v_setting_description;
    }
    public function set_setting_type($p_setting_type){
        $this->v_setting_type = (int) $p_setting_type;
    }

    /**
     *  function write log
     */
    private function my_error(){
        if(! $this->v_is_log) return;
        global $_SERVER;
        $v_filename = 'tb_settings.log';
        //$v_log_str = '--------------Log: '.date('Y-m-d H:i:s');
        $v_log_str = "\r\n".(isset($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:'No QUERY STRING');
        $v_log_str .= "\r\n".(isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:' No REQUEST URI');
        $v_log_str .= "\r\n".$this->v_error_message.' ['.$this->v_error_code.']';
        $v_log_str .= "\r\n----------------End Log-----------------";
        $v_log_str .= "\r\n";
        $v_new_file = false;
        if(file_exists($this->v_dir.$v_filename)){
            if(filesize($this->v_dir.$v_filename) > 1024000){
                rename($this->v_dir.$v_filename, $this->v_dir.str_replace('.log','', $v_filename).'_'.date('Y-m-d_H:i:s').'.log');
                $v_new_file = true;
                @unlink($this->v_dir.$v_filename);
            }
        }
        $fp = fopen($this->v_dir.$v_filename,$v_new_file?'w':'a+');
        if($fp){
            fwrite($fp, $v_log_str, strlen($v_log_str));
            fflush($fp);
            fclose($fp);
        }
    }

    /**
     * @param $p_setting_name string: setting name can dua vao
     * @param $p_start_id
     * @param $p_selected_id int: index selected in option tag
     * @return string: list option tag
     * @example:
     *              $cls = new cls_settings(MongoDB $db);
     *              echo $cls->draw_option_by_id('contact_type', 0, 2);
     */
    public function draw_option_by_id($p_setting_name, $p_start_id, $p_selected_id, array $arr_exclude = array()){
        $arr_where = array('setting_name'=>$p_setting_name, 'status'=>0);
        $arr_row = $this->collection->find($arr_where)->limit(1);
        $v_ret = '';
        foreach($arr_row as $arr){
            $arr_option = $arr['option'];
        }
        if(isset($arr_option) && is_array($arr_option)){
            asort($arr_option,1);
            for($i=$p_start_id; $i<count($arr_option); $i++){
                $v_status =  isset($arr_option[$i]['status']) ? $arr_option[$i]['status'] : 0;
                if(!in_array($i, $arr_exclude) && $v_status==0 )
                    $v_ret .= '<option value="'.$arr_option[$i]['id'].'"'.($arr_option[$i]['id']==$p_selected_id?' selected="selected"':'').'>'.$arr_option[$i]['name'].'</option>';
            }
        }
        return $v_ret;
    }

    /**
     * @param $p_field_name
     * @param array $arr_where
     * @return int
     */
    public function select_next($p_field_name, array $arr_where = array()){
        $arr_order = array($p_field_name => -1);//last insert show first
        $rss = $this->collection->find($arr_where)->sort($arr_order)->limit(1);
        $v_ret = 0;
        foreach($rss as $arr){
            if(isset($arr[$p_field_name])) $v_ret = $arr[$p_field_name];
        }
        return ((int) $v_ret)+1;
    }

    /**
     * @param $p_setting_name string: setting name can dua vao
     * @param $p_start_id
     * @param $p_selected_key string: key selected in option tag
     * @return string: list option tag
     * @example:
     *              $cls = new cls_settings(MongoDB $db);
     *              echo $cls->draw_option_by_id('contact_type', 0, 'active');
     */

    public function draw_option_by_key($p_setting_name, $p_start_id, $p_selected_key){
        $arr_where = array('setting_name'=>$p_setting_name, 'status'=>0);
        $arr_row = $this->collection->find($arr_where)->limit(1);       
        
        $v_ret = '';
        foreach($arr_row as $arr){
            $arr_option = $arr['option'];          
        }
        
        if(isset($arr_option) && is_array($arr_option)){
            asort($arr_option,1);
            for($i=$p_start_id; $i<count($arr_option); $i++){
                $v_staus =  isset($arr_option[$i]['status']) ? $arr_option[$i]['status'] : 1;
                if($v_staus==0)
                $v_ret .= '<option value="'.$arr_option[$i]['key'].'"'.($arr_option[$i]['key']==$p_selected_key?' selected="selected"':'').'>'.$arr_option[$i]['name'].'</option>';
            }            
        }
        return $v_ret;
    }

    /**
     * @param $p_setting_name string: setting_name to reference
     * @param $p_selected_id int: index, that want to get
     * @param string $p_missing_name string: value return when missing
     * @return string
     */
    function get_option_name_by_id($p_setting_name, $p_selected_id, $p_missing_name='---'){
        $arr_where = array('setting_name'=>$p_setting_name, 'status'=>0);
        $arr_row = $this->collection->find($arr_where)->limit(1);
        $v_ret = '';
        foreach($arr_row as $arr){
            $arr_option = $arr['option'];
        }
        if(isset($arr_option) && is_array($arr_option)){
            //$v_ret = isset($arr_option[$p_selected_id]['key'])?$arr_option[$p_selected_id]['name']:$p_missing_name;
            $v_stop = false;
            for($i=0; $i<count($arr_option) && ! $v_stop; $i++){
                if($arr_option[$i]['id']==$p_selected_id){
                    $v_ret = $arr_option[$i]['name'];
                    $v_stop = true;
                }
            }
        }
        return $v_ret!=''?$v_ret:$p_missing_name;
    }

    /**
     * @param $p_setting_name
     * @param $p_selected_id
     * @param string $p_missing_name
     */
    function get_option_key_by_id($p_setting_name, $p_selected_id, $p_missing_name='---'){
        $arr_where = array('setting_name'=>$p_setting_name, 'status'=>0);
        $arr_row = $this->collection->find($arr_where)->limit(1);
        $v_ret = '';
        foreach($arr_row as $arr){
            $arr_option = $arr['option'];
        }
        if(isset($arr_option) && is_array($arr_option)){
            $v_stop = false;
            for($i=0; $i<count($arr_option) && ! $v_stop; $i++){
                if($arr_option[$i]['id']==$p_selected_id){
                    $v_ret = $arr_option[$i]['key'];
                    $v_stop = true;
                }
            }
        }
        return $v_ret!=''?$v_ret:$p_missing_name;
    }

    function get_option_id_by_key($p_setting_name, $p_selected_key, $p_missing_name='---'){
        $arr_where = array('setting_name'=>$p_setting_name, 'status'=>0);
        $arr_row = $this->collection->find($arr_where)->limit(1);
        $v_ret = '';
        foreach($arr_row as $arr){
            $arr_option = $arr['option'];
        }
        if(isset($arr_option) && is_array($arr_option)){
            $v_stop = false;
            for($i=0; $i<count($arr_option) && ! $v_stop; $i++){
                if($arr_option[$i]['key']==$p_selected_key){
                    $v_ret = $arr_option[$i]['id'];
                    $v_stop = true;
                }
            }
        }
        return $v_ret!=''?$v_ret:$p_missing_name;
    }


    /**
     * @param $p_setting_name string: setting_name to reference
     * @param $p_selected_key string: index key, that want to get
     * @param string $p_missing_name string: value return when missing
     * @return string
     */
    function get_option_name_by_key($p_setting_name, $p_selected_key, $p_missing_name='---'){
        $arr_where = array('setting_name'=>$p_setting_name, 'status'=>0);
        $arr_row = $this->collection->find($arr_where)->limit(1);
        $v_ret = '';
        foreach($arr_row as $arr){
            $arr_option = $arr['option'];
        }
        if(isset($arr_option) && is_array($arr_option)){
            asort($arr_option,1);
            for($i=0; $i<count($arr_option); $i++){
                if($arr_option[$i]['key']==$p_selected_key) $v_ret = $arr_option[$i]['name'];
            }
        }
        return $v_ret!=''?$v_ret:$p_missing_name;
    }

    public function update_option($p_setting_name, array $arr_option = array()){
        $arr_where = array('setting_name'=>$p_setting_name);
        try{
            $this->collection->update($arr_where, $arr_option, array('safe'=>true));
            return true;
        }catch(MongoCursorException $e){
            $this->v_error_code = $e->getCode();
            $this->v_error_message = $e->getMessage();
            $this->my_error();
            return false;
        }
    }

    /**
     * @param $arr_fields
     * @param $arr_values
     * @param array $arr_where
     * @return bool
     */
    public function update_fields($arr_fields, $arr_values, array $arr_where = array()){
        if(is_null($arr_where) || count($arr_where)==0){
            $v_has_mongo_id = !is_null($this->v_mongo_id);
            if($v_has_mongo_id)
                $arr_where = array('_id' => $this->v_mongo_id);
        }
        $arr = array();
        for($i=0; $i<count($arr_fields); $i++)
            $arr[$arr_fields[$i]] = $arr_values[$i];
        try{
            $this->collection->update($arr_where, array('$set' => $arr));
            return true;
        }catch(MongoCursorException $e){
            $this->v_error_code = $e->getCode();
            $this->v_error_message = $e->getMessage();
            $this->my_error();
            return false;
        }
    }
    public function insert(){
        $arr = array(
                'setting_id' => $this->v_setting_id,
                'setting_name' => $this->v_setting_name,
                'setting_description'=>$this->v_setting_description,
                'setting_type'=>$this->v_setting_type,
                'option' => $this->v_option,
                'status' => $this->v_status);
        try{
            $this->collection->insert($arr, array('safe'=>true));
            $this->v_mongo_id = isset($arr['_id'])?$arr['_id']:'1234';
            return $this->v_mongo_id;
        }catch(MongoCursorException $e){
            $this->v_error_code = $e->getCode();
            $this->v_error_message = $e->getMessage();
            $this->my_error();
            return NULL;
        }
    }

    /**
     * function select scalar value
     * @param $p_field_name string, name of field
     * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
     * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
     * @result: assign to properties
     * @example:
     * <code>
     * SELECT `city_id` FROM `tb_city` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
     * 		 $cls = new cls_tb_city($db)
     * 		 $cls->select_scalar('city_id',array('user_id'=>2), array('user_email'=>-1))
     * </code>
     * @return mixed
     */
    public function select_scalar($p_field_name, array $arr_where = array(), array $arr_order = array()){
        if(is_null($arr_order) || count($arr_order)==0){
            $arr_order = array('_id' => -1);//last insert show first
        }
        $rss = $this->collection->find($arr_where)->sort($arr_order)->limit(1);
        $v_ret = NULL;
        foreach($rss as $arr){
            if(isset($arr[$p_field_name])) $v_ret = $arr[$p_field_name];
        }
        return $v_ret;
    }

    /**
     * @param array $arr_where
     * @return array
     */
    public function select(array $arr_where = array()){
        $arr_row = $this->collection->find($arr_where)->limit(1);
        $arr_option = array();
        foreach($arr_row as $arr){
            $arr_option = $arr['option'];
        }
        return  $arr_option;
    }

    /**
     * @param array $arr_where
     * @return MongoCursor
     */
    public function select_data(array $arr_where = array())
    {
        $arr_row = $this->collection->find($arr_where);
        return  $arr_row;
    }

    /**
     * @param array $arr_where
     * @return int
     */
    public function count(array $arr_where = array()){
        if(is_null($arr_where) || (count($arr_where)==0))
            return $this->collection->count();
        else
            return $this->collection->find($arr_where)->count();
    }

    /**
     * @param array $arr_where
     * @return bool
     */
    public function delete(array $arr_where = array()){
        if(is_null($arr_where) || count($arr_where)==0){
            $v_has_mongo_id = !is_null($this->v_mongo_id);
            if($v_has_mongo_id)
                $arr_where = array('_id' => $this->v_mongo_id);
        }
        try{
            $this->collection->remove($arr_where, array('safe'=>true));
            return true;
        }catch(MongoCursorException $e){
            $this->v_error_code = $e->getCode();
            $this->v_error_message = $e->getMessage();
            $this->my_error();
            return false;
        }
    }

}