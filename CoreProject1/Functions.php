<?php

function post_news($title,$description,$image,$temp_name,$connection,$id){

	
	move_uploaded_file($temp_name,"static/$image");
	$dataTransfer = "INSERT INTO `news` (Title, Description, Image, Id)
	VALUES ('$title','$description','$image','$id')";
	mysqli_query($connection, $dataTransfer);
	header('Location : LoginForm.html');

}



function delete_news($username,$connection){


	$dataSelect = "SELECT Id FROM users WHERE Username ='$username'";
	$result		= mysqli_query($connection, $dataSelect);
	$rowuser	= mysqli_fetch_assoc($result);
	$id 		= $rowuser["Id"];

	$newsSelect = "DELETE FROM news WHERE Id='$id'";
	$result		= mysqli_query($connection,$newsSelect);

}


function delete_specific_news($newsid,$username,$connection){


	$newsSelect = "DELETE FROM news WHERE newsid='$newsid'";
	$result		= mysqli_query($connection,$newsSelect);

}



function is_admin($connection){
	if(!isset($_SESSION["username"]))
		session_start();
	if(isset($_SESSION["username"])){

		$username	= $_SESSION["username"];
		$selectuser ="SELECT Flag FROM users WHERE Username = '$username'";
		$result 	= mysqli_query($connection, $selectuser);
		$row 		= mysqli_fetch_assoc($result);
		if($row["Flag"] == 1){
			
			return 1;

		}else{
			
			return 0;
			echo "<script>window.open('select.php','_self')</script>";
		}

	}


}



function delete_user($connection)
{

	session_start();
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
}


function admin_delete_user($connection, $id){

	$dataUpdate = "DELETE FROM users WHERE Id = '$id'";


	if(mysqli_query($connection, $dataUpdate)){

		echo "<script>alert('Successfully deleted')</script>";
		echo "<script>window.open('userlist.php','_self');</script>";
	
	
	}else{

		echo "Error deleting<br>";

	}


}


function check_profile($connection)
{



}
?>