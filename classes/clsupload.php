<?php

/*
+--------------------------------------------------------------------------
|   Invision Power Board v2.0.3 
|   =============================================
|   by Matthew Mecham
|   (c) 2001 - 2004 Invision Power Services, Inc.
|   http://www.invisionpower.com
|   =============================================
|   Web: http://www.invisionboard.com
|   Time: Tue, 23 Nov 2004 18:11:16 GMT
|   Release: ac9ee89b93052616f2fbedbe8d6a7f9a
|   Licence Info: http://www.invisionboard.com/?license
+---------------------------------------------------------------------------
|
|   > UPLOAD handling methods (KERNEL)
|   > Module written by Matt Mecham
|   > Date started: 15th March 2004
|
|	> Module Version Number: 1.0.0
+--------------------------------------------------------------------------
| ERRORS:
| 1: No upload
| 2: Not valid upload type
| 3: Upload exceeds $max_file_size
| 4: Could not move uploaded file, upload deleted
+--------------------------------------------------------------------------
*/

//define('DS',DIRECTORY_SEPARATOR);

class clsupload
{
	// name of upload form field
	var $upload_form_field = 'userfile';
	
	// Out filename *without* extension
	// (Leave blank to retain user filename)
	var $out_file_name    = '';
	
	// Out dir (./upload) - no trailing slash
	var $out_file_dir     = '';
	
	// maximum file size of this upload
	var $max_file_size    = 0;
	// file size
	var $file_size = 0;
	// Forces PHP, CGI, etc to text
	var $make_script_safe = 1;
	
	// Force non-img file extenstion (leave blank if not) (ex: 'ibf'a makes upload.doc => upload.ibf)
	var $force_data_ext   = '';
	
	// Allowed file extensions array( 'gif', 'jpg', 'jpeg'..)
	var $allowed_file_ext = array( 'gif', 'jpeg', 'jpg', 'png', 'rar', 'doc', 'exe', 'zip', 'txt', 'xls','tpl');
	
	// Array of IMAGE file extensions
	var $image_ext        = array( 'gif', 'jpeg', 'jpg', 'png' );
	
	
	// Returns current file extension	
	var $file_extension   = '';
	
	// If force_data_ext == 1, this will return the 'real' extension
	// and $file_extension will return the 'force_data_ext'
	var $real_file_extension = '';
	
	// Returns error number	
	var $error_no         = 0;
	
	// Returns if upload is img or not
	var $is_image         = 0;
	
	// Returns file name as was uploaded by user
	var $original_file_name = "";
	
	// Returns final file name as is saved on disk. (no path info)
	var $parsed_file_name = "";
	
	// Returns final file name with path info
	var $saved_upload_name = "";
	//
	var $filename="";
	
	var $overwrite_mode = 0;//allow overwrite
	/*-------------------------------------------------------------------------*/
	// CONSTRUCTOR
	/*-------------------------------------------------------------------------*/
	
	function __constructor(){}
	
	
	/*
	//ADD MORE BY Hồ Thanh Hải
	*/
	function set_allow_array_extension($arr_ext_allow){
		$this->allowed_file_ext = $arr_ext_allow;
	}
	
	function set_allow_overwrite($allow=1){
		$this->overwrite_mode=$allow;
	}
	//Xác nhận fieldname chứa file cần upload
	function set_field_name($field_name){
		$this->upload_form_field = $field_name;
	}
	//File sẽ lưu tại
	function set_destination_dir($dest_dir){
		$this->out_file_dir = $dest_dir;
	}
	//Tên file mới
	function set_new_filename($filename){
		$this->out_file_name=$filename;
	}
	function get_filename(){
		return $this->parsed_file_name;
	}
	//Kich thuoc toi da
	function set_max_size($maxsize){
		$this->max_file_size=$maxsize;
	}
	function get_max_size(){
		return $this->max_file_size;
	}
	//Kich thuoc file
	function get_file_size(){
		return $this->file_size;
	}
    //Lấy toàn bộ đường dẫn sau khi upload
    function get_full_path(){
        return $this->saved_upload_name;
    }
    function get_full_folder(){
        return $this->out_file_dir;
    }
    function get_file_extension(){
        return $this->file_extension;
    }
	
	//Lây nội dung lỗi
	function get_error_message(){
		$msg="";
		if($this->error_no==0){
			$msg = "File \"$this->filename\" dose not upload unsuccessful!";
		}else if($this->error_no==1){
			$msg = "File \"$this->filename\" can't upload!";
		}else if($this->error_no==2){
			$msg = "File \"$this->filename\" doesn't allow upload!";
		}else if($this->error_no==3){
			$msg = "File \"$this->filename\"'s size larger than standrad'!";
		}else if($this->error_no==4){
			$msg = "File \"$this->filename\" exist!";
		}else if($this->error_no==5){
			$msg = "File \"$this->filename\" exist and can't delete file!";;
		}
		return $msg;
	}
	function get_error_number(){
		return $this->error_no;
	}
	//Lấy tên file đã lưu
	function get_save_file_name(){
		if($this->error_no==0)
			return $this->parsed_file_name;
		else
			return "";
	}
	/*-------------------------------------------------------------------------*/
	// PROCESS THE UPLOAD
	/*-------------------------------------------------------------------------*/
	
	function upload_process()
	{
		$this->_clean_paths();
		
		//-------------------------------------------------
		// Set up some variables to stop carpals developing
		//-------------------------------------------------
		
		$FILE_NAME = $_FILES[ $this->upload_form_field ]['name'];
		//
		$this->filename = $FILE_NAME;
		$FILE_SIZE = $_FILES[ $this->upload_form_field ]['size'];
		$FILE_TYPE = $_FILES[ $this->upload_form_field ]['type'];
		
		$this->file_size = $FILE_SIZE;
		//-------------------------------------------------
		// Naughty Opera adds the filename on the end of the
		// mime type - we don't want this.
		//-------------------------------------------------
		
		$FILE_TYPE = preg_replace( "/^(.+?);.*$/", "\\1", $FILE_TYPE );
		
		//-------------------------------------------------
		// Naughty Mozilla likes to use "none" to indicate an empty upload field.
		// I love universal languages that aren't universal.
		//-------------------------------------------------
		
		if ($_FILES[ $this->upload_form_field ]['name'] == ""
		or !$_FILES[ $this->upload_form_field ]['name']
		or !$_FILES[ $this->upload_form_field ]['size']
		or ($_FILES[ $this->upload_form_field ]['name'] == "none") )
		{
			$this->error_no = 1;
			return;
		}
		
		//-------------------------------------------------
		// De we have allowed file_extensions?
		//-------------------------------------------------
		
		if ( ! is_array( $this->allowed_file_ext ) or ! count( $this->allowed_file_ext ) )
		{
			$this->error_no = 2;
			return;
		}
		
		//-------------------------------------------------
		// Get file extension
		//-------------------------------------------------
		
		$this->file_extension = $this->_get_file_extension( $FILE_NAME );
		
		if ( ! $this->file_extension )
		{
			$this->error_no = 2;
			return;
		}
		
		$this->real_file_extension = $this->file_extension;
		
		//-------------------------------------------------
		// Valid extension?
		//-------------------------------------------------
		
		if ( ! in_array( $this->file_extension, $this->allowed_file_ext ) )
		{
			$this->error_no = 2;
			return;
		}
		
		//-------------------------------------------------
		// Check the file size
		//-------------------------------------------------
		
		if ( ( $this->max_file_size ) and ( $FILE_SIZE > $this->max_file_size ) )
		{
			$this->error_no = 3;
			return;
		}
		
		//-------------------------------------------------
		// Make the uploaded file safe
		//-------------------------------------------------
		
		$FILE_NAME = preg_replace( "/[^\w\.]/", "_", $FILE_NAME );
		
		$this->original_file_name = $FILE_NAME;
		
		//-------------------------------------------------
		// Is it an image?
		//-------------------------------------------------
		
		if ( is_array( $this->image_ext ) and count( $this->image_ext ) )
		{
			if ( in_array( $this->file_extension, $this->image_ext ) )
			{ 
				$this->is_image = 1;
			}
		}
		
		//-------------------------------------------------
		// Convert file name?
		// In any case, file name is WITHOUT extension
		//-------------------------------------------------
		
		if ( $this->out_file_name )
		{
			$this->parsed_file_name = $this->out_file_name;
		}
		else
		{
//			$this->parsed_file_name = str_replace( '.'.$this->file_extension, "", $FILE_NAME );
			$this->parsed_file_name = str_replace( $this->file_extension, "", $FILE_NAME );
//			echo $this->parsed_file_name;
		}
//		return;
		//-------------------------------------------------
		// Make safe?
		//-------------------------------------------------
		
		if ( $this->make_script_safe )
		{
			if ( preg_match( "/\.(cgi|pl|js|asp|php|html|htm|jsp|jar)/", $FILE_NAME ) )
			{
				$FILE_TYPE                 = 'text/plain';
				$this->file_extension      = 'txt';
			}
		}
		
		//-------------------------------------------------
		// Add on the extension...
		//-------------------------------------------------
		
		if ( $this->force_data_ext and ! $this->is_image ){
			$this->file_extension = str_replace( ".", "", $this->force_data_ext ); 
		}
		//test by Hồ Thanh Hải
		$len = strlen($this->parsed_file_name);
		if(strtolower(substr($this->parsed_file_name,$len-3,$len))!=$this->file_extension){
			$extlen = strlen($this->parsed_file_name);
			if(substr($this->parsed_file_name,$extlen-1,$extlen)!=".")
				$this->parsed_file_name .= '.'.$this->file_extension;
			else
				$this->parsed_file_name .= $this->file_extension;
		}
		//End by Hồ Thanh Hải
		//-------------------------------------------------
		// Copy the upload to the uploads directory
		//-------------------------------------------------
//		$this->parsed_file_name = strtolower($this->parsed_file_name);
		$this->saved_upload_name = $this->out_file_dir.DIRECTORY_SEPARATOR.$this->parsed_file_name;

		if(file_exists($this->saved_upload_name)){
			if($this->overwrite_mode){
				if(! @unlink($this->saved_upload_name)){
					$this->error_no=5;
					return;
				}
			}else{
				$this->error_no=4;
				return;
			}
		}
		
		if ( ! @move_uploaded_file( $_FILES[ $this->upload_form_field ]['tmp_name'], $this->saved_upload_name) )
		{
			$this->error_no = 4;
			return;
		}
		else
		{
			@chmod( $this->saved_upload_name, 0755 );
		}
	}
	
	/*-------------------------------------------------------------------------*/
	// INTERNAL: Get file extension
	/*-------------------------------------------------------------------------*/
	
	function _get_file_extension($file)
	{
		return strtolower( str_replace( ".", "", substr( $file, strrpos( $file, '.' ) ) ) );
	}
	
	/*-------------------------------------------------------------------------*/
	// INTERNAL: Clean paths
	/*-------------------------------------------------------------------------*/
	
	function _clean_paths()
	{
		$this->out_file_dir = preg_replace( "#/$#", "", $this->out_file_dir );
	}
}

?>