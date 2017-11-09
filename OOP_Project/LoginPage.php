<?php
include('header.php');
?>
    <link rel="stylesheet" href="CSS\Style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
      

<div class="container h-100 d-flex justify-content-center">
    <div class="jumbotron my-auto">
        



        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
        <button onclick="location.href='CreateUserAccount.php'" style="width:auto;" type="button">signup</button>
        <div id="id01" class="modal">
          
          <form class="modal-content animate" action = "LoginProcess.php" method="post">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
              <label><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username" required>

              <label><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password" required>
               
                
              <button type="submit">Login</button>
              <input type="checkbox" checked="checked"> Remember me
            </div>

            <div class="container" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
          </form>
        </div>


    </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
