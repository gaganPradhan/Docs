<?php
require 'vendor\autoload.php';
use UserInterface\User;
use UserInterface\Admin;
session_start();
$username = $_SESSION["username"];
$user 	  = new User($username);
if(!($user-> isUserAdmin()))
{
	header('Location: ViewUserProfile.php');
}else{
	$admin 	  = new Admin($user);
	$userdata = $admin-> showUserList();
	include('_layoutAdmin.php');
}
?>

<div class="w3-container">
<center>
<table style="width:75%" cellpadding="10">
  <tr>
  	<th>DP</th>
    <th>Username</th>
    <th>Email</th> 
    <th>Date</th>
    <th>User Status</th>
    <th>Action</th>
  </tr>
  <tr>
	<?php
	if(isset($_SESSION["username"])){
  			foreach($userdata as $row){  
		    $username = stripslashes($row['Username']);
		    $email    = stripcslashes($row['Email']);
		    $date     = $row['Date'];
		    $id       = $row['Id'];
		    $image    = $row['Image'];
		    $status   = $row['AccountType'];
		    if($status){
		    	$type="Admin";
		    }else{
		    	$type="Member";
		    }
		    ?>
		    <td><img width="100" src="img/<?php echo $image;?>"></td>
		    <td><?php echo $username; ?></td>
		    <td><?php echo $email;?></td>
		    <td><?php echo $date; ?></td>
		    <td><?php echo $type; ?></td>		   		   
	    <td>
		   	<form class="form-inline my-2 my-lg-0" action = "DeleteUserProfileProcess.php" method = "post">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="delete" value="<?php echo $username;?>">Delete</button>
			</form>
		    <form class="form-inline my-2 my-lg-0" action = "AdminUpdate.php" method = "get" name = "submit">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="update" value="<?php echo $username;?>">Update</button>
            </form>
            <form class="form-inline my-2 my-lg-0" action = "AdminUpdateProcess.php" method = "get" name = "submit">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="makeadmin" value="<?php echo $username;?>"><?php if(!$status){ echo "Make Admin";} else {echo"Make member";}?></button>
            </form>
        </td>
	</tr>		    
<?php }}?>
</table>
</center>
</div>

