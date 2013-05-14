<?php
class cls_tb_contact{
	private $v_contact_id = 0;
	private $v_location_id = 0;
    private $v_company_id = 0;
	private $v_contact_type = 0;
	private $v_first_name = '';
	private $v_last_name = '';
	private $v_middle_name = '';
	private $v_birth_date = '0000-00-00 00:00:00';
	private $v_address_type = 0;
    private $v_receive_email_flag = 0;
	private $v_address_unit = '';
	private $v_address_line_1 = '';
	private $v_address_line_2 = '';
	private $v_address_line_3 = '';
	private $v_address_city = '';
	private $v_address_province = '';
	private $v_address_postal = '';
	private $v_address_country = 0;
	private $v_direct_phone = '';
	private $v_mobile_phone = '';
	private $v_fax_number = '';
	private $v_home_phone = '';
	private $v_email = '';
	private $v_user_id = 0;
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
		$this->collection = $db->selectCollection('tb_contact');
		$this->collection->ensureIndex(array("location_id"=>1));
		$this->collection->ensureIndex(array("user_id"=>1));
		$this->v_birth_date = new MongoDate(time());
		$this->collection->ensureIndex(array("contact_id"=>1), array('name'=>"contact_id_key", "unique"=>1, "dropDups" => 1));
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
		$v_filename = 'tb_contact';
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
	 * function return properties "contact_id" value
	 * @return int value
	 */
	public function get_contact_id(){
		return (int) $this->v_contact_id;
	}

	
	/**
	 * function allow change properties "contact_id" value
	 * @param $p_contact_id: int value
	 */
	public function set_contact_id($p_contact_id){
		$this->v_contact_id = (int) $p_contact_id;
	}

	
	/**
	 * function return properties "location_id" value
	 * @return int value
	 */
	public function get_location_id(){
		return $this->v_location_id;
	}


    public function get_company_id(){
        return (int) $this->v_company_id;
    }

    public function set_company_id($p_company_id){
        $this->v_company_id = (int) $p_company_id;
    }

	
	/**
	 * function allow change properties "location_id" value
	 * @param $p_location_id: int value
	 */
	public function set_location_id($p_location_id){
        $this->v_location_id = $p_location_id;
	}

	
	/**
	 * function return properties "contact_type" value
	 * @return string value
	 */
	public function get_contact_type(){
		return $this->v_contact_type;
	}

	
	/**
	 * function allow change properties "contact_type" value
	 * @param $p_contact_type: string value
	 */
	public function set_contact_type($p_contact_type){
		$this->v_contact_type = (int) $p_contact_type;
	}

	
	/**
	 * function return properties "first_name" value
	 * @return string value
	 */
	public function get_first_name(){
		return $this->v_first_name;
	}

	
	/**
	 * function allow change properties "first_name" value
	 * @param $p_first_name: string value
	 */
	public function set_first_name($p_first_name){
		$this->v_first_name = $p_first_name;
	}

	
	/**
	 * function return properties "last_name" value
	 * @return string value
	 */
	public function get_last_name(){
		return $this->v_last_name;
	}

	
	/**
	 * function allow change properties "last_name" value
	 * @param $p_last_name: string value
	 */
	public function set_last_name($p_last_name){
		$this->v_last_name = $p_last_name;
	}

	
	/**
	 * function return properties "middle_name" value
	 * @return string value
	 */
	public function get_middle_name(){
		return $this->v_middle_name;
	}

	
	/**
	 * function allow change properties "middle_name" value
	 * @param $p_middle_name: string value
	 */
	public function set_middle_name($p_middle_name){
		$this->v_middle_name = $p_middle_name;
	}

	
	/**
	 * function return properties "birth_date" value
	 * @return int value indicates amount of seconds
	 */
	public function get_birth_date(){
		return  $this->v_birth_date->sec;
	}

	
	/**
	 * function allow change properties "birth_date" value
	 * @param $p_birth_date: string value format type: yyyy-mm-dd H:i:s
	 */
	public function set_birth_date($p_birth_date){
		$this->v_birth_date = new MongoDate(strtotime($p_birth_date));
	}

	
	/**
	 * function return properties "address_type" value
	 * @return int value
	 */
	public function get_address_type(){
		return (int) $this->v_address_type;
	}

	
	/**
	 * function allow change properties "address_type" value
	 * @param $p_address_type: int value
	 */
	public function set_address_type($p_address_type){
		$this->v_address_type = (int) $p_address_type;
	}

	
	/**
	 * function return properties "address_unit" value
	 * @return string value
	 */
	public function get_address_unit(){
		return $this->v_address_unit;
	}

	
	/**
	 * function allow change properties "address_unit" value
	 * @param $p_address_unit: string value
	 */
	public function set_address_unit($p_address_unit){
		$this->v_address_unit = $p_address_unit;
	}

	
	/**
	 * function return properties "address_line_1" value
	 * @return string value
	 */
	public function get_address_line_1(){
		return $this->v_address_line_1;
	}

	
	/**
	 * function allow change properties "address_line_1" value
	 * @param $p_address_line_1: string value
	 */
	public function set_address_line_1($p_address_line_1){
		$this->v_address_line_1 = $p_address_line_1;
	}

	
	/**
	 * function return properties "address_line_2" value
	 * @return string value
	 */
	public function get_address_line_2(){
		return $this->v_address_line_2;
	}

	
	/**
	 * function allow change properties "address_line_2" value
	 * @param $p_address_line_2: string value
	 */
	public function set_address_line_2($p_address_line_2){
		$this->v_address_line_2 = $p_address_line_2;
	}

	
	/**
	 * function return properties "address_line_3" value
	 * @return string value
	 */
	public function get_address_line_3(){
		return $this->v_address_line_3;
	}

	
	/**
	 * function allow change properties "address_line_3" value
	 * @param $p_address_line_3: string value
	 */
	public function set_address_line_3($p_address_line_3){
		$this->v_address_line_3 = $p_address_line_3;
	}

	
	/**
	 * function return properties "address_city" value
	 * @return string value
	 */
	public function get_address_city(){
		return $this->v_address_city;
	}

	
	/**
	 * function allow change properties "address_city" value
	 * @param $p_address_city: string value
	 */
	public function set_address_city($p_address_city){
		$this->v_address_city = $p_address_city;
	}

	
	/**
	 * function return properties "address_province" value
	 * @return string value
	 */
	public function get_address_province(){
		return $this->v_address_province;
	}

	
	/**
	 * function allow change properties "address_province" value
	 * @param $p_address_province: string value
	 */
	public function set_address_province($p_address_province){
		$this->v_address_province = $p_address_province;
	}

	
	/**
	 * function return properties "address_postal" value
	 * @return string value
	 */
	public function get_address_postal(){
		return $this->v_address_postal;
	}

	
	/**
	 * function allow change properties "address_postal" value
	 * @param $p_address_postal: string value
	 */
	public function set_address_postal($p_address_postal){
		$this->v_address_postal = $p_address_postal;
	}

	
	/**
	 * function return properties "address_country" value
	 * @return int value
	 */
	public function get_address_country(){
		return  $this->v_address_country;
	}

	
	/**
	 * function allow change properties "address_country" value
	 * @param $p_address_country: int value
	 */
	public function set_address_country($p_address_country){
		$this->v_address_country = (int) $p_address_country;
	}

	
	/**
	 * function return properties "direct_phone" value
	 * @return string value
	 */
	public function get_direct_phone(){
		return $this->v_direct_phone;
	}

	
	/**
	 * function allow change properties "direct_phone" value
	 * @param $p_direct_phone: string value
	 */
	public function set_direct_phone($p_direct_phone){
		$this->v_direct_phone = $p_direct_phone;
	}

	
	/**
	 * function return properties "mobile_phone" value
	 * @return string value
	 */
	public function get_mobile_phone(){
		return $this->v_mobile_phone;
	}

	
	/**
	 * function allow change properties "mobile_phone" value
	 * @param $p_mobile_phone: string value
	 */
	public function set_mobile_phone($p_mobile_phone){
		$this->v_mobile_phone = $p_mobile_phone;
	}

	
	/**
	 * function return properties "fax_number" value
	 * @return string value
	 */
	public function get_fax_number(){
		return $this->v_fax_number;
	}

	
	/**
	 * function allow change properties "fax_number" value
	 * @param $p_fax_number: string value
	 */
	public function set_fax_number($p_fax_number){
		$this->v_fax_number = $p_fax_number;
	}

	
	/**
	 * function return properties "home_phone" value
	 * @return string value
	 */
	public function get_home_phone(){
		return $this->v_home_phone;
	}

	
	/**
	 * function allow change properties "home_phone" value
	 * @param $p_home_phone: string value
	 */
	public function set_home_phone($p_home_phone){
		$this->v_home_phone = $p_home_phone;
	}

	
	/**
	 * function return properties "email" value
	 * @return string value
	 */
	public function get_email(){
		return $this->v_email;
	}

	
	/**
	 * function allow change properties "email" value
	 * @param $p_email: string value
	 */
	public function set_email($p_email){
		$this->v_email = $p_email;
	}

	
	/**
	 * function return properties "user_id" value
	 * @return int value
	 */
	public function get_user_id(){
		return (int) $this->v_user_id;
	}

	
	/**
	 * function allow change properties "user_id" value
	 * @param $p_user_id: int value
	 */
	public function set_user_id($p_user_id){
		$this->v_user_id = (int) $p_user_id;
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
     * @param $p_receive_email_flag
     */
    public function set_receive_email_flag($p_receive_email_flag){
        $this->v_receive_email_flag = (int)$p_receive_email_flag;
    }

    /**
     * @return int
     */
    public function get_receive_email(){
        return $this->v_receive_email_flag;
    }
	
	/**
	 *  function allow insert one record
	 *  @return MongoID
	 */
	public function insert(){
		$arr = array('contact_id' => $this->v_contact_id
					,'location_id' => $this->v_location_id
					,'company_id' => $this->v_company_id
					,'contact_type' => $this->v_contact_type
					,'first_name' => $this->v_first_name
					,'last_name' => $this->v_last_name
					,'middle_name' => $this->v_middle_name
					,'birth_date' => $this->v_birth_date
					,'address_type' => $this->v_address_type
					,'address_unit' => $this->v_address_unit
					,'address_line_1' => $this->v_address_line_1
					,'address_line_2' => $this->v_address_line_2
					,'address_line_3' => $this->v_address_line_3
					,'address_city' => $this->v_address_city
					,'address_province' => $this->v_address_province
					,'address_postal' => $this->v_address_postal
					,'address_country' => $this->v_address_country
					,'direct_phone' => $this->v_direct_phone
					,'mobile_phone' => $this->v_mobile_phone
					,'fax_number' => $this->v_fax_number
					,'home_phone' => $this->v_home_phone
					,'email' => $this->v_email
					,'receive_email_flag' => $this->v_receive_email_flag
					,'user_id' => $this->v_user_id);
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
	 *       SELECT * FROM `tb_contact` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_contact($db)
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
			$this->v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
			$this->v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
			$this->v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
			$this->v_contact_type = isset($arr['contact_type'])?$arr['contact_type']:0;
			$this->v_first_name = isset($arr['first_name'])?$arr['first_name']:'';
			$this->v_last_name = isset($arr['last_name'])?$arr['last_name']:'';
			$this->v_middle_name = isset($arr['middle_name'])?$arr['middle_name']:'';
			$this->v_birth_date = isset($arr['birth_date'])?$arr['birth_date']:(new MongoDate(time()));
			$this->v_address_type = isset($arr['address_type'])?$arr['address_type']:0;
			$this->v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
			$this->v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
			$this->v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
			$this->v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
			$this->v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
			$this->v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
			$this->v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
			$this->v_address_country = isset($arr['address_country'])?$arr['address_country']:0;
			$this->v_direct_phone = isset($arr['direct_phone'])?$arr['direct_phone']:'';
			$this->v_mobile_phone = isset($arr['mobile_phone'])?$arr['mobile_phone']:'';
			$this->v_fax_number = isset($arr['fax_number'])?$arr['fax_number']:'';
			$this->v_home_phone = isset($arr['home_phone'])?$arr['home_phone']:'';
			$this->v_email = isset($arr['email'])?$arr['email']:'';
			$this->v_receive_email_flag = isset($arr['receive_email_flag'])?$arr['receive_email_flag']:'';
			$this->v_user_id = isset($arr['user_id'])?$arr['user_id']:0;
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
	 * SELECT `contact_id` FROM `tb_contact` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_contact($db)
	 * 		 $cls->select_scalar('contact_id',array('user_id'=>2), array('user_email'=>-1))
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
	 *   SELECT `contact_id` FROM `tb_contact` WHERE `user_id`=2 ORDER BY `contact_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_contact($db)
	 * 		 $cls->select_next('contact_id',array('user_id'=>2), array('contact_id'=>-1))
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
	 * 		 $cls = new cls_tb_contact($db)
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
     * @param $p_offset
     * @param $p_row
     * @param array $arr_where
     * @param array $arr_order
     * @return MongoCursor
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
	 * @param $arr_field array, array of fields will be selected
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @example:
	 * <code>
	 * SELECT * FROM `tbl_users` WHERE `user_id`>=2 ORDER BY `user_email` DESC LIMIT 10,20
	 * 		 $cls = new cls_tb_contact($db)
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
			$arr = array('$set' => array('contact_id' => $this->v_contact_id,'location_id' => $this->v_location_id,'company_id' => $this->v_company_id,'contact_type' => $this->v_contact_type,'first_name' => $this->v_first_name,'last_name' => $this->v_last_name,'middle_name' => $this->v_middle_name,'birth_date' => $this->v_birth_date,'address_type' => $this->v_address_type,'address_unit' => $this->v_address_unit,'address_line_1' => $this->v_address_line_1,'address_line_2' => $this->v_address_line_2,'address_line_3' => $this->v_address_line_3,'address_city' => $this->v_address_city,'address_province' => $this->v_address_province,'address_postal' => $this->v_address_postal,'address_country' => $this->v_address_country,'direct_phone' => $this->v_direct_phone,'mobile_phone' => $this->v_mobile_phone,'fax_number' => $this->v_fax_number,'home_phone' => $this->v_home_phone,'email' => $this->v_email,'receive_email_flag'=> $this->v_receive_email_flag,'user_id' => $this->v_user_id));
		else
			$arr = array('$set' => array('location_id' => $this->v_location_id,'company_id' => $this->v_company_id,'contact_type' => $this->v_contact_type,'first_name' => $this->v_first_name,'last_name' => $this->v_last_name,'middle_name' => $this->v_middle_name,'birth_date' => $this->v_birth_date,'address_type' => $this->v_address_type,'address_unit' => $this->v_address_unit,'address_line_1' => $this->v_address_line_1,'address_line_2' => $this->v_address_line_2,'address_line_3' => $this->v_address_line_3,'address_city' => $this->v_address_city,'address_province' => $this->v_address_province,'address_postal' => $this->v_address_postal,'address_country' => $this->v_address_country,'direct_phone' => $this->v_direct_phone,'mobile_phone' => $this->v_mobile_phone,'fax_number' => $this->v_fax_number,'home_phone' => $this->v_home_phone,'email' => $this->v_email,'receive_email_flag'=>$this->v_receive_email_flag,'user_id' => $this->v_user_id));
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
     * @param $p_field_value
     * @param $p_field_display
     * @param $p_selected_value
     * @param array $arr_where
     * @param array $arr_order
     * @return string
     */
    public function draw_option_contact($p_contact_id, array $arr_where = array(), array $arr_order = array()){
        if(is_null($arr_where) || count($arr_where)==0){
            $v_has_mongo_id = !is_null($this->v_mongo_id);
            if($v_has_mongo_id)
                $arr_where = array('_id' => $this->v_mongo_id);
        }
        if(is_null($arr_order) || count($arr_order)==0) $arr_order = array('_id' => 1);
        $arr = $this->select($arr_where, $arr_order);
        $v_dsp_option = '';
        foreach($arr as $a){
            $v_contatct_id = isset($a['contact_id']) ? $a['contact_id'] :0;
            $v_first_name = isset($a['first_name']) ? $a['first_name'] :' ';
            $v_last_name =isset($a['last_name']) ? $a['last_name'] :' ';
            if($v_contatct_id == $p_contact_id)
                $v_dsp_option .= '<option value="'.$v_contatct_id.'" selected="selected"> '.$v_first_name .' '. $v_last_name.' <br > </option>';
            else
                $v_dsp_option .= '<option value="'.$v_contatct_id.'">'.$v_first_name .' '. $v_last_name.'</option>';
        }
        return $v_dsp_option;
    }


	/**
	 * function draw option tag
	 * @param $p_field_value mixed: name of field will be value option tag
	 * @param $p_selected_value mixed: value of field will be diaplay text option tag
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @return string
	 */
	public function draw_option_full_name($p_field_value, $p_selected_value, array $arr_where = array(), array $arr_order = array()){
		if(is_null($arr_where) || count($arr_where)==0){
			$v_has_mongo_id = !is_null($this->v_mongo_id);
			if($v_has_mongo_id)
				$arr_where = array('_id' => $this->v_mongo_id);
		}
		if(is_null($arr_order) || count($arr_order)==0) $arr_order = array('_id' => 1);
		$arr = $this->select_limit_fields(0, 0, array($p_field_value, 'first_name', 'last_name', 'middle_name'), $arr_where, $arr_order);
		$v_dsp_option = '';
		foreach($arr as $a){
			if($a[$p_field_value] == $p_selected_value)
				$v_dsp_option .= '<option value="'.$a[$p_field_value].'" selected="selected">'.$a['first_name'].', '.$a['last_name'].' '.$a['middle_name'].'</option>';
			else
				$v_dsp_option .= '<option value="'.$a[$p_field_value].'">'.$a['first_name'].', '.$a['last_name'].' '.$a['middle_name'].'</option>';
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

    /** Get infomation for location
        First Name LastName
     *  Address :
     *  Email :
     *  Direct Phone :
     */
    public function get_infomation_contact($p_contact_id)
    {
        $rss = $this->collection->find(array('contact_id'=>(int)$p_contact_id ))->limit(1);
        $v_count = 0;
        $v_info = "";
        foreach($rss as $arr){
            $v_first_name = isset($arr['first_name'])?$arr['first_name']:'';
            $v_last_name = isset($arr['last_name'])?$arr['last_name']:'';
            $v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
            $v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
            $v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
            $v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
            $v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
            $v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
            $v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
            $v_direct_phone = isset($arr['direct_phone'])?$arr['direct_phone']:'';
            $v_email = isset($arr['email'])?$arr['email']:'';
            $v_count++;
        }
        if($v_count>0)
        {
            $v_info = "<b>".$v_first_name.' ' .$v_last_name ."</b><br>";
            $v_info .= ($v_address_unit!=''?$v_address_unit.',':'') . ($v_address_line_1!=''?$v_address_line_1. '<br>':'');
            $v_info .= (trim($v_address_line_2)!="" ? "-". $v_address_line_2.'<br>': '');
            $v_info .= (trim($v_address_line_3)!="" ? "-". $v_address_line_3.'<br>': '');
            $v_info .=  $v_address_city.'&nbsp&nbsp' .$v_address_province .'&nbsp&nbsp'.   $v_address_postal.'<br>' ;
            $v_info .=  ($v_direct_phone!=''?$v_direct_phone .'<br>':'') ;
            $v_info .=  $v_email;
        }
        return $v_info;
    }

    /**
     * @param $p_contact_id
     * @return string
     */
    public function get_full_name_contact($p_contact_id)
    {
        $rss = $this->select_limit(0,1,array('contact_id'=>(int)$p_contact_id));
        $v_info = "";
        foreach($rss as $arr){
            $v_first_name = isset($arr['first_name'])?$arr['first_name']:'';
            $v_last_name = isset($arr['last_name'])?$arr['last_name']:'';
            $v_info = $v_first_name .' '. $v_last_name;
        }
        return $v_info;
    }

    /**
     * @param $p_user_id
     * @return string
     */
    public function get_full_name_user($p_user_id)
    {
        $v_row = $this->select_one(array('user_id'=>(int)$p_user_id));
        if($v_row==1){
            return $this->get_first_name().' '.$this->get_last_name();
        }else{
            return '';
        }
    }
}
?>