<?php
class cls_tb_product_packages{

	private $v_package_id = 0;
	private $v_package_name = '';
	private $v_description = '';
	private $v_package_image = '';
	private $v_saved_dir = '';
	private $v_status = 0;
	private $v_package_type = 0;
	private $arr_map_content = array();
	private $arr_package_content = array();
	private $v_price = 0;
	private $v_location_id = 0;
	private $v_company_id = 0;
	private $v_user_name = '';
	private $v_user_type = 0;
	private $v_date_created = '0000-00-00 00:00:00';
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
		$this->collection = $db->selectCollection('tb_product_packages');
		$this->v_date_created = new MongoDate(time());
		$this->collection->ensureIndex(array("package_id"=>1), array('name'=>"package_id_key", "unique"=>1, "dropDups" => 1));
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
		$v_filename = 'tb_product_packages';
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
	 * function return properties "package_id" value
	 * @return int value
	 */
	public function get_package_id(){
		return (int) $this->v_package_id;
	}

	
	/**
	 * function allow change properties "package_id" value
	 * @param $p_package_id: int value
	 */
	public function set_package_id($p_package_id){
		$this->v_package_id = (int) $p_package_id;
	}

	
	/**
	 * function return properties "package_name" value
	 * @return string value
	 */
	public function get_package_name(){
		return $this->v_package_name;
	}

	
	/**
	 * function allow change properties "package_name" value
	 * @param $p_package_name: string value
	 */
	public function set_package_name($p_package_name){
		$this->v_package_name = $p_package_name;
	}

	
	/**
	 * function return properties "description" value
	 * @return string value
	 */
	public function get_description(){
		return $this->v_description;
	}

	
	/**
	 * function allow change properties "description" value
	 * @param $p_description: string value
	 */
	public function set_description($p_description){
		$this->v_description = $p_description;
	}

	
	/**
	 * function return properties "package_image" value
	 * @return string value
	 */
	public function get_package_image(){
		return $this->v_package_image;
	}

	
	/**
	 * function allow change properties "package_image" value
	 * @param $p_package_image: string value
	 */
	public function set_package_image($p_package_image){
		$this->v_package_image = $p_package_image;
	}

	
	/**
	 * function return properties "saved_dir" value
	 * @return string value
	 */
	public function get_saved_dir(){
		return $this->v_saved_dir;
	}

	
	/**
	 * function allow change properties "saved_dir" value
	 * @param $p_saved_dir: string value
	 */
	public function set_saved_dir($p_saved_dir){
		$this->v_saved_dir = $p_saved_dir;
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
	 * function return properties "package_type" value
	 * @return int value
	 */
	public function get_package_type(){
		return (int) $this->v_package_type;
	}

	
	/**
	 * function allow change properties "package_type" value
	 * @param $p_package_type: int value
	 */
	public function set_package_type($p_package_type){
		$this->v_package_type = (int) $p_package_type;
	}

	
	/**
	 * function return properties "map_content" value
	 * @return array value
	 */
	public function get_map_content(){
		return  $this->arr_map_content;
	}

	
	/**
	 * function allow change properties "map_content" value
	 * @param $arr_map_content array
	 */
	public function set_map_content(array $arr_map_content = array()){
		$this->arr_map_content = $arr_map_content;
	}

	
	/**
	 * function return properties "package_content" value
	 * @return array value
	 */
	public function get_package_content(){
		return  $this->arr_package_content;
	}

	
	/**
	 * function allow change properties "package_content" value
	 * @param $arr_package_content array
	 */
	public function set_package_content(array $arr_package_content = array()){
		$this->arr_package_content = $arr_package_content;
	}

	
	/**
	 * function return properties "price" value
	 * @return float value
	 */
	public function get_price(){
		return (float) $this->v_price;
	}

	
	/**
	 * function allow change properties "price" value
	 * @param $p_price: float value
	 */
	public function set_price($p_price){
		$this->v_price = (float) $p_price;
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
	 * function return properties "user_name" value
	 * @return string value
	 */
	public function get_user_name(){
		return $this->v_user_name;
	}

	
	/**
	 * function allow change properties "user_name" value
	 * @param $p_user_name: string value
	 */
	public function set_user_name($p_user_name){
		$this->v_user_name = $p_user_name;
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
	 * function return properties "date_created" value
	 * @return int value indicates amount of seconds
	 */
	public function get_date_created(){
		return  $this->v_date_created->sec;
	}

	
	/**
	 * function allow change properties "date_created" value
	 * @param $p_date_created: string value format type: yyyy-mm-dd H:i:s
	 */
	public function set_date_created($p_date_created){
		$this->v_date_created = new MongoDate(strtotime($p_date_created));
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
		$arr = array('package_id' => $this->v_package_id
					,'package_name' => $this->v_package_name
					,'description' => $this->v_description
					,'package_image' => $this->v_package_image
					,'saved_dir' => $this->v_saved_dir
					,'status' => $this->v_status
					,'package_type' => $this->v_package_type
					,'map_content' => $this->arr_map_content
					,'package_content' => $this->arr_package_content
					,'price' => $this->v_price
					,'location_id' => $this->v_location_id
					,'company_id' => $this->v_company_id
					,'user_name' => $this->v_user_name
					,'user_type' => $this->v_user_type
					,'date_created' => $this->v_date_created);
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
	 *       SELECT * FROM `tb_product_packages` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_product_packages($db)
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
			$this->v_package_id = isset($arr['package_id'])?$arr['package_id']:0;
			$this->v_package_name = isset($arr['package_name'])?$arr['package_name']:'';
			$this->v_description = isset($arr['description'])?$arr['description']:'';
			$this->v_package_image = isset($arr['package_image'])?$arr['package_image']:'';
			$this->v_saved_dir = isset($arr['saved_dir'])?$arr['saved_dir']:'';
			$this->v_status = isset($arr['status'])?$arr['status']:0;
			$this->v_package_type = isset($arr['package_type'])?$arr['package_type']:0;
			$this->arr_map_content = isset($arr['map_content'])?$arr['map_content']:array();
			$this->arr_package_content = isset($arr['package_content'])?$arr['package_content']:array();
			$this->v_price = isset($arr['price'])?$arr['price']:0;
			$this->v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
			$this->v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
			$this->v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
			$this->v_user_type = isset($arr['user_type'])?$arr['user_type']:0;
			$this->v_date_created = isset($arr['date_created'])?$arr['date_created']:(new MongoDate(time()));
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
	 * SELECT `package_id` FROM `tb_product_packages` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_product_packages($db)
	 * 		 $cls->select_scalar('package_id',array('user_id'=>2), array('user_email'=>-1))
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
	 *   SELECT `package_id` FROM `tb_product_packages` WHERE `user_id`=2 ORDER BY `package_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_product_packages($db)
	 * 		 $cls->select_next('package_id',array('user_id'=>2), array('package_id'=>-1))
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
	 * 		 $cls = new cls_tb_product_packages($db)
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
	 * 		 $cls = new cls_tb_product_packages($db)
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
	 * 		 $cls = new cls_tb_product_packages($db)
	 * 		 $cls->select_distinct('nam')
	 * </code>
	 * @return array with indexes are names of fields 
	 */
	public function select_distinct($p_field_name){
		return $this->collection->command(array("distinct"=>"tb_product_packages", "key"=>$p_field_name));
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
	 * 		 $cls = new cls_tb_product_packages($db)
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
			$arr = array('$set' => array('package_id' => $this->v_package_id,'package_name' => $this->v_package_name,'description' => $this->v_description,'package_image' => $this->v_package_image,'saved_dir' => $this->v_saved_dir,'status' => $this->v_status,'package_type' => $this->v_package_type,'map_content' => $this->arr_map_content,'package_content' => $this->arr_package_content,'price' => $this->v_price,'location_id' => $this->v_location_id,'company_id' => $this->v_company_id,'user_name' => $this->v_user_name,'user_type' => $this->v_user_type,'date_created' => $this->v_date_created));
		 else 
			$arr = array('$set' => array('package_name' => $this->v_package_name,'description' => $this->v_description,'package_image' => $this->v_package_image,'saved_dir' => $this->v_saved_dir,'status' => $this->v_status,'package_type' => $this->v_package_type,'map_content' => $this->arr_map_content,'package_content' => $this->arr_package_content,'price' => $this->v_price,'location_id' => $this->v_location_id,'company_id' => $this->v_company_id,'user_name' => $this->v_user_name,'user_type' => $this->v_user_type,'date_created' => $this->v_date_created));
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