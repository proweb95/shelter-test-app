<?php 

include_once 'Cat.php';
include_once 'Dog.php';
include_once 'Turtle.php';
include_once 'Pet.php';

class Shelter
{
	private $petList = [];

	function __construct() {
		
	}

	/**
	* function adds @param $pet to the shelter
	* @param $pet must be instance of Pet otherwise throws InvalidArgumentException
	*/
	public function addPet($pet){
		if (!($pet instanceof Pet)) {
			throw new InvalidArgumentException(gettype($pet).' is not inheritor of class Pet');
		}
		$this->petList[] = $pet;
	}

	/**
	* function returns pets with types @param $type
	* @param $type must be one of the subclasses of class Pet
	*/
	public function petsByType($type) {
		$res = [];
		foreach ($this->petList as $pet) {
        	if($pet instanceof $type) {
        		$res[] = $pet;
        	}
        }
        usort($res, 'Pet::compareByName');
        return $res;
	}

	/**
	* function returns pet with type @param $type and which most stay in the shelter and removes it from shelter
	* if no one pet was found throws Exception
	*/
	public function givePetByType($type) {
		foreach ($this->petList as $index => $pet) {
			if($pet instanceof $type) {
				unset($this->petList[$index]);
				$this->petList = array_values($this->petList); 
				return $pet;
			}
		}
		throw new Exception("Pet with type of ".$type." not found");
	}

	/**
	* function returns pet which most stay in the shelter and removes it from shelter
	* if no one pet was found throws Exception
	*/
	public function givePet() {
		if(count($this->petList) < 1) {
			throw new Exception("There is no pets in Shelter");
		}
		$pet = $this->petList[0];
		unset($this->petList[0]);
		$this->petList = array_values($this->petList); 
		return $pet;
	}
}