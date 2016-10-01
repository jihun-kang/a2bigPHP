<?php
/**
 * @Name: log.php
 * @File Description:
 * @link http://www.a2big.com/
 * @author jay,kang <jhis21c@gmail.com>
 * @Update: 2015-12-18
 * @version 1.0
 * @Copyright 2012 a2big.com
 */

// 
// Filename of log to use when none is given to write_log
define("DEFAULT_LOG","default.log");
function write_log($message, $logfile='') {
  // Determine log file
  if($logfile == '') {
    // checking if the constant for the log file is defined
    if (defined(DEFAULT_LOG) == TRUE) {
        $logfile = DEFAULT_LOG;
    }
    // the constant is not defined and there is no log file given as input
    else {
        error_log('No log file defined!',0);
        return array('status' => false, message => 'No log file defined!');
    }
  }
 
  // Get time of request
  if( ($time = $_SERVER['REQUEST_TIME']) == '') {
    $time = time();
  }
 
  // Get IP address
  if( ($remote_addr = $_SERVER['REMOTE_ADDR']) == '') {
    $remote_addr = "REMOTE_ADDR_UNKNOWN";
  }
 
  // Get requested script
  if( ($request_uri = $_SERVER['REQUEST_URI']) == '') {
    $request_uri = "REQUEST_URI_UNKNOWN";
  }
 
  // Format the date and time
  $date = date("Y-m-d H:i:s", $time);
 
  // Append to the log file
  if($fd = @fopen($logfile, "a")) {
	//$enc = mb_detect_encoding($message, array("UTF-8","EUC-kr","SJIS"));  
    //$result = fputcsv($fd, array($date, $remote_addr, $request_uri, $enc));
    
    $result = fputcsv($fd, array($date, $remote_addr, $request_uri, $message));
    fclose($fd);
 
    if($result > 0)
      return array('status' => true);  
    else
      return array('status' => false, message => 'Unable to write to '.$logfile.'!');
  }
  else {
    return array('status' => false, message => 'Unable to open log '.$logfile.'!');
  }
}

?>
