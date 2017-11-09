<?php 

require_once 'core/init.php';
require_once 'includes/header.php';


$user = new User();

if(!$user->isLoggedIn()) {
	 Session::flash('home', 'Please LogIn first!!');
	 Redirect::to('index.php');
}


$allowedUser = $user->data()->username;
$username = Input::get('user');
if(!$username  || strcmp($username, $allowedUser) != 0) {
	Session::flash('home', 'Cant view others account details');
	Redirect::to('Index.php');
} else {
	$user = new User($username);
    $department = new Department();	
	if(!$user->exists()) {
		Redirect::to(404);
	} else {
		$data = $user->data();
	    $dpt_id = $data->dpt_id;
	    $user_id = $data->id;
        $department->getDepartment([ "id", "=", $dpt_id]);
        $dpt_data = $department->data();        
?>

	<center>
	<p><b>Full Name:</b> <?php echo escape($data->name); ?></p>
	<p><b>Department Name:</b><?php echo escape($dpt_data->department_name); ?></p>	
	<p><b>Profile Picture</b><img src='images/<?php echo $data->image ?>'' width='150' height='150' > </p>
</center>

<?php		
	} 
} 

	$viewAllUsers = $user->getRequest($user_id);
	$i = 0;	

	if(!$viewAllUsers) {
		echo 'No Requests Present';
	} else {?>
	<table width="650" align="center" bgcolor="pink" border=6 >
	<tr align="center">
		<td colspan="4"><h2>Your Request</h2></td>
	</tr>

	<tr align="center">		
		<th>Inventory Request</th>
		<th>Requested Date</th>
		<th>Status</th>
		<th>Acknowledged Date</th>
	</tr>

	<?php
		foreach($user->data() as $user) {	
			?>
			<tr align="center" bgcolor="white">
				<td> <?php echo $user->inventory_name; ?> </td>				
				<td> <?php echo $user->request_date; ?> </td>
				<td> <?php echo $user->status; ?></td>
				<td> <?php echo $user->updated_date; ?></td>
				<td> <?php echo $user->remarks; ?></td>

			</tr>
	<?php
		 
	}
}
?>


