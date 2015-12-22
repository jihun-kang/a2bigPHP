<?php
/**
  * @Name: Controller.php
  * @File Description:  
  * @link http://www.a2big.com/ 
  * @author jay,kang <jhis21c@gmail.com>
  * @Update: 2015-12-22
  * @version 1.0
  * @Copyright 2012 a2big.com
  */
include_once("setting/url.inc.php");  
include_once("controller/Controller.class.php");  


class MyClass
{
    function callbackMethod()
    {
        return "hoge";
    }
    static function staticCallbackMethod()
    {
        return "fuga";
    }
}

function func($callback)
{
	echo call_user_func($callback);	
}

class CommandDispatcher {
	var $command;
	var $sitepath;
	var $url;
	var $callback;
	
	function  CommandDispatcher($command, $sitepath) {
		$this->command = $command;
		$this->sitepath = $sitepath;
		$this->url = $GLOBALS['url'];
	}
	
	function Dispatch() {
		$param = "/";
		$arr = array_diff( $this->command->getParameters(), array( '' ) );
		$param = $param.$this->command->getCommandName();
	    foreach($arr as $s){
			$param = $param."/".$s;
		}
		$this->readyUrlRoute($this->url,$param);
		
		$obj = new MyClass();
		func(array($obj, $this->callback));
	}
	
	function readyUrlRoute($url,$request_uri) {
		foreach ($url as $url_er => $application_route) {
			if (preg_match($url_er,$request_uri,$matche)) {
				$this->callback = $application_route;
			}
		}
	}
}
?>