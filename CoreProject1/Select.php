<?php
	

	include("databaseConnection.php");
    include('functions.php');	
	$flag= is_admin($connection); 
    $log=0;

    if(isset($_GET["update"])){

        //if logged in as admin
        $id     = $_GET["update"];
        $select = "SELECT * FROM users WHERE Id = '$id'";
        $result = mysqli_query($connection, $select);
        $row    = mysqli_fetch_assoc($result);


    }else{

        	
            
            if(isset($_SESSION["username"])){

                 //if logged in
                $username=$_SESSION["username"];
                $select = "SELECT * FROM users WHERE Username = '$username'";
                $result = mysqli_query($connection, $select);
                mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result); ;
                
            

            }else{
                session_destroy();
                $username   =   $_POST["username"];
                $password   =   $_POST["password"];
                $select     = "SELECT * FROM users";
                $result     = mysqli_query($connection, $select);
            	   if (mysqli_num_rows($result)) {

            // output data of each row

                	       while($row = mysqli_fetch_assoc($result)) {

                	       	if(strcasecmp($row["Username"], $username) == 0 & $row["Password"] == $password){

                        		session_start();
                        		$_SESSION['username'] = $username;
                                $log++;
                        

                               echo "<script>window.open('select.php','_self')</script>";

                    	
                    	   }
                	   }
                       if($log==0){


                                echo "<script>alert('Username or Password Incorrect')</script>";
                                echo "<script>window.open('LoginForm.html','_self')</script>";
            
                           }
                       }

            	   } 	
                }
            


?>
<?php include ('header.php');?>


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="<?php echo 'static/' . $row['Image'];?>" width=200 alt="" class="img-rounded img-responsive" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <h4><?php echo $row["Username"]; ?></h4>
                        
                        <p>
                            <i class="glyphicon glyphicon-envelope">Email </i><?php echo $row["Email"];?>
                            <br />
                            
                            <br />
                            <i class="glyphicon glyphicon-gift">Date </i><?php echo $row["Date"]?></p>
                        <!-- Split button -->
                        <div class="btn-group">
                             <form method="post" action="Newslist_process.php">

                                <input type="submit" value="Your News" />

                            </form>

                           <form method="post" action="News.php">

                           		<input type="submit" value="Post News" />
                           	</form>

                           	<form method="post" action="update.php">

                           		<input type="submit" name="update" value="Update" />

                           	</form>
                            <form method="post" action="delete.php">

                                <input type="submit" name="delete" value="Delete" />

                            </form>

                            <?php
                            if($row["Flag"]==1){

                                echo'<form method="post" action="signup.php">

                                <input type="submit" name="create" value="Create" />

                            </form>';
                            }
                            ?>
                           		
                           
                                       
                        </div>
                    </div>
               
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
        flag = <?php echo $flag?>

            if()
            alert()
</script>

</body>
</html>

</body>
</html>
