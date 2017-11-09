<?php 

require_once 'core/init.php';
require_once 'includes/header.php';


if(Session::exists('home')) {
	echo Session::flash('home');
}


$user = new User(); // current logged in user
if($user->isLoggedIn()) {
?>

	
	<!-- <ul>	
		<li><a href="updateaccount.php">Update Details</a></li>
		<li><a href="changepassword.php">Change Password</a></li>
		<li><a href="deleteaccount.php">Delete Account</a></li>
		<?php 
		$data = $user-> data();
		$user_id = $data-> id;
		$datas = $user->getRequest($user_id);
		$flag = 0;
		if($datas){
		foreach ($user->data() as $data) {			
			if(strcasecmp($data->status, "pending") != 0){
				$flag++;				
			}	
			else{
				$flag = 0;								
			}
		}
	}
	if($flag != 0){
		?>
		<li><a href="submitrequests.php">Request Inventory</a></li>
		<?php		
	}
	else{
		echo "Request pending";
	}
	$user = new User();
	?>	

	</ul> -->


<?php 
	

} 
	


	$user = new User();
	$viewAllUsers = $user->viewRequests();
	$i = 0;

	if(!$viewAllUsers) {
		echo 'No Requests Present';
	} else {?>
	<table width="650" align="center" bgcolor="pink" border=6 >
	<tr align="center">
		<td colspan="9"><h2>All Requests</h2></td>
	</tr>

	<tr align="center">
		<th>S.N.</th>		
		<th>Username</th>
		<th>Name</th>
		<th>Inventory Request</th>
		<th>Department</th>		
		<th>Requested Date</th>
		<th>Status</th>
		<th>Acknowledged Date</th>
		<th>Remarks</th>
		
	</tr>

	<?php
		foreach($user->data() as $user) {	
			?>
			<tr align="center" bgcolor="white">
				<td> <?php echo ++$i; ?> </td>
				<td><?php echo $user->name; ?> </td> 	
				<td> <?php echo $user->username; ?> </td>
				<td> <?php echo $user->inventory_name; ?> </td>
				<td> <?php echo $user->department_name; ?> </td>			
				<td> <?php echo $user->request_date; ?> </td>
				<td> <?php echo $user->status; ?></td>
				<td> <?php echo $user->updated_date?></td>
				<td> <?php echo $user->remarks?></td>

			</tr>
	<?php
		 
	}



}
?>
