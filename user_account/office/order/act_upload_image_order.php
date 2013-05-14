<?php
if(!isset($v_sval)) die();
?>
<?php
$v_product_id = isset($_SESSION['ss_upload_image_product'])?$_SESSION['ss_upload_image_product']:'0';
settype($v_product_id, 'int');

add_class('cls_tb_company');
add_class('cls_tb_product');
add_class('cls_tb_product_images');

$cls_product_image = new cls_tb_product_images($db, LOG_DIR);
$cls_company = new cls_tb_company($db, LOG_DIR);
$cls_product = new cls_tb_product($db, LOG_DIR);

//$v_company_id = $cls_tb_product->select_scalar('company_id', array('product_id'=>$v_product_id));
//$v_location_id = $cls_tb_product->select_scalar('location_id', array('product_id'=>$v_product_id));
$v_company_id = isset($_SESSION['company_id'])?$_SESSION['company_id']:'0';
$v_location_id = isset($_SESSION['location_id'])?$_SESSION['location_id']:'0';
settype($v_company_id, 'int');
settype($v_location_id, 'int');
//$v_company_code = $cls_company->select_scalar('company_code', array('company_id'=>(int) $v_company_id));

$v_uri = urldecode($_SERVER['REQUEST_URI']);

$v_str = $v_uri."\r\n";
$v_uploadPath = get_value_uri($v_uri,'ax-file-path');
$v_fileName	= get_value_uri($v_uri,'ax-file-name');
$v_currByte	= get_value_uri($v_uri,'ax-start-byte');
$v_maxFileSize = get_value_uri($v_uri,'ax-maxFileSize');
$v_html5fsize = get_value_uri($v_uri,'ax-fileSize');
$v_allowExt	= get_value_uri($v_uri,'ax-allow-ext');
$v_isLast = get_value_uri($v_uri,'isLast');
//$v_isLast = $v_isLast=='true'?true:false;

$v_allowExt = $v_allowExt==''?array():explode('|', $v_allowExt);

$v_uploadPath = 'resources/'.$v_company_code.'/products/'.$v_product_id.'/';

if(isset($_FILES['ax-files']))
{
    //for eahc theorically runs only 1 time, since i upload i file per time
    foreach ($_FILES['ax-files']['error'] as $key => $error)
    {
        if ($error == UPLOAD_ERR_OK)
        {
            $newName = !empty($fileName)? $fileName:$_FILES['ax-files']['name'][$key];
            $fullPath = checkFilename($newName, $_FILES['ax-files']['size'][$key]);

            if($fullPath)
            {

                move_uploaded_file($_FILES['ax-files']['tmp_name'][$key], $fullPath);
                //if(!empty($thumbWidth) || !empty($thumbHeight))
                //createThumbGD($fullPath, $thumbPath, $thumbPostfix, $thumbWidth, $thumbHeight, $thumbFormat);
                $v_product_images_id = 0;

                $v_product_images_id = $cls_product_image->select_next('product_images_id');
                list($width, $height) = getimagesize($fullPath);
                $v_size = filesize($fullPath);
                $v_fileName = $newName;
                $v_tmp_width = isset($width)?$width:0;
                $cls_product_image->set_company_id($v_company_id);
                $cls_product_image->set_location_id($v_location_id);
                $cls_product_image->set_image_size($v_size);
                $cls_product_image->set_image_height(isset($height)?$height:0);
                $cls_product_image->set_image_width(isset($width)?$width:0);
                $cls_product_image->set_product_id($v_product_id);
                $cls_product_image->set_image_type(1);
                $cls_product_image->set_product_images_id($v_product_images_id);
                $cls_product_image->set_product_image($v_fileName);
                $cls_product_image->set_saved_dir($v_uploadPath);
                $cls_product_image->set_low_res_image($v_fileName);
                $cls_product_image->set_date_created(date('Y-m-d H:i:s', time()));
                $cls_product_image->set_user_name($arr_user['user_name']);
                $cls_product_image->set_user_type($arr_user['user_type']);
                $cls_product_image->set_map_content(array());
                $cls_product_image->set_status(0);
                $v_low_res_image = $v_fileName;
                for($i=0; $i<count($arr_product_image_size); $i++){
                //    $v_width = $arr_product_image_size[$i];
                //    if($v_tmp_width >0 && $v_width < $v_tmp_width){
                //        images_resize_by_width($v_width, $v_uploadPath.$v_fileName,$v_uploadPath.$v_width.'_'.$v_fileName );
                //        if($v_width==PRODUCT_IMAGE_ICON) $v_low_res_image = PRODUCT_IMAGE_ICON.'_'.$v_fileName;
                //    }

                }
                $cls_product_image->set_low_res_image($v_low_res_image);

                $cls_product_image->insert();
                echo json_encode(array('name'=>basename($fullPath), 'size'=>filesize($fullPath), 'status'=>'uploaded', 'info'=>'File uploaded', 'received'=>$v_product_images_id));
            }
        }
        else
        {
            echo json_encode(array('name'=>basename($_FILES['ax-files']['name'][$key]), 'size'=>$_FILES['ax-files']['size'][$key], 'status'=>'error', 'info'=>$error, 'received'=>0));
        }
    }
}
//elseif(isset($_REQUEST['ax-file-name']))
else if($v_fileName!='')
{
    //check only the first peice
    $v_fileName = 'customer_'.session_id().substr($v_fileName, strrpos($v_fileName,'.'));
    $fullPath = ($v_currByte!=0) ? $v_uploadPath.$v_fileName:checkFilename($v_fileName, $v_html5fsize);

    if($fullPath)
    {
        $flag			= ($v_currByte==0) ? 0:FILE_APPEND;
        $receivedBytes	= file_get_contents('php://input');
        //strange bug on very fast connections like localhost, some times cant write on file
        //TODO future version save parts on different files and then make join of parts
        while(@file_put_contents($fullPath, $receivedBytes, $flag) === false)
        {
            usleep(50);
        }

        if($v_isLast=='true')
        {
            list($width, $height) = getimagesize($fullPath);
            $v_size = filesize($fullPath);
            $v_tmp_width = isset($width)?$width:0;

            $v_row = $cls_product_image->select_one(array('user_name'=>$arr_user['user_name'], 'product_image'=>$v_fileName));
            if($v_row==1){
                $v_product_images_id = $cls_product_image->get_product_id();
                $v_low_res_image = $cls_product_image->get_low_res_image();
            }else{
                $v_product_images_id = $cls_product_image->select_next('product_images_id');
                $cls_product_image->set_company_id($v_company_id);
                $cls_product_image->set_location_id($v_location_id);
                $cls_product_image->set_image_size($v_size);
                $cls_product_image->set_image_height(isset($height)?$height:0);
                $cls_product_image->set_image_width(isset($width)?$width:0);
                $cls_product_image->set_product_id($v_product_id);
                $cls_product_image->set_product_images_id($v_product_images_id);
                $cls_product_image->set_product_image($v_fileName);
                $cls_product_image->set_image_type(1);
                $cls_product_image->set_saved_dir($v_uploadPath);
                $cls_product_image->set_low_res_image($v_fileName);
                $cls_product_image->set_date_created(date('Y-m-d H:i:s', time()));
                $cls_product_image->set_user_name($arr_user['user_name']);
                $cls_product_image->set_user_type($arr_user['user_type']);
                $cls_product_image->set_map_content(array());

                $cls_product_image->set_status(0);
            }
            $v_low_res_image = $v_fileName;
            $v_resize = false;
            if($width>$height){
                if($width > PRODUCT_IMAGE_ICON){
                    $v_ratio = PRODUCT_IMAGE_ICON / $width;
                    $new_width = PRODUCT_IMAGE_ICON;
                    $new_height = $height * $v_ratio;
                    $v_resize = true;
                }else{
                    $new_width = $width;
                    $new_height = $height;
                }
            }else{
                if($height > PRODUCT_IMAGE_ICON){
                    $v_ratio = PRODUCT_IMAGE_ICON / $height;
                    $new_height = PRODUCT_IMAGE_ICON;
                    $new_width = $width * $v_ratio;
                    $v_resize = true;
                }else{
                    $new_width = $width;
                    $new_height = $height;
                }
            }
            if($v_resize){
                createThumbGD($fullPath, $v_uploadPath, PRODUCT_IMAGE_ICON, $new_width, $new_height,$width, $height);
                $v_low_res_image = PRODUCT_IMAGE_ICON.'_'.$v_fileName;
            }
            $cls_product_image->set_low_res_image($v_low_res_image);
            if($v_row==0)
                $cls_product_image->insert();

            //createThumbGD($fullPath, $thumbPath, $thumbPostfix, $thumbWidth, $thumbHeight, $thumbFormat);
            /*
            $fp = fopen('xem.txt', 'w');
            $v_str = 'File: '.$v_fileName."\r\n";
            fwrite($fp, $v_str, strlen($v_str));
            fflush($fp);
            fclose($fp);
            */

        }
        echo json_encode(array('name'=>basename($fullPath), 'size'=>$v_currByte, 'status'=>'uploaded', 'info'=>'File/chunk uploaded', 'received'=>isset($v_product_images_id)?$v_product_images_id:0));
    }
}
/*
$v_str .= ob_get_contents();
$fp = fopen('xem.txt','w');
fwrite($fp, $v_str, strlen($v_str));
fflush($fp);
fclose($fp);
*/
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

function checkFilename(& $fileName, $size, $newName = '')
{
    global $v_allowExt, $v_uploadPath, $v_maxFileSize;

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
        echo json_encode(array('name'=>$fileName, 'size'=>$size, 'status'=>'error', 'info'=>'File size not allowed.'));
        return false;
    }
    //-----------------End max file size check


    //comment if not using windows web server
    $windowsReserved	= array('CON', 'PRN', 'AUX', 'NUL','COM1', 'COM2', 'COM3', 'COM4', 'COM5', 'COM6', 'COM7', 'COM8', 'COM9',
        'LPT1', 'LPT2', 'LPT3', 'LPT4', 'LPT5', 'LPT6', 'LPT7', 'LPT8', 'LPT9');
    $badWinChars		= array_merge(array_map('chr', range(0,31)), array("<", ">", ":", '"', "/", "\\", "|", "?", "*"));

    $fileName	= str_replace($badWinChars, '', $fileName);
    $fileInfo	= pathinfo($fileName);
    $fileExt	= $fileInfo['extension'];
    $fileBase	= $fileInfo['filename'];

    //check if legal windows file name
    if(in_array($fileName, $windowsReserved))
    {
        echo json_encode(array('name'=>$fileName, 'size'=>0, 'status'=>'error', 'info'=>'File name not allowed. Windows reserverd.'));
        return false;
    }

    //check if is allowed extension
    if(!in_array($fileExt, $v_allowExt) && count($v_allowExt))
    {
        echo json_encode(array('name'=>$fileName, 'size'=>0, 'status'=>'error', 'info'=>"Extension [$fileExt] not allowed."));
        return false;
    }

    $fullPath = $v_uploadPath.$fileName;
    $c=0;
    while(file_exists($fullPath))
    {
        $c++;
        //$fileName	= $fileBase."($c).".$fileExt;
        unlink($fullPath);
        $fullPath 	= $v_uploadPath.$fileName;
    }
    return $fullPath;
}
function createThumbGD($filepath, $thumbPath, $postfix, $new_width, $new_height, $old_width, $old_height, $format='jpg', $quality=75)
{

    $gd_formats	= array('jpg','jpeg','png','gif');//web formats
    $file_name	= pathinfo($filepath);
    if(empty($format)) $format = $file_name['extension'];

    if(!in_array(strtolower($file_name['extension']), $gd_formats))
    {
        return false;
    }

    $thumb_name	= $postfix.'_'. $file_name['filename'].'.'.$format;


    // Get new dimensions
    $newW	= $new_width;
    $newH	= $new_height;

    // Resample
    $thumb = imagecreatetruecolor($newW, $newH);
    $image = imagecreatefromstring(file_get_contents($filepath));

    imagecopyresampled($thumb, $image, 0, 0, 0, 0, $newW, $newH, $old_width, $old_height);

    // Output
    switch (strtolower($format)) {
        case 'png':
            imagepng($thumb, $thumbPath.$thumb_name, 9);
            break;

        case 'gif':
            imagegif($thumb, $thumbPath.$thumb_name);
            break;

        default:
            imagejpeg($thumb, $thumbPath.$thumb_name, $quality);;
            break;
    }
    imagedestroy($image);
    imagedestroy($thumb);
}
?>