
  <?php include('header.php');?>
    <link rel="stylesheet" href="CSS\Style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


  <form action = "createUserAccountProcess.php" method="post"  enctype="multipart/form-data">

    <div class="container">

      <label><b>Username</b></label>
      <input type = "text" placeholder = "username" name = "username" required>

      <label><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      
      <label><b>Choose Image</b></label>
      <input type="file" placeholder="Image" name="image" accept=".png, .jpg, .jpeg" /> required>

     <!--  <label><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="pswdrepeat" required>

      <label><b>Choose a picture</b></label>
      <input type = "file" name = "imagefile" required> -->
      
      <input type="checkbox" checked="checked"> Remember me
   

      <div class="clearfix">
        <button type="button"  class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn" name="submit" >Sign Up</button>
      </div>

    </div>

  </form>


</body>
</html>