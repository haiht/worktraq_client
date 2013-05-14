<?php
class cls_tb_order_items{

	private $v_order_item_id = 0;
	private $v_order_id = 0;
	private $v_product_id = 0;
	private $v_package_type = 0;
    private $v_company_id = 0;
    private $v_location_id = 0;
	private $v_product_code = '';
	private $v_product_description = '';
	private $v_quantity = 0;
	private $v_description = '';
	private $v_customization_information = '';
	private $v_width = 0;
	private $v_length = 0;
	private $v_unit = '';
	private $v_product_size_option = 0;
	private $v_current_size_option = 0;
	private $v_graphic_file = '';
	private $v_graphic_id = 0;
	private $v_product_image_option = 0;
	private $v_current_image_option = 0;
	private $v_custom_image_path = '';
	private $v_original_price = 0;
	private $v_discount_price = 0;
	private $v_current_price = 0;
	private $v_unit_price = 0;
	private $v_status = 0;
	private $v_discount_type = 0;
	private $v_discount_per_unit = 0;
	private $v_net_price = 0;
	private $v_extended_amount = 0;
	private $v_material_id = 0;
	private $v_material_name = '';
	private $v_material_color = '';
	private $v_material_thickness_value = 0;
	private $v_material_thickness_unit = '';
	private $v_total_price = 0;
	private $v_product_text_option = 0;
	private $v_current_text_option = 0;
	private $arr_text = array();
	private $arr_allocation = array();
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
		$this->collection = $db->selectCollection('tb_order_items');
		$this->collection->ensureIndex(array("order_id"=>1));
		$this->collection->ensureIndex(array("product_id"=>1));
		$this->collection->ensureIndex(array("order_item_id"=>1), array('name'=>"order_item_id_key", "unique"=>1, "dropDups" => 1));
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
		$v_filename = 'tb_order_items';
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
	 * function return properties "order_item_id" value
	 * @return int value
	 */
	public function get_order_item_id(){
		return (int) $this->v_order_item_id;
	}

	
	/**
	 * function allow change properties "order_item_id" value
	 * @param $p_order_item_id: int value
	 */
	public function set_order_item_id($p_order_item_id){
		$this->v_order_item_id = (int) $p_order_item_id;
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
     * @param $p_company_id int value
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
     * @param $p_location_id int value
     */
    public function set_location_id($p_location_id){
        $this->v_location_id = (int) $p_location_id;
    }

    /**
	 * function return properties "product_code" value
	 * @return string value
	 */
	public function get_product_code(){
		return $this->v_product_code;
	}

	
	/**
	 * function allow change properties "product_code" value
	 * @param $p_product_code: string value
	 */
	public function set_product_code($p_product_code){
		$this->v_product_code = $p_product_code;
	}


    /**
     * function return properties "product_description" value
     * @return string value
     */
    public function get_product_description(){
        return $this->v_product_description;
    }


    /**
     * function allow change properties "product_description" value
     * @param $p_product_code: string value
     */
    public function set_product_description($p_product_description){
        $this->v_product_description = $p_product_description;
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
	 * function return properties "customization_information" value
	 * @return string value
	 */
	public function get_customization_information(){
		return $this->v_customization_information;
	}

	
	/**
	 * function allow change properties "customization_information" value
	 * @param $p_customization_information: string value
	 */
	public function set_customization_information($p_customization_information){
		$this->v_customization_information = $p_customization_information;
	}

	
	/**
	 * function return properties "width" value
	 * @return float value
	 */
	public function get_width(){
		return (float) $this->v_width;
	}

	
	/**
	 * function allow change properties "width" value
	 * @param $p_width: float value
	 */
	public function set_width($p_width){
		$this->v_width = (float) $p_width;
	}

	
	/**
	 * function return properties "length" value
	 * @return float value
	 */
	public function get_length(){
		return (float) $this->v_length;
	}

	
	/**
	 * function allow change properties "length" value
	 * @param $p_length: float value
	 */
	public function set_length($p_length){
		$this->v_length = (float) $p_length;
	}


	/**
	 * function return properties "unit" value
	 * @return string value
	 */
	public function get_unit(){
		return $this->v_unit;
	}

	
	/**
	 * function allow change properties "unit" value
	 * @param $p_unit: string value
	 */
	public function set_unit($p_unit){
		$this->v_unit = $p_unit;
	}

	
	/**
	 * function return properties "product_size_option" value
	 * @return int value
	 */
	public function get_product_size_option(){
		return (int) $this->v_product_size_option;
	}

	
	/**
	 * function allow change properties "product_size_option" value
	 * @param $p_product_size_option: int value
	 */
	public function set_product_size_option($p_product_size_option){
		$this->v_product_size_option = (int) $p_product_size_option;
	}

	
	/**
	 * function return properties "current_size_option" value
	 * @return int value
	 */
	public function get_current_size_option(){
		return (int) $this->v_current_size_option;
	}

	
	/**
	 * function allow change properties "current_size_option" value
	 * @param $p_current_size_option: int value
	 */
	public function set_current_size_option($p_current_size_option){
		$this->v_current_size_option = (int) $p_current_size_option;
	}

	
	/**
	 * function return properties "graphic_file" value
	 * @return string value
	 */
	public function get_graphic_file(){
		return $this->v_graphic_file;
	}

	
	/**
	 * function allow change properties "graphic_id" value
	 * @param $p_graphic_id: int value
	 */
	public function set_graphic_id($p_graphic_id){
		$this->v_graphic_id = (int) $p_graphic_id;
	}

    /**
     * function return properties "graphic_id" value
     * @return int value
     */
    public function get_graphic_id(){
        return (int) $this->v_graphic_id;
    }


    /**
     * function allow change properties "graphic_file" value
     * @param $p_graphic_file: string value
     */
    public function set_graphic_file($p_graphic_file){
        $this->v_graphic_file = $p_graphic_file;
    }


    /**
	 * function return properties "product_image_option" value
	 * @return int value
	 */
	public function get_product_image_option(){
		return (int) $this->v_product_image_option;
	}

	
	/**
	 * function allow change properties "product_image_option" value
	 * @param $p_product_image_option: int value
	 */
	public function set_product_image_option($p_product_image_option){
		$this->v_product_image_option = (int) $p_product_image_option;
	}

	
	/**
	 * function return properties "current_image_option" value
	 * @return int value
	 */
	public function get_current_image_option(){
		return (int) $this->v_current_image_option;
	}

	
	/**
	 * function allow change properties "current_image_option" value
	 * @param $p_current_image_option: int value
	 */
	public function set_current_image_option($p_current_image_option){
		$this->v_current_image_option = (int) $p_current_image_option;
	}

	
	/**
	 * function return properties "custom_image_path" value
	 * @return string value
	 */
	public function get_custom_image_path(){
		return $this->v_custom_image_path;
	}

	
	/**
	 * function allow change properties "custom_image_path" value
	 * @param $p_custom_image_path: string value
	 */
	public function set_custom_image_path($p_custom_image_path){
		$this->v_custom_image_path = $p_custom_image_path;
	}

	
	/**
	 * function return properties "original_price" value
	 * @return float value
	 */
	public function get_original_price(){
		return (float) $this->v_original_price;
	}

	
	/**
	 * function allow change properties "original_price" value
	 * @param $p_original_price: float value
	 */
	public function set_original_price($p_original_price){
		$this->v_original_price = (float) $p_original_price;
	}

	
	/**
	 * function return properties "discount_price" value
	 * @return float value
	 */
	public function get_discount_price(){
		return (float) $this->v_discount_price;
	}

	
	/**
	 * function allow change properties "discount_price" value
	 * @param $p_discount_price: float value
	 */
	public function set_discount_price($p_discount_price){
		$this->v_discount_price = (float) $p_discount_price;
	}

	
	/**
	 * function return properties "current_price" value
	 * @return float value
	 */
	public function get_current_price(){
		return (float) $this->v_current_price;
	}

	
	/**
	 * function allow change properties "current_price" value
	 * @param $p_current_price: float value
	 */
	public function set_current_price($p_current_price){
		$this->v_current_price = (float) $p_current_price;
	}

	
	/**
	 * function return properties "unit_price" value
	 * @return float value
	 */
	public function get_unit_price(){
		return (float) $this->v_unit_price;
	}

	
	/**
	 * function allow change properties "unit_price" value
	 * @param $p_unit_price: float value
	 */
	public function set_unit_price($p_unit_price){
		$this->v_unit_price = (float) $p_unit_price;
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
	 * function return properties "discount_type" value
	 * @return float value
	 */
	public function get_discount_type(){
		return (float) $this->v_discount_type;
	}

	
	/**
	 * function allow change properties "discount_type" value
	 * @param $p_discount_type: float value
	 */
	public function set_discount_type($p_discount_type){
		$this->v_discount_type = (float) $p_discount_type;
	}

	
	/**
	 * function return properties "discount_per_unit" value
	 * @return float value
	 */
	public function get_discount_per_unit(){
		return (float) $this->v_discount_per_unit;
	}

	
	/**
	 * function allow change properties "discount_per_unit" value
	 * @param $p_discount_per_unit: float value
	 */
	public function set_discount_per_unit($p_discount_per_unit){
		$this->v_discount_per_unit = (float) $p_discount_per_unit;
	}

	
	/**
	 * function return properties "net_price" value
	 * @return float value
	 */
	public function get_net_price(){
		return (float) $this->v_net_price;
	}

	
	/**
	 * function allow change properties "net_price" value
	 * @param $p_net_price: float value
	 */
	public function set_net_price($p_net_price){
		$this->v_net_price = (float) $p_net_price;
	}

	
	/**
	 * function return properties "extended_amount" value
	 * @return int value
	 */
	public function get_extended_amount(){
		return (int) $this->v_extended_amount;
	}

	
	/**
	 * function allow change properties "extended_amount" value
	 * @param $p_extended_amount: int value
	 */
	public function set_extended_amount($p_extended_amount){
		$this->v_extended_amount = (int) $p_extended_amount;
	}

	
	/**
	 * function return properties "material_id" value
	 * @return int value
	 */
	public function get_material_id(){
		return (int) $this->v_material_id;
	}

	
	/**
	 * function allow change properties "material_id" value
	 * @param $p_material_id: int value
	 */
	public function set_material_id($p_material_id){
		$this->v_material_id = (int) $p_material_id;
	}

	
	/**
	 * function return properties "material_name" value
	 * @return string value
	 */
	public function get_material_name(){
		return $this->v_material_name;
	}

	
	/**
	 * function allow change properties "material_name" value
	 * @param $p_material_name: string value
	 */
	public function set_material_name($p_material_name){
		$this->v_material_name = $p_material_name;
	}

	
	/**
	 * function return properties "material_color" value
	 * @return string value
	 */
	public function get_material_color(){
		return $this->v_material_color;
	}

	
	/**
	 * function allow change properties "material_color" value
	 * @param $p_material_color: string value
	 */
	public function set_material_color($p_material_color){
		$this->v_material_color = $p_material_color;
	}

	
	/**
	 * function return properties "material_thickness_value" value
	 * @return float value
	 */
	public function get_material_thickness_value(){
		return (float) $this->v_material_thickness_value;
	}

	
	/**
	 * function allow change properties "material_thickness_value" value
	 * @param $p_material_thickness_value: float value
	 */
	public function set_material_thickness_value($p_material_thickness_value){
		$this->v_material_thickness_value = (float) $p_material_thickness_value;
	}

	
	/**
	 * function return properties "material_thickness_unit" value
	 * @return string value
	 */
	public function get_material_thickness_unit(){
		return $this->v_material_thickness_unit;
	}

	
	/**
	 * function allow change properties "material_thickness_unit" value
	 * @param $p_material_thickness_unit: string value
	 */
	public function set_material_thickness_unit($p_material_thickness_unit){
		$this->v_material_thickness_unit = $p_material_thickness_unit;
	}

	
	/**
	 * function return properties "total_price" value
	 * @return float value
	 */
	public function get_total_price(){
		return (float) $this->v_total_price;
	}

	
	/**
	 * function allow change properties "total_price" value
	 * @param $p_total_price: float value
	 */
	public function set_total_price($p_total_price){
		$this->v_total_price = (float) $p_total_price;
	}

	
	/**
	 * function return properties "product_text_option" value
	 * @return int value
	 */
	public function get_product_text_option(){
		return (int) $this->v_product_text_option;
	}

	
	/**
	 * function allow change properties "product_text_option" value
	 * @param $p_product_text_option: int value
	 */
	public function set_product_text_option($p_product_text_option){
		$this->v_product_text_option = (int) $p_product_text_option;
	}

	
	/**
	 * function return properties "current_text_option" value
	 * @return int value
	 */
	public function get_current_text_option(){
		return (int) $this->v_current_text_option;
	}

	
	/**
	 * function allow change properties "current_text_option" value
	 * @param $p_current_text_option: int value
	 */
	public function set_current_text_option($p_current_text_option){
		$this->v_current_text_option = (int) $p_current_text_option;
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
	 * function return properties "allocation" value
	 * @return array value
	 */
	public function get_allocation(){
		return  $this->arr_allocation;
	}

	
	/**
	 * function allow change properties "allocation" value
	 * @param $arr_allocation array
	 */
	public function set_allocation(array $arr_allocation = array()){
		$this->arr_allocation = $arr_allocation;
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
		$arr = array('order_item_id' => $this->v_order_item_id
					,'order_id' => $this->v_order_id
					,'product_id' => $this->v_product_id
					,'package_type' => $this->v_package_type
					,'company_id' => $this->v_company_id
					,'location_id' => $this->v_location_id
					,'product_code' => $this->v_product_code
					,'product_description' => $this->v_product_description
					,'quantity' => $this->v_quantity
					,'description' => $this->v_description
					,'customization_information' => $this->v_customization_information
					,'width' => $this->v_width
					,'length' => $this->v_length
					,'unit' => $this->v_unit
					,'product_size_option' => $this->v_product_size_option
					,'current_size_option' => $this->v_current_size_option
					,'graphic_file' => $this->v_graphic_file
					,'graphic_id' => $this->v_graphic_id
					,'product_image_option' => $this->v_product_image_option
					,'current_image_option' => $this->v_current_image_option
					,'custom_image_path' => $this->v_custom_image_path
					,'original_price' => $this->v_original_price
					,'discount_price' => $this->v_discount_price
					,'current_price' => $this->v_current_price
					,'unit_price' => $this->v_unit_price
					,'status' => $this->v_status
					,'discount_type' => $this->v_discount_type
					,'discount_per_unit' => $this->v_discount_per_unit
					,'net_price' => $this->v_net_price
					,'extended_amount' => $this->v_extended_amount
					,'material_id' => $this->v_material_id
					,'material_name' => $this->v_material_name
					,'material_color' => $this->v_material_color
					,'material_thickness_value' => $this->v_material_thickness_value
					,'material_thickness_unit' => $this->v_material_thickness_unit
					,'total_price' => $this->v_total_price
					,'product_text_option' => $this->v_product_text_option
					,'current_text_option' => $this->v_current_text_option
					,'text' => $this->arr_text
					,'allocation' => $this->arr_allocation);
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
	 *       SELECT * FROM `tb_order_items` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_order_items($db)
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
			$this->v_order_item_id = isset($arr['order_item_id'])?$arr['order_item_id']:0;
			$this->v_order_id = isset($arr['order_id'])?$arr['order_id']:0;
			$this->v_product_id = isset($arr['product_id'])?$arr['product_id']:0;
			$this->v_package_type = isset($arr['package_type'])?$arr['package_type']:0;
			$this->v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
			$this->v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
			$this->v_product_code = isset($arr['product_code'])?$arr['product_code']:'';
			$this->v_product_description = isset($arr['product_description'])?$arr['product_description']:'';
			$this->v_quantity = isset($arr['quantity'])?$arr['quantity']:0;
			$this->v_description = isset($arr['description'])?$arr['description']:'';
			$this->v_customization_information = isset($arr['customization_information'])?$arr['customization_information']:'';
			$this->v_width = isset($arr['width'])?$arr['width']:0;
			$this->v_length = isset($arr['length'])?$arr['length']:0;
			$this->v_unit = isset($arr['unit'])?$arr['unit']:'';
			$this->v_product_size_option = isset($arr['product_size_option'])?$arr['product_size_option']:0;
			$this->v_current_size_option = isset($arr['current_size_option'])?$arr['current_size_option']:0;
			$this->v_graphic_file = isset($arr['graphic_file'])?$arr['graphic_file']:'';
			$this->v_graphic_id = isset($arr['graphic_id'])?$arr['graphic_id']:0;
			$this->v_product_image_option = isset($arr['product_image_option'])?$arr['product_image_option']:0;
			$this->v_current_image_option = isset($arr['current_image_option'])?$arr['current_image_option']:0;
			$this->v_custom_image_path = isset($arr['custom_image_path'])?$arr['custom_image_path']:'';
			$this->v_original_price = isset($arr['original_price'])?$arr['original_price']:0;
			$this->v_discount_price = isset($arr['discount_price'])?$arr['discount_price']:0;
			$this->v_current_price = isset($arr['current_price'])?$arr['current_price']:0;
			$this->v_unit_price = isset($arr['unit_price'])?$arr['unit_price']:0;
			$this->v_status = isset($arr['status'])?$arr['status']:0;
			$this->v_discount_type = isset($arr['discount_type'])?$arr['discount_type']:0;
			$this->v_discount_per_unit = isset($arr['discount_per_unit'])?$arr['discount_per_unit']:0;
			$this->v_net_price = isset($arr['net_price'])?$arr['net_price']:0;
			$this->v_extended_amount = isset($arr['extended_amount'])?$arr['extended_amount']:0;
			$this->v_material_id = isset($arr['material_id'])?$arr['material_id']:0;
			$this->v_material_name = isset($arr['material_name'])?$arr['material_name']:'';
			$this->v_material_color = isset($arr['material_color'])?$arr['material_color']:'';
			$this->v_material_thickness_value = isset($arr['material_thickness_value'])?$arr['material_thickness_value']:0;
			$this->v_material_thickness_unit = isset($arr['material_thickness_unit'])?$arr['material_thickness_unit']:'';
			$this->v_total_price = isset($arr['total_price'])?$arr['total_price']:0;
			$this->v_product_text_option = isset($arr['product_text_option'])?$arr['product_text_option']:0;
			$this->v_current_text_option = isset($arr['current_text_option'])?$arr['current_text_option']:0;
			$this->arr_text = isset($arr['text'])?$arr['text']:array();
			$this->arr_allocation = isset($arr['allocation'])?$arr['allocation']:array();
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
	 * SELECT `order_item_id` FROM `tb_order_items` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_order_items($db)
	 * 		 $cls->select_scalar('order_item_id',array('user_id'=>2), array('user_email'=>-1))
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
     * @param $p_order_id
     * @return int total quantity
     */
    public function select_total_items_in_order($p_order_id){
        $arr_items = $this->select(array('order_id'=>(int) $p_order_id));
        $v_total = 0;
        foreach($arr_items as $arr){
            if(isset($arr['quantity']) && $arr['quantity']>0)
                $v_total +=$arr['quantity'];
        }
        return $v_total;
    }

	/**
	 * function get next int value for key
	 * @param $p_field_name string, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @result: assign to properties
	 * @example: 
	 * <code>
	 *   SELECT `order_item_id` FROM `tb_order_items` WHERE `user_id`=2 ORDER BY `order_item_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_order_items($db)
	 * 		 $cls->select_next('order_item_id',array('user_id'=>2), array('order_item_id'=>-1))
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
	 * 		 $cls = new cls_tb_order_items($db)
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
	 * 		 $cls = new cls_tb_order_items($db)
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
	 * 		 $cls = new cls_tb_order_items($db)
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
			$arr = array('$set' => array('order_item_id' => $this->v_order_item_id,'order_id' => $this->v_order_id,'product_id' => $this->v_product_id, 'package_type' => $this->v_package_type, 'company_id'=>$this->v_company_id, 'location_id'=>$this->v_location_id, 'product_code' => $this->v_product_code,'product_description'=>$this->v_product_description,'quantity' => $this->v_quantity,'description' => $this->v_description,'customization_information' => $this->v_customization_information,'width' => $this->v_width,'length' => $this->v_length,'unit' => $this->v_unit,'product_size_option' => $this->v_product_size_option,'current_size_option' => $this->v_current_size_option,'graphic_file' => $this->v_graphic_file,'graphic_id' => $this->v_graphic_id,'product_image_option' => $this->v_product_image_option,'current_image_option' => $this->v_current_image_option,'custom_image_path' => $this->v_custom_image_path,'original_price' => $this->v_original_price,'discount_price' => $this->v_discount_price,'current_price' => $this->v_current_price,'unit_price' => $this->v_unit_price,'status' => $this->v_status,'discount_type' => $this->v_discount_type,'discount_per_unit' => $this->v_discount_per_unit,'net_price' => $this->v_net_price,'extended_amount' => $this->v_extended_amount,'material_id' => $this->v_material_id,'material_name' => $this->v_material_name,'material_color' => $this->v_material_color,'material_thickness_value' => $this->v_material_thickness_value,'material_thickness_unit' => $this->v_material_thickness_unit,'total_price' => $this->v_total_price,'product_text_option' => $this->v_product_text_option,'current_text_option' => $this->v_current_text_option,'text' => $this->arr_text,'allocation' => $this->arr_allocation));
		 else 
			$arr = array('$set' => array('order_id' => $this->v_order_id,'product_id' => $this->v_product_id, 'package_id' => $this->v_package_type, 'company_id'=>$this->v_company_id, 'location_id'=>$this->v_location_id,'product_code' => $this->v_product_code,'product_description'=>$this->v_product_description,'quantity' => $this->v_quantity,'description' => $this->v_description,'customization_information' => $this->v_customization_information,'width' => $this->v_width,'length' => $this->v_length,'unit' => $this->v_unit,'product_size_option' => $this->v_product_size_option,'current_size_option' => $this->v_current_size_option,'graphic_file' => $this->v_graphic_file,'graphic_id' => $this->v_graphic_id,'product_image_option' => $this->v_product_image_option,'current_image_option' => $this->v_current_image_option,'custom_image_path' => $this->v_custom_image_path,'original_price' => $this->v_original_price,'discount_price' => $this->v_discount_price,'current_price' => $this->v_current_price,'unit_price' => $this->v_unit_price,'status' => $this->v_status,'discount_type' => $this->v_discount_type,'discount_per_unit' => $this->v_discount_per_unit,'net_price' => $this->v_net_price,'extended_amount' => $this->v_extended_amount,'material_id' => $this->v_material_id,'material_name' => $this->v_material_name,'material_color' => $this->v_material_color,'material_thickness_value' => $this->v_material_thickness_value,'material_thickness_unit' => $this->v_material_thickness_unit,'total_price' => $this->v_total_price,'product_text_option' => $this->v_product_text_option,'current_text_option' => $this->v_current_text_option,'text' => $this->arr_text,'allocation' => $this->arr_allocation));
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