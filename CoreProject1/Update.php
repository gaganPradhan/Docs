<?php
	
	include("databaseConnection.php");
	
include("functions.php");
$flag = is_admin($connection);
 if(empty($_SESSION)){
     echo "<script>window.open('LoginForm.html','_self')</script>";
  } 
  //
  if(isset($_GET["update"])){

    $id             = $_GET["update"];
    $_SESSION["id"] = $id;
    $Username       = $_SESSION["username"];
    $select         = "SELECT * FROM users WHERE Id='$id'";
    $result         = mysqli_query($connection, $select);
    $row            = mysqli_fetch_assoc($result);
    $username       = $row["Username"];
    $email          = $row["Email"];
    $image          = $row["Image"]; 

    
   //echo "Admin update authenticated";



  }else{

    if(isset($_POST["update"])){

      $user     = $_SESSION["username"];  
      $select   = "SELECT * FROM users WHERE Username='$user'";
      $result   = mysqli_query($connection, $select);
      $row      = mysqli_fetch_assoc($result);
      $id       = $row["Id"];
      $username = $row["Username"];
      $email    = $row["Email"];
      $image    = $row["Image"];  
      $_SESSION["id"] = $id;

     // echo "if normal user then this blck";
      
    
    }else{
      $id       = $_SESSION["id"];  
      $select   = "SELECT * FROM users WHERE Id='$id'";
      $result   = mysqli_query($connection, $select);
      $row      = mysqli_fetch_assoc($result);
      $username = $row["Username"];
      $email    = $row["Email"];
      $image    = $row["Image"];  
      //echo "if admin then this block";
      

    }
}


//updated with input from form

if(isset($_POST["submit"])){


  
  $updatedName   = $_POST["username"];
  $updatedEmail  = $_POST["email"];
  $image         = $row["Image"];
  $newimage      = $_FILES["imagefile"]["name"];
  $username      = $_SESSION["username"];
  
  
 

    

  if($newimage){
    unlink("static/$image");
    $image         = $updatedName."_".$newimage;
    $tmp_name      = $_FILES['imagefile']['tmp_name'];
    $update        = "UPDATE users SET Image='$image' WHERE Id='$id'";
    move_uploaded_file($tmp_name, "Static/$image");
    mysqli_query($connection, $update);

  }
  


  $update = "UPDATE users SET Username = '$updatedName', Email = '$updatedEmail' WHERE Id=$id";
  mysqli_query($connection, $update);

  if($flag == 0)
  {echo "<script>window.open('select.php','_self')</script>";
  $_SESSION["username"] = $updatedName;}
  else{


  echo "<script>window.open('userlist.php','_self')</script>";

  }
}



?>















<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>

<style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 15%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {
    float: left;
    width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>

 <link rel="stylesheet" type="text/css" href="prof.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

          <a class="navbar-brand" href="select.php">
            <?php 

            if(isset($_SESSION["username"]))
            {
              echo $_SESSION["username"];
            }

            ?>


          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

              <span class="navbar-toggler-icon"></span>

          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">

                  <form class="form-inline my-2 my-lg-0" action = "allnews_list.php" method="post">
                                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="list">News List</button>
                                  

                  </form>


                  

            </ul>
            <ul>
              <button class="btn btn-outline-success ">
                                    <?php 
                                    if(isset($_SESSION["username"])){
                                        echo "<form method = 'post' action='logout.php'>

                                        <input type='submit' name='logout' value='Logout' />
                                        </form>";
                          }else{

                            echo "<form action='LoginForm.html'>

                                        <input type='submit' value='Login' />
                                        </form>";

                          }
                                    ?>
                                      
                                  </button>
            </ul>
        </div>
  </nav>

  <form action = "update.php" method="post"  enctype="multipart/form-data">

    <div class="container">

      <label><b>Username</b></label><br>
      <input type = "text" value = "<?php echo $username;?>" name = "username" required/>
      <br>
      <label><b>Email</b></label><br>
      
      <input type="text" value="<?php echo $email;?>" name="email" required/>
      <br>
      <label><b>Choose a picture</b></label><br>
      <img src="<?php echo "static/" .$image;?>" width=200 alt="" class="img-rounded img-responsive" />
      <input type = "file" name = "imagefile">
 

      <div class="clearfix">
        <input type="submit" name="submit" value="Update">

      </div>

    </div>

  </form>


</body>
</html>




