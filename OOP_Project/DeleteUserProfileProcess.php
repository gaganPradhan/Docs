<?php
require 'vendor\autoload.php';
use UserInterface\User;
use UserInterface\Admin;
session_start();
$username = $_SESSION["username"];
if($_POST["delete"]){
	$username = $_SESSION["username"];
	$user     = new User($username);
	$admin    = new Admin($user);
	$username = $_POST["delete"];
	$admin-> selectUser($username);
	$admin-> deleteUserProfile();
	header('Location: ViewUserList.php');
}else{
$user     = new User($username);
$user-> deleteUserProfile();
header('Location: DeleteSuccessMessage.php');
}