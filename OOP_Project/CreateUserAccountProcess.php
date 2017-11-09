<?php

require 'vendor\autoload.php';
use UserInterface\User;

if(isset($_POST["submit"])){
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["image"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    }
	    else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	        header('Location: isnotanimage.php');
	        die();
	    }
	}
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email	  = $_POST["email"];
	$image	  = $_FILES['image']['name'];
	$image	  = $username."_".$image;
	$user     = new User($username, $password, $email, $image);
	$tmp_name = $_FILES['image']['tmp_name'];
	move_uploaded_file($tmp_name, "Img/$image");
	$user-> userCreate();
	header('Location: ViewUserProfile.php');
}else{
	header('Location: LoginPage.php');
}


?>