<?php 

include_once 'Shelter.php';

function testCat() {
	echo "Testing Cat class... <br>";
	$cat = new Cat('Murka', 2);
	$age = $cat->getAge();
	$name = $cat->getName();
	echo "Test getAge: ";
	if($age != 2) {
		echo "getAge function returned ".$age.", expected 2. <br>";
		return;
	}
	echo "OK<br>";
	echo "Test getName: ";
	if($name != 'Murka') {
		echo "getName function returned ".$name.", expected Murka. <br>";
		return;
	}
	echo "OK <br>";
}

function testDog() {

}

function testTurtle() {

}

function testShelter() {
	echo "Testing Shelter class...<br>";
	$shelter = new Shelter();
	$sharik = new Dog('Sharik', 3);
	$tuzik = new Dog('Tuzik', 5);
	
	$murka = new Cat('Murka', 4);

	$mike = new Turtle('Mike', 15);

	$shelter->addPet($tuzik);
	$shelter->addPet($sharik);
	$shelter->addPet($murka);
	$shelter->addPet($mike);

	echo "Test petsByType: ";
	$dogs = $shelter->petsByType(Dog::class);
	if(count($dogs) != 2) {
		echo "Function returned number of objects: ".count($dogs)." but expected 2 <br>";
		return;
	}
	if($dogs[0] != $sharik) {
		echo "Function must return objects sorted by its name";
		return;
	}
	if($dogs[1] != $tuzik) {
		echo "Function must return only Dog type objects";
		return;
	}
	$cats = $shelter->petsByType(Cat::class);
	if(count($cats) != 1) {
		echo "Function returned number of objects: ".count($cats)." but expected 1 <br>";
		return;
	}
	if($cats[0] != $murka) {
		echo "Function must return only Cat type objects";
		return;
	}
	echo "OK <br>";


	echo "Test incompatible type: ";
	try {
		$shelter->addPet("Some object");
		echo "ERROR, adding not pet <br>";
		return;
	}
	catch(InvalidArgumentException $e) {
		echo "OK <br>";
	}
	echo "Test giving pet by type: ";
	try {
		$dog = $shelter->givePetByType(Dog::class);
		if(!($dog instanceof Dog)) {
			echo "expected Dog, but found ".gettype($dog). "<br>";
			return;
		}
		if($dog != $tuzik) {
			echo "function must return the pet which most stay in the shelter <br>";
			return;
		}
	} catch(Exception $e) {
		echo "Unexpected error thrown <br>";
		return;
	}
	echo "OK <br>";

	echo "Test giving pet without type: ";
	try {
		$dog = $shelter->givePet();
		if($dog != $sharik) {
			echo "function must return the pet which most stay in the shelter <br>";
			return;
		}
	}
	catch(Exception $e) {
		echo "Unexpected error thrown";
		return;
	}
	echo "OK <br>";
}







//run tests
testCat();
testDog();
testTurtle();
testShelter();
echo "Test ended";