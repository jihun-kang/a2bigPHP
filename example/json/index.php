<?
/**
 * @Name: index.php
 * @File Description:  
 * @link http://www.a2big.com/ 
 * @author jhkang,kang <jhis21c@gmail.com>
 * @Update: 2015-12-23
 * @version 1.0
 * @Copyright 2012 a2big.com
 */

include_once( dirname(__FILE__)."/a2bigPHP/include/index.php");  
include_once( "urls.php"); 
include_once( "views.php");  
require( "settings.php");  
 
$myController = new MyController();
//$myController->invoke('aaa',array('faaa','nnnn'));
$urlInterpreter = new UrlInterpreter();
$command = $urlInterpreter->getCommand();
$commandDispatcher = new CommandDispatcher($command,$url,$myController);
$commandDispatcher->Dispatch();

?>


