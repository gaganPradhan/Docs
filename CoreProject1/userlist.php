<?php

include('databaseconnection.php');
include('functions.php');


		if(is_admin($connection)){

			
			$selectuser = "SELECT * FROM users";
			$resultuser = mysqli_query($connection,$selectuser);
			$rows = array();
			while($row = mysqli_fetch_array($resultuser))
			    $rows[] = $row;
			}	
			else{
				echo "<script>alert('You dont have the privilege')</script>";
				echo "<script>window.open('select.php','_self')</script>";
			}

?>















<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
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

                    <li><form class="form-inline my-2 my-lg-0" action = "allnews_list.php" method = "post">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="list">News List</button>
                                    

                    </form>
                </li>
                <li>
                
                   <form class="form-inline my-2 my-lg-0" action = "userlist.php" method = "post">
                                   
                         <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="list">User List</button>
                                    

                    </form>

                
                </li>


                    

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


<center>
<table style="width:75%" cellpadding="10">
  <tr>
  	<th>DP</th>
    <th>Username</th>
    <th>Email</th> 
    <th>Date</th>
    <th>Action</th>
  </tr>
  <tr>

<?php

	if(isset($_SESSION["username"])){

  			foreach($rows as $row){  
		    $username = stripslashes($row['Username']);
		    $email = stripcslashes($row['Email']);
		    $date = $row['Date'];
		    $id = $row['Id'];
		    $image =$row['Image'];
		    ?>
		    <td><img width="100" src="static/<?php echo $image;?>"></td>

		    <td><?php echo $username; ?></td>

		    <td><?php echo $email;?></td>

		    <td><?php echo$date; ?></td>
		   

		    <td>
		    		<form class="form-inline my-2 my-lg-0" action = "checkprofile.php" method = "get">

                         <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="delete" value="<?php echo $id;?>">Delete</button>
					</form>
		    		<form class="form-inline my-2 my-lg-0" action = "update.php" method = "get">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="update" value="<?php echo $id;?>">Update</button>

					    
                                    

                    </form>
                    <form class="form-inline my-2 my-lg-0" action = "newslist_process.php" method = "get">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="view" value="<?php echo $id;?>">Newslist</button>

					    
                                    

                    </form>

		    		</td>
		    		</tr>
		    
		 <?php }}?>
</table>
</body>
</html>
