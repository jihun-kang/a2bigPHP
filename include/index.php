<?php

 /**
  * @Name: index.php
  * @File Description:  
  * @link http://www.a2big.com/ 
  * @author jay,kang <jhis21c@gmail.com>
  * @Update: 2015-12-18
  * @version 1.0
  * @Copyright 2012 a2big.com
  */
require_once(dirname(__DIR__)."/setting/global.inc.php");
////require($path."/setting/db_config.inc.php"); 
require($path."/database/Database.class.php"); 
require_once($path."/view/Template.class.php");
require_once($path."/maps/Map.class.php");
include($path."/controller/Command.class.php");
include($path."/controller/Urlinterpreter.class.php");
include($path."/controller/Commanddispatcher.class.php");
include_once($path."/controller/Controller.class.php");  
include_once($path."/setting/constants.php");  

include_once($path."/log/log.php");  
include_once($path."/upload/upload.php");  
include_once($path."/setting/url.inc.php");  

?>
