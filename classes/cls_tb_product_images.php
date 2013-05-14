<?php
class cls_tb_product_images{

	private $v_product_images_id = 0;
	private $v_product_id = 0;
	private $v_company_id = 0;
	private $v_location_id = 0;
	private $v_area_id = 0;
	private $arr_map_content = array();
	private $arr_map_images = array();
	private $v_location_area = '';
	private $v_product_image = '';
	private $v_low_res_image = '';
	private $v_image_code = '';
	private $v_image_type = 0;
	private $v_image_size = 0;
	private $v_image_width = 0;
	private $v_image_height = 0;
	private $v_saved_dir = '';
	private $v_status = 0;
	private $v_hot_spot = 0;
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
		$this->collection = $db->selectCollection('tb_product_images');
		$this->v_date_created = new MongoDate(time());
		$this->collection->ensureIndex(array("product_images_id"=>1), array('name'=>"product_images_id_key", "unique"=>1, "dropDups" => 1));
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
		$v_filename = 'tb_product_images';
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
	 * function return properties "product_images_id" value
	 * @return int value
	 */
	public function get_product_images_id(){
		return (int) $this->v_product_images_id;
	}

	
	/**
	 * function allow change properties "product_images_id" value
	 * @param $p_product_images_id: int value
	 */
	public function set_product_images_id($p_product_images_id){
		$this->v_product_images_id = (int) $p_product_images_id;
	}

	
	/**
	 * function return properties "product_id" value
	 * @return int value
	 */
	public function get_product_id(){
		return (int) $this->v_product_id;
	}

	
	/**
	 * function allow change properties "product_id" value
	 * @param $p_product_id: int value
	 */
	public function set_product_id($p_product_id){
		$this->v_product_id = (int) $p_product_id;
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
     * function return properties "area_id" value
     * @return int value
     */
    public function get_area_id(){
        return (int) $this->v_area_id;
    }


    /**
     * function allow change properties "area_id" value
     * @param $p_area_id: int value
     */
    public function set_area_id($p_area_id){
        $this->v_area_id = (int) $p_area_id;
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
     * function return properties "map_images" value
     * @return array value
     */
    public function get_map_images(){
        return  $this->arr_map_images;
    }

    /**
	 * function allow change properties "map_images" value
	 * @param $arr_map_images array
	 */
	public function set_map_images(array $arr_map_images = array()){
		$this->arr_map_images = $arr_map_images;
	}



	/**
	 * function return properties "product_image" value
	 * @return string value
	 */
	public function get_product_image(){
		return $this->v_product_image;
	}

	
	/**
	 * function allow change properties "product_image" value
	 * @param $p_product_image: string value
	 */
	public function set_product_image($p_product_image){
		$this->v_product_image = $p_product_image;
	}

	
	/**
	 * function return properties "low_res_image" value
	 * @return string value
	 */
	public function get_low_res_image(){
		return $this->v_low_res_image;
	}

	
	/**
	 * function allow change properties "low_res_image" value
	 * @param $p_low_res_image: string value
	 */
	public function set_low_res_image($p_low_res_image){
		$this->v_low_res_image = $p_low_res_image;
	}

    /**
     * function return properties "image_code" value
     * @return string value
     */
    public function get_image_code(){
        return $this->v_image_code;
    }


    /**
     * function allow change properties "image_code" value
     * @param $p_image_code: string value
     */
    public function set_image_code($p_image_code){
        $this->v_image_code = $p_image_code;
    }


    /**
	 * function return properties "image_size" value
	 * @return int value
	 */
	public function get_image_size(){
		return (int) $this->v_image_size;
	}

	
	/**
	 * function allow change properties "image_size" value
	 * @param $p_image_size: int value
	 */
	public function set_image_size($p_image_size){
		$this->v_image_size = (int) $p_image_size;
	}

    /**
     * function return properties "image_type" value
     * @return int value
     */
    public function get_image_type(){
        return (int) $this->v_image_type;
    }


    /**
     * function allow change properties "image_type" value
     * @param $p_image_type int value
     */
    public function set_image_type($p_image_type){
        $this->v_image_type = (int) $p_image_type;
    }


    /**
	 * function return properties "image_width" value
	 * @return int value
	 */
	public function get_image_width(){
		return (int) $this->v_image_width;
	}

	
	/**
	 * function allow change properties "image_width" value
	 * @param $p_image_width: int value
	 */
	public function set_image_width($p_image_width){
		$this->v_image_width = (int) $p_image_width;
	}

	
	/**
	 * function return properties "image_height" value
	 * @return int value
	 */
	public function get_image_height(){
		return (int) $this->v_image_height;
	}

	
	/**
	 * function allow change properties "image_height" value
	 * @param $p_image_height: int value
	 */
	public function set_image_height($p_image_height){
		$this->v_image_height = (int) $p_image_height;
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
     * function return properties "location_area" value
     * @return string value
     */
    public function get_location_area(){
        return $this->v_location_area;
    }


    /**
     * function allow change properties "location_area" value
     * @param $p_location_area string value
     */
    public function set_location_area($p_location_area){
        $this->v_location_area = $p_location_area;
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
     * function return properties "hot_spot" value
     * @return int value
     */
    public function get_hot_spot(){
        return (int) $this->v_hot_spot;
    }


    /**
     * function allow change properties "hot_spot" value
     * @param $p_hot_spot: int value
     */
    public function set_hot_spot($p_hot_spot){
        $this->v_hot_spot = (int) $p_hot_spot;
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
		$arr = array('product_images_id' => $this->v_product_images_id
					,'product_id' => $this->v_product_id
					,'company_id' => $this->v_company_id
					,'location_id' => $this->v_location_id
					,'area_id' => $this->v_area_id
					,'location_area' => $this->v_location_area
					,'map_content' => $this->arr_map_content
					,'map_images' => $this->arr_map_images
					,'product_image' => $this->v_product_image
					,'low_res_image' => $this->v_low_res_image
					,'image_code' => $this->v_image_code
					,'image_size' => $this->v_image_size
					,'image_type' => $this->v_image_type
					,'image_width' => $this->v_image_width
					,'image_height' => $this->v_image_height
					,'saved_dir' => $this->v_saved_dir
					,'status' => $this->v_status
					,'hot_spot' => $this->v_hot_spot
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
	 *       SELECT * FROM `tb_product_images` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_product_images($db)
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
			$this->v_product_images_id = isset($arr['product_images_id'])?$arr['product_images_id']:0;
			$this->v_product_id = isset($arr['product_id'])?$arr['product_id']:0;
			$this->v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
			$this->v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
			$this->v_area_id = isset($arr['area_id'])?$arr['area_id']:0;
			$this->v_location_area = isset($arr['location_area'])?$arr['location_area']:'';
			$this->arr_map_content = isset($arr['map_content'])?$arr['map_content']:array();
			$this->arr_map_images = isset($arr['map_images'])?$arr['map_images']:array();
			$this->v_product_image = isset($arr['product_image'])?$arr['product_image']:'';
			$this->v_low_res_image = isset($arr['low_res_image'])?$arr['low_res_image']:'';
			$this->v_image_code = isset($arr['image_code'])?$arr['image_code']:'';
			$this->v_image_size = isset($arr['image_size'])?$arr['image_size']:0;
			$this->v_image_type = isset($arr['image_type'])?$arr['image_type']:0;
			$this->v_image_width = isset($arr['image_width'])?$arr['image_width']:0;
			$this->v_image_height = isset($arr['image_height'])?$arr['image_height']:0;
			$this->v_saved_dir = isset($arr['saved_dir'])?$arr['saved_dir']:'';
			$this->v_status = isset($arr['status'])?$arr['status']:0;
			$this->v_hot_spot = isset($arr['hot_spot'])?$arr['hot_spot']:0;
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
	 * SELECT `product_images_id` FROM `tb_product_images` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_product_images($db)
	 * 		 $cls->select_scalar('product_images_id',array('user_id'=>2), array('user_email'=>-1))
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
	 *   SELECT `product_images_id` FROM `tb_product_images` WHERE `user_id`=2 ORDER BY `product_images_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_product_images($db)
	 * 		 $cls->select_next('product_images_id',array('user_id'=>2), array('product_images_id'=>-1))
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
	 * 		 $cls = new cls_tb_product_images($db)
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
	 * 		 $cls = new cls_tb_product_images($db)
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
	 * 		 $cls = new cls_tb_product_images($db)
	 * 		 $cls->select_distinct('nam')
	 * </code>
	 * @return array with indexes are names of fields 
	 */
	public function select_distinct($p_field_name){
		return $this->collection->command(array("distinct"=>"tb_product_images", "key"=>$p_field_name));
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
	 * 		 $cls = new cls_tb_product_images($db)
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
			$arr = array('$set' => array('product_images_id' => $this->v_product_images_id,'product_id' => $this->v_product_id,'company_id' => $this->v_company_id,'location_id' => $this->v_location_id,'area_id' => $this->v_area_id,'location_area' => $this->v_location_area,'map_content' => $this->arr_map_content,'map_images' => $this->arr_map_images,'product_image' => $this->v_product_image,'low_res_image' => $this->v_low_res_image,'image_code' => $this->v_image_code,'image_size' => $this->v_image_size,'image_type' => $this->v_image_type,'image_width' => $this->v_image_width,'image_height' => $this->v_image_height,'saved_dir' => $this->v_saved_dir,'status' => $this->v_status,'hot_spot' => $this->v_hot_spot,'user_name' => $this->v_user_name,'user_type' => $this->v_user_type,'date_created' => $this->v_date_created));
		 else 
			$arr = array('$set' => array('product_id' => $this->v_product_id,'company_id' => $this->v_company_id,'location_id' => $this->v_location_id,'area_id' => $this->v_area_id,'location_area' => $this->v_location_area,'map_content' => $this->arr_map_content,'map_images' => $this->arr_map_images,'product_image' => $this->v_product_image,'low_res_image' => $this->v_low_res_image,'image_code' => $this->v_image_code,'image_size' => $this->v_image_size,'image_type' => $this->v_image_type,'image_width' => $this->v_image_width,'image_height' => $this->v_image_height,'saved_dir' => $this->v_saved_dir,'status' => $this->v_status,'hot_spot' => $this->v_hot_spot,'user_name' => $this->v_user_name,'user_type' => $this->v_user_type,'date_created' => $this->v_date_created));
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