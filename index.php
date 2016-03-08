<?php
/**
 * @Name: index.php
 * @File Description:  
 * @link http://www.a2big.com/ 
 * @author jhkang,kang <jhis21c@gmail.com>
 * @Update: 2015-12-18
 * @version 1.0
 * @Copyright 2012 a2big.com
 */
include_once("include/index.php");  

$urlInterpreter = new UrlInterpreter();
$command = $urlInterpreter->getCommand();
$commandDispatcher = new CommandDispatcher($command,$url);
$commandDispatcher->Dispatch();

?>
