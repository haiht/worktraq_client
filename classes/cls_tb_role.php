<?php
class cls_tb_role{

	private $v_role_id = 0;
	private $v_role_title = '';
	private $v_role_type = 0;
	private $v_role_key = '';
	private $arr_role_content = array();
	private $arr_role_child = array();
	private $v_status = 0;
	private $v_user_type = 0;
	private $v_default_role = 0;
	private $v_color = '';
	private $v_bold = 0;
	private $v_italic = 0;
	private $v_location_id = 0;
	private $v_company_id = 0;
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
		$this->collection = $db->selectCollection('tb_role');
		$this->collection->ensureIndex(array("role_id"=>1), array('name'=>"role_id_key", "unique"=>1, "dropDups" => 1));
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
		$v_filename = 'tb_role';
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
	 * function return properties "role_id" value
	 * @return int value
	 */
	public function get_role_id(){
		return (int) $this->v_role_id;
	}

	
	/**
	 * function allow change properties "role_id" value
	 * @param $p_role_id: int value
	 */
	public function set_role_id($p_role_id){
		$this->v_role_id = (int) $p_role_id;
	}

	
	/**
	 * function return properties "role_title" value
	 * @return string value
	 */
	public function get_role_title(){
		return $this->v_role_title;
	}

	
	/**
	 * function allow change properties "role_title" value
	 * @param $p_role_title: string value
	 */
	public function set_role_title($p_role_title){
		$this->v_role_title = $p_role_title;
	}

	
	/**
	 * function return properties "role_type" value
	 * @return int value
	 */
	public function get_role_type(){
		return (int) $this->v_role_type;
	}

	
	/**
	 * function allow change properties "role_type" value
	 * @param $p_role_type: int value
	 */
	public function set_role_type($p_role_type){
		$this->v_role_type = (int) $p_role_type;
	}

	
	/**
	 * function return properties "role_key" value
	 * @return string value
	 */
	public function get_role_key(){
		return $this->v_role_key;
	}

	
	/**
	 * function allow change properties "role_key" value
	 * @param $p_role_key: string value
	 */
	public function set_role_key($p_role_key){
		$this->v_role_key = $p_role_key;
	}

	
	/**
	 * function return properties "role_content" value
	 * @return array value
	 */
	public function get_role_content(){
		return  $this->arr_role_content;
	}

	
	/**
	 * function allow change properties "role_content" value
	 * @param $arr_role_content array
	 */
	public function set_role_content(array $arr_role_content = array()){
		$this->arr_role_content = $arr_role_content;
	}

	
	/**
	 * function return properties "role_child" value
	 * @return array value
	 */
	public function get_role_child(){
		return  $this->arr_role_child;
	}

	
	/**
	 * function allow change properties "role_child" value
	 * @param $arr_role_child array
	 */
	public function set_role_child(array $arr_role_child = array()){
		$this->arr_role_child = $arr_role_child;
	}

	
	/**
	 * function return properties "status" value
	 * @return int value
	 */
	public function get_status(){
		return (int) $this->v_status;
	}

	
	/**
	 * function allow change properties "status" value
	 * @param $p_status: int value
	 */
	public function set_status($p_status){
		$this->v_status = (int) $p_status;
	}

	
	/**
	 * function return properties "user_type" value
	 * @return int value
	 */
	public function get_user_type(){
		return (int) $this->v_user_type;
	}

	
	/**
	 * function allow change properties "user_type" value
	 * @param $p_user_type: int value
	 */
	public function set_user_type($p_user_type){
		$this->v_user_type = (int) $p_user_type;
	}

	
	/**
	 * function return properties "default_role" value
	 * @return int value
	 */
	public function get_default_role(){
		return (int) $this->v_default_role;
	}

	
	/**
	 * function allow change properties "default_role" value
	 * @param $p_default_role: int value
	 */
	public function set_default_role($p_default_role){
		$this->v_default_role = (int) $p_default_role;
	}

	
	/**
	 * function return properties "color" value
	 * @return string value
	 */
	public function get_color(){
		return $this->v_color;
	}

	
	/**
	 * function allow change properties "color" value
	 * @param $p_color: string value
	 */
	public function set_color($p_color){
		$this->v_color = $p_color;
	}

	
	/**
	 * function return properties "bold" value
	 * @return int value
	 */
	public function get_bold(){
		return (int) $this->v_bold;
	}

	
	/**
	 * function allow change properties "bold" value
	 * @param $p_bold: int value
	 */
	public function set_bold($p_bold){
		$this->v_bold = (int) $p_bold;
	}

	
	/**
	 * function return properties "italic" value
	 * @return int value
	 */
	public function get_italic(){
		return (int) $this->v_italic;
	}

	
	/**
	 * function allow change properties "italic" value
	 * @param $p_italic: int value
	 */
	public function set_italic($p_italic){
		$this->v_italic = (int) $p_italic;
	}

	
	/**
	 * function return properties "location_id" value
	 * @return int value
	 */
	public function get_location_id(){
		return (int) $this->v_location_id;
	}

	
	/**
	 * function allow change properties "location_id" value
	 * @param $p_location_id: int value
	 */
	public function set_location_id($p_location_id){
		$this->v_location_id = (int) $p_location_id;
	}

	
	/**
	 * function return properties "company_id" value
	 * @return int value
	 */
	public function get_company_id(){
		return (int) $this->v_company_id;
	}

	
	/**
	 * function allow change properties "company_id" value
	 * @param $p_company_id: int value
	 */
	public function set_company_id($p_company_id){
		$this->v_company_id = (int) $p_company_id;
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
		$arr = array('role_id' => $this->v_role_id
					,'role_title' => $this->v_role_title
					,'role_type' => $this->v_role_type
					,'role_key' => $this->v_role_key
					,'role_content' => $this->arr_role_content
					,'role_child' => $this->arr_role_child
					,'status' => $this->v_status
					,'user_type' => $this->v_user_type
					,'default_role' => $this->v_default_role
					,'color' => $this->v_color
					,'bold' => $this->v_bold
					,'italic' => $this->v_italic
					,'location_id' => $this->v_location_id
					,'company_id' => $this->v_company_id);
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
	 *  function allow insert array with parameter
	 *  @param array $arr_fields_and_values
	 *  @return MongoID
	 */
	public function insert_array(array $arr_fields_and_values){
		try{
			$this->collection->insert($arr_fields_and_values, array('safe'=>true));
			$this->v_mongo_id = isset($arr_fields_and_values['_id'])?$arr_fields_and_values['_id']:'';
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
	 *       SELECT * FROM `tb_role` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_role($db)
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
			$this->v_role_id = isset($arr['role_id'])?$arr['role_id']:0;
			$this->v_role_title = isset($arr['role_title'])?$arr['role_title']:'';
			$this->v_role_type = isset($arr['role_type'])?$arr['role_type']:0;
			$this->v_role_key = isset($arr['role_key'])?$arr['role_key']:'';
			$this->arr_role_content = isset($arr['role_content'])?$arr['role_content']:array();
			$this->arr_role_child = isset($arr['role_child'])?$arr['role_child']:array();
			$this->v_status = isset($arr['status'])?$arr['status']:0;
			$this->v_user_type = isset($arr['user_type'])?$arr['user_type']:0;
			$this->v_default_role = isset($arr['default_role'])?$arr['default_role']:0;
			$this->v_color = isset($arr['color'])?$arr['color']:'';
			$this->v_bold = isset($arr['bold'])?$arr['bold']:0;
			$this->v_italic = isset($arr['italic'])?$arr['italic']:0;
			$this->v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
			$this->v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
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
	 * SELECT `role_id` FROM `tb_role` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_role($db)
	 * 		 $cls->select_scalar('role_id',array('user_id'=>2), array('user_email'=>-1))
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
	 *   SELECT `role_id` FROM `tb_role` WHERE `user_id`=2 ORDER BY `role_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_role($db)
	 * 		 $cls->select_next('role_id',array('user_id'=>2), array('role_id'=>-1))
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
		$arr_order = array(''.$p_field_name.'' => 1);//last insert show first
		$rss = $this->collection->find($arr_where)->sort($arr_order)->limit(1);
		$v_start = 1;
		$v_ret = 1;
		foreach($rss as $arr){
			if($arr[''.$p_field_name.'']!=$v_start){
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
	 * 		 $cls = new cls_tb_role($db)
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
	 * function select records
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @example: 
	 * <code>
	 *         SELECT * FROM `tbl_users` WHERE `user_id`>=2 ORDER BY `user_email`
	 * 		 $cls = new cls_tb_role($db)
	 * 		 $cls->select(array('user_id' => array('$gte' => 2), array('user_email' => -1))
	 * </code>
	 * @return array with indexes are names of fields 
	 */
	public function select(array $arr_where = array(), array $arr_order = array()){
		if(is_null($arr_order) || count($arr_order)==0){
			$arr_order = array('_id' => -1);//last insert show first
		}
		$arr = $this->collection->find($arr_where)->sort($arr_order);
		return $arr;
	}
	
	/**
	 * function select distinct
	 * @param $p_field_name string, name of selected field
	 * @example: 
	 * <code>
	 *         SELECT DISTINCT `name` FROM `tbl_users`
	 * 		 $cls = new cls_tb_role($db)
	 * 		 $cls->select_distinct('nam')
	 * </code>
	 * @return array with indexes are names of fields 
	 */
	public function select_distinct($p_field_name){
		return $this->collection->command(array("distinct"=>"tb_role", "key"=>$p_field_name));
	}
	
	/**
	 * function select limit fields
	 * @param $p_offset int: start record to select, first record is 0
	 * @param $p_row int: amount of records to select
	 * @param $arr_fields array, array of fields will be selected
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @example:
	 * <code>
	 * SELECT * FROM `tbl_users` WHERE `user_id`>=2 ORDER BY `user_email` DESC LIMIT 10,20
	 * 		 $cls = new cls_tb_role($db)
	 * 		 $cls->select_limit_field(10, 20, array('user_id' => array('$gte' => 2), array('user_email' => -1))
	 * </code>
	 * @return array with indexes are names of fields 
	 */
	public function select_limit_fields($p_offset, $p_row, array $arr_fields, array $arr_where = array(), array $arr_order = array()){
		if(is_null($arr_order) || count($arr_order)==0){
			$arr_order = array('_id' => -1);//last insert show first
		}
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
			$arr = array('$set' => array('role_id' => $this->v_role_id,'role_title' => $this->v_role_title,'role_type' => $this->v_role_type,'role_key' => $this->v_role_key,'role_content' => $this->arr_role_content,'role_child' => $this->arr_role_child,'status' => $this->v_status,'user_type' => $this->v_user_type,'default_role' => $this->v_default_role,'color' => $this->v_color,'bold' => $this->v_bold,'italic' => $this->v_italic,'location_id' => $this->v_location_id,'company_id' => $this->v_company_id));
		 else 
			$arr = array('$set' => array('role_title' => $this->v_role_title,'role_type' => $this->v_role_type,'role_key' => $this->v_role_key,'role_content' => $this->arr_role_content,'role_child' => $this->arr_role_child,'status' => $this->v_status,'user_type' => $this->v_user_type,'default_role' => $this->v_default_role,'color' => $this->v_color,'bold' => $this->v_bold,'italic' => $this->v_italic,'location_id' => $this->v_location_id,'company_id' => $this->v_company_id));
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
	 * @param $p_value = mix value, assigned to field
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
	 * @param $arr_values array, array of selected values go to assigned 
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
			$this->collection->update($arr_where, array('$set' => $arr), array('safe'=>true));
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
	 * @param $p_value = mix value, assigned to field
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
			$this->collection->update($arr_where, array('$inc' => array($p_field => $p_value)), array('safe'=>true));
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
			$this->collection->update($arr_where, array('$inc' => array($arr)), array('safe'=>true));
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
	 * @param $p_field_display string: name of field will be display text option tag
	 * @param $p_selected_value mixed: value of field will be display text option tag
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @param $arr_exclude array: array list value of exclude
	 * @return string
	 */
	public function draw_option($p_field_value, $p_field_display, $p_selected_value, array $arr_where = array(), array $arr_order = array(), array $arr_exclude = array()){
		if(is_null($arr_where) || count($arr_where)==0){
			$v_has_mongo_id = !is_null($this->v_mongo_id);
			if($v_has_mongo_id)
				$arr_where = array('_id' => $this->v_mongo_id);
		}
		if(is_null($arr_order) || count($arr_order)==0) $arr_order = array('_id' => 1);
		$arr = $this->select_limit_fields(0, 0, array($p_field_value, $p_field_display), $arr_where, $arr_order);
		$v_dsp_option = '';
		foreach($arr as $a){
			if(!in_array($a[$p_field_value],$arr_exclude)){
				if($a[$p_field_value] == $p_selected_value)
					$v_dsp_option .= '<option value="'.$a[$p_field_value].'" selected="selected">'.$a[$p_field_display].'</option>';
				 else 
					$v_dsp_option .= '<option value="'.$a[$p_field_value].'">'.$a[$p_field_display].'</option>';
			}
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


    /**
     * @param int $p_current_role_id
     * @param array $arr_store
     * @return array
     */
    public function get_all_child_role($p_current_role_id, array $arr_store = array()){
        $arr_role_child = $this->select_scalar('role_child', array('role_id'=>$p_current_role_id));
        if(count($arr_role_child)==0){
            $arr_store[] = $p_current_role_id;
        }else{
            for($i=0;$i<count($arr_role_child);$i++){
                $v_current_role_id = (int) $arr_role_child[$i];
                if($v_current_role_id>0) $this->get_all_child_role($v_current_role_id, $arr_store);
            }
        }
        return $arr_store;
    }
    /**
     * @param int $p_current_role_id
     * @param array $arr_remove_role
     */
    public function remove_child_role($p_current_role_id, array $arr_remove_role){
        $v_row = 1;
        if($p_current_role_id!=$this->v_role_id){
            $v_row = $this->select_one(array('role_id'=>$p_current_role_id));
        }
        if($v_row==1){
            $arr_role_content = array();
            $arr_role_child = $this->get_role_child();
            $arr_include = array_diff($arr_role_child, $arr_remove_role);
            $arr_tmp = array();
            for($i=0; $i<count($arr_include); $i++){
                $v_current_role_id = (int) $arr_include[$i];
                if($v_current_role_id >0){
                    $arr_tmp[] = $v_current_role_id;
                    $arr_one_child = $this->select_scalar('role_content', array('role_id'=>$v_current_role_id));
                    foreach($arr_one_child as $module=>$arr){
                        foreach($arr as $rule=>$desc){
                            if(!isset($arr_role_content[$module][$rule])){
                                $arr_role_content[$module][$rule] = $desc;
                            }
                        }
                    }
                }
            }
            $this->update_fields(array('role_child', 'role_content'), array($arr_tmp, $arr_role_content), array('role_id'=>$p_current_role_id));
        }
    }

    /**
     * @param int $p_current_role_id
     * @param int $p_merge_role_id
     */
    public function merge_role($p_current_role_id, $p_merge_role_id){
        $v_row = 1;
        if($p_current_role_id!=$this->v_role_id){
            $v_row = $this->select_one();
        }
        if($v_row==1){
            $arr_role_content = $this->get_role_content();
            $arr_role_child = $this->get_role_child();
            $v_found = false;
            for($i=0; $i<count($arr_role_child) && !$v_found;$i++){
                $v_found = $arr_role_child[$i]==$p_merge_role_id;
            }
            if(!$v_found){
                $arr_role_child[] = $p_merge_role_id;
                $arr_merge_role_content = $this->select_scalar('role_content', array('role_id'=>$p_merge_role_id));
                foreach($arr_merge_role_content as $module=>$arr){
                    foreach($arr as $rule=>$desc){
                        if(!isset($arr_role_content[$module][$rule])){
                            $arr_role_content[$module][$rule] = $desc;
                        }
                    }
                }
                $this->update_fields(array('role_child', 'role_content'), array($arr_role_child, $arr_role_content), array('role_id'=>$p_current_role_id));
            }
        }
    }
}
?>