<?php
class cls_tb_taxonomy{

	private $v_taxonomy_id = 0;
	private $v_taxonomy_name = '';
	private $v_taxonomy_status = 0;
	private $v_taxonomy_order = 0;
	private $collection = NULL;
	private $v_mongo_id = NULL;
	private $v_error_code = 0;
	private $v_error_message = '';
	private $v_is_log = false;
	private $v_dir = '';
	
	/**
	 *  constructor function
	 *  @param $db: instance of Mongo
	 *  @param $p_log_dir string: directory contains its log file
	 */
	public function __construct(MongoDB $db, $p_log_dir = ""){
		$this->v_is_log = $p_log_dir!='' && file_exists($p_log_dir) && is_writable($p_log_dir);
		if($this->v_is_log) $this->v_dir = $p_log_dir.DIRECTORY_SEPARATOR;
		$this->collection = $db->selectCollection('tb_taxonomy');
		$this->collection->ensureIndex(array("taxonomy_id"=>1), array('name'=>"taxonomy_id_key", "unique"=>1, "dropDups" => 1));
	}
	
	/**
	 *  function get current MongoDB collection
	 *  @return Object: current MongoDB collection
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
		$v_filename = 'tb_taxonomy';
		$v_ext = '.log';
		$v_log_str = '--------------Log: '.date('Y-m-d H:i:s');
		$v_log_str .= "\r\n".(isset($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:'No QUERY STRING');
		$v_log_str .= "\r\n".(isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:' No REQUEST URI');
		$v_log_str .= "\r\n".$this->v_error_message.' ['.$this->v_error_code.']';
		$v_log_str .= "\r\n----------------End Log-----------------";
		$v_log_str .= "\r\n";
		$v_new_file = false;
		if(file_exists($this->v_dir.$v_filename.$v_ext)){
			if(filesize($this->v_dir.$v_filename.$v_ext) > 1024000){
				rename($this->v_dir.$v_filename.$v_ext, $this->v_dir.$v_filename.'_'.date('Y-m-d_H:i:s').$v_ext);
				$v_new_file = true;
				@unlink($this->v_dir.$v_filename.$v_ext);
			}
		}
		$fp = fopen($this->v_dir.$v_filename.$v_ext,$v_new_file?'w':'a+');
		if($fp){
			fwrite($fp, $v_log_str, strlen($v_log_str));
			fflush($fp);
			fclose($fp);
		}
	}
	
	/**
	 * function return properties "taxonomy_id" value
	 * @return int value
	 */
	public function get_taxonomy_id(){
		return (int) $this->v_taxonomy_id;
	}

	
	/**
	 * function allow change properties "taxonomy_id" value
	 * @param $p_taxonomy_id: int value
	 */
	public function set_taxonomy_id($p_taxonomy_id){
		$this->v_taxonomy_id = (int) $p_taxonomy_id;
	}

	
	/**
	 * function return properties "taxonomy_name" value
	 * @return string value
	 */
	public function get_taxonomy_name(){
		return $this->v_taxonomy_name;
	}

	
	/**
	 * function allow change properties "taxonomy_name" value
	 * @param $p_taxonomy_name: string value
	 */
	public function set_taxonomy_name($p_taxonomy_name){
		$this->v_taxonomy_name = $p_taxonomy_name;
	}

	
	/**
	 * function return properties "taxonomy_status" value
	 * @return int value
	 */
	public function get_taxonomy_status(){
		return (int) $this->v_taxonomy_status;
	}

	
	/**
	 * function allow change properties "taxonomy_status" value
	 * @param $p_taxonomy_status: int value
	 */
	public function set_taxonomy_status($p_taxonomy_status){
		$this->v_taxonomy_status = (int) $p_taxonomy_status;
	}

	
	/**
	 * function return properties "taxonomy_order" value
	 * @return int value
	 */
	public function get_taxonomy_order(){
		return (int) $this->v_taxonomy_order;
	}

	
	/**
	 * function allow change properties "taxonomy_order" value
	 * @param $p_taxonomy_order: int value
	 */
	public function set_taxonomy_order($p_taxonomy_order){
		$this->v_taxonomy_order = (int) $p_taxonomy_order;
	}

	
	/**
	 * function return MongoID value after inserting new record
	 * @return ObjectId: MongoId
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
	 *  @return MongoID
	 */
	public function insert(){
		$arr = array('taxonomy_id' => $this->v_taxonomy_id
					,'taxonomy_name' => $this->v_taxonomy_name
					,'taxonomy_status' => $this->v_taxonomy_status
					,'taxonomy_order' => $this->v_taxonomy_order);
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
	 * @result: all values will assign to this instance properties
	 * @example:
	 * <code>
	 *       SELECT * FROM `tb_taxonomy` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_taxonomy($db)
	 * 		 $cls->select_one(array('user_id'=>2), array('user_email'=>-1))
	 * </code>
	 * @return int
	 */
	public function select_one(array $arr_where = array(), array $arr_order = array()){
		if(is_null($arr_order) || count($arr_order)==0){
			$arr_order = array('_id' => -1);//last insert show first
		}
		$rss = $this->collection->find($arr_where)->sort($arr_order)->limit(1);
		$v_count = 0;
		foreach($rss as $arr){
			$this->v_taxonomy_id = isset($arr['taxonomy_id'])?$arr['taxonomy_id']:0;
			$this->v_taxonomy_name = isset($arr['taxonomy_name'])?$arr['taxonomy_name']:'';
			$this->v_taxonomy_status = isset($arr['taxonomy_status'])?$arr['taxonomy_status']:0;
			$this->v_taxonomy_order = isset($arr['taxonomy_order'])?$arr['taxonomy_order']:0;
			$this->v_mongo_id = $arr['_id'];
			$v_count++;
		}
		return $v_count;
	}
	
	/**
	 * function select scalar value
	 * @param $p_field_name string, name of field
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @result: assign to properties
	 * @example: 
	 * <code>
	 * SELECT `taxonomy_id` FROM `tb_taxonomy` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_taxonomy($db)
	 * 		 $cls->select_scalar('taxonomy_id',array('user_id'=>2), array('user_email'=>-1))
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
	 * function get next int value for key
	 * @param $p_field_name string, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @result: assign to properties
	 * @example: 
	 * <code>
	 *   SELECT `taxonomy_id` FROM `tb_taxonomy` WHERE `user_id`=2 ORDER BY `taxonomy_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_taxonomy($db)
	 * 		 $cls->select_next('taxonomy_id',array('user_id'=>2), array('taxonomy_id'=>-1))
	 * </code>
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
	 * function get missing value
	 * @param $p_field_name array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @return int
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
	 * @param $p_offset int: start record to select, first record is 0
	 * @param $p_row int: amount of records to select
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @example: 
	 * <code>
	 *         SELECT * FROM `tbl_users` WHERE `user_id`>=2 ORDER BY `user_email` DESC LIMIT 10,20
	 * 		 $cls = new cls_tb_taxonomy($db)
	 * 		 $cls->select_limit(10, 20, array('user_id' => array('$gte' => 2), array('user_email' => -1))
	 * </code>
	 * @return array with indexes are names of fields 
	 */
	public function select_limit($p_offset, $p_row, array $arr_where = array(), array $arr_order = array()){
		if(is_null($arr_order) || count($arr_order)==0){
			$arr_order = array('_id' => -1);//last insert show first
		}
		$arr = $this->collection->find($arr_where)->sort($arr_order)->limit($p_row)->skip($p_offset);
		return $arr;
	}
	
	/**
	 * function select limit fields
	 * @param $p_offset int: start record to select, first record is 0
	 * @param $p_row int: amount of records to select
	 * @param $arr_field array, array of fields will be selected
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @example:
	 * <code>
	 * SELECT * FROM `tbl_users` WHERE `user_id`>=2 ORDER BY `user_email` DESC LIMIT 10,20
	 * 		 $cls = new cls_tb_taxonomy($db)
	 * 		 $cls->select_limit_field(10, 20, array('user_id' => array('$gte' => 2), array('user_email' => -1))
	 * </code>
	 * @return: array with indexes are names of fields 
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
	 * @return boolean
	 */
	public function update(array $arr_where = array()){
		if(is_null($arr_where) || count($arr_where)==0){
			$v_has_mongo_id = !is_null($this->v_mongo_id);
			if($v_has_mongo_id)
				$arr_where = array('_id' => $this->v_mongo_id);
		}
		if(isset($v_has_mongo_id) && $v_has_mongo_id)
			$arr = array('$set' => array('taxonomy_id' => $this->v_taxonomy_id,'taxonomy_name' => $this->v_taxonomy_name,'taxonomy_status' => $this->v_taxonomy_status,'taxonomy_order' => $this->v_taxonomy_order));
		else
			$arr = array('$set' => array('taxonomy_name' => $this->v_taxonomy_name,'taxonomy_status' => $this->v_taxonomy_status,'taxonomy_order' => $this->v_taxonomy_order));
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
	 * function delete one or more records
	 * @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	 * @return boolean 
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
	 * function update one or more records
	 * @param $p_field string, name of field 
	 * @param $p_value = mix value, asigned to field
	 * @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	 * @return boolean
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
	 * function update one or more records
	 * @param $arr_fields array, array of selected fields go to updated 
	 * @param $arr_values array, array of selected values go to asigned 
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @return boolean
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
	 * function increase one or more records
	 * @param $p_field string, name of field 
	 * @param $p_value = mix value, asigned to field
	 * @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	 * @return boolean
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
	 * function update one or more records
	 * @param $arr_fields = array(), array of selected fields go to updated 
	 * @param $arr_values = array(), array of selected values go to increase 
	 * @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	 * @return boolean
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
	 * function draw option tag
	 * @param $p_field_value string: name of field will be value option tag
	 * @param $p_field_display string: name of field will be diaplay text option tag
	 * @param $p_selected_value mixed: value of field will be diaplay text option tag
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @return string
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
     * function draw option tag
     * @param $p_field_value string: name of field will be value option tag
     * @param $p_field_display string: name of field will be diaplay text option tag
     * @param $arr_selected_value array: value of field will be diaplay text option tag
     * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
     * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
     * @return string
     */
    public function draw_option_multi($p_field_value, $p_field_display, $arr_selected_value, array $arr_where = array(), array $arr_order = array()){
        if(is_null($arr_where) || count($arr_where)==0){
            $v_has_mongo_id = !is_null($this->v_mongo_id);
            if($v_has_mongo_id)
                $arr_where = array('_id' => $this->v_mongo_id);
        }
        if(is_null($arr_order) || count($arr_order)==0) $arr_order = array('_id' => 1);
        $arr = $this->select_limit_fields(0, 0, array($p_field_value, $p_field_display), $arr_where, $arr_order);
        $v_dsp_option = '';
        foreach($arr as $a){
            if(in_array($a[$p_field_value],$arr_selected_value))
                $v_dsp_option .= '<option value="'.$a[$p_field_value].'" selected="selected">'.$a[$p_field_display].'</option>';
            else
                $v_dsp_option .= '<option value="'.$a[$p_field_value].'">'.$a[$p_field_display].'</option>';
        }
        return $v_dsp_option;
    }
	/**
	 * function count all records
	 * @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	 * @return int
	 */
	public function count(array $arr_where = array()){
		if(is_null($arr_where) || (count($arr_where)==0))
			return $this->collection->count();
		else
			return $this->collection->find($arr_where)->count();
	}

	/**
	 * function count all records
	 * @param $p_field string: in field to count
	 * @param $arr_where = array(), example: array('field'=>3), that equal to: WHERE field=3
	 * @return int
	 */
	public function count_field($p_field, array $arr_where = array()){
		if(is_null($arr_where) || (count($arr_where)==0))
			return $this->collection->find(array($p_field => array('$exists' => true)))->count();
		else
			return $this->collection->find($arr_where, array($p_field => array('$exists' => true)))->count();
	}
}
?>