<?php
class cls_tb_module{

	private $v_module_id = 0;
	private $v_module_pid = 0;
	private $v_module_text = '';
	private $v_module_key = '';
	private $v_module_type = 0;
	private $v_module_role = 0;
	private $v_module_root = 'admin';
	private $v_module_dir = '';
	private $v_module_order = 0;
	private $v_module_index = 'index.php';
	private $v_module_locked = 0;
	private $v_module_time = '0000-00-00 00:00:00';
	private $v_module_category = 0;
	private $v_module_description = '';
    private $v_module_menu = '';
    private $arr_module_rules = array();
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
		$this->collection = $db->selectCollection('tb_module');
		$this->collection->ensureIndex(array("module_pid"=>1));
		$this->v_module_time = new MongoDate(time());
		$this->collection->ensureIndex(array("module_id"=>1), array('name'=>"module_id_key", "unique"=>1, "dropDups" => 1));
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
		$v_filename = 'tb_module';
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
	 * function return properties "module_id" value
	 * @return int value
	 */
	public function get_module_id(){
		return (int) $this->v_module_id;
	}

	
	/**
	 * function allow change properties "module_id" value
	 * @param $p_module_id: int value
	 */
	public function set_module_id($p_module_id){
		$this->v_module_id = (int) $p_module_id;
	}

	
	/**
	 * function return properties "module_pid" value
	 * @return int value
	 */
	public function get_module_pid(){
		return (int) $this->v_module_pid;
	}

	
	/**
	 * function allow change properties "module_pid" value
	 * @param $p_module_pid: int value
	 */
	public function set_module_pid($p_module_pid){
		$this->v_module_pid = (int) $p_module_pid;
	}

	
	/**
	 * function return properties "module_text" value
	 * @return string value
	 */
	public function get_module_text(){
		return $this->v_module_text;
	}

	
	/**
	 * function allow change properties "module_text" value
	 * @param $p_module_text: string value
	 */
	public function set_module_text($p_module_text){
		$this->v_module_text = $p_module_text;
	}

	
	/**
	 * function return properties "module_key" value
	 * @return string value
	 */
	public function get_module_key(){
		return $this->v_module_key;
	}

	
	/**
	 * function allow change properties "module_key" value
	 * @param $p_module_key: string value
	 */
	public function set_module_key($p_module_key){
		$this->v_module_key = $p_module_key;
	}

	
	/**
	 * function return properties "module_type" value
	 * @return int value
	 */
	public function get_module_type(){
		return (int) $this->v_module_type;
	}

	
	/**
	 * function allow change properties "module_type" value
	 * @param $p_module_type: int value
	 */
	public function set_module_type($p_module_type){
		$this->v_module_type = (int) $p_module_type;
	}

	
	/**
	 * function return properties "module_root" value
	 * @return string value
	 */
	public function get_module_root(){
		return $this->v_module_root;
	}

	
	/**
	 * function allow change properties "module_root" value
	 * @param $p_module_root: string value
	 */
	public function set_module_root($p_module_root){
		$this->v_module_root = $p_module_root;
	}

	
	/**
	 * function return properties "module_dir" value
	 * @return string value
	 */
	public function get_module_dir(){
		return $this->v_module_dir;
	}


    /**
     * function allow change properties "module_dir" value
     * @param $p_module_dir: string value
     */
    public function set_module_dir($p_module_dir){
        $this->v_module_dir = $p_module_dir;
    }


    /**
     * function allow change properties "module_rules" value
     * @param $arr_module_rules array
     */
    public function set_module_rules(array $arr_module_rules = array()){
        $this->arr_module_rules = $arr_module_rules;
    }


    /**
     * function return properties "module_rules" value
     * @return array value
     */
    public function get_module_rules(){
        return $this->arr_module_rules;
    }


	/**
	 * function return properties "module_order" value
	 * @return int value
	 */
	public function get_module_order(){
		return (int) $this->v_module_order;
	}

	
	/**
	 * function allow change properties "module_order" value
	 * @param $p_module_order: int value
	 */
	public function set_module_order($p_module_order){
		$this->v_module_order = (int) $p_module_order;
	}

    /**
     * function return properties "module_role" value
     * @return int value
     */
    public function get_module_role(){
        return (int) $this->v_module_role;
    }


    /**
     * function allow change properties "module_role" value
     * @param $p_module_role: int value
     */
    public function set_module_role($p_module_role){
        $this->v_module_role = (int) $p_module_role;
    }


    /**
	 * function return properties "module_index" value
	 * @return string value
	 */
	public function get_module_index(){
		return $this->v_module_index;
	}

	
	/**
	 * function allow change properties "module_index" value
	 * @param $p_module_index: string value
	 */
	public function set_module_index($p_module_index){
		$this->v_module_index = $p_module_index;
	}

	
	/**
	 * function return properties "module_locked" value
	 * @return int value
	 */
	public function get_module_locked(){
		return (int) $this->v_module_locked;
	}

	
	/**
	 * function allow change properties "module_locked" value
	 * @param $p_module_locked: int value
	 */
	public function set_module_locked($p_module_locked){
		$this->v_module_locked = (int) $p_module_locked;
	}

	
	/**
	 * function return properties "module_time" value
	 * @return int value indicates amount of seconds
	 */
	public function get_module_time(){
		return  $this->v_module_time->sec;
	}

	
	/**
	 * function allow change properties "module_time" value
	 * @param $p_module_time: string value format type: yyyy-mm-dd H:i:s
	 */
	public function set_module_time($p_module_time){
		$this->v_module_time = new MongoDate(strtotime($p_module_time));
	}

	
	/**
	 * function return properties "module_category" value
	 * @return int value
	 */
	public function get_module_category(){
		return (int) $this->v_module_category;
	}

	
	/**
	 * function allow change properties "module_category" value
	 * @param $p_module_category: int value
	 */
	public function set_module_category($p_module_category){
		$this->v_module_category = (int) $p_module_category;
	}

	
	/**
	 * function return properties "module_description" value
	 * @return string value
	 */
	public function get_module_description(){
		return $this->v_module_description;
	}

	
	/**
	 * function allow change properties "module_description" value
	 * @param $p_module_description: string value
	 */
	public function set_module_description($p_module_description){
		$this->v_module_description = $p_module_description;
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
    public function get_module_menu(){
        return $this->v_module_menu;
    }

    /**
     * @param $p_module_menu
     */
    public function set_module_menu($p_module_menu){
        $this->v_module_menu = $p_module_menu;
    }


	
	/**
	 *  function allow insert one record
	 *  @return MongoID
	 */
	public function insert(){
		$arr = array('module_id' => $this->v_module_id
					,'module_pid' => $this->v_module_pid
					,'module_text' => $this->v_module_text
					,'module_key' => $this->v_module_key
					,'module_type' => $this->v_module_type
					,'module_role' => $this->v_module_role
					,'module_root' => $this->v_module_root
					,'module_dir' => $this->v_module_dir
					,'module_order' => $this->v_module_order
					,'module_rules' => $this->arr_module_rules
					,'module_index' => $this->v_module_index
					,'module_locked' => $this->v_module_locked
					,'module_time' => $this->v_module_time
					,'module_category' => $this->v_module_category
					,'module_description' => $this->v_module_description
                    ,'module_menu'=>$this->v_module_menu);
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
	 *       SELECT * FROM `tb_module` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_module($db)
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
			$this->v_module_id = isset($arr['module_id'])?$arr['module_id']:0;
			$this->v_module_pid = isset($arr['module_pid'])?$arr['module_pid']:0;
			$this->v_module_text = isset($arr['module_text'])?$arr['module_text']:'';
			$this->v_module_key = isset($arr['module_key'])?$arr['module_key']:'';
			$this->v_module_type = isset($arr['module_type'])?$arr['module_type']:0;
			$this->v_module_role = isset($arr['module_role'])?$arr['module_role']:0;
			$this->v_module_root = isset($arr['module_root'])?$arr['module_root']:'admin';
			$this->v_module_dir = isset($arr['module_dir'])?$arr['module_dir']:'';
			$this->arr_module_rules = isset($arr['module_rules'])?$arr['module_rules']:array();
			$this->v_module_order = isset($arr['module_order'])?$arr['module_order']:0;
			$this->v_module_index = isset($arr['module_index'])?$arr['module_index']:'index.php';
			$this->v_module_locked = isset($arr['module_locked'])?$arr['module_locked']:0;
			$this->v_module_time = isset($arr['module_time'])?$arr['module_time']:(new MongoDate(time()));
			$this->v_module_category = isset($arr['module_category'])?$arr['module_category']:0;
			$this->v_module_description = isset($arr['module_description'])?$arr['module_description']:'';
			$this->v_module_menu = isset($arr['module_menu'])?$arr['module_menu']:'';
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
	 * SELECT `module_id` FROM `tb_module` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_module($db)
	 * 		 $cls->select_scalar('module_id',array('user_id'=>2), array('user_email'=>-1))
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
	 *   SELECT `module_id` FROM `tb_module` WHERE `user_id`=2 ORDER BY `module_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_module($db)
	 * 		 $cls->select_next('module_id',array('user_id'=>2), array('module_id'=>-1))
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
	 * 		 $cls = new cls_tb_module($db)
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
	 * 		 $cls = new cls_tb_module($db)
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
			$arr = array('$set' => array('module_id' => $this->v_module_id,'module_pid' => $this->v_module_pid,'module_text' => $this->v_module_text,'module_key' => $this->v_module_key,'module_type' => $this->v_module_type,'module_root' => $this->v_module_root,'module_rules' => $this->arr_module_rules,'module_dir' => $this->v_module_dir,'module_order' => $this->v_module_order,'module_index' => $this->v_module_index,'module_locked' => $this->v_module_locked,'module_time' => $this->v_module_time,'module_category' => $this->v_module_category,'module_description' => $this->v_module_description,'module_menu'=>$this->v_module_menu, 'module_role'=>$this->v_module_role));
		else
			$arr = array('$set' => array('module_pid' => $this->v_module_pid,'module_text' => $this->v_module_text,'module_key' => $this->v_module_key,'module_type' => $this->v_module_type,'module_root' => $this->v_module_root,'module_rules' => $this->arr_module_rules,'module_dir' => $this->v_module_dir,'module_order' => $this->v_module_order,'module_index' => $this->v_module_index,'module_locked' => $this->v_module_locked,'module_time' => $this->v_module_time,'module_category' => $this->v_module_category,'module_description' => $this->v_module_description,'module_menu'=>$this->v_module_menu, 'module_role'=>$this->v_module_role));
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

    /* Extra function */
    /**
     * function go allow browser from leaf to root
     * @param $p_root
     * @param string $p_glue
     * @param null $arr_module
     * @return array|null
     */
    public function get_tree_module($p_root, $p_glue = '-', $arr_module=NULL){
        if(is_null($arr_module)) $arr_module = array();
        $arr = $this->select_limit_fields(0, 1000, array('module_id', 'module_text'), array('module_pid'=>$p_root));
        foreach($arr as $k=>$a){
            $arr_module[] = array('module_id'=>$a['module_id'], 'module_text'=>$p_glue. $a['module_text']);
            $arr_module = $this->get_tree_module($a['module_id'], $p_glue.'-- ', $arr_module);
        }
        return $arr_module;
    }

    /**
     * function draw tree option
     * @param $p_root
     * @param string $p_glue
     * @param int $p_selected
     * @return string
     */
    public function draw_tree_module_option($p_root, $p_glue='-', $p_selected = 0){
        $arr_module = $this->get_tree_module($p_root, $p_glue);
        $v_ret='';
        if(sizeof($arr_module)>0){
            foreach($arr_module as $k=>$a){
                $v_ret.='<option value="'.$a['module_id'].'"'.($a['module_id']==$p_selected?' selected="selected"':'').'>'.$a['module_text'].'</option>';
            }
        }
        return $v_ret;
    }

    /**
     * function get parent node of current
     * @param $p_current_id
     * @param $p_field
     * @return mixed
     */
    public function get_parent_node($p_current_id, $p_field){
        settype($p_current_id, 'int');
        $arr_where = array('module_id'=>$p_current_id);
        return $this->select_scalar($p_field, $arr_where);
    }

    /**
     * function draw bread crumb tree
     * @param $p_current_pid
     * @param $p_root_url
     * @param string $p_start_text
     * @param string $p_end_text
     * @param string $p_end_url
     * @return string
     */
    public function create_bread_crumb_menu($p_current_pid, $p_root_url, $p_start_text = 'Home', $p_end_text = '', $p_end_url=''){
        $v_ret = '';
        $v_zindex = 2;
        $v_current_pid = $p_current_pid;
        while($v_current_pid>0){
            $v_row = $this->select_one(array('module_id'=>$v_current_pid));
            if($v_row==1){
                $v_parent_text = $this->get_module_text();
                $v_parent_key = $this->get_module_key();
                $v_current_pid = $this->get_module_pid();
                $v_ret = '<li><a style="z-index:'.$v_zindex.'" href="'.$p_root_url.$v_parent_key.'">'.$v_parent_text.'</a></li>'.$v_ret;
                $v_zindex++;
            }else $v_current_pid=0;

        }
        if($p_start_text!=''){
            $v_ret = '<li class="first"><a style="z-index:'.$v_zindex.'" href="'.$p_root_url.'">'.$p_start_text.'</a></li>'.$v_ret;
        }
        if($p_end_text!=''){
            $v_ret = $v_ret.'<li class="last"><a style="z-index:1"'.($p_end_url!=''?' href="'.$p_end_url.'"':'').'>'.$p_end_text.'</a></li>';
        }
        if($v_ret!=''){
            $v_ret = '<div id="breadcrumb"><ul class="crumbs">'.$v_ret.'</ul></div>';
        }
        return $v_ret;
    }

}
?>