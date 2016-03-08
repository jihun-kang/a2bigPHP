<?php

/**
  * @Name: Map.class.php
  * @File Description:   
  * @link http://www.a2big.com/ 
  * @author jay,kang <jhis21c@gmail.com>
  * @Update: 2016-02-04
  * @version 1.0
  * @Copyright 2012 a2big.com
  */

class Map {	
	function getCoordinates($address){
	    $address = urlencode($address);
	    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;
	    $response = file_get_contents($url);
	    $json = json_decode($response,true);
 
	    $lat = $json['results'][0]['geometry']['location']['lat'];
	    $lng = $json['results'][0]['geometry']['location']['lng'];
	    return array($lat, $lng);
	}
}
?>