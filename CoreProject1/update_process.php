<?php
if(isset($_POST["submit"])){

	$updatedName	 = $_POST["username"];
	$updatedEmail	 = $_POST["email"];
  $username      = $_SESSION["username"];
  $image         = $_FILES['imagefile']['name'];
  $tmp_name      = $_FILES['imagefile']['tmp_name'];
  move_uploaded_file($tmp_name, "Img/$image");



}
?>