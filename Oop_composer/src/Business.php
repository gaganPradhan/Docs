<?php 
namespace Test;

class Business {

	protected $staff, $person;
	public function __construct (Staff $staff) {

		$this -> staff = $staff;

	}

	public function hire (Person $person){
		$this-> staff-> add($person);

	}

}
