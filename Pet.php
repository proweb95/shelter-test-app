<?php 

abstract class Pet {

	private $name;
	private $age;

	function __construct($name, $age){
		
		$this->name = $name;
		$this->age = $age;
	}

	public function getAge() {
		return $this->age;
	}
	public function getName() {
		return $this->name;
	}

	public static function compareByName($pet1, $pet2) {
		return $pet1->getName() > $pet2->getName() ? 1 : ($pet1->getName() == $pet1->getName() ? 0 : -1);
	}
}