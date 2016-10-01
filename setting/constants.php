<?php
/**
 * @Name: UploadMessage.php
 * @File Description:
 * @link http://www.a2big.com/
 * @author jay,kang <jhis21c@gmail.com>
 * @Update: 2016-01-25
 * @version 1.0
 * @Copyright 2016 a2big.com
 */
include_once($path."/message/EnumMessages.class.php");  

class UploadMessage extends EnumMessages {
  const UPLOAD_OK	   		 = "10001";
  const ERR_FILE_TYPE		 = "10002";
  const ERR_LARGE_FILE		 = "10003";
  const ERR_EXIST_FILE		 = "10004";
  const ERR_EMPTY_FILE_NAME  = "10005";
}

?>