<?php
function js_fancybox()
{
    $v_js_fancybox = '<script type="text/javascript" language="javascript" src="'.URL.'lib/js/fancybox/jquery.fancybox-1.3.1.js"></script>';
    $v_js_fancybox .= '<link rel="stylesheet" href="'.URL.'lib/js/fancybox/jquery.fancybox-1.3.1.css" type="text/css" media="screen" />';
    return $v_js_fancybox;
}
function js_fckeditor()
{
    $v_js_fckeditor ='<script type="text/javascript" language="javascript" src="'.URL .'lib/js/ckeditor/ckeditor.js"></script>';
    return $v_js_fckeditor;
}
function fckEditor($p_data,$p_name_input,$p_cols=80,$p_row=10)
{
    $v_input = '<textarea class="ckeditor" cols="80" id="'.$p_name_input.'" name="'.$p_name_input.'" rows="10">'. $p_data .'</textarea>';
    return $v_input;
}
function js_datetime($p_name_input, $p_date_time="")
{
    if($p_date_time=="") $p_name_input = date('Y-m-d');
    $v_input = "<script>DateInput('".$p_name_input."',true,'YYYY-MM-DD','". $p_date_time."')</script>";
    return $v_input;
}
function js_tabas()
{
    $v_tabs ='<script type="text/javascript" language="javascript" src="'.URL.'lib/js/jquery.easytabs.min.js"></script>';
    $v_tabs .= '<link rel="stylesheet" href="'.URL.'lib/css/tab.css" type="text/css" media="screen" />';
    return $v_tabs;
}
function js_hight_chart()
{
    $v_chart = '<script src="'.URL.'lib/js/highcharts/highcharts.js"></script>';
    $v_chart .= '<script src="'.URL.'lib/js/highcharts/modules/exporting.js"></script>';
    return $v_chart;
}
function js_tooltip(){
    $v_tooltip = '<script src="'.URL.'lib/js/jquery.tooltip.v.1.1.js"></script>';
    return $v_tooltip;
}
function js_sort(){
    $v_sort = '<script src="'.URL.'lib/js/sorttables.js"></script>';
    return $v_sort;
}
function js_color(){
    $v_color  = '<script src="'.URL.'lib/js/jquery.simple-color.min.js"></script>';
    return $v_color;
}
function draw_option($p_arr_select , $p_select_id)
{
    $v_count = sizeof($p_arr_select);
    $v_list_select = "";
    for($i=0;$i<$v_count;$i++)
    {
        if($i==$p_select_id)
            $v_list_select .="<option  value ='".$i."' selected >".$p_arr_select[$i] . "</option>";
        else
            $v_list_select .="<option  value ='".$i."'  >".$p_arr_select[$i] . "</option>";
    }
    return $v_list_select;
}
function get_header()
{
    return  ' <div id="ux-header">
        <div class="GlobalBar">

        </div>
        <div class="Clear"></div>
        <div class="siteLogo">
            <a title="Dev Center - Windows Store apps" href="?a=APP">
                <img src="'.URL.'images/icons/logo.png'.'" alt="">
                <span></span>
            </a>
        </div>
        <br>
    </div>';
}
function check_file($p_dir,$p_images,$p_size)
{
    if(file_exists($p_dir.DS.$p_images))
    {
        if(!file_exists($p_dir.DS.$p_size.'_'.$p_images))
        {
            images_resize_by_width($p_size,$p_dir.DS.$p_images,$p_dir.DS.$p_size.'_'.$p_images);
            return true ;
        }
        return true;
    }
    return false;
}
function format_currency($p_number)
{
    global $v_sign_money;
    setlocale(LC_MONETARY, 'en_CA');
    return $v_sign_money.money_format('%i', $p_number);
}
if(!function_exists('money_format')){
    function money_format($format='', $p_number=0){
        return number_format($p_number,2);
    }
}

function send_email_text($p_email_from , $p_email_to,$p_subject="", $p_message=""){
    require 'classes/class.phpmailer.php';
    $mail = new PHPMailer(true);

    $mail->IsSMTP();                           // tell the class to use SMTP
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Port       = 25;
    $mail->IsSendmail();  // tell the class to use Sendmail
    $mail->FromName = " WorkTraq System !...";
    $mail->From     = $p_email_from;
    $mail->AddAddress($p_email_to,$p_email_from);
    $mail->IsHTML(true);
    $mail->Subject  = $p_subject;
    $mail->Body     = $p_message . '<br> Email has sent at '. date('d-M-y H:i:s');

    if(!$mail->Send()) {
        echo 'Email was not sent :  ';
        echo '<font color="Red"> Mailer error: ' . $mail->ErrorInfo .'</font> ';
    } else {
        echo 'Email has been sent for <b> '.  $p_email_to  . '</b> and  <b>'.$p_email_from.'</b>';
    }
}