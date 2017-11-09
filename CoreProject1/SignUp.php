<?php
session_start();

if(isset($_POST["create"])){

include('header.php');
  
}else{
  include('header_signup.php');
}
?>

  <form action = "create.php" method="post"  enctype="multipart/form-data">

    <div class="container">

      <label><b>Username</b></label>
      <input type = "text" placeholder = "username" name = "username" required>

      <label><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <label><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="pswdrepeat" required>

      <label><b>Choose a picture</b></label>
      <input type = "file" name = "imagefile" required>
      
      <input type="checkbox" checked="checked"> Remember me
   

      <div class="clearfix">
        <button type="button"  class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>

    </div>

  </form>


</body>
</html>