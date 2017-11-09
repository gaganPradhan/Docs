<?php
  
  include("databaseConnection.php");
  include("functions.php");
  $flag= is_admin($connection);

  if(empty($_SESSION)){
     echo "<script>window.open('LoginForm.html','_self')</script>";
  }

  if(isset($_GET["update"])){

    $id             = $_GET["update"];
    $username       = $_SESSION["username"];
    $select         = "SELECT * FROM news WHERE newsid='$id'";
    $result         = mysqli_query($connection, $select);
    $row            = mysqli_fetch_assoc($result);
    $title          = $row["Title"];
    $description    = $row["Description"];
    $image          = $row["Image"];  
    $_SESSION["id"] = $id;



  }

if(isset($_POST["submit"])){


  
  $updatedName         = $_POST["title"];
  $updatedDescription  = $_POST["description"];
  $id                  = $_SESSION["id"];
  $select              = "SELECT * FROM news WHERE newsid='$id'";
  $result         = mysqli_query($connection, $select);
  $row            = mysqli_fetch_assoc($result);
  $image          = $row["Image"];
  $newimage            = $_FILES["imagefile"]["name"];
  $username            = $_SESSION["username"];
  
  if($newimage){

    unlink("Static/$image");
    
    $image         = $id."_".$newimage ;
    $tmp_name      = $_FILES['imagefile']['tmp_name'];
    $update        = "UPDATE news SET Image='$image' WHERE newsid='$id'";

    
    move_uploaded_file($tmp_name, "Static/$image");
    mysqli_query($connection, $update);
    move_uploaded_file($tmp_name, "Static/$image");
    mysqli_query($connection, $update);


   
  }


  $update               = "UPDATE news SET title = '$updatedName', Description = '$updatedDescription' WHERE newsid = $id";
  mysqli_query($connection,$update);    
  
  echo "<script>window.open('allnews_list.php','_self')</script>";


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

                  <li>
                    <form class="form-inline my-2 my-lg-0" action = "News_list.php" method="post">
                                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="list">News List</button>
                                  

                  </form>
                   </li>

                    

                
                
                <?php 
                $flag = is_admin($connection);
                if($flag==1){
                echo '<li>
                   <form class="form-inline my-2 my-lg-0" action = "userlist.php" method = "post">
                                   
                         <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="list">User List</button>
                                    

                    </form>

                </li>';
                }
                ?>
                


                  

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

  <form action = "update_news.php" method="post"  enctype="multipart/form-data">

    <div class="container">

      <label><b>Title</b></label><br>
      <input type = "text" value = "<?php echo $title;?>" name = "title" required/>
      <br>
      <label><b>Description</b></label><br>
      
      <input type="text" value="<?php echo $description;?>" name="description" required/>
      <br>
      <label><b>Choose a picture</b></label><br>
      <img src="<?php echo "static/" . $image;?>" width=200 alt="" class="img-rounded img-responsive" />
      <input type = "file" name = "imagefile">
 

      <div class="clearfix">
        <input type="submit" name="submit" value="Update">

      </div>

    </div>

  </form>


</body>
</html>
