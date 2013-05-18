<?php
function addslash(){
	//global $_GET, $_REQUEST, $_POST;
	if (!get_magic_quotes_gpc() ){
		foreach($_GET as $key=>$val){
			if(is_array($val)){
				$_GET[$key] = array_map ('addslashes', $_GET[$key]) ;
			}else{
				$_GET[$key] = addslashes($val);
			}
		}
		
		foreach($_POST as $key=>$val){
			if(is_array($val)){
				$_POST[$key] = array_map ('addslashes', $_POST[$key]) ;
			}else{
				$_POST[$key] = addslashes($val);
			}
		}
		foreach($_COOKIE as $key=>$val){
			if(is_array($val)){
				$_COOKIE[$key] = array_map ('addslashes', $_COOKIE[$key]) ;
			}else{
				$_COOKIE[$key] = addslashes($val);
			}
		}
		foreach($_REQUEST as $key=>$val){
			if(is_array($val)){
				$_REQUEST[$key] = array_map ('addslashes', $_REQUEST[$key]) ;
			}else{
				$_REQUEST[$key] = addslashes($val);
			}
		}
	}	
}
function draw_option_type($arr_type, $p_selected, $p_start_index=0){
	$v_ret='';
	for($i=$p_start_index;$i<count($arr_type);$i++){
		$v_ret.='<option value="'.$i.'"'.($i==$p_selected?' selected="selected"':'').'">'.$arr_type[$i].'</option>';
	}
	return $v_ret;
}

function draw_option_sort_key(array $arr_fields, $p_selected_field='', $p_asc = 1){
    $v_ret = '';
    for($i=0; $i<count($arr_fields); $i++){
        $v_key_value = $arr_fields[$i];
        $v_key_text = ucwords(implode(' ',explode('_', $v_key_value)));
        $v_ret .= '<option value="'.$v_key_value.'"'.($v_key_value==$p_selected_field?' selected="selected"':'').'>'.$v_key_text.'</option>';
    }
    if($v_ret!=''){
        $v_ret = '<select id="txt_sort_by" name="txt_sort_by"><option value="" selected="selected">--- Select One ---</option>'.$v_ret.'</select>&nbsp;&nbsp;';
        $v_ret .= '<label><input type="radio" name="txt_sort_type" value="1"'.($p_asc==1?' checked="checked"':'').' /> Ascending</label> / ';
        $v_ret .= '<label><input type="radio" name="txt_sort_type" value="-1"'.($p_asc!=1?' checked="checked"':'').' /> Descending</label>';
    }
    return $v_ret;
}

function redir($p_url){
    //if(ob_get_length()>0){ 
	@ob_end_clean();
	@ob_start();
	//}
    if(isset($p_url) && $p_url!='')
		header("location:$p_url");
	else
		header("location:".URL);
}
function get_real_ip_address(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){   //check ip from share internet
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){   //to check ip is pass from proxy
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function remove_invailid_char($p_str)
{
    $p_str = trim($p_str);
    $p_str = str_replace(" ","_",$p_str);
    $p_str = str_replace('"'," &quot; ",$p_str);
    $p_str = str_replace("'"," &quot; ",$p_str);
    $tmp = "";
    for ($i=0;$i<strlen($p_str);$i++){
        $v_code = ord(substr($p_str,$i,1));
        if (($v_code>=48 && $v_code<=57) || ($v_code>=65 && $v_code<=90) || ($v_code>=97 && $v_code<=122) || ($v_code==95)){
            $tmp.=substr($p_str,$i,1);
        }
    }
    while (strpos($tmp,"__")!==false){
        $tmp = str_replace("__","_",$tmp);
    }
    return $tmp;
}

function get_select_one($array_expression,$p_display)
{
   foreach($array_expression as  $key => $value ){
        if($key==$p_display) return $value;
    }
    return "";
}
function get_select_id_one($array_expression,$p_value=1)
{

    foreach($array_expression as  $key => $value ){
       if($p_value==1) return $key;
       else return $value;
    }
    return "0";
}
function get_show_all_array($arr=array())
{
    $v_array = "";

    if(is_array($arr))
    {
        foreach($arr as  $key => $value ){
            $v_array .= $value .'<br>';
        }
    }
    return $v_array;
}
function images_resize_by_width($new_width,$source_file,$dest_file, $delete_source = false){
	list($width, $height, $type, $attr) = @getimagesize($source_file);
	if (($width*$height)==0) return false;
	if ($new_width==0) return false;
	$v_percent = $new_width / $width;
	$new_height = $height * $v_percent;
	settype($new_height, 'int');
	$im_source = false;
	switch($type){
		case 1;//Gif
			$im_source = @imagecreatefromgif($source_file);
			break;
		case 2;//Jpg
			$im_source = @imagecreatefromjpeg($source_file);
			break;
		case 3;//Png
			$im_source = @imagecreatefrompng($source_file);
			break;
		default ;
			$im_source = @imagecreatefromjpeg($source_file);
			break;
	}
	//$im_dest = @imagecreatetruecolor($new_width,$new_height);
	//$background = @imagecolorallocate($im_dest, 255, 255, 255);
	//@imagefill($im_dest,0,0,$background);
	//@imagecopyresampled ($im_dest,$im_source, 0,0,0,0,$new_width,$new_height,$width,$height);
	$im_dest = @imagecreatetruecolor($new_width,$new_height);
	if ($im_dest) $v_ok = true;
	else $v_ok = false;

	$background = @imagecolorallocate($im_dest, 255, 255, 255);
	@imagefill($im_dest,0,0,$background);
	imagecopyresized($im_dest, $im_source,0,0,0,0, $new_width, $new_height, $width, $height);
	if($delete_source) @unlink($source_file);
	@imagejpeg($im_dest,$dest_file,100);
	@imagedestroy($im_dest);
	@imagedestroy($im_source);
	return $v_ok;
}
function images_resize_by_height($new_height,$source_file,$dest_file, $delete_source = false){
    list($width, $height, $type, $attr) = @getimagesize($source_file);
    if (($width*$height)==0) return false;
    if ($new_height==0) return false;
    $v_percent = $new_height / $height;
    $new_width = $width * $v_percent;
    settype($new_width, 'int');
    $im_source = false;
    switch($type){
        case 1;//Gif
            $im_source = @imagecreatefromgif($source_file);
            break;
        case 2;//Jpg
            $im_source = @imagecreatefromjpeg($source_file);
            break;
        case 3;//Png
            $im_source = @imagecreatefrompng($source_file);
            break;
        default ;
            $im_source = @imagecreatefromjpeg($source_file);
            break;
    }
    $im_dest = @imagecreatetruecolor($new_width,$new_height);
    if ($im_dest) $v_ok = true;
    else $v_ok = false;

    $background = @imagecolorallocate($im_dest, 255, 255, 255);
    @imagefill($im_dest,0,0,$background);
    imagecopyresized($im_dest, $im_source,0,0,0,0, $new_width, $new_height, $width, $height);
    if($delete_source) @unlink($source_file);
    @imagejpeg($im_dest,$dest_file,100);
    @imagedestroy($im_dest);
    @imagedestroy($im_source);
    return $v_ok;
}

function news_pagination($page_count, $cur_page, $link, $limit=4, $end=".html", $split=""){
    $v_url = $link;
    if(substr($v_url,strlen($v_url),1)!='/') $v_url.='/';
    $current_range = array(($cur_page-2 < 1 ? 1 : $cur_page-2), ($cur_page+2 > $page_count ? $page_count : $cur_page+2));

    $first_page = $cur_page > 3 ? '<li> <a title="Page 1" href="'.$v_url.'page1'.$end.'">1</a></li> '.($cur_page < $limit+1 ? "{$split} " : ' <a href="#">...</a> ') : null;
    $last_page = $cur_page < $page_count-2 ? ($cur_page > $page_count-$limit ? "{$split} " : ' <li><a href="#">...</a></a> </li> ').'<li> <a title="Page '.$page_count.'" href="'.$v_url."page{$page_count}".$end.'">'.(($page_count<10)?"{$page_count}":$page_count).'</a></li>' : null;

    $previous_page = $cur_page > 1 ? '<li class="previous-off"> <a title="Page '.($cur_page-1).'" href="'.$v_url.'page'.($cur_page-1).$end.'">« Previous</a>' : null .'</li>' ;
    $next_page = $cur_page < $page_count ? ' <a title="Page '.($cur_page+1).'" href="'.$v_url.'page'.($cur_page+1).$end.'"> Next » </a>' : null;

    // Display pages that are in range
    for ($x=$current_range[0];$x <= $current_range[1]; ++$x){
        if($x==$cur_page)
            $pages[] = '<li class="active">'.$x.'</li>';
        else
            $pages[] = '<li> <a title="Page '.($x).'" href="'.$v_url.'page'.$x.$end.'">'.$x.'</a></li>';
    }

    if ($page_count > 1)
        return '<ul id="pagination"> '.$previous_page.$first_page.(is_array($pages)?implode("{$split} ", $pages):"").$last_page.$next_page.'</ul>';
    else
        return "";
}

function pagination($page_count, $cur_page, $link, $limit=4, $end="", $split=""){
    $v_url = $link;
    if(substr($v_url,strlen($v_url),1)!='/') $v_url.='/';
    //$v_url.='page';
    $current_range = array(($cur_page-2 < 1 ? 1 : $cur_page-2), ($cur_page+2 > $page_count ? $page_count : $cur_page+2));

    // First and Last pages
    $first_page = $cur_page > 3 ? '<li><a title="Page 1" href="'.$v_url.'page1'.$end.'">1</a></li>'.($cur_page < $limit+1 ? "{$split} " : '<li class="current">...</li>') : null;
    $last_page = $cur_page < $page_count-2 ? ($cur_page > $page_count-$limit ? "{$split} " : ' <li class="current">...</li> ').
        '<li><a title="Page '.$page_count.'" href="'.$v_url."page{$page_count}".$end.'">'.(($page_count<10)?"{$page_count}":$page_count).'</a></li>' : null;

    // Previous and next page
    $previous_page = $cur_page > 1 ? '<li><a title="Page '.($cur_page-1).'" href="'.$v_url.'page'.($cur_page-1).$end.'">&lt;</a></li>' : null;
    $next_page = $cur_page < $page_count ? '<li><a title="Page '.($cur_page+1).'" href="'.$v_url.'page'.($cur_page+1).$end.'">&gt;</a></li>' : null;

    // Display pages that are in range
    for ($x=$current_range[0];$x <= $current_range[1]; ++$x){
        if($x==$cur_page)
            $pages[] = '<li class="current">'.$x.'</li>';
        else
            $pages[] = '<li><a title="Page '.($x).'" href="'.$v_url.'page'.$x.$end.'">'.$x.'</a></li>';
    }

    if ($page_count > 1)
        return '<div class="paging"><ul>'.$previous_page.$first_page.(is_array($pages)?implode("{$split} ", $pages):"").$last_page.$next_page.'</ul></div>';
    else
        return "";
}
function is_admin()
{
    global $arr_user;
    if($arr_user['user_type']==0) return true;
    else return false;
}
function check_permission($p_permission, $p_user_rule,$p_title="")
{
    if(is_admin()) return true;
    else{
        if($p_user_rule=='') return false;
        if(strpos($p_permission,$p_user_rule)!==false) return true;
    }
    return false;
}
function cut_str($p_str,$p_start,$p_end){

    if ($p_start!=""){
        $v_start_post = strpos($p_str,$p_start);
        if ($v_start_post===false) return "";
        $p_str = substr($p_str,$v_start_post+strlen($p_start));
        if ($p_end=="") return $p_str;
        $v_end_post = strpos($p_str,$p_end);
        if ($v_end_post===false) return "";
        $p_str = substr($p_str,0,$v_end_post);
        return $p_str;
    }else{
        if ($p_end!=""){
            $v_end_post = strpos($p_str,$p_end);
            if ($v_end_post===false) return "";
            $p_str = substr($p_str,0,$v_end_post);
            return $p_str;
        }else{
            return "";
        }
    }
}
function cutString ($p_string, $p_separate){
    if(strlen(trim($p_string))==0){
        return false;
    }
    elseif(strpos($p_string, $p_separate)===false){
        return $p_string;
    }
    else{
        $v_separateLen = strlen($p_separate);
        $v_separatePos = strpos($p_string, $p_separate);

        if($v_separatePos === false || $v_separateLen ==0){
            $part[0] = $p_string;
            $part[1] = '';
        }
        else{
            $part[0] = substr($p_string, 0, $v_separatePos);
            $part[1] = substr($p_string, $v_separatePos + $v_separateLen);
        }
        return $part;
    }
}

function rewriteUrl(){
    $self = $_SERVER['PHP_SELF'];
    $stringParams = substr($self,strpos($self,'.php')+5);
    $arrayParams = explode('/', $stringParams);
    foreach ($arrayParams as $param){
        $aItem = cutString($param, '-');
        $_GET[$aItem[0]] = $aItem[1];
    }
}

function send_mail(PHPMailer $mail, $p_from_name, $p_from_mail, $arr_to_mail, $p_mail_subject, $p_mail_body){
    global $db;
    $mail->IsSMTP();                           // tell the class to use SMTP
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Port       = 25;
    $mail->IsSendmail();  // tell the class to use Sendmail
    $mail->FromName = $p_from_name;
    $mail->From     = $p_from_mail;
    add_class('cls_tb_global');
    $cls_tb_global = new cls_tb_global($db);
    //$v_send = false;
    //$v_result = 0;
    try{
        $v_add_content = '';
        $v_website_testing = false;
        if($cls_tb_global->select_scalar('setting_key',array('global_key'=> 'website_testing'))=='enable')
            $v_website_testing =true;

        if($v_website_testing==true)
        {
            $v_add_content .='<br> Email receviced :<br>';

            for($i=0;$i<count($arr_to_mail);$i++){
                if(filter_var($arr_to_mail[$i],FILTER_VALIDATE_EMAIL)){
                    $v_add_content .= $i .'---'. $arr_to_mail[$i] .'<br>';
                }
            }
            add_class('cls_settings');
            $cls_settings = new cls_settings($db);
            $v_email_testing = $cls_settings->get_option_name_by_key('email','email_testing');
            $arr_to_mail = explode(';',$v_email_testing);
            for($i=0;$i<count($arr_to_mail);$i++){
                if(filter_var($arr_to_mail[$i],FILTER_VALIDATE_EMAIL)){
                    $mail->AddAddress($arr_to_mail[$i]);
               }
            }
        }
        else
        {
            for($i=0; $i<count($arr_to_mail); $i++){
                if(filter_var($arr_to_mail[$i],FILTER_VALIDATE_EMAIL))
                    $mail->AddAddress($arr_to_mail[$i]);
            }
        }

        $mail->IsHTML(true);
        $mail->Subject  = $p_mail_subject;
        $mail->Body     = $p_mail_body .$v_add_content;
        return $mail->Send();
    }catch(phpmailerException $p){
        return false;
    }
}

function check_rule_approve($p_order_location_id, array $arr_user){
    if($p_order_location_id==$arr_user['location_default']) return true;
    $v_found = false;
    $arr_location = $arr_user['location_approve'];
    for($i=0; $i<count($arr_location) && !$v_found;$i++){
        if($arr_location[$i]==$p_order_location_id){
            $v_found = true;
        }
    }
    return $v_found;
}
function add_class($p_class_name,$p_class_file="")
{
    if($p_class_file=="") $v_tmp_class_name = $p_class_name .'.php';
    else $v_tmp_class_name = $p_class_file;
    if(!class_exists($p_class_name)){
        if(file_exists('classes/'.$v_tmp_class_name))
            require 'classes/'.$v_tmp_class_name;
        else
        {
           die('Can not require class '. $p_class_name. ' check dir (' .'classes/'.$v_tmp_class_name  .')' );

        }
    }
}
function highlight_text($v_highlight_text , $_text,$v_color_code="#FFFF00"){
    $v_str = str_replace($v_highlight_text,'<span class="highlight" >'. $v_highlight_text .'</span>' ,$_text);
    return $v_str;
}

function create_thumb($p_file_path, $p_thumb_path, $p_pos_tfix, $p_new_width, $p_new_height, $p_old_width, $p_old_height, $p_quality=75)
{

    $gd_formats	= array('jpg','jpeg','png','gif');//web formats
    $file_name	= pathinfo($p_file_path);
    if(empty($p_format)) $p_format = $file_name['extension'];

    if(!in_array(strtolower($file_name['extension']), $gd_formats))
    {
        return false;
    }

    $thumb_name	= $p_pos_tfix.'_'. $file_name['filename'].'.'.$p_format;


    // Get new dimensions
    $newW	= $p_new_width;
    $newH	= $p_new_height;

    // Resample
    $thumb = imagecreatetruecolor($newW, $newH);
    $image = imagecreatefromstring(file_get_contents($p_file_path));

    imagecopyresampled($thumb, $image, 0, 0, 0, 0, $newW, $newH, $p_old_width, $p_old_height);
	
    // Output
    switch (strtolower($p_format)) {
        case 'png':
            imagepng($thumb, $p_thumb_path.$thumb_name, 9);
            break;

        case 'gif':
            imagegif($thumb, $p_thumb_path.$thumb_name);
            break;

        default:
            imagejpeg($thumb, $p_thumb_path.$thumb_name, $p_quality);
            break;
    }
    imagedestroy($image);
    imagedestroy($thumb);
}

function pad_left($p_str, $p_len = 0, $p_char=' '){
    $v_str = trim($p_str);
    if($p_len>0){
        $v_count = $p_len - strlen($v_str);
        if($v_count > 0){
            for($i=0;$i<$v_count;$i++){
                $v_str = $p_char.$v_str;
            }
        }
    }
    return $v_str;
}

function record_sort($arr_array, $p_field, $p_reverse=false){
    $arr_hash = array();
    foreach($arr_array as $arr){
        $arr_hash[$arr[$p_field]] = $arr;
    }
    ($p_reverse)? krsort($arr_hash) : ksort($arr_hash);
    $arr_return = array();
    foreach($arr_hash as $arr){
        $arr_return []= $arr;
    }
    return $arr_return;
}
/**
 * @param cls_tb_product $cls_product
 * @param cls_tb_location_group_threshold $cls_threshold
 * @param cls_tb_product_group $cls_group
 * @param array $arr_items
 * @return array
 */

//function check_product_group_threshold(cls_tb_product $cls_product, cls_tb_location_group_threshold $cls_threshold, cls_tb_product_group $cls_group, $arr_items){
//    return array(1,'');
//}

function check_product_group_threshold(cls_tb_product $cls_product, cls_tb_location_group_threshold $cls_threshold, cls_tb_product_group $cls_group, $arr_items){
    $arr_group = array();
    $arr_location = array();
    try{
        foreach($arr_items as $arr){
            $v_product_id = $arr['product_id'];
            $v_product_sku = $cls_product->select_scalar('product_sku', array('product_id'=>$v_product_id));
            $arr_allocation = $arr['allocation'];
            $v_group_id = $cls_product->select_scalar('product_threshold_group_id', array('product_id'=>$v_product_id));
            if(is_null($v_group_id)) $v_group_id = 0;
            if($v_group_id>0){
                if(!isset($arr_group[$v_group_id])){
                    $arr_group[$v_group_id] = $cls_group->select_scalar('product_group_name', array('product_group_id'=>$v_group_id));
                }
                for($i=0; $i<count($arr_allocation); $i++){
                    $v_location_id = $arr_allocation[$i]['location_id'];
                    $v_location_name = $arr_allocation[$i]['location_name'];
                    $v_location_quantity = $arr_allocation[$i]['location_quantity'];
                    if($v_location_quantity>0){
                        $v_row = $cls_threshold->select_one(array('location_id'=>$v_location_id, 'group_id'=>$v_group_id));
                        if($v_row==1){
                            if(!isset($arr_location[$v_location_id][$v_group_id])){
                                $arr_location[$v_location_id][$v_group_id]['name'] = $v_location_name;
                                $arr_location[$v_location_id][$v_group_id]['overflow'] = $cls_threshold->get_overflow();
                                $arr_location[$v_location_id][$v_group_id]['value'] = $cls_threshold->get_threshold_value();
                                $arr_location[$v_location_id][$v_group_id]['group'] = $arr_group[$v_group_id];
                                $arr_location[$v_location_id][$v_group_id]['total'] = 0;
                                $arr_location[$v_location_id][$v_group_id]['detail'] = array();
                            }
                            $v_count = count($arr_location[$v_location_id][$v_group_id]['detail']);
                            $arr_location[$v_location_id][$v_group_id]['detail'][$v_count] = array(
                                'product_id'=>$v_product_id
                                ,'product_sku'=>$v_product_sku
                                ,'quantity'=>$v_location_quantity
                            );
                            $v_total = $arr_location[$v_location_id][$v_group_id]['total'] + $v_location_quantity;
                            $arr_location[$v_location_id][$v_group_id]['total'] = $v_total;
                        }
                    }
                }
            }
        }
    }catch(Exception $e){

    }

    $v_summary_info = '';
    $v_allow = 1;
    foreach($arr_location as $v_location_id=>$arr_gr){
        foreach($arr_gr as $v_group_id=>$arr){
            if($arr['total']>$arr['value']){
                $arr_detail = $arr['detail'];
                //$v_summary_info .= '*Over threshold product\'s group: "'.$arr['group'].'" in location: "'.$arr['name'].'" - allow: '.$arr['value'].' - current: '.$arr['total'].' - result: @ACCEPT';
                $v_summary_info .= '*Allocation of '.$arr['total'].' '.$arr['group'].' to '.$arr['name'].' is more than quantity allowed ('.$arr['value'].')';
                /*
                for($i=0; $i<count($arr_detail);$i++){
                    if($i==0) $v_summary_info.=' [';
                    $v_summary_info.=' - Product: "'.$arr_detail[$i]['product_sku'].'" has amount: '.$arr_detail[$i]['quantity'];
                    if($i==count($arr_detail)-1) $v_summary_info.=']';
                }
                if($arr['overflow']){
                    $v_summary_info = str_replace('@ACCEPT','accepted', $v_summary_info);
                }else{
                    $v_summary_info = str_replace('@ACCEPT','Not accepted', $v_summary_info);
                    if($v_allow==1) $v_allow = 0;
                }
                */
            }
        }
    }
    return array($v_allow, $v_summary_info);
}

?>