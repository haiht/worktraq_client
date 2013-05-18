<?php
function check_date(&$p_datetime, $p_split='-', $p_in_vi_format = false, $p_out_vi_format = false){
	$v_datetime = $p_datetime;
    $v_len = strlen($v_datetime);
	if($v_len <10) return false;
	$v_yy = 0; $v_mm = 0; $v_dd = 0; $v_hh = 0; $v_mi = 0; $v_ss = 0;
	if($p_in_vi_format){
		$v_date = substr($v_datetime,0,10);
		$v_time = str_replace($v_date,'',$v_datetime);
		$v_time = trim($v_time);
		$arr_date = explode($p_split, $v_date);
		if(count($arr_date)!=3) return false;
		$v_yy = $arr_date[2]; settype($v_yy, "int");
		$v_mm = $arr_date[1]; settype($v_mm, "int");
		$v_dd = $arr_date[0]; settype($v_dd, "int");
		$arr_time = explode(':',$v_time);
		for($i=0;$i<3;$i++){
			if($i==0)
				$v_hh = isset($arr_time[0])?$arr_time[0]:0;
			else if($i==1)
				$v_mi = isset($arr_time[1])?$arr_time[1]:0;
			else if($i==2)
				$v_ss = isset($arr_time[2])?$arr_time[2]:0;
		}
		settype($v_hh, "int");
		settype($v_mi, "int");
		settype($v_ss, "int");
		$v_datetime = $v_yy.'-'.$v_mm.'-'.$v_dd.' '.$v_hh.':'.$v_mi.':'.$v_ss;
	}else{
		$v_date = substr($v_datetime,0,10);
		$v_time = str_replace($v_date,'',$v_datetime);
		$v_time = trim($v_time);
		$arr_date = explode($p_split, $v_date);
		if(count($arr_date)!=3) return false;
		$v_yy = $arr_date[0]; settype($v_yy, "int");
		$v_mm = $arr_date[1]; settype($v_mm, "int");
		$v_dd = $arr_date[2]; settype($v_dd, "int");
		$arr_time = explode(':',$v_time);
		for($i=0;$i<3;$i++){
			if($i==0)
				$v_hh = $arr_time[0];
			else if($i==1)
				$v_mi = $arr_time[1];
			else if($i==2)
				$v_ss = $arr_time[2];
		}
		settype($v_hh, "int");
		settype($v_mi, "int");
		settype($v_ss, "int");
		$v_datetime = $v_yy.'-'.$v_mm.'-'.$v_dd.' '.$v_hh.':'.$v_mi.':'.$v_ss;
	}
	//$v_time = strtotime($v_datetime);
    $date = new DateTime($v_datetime);

	//return $p_out_vi_format?date('d-m-Y H:i:s',$v_time):date('Y-m-d H:i:s',$v_time);
	//return date('d-m-Y H:i:s',$v_time).' --> '.$v_dd;
    //$p_datetime = ($p_out_vi_format)?date('d-m-Y H:i:s',$v_time):date('Y-m-d H:i:s',$v_time);
    $p_datetime = ($p_out_vi_format)?$date->format('d-m-Y H:i:s'):$date->format('Y-m-d H:i:s');
    $p_datetime = substr($p_datetime,0,$v_len);
	//return (($v_yy==date('Y',$v_time)) && ($v_mm==date('m',$v_time)) && ($v_dd==date('d',$v_time)) && ($v_hh==date('H',$v_time)) && ($v_mi==date('i',$v_time)) && ($v_ss==date('s',$v_time)));//?($p_out_vi_format?date('d-m-Y H:i:s',$v_time):date('Y-m-d H:i:s',$v_time)):'';
    return (($v_yy==$date->format('Y')) && ($v_mm==$date->format('m')) && ($v_dd==$date->format('d')) && ($v_hh==$date->format('H')) && ($v_mi==$date->format('i')) && ($v_ss==$date->format('s')));//?($p_out_vi_format?date('d-m-Y H:i:s',$v_time):date('Y-m-d H:i:s',$v_time)):'';
}

function is_valid_email($p_email){
    return filter_var($p_email, FILTER_VALIDATE_EMAIL);
}
function is_validate_telephone_number($number){
	$formats = array('###.###.####','###-###-####', '####-###-###', '(###) ###-###', '####-####-####', '##-###-####-####', '####-####', '###-###-###', '(##) ##-###-###', '(###) ###-####', '(####) ###-###', '(##)##-###-###', '(###)###-####', '(####)###-###',
'#####-###-###', '##########','(###) #######','(##) ########','(##)########','(###)#######');
	$format = trim(ereg_replace("[0-9]", "#", $number));

	return (in_array($format, $formats)) ? true : false;
}

function is_valid_url($p_url){
    return filter_var($p_url, FILTER_VALIDATE_URL);
}
function create_random_password($p_len=5){
	$v_chars = 'qwertyuiopasdfghjklzxcvbnm0123456789!@#$%^&*';
	$i = 0;
	$r='';
	$l = strlen($v_chars)-1;
	for($i=0;$i<$p_len;$i++){
		$p = rand(0,$l);
		$r.=substr($v_chars,$p,1);
	}
	return $r;
}
function fdate($p_date)
{
    $v_date=$p_date;
    if($p_date=='1970-07-01' ||
            $p_date=='1970-Jan-01' ||
            $p_date=='1970-07-01 07:00:00' ||
            $p_date=='1970-Jan-01 07:00:00' ||
            $p_date=='01-Jan-1970 07:00:00' ||
            $p_date=='01-Jan-1970' ||
            $p_date=='Jan-01-1970' ||
            $p_date=='31-Dec-1969')
            $v_date = "";
    return $v_date;
}
function ftext($p_str)
{
    $p_str = trim($p_str);
    // for the case MongoRegex with tag i: "/i"
    $p_str = str_replace("/i", "", $p_str);
    $p_str = str_replace("/","",$p_str);

    return $p_str;
}

?>