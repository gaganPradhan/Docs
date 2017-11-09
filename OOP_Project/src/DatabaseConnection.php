<?php
namespace UserInterface;
use mysqli;


class DatabaseConnection extends mysqli {
	private $servername;
	private $username;
	private $password;
	private $databasename;


	protected function connectToDatabase(){
		$this-> servername 	 	= "localhost";
		$this-> username		= "root";
		$this-> password		= "";
		$this-> databasename 	= "userinterface";


		$connect	= new mysqli($this-> servername, $this-> username, $this-> password, $this-> databasename);
		if($connect -> connect_error){

		 	echo "connection error: ".$connect_error;
		}else
			return $connect;
	}

	protected function initiateQuery($result){
		$result = $this-> connectToDatabase()-> query($result);
		return $result;
	}
}






