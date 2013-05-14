<?php
class cls_tb_order{
	private $v_order_id = 0;
	private $v_raw_id = '';
	private $v_anvy_id = '';
	private $v_location_id = 0;
	private $v_company_id = 0;
	private $v_po_number = '';
	private $v_order_type = 0;
	private $v_shipping_contact = '';
	private $v_total_order_amount = 0;
	private $v_total_discount = 0;
	private $v_billing_contact = '';
	private $v_net_order_amount = 0;
	private $v_gross_order_amount = 0;
	private $v_description = '';
	private $v_notes = '';
	private $v_order_ref = '';
	private $v_sale_rep = '';
	private $v_date_created = '0000-00-00 00:00:00';
	private $v_date_required = '0000-00-00 00:00:00';
    private $v_user_name = '';
	private $v_term = 0;
	private $v_delivery_method = '';
	private $v_source = 0;
	private $v_status = 0;
	private $v_dispatch = 0;
	private $v_tax_1 = 0;
	private $v_tax_2 = 0;
	private $v_tax_3 = 0;
	private $v_require_approved = 0;
	private $v_user_modified = '';
	private $v_date_modified = '0000-00-00 00:00:00';
    private $v_user_approved = '';
    private $v_date_approved = '0000-00-00 00:00:00';

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
		$this->collection = $db->selectCollection('tb_order');
		$this->v_date_created = new MongoDate(time());
		$this->v_date_required = new MongoDate(time());
		$this->collection->ensureIndex(array("order_id"=>1), array('name'=>"order_id_key", "unique"=>1, "dropDups" => 1));
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
		$v_filename = 'tb_order';
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

    public function get_error_message(){
        return $this->v_error_message;
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
     * function return properties "require_approved" value
     * @return int value
     */
    public function get_require_approved(){
        return (int) $this->v_require_approved;
    }


    /**
     * function allow change properties "require_approved" value
     * @param $p_require_approved: int value
     */
    public function set_require_approved($p_require_approved){
        $this->v_require_approved = (int) $p_require_approved;
    }

    /**
     * function return properties "user_approved" value
     * @return string value
     */
    public function get_user_approved(){
        return $this->v_user_approved;
    }

    /**
     * function allow change properties "user_approved" value
     * @param $p_user_approved: string value
     */
    public function set_user_approved($p_user_approved){
        $this->v_user_approved = $p_user_approved;
    }

    /**
     * function return properties "date_approved" value
     * @return int value indicates amount of seconds
     */
    public function get_date_approved(){
        return  $this->v_date_approved->sec;
    }

    /**
     * function allow change properties "date_approved" value
     * @param $p_date_approved: string value format type: yyyy-mm-dd H:i:s
     */
    public function set_date_approved($p_date_approved){
        if($p_date_approved==NULL || $p_date_approved=='')
            $p_date_approved = NULL;
        else
            $p_date_approved = new MongoDate(strtotime($p_date_approved));

        $this->v_date_approved = $p_date_approved;
    }

    /**
     * function return properties "user_modified" value
     * @return string value
     */
    public function get_user_modified(){
        return $this->v_user_modified;
    }

    /**
     * function allow change properties "user_modified" value
     * @param $p_user_modified: string value
     */
    public function set_user_modified($p_user_modified){
        $this->v_user_modified = $p_user_modified;
    }

    /**
     * function return properties "date_modified" value
     * @return int value indicates amount of seconds
     */
    public function get_date_modified(){
        return  $this->v_date_modified->sec;
    }

    /**
     * function allow change properties "date_modified" value
     * @param $p_date_modified: string value format type: yyyy-mm-dd H:i:s
     */
    public function set_date_modified($p_date_modified){
        if($p_date_modified==NULL || $p_date_modified=='')
            $p_date_modified = NULL;
        else
            $p_date_modified = new MongoDate(strtotime($p_date_modified));

        $this->v_date_modified = $p_date_modified;
    }


    /**
	 * function return properties "raw_id" value
	 * @return string value
	 */
	public function get_raw_id(){
		return $this->v_raw_id;
	}

	
	/**
	 * function allow change properties "raw_id" value
	 * @param $p_raw_id: string value
	 */
	public function set_raw_id($p_raw_id){
		$this->v_raw_id = $p_raw_id;
	}

	
	/**
	 * function return properties "anvy_id" value
	 * @return string value
	 */
	public function get_anvy_id(){
		return $this->v_anvy_id;
	}

	
	/**
	 * function allow change properties "anvy_id" value
	 * @param $p_anvy_id: string value
	 */
	public function set_anvy_id($p_anvy_id){
		$this->v_anvy_id = $p_anvy_id;
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
	 * function return properties "order_type" value
	 * @return int value
	 */
	public function get_order_type(){
		return (int) $this->v_order_type;
	}

	
	/**
	 * function allow change properties "order_type" value
	 * @param $p_order_type: int value
	 */
	public function set_order_type($p_order_type){
		$this->v_order_type = (int) $p_order_type;
	}

	
	/**
	 * function return properties "shipping_contact" value
	 * @return string value
	 */
	public function get_shipping_contact(){
		return $this->v_shipping_contact;
	}

	
	/**
	 * function allow change properties "shipping_contact" value
	 * @param $p_shipping_contact: string value
	 */
	public function set_shipping_contact($p_shipping_contact){
		$this->v_shipping_contact = $p_shipping_contact;
	}

	
	/**
	 * function return properties "total_order_amount" value
	 * @return float value
	 */
	public function get_total_order_amount(){
		return (float) $this->v_total_order_amount;
	}

	
	/**
	 * function allow change properties "total_order_amount" value
	 * @param $p_total_order_amount: float value
	 */
	public function set_total_order_amount($p_total_order_amount){
		$this->v_total_order_amount = (float) $p_total_order_amount;
	}

	
	/**
	 * function return properties "total_discount" value
	 * @return float value
	 */
	public function get_total_discount(){
		return (float) $this->v_total_discount;
	}

	
	/**
	 * function allow change properties "total_discount" value
	 * @param $p_total_discount: float value
	 */
	public function set_total_discount($p_total_discount){
		$this->v_total_discount = (float) $p_total_discount;
	}

	
	/**
	 * function return properties "billing_contact" value
	 * @return string value
	 */
	public function get_billing_contact(){
		return $this->v_billing_contact;
	}

	
	/**
	 * function allow change properties "billing_contact" value
	 * @param $p_billing_contact: string value
	 */
	public function set_billing_contact($p_billing_contact){
		$this->v_billing_contact = $p_billing_contact;
	}

	
	/**
	 * function return properties "net_order_amount" value
	 * @return float value
	 */
	public function get_net_order_amount(){
		return (float) $this->v_net_order_amount;
	}

	
	/**
	 * function allow change properties "net_order_amount" value
	 * @param $p_net_order_amount: float value
	 */
	public function set_net_order_amount($p_net_order_amount){
		$this->v_net_order_amount = (float) $p_net_order_amount;
	}

	
	/**
	 * function return properties "gross_order_amount" value
	 * @return float value
	 */
	public function get_gross_order_amount(){
		return (float) $this->v_gross_order_amount;
	}

	
	/**
	 * function allow change properties "gross_order_amount" value
	 * @param $p_gross_order_amount: float value
	 */
	public function set_gross_order_amount($p_gross_order_amount){
		$this->v_gross_order_amount = (float) $p_gross_order_amount;
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
     * function return properties "notes" value
     * @return string value
     */
    public function get_notes(){
        return $this->v_notes;
    }


    /**
     * function allow change properties "notes" value
     * @param $p_notes: string value
     */
    public function set_notes($p_notes){
        $this->v_notes = $p_notes;
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
     * function return properties "order ref" value
     * @return string value
     */
    public function get_order_ref(){
        return $this->v_order_ref;
    }


    /**
     * function allow change properties "order ref" value
     * @param $p_order_ref: string value
     */
    public function set_order_ref($p_order_ref){
        $this->v_order_ref = $p_order_ref;
    }


    /**
	 * function return properties "sale_rep" value
	 * @return string value
	 */
	public function get_sale_rep(){
		return $this->v_sale_rep;
	}

	
	/**
	 * function allow change properties "sale_rep" value
	 * @param $p_sale_rep: string value
	 */
	public function set_sale_rep($p_sale_rep){
		$this->v_sale_rep = $p_sale_rep;
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
        if($p_date_created==NULL || $p_date_created=='')
            $p_date_created = NULL;
        else
            $p_date_created = new MongoDate(strtotime($p_date_created));

		$this->v_date_created = $p_date_created;
	}

	
	/**
	 * function return properties "date_required" value
	 * @return int value indicates amount of seconds
	 */
	public function get_date_required(){
        if( $this->v_date_required==NULL)
            return "";
        else
		return  $this->v_date_required->sec;
	}

	
	/**
	 * function allow change properties "date_required" value
	 * @param $p_date_required: string value format type: yyyy-mm-dd H:i:s
	 */
	public function set_date_required($p_date_required){
        if($p_date_required==NULL){
            $this->v_date_required = NULL;
        }
        else
        {
            //$p_date_required = date('Y-m-d',$p_date_required);
            $this->v_date_required = new MongoDate(strtotime($p_date_required));
        }
	}

	
	/**
	 * function return properties "term" value
	 * @return int value
	 */
	public function get_term(){
		return (int) $this->v_term;
	}

	
	/**
	 * function allow change properties "term" value
	 * @param $p_term: int value
	 */
	public function set_term($p_term){
		$this->v_term = (int) $p_term;
	}

	
	/**
	 * function return properties "delivery_method" value
	 * @return int value
	 */
	public function get_delivery_method(){
		return (int) $this->v_delivery_method;
	}

	
	/**
	 * function allow change properties "delivery_method" value
	 * @param $p_delivery_method: int value
	 */
	public function set_delivery_method($p_delivery_method){
		$this->v_delivery_method = (int) $p_delivery_method;
	}

	
	/**
	 * function return properties "source" value
	 * @return int value
	 */
	public function get_source(){
		return (int) $this->v_source;
	}

	
	/**
	 * function allow change properties "source" value
	 * @param $p_source: int value
	 */
	public function set_source($p_source){
		$this->v_source = (int) $p_source;
	}

	
	/**
	 * function return properties "status" value
	 * @return int value
	 */
	public function get_status(){
		return $this->v_status;
	}

	
	/**
	 * function allow change properties "status" value
	 * @param $p_status: int value
	 */
	public function set_status($p_status){
		$this->v_status = (int) $p_status;
	}

	
	/**
	 * function return properties "dispatch" value
	 * @return int value
	 */
	public function get_dispatch(){
		return (int) $this->v_dispatch;
	}

	
	/**
	 * function allow change properties "dispatch" value
	 * @param $p_dispatch: int value
	 */
	public function set_dispatch($p_dispatch){
		$this->v_dispatch = (int) $p_dispatch;
	}

	
	/**
	 * function return properties "tax_1" value
	 * @return float value
	 */
	public function get_tax_1(){
		return (float) $this->v_tax_1;
	}

	
	/**
	 * function allow change properties "tax_1" value
	 * @param $p_tax_1: float value
	 */
	public function set_tax_1($p_tax_1){
		$this->v_tax_1 = (float) $p_tax_1;
	}

	
	/**
	 * function return properties "tax_2" value
	 * @return float value
	 */
	public function get_tax_2(){
		return (float) $this->v_tax_2;
	}

	
	/**
	 * function allow change properties "tax_2" value
	 * @param $p_tax_2: float value
	 */
	public function set_tax_2($p_tax_2){
		$this->v_tax_2 = (float) $p_tax_2;
	}

	
	/**
	 * function return properties "tax_3" value
	 * @return float value
	 */
	public function get_tax_3(){
		return (float) $this->v_tax_3;
	}

	
	/**
	 * function allow change properties "tax_3" value
	 * @param $p_tax_3: float value
	 */
	public function set_tax_3($p_tax_3){
		$this->v_tax_3 = (float) $p_tax_3;
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
		$arr = array('order_id' => $this->v_order_id
					,'raw_id' => $this->v_raw_id
					,'anvy_id' => $this->v_anvy_id
					,'location_id' => $this->v_location_id
					,'company_id' => $this->v_company_id
					,'po_number' => $this->v_po_number
					,'order_type' => $this->v_order_type
					,'shipping_contact' => $this->v_shipping_contact
					,'total_order_amount' => $this->v_total_order_amount
					,'total_discount' => $this->v_total_discount
					,'billing_contact' => $this->v_billing_contact
					,'net_order_amount' => $this->v_net_order_amount
					,'gross_order_amount' => $this->v_gross_order_amount
					,'description' => $this->v_description
					,'notes' => $this->v_notes
					,'order_ref' => $this->v_order_ref
					,'sale_rep' => $this->v_sale_rep
					,'user_name' => $this->v_user_name
					,'date_created' => $this->v_date_created
					,'date_required' => $this->v_date_required
					,'term' => $this->v_term
					,'delivery_method' => $this->v_delivery_method
					,'source' => $this->v_source
					,'status' => $this->v_status
					,'dispatch' => $this->v_dispatch
					,'required_approved' => $this->v_require_approved
					,'date_approved' => $this->v_date_approved
					,'date_modified' => $this->v_date_modified
					,'user_approved' => $this->v_user_approved
					,'user_modified' => $this->v_user_modified
					,'tax_1' => $this->v_tax_1
					,'tax_2' => $this->v_tax_2
					,'tax_3' => $this->v_tax_3);
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
	 *       SELECT * FROM `tb_order` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_order($db)
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
			$this->v_order_id = isset($arr['order_id'])?$arr['order_id']:0;
			$this->v_raw_id = isset($arr['raw_id'])?$arr['raw_id']:'';
			$this->v_anvy_id = isset($arr['anvy_id'])?$arr['anvy_id']:'';
			$this->v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
			$this->v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
			$this->v_po_number = isset($arr['po_number'])?$arr['po_number']:'';
			$this->v_order_type = isset($arr['order_type'])?$arr['order_type']:0;
			$this->v_shipping_contact = isset($arr['shipping_contact'])?$arr['shipping_contact']:'';
			$this->v_total_order_amount = isset($arr['total_order_amount'])?$arr['total_order_amount']:0;
			$this->v_total_discount = isset($arr['total_discount'])?$arr['total_discount']:0;
			$this->v_billing_contact = isset($arr['billing_contact'])?$arr['billing_contact']:'';
			$this->v_net_order_amount = isset($arr['net_order_amount'])?$arr['net_order_amount']:0;
			$this->v_gross_order_amount = isset($arr['gross_order_amount'])?$arr['gross_order_amount']:0;
			$this->v_description = isset($arr['description'])?$arr['description']:'';
			$this->v_notes = isset($arr['notes'])?$arr['notes']:'';
			$this->v_order_ref = isset($arr['order_ref'])?$arr['order_ref']:'';
			$this->v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
			$this->v_sale_rep = isset($arr['sale_rep'])?$arr['sale_rep']:'';
			$this->v_date_created = isset($arr['date_created'])?$arr['date_created']:NULL;
			$this->v_date_required = isset($arr['date_required'])?$arr['date_required']:NULL;
			$this->v_term = isset($arr['term'])?$arr['term']:0;
			$this->v_delivery_method = isset($arr['delivery_method'])?$arr['delivery_method']:'';
			$this->v_source = isset($arr['source'])?$arr['source']:0;
			$this->v_status = isset($arr['status'])?$arr['status']:0;
			$this->v_dispatch = isset($arr['dispatch'])?$arr['dispatch']:0;
			$this->v_required_approved = isset($arr['required_approved'])?$arr['required_approved']:0;
			$this->v_user_modified = isset($arr['user_modified'])?$arr['user_modified']:'';
			$this->v_date_modified = isset($arr['date_modified'])?$arr['date_modified']:NULL;
            $this->v_user_approved = isset($arr['user_approved'])?$arr['user_approved']:'';
            $this->v_date_approved = isset($arr['date_approved'])?$arr['date_approved']:NULL;
			$this->v_tax_1 = isset($arr['tax_1'])?$arr['tax_1']:0;
			$this->v_tax_2 = isset($arr['tax_2'])?$arr['tax_2']:0;
			$this->v_tax_3 = isset($arr['tax_3'])?$arr['tax_3']:0;
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
	 * SELECT `order_id` FROM `tb_order` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_order($db)
	 * 		 $cls->select_scalar('order_id',array('user_id'=>2), array('user_email'=>-1))
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
	 *   SELECT `order_id` FROM `tb_order` WHERE `user_id`=2 ORDER BY `order_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_order($db)
	 * 		 $cls->select_next('order_id',array('user_id'=>2), array('order_id'=>-1))
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
	 * 		 $cls = new cls_tb_order($db)
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
     *         SELECT * FROM `tbl_users` WHERE `user_id`>=2
     * 		 $cls = new cls_tb_order($db)
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
	 * @param $arr_field array, array of fields will be selected
	 * @param $arr_where array, example: array('field'=>3), that equal to: WHERE field=3
	 * @param $arr_order array, example: array('field'=>-1), that equal to: ORDER BY field DESC
	 * @example:
	 * <code>
	 * SELECT * FROM `tbl_users` WHERE `user_id`>=2 ORDER BY `user_email` DESC LIMIT 10,20
	 * 		 $cls = new cls_tb_order($db)
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
			$arr = array('$set' => array('order_id' => $this->v_order_id,'raw_id' => $this->v_raw_id,'anvy_id' => $this->v_anvy_id,'location_id' => $this->v_location_id,'company_id' => $this->v_company_id,'po_number' => $this->v_po_number,'order_type' => $this->v_order_type,'shipping_contact' => $this->v_shipping_contact,'total_order_amount' => $this->v_total_order_amount,'total_discount' => $this->v_total_discount,'billing_contact' => $this->v_billing_contact,'net_order_amount' => $this->v_net_order_amount,'gross_order_amount' => $this->v_gross_order_amount,'description' => $this->v_description, 'notes'=>$this->v_notes, 'order_ref'=>$this->v_order_ref, 'sale_rep' => $this->v_sale_rep, 'user_name' => $this->v_user_name,'date_created' => $this->v_date_created,'date_required' => $this->v_date_required,'term' => $this->v_term,'delivery_method' => $this->v_delivery_method,'source' => $this->v_source,'status' => $this->v_status,'dispatch' => $this->v_dispatch,'require_approved'=>$this->v_require_approved,'user_approved'=>$this->v_user_approved,'date_approved'=>$this->v_date_approved,'user_modified'=>$this->v_user_modified,'date_modified'=>$this->v_date_modified, 'tax_1' => $this->v_tax_1,'tax_2' => $this->v_tax_2,'tax_3' => $this->v_tax_3));
		 else 
			$arr = array('$set' => array('raw_id' => $this->v_raw_id,'anvy_id' => $this->v_anvy_id,'location_id' => $this->v_location_id,'company_id' => $this->v_company_id,'po_number' => $this->v_po_number,'order_type' => $this->v_order_type,'shipping_contact' => $this->v_shipping_contact,'total_order_amount' => $this->v_total_order_amount,'total_discount' => $this->v_total_discount,'billing_contact' => $this->v_billing_contact,'net_order_amount' => $this->v_net_order_amount,'gross_order_amount' => $this->v_gross_order_amount,'description' => $this->v_description, 'notes'=>$this->v_notes, 'order_ref'=>$this->v_order_ref,'sale_rep' => $this->v_sale_rep, 'user_name' => $this->v_user_name,'date_created' => $this->v_date_created,'date_required' => $this->v_date_required,'term' => $this->v_term,'delivery_method' => $this->v_delivery_method,'source' => $this->v_source,'status' => $this->v_status,'dispatch' => $this->v_dispatch,'require_approved'=>$this->v_require_approved,'user_approved'=>$this->v_user_approved,'date_approved'=>$this->v_date_approved,'user_modified'=>$this->v_user_modified,'date_modified'=>$this->v_date_modified,'tax_1' => $this->v_tax_1,'tax_2' => $this->v_tax_2,'tax_3' => $this->v_tax_3));
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

    public function sum(array $arr_where = array())
    {
        $arr_order = $this->select($arr_where);
        $v_total = 0;
        //echo sizeof($arr_order) .'<br>';

        foreach ($arr_order as $arr) {
            $v_total_order_amount = isset($arr['total_order_amount']) ? $arr['total_order_amount'] : 0;
            //echo $v_total_order_amount .'<br>';
            $v_total +=$v_total_order_amount;
        }
        return $v_total;
    }

}
?>