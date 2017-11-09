<?php
require 'vendor\autoload.php';
use UserInterface\User;
if(isset($_POST["submit"])){
	session_start();
	$username      = $_SESSION["username"];
	$userdata      = new User($username);
  $user          = $userdata-> viewUserProfile();
	$updatedName	 = $_POST["username"];
	$updatedEmail	 = $_POST["email"];
	$image 			   = $user["Image"];
  $newimage 		 = $_FILES['image']['name'];
  if($newimage){
   	unlink("img/$image");
   	$image       = $updatedName."_".$newimage;
   	$tmp_name    = $_FILES['image']['tmp_name'];
   	move_uploaded_file($tmp_name, "img/$image");
  }
  $userdata-> updateProfile($updatedName, $updatedEmail, $image);
}

