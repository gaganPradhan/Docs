<?php

require 'vendor\autoload.php';
use UserInterface\User;
session_start();
if(empty($_SESSION)){
	header('Location: Loginpage.php');
}
$user = $_SESSION["username"];
echo $user;

if(isset($_POST["logout"])){	
	(new User($user)) -> userLogout();
	header('Location: Loginpage.php');
}

