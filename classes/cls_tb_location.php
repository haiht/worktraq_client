<?php
class cls_tb_location{

	private $v_location_id = 0;
	private $v_company_id = 0;
	private $v_location_type = 0;
    private $v_location_name = '';
	private $v_location_region = '0';
    private $v_location_banner = '';
	private $v_location_number = '';
	private $v_main_contact = '';
	private $v_approved_contact = 0;
	private $v_address_unit = '';
	private $v_address_line_1 = '';
	private $v_address_line_2 = '';
	private $v_address_line_3 = '';
	private $v_address_city = '';
    private $v_location_phone = '';
    private $v_location_fax = '';
	private $v_address_province = '';
	private $v_address_postal = '';
	private $v_address_country = 15;
    private $v_flag_shipped_address = 1;

    private $v_shipped_address_unit = '';
    private $v_shipped_address_line_1 = '';
    private $v_shipped_address_line_2 = '';
    private $v_shipped_address_line_3 = '';
    private $v_shipped_address_city = '';
    private $v_shipped_address_province = '';
    private $v_shipped_address_postal = '';
    private $v_shipped_address_country = 15;

	private $v_open_date = NULL;
	private $v_close_date = NULL;
	private $v_status = 0;
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
		$this->collection = $db->selectCollection('tb_location');
		$this->collection->ensureIndex(array("company_id"=>1));
		$this->v_open_date = new MongoDate(time());
		$this->v_close_date = new MongoDate(time());
		$this->collection->ensureIndex(array("location_id"=>1), array('name'=>"location_id_key", "unique"=>1, "dropDups" => 1));
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
		$v_filename = 'tb_location';
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
	public function set_location_id($p_location_id,$p_insert= true){
		$this->v_location_id = (int) $p_location_id;
	}

    /**
     * @param $p_location_banner
     */
    public function set_location_banner($p_location_banner){
        $this->v_location_banner = trim($p_location_banner);
    }

    /**
     * @return string
     */
    public function get_location_banner(){
        return $this->v_location_banner;
    }


    /**
     * @return string
     */
    public function get_location_name(){
        return $this->v_location_name;
    }

    /**
     * @return string
     */
    public function get_flag_shipped_address(){
        return $this->v_flag_shipped_address;
    }

    /**
     * @param $p_flag_shipped_address
     */
    public function set_flag_shipped_address($p_flag_shipped_address){
        $this->v_flag_shipped_address = $p_flag_shipped_address;
    }
    /**
     * @param $p_location_name
     */
    public function set_location_name($p_location_name){
        $this->v_location_name = $p_location_name;
    }

    /**
     * @param $p_location_id
     * @return string
     */
    public function set_location_name_by_id($p_location_id)
    {
        $rss = $this->collection->find(array(),array('location_id'=>$p_location_id))->limit(1);
        $v_location_name = '';
        foreach($rss as $arr)
        {
            $v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
        }
        return $v_location_name;
    }

	/**
	 * function return properties "company_id" value
	 * @return int value
	 */
	public function get_company_id(){
		return  (int)$this->v_company_id;
	}

	
	/**
	 * function allow change properties "company_id" value
	 * @param $p_company_id: int value
	 */
	public function set_company_id($p_company_id){
		$this->v_company_id = (int)$p_company_id ;
	}

    /**
     * @return string
     */
    public function get_location_phone()
    {
        return $this->v_location_phone;
    }

    /**
     * @param $p_location_phone
     */
    public function set_location_phone($p_location_phone){
        $this->v_location_phone = $p_location_phone;
    }

    /**
     * @return string
     */
    public function get_location_fax()
    {
        return $this->v_location_fax;
    }

    /**
     * @param $p_location_fax
     */
    public function set_location_fax($p_location_fax){
        $this->v_location_fax = $p_location_fax;
    }

    /**
     * @return int
     */
    public function set_current_location_id()
    {
        $rss = $this->collection->find(array(),array('location_id'=>1))->sort(array('location_id'=>-1))->limit(1);
        $v_current_location_id = 0;
        foreach($rss as $arr)
        {
            $v_current_location_id = isset($arr['location_id'])?$arr['location_id']:0;
        }
        return $v_current_location_id;
    }
	
	/**
	 * function return properties "location_type" value
	 * @return int value
	 */
	public function get_location_type(){
		return (int) $this->v_location_type;
	}

	
	/**
	 * function allow change properties "location_type" value
	 * @param $p_location_type: int value
	 */
	public function set_location_type($p_location_type){
		$this->v_location_type = (int) $p_location_type;
	}

	
	/**
	 * function return properties "location_region" value
	 * @return string value
	 */
	public function get_location_region(){
		return $this->v_location_region;
	}

	
	/**
	 * function allow change properties "location_region" value
	 * @param $p_location_region: string value
	 */
	public function set_location_region($p_location_region){
		$this->v_location_region = $p_location_region;
	}

	
	/**
	 * function return properties "location_number" value
	 * @return int value
	 */
	public function get_location_number(){
		return (int) $this->v_location_number;
	}

	
	/**
	 * function allow change properties "location_number" value
	 * @param $p_location_number: int value
	 */
	public function set_location_number($p_location_number){
		$this->v_location_number = (int) $p_location_number;
	}

	
	/**
	 * function return properties "main_contact" value
	 * @return int value
	 */
	public function get_main_contact(){
		return (int) $this->v_main_contact;
	}

	
	/**
	 * function allow change properties "main_contact" value
	 * @param $p_main_contact: int value
	 */
	public function set_main_contact($p_main_contact){
		$this->v_main_contact = (int) $p_main_contact;
	}

    /**
     * function return properties "approved_contact" value
     * @return int value
     */
    public function get_approved_contact(){
        return (int) $this->v_approved_contact;
    }


    /**
     * function allow change properties "approved_contact" value
     * @param $p_approved_contact: string value
     */
    public function set_approved_contact($p_approved_contact){
        $this->v_approved_contact = (int) $p_approved_contact;
    }

    public function get_name_location($p_location_id)
    {
        $rss = $this->collection->find(array('location_id'=>$p_location_id))->limit(1);
        $v_location_name = '';
        foreach($rss as $arr)
            $v_location_name = isset($arr['location_name'])?$arr['location_name']:'';

        return $v_location_name;
    }

	
	/**
	 * function return properties "address_unit" value
	 * @return string value
	 */
	public function get_address_unit(){
		return $this->v_address_unit;
	}

    /**
     * @return string
     */
    public function get_shipped_address_unit(){
        return $this->v_shipped_address_unit;
    }
	
	/**
	 * function allow change properties "address_unit" value
	 * @param $p_address_unit: string value
	 */
	public function set_address_unit($p_address_unit){
		$this->v_address_unit = $p_address_unit;
	}

    /**
     * @param $p_shipped_address_unit
     */
    public function set_shipped_address_unit($p_shipped_address_unit){
        $this->v_shipped_address_unit = $p_shipped_address_unit;
    }
	
	/**
	 * function return properties "address_line_1" value
	 * @return string value
	 */
	public function get_address_line_1(){
		return $this->v_address_line_1;
	}

    /**
     * @return string
     */
    public function get_shipped_address_line_1(){
        return $this->v_shipped_address_line_1;
    }

	
	/**
	 * function allow change properties "address_line_1" value
	 * @param $p_address_line_1: string value
	 */
	public function set_address_line_1($p_address_line_1){
		$this->v_address_line_1 = $p_address_line_1;
	}

    /**
     * @param $p_shipped_address_line_1
     */
    public function set_shipped_address_line_1($p_shipped_address_line_1){
        $this->v_shipped_address_line_1 = $p_shipped_address_line_1;
    }
	
	/**
	 * function return properties "address_line_2" value
	 * @return string value
	 */
	public function get_address_line_2(){
		return $this->v_address_line_2;
	}

    /**
     * @return string
     */
    public function get_shipped_address_line_2(){
        return $this->v_shipped_address_line_2;
    }


	
	/**
	 * function allow change properties "address_line_2" value
	 * @param $p_address_line_2: string value
	 */
	public function set_address_line_2($p_address_line_2){
		$this->v_address_line_2 = $p_address_line_2;
	}

    /**
     * @param $p_shipped_address_line_2
     */
    public function set_shipped_address_line_2($p_shipped_address_line_2){
        $this->v_shipped_address_line_2 = $p_shipped_address_line_2;
    }
	
	/**
	 * function return properties "address_line_3" value
	 * @return string value
	 */
	public function get_address_line_3(){
		return $this->v_address_line_3;
	}

    /**
     * @return string
     */
    public function get_shipped_address_line_3(){
        return $this->v_shipped_address_line_3;
    }
	
	/**
	 * function allow change properties "address_line_3" value
	 * @param $p_address_line_3: string value
	 */
	public function set_address_line_3($p_address_line_3){
		$this->v_address_line_3 = $p_address_line_3;
	}

    /**
     * @param $p_shipped_address_line_3
     */
    public function set_shipped_address_line_3($p_shipped_address_line_3){
        $this->v_shipped_address_line_3 = $p_shipped_address_line_3;
    }

	
	/**
	 * function return properties "address_city" value
	 * @return string value
	 */
	public function get_address_city(){
		return $this->v_address_city;
	}

    /**
     * @return string
     */
    public function get_shipped_address_city(){
        return $this->v_shipped_address_city;
    }

	
	/**
	 * function allow change properties "address_city" value
	 * @param $p_address_city: string value
	 */
	public function set_address_city($p_address_city){
		$this->v_address_city = $p_address_city;
	}

    /**
     * @param $p_shipped_address_city
     */
    public function set_shipped_address_city($p_shipped_address_city){
        $this->v_shipped_address_city = $p_shipped_address_city;
    }
	
	/**
	 * function return properties "address_province" value
	 * @return int value
	 */
	public function get_address_province(){
		return $this->v_address_province;
	}

    /**
     * @return string
     */
    public function get_shipped_address_province(){
        return $this->v_shipped_address_province;
    }
	
	/**
	 * function allow change properties "address_province" value
	 * @param $p_address_province: int value
	 */
	public function set_address_province($p_address_province){
		$this->v_address_province = $p_address_province;
	}

    /**
     * @param $p_address_province
     */
    public function set_shipped_address_province($p_address_province){
        $this->v_shipped_address_province = $p_address_province;
    }

	
	/**
	 * function return properties "address_postal" value
	 * @return string value
	 */
	public function get_address_postal(){
		return $this->v_address_postal;
	}

    /**
     * @return string
     */
    public function get_shipped_address_postal(){
        return $this->v_shipped_address_postal;
    }
	
	/**
	 * function allow change properties "address_postal" value
	 * @param $p_address_postal: string value
	 */
	public function set_address_postal($p_address_postal){
		$this->v_address_postal = $p_address_postal;
	}


    public function set_shipped_address_postal($p_shipped_address_postal){
        $this->v_shipped_address_postal = $p_shipped_address_postal;
    }
	
	/**
	 * function return properties "address_country" value
	 * @return int value
	 */
	public function get_address_country(){
		return $this->v_address_country;
	}

    /**
     * @return int
     */
    public function get_shipped_address_country(){
        return $this->v_shipped_address_country;
    }

    /**
     * @return string
     */
    public function get_address_location()
    {
        $v_dsp_address = '';
        $v_address_unit = $this->v_shipped_address_unit;
        $v_address_line_1 = $this->v_shipped_address_line_1;
        $v_address_line_2 = $this->v_shipped_address_line_2;
        $v_address_line_3 = $this->v_shipped_address_line_3;
        $v_address_province = $this->v_shipped_address_province;
        $v_address_city = $this->v_shipped_address_city;
        $v_address_postal = $this->v_shipped_address_province;
        $arr_location_name = $this->v_shipped_address_country;

        $v_dsp_address = ($v_address_unit!=''?$v_address_unit .', ':'') . ($v_address_line_1!=''?$v_address_line_1 .'<br>':'');
        $v_dsp_address .= ($v_address_line_2!=''?$v_address_line_2 .'<br>':'');
        $v_dsp_address .= ($v_address_line_3!=''?$v_address_line_3 .'<br>':'');
        $v_dsp_address .= ($v_address_city!=''?$v_address_city .'&nbsp&nbsp':'') . ($v_address_province!=''?$v_address_province .'&nbsp&nbsp':'') .'<br>';
        $v_dsp_address .= ($v_address_postal!=''?$v_address_postal.'&nbsp&nbsp':'') .(isset($arr_location_name['address_country'])?$arr_location_name['address_country']:'N/A') ;

        return $v_dsp_address;
    }

    /**
     *
     */
    public function get_address_shipping()
    {
        $v_dsp_address = '';
        $v_address_unit = $this->v_address_unit;
        $v_address_line_1 = $this->v_address_line_1;
        $v_address_line_2 = $this->v_address_line_2;
        $v_address_line_3 = $this->v_address_line_3;
        $v_address_province = $this->v_address_province;
        $v_address_city = $this->v_address_city;
        $v_address_postal = $this->v_address_province;

        $v_dsp_address = ($v_address_unit!=''?$v_address_unit .', ':'') . ($v_address_line_1!=''?$v_address_line_1 .'<br>':'');
        $v_dsp_address .= ($v_address_line_2!=''?$v_address_line_2 .'<br>':'');
        $v_dsp_address .= ($v_address_line_3!=''?$v_address_line_3 .'<br>':'');
        $v_dsp_address .= ($v_address_city!=''?$v_address_city .'&nbsp&nbsp':'') . ($v_address_province!=''?$v_address_province .'&nbsp&nbsp':'') .($v_address_postal!=''?$v_address_postal.'&nbsp&nbsp':'');

        return $v_dsp_address;
    }


    /**
	 * function allow change properties "address_country" value
	 * @param $p_address_country: int value
	 */
	public function set_address_country($p_address_country_id){
        global $db;

        $cls_country = new cls_tb_country($db);
        $p_address_country_name = $cls_country->get_country_name_by_id((int) $p_address_country_id);
        $this->v_address_country = array('address_id'=>$p_address_country_id,'address_country'=>$p_address_country_name);
	}

    public function set_shipped_address_country($p_shipped_address_country_id){
        global $db;

        $cls_country = new cls_tb_country($db);
        $p_address_country_name = $cls_country->get_country_name_by_id((int)$p_shipped_address_country_id);
        $this->v_shipped_address_country = array('address_id'=>$p_shipped_address_country_id,'address_country'=>$p_address_country_name);
    }

	
	/**
	 * function return properties "open_date" value
	 * @return int value indicates amount of seconds
	 */
	public function get_open_date(){
        if($this->v_open_date==NULL || $this->v_open_date=='')
            return  NULL;
        else
            return $this->v_open_date->sec;
	}

	
	/**
	 * function allow change properties "open_date" value
	 * @param $p_open_date: string value format type: yyyy-mm-dd H:i:s
	 */
	public function set_open_date($p_open_date){
        if($p_open_date==NULL || $p_open_date=='' )
            $this->v_open_date = NULL;
        else
            $this->v_open_date = new MongoDate(strtotime($p_open_date));
	}

	
	/**
	 * function return properties "close_date" value
	 * @return int value indicates amount of seconds
	 */
	public function get_close_date(){

        if($this->v_close_date!=NULL)
		    return  $this->v_close_date->sec;
        else
            return NULL;
	}

	
	/**
	 * function allow change properties "close_date" value
	 * @param $p_close_date: string value format type: yyyy-mm-dd H:i:s
	 */
	public function set_close_date($p_close_date){
        if($p_close_date==NULL || $p_close_date=='' )
            $this->v_close_date = NULL;
        else
		    $this->v_close_date = new MongoDate(strtotime($p_close_date));
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
		$arr = array('location_id' => $this->v_location_id
                    ,'location_name'=>$this->v_location_name
					,'company_id' => $this->v_company_id
					,'location_type' => $this->v_location_type
					,'location_region' => $this->v_location_region
					,'location_banner' => $this->v_location_banner
					,'location_number' => $this->v_location_number
					,'location_phone' => $this->v_location_phone
					,'location_fax' => $this->v_location_fax
					,'address_unit' => $this->v_address_unit
					,'address_line_1' => $this->v_address_line_1
					,'address_line_2' => $this->v_address_line_2
					,'address_line_3' => $this->v_address_line_3
					,'address_city' => $this->v_address_city
					,'address_province' => $this->v_address_province
					,'address_postal' => $this->v_address_postal
					,'address_country' => $this->v_address_country
                    ,'shipped_address_unit' => $this->v_shipped_address_unit
                    ,'shipped_address_line_1' => $this->v_shipped_address_line_1
                    ,'shipped_address_line_2' => $this->v_shipped_address_line_2
                    ,'shipped_address_line_3' => $this->v_shipped_address_line_3
                    ,'shipped_address_city' => $this->v_shipped_address_city
                    ,'shipped_address_province' => $this->v_shipped_address_province
                    ,'shipped_address_postal' => $this->v_shipped_address_postal
                    ,'shipped_address_country' => $this->v_shipped_address_country
					,'approved_contact' => $this->v_approved_contact
					,'open_date' => $this->v_open_date
					,'close_date' => $this->v_close_date
					,'status' => $this->v_status);
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
	 *       SELECT * FROM `tb_location` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_location($db)
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
			$this->v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
			$this->v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
			$this->v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
			$this->v_location_type = isset($arr['location_type'])?$arr['location_type']:0;
			$this->v_location_region = isset($arr['location_region'])?$arr['location_region']:'0';
			$this->v_location_banner = isset($arr['location_banner'])?$arr['location_banner']:'';
			$this->v_location_number = isset($arr['location_number'])?$arr['location_number']:'';
			$this->v_main_contact = isset($arr['main_contact'])?$arr['main_contact']:0;
			$this->v_approved_contact = isset($arr['approved_contact'])?$arr['approved_contact']:0;
			$this->v_location_phone = isset($arr['location_phone'])?$arr['location_phone']:'';
			$this->v_location_fax = isset($arr['location_fax'])?$arr['location_fax']:'';
            $this->v_flag_shipped_address= isset($arr['flag_shipped_address'])?$arr['flag_shipped_address']:0;
			$this->v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
			$this->v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
			$this->v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
			$this->v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
			$this->v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
			$this->v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
			$this->v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
			$this->v_address_country = isset($arr['address_country'])?$arr['address_country']:15;
            $this->v_shipped_address_unit = isset($arr['shipped_address_unit'])?$arr['shipped_address_unit']:'';
            $this->v_shipped_address_line_1 = isset($arr['shipped_address_line_1'])?$arr['shipped_address_line_1']:'';
            $this->v_shipped_address_line_2 = isset($arr['shipped_address_line_2'])?$arr['shipped_address_line_2']:'';
            $this->v_shipped_address_line_3 = isset($arr['shipped_address_line_3'])?$arr['shipped_address_line_3']:'';
            $this->v_shipped_address_city = isset($arr['shipped_address_city'])?$arr['shipped_address_city']:'';
            $this->v_shipped_address_province = isset($arr['shipped_address_province'])?$arr['shipped_address_province']:'';
            $this->v_shipped_address_postal = isset($arr['shipped_address_postal'])?$arr['shipped_address_postal']:'';
            $this->v_shipped_address_country = isset($arr['shipped_address_country'])?$arr['shipped_address_country']:15;

			$this->v_open_date = isset($arr['open_date'])?$arr['open_date']:(new MongoDate(time()));
			$this->v_close_date = isset($arr['close_date'])?$arr['close_date']:NULL;
			$this->v_status = isset($arr['status'])?$arr['status']:0;
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
	 * SELECT `location_id` FROM `tb_location` WHERE `user_id`=2 ORDER BY `user_email` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_location($db)
	 * 		 $cls->select_scalar('location_id',array('user_id'=>2), array('user_email'=>-1))
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
	 *   SELECT `location_id` FROM `tb_location` WHERE `user_id`=2 ORDER BY `location_id` DESC LIMIT 0,1
	 * 		 $cls = new cls_tb_location($db)
	 * 		 $cls->select_next('location_id',array('user_id'=>2), array('location_id'=>-1))
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
	 * 		 $cls = new cls_tb_location($db)
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
     * @param array $arr_order
     * @return MongoCursor
     */
    public function select( array $arr_where = array(), array $arr_order = array()){
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
	 * 		 $cls = new cls_tb_location($db)
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

			$arr = array('$set' => array('location_id' => $this->v_location_id,'company_id' => $this->v_company_id,'location_name'=>$this->v_location_name,'location_type' => $this->v_location_type,'location_region' => $this->v_location_region,'location_banner'=> $this->v_location_banner,'location_number' => $this->v_location_number,'address_unit' => $this->v_address_unit,'address_line_1' => $this->v_address_line_1,'address_line_2' => $this->v_address_line_2,'address_line_3' => $this->v_address_line_3,'address_city' => $this->v_address_city,'address_province' => $this->v_address_province,'address_postal' => $this->v_address_postal,'address_country' => $this->v_address_country,'flag_shipped_address'=>$this->v_flag_shipped_address,'shipped_address_unit' => $this->v_shipped_address_unit,'shipped_address_line_1' => $this->v_shipped_address_line_1,'shipped_address_line_2' => $this->v_shipped_address_line_2,'shipped_address_line_3' => $this->v_shipped_address_line_3,'shipped_address_city' => $this->v_shipped_address_city,'shipped_address_province' => $this->v_shipped_address_province,'shipped_address_postal' => $this->v_shipped_address_postal,'shipped_address_country' => $this->v_shipped_address_country,'open_date' => $this->v_open_date,'close_date' => $this->v_close_date,'status' => $this->v_status, 'location_phone'=>$this->v_location_phone, 'location_fax'=>$this->v_location_fax, 'approved_contact'=>$this->v_approved_contact));
		else
			$arr = array('$set' => array('company_id' => $this->v_company_id,'location_name'=>$this->v_location_name,'location_type' => $this->v_location_type,'location_region' => $this->v_location_region,'location_number' => $this->v_location_number,'location_banner'=> $this->v_location_banner ,'address_unit' => $this->v_address_unit,'address_line_1' => $this->v_address_line_1,'address_line_2' => $this->v_address_line_2,'address_line_3' => $this->v_address_line_3,'address_city' => $this->v_address_city,'address_province' => $this->v_address_province,'address_postal' => $this->v_address_postal,'address_country' => $this->v_address_country,'flag_shipped_address'=>$this->v_flag_shipped_address,'shipped_address_unit' => $this->v_shipped_address_unit,'shipped_address_line_1' => $this->v_shipped_address_line_1,'shipped_address_line_2' => $this->v_shipped_address_line_2,'shipped_address_line_3' => $this->v_shipped_address_line_3,'shipped_address_city' => $this->v_shipped_address_city,'shipped_address_province' => $this->v_shipped_address_province,'shipped_address_postal' => $this->v_shipped_address_postal,'shipped_address_country' => $this->v_shipped_address_country,'open_date' => $this->v_open_date,'close_date' => $this->v_close_date,'status' => $this->v_status, 'location_phone'=>$this->v_location_phone, 'location_fax'=>$this->v_location_fax, 'approved_contact'=>$this->v_approved_contact));

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
}
?>