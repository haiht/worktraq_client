<?php
if(!isset($v_sval)) die();
?>
<?php
$v_product_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_product_id, 'int');
$v_company_id = $cls_tb_product->select_scalar('company_id', array('product_id'=>$v_product_id));
$v_location_id = $cls_tb_product->select_scalar('location_id', array('product_id'=>$v_product_id));
add_class('cls_tb_product_images');
add_class('clsupload');
$cls_product_image = new cls_tb_product_images($db, LOG_DIR);
$cls_upload = new clsupload;

$v_company_dir = PRODUCT_IMAGE_DIR;
if($v_company_id>0){
    $v_company_code = $cls_tb_company->select_scalar('company_code', array('company_id'=>$v_company_id));

    if($v_company_code!=''){
        if(file_exists($v_company_dir.DS.$v_company_code) || @mkdir($v_company_dir.DS.$v_company_code)){
            $v_company_dir .= '/'.$v_company_code;
            if(file_exists($v_company_dir.DS.'products') || @mkdir($v_company_dir.DS.'products')){
                $v_company_dir .= '/'.'products';
            }
        }
        if(file_exists($v_company_dir.DS.$v_product_id) || @mkdir($v_company_dir.DS.$v_product_id)){
            $v_company_dir .= '/'.$v_product_id;
        }
        $v_company_dir .= '/';

    }
}
$v_upload_dir = str_replace(ROOT_DIR.DS,'', $v_company_dir);
$v_uploadPath = $v_upload_dir.DS;
$cls_upload->set_destination_dir($v_upload_dir);
$cls_upload->set_field_name('txt_file_name');
$v_allowExt = array('jpg', 'png');
$v_maxFileSize = PRODUCT_UPLOAD_SIZE;
$cls_upload->set_allow_array_extension($v_allowExt);

$v_file_name = $_FILES['txt_file_name']['name'];


$cls_upload->set_max_size($v_maxFileSize);
$v_new_name = checkFilename($v_file_name,0, $v_uploadPath);
$cls_upload->set_new_filename($v_new_name);
$cls_upload->upload_process();
if($cls_upload->get_error_number()==0){
    $v_product_images_id = $cls_product_image->select_next('product_images_id');
    list($width, $height) = getimagesize($cls_upload->get_full_path());
    $v_size = filesize($cls_upload->get_full_path());
    $v_fileName = $v_new_name;
    $v_tmp_width = isset($width)?$width:0;
    $v_tmp_height = isset($height)?$height:0;
    $cls_product_image->set_company_id($v_company_id);
    $cls_product_image->set_location_id($v_location_id);
    $cls_product_image->set_image_size($v_size);
    $cls_product_image->set_image_height(isset($height)?$height:0);
    $cls_product_image->set_image_width(isset($width)?$width:0);
    $cls_product_image->set_product_id($v_product_id);
    $cls_product_image->set_product_images_id($v_product_images_id);
    $cls_product_image->set_product_image($v_new_name);
    $cls_product_image->set_saved_dir($v_upload_dir);
    $cls_product_image->set_low_res_image($v_new_name);
    $cls_product_image->set_date_created(date('Y-m-d H:i:s', time()));
    $cls_product_image->set_user_name($arr_user['user_name']);
    $cls_product_image->set_user_type($arr_user['user_type']);
    $cls_product_image->set_map_content(array());
    $cls_product_image->set_status(0);
    $v_low_res_image = $v_new_name;
    for($i=0; $i<count($arr_product_image_size); $i++){
        $v_width = $arr_product_image_size[$i];
        if($v_tmp_width >0 && $v_width < $v_tmp_width){
            //images_resize_by_width($v_width, $v_uploadPath.$v_fileName,$v_uploadPath.$v_width.'_'.$v_fileName );

            $v_ratio = $v_width/$v_tmp_width;
            $v_height = (int) $v_tmp_height*$v_ratio;
            create_thumb($v_uploadPath.$v_new_name,$v_uploadPath,$v_width,$v_width, $v_height, $v_tmp_width, $v_tmp_height);
            if($v_width==PRODUCT_IMAGE_ICON) $v_low_res_image = PRODUCT_IMAGE_ICON.'_'.$v_new_name;
        }

    }
    $cls_product_image->set_low_res_image($v_low_res_image);
    $cls_product_image->insert();
    $arr_ret = array('error'=>0, 'name'=>$v_file_name, 'size'=>$v_size, 'thumb'=>$v_upload_dir.$v_low_res_image, 'message'=>'Success', 'receive'=>$v_product_images_id);
}else{
    $arr_ret = array('error'=>$cls_upload->get_error_number(), 'name'=>$v_file_name, 'size'=>0, 'thumb'=>'', 'message'=>$cls_upload->get_error_message(), 'receive'=>0);
}
$v_str = json_encode($arr_ret);
/*
$fp = fopen('xem.txt', 'w');
fwrite($fp, $v_str, strlen($v_str));
fclose($fp);
*/
die($v_str);
function get_value_uri($uri, $key){
    $find = $key.'=';
    $v_pos = strpos($uri, $find);
    $v_p = $v_pos;
    if($v_pos!==false){
        $v_pos += strlen($find);
        $v_tmp = substr($uri,$v_pos);
        $v_pos = strpos($v_tmp,'&');
        if($v_pos>0){
            return substr($v_tmp,0,$v_pos);
        }else{
            return $v_tmp;
        }
    }else return '';
}

function checkFilename($fileName, $size, $p_upload_dir)
{
    global $v_allowExt, $v_maxFileSize;
    $v_uploadPath = $p_upload_dir;
    if(strrpos($v_uploadPath, '/')!==strlen($v_uploadPath)-1) $v_uploadPath.='/';
    //------------------max file size check from js
    $maxsize_regex = preg_match("/^(?'size'[\\d]+)(?'rang'[a-z]{0,1})$/i", $v_maxFileSize, $match);
    $maxSize=4*1024*1024;//default 4 M
    if($maxsize_regex && is_numeric($match['size']))
    {
        switch (strtoupper($match['rang']))//1024 or 1000??
        {
            case 'K': $maxSize = $match[1]*1024; break;
            case 'M': $maxSize = $match[1]*1024*1024; break;
            case 'G': $maxSize = $match[1]*1024*1024*1024; break;
            case 'T': $maxSize = $match[1]*1024*1024*1024*1024; break;
            default: $maxSize = $match[1];//default 4 M
        }
    }

    if(!empty($v_maxFileSize) && $size>$maxSize)
    {
        //echo json_encode(array('name'=>$fileName, 'size'=>$size, 'status'=>'error', 'info'=>'File size not allowed.'));
        return 'B1';
    }
    //-----------------End max file size check


    //comment if not using windows web server
    $windowsReserved	= array('CON', 'PRN', 'AUX', 'NUL','COM1', 'COM2', 'COM3', 'COM4', 'COM5', 'COM6', 'COM7', 'COM8', 'COM9',
        'LPT1', 'LPT2', 'LPT3', 'LPT4', 'LPT5', 'LPT6', 'LPT7', 'LPT8', 'LPT9');
    $badWinChars		= array_merge(array_map('chr', range(0,31)), array("<", ">", ":", '"', "/", "\\", "|", "?", "*"));

    $fileName	= str_replace($badWinChars, '', $fileName);
    $v_pos = strrpos($fileName,'.');
    $fileExt	= substr($fileName, $v_pos+1);
    $fileBase = str_replace('.'.$fileExt,'', $fileName);

    //check if legal windows file name
    if(in_array($fileName, $windowsReserved))
    {
        //echo json_encode(array('name'=>$fileName, 'size'=>0, 'status'=>'error', 'info'=>'File name not allowed. Windows reserverd.'));
        return 'B2';
    }

    //check if is allowed extension
    if(!in_array($fileExt, $v_allowExt) && count($v_allowExt))
    {
        //echo json_encode(array('name'=>$fileName, 'size'=>0, 'status'=>'error', 'info'=>"Extension [$fileExt] not allowed."));
        return 'B3'.$fileExt.'['.$fileName.']';
    }

    $fullPath = $v_uploadPath.$fileName;
    $v_return_file = $fileName;
    $c = 0;
    while(file_exists($fullPath))
    {
        $c++;
        $fileName	= $fileBase."($c).".$fileExt;
        $fullPath 	= $v_uploadPath.$fileName;
        $v_return_file = $fileName;
    }
    return $v_return_file;
}

?>