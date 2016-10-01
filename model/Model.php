<?php
/**
 * @Name: Model.php
 * @File Description:  
 * @link http://www.a2big.com/ 
 * @author jay,kang <jhis21c@gmail.com>
 * @Update: 2015-12-18
 * @version 1.0
 * @Copyright 2012 a2big.com
 */

include_once($path."/model/Book.php");  
  
class Model {  
    public function getBookList()  
    {  
        // here goes some hardcoded values to simulate the database  
        return array(  
            "Jungle Book" => new Book("Jungle Book", "R. Kipling", "A classic book."),  
            "Moonwalker" => new Book("Moonwalker", "J. Walker", ""),  
            "PHP for Dummies" => new Book("PHP for Dummies", "Some Smart Guy", "")  
        );  
    }  
      
    public function getBook($title)  
    {  
        // we use the previous function to get all the books and then we return the requested one.  
        // in a real life scenario this will be done through a db select command  
        $allBooks = $this->getBookList();  
        return $allBooks[$title];  
    }  
      
}  

?>