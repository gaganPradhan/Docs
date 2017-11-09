<?php 

require_once 'core/init.php';
require_once 'includes/header.php';


$user = new User();
$image = new Image();

if(!$user->isLoggedIn()) {
	 Session::flash('home', 'Please LogIn first!!');
	 Redirect::to('index.php');
}


if(isset($_POST['yes'])) {					
	try {
		$currentImage = $user->data()->image;
		$user->deleteAccount();
		$image->deleteImage("images/$currentImage");

		Session::flash('home', 'Account deleted successfully');
		Redirect::to('index.php');

	} catch(Exception $e){
		die($e->getMessage());
	}
}	


if(isset($_POST['no'])) {
	Session::flash('home', 'Account NOT deleted ');
	Redirect::to('index.php');
}



?>

<br> 

<h2 style= "text-align:center;">Do you really want to DELETE your account?</h2>

<form style="text-align: center" action="" method="post">

	<input type="submit" name="yes" value="Yes I want">

	<input type="submit" name="no" value="No I don't">	


</form>