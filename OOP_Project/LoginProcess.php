<?php

require 'vendor\autoload.php';
use UserInterface\User;

if(isset($_POST)){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$user     = new User($username, $password);
	$response = $user-> userLogin();

	if($response){
		header('Location: viewUserProfile.php');
	}	else{
		header('Location: Loginpage.php');
	}
}


