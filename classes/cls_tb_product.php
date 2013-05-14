<?php
class cls_tb_product{

	private $v_product_id = 0;
	private $v_product_sku = '0';
    private $v_product_threshold_group_id = 0;
	private $v_short_description = '';
	private $v_long_description = '';
	private $v_product_detail = '';
	private $v_size_option = 0;
	private $v_image_option = 0;
	private $v_image_choose = 0;
	private $v_num_images = 0;
	private $v_package_quantity = 1;
	private $v_allow_single = 1;
	private $v_package_type = 0;
	private $arr_package_content = array();
	private $v_image_file = '';
	private $v_image_desc = '';
	private $v_saved_dir = '';
	private $arr_map_content = array();
	private $arr_material = array();
	private $v_text_option = 0;
	private $v_print_type = 0;
	private $arr_text = array();
	private $v_sold_by = 0;
	private $v_default_price = 0;
	private $v_product_status = 0;
	private $v_company_id = 0;
	private $v_location_id = 0;
    private $v_product_threshold = -1;
    private $v_excluded_location = '';
	private $arr_tag = array();
	private $v_product_note = '';
	private $v_user_name = '';
	private $v_user_type = 0;
	private $v_date_created = '0000-00-00 00:00:00';
	private $collection = NULL;
	private $v_mongo_id = NULL;
	private $v_error_code = 0;
	private $v_error_message = '';
	private $v_is_log = false;
	private $v_dir = '';
    private $v_file_hd = '';
    private $db = null;
	
	/**
	 *  constructor function
	 *  @param $db: instance of Mongo
	 *  @param $p_log_dir string: directory contains its log file
	 */
	public function __construct(MongoDB $db, $p_log_dir = ""){
		$this->v_is_log = $p_log_dir!='' && file_exists($p_log_dir) && is_writable($p_log_dir);
		if($this->v_is_log) $this->v_dir = $p_log_dir.DIRECTORY_SEPARATOR;
        $this->db = $db;
		$this->collection = $db->selectCollection('tb_product');
		$this->collection->ensureIndex(array("product_sku"=>1));
		$this->v_date_created = new MongoDate(time());
		$this->collection->ensureIndex(array("product_id"=>1), array('name'=>"product_id_key", "unique"=>1, "dropDups" => 1));
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
		$v_filename = 'tb_product';
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
	 * function return properties "product_sku" value
	 * @return string value
	 */
	public function get_product_sku(){
		return $this->v_product_sku;
	}

	
	/**
	 * function allow change properties "product_sku" value
	 * @param $p_product_sku: string value
	 */
	public function set_product_sku($p_product_sku){
		$this->v_product_sku = $p_product_sku;
	}

    /**
     * @param $p_product_threshold_group_id
     */
    public function set_product_threshold_group_id($p_product_threshold_group_id){
        $this->v_product_threshold_group_id = (int) $p_product_threshold_group_id;
    }

    /**
     * @return int
     */
    public function get_product_threshold_group_id(){
        return (int) $this->v_product_threshold_group_id;
    }
	
	/**
	 * function return properties "short_description" value
	 * @return string value
	 */
	public function get_short_description(){
		return $this->v_short_description;
	}

	
	/**
	 * function allow change properties "short_description" value
	 * @param $p_short_description: string value
	 */
	public function set_short_description($p_short_description){
		$this->v_short_description = $p_short_description;
	}

	
	/**
	 * function return properties "long_description" value
	 * @return string value
	 */
	public function get_long_description(){
		return $this->v_long_description;
	}

	
	/**
	 * function allow change properties "long_description" value
	 * @param $p_long_description: string value
	 */
	public function set_long_description($p_long_description){
		$this->v_long_description = $p_long_description;
	}

	
	/**
	 * function return properties "product_detail" value
	 * @return string value
	 */
	public function get_product_detail(){
		return $this->v_product_detail;
	}

	
	/**
	 * function allow change properties "product_detail" value
	 * @param $p_product_detail: string value
	 */
	public function set_product_detail($p_product_detail){
		$this->v_product_detail = $p_product_detail;
	}

	
	/**
	 * function return properties "size_option" value
	 * @return int value
	 */
	public function get_size_option(){
		return (int) $this->v_size_option;
	}

	
	/**
	 * function allow change properties "size_option" value
	 * @param $p_size_option: int value
	 */
	public function set_size_option($p_size_option){
		$this->v_size_option = (int) $p_size_option;
	}

    /**
     * function return properties "print_type" value
     * @return int value
     */
    public function get_print_type(){
        return (int) $this->v_print_type;
    }


    /**
     * function allow change properties "print_type" value
     * @param $p_size_option: int value
     */
    public function set_print_type($p_print_type){
        $this->v_print_type = (int) $p_print_type;
    }

    /**
	 * function return properties "image_option" value
	 * @return int value
	 */
	public function get_image_option(){
		return (int) $this->v_image_option;
	}

	
	/**
	 * function allow change properties "image_option" value
	 * @param $p_image_option: int value
	 */
	public function set_image_option($p_image_option){
		$this->v_image_option = (int) $p_image_option;
	}

    /**
     * function return properties "image_choose" value
     * @return int value
     */
    public function get_image_choose(){
        return (int) $this->v_image_choose;
    }


    /**
     * function allow change properties "image_choose" value
     * @param $p_image_choose int value
     */
    public function set_image_choose($p_image_choose){
        $this->v_image_choose = (int) $p_image_choose;
    }


    /**
	 * function return properties "num_images" value
	 * @return int value
	 */
	public function get_num_images(){
		return (int) $this->v_num_images;
	}

	
	/**
	 * function allow change properties "num_images" value
	 * @param $p_num_images: int value
	 */
	public function set_num_images($p_num_images){
		$this->v_num_images = (int) $p_num_images;
	}

	
	/**
	 * function return properties "package_quantity" value
	 * @return int value
	 */
	public function get_package_quantity(){
		return (int) $this->v_package_quantity;
	}

	
	/**
	 * function allow change properties "package_quantity" value
	 * @param $p_package_quantity: int value
	 */
	public function set_package_quantity($p_package_quantity){
		$this->v_package_quantity = (int) $p_package_quantity;
	}

	
	/**
	 * function return properties "allow_single" value
	 * @return int value
	 */
	public function get_allow_single(){
		return (int) $this->v_allow_single;
	}

	
	/**
	 * function allow change properties "allow_single" value
	 * @param $p_allow_single: int value
	 */
	public function set_allow_single($p_allow_single){
		$this->v_allow_single = (int) $p_allow_single;
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
	 * function return properties "image_file" value
	 * @return string value
	 */
	public function get_image_file(){
		return $this->v_image_file;
	}

	
	/**
	 * function allow change properties "image_file" value
	 * @param $p_image_file: string value
	 */
	public function set_image_file($p_image_file){
		$this->v_image_file = $p_image_file;
	}

	
	/**
	 * function return properties "image_desc" value
	 * @return string value
	 */
	public function get_image_desc(){
		return $this->v_image_desc;
	}

	
	/**
	 * function allow change properties "image_desc" value
	 * @param $p_image_desc: string value
	 */
	public function set_image_desc($p_image_desc){
		$this->v_image_desc = $p_image_desc;
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
	 * function return properties "material" value
	 * @return array value
	 */
	public function get_material(){
		return  $this->arr_material;
	}

	
	/**
	 * function allow change properties "material" value
	 * @param $arr_material array
	 */
	public function set_material(array $arr_material = array()){
		$this->arr_material = $arr_material;
	}

	
	/**
	 * function return properties "text_option" value
	 * @return int value
	 */
	public function get_text_option(){
		return (int) $this->v_text_option;
	}

	
	/**
	 * function allow change properties "text_option" value
	 * @param $p_text_option: int value
	 */
	public function set_text_option($p_text_option){
		$this->v_text_option = (int) $p_text_option;
	}

	
	/**
	 * function return properties "text" value
	 * @return array value
	 */
	public function get_text(){
		return  $this->arr_text;
	}

	
	/**
	 * function allow change properties "text" value
	 * @param $arr_text array
	 */
	public function set_text(array $arr_text = array()){
		$this->arr_text = $arr_text;
	}

	
	/**
	 * function return properties "sold_by" value
	 * @return int value
	 */
	public function get_sold_by(){
		return (int) $this->v_sold_by;
	}

	
	/**
	 * function allow change properties "sold_by" value
	 * @param $p_sold_by int value
	 */
	public function set_sold_by($p_sold_by){
		$this->v_sold_by = (int) $p_sold_by;
	}

	
	/**
	 * function return properties "default_price" value
	 * @return float value
	 */
	public function get_default_price(){
		return (float) $this->v_default_price;
	}

	
	/**
	 * function allow change properties "default_price" value
	 * @param $p_default_price: float value
	 */
	public function set_default_price($p_default_price){
		$this->v_default_price = (float) $p_default_price;
	}

	
	/**
	 * function return properties "product_status" value
	 * @return int value
	 */
	public function get_product_status(){
		return (int) $this->v_product_status;
	}

	
	/**
	 * function allow change properties "product_status" value
	 * @param $p_product_status: int value
	 */
	public function set_product_status($p_product_status){
		$this->v_product_status = (int) $p_product_status;
	}

    /**
     * function return properties "product_threshold" value
     * @return int value
     */
    public function get_product_threshold(){
        return (int) $this->v_product_threshold;
    }


    /**
     * function allow change properties "product_threshold" value
     * @param $p_product_threshold: int value
     */
    public function set_product_threshold($p_product_threshold){
        $this->v_product_threshold = (int) $p_product_threshold;
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
	 * function return properties "tag" value
	 * @return array value
	 */
	public function get_tag(){
		return  $this->arr_tag;
	}

	
	/**
	 * function allow change properties "tag" value
	 * @param $arr_tag array
	 */
	public function set_tag(array $arr_tag = array()){
		$this->arr_tag = $arr_tag;
	}

	
	/**
	 * function return properties "product_note" value
	 * @return string value
	 */
	public function get_product_note(){
		return $this->v_product_note;
	}

	
	/**
	 * function allow change properties "product_note" value
	 * @param $p_product_note: string value
	 */
	public function set_product_note($p_product_note){
		$this->v_product_note = $p_product_note;
	}

    /**
     * function return properties "excluded_location" value
     * @return string value
     */
    public function get_excluded_location(){
        return $this->v_excluded_location;
    }


    /**
     * function allow change properties "excluded_location" value
     * @param $p_excluded_location: string value
     */
    public function set_excluded_location($p_excluded_location){
        $this->v_excluded_location = $p_excluded_location;
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
     * @return string
     */
    public function get_file_hd(){
        return $this->v_file_hd;
    }

    /**
     * @param $p_file_hd
     */
    public function set_file_hd($p_file_hd){
        $this->v_file_hd = $p_file_hd;
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
		$arr = array('product_id' => $this->v_product_id
					,'product_sku' => $this->v_product_sku
                    ,'product_threshold_group_id' => $this->v_threshold_product_group_id
					,'short_description' => $this->v_short_description
					,'long_description' => $this->v_long_description
					,'product_detail' => $this->v_product_detail
					,'size_option' => $this->v_size_option
					,'image_option' => $this->v_image_option
					,'image_choose' => $this->v_image_choose
					,'num_images' => $this->v_num_images
					,'package_quantity' => $this->v_package_quantity
					,'allow_single' => $this->v_allow_single
					,'package_type' => $this->v_package_type
					,'package_content' => $this->arr_package_content
					,'image_file' => $this->v_image_file
					,'image_desc' => $this->v_image_desc
					,'saved_dir' => $this->v_saved_dir
					,'map_content' => $this->arr_map_content
					,'material' => $this->arr_material
					,'text_option' => $this->v_text_option
					,'print_type' => $this->v_print_type
					,'text' => $this->arr_text
					,'sold_by' => $this->v_sold_by
					,'default_price' => $this->v_default_price
					,'product_status' => $this->v_product_status
					,'product_threshold' => $this->v_product_threshold
					,'company_id' => $this->v_company_id
					,'location_id' => $this->v_location_id
					,'tag' => $this->arr_tag
					,'product_note' => $this->v_product_note
					,'excluded_location' => $this->v_excluded_location
					,'user_name' => $this->v_user_name
					,'user_type' => $this->v_user_type
                    ,'file_hd'=>$this->v_file_hd
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
	 *       SELECT * FROM `tb_product` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_product($db)
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
			$this->v_product_id = isset($arr['product_id'])?$arr['product_id']:0;
			$this->v_product_sku = isset($arr['product_sku'])?$arr['product_sku']:'0';
			$this->v_product_threshold_group_id = isset($arr['product_threshold_group_id'])?$arr['product_threshold_group_id']:0;
			$this->v_short_description = isset($arr['short_description'])?$arr['short_description']:'';
			$this->v_long_description = isset($arr['long_description'])?$arr['long_description']:'';
			$this->v_product_detail = isset($arr['product_detail'])?$arr['product_detail']:'';
			$this->v_size_option = isset($arr['size_option'])?$arr['size_option']:0;
			$this->v_image_option = isset($arr['image_option'])?$arr['image_option']:0;
			$this->v_image_choose = isset($arr['image_choose'])?$arr['image_choose']:0;
			$this->v_num_images = isset($arr['num_images'])?$arr['num_images']:0;
			$this->v_package_quantity = isset($arr['package_quantity'])?$arr['package_quantity']:1;
			$this->v_allow_single = isset($arr['allow_single'])?$arr['allow_single']:1;
			$this->v_package_type = isset($arr['package_type'])?$arr['package_type']:0;
			$this->arr_package_content = isset($arr['package_content'])?$arr['package_content']:array();
			$this->v_image_file = isset($arr['image_file'])?$arr['image_file']:'';
			$this->v_image_desc = isset($arr['image_desc'])?$arr['image_desc']:'';
			$this->v_saved_dir = isset($arr['saved_dir'])?$arr['saved_dir']:'';
			$this->arr_map_content = isset($arr['map_content'])?$arr['map_content']:array();
			$this->arr_material = isset($arr['material'])?$arr['material']:array();
			$this->v_text_option = isset($arr['text_option'])?$arr['text_option']:0;
			$this->v_print_type = isset($arr['print_type'])?$arr['print_type']:0;
			$this->arr_text = isset($arr['text'])?$arr['text']:array();
			$this->v_sold_by = isset($arr['sold_by'])?$arr['sold_by']:0;
			$this->v_default_price = isset($arr['default_price'])?$arr['default_price']:0;
			$this->v_product_status = isset($arr['product_status'])?$arr['product_status']:0;
			$this->v_product_threshold = isset($arr['product_threshold'])?$arr['product_threshold']:-1;
			$this->v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
			$this->v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
			$this->arr_tag = isset($arr['tag'])?$arr['tag']:array();
			$this->v_product_note = isset($arr['product_note'])?$arr['product_note']:'';
			$this->v_excluded_location = isset($arr['excluded_location'])?$arr['excluded_location']:'';
			$this->v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
			$this->v_user_type = isset($arr['user_type'])?$arr['user_type']:0;
			$this->v_date_created = isset($arr['date_created'])?$arr['date_created']:(new MongoDate(time()));
            $this->v_file_hd = isset($arr['file_hd'])?$arr['file_hd']:'';
			$this->v_mongo_id = $arr['_id'];
			$v_count++;
		}
		return $v_count;
	}

    public function select_one_array(cls_tb_material $cls_material, array $arr_where = array(), array $arr_order = array()){
        if(is_null($arr_order) || count($arr_order)==0){
            $arr_order = array('_id' => -1);//last insert show first
        }
        $rss = $this->collection->find($arr_where)->sort($arr_order)->limit(1);
        $v_count = 0;
        $arr_return = array();
        foreach($rss as $arr){
            $arr_return["product_id"] = isset($arr['product_id'])?$arr['product_id']:0;
            $arr_return["product_sku"] = isset($arr['product_sku'])?$arr['product_sku']:'0';
            $arr_return["product_threshold_group_id"] = isset($arr['product_threshold_group_id'])?$arr['product_threshold_group_id']:0;
            $arr_return["short_description"] = isset($arr['short_description'])?$arr['short_description']:'';
            $arr_return["long_description"] = isset($arr['long_description'])?$arr['long_description']:'';
            $arr_return["product_detail"] = isset($arr['product_detail'])?$arr['product_detail']:'';
            $arr_return["size_option"] = isset($arr['size_option'])?$arr['size_option']:0;
            $arr_return["print_type"] = isset($arr['print_type'])?$arr['print_type']:0;
            $arr_return["image_option"] = isset($arr['image_option'])?$arr['image_option']:0;
            $arr_return["image_choose"] = isset($arr['image_choose'])?$arr['image_choose']:0;
            $arr_return["num_images"] = isset($arr['num_images'])?$arr['num_images']:1;
            $arr_return["image_file"] = isset($arr['image_file'])?$arr['image_file']:'';
            $arr_return["saved_dir"] = isset($arr['saved_dir'])?$arr['saved_dir']:'';
            $v_print_type = isset($arr['print_type'])?$arr['print_type']:0;
            $arr_return["product_threshold"] = isset($arr['product_threshold'])?$arr['product_threshold']:-1;
            //$arr_return["excluded_location"] = isset($arr['excluded_location'])?$arr['excluded_location']:'';
            if(strrpos($arr_return["saved_dir"],'/')!=(strlen($arr_return["saved_dir"])-1)) $arr_return["saved_dir"] .= '/';

            $v_image_url = $arr_return['saved_dir'].PRODUCT_IMAGE_THUMB.'_'. $arr_return['image_file'];
            if(file_exists($v_image_url))
                $arr_return["image_url"] = $v_image_url;
            else
                $arr_return["image_url"] = $arr_return["saved_dir"].$arr_return["image_file"];

            $arr_return["image_desc"] = isset($arr['image_desc'])?$arr['image_desc']:'';

            $arr_material = isset($arr['material'])?$arr['material']:array();

            $arr_option = array();
            for($i=0; $i<count($arr_material);$i++){
                $v_id = (int) $arr_material[$i]['id'];
                $v_name = $arr_material[$i]['name'];
                $v_color = $arr_material[$i]['color'];
                $v_thick = $arr_material[$i]['thick'];
                $v_unit = $arr_material[$i]['uthick'];
                $v_status = isset($arr_material[$i]['status'])?$arr_material[$i]['status']:0;
                $v_sided = isset($arr_material[$i]['sided'])?$arr_material[$i]['sided']:0;
                if($v_status==0){
                    $v_found = false;
                    $arr_material_option = $cls_material->select_scalar('material_option', array('material_id'=>$v_id));
                    for($j=0;$j<count($arr_material_option) && !$v_found;$j++){
                        if($arr_material_option[$j]['color']==$v_color && $arr_material_option[$j]['thick']==$v_thick && $arr_material_option[$j]['unit']==$v_unit && $arr_material_option[$j]['status']==0) $v_found = true;
                    }
                    if($v_found){
                        if($v_print_type==0) $v_sided = 0;
                        $arr_material[$i]['sided'] = $v_sided;
                        $arr_option[] = $arr_material[$i];
                    }
                }
            }
            $arr_return["print_type"] = $v_print_type;
            /*
            if(!is_array($arr_material)) $arr_material = array();
            if(count($arr_material)>0){

                for($i=0; $i<count($arr_material);$i++){
                    $v_material_id = $arr_material[$i]['id'];
                    $arr_material[$i]['name'] = $cls_material->select_scalar('material_name', array('material_id'=>$v_material_id));
                }
            }
            */
            $arr_return["material"] = $arr_option;
            //$arr_return["material"] = isset($arr['material'])?$arr['material']:array();
            $arr_return["text_option"] = isset($arr['text_option'])?$arr['text_option']:0;
            $arr_return["text"] = isset($arr['text'])?$arr['text']:array();
            $arr_return["sold_by"] = isset($arr['sold_by'])?$arr['sold_by']:0;
            $arr_return["default_price"] = isset($arr['default_price'])?$arr['default_price']:0;
            $arr_return["product_status"] = isset($arr['product_status'])?$arr['product_status']:0;
            $arr_return["company_id"] = isset($arr['company_id'])?$arr['company_id']:0;
            $arr_return["location_id"] = isset($arr['location_id'])?$arr['location_id']:0;
            $arr_return["package_type"] = isset($arr['package_type'])?$arr['package_type']:0;
            $arr_return["file_hd"] = isset($arr['file_hd'])?$arr['file_hd']:'';

            $arr_return["mongo_id"] = $arr['_id'];
            $v_count++;
        }
        return $v_count>=1?$arr_return:array();
    }

	/**
	 * function select scalar value
	 * @param $p_field_name string, name of field
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @result: assign to properties
	 * @example: 
	 * <code>
	 * SELECT `product_id` FROM `tb_product` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_product($db)
	 * 		 $cls->select_scalar('product_id',array('user_id'=>2), array('user_email'=>-1))
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
	 *   SELECT `product_id` FROM `tb_product` WHERE `user_id`=2 ORDER BY `product_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_product($db)
	 * 		 $cls->select_next('product_id',array('user_id'=>2), array('product_id'=>-1))
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
	 * 		 $cls = new cls_tb_product($db)
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
	 * 		 $cls = new cls_tb_product($db)
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
	 * 		 $cls = new cls_tb_product($db)
	 * 		 $cls->select_distinct('nam')
	 * </code>
	 * @return array with indexes are names of fields 
	 */
	public function select_distinct($p_field_name){
		return $this->collection->command(array("distinct"=>"tb_product", "key"=>$p_field_name));
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
	 * 		 $cls = new cls_tb_product($db)
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
			$arr = array('$set' => array('product_id' => $this->v_product_id,'product_sku' => $this->v_product_sku,'product_threshold_group_id' => $this->v_product_threshold_group_id,'short_description' => $this->v_short_description,'long_description' => $this->v_long_description,'product_detail' => $this->v_product_detail,'size_option' => $this->v_size_option,'image_option' => $this->v_image_option,'image_choose' => $this->v_image_choose,'num_images' => $this->v_num_images,'package_quantity' => $this->v_package_quantity,'allow_single' => $this->v_allow_single,'package_type' => $this->v_package_type,'package_content' => $this->arr_package_content,'image_file' => $this->v_image_file,'image_desc' => $this->v_image_desc,'saved_dir' => $this->v_saved_dir,'map_content' => $this->arr_map_content,'material' => $this->arr_material,'text_option' => $this->v_text_option,'text' => $this->arr_text,'sold_by' => $this->v_sold_by,'default_price' => $this->v_default_price,'product_status' => $this->v_product_status, 'product_threshold'=>$this->v_product_threshold,'company_id' => $this->v_company_id,'location_id' => $this->v_location_id,'tag' => $this->arr_tag,'product_note' => $this->v_product_note, 'excluded_location'=>$this->v_excluded_location, 'user_name' => $this->v_user_name,'user_type' => $this->v_user_type,'date_created' => $this->v_date_created,'file_hd'=>$this->v_file_hd, 'print_type'=>$this->v_print_type));
		 else 
			$arr = array('$set' => array('product_sku' => $this->v_product_sku,'product_threshold_group_id' => $this->v_product_threshold_group_id,'short_description' => $this->v_short_description,'long_description' => $this->v_long_description,'product_detail' => $this->v_product_detail,'size_option' => $this->v_size_option,'image_option' => $this->v_image_option,'image_choose' => $this->v_image_choose,'num_images' => $this->v_num_images,'package_quantity' => $this->v_package_quantity,'allow_single' => $this->v_allow_single,'package_type' => $this->v_package_type,'package_content' => $this->arr_package_content,'image_file' => $this->v_image_file,'image_desc' => $this->v_image_desc,'saved_dir' => $this->v_saved_dir,'map_content' => $this->arr_map_content,'material' => $this->arr_material,'text_option' => $this->v_text_option,'text' => $this->arr_text,'sold_by' => $this->v_sold_by,'default_price' => $this->v_default_price,'product_status' => $this->v_product_status, 'product_threshold'=>$this->v_product_threshold,'company_id' => $this->v_company_id,'location_id' => $this->v_location_id,'tag' => $this->arr_tag,'product_note' => $this->v_product_note, 'excluded_location'=>$this->v_excluded_location,'user_name' => $this->v_user_name,'user_type' => $this->v_user_type,'date_created' => $this->v_date_created,'file_hd'=>$this->v_file_hd, 'print_type'=>$this->v_print_type));
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

    public function get_family_tree($p_parent_id, $p_sign_money, $p_url){
        $v_draw = '';
        $arr_package = $this->select_scalar('package_content', array('product_id'=>$p_parent_id));
        if(is_array($arr_package)){
            foreach($arr_package as $arr){
                $v_parent_id = $arr['refer_id'];
                $v_package_name = $arr['package_name'];
                $v_quantity = $arr['quantity'];
                $v_price = $arr['price'];
                $v_package_type = $arr['package_type'];
                $v_draw .= '<li><span class="_{TYPE}_"><a href="'.$p_url.$v_parent_id.'/info">'.$v_package_name.'</a> - Quantity: '.$v_quantity.' - Price: '.$p_sign_money.$v_price.'</span>';
                if($v_package_type>0){
                    $v_tmp_draw = $this->get_family_tree($v_parent_id, $p_sign_money, $p_url);
                    if($v_tmp_draw!=''){
                        $v_draw = str_replace('_{TYPE}_','folder', $v_draw);
                        $v_draw .= '<ul>'.$v_tmp_draw.'</ul></li>';
                    }else{
                        $v_draw = str_replace('_{TYPE}_','file', $v_draw);
                    }
                }
            }
        }
        return $v_draw;
    }

    public function get_package_image_choose(cls_tb_product_images $cls, $p_product_id=0){
        $v_ret = false;
        $v_product_id = $p_product_id>0?$p_product_id:$this->v_product_id;
        if($v_product_id>0){
            if($p_product_id==0){
                $v_image_choose = $this->get_image_choose();
                if($v_image_choose==1) $v_ret = $cls->count_field('product_image', array('product_id'=>$v_product_id, 'image_type'=>1, 'status'=>0))>0;
                if(!$v_ret){
                    if($this->get_package_type()>1){
                        $arr_package_content = $this->get_package_content();
                        for($i=0; $i<count($arr_package_content);$i++){
                            $v_product_id = $arr_package_content[$i]['refer_id'];
                            if(!$v_ret)
                                $v_ret = $this->get_package_image_choose($cls, $v_product_id);
                            else
                                $i = count($arr_package_content);
                        }
                    }
                }
            }else{
                $cls_product = new cls_tb_product($this->db, $this->v_dir);
                $v_row = $cls_product->select_one(array('product_id'=>$v_product_id));
                if($v_row==1){
                    if($cls_product->get_package_type()>2){
                        $arr_package_content = $cls_product->get_package_content();
                        $v_len = count($arr_package_content);
                        if($v_len>0){
                            for($i=0; $i<$v_len; $i++){
                                $v_tmp_product_id = $arr_package_content[$i]['refer_id'];
                                $v_tmp_image_choose = $arr_package_content[$i]['image_choose'];
                                $v_tmp_package_type = $arr_package_content[$i]['package_type'];
                                if($v_tmp_package_type<2){
                                    if($v_tmp_image_choose==1){
                                        if(!$v_ret) $v_ret = $cls->count_field('product_image', array('product_id'=>$v_tmp_product_id, 'status'=>0, 'image_type'=>1))>0;
                                    }
                                }else{
                                    if(!$v_ret)
                                        $v_ret = $this->get_package_image_choose($cls, $v_tmp_product_id);
                                    else
                                        $i = $v_len;
                                }

                            }
                        }
                    }else{
                        if($cls_product->get_image_choose()==1){
                            $v_ret = $cls->count_field('product_image', array('product_id'=>$v_product_id, 'status'=>0, 'image_type'=>1))>0;
                        }
                    }
                }
            }
        }
        return $v_ret;
    }

    public function get_list_image_choose(cls_tb_product_images $cls, $p_product_id=0, array $arr_ret = array()){
        if($p_product_id>0)
            $v_parent_product_id = $p_product_id;
        else
            $v_parent_product_id = $this->v_product_id;
        $cls_product = new cls_tb_product($this->db, $this->v_dir);
        if($p_product_id>0){
            $v_row = $cls_product->select_one(array('product_id'=>$v_parent_product_id));
            if($v_row==1){
                $arr_package_content = $cls_product->get_package_content();
                $v_count = count($arr_ret);
                $arr_ret[$v_count] = array(
                    'product_id'=>$v_parent_product_id
                    ,'parent_id'=>0
                    ,'product_sku'=>$cls_product->get_product_sku()
                    ,'package_type'=>$cls_product->get_package_type()
                    ,'image_choose'=>$cls_product->get_package_type() < 2?$cls_product->get_image_choose():0
                    ,'image_count'=>$cls_product->get_package_type() < 2?$cls->count_field('product_image', array('product_id'=>$v_parent_product_id, 'image_type'=>1,'status'=>0)):0
                );
            }else{
                return $arr_ret;
            }
        }else{
            $arr_package_content = $this->arr_package_content;
            $v_count = count($arr_ret);
            $arr_ret[$v_count] = array(
                'product_id'=>$v_parent_product_id
                ,'parent_id'=>0
                ,'product_sku'=>$this->get_product_sku()
                ,'package_type'=>$this->get_package_type()
                ,'image_choose'=>$this->get_package_type() < 2?$this->get_image_choose():0
                ,'image_count'=>$this->get_package_type() < 2?$cls->count_field('product_image', array('product_id'=>$v_parent_product_id, 'image_type'=>1,'status'=>0)):0
            );
        }

        for($i=0; $i<count($arr_package_content); $i++){
            $v_product_id = $arr_package_content[$i]['refer_id'];
            $v_row = $cls_product->select_one(array('product_id'=>$v_product_id));
            if($v_row==1){
                $v_count = count($arr_ret);
                $arr_ret[$v_count] = array(
                    'product_id'=>$v_product_id
                    ,'parent_id'=>$v_parent_product_id
                    ,'product_sku'=>$cls_product->get_product_sku()
                    ,'package_type'=>$cls_product->get_package_type()
                    ,'image_choose'=>$cls_product->get_package_type() < 2?$cls_product->get_image_choose():0
                    ,'image_count'=>$cls_product->get_package_type() < 2?$cls->count_field('product_image', array('product_id'=>$v_product_id, 'image_type'=>1,'status'=>0)):0
                );
                if($cls_product->get_package_type() > 1) $arr_ret = $this->get_list_image_choose($cls, $v_product_id, $arr_ret);
            }
        }
        return $arr_ret;
    }
}
?>