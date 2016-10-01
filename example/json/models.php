<?php
/**
 * @Name: models.php
 * @File Description:  
 * @link http://www.a2big.com/ 
 * @author jay,kang <jhis21c@gmail.com>
 * @Update: 2015-12-18
 * @version 1.0
 * @Copyright 2012 a2big.com
 */

class Phone{
	public $mobile;
	public $home;
	public $office;
}

class Contact
{
	public $id = "";
	public $name = "";
	public $email = "";
	public $address = "";
	public $gender = "";
	public $phone = array();
}

class Test{
    public $contacts = array();
}

?>