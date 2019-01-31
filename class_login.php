<?php

class showname {

	//Declaration
	public $name;
	public $age;

	public function __construct($value,$umur) {
		$this->name = $value;
		$this->age = $umur;
	}


	//Function
	public function displayname() {
		return "My Name is ".$this->name." and he is ".$this->age;
	}



	public function displayOutput() {
		echo $this->displayname()." Done";
	}


}


//Create class
$data = new showname("Cenkodok Pisang Panas", "12 Years old");
$output = $data->displayOutput();

?>