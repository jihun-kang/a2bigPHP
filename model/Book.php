<?php
/**
 * @Name: Book.php
 * @File Description:  
 * @link http://www.a2big.com/ 
 * @author jay,kang <jhis21c@gmail.com>
 * @Update: 2015-12-18
 * @version 1.0
 * @Copyright 2012 a2big.com
 */

class Book {  
    public $title;  
    public $author;  
    public $description;  
      
    public function __construct($title, $author, $description)    
    {    
        $this->title = $title;  
        $this->author = $author;  
        $this->description = $description;  
    }   
}  
?>