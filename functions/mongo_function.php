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
?>