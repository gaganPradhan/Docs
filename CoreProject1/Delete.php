<?php
	

	include('databaseConnection.php');
	include('functions.php');
	session_start();
	if(empty($_SESSION)){
     echo "<script>window.open('LoginForm.html','_self')</script>";
  } 
	$username = $_SESSION["username"];
	
	delete_news($username,$connection);
	
	$dataUpdate = "DELETE FROM users WHERE Username = '$username'";


	if(mysqli_query($connection, $dataUpdate)){

		echo "<script>alert('Successfully deleted')</script>";
				session_destroy();

		echo "<script>window.open('allnews_list.php','_self');</script>";
		session_destroy();
	
	}else{

		echo "Error deleting<br>";

	}






?>
