<?php
require 'vendor\autoload.php';
use UserInterface\User;
session_start();
if(empty($_SESSION)){
  header("Location: index.php");
}
$username = $_SESSION["username"];
$userdata = new User($username);
$user     = $userdata-> viewUserProfile();
$username = $user["Username"];
$email    = $user["Email"];
$image    = $user["Image"];
$isadmin  = $userdata-> isUserAdmin();
if($isadmin){
    include ('_layoutAdmin.php');
}else{
    include ('_layout.php');
}

?>

  <form action = "updateprofileprocess.php" method="post"  enctype="multipart/form-data">
    <div class="w3-container">
      <label><b>Username</b></label><br>
      <input type = "text" value = "<?php echo $username;?>" name = "username" required/>
      <br>
      <label><b>Email</b></label><br>      
      <input type="text" value="<?php echo $email;?>" name="email" required/>
      <br>
      <label><b>Choose a picture</b></label><br>
      <img src="<?php echo "Img/" .$image;?>" width=200 alt="" class="img-rounded img-responsive" />
      <input type = "file" name = "image">
      <div class="clearfix">
        <input type="submit" name="submit" value="Update">
      </div>
    </div>
  </form>
</body>
</html>




