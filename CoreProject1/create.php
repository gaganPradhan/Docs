<?php
	
	include("databaseConnection.php");

	session_start();
	// $target		= 	"Static/";
	// $target 	= 	$target . basename( $_FILES['imagefile']['name']);
	// $Filename	=	basename( $_FILES['imagefile']['name']);
	if(empty($_SESSION["username"]))
	session_destroy();
	
	$username	=	$_POST["username"];
	$password	=	$_POST["password"];
	$pswdRepeat =	$_POST["pswdrepeat"];
	$email		=	$_POST["email"];
	if($password != $pswdRepeat){

		echo "<script>alert('password are not same')</script>";
		echo "<script>window.open('Signup.html','_self')</script>";



	}else{

	$image = $_FILES['imagefile']['name'];
	$tmp_name = $_FILES['imagefile']['tmp_name'];


	$select	= "SELECT * FROM users";
	$result	= mysqli_query($connection, $select);
	$flag 	= 0;
	if (mysqli_num_rows($result)) {

    // output data of each row

    	while($row = mysqli_fetch_assoc($result)) {

    		if($row["Username"] == $username & $row["Password"] == $password){

        		echo "Username already exists";
        		$flag++;
        		break;
        	
        	}
    	}
    }

	if($flag == 0){

		if (move_uploaded_file($tmp_name, "Static/$image")) {

	     	echo "The file ". basename( $_FILES["imagefile"]["name"]). " has been uploaded.";
	     	$imagetmp =	addslashes($_FILES["imagefile"]["tmp_name"]);
			$dataTransfer =	"INSERT INTO `users` (Username, Password, Email, Image)
	 		VALUES ('$username', '$password', '$email' , '$image')"; 


	    }else {

	       	echo "Sorry, there was an error uploading your file.";

	    }
		

	}



	//Insert into database

	

	if (mysqli_query($connection, $dataTransfer)) {

    	echo "<script>alert'New record created successfully'</script>";
    	if(empty([_SESSION["username"]])){
    		session_start();
    		$_SESSION["username"]=$username;
    	}
    	echo "<script>window.open('select.php','_self')</script>";
		

	} else {

    	echo "Error: " . $dataTransfer . "<br>" . mysqli_error($connection);

	}


}



?>