<?
/**
 * @Name: views.php
 * @File Description:  
 * @link http://www.a2big.com/ 
 * @author jay,kang <jhis21c@gmail.com>
 * @Update: 2015-12-18
 * @version 1.0
 * @Copyright 2012 a2big.com
 */

include_once( "models.php");  

class MyController extends Controller
{
    public function __construct()    
    {    
    }   
	
	function test(){
		$t = new Test();
		
		$row1 = $this->add_row1();
		array_push($t->contacts, $row1);	
		
		$row2 = $this->add_row2();
		array_push($t->contacts, $row2);	
	
	
		json_encode($t);
		print json_encode($t);
	} 	
	
	
	function add_row1(){
		$contact = new Contact();
		$contact->id = "c200";
		$contact->name = "Ravi Tamada";
		$contact->email = "ravi@gmail.com";
		$contact->address = "xx-xx-xxxx,x - street, x - country";
		$contact->gender = "male";
		
		$phone  = new Phone();
		$phone->mobile  = "+91 0000000001";
		$phone->home	 = "+91 0000000002";
		$phone->office  = "+91 0000000003";
		array_push($contact->phone, $phone);	
		
		return $contact;
	}
	
	function add_row2(){
		$contact = new Contact();
		$contact->id = "c201";
		$contact->name = "Johnny Depp";
		$contact->email = "johnny_depp@gmail.com";
		$contact->address = "xx-xx-xxxx,x - street, x - country";
		$contact->gender = "male";
		
		$phone  = new Phone();
		$phone->mobile  = "+91 0000000011";
		$phone->home	 = "+91 0000000012";
		$phone->office  = "+91 0000000013";
		array_push($contact->phone, $phone);	
		
		return $contact;
	}
	
}
	
?>
