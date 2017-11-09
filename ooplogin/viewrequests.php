<?php
require_once 'core/init.php';
require_once 'includes/header.php';



if(!$user->isLoggedIn()) {
	if(!$user->hasPermission('admin')){
	Session::flash('home', 'Not Authorized!!');
	Redirect::to('index.php');
}
} 

$user = new User();
	$viewAllUsers = $user->viewRequests();
	$i = 0;

	if(!$viewAllUsers) {
		echo 'No Requests Present';
	} else {?>
	<table width="650" align="center" bgcolor="pink" border=6 >
	<tr align="center">
		<td colspan="8"><h2>All Requests</h2></td>
	</tr>

	<tr align="center">
		<th>S.N.</th>		
		<th>Username</th>
		<th>Name</th>
		<th>Inventory Request</th>
		<th>Department</th>		
		<th>Requested Date</th>
		<th>Status</th>
		<th>Details</th>
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
				<td><?php echo $user->status;?></td>			
				<td> <?php echo $user->request_date; ?> </td>
				<td>			
					<form action='' method="post">
						<button type="submit"  name="detail" value= "<?php echo $user->request_id;?>">Details</button>
					</form>
				</td>
			</tr>
	<?php
		 
	}
}


if(Input::exists()){
	
	$user_id = Input::get('detail');
	$user = new User();
	$response = $user->getDetails($user_id);
	if($response){
		$datas = $user->data();
		foreach($datas as $data){
			?>
			<table  width="650" align="center" bgcolor="pink" border=6>
				<tr align="center">
					<td colspan="7"><h2>Request Detail</h2>
					</td>
				</tr>
					<tr align="center">						
						
						<th>Inventory Request</th>
						<th>Details</th>
						<th>Status</th>		
						<th>Remarks</th>
						<th>submit</th>
						
					</tr>
				<form action='acknowledgerequest.php' method="post">
				<tr align="center" bgcolor="white">
				<td><?php echo $data->inventory_name; ?></td>
				<td> <textarea><?php echo $data->detail; ?></textarea></td>
				<td>
					<select name="select">
						<option value="pending">Pending</option>
						<option value="completed">Completed</option>
						<option value="Cancelled">Cancelled</option>
					</select>
				</td>
				<td> <textarea name="remark"></textarea></td>
				<td>
					<input type="hidden" name="id" value="<?php echo $data->id;?>">
					<input type="submit" value="submit">
				</td>
			</tr>
		</form>

			</table>


			<?php

		}	
	}

}


