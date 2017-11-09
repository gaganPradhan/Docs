<?php 

require_once 'core/init.php';
require_once 'includes/header.php';

$user = new User();

if(!$user->isLoggedIn()) {
	 Session::flash('home', 'Please LogIn as Admin first!!');
	 Redirect::to('index.php');
}

if(!$user->hasPermission('admin')) {
	Session::flash('home', 'You are not an Admin, Login as Admin');
	Redirect::to('index.php');
}
?>

<table width="650" align="center" bgcolor="pink" border=6 >
	<tr align="center">
		<td colspan="6"><h2>All Users</h2></td>
	</tr>

	<tr align="center">
		<th>S.N.</th>		
		<th>Username</th>
		<th>Name</th>
		<th>Department</th>
		<th>Image</th>
	</tr>

<?php

$admin = new Admin();
$viewAllUsers = $admin->viewProfiles();
$i = 0;

if(!$viewAllUsers) {
	echo 'No users Present';
} else {
	foreach($admin->data() as $user) {	
		?>
		<tr align="center" bgcolor="white">
			<td> <?php echo ++$i; ?> </td>
			<td> <?php echo $user->username; ?> </td>
			<td> <?php echo $user->name; ?> </td>
			<td> <?php echo $user->department_name; ?> </td>
			<td><img src="images/<?php echo $user->image;?>" width="60" height="60"></td>
		</tr>
<?php
		 
	}
}
?>

</table>