<?php
	

	include('databaseConnection.php');
	include('functions.php');
	


	if(isset($_GET["delete"]))
			{

				$id=$_GET["delete"];
				echo $id;	
				$selectuser = "SELECT * FROM users WHERE Id=$id";
				$result		= mysqli_query($connection, $selectuser);
				$row 		= mysqli_fetch_assoc($result);
				$id = $row["Id"]; 
				admin_delete_user($connection,$id) ;

			}
	


	









?>
