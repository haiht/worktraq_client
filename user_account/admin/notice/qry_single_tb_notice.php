<?php if(!isset($v_sval)) die();?>
<?php
$v_error_message = '';
$v_mongo_id = NULL;
$v_notice_id = 0;
$v_title = 'title notice';
$v_notice_company = 0;
$v_date_closed = date('d-M-Y',time()+ 8*24*60*60);
$v_description = '';
$v_user_created = get_unserialize_user('user_name');
$v_date_opened = date('d-M-Y');
$rss_check = array();
add_class('cls_tb_company');
$cls_tb_company = new cls_tb_company($db);
$rss_company = $cls_tb_company->select_all();

if(isset($_POST['btn_submit_tb_notice']))
{
	$v_mongo_id = isset($_POST['txt_mongo_id'])?$_POST['txt_mongo_id']:NULL;
	if(trim($v_mongo_id)!='') $v_mongo_id = new MongoID($v_mongo_id); else $v_mongo_id = NULL;
	$cls_tb_notice->set_mongo_id($v_mongo_id);
	$v_notice_id = isset($_POST['txt_notice_id'])?$_POST['txt_notice_id']:$v_notice_id;
	if(is_null($v_mongo_id)){
		$v_notice_id = $cls_tb_notice->select_next('notice_id');
	}
	$v_notice_id = (int) $v_notice_id;
	$cls_tb_notice->set_notice_id($v_notice_id);

	$v_title = isset($_POST['txt_title'])?$_POST['txt_title']:$v_title;
	$v_title = trim($v_title);
	if($v_title=='') $v_error_message .= '[Title] is empty!<br />';
	$cls_tb_notice->set_title($v_title);

    $arr_notice_company = isset($_POST['select_company'])?$_POST['select_company']:$v_notice_company;
    if($arr_notice_company==0)
        $v_notice_company=0;
    else
    {
        $v_notice_company='';
        $arr_notice_company = $_POST['company_id'];
        for($i=0;$i<count($arr_notice_company);$i++){
            if($i!=count($arr_notice_company)-1)
                $v_notice_company.=$arr_notice_company[$i].",";
            else
                $v_notice_company.=$arr_notice_company[$i];
        }
    }
	$v_notice_company = trim($v_notice_company);

	$cls_tb_notice->set_notice_company($v_notice_company);
	$v_date_closed = isset($_POST['txt_date_closed'])?$_POST['txt_date_closed']:$v_date_closed;
    $cls_tb_notice->set_date_closed($v_date_closed);
    $v_date_opened = isset($_POST['txt_date_opened']) ?$_POST['txt_date_opened']:$v_date_opened;
    $cls_tb_notice->set_date_opened($v_date_opened);

    $v_user_created = isset($_POST['txt_user_create']) ?$_POST['txt_user_create']:$v_user_created;
    $cls_tb_notice->set_user_create($v_user_created) ;

	$v_description = isset($_POST['txt_description'])?$_POST['txt_description']:$v_description;
	$v_description = trim($v_description);
	if($v_description=='') $v_error_message .= '[Description] is empty!<br />';
	$cls_tb_notice->set_description($v_description);

// end lay data

	if($v_error_message==''){
		if(is_null($v_mongo_id))
        {
			$v_mongo_id = $cls_tb_notice->insert();
			$v_result = is_object($v_mongo_id);
		}else
        {
			$v_result = $cls_tb_notice->update(array('_id' => $v_mongo_id));
		}

		if($v_result) redir(URL.$v_admin_key);
	}
    //die();
}else{
	$v_notice_id= isset($_GET['id'])?$_GET['id']:'0';
	settype($v_notice_id,'int');
	if($v_notice_id>0){
		$v_row = $cls_tb_notice->select_one(array('notice_id' => $v_notice_id));
		if($v_row == 1)
        {
			$v_mongo_id = $cls_tb_notice->get_mongo_id();
			$v_notice_id = $cls_tb_notice->get_notice_id();
			$v_title = $cls_tb_notice->get_title();

			$v_notice_company = $cls_tb_notice->get_notice_company();

            if($v_notice_company=='0'){
                $v_notice_company=0;
            }
            else{
                $rss_check = explode(",",$v_notice_company);
            }
			$v_date_closed = $cls_tb_notice->get_date_closed();
            $v_date_opened = $cls_tb_notice->get_date_opened();
            $v_user_create = $cls_tb_notice->get_user_create();
			$v_description = $cls_tb_notice->get_description();

		}
	}
}
?>