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

function func($callback)
{
	echo call_user_func($callback);	
}

class CommandDispatcher {
	var $command;
	var $sitepath;
	var $url;
	var $callback;
	var $controller;
	
	function  CommandDispatcher($command, $sitepath, $controller) {		
		$this->command = $command;
		$this->sitepath = $sitepath;
		$this->url = $GLOBALS['url'];
		$this->controller = $controller;		
	}
	
	function Dispatch() {
		$param = "/";
		$arr = array_diff( $this->command->getParameters(), array( '' ) );
		$param = $param.$this->command->getCommandName();
	    foreach($arr as $s){
			$param = $param."/".$s;
		}
		$this->readyUrlRoute($this->url,$param);
		$this->controller->setParameters(
								$this->command->getCommandName(),
								$this->command->getParameters()
							);
			
		func(array($this->controller, $this->callback));		
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