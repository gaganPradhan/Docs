<?php
	include('databaseConnection.php');
	include('functions.php');


	
    $flag=is_admin($connection);



		$selectuser = "SELECT Id FROM users";
		$resultuser = mysqli_query($connection,$selectuser);
		$rowuser	= mysqli_fetch_assoc($resultuser);

        $selectnews	= "SELECT * FROM news";
		$resultnews	= mysqli_query($connection,$selectnews);
		$rows       = array();
		while($row  = mysqli_fetch_array($resultnews))
		  $rows[]   = $row;
		
				

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

                   <li> <form class="form-inline my-2 my-lg-0" action = "allnews_list.php" method = "post">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="list">News List</button>
                               

                    </form>
                </li>

                    

                
                
                <?php 
                if($flag){
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


<center>
<table style="width:75%">
  <tr>
    <th>News Title</th>

    <th>Date</th>
    <th>Username</th>
    <th>Action</th>
  </tr>
  <tr>
  	<?php
  		{
  			foreach($rows as $row){ 
		    $title       = stripslashes($row['Title']);
		    $description = stripcslashes($row['Description']);
		    $date        = $row['Date'];
		    $id          = $row['Id'];
            $newsid      = $row['newsid'];

                        ?>
		    <td><?php echo $title; ?> </td>
   		    <td><?php echo $date; ?></td>
            <?php
            $selectuser = "SELECT Username FROM users WHERE Id='$id'";
            $resultuser = mysqli_query($connection,$selectuser);
            $rowuser    = mysqli_fetch_assoc($resultuser);
            $username   = $rowuser["Username"];
            ?>
            <td> <?php echo $username;?></td>
            <td>
                <form class="form-inline my-2 my-lg-0" action = "news_read.php" method = "get">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="read" value="<?php echo $newsid;?>">Read</button>
                </form>

		    </tr>
            <?php
  		}
  	}


  	?>

  


</table>
</center>


</body>
</html>