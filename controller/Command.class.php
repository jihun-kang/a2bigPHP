<?php
/**
  * @Name: Controller.php
  * @File Description:  
  * @link http://www.a2big.com/ 
  * @author jay,kang <jhis21c@gmail.com>
  * @Update: 2015-11-15
  * @version 1.0
  * @Copyright 2012 a2big.com
  */

class Command
        {
        var $commandName = '';
        var $parameters = array();
        
        function Command($commandName,$parameters)
                {
                $this->commandName = $commandName;
                $this->parameters = $parameters;
                }
        function getCommandName()
                {
                return $this->commandName;
                }
        function getParameters()
                {
                return $this->parameters;
                }
        }
?>