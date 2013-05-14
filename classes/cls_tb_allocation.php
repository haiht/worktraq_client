<?php
class cls_tb_allocation{

	private $v_allocation_id = 0;
	private $v_order_items_id = 0;
	private $v_order_id = 0;
	private $v_location_id = 0;
	private $v_location_name = '';
	private $v_location_address = '';
	private $v_quantity = 1;
	private $v_shipper = '';
	private $v_tracking_number = '';
	private $v_tracking_url = '';
	private $v_date_shipping = '0000-00-00 00:00:00';
	private $v_ship_status = 0;
	private $v_location_from = 0;
	private $v_create_by = '';
	private $v_create_time = '0000-00-00 00:00:00';
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
		$this->collection = $db->selectCollection('tb_allocation');
		$this->collection->ensureIndex(array("order_items_id"=>1));
		$this->collection->ensureIndex(array("order_id"=>1));
		$this->collection->ensureIndex(array("location_id"=>1));
		$this->collection->ensureIndex(array("location_name"=>1));
		$this->collection->ensureIndex(array("location_address"=>1));
		$this->v_date_shipping = new MongoDate(time());
		$this->v_create_time = new MongoDate(time());
		$this->collection->ensureIndex(array("allocation_id"=>1), array('name'=>"allocation_id_key", "unique"=>1, "dropDups" => 1));
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
		$v_filename = 'tb_allocation';
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
	 * function return properties "allocation_id" value
	 * @return int value
	 */
	public function get_allocation_id(){
		return (int) $this->v_allocation_id;
	}

	
	/**
	 * function allow change properties "allocation_id" value
	 * @param $p_allocation_id: int value
	 */
	public function set_allocation_id($p_allocation_id){
		$this->v_allocation_id = (int) $p_allocation_id;
	}

	
	/**
	 * function return properties "order_items_id" value
	 * @return int value
	 */
	public function get_order_items_id(){
		return (int) $this->v_order_items_id;
	}

	
	/**
	 * function allow change properties "order_items_id" value
	 * @param $p_order_items_id: int value
	 */
	public function set_order_items_id($p_order_items_id){
		$this->v_order_items_id = (int) $p_order_items_id;
	}

	
	/**
	 * function return properties "order_id" value
	 * @return int value
	 */
	public function get_order_id(){
		return (int) $this->v_order_id;
	}

	
	/**
	 * function allow change properties "order_id" value
	 * @param $p_order_id: int value
	 */
	public function set_order_id($p_order_id){
		$this->v_order_id = (int) $p_order_id;
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
	 * function return properties "location_name" value
	 * @return string value
	 */
	public function get_location_name(){
		return $this->v_location_name;
	}

	
	/**
	 * function allow change properties "location_name" value
	 * @param $p_location_name: string value
	 */
	public function set_location_name($p_location_name){
		$this->v_location_name = $p_location_name;
	}

	
	/**
	 * function return properties "location_address" value
	 * @return string value
	 */
	public function get_location_address(){
		return $this->v_location_address;
	}

	
	/**
	 * function allow change properties "location_address" value
	 * @param $p_location_address: string value
	 */
	public function set_location_address($p_location_address){
		$this->v_location_address = $p_location_address;
	}

	
	/**
	 * function return properties "quantity" value
	 * @return int value
	 */
	public function get_quantity(){
		return (int) $this->v_quantity;
	}

	
	/**
	 * function allow change properties "quantity" value
	 * @param $p_quantity: int value
	 */
	public function set_quantity($p_quantity){
		$this->v_quantity = (int) $p_quantity;
	}

	
	/**
	 * function return properties "shipper" value
	 * @return string value
	 */
	public function get_shipper(){
		return $this->v_shipper;
	}

	
	/**
	 * function allow change properties "shipper" value
	 * @param $p_shipper: string value
	 */
	public function set_shipper($p_shipper){
		$this->v_shipper = $p_shipper;
	}

	
	/**
	 * function return properties "tracking_number" value
	 * @return string value
	 */
	public function get_tracking_number(){
		return $this->v_tracking_number;
	}

	
	/**
	 * function allow change properties "tracking_number" value
	 * @param $p_tracking_number: string value
	 */
	public function set_tracking_number($p_tracking_number){
		$this->v_tracking_number = $p_tracking_number;
	}

	
	/**
	 * function return properties "tracking_url" value
	 * @return string value
	 */
	public function get_tracking_url(){
		return $this->v_tracking_url;
	}

	
	/**
	 * function allow change properties "tracking_url" value
	 * @param $p_tracking_url: string value
	 */
	public function set_tracking_url($p_tracking_url){
		$this->v_tracking_url = $p_tracking_url;
	}

	
	/**
	 * function return properties "date_shipping" value
	 * @return int value indicates amount of seconds
	 */
	public function get_date_shipping(){
		return  $this->v_date_shipping->sec;
	}

	
	/**
	 * function allow change properties "date_shipping" value
	 * @param $p_date_shipping: string value format type: yyyy-mm-dd H:i:s
	 */
	public function set_date_shipping($p_date_shipping){
        if($p_date_shipping==NULL)
            $this->v_date_shipping = NULL;
        else
		    $this->v_date_shipping = new MongoDate(strtotime($p_date_shipping));
	}
	
	/**
	 * function return properties "ship_status" value
	 * @return int value
	 */
	public function get_ship_status(){
		return (int) $this->v_ship_status;
	}

	
	/**
	 * function allow change properties "ship_status" value
	 * @param $p_ship_status: int value
	 */
	public function set_ship_status($p_ship_status){
		$this->v_ship_status = (int) $p_ship_status;
	}

	
	/**
	 * function return properties "location_from" value
	 * @return int value
	 */
	public function get_location_from(){
		return (int) $this->v_location_from;
	}

	
	/**
	 * function allow change properties "location_from" value
	 * @param $p_location_from: int value
	 */
	public function set_location_from($p_location_from){
		$this->v_location_from = (int) $p_location_from;
	}

	
	/**
	 * function return properties "create_by" value
	 * @return string value
	 */
	public function get_create_by(){
		return $this->v_create_by;
	}

	
	/**
	 * function allow change properties "create_by" value
	 * @param $p_create_by: string value
	 */
	public function set_create_by($p_create_by){
		$this->v_create_by = $p_create_by;
	}

	
	/**
	 * function return properties "create_time" value
	 * @return int value indicates amount of seconds
	 */
	public function get_create_time(){
		return  $this->v_create_time->sec;
	}

	
	/**
	 * function allow change properties "create_time" value
	 * @param $p_create_time: string value format type: yyyy-mm-dd H:i:s
	 */
	public function set_create_time($p_create_time){
		$this->v_create_time = new MongoDate(strtotime($p_create_time));
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
		$arr = array('allocation_id' => $this->v_allocation_id
					,'order_items_id' => $this->v_order_items_id
					,'order_id' => $this->v_order_id
					,'location_id' => $this->v_location_id
					,'location_name' => $this->v_location_name
					,'location_address' => $this->v_location_address
					,'quantity' => $this->v_quantity
					,'shipper' => $this->v_shipper
					,'tracking_number' => $this->v_tracking_number
					,'tracking_url' => $this->v_tracking_url
					,'date_shipping' => $this->v_date_shipping
					,'ship_status' => $this->v_ship_status
					,'location_from' => $this->v_location_from
					,'create_by' => $this->v_create_by
					,'create_time' => $this->v_create_time);
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
	 *       SELECT * FROM `tb_allocation` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_allocation($db)
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
			$this->v_allocation_id = isset($arr['allocation_id'])?$arr['allocation_id']:0;
			$this->v_order_items_id = isset($arr['order_items_id'])?$arr['order_items_id']:0;
			$this->v_order_id = isset($arr['order_id'])?$arr['order_id']:0;
			$this->v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
			$this->v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
			$this->v_location_address = isset($arr['location_address'])?$arr['location_address']:'';
			$this->v_quantity = isset($arr['quantity'])?$arr['quantity']:1;
			$this->v_shipper = isset($arr['shipper'])?$arr['shipper']:'';
			$this->v_tracking_number = isset($arr['tracking_number'])?$arr['tracking_number']:'';
			$this->v_tracking_url = isset($arr['tracking_url'])?$arr['tracking_url']:'';
			$this->v_date_shipping = isset($arr['date_shipping'])?$arr['date_shipping']:(new MongoDate(time()));
			$this->v_ship_status = isset($arr['ship_status'])?$arr['ship_status']:0;
			$this->v_location_from = isset($arr['location_from'])?$arr['location_from']:0;
			$this->v_create_by = isset($arr['create_by'])?$arr['create_by']:'';
			$this->v_create_time = isset($arr['create_time'])?$arr['create_time']:(new MongoDate(time()));
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
	 * SELECT `allocation_id` FROM `tb_allocation` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_allocation($db)
	 * 		 $cls->select_scalar('allocation_id',array('user_id'=>2), array('user_email'=>-1))
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
	 *   SELECT `allocation_id` FROM `tb_allocation` WHERE `user_id`=2 ORDER BY `allocation_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_allocation($db)
	 * 		 $cls->select_next('allocation_id',array('user_id'=>2), array('allocation_id'=>-1))
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
	 * 		 $cls = new cls_tb_allocation($db)
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
	 * 		 $cls = new cls_tb_allocation($db)
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
	 * function select limit fields
	 * @param $p_offset int: start record to select, first record is 0
	 * @param $p_row int: amount of records to select
	 * @param $arr_fields array, array of fields will be selected
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @example:
	 * <code>
	 * SELECT * FROM `tbl_users` WHERE `user_id`>=2 ORDER BY `user_email` DESC LIMIT 10,20
	 * 		 $cls = new cls_tb_allocation($db)
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
			$arr = array('$set' => array('allocation_id' => $this->v_allocation_id,'order_items_id' => $this->v_order_items_id,'order_id' => $this->v_order_id,'location_id' => $this->v_location_id,'location_name' => $this->v_location_name,'location_address' => $this->v_location_address,'quantity' => $this->v_quantity,'shipper' => $this->v_shipper,'tracking_number' => $this->v_tracking_number,'tracking_url' => $this->v_tracking_url,'date_shipping' => $this->v_date_shipping,'ship_status' => $this->v_ship_status,'location_from' => $this->v_location_from,'create_by' => $this->v_create_by,'create_time' => $this->v_create_time));
		 else 
			$arr = array('$set' => array('order_items_id' => $this->v_order_items_id,'order_id' => $this->v_order_id,'location_id' => $this->v_location_id,'location_name' => $this->v_location_name,'location_address' => $this->v_location_address,'quantity' => $this->v_quantity,'shipper' => $this->v_shipper,'tracking_number' => $this->v_tracking_number,'tracking_url' => $this->v_tracking_url,'date_shipping' => $this->v_date_shipping,'ship_status' => $this->v_ship_status,'location_from' => $this->v_location_from,'create_by' => $this->v_create_by,'create_time' => $this->v_create_time));
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