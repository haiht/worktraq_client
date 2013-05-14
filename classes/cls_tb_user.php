<?php
add_class('cls_tb_role');
add_class('cls_tb_module');
class cls_tb_user{

	private $v_user_id = 0;
	private $v_user_name = '';
	private $v_user_password = '';
	private $v_user_type = 3;
	private $v_user_status = 0;
	private $v_user_lastlog = '0000-00-00 00:00:00';
    private $arr_user_rule = array();
    private $v_user_location_approve = '';
    private $v_user_location_allocate = '';
    private $v_user_location_view = '';
	private $collection = NULL;
	private $v_mongo_id = NULL;
	private $v_error_code = 0;
	private $v_error_message = '';
	private $v_is_log = false;
    private $v_contact_id = 0;
	private $v_company_id = 0;
	private $arr_user_role = array();
    private $v_location_id = 0;
	private $v_dir = '';
	
	/**
	 *  constructor function
	 *  @param $db: instance of Mongo
	 *  @param $p_log_dir string: directory contains its log file
	 */
	public function __construct(MongoDB $db, $p_log_dir = ""){
		$this->v_is_log = $p_log_dir!='' && file_exists($p_log_dir) && is_writable($p_log_dir);
		if($this->v_is_log) $this->v_dir = $p_log_dir.DIRECTORY_SEPARATOR;
		$this->collection = $db->selectCollection('tb_user');
		$this->v_user_lastlog = new MongoDate(time());
		$this->collection->ensureIndex(array("user_id"=>1), array('name'=>"user_id_key", "unique"=>1, "dropDups" => 1));
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
		$v_filename = 'tb_user';
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
     * @return string
     */
    public function get_user_name(){
		return $this->v_user_name;
	}


    /**
     * @return array
     */

    public function get_user_rule()
    {
        return $this->arr_user_rule;
    }

    public function set_user_rule(array $arr_user_rule = array())
    {
        $this->arr_user_rule = $arr_user_rule;
    }

    /**
     * @param $p_contact_id
     */

    public function set_contact_id($p_contact_id)
    {
         $this->v_contact_id = (int)$p_contact_id;
    }

    /**
     * @return int
     */
    public function get_contact_id()
    {
        return $this->v_contact_id;
    }


    /**
     * function allow change properties "user_name" value
     * @param $p_user_name: string value
     */
    public function set_location_id($p_location_id)
    {
         $this->v_location_id = (int)$p_location_id;
    }
    /*
     *
     */
    public function get_location_id()
    {
        return (int) $this->v_location_id;
    }

    /**
     * @param $p_company_id
     */

    public function set_company_id($p_company_id)
    {
        $this->v_company_id = (int)$p_company_id;
    }

    /**
     * @return int
     */
    public function get_company_id()
    {
        return (int) $this->v_company_id;
    }

    /**
     * @param array $arr_user_role
     */

    public function set_user_role(array $arr_user_role = array())
    {
        $this->arr_user_role = $arr_user_role;
    }

    /**
     * @return array
     */
    public function get_user_role()
    {
        return $this->arr_user_role;
    }

	/**
	 * function allow change properties "user_name" value
	 * @param $p_user_name: string value
	 */
	public function set_user_name($p_user_name){
		$this->v_user_name = $p_user_name;
	}
	/**
	 * function return properties "user_password" value
	 * @return string value
	 */
	public function get_user_password(){
		return $this->v_user_password;
	}
	/**
	 * function allow change properties "user_password" value
	 * @param $p_user_password: string value
	 */
	public function set_user_password($p_user_password){
		$this->v_user_password = $p_user_password;
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
	 * function return properties "user_status" value
	 * @return int value
	 */
	public function get_user_status(){
		return (int) $this->v_user_status;
	}
	/**
	 * function allow change properties "user_status" value
	 * @param $p_user_status: int value
	 */
	public function set_user_status($p_user_status){
		$this->v_user_status = (int) $p_user_status;
	}
	/**
	 * function return properties "user_lastlog" value
	 * @return int value indicates amount of seconds
	 */
	public function get_user_lastlog(){
		return  $this->v_user_lastlog->sec;
	}
	/**
	 * function allow change properties "user_lastlog" value
	 * @param $p_user_lastlog: string value format type: yyyy-mm-dd H:i:s
	 */
	public function set_user_lastlog($p_user_lastlog){
		$this->v_user_lastlog = new MongoDate(strtotime($p_user_lastlog));
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
     * @return string
     */
    public  function get_user_location_approve(){
        return $this->v_user_location_approve;
    }

    /**
     * @param $p_user_location_approve
     */
    public function set_user_location_approve($p_user_location_approve)
    {
        $this->v_user_location_approve = $p_user_location_approve;
    }

    /**
     * @return string
     */
    public  function get_user_location_allocate(){
        return $this->v_user_location_allocate;
    }

    /**
     * @param $p_user_location_allocate
     */
    public function set_user_location_allocate($p_user_location_allocate)
    {
        $this->v_user_location_allocate = $p_user_location_allocate;
    }

    /**
     * @return string
     */
    public  function get_user_location_view(){
        return $this->v_user_location_view;
    }

    /**
     * @param $p_user_location_view
     */
    public function set_user_location_view($p_user_location_view)
    {
        $this->v_user_location_view = $p_user_location_view;
    }


    /**
     *  function allow insert one record
     *  @return MongoID
     */
	public function insert(){
		$arr = array('user_id' => $this->v_user_id
					,'user_name' => $this->v_user_name
					,'user_password' => $this->v_user_password
					,'user_type' => $this->v_user_type
                    ,'user_status' => $this->v_user_status
                    ,'contact_id' => $this->v_contact_id
                    ,'company_id' => $this->v_company_id
                    ,'location_id'=> $this->v_location_id
                    ,'location_id'=> $this->v_location_id
					,'user_role' => $this->arr_user_role
					,'user_rule' => $this->arr_user_rule
					,'user_location_approve' => $this->v_user_location_approve
					,'user_location_allocate' => $this->v_user_location_allocate
					,'user_location_view' => $this->v_user_location_view
				);
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
	 *       SELECT * FROM `tb_user` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_user($db)
	 * 		 $cls->select_one(array('user_id'=>2), array('user_email'=>-1))
	 * </code>
	 * @return int
	 */
	public function select_one(array $arr_where = array(), array $arr_order = array()){
        /*
		if(is_null($arr_order) || count($arr_order)==0){
			$arr_order = array('_id' => -1);//last insert show first
		}
        */
		$rss = $this->collection->find($arr_where)->sort($arr_order)->limit(1);

        $v_count = 0;
		foreach($rss as $arr){
			$this->v_user_id = isset($arr['user_id'])?$arr['user_id']:0;
			$this->v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
			$this->v_user_password = isset($arr['user_password'])?$arr['user_password']:'';
			$this->v_user_type = isset($arr['user_type'])?$arr['user_type']:3;
			$this->v_user_status = isset($arr['user_status'])?$arr['user_status']:0;
			$this->v_user_lastlog = isset($arr['user_lastlog'])?$arr['user_lastlog']:(new MongoDate(time()));
			$this->v_contact_id = isset($arr['contact_id'])?$arr['contact_id']: 0  ;
			$this->v_company_id = isset($arr['company_id'])?$arr['company_id']: 0  ;
			$this->v_location_id = isset($arr['location_id'])?$arr['location_id']: 0  ;
            $this->arr_user_rule = isset($arr['user_rule'])?$arr['user_rule']: array()  ;
            $this->arr_user_role = isset($arr['user_role'])?$arr['user_role']: array()  ;
            $this->v_user_location_approve = isset($arr['user_location_approve'])?$arr['user_location_approve']: ''  ;
            $this->v_user_location_allocate = isset($arr['user_location_allocate'])?$arr['user_location_allocate']: ''  ;
            $this->v_user_location_view = isset($arr['user_location_view'])?$arr['user_location_view']: ''  ;
			$this->v_mongo_id = $arr['_id'];
			$v_count++;
		}
		return $v_count;
	}

    public function get_all_user_by_contact($p_location=0,$arr_order=array())
    {
        $rss = $this->collection->find(array("contact_id"=>(int)$p_location));
        $v_count = 0;

        foreach($rss as $arr){
            $this->v_user_id = isset($arr['user_id'])?$arr['user_id']:0;
            $this->v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
            $this->v_user_password = isset($arr['user_password'])?$arr['user_password']:'';
            $this->v_user_type = isset($arr['user_type'])?$arr['user_type']:3;
            $this->v_user_status = isset($arr['user_status'])?$arr['user_status']:0;
            $this->v_user_lastlog = isset($arr['user_lastlog'])?$arr['user_lastlog']:(new MongoDate(time()));
            $this->v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0  ;
            $this->v_company_id = isset($arr['company_id'])?$arr['company_id']:0  ;
            $this->v_location_id = isset($arr['location_id'])?$arr['location_id']: 0  ;
            $this->v_user_location_approve = isset($arr['user_location_approve'])?$arr['user_location_approve']: ''  ;
            $this->v_user_location_allocate = isset($arr['user_location_allocate'])?$arr['user_location_allocate']: ''  ;
            $this->v_user_location_view = isset($arr['user_location_view'])?$arr['user_location_view']: ''  ;
            $this->v_mongo_id = $arr['_id'];
            $v_count++;
        }
        return $v_count;
    }
    public function get_username_by_contact($p_location=0)
    {
        $rss = $this->collection->find(array("contact_id"=>(int)$p_location));

        foreach($rss as $arr){
            $this->v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
            return $this->v_user_name;
        }

        return "";

    }
	
	/**
	 * function select scalar value
	 * @param $p_field_name string, name of field
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @result: assign to properties
	 * @example: 
	 * <code>
	 * SELECT `user_id` FROM `tb_user` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_user($db)
	 * 		 $cls->select_scalar('user_id',array('user_id'=>2), array('user_email'=>-1))
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
	 *   SELECT `user_id` FROM `tb_user` WHERE `user_id`=2 ORDER BY `user_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_user($db)
	 * 		 $cls->select_next('user_id',array('user_id'=>2), array('user_id'=>-1))
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
	 * 		 $cls = new cls_tb_user($db)
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
	 * 		 $cls = new cls_tb_user($db)
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
			$arr = array('$set' => array('user_id' => $this->v_user_id,'user_name' => $this->v_user_name,'user_password' => $this->v_user_password,'user_type' => $this->v_user_type, 'user_status' => $this->v_user_status,'user_lastlog' => $this->v_user_lastlog,'contact_id' => $this->v_contact_id,'company_id' => $this->v_company_id,'location_id' => $this->v_location_id,'user_location_approve' => $this->v_user_location_approve,'user_location_allocate' => $this->v_user_location_allocate,'user_location_view' => $this->v_user_location_view));
		else
			$arr = array('$set' => array('user_name' => $this->v_user_name,'user_password' => $this->v_user_password,'user_type' => $this->v_user_type,'user_status' => $this->v_user_status,'user_lastlog' => $this->v_user_lastlog ,'contact_id' => $this->v_contact_id,'company_id' => $this->v_company_id,'location_id' => $this->v_location_id,'user_location_approve' => $this->v_user_location_approve,'user_location_allocate' => $this->v_user_location_allocate,'user_location_view' => $this->v_user_location_view));
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

    public function check_user_rule($p_rule, $p_location_id, $p_user_name=''){
        $v_user_name = $p_user_name!=''?$p_user_name:$this->get_user_name();
        $v_row = $this->select_one(array('user_name'=>$v_user_name));
        if($v_row==1){
            $v_list_location = '';
            if($p_rule=='user_location_approve')
                $v_list_location = $this->get_user_location_approve();
            else if($p_rule=='user_location_allocate')
                $v_list_location = $this->get_user_location_allocate();
            else if($p_rule=='user_location_view')
                $v_list_location = $this->get_user_location_view();
            if(strpos($v_list_location.',', $p_location_id.',')!==false)
                return 1;
            else if($p_location_id==$this->get_location_id())
                return -1;
            else
                return 0;
        }else{
            return 0;
        }
    }

    /**
     * @param MongoDB $db
     * @return array
     */
    public function get_all_permission(MongoDB $db){
        $v_user_type = $this->v_user_type;
        $v_company_id = $this->v_company_id;
        $arr_user_rule = $this->arr_user_rule;
        if(!is_array($arr_user_rule)) $arr_user_rule= array();
        $cls_role = new cls_tb_role($db, $this->v_dir);
        $cls_module = new cls_tb_module($db, $this->v_dir);
        $arr_all_role = array();
        $arr_role_return = array();
        //get all role default
        $arr_role = $cls_role->select(array('user_type'=>$v_user_type, 'company_id'=>$v_company_id, 'default_role'=>1));
        foreach($arr_role as $arr){
            $arr_role_content = $arr['role_content'];
            foreach($arr_role_content as $menu=>$list){
                if(!isset($arr_all_role[$menu])){
                    $arr_module_rule = $cls_module->select_scalar('module_rules', array('module_menu'=>$menu));
                    for($i=0; $i<count($arr_module_rule);$i++){
                        if($arr_module_rule[$i]['status']==0) $arr_all_role[$menu][$arr_module_rule[$i]['key']] = $arr_module_rule[$i]['description'];
                    }
                }
                foreach($list as $key=>$desc){
                    if(isset($arr_all_role[$menu][$key])){
                        if(!isset($arr_role_return[$menu][$key])) $arr_role_return[$menu][$key] = $desc;
                    }
                }
            }
        }
        //get user role
        $arr_role = $cls_role->select(array('role_id'=>array('$in'=>$this->arr_user_role)));
        foreach($arr_role as $arr){
            $arr_role_content = $arr['role_content'];
            foreach($arr_role_content as $menu=>$list){
                if(!isset($arr_all_role[$menu])){
                    $arr_module_rule = $cls_module->select_scalar('module_rules', array('module_menu'=>$menu));
                    for($i=0; $i<count($arr_module_rule);$i++){
                        if($arr_module_rule[$i]['status']==0) $arr_all_role[$menu][$arr_module_rule[$i]['key']] = $arr_module_rule[$i]['description'];
                    }
                }
                foreach($list as $key=>$desc){
                    if(isset($arr_all_role[$menu][$key])){
                        if(!isset($arr_role_return[$menu][$key])) $arr_role_return[$menu][$key] = $desc;
                    }
                }
            }
        }


        foreach($arr_user_rule as $menu=>$list){
            $arr_module_rule = $cls_module->select_scalar('module_rules', array('module_menu'=>$menu));
            for($i=0; $i<count($arr_module_rule);$i++){
                if($arr_module_rule[$i]['status']==0) $arr_all_role[$menu][$arr_module_rule[$i]['key']] = $arr_module_rule[$i]['description'];
            }
            foreach($list as $key=>$desc){
                if(isset($arr_all_role[$menu][$key])){
                    if(!isset($arr_role_return[$menu][$key])) $arr_role_return[$menu][$key] = $desc;
                }
            }
        }
        return $arr_role_return;
    }

    /**
     * @param MongoDb $db
     * @param $p_module_menu
     * @return array
     */
    public function get_module_permission(MongoDb $db, $p_module_menu){
        $arr_return = array();
        $arr_all_role = $this->get_all_permission($db);
        if(isset($arr_all_role[$p_module_menu])){
            $arr_role = $arr_all_role[$p_module_menu];
            foreach($arr_role as $key=>$desc){
                if(!isset($arr_return[$p_module_menu][$key])){
                    $arr_return[$p_module_menu][$key] = $desc;
                }
            }
        }
        return $arr_return;
    }

    /**
     * @param MongoDb $db
     * @param $p_module_menu
     * @return array
     */
    public function get_simple_module_permission(MongoDb $db, $p_module_menu){
        $arr_return = array();
        $arr_all_role = $this->get_all_permission($db);
        if(isset($arr_all_role[$p_module_menu])){
            $arr_role = $arr_all_role[$p_module_menu];
            foreach($arr_role as $key=>$desc){
                if(!isset($arr_return[$key])){
                    $arr_return[$key] = $desc;
                }
            }
        }
        return $arr_return;
    }

    /**
     * @param MongoDb $db
     * @param $p_module_menu
     * @param $p_module_action
     * @return bool
     */
    public function get_module_action_permission(MongoDb $db, $p_module_menu, $p_module_action){
        $arr_return = $this->get_module_permission($db, $p_module_menu);
        return isset($arr_return[$p_module_menu][$p_module_action]);
    }

    /**
     * @param MongoDB $db
     * @return array
     */
    public function get_all_permission_width_note(MongoDB $db){
        $v_user_type = $this->v_user_type;
        $v_company_id = $this->v_company_id;
        $arr_user_rule = $this->arr_user_rule;
        if(!is_array($arr_user_rule)) $arr_user_rule = array();
        $cls_role = new cls_tb_role($db, $this->v_dir);
        $cls_module = new cls_tb_module($db, $this->v_dir);
        $arr_all_role = array();
        $arr_role_return = array();
        //get all role default
        $arr_role = $cls_role->select(array('user_type'=>$v_user_type, 'company_id'=>$v_company_id, 'default_role'=>1));
        foreach($arr_role as $arr){
            $arr_role_content = $arr['role_content'];
            foreach($arr_role_content as $menu=>$list){
                if(!isset($arr_all_role[$menu])){
                    $arr_module_rule = $cls_module->select_scalar('module_rules', array('module_menu'=>$menu));
                    for($i=0; $i<count($arr_module_rule);$i++){
                        if($arr_module_rule[$i]['status']==0) $arr_all_role[$menu][$arr_module_rule[$i]['key']] = $arr_module_rule[$i]['description'];
                    }
                }
                foreach($list as $key=>$desc){
                    if(isset($arr_all_role[$menu][$key])){
                        if(!isset($arr_role_return[$menu][$key])){
                            $arr_role_return[$menu][$key] = array('note'=>'Default role for User\'s Type', 'desc'=>$desc);
                        }else{
                            $arr_role_return[$menu][$key]['note'] .= ' | Default role for User\'s Type';
                        }
                    }
                }
            }
        }
        //get user role
        $arr_role = $cls_role->select(array('role_id'=>array('$in'=>$this->arr_user_role)));
        foreach($arr_role as $arr){
            $arr_role_content = $arr['role_content'];
            foreach($arr_role_content as $menu=>$list){
                if(!isset($arr_all_role[$menu])){
                    $arr_module_rule = $cls_module->select_scalar('module_rules', array('module_menu'=>$menu));
                    for($i=0; $i<count($arr_module_rule);$i++){
                        if($arr_module_rule[$i]['status']==0) $arr_all_role[$menu][$arr_module_rule[$i]['key']] = $arr_module_rule[$i]['description'];
                    }
                }
                foreach($list as $key=>$desc){
                    if(isset($arr_all_role[$menu][$key])){
                        if(!isset($arr_role_return[$menu][$key])){
                            $arr_role_return[$menu][$key] = array('note'=>'Granted role for User', 'desc'=>$desc);
                        }else{
                            $arr_role_return[$menu][$key]['note'] .= ' | Granted role for User';
                        }
                    }
                }
            }
        }


        foreach($arr_user_rule as $menu=>$list){
            $arr_module_rule = $cls_module->select_scalar('module_rules', array('module_menu'=>$menu));
            for($i=0; $i<count($arr_module_rule);$i++){
                if($arr_module_rule[$i]['status']==0) $arr_all_role[$menu][$arr_module_rule[$i]['key']] = $arr_module_rule[$i]['description'];
            }
            foreach($list as $key=>$desc){
                if(isset($arr_all_role[$menu][$key])){
                    if(!isset($arr_role_return[$menu][$key])){
                        $arr_role_return[$menu][$key] = array('note'=>'Granted rule for User', 'desc'=>$desc);
                    }else{
                        $arr_role_return[$menu][$key]['note'] .= ' | Granted rule for User';
                    }
                }
            }
        }
        return $arr_role_return;
    }
}
?>