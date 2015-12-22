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
include_once("model/Model.php");  

class UrlInterpreter 
	{
    var $command;
	function UrlInterpreter()
		{
		$requestURI = explode('/', $_SERVER['REQUEST_URI']);
		$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
		for($i= 0;$i < sizeof($scriptName);$i++)
		{

			if ($requestURI[$i]	== $scriptName[$i])
			{
				unset($requestURI[$i]);
			}
		}
	
		$commandArray = array_values($requestURI);
		$commandName = $commandArray[0];
		$parameters = array_slice($commandArray,1);
		$this->command = new Command($commandArray[0],$parameters);
		        
		}

	function getCommand()
		{
		return $this->command;
		}
	}
?>