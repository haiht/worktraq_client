<?php
class cls_tb_conutry{

	private $v_country_id = 0;
	private $v_country_name = '';
	private $v_country_key = '';
	private $v_country_order = 0;
	private $v_country_status = 0;
	private $collection = NULL;
	private $v_mongo_id = NULL;
	private $v_error_code = 0;
	private $v_error_string = '';
	private $v_is_log = false;
	private $v_dir = '';
	
	/**
	*  constructor function
	*  @param $db: instance of Mongo
	*/
	public function __construct($db, $p_log_dir = ""){
		$this->v_is_log = $p_log_dir!='' && file_exists($p_log_dir) && is_writable($p_log_dir);
		if($this->v_is_log) $this->v_dir = $p_log_dir.DIRECTORY_SEPARATOR;
		$this->collection = $db->selectCollection('tb_country');
		$this->collection->ensureIndex(array("country_id"=>1), array('name'=>"country_id_key", "unique"=>1, "dropDups" => 1));
	}
	
	/**
	*  function get current collection
	*/
	public function get_collection(){
		return $this->collection;
	}
	
	/**
	*  function write log
	*/
	private function my_error(){
		if(! $this->v_is_log) return;
		global $_SERVER;
		$v_log_str = '--------------Log: '.date('Y-m-d H:i:s');
		$v_log_str .= "\r\n".(isset($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:'No QUERY STRING');
		$v_log_str .= "\r\n".(isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:' No REQUEST URI');
		$v_log_str .= "\r\n".$this->v_error_message.' ['.$this->v_error_code.']';
		$v_log_str .= "\r\n----------------End Log-----------------";
		$v_log_str .= "\r\n";
		if(file_exists($this->v_dir.'tb_conutry.log')){
			if(filesize($this->v_dir.'tb_conutry.log') > 1024000) rename($this->v_dir.'tb_conutry.log', $this->v_dir.'tb_conutry_'.date('Y-m-d_H:i:s').'.log');
		}
		$fp = fopen($this->v_dir.'tb_conutry.log','a+');
		if($fp){
			fwrite($fp, $v_log_str, strlen($v_log_str));
			fflush($fp);
			fclose($fp);
		}
	}
	
	/**
	* function return properties "country_id" value
	* @return int value
	*/
	public function get_country_id(){
		return (int) $this->v_country_id;
	}

	
	/**
	* function allow change properties "country_id" value
	* @param $p_country_id: int value
	*/
	public function set_country_id($p_country_id,$p_insert=true){
        if($p_insert==true)
        {
            $p_country_id = (int) $this->set_current_country_id();
            $p_country_id++;
        }
		$this->v_country_id = (int) $p_country_id;
	}
    public function set_current_country_id()
    {
        $rss = $this->collection->find(array(),array('country_id'=>1))->sort(array('country_id'=>-1))->limit(1);
        $v_current_country_id = 0;
        foreach($rss as $arr)
        {
            $v_current_country_id = isset($arr['country_id'])?$arr['country_id']:0;
        }
        return $v_current_country_id;
    }

	
	/**
	* function return properties "country_name" value
	* @return string value
	*/
	public function get_country_name(){
		return $this->v_country_name;
	}

    public function get_country_name_by_id($p_country_id)
    {
        $rss = $this->collection->find(array("country_id"=>$p_country_id),array('country_name'=>1));
        $v_country_name = "";
        foreach($rss as $arr)
        {
            $v_country_name =  isset($arr['country_name'])?$arr['country_name']:'';
        }
        return $v_country_name;
    }
	
	/**
	* function allow change properties "country_name" value
	* @param $p_country_name: string value
	*/
	public function set_country_name($p_country_name){
		$this->v_country_name = $p_country_name;
	}

	
	/**
	* function return properties "country_key" value
	* @return string value
	*/
	public function get_country_key(){
		return $this->v_country_key;
	}

	
	/**
	* function allow change properties "country_key" value
	* @param $p_country_key: string value
	*/
	public function set_country_key($p_country_key){
		$this->v_country_key = $p_country_key;
	}

	
	/**
	* function return properties "country_order" value
	* @return int value
	*/
	public function get_country_order(){
		return (int) $this->v_country_order;
	}

	
	/**
	* function allow change properties "country_order" value
	* @param $p_country_order: int value
	*/
	public function set_country_order($p_country_order){
		$this->v_country_order = (int) $p_country_order;
	}

	
	/**
	* function return properties "country_status" value
	* @return int value
	*/
	public function get_country_status(){
		return (int) $this->v_country_status;
	}

	
	/**
	* function allow change properties "country_status" value
	* @param $p_country_status: int value
	*/
	public function set_country_status($p_country_status){
		$this->v_country_status = (int) $p_country_status;
	}

	
	/**
	* function return MongoID value after inserting new record
	*/
	public function get_mongo_id(){
		return $this->v_mongo_id;
	}

	
	/**
	* function set MongoID to properties
	*/
	public function set_mongo_id($p_mongo_id){
		$this->v_mongo_id = $p_mongo_id;
	}

	
	/**
	*  function allow insert one record
	*  @return $v_mongo_id is MongoID
	*/
	public function insert(){
		$arr = array('country_id' => $this->v_country_id
					,'country_name' => $this->v_country_name
					,'country_key' => $this->v_country_key
					,'country_order' => $this->v_country_order
					,'country_status' => $this->v_country_status);
		try{
			$this->collection->insert($arr, array('safe'=>true));
			$this->v_mongo_id = isset($arr['_id'])?$arr['_id']:'';
			return $this->v_mongo_id;
		}catch(MongoCursorException $e){
			$this->v_error_code = $e->getCode();
			$this->v_error_message = $e->getMessage();
			$this->my_error();
			return NULL;
		}
	}

	
	/**
	* function select_one_record
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	* @param $arr_order = array(), example: array('field'=>-1), that equal to: ORDER BY field DESC
	* result: assign to properties
	* example: SELECT * FROM `tb_conutry` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	* 		 $cls = new cls_tb_conutry($db)
	* 		 $cls->select_one(array('user_id'=>2), array('user_email'=>-1))
	*/
	public function select_one(array $arr_where = array(), array $arr_order = array()){
		if(is_null($arr_order) || count($arr_order)==0){
			$arr_order = array('_id' => -1);//last insert show first
		}
		$rss = $this->collection->find($arr_where)->sort($arr_order)->limit(1);
		$v_count = 0;
		foreach($rss as $arr){
			$this->v_country_id = isset($arr['country_id'])?$arr['country_id']:0;
			$this->v_country_name = isset($arr['country_name'])?$arr['country_name']:'';
			$this->v_country_key = isset($arr['country_key'])?$arr['country_key']:'';
			$this->v_country_order = isset($arr['country_order'])?$arr['country_order']:0;
			$this->v_country_status = isset($arr['country_status'])?$arr['country_status']:0;
			$this->v_mongo_id = $arr['_id'];
			$v_count++;
		}
		return $v_count;
	}
	
	/**
	* function select scalar value
	* @param $p_field string, name of field
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	* @param $arr_order = array(), example: array('field'=>-1), that equal to: ORDER BY field DESC
	* result: assign to properties
	* example: SELECT `country_id` FROM `tb_conutry` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	* 		 $cls = new cls_tb_conutry($db)
	* 		 $cls->select_scalar('country_id',array('user_id'=>2), array('user_email'=>-1))
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
	* function get next int value for key
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	* @param $arr_order = array(), example: array('field'=>-1), that equal to: ORDER BY field DESC
	* result: assign to properties
	* example: SELECT `country_id` FROM `tb_conutry` WHERE `user_id`=2 ORDER BY `country_id` DESC LIMIT 0,1
	* 		 $cls = new cls_tb_conutry($db)
	* 		 $cls->select_next('country_id',array('user_id'=>2), array('country_id'=>-1))
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
	* function get missing value
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	* @param $arr_order = array(), example: array('field'=>-1), that equal to: ORDER BY field DESC
	*/
	public function select_missing($p_field_name, array $arr_where = array()){
		$arr_order = array($p_field_name => 1);//last insert show first
		$rss = $this->collection->find($arr_where)->sort($arr_order)->limit(1);
		$v_start = 1;
		$v_ret = 1;
		foreach($rss as $arr){
			if($arr[$p_field_name]!=$v_start){
				$v_ret = $v_start;
				break;
			}
			$v_start++;
		}
		return ((int) $v_ret);
	}
	
	/**
	* function select limit records
	* @param $p_offset: start record to select, first record is 0
	* @param $p_row: amount of records to select
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	* @param $arr_order = array(), example: array('field'=>-1), that equal to: ORDER BY field DESC
	* @return: array with indexes are names of fields 
	* result: assign to properties
	* example: SELECT * FROM `tbl_users` WHERE `user_id`>=2 ORDER BY `user_email` DESC LIMIT 10,20
	* 		 $cls = new cls_tb_conutry($db)
	* 		 $cls->select_limit(10, 20, array('user_id' => array('$gte' => 2), array('user_email' => -1))
	*/
	public function select_limit($p_offset, $p_row, array $arr_where = array(), array $arr_order = array()){
		if(is_null($arr_order) || count($arr_order)==0){
			$arr_order = array('country_key' => 1);//last insert show first
		}
		$arr = $this->collection->find($arr_where)->sort($arr_order)->limit($p_row)->skip($p_offset);
		return $arr;
	}
	
	/**
	* function select limit fields
	* @param $p_offset: start record to select, first record is 0
	* @param $p_row: amount of records to select
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	* @param $arr_order = array(), example: array('field'=>-1), that equal to: ORDER BY field DESC
	* @return: array with indexes are names of fields 
	* result: assign to properties
	* example: SELECT * FROM `tbl_users` WHERE `user_id`>=2 ORDER BY `user_email` DESC LIMIT 10,20
	* 		 $cls = new cls_tb_conutry($db)
	* 		 $cls->select_limit_field(10, 20, array('user_id' => array('$gte' => 2), array('user_email' => -1))
	*/
	public function select_limit_fields($p_offset, $p_row, array $arr_fields, array $arr_where = array(), array $arr_order = array()){
		if(is_null($arr_order) || count($arr_order)==0){
			$arr_order = array('_id' => -1);//last insert show first
		}
		$arr_return = array();
		$arr_field = array();
		for($i=0; $i<count($arr_fields); $i++)
			$arr_field[$arr_fields[$i]] = 1;
		if($p_row <= 0)
			$arr_return = $this->collection->find($arr_where, $arr_field)->sort($arr_order)->skip($p_offset);
		else
			$arr_return = $this->collection->find($arr_where, $arr_field)->sort($arr_order)->limit($p_row)->skip($p_offset);
		return $arr_return;
	}

	/**
	*  function update one or more records
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	*/
	public function update(array $arr_where = array()){
		if(is_null($arr_where) || count($arr_where)==0){
			$v_has_mongo_id = !is_null($this->v_mongo_id);
			if($v_has_mongo_id)
                $arr_where = array('_id' => $this->v_mongo_id);
		}
		if(isset($v_has_mongo_id) && $v_has_mongo_id)
            $arr = array('$set' => array('country_id' => $this->v_country_id,'country_name' => $this->v_country_name,'country_key' => $this->v_country_key,'country_order' => $this->v_country_order,'country_status' => $this->v_country_status));

            $arr = array('$set' => array('country_name' => $this->v_country_name,'country_key' => $this->v_country_key,'country_order' => $this->v_country_order,'country_status' => $this->v_country_status));
		try{
			$this->collection->update($arr_where, $arr, array('safe'=>true));
			return true;
		}catch(MongoCursorException $e){
			$this->v_error_code = $e->getCode();
			$this->v_error_message = $e->getMessage();
			$this->my_error();
			return false;
		}
	}

	/**
	*  function delte one or more records
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
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

	/**
	*  function update one or more records
	* @param $p_field string, name of field 
	* @param $p_value = mix value, asigned to field
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	*/
	public function update_field($p_field, $p_value, array $arr_where = array()){
		if(is_null($arr_where) || count($arr_where)==0){
			$v_has_mongo_id = !is_null($this->v_mongo_id);
			if($v_has_mongo_id)
				$arr_where = array('_id' => $this->v_mongo_id);
		}
		try{
			$this->collection->update($arr_where, array('$set' => array($p_field => $p_value)), array('safe'=>true));
			return true;
		}catch(MongoCursorException $e){
			$this->v_error_code = $e->getCode();
			$this->v_error_message = $e->getMessage();
			$this->my_error();
			return false;
		}
	}

	/**
	*  function update one or more records
	* @param $arr_fields = array(), array of selected fields go to updated 
	* @param $arr_values = array(), array of selected values go to asigned 
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
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

	/**
	*  function increase one or more records
	* @param $p_field string, name of field 
	* @param $p_value = mix value, asigned to field
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	*/
	public function increase_field($p_field, $p_value = 1, array $arr_where = array()){
		if(is_null($arr_where) || count($arr_where)==0){
			$v_has_mongo_id = !is_null($this->v_mongo_id);
			if($v_has_mongo_id)
				$arr_where = array('_id' => $this->v_mongo_id);
		}
		try{
			$this->collection->update($arr_where, array('$inc' => array($p_field => $p_value)));
			return true;
		}catch(MongoCursorException $e){
			$this->v_error_code = $e->getCode();
			$this->v_error_message = $e->getMessage();
			$this->my_error();
			return false;
		}
	}

	/**
	*  function update one or more records
	* @param $arr_fields = array(), array of selected fields go to updated 
	* @param $arr_values = array(), array of selected values go to increase 
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	*/
	public function increase_fields(array $arr_fields, array $arr_values, array $arr_where = array()){
		if(is_null($arr_where) || count($arr_where)==0){
			$v_has_mongo_id = !is_null($this->v_mongo_id);
			if($v_has_mongo_id)
				$arr_where = array('_id' => $this->v_mongo_id);
		}
		$arr = array();
		for($i=0; $i<count($arr_fields); $i++)
			$arr[$arr_fields[$i]] = $arr_values[$i];
		try{
			$this->collection->update($arr_where, array('$inc' => array($arr)));
			return true;
		}catch(MongoCursorException $e){
			$this->v_error_code = $e->getCode();
			$this->v_error_message = $e->getMessage();
			$this->my_error();
			return false;
		}
	}

	/**
	*  function draw option tag
	* @param $p_field_value string: name of field will be value option tag
	* @param $p_field_display string: name of field will be diaplay text option tag
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	* @param $arr_order = array(), example: array('field'=>-1), that equal to: ORDER BY field DESC
	*/
	public function draw_option($p_field_value, $p_field_display, $p_selected_value, array $arr_where = array(), array $arr_order = array()){
		if(is_null($arr_where) || count($arr_where)==0){
			$v_has_mongo_id = !is_null($this->v_mongo_id);
			if($v_has_mongo_id)
				$arr_where = array('_id' => $this->v_mongo_id);
		}
		if(is_null($arr_order) || count($arr_order)==0) $arr_order = array('_id' => 1);
		$arr = $this->select_limit_fields(0, 0, array($p_field_value, $p_field_display), $arr_where, $arr_order);
		$v_dsp_option = '';
		foreach($arr as $a){
			if($a[$p_field_value] == $p_selected_value)
				$v_dsp_option .= '<option value="'.$a[$p_field_value].'" selected="selected">'.$a[$p_field_display].'</option>';
			else
				$v_dsp_option .= '<option value="'.$a[$p_field_value].'">'.$a[$p_field_display].'</option>';
		}
		return $v_dsp_option;
	}

	/**
	*  function count all records
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	*/
	public function count(array $arr_where = array())
    {
		if(is_null($arr_where) || (count($arr_where)==0))
            return $this->collection->count();
    	else
            return $this->collection->find($arr_where)->count();
	}

	/**
	*  function count all records
	* @param $p_field string: in field to count
	* @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	*/
	public function count_field($p_field, array $arr_where = array()){
		if(is_null($arr_where) || (count($arr_where)==0))
			return $this->collection->find(array($p_field => array('$exists' => true)))->count();
		else
			return $this->collection->find($arr_where, array($p_field => array('$exists' => true)))->count();
	}
}