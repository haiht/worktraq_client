<?php
class cls_tb_company{

	private $v_company_id = 0;
	private $v_company_name = '';
	private $v_company_code = '';
	private $v_relationship = 0;
	private $v_bussines_type = 0;
    private $v_logo_file = '';
	private $v_industry = '';
	private $v_website = '';
    private $v_modules ='';
	private $v_status = 0;
    private $v_sales_rep_id = '';
    private $v_sales_rep_email = '';
    private $v_email_head_office= '';
    private $v_company_template_id = 0;
    private $v_csr_id = '';
	private $collection = NULL;
	private $v_mongo_id = NULL;
	private $v_error_code = 0;
    private $v_template_log='';
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
		$this->collection = $db->selectCollection('tb_company');
		$this->collection->ensureIndex(array("company_id"=>1), array('name'=>"company_id_key", "unique"=>1, "dropDups" => 1));
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
		$v_filename = 'tb_company';
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
     *
     */
    public function get_company_template_id(){
        return  $this->v_company_template_id;
    }


    /**
     * @param $p_company_template_id
     */
    public function set_company_template($p_company_template_id){
        $this->v_company_template_id = $p_company_template_id;
    }
    /**
	 * function return properties "company_name" value
	 * @return string value
	 */
	public function get_company_name(){
		return $this->v_company_name;
	}

    /**
     * @param $p_company_id
     * @return string
     */
    public function set_company_template_log($arr){
        $this->v_template_log = $arr;
    }

    /**
     * @return string
     */
    public function get_company_template_log(){
        return $this->v_template_log;
    }


    /**
     * @param $p_company_id
     * @return string
     */
    public function get_company_name_by_id($p_company_id)
    {
        $rss = $this->collection->find(array('company_id'=>(int)$p_company_id),array('company_name'=>1));
        $v_company_name = "";
        foreach($rss as $arr)
        {
            $v_company_name =  isset($arr['company_name'])?$arr['company_name']:'';
        }
        return $v_company_name;
    }

	
	/**
	 * function allow change properties "company_name" value
	 * @param $p_company_name: string value
	 */
	public function set_company_name($p_company_name){
		$this->v_company_name = $p_company_name;
	}

	
	/**
	 * function return properties "company_code" value
	 * @return string value
	 */
	public function get_company_code(){
		return $this->v_company_code;
	}

	
	/**
	 * function allow change properties "company_code" value
	 * @param $p_company_code: string value
	 */
	public function set_company_code($p_company_code){
		$this->v_company_code = $p_company_code;
	}

	
	/**
	 * function return properties "relationship" value
	 * @return int value
	 */
	public function get_relationship(){
		return (int) $this->v_relationship;
	}

	
	/**
	 * function allow change properties "relationship" value
	 * @param $p_relationship: int value
	 */
	public function set_relationship($p_relationship){
		$this->v_relationship = (int) $p_relationship;
	}

	
	/**
	 * function return properties "bussines_type" value
	 * @return int value
	 */
	public function get_bussines_type(){
		return (int) $this->v_bussines_type;
	}

	
	/**
	 * function allow change properties "bussines_type" value
	 * @param $p_bussines_type: int value
	 */
	public function set_bussines_type($p_bussines_type){
		$this->v_bussines_type = (int) $p_bussines_type;
	}

	
	/**
	 * function return properties "industry" value
	 * @return string value
	 */
	public function get_industry(){
		return $this->v_industry;
	}

	
	/**
	 * function allow change properties "industry" value
	 * @param $p_industry: string value
	 */
	public function set_industry($p_industry){
		$this->v_industry = $p_industry;
	}

    /**
     * @return string
     */
    public function get_logo_file(){
        return $this->v_logo_file;
    }

    /**
     * @param $p_logo_file
     */
    public function set_logo_file($p_logo_file){
        $this->v_logo_file =$p_logo_file;
    }
	/**
	 * function return properties "website" value
	 * @return string value
	 */
	public function get_website(){
		return $this->v_website;
	}

	
	/**
	 * function allow change properties "website" value
	 * @param $p_website: string value
	 */
	public function set_website($p_website){
		$this->v_website = $p_website;
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
     * @return string
     */
    public function get_sales_rep(){
        return $this->v_sales_rep_id;
    }

    /**
     * @param $p_sales_rep
     */
    public function set_sales_rep($p_sales_rep){
        $this->v_sales_rep_id = $p_sales_rep;
    }

    /**
     * @param $p_sales_rep_email
     * @return mixed
     */
    public function get_sales_rep_email(){
        return $this->v_sales_rep_email;
    }

    /**
     * @param $p_sales_rep_email
     */
    public function set_sales_rep_email($p_sales_rep_email){
        $this->v_sales_rep_email = $p_sales_rep_email;
    }

    /**
     * @param $p_email_head_office
     */
    public function set_email_head_office($p_email_head_office){
        $this->v_email_head_office = $p_email_head_office;
    }

    /**
     * @return string
     */
    public function get_email_head_office(){
        return $this->v_email_head_office;
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
    public function get_modules(){
        return $this->v_modules;
    }

    /**
     * @param $p_module
     */
    public function set_modules($p_module){
        $this->v_modules = $p_module;
    }

    /**
     * @return string
     */
    public function get_csr(){
        return $this->v_csr_id;
    }

    /**
     * @param $p_csr
     */
    public function set_csr($p_csr){
        $this->v_csr_id = $p_csr;
    }

	/**
	 *  function allow insert one record
	 *  @return MongoID
	 */
	public function insert(){
		$arr = array('company_id' => $this->v_company_id
					,'company_name' => $this->v_company_name
					,'company_code' => $this->v_company_code
					,'relationship' => $this->v_relationship
                    ,'logo_file'=> $this->v_logo_file
					,'bussines_type' => $this->v_bussines_type
					,'industry' => $this->v_industry
					,'website' => $this->v_website
					,'modules' => $this->v_modules
					,'sales_rep_id' => $this->v_sales_rep_id
					,'email_sales_rep' => $this->v_sales_rep_email
					,'email_head_office' => $this->v_email_head_office
                    ,'csr_id'=>$this->v_csr_id
					,'status' => $this->v_status
					,'company_template_id' => $this->v_company_template_id
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
	 *       SELECT * FROM `tb_company` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_company($db)
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
		foreach($rss as $arr)
        {
			$this->v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
			$this->v_company_name = isset($arr['company_name'])?$arr['company_name']:'';
			$this->v_company_code = isset($arr['company_code'])?$arr['company_code']:'';
			$this->v_relationship = isset($arr['relationship'])?$arr['relationship']:0;
			$this->v_bussines_type = isset($arr['bussines_type'])?$arr['bussines_type']:0;
			$this->v_industry = isset($arr['industry'])?$arr['industry']:'';
			$this->v_logo_file = isset($arr['logo_file'])?$arr['logo_file']:'';
			$this->v_modules = isset($arr['modules'])?$arr['modules']:'';
            $this->v_sales_rep_id = isset($arr['sales_rep_id'])?$arr['sales_rep_id']:'';
            $this->v_sales_rep_email = isset($arr['email_sales_rep'])?$arr['email_sales_rep']:'';
            $this->v_csr_id = isset($arr['csr_id'])?$arr['csr_id']:'';
            $this->v_email_head_office = isset($arr['email_head_office'])?$arr['email_head_office']:'';
			$this->v_website = isset($arr['website'])?$arr['website']:'';
			$this->v_status = isset($arr['status'])?$arr['status']:0;
			$this->v_company_template_id = isset($arr['company_template_id'])?$arr['company_template_id']:0;
			$this->v_template_log = isset($arr['template_log'])?$arr['template_log']:0;
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
	 * SELECT `company_id` FROM `tb_company` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_company($db)
	 * 		 $cls->select_scalar('company_id',array('user_id'=>2), array('user_email'=>-1))
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
	 *   SELECT `company_id` FROM `tb_company` WHERE `user_id`=2 ORDER BY `company_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_company($db)
	 * 		 $cls->select_next('company_id',array('user_id'=>2), array('company_id'=>-1))
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
	 * 		 $cls = new cls_tb_company($db)
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
     * @param array $arr_where
     * @return MongoCursor
     */
    public function select_all(array $arr_where = array(),$arr_order = array()){
        if(is_null($arr_order) || count($arr_order)==0){
            $arr_order = array('_id' => -1);//last insert show first
        }
        $arr = $this->collection->find($arr_where);
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
	 * 		 $cls = new cls_tb_company($db)
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
			$arr = array('$set' => array('company_id' => $this->v_company_id,'company_name' => $this->v_company_name,'company_code' => $this->v_company_code,'relationship' => $this->v_relationship,'bussines_type' => $this->v_bussines_type,'industry' => $this->v_industry,'website' => $this->v_website,'status' => $this->v_status,'modules'=>$this->v_modules,'sales_rep_id'=>$this->v_sales_rep_id,'email_sales_rep'=>$this->v_sales_rep_email,'email_head_office' => $this->v_email_head_office,'csr_id'=>$this->v_csr_id
            ,"company_template_id"=>$this->v_company_template_id)
            );
		else
			$arr = array('$set' => array('company_name' => $this->v_company_name,'company_code' => $this->v_company_code,'relationship' => $this->v_relationship,'bussines_type' => $this->v_bussines_type,'industry' => $this->v_industry,'website' => $this->v_website,'status' => $this->v_status,'modules'=>$this->v_modules,'sales_rep_id'=>$this->v_sales_rep_id,'csr_id'=>$this->v_csr_id,'email_head_office' => $this->v_email_head_office,'email_sales_rep'=>$this->v_sales_rep_email,"company_template_id"=>$this->v_company_template_id));
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

		if(is_null($arr_order) || count($arr_order)==0){
            $arr_where = array();
            $arr_order = array('_id' => 1);
        }
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