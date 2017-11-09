<?php

include('databaseConnection.php');
include('functions.php');

$flag = is_admin($connection);
if(isset($_SESSION["username"])){
		$user	= $_SESSION["username"];	
		$selectuser 	= "SELECT * FROM users WHERE Username='$user'";
		$resultuser		= mysqli_query($connection, $selectuser);
		$selectnews 	= "SELECT * FROM news";
		$resultnews		= mysqli_query($connection, $selectnews);
		$rowuser 		= mysqli_fetch_assoc($resultuser);
		$rownews 		= mysqli_fetch_assoc($resultnews);
		$id 			= $rowuser["Id"];
		

	if(isset($_POST["upload"])){

		$title 			= $_POST["title"];
		$description 	= $_POST["description"];
		$image 			= $_FILES["imagefile"]["name"];
		$temp_name		= $_FILES["imagefile"]["tmp_name"];


		post_news($title,$description,$image,$temp_name,$connection,$id);
	
		echo "<script>window.open('newslist_process.php','_self')</script>";
	}
	
}else{

		echo"<script>alert('Need to sign in')</script>";
		echo "<script>window.open('LoginForm.html','_self')</script>";

}

	
	
if(isset($_GET["delete"])){

	$username 		= $_SESSION["username"]; 
	$id 			= $_GET["delete"];	
	delete_specific_news($id,$username,$connection);
	echo "<script>alert('Successfully deleted')</script>";
	if(!$flag)
		echo "<script>window.open('newslist_process.php','_self')</script>";
	else
		echo "<script>window.open('userlist.php','_self')</script>"; 

}





?>
