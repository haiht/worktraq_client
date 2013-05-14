<?php
class cls_tb_order_log{

	private $v_log_id = 0;
	private $v_user_name = '';
	private $v_log_ip = '';
	private $v_log_url = '';
	private $v_log_time = '0000-00-00 00:00:00';
	private $v_log_action = '';
	private $v_log_result = 0;
	private $v_log_desc = '';
	private $v_order_id = 0;
	private $v_is_mail = 0;
	private $v_mail_send = 0;
    private $v_user_mail = '';
	private $v_order_status = 0;
	private $v_po_number = '';
	private $v_company_id = 0;
	private $v_location_id = 0;
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
		$this->collection = $db->selectCollection('tb_order_log');
		$this->v_log_time = new MongoDate(time());
		$this->collection->ensureIndex(array("log_id"=>1), array('name'=>"log_id_key", "unique"=>1, "dropDups" => 1));
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
		$v_filename = 'tb_order_log';
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
	 * function return properties "log_id" value
	 * @return int value
	 */
	public function get_log_id(){
		return (int) $this->v_log_id;
	}

	
	/**
	 * function allow change properties "log_id" value
	 * @param $p_log_id: int value
	 */
	public function set_log_id($p_log_id){
		$this->v_log_id = (int) $p_log_id;
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
	 * function return properties "log_ip" value
	 * @return string value
	 */
	public function get_log_ip(){
		return $this->v_log_ip;
	}

	
	/**
	 * function allow change properties "log_ip" value
	 * @param $p_log_ip: string value
	 */
	public function set_log_ip($p_log_ip){
		$this->v_log_ip = $p_log_ip;
	}

	
	/**
	 * function return properties "log_url" value
	 * @return string value
	 */
	public function get_log_url(){
		return $this->v_log_url;
	}

	
	/**
	 * function allow change properties "log_url" value
	 * @param $p_log_url: string value
	 */
	public function set_log_url($p_log_url){
		$this->v_log_url = $p_log_url;
	}

	
	/**
	 * function return properties "log_time" value
	 * @return int value indicates amount of seconds
	 */
	public function get_log_time(){
		return  $this->v_log_time->sec;
	}

	
	/**
	 * function allow change properties "log_time" value
	 * @param $p_log_time: string value format type: yyyy-mm-dd H:i:s
	 */
	public function set_log_time($p_log_time){
		$this->v_log_time = new MongoDate(strtotime($p_log_time));
	}

	
	/**
	 * function return properties "log_action" value
	 * @return string value
	 */
	public function get_log_action(){
		return $this->v_log_action;
	}

	
	/**
	 * function allow change properties "log_action" value
	 * @param $p_log_action: string value
	 */
	public function set_log_action($p_log_action){
		$this->v_log_action = $p_log_action;
	}

	
	/**
	 * function return properties "log_result" value
	 * @return int value
	 */
	public function get_log_result(){
		return (int) $this->v_log_result;
	}

	
	/**
	 * function allow change properties "log_result" value
	 * @param $p_log_result: int value
	 */
	public function set_log_result($p_log_result){
		$this->v_log_result = (int) $p_log_result;
	}

	
	/**
	 * function return properties "log_desc" value
	 * @return string value
	 */
	public function get_log_desc(){
		return $this->v_log_desc;
	}

	
	/**
	 * function allow change properties "log_desc" value
	 * @param $p_log_desc: string value
	 */
	public function set_log_desc($p_log_desc){
		$this->v_log_desc = $p_log_desc;
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
     * function return properties "is_mail" value
     * @return int value
     */
    public function get_is_mail(){
        return (int) $this->v_is_mail;
    }


    /**
     * function allow change properties "is_mail" value
     * @param $p_is_mail: int value
     */
    public function set_is_mail($p_is_mail){
        $this->v_is_mail = (int) $p_is_mail;
    }

    /**
     * function return properties "mail_send" value
     * @return int value
     */
    public function get_mail_send(){
        return (int) $this->v_mail_send;
    }

    /**
     * function allow change properties "user_mail" value
     * @param $p_user_mail: string value
     */
    public function set_user_mail($p_user_mail){
        $this->v_user_mail =  $p_user_mail;
    }

    /**
     * function return properties "user_mail" value
     * @return string value
     */
    public function get_user_mail(){
        return $this->v_user_mail;
    }


    /**
     * function allow change properties "mail_send" value
     * @param $p_mail_send: int value
     */
    public function set_mail_send($p_mail_send){
        $this->v_mail_send = (int) $p_mail_send;
    }


    /**
	 * function return properties "order_status" value
	 * @return int value
	 */
	public function get_order_status(){
		return (int) $this->v_order_status;
	}

	
	/**
	 * function allow change properties "order_status" value
	 * @param $p_order_status: int value
	 */
	public function set_order_status($p_order_status){
		$this->v_order_status = (int) $p_order_status;
	}

	
	/**
	 * function return properties "po_number" value
	 * @return string value
	 */
	public function get_po_number(){
		return $this->v_po_number;
	}

	
	/**
	 * function allow change properties "po_number" value
	 * @param $p_po_number: string value
	 */
	public function set_po_number($p_po_number){
		$this->v_po_number = $p_po_number;
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
		$arr = array('log_id' => $this->v_log_id
					,'user_name' => $this->v_user_name
					,'log_ip' => $this->v_log_ip
					,'log_url' => $this->v_log_url
					,'log_time' => $this->v_log_time
					,'log_action' => $this->v_log_action
					,'log_result' => $this->v_log_result
					,'log_desc' => $this->v_log_desc
					,'order_id' => $this->v_order_id
					,'is_mail' => $this->v_is_mail
					,'mail_send' => $this->v_mail_send
					,'user_mail' => $this->v_user_mail
					,'order_status' => $this->v_order_status
					,'po_number' => $this->v_po_number
					,'company_id' => $this->v_company_id
					,'location_id' => $this->v_location_id);
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
	 *       SELECT * FROM `tb_order_log` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_order_log($db)
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
			$this->v_log_id = isset($arr['log_id'])?$arr['log_id']:0;
			$this->v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
			$this->v_log_ip = isset($arr['log_ip'])?$arr['log_ip']:'';
			$this->v_log_url = isset($arr['log_url'])?$arr['log_url']:'';
			$this->v_log_time = isset($arr['log_time'])?$arr['log_time']:(new MongoDate(time()));
			$this->v_log_action = isset($arr['log_action'])?$arr['log_action']:'';
			$this->v_log_result = isset($arr['log_result'])?$arr['log_result']:0;
			$this->v_log_desc = isset($arr['log_desc'])?$arr['log_desc']:'';
			$this->v_order_id = isset($arr['order_id'])?$arr['order_id']:0;
			$this->v_is_mail = isset($arr['is_mail'])?$arr['is_mail']:0;
			$this->v_mail_send = isset($arr['mail_send'])?$arr['mail_send']:0;
			$this->v_mail_send = isset($arr['user_mail'])?$arr['user_mail']:'';
			$this->v_order_status = isset($arr['order_status'])?$arr['order_status']:0;
			$this->v_po_number = isset($arr['po_number'])?$arr['po_number']:0;
			$this->v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
			$this->v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
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
	 * SELECT `log_id` FROM `tb_order_log` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_order_log($db)
	 * 		 $cls->select_scalar('log_id',array('user_id'=>2), array('user_email'=>-1))
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
	 *   SELECT `log_id` FROM `tb_order_log` WHERE `user_id`=2 ORDER BY `log_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_order_log($db)
	 * 		 $cls->select_next('log_id',array('user_id'=>2), array('log_id'=>-1))
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
	 * 		 $cls = new cls_tb_order_log($db)
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
	 * 		 $cls = new cls_tb_order_log($db)
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
	 * 		 $cls = new cls_tb_order_log($db)
	 * 		 $cls->select_distinct('nam')
	 * </code>
	 * @return array with indexes are names of fields 
	 */
	public function select_distinct($p_field_name){
		return $this->collection->command(array("distinct"=>"tb_order_log", "key"=>$p_field_name));
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
	 * 		 $cls = new cls_tb_order_log($db)
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
			$arr = array('$set' => array('log_id' => $this->v_log_id,'user_name' => $this->v_user_name,'log_ip' => $this->v_log_ip,'log_url' => $this->v_log_url,'log_time' => $this->v_log_time,'log_action' => $this->v_log_action,'log_result' => $this->v_log_result,'log_desc' => $this->v_log_desc,'order_id' => $this->v_order_id,'is_mail' => $this->v_is_mail,'mail_send' => $this->v_mail_send,'user_mail' => $this->v_user_mail,'order_status' => $this->v_order_status,'po_number' => $this->v_po_number,'company_id' => $this->v_company_id,'location_id' => $this->v_location_id));
		 else 
			$arr = array('$set' => array('user_name' => $this->v_user_name,'log_ip' => $this->v_log_ip,'log_url' => $this->v_log_url,'log_time' => $this->v_log_time,'log_action' => $this->v_log_action,'log_result' => $this->v_log_result,'log_desc' => $this->v_log_desc,'order_id' => $this->v_order_id,'is_mail' => $this->v_is_mail,'mail_send' => $this->v_mail_send,'user_mail' => $this->v_user_mail,'order_status' => $this->v_order_status,'po_number' => $this->v_po_number,'company_id' => $this->v_company_id,'location_id' => $this->v_location_id));
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

    public function save_log(cls_tb_order $cls, $p_user_name, $p_action, $p_result, $p_description, $p_is_mail=0, $p_mail_send=0, $v_user_mail = ''){
        $v_log_id = $this->select_next('log_id');
        $this->set_log_id($v_log_id);
        $this->v_order_id = $cls->get_order_id();
        $this->v_po_number = $cls->get_po_number();
        $this->v_order_status = $cls->get_status();
        $this->v_company_id = $cls->get_company_id();
        $this->v_location_id = $cls->get_location_id();
        $this->v_log_action = $p_action;
        $this->v_log_result = $p_result;
        $this->v_log_desc = $p_description;
        $this->v_log_ip = get_real_ip_address();
        $this->v_log_url = isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:'';
        $this->v_user_name = $p_user_name;
        $this->v_log_time = new MongoDate(time());
        $this->v_is_mail = $p_is_mail;
        $this->v_mail_send = $p_mail_send;
        $this->v_user_mail = $v_user_mail;
        return $this->insert();
    }
}
?>