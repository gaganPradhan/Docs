<?php




		$con = mysqli_connect("localhost","root",'',"logindata");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }


	



if(isset($_POST)){


	echo "successfull"."<br>";
	$username = $_POST["username"];
	$password = $_POST["password"];
	echo "username ".$username."<br>";
	echo "password ".$password."<br>";
	echo (0.7+0.1)*10;

	$data="INSERT INTO `users` (`Username`,`Password`) VALUES('$username','$password')";
	if (mysqli_query($con, $data)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $data . "<br>" . mysqli_error($con);
}


}





// for($counter=0;$counter<10;$counter++){

// 	if($counter < 5){
// 		for($j=0;$j<=$counter;$j++){
// 			echo "*";
// 		}

// 		echo "<br>";
// 	}else if($counter > 4){
// 	for($l=4;$l<$counter;$l++){
// 			echo "*";
// 		}

// 		echo "<br>";
// 	}
// }
?>