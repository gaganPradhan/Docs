<?php 
include_once('functions.php');
include('databaseconnection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<!DOCTYPE html>
<html>
        <link rel="stylesheet" type="text/css" href="create.css">
        <link rel="stylesheet" type="text/css" href="prof.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<body>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <a class="navbar-brand" href="#">
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
