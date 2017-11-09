<?php 

require_once 'core/init.php';
require_once 'includes/header.php';


if(Session::exists('home')) {
	echo Session::flash('home');
}


$user = new User(); // current logged in user
if($user->isLoggedIn()) {
?>

	<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!!</p>

	<ul>
		<li><a href="logout.php">Logout</a></li>
		<li><a href="updateaccount.php">Update Details</a></li>
		<li><a href="changepassword.php">Change Password</a></li>
		<li><a href="deleteaccount.php">Delete Account</a></li>
	</ul>

<?php 
	if($user->hasPermission('admin')) {
		echo '<p> You are an admin. </p>'; 
		?>
		<a href="viewprofiles.php">View User Profiles</a>
		<?php
	}

} else {
	echo '<p> You need to <a href="login.php">Log in</a> or <a href="register.php">Register </a> </p>';
}



?>

