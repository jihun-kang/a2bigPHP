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
     
	 public function setParameters($token, $parameters){
		 //token
		 $this->token = $token;
		 $this->parameters  = array_diff( $parameters, array( '' ) );
		 
		 //subtoken
		 // $this->subToken =  current($parameters);
		 $this->subToken =  $this->array_last($this->parameters);
	 }
	 
	
 	function array_last($array) {
 	    if (count($array) < 1)
 	        return null;
 	    return $array[count($array) - 1];
 	}
	
	function procFunc(){	
		 
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