<?
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

class Controller {  
    public $model;  
	var $token;
	var $subToken; 
 	var $parameters;
  
     public function __construct()    
     {    
          $this->model = new Model();  
     }   
      
     public function invoke($token,$parameters)  
     { 
		 $this->token 	  = $token;
		 $this->subToken =  current($parameters);
		 array_splice($parameters, 0, 1);
		 $this->parameters = $parameters;
		 $this->procFunc();
     }  
	 
	 function procFunc(){
		 echo "procFunc>>><br>";
		 switch($this->subToken){
			 case 'user':
				 $this->debug_param();
	             $books = $this->model->getBookList();  
	             include 'view/booklist.php'; 
			 break;
			 default:
				 echo 'bad token';
				 break;
		 }
	 }
	 
	 function debug_param(){
	    foreach ($this->parameters as $value) {
			echo $value." ";
		}	
		echo "<br>";
	 }
	 
	 function getParameterSize(){
	 	return sizeof($this->parameters);
	 }	 
}  
	
?>