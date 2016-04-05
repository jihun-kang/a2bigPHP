<?
/**
 * @Name: upload.php
 * @File Description:
 * @link http://www.a2big.com/
 * @author jay,kang <jhis21c@gmail.com>
 * @Update: 2016-01-25
 * @version 1.0
 * @Copyright 2016 a2big.com
 */

#-#############################################
# desc: Upload and Rename File
# Param: $name : $_FILES["file"]["name"] 
#	     $file_basename		
#		 $type : $_FILES["file"]["type"]
#		 $size : $_FILES["file"]["size"]
#        $tmp_name : $_FILES["file"]["tmp_name"]
define("MAX_FILE_SIZE", 20000000);


function image_upload_file($target_path, $thumbnail_path, $name, $file_basename, $type, $size, $tmp_name, $isMakeThum){	
	//$file_basename = substr($name, 0, strripos($name, '.')); // get file extention
	$file_ext = strtolower(substr($name, strripos($name, '.'))); // get file name
	$allowed_file_types = array('.jpg','.png','.rtf','.pdf');	
			
 	write_log("Upload: " . $name, UPLOAD_LOG);				
	write_log("Type: " . $type, UPLOAD_LOG);				
	write_log("Size:".($size / 1024)." Kb", UPLOAD_LOG);				
	write_log("Stored in: " .$tmp_name, UPLOAD_LOG);		
	write_log("file_ext : " .$file_ext, UPLOAD_LOG);		

	//if (in_array($file_ext,$allowed_file_types) && ($size < 20000000))
	if (in_array($file_ext,$allowed_file_types) && ($size < MAX_FILE_SIZE))
	{	
		// Rename file
		//$target_path = "uploads/";
		$newfilename = md5($file_basename) . $file_ext;
		write_log("newfilename : " .$newfilename);		
		
		
		if (file_exists($target_path . $newfilename))
		{
			// file already exists error
			$message = "You have already uploaded this file." ;
		    $ret =  array('file' => $newfilename, 
						  'status' => UploadMessage::ERR_EXIST_FILE, 
						  'message' => $message);
			
	 		write_log($message, UPLOAD_LOG);	
		}
		else
		{		
			move_uploaded_file($tmp_name, $target_path . $newfilename);
			$ret = UploadMessage::UPLOAD_OK; 			
			$message =  "File uploaded successfully.";	
		    $ret =  array('file' => $newfilename, 
						  'status' => UploadMessage::UPLOAD_OK, 
						  'message' => $message);
			
	 		write_log($message, UPLOAD_LOG);	
	 		write_log($ret, UPLOAD_LOG);	
			
			
			//make thumbnail image
			if($isMakeThum){
				$ret2 =  resize($target_path.$newfilename,
						   $thumbnail_path.$newfilename,
						   100,100);
			}
			
		}
		
	}
	elseif (empty($file_basename))
	{	
		// file selection error
		$message =   "Please select a file to upload.";
	    $ret =  array('file' => $newfilename, 
					  'status' => UploadMessage::ERR_EMPTY_FILE_NAME, 
					  'message' => $message);
		
		write_log("newfilename : " .$newfilename, UPLOAD_LOG);		
		
	} 
	elseif ($size > MAX_FILE_SIZE)
	{	
		// file size error
		$message =   "The file you are trying to upload is too large.";
	    $ret =  array('file' => $newfilename, 
					  'status' => UploadMessage::ERR_LARGE_FILE, 
					  'message' => $message);
				
 		write_log($message, UPLOAD_LOG);					
		
	}
	else
	{
		// file type error
		$message =   "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
 		write_log($message, UPLOAD_LOG);					
	    $ret =  array('file' => $newfilename, 
					  'status' => UploadMessage::ERR_FILE_TYPE, 
					  'message' => $message);
		
		unlink($tmp_name);
	}
	
	return $ret;
}


#-#############################################
# desc: creates a resized image
# Param: $filename_original : Original filename		
#		 $filename_resized  : Filename of the resized image
#		 $new_w : width of resized image
#        $new_h : height of resized image
function resize($filename_original, $filename_resized, $new_w, $new_h) {
	$extension = pathinfo($filename_original, PATHINFO_EXTENSION);

	if ( preg_match("/jpg|jpeg/", $extension) ) {
		$src_img=@imagecreatefromjpeg($filename_original);
	}
	
	if ( preg_match("/png/", $extension) ) {
		$src_img=@imagecreatefrompng($filename_original);
	}
	
	if(!$src_img) return false;

	$old_w = imageSX($src_img);
	$old_h = imageSY($src_img);

	$x_ratio = $new_w / $old_w;
	$y_ratio = $new_h / $old_h;

	if ( ($old_w <= $new_w) && ($old_h <= $new_h) ) {
		$thumb_w = $old_w;
		$thumb_h = $old_h;
	}
	elseif ( $y_ratio <= $x_ratio ) {
		$thumb_w = round($old_w * $y_ratio);
		$thumb_h = round($old_h * $y_ratio);
	}
	else {
		$thumb_w = round($old_w * $x_ratio);
		$thumb_h = round($old_h * $x_ratio);
	}		

	$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_w,$old_h); 

	if (preg_match("/png/",$extension)) imagepng($dst_img,$filename_resized); 
	else imagejpeg($dst_img,$filename_resized,100); 

	imagedestroy($dst_img); 
	imagedestroy($src_img);

	return true;
}

?>
