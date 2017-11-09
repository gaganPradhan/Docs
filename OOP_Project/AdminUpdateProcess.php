<?php
require 'vendor\autoload.php';
use UserInterface\User;
use UserInterface\Admin;
if(isset($_POST["submit"])){
	session_start();
	$username      = $_SESSION["username"];
	$user          = new User($username);
  $admin         = new Admin($user);
  $userid        = $_SESSION["userid"];
  $admin-> selectUser($userid);
  $user          = $admin-> viewUserProfile(); 
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
  $admin-> updateProfile($updatedName, $updatedEmail, $image); 
   
}

if(isset($_GET["makeadmin"])){
  $username     = $_SESSION["username"];
  $user         = new User($username);
  $admin        = new Admin($user);    
  $username     = $_GET["makeadmin"];
  $admin-> selectUser($username);
  $admin-> flipPower();
  header('Location: viewUserList.php');
}

