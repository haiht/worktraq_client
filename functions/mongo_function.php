<?php
/**
*	function add file to MongoDB
*	$db is instance of Mongo database
*	$p_path string, folder contains file, without en slashes / or \ 
*	$p_filename string, name of file
*/
function add_file_to_mongo(MongoDB $db, $p_path, $p_filename){
    global $db;
	if(file_exists($p_path.DIRECTORY_SEPARATOR.$p_filename)){
		$grid =  $db->getGridFS();
		$storedfile = $grid->storeFile($p_path . DIRECTORY_SEPARATOR. $p_filename, array("metadata" => array("filename" => $p_filename), "filename" => $p_filename),array( 'safe' => true ));
		return $storedfile;
	}else{
		return 'NULL';
	}
}
function get_file_from_mongo(MongoDB $db, $p_filename){
    global $db;
	$gridFS = $db->getGridFS();  
	$image = $gridFS->findOne($p_filename);
	//header('Content-type: image/jpeg');
	//echo $image->getBytes();
	return $image->getBytes();
}

function select_distinct(MongoDB $db, $p_table_name, $p_field_name){
    return $db->command(array("distinct" => $p_table_name, "key" => $p_field_name));
}


function get_array_data($cls, $p_field_value, $p_field_display, & $p_selected_value, array $arr_placeholder = array(), array $arr_where = array(), array $arr_order = array()){
    $arr_data = $cls->select_limit_fields(0, 0, array($p_field_value, $p_field_display), $arr_where, $arr_order);
    $arr_return_data = array();
    if(count($arr_placeholder)==2){
        $arr_return_data[] = array($p_field_value=>$arr_placeholder[0], $p_field_display=>$arr_placeholder[1]);
    }
    $v_tmp_selected = is_numeric($p_selected_value)?0:'';
    foreach($arr_data as $arr){
        $arr_return_data[] = array($p_field_value=>$arr[$p_field_value], $p_field_display=>$arr[$p_field_display]);
        if($p_selected_value==$arr[$p_field_value]) $v_tmp_selected = $p_selected_value;
    }
    $p_selected_value = $v_tmp_selected;
    return $arr_return_data;
}
?>