<?php
/**
  * @Name: Controller.php
  * @File Description:  
  * @link http://www.a2big.com/ 
  * @author jay,kang <jhis21c@gmail.com>
  * @Update: 2012-11-15
  * @version 1.0
  * @Copyright 2012 a2big.com
  */

include_once("controller/Controller.class.php");  

class CommandDispatcher {
	var $command;
	var $sitepath;
	function  CommandDispatcher($command, $sitepath) {
		$this->command = $command;
		$this->sitepath = $sitepath;
	}
	function Dispatch() {			
		switch ($this->command->getCommandName()) {
            case '': 
				break;
			case 'api':
				$controller = new Controller();  
				$token = $this->command->getCommandName();
				$arr = array_diff( $this->command->getParameters(), array( '' ) );
				$controller->invoke($token,$arr);  
				break;
			default: 
				echo "default";
				break;
		
    			
		}
	}
}
?>