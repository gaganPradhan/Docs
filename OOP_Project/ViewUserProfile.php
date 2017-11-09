<?php
require 'vendor\autoload.php';
use UserInterface\User;
session_start();
if(empty($_SESSION)){
	header("Location: index.php");
}
$username = $_SESSION["username"];
$userdata = new User($username);
$user 	  = $userdata-> viewUserProfile();
$isadmin  = $userdata-> isUserAdmin();
if($isadmin){
    include ('_layoutAdmin.php');
}else{
    include ('_layout.php');
}
?>

<div class="w3-container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="<?php echo 'img/' . $user['Image'];?>" style="width:25%" width=200 alt="" class="img-rounded img-responsive" />
               </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <h4><?php echo $user["Username"]; ?></h4>
                        
                        <p>
                            <i class="glyphicon glyphicon-envelope">Email </i><?php echo $user["Email"];?>
                            <br />
                            
                            <br />
                            <i class="glyphicon glyphicon-gift">Date </i><?php echo $user["Date"]?></p>
                        <!-- Split button -->
                        <div class="btn-group">
                        </div>
                    </div>
               
                </div>
            </div>
        </div>
    </div>
</div>

</div>
      
</body>
</html>



</body>
</html>




