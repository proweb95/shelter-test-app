<?php 
include_once 'Pet.php';

class Turtle extends Pet {

	function __construct($name, $age){
		parent::__construct($name, $age);
	}
	
}